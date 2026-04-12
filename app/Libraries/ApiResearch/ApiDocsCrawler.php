<?php

declare(strict_types=1);

namespace App\Libraries\ApiResearch;

use Config\ApiResearch;
use Config\Services;

class ApiDocsCrawler
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

    public function crawl(string $startUrl, ?string $restrictDomain = null, ?int $maxPages = null, ?int $maxDepth = null): array
    {
        $maxPages = $maxPages ?? $this->config->maxPages;
        $maxDepth = $maxDepth ?? $this->config->maxDepth;

        $visited = [];
        $queue   = [
            ['url' => $startUrl, 'depth' => 0],
        ];
        $results = [];

        $startHost = (string) parse_url($startUrl, PHP_URL_HOST);
        $allowedHost = $restrictDomain ?: $startHost;

        while (! empty($queue) && count($visited) < $maxPages) {
            $current = array_shift($queue);
            $url     = (string) ($current['url'] ?? '');
            $depth   = (int) ($current['depth'] ?? 0);

            if ($url === '' || isset($visited[$url])) {
                continue;
            }

            $visited[$url] = true;

            $page = $this->fetchPage($url);
            $page['depth'] = $depth;
            $results[] = $page;

            if (empty($page['success']) || $depth >= $maxDepth) {
                continue;
            }

            $links = $this->extractLinks((string) ($page['html'] ?? ''), $url);

            foreach ($links as $link) {
                $host = (string) parse_url($link, PHP_URL_HOST);

                if ($host !== $allowedHost) {
                    continue;
                }

                if (! $this->shouldFollowLink($link)) {
                    continue;
                }

                if (! isset($visited[$link])) {
                    $queue[] = [
                        'url'   => $link,
                        'depth' => $depth + 1,
                    ];
                }
            }
        }

        return $results;
    }

    protected function fetchPage(string $url): array
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

        try {
            $response = $client->get($url);
            $html     = (string) $response->getBody();
            $title    = $this->extractTitle($html);
            $text     = $this->htmlToText($html);

            return [
                'success'      => true,
                'url'          => $url,
                'status_code'  => $response->getStatusCode(),
                'content_type' => $response->getHeaderLine('Content-Type'),
                'title'        => $title,
                'html'         => mb_substr($html, 0, $this->config->maxContentCharsPerPage),
                'text'         => mb_substr($text, 0, $this->config->maxContentCharsPerPage),
                'error'        => null,
            ];
        } catch (\Throwable $e) {
            return [
                'success'      => false,
                'url'          => $url,
                'status_code'  => null,
                'content_type' => null,
                'title'        => null,
                'html'         => '',
                'text'         => '',
                'error'        => $e->getMessage(),
            ];
        }
    }

    public function extractLinks(string $html, string $baseUrl): array
    {
        $links = [];

        if ($html === '') {
            return $links;
        }

        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();

        if (! @ $dom->loadHTML($html)) {
            return $links;
        }

        $anchors = $dom->getElementsByTagName('a');

        foreach ($anchors as $anchor) {
            $href = trim((string) $anchor->getAttribute('href'));

            if (
                $href === ''
                || str_starts_with($href, '#')
                || str_starts_with($href, 'mailto:')
                || str_starts_with($href, 'javascript:')
            ) {
                continue;
            }

            $absolute = $this->toAbsoluteUrl($href, $baseUrl);

            if ($absolute !== null) {
                $links[] = $absolute;
            }
        }

        return array_values(array_unique($links));
    }

    protected function toAbsoluteUrl(string $href, string $baseUrl): ?string
    {
        if (filter_var($href, FILTER_VALIDATE_URL)) {
            return $href;
        }

        $base = parse_url($baseUrl);

        if (! isset($base['scheme'], $base['host'])) {
            return null;
        }

        $scheme = $base['scheme'];
        $host   = $base['host'];

        if (str_starts_with($href, '/')) {
            return $scheme . '://' . $host . $href;
        }

        $path = $base['path'] ?? '/';
        $dir  = rtrim(str_replace(basename($path), '', $path), '/');

        return $scheme . '://' . $host . ($dir !== '' ? $dir : '') . '/' . ltrim($href, '/');
    }

    protected function shouldFollowLink(string $url): bool
    {
        $path = strtolower((string) parse_url($url, PHP_URL_PATH));

        foreach ($this->config->blockedPathKeywords as $blocked) {
            if (str_contains($path, $blocked)) {
                return false;
            }
        }

        foreach ($this->config->allowedPathKeywords as $allowed) {
            if (str_contains($path, $allowed)) {
                return true;
            }
        }

        return false;
    }

    protected function extractTitle(string $html): ?string
    {
        if (preg_match('/<title>(.*?)<\/title>/is', $html, $matches)) {
            return trim(strip_tags($matches[1]));
        }

        return null;
    }

    protected function htmlToText(string $html): string
    {
        $html = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $html);
        $html = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $html);
        $text = strip_tags((string) $html);
        $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = preg_replace('/\s+/', ' ', $text);
        return trim((string) $text);
    }
}