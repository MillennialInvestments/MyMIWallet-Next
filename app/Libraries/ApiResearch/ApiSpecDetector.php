<?php

declare(strict_types=1);

namespace App\Libraries\ApiResearch;

use Config\ApiResearch;
use Config\Services;

class ApiSpecDetector
{
    protected $config;

    public function __construct()
    {
        $config = config('ApiResearch');

        if (! $config instanceof ApiResearch) {
            $config = new ApiResearch();
        }

        $this->config = $config;
    }

    public function discover(string $startUrl, array $pages): array
    {
        $candidates = [];

        foreach ($pages as $page) {
            $url  = (string) ($page['url'] ?? '');
            $html = (string) ($page['html'] ?? '');
            $text = strtolower((string) ($page['text'] ?? ''));

            if ($url !== '' && $this->looksLikeSpecUrl($url)) {
                $candidates[] = [
                    'type' => $this->inferSpecType($url),
                    'url'  => $url,
                    'source' => 'page_url',
                ];
            }

            if ($html !== '') {
                preg_match_all('/https?:\/\/[^\s"\']+/i', $html, $matches);

                foreach (($matches[0] ?? []) as $matchUrl) {
                    if ($this->looksLikeSpecUrl($matchUrl)) {
                        $candidates[] = [
                            'type'   => $this->inferSpecType($matchUrl),
                            'url'    => $matchUrl,
                            'source' => 'page_html',
                        ];
                    }
                }
            }

            if (
                str_contains($text, 'openapi')
                || str_contains($text, 'swagger')
                || str_contains($text, 'postman')
                || str_contains($text, 'api-docs')
            ) {
                preg_match_all('/https?:\/\/[^\s"\']+/i', (string) $page['text'], $textUrls);

                foreach (($textUrls[0] ?? []) as $matchUrl) {
                    if ($this->looksLikeSpecUrl($matchUrl)) {
                        $candidates[] = [
                            'type'   => $this->inferSpecType($matchUrl),
                            'url'    => $matchUrl,
                            'source' => 'page_text',
                        ];
                    }
                }
            }
        }

        $guesses = $this->guessDefaultSpecUrls($startUrl);
        $candidates = array_merge($candidates, $guesses);

        return $this->validateCandidates($candidates);
    }

    protected function guessDefaultSpecUrls(string $startUrl): array
    {
        $base = parse_url($startUrl);

        if (! isset($base['scheme'], $base['host'])) {
            return [];
        }

        $root = $base['scheme'] . '://' . $base['host'];
        $urls = [];

        foreach ($this->config->candidateSpecFilenames as $file) {
            $urls[] = [
                'type'   => $this->inferSpecType($file),
                'url'    => $root . '/' . ltrim($file, '/'),
                'source' => 'guessed',
            ];

            $urls[] = [
                'type'   => $this->inferSpecType($file),
                'url'    => $root . '/docs/' . ltrim($file, '/'),
                'source' => 'guessed',
            ];

            $urls[] = [
                'type'   => $this->inferSpecType($file),
                'url'    => $root . '/developer/' . ltrim($file, '/'),
                'source' => 'guessed',
            ];
        }

        $urls[] = ['type' => 'openapi_json', 'url' => $root . '/v3/api-docs', 'source' => 'guessed'];
        $urls[] = ['type' => 'openapi_json', 'url' => $root . '/api-docs', 'source' => 'guessed'];

        return $urls;
    }

    protected function validateCandidates(array $candidates): array
    {
        $client = Services::curlrequest([
            'timeout'         => $this->config->defaultTimeout,
            'http_errors'     => false,
            'verify'          => true,
            'allow_redirects' => true,
            'headers'         => [
                'User-Agent' => $this->config->userAgent,
            ],
        ]);

        $valid = [];
        $seen  = [];

        foreach ($candidates as $candidate) {
            $url = (string) ($candidate['url'] ?? '');

            if ($url === '' || isset($seen[$url])) {
                continue;
            }

            $seen[$url] = true;

            try {
                $response = $client->get($url);
                $body = (string) $response->getBody();
                $status = $response->getStatusCode();

                if ($status >= 200 && $status < 400) {
                    $candidate['status_code'] = $status;
                    $candidate['content_type'] = $response->getHeaderLine('Content-Type');
                    $candidate['content'] = $body;
                    $valid[] = $candidate;
                }
            } catch (\Throwable $e) {
                // swallow and continue
            }
        }

        return $valid;
    }

    protected function looksLikeSpecUrl(string $url): bool
    {
        $u = strtolower($url);

        return str_contains($u, 'openapi')
            || str_contains($u, 'swagger')
            || str_contains($u, 'api-docs')
            || str_ends_with($u, '.yaml')
            || str_ends_with($u, '.yml')
            || str_ends_with($u, '.json')
            || str_contains($u, 'postman');
    }

    protected function inferSpecType(string $url): string
    {
        $u = strtolower($url);

        if (str_contains($u, 'postman')) {
            return 'postman';
        }
        if (str_ends_with($u, '.yaml') || str_ends_with($u, '.yml')) {
            return 'openapi_yaml';
        }

        return 'openapi_json';
    }
}