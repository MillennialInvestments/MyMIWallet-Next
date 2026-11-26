<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInvestmentForecastAccuracy extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_investment_forecast_accuracy')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'forecast_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'ticker' => ['type' => 'VARCHAR', 'constraint' => 16],
                'timeframe' => ['type' => 'VARCHAR', 'constraint' => 16],
                'forecast_direction' => ['type' => 'ENUM', 'constraint' => ['bullish', 'bearish', 'neutral']],
                'forecast_target' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'actual_price' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'hit_target' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'max_favorable_excursion' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'max_adverse_excursion' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'evaluation_minutes' => ['type' => 'INT', 'constraint' => 6, 'null' => true],
                'recorded_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('forecast_id');
            $this->forge->addKey(['ticker', 'timeframe']);
            $this->forge->addKey('evaluation_minutes');
            $this->forge->addKey('recorded_at');
            $this->forge->createTable('bf_investment_forecast_accuracy', true);
        } else {
            $existingFields = $this->db->getFieldNames('bf_investment_forecast_accuracy');
            $additiveColumns = [
                'forecast_target' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'actual_price' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'hit_target' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'max_favorable_excursion' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'max_adverse_excursion' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'evaluation_minutes' => ['type' => 'INT', 'constraint' => 6, 'null' => true],
                'recorded_at' => ['type' => 'DATETIME', 'null' => true],
            ];
            foreach ($additiveColumns as $columnName => $definition) {
                if (! in_array($columnName, $existingFields, true)) {
                    $this->forge->addColumn('bf_investment_forecast_accuracy', [$columnName => $definition]);
                }
            }
        }
    }

    public function down()
    {
        if ($this->db->tableExists('bf_investment_forecast_accuracy')) {
            $this->forge->dropTable('bf_investment_forecast_accuracy');
        }
    }
}
