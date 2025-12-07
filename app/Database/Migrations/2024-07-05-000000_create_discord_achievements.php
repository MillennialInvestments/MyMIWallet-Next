<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDiscordAchievements extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'key'         => ['type' => 'varchar', 'constraint' => 100],
            'name'        => ['type' => 'varchar', 'constraint' => 255],
            'description' => ['type' => 'text', 'null' => true],
            'points'      => ['type' => 'int', 'constraint' => 11, 'default' => 0],
            'created_at'  => ['type' => 'datetime', 'null' => true],
            'updated_at'  => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('key');
        $this->forge->createTable('bf_discord_achievements', true);

        $this->forge->addField([
            'id'              => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'discord_user_id' => ['type' => 'varchar', 'constraint' => 64],
            'achievement_id'  => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'completed_at'    => ['type' => 'datetime', 'null' => true],
            'created_at'      => ['type' => 'datetime', 'null' => true],
            'updated_at'      => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('achievement_id');
        $this->forge->addKey('discord_user_id');
        $this->forge->addForeignKey('achievement_id', 'bf_discord_achievements', 'id', '', 'CASCADE');
        $this->forge->createTable('bf_discord_user_achievements', true);

        $this->db->table('bf_discord_achievements')->insertBatch([
            [
                'key'         => 'onboarding_complete',
                'name'        => 'Completed Discord + MyMI onboarding',
                'description' => 'Linked Discord, reviewed How It Works, and walked through support.',
                'points'      => 25,
            ],
            [
                'key'         => 'read_how_it_works',
                'name'        => 'Read How It Works',
                'description' => 'Visited the How It Works guides for MyMI Wallet and Discord.',
                'points'      => 10,
            ],
            [
                'key'         => 'first_budget_sync',
                'name'        => 'First budget sync',
                'description' => 'Pulled your first budget summary into Discord.',
                'points'      => 15,
            ],
            [
                'key'         => 'first_trade_tracked',
                'name'        => 'First trade tracked',
                'description' => 'Tracked your first trade via MyMI (web or Discord).',
                'points'      => 15,
            ],
        ]);
    }

    public function down()
    {
        if ($this->db->DBDriver !== 'SQLite3') {
            $this->forge->dropForeignKey('bf_discord_user_achievements', 'bf_discord_user_achievements_achievement_id_foreign');
        }
        $this->forge->dropTable('bf_discord_user_achievements', true);
        $this->forge->dropTable('bf_discord_achievements', true);
    }
}
