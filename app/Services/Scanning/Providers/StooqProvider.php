<?php

declare(strict_types=1);

namespace App\Services\Scanning\Providers;

use CodeIgniter\HTTP\CURLRequest;

class StooqProvider implements MarketDataProviderInterface
{
    public function __construct(private readonly CURLRequest $http)
    {
    }

    public function getName(): string
    {
        return 'stooq';
    }

    public function isAvailable(): bool
    {
        return true;
    }

    public function fetchCandles(string $symbol, string $timeframe, int $limit = 200): array
    {
        if (! in_array(strtolower($timeframe), ['1d', '1day', 'daily'], true)) {
            return ['status' => 'error', 'message' => 'stooq daily only', 'candles' => []];
        }
        $url = 'https://stooq.com/q/d/l/?s=' . strtolower($symbol) . '.us&i=d';
        $res = $this->http->get($url);
        $csv = trim((string) $res->getBody());
        if ($csv === '' || str_starts_with($csv, 'No data')) {
            return ['status' => 'error', 'message' => 'no data', 'candles' => []];
        }
        $lines = explode("\n", $csv);
        array_shift($lines);
        $candles = [];
        foreach ($lines as $line) {
            $parts = str_getcsv($line);
            if (count($parts) < 6) {
                continue;
            }
            $candles[] = [
                'time' => $parts[0],
                'open' => (float) $parts[1],
                'high' => (float) $parts[2],
                'low' => (float) $parts[3],
                'close' => (float) $parts[4],
                'volume' => (float) $parts[5],
            ];
        }
        return ['status' => 'ok', 'candles' => array_slice($candles, -$limit)];
    }
}
