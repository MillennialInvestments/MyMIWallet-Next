<?php

use App\Libraries\MyMISolana;
use CodeIgniter\Test\CIUnitTestCase;

if (! defined('TESTPATH')) {
    require_once __DIR__ . '/../../_support/bootstrap.php';
}

/**
 * Payment and key-handling holes found while mapping MyMI's payment flows
 * (2026-11-23). Each must stay closed until a verified payment path replaces it.
 */
final class PaymentHolesClosedTest extends CIUnitTestCase
{
    private function routes(): string
    {
        return file_get_contents(APPPATH . 'Config/Routes.php') ?: '';
    }

    public function testAuctionTopUpNoLongerCreditsUnverifiedAmounts(): void
    {
        $src = file_get_contents(APPPATH . 'Modules/APIs/Controllers/AuctionsAPIController.php') ?: '';
        $start = strpos($src, 'public function topUp()');
        $this->assertNotFalse($start);
        $body = substr($src, $start);

        $this->assertStringNotContainsString('processTopUp', $body);
        $this->assertStringNotContainsString("getPost('user_id')", $body);
        $this->assertStringContainsString('verified_payment_required', $body);
        $this->assertStringContainsString("'topup', 'AuctionsAPIController::topUp', ['filter' => 'feature:auctions']", $this->routes());
    }

    public function testFundUnitsNeedLoginAndInvestingSwitch(): void
    {
        $this->assertStringContainsString(
            "'PurchaseFundUnits', 'ProjectsController::purchaseFundUnits', ['filter' => ['login', 'feature:project_investing']]",
            $this->routes()
        );
    }

    public function testMetaMaskPrivateKeyEndpointsAreClosed(): void
    {
        $src = file_get_contents(APPPATH . 'Modules/Exchange/Controllers/MetaMaskController.php') ?: '';
        $this->assertStringNotContainsString("getPost('privateKey')", $src);
        $this->assertStringNotContainsString('metaMask->generateWallet', $src);
        $this->assertSame(3, substr_count($src, "return \$this->walletSignatureRequired("));
    }

    public function testGeminiExchangeKeysComeFromEnvOnly(): void
    {
        $src = file_get_contents(APPPATH . 'Config/APISettings.php') ?: '';
        $this->assertMatchesRegularExpression('/public string \$geminiAPIKey = \'\';/', $src);
        $this->assertMatchesRegularExpression('/public string \$geminiAPISecret = \'\';/', $src);
        $this->assertStringContainsString("env('GEMINI_API_KEY')", $src);
        $this->assertStringContainsString("env('GEMINI_API_SECRET')", $src);
    }

    public function testSolanaHelpersNoLongerFakeSignatures(): void
    {
        $sol = (new ReflectionClass(MyMISolana::class))->newInstanceWithoutConstructor();

        $this->assertFalse($sol->verifySignature(['a' => 1], 'anything', bin2hex(random_bytes(32))));
        $this->expectException(RuntimeException::class);
        $sol->signTransaction(['a' => 1], 'key');
    }

    public function testSolanaSendRefusesInsteadOfInventingTxId(): void
    {
        $src = file_get_contents(APPPATH . 'Libraries/MyMISolana.php') ?: '';
        $start = strpos($src, 'public function sendAsset(');
        $body = substr($src, $start, 1200);
        $this->assertStringNotContainsString("'Transaction ID: '", $body);
        $this->assertStringContainsString('wallet_signature_required', $body);
    }

    public function testDigiByteSendRefusesInsteadOfInventingTxId(): void
    {
        // MyMIDigibyte cannot be loaded at all today (its getBalance() does not
        // match CryptoCurrencyInterface), so check the source.
        $src = file_get_contents(APPPATH . 'Libraries/MyMIDigibyte.php') ?: '';
        $start = strpos($src, 'public function sendAsset(');
        $body = substr($src, $start, 600);
        $this->assertStringNotContainsString("'Transaction ID: '", $body);
        $this->assertStringContainsString("'not_implemented'", $body);
    }
}
