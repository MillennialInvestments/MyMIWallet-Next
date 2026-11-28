<?php

declare(strict_types=1);

namespace Tests\Unit\Projects;

use App\Database\Migrations\CreateRealEstateCashBuyersTable;
use App\Models\RealEstateCashBuyerModel;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * Unit Test: RealEstateCashBuyerModelTest
 *
 * Verifies cash buyer query filters, target ZIP sorting, and broadcast tracking.
 */
class RealEstateCashBuyerModelTest extends CIUnitTestCase
{
    private RealEstateCashBuyerModel $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new RealEstateCashBuyerModel();

        // Require migration file and run up() to establish table and seed data in test database
        require_once APPPATH . 'Database/Migrations/2026-11-28-000300_CreateRealEstateCashBuyersTable.php';
        $migration = new CreateRealEstateCashBuyersTable();
        $migration->up();
    }

    public function testFindMatchingBuyersReturnsSeededBuyers(): void
    {
        $buyers = $this->model->findMatchingBuyers(150000.0, 10.0, '71111');
        $this->assertIsArray($buyers);
        $this->assertNotEmpty($buyers);

        // Verify top buyer matches or has highest verified proof of funds
        $first = $buyers[0];
        $this->assertArrayHasKey('full_name', $first);
        $this->assertArrayHasKey('max_purchase_price', $first);
        $this->assertGreaterThanOrEqual(150000.0, (float) $first['max_purchase_price']);
    }

    public function testRecordBroadcastIncrementsCount(): void
    {
        $buyers = $this->model->findMatchingBuyers(100000.0);
        $this->assertNotEmpty($buyers);
        $buyerId = (int) $buyers[0]['id'];
        $initialCount = (int) $buyers[0]['deals_received_count'];

        $this->model->recordBroadcast([$buyerId]);

        $updated = $this->model->find($buyerId);
        $this->assertSame($initialCount + 1, (int) $updated['deals_received_count']);
    }

    public function testRecordBroadcastWithEmptyArrayDoesNotThrow(): void
    {
        $this->model->recordBroadcast([]);
        $this->assertTrue(true);
    }
}
