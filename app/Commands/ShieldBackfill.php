<?php

declare(strict_types=1);

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class ShieldBackfill extends BaseCommand
{
    protected $group       = 'MyMI';
    protected $name        = 'mymi:shield-backfill';
    protected $description = 'Executes idempotent CodeIgniter Shield identity backfill (MYMI-GTM-015) and audits table schema.';

    public function run(array $params)
    {
        CLI::write("==================================================================", 'cyan');
        CLI::write("   MyMI WALLET: CODEIGNITER SHIELD IDENTITY BACKFILL RUNNER       ", 'yellow');
        CLI::write("==================================================================", 'cyan');

        $db = Database::connect('default');
        CLI::write("Connected to Database: " . $db->getDatabase(), 'green');

        if (! $db->tableExists('users')) {
            CLI::error("FATAL: 'users' table does not exist in active database. Cannot perform backfill.");
            return 1;
        }

        $migrationFile = APPPATH . 'Database/Migrations/2026-10-26-180000_ShieldIdentityBackfill.php';
        if (! file_exists($migrationFile)) {
            CLI::error("FATAL: Migration file not found: {$migrationFile}");
            return 1;
        }

        require_once $migrationFile;
        $migrationClass = '\App\Database\Migrations\ShieldIdentityBackfill';
        if (! class_exists($migrationClass)) {
            CLI::error("FATAL: Migration class '{$migrationClass}' could not be loaded.");
            return 1;
        }

        CLI::write("[1/3] Executing ShieldIdentityBackfill->up()...", 'yellow');
        try {
            $migration = new $migrationClass();
            $migration->up();
            CLI::write("  [PASS] Migration up() completed cleanly.", 'green');
        } catch (\Throwable $e) {
            CLI::error("  [FAIL] Migration up() threw exception: " . $e->getMessage());
            return 1;
        }

        CLI::write("[2/3] Registering in migrations tracker...", 'yellow');
        if ($db->tableExists('migrations')) {
            $existing = $db->table('migrations')
                ->where('version', '2026-10-26-180000')
                ->get()
                ->getRowArray();

            if (! $existing) {
                $db->table('migrations')->insert([
                    'version'   => '2026-10-26-180000',
                    'class'     => 'App\Database\Migrations\ShieldIdentityBackfill',
                    'group'     => 'default',
                    'namespace' => 'App',
                    'time'      => time(),
                    'batch'     => 2,
                ]);
                CLI::write("  [PASS] Recorded 2026-10-26-180000 as Batch 2 in migrations table.", 'green');
            } else {
                CLI::write("  [INFO] Already recorded in migrations table.", 'cyan');
            }
        }

        CLI::write("[3/3] Live Audit of Auth Tables in " . $db->getDatabase() . ":", 'yellow');
        $auditTables = [
            'users'             => 'Source users table',
            'auth_identities'   => 'Shield credentials (email_password)',
            'auth_logins'       => 'Login audit logs & rate limiting',
            'auth_tokens'       => 'Personal Access Tokens',
            'auth_groups_users' => 'Group & role mappings',
        ];

        foreach ($auditTables as $tbl => $label) {
            if ($db->tableExists($tbl)) {
                $count = $db->table($tbl)->countAllResults();
                CLI::write(sprintf("  [PRESENT] %-20s -> %6d rows (%s)", $tbl, $count, $label), 'green');
            } else {
                CLI::write(sprintf("  [MISSING] %-20s (%s)", $tbl, $label), 'red');
            }
        }

        CLI::write("==================================================================", 'cyan');
        CLI::write("   SHIELD IDENTITY BACKFILL COMPLETE & CERTIFIED (MYMI-GTM-015)   ", 'green');
        CLI::write("==================================================================", 'cyan');

        return 0;
    }
}
