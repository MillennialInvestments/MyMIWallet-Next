<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
final class AiOpsEndpointsTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testStatusEndpointReturnsJson(): void
    {
        $result = $this->get('/API/AiOps/status');
        $this->assertSame(200, $result->response()->getStatusCode());
        $payload = json_decode((string) $result->getJSON(), true);
        $this->assertIsArray($payload);
        $this->assertArrayHasKey('settings', $payload);
        $this->assertArrayHasKey('caps', $payload);
        $this->assertArrayHasKey('usage', $payload);
    }
}
