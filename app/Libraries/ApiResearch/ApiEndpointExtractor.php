<?php

declare(strict_types=1);

namespace App\Libraries\ApiResearch;

class ApiEndpointExtractor
{
    /**
     * @return array<int, array<string, mixed>>
     */
    public function extractFromSpecs(array $parsedSpecs): array
    {
        $endpoints = [];

        foreach ($parsedSpecs as $spec) {
            $paths = $spec['paths'] ?? [];

            if (! is_array($paths)) {
                continue;
            }

            foreach ($paths as $path => $operations) {
                if (! is_array($operations)) {
                    continue;
                }

                foreach ($operations as $method => $operation) {
                    $methodUpper = strtoupper((string) $method);

                    if (! in_array($methodUpper, ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS', 'HEAD'], true)) {
                        continue;
                    }

                    $operation = is_array($operation) ? $operation : [];

                    $endpoints[] = [
                        'method'           => $methodUpper,
                        'path'             => (string) $path,
                        'operation_id'     => (string) ($operation['operationId'] ?? ''),
                        'summary'          => (string) ($operation['summary'] ?? ''),
                        'description'      => (string) ($operation['description'] ?? ''),
                        'tags'             => $operation['tags'] ?? [],
                        'parameters'       => $operation['parameters'] ?? [],
                        'request_body'     => $operation['requestBody'] ?? [],
                        'responses'        => $operation['responses'] ?? [],
                        'security'         => $operation['security'] ?? ($spec['security'] ?? []),
                        'rate_limit_notes' => '',
                        'example_request'  => '',
                        'example_response' => '',
                        'source'           => 'spec',
                    ];
                }
            }
        }

        return $this->uniqueEndpoints($endpoints);
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function extractFromPages(array $pages): array
    {
        $endpoints = [];

        foreach ($pages as $page) {
            $text = (string) ($page['text'] ?? '');
            $url  = (string) ($page['url'] ?? '');

            preg_match_all('/\b(GET|POST|PUT|PATCH|DELETE|OPTIONS|HEAD)\s+\/[A-Za-z0-9_\-\{\}\/\.\:\?=&]*/', $text, $matches);

            foreach (($matches[0] ?? []) as $raw) {
                if (preg_match('/\b(GET|POST|PUT|PATCH|DELETE|OPTIONS|HEAD)\s+([^\s]+)/', $raw, $parts)) {
                    $endpoints[] = [
                        'method'           => strtoupper((string) $parts[1]),
                        'path'             => (string) $parts[2],
                        'operation_id'     => '',
                        'summary'          => '',
                        'description'      => '',
                        'tags'             => [],
                        'parameters'       => [],
                        'request_body'     => [],
                        'responses'        => [],
                        'security'         => [],
                        'rate_limit_notes' => '',
                        'example_request'  => '',
                        'example_response' => '',
                        'source'           => 'page:' . $url,
                    ];
                }
            }

            preg_match_all('/curl\s+[^`]+/i', $text, $curlMatches);

            foreach (($curlMatches[0] ?? []) as $curlLine) {
                if (preg_match('/-X\s+(GET|POST|PUT|PATCH|DELETE|OPTIONS|HEAD)\s+[\'"]?([^\'"\s]+)/i', $curlLine, $parts)) {
                    $endpoints[] = [
                        'method'           => strtoupper((string) $parts[1]),
                        'path'             => (string) parse_url($parts[2], PHP_URL_PATH),
                        'operation_id'     => '',
                        'summary'          => '',
                        'description'      => '',
                        'tags'             => [],
                        'parameters'       => [],
                        'request_body'     => [],
                        'responses'        => [],
                        'security'         => [],
                        'rate_limit_notes' => '',
                        'example_request'  => $curlLine,
                        'example_response' => '',
                        'source'           => 'curl:' . $url,
                    ];
                }
            }
        }

        return $this->uniqueEndpoints($endpoints);
    }

    protected function uniqueEndpoints(array $endpoints): array
    {
        $seen = [];
        $clean = [];

        foreach ($endpoints as $endpoint) {
            $key = strtoupper((string) ($endpoint['method'] ?? '')) . ' ' . (string) ($endpoint['path'] ?? '');

            if ($key === ' ') {
                continue;
            }

            if (! isset($seen[$key])) {
                $seen[$key] = true;
                $clean[] = $endpoint;
            }
        }

        return $clean;
    }
}