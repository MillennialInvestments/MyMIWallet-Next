<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Multi-asset UTXO address pool for Litecoin (LTC) and Dogecoin (DOGE).
 *
 * Generated offline from master xpubs and imported via `php spark cryptopay:utxo-pool-import --chain=ltc`.
 *
 * Invariants:
 * - Each address is assigned to at most one checkout (unused -> reserved -> used).
 * - Multi-chain unique constraints: ['chain', 'address'] and ['chain', 'network', 'derivation_index'].
 * - Fail-closed: returns null if the pool for a given chain is exhausted.
 */
class CreateUtxoAddressPool extends Migration
{
    private const TABLE = 'bf_utxo_address_pool';

    public function up()
    {
        if ($this->db->tableExists(self::TABLE)) {
            log_message('notice', 'CreateUtxoAddressPool: table already exists');
            return;
        }

        $this->forge->addField([
            'id'               => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
            'chain'            => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'ltc'], // ltc, doge
            'network'          => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'testnet'], // mainnet, testnet
            'address'          => ['type' => 'VARCHAR', 'constraint' => 100],
            'derivation_index' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'status'           => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'unused'], // unused, reserved, used
            'checkout_ref'     => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'created_at'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'used_at'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['chain', 'address']);
        $this->forge->addUniqueKey(['chain', 'network', 'derivation_index']);
        $this->forge->addKey(['chain', 'network', 'status', 'derivation_index']);
        $this->forge->addKey('checkout_ref');
        $this->forge->createTable(self::TABLE, true);
        log_message('notice', 'CreateUtxoAddressPool: created bf_utxo_address_pool');
    }

    public function down()
    {
        $this->forge->dropTable(self::TABLE, true);
    }
}
