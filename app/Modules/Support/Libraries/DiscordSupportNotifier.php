<?php

namespace App\Modules\Support\Libraries;

class DiscordSupportNotifier
{
    public function notify(int $ticketId, array $data): bool
    {
        $webhookUrl = (string) env('SUPPORT_DISCORD_WEBHOOK_URL', '');
        if ($webhookUrl === '') {
            return false;
        }

        $payload = [
            'content' => sprintf(
                "🚨 Auth exception ticket #%d\nEmail: %s\nUser ID: %s\nIP: %s\nError: %s",
                $ticketId,
                $data['email'] ?? 'n/a',
                $data['user_id'] ?? 'n/a',
                $data['ip_address'] ?? 'n/a',
                mb_substr((string) ($data['error_message'] ?? 'unknown'), 0, 200)
            ),
        ];

        try {
            service('curlrequest')->post($webhookUrl, ['json' => $payload, 'timeout' => 5]);
            return true;
        } catch (\Throwable $e) {
            log_message('error', '[SUPPORT] Discord notify failed: {message}', ['message' => $e->getMessage()]);
            return false;
        }
    }
}
