<?php

declare(strict_types=1);

final class GoogleAppsScriptClient
{
    private string $url;
    private string $secret;
    private string $sheetId;
    private string $tabName;

    public function __construct(array $config)
    {
        $this->url = $config['apps_script_url'];
        $this->secret = $config['apps_script_secret'];
        $this->sheetId = $config['google_sheet_id'];
        $this->tabName = $config['google_sheet_tab'];
    }

    public function isConfigured(): bool
    {
        return $this->url !== '' && $this->secret !== '';
    }

    /**
     * @return list<array{date:string,time:string}>
     */
    public function listBookedSlots(): array
    {
        if (!$this->isConfigured()) {
            return [];
        }

        $response = $this->call([
            'action' => 'list',
        ]);

        $booked = $response['booked'] ?? [];
        if (!is_array($booked)) {
            return [];
        }

        $rows = [];
        foreach ($booked as $row) {
            if (!is_array($row)) {
                continue;
            }
            $rows[] = [
                'date' => (string) ($row['date'] ?? ''),
                'time' => (string) ($row['time'] ?? ''),
            ];
        }

        return $rows;
    }

    /**
     * @param array{
     *   name:string,
     *   service:string,
     *   phone:string,
     *   date:string,
     *   time:string,
     *   payment_id:string,
     *   start_iso:string,
     *   end_iso:string
     * } $booking
     * @return array{meet_link:string,booked_at:string}
     */
    public function book(array $booking): array
    {
        if (!$this->isConfigured()) {
            throw new RuntimeException('Google Apps Script is not configured. Deploy the script and add GOOGLE_APPS_SCRIPT_WEBAPP_URL to .env.');
        }

        $response = $this->call([
            'action' => 'book',
            'name' => $booking['name'],
            'service' => $booking['service'],
            'phone' => $booking['phone'],
            'date' => $booking['date'],
            'time' => $booking['time'],
            'payment_id' => $booking['payment_id'],
            'start_iso' => $booking['start_iso'],
            'end_iso' => $booking['end_iso'],
        ]);

        if (empty($response['meet_link'])) {
            throw new RuntimeException('Booking saved but Google Meet link was not returned.');
        }

        return [
            'meet_link' => (string) $response['meet_link'],
            'booked_at' => (string) ($response['booked_at'] ?? ''),
        ];
    }

    /**
     * @param array<string, mixed> $payload
     * @return array<string, mixed>
     */
    private function call(array $payload): array
    {
        $payload['secret'] = $this->secret;
        $payload['sheet_id'] = $this->sheetId;
        $payload['tab_name'] = $this->tabName;

        $ch = curl_init($this->url);
        if ($ch === false) {
            throw new RuntimeException('Unable to start Google Apps Script request.');
        }

        // Apps Script accepts the POST, then 302s to a googleusercontent URL.
        // That second hop must be GET. Keeping POST on the redirect returns HTML.
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            CURLOPT_HTTPHEADER => ['Content-Type: text/plain;charset=utf-8'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 5,
            CURLOPT_TIMEOUT => 45,
        ]);

        $raw = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if ($raw === false) {
            throw new RuntimeException('Google Sheet request failed: ' . $error);
        }

        $decoded = json_decode($raw, true);
        if (!is_array($decoded)) {
            throw new RuntimeException('Google Sheet returned an invalid response. Open the /exec URL in a browser — it should show JSON, not a Google login page.');
        }

        if ($status >= 400 || empty($decoded['ok'])) {
            $message = (string) ($decoded['error'] ?? 'Google Sheet update failed.');
            if (($decoded['code'] ?? '') === 'slot_taken') {
                throw new InvalidArgumentException($message);
            }
            throw new RuntimeException($message);
        }

        return $decoded;
    }
}
