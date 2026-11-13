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

    public function testToggleRejectsAnonymousCaller(): void
    {
        $result = $this->post('/API/AiOps/toggle', ['key' => 'aiOpsEnabled', 'value' => '1']);
        $this->assertSame(401, $result->response()->getStatusCode());
    }

    public function testRunRejectsAnonymousCallerSignedWithEmptySecret(): void
    {
        putenv('AI_OPS_SHARED_SECRET=');
        $body = json_encode(['jobKey' => 'x', 'subsystem' => 'y']);
        $sig  = 'sha256=' . hash_hmac('sha256', (string) $body, '');

        $result = $this->withHeaders(['X-MyMI-Signature' => $sig, 'Content-Type' => 'application/json'])
            ->withBody((string) $body)
            ->post('/API/AiOps/run');

        $this->assertSame(401, $result->response()->getStatusCode());
    }
}
