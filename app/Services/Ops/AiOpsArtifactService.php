<?php

namespace App\Services\Ops;

class AiOpsArtifactService
{
    public function writeJson(string $relativePath, array $payload): string
    {
        $path = rtrim(ROOTPATH, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . ltrim($relativePath, DIRECTORY_SEPARATOR);
        $dir = dirname($path);
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);

        return $path;
    }
}
