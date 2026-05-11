<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserAccountCompletionModalState extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('bf_user_account_completion_modal_state')) {
            return;
        }

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'last_action' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
                'null'       => true,
            ],
            'last_step_key' => [
                'type'       => 'VARCHAR',
                'constraint' => 80,
                'null'       => true,
            ],
            'dismissed_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'snoozed_until' => [
                'type' => 'DATETIME',
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
        $this->forge->addUniqueKey('user_id');
        $this->forge->addKey('snoozed_until');
        $this->forge->createTable('bf_user_account_completion_modal_state', true);
    }

    public function down()
    {
        if ($this->db->tableExists('bf_user_account_completion_modal_state')) {
            $this->forge->dropTable('bf_user_account_completion_modal_state', true);
        }
    }
}
