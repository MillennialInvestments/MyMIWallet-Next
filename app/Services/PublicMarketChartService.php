<?php

declare(strict_types=1);

namespace App\Services;

class PublicMarketChartService
{
    private const CACHE_TTL = 45;

    public function getStockChart(string $symbol): array
    {
        $normalizedSymbol = $this->sanitizeEquitySymbol($symbol);
        if ($normalizedSymbol === '') {
            log_message('warning', 'PublicMarketChartService invalid stock symbol request: {symbol}', ['symbol' => $symbol]);
            return $this->errorResponse('stock', $symbol, 'Please provide a valid stock symbol.');
        }

        $cacheKey = $this->getCacheKey('stock', $normalizedSymbol);
        $cached = cache($cacheKey);
        if (is_array($cached)) {
            return $cached;
        }

        $url = sprintf(
            'https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=%s&interval=5min&outputsize=compact&apikey=%s',
            rawurlencode($normalizedSymbol),
            rawurlencode((string) env('ALPHAVANTAGE_KEY', ''))
        );

        $json = $this->fetchJson($url);
        if ($json === null) {
            $fallback = cache($cacheKey);
            if (is_array($fallback)) {
                return $fallback;
            }

            return $this->errorResponse('stock', $normalizedSymbol, 'Chart data is temporarily unavailable. Please try again shortly.');
        }

        $normalized = $this->normalizeAlphaVantageCandles($json, $normalizedSymbol, 'stock');
        cache()->save($cacheKey, $normalized, self::CACHE_TTL);

        return $normalized;
    }

    public function getEtfChart(string $symbol): array
    {
        $normalizedSymbol = $this->sanitizeEquitySymbol($symbol);
        if ($normalizedSymbol === '') {
            log_message('warning', 'PublicMarketChartService invalid ETF symbol request: {symbol}', ['symbol' => $symbol]);
            return $this->errorResponse('etf', $symbol, 'Please provide a valid ETF symbol.');
        }

        $cacheKey = $this->getCacheKey('etf', $normalizedSymbol);
        $cached = cache($cacheKey);
        if (is_array($cached)) {
            return $cached;
        }

        $url = sprintf(
            'https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=%s&interval=5min&outputsize=compact&apikey=%s',
            rawurlencode($normalizedSymbol),
            rawurlencode((string) env('ALPHAVANTAGE_KEY', ''))
        );

        $json = $this->fetchJson($url);
        if ($json === null) {
            $fallback = cache($cacheKey);
            if (is_array($fallback)) {
                return $fallback;
            }

            return $this->errorResponse('etf', $normalizedSymbol, 'Chart data is temporarily unavailable. Please try again shortly.');
        }

        $normalized = $this->normalizeAlphaVantageCandles($json, $normalizedSymbol, 'etf');
        cache()->save($cacheKey, $normalized, self::CACHE_TTL);

        return $normalized;
    }

    public function getCryptoChart(string $symbol): array
    {
        $normalizedSymbol = $this->sanitizeCryptoSymbol($symbol);
        if ($normalizedSymbol === '') {
            log_message('warning', 'PublicMarketChartService invalid crypto symbol request: {symbol}', ['symbol' => $symbol]);
            return $this->errorResponse('crypto', $symbol, 'Please provide a valid crypto symbol.');
        }

        $cacheKey = $this->getCacheKey('crypto', $normalizedSymbol);
        $cached = cache($cacheKey);
        if (is_array($cached)) {
            return $cached;
        }

        $url = sprintf(
            'https://api.coingecko.com/api/v3/coins/%s/market_chart?vs_currency=usd&days=1&interval=minutely',
            rawurlencode($normalizedSymbol)
        );

        $json = $this->fetchJson($url);
        if ($json === null) {
            $fallback = cache($cacheKey);
            if (is_array($fallback)) {
                return $fallback;
            }

            return $this->errorResponse('crypto', $normalizedSymbol, 'Chart data is temporarily unavailable. Please try again shortly.');
        }

        $normalized = $this->normalizeCoinGeckoSeries($json, $normalizedSymbol);
        cache()->save($cacheKey, $normalized, self::CACHE_TTL);

        return $normalized;
    }

    protected function fetchJson(string $url): ?array
    {
        $ch = curl_init();
        if ($ch === false) {
            log_message('error', 'PublicMarketChartService transport failure while initializing cURL for URL: {url}', ['url' => $url]);
            return null;
        }

        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_TIMEOUT => 20,
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
            ],
            CURLOPT_USERAGENT => 'MyMIWallet-PublicPreview/1.0',
        ]);

        $body = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if (! is_string($body) || $body === '' || $status >= 400) {
            log_message('warning', 'PublicMarketChartService transport failure status={status} error={error} url={url}', [
                'status' => $status,
                'error' => $error,
                'url' => $url,
            ]);
            return null;
        }

        $decoded = json_decode($body, true);
        if (! is_array($decoded)) {
            log_message('warning', 'PublicMarketChartService invalid payload (JSON decode failed) url={url}', ['url' => $url]);
            return null;
        }

        return $decoded;
    }

    protected function normalizeAlphaVantageCandles(array $json, string $symbol, string $type): array
    {
        if (isset($json['Note']) && is_string($json['Note'])) {
            log_message('warning', 'PublicMarketChartService AlphaVantage API limit hit for {type}:{symbol}', [
                'type' => $type,
                'symbol' => $symbol,
            ]);

            return $this->errorResponse(
                $type,
                $symbol,
                'Chart data is temporarily limited due to API usage limits. Please try again shortly.'
            );
        }

        if (isset($json['Error Message']) && is_string($json['Error Message'])) {
            log_message('warning', 'PublicMarketChartService AlphaVantage invalid payload for {type}:{symbol} message={message}', [
                'type' => $type,
                'symbol' => $symbol,
                'message' => $json['Error Message'],
            ]);
            return $this->errorResponse($type, $symbol, 'No chart data was found for this symbol.');
        }

        $seriesBlock = $json['Time Series (5min)'] ?? null;
        if (! is_array($seriesBlock) || $seriesBlock === []) {
            log_message('warning', 'PublicMarketChartService AlphaVantage invalid payload for {type}:{symbol} (missing time series)', [
                'type' => $type,
                'symbol' => $symbol,
            ]);

            return $this->errorResponse($type, $symbol, 'No chart data was found for this symbol.');
        }

        $series = [];
        foreach ($seriesBlock as $time => $candle) {
            if (! is_array($candle)) {
                continue;
            }

            $timestamp = strtotime((string) $time);
            if ($timestamp === false) {
                continue;
            }

            $series[] = [
                'time' => $timestamp,
                'open' => (float) ($candle['1. open'] ?? 0),
                'high' => (float) ($candle['2. high'] ?? 0),
                'low' => (float) ($candle['3. low'] ?? 0),
                'close' => (float) ($candle['4. close'] ?? 0),
            ];
        }

        usort($series, static fn(array $a, array $b): int => $a['time'] <=> $b['time']);

        if ($series === []) {
            log_message('warning', 'PublicMarketChartService empty normalized series for {type}:{symbol}', [
                'type' => $type,
                'symbol' => $symbol,
            ]);
            return $this->errorResponse($type, $symbol, 'No chart data was found for this symbol.');
        }

        return [
            'status' => 'success',
            'type' => $type,
            'symbol' => $symbol,
            'series' => $series,
            'meta' => [
                'source' => 'alphavantage',
                'interval' => '5min',
                'lastRefreshed' => $json['Meta Data']['3. Last Refreshed'] ?? null,
                'timezone' => $json['Meta Data']['6. Time Zone'] ?? null,
            ],
        ];
    }

    protected function normalizeCoinGeckoSeries(array $json, string $symbol): array
    {
        $prices = $json['prices'] ?? null;
        if (! is_array($prices) || $prices === []) {
            log_message('warning', 'PublicMarketChartService CoinGecko invalid payload for crypto:{symbol}', ['symbol' => $symbol]);
            return $this->errorResponse('crypto', $symbol, 'No chart data was found for this asset.');
        }

        $series = [];
        foreach ($prices as $point) {
            if (! is_array($point) || count($point) < 2) {
                continue;
            }

            $timestamp = (int) floor(((int) $point[0]) / 1000);
            $series[] = [
                'time' => $timestamp,
                'value' => (float) $point[1],
            ];
        }

        usort($series, static fn(array $a, array $b): int => $a['time'] <=> $b['time']);

        if ($series === []) {
            log_message('warning', 'PublicMarketChartService empty normalized series for crypto:{symbol}', ['symbol' => $symbol]);
            return $this->errorResponse('crypto', $symbol, 'No chart data was found for this asset.');
        }

        return [
            'status' => 'success',
            'type' => 'crypto',
            'symbol' => $symbol,
            'series' => $series,
            'meta' => [
                'source' => 'coingecko',
                'vsCurrency' => 'usd',
                'points' => count($series),
            ],
        ];
    }

    protected function getCacheKey(string $type, string $symbol): string
    {
        return 'preview_chart_' . strtolower($type) . '_' . strtolower($symbol);
    }

    private function sanitizeEquitySymbol(string $symbol): string
    {
        return strtoupper((string) preg_replace('/[^A-Za-z0-9\.\-]/', '', $symbol));
    }

    private function sanitizeCryptoSymbol(string $symbol): string
    {
        return strtolower((string) preg_replace('/[^a-z0-9\-]/', '', strtolower($symbol)));
    }

    private function errorResponse(string $type, string $symbol, string $message): array
    {
        return [
            'status' => 'error',
            'message' => $message,
            'type' => $type,
            'symbol' => $symbol,
            'series' => [],
        ];
    }
}
