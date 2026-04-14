<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSupportTickets extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'email' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'subject' => ['type' => 'VARCHAR', 'constraint' => 255],
            'message' => ['type' => 'TEXT'],
            'category' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'auth'],
            'status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'open'],
            'priority' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'normal'],
            'ip_address' => ['type' => 'VARCHAR', 'constraint' => 45],
            'user_agent' => ['type' => 'TEXT', 'null' => true],
            'ref_context_json' => ['type' => 'LONGTEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['user_id', 'status']);
        $this->forge->createTable('bf_support_tickets', true);

        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'ticket_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'event_type' => ['type' => 'VARCHAR', 'constraint' => 80],
            'payload_json' => ['type' => 'LONGTEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['ticket_id', 'event_type']);
        $this->forge->createTable('bf_support_ticket_events', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_support_ticket_events', true);
        $this->forge->dropTable('bf_support_tickets', true);
    }
}
