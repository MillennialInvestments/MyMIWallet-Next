<?php

declare(strict_types=1);

namespace App\Services\Ops;

class DreamHostService
{
    private string $apiKey;

    public function __construct()
    {
        $this->apiKey = (string) env('DREAMHOST_API_KEY', '');
    }

    /** @return array<string,mixed> */
    public function listEmailAccounts(): array
    {
        return $this->request('email-list_users');
    }

    /** @return array<string,mixed> */
    public function listDomains(): array
    {
        return $this->request('domain-list_domains');
    }

    /** @return array<string,mixed> */
    public function listDns(): array
    {
        return $this->request('dns-list_records');
    }

    /** @return array<string,mixed> */
    public function limits(): array
    {
        return [
            'api_key_configured' => $this->apiKey !== '',
            'rate_limit_note' => 'DreamHost API does not publicly expose per-key limit endpoint; apply client-side throttling.',
            'mail_send_limit_note' => 'Check DreamHost panel and SMTP response headers for send throttles.',
        ];
    }

    /** @return array<string,mixed> */
    private function request(string $cmd): array
    {
        if ($this->apiKey === '') {
            return ['ok' => false, 'error' => 'Missing DREAMHOST_API_KEY'];
        }

        $url = 'https://api.dreamhost.com/?key=' . rawurlencode($this->apiKey)
            . '&cmd=' . rawurlencode($cmd)
            . '&format=json';

        $raw = @file_get_contents($url);
        if (! is_string($raw) || $raw === '') {
            return ['ok' => false, 'error' => 'Request failed', 'cmd' => $cmd];
        }

        $decoded = json_decode($raw, true);
        if (! is_array($decoded)) {
            return ['ok' => false, 'error' => 'Invalid JSON response', 'cmd' => $cmd];
        }

        return ['ok' => true, 'cmd' => $cmd, 'data' => $decoded];
    }
}
