<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserIpHistory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'email' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'ip_address' => ['type' => 'VARCHAR', 'constraint' => 45],
            'user_agent' => ['type' => 'TEXT', 'null' => true],
            'first_seen_at' => ['type' => 'DATETIME'],
            'last_seen_at' => ['type' => 'DATETIME'],
            'hits' => ['type' => 'INT', 'unsigned' => true, 'default' => 1],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey(['user_id', 'ip_address']);
        $this->forge->addKey(['email', 'ip_address']);
        $this->forge->createTable('bf_user_ip_history', true);

        $this->db->query('CREATE UNIQUE INDEX bf_user_ip_unique_user ON bf_user_ip_history (user_id, ip_address)');
        $this->db->query('CREATE UNIQUE INDEX bf_user_ip_unique_email ON bf_user_ip_history (email, ip_address)');
    }

    public function down()
    {
        $this->forge->dropTable('bf_user_ip_history', true);
    }
}
