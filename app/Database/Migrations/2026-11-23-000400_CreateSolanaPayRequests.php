<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Solana Pay checkouts. One row per checkout: what is being bought, the
 * server-set price, the unique reference key the paying transaction must
 * carry, and the confirmed signature. The unique reference and unique
 * signature stop one payment from paying for two checkouts.
 *
 * Safe to run on prod by name: created only when missing; down() keeps data.
 */
class CreateSolanaPayRequests extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('bf_solana_pay_requests')) {
            log_message('notice', 'CreateSolanaPayRequests: bf_solana_pay_requests already exists');
            return;
        }
        $this->forge->addField([
            'id'            => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
            'reference'     => ['type' => 'VARCHAR', 'constraint' => 64],
            'user_id'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'purpose'       => ['type' => 'VARCHAR', 'constraint' => 32],
            'purpose_ref'   => ['type' => 'VARCHAR', 'constraint' => 64, 'default' => ''],
            'usd_cents'     => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true],
            'token'         => ['type' => 'VARCHAR', 'constraint' => 8, 'default' => 'USDC'],
            'token_mint'    => ['type' => 'VARCHAR', 'constraint' => 64],
            'token_amount'  => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true],
            'recipient'     => ['type' => 'VARCHAR', 'constraint' => 64],
            'recipient_token_account' => ['type' => 'VARCHAR', 'constraint' => 64, 'default' => ''],
            'fee_lamports'  => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'default' => 0],
            'cluster'       => ['type' => 'VARCHAR', 'constraint' => 16],
            'status'        => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'pending'],
            'payer_wallet'  => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'signature'     => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'claim_id'      => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'null' => true],
            'result'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'expires_at'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'updated_at'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('reference');
        $this->forge->addUniqueKey('signature');
        $this->forge->addKey(['user_id', 'created_at']);
        $this->forge->addKey(['status', 'expires_at']);
        $this->forge->createTable('bf_solana_pay_requests', true);
        log_message('notice', 'CreateSolanaPayRequests: created bf_solana_pay_requests');
    }

    public function down()
    {
        // Intentionally empty: payment records are never dropped by a rollback.
    }
}
