<?php

namespace App\Services\Marketing\Distribution;

use Config\MarketingDistribution;
use GuzzleHttp\Client;

class MastodonDistributionService
{
    public function __construct(
        private ?MarketingDistribution $config = null,
        private ?Client $client = null,
    ) {
        $this->config ??= config('MarketingDistribution');
        $this->client ??= new Client(['timeout' => 15]);
    }

    public function publish(array $payload): array
    {
        $cfg = $this->config->mastodon;
        if (! (bool) ($cfg['enabled'] ?? false)) {
            return ['status' => 'skipped', 'error' => 'Mastodon disabled'];
        }

        $baseUrl = rtrim((string) ($cfg['base_url'] ?? ''), '/');
        $token = (string) ($cfg['access_token'] ?? '');
        if ($baseUrl === '' || $token === '') {
            return ['status' => 'failed', 'error' => 'Missing Mastodon credentials'];
        }

        try {
            $response = $this->client->request('POST', $baseUrl . '/api/v1/statuses', [
                'headers' => ['Authorization' => 'Bearer ' . $token],
                'form_params' => [
                    'status' => trim((string) ($payload['summary'] ?? $payload['title'] ?? 'Marketing update')),
                    'visibility' => 'public',
                ],
            ]);

            $json = json_decode((string) $response->getBody(), true);
            return [
                'status' => 'sent',
                'external_id' => (string) ($json['id'] ?? ''),
                'external_uri' => (string) ($json['url'] ?? ''),
                'response' => is_array($json) ? $json : ['raw' => (string) $response->getBody()],
                'error' => null,
            ];
        } catch (\Throwable $e) {
            return ['status' => 'failed', 'error' => $e->getMessage()];
        }
    }

    public function healthcheck(): array
    {
        $cfg = $this->config->mastodon;
        $baseUrl = rtrim((string) ($cfg['base_url'] ?? ''), '/');
        $token = (string) ($cfg['access_token'] ?? '');

        if ($baseUrl === '' || $token === '') {
            return ['status' => 'failed', 'error' => 'Missing Mastodon config'];
        }

        try {
            $response = $this->client->request('GET', $baseUrl . '/api/v1/accounts/verify_credentials', [
                'headers' => ['Authorization' => 'Bearer ' . $token],
            ]);
            return ['status' => 'success', 'code' => $response->getStatusCode()];
        } catch (\Throwable $e) {
            return ['status' => 'failed', 'error' => $e->getMessage()];
        }
    }
}
