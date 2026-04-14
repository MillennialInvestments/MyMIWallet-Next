<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAiopsChatAdminTable extends Migration
{
    public function up(): void
    {
        if ($this->db->tableExists('bf_aiops_chat_admin')) {
            return;
        }

        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'     => 'BIGINT',
                'unsigned' => true,
                'null'     => true,
            ],
            'raw_text' => [
                'type' => 'LONGTEXT',
            ],
            'cleaned_text' => [
                'type' => 'LONGTEXT',
            ],
            'instruction_id' => [
                'type'     => 'BIGINT',
                'unsigned' => true,
                'null'     => true,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('instruction_id', false, false, 'idx_instruction_id');
        $this->forge->addKey('created_at', false, false, 'idx_created_at');

        $this->forge->createTable('bf_aiops_chat_admin', true, [
            'ENGINE' => 'InnoDB',
            'DEFAULT CHARSET' => 'utf8mb4',
        ]);
    }

    public function down(): void
    {
        if ($this->db->tableExists('bf_aiops_chat_admin')) {
            $this->forge->dropTable('bf_aiops_chat_admin', true);
        }
    }
}
