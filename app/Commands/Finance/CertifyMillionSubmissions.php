<?php

declare(strict_types=1);

namespace App\Commands\Finance;

use App\Services\FinancialSubmissionEngine;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class CertifyMillionSubmissions extends BaseCommand
{
    protected $group       = 'Finance';
    protected $name        = 'finance:certify-million-submissions';
    protected $description = 'Execute and certify the 1,000,000-submission Budget + Wallet integrity benchmark in an isolated SQLite database.';
    protected $usage       = 'finance:certify-million-submissions [total] [chunkSize]';

    public function run(array $params)
    {
        $total     = isset($params[0]) && is_numeric($params[0]) ? max(1000, (int) $params[0]) : 1000000;
        $chunkSize = isset($params[1]) && is_numeric($params[1]) ? max(500, (int) $params[1]) : 10000;

        $db = Database::connect([
            'DSN'      => '',
            'hostname' => '',
            'username' => '',
            'password' => '',
            'database' => ':memory:',
            'DBDriver' => 'SQLite3',
            'DBPrefix' => '',
            'pConnect' => false,
            'DBDebug'  => true,
            'charset'  => 'utf8',
            'DBCollat' => '',
        ], false);

        $db->query('PRAGMA synchronous = OFF');
        $db->query('PRAGMA journal_mode = MEMORY');

        $db->query(
            'CREATE TABLE IF NOT EXISTS bf_users_wallet (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                wallet_type VARCHAR(64) NULL,
                nickname VARCHAR(128) NULL,
                amount DECIMAL(18,2) NOT NULL DEFAULT 0.00,
                balance DECIMAL(18,2) NOT NULL DEFAULT 0.00,
                currency VARCHAR(12) NOT NULL DEFAULT \'USD\',
                status INTEGER NOT NULL DEFAULT 1,
                active INTEGER NOT NULL DEFAULT 1,
                deleted INTEGER NOT NULL DEFAULT 0
            )'
        );

        $db->query(
            'CREATE TABLE IF NOT EXISTS bf_users_wallet_transactions (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                wallet_id INTEGER NOT NULL,
                trans_type VARCHAR(64) NOT NULL,
                type VARCHAR(64) NULL,
                amount DECIMAL(18,2) NOT NULL DEFAULT 0.00,
                currency VARCHAR(12) NOT NULL DEFAULT \'USD\',
                status VARCHAR(32) NOT NULL DEFAULT \'Completed\',
                active VARCHAR(12) NOT NULL DEFAULT \'Yes\',
                submitted_date DATETIME NULL,
                posted_date DATE NULL
            )'
        );

        $db->query(
            'CREATE TABLE IF NOT EXISTS bf_users_budgeting (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                created_by INTEGER NOT NULL,
                status INTEGER NOT NULL DEFAULT 1,
                deleted INTEGER NOT NULL DEFAULT 0,
                paid INTEGER NOT NULL DEFAULT 0,
                account_type VARCHAR(64) NULL,
                source_type VARCHAR(64) NULL,
                name VARCHAR(128) NULL,
                net_amount DECIMAL(18,2) NOT NULL DEFAULT 0.00,
                gross_amount DECIMAL(18,2) NOT NULL DEFAULT 0.00,
                designated_date VARCHAR(32) NULL,
                month INTEGER NULL,
                day INTEGER NULL,
                year INTEGER NULL,
                unix_timestamp INTEGER NULL,
                is_debt INTEGER NOT NULL DEFAULT 0,
                wallet_id INTEGER NULL
            )'
        );

        $engine = new FinancialSubmissionEngine($db);
        $report = $engine->runScaleBenchmark($total, $chunkSize);

        $evidencePath = ROOTPATH . 'docs/_aiops/gtm/evidence/2026-10-29-million-submission-benchmark.json';
        @mkdir(dirname($evidencePath), 0775, true);
        file_put_contents($evidencePath, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);

        CLI::write(json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return !empty($report['certified']) ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
