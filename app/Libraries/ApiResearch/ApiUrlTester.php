<?php

declare(strict_types=1);

namespace App\Libraries\ApiResearch;

use Config\Services;

class ApiUrlTester
{
    public function test(string $url, string $method = 'GET', array $headers = [], ?string $body = null, int $timeout = 20): array
    {
        $client = Services::curlrequest([
            'timeout'         => $timeout,
            'http_errors'     => false,
            'verify'          => true,
            'allow_redirects' => true,
        ]);

        $started = microtime(true);

        try {
            $options = [
                'headers' => $headers,
            ];

            if ($body !== null && in_array(strtoupper($method), ['POST', 'PUT', 'PATCH', 'DELETE'], true)) {
                $options['body'] = $body;
            }

            $response = $client->request(strtoupper($method), $url, $options);
            $bodyText = (string) $response->getBody();
            $contentType = $response->getHeaderLine('Content-Type');

            return [
                'success'       => true,
                'status_code'   => $response->getStatusCode(),
                'duration_ms'   => (int) round((microtime(true) - $started) * 1000),
                'headers'       => $response->headers(),
                'content_type'  => $contentType,
                'body_preview'  => mb_substr($bodyText, 0, 2500),
                'json_detected' => $this->looksLikeJson($bodyText, $contentType),
                'auth_hint'     => $this->detectAuthHint($bodyText, $contentType),
            ];
        } catch (\Throwable $e) {
            return [
                'success'       => false,
                'status_code'   => null,
                'duration_ms'   => (int) round((microtime(true) - $started) * 1000),
                'headers'       => [],
                'content_type'  => null,
                'body_preview'  => '',
                'json_detected' => false,
                'auth_hint'     => 'Unknown due to request failure',
                'error'         => $e->getMessage(),
            ];
        }
    }

    protected function looksLikeJson(string $body, string $contentType): bool
    {
        if (stripos($contentType, 'json') !== false) {
            return true;
        }

        json_decode($body, true);
        return json_last_error() === JSON_ERROR_NONE;
    }

    protected function detectAuthHint(string $body, string $contentType): string
    {
        $text = strtolower($body . ' ' . $contentType);

        if (str_contains($text, 'bearer')) {
            return 'Possible Bearer token authentication';
        }
        if (str_contains($text, 'oauth')) {
            return 'Possible OAuth authentication';
        }
        if (str_contains($text, 'api key') || str_contains($text, 'apikey')) {
            return 'Possible API key authentication';
        }
        if (str_contains($text, 'unauthorized') || str_contains($text, 'forbidden')) {
            return 'Likely requires authentication';
        }

        return 'No obvious auth requirement detected';
    }
}