<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAiOpsIngestRuns extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_aiops_ingest_runs')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'job' => ['type' => 'VARCHAR', 'constraint' => 64],
                'started_at' => ['type' => 'DATETIME', 'null' => true],
                'ended_at' => ['type' => 'DATETIME', 'null' => true],
                'duration_ms' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
                'emails_scanned' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
                'new_emails' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
                'duplicates' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
                'alerts_created' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
                'alerts_updated' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
                'status' => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'success'],
                'error_message' => ['type' => 'TEXT', 'null' => true],
                'created_at' => ['type' => 'DATETIME'],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('job');
            $this->forge->addKey('created_at');
            $this->forge->createTable('bf_aiops_ingest_runs');
        }
    }

    public function down()
    {
        if ($this->db->tableExists('bf_aiops_ingest_runs')) {
            $this->forge->dropTable('bf_aiops_ingest_runs');
        }
    }
}
