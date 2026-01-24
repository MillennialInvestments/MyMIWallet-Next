<?php

namespace App\Commands\Database;

use App\Services\Spark\DbApplyDocsService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class ApplyDocs extends BaseCommand
{
    protected $group       = 'database';
    protected $name        = 'db:apply-docs';
    protected $description = 'Compile SQL from docs/mysql and apply statements with audit logging.';
    protected $usage       = 'db:apply-docs [options]';
    protected $options     = [
        '--dry-run'  => 'Compile SQL without executing statements.',
        '--db-group' => 'Database group to use (default: default).',
        '--force'    => 'Required for destructive actions',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:db:apply-docs] Started');
        CLI::write('Starting db:apply-docs', 'yellow');

        $dryRun = $this->option('dry-run') !== null || ! $this->option('force');
        if ($dryRun) {
            CLI::write('Dry-run enabled. Use --force to execute SQL.', 'yellow');
        }

        $options = [
            'db-group' => $this->option('db-group') ?? 'default',
        ];

        $service = new DbApplyDocsService();
        $result = $service->run($options, $dryRun);

        if (! ($result['ok'] ?? false)) {
            CLI::error($result['message'] ?? 'db:apply-docs failed.');
            log_message('error', '[spark:db:apply-docs] Failed', [
                'message' => $result['message'] ?? null,
                'log_path' => $result['log_path'] ?? null,
            ]);
            return EXIT_ERROR;
        }

        if ($dryRun) {
            CLI::write('Dry-run complete. SQL compiled only.', 'green');
        } else {
            CLI::write('db:apply-docs complete', 'green');
        }

        CLI::write('executed_statements: ' . ($result['executed'] ?? 0));
        CLI::write('log_path: ' . ($result['log_path'] ?? 'n/a'));

        log_message('info', '[spark:db:apply-docs] Completed', [
            'executed' => $result['executed'] ?? 0,
            'dry_run' => $dryRun,
        ]);

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
