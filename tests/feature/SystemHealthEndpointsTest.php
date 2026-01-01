<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
final class SystemHealthEndpointsTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testHealthzReturnsStructuredJson(): void
    {
        $result = $this->get('system/healthz');

        $this->assertContains($result->getStatusCode(), [200, 503], 'healthz should respond without routing errors');

        $payload = $result->getJSON(true);
        $this->assertIsArray($payload);
        $this->assertArrayHasKey('status', $payload);
        $this->assertArrayHasKey('timestamp', $payload);
        $this->assertArrayHasKey('checks', $payload);
        $this->assertIsArray($payload['checks']);
    }

    public function testDiagIncludesBuildMetadata(): void
    {
        $result = $this->get('system/diag');

        $this->assertContains($result->getStatusCode(), [200, 503], 'diag should respond without routing errors');

        $payload = $result->getJSON(true);
        $this->assertArrayHasKey('system', $payload);
        $this->assertArrayHasKey('checks', $payload);

        $system = $payload['system'];
        $this->assertArrayHasKey('status', $system);
        $this->assertArrayHasKey('timestamp', $system);
        $this->assertArrayHasKey('app_version', $system);
        $this->assertArrayHasKey('git_ref', $system);
        $this->assertArrayHasKey('php_version', $system);
        $this->assertArrayHasKey('ci_version', $system);
        $this->assertArrayHasKey('timezone', $system);
    }
}
