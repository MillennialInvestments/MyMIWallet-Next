<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserEvents extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_user_events')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'BIGINT',
                    'constraint'     => 20,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'user_id' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'unsigned'   => true,
                    'null'       => true,
                ],
                'event_key' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 64,
                ],
                'event_group' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 32,
                ],
                'referral_code' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 64,
                    'null'       => true,
                ],
                'ip' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 45,
                    'null'       => true,
                ],
                'user_agent' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                ],
                'meta_json' => [
                    'type' => 'LONGTEXT',
                    'null' => true,
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                ],
            ]);

            $this->forge->addKey('id', true);
            $this->forge->addKey('user_id');
            $this->forge->addKey('event_key');
            $this->forge->addKey('event_group');
            $this->forge->addKey('referral_code');
            $this->forge->addKey('created_at');

            $this->forge->createTable('bf_user_events', true);
        }
    }

    public function down()
    {
        if ($this->db->tableExists('bf_user_events')) {
            $this->forge->dropTable('bf_user_events', true);
        }
    }
}
