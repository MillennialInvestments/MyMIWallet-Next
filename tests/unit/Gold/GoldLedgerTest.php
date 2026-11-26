<?php

declare(strict_types=1);

namespace Tests\Unit\Gold;

use App\Database\Migrations\CreateGoldLedger;
use App\Services\Gold\GoldLedgerService;
use App\Services\Gold\GoldPricing;
use CodeIgniter\Test\CIUnitTestCase;

if (! defined('TESTPATH')) {
    require_once __DIR__ . '/../../_support/bootstrap.php';
}

require_once APPPATH . 'Database/Migrations/2026-11-25-000200_CreateGoldLedger.php';

final class GoldLedgerTest extends CIUnitTestCase
{
    private GoldLedgerService $service;
    private $sqlite;

    protected function setUp(): void
    {
        parent::setUp();

        $this->sqlite = \Config\Database::connect([
            'DSN' => '', 'hostname' => '', 'username' => '', 'password' => '', 'database' => ':memory:',
            'DBDriver' => 'SQLite3', 'DBPrefix' => '', 'pConnect' => false, 'DBDebug' => true, 'charset' => 'utf8',
            'DBCollat' => '', 'swapPre' => '', 'encrypt' => false, 'compress' => false, 'strictOn' => false,
            'failover' => [], 'port' => 0, 'foreignKeys' => true, 'busyTimeout' => 1000
        ], false);

        $migration = new CreateGoldLedger(\Config\Database::forge($this->sqlite));
        $migration->up();

        $this->service = new GoldLedgerService($this->sqlite);
    }

    public function testCreditIncreasesBalanceAndChainsHashes(): void
    {
        $userId = 99101;

        $res1 = $this->service->credit($userId, 100.0, 'purchase', 'crypto_pay', 'CHK-G1');
        $this->assertTrue($res1['ok']);
        $this->assertSame(100.0, $res1['balance']);
        $this->assertSame(100.0, $this->service->getBalance($userId));

        $res2 = $this->service->credit($userId, 50.0, 'admin_credit', 'admin', 'ADM-G2');
        $this->assertTrue($res2['ok']);
        $this->assertSame(150.0, $res2['balance']);
        $this->assertSame(150.0, $this->service->getBalance($userId));

        // Verify entries in database and hash chaining
        $rows = $this->sqlite->table('bf_gold_ledger')
            ->where('user_id', $userId)
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();

        $this->assertCount(2, $rows);
        $this->assertSame('', $rows[0]['prev_hash']);
        $this->assertNotEmpty($rows[0]['hash']);
        $this->assertSame($rows[0]['hash'], $rows[1]['prev_hash']);
    }

    public function testSpendReducesBalanceAndRefusesNegative(): void
    {
        $userId = 99102;
        $this->service->credit($userId, 100.0, 'purchase', 'crypto_pay', 'CHK-G10');

        $spend1 = $this->service->spend($userId, 40.0, 'service_spend', 'SRV-001');
        $this->assertTrue($spend1['ok']);
        $this->assertSame(60.0, $spend1['balance']);
        $this->assertSame(60.0, $this->service->getBalance($userId));

        // Over-spend refusal: balance cannot go negative
        $spendOver = $this->service->spend($userId, 70.0, 'service_spend', 'SRV-002');
        $this->assertFalse($spendOver['ok']);
        $this->assertSame('insufficient_gold_balance', $spendOver['error']);
        $this->assertSame(60.0, $this->service->getBalance($userId)); // unchanged
    }

    public function testIdempotentRetriesDoNotDoubleMutate(): void
    {
        $userId = 99103;

        // First credit
        $res1 = $this->service->credit($userId, 50.0, 'purchase', 'paypal', 'PAYPAL-TX-123');
        $this->assertTrue($res1['ok']);
        $this->assertFalse($res1['idempotent']);
        $this->assertSame(50.0, $res1['balance']);

        // Duplicate credit retry with same ref
        $res2 = $this->service->credit($userId, 50.0, 'purchase', 'paypal', 'PAYPAL-TX-123');
        $this->assertTrue($res2['ok']);
        $this->assertTrue($res2['idempotent']);
        $this->assertSame(50.0, $res2['balance']); // Balance is still 50, not 100
        $this->assertSame($res1['entry_id'], $res2['entry_id']);

        // Test duplicate spend retry
        $spend1 = $this->service->spend($userId, 20.0, 'service_spend', 'SPEND-001');
        $this->assertTrue($spend1['ok']);
        $this->assertFalse($spend1['idempotent']);
        $this->assertSame(30.0, $spend1['balance']);

        $spend2 = $this->service->spend($userId, 20.0, 'service_spend', 'SPEND-001');
        $this->assertTrue($spend2['ok']);
        $this->assertTrue($spend2['idempotent']);
        $this->assertSame(30.0, $spend2['balance']); // Still 30, not 10
    }

    public function testDailyPurchaseCapEnforced(): void
    {
        $userId = 99104;
        putenv('MYMIGOLD_DAILY_CAP_USD=1000');

        $res1 = $this->service->credit($userId, 800.0, 'purchase', 'crypto_pay', 'CHK-CAP1');
        $this->assertTrue($res1['ok']);

        // Attempting to purchase another 300 exceeds 1000 cap
        $res2 = $this->service->credit($userId, 300.0, 'purchase', 'crypto_pay', 'CHK-CAP2');
        $this->assertFalse($res2['ok']);
        $this->assertSame('daily_purchase_cap_exceeded', $res2['error']);
        $this->assertSame(800.0, $this->service->getBalance($userId));

        putenv('MYMIGOLD_DAILY_CAP_USD=2000');
    }

    public function testReportsCalculatesOutstandingDeferredRevenueAndDailyBreakdown(): void
    {
        $userA = 99201;
        $userB = 99202;

        $this->service->credit($userA, 500.0, 'purchase', 'crypto_pay', 'CHK-R1');
        $this->service->spend($userA, 100.0, 'service_spend', 'SRV-R1');
        $this->service->credit($userB, 200.0, 'purchase', 'crypto_pay', 'CHK-R2');

        $reports = $this->service->reports();

        // userA balance (400) + userB balance (200) = 600 total deferred revenue
        $this->assertSame(600.0, $reports['outstanding_balance']);
        $this->assertSame(700.0, $reports['total_purchased']);
        $this->assertSame(100.0, $reports['total_spent']);

        $today = gmdate('Y-m-d');
        $this->assertArrayHasKey($today, $reports['by_day']);
        $this->assertSame(700.0, $reports['by_day'][$today]['purchases']);
        $this->assertSame(100.0, $reports['by_day'][$today]['spends']);
    }

    public function testGoldPricingTenPercentDiscount(): void
    {
        $pricing = new GoldPricing();

        $this->assertSame(1000, $pricing->discountBps());
        $this->assertSame(0.10, $pricing->discountRate());

        // $100 service price gets 10% discount = 90 Gold
        $this->assertSame(90.0, $pricing->goldPrice(100.0));
        // $49.99 service price gets 10% discount = $44.99 Gold
        $this->assertSame(44.99, $pricing->goldPrice(49.99));
        // USD value of 1 Gold = $1.00 USD
        $this->assertSame(90.0, $pricing->usdValue(90.0));
    }
}
