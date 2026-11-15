<?php

declare(strict_types=1);

namespace Tests\Unit\Ledger;

use App\Services\WalletBalanceService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * MYMI-GT-FORM-LEDGER-001 (F4): wallet deposit/withdraw form contract.
 * Ownership (IDOR), atomicity, balance conservation, precision, replay.
 */
final class WalletBalanceServiceTest extends CIUnitTestCase
{
    private const OWNER = 501;
    private const OTHER = 502;
    private const WALLET = 9501;
    private const FOREIGN_WALLET = 9502;

    protected function setUp(): void
    {
        parent::setUp();
        $db = db_connect();
        $db->query('CREATE TABLE IF NOT EXISTS bf_users_wallet (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, amount NUMERIC DEFAULT 0, created_on DATETIME NULL, modified_on DATETIME NULL)');
        $db->query('CREATE TABLE IF NOT EXISTS bf_wbs_ledger (id INTEGER PRIMARY KEY AUTOINCREMENT, transaction_id TEXT UNIQUE, user_id INTEGER, wallet_id INTEGER, trans_type TEXT, type TEXT, amount NUMERIC, currency TEXT, status TEXT, active TEXT, unix_timestamp INTEGER, submitted_date TEXT)');
        $db->table('bf_users_wallet')->whereIn('id', [self::WALLET, self::FOREIGN_WALLET])->delete();
        $db->table('bf_wbs_ledger')->truncate();
        $db->table('bf_users_wallet')->insert(['id' => self::WALLET, 'user_id' => self::OWNER, 'amount' => 100]);
        $db->table('bf_users_wallet')->insert(['id' => self::FOREIGN_WALLET, 'user_id' => self::OTHER, 'amount' => 50]);
    }

    protected function tearDown(): void
    {
        db_connect()->table('bf_users_wallet')->whereIn('id', [self::WALLET, self::FOREIGN_WALLET])->delete();
        db_connect()->query('DROP TABLE IF EXISTS bf_wbs_ledger');
        parent::tearDown();
    }

    private function service(string $ledger = 'bf_wbs_ledger'): WalletBalanceService
    {
        return new WalletBalanceService(db_connect(), 'bf_users_wallet', $ledger);
    }

    private function balance(int $id): float
    {
        return (float) db_connect()->table('bf_users_wallet')->select('amount')->where('id', $id)->get()->getRow()->amount;
    }

    /** @return list<array<string, mixed>> */
    private function ledger(): array
    {
        return db_connect()->table('bf_wbs_ledger')->orderBy('id')->get()->getResultArray();
    }

    public function testDepositAndWithdrawWriteOneLedgerRowEach(): void
    {
        $d = $this->service()->deposit(self::OWNER, self::WALLET, '25.50');
        $this->assertTrue($d['ok'], $d['reason']);
        $this->assertSame('25.5', $d['amount']);
        $w = $this->service()->withdraw(self::OWNER, self::WALLET, 20);
        $this->assertTrue($w['ok'], $w['reason']);

        $this->assertEqualsWithDelta(105.5, $this->balance(self::WALLET), 1e-9);
        $rows = $this->ledger();
        $this->assertCount(2, $rows);
        $this->assertSame(['Deposit', 'Withdrawal'], array_column($rows, 'trans_type'));
        $this->assertSame([self::OWNER, self::OWNER], array_map('intval', array_column($rows, 'user_id')));
        $this->assertSame([self::WALLET, self::WALLET], array_map('intval', array_column($rows, 'wallet_id')));
        $this->assertNotSame($rows[0]['transaction_id'], $rows[1]['transaction_id']);
    }

    public function testBalanceIsConservedAgainstTheLedger(): void
    {
        $svc = $this->service();
        $ops = [['deposit', '0.10'], ['deposit', '0.20'], ['withdraw', '150'], ['withdraw', '0.30'], ['deposit', 'abc'], ['withdraw', '100'], ['deposit', '12.345']];
        foreach ($ops as [$op, $amt]) {
            $svc->{$op}(self::OWNER, self::WALLET, $amt);
        }

        $net = 0.0;
        foreach ($this->ledger() as $row) {
            $net += ($row['trans_type'] === 'Deposit' ? 1 : -1) * (float) $row['amount'];
        }
        $this->assertEqualsWithDelta(100 + $net, $this->balance(self::WALLET), 1e-9, 'balance change must equal the ledger');
        $this->assertEqualsWithDelta(12.345, $this->balance(self::WALLET), 1e-9);
        $this->assertCount(5, $this->ledger(), 'rejected overdraft and invalid amount write no ledger rows');
    }

    public function testUserCannotMoveFundsInAnotherUsersWallet(): void
    {
        foreach (['deposit', 'withdraw'] as $op) {
            $r = $this->service()->{$op}(self::OWNER, self::FOREIGN_WALLET, 10);
            $this->assertFalse($r['ok']);
            $this->assertSame('wallet_not_found', $r['reason'], 'foreign and missing wallets give the same answer');
        }
        $this->assertSame('wallet_not_found', $this->service()->deposit(self::OWNER, 999999, 10)['reason']);
        $this->assertEqualsWithDelta(50.0, $this->balance(self::FOREIGN_WALLET), 1e-9);
        $this->assertSame([], $this->ledger());
    }

    public function testRejectsUnauthenticatedInvalidAmountsAndOverdraft(): void
    {
        $this->assertSame('unauthenticated', $this->service()->deposit(0, self::WALLET, 5)['reason']);
        foreach ([0, -5, '', 'abc', '1; DROP TABLE bf_users_wallet', NAN, INF, null, '1e400'] as $bad) {
            $this->assertSame('invalid_amount', $this->service()->deposit(self::OWNER, self::WALLET, $bad)['reason'], var_export($bad, true));
            $this->assertSame('invalid_amount', $this->service()->withdraw(self::OWNER, self::WALLET, $bad)['reason'], var_export($bad, true));
        }
        $this->assertSame('insufficient_funds', $this->service()->withdraw(self::OWNER, self::WALLET, '100.01')['reason']);
        $this->assertTrue($this->service()->withdraw(self::OWNER, self::WALLET, '100')['ok']);
        $this->assertEqualsWithDelta(0.0, $this->balance(self::WALLET), 1e-9);
        $this->assertCount(1, $this->ledger());
    }

    public function testLedgerFailureRollsBackTheBalance(): void
    {
        $r = $this->service('missing_ledger_table')->deposit(self::OWNER, self::WALLET, 40);
        $this->assertFalse($r['ok']);
        $this->assertContains($r['reason'], ['ledger_write_failed', 'internal_error']);
        $this->assertEqualsWithDelta(100.0, $this->balance(self::WALLET), 1e-9, 'balance must not change when the ledger write fails');
        $this->assertFalse(db_connect()->transStatus() === false && db_connect()->transDepth > 0, 'no transaction left open');
    }

    public function testRepeatedSubmissionWithTheSameRequestIdIsApplidOnce(): void
    {
        $first = $this->service()->deposit(self::OWNER, self::WALLET, 10, 'nonce-abc');
        $again = $this->service()->deposit(self::OWNER, self::WALLET, 10, 'nonce-abc');
        $this->assertTrue($first["ok"], $first["reason"]);
        $this->assertFalse($again['ok']);
        $this->assertSame('duplicate_request', $again['reason']);
        $this->assertSame($first['transaction_id'], $again['transaction_id']);
        $this->assertEqualsWithDelta(110.0, $this->balance(self::WALLET), 1e-9);
        $this->assertCount(1, $this->ledger());

        // Same nonce, different operation, is a different request.
        $this->assertTrue($this->service()->withdraw(self::OWNER, self::WALLET, 10, 'nonce-abc')['ok']);
    }
}
