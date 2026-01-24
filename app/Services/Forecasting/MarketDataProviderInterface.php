<?php

namespace App\Services\Forecasting;

interface MarketDataProviderInterface
{
    /**
     * @return array{
     *   status: string,
     *   message?: string,
     *   candles: array<int, array{time:string, open:float, high:float, low:float, close:float, volume:float}>,
     *   latest: array{price: float|null, volume: float|null}|
     *           array<string, mixed>
     * }
     */
    public function fetchTimeSeries(string $ticker, string $timeframe): array;
}
