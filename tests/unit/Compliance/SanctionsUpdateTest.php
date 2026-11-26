<?php

declare(strict_types=1);

namespace Tests\Unit\Compliance;

use App\Commands\Compliance\UpdateSanctionsList;
use App\Services\Compliance\SanctionsScreen;
use CodeIgniter\Test\CIUnitTestCase;

if (! defined('TESTPATH')) {
    require_once __DIR__ . '/../../_support/bootstrap.php';
}

/** Testable subclass overriding curl fetchUrl */
class TestableUpdateSanctionsList extends UpdateSanctionsList
{
    public ?string $mockResponse = null;

    protected function fetchUrl(string $url): ?string
    {
        return $this->mockResponse;
    }
}

final class SanctionsUpdateTest extends CIUnitTestCase
{
    private string $tempComplianceDir;
    private string $tempAddressesFile;
    private string $tempManifestFile;

    protected function setUp(): void
    {
        parent::setUp();
        $this->tempComplianceDir = WRITEPATH . 'compliance';
        if (! is_dir($this->tempComplianceDir)) {
            mkdir($this->tempComplianceDir, 0755, true);
        }
        $this->tempAddressesFile = $this->tempComplianceDir . '/sanctions-addresses.txt';
        $this->tempManifestFile = $this->tempComplianceDir . '/sanctions-manifest.json';
    }

    protected function tearDown(): void
    {
        if (is_file($this->tempAddressesFile)) {
            @unlink($this->tempAddressesFile);
        }
        if (is_file($this->tempManifestFile)) {
            @unlink($this->tempManifestFile);
        }
        parent::tearDown();
    }

    public function testOfflineFallbackWhenRemoteUnreachable(): void
    {
        $cmd = new TestableUpdateSanctionsList(service('logger'), service('commands'));
        $cmd->mockResponse = null; // Simulated network unreachable

        $params = ['source' => 'https://unreachable.test/list.txt'];
        $rc = $cmd->run($params);

        $this->assertSame(0, $rc);
        $this->assertFileExists($this->tempAddressesFile);
        $content = file_get_contents($this->tempAddressesFile);
        $this->assertStringContainsString('0x8576acc5c05d6ce88f4e49bf65bdf0c62f91353c', $content);
    }

    public function testSuccessfulUpdateWithHashVerification(): void
    {
        $payload = "# New OFAC List\n0x1111111111111111111111111111111111111111\n0x2222222222222222222222222222222222222222\n";
        $expectedHash = hash('sha256', $payload);

        $cmd = new TestableUpdateSanctionsList(service('logger'), service('commands'));
        $cmd->mockResponse = $payload;

        $rc = $cmd->run(['source' => 'https://mirror.test/list.txt', 'expected-hash' => $expectedHash]);

        $this->assertSame(0, $rc);
        $this->assertFileExists($this->tempAddressesFile);
        $this->assertSame($payload, file_get_contents($this->tempAddressesFile));

        $this->assertFileExists($this->tempManifestFile);
        $manifest = json_decode(file_get_contents($this->tempManifestFile), true);
        $this->assertSame($expectedHash, $manifest['sha256']);
        $this->assertSame(2, $manifest['address_count']);
    }

    public function testHashMismatchRefusesUpdate(): void
    {
        $payload = "# Tampered List\n0x9999999999999999999999999999999999999999\n";

        $cmd = new TestableUpdateSanctionsList(service('logger'), service('commands'));
        $cmd->mockResponse = $payload;

        $rc = $cmd->run(['source' => 'https://mirror.test/list.txt', 'expected-hash' => 'badhash1234567890']);

        $this->assertSame(2, $rc); // Returns error code 2 for hash mismatch
    }

    public function testScreeningBenchmarkSub5ms(): void
    {
        // Build large synthetic test file with 2,000 addresses
        $addresses = [];
        for ($i = 0; $i < 2000; $i++) {
            $addresses[] = sprintf('0x%040x', $i + 1000);
        }
        $targetSanctioned = sprintf('0x%040x', 1500);

        $tempBenchmarkFile = WRITEPATH . 'bench-sanctions-' . uniqid() . '.txt';
        file_put_contents($tempBenchmarkFile, implode("\n", $addresses));

        $screen = new SanctionsScreen($tempBenchmarkFile);
        $screen->loadSet();

        $iterations = 1000;
        $start = microtime(true);

        for ($i = 0; $i < $iterations; $i++) {
            // Check alternating between sanctioned and unsanctioned addresses
            $query = ($i % 2 === 0) ? $targetSanctioned : '0x9999999999999999999999999999999999999999';
            $isSanctioned = $screen->isSanctioned($query);
            if ($i % 2 === 0) {
                $this->assertTrue($isSanctioned);
            } else {
                $this->assertFalse($isSanctioned);
            }
        }

        $elapsedTotalMs = (microtime(true) - $start) * 1000.0;
        $avgMsPerCheck = $elapsedTotalMs / $iterations;

        @unlink($tempBenchmarkFile);

        // Required by acceptance criteria: < 5 ms per check
        $this->assertLessThan(5.0, $avgMsPerCheck, "Screening average {$avgMsPerCheck} ms exceeded 5.0 ms ceiling");
    }

    public function testFeatureFlagGating(): void
    {
        $screen = new SanctionsScreen();

        putenv('FEATURE_SANCTIONS_SCREENING=false');
        $this->assertFalse($screen->isEnabled());
        $resultOff = $screen->check('0x8576acc5c05d6ce88f4e49bf65bdf0c62f91353c');
        $this->assertTrue($resultOff['ok'], 'Should pass when feature flag is off');

        putenv('FEATURE_SANCTIONS_SCREENING=true');
        $this->assertTrue($screen->isEnabled());
        $resultOn = $screen->check('0x8576acc5c05d6ce88f4e49bf65bdf0c62f91353c');
        $this->assertFalse($resultOn['ok'], 'Should be refused when feature flag is on');
        $this->assertSame('SANCTIONED_ADDRESS', $resultOn['code']);

        putenv('FEATURE_SANCTIONS_SCREENING=false');
    }
}
