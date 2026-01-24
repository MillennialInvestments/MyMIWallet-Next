<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInvestmentForecastingTables extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_investment_price_forecasts')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'alert_id' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
                'ticker' => ['type' => 'VARCHAR', 'constraint' => 16],
                'timeframe' => ['type' => 'VARCHAR', 'constraint' => 16],
                'forecast_direction' => ['type' => 'ENUM', 'constraint' => ['bullish', 'bearish', 'neutral']],
                'target_price' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'range_low' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'range_high' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'confidence_score' => ['type' => 'INT', 'constraint' => 3, 'default' => 0],
                'signal_score' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'null' => true],
                'indicators_json' => ['type' => 'LONGTEXT', 'null' => true],
                'data_source' => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'alphavantage'],
                'created_at' => ['type' => 'DATETIME'],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey(['ticker', 'timeframe']);
            $this->forge->addKey('alert_id');
            $this->forge->addKey('created_at');
            $this->forge->createTable('bf_investment_price_forecasts');
        }

        if (! $this->db->tableExists('bf_investment_forecast_history')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'forecast_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'ticker' => ['type' => 'VARCHAR', 'constraint' => 16],
                'timeframe' => ['type' => 'VARCHAR', 'constraint' => 16],
                'forecast_direction' => ['type' => 'ENUM', 'constraint' => ['bullish', 'bearish', 'neutral']],
                'target_price' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'range_low' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'range_high' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'confidence_score' => ['type' => 'INT', 'constraint' => 3, 'default' => 0],
                'indicators_json' => ['type' => 'LONGTEXT', 'null' => true],
                'recorded_at' => ['type' => 'DATETIME'],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('forecast_id');
            $this->forge->addKey('ticker');
            $this->forge->addKey('recorded_at');
            $this->forge->createTable('bf_investment_forecast_history');
        }

        if (! $this->db->tableExists('bf_investment_forecast_jobs')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'alert_id' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
                'ticker' => ['type' => 'VARCHAR', 'constraint' => 16],
                'status' => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'queued'],
                'attempts' => ['type' => 'INT', 'constraint' => 3, 'default' => 0],
                'run_after' => ['type' => 'DATETIME', 'null' => true],
                'payload_json' => ['type' => 'LONGTEXT', 'null' => true],
                'created_at' => ['type' => 'DATETIME'],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('alert_id');
            $this->forge->addKey('status');
            $this->forge->addKey('run_after');
            $this->forge->createTable('bf_investment_forecast_jobs');
        }

        if ($this->db->tableExists('bf_investment_trade_alerts')) {
            $fields = [
                'latest_forecast_id' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true, 'after' => 'id'],
                'forecast_confidence' => ['type' => 'INT', 'constraint' => 3, 'null' => true, 'after' => 'latest_forecast_id'],
                'forecast_direction' => ['type' => 'VARCHAR', 'constraint' => 16, 'null' => true, 'after' => 'forecast_confidence'],
                'forecast_target_price' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true, 'after' => 'forecast_direction'],
                'forecast_range_low' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true, 'after' => 'forecast_target_price'],
                'forecast_range_high' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true, 'after' => 'forecast_range_low'],
                'forecast_updated_at' => ['type' => 'DATETIME', 'null' => true, 'after' => 'forecast_range_high'],
            ];

            foreach ($fields as $name => $definition) {
                if (! $this->db->fieldExists($name, 'bf_investment_trade_alerts')) {
                    $this->forge->addColumn('bf_investment_trade_alerts', [$name => $definition]);
                }
            }

            try {
                $this->db->query('CREATE INDEX latest_forecast_id ON bf_investment_trade_alerts (latest_forecast_id)');
            } catch (\Throwable $e) {
                // ignore if index already exists
            }
        }
    }

    public function down()
    {
        if ($this->db->tableExists('bf_investment_price_forecasts')) {
            $this->forge->dropTable('bf_investment_price_forecasts');
        }
        if ($this->db->tableExists('bf_investment_forecast_history')) {
            $this->forge->dropTable('bf_investment_forecast_history');
        }
        if ($this->db->tableExists('bf_investment_forecast_jobs')) {
            $this->forge->dropTable('bf_investment_forecast_jobs');
        }

        if ($this->db->tableExists('bf_investment_trade_alerts')) {
            $columns = [
                'latest_forecast_id',
                'forecast_confidence',
                'forecast_direction',
                'forecast_target_price',
                'forecast_range_low',
                'forecast_range_high',
                'forecast_updated_at',
            ];

            foreach ($columns as $column) {
                if ($this->db->fieldExists($column, 'bf_investment_trade_alerts')) {
                    $this->forge->dropColumn('bf_investment_trade_alerts', $column);
                }
            }
        }
    }
}
