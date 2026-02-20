<?php

namespace App\Services;

class SlackWebhookService
{
    public function notify(string $message): bool
    {
        $url = (string) env('SLACK_WEBHOOK');
        if ($url === '') {
            log_message('warning', '[slack-webhook] Missing SLACK_WEBHOOK env value.');
            return false;
        }

        $payload = json_encode(['text' => $message]);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($response === false) {
            log_message('error', '[slack-webhook] Notify failed: ' . $error);
            return false;
        }

        return true;
    }
}
