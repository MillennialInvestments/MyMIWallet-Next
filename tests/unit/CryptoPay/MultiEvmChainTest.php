<?php

declare(strict_types=1);

namespace Tests\Unit\CryptoPay;

use App\Libraries\CryptoPay\Chains\EvmUsdc;
use App\Libraries\CryptoPay\Http;
use CodeIgniter\Test\CIUnitTestCase;
use Config\CryptoPay as CryptoPayConfig;

if (! defined('TESTPATH')) {
    require_once __DIR__ . '/../../_support/bootstrap.php';
}

final class MultiEvmChainTest extends CIUnitTestCase
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

    public function testAllSevenEvmChainsRegistered(): void
    {
        $expected = ['ethereum', 'base', 'polygon', 'arbitrum', 'optimism', 'avalanche', 'bsc'];
        $this->assertSame($expected, CryptoPayConfig::EVM_CHAINS);

        foreach ($expected as $chain) {
            $this->assertContains($chain, CryptoPayConfig::CHAINS);
            $this->assertArrayHasKey($chain, CryptoPayConfig::CHAIN_IDS);
            $this->assertArrayHasKey($chain, CryptoPayConfig::USDC);
            $this->assertArrayHasKey($chain, CryptoPayConfig::DEFAULT_ENDPOINTS);
            $this->assertArrayHasKey($chain, CryptoPayConfig::DEFAULT_CONFIRMATIONS);
        }
    }

    public function testChainIdsMatchStandards(): void
    {
        $this->assertSame(1, CryptoPayConfig::CHAIN_IDS['ethereum']['mainnet']);
        $this->assertSame(11155111, CryptoPayConfig::CHAIN_IDS['ethereum']['testnet']);

        $this->assertSame(8453, CryptoPayConfig::CHAIN_IDS['base']['mainnet']);
        $this->assertSame(84532, CryptoPayConfig::CHAIN_IDS['base']['testnet']);

        $this->assertSame(137, CryptoPayConfig::CHAIN_IDS['polygon']['mainnet']);
        $this->assertSame(80002, CryptoPayConfig::CHAIN_IDS['polygon']['testnet']);

        $this->assertSame(42161, CryptoPayConfig::CHAIN_IDS['arbitrum']['mainnet']);
        $this->assertSame(421614, CryptoPayConfig::CHAIN_IDS['arbitrum']['testnet']);

        $this->assertSame(10, CryptoPayConfig::CHAIN_IDS['optimism']['mainnet']);
        $this->assertSame(11155420, CryptoPayConfig::CHAIN_IDS['optimism']['testnet']);

        $this->assertSame(43114, CryptoPayConfig::CHAIN_IDS['avalanche']['mainnet']);
        $this->assertSame(43113, CryptoPayConfig::CHAIN_IDS['avalanche']['testnet']);

        $this->assertSame(56, CryptoPayConfig::CHAIN_IDS['bsc']['mainnet']);
        $this->assertSame(97, CryptoPayConfig::CHAIN_IDS['bsc']['testnet']);
    }

    public function testDecimalsNormalizationForStandardAndBsc(): void
    {
        $this->assertSame(6, CryptoPayConfig::DECIMALS['ethereum']);
        $this->assertSame(6, CryptoPayConfig::DECIMALS['base']);
        $this->assertSame(6, CryptoPayConfig::DECIMALS['polygon']);
        $this->assertSame(6, CryptoPayConfig::DECIMALS['arbitrum']);
        $this->assertSame(6, CryptoPayConfig::DECIMALS['optimism']);
        $this->assertSame(6, CryptoPayConfig::DECIMALS['avalanche']);
        $this->assertSame(18, CryptoPayConfig::DECIMALS['bsc']);

        // 6-decimal adapter
        $polyAdapter = new EvmUsdc('polygon', 137, CryptoPayConfig::USDC['polygon']['mainnet'], ['https://polygon-rpc.com'], $this->fakeHttp, 5, 6);
        $this->assertSame(6, $polyAdapter->decimals());
        $this->assertSame(9999, $polyAdapter->maxAmountTag());
        $this->assertSame(10000, $polyAdapter->amountStep());

        // 18-decimal BSC adapter
        $bscAdapter = new EvmUsdc('bsc', 56, CryptoPayConfig::USDC['bsc']['mainnet'], ['https://bsc-dataseed.binance.org'], $this->fakeHttp, 5, 18);
        $this->assertSame(18, $bscAdapter->decimals());
        $this->assertSame(9_999_999_999_999_999, $bscAdapter->maxAmountTag());
        $this->assertSame(10_000_000_000_000_000, $bscAdapter->amountStep());
    }

    public function testEvmRecipientFallbackAppliesToAllEvmChains(): void
    {
        putenv('CRYPTO_PAY_ENABLED=true');
        putenv('CRYPTO_PAY_NETWORK=mainnet');
        putenv('CRYPTO_PAY_EVM_RECIPIENT=0x1111111111111111111111111111111111111111');

        $cfg = new CryptoPayConfig();
        foreach (CryptoPayConfig::EVM_CHAINS as $evmChain) {
            $this->assertSame('0x1111111111111111111111111111111111111111', $cfg->recipients[$evmChain], "Chain {$evmChain} should inherit EVM recipient");
        }

        putenv('CRYPTO_PAY_EVM_RECIPIENT=');
        putenv('CRYPTO_PAY_ENABLED=false');
        putenv('CRYPTO_PAY_NETWORK=');
    }
}
