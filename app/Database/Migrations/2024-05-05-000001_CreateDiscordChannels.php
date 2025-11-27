<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDiscordChannels extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'channel_key' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => false],
            'name' => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
            'webhook_url' => ['type' => 'TEXT', 'null' => true],
            'channel_id' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'is_enabled' => ['type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 1],
            'allow_embeds' => ['type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 1],
            'min_interval_sec' => ['type' => 'INT', 'null' => true, 'default' => 60],
            'last_sent_at' => ['type' => 'DATETIME', 'null' => true],
            'role_id' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'category' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'priority' => ['type' => 'INT', 'null' => false, 'default' => 5],
            'topic' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'],
            'updated_at' => ['type' => 'DATETIME', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('channel_key');
        $this->forge->createTable('bf_discord_channels', true, ['ENGINE' => 'InnoDB', 'CHARSET' => 'utf8mb4', 'COLLATE' => 'utf8mb4_unicode_ci']);

        // Seed baseline channel rows so the pipeline has inspectable placeholders.
        $seeds = [
            ['channel_key' => 'alerts', 'is_enabled' => 1],
            ['channel_key' => 'alerts.free', 'is_enabled' => 1],
            ['channel_key' => 'alerts.tier1', 'is_enabled' => 1],
            ['channel_key' => 'alerts.tier2', 'is_enabled' => 1],
            ['channel_key' => 'alerts.tier3', 'is_enabled' => 1],
            ['channel_key' => 'earnings', 'is_enabled' => 1],
            ['channel_key' => 'marketing', 'is_enabled' => 1],
            ['channel_key' => 'ops', 'is_enabled' => 1],
            ['channel_key' => 'staging', 'is_enabled' => 1],
        ];

        $builder = $this->db->table('bf_discord_channels');
        foreach ($seeds as $row) {
            $builder->ignore(true)->insert($row);
        }
    }

    public function down()
    {
        $this->forge->dropTable('bf_discord_channels', true);
    }
}
