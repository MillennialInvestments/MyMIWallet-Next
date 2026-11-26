<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Pre-generated Bitcoin address pool for one-address-per-checkout payments.
 *
 * Generated offline from an xpub (tools/testnet-wallets/wallets.mjs xpub-pool)
 * and imported via `php spark cryptopay:btc-pool-import`.
 *
 * Invariants:
 * - Each address is used for at most one checkout (status unused -> reserved -> used).
 * - Reuse prevention: unique constraint on address.
 * - Fail closed if pool is exhausted.
 */
class CreateBtcAddressPool extends Migration
{
    private const TABLE = 'bf_btc_address_pool';

    public function up()
    {
        if ($this->db->tableExists(self::TABLE)) {
            log_message('notice', 'CreateBtcAddressPool: table already exists');
            return;
        }

        $this->forge->addField([
            'id'               => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
            'address'          => ['type' => 'VARCHAR', 'constraint' => 100],
            'derivation_index' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'network'          => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'testnet'], // mainnet, testnet
            'status'           => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'unused'], // unused, reserved, used
            'checkout_ref'     => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'created_at'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'used_at'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('address');
        $this->forge->addUniqueKey(['network', 'derivation_index']);
        $this->forge->addKey(['network', 'status', 'derivation_index']);
        $this->forge->addKey('checkout_ref');
        $this->forge->createTable(self::TABLE, true);
        log_message('notice', 'CreateBtcAddressPool: created bf_btc_address_pool');
    }

    public function down()
    {
        // Address pool records are preserved on rollback.
    }
}
