<?php

declare(strict_types=1);

final class AppointmentService
{
    private array $config;
    private SlotService $slots;
    private HoldService $holds;
    private RazorpayService $razorpay;
    private GoogleAppsScriptClient $sheet;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->slots = new SlotService($config);
        $this->holds = new HoldService($config);
        $this->razorpay = new RazorpayService($config);
        $this->sheet = new GoogleAppsScriptClient($config);
    }

    /**
     * @return array{
     *   timezone:string,
     *   times:list<string>,
     *   booked:array<string, list<string>>,
     *   from:string,
     *   to:string
     * }
     */
    public function availability(): array
    {
        $taken = $this->takenKeys();
        $booked = [];

        foreach ($taken as $key) {
            [$date, $time] = explode('|', $key, 2);
            $booked[$date][] = $time;
        }

        foreach ($booked as $date => $times) {
            $booked[$date] = array_values(array_unique($times));
            sort($booked[$date]);
        }

        return [
            'timezone' => $this->config['timezone'],
            'times' => $this->slots->times(),
            'booked' => $booked,
            'from' => $this->slots->today()->format('Y-m-d'),
            'to' => $this->slots->lastBookableDate()->format('Y-m-d'),
            'slot_duration_minutes' => (int) $this->config['slot_duration_minutes'],
        ];
    }

    /**
     * @return array{order_id:string,amount:int,currency:string,key_id:string}
     */
    public function createOrder(array $input): array
    {
        $booking = $this->validatedBooking($input);

        if (!$this->sheet->isConfigured()) {
            throw new RuntimeException('Online booking is not configured yet. Add the Google Apps Script web app URL to .env.');
        }

        $this->slots->assertBookable($booking['date'], $booking['time'], $this->takenKeys());

        $order = $this->razorpay->createOrder([
            'name' => $booking['name'],
            'service' => $booking['service'],
            'phone' => $booking['phone'],
            'date' => $booking['date'],
            'time' => $booking['time'],
        ]);

        $this->holds->hold($booking['date'], $booking['time'], $order['id']);

        return [
            'order_id' => $order['id'],
            'amount' => $order['amount'],
            'currency' => $order['currency'],
            'key_id' => $this->razorpay->keyId(),
            'display_date' => $this->slots->displayDate($booking['date']),
            'display_time' => $this->slots->displayTime($booking['time']),
        ];
    }

    /**
     * @return array{meet_link:string,booked_at:string,name:string,service:string,date:string,time:string,display_date:string,display_time:string}
     */
    public function confirmPayment(array $input): array
    {
        $orderId = trim((string) ($input['razorpay_order_id'] ?? ''));
        $paymentId = trim((string) ($input['razorpay_payment_id'] ?? ''));
        $signature = trim((string) ($input['razorpay_signature'] ?? ''));

        if ($orderId === '' || $paymentId === '' || $signature === '') {
            throw new InvalidArgumentException('Payment details are incomplete.');
        }

        $this->razorpay->verifySignature($orderId, $paymentId, $signature);
        $order = $this->razorpay->fetchOrder($orderId);
        $notes = is_array($order['notes'] ?? null) ? $order['notes'] : [];

        $booking = $this->validatedBooking([
            'name' => $notes['name'] ?? '',
            'programname' => $notes['service'] ?? '',
            'mobilenumber' => $notes['phone'] ?? '',
            'date' => $notes['date'] ?? '',
            'time' => $notes['time'] ?? '',
        ]);

        if ((int) ($order['amount'] ?? 0) !== $this->razorpay->amountPaise()) {
            throw new InvalidArgumentException('Paid amount does not match the appointment fee.');
        }

        $taken = array_values(array_filter(
            $this->takenKeys($orderId),
            fn (string $key): bool => $key !== $this->slots->slotKey($booking['date'], $booking['time'])
        ));
        $this->slots->assertBookable($booking['date'], $booking['time'], $taken);

        $result = $this->sheet->book([
            'name' => $booking['name'],
            'service' => $booking['service'],
            'phone' => $booking['phone'],
            'date' => $booking['date'],
            'time' => $booking['time'],
            'payment_id' => $paymentId,
            'start_iso' => $this->slots->slotStart($booking['date'], $booking['time'])->format(DateTimeInterface::ATOM),
            'end_iso' => $this->slots->slotEnd($booking['date'], $booking['time'])->format(DateTimeInterface::ATOM),
        ]);

        $this->holds->releaseByOrder($orderId);

        return [
            'meet_link' => $result['meet_link'],
            'booked_at' => $result['booked_at'],
            'name' => $booking['name'],
            'service' => $booking['service'],
            'date' => $booking['date'],
            'time' => $booking['time'],
            'display_date' => $this->slots->displayDate($booking['date']),
            'display_time' => $this->slots->displayTime($booking['time']),
        ];
    }

    /**
     * @return array{name:string,service:string,phone:string,date:string,time:string}
     */
    public function validatedBooking(array $input): array
    {
        $name = trim((string) ($input['name'] ?? ''));
        $service = trim((string) ($input['programname'] ?? $input['service'] ?? ''));
        $phone = preg_replace('/\D+/', '', (string) ($input['mobilenumber'] ?? $input['phone'] ?? '')) ?? '';
        $date = trim((string) ($input['date'] ?? ''));
        $time = trim((string) ($input['time'] ?? ''));

        if (strlen($phone) === 12 && str_starts_with($phone, '91')) {
            $phone = substr($phone, 2);
        }

        if ($name === '' || !preg_match('/^[\p{L}\s.\'-]{2,80}$/u', $name)) {
            throw new InvalidArgumentException('Enter a valid name.');
        }

        if (!in_array($service, $this->config['services'], true)) {
            throw new InvalidArgumentException('Select a service.');
        }

        if (!preg_match('/^[6-9]\d{9}$/', $phone)) {
            throw new InvalidArgumentException('Enter a valid 10-digit mobile number.');
        }

        if ($date === '' || $time === '') {
            throw new InvalidArgumentException('Select an appointment date and time.');
        }

        $this->slots->parseDate($date);
        if (!$this->slots->isValidTime($time)) {
            throw new InvalidArgumentException('Select a valid appointment time.');
        }

        return [
            'name' => $name,
            'service' => $service,
            'phone' => $phone,
            'date' => $date,
            'time' => $time,
        ];
    }

    /**
     * @return list<string>
     */
    private function takenKeys(?string $ignoreOrderId = null): array
    {
        $holds = $this->holds->activeHolds();
        if ($ignoreOrderId !== null) {
            $holds = array_values(array_filter(
                $holds,
                static fn (array $row): bool => $row['order_id'] !== $ignoreOrderId
            ));
        }

        return $this->slots->takenKeys($this->sheet->listBookedSlots(), $holds);
    }
}
