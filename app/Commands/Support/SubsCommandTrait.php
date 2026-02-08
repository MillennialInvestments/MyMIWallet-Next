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
        return in_array((string) ($this->request->getOption($key) ?? '0'), ['1', 'true', 'yes'], true);
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
