<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDiscordSubscriptions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'event_key' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => false],
            'channel_key' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => false],
            'template_key' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => false],
            'filters_json' => ['type' => 'TEXT', 'null' => true],
            'digest_window_sec' => ['type' => 'INT', 'null' => false, 'default' => 0],
            'max_per_window' => ['type' => 'INT', 'null' => false, 'default' => 0],
            'quiet_bypass' => ['type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0],
            'is_enabled' => ['type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 1],
            'priority' => ['type' => 'INT', 'null' => false, 'default' => 5],
            'coalesce_key' => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
            'role_key' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'mention_role' => ['type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0],
            'digest_template_key' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('event_key');
        $this->forge->addKey('channel_key');
        $this->forge->createTable('bf_discord_subscriptions', true, ['ENGINE' => 'InnoDB', 'CHARSET' => 'utf8mb4', 'COLLATE' => 'utf8mb4_unicode_ci']);
    }

    public function down()
    {
        $this->forge->dropTable('bf_discord_subscriptions', true);
    }
}
