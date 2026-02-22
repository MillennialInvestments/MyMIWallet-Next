<?php

declare(strict_types=1);

namespace App\Services\Scanning\Providers;

use CodeIgniter\HTTP\CURLRequest;

class AlphaVantageProvider implements MarketDataProviderInterface
{
    public function __construct(private readonly CURLRequest $http)
    {
    }

    public function getName(): string
    {
        return 'alpha';
    }

    public function isAvailable(): bool
    {
        return (bool) (config('APISettings')->alphaVantageApiKey ?? env('ALPHA_VANTAGE_KEY'));
    }

    public function fetchCandles(string $symbol, string $timeframe, int $limit = 200): array
    {
        $interval = $this->interval($timeframe);
        $daily = $interval === 'daily';
        $apiKey = config('APISettings')->alphaVantageApiKey ?? env('ALPHA_VANTAGE_KEY');
        if (! $apiKey) {
            return ['status' => 'error', 'message' => 'missing key', 'candles' => []];
        }

        $query = [
            'function' => $daily ? 'TIME_SERIES_DAILY' : 'TIME_SERIES_INTRADAY',
            'symbol' => strtoupper($symbol),
            'apikey' => $apiKey,
        ];
        if (! $daily) {
            $query['interval'] = $interval;
            $query['outputsize'] = 'compact';
        }

        $res = $this->http->get('https://www.alphavantage.co/query', ['query' => $query]);
        $body = (string) $res->getBody();
        if (stripos($body, 'Thank you for using Alpha Vantage') !== false) {
            return ['status' => 'rate_limited', 'message' => 'AlphaVantage limit', 'candles' => []];
        }
        $payload = json_decode($body, true) ?? [];
        $seriesKey = $daily ? 'Time Series (Daily)' : sprintf('Time Series (%s)', $interval);
        $series = $payload[$seriesKey] ?? null;
        if (! is_array($series)) {
            return ['status' => 'error', 'message' => 'invalid payload', 'candles' => [], 'raw' => $payload];
        }

        $candles = [];
        foreach ($series as $time => $row) {
            $candles[] = [
                'time' => $time,
                'open' => (float) ($row['1. open'] ?? 0),
                'high' => (float) ($row['2. high'] ?? 0),
                'low' => (float) ($row['3. low'] ?? 0),
                'close' => (float) ($row['4. close'] ?? 0),
                'volume' => (float) ($row['5. volume'] ?? 0),
            ];
        }
        usort($candles, static fn(array $a, array $b): int => strcmp((string) $a['time'], (string) $b['time']));
        return ['status' => 'ok', 'candles' => array_slice($candles, -$limit), 'raw' => $payload];
    }

    private function interval(string $timeframe): string
    {
        return match (strtolower($timeframe)) {
            '1m', '1min' => '1min',
            '5m', '5min' => '5min',
            '15m', '15min' => '15min',
            default => 'daily',
        };
    }
}
