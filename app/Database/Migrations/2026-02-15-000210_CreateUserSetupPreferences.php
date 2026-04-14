<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserSetupPreferences extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_user_setup_preferences')) {
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
                'dismiss_all' => [
                    'type'       => 'TINYINT',
                    'constraint' => 1,
                    'default'    => 0,
                ],
                'dismiss_budget' => [
                    'type'       => 'TINYINT',
                    'constraint' => 1,
                    'default'    => 0,
                ],
                'dismiss_wallets' => [
                    'type'       => 'TINYINT',
                    'constraint' => 1,
                    'default'    => 0,
                ],
                'dismiss_dashboard' => [
                    'type'       => 'TINYINT',
                    'constraint' => 1,
                    'default'    => 0,
                ],
                'updated_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('user_id');
            $this->forge->addUniqueKey('user_id');
            $this->forge->createTable('bf_user_setup_preferences', true);
        }
    }

    public function down()
    {
        if ($this->db->tableExists('bf_user_setup_preferences')) {
            $this->forge->dropTable('bf_user_setup_preferences', true);
        }
    }
}
