<?php

declare(strict_types=1);

namespace App\Integrations\Providers\AlphaVantage;

class AlphaVantageConfig
{
    public function __construct(
        public readonly string $baseUrl,
        public readonly string $apiKey,
        public readonly int $timeout,
        public readonly int $cacheTtl,
    ) {
    }
}
