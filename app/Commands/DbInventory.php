<?php

namespace App\Commands;

use App\Libraries\DbInventory\InventoryScanner;
use App\Libraries\DbInventory\SqlGenerator;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;
use Throwable;

class DbInventory extends BaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'db:inventory';
    protected $description = 'Scan code and migrations to inventory MyMI Wallet tables and generate integrity docs.';
    protected $usage       = 'db:inventory [options]';
    protected $options     = [
        '--write-docs' => 'Write /docs/mysql files (default: 1)',
        '--write-sql'  => 'Write SQL adjustment files (default: 1)',
        '--limit'      => 'Limit tables processed (0 = no limit)',
        '--db-group'   => 'Database group to inspect (default: default)',
    ];

    public function run(array $params)
    {
        $writeDocs = (int) (CLI::getOption('write-docs') ?? 1);
        $writeSql  = (int) (CLI::getOption('write-sql') ?? 1);
        $limit     = (int) (CLI::getOption('limit') ?? 0);
        $dbGroup   = (string) (CLI::getOption('db-group') ?? 'default');

        $scanner = new InventoryScanner();
        $generator = new SqlGenerator();

        $inventory = $scanner->buildInventory($limit);

        $dbReport = null;
        try {
            $db = Database::connect($dbGroup);
            $dbReport = $scanner->inspectDatabase($db, $inventory);
        } catch (Throwable $exception) {
            $inventory['warnings'][] = 'Database inspection skipped: ' . $exception->getMessage();
        }

        $outputDir = WRITEPATH . 'db_inventory';
        if (! is_dir($outputDir)) {
            mkdir($outputDir, 0775, true);
        }

        $inventoryJson = json_encode($inventory, JSON_PRETTY_PRINT);
        file_put_contents($outputDir . '/inventory.json', $inventoryJson);

        $reportMarkdown = $scanner->buildReport($inventory, $dbReport);
        file_put_contents($outputDir . '/report.md', $reportMarkdown);

        $adjustmentSql = $generator->buildAdjustmentSql($inventory, $dbReport);
        file_put_contents($outputDir . '/adjustment.sql', $adjustmentSql);

        if ($writeDocs === 1) {
            $generator->writeDocs($inventory, $dbReport);
        }

        if ($writeSql === 1) {
            $generator->writeAdjustments($inventory, $dbReport);
        }

        CLI::write('db:inventory complete');
    }
}
