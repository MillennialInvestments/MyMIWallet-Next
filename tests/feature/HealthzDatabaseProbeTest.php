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
        // The test database (SQLite) is up, so the probe must say so; the old
        // isConnected() call threw and reported 'database error' here.
        $this->assertSame('ok', $database['status'] ?? null);
        $this->assertSame('database reachable', $database['detail']);
    }
}
