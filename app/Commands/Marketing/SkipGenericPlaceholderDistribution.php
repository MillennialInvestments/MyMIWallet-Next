<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SkipGenericPlaceholderDistribution extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:distribution:skip-generic-placeholders';
    protected $description = 'Dry-run/apply skip for generic all-symbol placeholder marketing distribution targets.';
    protected $usage = 'php spark marketing:distribution:skip-generic-placeholders [--approve] [--limit=500]';
    protected $options = [
        '--approve' => 'Apply the skip update. Without this flag, the command is dry-run only.',
        '--limit' => 'Maximum number of generated content rows to inspect/update.',
    ];

    public function run(array $params)
    {
        $options = CLI::getOptions();
        $approve = array_key_exists('approve', $options) || in_array('--approve', $params, true);
        $limit = max(1, (int) (CLI::getOption('limit') ?? 500));

        $result = service('marketingDistributionService')->skipGenericPlaceholderMarketingPending($approve, $limit);

        CLI::write(json_encode($result, JSON_PRETTY_PRINT));
        CLI::write($approve ? 'Applied generic placeholder distribution skip.' : 'Dry-run only. Re-run with --approve to apply.');
    }
}
