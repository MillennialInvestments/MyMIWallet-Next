<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

/**
 * Creates core exchange tables for orders, balances, and trades.
 * Every table is skipped if it already exists, so this migration is safe
 * on databases that already contain legacy or pre-existing schemas.
 */
class CreateExchangeOrderTables extends Migration
{
    private const TABLES = [
        'bf_exchanges_orders',
        'bf_exchanges_balances',
        'bf_exchanges_trades',
    ];

    public function up()
    {
        $id  = ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true];
        $ref = ['type' => 'BIGINT', 'unsigned' => true];
        $dec = ['type' => 'DECIMAL', 'constraint' => '18,8', 'default' => 0.00000000];
        $ts  = [
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ];
        $now = ['type' => 'DATETIME', 'null' => true, 'default' => new RawSql('CURRENT_TIMESTAMP')];

        // 1. bf_exchanges_orders
        $this->create('bf_exchanges_orders', [
            'id'               => $id,
            'user_id'          => $ref,
            'trade_type'       => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'Buy'],
            'market_pair'      => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'USD'],
            'market'           => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'MYMI'],
            'amount'           => $dec,
            'price'            => $dec,
            'total'            => $dec,
            'total_cost'       => $dec,
            'fees'             => $dec,
            'filled_amount'    => $dec,
            'remaining_amount' => $dec,
            'status'           => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'Open'],
            'current_date'     => ['type' => 'VARCHAR', 'constraint' => 32, 'null' => true],
            'created_on'       => ['type' => 'DATETIME', 'null' => true],
            'completed_on'     => ['type' => 'DATETIME', 'null' => true],
        ] + $ts, [['user_id', 'status'], ['market_pair', 'market', 'status']]);

        // 2. bf_exchanges_balances
        $this->create('bf_exchanges_balances', [
            'id'                => $id,
            'user_id'           => $ref,
            'currency'          => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'USD'],
            'available_balance' => $dec,
            'hold_balance'      => $dec,
        ] + $ts, [], [['user_id', 'currency']]);

        // 3. bf_exchanges_trades
        $this->create('bf_exchanges_trades', [
            'id'            => $id,
            'buy_order_id'  => $ref,
            'sell_order_id' => $ref,
            'buyer_id'      => $ref,
            'seller_id'     => $ref,
            'market_pair'   => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'USD'],
            'market'        => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'MYMI'],
            'price'         => $dec,
            'amount'        => $dec,
            'fee'           => $dec,
            'settled_at'    => $now,
        ] + $ts, [['buyer_id', 'seller_id'], ['market_pair', 'market']]);
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
