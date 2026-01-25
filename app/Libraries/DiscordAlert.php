<?php

namespace App\Libraries;

class DiscordAlert
{
    public static function send(string $message): void
    {
        $webhook = env('DISCORD_ALERT_WEBHOOK');
        if (!$webhook) return;

        @file_get_contents($webhook, false, stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-Type: application/json\r\n",
                'content' => json_encode([
                    'content' => "🚨 **MyMI Wallet Alert**\n{$message}"
                ])
            ]
        ]));
    }
}
