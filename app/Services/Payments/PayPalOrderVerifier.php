<?php

declare(strict_types=1);

namespace App\Services\Payments;

/**
 * GT-FORM-ROUTES-001: asks PayPal, server to server, what an order really is.
 *
 * The browser captures PayPal orders itself and then tells us the order id and
 * amount. Nothing it says about money is trusted: this class fetches the order
 * from the PayPal Orders v2 API and returns PayPal's own status and amount.
 *
 * Needs PAYPAL_REST_CLIENT_ID and PAYPAL_REST_SECRET in .env (PAYPAL_REST_MODE
 * = live or sandbox, default live). Without them every order is "not_configured"
 * and nothing gets credited.
 */
class PayPalOrderVerifier
{
    /** @var callable|null fn(string $method, string $url, array $options): array{status:int, body:string} */
    private $http;

    public function __construct(?callable $http = null)
    {
        $this->http = $http;
    }

    public static function configured(): bool
    {
        return (string) env('PAYPAL_REST_CLIENT_ID', '') !== '' && (string) env('PAYPAL_REST_SECRET', '') !== '';
    }

    private function base(): string
    {
        return strtolower((string) env('PAYPAL_REST_MODE', 'live')) === 'sandbox'
            ? 'https://api-m.sandbox.paypal.com'
            : 'https://api-m.paypal.com';
    }

    /** @return array{status:int, body:string} */
    private function send(string $method, string $url, array $options): array
    {
        if ($this->http !== null) {
            return ($this->http)($method, $url, $options);
        }
        $response = service('curlrequest', ['timeout' => 15, 'http_errors' => false])->request($method, $url, $options + ['http_errors' => false]);

        return ['status' => $response->getStatusCode(), 'body' => (string) $response->getBody()];
    }

    /**
     * @return array{ok: bool, reason: string, status?: string, amount?: float, currency?: string}
     */
    public function verify(string $orderId): array
    {
        if (! preg_match('/^[A-Z0-9]{8,32}$/', $orderId)) {
            return ['ok' => false, 'reason' => 'invalid_order_id'];
        }
        if (! self::configured()) {
            return ['ok' => false, 'reason' => 'not_configured'];
        }

        try {
            $token = $this->send('POST', $this->base() . '/v1/oauth2/token', [
                'auth'        => [(string) env('PAYPAL_REST_CLIENT_ID'), (string) env('PAYPAL_REST_SECRET')],
                'form_params' => ['grant_type' => 'client_credentials'],
                'headers'     => ['Accept' => 'application/json'],
            ]);
            $access = json_decode($token['body'], true)['access_token'] ?? null;
            if ($token['status'] !== 200 || ! is_string($access)) {
                return ['ok' => false, 'reason' => 'auth_failed'];
            }

            $order = $this->send('GET', $this->base() . '/v2/checkout/orders/' . $orderId, [
                'headers' => ['Authorization' => 'Bearer ' . $access, 'Accept' => 'application/json'],
            ]);
            if ($order['status'] === 404) {
                return ['ok' => false, 'reason' => 'not_found'];
            }
            $data = json_decode($order['body'], true);
            if ($order['status'] !== 200 || ! is_array($data)) {
                return ['ok' => false, 'reason' => 'lookup_failed'];
            }
        } catch (\Throwable $e) {
            log_message('error', 'PayPal order lookup failed: {m}', ['m' => $e->getMessage()]);

            return ['ok' => false, 'reason' => 'lookup_failed'];
        }

        $status = (string) ($data['status'] ?? '');
        $unit = $data['purchase_units'][0] ?? [];
        $capture = $unit['payments']['captures'][0] ?? null;
        $amount = (float) ($capture['amount']['value'] ?? $unit['amount']['value'] ?? 0);
        $currency = (string) ($capture['amount']['currency_code'] ?? $unit['amount']['currency_code'] ?? '');
        $captured = $status === 'COMPLETED' && is_array($capture) && ($capture['status'] ?? '') === 'COMPLETED';

        return [
            'ok'       => $captured && $amount > 0,
            'reason'   => $captured ? 'verified' : 'not_captured',
            'status'   => $status,
            'amount'   => $amount,
            'currency' => $currency,
        ];
    }
}
