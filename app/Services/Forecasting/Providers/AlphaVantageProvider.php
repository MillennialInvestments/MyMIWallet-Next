<?php

namespace App\Services\Forecasting\Providers;

use App\Services\Forecasting\MarketDataProviderInterface;
use CodeIgniter\HTTP\CURLRequest;

class AlphaVantageProvider implements MarketDataProviderInterface
{
    private CURLRequest $http;

    public function __construct(?CURLRequest $http = null)
    {
        $this->http = $http ?? service('curlrequest');
    }

    public function fetchTimeSeries(string $ticker, string $timeframe): array
    {
        $ticker = strtoupper(trim($ticker));
        $interval = $this->resolveInterval($timeframe);
        $isDaily = $interval === 'daily';

        $apiKey = config('APISettings')->alphaVantageApiKey ?? env('ALPHA_VANTAGE_KEY');
        if (! $apiKey) {
            return [
                'status' => 'error',
                'message' => 'Missing Alpha Vantage API key',
                'candles' => [],
                'latest' => ['price' => null, 'volume' => null],
            ];
        }

        $query = [
            'function' => $isDaily ? 'TIME_SERIES_DAILY' : 'TIME_SERIES_INTRADAY',
            'symbol'   => $ticker,
            'apikey'   => $apiKey,
        ];

        if (! $isDaily) {
            $query['interval'] = $interval;
            $query['outputsize'] = 'compact';
        }

        try {
            $response = $this->http->get('https://www.alphavantage.co/query', ['query' => $query]);
            $body = (string) $response->getBody();
        } catch (\Throwable $e) {
            log_message('error', 'FORECAST: AlphaVantage request failed: {msg}', ['msg' => $e->getMessage()]);
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
                'candles' => [],
                'latest' => ['price' => null, 'volume' => null],
            ];
        }

        if ($this->isRateLimited($body)) {
            log_message('warning', 'FORECAST: AlphaVantage rate limited for {ticker}', ['ticker' => $ticker]);
            return [
                'status' => 'rate_limited',
                'message' => 'Alpha Vantage rate limit reached',
                'candles' => [],
                'latest' => ['price' => null, 'volume' => null],
            ];
        }

        $payload = json_decode($body, true) ?? [];
        $seriesKey = $this->resolveSeriesKey($interval);

        if (! isset($payload[$seriesKey]) || ! is_array($payload[$seriesKey])) {
            $message = $payload['Error Message'] ?? $payload['Note'] ?? 'Unexpected Alpha Vantage payload';
            log_message('warning', 'FORECAST: AlphaVantage payload missing series for {ticker}: {msg}', [
                'ticker' => $ticker,
                'msg'    => $message,
            ]);
            return [
                'status' => 'error',
                'message' => $message,
                'candles' => [],
                'latest' => ['price' => null, 'volume' => null],
            ];
        }

        $candles = [];
        foreach ($payload[$seriesKey] as $time => $row) {
            $candles[] = [
                'time'   => $time,
                'open'   => (float) ($row['1. open'] ?? 0),
                'high'   => (float) ($row['2. high'] ?? 0),
                'low'    => (float) ($row['3. low'] ?? 0),
                'close'  => (float) ($row['4. close'] ?? 0),
                'volume' => (float) ($row['5. volume'] ?? 0),
            ];
        }

        log_message('info', 'FORECAST: AlphaVantage data received {ticker} {timeframe}', [
            'ticker' => $ticker,
            'timeframe' => $timeframe,
            'count' => count($candles),
        ]);

        usort($candles, static fn ($a, $b) => strcmp($a['time'], $b['time']));

        $latest = end($candles) ?: null;

        return [
            'status'  => 'ok',
            'candles' => $candles,
            'latest'  => [
                'price'  => $latest['close'] ?? null,
                'volume' => $latest['volume'] ?? null,
            ],
        ];
    }

    private function resolveInterval(string $timeframe): string
    {
        return match (strtolower($timeframe)) {
            '5m'  => '5min',
            '10m' => '10min',
            '15m' => '15min',
            '30m' => '30min',
            '1h', '60m' => '60min',
            '4h', '240m' => '60min',
            '1d', 'daily' => 'daily',
            default => '5min',
        };
    }

    private function resolveSeriesKey(string $interval): string
    {
        return $interval === 'daily'
            ? 'Time Series (Daily)'
            : sprintf('Time Series (%s)', $interval);
    }

    private function isRateLimited(string $body): bool
    {
        return stripos($body, 'Thank you for using Alpha Vantage!') !== false
            || stripos($body, 'premium@alphavantage.co') !== false;
    }
}
