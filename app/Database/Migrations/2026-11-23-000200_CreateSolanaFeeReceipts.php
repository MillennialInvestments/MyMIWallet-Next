<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * SOL service-fee receipts (transfer_processing, payment_processing). One row
 * per accepted on-chain payment; the unique signature stops one payment from
 * paying for two charges. Kept for accounting and lawful requests.
 *
 * Safe to run on prod by name: created only when missing; down() keeps data.
 */
class CreateSolanaFeeReceipts extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('bf_solana_fee_receipts')) {
            log_message('notice', 'CreateSolanaFeeReceipts: bf_solana_fee_receipts already exists');
            return;
        }
        $this->forge->addField([
            'id'           => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
            'signature'    => ['type' => 'VARCHAR', 'constraint' => 100],
            'kind'         => ['type' => 'VARCHAR', 'constraint' => 32],
            'user_id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'payer_wallet' => ['type' => 'VARCHAR', 'constraint' => 64],
            'treasury'     => ['type' => 'VARCHAR', 'constraint' => 64],
            'lamports'     => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true],
            'fee_lamports' => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true],
            'reference'    => ['type' => 'VARCHAR', 'constraint' => 64],
            'cluster'      => ['type' => 'VARCHAR', 'constraint' => 16],
            'block_time'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'slot'         => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true],
            'created_at'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('signature');
        $this->forge->addKey(['user_id']);
        $this->forge->addKey(['kind', 'created_at']);
        $this->forge->addKey(['reference']);
        $this->forge->createTable('bf_solana_fee_receipts', true);
        log_message('notice', 'CreateSolanaFeeReceipts: created bf_solana_fee_receipts');
    }

    public function down()
    {
        // Intentionally empty: payment receipts are never dropped by a rollback.
    }
}
