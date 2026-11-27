<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration 2026-11-27-000600: Create tables for MLB baseball analytics,
 * NHL hockey analytics, and Same-Game Parlay (SGP) statistical correlation engine.
 *
 * Educational & quantitative sports analytics only.
 * No wagering or money pooling. Safe to re-run (checks table existence).
 */
class CreateSportsMlbNhlAndSgpTables extends Migration
{
    public function up(): void
    {
        // 1. bf_sports_mlb_pitcher_logs
        if (! $this->db->tableExists('bf_sports_mlb_pitcher_logs')) {
            $this->forge->addField([
                'id'                   => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
                'player_id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'season'               => ['type' => 'SMALLINT', 'constraint' => 4, 'unsigned' => true, 'default' => 2025],
                'game_date'            => ['type' => 'DATE'],
                'opponent'             => ['type' => 'VARCHAR', 'constraint' => 8],
                'home_away'            => ['type' => 'CHAR', 'constraint' => 1, 'default' => 'H'],
                'ip'                   => ['type' => 'DECIMAL', 'constraint' => '4,1', 'default' => 6.0],
                'strikeouts'           => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'walks'                => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'hits_allowed'         => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'er'                   => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'pitches'              => ['type' => 'SMALLINT', 'constraint' => 5, 'unsigned' => true, 'default' => 90],
                'swings_misses'        => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 12],
                'opp_k_rate_rank'      => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'null' => true],
                'created_at'           => ['type' => 'DATETIME', 'null' => true],
                'updated_at'           => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey(['player_id', 'season', 'game_date'], 'uq_mlb_pitcher_game');
            $this->forge->addKey('player_id');
            $this->forge->createTable('bf_sports_mlb_pitcher_logs', true);
        }

        // 2. bf_sports_mlb_batter_logs
        if (! $this->db->tableExists('bf_sports_mlb_batter_logs')) {
            $this->forge->addField([
                'id'                => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
                'player_id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'season'            => ['type' => 'SMALLINT', 'constraint' => 4, 'unsigned' => true, 'default' => 2025],
                'game_date'         => ['type' => 'DATE'],
                'opponent'          => ['type' => 'VARCHAR', 'constraint' => 8],
                'home_away'         => ['type' => 'CHAR', 'constraint' => 1, 'default' => 'H'],
                'opp_pitcher_hand'  => ['type' => 'CHAR', 'constraint' => 1, 'default' => 'R'],
                'at_bats'           => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 4],
                'hits'              => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'doubles'           => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'triples'           => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'home_runs'         => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'total_bases'       => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'rbi'               => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'runs'              => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'strikeouts'        => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'walks'             => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'created_at'        => ['type' => 'DATETIME', 'null' => true],
                'updated_at'        => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey(['player_id', 'season', 'game_date'], 'uq_mlb_batter_game');
            $this->forge->addKey('player_id');
            $this->forge->createTable('bf_sports_mlb_batter_logs', true);
        }

        // 3. bf_sports_mlb_park_factors
        if (! $this->db->tableExists('bf_sports_mlb_park_factors')) {
            $this->forge->addField([
                'id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'team'          => ['type' => 'VARCHAR', 'constraint' => 8],
                'venue_name'    => ['type' => 'VARCHAR', 'constraint' => 128],
                'run_factor'    => ['type' => 'DECIMAL', 'constraint' => '5,3', 'default' => 1.000],
                'hr_factor'     => ['type' => 'DECIMAL', 'constraint' => '5,3', 'default' => 1.000],
                'altitude_feet' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
                'is_dome'       => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'created_at'    => ['type' => 'DATETIME', 'null' => true],
                'updated_at'    => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('team', 'uq_mlb_park_team');
            $this->forge->createTable('bf_sports_mlb_park_factors', true);
        }

        // 4. bf_sports_nhl_skater_logs
        if (! $this->db->tableExists('bf_sports_nhl_skater_logs')) {
            $this->forge->addField([
                'id'               => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
                'player_id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'season'           => ['type' => 'SMALLINT', 'constraint' => 4, 'unsigned' => true, 'default' => 2025],
                'game_date'        => ['type' => 'DATE'],
                'opponent'         => ['type' => 'VARCHAR', 'constraint' => 8],
                'home_away'        => ['type' => 'CHAR', 'constraint' => 1, 'default' => 'H'],
                'toi_minutes'      => ['type' => 'DECIMAL', 'constraint' => '4,1', 'default' => 19.5],
                'shots_on_goal'    => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'shot_attempts'    => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'goals'            => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'assists'          => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'points'           => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'powerplay_points' => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'blocked_shots'    => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'created_at'       => ['type' => 'DATETIME', 'null' => true],
                'updated_at'       => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey(['player_id', 'season', 'game_date'], 'uq_nhl_skater_game');
            $this->forge->addKey('player_id');
            $this->forge->createTable('bf_sports_nhl_skater_logs', true);
        }

        // 5. bf_sports_nhl_goalie_logs
        if (! $this->db->tableExists('bf_sports_nhl_goalie_logs')) {
            $this->forge->addField([
                'id'            => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
                'player_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'season'        => ['type' => 'SMALLINT', 'constraint' => 4, 'unsigned' => true, 'default' => 2025],
                'game_date'     => ['type' => 'DATE'],
                'opponent'      => ['type' => 'VARCHAR', 'constraint' => 8],
                'home_away'     => ['type' => 'CHAR', 'constraint' => 1, 'default' => 'H'],
                'shots_faced'   => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 30],
                'saves'         => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 27],
                'goals_against' => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 3],
                'save_pct'      => ['type' => 'DECIMAL', 'constraint' => '4,3', 'default' => 0.900],
                'xga'           => ['type' => 'DECIMAL', 'constraint' => '4,2', 'null' => true],
                'decision'      => ['type' => 'VARCHAR', 'constraint' => 8, 'default' => 'W'],
                'created_at'    => ['type' => 'DATETIME', 'null' => true],
                'updated_at'    => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey(['player_id', 'season', 'game_date'], 'uq_nhl_goalie_game');
            $this->forge->addKey('player_id');
            $this->forge->createTable('bf_sports_nhl_goalie_logs', true);
        }

        // 6. bf_sports_nhl_team_defense
        if (! $this->db->tableExists('bf_sports_nhl_team_defense')) {
            $this->forge->addField([
                'id'                     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'season'                 => ['type' => 'SMALLINT', 'constraint' => 4, 'unsigned' => true, 'default' => 2025],
                'team'                   => ['type' => 'VARCHAR', 'constraint' => 8],
                'sog_allowed_pg'         => ['type' => 'DECIMAL', 'constraint' => '4,1', 'default' => 30.0],
                'sog_def_rank'           => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 15],
                'ga_pg'                  => ['type' => 'DECIMAL', 'constraint' => '3,2', 'default' => 3.00],
                'ga_def_rank'            => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 15],
                'pk_pct'                 => ['type' => 'DECIMAL', 'constraint' => '4,1', 'default' => 80.0],
                'pk_def_rank'            => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 15],
                'pp_pct'                 => ['type' => 'DECIMAL', 'constraint' => '4,1', 'default' => 20.0],
                'pp_rank'                => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 15],
                'high_danger_allowed_pg' => ['type' => 'DECIMAL', 'constraint' => '4,1', 'null' => true],
                'created_at'             => ['type' => 'DATETIME', 'null' => true],
                'updated_at'             => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey(['season', 'team'], 'uq_nhl_def_team');
            $this->forge->createTable('bf_sports_nhl_team_defense', true);
        }

        // 7. bf_sports_sgp_correlations
        if (! $this->db->tableExists('bf_sports_sgp_correlations')) {
            $this->forge->addField([
                'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'sport'             => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'NFL'],
                'leg_a_market'      => ['type' => 'VARCHAR', 'constraint' => 64],
                'leg_b_market'      => ['type' => 'VARCHAR', 'constraint' => 64],
                'direction'         => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'same'],
                'correlation_coeff' => ['type' => 'DECIMAL', 'constraint' => '4,2', 'default' => 0.00],
                'synergy_label'     => ['type' => 'VARCHAR', 'constraint' => 64, 'default' => 'Neutral'],
                'notes'             => ['type' => 'TEXT', 'null' => true],
                'created_at'        => ['type' => 'DATETIME', 'null' => true],
                'updated_at'        => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey(['sport', 'leg_a_market', 'leg_b_market', 'direction'], 'uq_sgp_pair');
            $this->forge->addKey('sport');
            $this->forge->createTable('bf_sports_sgp_correlations', true);
        }
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_sports_sgp_correlations', true);
        $this->forge->dropTable('bf_sports_nhl_team_defense', true);
        $this->forge->dropTable('bf_sports_nhl_goalie_logs', true);
        $this->forge->dropTable('bf_sports_nhl_skater_logs', true);
        $this->forge->dropTable('bf_sports_mlb_park_factors', true);
        $this->forge->dropTable('bf_sports_mlb_batter_logs', true);
        $this->forge->dropTable('bf_sports_mlb_pitcher_logs', true);
    }
}
