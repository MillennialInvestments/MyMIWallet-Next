<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration 2026-11-27-000700: Tables for Soccer (EPL / Champions League) xG analytics,
 * College Sports (NCAAF / NCAAB) power ratings, and Custom Quantitative Model Tuning.
 *
 * Educational & quantitative sports analytics only.
 * No wagering or money pooling. Safe to re-run (checks table and column existence).
 */
class CreateSportsSoccerCollegeAndQuantTables extends Migration
{
    public function up(): void
    {
        // 1. bf_sports_soccer_team_stats
        if (! $this->db->tableExists('bf_sports_soccer_team_stats')) {
            $this->forge->addField([
                'id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'league'           => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'EPL'],
                'team'             => ['type' => 'VARCHAR', 'constraint' => 16],
                'team_name'        => ['type' => 'VARCHAR', 'constraint' => 64],
                'matches_played'   => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
                'xg_for_pg'        => ['type' => 'DECIMAL', 'constraint' => '4,2', 'default' => 1.50],
                'xg_against_pg'    => ['type' => 'DECIMAL', 'constraint' => '4,2', 'default' => 1.20],
                'goals_for_pg'     => ['type' => 'DECIMAL', 'constraint' => '4,2', 'default' => 1.60],
                'goals_against_pg' => ['type' => 'DECIMAL', 'constraint' => '4,2', 'default' => 1.10],
                'clean_sheet_pct'  => ['type' => 'DECIMAL', 'constraint' => '4,1', 'default' => 35.0],
                'btts_pct'         => ['type' => 'DECIMAL', 'constraint' => '4,1', 'default' => 50.0],
                'over_25_pct'      => ['type' => 'DECIMAL', 'constraint' => '4,1', 'default' => 55.0],
                'possession_pct'   => ['type' => 'DECIMAL', 'constraint' => '4,1', 'default' => 52.0],
                'created_at'       => ['type' => 'DATETIME', 'null' => true],
                'updated_at'       => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey(['league', 'team'], 'uq_soccer_league_team');
            $this->forge->addKey('league');
            $this->forge->createTable('bf_sports_soccer_team_stats', true);
        }

        // 2. bf_sports_soccer_fixtures
        if (! $this->db->tableExists('bf_sports_soccer_fixtures')) {
            $this->forge->addField([
                'id'             => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
                'league'         => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'EPL'],
                'home_team'      => ['type' => 'VARCHAR', 'constraint' => 16],
                'away_team'      => ['type' => 'VARCHAR', 'constraint' => 16],
                'fixture_date'   => ['type' => 'DATETIME'],
                'home_xg_proj'   => ['type' => 'DECIMAL', 'constraint' => '4,2', 'default' => 1.65],
                'away_xg_proj'   => ['type' => 'DECIMAL', 'constraint' => '4,2', 'default' => 1.15],
                'btts_prob'      => ['type' => 'DECIMAL', 'constraint' => '4,3', 'default' => 0.520],
                'over_25_prob'   => ['type' => 'DECIMAL', 'constraint' => '4,3', 'default' => 0.540],
                'home_win_prob'  => ['type' => 'DECIMAL', 'constraint' => '4,3', 'default' => 0.510],
                'draw_prob'      => ['type' => 'DECIMAL', 'constraint' => '4,3', 'default' => 0.260],
                'away_win_prob'  => ['type' => 'DECIMAL', 'constraint' => '4,3', 'default' => 0.230],
                'fair_home_odds' => ['type' => 'INT', 'constraint' => 11, 'default' => -105],
                'fair_draw_odds' => ['type' => 'INT', 'constraint' => 11, 'default' => 285],
                'fair_away_odds' => ['type' => 'INT', 'constraint' => 11, 'default' => 335],
                'created_at'     => ['type' => 'DATETIME', 'null' => true],
                'updated_at'     => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey(['league', 'fixture_date']);
            $this->forge->createTable('bf_sports_soccer_fixtures', true);
        }

        // 3. bf_sports_college_teams (NCAAF / NCAAB Power Ratings)
        if (! $this->db->tableExists('bf_sports_college_teams')) {
            $this->forge->addField([
                'id'                 => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'sport'              => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'NCAAF'],
                'team'               => ['type' => 'VARCHAR', 'constraint' => 16],
                'team_name'          => ['type' => 'VARCHAR', 'constraint' => 64],
                'conference'         => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'SEC'],
                'ap_rank'            => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'null' => true],
                'off_rating'         => ['type' => 'DECIMAL', 'constraint' => '5,2', 'default' => 35.00],
                'def_rating'         => ['type' => 'DECIMAL', 'constraint' => '5,2', 'default' => 20.00],
                'net_rating'         => ['type' => 'DECIMAL', 'constraint' => '5,2', 'default' => 15.00],
                'tempo_pace'         => ['type' => 'DECIMAL', 'constraint' => '4,1', 'default' => 68.5],
                'home_court_adv_pts' => ['type' => 'DECIMAL', 'constraint' => '3,1', 'default' => 3.5],
                'created_at'         => ['type' => 'DATETIME', 'null' => true],
                'updated_at'         => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey(['sport', 'team'], 'uq_college_sport_team');
            $this->forge->addKey(['sport', 'conference']);
            $this->forge->createTable('bf_sports_college_teams', true);
        }

        // 4. Add custom quant model tuning columns to bf_sports_user_settings
        if ($this->db->tableExists('bf_sports_user_settings')) {
            $cols = [];
            if (! $this->db->fieldExists('quant_form_weight', 'bf_sports_user_settings')) {
                $cols['quant_form_weight'] = ['type' => 'DECIMAL', 'constraint' => '3,2', 'default' => 0.35, 'after' => 'bankroll_currency'];
            }
            if (! $this->db->fieldExists('quant_matchup_weight', 'bf_sports_user_settings')) {
                $cols['quant_matchup_weight'] = ['type' => 'DECIMAL', 'constraint' => '3,2', 'default' => 0.40, 'after' => 'quant_form_weight'];
            }
            if (! $this->db->fieldExists('quant_home_away_weight', 'bf_sports_user_settings')) {
                $cols['quant_home_away_weight'] = ['type' => 'DECIMAL', 'constraint' => '3,2', 'default' => 0.15, 'after' => 'quant_matchup_weight'];
            }
            if (! $this->db->fieldExists('quant_venue_weight', 'bf_sports_user_settings')) {
                $cols['quant_venue_weight'] = ['type' => 'DECIMAL', 'constraint' => '3,2', 'default' => 0.10, 'after' => 'quant_home_away_weight'];
            }
            if ($cols !== []) {
                $this->forge->addColumn('bf_sports_user_settings', $cols);
            }
        }
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_sports_college_teams', true);
        $this->forge->dropTable('bf_sports_soccer_fixtures', true);
        $this->forge->dropTable('bf_sports_soccer_team_stats', true);

        if ($this->db->tableExists('bf_sports_user_settings')) {
            foreach (['quant_form_weight', 'quant_matchup_weight', 'quant_home_away_weight', 'quant_venue_weight'] as $col) {
                if ($this->db->fieldExists($col, 'bf_sports_user_settings')) {
                    $this->forge->dropColumn('bf_sports_user_settings', $col);
                }
            }
        }
    }
}
