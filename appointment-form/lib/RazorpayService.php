<?php

declare(strict_types=1);

final class RazorpayService
{
    private string $keyId;
    private string $keySecret;
    private string $currency;
    private int $amountPaise;

    public function __construct(array $config)
    {
        $this->keyId = $config['razorpay_key_id'];
        $this->keySecret = $config['razorpay_key_secret'];
        $this->currency = $config['currency'];
        $this->amountPaise = (int) $config['amount_paise'];
    }

    public function keyId(): string
    {
        return $this->keyId;
    }

    public function amountPaise(): int
    {
        return $this->amountPaise;
    }

    public function currency(): string
    {
        return $this->currency;
    }

    /**
     * @param array<string, string> $notes
     * @return array{id:string,amount:int,currency:string}
     */
    public function createOrder(array $notes): array
    {
        if ($this->amountPaise < 100) {
            throw new RuntimeException('Razorpay amount must be at least 100 paise.');
        }

        $payload = [
            'amount' => $this->amountPaise,
            'currency' => $this->currency,
            'receipt' => 'er_' . bin2hex(random_bytes(6)),
            'payment_capture' => 1,
            'notes' => $notes,
        ];

        $response = $this->request('POST', 'https://api.razorpay.com/v1/orders', $payload);

        if (empty($response['id'])) {
            throw new RuntimeException('Razorpay did not return an order id.');
        }

        return [
            'id' => (string) $response['id'],
            'amount' => (int) ($response['amount'] ?? $this->amountPaise),
            'currency' => (string) ($response['currency'] ?? $this->currency),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function fetchOrder(string $orderId): array
    {
        return $this->request('GET', 'https://api.razorpay.com/v1/orders/' . rawurlencode($orderId));
    }

    public function verifySignature(string $orderId, string $paymentId, string $signature): void
    {
        $expected = hash_hmac('sha256', $orderId . '|' . $paymentId, $this->keySecret);

        if (!hash_equals($expected, $signature)) {
            throw new InvalidArgumentException('Payment signature mismatch.');
        }
    }

    /**
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    private function request(string $method, string $url, ?array $body = null): array
    {
        $ch = curl_init($url);
        if ($ch === false) {
            throw new RuntimeException('Unable to start Razorpay request.');
        }

        $headers = ['Content-Type: application/json'];
        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERPWD => $this->keyId . ':' . $this->keySecret,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_TIMEOUT => 30,
        ];

        if ($method === 'POST') {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = json_encode($body, JSON_UNESCAPED_SLASHES);
        }

        curl_setopt_array($ch, $options);
        $raw = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if ($raw === false) {
            throw new RuntimeException('Razorpay request failed: ' . $error);
        }

        $decoded = json_decode($raw, true);
        if (!is_array($decoded)) {
            throw new RuntimeException('Invalid Razorpay response.');
        }

        if ($status === 401) {
            throw new RuntimeException('Razorpay authentication failed. Check the API keys.');
        }

        if ($status >= 400) {
            $message = $decoded['error']['description'] ?? 'Razorpay request failed.';
            throw new RuntimeException((string) $message);
        }

        return $decoded;
    }
}
