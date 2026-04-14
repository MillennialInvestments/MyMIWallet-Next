<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDiscordOpsTables extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'sender_identity' => ['type' => 'VARCHAR', 'constraint' => 120, 'null' => false],
            'channel_key' => ['type' => 'VARCHAR', 'constraint' => 120, 'null' => false],
            'recipient_id' => ['type' => 'INT', 'null' => true],
            'recipient_email' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'subject' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'priority' => ['type' => 'INT', 'default' => 5],
            'message_payload' => ['type' => 'LONGTEXT', 'null' => false],
            'send_mode' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => false, 'default' => 'send'],
            'result_status' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => false, 'default' => 'pending'],
            'result_message' => ['type' => 'TEXT', 'null' => true],
            'external_message_id' => ['type' => 'VARCHAR', 'constraint' => 120, 'null' => true],
            'created_on' => ['type' => 'DATETIME', 'null' => false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['channel_key', 'created_on']);
        $this->forge->createTable('bf_discord_manual_messages', true);

        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'relay_type' => ['type' => 'VARCHAR', 'constraint' => 40, 'null' => false],
            'discord_user_id' => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true],
            'discord_channel_id' => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true],
            'command_name' => ['type' => 'VARCHAR', 'constraint' => 120, 'null' => false],
            'request_payload' => ['type' => 'LONGTEXT', 'null' => true],
            'response_payload' => ['type' => 'LONGTEXT', 'null' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => false, 'default' => 'ok'],
            'created_on' => ['type' => 'DATETIME', 'null' => false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['relay_type', 'created_on']);
        $this->forge->createTable('bf_discord_relay_audit', true);
    }

    public function down()
    {
        $this->forge->dropTable('bf_discord_relay_audit', true);
        $this->forge->dropTable('bf_discord_manual_messages', true);
    }
}
