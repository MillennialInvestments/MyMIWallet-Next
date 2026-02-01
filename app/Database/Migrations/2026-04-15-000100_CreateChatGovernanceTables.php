<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateChatGovernanceTables extends Migration
{
    public function up(): void
    {
        $tableAttributes = [
            'ENGINE'  => 'InnoDB',
            'DEFAULT CHARSET' => 'utf8mb4',
            'COLLATE' => 'utf8mb4_unicode_ci',
        ];

        if (! $this->db->tableExists('bf_chat_archives')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'chat_file' => ['type' => 'VARCHAR', 'constraint' => 255],
                'project' => ['type' => 'VARCHAR', 'constraint' => 120, 'default' => 'default'],
                'chat_date' => ['type' => 'DATE', 'null' => true],
                'title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'overall_status' => ['type' => 'VARCHAR', 'constraint' => 40, 'default' => 'unknown'],
                'next_required_step' => ['type' => 'VARCHAR', 'constraint' => 40, 'null' => true],
                'last_updated' => ['type' => 'DATETIME', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('chat_file', false, true);
            $this->forge->addKey('project');
            $this->forge->addKey('chat_date');
            $this->forge->addKey('overall_status');
            $this->forge->createTable('bf_chat_archives', true, $tableAttributes);
        }

        if (! $this->db->tableExists('bf_chat_steps')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'chat_archive_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'step' => ['type' => 'VARCHAR', 'constraint' => 20],
                'status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'unknown'],
                'detected_at' => ['type' => 'DATETIME'],
                'notes' => ['type' => 'TEXT', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('chat_archive_id');
            $this->forge->addKey(['chat_archive_id', 'step'], false, true);
            $this->forge->addKey('step');
            $this->forge->addKey('status');
            $this->forge->createTable('bf_chat_steps', true, $tableAttributes);
        }
    }

    public function down(): void
    {
        if ($this->db->tableExists('bf_chat_steps')) {
            $this->forge->dropTable('bf_chat_steps', true);
        }

        if ($this->db->tableExists('bf_chat_archives')) {
            $this->forge->dropTable('bf_chat_archives', true);
        }
    }
}
