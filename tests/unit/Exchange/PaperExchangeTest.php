<?php

namespace Tests\Unit\Exchange;

use App\Database\Migrations\CreatePaperExchangeTables;
use App\Libraries\Exchange\Providers\PaperExchangeProvider;
use App\Libraries\Exchange\Providers\PartnerExchangeStub;
use CodeIgniter\Database\SQLite3\Connection;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;
use InvalidArgumentException;

/**
 * @internal
 */
final class PaperExchangeTest extends CIUnitTestCase
{
    protected $db;
    private PaperExchangeProvider $provider;

    protected function setUp(): void
    {
        parent::setUp();

        require_once APPPATH . 'Database/Migrations/2026-11-25-000400_CreatePaperExchangeTables.php';

        $config = config('Database');
        $sqliteConfig = [
            'DBDriver' => 'SQLite3',
            'database' => ':memory:',
            'DBPrefix' => '',
        ];
        $this->db = Database::connect($sqliteConfig);

        $forge = Database::forge($this->db);
        $migration = new CreatePaperExchangeTables($forge);
        $migration->up();

        $mockPrices = [
            'BTC/USD' => 90000.0,
            'ETH/USD' => 3000.0,
            'SOL/USD' => 200.0,
        ];

        $this->provider = new PaperExchangeProvider($this->db, null, $mockPrices);
    }

    protected function tearDown(): void
    {
        $forge = Database::forge($this->db);
        $migration = new CreatePaperExchangeTables($forge);
        $migration->down();
        $this->db->close();
        parent::tearDown();
    }

    public function testInitialFundingAndBalances(): void
    {
        $balances = $this->provider->balances(42);
        $this->assertSame(10000.0, $balances['USD']);
    }

    public function testBuyOrderExecutionAndBalances(): void
    {
        $userId = 42;
        $res = $this->provider->placeOrder($userId, [
            'symbol'   => 'BTC/USD',
            'side'     => 'buy',
            'quantity' => 0.05,
        ]);

        $this->assertTrue($res['ok']);
        $this->assertSame('filled', $res['status']);
        $this->assertSame(4500.0, $res['total_cost']);

        $balances = $this->provider->balances($userId);
        $this->assertSame(5500.0, $balances['USD']);
        $this->assertSame(0.05, $balances['BTC']);

        $history = $this->provider->history($userId);
        $this->assertCount(1, $history);
        $this->assertSame('BTC/USD', $history[0]['symbol']);
        $this->assertSame('buy', $history[0]['side']);
    }

    public function testSellOrderExecutionAndBalances(): void
    {
        $userId = 42;
        // First buy 0.05 BTC
        $this->provider->placeOrder($userId, [
            'symbol'   => 'BTC/USD',
            'side'     => 'buy',
            'quantity' => 0.05,
        ]);

        // Then sell 0.02 BTC
        $res = $this->provider->placeOrder($userId, [
            'symbol'   => 'BTC/USD',
            'side'     => 'sell',
            'quantity' => 0.02,
        ]);

        $this->assertTrue($res['ok']);
        $this->assertSame('filled', $res['status']);
        $this->assertSame(1800.0, $res['total_cost']);

        $balances = $this->provider->balances($userId);
        $this->assertSame(7300.0, $balances['USD']);
        $this->assertSame(0.03, $balances['BTC']);
    }

    public function testInsufficientFundsCannotExecute(): void
    {
        $userId = 42;
        // Attempt to buy 1.0 BTC ($90,000) with only $10,000
        $res = $this->provider->placeOrder($userId, [
            'symbol'   => 'BTC/USD',
            'side'     => 'buy',
            'quantity' => 1.0,
        ]);

        $this->assertFalse($res['ok']);
        $this->assertSame('insufficient_funds', $res['error']);

        $balances = $this->provider->balances($userId);
        $this->assertSame(10000.0, $balances['USD']);
    }

    public function testInsufficientAssetCannotSell(): void
    {
        $userId = 42;
        // Attempt to sell 0.5 ETH with 0 ETH
        $res = $this->provider->placeOrder($userId, [
            'symbol'   => 'ETH/USD',
            'side'     => 'sell',
            'quantity' => 0.5,
        ]);

        $this->assertFalse($res['ok']);
        $this->assertSame('insufficient_balance', $res['error']);
    }

    public function testUntradableAssetsBlocked(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Asset 'MYMIGOLD' is not tradable on the exchange.");

        $this->provider->quote('MYMIGOLD/USD');
    }

    public function testUntradableMyMICoinBlocked(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Asset 'MYMICOIN' is not tradable on the exchange.");

        $this->provider->placeOrder(42, [
            'symbol'   => 'MYMICOIN/USD',
            'side'     => 'buy',
            'quantity' => 100,
        ]);
    }

    public function testIdorProtectionAcrossUsers(): void
    {
        $this->db->table('bf_paper_exchange_orders')->insert([
            'user_id'         => 100,
            'order_id'        => 'ord_user100_test',
            'symbol'          => 'SOL/USD',
            'side'            => 'buy',
            'quantity'        => '1.00000000',
            'price'           => '200.00000000',
            'filled_quantity' => '0.00000000',
            'total_cost'      => '200.00000000',
            'status'          => 'pending',
            'created_at'      => date('Y-m-d H:i:s'),
            'updated_at'      => date('Y-m-d H:i:s'),
        ]);

        // User 200 attempts to cancel User 100's order
        $cancelRes = $this->provider->cancelOrder(200, 'ord_user100_test');
        $this->assertFalse($cancelRes['ok']);
        $this->assertSame('not_found', $cancelRes['error']);

        // User 100 can cancel their own order
        $cancelOwnerRes = $this->provider->cancelOrder(100, 'ord_user100_test');
        $this->assertTrue($cancelOwnerRes['ok']);
        $this->assertSame('cancelled', $cancelOwnerRes['status']);
    }

    public function testPartnerExchangeStubRequiresGate(): void
    {
        $stub = new PartnerExchangeStub();
        $this->assertSame('licensed_partner_stub', $stub->name());

        $quote = $stub->quote('BTC/USD');
        $this->assertFalse($quote['ok']);
        $this->assertSame('partner_gate_required', $quote['error']);
        $this->assertSame('G-PARTNER', $quote['code']);
    }

    public function testFallbackQuotesForExpandedCryptoAssets(): void
    {
        $provider = new PaperExchangeProvider($this->db, null, []);

        $ltcQuote = $provider->quote('LTC/USD');
        $this->assertTrue($ltcQuote['ok']);
        $this->assertSame(95.0, $ltcQuote['price']);

        $dogeQuote = $provider->quote('DOGE/USD');
        $this->assertTrue($dogeQuote['ok']);
        $this->assertSame(0.38, $dogeQuote['price']);

        $polyQuote = $provider->quote('POL/USD');
        $this->assertTrue($polyQuote['ok']);
        $this->assertSame(0.50, $polyQuote['price']);

        $bnbQuote = $provider->quote('BNB/USD');
        $this->assertTrue($bnbQuote['ok']);
        $this->assertSame(640.0, $bnbQuote['price']);
    }
}
