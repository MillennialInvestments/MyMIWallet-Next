<?php

declare(strict_types=1);

namespace App\Commands\Support;

use App\Services\SubSystemManager;
use CodeIgniter\CLI\CLI;

trait SubsCommandTrait
{
    protected function mgr(): SubSystemManager
    {
        $m = new SubSystemManager();
        $m->ensureRuntimeDirs();
        return $m;
    }

    protected function optBool(string $key): bool
    {
        $val = CLI::getOption($key);

        if ($val === null && property_exists($this, 'params') && is_array($this->params)) {
            $val = $this->params[$key] ?? $this->params['--' . $key] ?? null;
        }

        return in_array(
            strtolower((string) ($val ?? '0')),
            ['1', 'true', 'yes', 'on'],
            true
        );
    }

    protected function optString(string $key, ?string $default = null): ?string
    {
        $val = CLI::getOption($key);
        if ($val === null || $val === false) {
            return $default;
        }

        return trim((string) $val);
    }

    protected function optInt(string $key, int $default = 0): int
    {
        $val = $this->optString($key);
        if ($val === null || $val === '') {
            return $default;
        }

        return (int) $val;
    }

    protected function emit(array $payload, bool $json): void
    {
        if ($json) {
            CLI::write(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            return;
        }
        CLI::write(($payload['message'] ?? $payload['status'] ?? 'ok'));
        CLI::write(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    protected function writeDoc(string $subdir, string $name, $body): string
    {
        $dir = ROOTPATH . 'docs/_aiops/' . trim($subdir, '/');
        @mkdir($dir, 0775, true);
        $path = $dir . '/' . $name;
        $content = is_string($body) ? $body : json_encode($body, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        file_put_contents($path, $content . "\n");
        return $path;
    }
}
