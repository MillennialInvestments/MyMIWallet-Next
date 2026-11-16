<?php

declare(strict_types=1);

namespace Tests\Unit\Wallet;

use App\Models\AccountsModel;
use App\Models\WalletModel;
use App\Services\WalletService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * GTM-033: Wallet CRUD lifecycle and owner-authorization (IDOR) certification.
 *
 * Verifies:
 * - Positive: owner can delete, cascade delete, and update owned wallets/accounts.
 * - Negative: invalid IDs or types reject cleanly.
 * - Authorization: non-owner attempts return false / 404 and alter zero rows.
 * - Lifecycle: deleteWalletCascade soft-deletes parent and child records atomically.
 */
final class WalletCrudOwnershipTest extends CIUnitTestCase
{
    private const USER_OWNER = 601;
    private const USER_OTHER = 602;
    private const WALLET_OWNED = 8601;
    private const WALLET_OTHER = 8602;
    private const BANK_ACCOUNT_OWNED = 7601;
    private const BANK_ACCOUNT_OTHER = 7602;

    protected function setUp(): void
    {
        parent::setUp();
        $db = db_connect();
        $db->resetDataCache();

        $db->query('CREATE TABLE IF NOT EXISTS bf_users_wallet (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER,
            amount NUMERIC DEFAULT 0,
            account_id INTEGER DEFAULT 0,
            status TEXT DEFAULT "Active",
            active INTEGER DEFAULT 1,
            deleted INTEGER DEFAULT 0,
            label TEXT NULL,
            credentials TEXT NULL,
            created_on DATETIME NULL,
            modified_on DATETIME NULL,
            updated_on DATETIME NULL
        )');

        $existingFields = $db->getFieldNames('bf_users_wallet');
        $neededCols = [
            'active'      => 'INTEGER DEFAULT 1',
            'deleted'     => 'INTEGER DEFAULT 0',
            'account_id'  => 'INTEGER DEFAULT 0',
            'status'      => 'TEXT DEFAULT "Active"',
            'label'       => 'TEXT NULL',
            'credentials' => 'TEXT NULL',
            'updated_on'  => 'DATETIME NULL',
        ];
        foreach ($neededCols as $col => $def) {
            if (! in_array($col, $existingFields, true)) {
                $db->query("ALTER TABLE bf_users_wallet ADD COLUMN {$col} {$def}");
            }
        }

        $db->query('CREATE TABLE IF NOT EXISTS bf_users_bank_accounts (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER,
            wallet_id INTEGER DEFAULT 0,
            bank_name TEXT NULL,
            account_name TEXT NULL,
            nickname TEXT NULL,
            account_number TEXT NULL,
            routing_number TEXT NULL,
            account_type TEXT DEFAULT "checking",
            balance NUMERIC DEFAULT 0,
            status INTEGER DEFAULT 1,
            deleted INTEGER DEFAULT 0,
            created_on DATETIME NULL,
            updated_on DATETIME NULL
        )');

        $db->table('bf_users_wallet')->whereIn('id', [self::WALLET_OWNED, self::WALLET_OTHER])->delete();
        $db->table('bf_users_bank_accounts')->whereIn('id', [self::BANK_ACCOUNT_OWNED, self::BANK_ACCOUNT_OTHER])->delete();

        $db->table('bf_users_wallet')->insert([
            'id'       => self::WALLET_OWNED,
            'user_id'  => self::USER_OWNER,
            'amount'   => 150.00,
            'active'   => 1,
            'deleted'  => 0,
            'label'    => 'Owner Wallet',
        ]);

        $db->table('bf_users_wallet')->insert([
            'id'       => self::WALLET_OTHER,
            'user_id'  => self::USER_OTHER,
            'amount'   => 200.00,
            'active'   => 1,
            'deleted'  => 0,
            'label'    => 'Other Wallet',
        ]);

        $db->table('bf_users_bank_accounts')->insert([
            'id'             => self::BANK_ACCOUNT_OWNED,
            'user_id'        => self::USER_OWNER,
            'wallet_id'      => self::WALLET_OWNED,
            'bank_name'      => 'Owner Bank',
            'account_name'   => 'Owner Checking',
            'account_number' => '1234567890',
            'status'         => 1,
            'deleted'        => 0,
        ]);

        $db->table('bf_users_bank_accounts')->insert([
            'id'             => self::BANK_ACCOUNT_OTHER,
            'user_id'        => self::USER_OTHER,
            'wallet_id'      => self::WALLET_OTHER,
            'bank_name'      => 'Other Bank',
            'account_name'   => 'Other Checking',
            'account_number' => '9876543210',
            'status'         => 1,
            'deleted'        => 0,
        ]);
    }

    protected function tearDown(): void
    {
        $db = db_connect();
        $db->table('bf_users_wallet')->whereIn('id', [self::WALLET_OWNED, self::WALLET_OTHER])->delete();
        $db->table('bf_users_bank_accounts')->whereIn('id', [self::BANK_ACCOUNT_OWNED, self::BANK_ACCOUNT_OTHER])->delete();
        $db->resetDataCache();
        parent::tearDown();
    }

    public function testDeleteWalletRequiresPositiveIds(): void
    {
        $model = new WalletModel();
        $this->assertFalse($model->deleteWallet(0, self::USER_OWNER));
        $this->assertFalse($model->deleteWallet(self::WALLET_OWNED, 0));
        $this->assertFalse($model->deleteWallet(-1, -1));
    }

    public function testDeleteWalletOwnerSucceeds(): void
    {
        $model = new WalletModel();
        $ok = $model->deleteWallet(self::WALLET_OWNED, self::USER_OWNER);
        $this->assertTrue($ok, 'Owner must be able to delete own wallet');

        $row = db_connect()->table('bf_users_wallet')->where('id', self::WALLET_OWNED)->get()->getRowArray();
        $this->assertSame(0, (int) $row['active']);
        $this->assertSame(1, (int) $row['deleted']);
    }

    public function testDeleteWalletNonOwnerRefusedAndMutatesNothing(): void
    {
        $model = new WalletModel();
        $ok = $model->deleteWallet(self::WALLET_OWNED, self::USER_OTHER);
        $this->assertFalse($ok, 'Non-owner must not be able to delete another user\'s wallet');

        $row = db_connect()->table('bf_users_wallet')->where('id', self::WALLET_OWNED)->get()->getRowArray();
        $this->assertSame(1, (int) $row['active'], 'Wallet active status must remain untouched');
        $this->assertSame(0, (int) $row['deleted'], 'Wallet deleted status must remain untouched');
    }

    public function testWalletServiceDeleteWalletEnforcesUserScope(): void
    {
        $service = new WalletService();

        $this->assertFalse($service->deleteWallet(self::WALLET_OWNED, 0));
        $this->assertFalse($service->deleteWallet(self::WALLET_OWNED, self::USER_OTHER));

        $this->assertTrue($service->deleteWallet(self::WALLET_OWNED, self::USER_OWNER));
        $row = db_connect()->table('bf_users_wallet')->where('id', self::WALLET_OWNED)->get()->getRowArray();
        $this->assertSame(1, (int) $row['deleted']);
    }

    public function testAccountsModelDeleteWalletEnforcesUserScope(): void
    {
        $model = new AccountsModel();
        $this->assertFalse($model->deleteWallet(self::WALLET_OWNED, 0));
        $this->assertFalse($model->deleteWallet(self::WALLET_OWNED, self::USER_OTHER));

        $exists = db_connect()->table('bf_users_wallet')->where('id', self::WALLET_OWNED)->countAllResults();
        $this->assertSame(1, $exists);

        $this->assertTrue($model->deleteWallet(self::WALLET_OWNED, self::USER_OWNER));
        $existsAfter = db_connect()->table('bf_users_wallet')->where('id', self::WALLET_OWNED)->countAllResults();
        $this->assertSame(0, $existsAfter);
    }

    public function testDeleteWalletCascadeOwnerSucceeds(): void
    {
        $model = new WalletModel();
        $result = $model->deleteWalletCascade('bank', self::WALLET_OWNED, self::USER_OWNER, self::BANK_ACCOUNT_OWNED);

        $this->assertTrue($result['success'], 'Owner cascade delete must succeed');

        $parent = db_connect()->table('bf_users_wallet')->where('id', self::WALLET_OWNED)->get()->getRowArray();
        $this->assertSame(1, (int) $parent['deleted']);
        $this->assertSame(0, (int) $parent['active']);

        $child = db_connect()->table('bf_users_bank_accounts')->where('id', self::BANK_ACCOUNT_OWNED)->get()->getRowArray();
        $this->assertSame(1, (int) $child['deleted']);
        $this->assertSame(0, (int) $child['status']);
    }

    public function testDeleteWalletCascadeNonOwnerRefusedAndMutatesNothing(): void
    {
        $model = new WalletModel();
        $result = $model->deleteWalletCascade('bank', self::WALLET_OWNED, self::USER_OTHER, self::BANK_ACCOUNT_OWNED);

        $this->assertFalse($result['success'], 'Non-owner cascade delete must fail');
        $this->assertSame('No matching wallet or account record was found for this user.', $result['message']);

        $parent = db_connect()->table('bf_users_wallet')->where('id', self::WALLET_OWNED)->get()->getRowArray();
        $this->assertSame(0, (int) $parent['deleted'], 'Parent wallet must remain not deleted');
        $this->assertSame(1, (int) $parent['active']);

        $child = db_connect()->table('bf_users_bank_accounts')->where('id', self::BANK_ACCOUNT_OWNED)->get()->getRowArray();
        $this->assertSame(0, (int) $child['deleted'], 'Child account must remain not deleted');
        $this->assertSame(1, (int) $child['status']);
    }

    public function testUpdateAccountAndWalletOwnerSucceeds(): void
    {
        $model = new WalletModel();
        $prepared = [
            'bank_name' => 'Updated Bank Name',
            'nickname'  => 'Renamed Nickname',
        ];

        $ok = $model->updateAccountAndWallet('bank', self::BANK_ACCOUNT_OWNED, $prepared, self::USER_OWNER);
        $this->assertTrue($ok, 'Owner update must succeed');

        $child = db_connect()->table('bf_users_bank_accounts')->where('id', self::BANK_ACCOUNT_OWNED)->get()->getRowArray();
        $this->assertSame('Updated Bank Name', $child['bank_name']);
        $this->assertSame('Renamed Nickname', $child['nickname']);
    }

    public function testUpdateAccountAndWalletNonOwnerRefusedAndMutatesNothing(): void
    {
        $model = new WalletModel();
        $prepared = [
            'bank_name'    => 'Malicious Bank Name',
            'account_name' => 'Hacked Account',
        ];

        $ok = $model->updateAccountAndWallet('bank', self::BANK_ACCOUNT_OWNED, $prepared, self::USER_OTHER);
        $this->assertFalse($ok, 'Non-owner update must be rejected');

        $child = db_connect()->table('bf_users_bank_accounts')->where('id', self::BANK_ACCOUNT_OWNED)->get()->getRowArray();
        $this->assertSame('Owner Bank', $child['bank_name'], 'Bank name must remain unchanged');
        $this->assertSame('Owner Checking', $child['account_name'], 'Account name must remain unchanged');
    }

    public function testUpdateAccountAndWalletNonExistentRefused(): void
    {
        $model = new WalletModel();
        $prepared = ['bank_name' => 'Ghost Bank'];

        $ok = $model->updateAccountAndWallet('bank', 999999, $prepared, self::USER_OWNER);
        $this->assertFalse($ok, 'Non-existent account update must be rejected');

        $count = db_connect()->table('bf_users_bank_accounts')->where('bank_name', 'Ghost Bank')->countAllResults();
        $this->assertSame(0, $count, 'Must not insert phantom records');
    }

    public function testWalletsControllerEnforcesPostForDeletionAndNeverTrustsPostUserId(): void
    {
        $src = (string) file_get_contents(APPPATH . 'Modules/User/Controllers/WalletsController.php');

        $this->assertStringContainsString("strtoupper(\$this->request->getMethod()) !== 'POST'", $src, 'GET requests must not execute deletions');
        $this->assertStringContainsString('DeleteConfirm', $src, 'GET requests must render confirmation view');

        $delStart = strpos($src, 'public function delete(');
        $this->assertNotFalse($delStart);
        $delBody = substr($src, $delStart, 2500);

        $this->assertStringContainsString('$this->cuID', $delBody);
        $this->assertStringContainsString('currentWalletUserId()', $delBody);
        $this->assertStringNotContainsString("\$this->request->getPost('user_id')", $delBody, 'Must not take user id from request');
    }

    public function testWalletsControllerAddNewWalletRequiresSessionUser(): void
    {
        $src = (string) file_get_contents(APPPATH . 'Modules/User/Controllers/WalletsController.php');
        $addStart = strpos($src, 'public function addNewWallet(');
        $this->assertNotFalse($addStart);
        $addBody = substr($src, $addStart, 1500);

        $this->assertStringContainsString('$this->cuID ?? session(\'user_id\')', $addBody);
        $this->assertStringContainsString('401', $addBody, 'Must reject unauthenticated callers with 401');
    }

    public function testWalletsAPIControllerUpdateByTypeScopesViaModel(): void
    {
        $src = (string) file_get_contents(APPPATH . 'Modules/APIs/Controllers/WalletsAPIController.php');
        $this->assertStringContainsString('updateAccountAndWallet($type, (int)$id, $prepared, (int)$uid)', $src, 'API updates must pass authenticated uid to updateAccountAndWallet');
    }
}
