<?php

namespace App\Commands\Database;

use App\Services\Spark\DbInventoryService;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Inventory extends SafeBaseCommand
{
    protected string $group       = 'database';
    protected string $name        = 'db:inventory';
    protected $description = 'Scan code and migrations to inventory MyMI Wallet tables and generate integrity docs/SQL adjustments.';
    protected $usage       = 'db:inventory [write-docs] [write-sql] [limit] [db-group] [--dry-run]';
    protected $arguments   = [
        'write-docs' => 'Optional: 1 to write docs (default 1).',
        'write-sql'  => 'Optional: 1 to write SQL adjustments (default 1).',
        'limit'      => 'Optional: limit tables processed (0 = no limit).',
        'db-group'   => 'Optional: database group to inspect (default: default).',
    ];
    protected $options     = [
        '--dry-run'    => 'Preview actions without writing data',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:db:inventory] Started', ['params' => $params]);
        CLI::write('Starting db:inventory', 'yellow');

        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        if ($dryRun) {
            CLI::write('Dry-run enabled. Inventory files will not be written.', 'yellow');
        }

        $options = [
            'write-docs' => isset($args[0]) ? (int) $args[0] : 1,
            'write-sql'  => isset($args[1]) ? (int) $args[1] : 1,
            'limit'      => isset($args[2]) ? (int) $args[2] : 0,
            'db-group'   => $args[3] ?? 'default',
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
