<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class IntegrateCoinVaultWithTbiProjectCoinTables extends Migration
{
    public function up()
    {
        $this->ensureProjectCoinColumns();
        $this->ensureLedgerColumns();
        $this->ensureWalletsTable();
        $this->ensurePayoutRequestsTable();
        $this->ensureExternalEventLogsTable();
    }

    public function down()
    {
        // Intentionally non-destructive.
    }

    private function ensureProjectCoinColumns(): void
    {
        if (! $this->db->tableExists('bf_tbi_project_coins')) {
            return;
        }

        $fields = $this->db->getFieldNames('bf_tbi_project_coins');
        $add = [];

        foreach ([
            'total_supply' => ['type' => 'DECIMAL', 'constraint' => '30,8', 'default' => '0.00000000'],
            'released_supply' => ['type' => 'DECIMAL', 'constraint' => '30,8', 'default' => '0.00000000'],
            'vault_balance' => ['type' => 'DECIMAL', 'constraint' => '30,8', 'default' => '0.00000000'],
            'blockchain_network' => ['type' => 'VARCHAR', 'constraint' => 40, 'default' => 'solana'],
        ] as $name => $definition) {
            if (! in_array($name, $fields, true)) {
                $add[$name] = $definition;
            }
        }

        if ($add !== []) {
            $this->forge->addColumn('bf_tbi_project_coins', $add);
        }
    }

    private function ensureLedgerColumns(): void
    {
        if (! $this->db->tableExists('bf_tbi_coin_contribution_ledger')) {
            return;
        }

        $fields = $this->db->getFieldNames('bf_tbi_coin_contribution_ledger');

        if (in_array('contribution_type', $fields, true)) {
            $this->forge->modifyColumn('bf_tbi_coin_contribution_ledger', [
                'contribution_type' => [
                    'name' => 'contribution_type',
                    'type' => 'VARCHAR',
                    'constraint' => 80,
                ],
            ]);
        }

        $fields = $this->db->getFieldNames('bf_tbi_coin_contribution_ledger');
        $add = [];

        foreach ([
            'wallet_id' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'transaction_type' => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true],
            'direction' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'amount' => ['type' => 'DECIMAL', 'constraint' => '30,8', 'default' => '0.00000000'],
            'balance_after' => ['type' => 'DECIMAL', 'constraint' => '30,8', 'default' => '0.00000000'],
            'source' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'source_id' => ['type' => 'VARCHAR', 'constraint' => 190, 'null' => true],
            'external_client' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'external_event_id' => ['type' => 'VARCHAR', 'constraint' => 190, 'null' => true],
            'reference_table' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'reference_id' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'blockchain_network' => ['type' => 'VARCHAR', 'constraint' => 40, 'null' => true],
            'blockchain_tx' => ['type' => 'VARCHAR', 'constraint' => 190, 'null' => true],
            'memo' => ['type' => 'TEXT', 'null' => true],
            'created_by' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'updated_by' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
        ] as $name => $definition) {
            if (! in_array($name, $fields, true)) {
                $add[$name] = $definition;
            }
        }

        if ($add !== []) {
            $this->forge->addColumn('bf_tbi_coin_contribution_ledger', $add);
        }
    }

    private function ensureWalletsTable(): void
    {
        if ($this->db->tableExists('bf_tbi_coin_wallets')) {
            return;
        }

        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'project_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'coin_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'user_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'available_balance' => ['type' => 'DECIMAL', 'constraint' => '30,8', 'default' => '0.00000000'],
            'locked_balance' => ['type' => 'DECIMAL', 'constraint' => '30,8', 'default' => '0.00000000'],
            'voting_balance' => ['type' => 'DECIMAL', 'constraint' => '30,8', 'default' => '0.00000000'],
            'lifetime_earned' => ['type' => 'DECIMAL', 'constraint' => '30,8', 'default' => '0.00000000'],
            'lifetime_withdrawn' => ['type' => 'DECIMAL', 'constraint' => '30,8', 'default' => '0.00000000'],
            'lifetime_redeemed' => ['type' => 'DECIMAL', 'constraint' => '30,8', 'default' => '0.00000000'],
            'status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'active'],
            'created_by' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'updated_by' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['coin_id', 'user_id']);
        $this->forge->addKey(['project_id', 'user_id']);
        $this->forge->addKey('status');
        $this->forge->createTable('bf_tbi_coin_wallets', true);
    }

    private function ensurePayoutRequestsTable(): void
    {
        if ($this->db->tableExists('bf_tbi_coin_payout_requests')) {
            return;
        }

        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'project_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'coin_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'wallet_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'user_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'coin_amount' => ['type' => 'DECIMAL', 'constraint' => '30,8', 'default' => '0.00000000'],
            'requested_coin_amount' => ['type' => 'DECIMAL', 'constraint' => '30,8', 'default' => '0.00000000'],
            'usd_reference_amount' => ['type' => 'DECIMAL', 'constraint' => '18,6', 'default' => '0.000000'],
            'requested_usd_amount' => ['type' => 'DECIMAL', 'constraint' => '18,6', 'default' => '0.000000'],
            'status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'pending'],
            'memo' => ['type' => 'TEXT', 'null' => true],
            'notes' => ['type' => 'TEXT', 'null' => true],
            'payment_method' => ['type' => 'VARCHAR', 'constraint' => 40, 'default' => 'manual'],
            'payout_provider' => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true],
            'payout_metadata' => ['type' => 'TEXT', 'null' => true],
            'external_reference' => ['type' => 'VARCHAR', 'constraint' => 190, 'null' => true],
            'approved_by' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'approved_at' => ['type' => 'DATETIME', 'null' => true],
            'rejected_by' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'rejected_at' => ['type' => 'DATETIME', 'null' => true],
            'rejection_reason' => ['type' => 'TEXT', 'null' => true],
            'paid_by' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'paid_at' => ['type' => 'DATETIME', 'null' => true],
            'created_by' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'updated_by' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('project_id');
        $this->forge->addKey('coin_id');
        $this->forge->addKey('wallet_id');
        $this->forge->addKey('user_id');
        $this->forge->addKey('status');
        $this->forge->createTable('bf_tbi_coin_payout_requests', true);
    }

    private function ensureExternalEventLogsTable(): void
    {
        if ($this->db->tableExists('bf_tbi_coin_external_event_logs')) {
            return;
        }

        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'external_client' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'external_event_id' => ['type' => 'VARCHAR', 'constraint' => 190, 'null' => true],
            'source' => ['type' => 'VARCHAR', 'constraint' => 100],
            'source_id' => ['type' => 'VARCHAR', 'constraint' => 190],
            'project_id' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'coin_id' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'user_id' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'contribution_id' => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'payload_hash' => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
            'payload_json' => ['type' => 'LONGTEXT', 'null' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 30],
            'response_json' => ['type' => 'LONGTEXT', 'null' => true],
            'reason' => ['type' => 'VARCHAR', 'constraint' => 190, 'null' => true],
            'error_message' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['external_client', 'external_event_id']);
        $this->forge->addUniqueKey(['source', 'source_id']);
        $this->forge->addKey('status');
        $this->forge->createTable('bf_tbi_coin_external_event_logs', true);
    }
}
