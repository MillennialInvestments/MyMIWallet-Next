<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Creates the bf_exchanges_coin_addresses table for non-custodial and external
 * cryptocurrency addresses (Solana, Bitcoin, DigiByte).
 * Skipped if the table already exists.
 */
class CreateExchangeCoinAddressTable extends Migration
{
    private const TABLES = [
        'bf_exchanges_coin_addresses',
    ];

    public function up()
    {
        $id  = ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true];
        $ref = ['type' => 'BIGINT', 'unsigned' => true];
        $ts  = [
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ];

        $this->create('bf_exchanges_coin_addresses', [
            'id'         => $id,
            'user_id'    => $ref,
            'chain'      => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'solana'],
            'address'    => ['type' => 'VARCHAR', 'constraint' => 191],
            'label'      => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
            'is_default' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
        ] + $ts, [['user_id', 'chain'], ['address']]);
    }

    public function down()
    {
        foreach (self::TABLES as $table) {
            if ($this->db->tableExists($table, false)) {
                $this->forge->dropTable($this->unprefixed($table), true);
            }
        }
    }

    /**
     * @param list<list<string>> $keys
     * @param list<list<string>> $uniqueKeys
     */
    private function create(string $table, array $fields, array $keys = [], array $uniqueKeys = []): void
    {
        if ($this->db->tableExists($table, false)) {
            return;
        }

        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        foreach ($keys as $k) {
            $this->forge->addKey($k);
        }
        foreach ($uniqueKeys as $uk) {
            $this->forge->addUniqueKey($uk);
        }
        $this->forge->createTable($this->unprefixed($table), true);
    }

    private function unprefixed(string $table): string
    {
        $prefix = (string) $this->db->DBPrefix;

        return ($prefix !== '' && str_starts_with($table, $prefix)) ? substr($table, strlen($prefix)) : $table;
    }
}
