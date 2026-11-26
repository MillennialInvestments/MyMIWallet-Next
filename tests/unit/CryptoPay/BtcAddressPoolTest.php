<?php

declare(strict_types=1);

namespace Tests\Unit\CryptoPay;

use App\Database\Migrations\CreateBtcAddressPool;
use App\Libraries\CryptoPay\Chains\Bitcoin;
use App\Libraries\CryptoPay\SpotPrice;
use App\Services\CryptoPay\BtcAddressPoolService;
use CodeIgniter\Test\CIUnitTestCase;

if (! defined('TESTPATH')) {
    require_once __DIR__ . '/../../_support/bootstrap.php';
}

require_once APPPATH . 'Database/Migrations/2026-11-25-000300_CreateBtcAddressPool.php';

final class BtcAddressPoolTest extends CIUnitTestCase
{
    private $sqlite;
    private BtcAddressPoolService $poolService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->sqlite = \Config\Database::connect([
            'DSN' => '', 'hostname' => '', 'username' => '', 'password' => '', 'database' => ':memory:',
            'DBDriver' => 'SQLite3', 'DBPrefix' => '', 'pConnect' => false, 'DBDebug' => true, 'charset' => 'utf8',
            'DBCollat' => '', 'swapPre' => '', 'encrypt' => false, 'compress' => false, 'strictOn' => false,
            'failover' => [], 'port' => 0, 'foreignKeys' => true, 'busyTimeout' => 1000
        ], false);

        $migration = new CreateBtcAddressPool(\Config\Database::forge($this->sqlite));
        $migration->up();

        $this->poolService = new BtcAddressPoolService($this->sqlite);
    }

    public function testPoolAcquireAndReusePrevention(): void
    {
        $addresses = [
            ['address' => 'tb1qpool001addressxxxxxxxxxxxxxxxxxxxxxxx', 'index' => 0],
            ['address' => 'tb1qpool002addressyyyyyyyyyyyyyyyyyyyyyyy', 'index' => 1],
        ];

        $imported = $this->poolService->importAddresses($addresses, 'testnet');
        $this->assertSame(2, $imported);
        $this->assertTrue($this->poolService->isConfigured('testnet'));

        // First checkout acquires lowest index
        $addr1 = $this->poolService->acquireAddress('CHK-REF-001', 'testnet');
        $this->assertSame('tb1qpool001addressxxxxxxxxxxxxxxxxxxxxxxx', $addr1);

        // Second checkout acquires next index
        $addr2 = $this->poolService->acquireAddress('CHK-REF-002', 'testnet');
        $this->assertSame('tb1qpool002addressyyyyyyyyyyyyyyyyyyyyyyy', $addr2);

        // Third checkout encounters pool exhaustion
        $addr3 = $this->poolService->acquireAddress('CHK-REF-003', 'testnet');
        $this->assertNull($addr3, 'Must fail closed on pool exhaustion');

        // Marking addr1 used transitions status
        $this->poolService->markUsed($addr1);
        $stats = $this->poolService->stats('testnet');
        $this->assertSame(2, $stats['total']);
        $this->assertSame(0, $stats['unused']);
        $this->assertSame(1, $stats['reserved']);
        $this->assertSame(1, $stats['used']);
    }

    public function testPoolExhaustionFailsClosed(): void
    {
        // Pool with only 1 address
        $this->poolService->importAddresses([
            ['address' => 'tb1qsingleaddresszzzzzzzzzzzzzzzzzzzzzzz', 'index' => 10]
        ], 'testnet');

        $first = $this->poolService->acquireAddress('CHK-A', 'testnet');
        $this->assertNotNull($first);

        // Second attempt must fail closed (returns null)
        $second = $this->poolService->acquireAddress('CHK-B', 'testnet');
        $this->assertNull($second);
    }

    public function testBitcoinAdapterMatchesByAddressWhenPoolUsed(): void
    {
        $http = new FallbackTestHttp();
        $prices = new SpotPrice($http, 0.05);
        $adapter = new Bitcoin(
            network: 'testnet',
            endpoints: ['https://esplora.test/api'],
            http: $http,
            prices: $prices
        );

        $dedicatedAddress = 'tb1qdedicatedpooladdress1111111111111111';

        $tx = [
            'txid'   => '0123456789abcdef0123456789abcdef0123456789abcdef0123456789abcdef',
            'status' => ['confirmed' => true, 'block_height' => 80000, 'block_time' => 1700000000],
            'vin'    => [['prevout' => ['scriptpubkey_address' => 'tb1qbuyeraddress00000000000000000000000']]],
            'vout'   => [
                ['scriptpubkey_address' => $dedicatedAddress, 'value' => 50000], // 50,000 sats sent
            ],
        ];

        // Case 1: Match by address (match_key starts with bitcoin:address:)
        // Expected amount is 40,000; payment of 50,000 is accepted because address is dedicated
        $rowAddressMatch = [
            'reference'    => 'CHK-DEDICATED',
            'recipient'    => $dedicatedAddress,
            'asset_amount' => 40000,
            'match_key'    => 'bitcoin:address:' . $dedicatedAddress,
        ];

        // Access private match method via reflection
        $ref = new \ReflectionClass($adapter);
        $matchMethod = $ref->getMethod('match');
        $matchMethod->setAccessible(true);

        $matches = $matchMethod->invoke($adapter, $tx, $rowAddressMatch, 80001);
        $this->assertCount(1, $matches);
        $this->assertSame(50000, $matches[0]['amount']);
        $this->assertSame('bitcoin:0123456789abcdef0123456789abcdef0123456789abcdef0123456789abcdef:0', $matches[0]['id']);

        // Case 2: Match by amount tag (match_key is bitcoin:amount:40000)
        // With amount tag matching, 50,000 does NOT equal 40,000, so it must return empty
        $rowAmountMatch = [
            'reference'    => 'CHK-AMOUNT-TAG',
            'recipient'    => $dedicatedAddress,
            'asset_amount' => 40000,
            'match_key'    => 'bitcoin:amount:40000',
        ];

        $matchesAmount = $matchMethod->invoke($adapter, $tx, $rowAmountMatch, 80001);
        $this->assertEmpty($matchesAmount, 'Amount tag match requires exact sat match');
    }
}
