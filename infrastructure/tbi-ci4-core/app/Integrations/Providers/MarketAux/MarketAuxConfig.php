<?php

declare(strict_types=1);

namespace App\Integrations\Providers\MarketAux;

class MarketAuxConfig
{
    public function __construct(
        public readonly string $baseUrl,
        public readonly string $apiToken,
        public readonly int $timeout,
        public readonly int $cacheTtl,
    ) {
    }
}
