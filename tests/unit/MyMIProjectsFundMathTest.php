<?php

namespace Tests\unit;

use App\Libraries\MyMIProjects;
use CodeIgniter\Test\CIUnitTestCase;
use RuntimeException;

class MyMIProjectsFundMathTest extends CIUnitTestCase
{
    private function makeLibrary(): MyMIProjects
    {
        return new class extends MyMIProjects {
            public function __construct()
            {
                // Intentionally skip parent constructor for pure math tests.
            }
        };
    }

    public function testCalculateNavValue(): void
    {
        $lib = $this->makeLibrary();
        $this->assertSame(1.25000000, $lib->calculateNavValue(1250000.00, 1000000.00000000));
        $this->assertSame(1.0, $lib->calculateNavValue(5000.00, 0));
    }

    public function testCalculateIssuedUnits(): void
    {
        $lib = $this->makeLibrary();
        $this->assertSame(80.00000000, $lib->calculateIssuedUnits(100.00, 1.25));
    }

    public function testCalculateIssuedUnitsThrowsWhenNavInvalid(): void
    {
        $lib = $this->makeLibrary();
        $this->expectException(RuntimeException::class);
        $lib->calculateIssuedUnits(100.00, 0.0);
    }

    public function testCalculateDistributionPerUnit(): void
    {
        $lib = $this->makeLibrary();
        $this->assertSame(0.05000000, $lib->calculateDistributionPerUnit(50000.00, 1000000.00000000));
        $this->assertSame(0.0, $lib->calculateDistributionPerUnit(50000.00, 0));
    }
}
