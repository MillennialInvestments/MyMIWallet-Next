<?php

declare(strict_types=1);

namespace App\Services\Scanning\Providers;

interface MarketDataProviderInterface
{
    public function getName(): string;

    /**
     * @return array{status:string,candles:array<int,array<string,mixed>>,message?:string,raw?:array<string,mixed>}
     */
    public function fetchCandles(string $symbol, string $timeframe, int $limit = 200): array;

    public function isAvailable(): bool;
}
