<?php
namespace App\Libraries;

class MyMIESportsStartGG
{
    public function verifySignature(array $headers, string $payload): bool
    {
        $secret = env('ESPORTS_WEBHOOK_SECRET', '');
        if ($secret === '') {
            return false;
        }

        $header = $headers['X-Startgg-Signature']
            ?? $headers['x-startgg-signature']
            ?? $headers['X-Hub-Signature-256']
            ?? $headers['x-hub-signature-256']
            ?? null;

        if (! is_string($header)) {
            return false;
        }

        $provided = preg_replace('/^sha256=/i', '', trim($header));
        $expected = hash_hmac('sha256', $payload, $secret);

        return hash_equals($expected, $provided);
    }

    public function parseEventPayload(string $payload): array
    {
        $decoded = json_decode($payload, true);
        if (! is_array($decoded)) {
            return [];
        }

        $eventId = $decoded['event_id']
            ?? ($decoded['event']['id'] ?? null)
            ?? ($decoded['data']['event']['id'] ?? null);

        $status = $decoded['status']
            ?? ($decoded['event']['status'] ?? null)
            ?? ($decoded['data']['event']['state'] ?? null)
            ?? 'completed';

        $winners = $decoded['winners'] ?? [];
        if (empty($winners) && isset($decoded['data']['event']['standings']['nodes'])) {
            $winners = $decoded['data']['event']['standings']['nodes'];
        }

        return [
            'event_id' => $eventId,
            'status'   => is_string($status) ? strtolower($status) : 'completed',
            'winners'  => $winners,
            'raw'      => $decoded,
        ];
    }

    public function getWinners(array $payload): array
    {
        $winners = [];

        if (isset($payload['winners']) && is_array($payload['winners'])) {
            $candidates = $payload['winners'];
        } elseif (isset($payload['standings']['nodes']) && is_array($payload['standings']['nodes'])) {
            $candidates = $payload['standings']['nodes'];
        } elseif (isset($payload['raw']['data']['event']['standings']['nodes'])) {
            $candidates = $payload['raw']['data']['event']['standings']['nodes'];
        } else {
            $candidates = [];
        }

        foreach ($candidates as $node) {
            if (! is_array($node)) {
                continue;
            }

            $userId = $node['user_id']
                ?? $node['entrant']['id']
                ?? $node['player']['id']
                ?? null;

            $amount = $node['amount_cents']
                ?? $node['prize']['value'] ?? 0;

            $currency = $node['currency']
                ?? $node['prize']['currency'] ?? 'MyMIGold';

            if ($userId === null) {
                continue;
            }

            $winners[] = [
                'user_id'      => (int) $userId,
                'amount_cents' => (int) $amount,
                'currency'     => $currency,
                'placement'    => $node['placement'] ?? $node['standing'] ?? null,
            ];
        }

        return $winners;
    }
}