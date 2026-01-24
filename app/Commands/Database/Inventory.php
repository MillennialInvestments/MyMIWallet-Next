<?php

namespace App\Commands\Database;

use App\Services\Spark\DbInventoryService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Inventory extends BaseCommand
{
    protected $group       = 'database';
    protected $name        = 'db:inventory';
    protected $description = 'Scan code and migrations to inventory MyMI Wallet tables and generate integrity docs/SQL adjustments.';
    protected $usage       = 'db:inventory [options]';
    protected $options     = [
        '--write-docs' => 'Write /docs/mysql files (default: 1)',
        '--write-sql'  => 'Write SQL adjustment files (default: 1)',
        '--limit'      => 'Limit tables processed (0 = no limit)',
        '--db-group'   => 'Database group to inspect (default: default)',
        '--dry-run'    => 'Preview actions without writing data',
        '--force'      => 'Required for destructive actions',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:db:inventory] Started');
        CLI::write('Starting db:inventory', 'yellow');

        $dryRun = $this->option('dry-run') !== null || ! $this->option('force');
        if ($dryRun) {
            CLI::write('Dry-run enabled. Use --force to write inventory files.', 'yellow');
        }

        $options = [
            'write-docs' => $this->option('write-docs') ?? 1,
            'write-sql'  => $this->option('write-sql') ?? 1,
            'limit'      => $this->option('limit') ?? 0,
            'db-group'   => $this->option('db-group') ?? 'default',
        ];

        $service = new DbInventoryService();
        $result = $service->run($options, $dryRun);

        CLI::newLine();
        CLI::write('db:inventory summary');
        CLI::write('----------------------------------------');
        CLI::write('status: ' . ($result['status'] ?? 'unknown'));
        CLI::write('missing_tables: ' . count($result['missing_tables'] ?? []));
        CLI::write('missing_columns: ' . count($result['missing_columns'] ?? []));
        CLI::write('missing_indexes: ' . count($result['missing_indexes'] ?? []));
        CLI::write('output_dir: ' . ($result['output_dir'] ?? 'n/a'));

        if ($dryRun) {
            CLI::write('dry_run=true (no files written)');
        }

        log_message('info', '[spark:db:inventory] Completed', [
            'status' => $result['status'] ?? 'unknown',
            'missing_tables' => count($result['missing_tables'] ?? []),
            'missing_columns' => count($result['missing_columns'] ?? []),
            'missing_indexes' => count($result['missing_indexes'] ?? []),
            'dry_run' => $dryRun,
        ]);

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
