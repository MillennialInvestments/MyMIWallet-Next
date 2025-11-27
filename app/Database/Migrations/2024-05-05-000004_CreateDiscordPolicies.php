<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDiscordPolicies extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'pattern' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'action' => ['type' => 'ENUM', 'constraint' => ['drop', 'mask'], 'null' => false],
            'rule_type' => ['type' => 'ENUM', 'constraint' => ['blocklist', 'allowlist'], 'default' => 'blocklist'],
            'mask_with' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'channel_key' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'is_enabled' => ['type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 1],
            'created_at' => ['type' => 'DATETIME', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('bf_discord_policies', true, ['ENGINE' => 'InnoDB', 'CHARSET' => 'utf8mb4', 'COLLATE' => 'utf8mb4_unicode_ci']);
    }

    public function down()
    {
        $this->forge->dropTable('bf_discord_policies', true);
    }
}
