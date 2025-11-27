<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDiscordQueue extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'channel_key' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => false],
            'payload_json' => ['type' => 'JSON', 'null' => false],
            'status' => ['type' => 'ENUM', 'constraint' => ['queued', 'sent', 'failed', 'skipped', 'dead'], 'default' => 'queued'],
            'priority' => ['type' => 'INT', 'null' => false, 'default' => 5],
            'dedupe_key' => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
            'dedupe_hash' => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
            'coalesce_key' => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
            'scheduled_at' => ['type' => 'DATETIME', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'],
            'available_at' => ['type' => 'DATETIME', 'null' => true],
            'error' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'],
            'sent_at' => ['type' => 'DATETIME', 'null' => true],
            'attempts' => ['type' => 'INT', 'null' => false, 'default' => 0],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('channel_key');
        $this->forge->addKey('status');
        $this->forge->addKey('available_at');
        $this->forge->addKey('coalesce_key');
        $this->forge->addKey('dedupe_hash');
        $this->forge->createTable('bf_discord_queue', true, ['ENGINE' => 'InnoDB', 'CHARSET' => 'utf8mb4', 'COLLATE' => 'utf8mb4_unicode_ci']);
    }

    public function down()
    {
        $this->forge->dropTable('bf_discord_queue', true);
    }
}
