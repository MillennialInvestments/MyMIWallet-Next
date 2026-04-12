<?php

declare(strict_types=1);

namespace App\Libraries\ApiResearch;

class ApiReportWriter
{
    public function ensureDirectory(string $path): void
    {
        if (! is_dir($path)) {
            mkdir($path, 0775, true);
        }
    }

    public function slugify(string $value): string
    {
        $value = strtolower(trim($value));
        $value = preg_replace('/https?:\/\//', '', $value);
        $value = preg_replace('/^www\./', '', $value);
        $value = preg_replace('/[^a-z0-9]+/', '-', (string) $value);
        return trim((string) $value, '-');
    }

    public function timestamp(): string
    {
        return date('Ymd-His');
    }

    public function write(string $directory, string $filename, string $content): string
    {
        $this->ensureDirectory($directory);
        $fullPath = rtrim($directory, '/\\') . DIRECTORY_SEPARATOR . $filename;
        file_put_contents($fullPath, $content);
        return $fullPath;
    }

    public function writeJson(string $directory, string $filename, array $payload): string
    {
        $this->ensureDirectory($directory);
        $fullPath = rtrim($directory, '/\\') . DIRECTORY_SEPARATOR . $filename;
        file_put_contents($fullPath, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        return $fullPath;
    }

    public function readJsonFile(?string $path): array
    {
        if (empty($path) || ! is_file($path)) {
            return [];
        }

        $json = file_get_contents($path);
        $data = json_decode((string) $json, true);

        return is_array($data) ? $data : [];
    }

    public function writeDiffReport(string $providerSlug, array $diff): string
    {
        $dir = ROOTPATH . 'docs/APIs/diffs';
        $filename = $providerSlug . '-' . $this->timestamp() . '-diff.md';

        $lines = [];
        $lines[] = '# API Snapshot Diff';
        $lines[] = '';
        $lines[] = '- Provider: ' . $providerSlug;
        $lines[] = '- Old Run: ' . ($diff['old_run_id'] ?? 'N/A');
        $lines[] = '- New Run: ' . ($diff['new_run_id'] ?? 'N/A');
        $lines[] = '';

        $lines[] = '## New Endpoints';
        $lines[] = '';
        foreach (($diff['new_endpoints'] ?? []) as $item) {
            $lines[] = '- ' . $item;
        }
        if (empty($diff['new_endpoints'])) {
            $lines[] = '- None';
        }

        $lines[] = '';
        $lines[] = '## Removed Endpoints';
        $lines[] = '';
        foreach (($diff['removed_endpoints'] ?? []) as $item) {
            $lines[] = '- ' . $item;
        }
        if (empty($diff['removed_endpoints'])) {
            $lines[] = '- None';
        }

        $lines[] = '';
        $lines[] = '## Changed Endpoints';
        $lines[] = '';
        foreach (($diff['changed_endpoints'] ?? []) as $item) {
            $lines[] = '- ' . $item;
        }
        if (empty($diff['changed_endpoints'])) {
            $lines[] = '- None';
        }

        $lines[] = '';
        $lines[] = '## Auth Changes';
        $lines[] = '';
        foreach (($diff['auth_changes'] ?? []) as $item) {
            $lines[] = '- ' . $item;
        }
        if (empty($diff['auth_changes'])) {
            $lines[] = '- None';
        }

        return $this->write($dir, $filename, implode("\n", $lines));
    }
}