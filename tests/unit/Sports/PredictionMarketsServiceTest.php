<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Database\Migrations\CreatePredictionsAndGamificationTables;
use App\Modules\Sports\Libraries\PredictionMarketsService;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;

require_once APPPATH . 'Database/Migrations/2026-11-27-000500_CreatePredictionsAndGamificationTables.php';

final class PredictionMarketsServiceTest extends CIUnitTestCase
{
    private PredictionMarketsService $service;
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

        $this->service = new PredictionMarketsService($db);
    }

    protected function tearDown(): void
    {
        (new CreatePredictionsAndGamificationTables(Database::forge()))->down();
        Database::connect()->setPrefix($this->prefix);
        Database::connect()->resetDataCache();
        parent::tearDown();
    }

    public function testTablesReadyAndSampleMarkets(): void
    {
        $this->assertTrue($this->service->tablesReady());

        $markets = $this->service->listMarkets();
        $this->assertNotEmpty($markets);
        $this->assertGreaterThanOrEqual(4, count($markets));

        $first = $markets[0];
        $this->assertArrayHasKey('yes_price', $first);
        $this->assertArrayHasKey('no_price', $first);
        $this->assertArrayHasKey('category', $first);
    }

    public function testPrepareUnsignedOrderAndPlatformFee(): void
    {
        $userId = 42;
        $markets = $this->service->listMarkets();
        $marketId = (int) $markets[0]['id'];

        $order = $this->service->prepareOrder($userId, $marketId, 'YES', 100.00, '0xUserWalletAddress123');

        $this->assertGreaterThan(0, $order['order_id']);
        $this->assertSame(100.0, $order['amount_usdc']);
        // 0.50% fee on $100 = $0.50
        $this->assertEqualsWithDelta(0.50, $order['platform_fee_usd'], 0.01);
        $this->assertArrayHasKey('unsigned_tx', $order);
        $this->assertSame('USDC', $order['unsigned_tx']['asset']);

        // Confirm order with tx hash
        $confirmed = $this->service->confirmOrder($userId, (int) $order['order_id'], '0xabc123txhash');
        $this->assertTrue($confirmed);

        $userOrders = $this->service->listUserOrders($userId);
        $this->assertCount(1, $userOrders);
        $this->assertSame('confirmed', $userOrders[0]['status']);
        $this->assertSame('0xabc123txhash', $userOrders[0]['tx_signature']);
    }

    public function testFailClosedUserIsolation(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->service->prepareOrder(0, 1, 'YES', 50.00);
    }
}
