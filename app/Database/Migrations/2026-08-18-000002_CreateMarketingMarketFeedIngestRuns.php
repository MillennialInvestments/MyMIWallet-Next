<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

final class CreateMarketingMarketFeedIngestRuns extends Migration
{
    public function up(): void
    {
        if ($this->db->tableExists('bf_marketing_market_feed_runs')) {
            return;
        }

        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'run_uuid' => [
                'type' => 'CHAR',
                'constraint' => 32,
            ],
            'source_key' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'execution_mode' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
            ],
            'started_at' => [
                'type' => 'DATETIME',
            ],
            'finished_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'inserted' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => 0,
            ],
            'updated' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => 0,
            ],
            'unchanged' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => 0,
            ],
            'skipped' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => 0,
            ],
            'errors' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => 0,
            ],
            'rolled_back' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
            ],
            'code_sha' => [
                'type' => 'CHAR',
                'constraint' => 40,
                'null' => true,
            ],
            'config_sha256' => [
                'type' => 'CHAR',
                'constraint' => 64,
                'null' => true,
            ],
            'provenance_json' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(
            'run_uuid',
            'uq_market_feed_run_uuid'
        );
        $this->forge->addKey(
            'source_key',
            false,
            false,
            'idx_market_feed_run_source'
        );
        $this->forge->addKey(
            'status',
            false,
            false,
            'idx_market_feed_run_status'
        );
        $this->forge->addKey(
            'started_at',
            false,
            false,
            'idx_market_feed_run_started'
        );

        $this->forge->createTable(
            'bf_marketing_market_feed_runs',
            true
        );
    }

    public function down(): void
    {
        // Forward-only: ingest audit records are preserved.
    }
}
