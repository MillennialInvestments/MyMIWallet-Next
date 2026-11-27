<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Sportsbook prop lines for NFL running backs (The Odds API), used to pre-fill
 * the Goldilocks analysis. Reference data only; no wagers. Safe to re-run.
 */
class CreateSportsPropLinesTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'            => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
            'provider'      => ['type' => 'VARCHAR', 'constraint' => 32],
            'event_id'      => ['type' => 'VARCHAR', 'constraint' => 64],
            'commence_time' => ['type' => 'DATETIME', 'null' => true],
            'home_team'     => ['type' => 'VARCHAR', 'constraint' => 8, 'null' => true],
            'away_team'     => ['type' => 'VARCHAR', 'constraint' => 8, 'null' => true],
            'player_name'   => ['type' => 'VARCHAR', 'constraint' => 120],
            'player_key'    => ['type' => 'VARCHAR', 'constraint' => 120],
            'market'        => ['type' => 'VARCHAR', 'constraint' => 16],
            'bookmaker'     => ['type' => 'VARCHAR', 'constraint' => 32],
            'line'          => ['type' => 'DECIMAL', 'constraint' => '6,1'],
            'over_odds'     => ['type' => 'INT', 'constraint' => 11, 'null' => true],
            'under_odds'    => ['type' => 'INT', 'constraint' => 11, 'null' => true],
            'fetched_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['event_id', 'player_key', 'market', 'bookmaker'], 'uq_sports_prop_line');
        $this->forge->addKey(['player_key', 'commence_time']);
        $this->forge->createTable('bf_sports_prop_lines', true);
    }

    public function down(): void
    {
        $this->forge->dropTable('bf_sports_prop_lines', true);
    }
}
