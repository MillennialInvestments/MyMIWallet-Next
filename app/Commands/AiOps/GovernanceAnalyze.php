<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class GovernanceAnalyze extends SafeBaseCommand
{
    protected $group = 'AiOps';
    protected $name = 'aiops:governance:analyze';
    protected $description = 'Analyze token usage + model anomalies';

    public function run(array $params)
    {
        $costFile = WRITEPATH . 'audit/cost_tracker.json';

        if (!file_exists($costFile)) {
            CLI::write('No cost data.');
            return;
        }

        $data = json_decode(file_get_contents($costFile), true);

        $daily = $data['daily_total'] ?? 0;

        if ($daily > 20) {
            CLI::error('Cost anomaly detected.');
            exit(1);
        }

        CLI::write('Governance check passed.');
    }
}
