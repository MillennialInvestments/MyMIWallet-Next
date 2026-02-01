<?php

declare(strict_types=1);

namespace App\Services\AiOps;

use App\Libraries\DiscordAlert;
use App\Services\MailService;
use Config\Email;

class CommandHookService
{
    public function notify(string $subject, string $message, array $payload = []): array
    {
        $webhook = env('DISCORD_ALERT_WEBHOOK');
        if ($webhook) {
            DiscordAlert::send($message);
            return ['ok' => true, 'channel' => 'discord'];
        }

        $recipients = $this->resolveRecipients();
        if ($recipients === []) {
            return ['ok' => false, 'channel' => 'none', 'error' => 'No notification recipients configured'];
        }

        $html = $this->renderEmail($subject, $message, $payload);
        $mailer = new MailService();
        $result = $mailer->send(implode(',', $recipients), $subject, $html, [
            'module' => 'aiops',
            'text' => $message,
        ]);

        return [
            'ok' => (bool) ($result['ok'] ?? false),
            'channel' => 'email',
            'error' => $result['error'] ?? null,
        ];
    }

    /**
     * @return array<int, string>
     */
    private function resolveRecipients(): array
    {
        $envRecipients = trim((string) env('AIOPS_ALERT_EMAIL'));
        if ($envRecipients !== '') {
            return array_values(array_filter(array_map('trim', explode(',', $envRecipients))));
        }

        $config = new Email();
        $configRecipients = trim((string) $config->recipients);
        if ($configRecipients !== '') {
            return array_values(array_filter(array_map('trim', explode(',', $configRecipients))));
        }

        return [];
    }

    private function renderEmail(string $subject, string $message, array $payload): string
    {
        $payloadBlock = $payload === []
            ? ''
            : '<pre style="background:#f5f5f5;padding:12px;border-radius:4px;">' .
                htmlspecialchars(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)) .
                '</pre>';

        return sprintf(
            '<h2>%s</h2><p>%s</p>%s',
            htmlspecialchars($subject),
            nl2br(htmlspecialchars($message)),
            $payloadBlock
        );
    }
}
