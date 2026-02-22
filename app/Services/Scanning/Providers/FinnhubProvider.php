<?php

declare(strict_types=1);

namespace App\Services\Scanning\Providers;

use CodeIgniter\HTTP\CURLRequest;

class FinnhubProvider implements MarketDataProviderInterface
{
    public function __construct(private readonly CURLRequest $http)
    {
    }

    public function getName(): string
    {
        return 'finnhub';
    }

    public function isAvailable(): bool
    {
        return (bool) env('FINNHUB_API_KEY');
    }

    public function fetchCandles(string $symbol, string $timeframe, int $limit = 200): array
    {
        $key = env('FINNHUB_API_KEY');
        if (! $key) {
            return ['status' => 'error', 'message' => 'missing key', 'candles' => []];
        }
        $resolution = match (strtolower($timeframe)) {
            '1m', '1min' => '1',
            '5m', '5min' => '5',
            '15m', '15min' => '15',
            default => 'D',
        };
        $to = time();
        $from = $to - 86400 * 90;
        $res = $this->http->get('https://finnhub.io/api/v1/stock/candle', [
            'query' => ['symbol' => strtoupper($symbol), 'resolution' => $resolution, 'from' => $from, 'to' => $to, 'token' => $key],
        ]);
        $payload = json_decode((string) $res->getBody(), true) ?? [];
        if (($payload['s'] ?? '') !== 'ok') {
            return ['status' => 'error', 'message' => 'invalid payload', 'candles' => [], 'raw' => $payload];
        }
        $candles = [];
        foreach ($payload['t'] as $i => $t) {
            $candles[] = [
                'time' => gmdate('Y-m-d H:i:s', (int) $t),
                'open' => (float) ($payload['o'][$i] ?? 0),
                'high' => (float) ($payload['h'][$i] ?? 0),
                'low' => (float) ($payload['l'][$i] ?? 0),
                'close' => (float) ($payload['c'][$i] ?? 0),
                'volume' => (float) ($payload['v'][$i] ?? 0),
            ];
        }
        return ['status' => 'ok', 'candles' => array_slice($candles, -$limit), 'raw' => $payload];
    }
}
