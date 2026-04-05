<?php

namespace App\Services\Marketing;

class SourceFinderService
{
    /**
     * Basic source finder using GNews when configured.
     * Returns first matching article metadata.
     */
    public function findSource(string $text): array
    {
        $query = trim(implode(' ', array_slice(preg_split('/\s+/', strip_tags($text)) ?: [], 0, 12)));
        if ($query === '') {
            return ['source_url' => null, 'source_title' => null];
        }

        $apiKey = (string) env('GNEWS_API_KEY', '');
        if ($apiKey === '') {
            return ['source_url' => null, 'source_title' => null];
        }

        $url = 'https://gnews.io/api/v4/search?q=' . rawurlencode($query) . '&lang=en&max=1&apikey=' . rawurlencode($apiKey);

        try {
            $response = service('curlrequest')->get($url, ['timeout' => 12, 'http_errors' => false]);
            $decoded = json_decode((string) $response->getBody(), true);
            $article = $decoded['articles'][0] ?? null;
            if (!is_array($article)) {
                return ['source_url' => null, 'source_title' => null];
            }

            return [
                'source_url' => $article['url'] ?? null,
                'source_title' => $article['title'] ?? null,
            ];
        } catch (\Throwable $e) {
            log_message('error', 'SourceFinderService::findSource failed: ' . $e->getMessage());
            return ['source_url' => null, 'source_title' => null];
        }
    }
}
