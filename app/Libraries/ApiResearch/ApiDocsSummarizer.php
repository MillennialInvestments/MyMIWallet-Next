<?php

declare(strict_types=1);

namespace App\Libraries\ApiResearch;

class ApiDocsSummarizer
{
    public function summarize(array $pages, string $startUrl): array
    {
        $combinedText = '';
        $urls = [];

        foreach ($pages as $page) {
            if (! empty($page['success']) && ! empty($page['text'])) {
                $combinedText .= "\n\n" . $page['text'];
                $urls[] = $page['url'];
            }
        }

        $combinedTextLower = strtolower($combinedText);

        return [
            'start_url' => $startUrl,
            'pages_scraped' => count($pages),
            'source_urls' => array_values(array_unique($urls)),
            'findings' => [
                'authentication' => $this->extractMatches($combinedText, [
                    'api key', 'bearer', 'oauth', 'token', 'authorization'
                ]),
                'base_urls' => $this->extractUrlLikeStrings($combinedText),
                'rate_limits' => $this->extractMatches($combinedText, [
                    'rate limit', 'requests per minute', 'requests per day', 'quota', 'throttle'
                ]),
                'pagination' => $this->extractMatches($combinedText, [
                    'pagination', 'page', 'cursor', 'limit', 'offset', 'next page'
                ]),
                'webhooks' => $this->extractMatches($combinedText, [
                    'webhook', 'callback', 'event delivery'
                ]),
                'formats' => $this->extractMatches($combinedText, [
                    'json', 'xml', 'rest', 'graphql', 'content-type'
                ]),
                'errors' => $this->extractMatches($combinedText, [
                    'error', 'status code', '401', '403', '404', '429', '500', 'retry'
                ]),
                'sandbox' => $this->extractMatches($combinedText, [
                    'sandbox', 'test environment', 'staging'
                ]),
                'sdk' => $this->extractMatches($combinedText, [
                    'php', 'javascript', 'python', 'sdk', 'client library'
                ]),
            ],
            'mymi_wallet_application_notes' => $this->buildMyMIWalletNotes($combinedTextLower),
            'raw_excerpt' => mb_substr($combinedText, 0, 8000),
        ];
    }

    protected function extractMatches(string $text, array $keywords): array
    {
        $sentences = preg_split('/(?<=[.!?])\s+/', $text) ?: [];
        $matches = [];

        foreach ($sentences as $sentence) {
            $lower = strtolower($sentence);

            foreach ($keywords as $keyword) {
                if (str_contains($lower, strtolower($keyword))) {
                    $matches[] = trim($sentence);
                    break;
                }
            }
        }

        return array_values(array_unique(array_slice($matches, 0, 20)));
    }

    protected function extractUrlLikeStrings(string $text): array
    {
        preg_match_all('/https?:\/\/[^\s"\']+/i', $text, $matches);
        return array_values(array_unique(array_slice($matches[0] ?? [], 0, 30)));
    }

    protected function buildMyMIWalletNotes(string $text): array
    {
        $notes = [];

        $notes[] = 'Use Services::curlrequest() or a dedicated library wrapper for endpoint calls in CI4.';
        $notes[] = 'Store credentials in .env, never hardcode keys in controllers or views.';
        $notes[] = 'Create a dedicated library under app/Libraries for this integration.';
        $notes[] = 'Add request/response logging to bf_error_logs or your unified logger for failures.';
        $notes[] = 'Use CRON-safe retry logic and rate limiting for batch ingestion.';

        if (str_contains($text, 'oauth')) {
            $notes[] = 'This integration likely requires OAuth token acquisition and token refresh storage.';
        }

        if (str_contains($text, 'api key')) {
            $notes[] = 'This integration likely supports simple API key auth via header or query parameter.';
        }

        if (str_contains($text, '429') || str_contains($text, 'rate limit')) {
            $notes[] = 'Implement throttle controls and queue/batch logic to stay under provider limits.';
        }

        if (str_contains($text, 'webhook')) {
            $notes[] = 'Add a webhook controller endpoint plus signature verification and event logging.';
        }

        if (str_contains($text, 'sandbox')) {
            $notes[] = 'Add separate .env values for sandbox and production endpoints.';
        }

        return $notes;
    }
}