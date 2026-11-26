<?php

declare(strict_types=1);

namespace Tests\Unit\CryptoPay;

use App\Libraries\CryptoPay\Chains\Tron;
use App\Libraries\CryptoPay\Http;
use CodeIgniter\Test\CIUnitTestCase;

if (! defined('TESTPATH')) {
    require_once __DIR__ . '/../../_support/bootstrap.php';
}

final class TronChainTest extends CIUnitTestCase
{
    private Http $fakeHttp;

    protected function setUp(): void
    {
        parent::setUp();
        $this->fakeHttp = new class implements Http {
            public function get(string $url): ?string { return null; }
            public function postJson(string $url, array $body): ?array { return null; }
        };
    }

    public function testTronAddressValidation(): void
    {
        $tron = new Tron('mainnet', [], $this->fakeHttp);

        // Valid Binance / Tether cold storage Tron address
        $this->assertTrue($tron->validAddress('TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t'));
        $this->assertTrue($tron->validAddress('TLyqzVGLV1srkB7dToTAEqgDSfPtXRJZYH'));

        // Invalid addresses
        $this->assertFalse($tron->validAddress('0x1111111111111111111111111111111111111111')); // EVM
        $this->assertFalse($tron->validAddress('tb1qw508d6qejxtdg4y5r3zarvary0c5xw7kxpjzsx')); // BTC
        $this->assertFalse($tron->validAddress('TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj00')); // Invalid Base58 (contains '0')
        $this->assertFalse($tron->validAddress(''));
    }

    public function testTronUsdtDecimalsAndQuote(): void
    {
        $tron = new Tron('mainnet', [], $this->fakeHttp, null, 'USDT');

        $this->assertSame('tron', $tron->chain());
        $this->assertSame('USDT', $tron->asset());
        $this->assertSame(6, $tron->decimals());
        $this->assertSame(9999, $tron->maxAmountTag());
        $this->assertSame(10000, $tron->amountStep());

        $quote = $tron->quote(5000); // $50.00 USD
        $this->assertNotNull($quote);
        $this->assertSame(50_000_000, $quote['amount']); // 50 * 1e6
        $this->assertSame('1.00', $quote['rate']);

        $uri = $tron->paymentUri(['recipient' => 'TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t', 'amount' => 50009999]);
        $this->assertStringStartsWith('tron:TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t', $uri);
        $this->assertStringContainsString('amount=50.009999', $uri);
    }
}
