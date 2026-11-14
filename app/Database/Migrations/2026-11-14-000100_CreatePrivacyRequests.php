<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePrivacyRequests extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('bf_privacy_requests')) {
            return;
        }
        $this->forge->addField([
            'id'          => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'user_id'     => ['type' => 'BIGINT', 'unsigned' => true],
            'type'        => ['type' => 'VARCHAR', 'constraint' => 16],
            'status'      => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'pending'],
            'notes'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'result_path' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['user_id', 'type', 'status']);
        $this->forge->createTable('bf_privacy_requests');
    }

    public function down()
    {
        $this->forge->dropTable('bf_privacy_requests', true);
    }
}
