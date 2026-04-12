<?php

declare(strict_types=1);

namespace App\Libraries\ApiResearch;

class PostmanParser
{
    public function parse(array $specCandidate): array
    {
        $raw = (string) ($specCandidate['content'] ?? '');
        $parsed = json_decode($raw, true) ?: [];

        return [
            'spec_type'   => 'postman',
            'source_url'  => (string) ($specCandidate['url'] ?? ''),
            'title'       => (string) (($parsed['info']['name'] ?? 'Postman Collection')),
            'version'     => (string) (($parsed['info']['version'] ?? '')),
            'description' => (string) (($parsed['info']['description'] ?? '')),
            'collection'  => $parsed,
            'raw_content' => $raw,
            'parsed_json' => $parsed,
        ];
    }
}