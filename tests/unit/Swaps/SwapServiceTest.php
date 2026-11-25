<?php

namespace Tests\Unit\Swaps;

use App\Libraries\Swaps\Providers\JupiterSwapProvider;
use App\Libraries\Swaps\Providers\ZeroExSwapProvider;
use App\Services\Compliance\SanctionsScreen;
use App\Services\Swaps\SwapService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * @internal
 */
final class SwapServiceTest extends CIUnitTestCase
{
    private string $tempSanctionsDir;
    private string $originalSwapsExecute;

    protected function setUp(): void
    {
        parent::setUp();
        $this->originalSwapsExecute = (string) getenv('SWAPS_EXECUTE');
        putenv('SWAPS_EXECUTE=false');

        // Create temporary sanctions address list for deterministic testing
        $this->tempSanctionsDir = sys_get_temp_dir() . '/mymi_sanctions_swaps_' . bin2hex(random_bytes(4));
        mkdir($this->tempSanctionsDir, 0755, true);
        file_put_contents(
            $this->tempSanctionsDir . '/sanctions-addresses.txt',
            "0x7f367cc41522ce07553e823bf3be79a889debe1b\n1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa\n"
        );
    }

    protected function tearDown(): void
    {
        putenv("SWAPS_EXECUTE={$this->originalSwapsExecute}");
        if (is_dir($this->tempSanctionsDir)) {
            @unlink($this->tempSanctionsDir . '/sanctions-addresses.txt');
            @rmdir($this->tempSanctionsDir);
        }
        parent::tearDown();
    }

    public function testSolanaSwapQuoteWithJupiterFixture(): void
    {
        $fixturePath = ROOTPATH . 'tests/fixtures/swaps/jupiter-sol-usdc.json';
        $this->assertFileExists($fixturePath);
        $fixture = json_decode((string) file_get_contents($fixturePath), true);

        $jupiter = new JupiterSwapProvider($fixture);
        $service = new SwapService($jupiter, null);

        $res = $service->getQuote(
            'solana',
            'So11111111111111111111111111111111111111112',
            'EPjFWdd5AufqSSqeM2qN1xzybapC8G4wEGGkZwyTDt1v',
            '1000000000'
        );

        $this->assertTrue($res['ok']);
        $this->assertSame('jupiter', $res['provider']);
        $this->assertSame('solana', $res['chain']);
        $this->assertSame('214580000', $res['gross_output_amount']);
        // 50 bps platform fee = 214580000 * 0.0050 = 1072900
        $this->assertSame('1072900', $res['platform_fee_amount']);
        $this->assertSame('213507100', $res['net_output_amount']);
        $this->assertSame(0.04, $res['price_impact_pct']);
        $this->assertSame('Raydium CPMM', $res['route_summary']);
        $this->assertFalse($res['execution_allowed']);
        $this->assertStringContainsString('quotes only', $res['execution_note']);
    }

    public function testEvmSwapQuoteWithZeroExFixture(): void
    {
        $fixturePath = ROOTPATH . 'tests/fixtures/swaps/zeroex-eth-usdc.json';
        $this->assertFileExists($fixturePath);
        $fixture = json_decode((string) file_get_contents($fixturePath), true);

        $zeroEx = new ZeroExSwapProvider($fixture);
        $service = new SwapService(null, $zeroEx);

        $res = $service->getQuote(
            'ethereum',
            '0xeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee',
            '0xa0b86991c6218b36c1d19d4a2e9eb0ce3606eb48',
            '1000000000000000000'
        );

        $this->assertTrue($res['ok']);
        $this->assertSame('zeroex', $res['provider']);
        $this->assertSame('ethereum', $res['chain']);
        $this->assertSame('3120450000', $res['gross_output_amount']);
        // 50 bps platform fee = 3120450000 * 0.0050 = 15602250
        $this->assertSame('15602250', $res['platform_fee_amount']);
        $this->assertSame('3104847750', $res['net_output_amount']);
        $this->assertStringContainsString('Uniswap_V3, Curve', $res['route_summary']);
        $this->assertFalse($res['execution_allowed']);
    }

    public function testSanctionsScreenRejectsSanctionedWalletAddress(): void
    {
        $sanctions = new SanctionsScreen($this->tempSanctionsDir . '/sanctions-addresses.txt');
        $service = new SwapService(null, null, $sanctions);

        $sanctionedAddress = '0x7F367cc41522cE07553e823bF3Be79A889DeBe1B';
        $res = $service->getQuote(
            'ethereum',
            '0xeeee',
            '0xa0b8',
            '1000000000',
            $sanctionedAddress
        );

        $this->assertFalse($res['ok']);
        $this->assertSame('sanctions_hold', $res['error']);
        $this->assertStringContainsString('compliance review', $res['message']);
    }

    public function testUnsupportedChainReturnsError(): void
    {
        $service = new SwapService();
        $res = $service->getQuote('cardano', 'token1', 'token2', '100');

        $this->assertFalse($res['ok']);
        $this->assertSame('unsupported_chain', $res['error']);
    }

    public function testExecutionAllowedTogglesWithEnv(): void
    {
        putenv('SWAPS_EXECUTE=true');

        $fixturePath = ROOTPATH . 'tests/fixtures/swaps/jupiter-sol-usdc.json';
        $fixture = json_decode((string) file_get_contents($fixturePath), true);
        $jupiter = new JupiterSwapProvider($fixture);
        $service = new SwapService($jupiter, null);

        $res = $service->getQuote(
            'solana',
            'So11111111111111111111111111111111111111112',
            'EPjFWdd5AufqSSqeM2qN1xzybapC8G4wEGGkZwyTDt1v',
            '1000000000'
        );

        $this->assertTrue($res['ok']);
        $this->assertTrue($res['execution_allowed']);
        $this->assertSame('Ready for user signature.', $res['execution_note']);
    }
}
