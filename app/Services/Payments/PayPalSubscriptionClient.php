<?php

declare(strict_types=1);

namespace App\Services\Payments;

/**
 * Server-to-server calls for PayPal Subscriptions: look a subscription up,
 * cancel it, and check that a webhook really came from PayPal.
 *
 * Uses the same keys as PayPalOrderVerifier (PAYPAL_REST_CLIENT_ID,
 * PAYPAL_REST_SECRET, PAYPAL_REST_MODE). Webhook checks also need
 * PAYPAL_WEBHOOK_ID, the id PayPal shows for the webhook in the developer
 * dashboard. Without it every webhook is refused.
 */
class PayPalSubscriptionClient
{
    /** @var callable|null fn(string $method, string $url, array $options): array{status:int, body:string} */
    private $http;

    public function __construct(?callable $http = null)
    {
        $this->http = $http;
    }

    public static function webhookConfigured(): bool
    {
        return PayPalOrderVerifier::configured() && (string) env('PAYPAL_WEBHOOK_ID', '') !== '';
    }

    /** The PayPal billing plan id for one of our plans, or '' when not set. */
    public static function planId(string $slug): string
    {
        $slug = strtoupper((string) preg_replace('/[^A-Za-z0-9]/', '', $slug));

        return $slug === '' ? '' : trim((string) env('PAYPAL_PLAN_ID_' . $slug, ''));
    }

    /**
     * @return array{ok:bool, reason:string, status?:string, plan_id?:string, custom_id?:string, last_payment_amount?:float, last_payment_currency?:string, last_payment_time?:string}
     */
    public function getSubscription(string $subscriptionId): array
    {
        if (! preg_match('/^I-[A-Z0-9]{6,32}$/', $subscriptionId)) {
            return ['ok' => false, 'reason' => 'invalid_subscription_id'];
        }
        if (! PayPalOrderVerifier::configured()) {
            return ['ok' => false, 'reason' => 'not_configured'];
        }

        try {
            $access = $this->token();
            if ($access === null) {
                return ['ok' => false, 'reason' => 'auth_failed'];
            }
            $response = $this->send('GET', $this->base() . '/v1/billing/subscriptions/' . $subscriptionId, [
                'headers' => ['Authorization' => 'Bearer ' . $access, 'Accept' => 'application/json'],
            ]);
            if ($response['status'] === 404) {
                return ['ok' => false, 'reason' => 'not_found'];
            }
            $data = json_decode($response['body'], true);
            if ($response['status'] !== 200 || ! is_array($data)) {
                return ['ok' => false, 'reason' => 'lookup_failed'];
            }
        } catch (\Throwable $e) {
            log_message('error', 'PayPal subscription lookup failed: {m}', ['m' => $e->getMessage()]);

            return ['ok' => false, 'reason' => 'lookup_failed'];
        }

        $last = $data['billing_info']['last_payment'] ?? [];

        return [
            'ok'                    => true,
            'reason'                => 'found',
            'status'                => (string) ($data['status'] ?? ''),
            'plan_id'               => (string) ($data['plan_id'] ?? ''),
            'custom_id'             => (string) ($data['custom_id'] ?? ''),
            'last_payment_amount'   => (float) ($last['amount']['value'] ?? 0),
            'last_payment_currency' => (string) ($last['amount']['currency_code'] ?? ''),
            'last_payment_time'     => (string) ($last['time'] ?? ''),
        ];
    }

    public function cancel(string $subscriptionId, string $reason = 'Cancelled by member'): bool
    {
        if (! preg_match('/^I-[A-Z0-9]{6,32}$/', $subscriptionId) || ! PayPalOrderVerifier::configured()) {
            return false;
        }

        try {
            $access = $this->token();
            if ($access === null) {
                return false;
            }
            $response = $this->send('POST', $this->base() . '/v1/billing/subscriptions/' . $subscriptionId . '/cancel', [
                'headers' => ['Authorization' => 'Bearer ' . $access, 'Content-Type' => 'application/json'],
                'body'    => json_encode(['reason' => mb_substr($reason, 0, 120)]),
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'PayPal subscription cancel failed: {m}', ['m' => $e->getMessage()]);

            return false;
        }

        // 204 = cancelled now; 422 = PayPal says it is already cancelled or expired.
        return in_array($response['status'], [204, 422], true);
    }

    /**
     * Asks PayPal whether this webhook delivery is genuine.
     *
     * @param array<string,string> $headers lower-case header name => value
     */
    public function verifyWebhook(array $headers, string $rawBody): bool
    {
        if (! self::webhookConfigured()) {
            return false;
        }
        $need = ['paypal-auth-algo', 'paypal-cert-url', 'paypal-transmission-id', 'paypal-transmission-sig', 'paypal-transmission-time'];
        foreach ($need as $name) {
            if (trim((string) ($headers[$name] ?? '')) === '') {
                return false;
            }
        }
        if (! is_array(json_decode($rawBody, true))) {
            return false;
        }

        // The event must be passed back byte for byte, so it is spliced in rather than re-encoded.
        $envelope = json_encode([
            'auth_algo'         => $headers['paypal-auth-algo'],
            'cert_url'          => $headers['paypal-cert-url'],
            'transmission_id'   => $headers['paypal-transmission-id'],
            'transmission_sig'  => $headers['paypal-transmission-sig'],
            'transmission_time' => $headers['paypal-transmission-time'],
            'webhook_id'        => (string) env('PAYPAL_WEBHOOK_ID'),
        ], JSON_UNESCAPED_SLASHES);
        $body = substr((string) $envelope, 0, -1) . ',"webhook_event":' . $rawBody . '}';

        try {
            $access = $this->token();
            if ($access === null) {
                return false;
            }
            $response = $this->send('POST', $this->base() . '/v1/notifications/verify-webhook-signature', [
                'headers' => ['Authorization' => 'Bearer ' . $access, 'Content-Type' => 'application/json'],
                'body'    => $body,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'PayPal webhook verification failed: {m}', ['m' => $e->getMessage()]);

            return false;
        }

        return $response['status'] === 200
            && (json_decode($response['body'], true)['verification_status'] ?? '') === 'SUCCESS';
    }

    private function token(): ?string
    {
        $token = $this->send('POST', $this->base() . '/v1/oauth2/token', [
            'auth'        => [(string) env('PAYPAL_REST_CLIENT_ID'), (string) env('PAYPAL_REST_SECRET')],
            'form_params' => ['grant_type' => 'client_credentials'],
            'headers'     => ['Accept' => 'application/json'],
        ]);
        $access = json_decode($token['body'], true)['access_token'] ?? null;

        return $token['status'] === 200 && is_string($access) ? $access : null;
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
}
