<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAiOpsCellDiscoveryTables extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('aiops_scan_state')) {
            $this->forge->addField([
                'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                'scanner_name' => ['type' => 'VARCHAR', 'constraint' => 64],
                'status' => ['type' => 'ENUM', 'constraint' => ['idle', 'running', 'paused', 'completed'], 'default' => 'idle'],
                'last_cursor' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'sleep_seconds' => ['type' => 'INT', 'constraint' => 11, 'default' => 900],
                'batch_size' => ['type' => 'INT', 'constraint' => 11, 'default' => 5],
                'max_prs_per_run' => ['type' => 'INT', 'constraint' => 11, 'default' => 1],
                'cycle_count' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
                'last_run_at' => ['type' => 'DATETIME', 'null' => true],
                'notes' => ['type' => 'TEXT', 'null' => true],
                'updated_at' => ['type' => 'DATETIME'],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('scanner_name');
            $this->forge->createTable('aiops_scan_state');
        }

        if (! $this->db->tableExists('aiops_work_queue')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'scanner_name' => ['type' => 'VARCHAR', 'constraint' => 64],
                'file_path' => ['type' => 'VARCHAR', 'constraint' => 500],
                'file_hash' => ['type' => 'CHAR', 'constraint' => 64, 'null' => true],
                'priority' => ['type' => 'INT', 'constraint' => 11, 'default' => 100],
                'status' => ['type' => 'ENUM', 'constraint' => ['pending', 'processing', 'completed', 'failed', 'deferred'], 'default' => 'pending'],
                'attempt_count' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
                'last_error' => ['type' => 'TEXT', 'null' => true],
                'last_touched_at' => ['type' => 'DATETIME', 'null' => true],
                'created_at' => ['type' => 'DATETIME'],
                'updated_at' => ['type' => 'DATETIME'],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('scanner_name');
            $this->forge->addKey('file_path');
            $this->forge->addUniqueKey(['scanner_name', 'file_path']);
            $this->forge->createTable('aiops_work_queue');
        }

        if (! $this->db->tableExists('aiops_review_ledger')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'scanner_name' => ['type' => 'VARCHAR', 'constraint' => 64],
                'file_path' => ['type' => 'VARCHAR', 'constraint' => 500],
                'hash_at_review' => ['type' => 'CHAR', 'constraint' => 64],
                'decision' => ['type' => 'ENUM', 'constraint' => ['candidate', 'converted', 'skipped', 'deferred', 'failed']],
                'pr_ref' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
                'summary' => ['type' => 'TEXT', 'null' => true],
                'reviewed_at' => ['type' => 'DATETIME'],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('scanner_name');
            $this->forge->addKey('file_path');
            $this->forge->addUniqueKey(['scanner_name', 'file_path', 'hash_at_review']);
            $this->forge->createTable('aiops_review_ledger');
        }
    }

    public function down()
    {
        if ($this->db->tableExists('aiops_review_ledger')) {
            $this->forge->dropTable('aiops_review_ledger');
        }

        if ($this->db->tableExists('aiops_work_queue')) {
            $this->forge->dropTable('aiops_work_queue');
        }

        if ($this->db->tableExists('aiops_scan_state')) {
            $this->forge->dropTable('aiops_scan_state');
        }
    }
}
