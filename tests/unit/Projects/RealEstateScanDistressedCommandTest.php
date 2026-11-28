<?php

declare(strict_types=1);

namespace Tests\Unit\Projects;

use App\Commands\RealEstateScanDistressed;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\StreamFilterTrait;

/**
 * Unit Test: RealEstateScanDistressedCommandTest
 *
 * Verifies realestate:scan:distressed CLI execution and output contracts.
 */
class RealEstateScanDistressedCommandTest extends CIUnitTestCase
{
    use StreamFilterTrait;

    protected function setUp(): void
    {
        parent::setUp();
        $this->setUpStreamFilterTrait();
    }

    protected function tearDown(): void
    {
        $this->tearDownStreamFilterTrait();
        parent::tearDown();
    }

    public function testCommandExecutesSuccessfully(): void
    {
        $this->resetStreamFilterBuffer();
        $command = new RealEstateScanDistressed(service('logger'), service('commands'));
        $code = $command->run(['max-price=45000', 'min-sqft=1700', 'beds=3', 'zip=71111']);
        $output = $this->getStreamFilterBuffer();

        $this->assertSame(0, $code);
        $this->assertStringContainsString('TBI Real Estate Distressed Opportunity Scanner', $output);
        $this->assertStringContainsString('Timothy Burks Incorporated, LLC.', $output);
        $this->assertStringContainsString('AnneAlicia Burks', $output);
    }

    public function testCommandOutputsValidJson(): void
    {
        $this->resetStreamFilterBuffer();
        $command = new RealEstateScanDistressed(service('logger'), service('commands'));
        $code = $command->run(['json']);
        $output = $this->getStreamFilterBuffer();

        $this->assertSame(0, $code);
        $jsonStart = strpos($output, '{');
        $this->assertNotFalse($jsonStart, 'JSON opening brace not found in output: ' . $output);
        $cleanJson = substr($output, $jsonStart);

        $data = json_decode($cleanJson, true);
        $this->assertIsArray($data, 'Failed to decode json from clean string');
        $this->assertSame('ok', $data['status'] ?? null);
        $this->assertArrayHasKey('deals', $data);
        $this->assertArrayHasKey('hud_fmr_benchmarks', $data);
        $this->assertArrayHasKey('platform_sources', $data);
    }
}
