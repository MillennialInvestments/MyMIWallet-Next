<?php

declare(strict_types=1);

namespace App\Commands\Platform;

use App\Commands\SafeBaseCommand;
use App\Libraries\Platform\ControlPlaneAnalyzer;
use CodeIgniter\CLI\CLI;

class ControlAnalyze extends SafeBaseCommand
{
    protected $group = 'platform';
    protected $name = 'platform:control:analyze';
    protected $description = 'Analyze collected control-plane artifacts and output ranked action queue.';

    public function run(array $params)
    {
        $reportPath = ROOTPATH . 'docs/_platform/control_plane_report.json';
        if (! is_file($reportPath)) {
            CLI::error('Run platform:control:collect first.');
            return;
        }

        $report = json_decode((string) file_get_contents($reportPath), true);
        if (! is_array($report)) {
            CLI::error('Control plane report is invalid JSON.');
            return;
        }

        $analyzer = new ControlPlaneAnalyzer();
        $queue = $analyzer->analyze((array) ($report['records'] ?? []));
        $report['analysis_queue'] = $queue;

        file_put_contents($reportPath, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);
        file_put_contents(ROOTPATH . 'docs/_platform/control_plane_report.md', "# Control Plane Report\n\n```json\n" . json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n```\n");

        CLI::write('Ranked action queue generated.', 'green');
        CLI::write(json_encode($queue, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }
}
