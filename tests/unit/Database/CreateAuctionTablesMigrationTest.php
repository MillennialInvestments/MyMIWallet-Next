<?php

namespace Tests\Unit\Database;

use App\Database\Migrations\CreateAuctionTables;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;

require_once APPPATH . 'Database/Migrations/2026-11-14-000200_CreateAuctionTables.php';

/**
 * The auction tables were never created in production; this migration adds them.
 */
final class CreateAuctionTablesMigrationTest extends CIUnitTestCase
{
    private const TABLES = [
        'bf_auction_items', 'bf_auction_lots', 'bf_auction_bids', 'bf_auction_balances',
        'bf_auction_settlements', 'bf_auction_payments', 'bf_auction_activity',
    ];

    public function testCreatesAllTablesAndColumnsTheModelsUse(): void
    {
        $db = db_connect();
        foreach (self::TABLES as $t) {
            $db->query("DROP TABLE IF EXISTS {$t}");
        }
        (new CreateAuctionTables(Database::forge()))->up();

        foreach (self::TABLES as $t) {
            $this->assertTrue($db->tableExists($t, false), "{$t} missing");
        }
        $models = [
            \App\Models\AuctionItemModel::class, \App\Models\AuctionLotModel::class, \App\Models\AuctionBidModel::class,
            \App\Models\AuctionBalanceModel::class, \App\Models\AuctionSettlementModel::class, \App\Models\AuctionPaymentModel::class,
        ];
        foreach ($models as $class) {
            $m = new $class();
            $cols = $db->getFieldNames($m->table);
            foreach ($m->allowedFields as $f) {
                $this->assertContains($f, $cols, "{$m->table}.{$f} missing");
            }
        }
        foreach (['user_id', 'lot_id', 'action', 'meta_json', 'created_at'] as $f) {
            $this->assertContains($f, $db->getFieldNames('bf_auction_activity'));
        }

        // Running it again is a no-op, and down() keeps tables that hold data.
        (new CreateAuctionTables(Database::forge()))->up();
        $db->table('bf_auction_balances')->insert(['user_id' => 1, 'gold_cents' => 500]);
        (new CreateAuctionTables(Database::forge()))->down();
        $this->assertTrue($db->tableExists('bf_auction_balances', false));
        $this->assertFalse($db->tableExists('bf_auction_items', false));
        $db->query('DROP TABLE IF EXISTS bf_auction_balances');
    }
}
