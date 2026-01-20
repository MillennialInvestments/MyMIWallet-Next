<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmailOutbox extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'to_email' => [
                'type' => 'VARCHAR',
                'constraint' => 190,
            ],
            'subject' => [
                'type' => 'VARCHAR',
                'constraint' => 190,
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'default' => 'queued',
            ],
            'error_message' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'provider' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'smtp',
            ],
            'meta_json' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'sent_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('user_id');
        $this->forge->addKey('type');
        $this->forge->addKey('status');
        $this->forge->addKey('created_at');

        $this->forge->createTable('bf_email_outbox', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_email_outbox', true);
    }
}
