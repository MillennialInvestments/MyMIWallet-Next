<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOptionsMomentumTables extends Migration
{
    public function up()
    {
        // 1. bf_options_scan_candidates
        if (! $this->db->tableExists('bf_options_scan_candidates')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'ticker' => ['type' => 'VARCHAR', 'constraint' => 32],
                'strategy' => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'long_straddle'],
                'expiry' => ['type' => 'DATE', 'null' => true],
                'dte' => ['type' => 'INT', 'default' => 5],
                'stock_price' => ['type' => 'DECIMAL', 'constraint' => '12,4', 'default' => '0.0000'],
                'call_strike' => ['type' => 'DECIMAL', 'constraint' => '12,4', 'default' => '0.0000'],
                'put_strike' => ['type' => 'DECIMAL', 'constraint' => '12,4', 'default' => '0.0000'],
                'call_bid' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'default' => '0.0000'],
                'call_ask' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'default' => '0.0000'],
                'put_bid' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'default' => '0.0000'],
                'put_ask' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'default' => '0.0000'],
                'combined_debit' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'default' => '1.9000'],
                'target_profit' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'default' => '200.0000'],
                'required_exit_value' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'default' => '3.9000'],
                'breakeven_move' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'default' => '1.9000'],
                'breakeven_move_pct' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'default' => '0.0000'],
                'target_move' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'default' => '3.9000'],
                'target_move_pct' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'default' => '0.0000'],
                'atr_14' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'default' => '0.0000'],
                'historical_5d_range' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'default' => '0.0000'],
                'rvol_20d' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'default' => '1.0000'],
                'price_displacement_efficiency' => ['type' => 'DECIMAL', 'constraint' => '12,6', 'default' => '0.000000'],
                'turnover_efficiency_pct' => ['type' => 'DECIMAL', 'constraint' => '12,6', 'default' => '0.000000'],
                'vol_accel_1m' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'default' => '1.0000'],
                'vol_accel_5m' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'default' => '1.0000'],
                'vol_accel_15m' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'default' => '1.0000'],
                'range_expansion_ratio' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'default' => '1.0000'],
                'iv_call' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'default' => '0.0000'],
                'iv_put' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'default' => '0.0000'],
                'realized_vol_20d' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'default' => '0.0000'],
                'iv_rv_ratio' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'default' => '1.0000'],
                'spread_pct' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'default' => '0.0000'],
                'reachability_score' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'default' => '0.0000'],
                'ranking_score' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'default' => '0.0000'],
                'scan_status' => ['type' => 'VARCHAR', 'constraint' => '32', 'default' => 'candidate'],
                'rejection_reason' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'scanned_at' => ['type' => 'DATETIME'],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('ticker');
            $this->forge->addKey('scan_status');
            $this->forge->addKey('ranking_score');
            $this->forge->addKey('scanned_at');
            $this->forge->createTable('bf_options_scan_candidates');
        }

        // 2. bf_options_positions
        if (! $this->db->tableExists('bf_options_positions')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'trade_uuid' => ['type' => 'VARCHAR', 'constraint' => 64],
                'user_id' => ['type' => 'INT', 'unsigned' => true, 'null' => true],
                'ticker' => ['type' => 'VARCHAR', 'constraint' => 32],
                'strategy' => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'long_straddle'],
                'expiry' => ['type' => 'DATE', 'null' => true],
                'contracts_count' => ['type' => 'INT', 'default' => 1],
                'call_strike' => ['type' => 'DECIMAL', 'constraint' => '12,4', 'default' => '0.0000'],
                'put_strike' => ['type' => 'DECIMAL', 'constraint' => '12,4', 'default' => '0.0000'],
                'entry_stock_price' => ['type' => 'DECIMAL', 'constraint' => '12,4', 'default' => '0.0000'],
                'entry_debit_per_pair' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'default' => '1.9000'],
                'total_entry_debit' => ['type' => 'DECIMAL', 'constraint' => '12,4', 'default' => '190.0000'],
                'target_net_profit' => ['type' => 'DECIMAL', 'constraint' => '12,4', 'default' => '200.0000'],
                'target_combined_exit' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'default' => '3.9000'],
                'current_combined_bid' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'null' => true],
                'current_combined_value' => ['type' => 'DECIMAL', 'constraint' => '12,4', 'null' => true],
                'current_unrealized_pnl' => ['type' => 'DECIMAL', 'constraint' => '12,4', 'null' => true],
                'peak_unrealized_pnl' => ['type' => 'DECIMAL', 'constraint' => '12,4', 'default' => '0.0000'],
                'status' => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'open'],
                'exit_reason' => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
                'closed_combined_credit' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'null' => true],
                'realized_pnl' => ['type' => 'DECIMAL', 'constraint' => '12,4', 'null' => true],
                'entry_at' => ['type' => 'DATETIME', 'null' => true],
                'closed_at' => ['type' => 'DATETIME', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('trade_uuid');
            $this->forge->addKey('ticker');
            $this->forge->addKey('status');
            $this->forge->createTable('bf_options_positions');
        }

        // 3. bf_options_position_legs
        if (! $this->db->tableExists('bf_options_position_legs')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'position_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'leg_type' => ['type' => 'VARCHAR', 'constraint' => 16],
                'contract_symbol' => ['type' => 'VARCHAR', 'constraint' => 64],
                'strike' => ['type' => 'DECIMAL', 'constraint' => '12,4'],
                'expiry' => ['type' => 'DATE'],
                'quantity' => ['type' => 'INT', 'default' => 1],
                'fill_price' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'default' => '0.9500'],
                'current_bid' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'null' => true],
                'current_ask' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'null' => true],
                'current_iv' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'null' => true],
                'delta' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'null' => true],
                'gamma' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'null' => true],
                'theta' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'null' => true],
                'vega' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'null' => true],
                'status' => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'open'],
                'exit_price' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('position_id');
            $this->forge->addKey('contract_symbol');
            $this->forge->createTable('bf_options_position_legs');
        }

        // 4. bf_options_position_history
        if (! $this->db->tableExists('bf_options_position_history')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'position_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'stock_price' => ['type' => 'DECIMAL', 'constraint' => '12,4'],
                'call_bid' => ['type' => 'DECIMAL', 'constraint' => '10,4'],
                'put_bid' => ['type' => 'DECIMAL', 'constraint' => '10,4'],
                'combined_bid' => ['type' => 'DECIMAL', 'constraint' => '10,4'],
                'unrealized_pnl' => ['type' => 'DECIMAL', 'constraint' => '12,4'],
                'rvol' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'null' => true],
                'momentum_score' => ['type' => 'DECIMAL', 'constraint' => '8,4', 'null' => true],
                'risk_flag' => ['type' => 'VARCHAR', 'constraint' => 64, 'default' => 'normal'],
                'recorded_at' => ['type' => 'DATETIME'],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('position_id');
            $this->forge->addKey('recorded_at');
            $this->forge->createTable('bf_options_position_history');
        }

        // 5. bf_options_signal_events
        if (! $this->db->tableExists('bf_options_signal_events')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'event_uuid' => ['type' => 'VARCHAR', 'constraint' => 64],
                'position_id' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
                'ticker' => ['type' => 'VARCHAR', 'constraint' => 32],
                'source' => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'tradingview'],
                'signal_type' => ['type' => 'VARCHAR', 'constraint' => 48],
                'timeframe' => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => '5m'],
                'payload_json' => ['type' => 'LONGTEXT'],
                'idempotency_hash' => ['type' => 'VARCHAR', 'constraint' => 64],
                'processed' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'created_at' => ['type' => 'DATETIME'],
                'processed_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('event_uuid');
            $this->forge->addUniqueKey('idempotency_hash');
            $this->forge->addKey('ticker');
            $this->forge->addKey('processed');
            $this->forge->createTable('bf_options_signal_events');
        }

        // 6. bf_options_exit_alerts
        if (! $this->db->tableExists('bf_options_exit_alerts')) {
            $this->forge->addField([
                'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
                'position_id' => ['type' => 'BIGINT', 'unsigned' => true],
                'ticker' => ['type' => 'VARCHAR', 'constraint' => 32],
                'alert_type' => ['type' => 'VARCHAR', 'constraint' => 48],
                'severity' => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'warning'],
                'recommended_action' => ['type' => 'VARCHAR', 'constraint' => 64],
                'current_profit' => ['type' => 'DECIMAL', 'constraint' => '12,4'],
                'target_profit' => ['type' => 'DECIMAL', 'constraint' => '12,4'],
                'summary' => ['type' => 'TEXT'],
                'notified_discord' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'notified_email' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'status' => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'pending'],
                'created_at' => ['type' => 'DATETIME'],
                'dispatched_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('position_id');
            $this->forge->addKey('ticker');
            $this->forge->addKey('status');
            $this->forge->createTable('bf_options_exit_alerts');
        }
    }

    public function down()
    {
        $tables = [
            'bf_options_exit_alerts',
            'bf_options_signal_events',
            'bf_options_position_history',
            'bf_options_position_legs',
            'bf_options_positions',
            'bf_options_scan_candidates',
        ];

        foreach ($tables as $table) {
            if ($this->db->tableExists($table)) {
                $this->forge->dropTable($table);
            }
        }
    }
}
