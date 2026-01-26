<?php

namespace App\Commands\Database;

use App\Services\Spark\DbApplyDocsService;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ApplyDocs extends SafeBaseCommand
{
    protected string $group       = 'database';
    protected string $name        = 'db:apply-docs';
    protected $description = 'Compile SQL from docs/mysql and apply statements with audit logging.';
    protected $usage       = 'db:apply-docs [db-group] [--dry-run]';
    protected $arguments   = [
        'db-group' => 'Optional: database group to use (default: default).',
    ];
    protected $options     = [
        '--dry-run'  => 'Compile SQL without executing statements.',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:db:apply-docs] Started', ['params' => $params]);
        CLI::write('Starting db:apply-docs', 'yellow');

        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        if ($dryRun) {
            CLI::write('Dry-run enabled. SQL will be compiled only.', 'yellow');
        }

        $options = [
            'db-group' => $args[0] ?? 'default',
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
