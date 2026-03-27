<?php

declare(strict_types=1);

namespace App\Services;

class LogAnalyzerService
{
    /**
     * @return array{path:string, exists:bool, size:int}
     */
    public function inspect(string $path): array
    {
        return [
            'path' => $path,
            'exists' => is_file($path),
            'size' => is_file($path) ? (int) filesize($path) : 0,
        ];
    }
}
