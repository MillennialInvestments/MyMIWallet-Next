<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Crypto checkouts on Ethereum, Base, the XRP Ledger and Bitcoin. One row per
 * checkout: the server-set price and fee, the exact amount (or destination
 * tag) that identifies its payment, how far the chain has been read, and the
 * payment that settled it. The unique payment_id stops one payment from
 * paying for two checkouts.
 *
 * Safe to run on prod by name: created only when missing; down() keeps data.
 */
class CreateCryptoPayRequests extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('bf_crypto_pay_requests')) {
            log_message('notice', 'CreateCryptoPayRequests: bf_crypto_pay_requests already exists');
            return;
        }
        $this->forge->addField([
            'id'           => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
            'reference'    => ['type' => 'VARCHAR', 'constraint' => 64],
            'user_id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'chain'        => ['type' => 'VARCHAR', 'constraint' => 16],
            'network'      => ['type' => 'VARCHAR', 'constraint' => 8],
            'purpose'      => ['type' => 'VARCHAR', 'constraint' => 32],
            'purpose_ref'  => ['type' => 'VARCHAR', 'constraint' => 64, 'default' => ''],
            'usd_cents'    => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true],
            'fee_cents'    => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'default' => 0],
            'asset'        => ['type' => 'VARCHAR', 'constraint' => 8],
            'asset_contract' => ['type' => 'VARCHAR', 'constraint' => 64, 'default' => ''],
            'asset_amount' => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true],
            'rate'         => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => '1'],
            'dest_tag'     => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'null' => true],
            'recipient'    => ['type' => 'VARCHAR', 'constraint' => 100],
            'start_cursor' => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'default' => 0],
            'scan_cursor'  => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'default' => 0],
            'status'       => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'pending'],
            'payer'        => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'payment_id'   => ['type' => 'VARCHAR', 'constraint' => 160, 'null' => true],
            'claim_id'     => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'null' => true],
            'result'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'expires_at'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'updated_at'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('reference');
        $this->forge->addUniqueKey('payment_id');
        $this->forge->addKey(['user_id', 'created_at']);
        $this->forge->addKey(['status', 'expires_at']);
        $this->forge->addKey(['chain', 'asset_amount']);
        $this->forge->addKey(['chain', 'dest_tag']);
        $this->forge->createTable('bf_crypto_pay_requests', true);
        log_message('notice', 'CreateCryptoPayRequests: created bf_crypto_pay_requests');
    }

    public function down()
    {
        // Intentionally empty: payment records are never dropped by a rollback.
    }
}
