<?php

declare(strict_types=1);

namespace Tests\Feature;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

final class ScannerEndpointsTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testStatusEndpointExists(): void
    {
        $result = $this->get('/API/Scanner/status');
        $result->assertStatus(200);
    }
}
