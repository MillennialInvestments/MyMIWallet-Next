<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Receipt lifecycle for SOL fees: pending while a charge runs, then spent or
 * released. Lets a failed charge be retried without one payment ever covering
 * two charges at once. Adds only missing columns; down() keeps data.
 */
class AddSolanaFeeReceiptStatus extends Migration
{
    public function up()
    {
        $t = 'bf_solana_fee_receipts';
        if (!$this->db->tableExists($t)) {
            log_message('notice', 'AddSolanaFeeReceiptStatus: run CreateSolanaFeeReceipts first');
            return;
        }
        // getFieldData is read fresh; fieldExists() can answer from a stale per-connection cache.
        $have = array_map(fn ($f) => $f->name, $this->db->getFieldData($t));
        $add = [];
        if (!in_array('status', $have, true)) {
            // Rows that already exist were all completed charges.
            $add['status'] = ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'spent'];
        }
        if (!in_array('updated_at', $have, true)) {
            $add['updated_at'] = ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'default' => 0];
        }
        if ($add !== []) {
            $this->forge->addColumn($t, $add);
            log_message('notice', 'AddSolanaFeeReceiptStatus: added ' . implode(', ', array_keys($add)));
        }
    }

    public function down()
    {
        // Intentionally empty: receipts are never altered by a rollback.
    }
}
