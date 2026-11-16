<?php

declare(strict_types=1);

namespace App\Services;

use CodeIgniter\Database\BaseConnection;
use Config\Database;

/**
 * Service to evaluate the freshness and availability of market data, quotes,
 * financial research news feeds, and upstream API credential readiness.
 *
 * Implements bounded queries for audit compliance and graceful fallback handling.
 */
class MarketDataFreshnessService
{
    public const DEFAULT_SYMBOLS = ['SPY', 'QQQ', 'BTC', 'ETH', 'SOL', 'DXY', 'VIX'];
    public const DEFAULT_QUOTE_MAX_AGE_SECONDS = 3600;      // 1 hour
    public const DEFAULT_NEWS_MAX_AGE_SECONDS  = 86400;     // 24 hours

    protected BaseConnection $db;

    public function __construct(?BaseConnection $db = null)
    {
        $this->db = $db ?? Database::connect();
    }

    /**
     * Evaluates the freshness of the latest market quote snapshot for a symbol.
     *
     * @param string $symbol
     * @param int $maxAgeSeconds
     * @return array{
     *   symbol: string,
     *   price: float|null,
     *   created_at: string|null,
     *   age_seconds: int|null,
     *   max_age_seconds: int,
     *   is_fresh: bool,
     *   status: 'FRESH'|'STALE'|'MISSING',
     *   source: string|null
     * }
     */
    public function evaluateSymbolFreshness(string $symbol, int $maxAgeSeconds = self::DEFAULT_QUOTE_MAX_AGE_SECONDS): array
    {
        $cleanSymbol = strtoupper(trim($symbol));
        if ($cleanSymbol === '') {
            return [
                'symbol'          => '',
                'price'           => null,
                'created_at'      => null,
                'age_seconds'     => null,
                'max_age_seconds' => $maxAgeSeconds,
                'is_fresh'        => false,
                'status'          => 'MISSING',
                'source'          => null,
            ];
        }

        $row = null;
        $source = null;

        // 1. Primary check: bf_market_snapshots
        if ($this->tableExistsSafe('bf_market_snapshots')) {
            $row = $this->db->table('bf_market_snapshots')
                ->where('symbol', $cleanSymbol)
                ->orderBy('created_at', 'DESC')
                ->limit(1)
                ->get()
                ->getRowArray();

            if ($row !== null) {
                $source = 'bf_market_snapshots';
            }
        }

        // 2. Secondary fallback check: bf_investment_technical_snapshots (uses 'ticker' column)
        if ($row === null && $this->tableExistsSafe('bf_investment_technical_snapshots')) {
            $row = $this->db->table('bf_investment_technical_snapshots')
                ->where('ticker', $cleanSymbol)
                ->orderBy('snapshot_date', 'DESC')
                ->limit(1)
                ->get()
                ->getRowArray();

            if ($row !== null) {
                $source = 'bf_investment_technical_snapshots';
                if (! isset($row['created_at']) && isset($row['snapshot_date'])) {
                    $row['created_at'] = $row['snapshot_date'] . ' 00:00:00';
                }
            }
        }

        if ($row === null) {
            return [
                'symbol'          => $cleanSymbol,
                'price'           => null,
                'created_at'      => null,
                'age_seconds'     => null,
                'max_age_seconds' => $maxAgeSeconds,
                'is_fresh'        => false,
                'status'          => 'MISSING',
                'source'          => null,
            ];
        }

        $createdAtStr = (string) ($row['created_at'] ?? '');
        $createdTimestamp = $createdAtStr !== '' ? strtotime($createdAtStr) : false;
        $now = time();

        $ageSeconds = $createdTimestamp !== false ? max(0, $now - $createdTimestamp) : null;
        $isFresh = $ageSeconds !== null && $ageSeconds <= $maxAgeSeconds;
        $price = isset($row['price']) && is_numeric($row['price']) ? (float) $row['price'] : null;

        return [
            'symbol'          => $cleanSymbol,
            'price'           => $price,
            'created_at'      => $createdAtStr ?: null,
            'age_seconds'     => $ageSeconds,
            'max_age_seconds' => $maxAgeSeconds,
            'is_fresh'        => $isFresh,
            'status'          => $isFresh ? 'FRESH' : 'STALE',
            'source'          => $source,
        ];
    }

    /**
     * Evaluates quotes freshness for an array of symbols.
     *
     * @param string[] $symbols
     * @param int $maxAgeSeconds
     * @return array{
     *   total_symbols: int,
     *   fresh_count: int,
     *   stale_count: int,
     *   missing_count: int,
     *   is_healthy: bool,
     *   symbols: array<string, array>
     * }
     */
    public function evaluateQuotesFreshness(
        array $symbols = self::DEFAULT_SYMBOLS,
        int $maxAgeSeconds = self::DEFAULT_QUOTE_MAX_AGE_SECONDS
    ): array {
        if (empty($symbols)) {
            $symbols = self::DEFAULT_SYMBOLS;
        }

        $evaluated = [];
        $freshCount = 0;
        $staleCount = 0;
        $missingCount = 0;

        foreach ($symbols as $sym) {
            $eval = $this->evaluateSymbolFreshness((string) $sym, $maxAgeSeconds);
            $evaluated[$eval['symbol']] = $eval;

            if ($eval['status'] === 'FRESH') {
                $freshCount++;
            } elseif ($eval['status'] === 'STALE') {
                $staleCount++;
            } else {
                $missingCount++;
            }
        }

        $total = count($symbols);
        // Deemed healthy if all queried symbols have fresh quotes
        $isHealthy = $total > 0 && $freshCount === $total;

        return [
            'total_symbols' => $total,
            'fresh_count'   => $freshCount,
            'stale_count'   => $staleCount,
            'missing_count' => $missingCount,
            'is_healthy'    => $isHealthy,
            'symbols'       => $evaluated,
        ];
    }

    /**
     * Evaluates freshness across known news and market feed tables.
     *
     * @param int $maxAgeSeconds
     * @return array{
     *   is_healthy: bool,
     *   max_age_seconds: int,
     *   feeds: array<string, array>
     * }
     */
    public function evaluateNewsFreshness(int $maxAgeSeconds = self::DEFAULT_NEWS_MAX_AGE_SECONDS): array
    {
        $feedTables = [
            'bf_financial_news'                => 'created_at',
            'bf_marketing_market_feed_items'   => 'created_at',
            'bf_marketing_news_content'        => 'created_at',
        ];

        $now = time();
        $feeds = [];
        $healthyFeedCount = 0;

        foreach ($feedTables as $table => $dateColumn) {
            if (! $this->tableExistsSafe($table)) {
                $feeds[$table] = [
                    'table'            => $table,
                    'exists'           => false,
                    'latest_timestamp' => null,
                    'age_seconds'      => null,
                    'is_fresh'         => false,
                    'status'           => 'TABLE_NOT_FOUND',
                ];
                continue;
            }

            $row = $this->db->table($table)
                ->select("{$dateColumn} as latest_time")
                ->orderBy($dateColumn, 'DESC')
                ->limit(1)
                ->get()
                ->getRowArray();

            if ($row === null || empty($row['latest_time'])) {
                $feeds[$table] = [
                    'table'            => $table,
                    'exists'           => true,
                    'latest_timestamp' => null,
                    'age_seconds'      => null,
                    'is_fresh'         => false,
                    'status'           => 'EMPTY',
                ];
                continue;
            }

            $ts = strtotime((string) $row['latest_time']);
            $ageSeconds = $ts !== false ? max(0, $now - $ts) : null;
            $isFresh = $ageSeconds !== null && $ageSeconds <= $maxAgeSeconds;

            if ($isFresh) {
                $healthyFeedCount++;
            }

            $feeds[$table] = [
                'table'            => $table,
                'exists'           => true,
                'latest_timestamp' => (string) $row['latest_time'],
                'age_seconds'      => $ageSeconds,
                'is_fresh'         => $isFresh,
                'status'           => $isFresh ? 'FRESH' : 'STALE',
            ];
        }

        // Healthy if at least one tracked news feed is fresh
        $isHealthy = $healthyFeedCount > 0;

        return [
            'is_healthy'      => $isHealthy,
            'max_age_seconds' => $maxAgeSeconds,
            'feeds'           => $feeds,
        ];
    }

    /**
     * Evaluates upstream market data API key readiness without logging or leaking raw secrets.
     *
     * @return array<string, array{configured: bool, source: string}>
     */
    public function evaluateKeyReadiness(): array
    {
        $keysToCheck = [
            'AlphaVantage' => [
                'env' => ['ALPHAVANTAGE_API_KEY', 'ALPHA_VANTAGE_API_KEY'],
                'config' => fn() => config('APISettings')?->alphaVantageApiKey ?? null,
            ],
            'MarketAux' => [
                'env' => ['MARKETAUX_API_KEY', 'MARKET_AUX_API_KEY'],
                'config' => fn() => config('APISettings')?->marketAuxApiKey ?? null,
            ],
            'FRED' => [
                'env' => ['FRED_API_KEY'],
                'config' => fn() => config('APISettings')?->fredApiKey ?? null,
            ],
            'Birdeye' => [
                'env' => ['BIRDEYE_API_KEY'],
                'config' => fn() => config('APISettings')?->birdeyeApiKey ?? null,
            ],
            'CoinGecko' => [
                'env' => ['COINGECKO_API_KEY'],
                'config' => fn() => config('APISettings')?->coinGeckoApiKey ?? null,
            ],
            'NewsAPI' => [
                'env' => ['NEWSAPI_ORG_API_KEY', 'NEWSAPI_AI_KEY'],
                'config' => fn() => config('APISettings')?->newsapiOrgApiKey ?? null,
            ],
            'Finnhub' => [
                'env' => ['FINNHUB_API_KEY'],
                'config' => fn() => config('APISettings')?->finnhubApiKey ?? null,
            ],
        ];

        $results = [];

        foreach ($keysToCheck as $provider => $definition) {
            $configured = false;
            $source = 'missing';

            // Check env vars first
            foreach ($definition['env'] as $envVar) {
                $val = getenv($envVar) ?: ($_ENV[$envVar] ?? ($_SERVER[$envVar] ?? null));
                if (is_string($val) && trim($val) !== '') {
                    $configured = true;
                    $source = 'env';
                    break;
                }
            }

            // Check config second
            if (! $configured && isset($definition['config']) && is_callable($definition['config'])) {
                try {
                    $confVal = ($definition['config'])();
                    if (is_string($confVal) && trim($confVal) !== '') {
                        $configured = true;
                        $source = 'config';
                    }
                } catch (\Throwable $e) {
                    // Ignore config load error
                }
            }

            $results[$provider] = [
                'configured' => $configured,
                'source'     => $source,
            ];
        }

        return $results;
    }

    /**
     * Resolves a safe market price for a symbol with fallback support.
     *
     * @param string $symbol
     * @param float $fallbackPrice
     * @param int $maxAgeSeconds
     * @return array{
     *   symbol: string,
     *   price: float,
     *   source: string,
     *   is_fallback: bool,
     *   status: 'FRESH'|'STALE'|'FALLBACK'|'DEFAULT'
     * }
     */
    public function resolveSafePrice(
        string $symbol,
        float $fallbackPrice = 0.0,
        int $maxAgeSeconds = self::DEFAULT_QUOTE_MAX_AGE_SECONDS
    ): array {
        $cleanSymbol = strtoupper(trim($symbol));
        $freshness = $this->evaluateSymbolFreshness($cleanSymbol, $maxAgeSeconds);

        if ($freshness['status'] === 'FRESH' && $freshness['price'] !== null) {
            return [
                'symbol'      => $cleanSymbol,
                'price'       => (float) $freshness['price'],
                'source'      => (string) $freshness['source'],
                'is_fallback' => false,
                'status'      => 'FRESH',
            ];
        }

        if ($freshness['status'] === 'STALE' && $freshness['price'] !== null) {
            return [
                'symbol'      => $cleanSymbol,
                'price'       => (float) $freshness['price'],
                'source'      => (string) $freshness['source'],
                'is_fallback' => false,
                'status'      => 'STALE',
            ];
        }

        if ($fallbackPrice > 0.0) {
            return [
                'symbol'      => $cleanSymbol,
                'price'       => (float) $fallbackPrice,
                'source'      => 'provided_fallback',
                'is_fallback' => true,
                'status'      => 'FALLBACK',
            ];
        }

        return [
            'symbol'      => $cleanSymbol,
            'price'       => 0.0,
            'source'      => 'zero_default',
            'is_fallback' => true,
            'status'      => 'DEFAULT',
        ];
    }

    /**
     * Generates a comprehensive freshness and availability summary for the entire platform.
     *
     * @param string[] $symbols
     * @param int $quoteMaxAge
     * @param int $newsMaxAge
     * @return array{
     *   system_status: 'HEALTHY'|'DEGRADED'|'CRITICAL',
     *   evaluated_at: string,
     *   quotes: array,
     *   news: array,
     *   api_keys: array
     * }
     */
    public function getSystemDataFreshnessSummary(
        array $symbols = self::DEFAULT_SYMBOLS,
        int $quoteMaxAge = self::DEFAULT_QUOTE_MAX_AGE_SECONDS,
        int $newsMaxAge = self::DEFAULT_NEWS_MAX_AGE_SECONDS
    ): array {
        $quotesSummary = $this->evaluateQuotesFreshness($symbols, $quoteMaxAge);
        $newsSummary   = $this->evaluateNewsFreshness($newsMaxAge);
        $keysSummary   = $this->evaluateKeyReadiness();

        // System status evaluation
        if ($quotesSummary['is_healthy'] && $newsSummary['is_healthy']) {
            $systemStatus = 'HEALTHY';
        } elseif ($quotesSummary['fresh_count'] > 0 || $newsSummary['is_healthy']) {
            $systemStatus = 'DEGRADED';
        } else {
            $systemStatus = 'CRITICAL';
        }

        return [
            'system_status' => $systemStatus,
            'evaluated_at'  => date('Y-m-d H:i:s'),
            'quotes'        => $quotesSummary,
            'news'          => $newsSummary,
            'api_keys'      => $keysSummary,
        ];
    }

    /**
     * Defensive helper to check table existence without throwing.
     */
    protected function tableExistsSafe(string $tableName): bool
    {
        try {
            return $this->db->tableExists($tableName);
        } catch (\Throwable $e) {
            return false;
        }
    }
}
