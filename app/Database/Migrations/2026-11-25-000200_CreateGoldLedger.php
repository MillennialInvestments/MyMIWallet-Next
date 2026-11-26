<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Double-entry in-database credit ledger for MyMI Gold (closed-loop service credit).
 *
 * Invariants:
 * - 1 Gold = $1.00 USD of service credit
 * - Strictly non-transferable: no user-to-user transfers, no cash-out, no withdraw
 * - Double-entry audit chain: every entry records amount_gold (signed), balance_after,
 *   reason, reference_type, reference_id, and SHA256 hash chaining
 * - Balance is strictly non-negative (balance_after >= 0)
 * - Unique (user_id, reference_type, reference_id) stops double-crediting or double-spending
 */
class CreateGoldLedger extends Migration
{
    private const TABLE = 'bf_gold_ledger';

    public function up()
    {
        if ($this->db->tableExists(self::TABLE)) {
            log_message('notice', 'CreateGoldLedger: table already exists');
            return;
        }

        $this->forge->addField([
            'id'             => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
            'user_id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'amount_gold'    => ['type' => 'DECIMAL', 'constraint' => '20,8'], // signed: positive for credit, negative for spend
            'balance_after'  => ['type' => 'DECIMAL', 'constraint' => '20,8', 'unsigned' => true], // never negative
            'reason'         => ['type' => 'VARCHAR', 'constraint' => 32], // purchase, spend, admin_credit, refund
            'reference_type' => ['type' => 'VARCHAR', 'constraint' => 32], // crypto_pay, solana_pay, paypal, service_spend, admin, refund
            'reference_id'   => ['type' => 'VARCHAR', 'constraint' => 128],
            'prev_hash'      => ['type' => 'VARCHAR', 'constraint' => 64, 'default' => ''],
            'hash'           => ['type' => 'VARCHAR', 'constraint' => 64],
            'created_at'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['user_id', 'reference_type', 'reference_id']);
        $this->forge->addKey(['user_id', 'created_at']);
        $this->forge->addKey(['reason', 'created_at']);
        $this->forge->createTable(self::TABLE, true);
        log_message('notice', 'CreateGoldLedger: created bf_gold_ledger');
    }

    public function down()
    {
        // Financial ledger tables are preserved on rollback per governance rules.
    }
}
