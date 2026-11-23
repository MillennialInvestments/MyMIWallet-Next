<?php

use App\Services\Ops\OpsStatusService;
use CodeIgniter\Test\CIUnitTestCase;

final class OpsStatusServiceTest extends CIUnitTestCase
{
    private string $dir;
    private int $now;

    protected function setUp(): void
    {
        parent::setUp();
        $this->dir = sys_get_temp_dir() . '/ops-status-' . bin2hex(random_bytes(4));
        mkdir($this->dir . '/writable/logs', 0775, true);
        mkdir($this->dir . '/writable/ops/last-run', 0775, true);
        mkdir($this->dir . '/root/docs/_aiops/gaps', 0775, true);
        $this->now = strtotime('2026-11-23 15:00:00');
    }

    protected function tearDown(): void
    {
        exec('rm -rf ' . escapeshellarg($this->dir));
        parent::tearDown();
    }

    private function service(bool $db = true): OpsStatusService
    {
        return new OpsStatusService($this->dir . '/writable', $this->dir . '/root', static fn (): bool => $db, $this->now);
    }

    public function testEmptyInstallReportsZeroesAndNeverRanJobs(): void
    {
        $s = $this->service()->snapshot();
        $this->assertSame('mymi_ops_status_v1', $s['schema']);
        $this->assertTrue($s['db']['ok']);
        $this->assertSame(0, $s['emergency']['last_24h']);
        $this->assertSame(0, $s['app_log']['error']);
        $this->assertNull($s['jobs'][0]['last_status']);
        $this->assertSame(0, $s['docs_gaps']['count']);
        $this->assertNull($s['revision']);
    }

    public function testCountsEmergencyAndAppLogWithScrubbedMessages(): void
    {
        $lines = [];
        foreach ([60, 300, 7200, 90000] as $ago) {
            $lines[] = json_encode(['timestamp' => date('c', $this->now - $ago), 'message' => 'Boom for alice@example.com at /var/www/x/y.php line 42', 'context' => ['secret' => 'zzz']]);
        }
        file_put_contents($this->dir . '/writable/logs/emergency.log', implode("\n", $lines) . "\n");
        $day = date('Y-m-d', $this->now);
        $log = "ERROR - {$day} 14:30:00 --> Token abcdefghijklmnopqrstuvwxyz123456 rejected\n"
            . "ERROR - {$day} 09:00:00 --> DB timeout 3001 ms\n"
            . "CRITICAL - {$day} 14:59:00 --> DB timeout 3002 ms\n"
            . "WARNING - {$day} 14:59:00 --> slow\n"
            . "INFO - {$day} 14:59:00 --> fine\n";
        // FileHandler writes log-<date>.php by default (Config\Logger fileExtension).
        file_put_contents($this->dir . '/writable/logs/log-' . $day . '.php', "<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>\n\n" . $log);
        file_put_contents($this->dir . '/root/REVISION', "ABCDEF1234567890abcdef1234567890abcdef12\n");

        $s = $this->service()->snapshot();
        $this->assertSame(2, $s['emergency']['last_15m']);
        $this->assertSame(3, $s['emergency']['last_24h']);
        $this->assertSame('Boom for [email] at [path] line N', $s['emergency']['top'][0]['message']);
        $this->assertSame(['critical' => 1, 'error' => 2, 'warning' => 1], ['critical' => $s['app_log']['critical'], 'error' => $s['app_log']['error'], 'warning' => $s['app_log']['warning']]);
        $this->assertSame(2, $s['app_log']['errors_last_hour']);
        $this->assertSame(['count' => 2, 'message' => 'DB timeout N ms'], $s['app_log']['top'][0]);
        $this->assertStringContainsString('[token]', $s['app_log']['top'][1]['message']);
        $this->assertSame('abcdef123456', $s['revision']);
        $this->assertStringNotContainsString('zzz', json_encode($s));
        $this->assertStringNotContainsString('alice', json_encode($s));
    }

    public function testJobsAndDocsGapsAndDbDown(): void
    {
        file_put_contents($this->dir . '/writable/ops/last-run/ops.health.check.json', json_encode([
            'job' => 'ops.health.check', 'status' => 'degraded', 'finished_at' => gmdate('Y-m-d\TH:i:s\Z', $this->now - 7200),
        ]));
        file_put_contents($this->dir . '/root/docs/_aiops/gaps/doc-coverage.csv',
            "module,file_path,file_type,suggested_doc_path,priority,confidence_score\nAPIs,a.php,Controller,docs/a.md,high,0.9\nX,b.php,Model,docs/b.md,low,0.5\n");

        $s = $this->service(false)->snapshot();
        $this->assertFalse($s['db']['ok']);
        $this->assertSame('degraded', $s['jobs'][0]['last_status']);
        $this->assertSame(2.0, $s['jobs'][0]['hours_since']);
        $this->assertSame(['count' => 2, 'high' => 1, 'top' => [['module' => 'APIs', 'doc' => 'docs/a.md']]], $s['docs_gaps']);
    }
    public function testRollingHourCrossesMidnightButDailyCountsStayToday(): void
    {
        $this->now = strtotime('2026-11-24 00:05:00');
        file_put_contents($this->dir . '/writable/logs/log-2026-11-23.php', "ERROR - 2026-11-23 23:55:00 --> late\n"
            . "ERROR - 2026-11-23 22:00:00 --> earlier\n");
        file_put_contents($this->dir . '/writable/logs/log-2026-11-24.php', "ERROR - 2026-11-24 00:01:00 --> early\n");
        $log = $this->service()->snapshot()['app_log'];
        $this->assertSame('2026-11-24', $log['date']);
        $this->assertSame(1, $log['error']);  // today's file only
        $this->assertSame(2, $log['errors_last_hour']);  // 23:55 and 00:01
        $this->assertSame('early', $log['top'][0]['message']);
    }
}
