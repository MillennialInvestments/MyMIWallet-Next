<?php

namespace App\Services\Marketing\Distribution;

use Config\MarketingDistribution;
use GuzzleHttp\Client;

class WebhookDistributionService
{
    public function __construct(
        private ?MarketingDistribution $config = null,
        private ?Client $client = null,
    ) {
        $this->config ??= config('MarketingDistribution');
        $this->client ??= new Client();
    }

    public function publish(array $payload): array
    {
        $cfg = $this->config->webhook;
        if (! (bool) ($cfg['enabled'] ?? false)) {
            return ['status' => 'skipped', 'error' => 'Webhook destination disabled'];
        }

        $endpoint = (string) ($cfg['endpoint_url'] ?? '');
        if ($endpoint === '') {
            return ['status' => 'failed', 'error' => 'Webhook endpoint URL missing'];
        }

        try {
            $response = $this->client->request('POST', $endpoint, [
                'timeout' => (int) ($cfg['timeout_seconds'] ?? 10),
                'headers' => (array) ($cfg['headers'] ?? []),
                'json' => $payload,
            ]);

            $body = (string) $response->getBody();
            $json = json_decode($body, true);

            return [
                'status' => 'sent',
                'response' => is_array($json) ? $json : ['raw' => $body],
                'external_id' => (string) ($response->getHeaderLine('X-Request-Id') ?: ''),
                'external_uri' => $endpoint,
                'error' => null,
            ];
        } catch (\Throwable $e) {
            return ['status' => 'failed', 'error' => $e->getMessage()];
        }
    }
}
