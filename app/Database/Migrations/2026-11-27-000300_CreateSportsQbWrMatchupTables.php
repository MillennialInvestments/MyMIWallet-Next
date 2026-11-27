<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Expands NFL Sports analytics to cover QBs vs ranked pass defense,
 * Receivers (WR/TE), and Team vs Team game matchups (spreads, totals).
 * Safe to re-run (checks column and table existence).
 */
class CreateSportsQbWrMatchupTables extends Migration
{
    public function up(): void
    {
        // 1. Add passing and scoring defense rank columns to bf_sports_defense_ranks
        if ($this->db->tableExists('bf_sports_defense_ranks')) {
            $defFields = [];
            if (! $this->db->fieldExists('pass_def_rank', 'bf_sports_defense_ranks')) {
                $defFields['pass_def_rank'] = ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'null' => true, 'after' => 'rb_rec_def_rank'];
            }
            if (! $this->db->fieldExists('pass_yds_allowed_pg', 'bf_sports_defense_ranks')) {
                $defFields['pass_yds_allowed_pg'] = ['type' => 'DECIMAL', 'constraint' => '5,1', 'null' => true, 'after' => 'pass_def_rank'];
            }
            if (! $this->db->fieldExists('pass_td_def_rank', 'bf_sports_defense_ranks')) {
                $defFields['pass_td_def_rank'] = ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'null' => true, 'after' => 'pass_yds_allowed_pg'];
            }
            if (! $this->db->fieldExists('scoring_def_rank', 'bf_sports_defense_ranks')) {
                $defFields['scoring_def_rank'] = ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'null' => true, 'after' => 'pass_td_def_rank'];
            }
            if (! $this->db->fieldExists('points_allowed_pg', 'bf_sports_defense_ranks')) {
                $defFields['points_allowed_pg'] = ['type' => 'DECIMAL', 'constraint' => '4,1', 'null' => true, 'after' => 'scoring_def_rank'];
            }
            if ($defFields !== []) {
                $this->forge->addColumn('bf_sports_defense_ranks', $defFields);
            }
        }

        // 2. Add passing columns to bf_sports_rb_game_logs for QB and skill player flexibility
        if ($this->db->tableExists('bf_sports_rb_game_logs')) {
            $logFields = [];
            if (! $this->db->fieldExists('pass_att', 'bf_sports_rb_game_logs')) {
                $logFields['pass_att'] = ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0, 'after' => 'home_away'];
            }
            if (! $this->db->fieldExists('completions', 'bf_sports_rb_game_logs')) {
                $logFields['completions'] = ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0, 'after' => 'pass_att'];
            }
            if (! $this->db->fieldExists('pass_yds', 'bf_sports_rb_game_logs')) {
                $logFields['pass_yds'] = ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0, 'after' => 'completions'];
            }
            if (! $this->db->fieldExists('pass_td', 'bf_sports_rb_game_logs')) {
                $logFields['pass_td'] = ['type' => 'TINYINT', 'constraint' => 3, 'default' => 0, 'after' => 'pass_yds'];
            }
            if (! $this->db->fieldExists('interceptions', 'bf_sports_rb_game_logs')) {
                $logFields['interceptions'] = ['type' => 'TINYINT', 'constraint' => 3, 'default' => 0, 'after' => 'pass_td'];
            }
            if ($logFields !== []) {
                $this->forge->addColumn('bf_sports_rb_game_logs', $logFields);
            }
        }

        // 3. Create table for Team vs Team matchup logs (spreads, totals, power ratings)
        $this->forge->addField([
            'id'                => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
            'provider'          => ['type' => 'VARCHAR', 'constraint' => 32],
            'season'            => ['type' => 'SMALLINT', 'constraint' => 4, 'unsigned' => true],
            'week'              => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true],
            'game_date'         => ['type' => 'DATE', 'null' => true],
            'team'              => ['type' => 'VARCHAR', 'constraint' => 8],
            'opponent'          => ['type' => 'VARCHAR', 'constraint' => 8],
            'home_away'         => ['type' => 'CHAR', 'constraint' => 1, 'default' => 'H'],
            'points_scored'     => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
            'points_allowed'    => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
            'total_yds_offense' => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
            'pass_yds_offense'  => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
            'rush_yds_offense'  => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
            'total_yds_defense' => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
            'pass_yds_defense'  => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
            'rush_yds_defense'  => ['type' => 'SMALLINT', 'constraint' => 5, 'default' => 0],
            'turnovers'         => ['type' => 'TINYINT', 'constraint' => 3, 'default' => 0],
            'created_at'        => ['type' => 'DATETIME', 'null' => true],
            'updated_at'        => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['provider', 'season', 'week', 'team'], 'uq_sports_team_logs_week');
        $this->forge->addKey(['team', 'season']);
        $this->forge->addKey(['opponent', 'season']);
        $this->forge->createTable('bf_sports_team_game_logs', true);
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_sports_team_game_logs', true);
        if ($this->db->tableExists('bf_sports_rb_game_logs')) {
            $cols = ['pass_att', 'completions', 'pass_yds', 'pass_td', 'interceptions'];
            foreach ($cols as $col) {
                if ($this->db->fieldExists($col, 'bf_sports_rb_game_logs')) {
                    $this->forge->dropColumn('bf_sports_rb_game_logs', $col);
                }
            }
        }
        if ($this->db->tableExists('bf_sports_defense_ranks')) {
            $defCols = ['pass_def_rank', 'pass_yds_allowed_pg', 'pass_td_def_rank', 'scoring_def_rank', 'points_allowed_pg'];
            foreach ($defCols as $col) {
                if ($this->db->fieldExists($col, 'bf_sports_defense_ranks')) {
                    $this->forge->dropColumn('bf_sports_defense_ranks', $col);
                }
            }
        }
    }
}
