<?php

namespace Tests\Unit\Ledger;

use App\Models\WalletModel;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * GTM-032 / GTM-033: wallet balance changes are bounded and owner-scoped.
 */
final class WalletFundsTest extends CIUnitTestCase
{
    private WalletModel $wallets;

    protected function setUp(): void
    {
        parent::setUp();
        $db = db_connect();
        $db->query('CREATE TABLE IF NOT EXISTS bf_users_wallet (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, amount NUMERIC DEFAULT 0, created_on DATETIME NULL, modified_on DATETIME NULL)');
        $db->query('CREATE TABLE IF NOT EXISTS bf_users_wallet_transactions (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id TEXT, transaction_id TEXT, active TEXT NULL)');
        $db->table('bf_users_wallet')->whereIn('id', [9001, 9002])->delete();
        $db->table('bf_users_wallet')->insert(['id' => 9001, 'user_id' => 77, 'amount' => 100]);
        $db->table('bf_users_wallet_transactions')->where('transaction_id', 'TX-9001')->delete();
        $db->table('bf_users_wallet_transactions')->insert(['user_id' => '77', 'transaction_id' => 'TX-9001', 'active' => 'Yes']);
        $this->wallets = new WalletModel();
    }

    protected function tearDown(): void
    {
        db_connect()->table('bf_users_wallet')->whereIn('id', [9001, 9002])->delete();
        db_connect()->table('bf_users_wallet_transactions')->where('transaction_id', 'TX-9001')->delete();
        parent::tearDown();
    }

    public function testDepositAndWithdrawMoveTheBalance(): void
    {
        $this->assertTrue($this->wallets->addTokensToWallet(9001, '25.50'));
        $this->assertTrue($this->wallets->deductFunds(9001, 20));
        $this->assertEqualsWithDelta(105.5, $this->balance(), 0.0001);
    }

    public function testWithdrawCannotOverdraw(): void
    {
        $this->assertFalse($this->wallets->deductFunds(9001, 100.01));
        $this->assertEqualsWithDelta(100.0, $this->balance(), 0.0001);
        $this->assertTrue($this->wallets->deductFunds(9001, 100));
        $this->assertEqualsWithDelta(0.0, $this->balance(), 0.0001);
    }

    public function testNonPositiveOrNonNumericAmountsAreRejected(): void
    {
        foreach ([0, -5, '', 'abc', '1; DROP TABLE bf_users_wallet', NAN, INF, null] as $bad) {
            $this->assertFalse($this->wallets->addTokensToWallet(9001, $bad), var_export($bad, true));
            $this->assertFalse($this->wallets->deductFunds(9001, $bad), var_export($bad, true));
        }
        $this->assertEqualsWithDelta(100.0, $this->balance(), 0.0001);
    }

    public function testUnknownWalletIsReported(): void
    {
        $this->assertFalse($this->wallets->addTokensToWallet(9002, 5));
        $this->assertFalse($this->wallets->deductFunds(0, 5));
    }

    public function testTransactionOwnershipCheck(): void
    {
        $this->assertTrue($this->wallets->validateUserTransaction(77, 'TX-9001'));
        $this->assertTrue($this->wallets->validateUserTransaction('77', 'TX-9001'));
        $this->assertFalse($this->wallets->validateUserTransaction(78, 'TX-9001'));
    }

    public function testNormalizeAmount(): void
    {
        $this->assertSame('12.5', WalletModel::normalizeAmount('12.50'));
        $this->assertSame('0.00000001', WalletModel::normalizeAmount(1e-8));
        $this->assertNull(WalletModel::normalizeAmount('1e400'));
    }

    private function balance(): float
    {
        return (float) db_connect()->table('bf_users_wallet')->where('id', 9001)->get()->getRow()->amount;
    }
}
