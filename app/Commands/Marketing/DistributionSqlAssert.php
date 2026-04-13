<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class DistributionSqlAssert extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:distribution:assert-sql';
    protected $description = 'Runs SQL-level anomaly assertions for marketing distribution/regression monitoring.';

    public function run(array $params)
    {
        $assertions = service('marketingDistributionService')->getSqlAssertions();

        $status = (
            (int) ($assertions['duplicate_story_hash_groups'] ?? 0) === 0
            && (int) ($assertions['duplicate_distribution_targets'] ?? 0) === 0
        ) ? 'success' : 'warning';

        CLI::write((string) json_encode([
            'status' => $status,
            'assertions' => $assertions,
        ], JSON_PRETTY_PRINT));

        return $status === 'success' ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
