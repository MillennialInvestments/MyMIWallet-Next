<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInvestmentForecastAccuracyTable extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_investment_forecast_accuracy')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'forecast_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'ticker' => ['type' => 'VARCHAR', 'constraint' => 16],
                'timeframe' => ['type' => 'VARCHAR', 'constraint' => 16],
                'evaluation_window' => ['type' => 'INT', 'constraint' => 6],
                'forecast_direction' => ['type' => 'ENUM', 'constraint' => ['bullish', 'bearish', 'neutral']],
                'confidence_score' => ['type' => 'INT', 'constraint' => 3, 'default' => 0],
                'target_price' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'range_low' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'range_high' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'hit_result' => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'unknown'],
                'mfe' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'mae' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'window_start' => ['type' => 'DATETIME', 'null' => true],
                'window_end' => ['type' => 'DATETIME', 'null' => true],
                'evaluated_at' => ['type' => 'DATETIME', 'null' => true],
                'notes' => ['type' => 'TEXT', 'null' => true],
                'created_at' => ['type' => 'DATETIME'],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('forecast_id');
            $this->forge->addKey('ticker');
            $this->forge->addKey('timeframe');
            $this->forge->addKey('evaluation_window');
            $this->forge->addKey('created_at');
            $this->forge->createTable('bf_investment_forecast_accuracy');
        }
    }

    public function down()
    {
        if ($this->db->tableExists('bf_investment_forecast_accuracy')) {
            $this->forge->dropTable('bf_investment_forecast_accuracy');
        }
    }
}
