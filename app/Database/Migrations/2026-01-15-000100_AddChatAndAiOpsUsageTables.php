<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddChatAndAiOpsUsageTables extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('chat_usage')) {
            $this->forge->addField([
                'user_id'    => ['type' => 'BIGINT', 'null' => false],
                'month'      => ['type' => 'CHAR', 'constraint' => 7, 'null' => false],
                'tokens_used'=> ['type' => 'INT', 'default' => 0],
                'usd_used'   => ['type' => 'DECIMAL', 'constraint' => '10,4', 'default' => 0],
                'last_plan'  => ['type' => 'VARCHAR', 'constraint' => 32, 'null' => true],
                'last_email' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey(['user_id', 'month'], true);
            $this->forge->addKey('last_plan');
            $this->forge->createTable('chat_usage');
        }

        if (! $this->db->tableExists('bf_aiops_workflow_usage')) {
            $this->forge->addField([
                'workflow_id'  => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => false],
                'workflow_slug'=> ['type' => 'VARCHAR', 'constraint' => 190, 'null' => true],
                'month'        => ['type' => 'CHAR', 'constraint' => 7, 'null' => false],
                'usd_used'     => ['type' => 'DECIMAL', 'constraint' => '10,4', 'default' => 0],
                'updated_at'   => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey(['workflow_id', 'month'], true);
            $this->forge->addKey('workflow_slug');
            $this->forge->createTable('bf_aiops_workflow_usage');
        }

        if ($this->db->tableExists('bf_aiops_usage') && ! $this->db->fieldExists('workflow_id', 'bf_aiops_usage')) {
            $this->forge->addColumn('bf_aiops_usage', [
                'workflow_id' => [
                    'type' => 'VARCHAR',
                    'constraint' => 64,
                    'null' => true,
                    'after' => 'request_id',
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->fieldExists('workflow_id', 'bf_aiops_usage')) {
            $this->forge->dropColumn('bf_aiops_usage', 'workflow_id');
        }

        $this->forge->dropTable('bf_aiops_workflow_usage', true);
        $this->forge->dropTable('chat_usage', true);
    }
}
