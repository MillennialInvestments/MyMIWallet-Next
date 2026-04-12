<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class PromotionsTest extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:promotions:test';
    protected $description = 'Run a chained smoke test for promotions audit and dry-run generation.';
    protected $usage = 'marketing:promotions:test [--limit=3]';
    protected $arguments = [];
    protected $options = [
        '--limit' => 'Number of rows to test in the generation dry-run. Default: 3',
    ];

    public function run(array $params)
    {
        $limit = (int) (CLI::getOption('limit') ?? 3);
        if ($limit <= 0) {
            $limit = 3;
        }

        CLI::write('Running promotions smoke test...', 'yellow');

        try {
            CLI::newLine();
            CLI::write('[1/2] Audit', 'green');
            command('marketing:promotions:audit --days=7 --limit=' . $limit);

            CLI::newLine();
            CLI::write('[2/2] Dry-run generation', 'green');
            command('marketing:promotions:generate --limit=' . $limit);

            CLI::newLine();
            CLI::write('Promotions smoke test completed successfully.', 'green');

            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            CLI::error('Promotions smoke test failed: ' . $e->getMessage());
            log_message('error', 'Marketing PromotionsTest failed: {message}', [
                'message' => $e->getMessage(),
            ]);

            return EXIT_ERROR;
        }
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}