<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class HealthFull extends SafeBaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:health:full';
    protected $description = 'Run full system health checks and generate a consolidated report';

    public function run(array $params)
    {
        $report = WRITEPATH . 'audit/health_full_report.md';
        @mkdir(dirname($report), 0775, true);

        $sections = [];

        $sections[] = $this->runSparkCapture('logs:healthcheck');
        $sections[] = $this->runSparkCapture('aiops:gate:cost');
        $sections[] = $this->runSparkCapture('aiops:routes:scan 10');
        $sections[] = $this->runSparkCapture('aiops:routes:gate ' . WRITEPATH . 'audit/routes_scan.json 1500 1200 50');
        $sections[] = $this->runSparkCapture('aiops:routes:regress');

        file_put_contents($report, "# Full Health Report\n\n" . implode("\n\n---\n\n", $sections));
        CLI::write("Wrote: {$report}");
    }

    private function runSparkCapture(string $cmd): string
    {
        $full = PHP_BINARY . ' ' . escapeshellarg(ROOTPATH . 'spark') . ' ' . $cmd;
        exec($full . ' 2>&1', $out, $code);

        $title = "## {$cmd}\n";
        $body = "Exit Code: {$code}\n\n```\n" . implode("\n", $out) . "\n```";

        return $title . $body;
    }
}
