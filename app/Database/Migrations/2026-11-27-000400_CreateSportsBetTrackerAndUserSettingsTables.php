<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration 2026-11-27-000400: Create tables for Sports Bet Tracker,
 * User Settings (BYOK keys & bankroll preferences), and NBA prop analytics.
 * Analytics & personal bankroll tracking only; no real wagers are accepted or brokered.
 */
class CreateSportsBetTrackerAndUserSettingsTables extends Migration
{
    public function up(): void
    {
        // 1. Add sport column to bf_sports_players if not present
        if ($this->db->tableExists('bf_sports_players') && ! $this->db->fieldExists('sport', 'bf_sports_players')) {
            $this->forge->addColumn('bf_sports_players', [
                'sport' => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'NFL', 'after' => 'position'],
            ]);
        }

        // 2. bf_sports_user_bets (User personal bet slip ledger)
        if (! $this->db->tableExists('bf_sports_user_bets')) {
            $this->forge->addField([
                'id'                => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
                'user_id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'placed_at'         => ['type' => 'DATETIME'],
                'sportsbook'        => ['type' => 'VARCHAR', 'constraint' => 64, 'default' => 'DraftKings'],
                'sport'             => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'NFL'],
                'league'            => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'NFL'],
                'bet_type'          => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'Prop'],
                'event_description' => ['type' => 'VARCHAR', 'constraint' => 255],
                'selection'         => ['type' => 'VARCHAR', 'constraint' => 255],
                'line'              => ['type' => 'DECIMAL', 'constraint' => '7,2', 'null' => true],
                'odds'              => ['type' => 'INT', 'constraint' => 11, 'default' => -110],
                'stake_amount'      => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0.00],
                'potential_payout'  => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0.00],
                'status'            => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'open'],
                'closing_line'      => ['type' => 'DECIMAL', 'constraint' => '7,2', 'null' => true],
                'clv_edge'          => ['type' => 'DECIMAL', 'constraint' => '5,2', 'null' => true],
                'pnl_amount'        => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0.00],
                'notes'             => ['type' => 'TEXT', 'null' => true],
                'created_at'        => ['type' => 'DATETIME', 'null' => true],
                'updated_at'        => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('user_id');
            $this->forge->addKey(['user_id', 'status']);
            $this->forge->addKey(['user_id', 'sport']);
            $this->forge->createTable('bf_sports_user_bets', true);
        }

        // 3. bf_sports_user_settings (BYOK API keys and bankroll sizing)
        if (! $this->db->tableExists('bf_sports_user_settings')) {
            $this->forge->addField([
                'user_id'                 => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'odds_api_key_encrypted'  => ['type' => 'VARCHAR', 'constraint' => 512, 'null' => true],
                'api_sports_key_encrypted' => ['type' => 'VARCHAR', 'constraint' => 512, 'null' => true],
                'default_unit_size'       => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 50.00],
                'default_bankroll'        => ['type' => 'DECIMAL', 'constraint' => '12,2', 'default' => 2500.00],
                'bankroll_currency'       => ['type' => 'VARCHAR', 'constraint' => 8, 'default' => 'USD'],
                'created_at'              => ['type' => 'DATETIME', 'null' => true],
                'updated_at'              => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('user_id', true);
            $this->forge->createTable('bf_sports_user_settings', true);
        }

        // 4. bf_sports_nba_game_logs (NBA player boxscore histories)
        if (! $this->db->tableExists('bf_sports_nba_game_logs')) {
            $this->forge->addField([
                'id'         => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
                'player_id'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'season'     => ['type' => 'SMALLINT', 'constraint' => 4, 'unsigned' => true],
                'game_date'  => ['type' => 'DATE'],
                'opponent'   => ['type' => 'VARCHAR', 'constraint' => 8],
                'home_away'  => ['type' => 'CHAR', 'constraint' => 1, 'default' => 'H'],
                'minutes'    => ['type' => 'DECIMAL', 'constraint' => '4,1', 'default' => 0.0],
                'pts'        => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
                'reb'        => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
                'ast'        => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
                'threes'     => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
                'steals'     => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
                'blocks'     => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
                'turnovers'  => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey(['player_id', 'season']);
            $this->forge->createTable('bf_sports_nba_game_logs', true);
        }

        // 5. bf_sports_nba_defense_ranks (NBA team defensive rankings by stat)
        if (! $this->db->tableExists('bf_sports_nba_defense_ranks')) {
            $this->forge->addField([
                'id'              => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'season'          => ['type' => 'SMALLINT', 'constraint' => 4, 'unsigned' => true],
                'team'            => ['type' => 'VARCHAR', 'constraint' => 8],
                'pts_def_rank'    => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 15],
                'reb_def_rank'    => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 15],
                'ast_def_rank'    => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 15],
                'three_def_rank'  => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 15],
                'def_rating_rank' => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 15],
                'created_at'      => ['type' => 'DATETIME', 'null' => true],
                'updated_at'      => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey(['season', 'team'], 'uq_nba_def_season_team');
            $this->forge->createTable('bf_sports_nba_defense_ranks', true);
        }
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_sports_nba_defense_ranks', true);
        $this->forge->dropTable('bf_sports_nba_game_logs', true);
        $this->forge->dropTable('bf_sports_user_settings', true);
        $this->forge->dropTable('bf_sports_user_bets', true);
        if ($this->db->tableExists('bf_sports_players') && $this->db->fieldExists('sport', 'bf_sports_players')) {
            $this->forge->dropColumn('bf_sports_players', 'sport');
        }
    }
}
