<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * NFL running back prop analytics: players, per-game logs and defense ranks.
 * Analytics only; no wagering or money tables. Safe to re-run (IF NOT EXISTS).
 */
class CreateSportsPropAnalyticsTables extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'provider'    => ['type' => 'VARCHAR', 'constraint' => 32],
            'external_id' => ['type' => 'VARCHAR', 'constraint' => 64],
            'full_name'   => ['type' => 'VARCHAR', 'constraint' => 120],
            'team'        => ['type' => 'VARCHAR', 'constraint' => 8, 'null' => true],
            'position'    => ['type' => 'VARCHAR', 'constraint' => 8, 'default' => 'RB'],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['provider', 'external_id'], 'uq_sports_players_provider_ext');
        $this->forge->createTable('bf_sports_players', true);

        $this->forge->addField([
            'id'          => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
            'player_id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'provider'    => ['type' => 'VARCHAR', 'constraint' => 32],
            'season'      => ['type' => 'SMALLINT', 'constraint' => 4, 'unsigned' => true],
            'week'        => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true],
            'game_date'   => ['type' => 'DATE', 'null' => true],
            'team'        => ['type' => 'VARCHAR', 'constraint' => 8, 'null' => true],
            'opponent'    => ['type' => 'VARCHAR', 'constraint' => 8],
            'home_away'   => ['type' => 'CHAR', 'constraint' => 1, 'default' => 'H'],
            'rush_att'    => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
            'rush_yds'    => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
            'rush_td'     => ['type' => 'TINYINT', 'constraint' => 3, 'default' => 0],
            'targets'     => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
            'receptions'  => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
            'rec_yds'     => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
            'rec_td'      => ['type' => 'TINYINT', 'constraint' => 3, 'default' => 0],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['player_id', 'season', 'week'], 'uq_sports_rb_logs_player_week');
        $this->forge->addKey(['opponent', 'season']);
        $this->forge->createTable('bf_sports_rb_game_logs', true);

        $this->forge->addField([
            'id'                  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'provider'            => ['type' => 'VARCHAR', 'constraint' => 32],
            'season'              => ['type' => 'SMALLINT', 'constraint' => 4, 'unsigned' => true],
            'week'                => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
            'team'                => ['type' => 'VARCHAR', 'constraint' => 8],
            'rush_def_rank'       => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true],
            'rb_rec_def_rank'     => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'null' => true],
            'rush_yds_allowed_pg' => ['type' => 'DECIMAL', 'constraint' => '5,1', 'null' => true],
            'created_at'          => ['type' => 'DATETIME', 'null' => true],
            'updated_at'          => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['provider', 'season', 'week', 'team'], 'uq_sports_def_rank');
        $this->forge->createTable('bf_sports_defense_ranks', true);
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_sports_defense_ranks', true);
        $this->forge->dropTable('bf_sports_rb_game_logs', true);
        $this->forge->dropTable('bf_sports_players', true);
    }
}
