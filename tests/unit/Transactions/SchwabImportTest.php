<?php

declare(strict_types=1);

namespace Tests\Unit\Transactions;

use App\Libraries\Trades\OCCSymbolParser;
use App\Models\InvestmentModel;
use App\Services\TradeImportService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * W3 Broker Execution Ledger & Schwab Import Tests:
 * Validates Schwab and OCC trade export normalization using November 2026
 * fixtures (IREN, MARA, KSS, SLS) without storing personal customer identifiers.
 *
 * @internal
 */
final class SchwabImportTest extends CIUnitTestCase
{
    private const TEST_USER_ID = 8801;

    protected function setUp(): void
    {
        parent::setUp();

        $db = db_connect();
        $db->resetDataCache();

        $db->query('CREATE TABLE IF NOT EXISTS bf_users_trades (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            symbol TEXT NOT NULL,
            shares NUMERIC NOT NULL,
            entry_price NUMERIC NOT NULL,
            current_price NUMERIC NULL,
            total_trade_cost NUMERIC NULL,
            total_trade_costs NUMERIC NULL,
            net_gains NUMERIC NULL,
            order_status TEXT NOT NULL,
            trade_type TEXT NULL,
            position_type TEXT NULL,
            open_date TEXT NULL,
            open_time TEXT NULL,
            submitted_date TEXT NULL,
            created_on TEXT NULL,
            modified_on TEXT NULL,
            created_by INTEGER NULL,
            modified_by INTEGER NULL,
            status TEXT DEFAULT "Active",
            active INTEGER DEFAULT 1,
            closed TEXT DEFAULT "false",
            json_user_fields TEXT NULL
        )');

        $db->table('bf_users_trades')->where('user_id', self::TEST_USER_ID)->delete();
    }

    protected function tearDown(): void
    {
        $db = db_connect();
        $db->table('bf_users_trades')->where('user_id', self::TEST_USER_ID)->delete();
        $db->resetDataCache();
        parent::tearDown();
    }

    /**
     * Test OCC Symbol Parser across standard 21-char and human formats.
     */
    public function testOccSymbolParserResolvesContracts(): void
    {
        // 1. IREN 21-char OCC Call
        $iren = OCCSymbolParser::parse('IREN  261120C00015000');
        $this->assertNotNull($iren);
        $this->assertSame('IREN', $iren['underlying']);
        $this->assertSame('2026-11-20', $iren['expiration']);
        $this->assertSame('CALL', $iren['option_type']);
        $this->assertSame(15.00, $iren['strike']);
        $this->assertSame(100, $iren['multiplier']);

        // 2. MARA Schwab formatted Put
        $mara = OCCSymbolParser::parse('MARA 11/20/2026 22.00 Put');
        $this->assertNotNull($mara);
        $this->assertSame('MARA', $mara['underlying']);
        $this->assertSame('2026-11-20', $mara['expiration']);
        $this->assertSame('PUT', $mara['option_type']);
        $this->assertSame(22.00, $mara['strike']);

        // 3. KSS standard 21-char OCC Call
        $kss = OCCSymbolParser::parse('KSS   261120C00018000');
        $this->assertNotNull($kss);
        $this->assertSame('KSS', $kss['underlying']);
        $this->assertSame('2026-11-20', $kss['expiration']);
        $this->assertSame('CALL', $kss['option_type']);
        $this->assertSame(18.00, $kss['strike']);

        // 4. SLS $2.00 Call
        $sls = OCCSymbolParser::parse('SLS   261120C00002000');
        $this->assertNotNull($sls);
        $this->assertSame('SLS', $sls['underlying']);
        $this->assertSame('2026-11-20', $sls['expiration']);
        $this->assertSame('CALL', $sls['option_type']);
        $this->assertSame(2.00, $sls['strike']);
    }

    /**
     * Test parsing a Schwab options export CSV containing November 2026 fixtures.
     */
    public function testParseSchwabOptionsCsv(): void
    {
        $csvContent = implode("\n", [
            'Date,Action,Symbol,Description,Quantity,Price,Fees & Comm,Amount,Order ID',
            '11/16/2026,Buy to Open,IREN,IREN 11/20/2026 15.00 C,1,$0.95,$0.65,$95.65,SCHW-1001',
            '11/16/2026,Buy to Open,IREN,IREN 11/20/2026 13.50 P,1,$0.95,$0.65,$95.65,SCHW-1002',
            '11/16/2026,Buy to Open,MARA,MARA 11/20/2026 22.00 C,2,$1.35,$1.30,$271.30,SCHW-1003',
            '11/16/2026,Buy to Open,MARA,MARA 11/20/2026 22.00 P,2,$1.35,$1.30,$271.30,SCHW-1004',
            '11/17/2026,Buy to Open,KSS,KSS 11/20/2026 18.00 C,1,$1.20,$0.65,$120.65,SCHW-1005',
            '11/17/2026,Sell to Open,KSS,KSS 11/20/2026 21.00 C,1,$0.40,$0.65,$39.35,SCHW-1006',
            '11/18/2026,Buy to Open,SLS,SLS 11/20/2026 2.00 C,5,$0.35,$3.25,$178.25,SCHW-1007',
        ]);

        $service = new TradeImportService();
        $parsed = $service->parseCsv($csvContent);

        $this->assertEmpty($parsed['errors']);
        $this->assertCount(7, $parsed['trades']);

        // Inspect IREN Call trade
        $irenCall = $parsed['trades'][0];
        $this->assertSame('IREN', $irenCall['symbol']);
        $this->assertSame('CALL', $irenCall['trade_type']);
        $this->assertSame('option_buy', $irenCall['category']);
        $this->assertSame('BUY', $irenCall['position_type']);
        $this->assertSame('Open', $irenCall['order_status']);
        $this->assertSame(15.00, $irenCall['strike']);
        $this->assertSame('2026-11-20', $irenCall['expiration']);
        $this->assertSame('SCHW-1001', $irenCall['order_id']);
        $this->assertSame(0.65, $irenCall['total_fees']);
        $this->assertSame(95.65, $irenCall['total_trade_costs']);

        // Inspect KSS Short Call leg (Sell to Open)
        $kssShort = $parsed['trades'][5];
        $this->assertSame('KSS', $kssShort['symbol']);
        $this->assertSame('CALL', $kssShort['trade_type']);
        $this->assertSame('SELL', $kssShort['position_type']);
        $this->assertSame('Open', $kssShort['order_status']);
        $this->assertSame('option_sell', $kssShort['category']);
        $this->assertSame(21.00, $kssShort['strike']);
        $this->assertSame('SCHW-1006', $kssShort['order_id']);
    }

    /**
     * Test idempotent import preserves legitimate repeated fills at the same price.
     */
    public function testLegitimateRepeatedFillsAreNotDiscarded(): void
    {
        $csvContent = implode("\n", [
            'Date,Action,Symbol,Quantity,Price,Order ID',
            '2026-11-20,BUY,NVDA,50,140.00,FILL-001',
            '2026-11-20,BUY,NVDA,50,140.00,FILL-002', // Same date & price, distinct fill order ID
            '2026-11-20,BUY,NVDA,50,140.00,FILL-001', // Exact duplicate of FILL-001 -> MUST be deduplicated
        ]);

        $service = new TradeImportService();
        $parsed = $service->parseCsv($csvContent);
        $this->assertCount(3, $parsed['trades']);

        $res = $service->importTrades(self::TEST_USER_ID, $parsed['trades'], true);

        $this->assertTrue($res['success']);
        $this->assertSame(2, $res['imported_count'], 'Should import 2 distinct fills (FILL-001 and FILL-002).');
        $this->assertSame(1, $res['duplicate_count'], 'Should deduplicate the exact re-submission of FILL-001.');
    }
}
