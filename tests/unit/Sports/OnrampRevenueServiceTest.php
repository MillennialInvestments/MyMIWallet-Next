<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Database\Migrations\CreatePredictionsAndGamificationTables;
use App\Modules\Sports\Libraries\OnrampRevenueService;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;

require_once APPPATH . 'Database/Migrations/2026-11-27-000500_CreatePredictionsAndGamificationTables.php';

final class OnrampRevenueServiceTest extends CIUnitTestCase
{
    private OnrampRevenueService $service;
    private string $prefix = '';

    protected function setUp(): void
    {
        parent::setUp();
        $db = Database::connect();
        $this->prefix = $db->getPrefix();
        $db->setPrefix('');
        $db->resetDataCache();

        (new CreatePredictionsAndGamificationTables(Database::forge()))->up();
        $db->resetDataCache();

        $this->service = new OnrampRevenueService($db);
    }

    protected function tearDown(): void
    {
        (new CreatePredictionsAndGamificationTables(Database::forge()))->down();
        Database::connect()->setPrefix($this->prefix);
        Database::connect()->resetDataCache();
        parent::tearDown();
    }

    public function testOnrampConfig(): void
    {
        $config = $this->service->getOnrampConfig(1);
        $this->assertArrayHasKey('supported_providers', $config);
        $this->assertArrayHasKey('supported_assets', $config);
        $this->assertSame(1.0, (float) $config['rev_share_pct']);
    }

    public function testGenerateOnrampUrlAndRevShare(): void
    {
        $userId = 101;
        $cleanWallet = '0xCleanUserSelfCustodyWallet9876543210';

        $session = $this->service->generateOnrampUrl($userId, 'USDC', $cleanWallet, 500.00, 'moonpay');

        $this->assertStringContainsString('buy.moonpay.com', $session['checkout_url']);
        $this->assertSame(500.00, $session['fiat_amount']);
        // 1% rev share on $500 = $5.00
        $this->assertEqualsWithDelta(5.00, $session['platform_fee_earned'], 0.01);

        $txs = $this->service->listUserTransactions($userId);
        $this->assertCount(1, $txs);
        $this->assertSame($cleanWallet, $txs[0]['destination_wallet']);
        $this->assertSame(1, (int) $txs[0]['sanctions_cleared']);
    }

    public function testSubMillisecondSanctionsBlock(): void
    {
        $userId = 101;
        $sanctionedWallet = '0x7F367740f9273c52Aad32b3506B628B597B090b8';

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('AUTH_FAIL: sanctions_block');

        $this->service->generateOnrampUrl($userId, 'USDC', $sanctionedWallet, 200.00);
    }
}
