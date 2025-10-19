<?php

declare(strict_types=1);

namespace App\Libraries;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use RuntimeException;

/**
 * Lightweight Scrapemax API client to replace the abandoned vendor package.
 */
class ScrapemaxClient
{
    private ClientInterface $http;
    private string $apiKey;

    public function __construct(string $baseUri, string $apiKey, ?ClientInterface $http = null)
    {
        $this->http   = $http ?? new Client([
            'base_uri'    => rtrim($baseUri, '/') . '/',
            'timeout'     => 15,
            'http_errors' => false,
        ]);
        $this->apiKey = $apiKey;
    }

    /**
     * Proxy a scrape request to the Scrapemax API.
     *
     * @param array{__endpoint?:string} $payload
     *
     * @return array<mixed>
     */
    public function scrape(array $payload): array
    {
        $endpoint = $payload['__endpoint'] ?? 'scrape';
        unset($payload['__endpoint']);

        try {
            $response = $this->http->request('POST', ltrim($endpoint, '/'), [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->apiKey,
                ],
                'json'    => $payload,
            ]);
        } catch (GuzzleException $e) {
            throw new RuntimeException('Scrapemax request failed: ' . $e->getMessage(), 0, $e);
        }

        $statusCode = $response->getStatusCode();
        $body       = (string) $response->getBody();
        $decoded    = json_decode($body, true);

        if ($statusCode >= 400) {
            $message = is_array($decoded) ? ($decoded['message'] ?? 'Scrapemax API error') : $body;
            throw new RuntimeException(sprintf('Scrapemax API responded with %d: %s', $statusCode, $message));
        }

        if (! is_array($decoded)) {
            throw new RuntimeException('Scrapemax API returned an unexpected payload.');
        }

        return $decoded;
    }
}
