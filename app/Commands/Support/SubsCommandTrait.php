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

    protected function emit(array $payload, bool $json): void
    {
        if ($json) {
            CLI::write(
                json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
            );

            return;
        }

        $headline = null;

        if (isset($payload['message']) && is_scalar($payload['message'])) {
            $headline = (string) $payload['message'];
        } elseif (isset($payload['status']) && is_scalar($payload['status'])) {
            $headline = (string) $payload['status'];
        } else {
            $headline = 'ok';
        }

        CLI::write($headline);
        CLI::write(
            json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );
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
