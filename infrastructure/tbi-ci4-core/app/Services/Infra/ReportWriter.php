<?php

declare(strict_types=1);

namespace App\Services\Infra;

class ReportWriter
{
    public function __construct(private readonly string $basePath)
    {
    }

    public function writeJson(string $name, array $payload): string
    {
        $this->ensureDir();
        $path = $this->basePath . '/' . $name;
        file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return $path;
    }

    public function writeMarkdown(string $name, string $contents): string
    {
        $this->ensureDir();
        $path = $this->basePath . '/' . $name;
        file_put_contents($path, $contents);

        return $path;
    }

    private function ensureDir(): void
    {
        if (! is_dir($this->basePath)) {
            mkdir($this->basePath, 0775, true);
        }
    }
}
