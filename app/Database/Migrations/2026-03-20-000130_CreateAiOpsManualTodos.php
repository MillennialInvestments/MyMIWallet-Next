<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAiOpsManualTodos extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_aiops_manual_todos')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'content' => ['type' => 'TEXT'],
                'status' => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'open'],
                'source' => ['type' => 'VARCHAR', 'constraint' => 64, 'default' => 'docs_next_steps'],
                'created_at' => ['type' => 'DATETIME'],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
                'completed_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('status');
            $this->forge->createTable('bf_aiops_manual_todos');
        }
    }

    public function down()
    {
        if ($this->db->tableExists('bf_aiops_manual_todos')) {
            $this->forge->dropTable('bf_aiops_manual_todos');
        }
    }
}
