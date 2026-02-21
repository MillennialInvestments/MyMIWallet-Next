<?php

declare(strict_types=1);

namespace App\Services\AIOps;

class ObservabilityStateService
{
    public function load(string $path = 'docs/_aiops/state.json'): array
    {
        $full = ROOTPATH . ltrim($path, '/');
        if (! is_file($full)) {
            return [];
        }

        $json = file_get_contents($full);
        $data = is_string($json) ? json_decode($json, true) : null;

        return is_array($data) ? $data : [];
    }

    public function save(array $state, string $path = 'docs/_aiops/state.json'): string
    {
        $full = ROOTPATH . ltrim($path, '/');
        $this->ensureDir(dirname($full));
        file_put_contents($full, json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);

        $audit = WRITEPATH . 'audit/observability_state.json';
        $this->ensureDir(dirname($audit));
        file_put_contents($audit, json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);

        return $full;
    }

    private function ensureDir(string $dir): void
    {
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }
    }
}
