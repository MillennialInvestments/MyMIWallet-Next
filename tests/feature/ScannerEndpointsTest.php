<?php

declare(strict_types=1);

namespace Tests\Feature;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use Tests\Support\Database\AppliesAppMigrations;

final class ScannerEndpointsTest extends CIUnitTestCase
{
    use AppliesAppMigrations;
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected $migrate = false;
    protected $refresh = false;

    protected function setUp(): void
    {
        parent::setUp();

        $this->applyAppMigrations(
            $this->db,
            ['2026-04-01-000001_CreateScannerTables.php'],
            ['bf_scanner_jobs', 'bf_scanner_results', 'bf_scanner_symbol_universe'],
        );
    }

    public function testStatusEndpointExists(): void
    {
        $result = $this->get('/API/Scanner/status');
        $result->assertStatus(200);
    }
}
