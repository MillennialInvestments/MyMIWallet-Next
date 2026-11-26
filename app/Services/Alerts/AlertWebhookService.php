<?php

declare(strict_types=1);

namespace App\Services\Alerts;

use App\Models\UserAlertWebhookModel;
use App\Models\UserIncomingAlertModel;

class AlertWebhookService
{
    protected UserAlertWebhookModel $webhookModel;
    protected UserIncomingAlertModel $alertModel;

    public function __construct(
        ?UserAlertWebhookModel $webhookModel = null,
        ?UserIncomingAlertModel $alertModel = null
    ) {
        $this->webhookModel = $webhookModel ?? new UserAlertWebhookModel();
        $this->alertModel   = $alertModel ?? new UserIncomingAlertModel();
        helper('premium');
    }

    /**
     * Resolve or create the user's primary webhook record.
     */
    public function getOrCreateWebhook(int $userId): array
    {
        $webhook = $this->webhookModel->getOrCreateWebhook($userId);
        if ($webhook) {
            $webhook['webhook_url'] = site_url('API/Alerts/webhook/' . $webhook['webhook_token']);
        }

        return $webhook ?: [
            'id'            => 0,
            'user_id'       => $userId,
            'webhook_token' => '',
            'webhook_url'   => site_url('API/Alerts/webhook/not-configured'),
            'name'          => 'Default Webhook',
            'provider'      => 'tradingview',
            'alert_count'   => 0,
        ];
    }

    /**
     * Regenerate user's webhook token.
     */
    public function regenerateWebhook(int $userId): array
    {
        $webhook = $this->webhookModel->regenerateToken($userId);
        if ($webhook) {
            $webhook['webhook_url'] = site_url('API/Alerts/webhook/' . $webhook['webhook_token']);
        }

        return $webhook ?: $this->getOrCreateWebhook($userId);
    }

    /**
     * Ingest an inbound alert payload using a webhook token.
     */
    public function ingestByToken(string $token, mixed $rawBody, array $postData = []): array
    {
        $webhook = $this->webhookModel->findByToken($token);
        if (! $webhook) {
            return ['ok' => false, 'status' => 'unauthorized', 'message' => 'Invalid or inactive webhook token'];
        }

        $userId = (int) $webhook['user_id'];
        $parsed = $this->parsePayload($rawBody, $postData, $webhook['provider'] ?? 'tradingview');

        if (empty($parsed['ticker'])) {
            return ['ok' => false, 'status' => 'invalid_payload', 'message' => 'Could not detect ticker symbol in payload'];
        }

        $isPremium = premium_feature_enabled('alerts.trade_alerts', $userId);

        $record = [
            'user_id'      => $userId,
            'webhook_id'   => (int) $webhook['id'],
            'provider'     => $parsed['provider'],
            'ticker'       => strtoupper(trim($parsed['ticker'])),
            'action'       => strtoupper(trim($parsed['action'] ?? 'ALERT')),
            'price'        => isset($parsed['price']) && is_numeric($parsed['price']) ? (float) $parsed['price'] : null,
            'entry_price'  => isset($parsed['entry_price']) && is_numeric($parsed['entry_price']) ? (float) $parsed['entry_price'] : null,
            'target_price' => isset($parsed['target_price']) && is_numeric($parsed['target_price']) ? (float) $parsed['target_price'] : null,
            'stop_loss'    => isset($parsed['stop_loss']) && is_numeric($parsed['stop_loss']) ? (float) $parsed['stop_loss'] : null,
            'strategy'     => substr((string) ($parsed['strategy'] ?? 'Webhook Signal'), 0, 100),
            'timeframe'    => substr((string) ($parsed['timeframe'] ?? ''), 0, 20),
            'message'      => (string) ($parsed['message'] ?? ''),
            'raw_payload'  => is_string($rawBody) ? $rawBody : json_encode($rawBody),
            'status'       => 'active',
        ];

        $insertedId = $this->alertModel->insert($record, true);
        $this->webhookModel->recordReceipt((int) $webhook['id']);

        // Free tier: keep only 5 latest alerts
        if (! $isPremium) {
            $this->alertModel->pruneFreeTier($userId, 5);
        }

        return [
            'ok'        => true,
            'status'    => 'accepted',
            'alert_id'  => $insertedId,
            'ticker'    => $record['ticker'],
            'action'    => $record['action'],
            'price'     => $record['price'],
            'is_premium'=> $isPremium,
        ];
    }

    /**
     * Get user alerts applying free vs premium tier limits.
     */
    public function getUserAlerts(int $userId, ?string $provider = null): array
    {
        $isPremium = premium_feature_enabled('alerts.trade_alerts', $userId);
        $limit     = $isPremium ? 50 : 5;

        return $this->alertModel->getForUser($userId, $limit, $provider);
    }

    /**
     * Normalizes diverse webhook formats into standard fields.
     */
    public function parsePayload(mixed $rawBody, array $postData, string $defaultProvider = 'tradingview'): array
    {
        $payload = [];

        if (is_string($rawBody) && trim($rawBody) !== '') {
            $decoded = json_decode($rawBody, true);
            if (is_array($decoded)) {
                $payload = $decoded;
            } else {
                // If text/plain, try line parsing or regex
                $payload = $this->parsePlainText($rawBody);
            }
        }

        if (empty($payload) && ! empty($postData)) {
            $payload = $postData;
        }

        $provider = (string) ($payload['provider'] ?? $defaultProvider);

        // Normalize ticker
        $ticker = $payload['ticker']
            ?? $payload['symbol']
            ?? $payload['stock']
            ?? $payload['pair']
            ?? null;

        if (! $ticker && isset($payload['message'])) {
            $ticker = $this->extractTickerFromText((string) $payload['message']);
        }

        // Normalize action / direction
        $action = strtoupper((string) (
            $payload['action']
            ?? $payload['direction']
            ?? $payload['side']
            ?? $payload['signal']
            ?? $payload['type']
            ?? $payload['alert']
            ?? 'ALERT'
        ));

        if (str_contains($action, 'BUY') || str_contains($action, 'LONG')) {
            $action = 'BUY';
        } elseif (str_contains($action, 'SELL') || str_contains($action, 'SHORT')) {
            $action = 'SELL';
        } elseif (str_contains($action, 'CALL')) {
            $action = 'CALL';
        } elseif (str_contains($action, 'PUT')) {
            $action = 'PUT';
        } elseif ($action === 'ALERT' && ! empty($payload['message'])) {
            if (preg_match('/\b(BUY|LONG)\b/i', (string) $payload['message'])) {
                $action = 'BUY';
            } elseif (preg_match('/\b(SELL|SHORT)\b/i', (string) $payload['message'])) {
                $action = 'SELL';
            } elseif (preg_match('/\bCALL\b/i', (string) $payload['message'])) {
                $action = 'CALL';
            } elseif (preg_match('/\bPUT\b/i', (string) $payload['message'])) {
                $action = 'PUT';
            }
        }

        // Normalize price
        $price = $payload['price']
            ?? $payload['close']
            ?? $payload['current_price']
            ?? $payload['last']
            ?? null;

        // Strategy / indicator
        $strategy = $payload['strategy']
            ?? $payload['indicator']
            ?? $payload['alert_name']
            ?? $payload['event']
            ?? 'Custom Alert';

        // Stop loss & target
        $stopLoss = $payload['stop_loss'] ?? $payload['stop'] ?? $payload['sl'] ?? null;
        $targetPrice = $payload['target_price'] ?? $payload['target'] ?? $payload['tp'] ?? $payload['take_profit'] ?? null;
        $entryPrice = $payload['entry_price'] ?? $payload['entry'] ?? null;
        $timeframe = $payload['timeframe'] ?? $payload['interval'] ?? $payload['tf'] ?? null;

        $message = $payload['message']
            ?? $payload['description']
            ?? $payload['comment']
            ?? ($ticker ? "{$action} signal on {$ticker}" : 'Signal received');

        return [
            'provider'     => $provider,
            'ticker'       => $ticker ? preg_replace('/[^A-Za-z0-9\/\.\-_]/', '', (string) $ticker) : null,
            'action'       => $action,
            'price'        => $price,
            'entry_price'  => $entryPrice,
            'target_price' => $targetPrice,
            'stop_loss'    => $stopLoss,
            'strategy'     => $strategy,
            'timeframe'    => $timeframe,
            'message'      => $message,
        ];
    }

    private function parsePlainText(string $text): array
    {
        $data = [];
        $lines = explode("\n", $text);
        foreach ($lines as $line) {
            $parts = explode(':', $line, 2);
            if (count($parts) === 2) {
                $data[trim(strtolower($parts[0]))] = trim($parts[1]);
            }
        }

        if (empty($data['ticker'])) {
            $data['ticker'] = $this->extractTickerFromText($text);
        }
        if (empty($data['message'])) {
            $data['message'] = $text;
        }

        return $data;
    }

    private function extractTickerFromText(string $text): ?string
    {
        // Matches $AAPL or AAPL or NVDA or SOL/USD
        if (preg_match('/\$([A-Za-z]{1,6})\b/', $text, $matches)) {
            return strtoupper($matches[1]);
        }
        if (preg_match('/\b([A-Za-z]{1,5}\/[A-Za-z]{3,4})\b/', $text, $matches)) {
            return strtoupper($matches[1]);
        }
        if (preg_match('/\b(BUY|SELL|CALL|PUT)\s+\$?([A-Za-z]{1,6})\b/i', $text, $matches)) {
            return strtoupper($matches[2]);
        }

        return null;
    }
}
