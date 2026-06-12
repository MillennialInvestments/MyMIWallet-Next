<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class RepairPendingGenerationDistribution extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:distribution:repair-pending-generation';
    protected $description = 'Dry-run/apply repair for approved pending_generation content that already has pending marketing distribution targets.';
    protected $usage = 'php spark marketing:distribution:repair-pending-generation [--approve] [--limit=500]';
    protected $options = [
        '--approve' => 'Apply the status repair. Without this flag, the command is dry-run only.',
        '--limit' => 'Maximum number of generated content rows to inspect/update.',
    ];

    public function run(array $params)
    {
        $options = CLI::getOptions();
        $approve = array_key_exists('approve', $options) || in_array('--approve', $params, true);
        $limit = max(1, (int) (CLI::getOption('limit') ?? 500));
        $result = service('marketingDistributionService')->repairApprovedPendingGenerationWithTargets($approve, $limit);

        CLI::write(json_encode($result, JSON_PRETTY_PRINT));
        CLI::write($approve ? 'Applied pending_generation distribution repair.' : 'Dry-run only. Re-run with --approve to apply.');
    }
}
