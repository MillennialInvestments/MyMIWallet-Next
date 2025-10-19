<?php 
namespace App\Libraries;

use Config\APIs;
use CodeIgniter\HTTP\CURLRequest;

class MyMIAlphaVantage
{
    protected $apiKey;
    protected $client;
    protected $twelveDataKey;
    protected $marketstackKey;
    protected $alphaKeys = [];
    protected $alphaKeyIndex = 0;

    public function __construct()
    {
        $config = config('APIs');

        $envKeyList = getenv('ALPHA_VANTAGE_API_KEYS');
        $parsedEnvKeys = [];
        if (!empty($envKeyList)) {
            $parsedEnvKeys = array_map('trim', explode(',', $envKeyList));
        }

        $knownKeys = array_filter([
            getenv('ALPHA_VANTAGE_API_KEY') ?: null,
            getenv('ALPHA_VANTAGE_API_KEY_A') ?: null,
            getenv('ALPHA_VANTAGE_API_KEY_B') ?: null,
            getenv('ALPHA_VANTAGE_API_KEY_C') ?: null,
            getenv('ALPHA_VANTAGE_API_KEY_D') ?: null,
            getenv('ALPHA_VANTAGE_API_KEY_E') ?: null,
            $config->alphaVantageApiKey ?? null,
            $config->alphaVantageApiKeyA ?? null,
            $config->alphaVantageApiKeyB ?? null,
            $config->alphaVantageApiKeyC ?? null,
            $config->alphaVantageApiKeyD ?? null,
            $config->alphaVantageApiKeyE ?? null,
        ]);

        $this->alphaKeys = array_values(array_unique(array_filter(array_merge($parsedEnvKeys, $knownKeys))));
        $this->alphaKeyIndex = 0;
        $this->apiKey = $this->alphaKeys[0] ?? null;

        $this->twelveDataKey = getenv('TWELVE_DATA_API_KEY') ?: ($config->twelveDataApiKey ?? null);
        $this->marketstackKey = getenv('MARKETSTACK_API_KEY') ?: ($config->marketstackApiKey ?? null);

        $this->client = \Config\Services::curlrequest();

        if (empty($this->apiKey)) {
            log_message('warning', 'AlphaVantage API key is missing. Requests may fail until a key is configured.');
        }
    }

    private function currentAlphaKey(): ?string
    {
        if (empty($this->alphaKeys)) {
            return null;
        }

        if (!isset($this->alphaKeys[$this->alphaKeyIndex])) {
            $this->alphaKeyIndex = 0;
        }

        $this->apiKey = $this->alphaKeys[$this->alphaKeyIndex] ?? null;
        return $this->apiKey;
    }

    private function rotateAlphaKey(): void
    {
        if (empty($this->alphaKeys)) {
            return;
        }

        $this->alphaKeyIndex = ($this->alphaKeyIndex + 1) % count($this->alphaKeys);
        $this->apiKey = $this->alphaKeys[$this->alphaKeyIndex] ?? $this->apiKey;
    }

    private function getAlphaVantageResponse(array $query): ?array
    {
        if (empty($this->alphaKeys)) {
            return null;
        }

        $attempts = 0;
        $maxAttempts = count($this->alphaKeys);

        do {
            $apiKey = $this->currentAlphaKey();
            if (empty($apiKey)) {
                break;
            }

            $query['apikey'] = $apiKey;

            try {
                $response = $this->client->get('https://www.alphavantage.co/query', [
                    'query' => $query,
                    'timeout' => 10,
                ]);

                $data = json_decode($response->getBody(), true);
            } catch (\Throwable $e) {
                log_message('error', sprintf('AlphaVantage request failed using key %s: %s', substr($apiKey, 0, 4) . '***', $e->getMessage()));
                $this->rotateAlphaKey();
                $attempts++;
                continue;
            }

            if (isset($data['Note']) || isset($data['Information'])) {
                $message = $data['Note'] ?? $data['Information'];
                log_message('warning', 'AlphaVantage rate limit notice: ' . $message);
                $this->rotateAlphaKey();
                $attempts++;
                continue;
            }

            if (isset($data['Error Message'])) {
                log_message('error', 'AlphaVantage API error: ' . $data['Error Message']);
                $this->rotateAlphaKey();
                $attempts++;
                continue;
            }

            $this->rotateAlphaKey();
            return is_array($data) ? $data : null;
        } while ($attempts < $maxAttempts);

        return null;
    }

    private function prepareSymbols(array $symbols): array
    {
        $prepared = [];

        foreach ($symbols as $symbol) {
            if (!is_string($symbol)) {
                continue;
            }

            $normalized = strtoupper(trim($symbol));
            if ($normalized === '') {
                continue;
            }

            if (!preg_match('/^[A-Z0-9\.\-]+$/', $normalized)) {
                continue;
            }

            $prepared[] = $normalized;
        }

        return array_values(array_unique($prepared));
    }

    private function fetchAlphaVantageBatchQuotes(array $symbols): array
    {
        $results = [];

        if (empty($symbols) || empty($this->alphaKeys)) {
            return $results;
        }

        foreach ($symbols as $symbol) {
            $data = $this->getAlphaVantageResponse([
                'function' => 'GLOBAL_QUOTE',
                'symbol'   => $symbol,
            ]);

            if (!is_array($data)) {
                continue;
            }

            if (isset($data['Global Quote']) && is_array($data['Global Quote'])) {
                $quote = $data['Global Quote'];
                $price = $quote['05. price'] ?? $quote['02. open'] ?? null;

                if (is_numeric($price)) {
                    $results[$symbol] = (float) $price;
                }
                continue;
            }

            if (isset($data['Error Message'])) {
                log_message('warning', 'AlphaVantage error for {symbol}: {message}', [
                    'symbol'  => $symbol,
                    'message' => $data['Error Message'],
                ]);
                continue;
            }

            if (isset($data['Note']) || isset($data['Information'])) {
                log_message('notice', 'AlphaVantage notice for {symbol}: {message}', [
                    'symbol'  => $symbol,
                    'message' => $data['Note'] ?? $data['Information'],
                ]);
            }
        }

        return $results;
    }

    private function fetchTwelveDataBatchPrices(array $symbols): array
    {
        $results = [];

        if (empty($this->twelveDataKey) || empty($symbols)) {
            return $results;
        }

        $chunks = array_chunk($symbols, 8);

        foreach ($chunks as $chunk) {
            try {
                $response = $this->client->get('https://api.twelvedata.com/price', [
                    'query' => [
                        'symbol' => implode(',', $chunk),
                        'apikey' => $this->twelveDataKey,
                    ],
                    'timeout' => 10,
                ]);

                $payload = json_decode($response->getBody(), true);
                if (!is_array($payload)) {
                    continue;
                }

                if (isset($payload['status']) && $payload['status'] === 'error') {
                    $message = $payload['message'] ?? 'Unknown TwelveData error';
                    log_message('debug', 'TwelveData batch response error: ' . $message);
                    continue;
                }

                foreach ($chunk as $symbol) {
                    $normalized = strtoupper($symbol);

                    if (isset($payload[$normalized]['status']) && $payload[$normalized]['status'] === 'error') {
                        $message = $payload[$normalized]['message'] ?? 'Unknown TwelveData symbol error';
                        log_message('debug', "TwelveData error for {$normalized}: {$message}");
                        continue;
                    }

                    if (isset($payload[$normalized]['price']) && is_numeric($payload[$normalized]['price'])) {
                        $results[$normalized] = (float) $payload[$normalized]['price'];
                        continue;
                    }

                    if (isset($payload[$normalized]) && is_numeric($payload[$normalized])) {
                        $results[$normalized] = (float) $payload[$normalized];
                        continue;
                    }

                    if (count($chunk) === 1 && isset($payload['price']) && is_numeric($payload['price'])) {
                        $results[$normalized] = (float) $payload['price'];
                        continue;
                    }

                    if (isset($payload['data']) && is_array($payload['data'])) {
                        foreach ($payload['data'] as $entry) {
                            $entrySymbol = strtoupper($entry['symbol'] ?? '');
                            $value = $entry['price'] ?? $entry['close'] ?? null;

                            if ($entrySymbol === $normalized && is_numeric($value)) {
                                $results[$normalized] = (float) $value;
                                break;
                            }
                        }
                    }
                }
            } catch (\Throwable $e) {
                log_message('debug', 'TwelveData batch fallback failed: ' . $e->getMessage());
            }
        }

        return $results;
    }

    private function fetchMarketstackBatchPrices(array $symbols): array
    {
        $results = [];

        if (empty($this->marketstackKey) || empty($symbols)) {
            return $results;
        }

        $chunks = array_chunk($symbols, 20);

        foreach ($chunks as $chunk) {
            try {
                $response = $this->client->get('https://api.marketstack.com/v1/intraday/latest', [
                    'query' => [
                        'access_key' => $this->marketstackKey,
                        'symbols' => implode(',', $chunk),
                    ],
                    'timeout' => 10,
                ]);

                $payload = json_decode($response->getBody(), true);
                if (isset($payload['error'])) {
                    $message = is_array($payload['error']) ? ($payload['error']['message'] ?? json_encode($payload['error'])) : $payload['error'];
                    log_message('debug', 'Marketstack error: ' . $message);
                    continue;
                }

                if (empty($payload['data']) || !is_array($payload['data'])) {
                    continue;
                }

                foreach ($payload['data'] as $entry) {
                    $symbol = strtoupper($entry['symbol'] ?? '');
                    $price = $entry['last'] ?? $entry['close'] ?? null;

                    if ($symbol !== '' && is_numeric($price)) {
                        $results[$symbol] = (float) $price;
                    }
                }
            } catch (\Throwable $e) {
                log_message('debug', 'Marketstack fallback failed: ' . $e->getMessage());
            }
        }

        return $results;
    }

    private function analyzeEMAStacking($emas)
    {
        if (empty($emas) || count($emas) < 4) return 'Unknown';
        [$ema8, $ema13, $ema34, $ema48] = $emas;

        if ($ema8 > $ema13 && $ema13 > $ema34 && $ema34 > $ema48) {
            return 'Bullish Stacking';
        } elseif ($ema8 < $ema13 && $ema13 < $ema34 && $ema34 < $ema48) {
            return 'Bearish Stacking';
        } else {
            return 'Mixed / Flat';
        }
    }
    
    public function cacheTechnicalIndicators(string $symbol, string $exchange = 'NASDAQ', int $ttl = 3600): array
    {
        $cache = \Config\Services::cache();
        $key = "av_metrics_{$symbol}_{$exchange}";

        try {
            $priceData = $this->getCurrentPrice($symbol);
            $emas = $this->fetchEMAs($symbol);
            $smas = $this->fetchSMAs($symbol);
            $cross = $this->detectGoldenCross($symbol);
            $ath = $this->getAllTimeHigh($symbol);
            $indicators = $this->getAllTechnicalIndicators($symbol);
            $multiTf = $this->getMovingAveragesByTimeframe($symbol);

            $all = array_merge(
                $priceData, $emas, $smas, $indicators,
                [
                    'golden_cross_status' => $cross,
                    'all_time_high' => $ath,
                    'multi_timeframe_data' => $multiTf
                ]
            );

            $cache->save($keySanitized, $all, $ttl);
            return $all;
        } catch (\Throwable $e) {
            log_message('error', "cacheTechnicalIndicators failed: " . $e->getMessage());
            return [];
        }
    }

    function calculateEMA(array $closes, int $period): float
    {
        $k = 2 / ($period + 1);
        $ema = array_slice($closes, 0, $period);
        $prevEMA = array_sum($ema) / count($ema);
    
        for ($i = $period; $i < count($closes); $i++) {
            $prevEMA = ($closes[$i] * $k) + ($prevEMA * (1 - $k));
        }
    
        return $prevEMA;
    }

    public function detectGoldenCross(string $symbol, string $interval = 'daily'): string
    {
        $smas = $this->fetchSMAs($symbol, $interval, [50, 200]);
        if (!$smas['sma_50'] || !$smas['sma_200']) return 'Unknown';
        return $smas['sma_50'] > $smas['sma_200'] ? 'Golden Cross' : 'Death Cross';
    }

    private function extractMostRecentValue($response, $key = 'SMA')
    {
        if (!isset($response['Technical Analysis: ' . $key])) {
            throw new \Exception("Invalid response for $key");
        }

        $dataPoints = $response['Technical Analysis: ' . $key];
        $latest = reset($dataPoints);
        return floatval($latest[$key]);
    }

    public function fetchADX(string $symbol, string $interval = 'daily', int $timePeriod = 14): ?float
    {
        try {
            $response = $this->client->get('https://www.alphavantage.co/query', [
                'query' => [
                    'function' => 'ADX',
                    'symbol' => $symbol,
                    'interval' => $interval,
                    'time_period' => $timePeriod,
                    'apikey' => $this->apiKey
                ]
            ]);
            $data = json_decode($response->getBody(), true);
            $technicalData = $data['Technical Analysis: ADX'] ?? [];
            $latest = reset($technicalData);
            return isset($latest['ADX']) ? floatval($latest['ADX']) : null;
        } catch (\Throwable $e) {
            log_message('error', "AlphaVantage::fetchADX failed: " . $e->getMessage());
            return null;
        }
    }

    public function fetchBatchTechnicalData(array $symbols, string $interval = 'daily'): array
    {
        $results = [];
        $cache = \Config\Services::cache();

        foreach ($symbols as $symbol) {
            $cacheKey = "av_tech_{$symbol}_{$interval}";
            $cacheKeySanitized = sanitizeCacheKey($cacheKey);

            // Try cache first
            if ($cached = $cache->get($cacheKeySanitized)) {
                $results[$symbol] = $cached;
                continue;
            }

            try {
                $metrics = [
                    'price' => $this->getCurrentPrice($symbol)['price'] ?? null,
                    'emas'  => $this->fetchEMAs($symbol, $interval),
                    'smas'  => $this->fetchSMAs($symbol, $interval),
                    'cross' => $this->detectGoldenCross($symbol, $interval),
                    'rsi'   => $this->fetchRSI($symbol, $interval),
                    'macd'  => $this->fetchMACD($symbol, $interval),
                ];

                $results[$symbol] = $metrics;
                $cache->save($cacheKeySanitized, $metrics, 3600); // Cache 1hr

                if (!$this->isProUser()) {
                    sleep(1); // Obey rate limit only for free users
                }
            } catch (\Throwable $e) {
                log_message('error', "AlphaVantage batch error for $symbol: " . $e->getMessage());
                $results[$symbol] = ['error' => $e->getMessage()];
            }
        }

        return $results;
    }

    public function fetchCCI(string $symbol, string $interval = 'daily', int $timePeriod = 20): ?float
    {
        try {
            $response = $this->client->get('https://www.alphavantage.co/query', [
                'query' => [
                    'function' => 'CCI',
                    'symbol' => $symbol,
                    'interval' => $interval,
                    'time_period' => $timePeriod,
                    'apikey' => $this->apiKey
                ]
            ]);
            $data = json_decode($response->getBody(), true);
            $technicalData = $data['Technical Analysis: CCI'] ?? [];
            $latest = reset($technicalData);
            return isset($latest['CCI']) ? floatval($latest['CCI']) : null;
        } catch (\Throwable $e) {
            log_message('error', "AlphaVantage::fetchCCI failed: " . $e->getMessage());
            return null;
        }
    }

    private function fetchEMA($symbol, $period, $interval = '60min')
    {
        try {
            $response = $this->getIndicatorData('EMA', $symbol, $interval, $period);
            $technicalData = $response['Technical Analysis: EMA'] ?? [];
            $latest = reset($technicalData);
            return isset($latest['EMA']) ? floatval($latest['EMA']) : null;
        } catch (\Throwable $e) {
            log_message('error', "AlphaVantage::fetchEMA failed: " . $e->getMessage());
            return null;
        }
    }

    public function fetchEMAs($symbol, $interval = 'daily', $periods = [9, 21, 34, 48, 100, 200])
    {
        $results = [];

        foreach ($periods as $period) {
            $response = $this->client->get('https://www.alphavantage.co/query', [
                'query' => [
                    'function' => 'EMA',
                    'symbol' => $symbol,
                    'interval' => $interval,
                    'time_period' => $period,
                    'series_type' => 'close',
                    'apikey' => $this->apiKey,
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['Technical Analysis: EMA'])) {
                $latest = reset($data['Technical Analysis: EMA']);
                $results["ema_$period"] = floatval($latest['EMA'] ?? 0.0);
            } else {
                $results["ema_$period"] = null;
            }

            sleep(1); // to avoid AlphaVantage rate limits
        }

        return $results;
    }

    public function fetchMFI(string $symbol, string $interval = 'daily', int $timePeriod = 14): ?float
    {
        try {
            $response = $this->client->get('https://www.alphavantage.co/query', [
                'query' => [
                    'function' => 'MFI',
                    'symbol' => $symbol,
                    'interval' => $interval,
                    'time_period' => $timePeriod,
                    'apikey' => $this->apiKey
                ]
            ]);
            $data = json_decode($response->getBody(), true);
            $technicalData = $data['Technical Analysis: MFI'] ?? [];
            $latest = reset($technicalData);
            return isset($latest['MFI']) ? floatval($latest['MFI']) : null;
        } catch (\Throwable $e) {
            log_message('error', "AlphaVantage::fetchMFI failed: " . $e->getMessage());
            return null;
        }
    }

    public function fetchMOM(string $symbol, string $interval = 'daily', int $timePeriod = 10): ?float
    {
        try {
            $response = $this->client->get('https://www.alphavantage.co/query', [
                'query' => [
                    'function' => 'MOM',
                    'symbol' => $symbol,
                    'interval' => $interval,
                    'time_period' => $timePeriod,
                    'apikey' => $this->apiKey
                ]
            ]);
            $data = json_decode($response->getBody(), true);
            $technicalData = $data['Technical Analysis: MOM'] ?? [];
            $latest = reset($technicalData);
            return isset($latest['MOM']) ? floatval($latest['MOM']) : null;
        } catch (\Throwable $e) {
            log_message('error', "AlphaVantage::fetchMOM failed: " . $e->getMessage());
            return null;
        }
    }

    public function fetchOBV(string $symbol, string $interval = 'daily'): ?float
    {
        try {
            $response = $this->client->get('https://www.alphavantage.co/query', [
                'query' => [
                    'function' => 'OBV',
                    'symbol' => $symbol,
                    'interval' => $interval,
                    'apikey' => $this->apiKey
                ]
            ]);
            $data = json_decode($response->getBody(), true);
            $technicalData = $data['Technical Analysis: OBV'] ?? [];
            $latest = reset($technicalData);
            return isset($latest['OBV']) ? floatval($latest['OBV']) : null;
        } catch (\Throwable $e) {
            log_message('error', "AlphaVantage::fetchOBV failed: " . $e->getMessage());
            return null;
        }
    }

    public function fetchROC(string $symbol, string $interval = 'daily', int $timePeriod = 10): ?float
    {
        try {
            $response = $this->client->get('https://www.alphavantage.co/query', [
                'query' => [
                    'function' => 'ROC',
                    'symbol' => $symbol,
                    'interval' => $interval,
                    'time_period' => $timePeriod,
                    'apikey' => $this->apiKey
                ]
            ]);
            $data = json_decode($response->getBody(), true);
            $technicalData = $data['Technical Analysis: ROC'] ?? [];
            $latest = reset($technicalData);
            return isset($latest['ROC']) ? floatval($latest['ROC']) : null;
        } catch (\Throwable $e) {
            log_message('error', "AlphaVantage::fetchROC failed: " . $e->getMessage());
            return null;
        }
    }

    public function fetchSMAs($symbol, $interval = 'daily', $periods = [50, 200])
    {
        $results = [];

        foreach ($periods as $period) {
            $response = $this->client->get('https://www.alphavantage.co/query', [
                'query' => [
                    'function' => 'SMA',
                    'symbol' => $symbol,
                    'interval' => $interval,
                    'time_period' => $period,
                    'series_type' => 'close',
                    'apikey' => $this->apiKey,
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['Technical Analysis: SMA'])) {
                $latest = reset($data['Technical Analysis: SMA']);
                $results["sma_$period"] = floatval($latest['SMA'] ?? 0.0);
            } else {
                $results["sma_$period"] = null;
            }

            sleep(1); // rate limit
        }

        return $results;
    }

    public function fetchSTOCH(string $symbol, string $interval = 'daily'): ?array
    {
        try {
            $response = $this->client->get('https://www.alphavantage.co/query', [
                'query' => [
                    'function' => 'STOCH',
                    'symbol' => $symbol,
                    'interval' => $interval,
                    'apikey' => $this->apiKey
                ]
            ]);
            $data = json_decode($response->getBody(), true);
            $technicalData = $data['Technical Analysis: STOCH'] ?? [];
            $latest = reset($technicalData);
            return isset($latest['SlowK']) && isset($latest['SlowD']) ? [
                'SlowK' => floatval($latest['SlowK']),
                'SlowD' => floatval($latest['SlowD'])
            ] : null;
        } catch (\Throwable $e) {
            log_message('error', "AlphaVantage::fetchSTOCH failed: " . $e->getMessage());
            return null;
        }
    }

    public function fetchWILLR(string $symbol, string $interval = 'daily', int $timePeriod = 14): ?float
    {
        try {
            $response = $this->client->get('https://www.alphavantage.co/query', [
                'query' => [
                    'function' => 'WILLR',
                    'symbol' => $symbol,
                    'interval' => $interval,
                    'time_period' => $timePeriod,
                    'apikey' => $this->apiKey
                ]
            ]);
            $data = json_decode($response->getBody(), true);
            $technicalData = $data['Technical Analysis: WILLR'] ?? [];
            $latest = reset($technicalData);
            return isset($latest['WILLR']) ? floatval($latest['WILLR']) : null;
        } catch (\Throwable $e) {
            log_message('error', "AlphaVantage::fetchWILLR failed: " . $e->getMessage());
            return null;
        }
    }

    public function getAllTechnicalIndicators(string $symbol): array
    {
        return [
            'cci' => $this->fetchCCI($symbol),
            'obv' => $this->fetchOBV($symbol),
            'adx' => $this->fetchADX($symbol),
            'williams_r' => $this->fetchWILLR($symbol),
            'mfi' => $this->fetchMFI($symbol),
            'momentum' => $this->fetchMOM($symbol),
            'roc' => $this->fetchROC($symbol),
            'stoch' => $this->fetchSTOCH($symbol),
        ];
    }

    public function getAllTimeHigh(string $symbol): ?float
    {
        try {
            $response = $this->client->get('https://www.alphavantage.co/query', [
                'query' => [
                    'function' => 'TIME_SERIES_DAILY_ADJUSTED',
                    'symbol' => $symbol,
                    'outputsize' => 'full',
                    'apikey' => $this->apiKey
                ]
            ]);

            $data = json_decode($response->getBody(), true);
            $prices = $data['Time Series (Daily)'] ?? [];

            $highs = array_map(fn($d) => (float)($d['2. high'] ?? 0), $prices);
            return !empty($highs) ? max($highs) : null;

        } catch (\Throwable $e) {
            log_message('error', "getAllTimeHigh failed: " . $e->getMessage());
            return null;
        }
    }

    public function getBatchPrices(array $symbols): array
    {
        $preparedSymbols = $this->prepareSymbols($symbols);
        if (empty($preparedSymbols)) {
            return [];
        }

        $results = $this->fetchAlphaVantageBatchQuotes($preparedSymbols);
        if (!empty($results)) {
            log_message('debug', 'AlphaVantage::getBatchPrices - AlphaVantage batch returned ' . count($results) . ' quotes.');
        }

        $missing = array_values(array_diff($preparedSymbols, array_keys($results)));
        if (!empty($missing)) {
            $tdResults = $this->fetchTwelveDataBatchPrices($missing);
            if (!empty($tdResults)) {
                log_message('debug', 'AlphaVantage::getBatchPrices - TwelveData filled ' . count($tdResults) . ' symbols.');
            }
            $results = $results + $tdResults;
            $missing = array_values(array_diff($missing, array_keys($tdResults)));
        }

        if (!empty($missing)) {
            $marketstackResults = $this->fetchMarketstackBatchPrices($missing);
            if (!empty($marketstackResults)) {
                log_message('debug', 'AlphaVantage::getBatchPrices - Marketstack filled ' . count($marketstackResults) . ' symbols.');
            }
            $results = $results + $marketstackResults;
            $missing = array_values(array_diff($missing, array_keys($marketstackResults)));
        }

        $failed = [];
        foreach ($missing as $symbol) {
            $fallback = $this->getCurrentPrice($symbol);
            $price = $fallback['price'] ?? null;

            if (is_numeric($price)) {
                $results[$symbol] = (float) $price;
            } else {
                $failed[] = $symbol;
            }
        }

        if (!empty($failed)) {
            log_message('warning', 'AlphaVantage::getBatchPrices - No provider returned data for: ' . implode(', ', $failed));
        }

        return $results;
    }

    private function fetchTwelveDataPrice(string $symbol): ?float
    {
        $results = $this->fetchTwelveDataBatchPrices([$symbol]);
        return $results[strtoupper($symbol)] ?? null;
    }

    
    public function getCurrentPrice(string $symbol): array
    {
        $normalized = strtoupper(trim($symbol));
        if ($normalized === '') {
            return ['price' => null];
        }

        if (!preg_match('/^[A-Z0-9\.\-]+$/', $normalized)) {
            log_message('debug', "AlphaVantage::getCurrentPrice - Ignoring unsupported symbol format: {$symbol}");
            return ['price' => null];
        }

        $price = null;
        $source = null;

        $data = $this->getAlphaVantageResponse([
            'function' => 'GLOBAL_QUOTE',
            'symbol' => $normalized,
        ]);

        if (isset($data['Global Quote']['05. price']) && is_numeric($data['Global Quote']['05. price'])) {
            $price = (float) $data['Global Quote']['05. price'];
            $source = 'alphavantage';
        } elseif (isset($data['Realtime Global Securities Quote']['05. price']) && is_numeric($data['Realtime Global Securities Quote']['05. price'])) {
            $price = (float) $data['Realtime Global Securities Quote']['05. price'];
            $source = 'alphavantage';
        }

        if ($price === null) {
            $td = $this->fetchTwelveDataBatchPrices([$normalized]);
            if (isset($td[$normalized])) {
                $price = (float) $td[$normalized];
                $source = 'twelvedata';
                log_message('debug', "AlphaVantage::getCurrentPrice - TwelveData fallback used for {$normalized}.");
            }
        }

        if ($price === null) {
            $marketstack = $this->fetchMarketstackBatchPrices([$normalized]);
            if (isset($marketstack[$normalized])) {
                $price = (float) $marketstack[$normalized];
                $source = 'marketstack';
                log_message('debug', "AlphaVantage::getCurrentPrice - Marketstack fallback used for {$normalized}.");
            }
        }

        return ['price' => $price, 'source' => $source];
    }

    /**
     * Retrieve the latest Alpha Vantage GLOBAL_QUOTE payload with normalized fields.
     */
    public function getGlobalQuoteDetailed(string $symbol): array
    {
        $normalized = strtoupper(trim($symbol));
        if ($normalized === '' || !preg_match('/^[A-Z0-9\.\-]+$/', $normalized)) {
            return [];
        }

        $payload = $this->getAlphaVantageResponse([
            'function' => 'GLOBAL_QUOTE',
            'symbol'   => $normalized,
        ]);

        $quote = $payload['Global Quote'] ?? $payload['Realtime Global Securities Quote'] ?? null;
        if (!is_array($quote)) {
            return [];
        }

        $price = isset($quote['05. price']) && is_numeric($quote['05. price'])
            ? (float) $quote['05. price']
            : null;
        $change = isset($quote['09. change']) && is_numeric($quote['09. change'])
            ? (float) $quote['09. change']
            : null;
        $changePctRaw = $quote['10. change percent'] ?? null;
        $changePct = null;
        if (is_string($changePctRaw)) {
            $changePct = (float) rtrim($changePctRaw, "%\s");
        } elseif (is_numeric($changePctRaw)) {
            $changePct = (float) $changePctRaw;
        }

        return [
            'symbol'             => $quote['01. symbol'] ?? $normalized,
            'price'              => $price,
            'open'               => isset($quote['02. open']) ? (float) $quote['02. open'] : null,
            'high'               => isset($quote['03. high']) ? (float) $quote['03. high'] : null,
            'low'                => isset($quote['04. low']) ? (float) $quote['04. low'] : null,
            'volume'             => isset($quote['06. volume']) ? (int) $quote['06. volume'] : null,
            'latest_trading_day' => $quote['07. latest trading day'] ?? null,
            'previous_close'     => isset($quote['08. previous close']) ? (float) $quote['08. previous close'] : null,
            'change'             => $change,
            'change_percent'     => $changePct,
        ];
    }
    
    public function getEmaComparison(string $symbol, array $periods = [3, 8, 13, 34, 48])
    {
        $emaResults = [];

        foreach ($periods as $period) {
            try {
                $data = $this->fetchTechnicalIndicator($symbol, 'EMA', $period);
                $tech = $data['Technical Analysis: EMA'] ?? null;

                if (is_array($tech)) {
                    $latestDate = array_key_first($tech);
                    $emaResults[$period] = floatval($tech[$latestDate]['EMA'] ?? 0.0);
                } else {
                    log_message('warning', "getEmaComparison - No technical EMA data for {$symbol} period {$period}");
                    $emaResults[$period] = null;
                }
            } catch (\Throwable $e) {
                log_message('error', "getEmaComparison failed for {$symbol} [{$period}]: " . $e->getMessage());
                $emaResults[$period] = null;
            }

            sleep(1);
        }

        return [
            'ema_3_8' => ($emaResults[3] !== null && $emaResults[8] !== null) ? ($emaResults[3] > $emaResults[8] ? 'up' : 'down') : 'unknown',
            'ema_8_13' => ($emaResults[8] !== null && $emaResults[13] !== null) ? ($emaResults[8] > $emaResults[13] ? 'up' : 'down') : 'unknown',
            'ema_13_34' => ($emaResults[13] !== null && $emaResults[34] !== null) ? ($emaResults[13] > $emaResults[34] ? 'up' : 'down') : 'unknown',
            'ema_34_48' => ($emaResults[34] !== null && $emaResults[48] !== null) ? ($emaResults[34] > $emaResults[48] ? 'up' : 'down') : 'unknown',
            'ema_consensus' => array_reduce([3, 8, 13, 34], function ($carry, $p, $i) use ($emaResults) {
                $next = [8, 13, 34, 48][$i];
                return ($emaResults[$p] !== null && $emaResults[$next] !== null && $emaResults[$p] > $emaResults[$next]) ? $carry + 1 : $carry;
            }, 0),
        ];
    }

    public function getTechnicalIndicators($symbol, $exchange)
    {
        $result = [
            'ema_3'   => null, 'ema_8'   => null, 'ema_13'  => null,
            'ema_34'  => null, 'ema_48'  => null, 'sma_50'  => null,
            'sma_200' => null, 'macd'    => null, 'rsi'     => null,
            'volume'  => null
        ];
    
        try {
            $priceData = $this->fetchTimeSeriesDaily($symbol, $exchange);
            $latest    = reset($priceData['Time Series (Daily)']);
    
            foreach ([3, 8, 13, 34, 48] as $period) {
                $ema = $this->fetchEMA($symbol, $exchange, $period);
                if (!empty($ema)) {
                    $result["ema_{$period}"] = (float) reset($ema);
                }
            }
    
            foreach ([50, 200] as $period) {
                $sma = $this->fetchSMA($symbol, $exchange, $period);
                if (!empty($sma)) {
                    $result["sma_{$period}"] = (float) reset($sma);
                }
            }
    
            $result['macd'] = (float) reset($this->fetchMACD($symbol, $exchange) ?? [0]);
            $result['rsi']  = (float) reset($this->fetchRSI($symbol, $exchange) ?? [0]);
            $result['volume'] = isset($latest['5. volume']) ? (int) $latest['5. volume'] : null;
    
            // 🔁 Append EMA Comparison
            $emaComparisons = $this->getEmaComparison($symbol);
            $result = array_merge($result, $emaComparisons);
    
        } catch (\Throwable $e) {
            log_message('error', 'AlphaVantage getTechnicalIndicators failed: ' . $e->getMessage());
        }
    
        return $result;
    }    

    public function getMovingAveragesByTimeframe(string $symbol, array $timeframes = ['5min', '15min', '30min', '60min', '240min', 'daily']): array
    {
        $results = [];

        foreach ($timeframes as $tf) {
            $tfKey = $tf;
            if ($tf === '240min') $tfKey = '4h';
            if ($tf === '60min') $tfKey = '1h';

            try {
                $sma50 = $this->fetchSMA($symbol, 50, $tf);
                $sma200 = $this->fetchSMA($symbol, 200, $tf);

                $ema8 = $this->fetchEMA($symbol, 8, $tf);
                $ema13 = $this->fetchEMA($symbol, 13, $tf);
                $ema34 = $this->fetchEMA($symbol, 34, $tf);
                $ema48 = $this->fetchEMA($symbol, 48, $tf);

                $results[$tfKey] = [
                    'sma_50' => $sma50,
                    'sma_200' => $sma200,
                    'sma_cross' => $sma50 > $sma200 ? 'Golden Cross' : 'Death Cross',
                    'ema_8' => $ema8,
                    'ema_13' => $ema13,
                    'ema_34' => $ema34,
                    'ema_48' => $ema48,
                    'ema_trend' => $this->analyzeEMAStacking([$ema8, $ema13, $ema34, $ema48]),
                ];
            } catch (\Throwable $e) {
                $results[$tfKey] = ['error' => $e->getMessage()];
                continue;
            }
        }

        return $results;
    }

    public function getTechnicalMetrics(string $symbol, string $exchange = 'NASDAQ'): array
    {
        try {
            $priceData = $this->getCurrentPrice($symbol);
            $emas = $this->fetchEMAs($symbol);
            $smas = $this->fetchSMAs($symbol);
            $ath = $this->getAllTimeHigh($symbol);
            $cross = $this->detectGoldenCross($symbol);

            return [
                'status' => 'success',
                'data' => array_merge($priceData, $emas, $smas, [
                    'golden_cross_status' => $cross,
                    'all_time_high' => $ath,
                ]),
            ];
        } catch (\Exception $e) {
            log_message('error', 'AlphaVantage::getTechnicalMetrics error: ' . $e->getMessage());
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function isProUser(): bool
    {
        return getenv('ALPHA_VANTAGE_API_KEY');
    }


}
?>