<?php

declare(strict_types=1);

namespace App\Services\AiOps;

use Config\AiOps;

class ManualRunNotifier
{
    public function __construct(private readonly AiOps $config)
    {
    }

    public function send(string $title, array $data = []): void
    {
        $webhook = $this->config->discordWebhook;
        if ($webhook === '') {
            return;
        }

        $lines = [];
        foreach ($data as $k => $v) {
            $lines[] = sprintf('**%s:** %s', $k, is_scalar($v) ? (string) $v : json_encode($v));
        }

        $payload = json_encode([
            'content' => "{$title}\n" . implode("\n", $lines),
        ]);

        $ch = curl_init($webhook);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_exec($ch);
        curl_close($ch);
    }
}
