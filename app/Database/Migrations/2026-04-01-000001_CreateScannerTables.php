<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateScannerTables extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_scanner_jobs')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'job_uuid' => ['type' => 'VARCHAR', 'constraint' => 64],
                'created_on' => ['type' => 'DATETIME'],
                'started_on' => ['type' => 'DATETIME', 'null' => true],
                'finished_on' => ['type' => 'DATETIME', 'null' => true],
                'status' => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'queued'],
                'provider_used' => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'mixed'],
                'timeframe' => ['type' => 'VARCHAR', 'constraint' => 16],
                'symbol_source' => ['type' => 'VARCHAR', 'constraint' => 16],
                'symbol_count' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
                'params_json' => ['type' => 'LONGTEXT', 'null' => true],
                'error_message' => ['type' => 'TEXT', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('job_uuid');
            $this->forge->addKey(['status', 'created_on']);
            $this->forge->createTable('bf_scanner_jobs');
        }

        if (! $this->db->tableExists('bf_scanner_results')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'job_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'symbol' => ['type' => 'VARCHAR', 'constraint' => 16],
                'timeframe' => ['type' => 'VARCHAR', 'constraint' => 16],
                'signal' => ['type' => 'VARCHAR', 'constraint' => 16],
                'direction' => ['type' => 'VARCHAR', 'constraint' => 8],
                'score' => ['type' => 'FLOAT', 'null' => true],
                'price' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'vwap' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'ema8' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'ema13' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'ema55' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'last_liq_high' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'last_liq_low' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'volume' => ['type' => 'BIGINT', 'null' => true],
                'vol_sma20' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'atr14' => ['type' => 'DECIMAL', 'constraint' => '16,6', 'null' => true],
                'occurred_on' => ['type' => 'DATETIME'],
                'payload_json' => ['type' => 'LONGTEXT', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('job_id');
            $this->forge->addKey(['symbol', 'timeframe', 'occurred_on']);
            $this->forge->addKey(['signal', 'direction', 'occurred_on']);
            $this->forge->createTable('bf_scanner_results');
        }

        if (! $this->db->tableExists('bf_scanner_symbol_universe')) {
            $this->forge->addField([
                'symbol' => ['type' => 'VARCHAR', 'constraint' => 16],
                'exchange' => ['type' => 'VARCHAR', 'constraint' => 32, 'null' => true],
                'asset_type' => ['type' => 'VARCHAR', 'constraint' => 16, 'null' => true],
                'is_active' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
                'avg_volume_20d' => ['type' => 'BIGINT', 'null' => true],
                'updated_on' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('symbol', true);
            $this->forge->createTable('bf_scanner_symbol_universe');
        }
    }

    public function down()
    {
        $this->forge->dropTable('bf_scanner_results', true);
        $this->forge->dropTable('bf_scanner_jobs', true);
        $this->forge->dropTable('bf_scanner_symbol_universe', true);
    }
}
