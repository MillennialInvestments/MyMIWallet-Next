<?php

declare(strict_types=1);

namespace App\Services\Ops;

class AiOpsArtifactService
{
    /**
     * @param array<string,mixed> $payload
     */
    public function writeJson(string $relativePath, array $payload, bool $dryRun = false): ?string
    {
        $path = $this->resolve($relativePath);
        if ($dryRun) {
            return $path;
        }

        $dir = dirname($path);
        if (! is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }

        $encoded = json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        if ($encoded === false) {
            return null;
        }

        return file_put_contents($path, $encoded . PHP_EOL) === false ? null : $path;
    }

    public function writeMarkdown(string $relativePath, string $markdown, bool $dryRun = false): ?string
    {
        $path = $this->resolve($relativePath);
        if ($dryRun) {
            return $path;
        }

        $dir = dirname($path);
        if (! is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }

        return file_put_contents($path, rtrim($markdown) . PHP_EOL) === false ? null : $path;
    }

    public function resolve(string $relativePath): string
    {
        return rtrim(ROOTPATH, '/') . '/docs/_aiops/' . ltrim($relativePath, '/');
    }
}
