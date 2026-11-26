<?php

use App\Services\Ops\OpsJobRunner;
use CodeIgniter\Test\CIUnitTestCase;

final class OpsJobRunnerTest extends CIUnitTestCase
{
    private string $dir;
    private array $calls = [];

    protected function setUp(): void
    {
        parent::setUp();
        $this->dir = sys_get_temp_dir() . '/ops-runner-' . bin2hex(random_bytes(4));
        mkdir($this->dir, 0775, true);
        $this->calls = [];
    }

    protected function tearDown(): void
    {
        exec('rm -rf ' . escapeshellarg($this->dir));
        parent::tearDown();
    }

    private function runner(array $result): OpsJobRunner
    {
        return new OpsJobRunner($this->dir, function (string $key, array $payload) use ($result): array {
            $this->calls[] = [$key, $payload];

            return $result;
        });
    }

    public function testRefusesJobsOffTheAllowlistWithoutRunningThem(): void
    {
        $row = $this->runner(['status' => 'ok'])->run('ops.docs.sync_from_chatgpt_export');
        $this->assertSame(['refused', 2], [$row['status'], $row['rc']]);
        $this->assertSame([], $this->calls);
        $this->assertFileDoesNotExist($this->dir . '/ops/last-run/ops.docs.sync_from_chatgpt_export.json');
    }

    public function testDbMaintenanceNeedsTheFlag(): void
    {
        $this->assertSame('refused', $this->runner(['status' => 'ok'])->run('ops.db.maintenance')['status']);
        $this->assertSame([], $this->calls);
        $this->assertSame('ok', $this->runner(['status' => 'ok'])->run('ops.db.maintenance', true)['status']);
        $this->assertSame('ops.db.maintenance', $this->calls[0][0]);
    }

    public function testHealthCheckSkipsTheRetiredDreamhostHostAndRecordsTheRun(): void
    {
        $row = $this->runner(['status' => 'degraded'])->run('ops.health.check');
        $this->assertSame(['degraded', 0], [$row['status'], $row['rc']]);
        $this->assertArrayNotHasKey('aiops.mymiwallet.com', $this->calls[0][1]['hosts']);
        $saved = json_decode((string) file_get_contents($this->dir . '/ops/last-run/ops.health.check.json'), true);
        $this->assertSame('degraded', $saved['status']);
    }

    public function testAttentionIsDegradedAndErrorsFail(): void
    {
        $this->assertSame('degraded', $this->runner(['status' => 'attention'])->run('ops.routes.smoke_test')['status']);
        $row = $this->runner(['status' => 'error', 'message' => 'Logs directory not found'])->run('ops.logs.triage_daily');
        $this->assertSame(['error', 1], [$row['status'], $row['rc']]);
        $this->assertStringContainsString('Logs directory not found', $row['summary']);
    }

    public function testAThrowingJobIsRecordedAsErrorWithoutItsMessage(): void
    {
        $runner = new OpsJobRunner($this->dir, static function (): array {
            throw new RuntimeException('secret detail');
        });
        $row = $runner->run('ops.security.headers_scan');
        $this->assertSame('error', $row['status']);
        $this->assertStringNotContainsString('secret', $row['summary']);
    }
}
