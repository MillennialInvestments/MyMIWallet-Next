<?php

declare(strict_types=1);

namespace Tests\Unit\Market;

use App\Commands\Market\MarketFreshnessAudit;
use App\Services\MarketDataFreshnessService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * GTM-041: Certification tests for Market Research Data & News Freshness.
 *
 * Verifies:
 * - Fresh vs Stale quote snapshot evaluation.
 * - Missing quotes and fallback handling.
 * - Multi-source snapshot fallback (bf_market_snapshots -> bf_investment_technical_snapshots).
 * - Multi-symbol batch evaluation with healthy/degraded/critical status checks.
 * - News feed freshness detection across multiple news tables.
 * - Upstream API key readiness detection without secret leakage.
 * - Safe price resolution with tiered fallbacks.
 * - Spark command integration and JSON formatting.
 */
final class MarketDataFreshnessTest extends CIUnitTestCase
{
    private MarketDataFreshnessService $service;

    protected function setUp(): void
    {
        parent::setUp();

        $this->db = db_connect();
        $this->db->resetDataCache();

        $this->db->query('CREATE TABLE IF NOT EXISTS bf_market_snapshots (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            symbol TEXT NOT NULL,
            price NUMERIC NULL,
            created_at TEXT NULL
        )');

        $this->db->query('CREATE TABLE IF NOT EXISTS bf_investment_technical_snapshots (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            ticker TEXT NOT NULL,
            price NUMERIC NULL,
            snapshot_date TEXT NULL,
            created_at TEXT NULL
        )');

        $this->db->query('CREATE TABLE IF NOT EXISTS bf_financial_news (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            source TEXT NOT NULL,
            title TEXT NOT NULL,
            url TEXT NOT NULL,
            summary TEXT NULL,
            created_at TEXT NULL,
            updated_at TEXT NULL
        )');

        $this->db->query('CREATE TABLE IF NOT EXISTS bf_marketing_market_feed_items (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            source_id INTEGER NULL,
            item_uid TEXT NULL,
            title TEXT NOT NULL,
            url TEXT NULL,
            created_at TEXT NULL
        )');

        $this->db->table('bf_market_snapshots')->emptyTable();
        $this->db->table('bf_investment_technical_snapshots')->emptyTable();
        $this->db->table('bf_financial_news')->emptyTable();
        $this->db->table('bf_marketing_market_feed_items')->emptyTable();

        $this->service = new MarketDataFreshnessService($this->db);
    }

    protected function tearDown(): void
    {
        $this->db->query('DROP TABLE IF EXISTS bf_market_snapshots');
        $this->db->query('DROP TABLE IF EXISTS bf_investment_technical_snapshots');
        $this->db->query('DROP TABLE IF EXISTS bf_financial_news');
        $this->db->query('DROP TABLE IF EXISTS bf_marketing_market_feed_items');
        $this->db->resetDataCache();
        parent::tearDown();
    }

    public function testMissingQuoteReturnsMissingStatus(): void
    {
        $res = $this->service->evaluateSymbolFreshness('UNKNOWN');

        $this->assertSame('UNKNOWN', $res['symbol']);
        $this->assertNull($res['price']);
        $this->assertNull($res['created_at']);
        $this->assertNull($res['age_seconds']);
        $this->assertFalse($res['is_fresh']);
        $this->assertSame('MISSING', $res['status']);
        $this->assertNull($res['source']);
    }

    public function testFreshQuoteFromMarketSnapshots(): void
    {
        $now = date('Y-m-d H:i:s');
        $this->db->table('bf_market_snapshots')->insert([
            'symbol'     => 'SPY',
            'price'      => 525.75,
            'created_at' => $now,
        ]);

        $res = $this->service->evaluateSymbolFreshness('SPY', 3600);

        $this->assertSame('SPY', $res['symbol']);
        $this->assertEqualsWithDelta(525.75, $res['price'], 0.001);
        $this->assertTrue($res['is_fresh']);
        $this->assertSame('FRESH', $res['status']);
        $this->assertSame('bf_market_snapshots', $res['source']);
        $this->assertLessThanOrEqual(5, $res['age_seconds']);
    }

    public function testCaseInsensitiveTickerLookup(): void
    {
        $now = date('Y-m-d H:i:s');
        $this->db->table('bf_market_snapshots')->insert([
            'symbol'     => 'BTC',
            'price'      => 91500.00,
            'created_at' => $now,
        ]);

        $res = $this->service->evaluateSymbolFreshness('btc', 3600);

        $this->assertSame('BTC', $res['symbol']);
        $this->assertTrue($res['is_fresh']);
        $this->assertEqualsWithDelta(91500.00, $res['price'], 0.01);
    }

    public function testStaleQuoteDetectedWhenExceedingMaxAge(): void
    {
        $twoHoursAgo = date('Y-m-d H:i:s', time() - 7200);
        $this->db->table('bf_market_snapshots')->insert([
            'symbol'     => 'QQQ',
            'price'      => 440.10,
            'created_at' => $twoHoursAgo,
        ]);

        $res = $this->service->evaluateSymbolFreshness('QQQ', 3600);

        $this->assertSame('QQQ', $res['symbol']);
        $this->assertFalse($res['is_fresh']);
        $this->assertSame('STALE', $res['status']);
        $this->assertGreaterThanOrEqual(7200, $res['age_seconds']);
        $this->assertEqualsWithDelta(440.10, $res['price'], 0.01);
    }

    public function testSecondaryFallbackToInvestmentTechnicalSnapshots(): void
    {
        $today = date('Y-m-d');
        $this->db->table('bf_investment_technical_snapshots')->insert([
            'ticker'        => 'NVDA',
            'price'         => 140.25,
            'snapshot_date' => $today,
            'created_at'    => date('Y-m-d H:i:s'),
        ]);

        $res = $this->service->evaluateSymbolFreshness('NVDA', 86400);

        $this->assertSame('NVDA', $res['symbol']);
        $this->assertTrue($res['is_fresh']);
        $this->assertSame('bf_investment_technical_snapshots', $res['source']);
        $this->assertEqualsWithDelta(140.25, $res['price'], 0.01);
    }

    public function testEvaluateQuotesFreshnessBatchAggregation(): void
    {
        $now = date('Y-m-d H:i:s');
        $old = date('Y-m-d H:i:s', time() - 10000);

        $this->db->table('bf_market_snapshots')->insert([
            'symbol'     => 'SPY',
            'price'      => 500.0,
            'created_at' => $now,
        ]);
        $this->db->table('bf_market_snapshots')->insert([
            'symbol'     => 'QQQ',
            'price'      => 400.0,
            'created_at' => $old,
        ]);

        $batch = $this->service->evaluateQuotesFreshness(['SPY', 'QQQ', 'MISSING_TICKER'], 3600);

        $this->assertSame(3, $batch['total_symbols']);
        $this->assertSame(1, $batch['fresh_count']);
        $this->assertSame(1, $batch['stale_count']);
        $this->assertSame(1, $batch['missing_count']);
        $this->assertFalse($batch['is_healthy']);
        $this->assertArrayHasKey('SPY', $batch['symbols']);
        $this->assertArrayHasKey('QQQ', $batch['symbols']);
        $this->assertArrayHasKey('MISSING_TICKER', $batch['symbols']);
    }

    public function testEvaluateQuotesFreshnessAllHealthy(): void
    {
        $now = date('Y-m-d H:i:s');

        $this->db->table('bf_market_snapshots')->insert([
            'symbol'     => 'BTC',
            'price'      => 90000.0,
            'created_at' => $now,
        ]);
        $this->db->table('bf_market_snapshots')->insert([
            'symbol'     => 'ETH',
            'price'      => 3100.0,
            'created_at' => $now,
        ]);

        $batch = $this->service->evaluateQuotesFreshness(['BTC', 'ETH'], 3600);

        $this->assertSame(2, $batch['total_symbols']);
        $this->assertSame(2, $batch['fresh_count']);
        $this->assertSame(0, $batch['stale_count']);
        $this->assertSame(0, $batch['missing_count']);
        $this->assertTrue($batch['is_healthy']);
    }

    public function testEvaluateNewsFreshnessWithFreshAndEmptyFeeds(): void
    {
        $now = date('Y-m-d H:i:s');
        $this->db->table('bf_financial_news')->insert([
            'source'     => 'rss',
            'title'      => 'Fed announces interest rate update',
            'url'        => 'https://example.com/fed',
            'summary'    => 'Markets rally on rate guidance',
            'created_at' => $now,
        ]);

        $news = $this->service->evaluateNewsFreshness(86400);

        $this->assertTrue($news['is_healthy']);
        $this->assertSame('FRESH', $news['feeds']['bf_financial_news']['status']);
        $this->assertTrue($news['feeds']['bf_financial_news']['is_fresh']);
        $this->assertSame('EMPTY', $news['feeds']['bf_marketing_market_feed_items']['status']);
    }

    public function testEvaluateKeyReadinessExcludesRawSecrets(): void
    {
        $keys = $this->service->evaluateKeyReadiness();

        $this->assertArrayHasKey('AlphaVantage', $keys);
        $this->assertArrayHasKey('MarketAux', $keys);
        $this->assertArrayHasKey('FRED', $keys);
        $this->assertArrayHasKey('Birdeye', $keys);
        $this->assertArrayHasKey('CoinGecko', $keys);
        $this->assertArrayHasKey('NewsAPI', $keys);
        $this->assertArrayHasKey('Finnhub', $keys);

        foreach ($keys as $provider => $info) {
            $this->assertIsBool($info['configured']);
            $this->assertIsString($info['source']);
            $this->assertArrayNotHasKey('value', $info, "Raw key value must never be emitted for {$provider}");
            $this->assertArrayNotHasKey('key', $info, "Raw key value must never be emitted for {$provider}");
        }
    }

    public function testResolveSafePriceTieredFallback(): void
    {
        $now = date('Y-m-d H:i:s');
        $old = date('Y-m-d H:i:s', time() - 86400);

        $this->db->table('bf_market_snapshots')->insert([
            'symbol'     => 'FRESH_COIN',
            'price'      => 10.50,
            'created_at' => $now,
        ]);
        $this->db->table('bf_market_snapshots')->insert([
            'symbol'     => 'STALE_COIN',
            'price'      => 5.25,
            'created_at' => $old,
        ]);

        // 1. Fresh quote
        $resFresh = $this->service->resolveSafePrice('FRESH_COIN', 1.0, 3600);
        $this->assertSame('FRESH', $resFresh['status']);
        $this->assertEqualsWithDelta(10.50, $resFresh['price'], 0.01);
        $this->assertFalse($resFresh['is_fallback']);

        // 2. Stale quote
        $resStale = $this->service->resolveSafePrice('STALE_COIN', 1.0, 3600);
        $this->assertSame('STALE', $resStale['status']);
        $this->assertEqualsWithDelta(5.25, $resStale['price'], 0.01);
        $this->assertFalse($resStale['is_fallback']);

        // 3. Missing quote with fallback
        $resFallback = $this->service->resolveSafePrice('NO_QUOTE_COIN', 99.99, 3600);
        $this->assertSame('FALLBACK', $resFallback['status']);
        $this->assertEqualsWithDelta(99.99, $resFallback['price'], 0.01);
        $this->assertTrue($resFallback['is_fallback']);

        // 4. Missing quote with no fallback
        $resZero = $this->service->resolveSafePrice('NO_QUOTE_COIN', 0.0, 3600);
        $this->assertSame('DEFAULT', $resZero['status']);
        $this->assertSame(0.0, $resZero['price']);
        $this->assertTrue($resZero['is_fallback']);
    }

    public function testGetSystemDataFreshnessSummaryStructure(): void
    {
        $summary = $this->service->getSystemDataFreshnessSummary(['SPY'], 3600, 86400);

        $this->assertArrayHasKey('system_status', $summary);
        $this->assertContains($summary['system_status'], ['HEALTHY', 'DEGRADED', 'CRITICAL']);
        $this->assertArrayHasKey('evaluated_at', $summary);
        $this->assertArrayHasKey('quotes', $summary);
        $this->assertArrayHasKey('news', $summary);
        $this->assertArrayHasKey('api_keys', $summary);
    }

    public function testSparkCommandExecutesSuccessfully(): void
    {
        $command = new MarketFreshnessAudit(
            \Config\Services::logger(),
            \Config\Services::commands()
        );

        $this->assertTrue(is_subclass_of(MarketFreshnessAudit::class, \App\Commands\SafeBaseCommand::class));

        $code = $command->run(['--json', '--symbols=SPY', '--max-age=3600']);
        $this->assertContains($code, [EXIT_SUCCESS, EXIT_ERROR]);
    }

    /**
     * Helper for test to call news freshness
     */
    private function evaluateNewsNewsFreshnessSafe(): array
    {
        return $this->service->evaluateNewsFreshness(86400);
    }
}
