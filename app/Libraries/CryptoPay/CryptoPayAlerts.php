<?php

declare(strict_types=1);

namespace App\Libraries\CryptoPay;

/**
 * Dispatches operational alerts for crypto checkout events:
 * reconcile failures, late payments, underpayments, and endpoint network refusals.
 * Posts to env-configured webhook (CRYPTO_PAY_ALERT_WEBHOOK or DISCORD_ALERT_WEBHOOK).
 * When unconfigured or disabled, logs notices safely without throwing.
 */
final class CryptoPayAlerts
{
    /** @var list<array{type: string, title: string, details: string, meta: array}> In-memory recording for tests */
    public static array $dispatched = [];

    public static function notify(string $title, string $details, array $meta = []): bool
    {
        self::$dispatched[] = [
            'type'    => 'generic',
            'title'   => $title,
            'details' => $details,
            'meta'    => $meta,
        ];

        $webhook = env('CRYPTO_PAY_ALERT_WEBHOOK') ?: env('DISCORD_ALERT_WEBHOOK');
        if (! $webhook) {
            log_message('notice', 'CryptoPayAlert: {title} - {details}', ['title' => $title, 'details' => $details, 'meta' => $meta]);
            return false;
        }

        $msg = sprintf("⚠️ **CryptoPay Alert: %s**\n%s", $title, $details);
        if ($meta !== []) {
            $msg .= "\n```json\n" . json_encode($meta, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n```";
        }

        try {
            $ch = curl_init((string) $webhook);
            curl_setopt_array($ch, [
                CURLOPT_POST           => true,
                CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
                CURLOPT_POSTFIELDS     => json_encode(['content' => $msg]),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT        => 3,
            ]);
            $res = curl_exec($ch);
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            return $code >= 200 && $code < 300;
        } catch (\Throwable $e) {
            log_message('warning', 'CryptoPayAlert webhook failed: {m}', ['m' => $e->getMessage()]);
            return false;
        }
    }

    public static function reconcileFailure(string $ref, string $error): bool
    {
        return self::notify('Reconcile Failure', "Reconciliation error for checkout reference {$ref}: {$error}", [
            'type'      => 'reconcile_failure',
            'reference' => $ref,
            'error'     => $error,
        ]);
    }

    public static function latePayment(string $ref, string $paymentId, int $receivedAmount): bool
    {
        return self::notify('Late Payment', "Payment {$paymentId} arrived after checkout {$ref} expired; transferred to manual support queue", [
            'type'       => 'late_payment',
            'reference'  => $ref,
            'payment_id' => $paymentId,
            'amount'     => $receivedAmount,
        ]);
    }

    public static function underpayment(string $ref, int $received, int $expected, string $chain): bool
    {
        return self::notify('Underpayment Detected', "Underpayment on {$chain} for checkout {$ref}: received {$received}, expected {$expected}", [
            'type'      => 'underpayment',
            'reference' => $ref,
            'chain'     => $chain,
            'received'  => $received,
            'expected'  => $expected,
        ]);
    }

    public static function endpointRefusal(string $chain, string $endpoint, string $reason): bool
    {
        return self::notify('Endpoint Refusal', "RPC/API endpoint {$endpoint} refused for chain {$chain}: {$reason}", [
            'type'     => 'endpoint_refusal',
            'chain'    => $chain,
            'endpoint' => $endpoint,
            'reason'   => $reason,
        ]);
    }

    public static function reset(): void
    {
        self::$dispatched = [];
    }
}
