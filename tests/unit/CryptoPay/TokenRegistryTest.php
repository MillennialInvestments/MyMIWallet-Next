<?php

declare(strict_types=1);

namespace Tests\Unit\CryptoPay;

use App\Libraries\CryptoPay\Chains\EvmUsdc;
use App\Libraries\CryptoPay\Http;
use App\Libraries\CryptoPay\TokenRegistry;
use CodeIgniter\Test\CIUnitTestCase;

if (! defined('TESTPATH')) {
    require_once __DIR__ . '/../../_support/bootstrap.php';
}

final class TokenRegistryTest extends CIUnitTestCase
{
    private Http $fakeHttp;

    protected function setUp(): void
    {
        parent::setUp();
        $this->fakeHttp = new class implements Http {
            public function get(string $url): ?string
            {
                return '{"jsonrpc":"2.0","result":"0x1","id":1}';
            }

            public function postJson(string $url, array $body): ?array
            {
                return ['jsonrpc' => '2.0', 'result' => '0x1', 'id' => 1];
            }
        };
    }

    public function testTokenRegistryContainsCoreStablecoins(): void
    {
        $expected = ['USDC', 'USDT', 'PYUSD', 'EURC'];
        $this->assertSame($expected, TokenRegistry::TOKENS);
    }

    public function testDecimalsNormalizationAcrossChains(): void
    {
        $this->assertSame(6, TokenRegistry::decimals('USDC', 'ethereum'));
        $this->assertSame(6, TokenRegistry::decimals('USDT', 'ethereum'));
        $this->assertSame(6, TokenRegistry::decimals('USDC', 'polygon'));
        $this->assertSame(6, TokenRegistry::decimals('USDT', 'arbitrum'));
        $this->assertSame(6, TokenRegistry::decimals('PYUSD', 'ethereum'));
        $this->assertSame(6, TokenRegistry::decimals('EURC', 'base'));

        // BSC 18 decimals
        $this->assertSame(18, TokenRegistry::decimals('USDC', 'bsc'));
        $this->assertSame(18, TokenRegistry::decimals('USDT', 'bsc'));
    }

    public function testContractAddressResolution(): void
    {
        $ethUsdt = TokenRegistry::contract('USDT', 'ethereum', 'mainnet');
        $this->assertSame('0xdac17f958d2ee523a2206206994597c13d831ec7', $ethUsdt);

        $solUsdt = TokenRegistry::contract('USDT', 'solana', 'mainnet');
        $this->assertSame('Es9vMFrzaCERmJfrF4H2FYD4KCoNkY11McCe8BenwNYB', $solUsdt);

        $pyusd = TokenRegistry::contract('PYUSD', 'solana', 'mainnet');
        $this->assertSame('2b1kV6ebUAKGJJRwGpQiBpDrjeeZ9eTVJwBpNnJY4v8q', $pyusd);

        $eurc = TokenRegistry::contract('EURC', 'base', 'mainnet');
        $this->assertSame('0x60a3e35cc302bfa44cb288bc5a4f316fdb1adb42', $eurc);
    }

    public function testEvmAdapterWithCustomStablecoins(): void
    {
        $usdtContract = TokenRegistry::contract('USDT', 'polygon', 'mainnet');
        $adapter = new EvmUsdc('polygon', 137, $usdtContract, ['https://polygon-rpc.com'], $this->fakeHttp, 5, 6, 'USDT');

        $this->assertSame('polygon', $adapter->chain());
        $this->assertSame('USDT', $adapter->asset());
        $this->assertSame(6, $adapter->decimals());
        $this->assertSame(9999, $adapter->maxAmountTag());

        // EURC adapter
        $eurcContract = TokenRegistry::contract('EURC', 'base', 'mainnet');
        $eurcAdapter = new EvmUsdc('base', 8453, $eurcContract, ['https://mainnet.base.org'], $this->fakeHttp, 5, 6, 'EURC');

        $this->assertSame('base', $eurcAdapter->chain());
        $this->assertSame('EURC', $eurcAdapter->asset());
    }
}
