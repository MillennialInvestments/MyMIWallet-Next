<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

/**
 * Creates the MyMI Gold auction tables. The auction code (Auction*Model) has
 * shipped since 2026, but no migration ever created its tables, so they do not
 * exist in production. Columns follow each model's allowedFields. Every table
 * is skipped if it already exists, so this is safe on databases that have them.
 */
class CreateAuctionTables extends Migration
{
    private const TABLES = [
        'bf_auction_activity',
        'bf_auction_payments',
        'bf_auction_settlements',
        'bf_auction_bids',
        'bf_auction_balances',
        'bf_auction_lots',
        'bf_auction_items',
    ];

    public function up()
    {
        $id  = ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true];
        $ref = ['type' => 'BIGINT', 'unsigned' => true];
        $cents = ['type' => 'BIGINT', 'default' => 0];
        $ts  = [
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ];
        $now = ['type' => 'DATETIME', 'null' => true, 'default' => new RawSql('CURRENT_TIMESTAMP')];

        $this->create('bf_auction_items', [
            'id'               => $id,
            'user_id'          => $ref,
            'title'            => ['type' => 'VARCHAR', 'constraint' => 255],
            'slug'             => ['type' => 'VARCHAR', 'constraint' => 191, 'null' => true],
            'description'      => ['type' => 'TEXT', 'null' => true],
            'category'         => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'condition_grade'  => ['type' => 'VARCHAR', 'constraint' => 32, 'null' => true],
            'images_json'      => ['type' => 'TEXT', 'null' => true],
            'fmv_source_json'  => ['type' => 'TEXT', 'null' => true],
            'fmv_amount_cents' => $cents,
            'reserve_cents'    => $cents,
            'min_increment'    => ['type' => 'BIGINT', 'null' => true],
            'status'           => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'draft'],
        ] + $ts, [['user_id'], ['status']], ['slug']);

        $this->create('bf_auction_lots', [
            'id'                   => $id,
            'item_id'              => $ref,
            'starts_at'            => ['type' => 'DATETIME', 'null' => true],
            'ends_at'              => ['type' => 'DATETIME', 'null' => true],
            'anti_snipe_sec'       => ['type' => 'INT', 'default' => 0],
            'extend_threshold_sec' => ['type' => 'INT', 'default' => 0],
            'currency'             => ['type' => 'VARCHAR', 'constraint' => 16, 'default' => 'MYMIGOLD'],
            'status'               => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'scheduled'],
        ] + $ts, [['item_id'], ['status', 'ends_at']]);

        $this->create('bf_auction_bids', [
            'id'           => $id,
            'lot_id'       => $ref,
            'bidder_id'    => $ref,
            'amount_cents' => $cents,
            'leading'      => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'created_at'   => $now,
        ], [['lot_id', 'leading'], ['bidder_id']]);

        $this->create('bf_auction_balances', [
            'id'         => $id,
            'user_id'    => $ref,
            'gold_cents' => $cents,
            'hold_cents' => $cents,
        ], [], ['user_id']);

        $this->create('bf_auction_settlements', [
            'id'            => $id,
            'lot_id'        => $ref,
            'item_id'       => $ref,
            'seller_id'     => $ref,
            'winner_id'     => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'winning_cents' => $cents,
            'fee_bps'       => ['type' => 'INT', 'default' => 0],
            'fee_cents'     => $cents,
            'payout_cents'  => $cents,
            'escrow_status' => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'held'],
            'status'        => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'pending'],
            'tx_meta_json'  => ['type' => 'TEXT', 'null' => true],
        ] + $ts, [['item_id'], ['seller_id'], ['winner_id']], ['lot_id']);

        $this->create('bf_auction_payments', [
            'id'           => $id,
            'user_id'      => $ref,
            'lot_id'       => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'method'       => ['type' => 'VARCHAR', 'constraint' => 32],
            'direction'    => ['type' => 'VARCHAR', 'constraint' => 16],
            'amount_cents' => $cents,
            'rate_used'    => ['type' => 'DECIMAL', 'constraint' => '18,8', 'null' => true],
            'tx_ref'       => ['type' => 'VARCHAR', 'constraint' => 191, 'null' => true],
            'status'       => ['type' => 'VARCHAR', 'constraint' => 32, 'default' => 'pending'],
        ] + $ts, [['user_id'], ['lot_id']]);

        $this->create('bf_auction_activity', [
            'id'         => $id,
            'user_id'    => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'lot_id'     => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'action'     => ['type' => 'VARCHAR', 'constraint' => 64],
            'meta_json'  => ['type' => 'TEXT', 'null' => true],
            'created_at' => $now,
        ], [['lot_id'], ['user_id']]);
    }

    public function down()
    {
        // Only drop tables that are still empty, so a rollback never deletes auction history.
        foreach (self::TABLES as $table) {
            if ($this->db->tableExists($table, false) && $this->db->table($table)->countAllResults() === 0) {
                $this->forge->dropTable($this->unprefixed($table), true);
            }
        }
    }

    /**
     * @param list<list<string>> $keys
     * @param list<string>       $unique
     */
    private function create(string $table, array $fields, array $keys = [], array $unique = []): void
    {
        if ($this->db->tableExists($table, false)) {
            return;
        }
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        foreach ($keys as $cols) {
            $this->forge->addKey($cols);
        }
        foreach ($unique as $col) {
            $this->forge->addUniqueKey($col);
        }
        $this->forge->createTable($this->unprefixed($table));
    }

    /**
     * Forge adds DBPrefix itself. Production runs with an empty prefix, the test
     * group with 'bf_', so strip it here to get the same table name in both.
     */
    private function unprefixed(string $table): string
    {
        $prefix = (string) $this->db->DBPrefix;

        return ($prefix !== '' && str_starts_with($table, $prefix)) ? substr($table, strlen($prefix)) : $table;
    }
}
