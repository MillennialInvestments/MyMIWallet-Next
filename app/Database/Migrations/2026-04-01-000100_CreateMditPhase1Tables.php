<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMditPhase1Tables extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('bf_mdit_investor_profiles')) {
            $this->forge->addField([
                'id'                   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'user_id'              => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'kyc_status'           => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'PENDING'],
                'accreditation_status' => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'PENDING'],
                'risk_ack_on'          => ['type' => 'DATETIME', 'null' => true],
                'created_on'           => ['type' => 'DATETIME', 'null' => true],
                'updated_on'           => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('user_id');
            $this->forge->addKey('created_on');
            $this->forge->addKey('kyc_status');
            $this->forge->addKey('accreditation_status');
            $this->forge->createTable('bf_mdit_investor_profiles', true);
        }

        if (! $this->db->tableExists('bf_mdit_wallets')) {
            $this->forge->addField([
                'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'user_id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'wallet_address' => ['type' => 'VARCHAR', 'constraint' => 128],
                'chain'          => ['type' => 'VARCHAR', 'constraint' => 32],
                'is_primary'     => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'status'         => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'ACTIVE'],
                'created_on'     => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('wallet_address');
            $this->forge->addKey('user_id');
            $this->forge->addKey('status');
            $this->forge->addKey('created_on');
            $this->forge->createTable('bf_mdit_wallets', true);
        }

        if (! $this->db->tableExists('bf_mdit_deposits')) {
            $this->forge->addField([
                'id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'user_id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'wallet_address'   => ['type' => 'VARCHAR', 'constraint' => 128],
                'chain'            => ['type' => 'VARCHAR', 'constraint' => 32],
                'asset_symbol'     => ['type' => 'VARCHAR', 'constraint' => 16],
                'amount'           => ['type' => 'DECIMAL', 'constraint' => '18,8'],
                'tx_hash'           => ['type' => 'VARCHAR', 'constraint' => 191, 'null' => true],
                'confirmations'    => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
                'status'           => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'CREATED'],
                'idempotency_key'  => ['type' => 'VARCHAR', 'constraint' => 191],
                'provider_event_id'=> ['type' => 'VARCHAR', 'constraint' => 191, 'null' => true],
                'created_on'       => ['type' => 'DATETIME', 'null' => true],
                'updated_on'       => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('user_id');
            $this->forge->addKey('status');
            $this->forge->addKey('created_on');
            $this->forge->addUniqueKey('tx_hash');
            $this->forge->addUniqueKey('idempotency_key');
            $this->forge->createTable('bf_mdit_deposits', true);
        }

        if (! $this->db->tableExists('bf_mdit_token_ledger')) {
            $this->forge->addField([
                'id'                   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'user_id'              => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'wallet_address'       => ['type' => 'VARCHAR', 'constraint' => 128],
                'token_symbol'         => ['type' => 'VARCHAR', 'constraint' => 16],
                'units'                => ['type' => 'DECIMAL', 'constraint' => '18,8'],
                'nav_at_mint'          => ['type' => 'DECIMAL', 'constraint' => '18,8', 'null' => true],
                'minted_on'            => ['type' => 'DATETIME', 'null' => true],
                'burned_on'            => ['type' => 'DATETIME', 'null' => true],
                'source_deposit_id'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
                'source_redemption_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
                'status'               => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'MINTED'],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('user_id');
            $this->forge->addKey('status');
            $this->forge->addKey('source_deposit_id');
            $this->forge->addKey('source_redemption_id');
            $this->forge->createTable('bf_mdit_token_ledger', true);
        }

        if (! $this->db->tableExists('bf_mdit_redemptions')) {
            $this->forge->addField([
                'id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'user_id'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'wallet_address'=> ['type' => 'VARCHAR', 'constraint' => 128],
                'token_units'   => ['type' => 'DECIMAL', 'constraint' => '18,8'],
                'requested_on'  => ['type' => 'DATETIME', 'null' => true],
                'approved_on'   => ['type' => 'DATETIME', 'null' => true],
                'approved_by'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
                'status'        => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'REQUESTED'],
                'payout_asset'  => ['type' => 'VARCHAR', 'constraint' => 32, 'null' => true],
                'payout_amount' => ['type' => 'DECIMAL', 'constraint' => '18,8', 'null' => true],
                'notes'         => ['type' => 'VARCHAR', 'constraint' => 512, 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('user_id');
            $this->forge->addKey('status');
            $this->forge->addKey('requested_on');
            $this->forge->createTable('bf_mdit_redemptions', true);
        }

        if (! $this->db->tableExists('bf_mdit_nav_snapshots')) {
            $this->forge->addField([
                'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'as_of_date'     => ['type' => 'DATE'],
                'nav_total'      => ['type' => 'DECIMAL', 'constraint' => '18,8'],
                'token_supply'   => ['type' => 'DECIMAL', 'constraint' => '18,8'],
                'nav_per_unit'   => ['type' => 'DECIMAL', 'constraint' => '18,8'],
                'cash_value'     => ['type' => 'DECIMAL', 'constraint' => '18,8'],
                'equities_value' => ['type' => 'DECIMAL', 'constraint' => '18,8'],
                'created_on'     => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('as_of_date');
            $this->forge->addKey('created_on');
            $this->forge->createTable('bf_mdit_nav_snapshots', true);
        }

        if (! $this->db->tableExists('bf_mdit_disclosures_acceptance')) {
            $this->forge->addField([
                'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'user_id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'disclosure_version'=> ['type' => 'VARCHAR', 'constraint' => 32],
                'accepted_on'       => ['type' => 'DATETIME', 'null' => true],
                'ip_address'        => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
                'user_agent'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('user_id');
            $this->forge->addKey('accepted_on');
            $this->forge->createTable('bf_mdit_disclosures_acceptance', true);
        }

        if (! $this->db->tableExists('bf_mdit_webhook_events')) {
            $this->forge->addField([
                'id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'provider'     => ['type' => 'VARCHAR', 'constraint' => 64],
                'event_id'     => ['type' => 'VARCHAR', 'constraint' => 191],
                'event_type'   => ['type' => 'VARCHAR', 'constraint' => 64],
                'payload_json' => ['type' => 'LONGTEXT'],
                'payload_hash' => ['type' => 'VARCHAR', 'constraint' => 128],
                'received_on'  => ['type' => 'DATETIME', 'null' => true],
                'processed_on' => ['type' => 'DATETIME', 'null' => true],
                'status'       => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'RECEIVED'],
                'error_message'=> ['type' => 'VARCHAR', 'constraint' => 512, 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey(['provider', 'event_id']);
            $this->forge->addKey('status');
            $this->forge->addKey('received_on');
            $this->forge->createTable('bf_mdit_webhook_events', true);
        }
    }

    public function down()
    {
        $this->forge->dropTable('bf_mdit_webhook_events', true);
        $this->forge->dropTable('bf_mdit_disclosures_acceptance', true);
        $this->forge->dropTable('bf_mdit_nav_snapshots', true);
        $this->forge->dropTable('bf_mdit_redemptions', true);
        $this->forge->dropTable('bf_mdit_token_ledger', true);
        $this->forge->dropTable('bf_mdit_deposits', true);
        $this->forge->dropTable('bf_mdit_wallets', true);
        $this->forge->dropTable('bf_mdit_investor_profiles', true);
    }
}
