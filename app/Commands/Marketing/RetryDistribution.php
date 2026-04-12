<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class RetryDistribution extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:retry-distribution';
    protected $description = 'Retry failed marketing distribution targets.';

    protected $options = [
        '--generated-content-id' => 'Only retry targets for a specific generated content record.',
        '--limit' => 'Maximum failed targets to retry (default 25).',
    ];

    public function run(array $params)
    {
        $generatedContentId = CLI::getOption('generated-content-id');
        $generatedContentId = $generatedContentId !== null ? (int) $generatedContentId : null;
        $limit = max(1, (int) (CLI::getOption('limit') ?? 25));

        $service = service('marketingDistributionService');
        $result = $service->retryFailedTargets($generatedContentId, $limit);

        CLI::write(json_encode([
            'status' => 'success',
            'result' => $result,
        ], JSON_PRETTY_PRINT));
    }
}
