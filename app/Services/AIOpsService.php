<?php

namespace App\Services;

class AIOpsService
{
    protected string $mode;
    protected string $baseUrl;
    protected string $appKey;
    protected string $sharedSecret;
    protected int $requestTimeout;

    public function __construct()
    {
        $this->mode = (string) env('AIOPS_MODE', 'remote');
        $this->baseUrl = rtrim((string) env('AIOPS_BASE_URL', 'https://aiops.timothyburks.com'), '/');
        $this->appKey = (string) env('AIOPS_APP_KEY', 'mymiwallet');
        $this->sharedSecret = (string) env('AIOPS_SHARED_SECRET', '');
        $this->requestTimeout = (int) env('AIOPS_REQUEST_TIMEOUT', '30');
    }

    public function generateCommandDefinition(string $text)
    {
        if ($this->baseUrl === '') {
            log_message('error', '[aiops] Missing AIOPS_BASE_URL environment value.');
            return null;
        }

        $payload = [
            'type' => 'spark_command',
            'text' => $text,
        ];

        $timestamp = (string) time();
        $signature = $this->buildSignature($text, $timestamp);
        $domain = (string) (env('AIOPS_DOMAIN') ?: parse_url((string) env('app.baseURL', ''), PHP_URL_HOST) ?: '');
        $environment = (string) env('CI_ENVIRONMENT', 'production');

        $headers = [
            'Content-Type: application/json',
            'X-App-Key: ' . $this->appKey,
            'X-App-Timestamp: ' . $timestamp,
            'X-App-Signature: ' . $signature,
        ];
        if ($domain !== '') {
            $headers[] = 'X-App-Domain: ' . $domain;
        }
        if ($environment !== '') {
            $headers[] = 'X-App-Environment: ' . $environment;
        }

        log_message('debug', '[aiops] Resolved endpoint config', [
            'base_url' => $this->baseUrl,
            'mode' => $this->mode,
            'app_key' => $this->appKey,
            'timeout' => $this->requestTimeout,
        ]);

        $ch = curl_init($this->baseUrl . '/generate-command');

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_TIMEOUT => $this->requestTimeout,
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

    private function buildSignature(string $text, string $timestamp): string
    {
        if ($this->sharedSecret === '') {
            return '';
        }

        return hash_hmac('sha256', $this->appKey . '.' . $timestamp . '.' . $text, $this->sharedSecret);
    }
}
