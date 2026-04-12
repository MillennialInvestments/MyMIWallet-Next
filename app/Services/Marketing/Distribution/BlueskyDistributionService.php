<?php

namespace App\Services\Marketing\Distribution;

use Config\MarketingDistribution;
use GuzzleHttp\Client;

class BlueskyDistributionService
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
        $cfg = $this->config->bluesky;
        if (! (bool) ($cfg['enabled'] ?? false)) {
            return ['status' => 'skipped', 'error' => 'Bluesky disabled'];
        }

        $endpoint = rtrim((string) ($cfg['pds_endpoint'] ?? ''), '/');
        $identifier = (string) ($cfg['identifier'] ?? '');
        $password = (string) ($cfg['app_password'] ?? '');
        if ($endpoint === '' || $identifier === '' || $password === '') {
            return ['status' => 'failed', 'error' => 'Missing Bluesky credentials'];
        }

        $session = $this->createSession($endpoint, $identifier, $password);
        if (($session['status'] ?? '') !== 'success') {
            return $session;
        }

        $post = $this->createPost($endpoint, $session['accessJwt'], $session['did'], $payload);
        if (($post['status'] ?? '') !== 'success') {
            return $post;
        }

        return [
            'status' => 'sent',
            'external_id' => (string) ($post['response']['cid'] ?? ''),
            'external_uri' => (string) ($post['response']['uri'] ?? ''),
            'response' => $post['response'],
            'error' => null,
        ];
    }

    public function healthcheck(): array
    {
        $cfg = $this->config->bluesky;
        $endpoint = rtrim((string) ($cfg['pds_endpoint'] ?? ''), '/');

        if ($endpoint === '') {
            return ['status' => 'failed', 'error' => 'Missing Bluesky PDS endpoint'];
        }

        try {
            $response = $this->client->request('GET', $endpoint . '/xrpc/_health');
            return ['status' => 'success', 'code' => $response->getStatusCode()];
        } catch (\Throwable $e) {
            return ['status' => 'failed', 'error' => $e->getMessage()];
        }
    }

    private function createSession(string $endpoint, string $identifier, string $password): array
    {
        try {
            $response = $this->client->request('POST', $endpoint . '/xrpc/com.atproto.server.createSession', [
                'json' => ['identifier' => $identifier, 'password' => $password],
            ]);

            $json = json_decode((string) $response->getBody(), true);
            if (! is_array($json) || empty($json['accessJwt']) || empty($json['did'])) {
                return ['status' => 'failed', 'error' => 'Invalid Bluesky session response'];
            }

            return ['status' => 'success', 'accessJwt' => $json['accessJwt'], 'did' => $json['did'], 'response' => $json];
        } catch (\Throwable $e) {
            return ['status' => 'failed', 'error' => $e->getMessage()];
        }
    }

    private function createPost(string $endpoint, string $accessJwt, string $did, array $payload): array
    {
        $text = trim((string) ($payload['summary'] ?? $payload['title'] ?? 'Marketing update'));

        try {
            $response = $this->client->request('POST', $endpoint . '/xrpc/com.atproto.repo.createRecord', [
                'headers' => ['Authorization' => 'Bearer ' . $accessJwt],
                'json' => [
                    'repo' => $did,
                    'collection' => 'app.bsky.feed.post',
                    'record' => [
                        '$type' => 'app.bsky.feed.post',
                        'text' => $text,
                        'createdAt' => gmdate('c'),
                    ],
                ],
            ]);
            $json = json_decode((string) $response->getBody(), true);
            return ['status' => 'success', 'response' => is_array($json) ? $json : ['raw' => (string) $response->getBody()]];
        } catch (\Throwable $e) {
            return ['status' => 'failed', 'error' => $e->getMessage()];
        }
    }
}
