<?php

namespace App\Services;

class AIOpsService
{
    protected $endpoint;

    public function __construct()
    {
        $this->endpoint = env('AIOPS_ENDPOINT');
    }

    public function generateCommandDefinition(string $text)
    {
        if (! $this->endpoint) {
            log_message('error', '[aiops] Missing AIOPS_ENDPOINT environment value.');
            return null;
        }

        $payload = [
            'type' => 'spark_command',
            'text' => $text,
        ];

        $ch = curl_init($this->endpoint . '/generate-command');

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_POSTFIELDS => json_encode($payload),
        ]);

        $response = curl_exec($ch);
        if ($response === false) {
            log_message('error', '[aiops] Request failed: ' . curl_error($ch));
            curl_close($ch);
            return null;
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode >= 400) {
            log_message('error', sprintf('[aiops] Endpoint returned HTTP %d: %s', $httpCode, $response));
            return null;
        }

        $decoded = json_decode($response, true);
        if (! is_array($decoded)) {
            log_message('error', '[aiops] Invalid JSON response: ' . $response);
            return null;
        }

        return $decoded;
    }
}
