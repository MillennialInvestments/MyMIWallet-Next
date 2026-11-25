<?php

declare(strict_types=1);

namespace Tests\Unit\CryptoPay;

use App\Services\Compliance\SanctionsScreen;
use CodeIgniter\Test\CIUnitTestCase;

if (! defined('TESTPATH')) {
    require_once __DIR__ . '/../../_support/bootstrap.php';
}

final class SanctionsScreenTest extends CIUnitTestCase
{
    private string $tempSanctionsFile;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tempSanctionsFile = WRITEPATH . 'test-sanctions-' . uniqid() . '.txt';
        $contents = <<<TXT
# OFAC Specially Designated Nationals and Blocked Persons List
# Updated for staging test suite

# EVM sanctioned addresses (Lazarus Group / Tornado Cash)
0x8576acc5c05d6ce88f4e49bf65bdf0c62f91353c
0x1da5821544e25c636c1417ba96ade4cf6d2f9b5a

# Solana sanctioned address
4GUGwW4FvEumA68y5P6E21kQ87B6h2e2r8C26o8r8a6w

# Bitcoin sanctioned address
1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa

# Empty line and comment above should be ignored
TXT;
        file_put_contents($this->tempSanctionsFile, $contents);
    }

    protected function tearDown(): void
    {
        if (is_file($this->tempSanctionsFile)) {
            @unlink($this->tempSanctionsFile);
        }
        parent::tearDown();
    }

    public function testSanctionsDetectionCaseInsensitive(): void
    {
        $screen = new SanctionsScreen($this->tempSanctionsFile);

        // Matching lower and upper case
        $this->assertTrue($screen->isSanctioned('0x8576acc5c05d6ce88f4e49bf65bdf0c62f91353c'));
        $this->assertTrue($screen->isSanctioned('0X8576ACC5C05D6CE88F4E49BF65BDF0C62F91353C'));
        $this->assertTrue($screen->isSanctioned(' 0x1da5821544e25c636c1417ba96ade4cf6d2f9b5a '));
        $this->assertTrue($screen->isSanctioned('1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa'));

        // Clean addresses
        $this->assertFalse($screen->isSanctioned('0x742d35Cc6634C0532925a3b844Bc454e4438f44e'));
        $this->assertFalse($screen->isSanctioned('tb1qw508d6qejxtdg4y5r3zarvary0c5xw7kxpjzsx'));
        $this->assertFalse($screen->isSanctioned(''));
    }

    public function testCheckReturnsSanctionedAddressCodeWhenEnabled(): void
    {
        putenv('COMPLIANCE_SANCTIONS_ENABLED=true');
        $screen = new SanctionsScreen($this->tempSanctionsFile);

        $result = $screen->check('0x8576acc5c05d6ce88f4e49bf65bdf0c62f91353c');
        $this->assertFalse($result['ok']);
        $this->assertSame('SANCTIONED_ADDRESS', $result['code']);

        $cleanResult = $screen->check('0x0000000000000000000000000000000000000001');
        $this->assertTrue($cleanResult['ok']);

        putenv('COMPLIANCE_SANCTIONS_ENABLED=false');
    }
}
