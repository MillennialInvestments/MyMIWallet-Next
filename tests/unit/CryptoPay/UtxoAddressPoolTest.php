<?php

declare(strict_types=1);

namespace Tests\Unit\CryptoPay;

use App\Database\Migrations\CreateUtxoAddressPool;
use App\Libraries\CryptoPay\Chains\Dogecoin;
use App\Libraries\CryptoPay\Chains\Litecoin;
use App\Libraries\CryptoPay\Http;
use App\Services\CryptoPay\UtxoAddressPoolService;
use CodeIgniter\Test\CIUnitTestCase;

if (! defined('TESTPATH')) {
    require_once __DIR__ . '/../../_support/bootstrap.php';
}

require_once APPPATH . 'Database/Migrations/2026-11-26-000100_CreateUtxoAddressPool.php';

final class UtxoAddressPoolTest extends CIUnitTestCase
{
    private $sqlite;
    private UtxoAddressPoolService $service;

    protected function setUp(): void
    {
        parent::setUp();

        $this->sqlite = \Config\Database::connect([
            'DSN' => '', 'hostname' => '', 'username' => '', 'password' => '', 'database' => ':memory:',
            'DBDriver' => 'SQLite3', 'DBPrefix' => '', 'pConnect' => false, 'DBDebug' => true, 'charset' => 'utf8',
            'DBCollat' => '', 'swapPre' => '', 'encrypt' => false, 'compress' => false, 'strictOn' => false,
            'failover' => [], 'port' => 0, 'foreignKeys' => true, 'busyTimeout' => 1000,
        ], false);

        $migration = new CreateUtxoAddressPool(\Config\Database::forge($this->sqlite));
        $migration->up();

        $this->service = new UtxoAddressPoolService($this->sqlite);
    }

    public function testImportAndAcquireLitecoinAddress(): void
    {
        $addresses = [
            ['address' => 'tltc1qtest0001', 'index' => 0],
            ['address' => 'tltc1qtest0002', 'index' => 1],
        ];

        $count = $this->service->importAddresses('ltc', $addresses, 'testnet');
        $this->assertSame(2, $count);

        $acquired1 = $this->service->acquireAddress('ltc', 'CHK-001', 'testnet');
        $this->assertSame('tltc1qtest0001', $acquired1);

        $acquired2 = $this->service->acquireAddress('ltc', 'CHK-002', 'testnet');
        $this->assertSame('tltc1qtest0002', $acquired2);

        // Exhaustion -> returns null
        $exhausted = $this->service->acquireAddress('ltc', 'CHK-003', 'testnet');
        $this->assertNull($exhausted);
    }

    public function testLitecoinAddressValidation(): void
    {
        $fakeHttp = new class implements Http {
            public function get(string $url): ?string { return null; }
            public function postJson(string $url, array $body): ?array { return null; }
        };

        $mainnetLtc = new Litecoin('mainnet', [], $fakeHttp);
        $this->assertTrue($mainnetLtc->validAddress('ltc1q2x7v3x90e872qwd7p0h7346g2m57z38j6l09vd'));
        $this->assertTrue($mainnetLtc->validAddress('LhySmb6E7r6u1eD9yQ56wWw25eD4fG7h1J'));
        $this->assertFalse($mainnetLtc->validAddress('0x1111111111111111111111111111111111111111'));

        $testnetLtc = new Litecoin('testnet', [], $fakeHttp);
        $this->assertTrue($testnetLtc->validAddress('tltc1q2x7v3x90e872qwd7p0h7346g2m57z38j6l09vd'));
    }

    public function testDogecoinAddressValidation(): void
    {
        $fakeHttp = new class implements Http {
            public function get(string $url): ?string { return null; }
            public function postJson(string $url, array $body): ?array { return null; }
        };

        $doge = new Dogecoin('mainnet', [], $fakeHttp);
        $this->assertTrue($doge->validAddress('DH5yaieqoZN36fDVciNyRueRGvGLR3mr7L'));
        $this->assertFalse($doge->validAddress('invalid_address'));
    }
}
