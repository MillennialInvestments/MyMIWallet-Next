<?php

declare(strict_types=1);

namespace App\Services;

class AiopsService
{
    /**
     * @return array<string, mixed>
     */
    public function statusSnapshot(): array
    {
        return [
            'timestamp' => date(DATE_ATOM),
            'php_version' => PHP_VERSION,
            'memory_usage' => memory_get_usage(true),
            'memory_peak' => memory_get_peak_usage(true),
        ];
    }
}
