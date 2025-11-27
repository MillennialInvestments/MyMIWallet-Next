<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDiscordEventsLog extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'level' => ['type' => 'VARCHAR', 'constraint' => 16, 'null' => false],
            'event_key' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'channel_key' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'payload_json' => ['type' => 'JSON', 'null' => true],
            'details_json' => ['type' => 'JSON', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('event_key');
        $this->forge->addKey('channel_key');
        $this->forge->createTable('bf_discord_events_log', true, ['ENGINE' => 'InnoDB', 'CHARSET' => 'utf8mb4', 'COLLATE' => 'utf8mb4_unicode_ci']);
    }

    public function down()
    {
        $this->forge->dropTable('bf_discord_events_log', true);
    }
}
