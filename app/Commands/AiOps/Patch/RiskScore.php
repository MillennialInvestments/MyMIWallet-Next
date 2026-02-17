<?php

namespace App\Commands\AiOps\Patch;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Libraries\PatchRiskScorer;

class RiskScore extends SafeBaseCommand
{
    protected $group = 'AIOps - Patch';
    protected $name = 'aiops:patch:risk_score';
    protected $description = 'Calculate patch risk score';

    public function run(array $params)
    {
        $diffPath = ROOTPATH . 'aiops_generated_patch.diff';

        $scorer = new PatchRiskScorer();
        $result = $scorer->score($diffPath);

        if (!$result['ok']) {
            CLI::error($result['error']);
            return;
        }

        file_put_contents(
            WRITEPATH . 'audit/patch_risk_report.json',
            json_encode($result, JSON_PRETTY_PRINT)
        );

        CLI::write('Risk Score: ' . $result['total_risk']);
        CLI::write('Confidence: ' . $result['risk_breakdown']['confidence'] . '%');

        if ($result['total_risk'] > 60) {
            CLI::error('Patch risk too high. Blocking promotion.');
            exit(1);
        }
    }
}
