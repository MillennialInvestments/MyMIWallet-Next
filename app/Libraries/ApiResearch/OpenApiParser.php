<?php

declare(strict_types=1);

namespace App\Libraries\ApiResearch;

class OpenApiParser
{
    public function parse(array $specCandidate): array
    {
        $raw = (string) ($specCandidate['content'] ?? '');
        $type = (string) ($specCandidate['type'] ?? 'openapi_json');
        $sourceUrl = (string) ($specCandidate['url'] ?? '');

        $parsed = [];

        if ($type === 'openapi_yaml') {
            $parsed = $this->parseYaml($raw);
        } else {
            $parsed = json_decode($raw, true) ?: [];
        }

        if (! is_array($parsed)) {
            $parsed = [];
        }

        $info = $parsed['info'] ?? [];
        $servers = $parsed['servers'] ?? [];
        $paths = $parsed['paths'] ?? [];
        $components = $parsed['components'] ?? [];
        $security = $parsed['security'] ?? [];

        return [
            'spec_type'   => $type,
            'source_url'  => $sourceUrl,
            'title'       => (string) ($info['title'] ?? ''),
            'version'     => (string) ($info['version'] ?? ''),
            'description' => (string) ($info['description'] ?? ''),
            'servers'     => is_array($servers) ? $servers : [],
            'paths'       => is_array($paths) ? $paths : [],
            'components'  => is_array($components) ? $components : [],
            'security'    => is_array($security) ? $security : [],
            'raw_content' => $raw,
            'parsed_json' => $parsed,
        ];
    }

    protected function parseYaml(string $yaml): array
    {
        if (class_exists(\Symfony\Component\Yaml\Yaml::class)) {
            try {
                return \Symfony\Component\Yaml\Yaml::parse($yaml) ?: [];
            } catch (\Throwable $e) {
                return [];
            }
        }

        return [];
    }
}