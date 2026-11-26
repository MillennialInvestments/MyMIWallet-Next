<?php

declare(strict_types=1);

namespace Tests\Unit\Exchange;

use App\Commands\Exchange\Reconcile;
use App\Services\ExchangeService;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;
use Config\Features;

require_once APPPATH . 'Database/Migrations/2026-11-22-000100_CreateExchangeOrderTables.php';
use App\Database\Migrations\CreateExchangeOrderTables;

class ExchangeOrdersBalancesTest extends CIUnitTestCase
{
    protected $db;
    protected ExchangeService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->db = Database::connect();

        // Ensure tables exist using migration
        $migration = new CreateExchangeOrderTables(Database::forge($this->db));
        $migration->up();

        // Clean tables for isolated tests
        $this->db->table('bf_exchanges_orders')->emptyTable();
        $this->db->table('bf_exchanges_balances')->emptyTable();
        $this->db->table('bf_exchanges_trades')->emptyTable();

        $this->service = new ExchangeService($this->db);
    }

    protected function tearDown(): void
    {
        $this->db->table('bf_exchanges_orders')->emptyTable();
        $this->db->table('bf_exchanges_balances')->emptyTable();
        $this->db->table('bf_exchanges_trades')->emptyTable();
        parent::tearDown();
    }

    public function testDepositAndBalanceRetrieval(): void
    {
        $userId = 101;
        $initial = $this->service->getExchangeBalance($userId, 'USD');

        $this->assertSame($userId, $initial['user_id']);
        $this->assertSame('USD', $initial['currency']);
        $this->assertEquals(0.0, $initial['available_balance']);
        $this->assertEquals(0.0, $initial['hold_balance']);

        $updated = $this->service->depositBalance($userId, 500.50, 'USD');
        $this->assertEquals(500.50, $updated['available_balance']);
        $this->assertEquals(0.0, $updated['hold_balance']);
        $this->assertEquals(500.50, $updated['total_balance']);
    }

    public function testHoldAndReleaseBalance(): void
    {
        $userId = 102;
        $this->service->depositBalance($userId, 1000.00, 'USD');

        // Hold 300
        $held = $this->service->holdBalance($userId, 300.00, 'USD');
        $this->assertTrue($held);

        $balAfterHold = $this->service->getExchangeBalance($userId, 'USD');
        $this->assertEquals(700.00, $balAfterHold['available_balance']);
        $this->assertEquals(300.00, $balAfterHold['hold_balance']);
        $this->assertEquals(1000.00, $balAfterHold['total_balance']);

        // Release 100
        $released = $this->service->releaseHold($userId, 100.00, 'USD');
        $this->assertTrue($released);

        $balAfterRelease = $this->service->getExchangeBalance($userId, 'USD');
        $this->assertEquals(800.00, $balAfterRelease['available_balance']);
        $this->assertEquals(200.00, $balAfterRelease['hold_balance']);
    }

    public function testPlaceBuyOrderInsufficientBalance(): void
    {
        $userId = 103;
        // User has only $10
        $this->service->depositBalance($userId, 10.00, 'USD');

        $result = $this->service->placeOrder([
            'trade_type'  => 'Buy',
            'symbol'      => 'MYMI',
            'market_pair' => 'USD',
            'amount'      => 100.0,
            'price'       => 1.50, // requires $150 + $0.15 fee
        ], $userId);

        $this->assertSame('rejected', $result['status']);
        $this->assertSame('insufficient_balance', $result['reason']);

        // Verify no order was created
        $count = $this->db->table('bf_exchanges_orders')->where('user_id', $userId)->countAllResults();
        $this->assertSame(0, $count);
    }

    public function testPlaceBuyOrderSuccessAndHold(): void
    {
        $userId = 104;
        $this->service->depositBalance($userId, 200.00, 'USD');

        $result = $this->service->placeOrder([
            'trade_type'  => 'Buy',
            'symbol'      => 'MYMI',
            'market_pair' => 'USD',
            'amount'      => 100.0,
            'price'       => 1.50, // totalCost = 150.0, fee = 0.15 -> total hold = 150.15
        ], $userId);

        $this->assertSame('success', $result['status']);
        $this->assertGreaterThan(0, $result['order_id']);

        // Check hold was placed on USD balance
        $bal = $this->service->getExchangeBalance($userId, 'USD');
        $this->assertEquals(49.85, $bal['available_balance']);
        $this->assertEquals(150.15, $bal['hold_balance']);

        // Check order status in DB
        $order = $this->db->table('bf_exchanges_orders')->where('id', $result['order_id'])->get()->getRowArray();
        $this->assertSame('Open', $order['status']);
        $this->assertEquals(100.0, (float) $order['amount']);
        $this->assertEquals(100.0, (float) $order['remaining_amount']);
        $this->assertEquals(0.0, (float) $order['filled_amount']);
    }

    public function testPlaceSellOrderInsufficientBalance(): void
    {
        $userId = 105;
        // User has 5 MYMI
        $this->service->depositBalance($userId, 5.0, 'MYMI');

        $result = $this->service->placeOrder([
            'trade_type'  => 'Sell',
            'symbol'      => 'MYMI',
            'market_pair' => 'USD',
            'amount'      => 50.0, // asks to sell 50
            'price'       => 2.00,
        ], $userId);

        $this->assertSame('rejected', $result['status']);
        $this->assertSame('insufficient_asset_balance', $result['reason']);
    }

    public function testPlaceSellOrderSuccessAndHold(): void
    {
        $userId = 106;
        $this->service->depositBalance($userId, 100.0, 'MYMI');

        $result = $this->service->placeOrder([
            'trade_type'  => 'Sell',
            'symbol'      => 'MYMI',
            'market_pair' => 'USD',
            'amount'      => 50.0,
            'price'       => 2.00,
        ], $userId);

        $this->assertSame('success', $result['status']);
        $bal = $this->service->getExchangeBalance($userId, 'MYMI');
        $this->assertEquals(50.0, $bal['available_balance']);
        $this->assertEquals(50.0, $bal['hold_balance']);
    }

    public function testCancelOrderReleasesHold(): void
    {
        $userId = 107;
        $this->service->depositBalance($userId, 500.00, 'USD');

        $placed = $this->service->placeOrder([
            'trade_type'  => 'Buy',
            'symbol'      => 'MYMI',
            'market_pair' => 'USD',
            'amount'      => 100.0,
            'price'       => 2.00, // hold = 200.20
        ], $userId);

        $orderId = (int) $placed['order_id'];

        $cancelResult = $this->service->cancelOrder($orderId, $userId);
        $this->assertSame('success', $cancelResult['status']);
        $this->assertEquals(200.20, $cancelResult['released_amount']);

        // Verify balance restored
        $bal = $this->service->getExchangeBalance($userId, 'USD');
        $this->assertEquals(500.00, $bal['available_balance']);
        $this->assertEquals(0.0, $bal['hold_balance']);

        // Verify order status cancelled
        $order = $this->db->table('bf_exchanges_orders')->where('id', $orderId)->get()->getRowArray();
        $this->assertSame('Cancelled', $order['status']);
        $this->assertEquals(0.0, (float) $order['remaining_amount']);
    }

    public function testCancelOrderIdorProtection(): void
    {
        $ownerId = 108;
        $attackerId = 999;

        $this->service->depositBalance($ownerId, 500.00, 'USD');
        $placed = $this->service->placeOrder([
            'trade_type'  => 'Buy',
            'symbol'      => 'MYMI',
            'market_pair' => 'USD',
            'amount'      => 50.0,
            'price'       => 1.00,
        ], $ownerId);

        $orderId = (int) $placed['order_id'];

        // Attacker attempts to cancel owner's order
        $this->expectException(PageNotFoundException::class);
        $this->service->cancelOrder($orderId, $attackerId);
    }

    public function testCancelAlreadyCancelledOrderFails(): void
    {
        $userId = 109;
        $this->service->depositBalance($userId, 500.00, 'USD');
        $placed = $this->service->placeOrder([
            'trade_type'  => 'Buy',
            'symbol'      => 'MYMI',
            'market_pair' => 'USD',
            'amount'      => 50.0,
            'price'       => 1.00,
        ], $userId);

        $orderId = (int) $placed['order_id'];
        $this->service->cancelOrder($orderId, $userId);

        // Second cancellation attempt
        $second = $this->service->cancelOrder($orderId, $userId);
        $this->assertSame('error', $second['status']);
        $this->assertStringContainsString('cannot be cancelled', $second['message']);
    }

    public function testTradeMatchExecution(): void
    {
        $buyerId  = 201;
        $sellerId = 202;

        // Buyer deposits $300 USD
        $this->service->depositBalance($buyerId, 300.00, 'USD');
        // Seller deposits 100 MYMI
        $this->service->depositBalance($sellerId, 100.0, 'MYMI');

        // Buyer places Buy 50 MYMI @ $2.00
        $buyPlaced = $this->service->placeOrder([
            'trade_type'  => 'Buy',
            'symbol'      => 'MYMI',
            'market_pair' => 'USD',
            'amount'      => 50.0,
            'price'       => 2.00,
        ], $buyerId);

        // Seller places Sell 50 MYMI @ $2.00
        $sellPlaced = $this->service->placeOrder([
            'trade_type'  => 'Sell',
            'symbol'      => 'MYMI',
            'market_pair' => 'USD',
            'amount'      => 50.0,
            'price'       => 2.00,
        ], $sellerId);

        $matchResult = $this->service->executeTradeMatch((int) $buyPlaced['order_id'], (int) $sellPlaced['order_id']);

        $this->assertSame('success', $matchResult['status']);
        $this->assertEquals(50.0, $matchResult['matched_quantity']);
        $this->assertEquals(2.00, $matchResult['execution_price']);
        $this->assertEquals(100.00, $matchResult['execution_cost']);
        $this->assertSame('Closed', $matchResult['buy_status']);
        $this->assertSame('Closed', $matchResult['sell_status']);

        // Buyer balance checks: received 50 MYMI, spent $100.10 USD
        $buyerMymi = $this->service->getExchangeBalance($buyerId, 'MYMI');
        $this->assertEquals(50.0, $buyerMymi['available_balance']);

        $buyerUsd = $this->service->getExchangeBalance($buyerId, 'USD');
        $this->assertEquals(199.90, $buyerUsd['available_balance']);
        $this->assertEquals(0.0, $buyerUsd['hold_balance']);

        // Seller balance checks: spent 50 MYMI, received $99.90 USD (after $0.10 fee)
        $sellerMymi = $this->service->getExchangeBalance($sellerId, 'MYMI');
        $this->assertEquals(50.0, $sellerMymi['available_balance']);
        $this->assertEquals(0.0, $sellerMymi['hold_balance']);

        $sellerUsd = $this->service->getExchangeBalance($sellerId, 'USD');
        $this->assertEquals(99.90, $sellerUsd['available_balance']);

        // Trade audit record in bf_exchanges_trades
        $tradeCount = $this->db->table('bf_exchanges_trades')->countAllResults();
        $this->assertSame(1, $tradeCount);
    }

    public function testReconciliationCleanPass(): void
    {
        $userId = 301;
        $this->service->depositBalance($userId, 1000.00, 'USD');
        $this->service->placeOrder([
            'trade_type'  => 'Buy',
            'symbol'      => 'MYMI',
            'market_pair' => 'USD',
            'amount'      => 10.0,
            'price'       => 5.00,
        ], $userId);

        $report = $this->service->reconcileBalances('MYMI');

        $this->assertSame('PASS', $report['status']);
        $this->assertSame(1, $report['orders_audited']);
        $this->assertSame(1, $report['open_orders_count']);
        $this->assertSame(0, $report['discrepancies_count']);
        $this->assertSame(0, $report['negative_balances_count']);
    }

    public function testReconciliationDetectsDiscrepancies(): void
    {
        // Insert a corrupt order directly: filled + remaining does not equal amount
        $this->db->table('bf_exchanges_orders')->insert([
            'user_id'          => 401,
            'trade_type'       => 'Buy',
            'market_pair'      => 'USD',
            'market'           => 'MYMI',
            'amount'           => 100.0,
            'price'            => 1.0,
            'total'            => 100.0,
            'total_cost'       => 100.0,
            'fees'             => 0.1,
            'filled_amount'    => 20.0,
            'remaining_amount' => 50.0, // 20 + 50 = 70 != 100!
            'status'           => 'Open',
        ]);

        // Insert a corrupt negative balance
        $this->db->table('bf_exchanges_balances')->insert([
            'user_id'           => 402,
            'currency'          => 'USD',
            'available_balance' => -25.00, // Negative!
            'hold_balance'      => 0.00,
        ]);

        $report = $this->service->reconcileBalances();

        $this->assertSame('FAIL', $report['status']);
        $this->assertGreaterThan(0, $report['discrepancies_count']);
        $this->assertGreaterThan(0, $report['negative_balances_count']);
    }

    public function testFeatureFlagBlocksTradingWhenOff(): void
    {
        $features = new Features();
        $this->assertFalse($features->enabled('FEATURE_EXCHANGE_TRADING'));
    }

    public function testSparkReconcileCommandExecution(): void
    {
        $command = new Reconcile(service('logger'), service('commands'));
        $code = $command->run(['json' => true]);

        $this->assertSame(0, $code);

        $report = $this->service->reconcileBalances();
        $this->assertSame('PASS', $report['status']);
        $this->assertArrayHasKey('orders_audited', $report);
        $this->assertArrayHasKey('discrepancies', $report);
    }
}
