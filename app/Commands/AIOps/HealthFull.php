<?php

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class HealthFull extends SafeBaseCommand
{
    protected $group = 'AIOps - Audit';
    protected $name = 'aiops:health:full';
    protected $description = 'Run full system health checks and generate a consolidated report';

    public function run(array $params)
    {
        $report = WRITEPATH . 'audit/health_full_report.md';
        @mkdir(dirname($report), 0775, true);

        $commands = [
            'logs:healthcheck',
            'aiops:gate:cost',
            'aiops:routes:scan 10',
            'aiops:routes:gate ' . WRITEPATH . 'audit/routes_scan.json 1500 1200 50',
            'aiops:routes:regress',
        ];

        $sections = [];
        foreach ($commands as $cmd) {
            $body = $this->sparkCapture($cmd, true);
            $sections[] = "## {$cmd}\n\n```\n{$body}\n```";
        }

        file_put_contents($report, "# Full Health Report\n\n" . implode("\n\n---\n\n", $sections));
        CLI::write("Wrote: {$report}");

        $this->nextStep('aiops:doctor', 'Validate command wiring and service dependencies after health aggregation.', [$report]);

        return EXIT_SUCCESS;
    }
}
