<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateChatToolRuns extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'user_id'       => ['type' => 'BIGINT', 'unsigned' => true, 'null' => false],
            'mode'          => ['type' => 'VARCHAR', 'constraint' => 25],
            'tool'          => ['type' => 'VARCHAR', 'constraint' => 100],
            'request_json'  => ['type' => 'LONGTEXT', 'null' => true],
            'response_json' => ['type' => 'LONGTEXT', 'null' => true],
            'status'        => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'success'],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['user_id', 'tool']);
        $this->forge->createTable('bf_chat_tool_runs', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_chat_tool_runs', true);
    }
}
