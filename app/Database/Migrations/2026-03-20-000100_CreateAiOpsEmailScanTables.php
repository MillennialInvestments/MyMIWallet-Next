<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAiOpsEmailScanTables extends Migration
{
    public function up(): void
    {
        $tableAttributes = [
            'ENGINE' => 'InnoDB',
            'DEFAULT CHARSET' => 'utf8mb4',
            'COLLATE' => 'utf8mb4_unicode_ci',
        ];

        $jsonType = $this->resolveJsonType();

        if (! $this->db->tableExists('bf_aiops_runs')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'run_key' => ['type' => 'VARCHAR', 'constraint' => 64],
                'mailbox' => ['type' => 'VARCHAR', 'constraint' => 190],
                'source_email' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'status' => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'running'],
                'started_at' => ['type' => 'DATETIME', 'null' => true],
                'finished_at' => ['type' => 'DATETIME', 'null' => true],
                'duration_seconds' => ['type' => 'INT', 'null' => true],
                'scanned_count' => ['type' => 'INT', 'default' => 0],
                'processed_count' => ['type' => 'INT', 'default' => 0],
                'duplicate_count' => ['type' => 'INT', 'default' => 0],
                'ticker_count' => ['type' => 'INT', 'default' => 0],
                'meta_json' => ['type' => $jsonType, 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('run_key');
            $this->forge->addKey('status');
            $this->forge->addKey('started_at');
            $this->forge->createTable('bf_aiops_runs', true, $tableAttributes);
        }

        if (! $this->db->tableExists('bf_aiops_email_processed')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'mailbox' => ['type' => 'VARCHAR', 'constraint' => 190],
                'imap_uid' => ['type' => 'BIGINT', 'unsigned' => true],
                'message_id' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'from_email' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'subject' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'received_at' => ['type' => 'DATETIME', 'null' => true],
                'processed_at' => ['type' => 'DATETIME', 'null' => true],
                'status' => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'stored'],
                'meta_json' => ['type' => $jsonType, 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey(['mailbox', 'imap_uid'], false, true);
            $this->forge->addKey('received_at');
            $this->forge->addKey('from_email');
            $this->forge->createTable('bf_aiops_email_processed', true, $tableAttributes);
        }

        if (! $this->db->tableExists('bf_investment_ticker_daily_counts')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'ticker' => ['type' => 'VARCHAR', 'constraint' => 16],
                'scan_date' => ['type' => 'DATE'],
                'source' => ['type' => 'VARCHAR', 'constraint' => 64, 'default' => 'email'],
                'scanner_key' => ['type' => 'VARCHAR', 'constraint' => 64, 'default' => ''],
                'occurrences' => ['type' => 'INT', 'unsigned' => true, 'default' => 0],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey(['ticker', 'scan_date', 'source', 'scanner_key'], false, true);
            $this->forge->addKey('scan_date');
            $this->forge->addKey('scanner_key');
            $this->forge->createTable('bf_investment_ticker_daily_counts', true, $tableAttributes);
        }

        if (! $this->db->tableExists('bf_investment_scanner_lineage')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'scanner_key' => ['type' => 'VARCHAR', 'constraint' => 64],
                'scanner_name' => ['type' => 'VARCHAR', 'constraint' => 190],
                'source' => ['type' => 'VARCHAR', 'constraint' => 64, 'default' => 'email'],
                'meta_json' => ['type' => $jsonType, 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey(['scanner_key', 'scanner_name', 'source'], false, true);
            $this->forge->addKey('scanner_key');
            $this->forge->createTable('bf_investment_scanner_lineage', true, $tableAttributes);
        }
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_investment_scanner_lineage', true);
        $this->forge->dropTable('bf_investment_ticker_daily_counts', true);
        $this->forge->dropTable('bf_aiops_email_processed', true);
        $this->forge->dropTable('bf_aiops_runs', true);
    }

    private function resolveJsonType(): string
    {
        $driver = $this->db->DBDriver ?? '';
        if (! in_array($driver, ['MySQLi', 'PDO'], true)) {
            return 'LONGTEXT';
        }

        $version = $this->db->getVersion();
        if ($version === null || $version === '') {
            return 'LONGTEXT';
        }

        if (stripos($version, 'mariadb') !== false) {
            return 'LONGTEXT';
        }

        return version_compare($version, '5.7.8', '>=') ? 'JSON' : 'LONGTEXT';
    }
}
