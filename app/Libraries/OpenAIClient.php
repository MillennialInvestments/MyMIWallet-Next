<?php

namespace App\Libraries;

use App\Libraries\AiOpsGuard;
use App\Libraries\CostTracker;

class OpenAIClient
{
    public function chat(array $payload): array
    {
        $settings = config('SiteSettings');

        // 1️⃣ Master switch
        if (!($settings->aiOpenAiApiEnabled ?? false)) {
            return [
                'ok' => false,
                'error' => 'openai_api_disabled',
                'raw' => null,
            ];
        }

        // 2️⃣ Guard flag (cost ceiling auto-disable)
        $guard = new AiOpsGuard();
        if ($guard->isDisabled()) {
            return [
                'ok' => false,
                'error' => 'aiops_disabled_by_guard',
                'raw' => null,
            ];
        }

        $apiKey = env('OPENAI_API_KEY');
        if (!$apiKey) {
            return [
                'ok' => false,
                'error' => 'OPENAI_API_KEY not set',
                'raw' => null,
            ];
        }

        // 3️⃣ Rate limiting (prevent burst)
        usleep(500000); // 0.5s pause

        $apiUrl = env('OPENAI_API_URL') 
            ?: (config('Codex')->apiUrl ?? 'https://api.openai.com/v1/chat/completions');

        $ch = curl_init($apiUrl);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_HTTPHEADER     => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $apiKey,
            ],
            CURLOPT_POSTFIELDS     => json_encode($payload),
            CURLOPT_CONNECTTIMEOUT => 15,
            CURLOPT_TIMEOUT        => 180,
        ]);

        $raw = curl_exec($ch);
        $err = curl_error($ch);
        $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($raw === false) {
            return [
                'ok' => false,
                'error' => 'curl_error: ' . $err,
                'raw' => null,
                'http' => $http,
            ];
        }

        $decoded = json_decode($raw, true);

        if (!is_array($decoded)) {
            return [
                'ok' => false,
                'error' => 'invalid_json_response',
                'raw' => $raw,
                'http' => $http,
            ];
        }

        if ($http >= 400) {
            return [
                'ok' => false,
                'error' => $decoded['error']['message'] ?? ('http_' . $http),
                'raw' => $decoded,
                'http' => $http,
            ];
        }

        // 4️⃣ Token usage logging
        $usage = $decoded['usage'] ?? [];
        if (!empty($usage)) {
            $tracker = new CostTracker();
            $tracker->log($usage, $payload['model'] ?? 'unknown');
        }

        return [
            'ok' => true,
            'data' => $decoded,
            'raw' => $raw,
            'http' => $http,
        ];
    }
}
