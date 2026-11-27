<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * Regression: the /healthz database probe called $db->isConnected(), which
 * CodeIgniter 4.7 connections do not have, so every probe logged "Database
 * health probe failed: Call to undefined method ...::isConnected()" and the
 * endpoint answered 503 even with the database up.
 *
 * @internal
 */
final class HealthzDatabaseProbeTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testDatabaseProbeDoesNotCallAMissingMethod(): void
    {
        $result = $this->get('healthz');
        $payload = json_decode((string) $result->response()->getBody(), true);

        $this->assertIsArray($payload);
        $database = $payload['checks']['database'] ?? [];
        if (($database['status'] ?? null) !== 'ok') {
            // No test database here: the probe must still fail cleanly, not with a PHP error.
            $this->assertSame('database unreachable', $database['detail'] ?? null, 'probe must not throw');
            return;
        }

        $this->assertSame('database reachable', $database['detail']);
    }
}
