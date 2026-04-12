<?php

declare(strict_types=1);

namespace App\Libraries\ApiResearch;

class ApiExampleExtractor
{
    public function extract(array $pages): array
    {
        $examples = [
            'curl'       => [],
            'json'       => [],
            'javascript' => [],
            'php'        => [],
            'python'     => [],
        ];

        foreach ($pages as $page) {
            $text = (string) ($page['text'] ?? '');
            $url  = (string) ($page['url'] ?? '');

            preg_match_all('/curl\s+[^\n\r]+/i', $text, $curlMatches);
            foreach (($curlMatches[0] ?? []) as $match) {
                $examples['curl'][] = ['source_url' => $url, 'code' => trim($match)];
            }

            preg_match_all('/\{(?:[^{}]|(?R))*\}/', $text, $jsonMatches);
            foreach (array_slice(($jsonMatches[0] ?? []), 0, 10) as $match) {
                if ($this->looksLikeJson($match)) {
                    $examples['json'][] = ['source_url' => $url, 'code' => trim($match)];
                }
            }

            if (stripos($text, 'fetch(') !== false || stripos($text, 'axios.') !== false) {
                $examples['javascript'][] = ['source_url' => $url, 'code' => 'JavaScript example reference detected'];
            }

            if (stripos($text, 'curlrequest') !== false || stripos($text, 'guzzle') !== false) {
                $examples['php'][] = ['source_url' => $url, 'code' => 'PHP example reference detected'];
            }

            if (stripos($text, 'requests.') !== false) {
                $examples['python'][] = ['source_url' => $url, 'code' => 'Python requests example reference detected'];
            }
        }

        foreach ($examples as $key => $items) {
            $examples[$key] = array_slice($items, 0, 20);
        }

        return $examples;
    }

    protected function looksLikeJson(string $value): bool
    {
        json_decode($value, true);
        return json_last_error() === JSON_ERROR_NONE;
    }
}