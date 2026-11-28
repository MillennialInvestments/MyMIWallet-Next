<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Database\Migrations\CreatePredictionsAndGamificationTables;
use App\Database\Migrations\CreateSportsBetTrackerAndUserSettingsTables;
use App\Database\Migrations\CreateSportsPaperTradingAndScannerTables;
use App\Modules\Sports\Libraries\PredictionMarketsService;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;

require_once APPPATH . 'Database/Migrations/2026-11-27-000400_CreateSportsBetTrackerAndUserSettingsTables.php';
require_once APPPATH . 'Database/Migrations/2026-11-27-000500_CreatePredictionsAndGamificationTables.php';
require_once APPPATH . 'Database/Migrations/2026-11-28-000400_CreateSportsPaperTradingAndScannerTables.php';

/**
 * Tests for PredictionMarketsService virtual paper-trading and XP rewards.
 */
class PredictionMarketsPaperTradingTest extends CIUnitTestCase
{
    private PredictionMarketsService $service;

    protected function setUp(): void
    {
        parent::setUp();

        $db = Database::connect();
        $db->setPrefix('');
        $db->resetDataCache();

        (new CreateSportsBetTrackerAndUserSettingsTables(Database::forge()))->up();
        (new CreatePredictionsAndGamificationTables(Database::forge()))->up();
        (new CreateSportsPaperTradingAndScannerTables(Database::forge()))->up();

        $this->service = new PredictionMarketsService($db);
    }

    protected function tearDown(): void
    {
        \Config\Services::resetSingle('authentication');
        parent::tearDown();
    }

    public function testGetAndResetPaperBalance(): void
    {
        $userId = 99991;
        $balance = $this->service->getPaperBalance($userId);
        $this->assertGreaterThanOrEqual(0.0, $balance);

        $reset = $this->service->resetPaperBalance($userId);
        $this->assertSame(1000.00, $reset);
        $this->assertSame(1000.00, $this->service->getPaperBalance($userId));
    }

    public function testExecutePaperTradeSuccess(): void
    {
        $this->service->ensureSampleMarkets();
        $markets = $this->service->listMarkets();
        $this->assertNotEmpty($markets, 'Markets should be populated');

        $marketId = (int) $markets[0]['id'];
        $userId = 99992;
        $this->service->resetPaperBalance($userId);

        $result = $this->service->executePaperTrade($userId, $marketId, 'YES', 50.0);

        $this->assertTrue($result['is_paper_trade']);
        $this->assertSame('confirmed', $result['status']);
        $this->assertSame(15, $result['xp_awarded']);
        $this->assertLessThan(1000.00, (float) $result['new_balance']);
        $this->assertGreaterThan(0.0, (float) $result['shares']);

        // Check user orders filtering
        $paperOrders = $this->service->listUserOrders($userId, 'paper');
        $this->assertCount(1, $paperOrders);
        $this->assertSame('YES', $paperOrders[0]['outcome']);

        $web3Orders = $this->service->listUserOrders($userId, 'web3');
        $this->assertCount(0, $web3Orders);

        $allOrders = $this->service->listUserOrders($userId, 'all');
        $this->assertCount(1, $allOrders);
    }

    public function testExecutePaperTradeInsufficientBalanceThrows(): void
    {
        $this->expectException(\RuntimeException::class);

        $this->service->ensureSampleMarkets();
        $markets = $this->service->listMarkets();
        $marketId = (int) $markets[0]['id'];
        $userId = 99993;

        // Balance starts at 1000, attempt 5000
        $this->service->executePaperTrade($userId, $marketId, 'NO', 5000.0);
    }
}
