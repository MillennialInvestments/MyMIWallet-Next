<?php

namespace Tests\Unit\Ledger;

use App\Models\AuctionBalanceModel;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * GTM-032: auction escrow never creates or destroys money except by credit/debit,
 * and balances never go negative.
 */
final class AuctionBalanceInvariantTest extends CIUnitTestCase
{
    private const UID = 8801;
    private AuctionBalanceModel $balances;

    protected function setUp(): void
    {
        parent::setUp();
        db_connect()->query('CREATE TABLE IF NOT EXISTS bf_auction_balances (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER UNIQUE, gold_cents INTEGER DEFAULT 0, hold_cents INTEGER DEFAULT 0)');
        db_connect()->table('bf_auction_balances')->where('user_id', self::UID)->delete();
        $this->balances = new AuctionBalanceModel();
        $this->assertTrue($this->balances->credit(self::UID, 10_000));
    }

    protected function tearDown(): void
    {
        db_connect()->table('bf_auction_balances')->where('user_id', self::UID)->delete();
        parent::tearDown();
    }

    public function testHoldAndReleaseConserveTotal(): void
    {
        $this->assertTrue($this->balances->hold(self::UID, 2_500));
        $this->assertSame([7_500, 2_500], $this->row());
        $this->assertTrue($this->balances->release(self::UID, 1_000));
        $this->assertSame([8_500, 1_500], $this->row());
        $this->assertSame(10_000, array_sum($this->row()));
    }

    public function testCannotHoldMoreThanAvailable(): void
    {
        $this->assertFalse($this->balances->hold(self::UID, 10_001));
        $this->assertSame([10_000, 0], $this->row());
    }

    public function testCannotReleaseMoreThanHeld(): void
    {
        $this->balances->hold(self::UID, 100);
        $this->assertFalse($this->balances->release(self::UID, 101));
        $this->assertSame([9_900, 100], $this->row());
    }

    public function testSettlementDebitsFromHoldOnly(): void
    {
        $this->balances->hold(self::UID, 3_000);
        $this->assertFalse($this->balances->debit(self::UID, 3_001, true));
        $this->assertTrue($this->balances->debit(self::UID, 3_000, true));
        $this->assertSame([7_000, 0], $this->row());
    }

    public function testDebitCannotOverdraw(): void
    {
        $this->assertFalse($this->balances->debit(self::UID, 10_001));
        $this->assertTrue($this->balances->debit(self::UID, 10_000));
        $this->assertSame([0, 0], $this->row());
    }

    public function testNonPositiveAmountsChangeNothing(): void
    {
        foreach ([0, -1] as $cents) {
            $this->balances->hold(self::UID, $cents);
            $this->balances->release(self::UID, $cents);
            $this->balances->debit(self::UID, $cents);
            $this->balances->credit(self::UID, $cents);
        }
        $this->assertSame([10_000, 0], $this->row());
    }

    /** @return array{int,int} [gold_cents, hold_cents] */
    private function row(): array
    {
        $r = db_connect()->table('bf_auction_balances')->where('user_id', self::UID)->get()->getRowArray();

        return [(int) $r['gold_cents'], (int) $r['hold_cents']];
    }
}
