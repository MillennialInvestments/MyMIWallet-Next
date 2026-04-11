<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePropFirmsTables extends Migration
{
    public function up()
    {
        $this->createPropFirms();
        $this->createPropRuleSets();
        $this->createPropAllowedSymbols();
        $this->createUserPropAccounts();
        $this->createPropBrokerConnections();
        $this->createPropOrders();
        $this->createPropFills();
        $this->createPropPositions();
        $this->createPropEquityHistory();
        $this->createPropSignals();
        $this->createPropReplayEvents();
        $this->createPropReplayDiagnostics();
        $this->createPropNotifications();
        $this->createPropTradeJournal();
        $this->createPropChartSnapshots();
        $this->createPropSyncLogs();
    }

    public function down()
    {
        $tables = [
            'bf_prop_sync_logs',
            'bf_prop_chart_snapshots',
            'bf_prop_trade_journal',
            'bf_prop_notifications',
            'bf_prop_replay_diagnostics',
            'bf_prop_replay_events',
            'bf_prop_signals',
            'bf_prop_equity_history',
            'bf_prop_positions',
            'bf_prop_fills',
            'bf_prop_orders',
            'bf_prop_broker_connections',
            'bf_user_prop_accounts',
            'bf_prop_allowed_symbols',
            'bf_prop_rule_sets',
            'bf_prop_firms',
        ];

        foreach ($tables as $table) {
            $this->forge->dropTable($table, true);
        }
    }

    private function addStandardFields(): array
    {
        return [
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ];
    }

    private function createPropFirms(): void
    {
        $this->forge->addField($this->addStandardFields() + [
            'name' => ['type' => 'VARCHAR', 'constraint' => 120],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 120],
            'status' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'active'],
            'meta_json' => ['type' => 'LONGTEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('slug');
        $this->forge->createTable('bf_prop_firms', true);
    }

    private function createPropRuleSets(): void
    {
        $this->forge->addField($this->addStandardFields() + [
            'prop_firm_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 120],
            'daily_loss_limit' => ['type' => 'DECIMAL', 'constraint' => '15,2', 'default' => 0],
            'max_drawdown' => ['type' => 'DECIMAL', 'constraint' => '15,2', 'default' => 0],
            'max_position_size' => ['type' => 'DECIMAL', 'constraint' => '15,4', 'default' => 0],
            'rules_json' => ['type' => 'LONGTEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('prop_firm_id');
        $this->forge->addForeignKey('prop_firm_id', 'bf_prop_firms', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_prop_rule_sets', true);
    }

    private function createPropAllowedSymbols(): void
    {
        $this->forge->addField($this->addStandardFields() + [
            'prop_rule_set_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'symbol' => ['type' => 'VARCHAR', 'constraint' => 30],
            'asset_class' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'equity'],
            'is_enabled' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['prop_rule_set_id', 'symbol']);
        $this->forge->addForeignKey('prop_rule_set_id', 'bf_prop_rule_sets', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_prop_allowed_symbols', true);
    }

    private function createUserPropAccounts(): void
    {
        $this->forge->addField($this->addStandardFields() + [
            'user_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'prop_firm_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'prop_rule_set_id' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'account_ref' => ['type' => 'VARCHAR', 'constraint' => 80],
            'account_status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'active'],
            'starting_balance' => ['type' => 'DECIMAL', 'constraint' => '15,2', 'default' => 0],
            'current_balance' => ['type' => 'DECIMAL', 'constraint' => '15,2', 'default' => 0],
            'metadata_json' => ['type' => 'LONGTEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('account_ref');
        $this->forge->addKey(['user_id', 'prop_firm_id']);
        $this->forge->addForeignKey('prop_firm_id', 'bf_prop_firms', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('prop_rule_set_id', 'bf_prop_rule_sets', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('bf_user_prop_accounts', true);
    }

    private function createPropBrokerConnections(): void
    {
        $this->forge->addField($this->addStandardFields() + [
            'user_prop_account_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'broker_name' => ['type' => 'VARCHAR', 'constraint' => 60],
            'external_account_id' => ['type' => 'VARCHAR', 'constraint' => 100],
            'connection_status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'connected'],
            'last_heartbeat_at' => ['type' => 'DATETIME', 'null' => true],
            'credentials_json' => ['type' => 'LONGTEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('user_prop_account_id');
        $this->forge->addForeignKey('user_prop_account_id', 'bf_user_prop_accounts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_prop_broker_connections', true);
    }

    private function createPropOrders(): void
    {
        $this->forge->addField($this->addStandardFields() + [
            'user_prop_account_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'prop_broker_connection_id' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'symbol' => ['type' => 'VARCHAR', 'constraint' => 30],
            'side' => ['type' => 'VARCHAR', 'constraint' => 8],
            'order_type' => ['type' => 'VARCHAR', 'constraint' => 20],
            'qty' => ['type' => 'DECIMAL', 'constraint' => '15,4', 'default' => 0],
            'limit_price' => ['type' => 'DECIMAL', 'constraint' => '15,6', 'null' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'new'],
            'external_order_id' => ['type' => 'VARCHAR', 'constraint' => 120, 'null' => true],
            'submitted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['user_prop_account_id', 'symbol']);
        $this->forge->addForeignKey('user_prop_account_id', 'bf_user_prop_accounts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('prop_broker_connection_id', 'bf_prop_broker_connections', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('bf_prop_orders', true);
    }

    private function createPropFills(): void
    {
        $this->forge->addField($this->addStandardFields() + [
            'prop_order_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'fill_qty' => ['type' => 'DECIMAL', 'constraint' => '15,4', 'default' => 0],
            'fill_price' => ['type' => 'DECIMAL', 'constraint' => '15,6', 'default' => 0],
            'fee_amount' => ['type' => 'DECIMAL', 'constraint' => '15,6', 'default' => 0],
            'filled_at' => ['type' => 'DATETIME', 'null' => true],
            'external_fill_id' => ['type' => 'VARCHAR', 'constraint' => 120, 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('prop_order_id');
        $this->forge->addForeignKey('prop_order_id', 'bf_prop_orders', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_prop_fills', true);
    }

    private function createPropPositions(): void
    {
        $this->forge->addField($this->addStandardFields() + [
            'user_prop_account_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'symbol' => ['type' => 'VARCHAR', 'constraint' => 30],
            'side' => ['type' => 'VARCHAR', 'constraint' => 8],
            'qty' => ['type' => 'DECIMAL', 'constraint' => '15,4', 'default' => 0],
            'avg_price' => ['type' => 'DECIMAL', 'constraint' => '15,6', 'default' => 0],
            'unrealized_pnl' => ['type' => 'DECIMAL', 'constraint' => '15,4', 'default' => 0],
            'opened_at' => ['type' => 'DATETIME', 'null' => true],
            'closed_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['user_prop_account_id', 'symbol']);
        $this->forge->addForeignKey('user_prop_account_id', 'bf_user_prop_accounts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_prop_positions', true);
    }

    private function createPropEquityHistory(): void
    {
        $this->forge->addField($this->addStandardFields() + [
            'user_prop_account_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'equity' => ['type' => 'DECIMAL', 'constraint' => '15,2', 'default' => 0],
            'drawdown' => ['type' => 'DECIMAL', 'constraint' => '15,2', 'default' => 0],
            'recorded_at' => ['type' => 'DATETIME'],
            'source' => ['type' => 'VARCHAR', 'constraint' => 40, 'default' => 'broker_sync'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['user_prop_account_id', 'recorded_at']);
        $this->forge->addForeignKey('user_prop_account_id', 'bf_user_prop_accounts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_prop_equity_history', true);
    }

    private function createPropSignals(): void
    {
        $this->forge->addField($this->addStandardFields() + [
            'user_prop_account_id' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'symbol' => ['type' => 'VARCHAR', 'constraint' => 30],
            'signal_type' => ['type' => 'VARCHAR', 'constraint' => 50],
            'signal_strength' => ['type' => 'DECIMAL', 'constraint' => '10,4', 'default' => 0],
            'payload_json' => ['type' => 'LONGTEXT', 'null' => true],
            'triggered_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['symbol', 'triggered_at']);
        $this->forge->addForeignKey('user_prop_account_id', 'bf_user_prop_accounts', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('bf_prop_signals', true);
    }

    private function createPropReplayEvents(): void
    {
        $this->forge->addField($this->addStandardFields() + [
            'user_prop_account_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'event_type' => ['type' => 'VARCHAR', 'constraint' => 40],
            'event_payload_json' => ['type' => 'LONGTEXT', 'null' => true],
            'event_at' => ['type' => 'DATETIME', 'null' => true],
            'sequence_no' => ['type' => 'BIGINT', 'unsigned' => true, 'default' => 0],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['user_prop_account_id', 'sequence_no']);
        $this->forge->addForeignKey('user_prop_account_id', 'bf_user_prop_accounts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_prop_replay_events', true);
    }

    private function createPropReplayDiagnostics(): void
    {
        $this->forge->addField($this->addStandardFields() + [
            'prop_replay_event_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'severity' => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'info'],
            'message' => ['type' => 'TEXT', 'null' => true],
            'diagnostic_json' => ['type' => 'LONGTEXT', 'null' => true],
            'logged_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('prop_replay_event_id');
        $this->forge->addForeignKey('prop_replay_event_id', 'bf_prop_replay_events', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_prop_replay_diagnostics', true);
    }

    private function createPropNotifications(): void
    {
        $this->forge->addField($this->addStandardFields() + [
            'user_prop_account_id' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'channel' => ['type' => 'VARCHAR', 'constraint' => 20],
            'subject' => ['type' => 'VARCHAR', 'constraint' => 200],
            'body' => ['type' => 'TEXT', 'null' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'queued'],
            'sent_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['channel', 'status']);
        $this->forge->addForeignKey('user_prop_account_id', 'bf_user_prop_accounts', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('bf_prop_notifications', true);
    }

    private function createPropTradeJournal(): void
    {
        $this->forge->addField($this->addStandardFields() + [
            'user_prop_account_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'prop_order_id' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'entry_title' => ['type' => 'VARCHAR', 'constraint' => 160],
            'entry_body' => ['type' => 'LONGTEXT', 'null' => true],
            'emotion_tag' => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => true],
            'trade_date' => ['type' => 'DATE', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['user_prop_account_id', 'trade_date']);
        $this->forge->addForeignKey('user_prop_account_id', 'bf_user_prop_accounts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('prop_order_id', 'bf_prop_orders', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('bf_prop_trade_journal', true);
    }

    private function createPropChartSnapshots(): void
    {
        $this->forge->addField($this->addStandardFields() + [
            'user_prop_account_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'symbol' => ['type' => 'VARCHAR', 'constraint' => 30],
            'timeframe' => ['type' => 'VARCHAR', 'constraint' => 10],
            'image_path' => ['type' => 'VARCHAR', 'constraint' => 255],
            'captured_at' => ['type' => 'DATETIME', 'null' => true],
            'annotations_json' => ['type' => 'LONGTEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['user_prop_account_id', 'captured_at']);
        $this->forge->addForeignKey('user_prop_account_id', 'bf_user_prop_accounts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_prop_chart_snapshots', true);
    }

    private function createPropSyncLogs(): void
    {
        $this->forge->addField($this->addStandardFields() + [
            'user_prop_account_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'sync_type' => ['type' => 'VARCHAR', 'constraint' => 40],
            'status' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'ok'],
            'started_at' => ['type' => 'DATETIME', 'null' => true],
            'finished_at' => ['type' => 'DATETIME', 'null' => true],
            'summary_json' => ['type' => 'LONGTEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['user_prop_account_id', 'started_at']);
        $this->forge->addForeignKey('user_prop_account_id', 'bf_user_prop_accounts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bf_prop_sync_logs', true);
    }
}
