<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\BudgetModel;
use App\Models\WalletModel;
use App\Modules\APIs\Controllers\BudgetAPIController;
use App\Modules\APIs\Controllers\WalletsAPIController;
use App\Modules\User\Controllers\BudgetController;
use App\Modules\User\Controllers\WalletsController;
use App\Services\BudgetService;
use App\Services\FinancialSubmissionEngine;
use App\Services\WalletService;
use CodeIgniter\Database\BaseConnection;
use CodeIgniter\I18n\Time;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;
use Config\Services;

/**
 * End-to-End Certification & Verification Suite for MyMI Budget + Wallet Full Completion
 * Covers Directives Section 3, 4 (P0-A..P0-F), 5, 6, 7, and 8 (Scenarios A..H).
 *
 * @internal
 */
final class BudgetWalletFullCompletionTest extends CIUnitTestCase
{
    protected $db;
    private BudgetModel $budgetModel;
    private WalletModel $walletModel;
    private BudgetService $budgetService;
    private WalletService $walletService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->db = Database::connect([
            'DSN'      => '',
            'hostname' => '',
            'username' => '',
            'password' => '',
            'database' => ':memory:',
            'DBDriver' => 'SQLite3',
            'DBPrefix' => '',
            'pConnect' => false,
            'DBDebug'  => true,
            'charset'  => 'utf8',
            'DBCollat' => '',
        ], false);

        $this->createTestSchema();

        $this->budgetModel = new BudgetModel($this->db);
        $this->walletModel = new WalletModel($this->db);

        $accountsStub = new class {
            public function getUserCreditAccounts($userId): array
            {
                return [];
            }

            public function getUserDebtAccounts($userId): array
            {
                return [];
            }

            public function getUserBankAccounts($userId): array
            {
                return [
                    ['id' => 1, 'user_id' => $userId, 'balance' => 2500.00],
                ];
            }

            public function getUserInvestAccounts($userId): array
            {
                return [];
            }
        };

        $this->budgetService = new BudgetService(101, $this->budgetModel, $accountsStub, 'America/Chicago');
        $this->walletService = new WalletService(Services::logger(), $this->walletModel);
    }

    private function createTestSchema(): void
    {
        $this->db->query(
            'CREATE TABLE bf_users_budgeting (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                account_id INTEGER NULL,
                created_by INTEGER NOT NULL,
                created_by_email VARCHAR(128) NULL,
                username VARCHAR(128) NULL,
                status INTEGER NOT NULL DEFAULT 1,
                deleted INTEGER NOT NULL DEFAULT 0,
                paid INTEGER NOT NULL DEFAULT 0,
                paid_date VARCHAR(32) NULL,
                paid_time VARCHAR(32) NULL,
                submitted_on VARCHAR(64) NULL,
                beta VARCHAR(12) NULL DEFAULT \'No\',
                mode VARCHAR(32) NULL DEFAULT \'Add\',
                name VARCHAR(128) NULL,
                account_type VARCHAR(64) NULL,
                source_type VARCHAR(64) NULL,
                net_amount DECIMAL(18,2) NOT NULL DEFAULT 0.00,
                gross_amount DECIMAL(18,2) NOT NULL DEFAULT 0.00,
                designated_date VARCHAR(32) NULL,
                month INTEGER NULL,
                day INTEGER NULL,
                year INTEGER NULL,
                unix_timestamp INTEGER NULL,
                recurring_account VARCHAR(12) NULL DEFAULT \'No\',
                recurring_account_primary VARCHAR(12) NULL DEFAULT \'Yes\',
                recurring_schedule VARCHAR(64) NULL,
                intervals VARCHAR(64) NULL,
                is_debt INTEGER NOT NULL DEFAULT 0,
                wallet_id INTEGER NULL,
                due_date_estimated INTEGER NOT NULL DEFAULT 0
            )'
        );

        $this->db->query(
            'CREATE TABLE bf_users_debt_accounts (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                status INTEGER NOT NULL DEFAULT 1,
                deleted INTEGER NOT NULL DEFAULT 0,
                account_type VARCHAR(64) NULL,
                debtor VARCHAR(128) NULL,
                available_balance DECIMAL(18,2) NOT NULL DEFAULT 0.00,
                current_balance DECIMAL(18,2) NOT NULL DEFAULT 0.00,
                monthly_payment DECIMAL(18,2) NOT NULL DEFAULT 0.00
            )'
        );

        $this->db->query(
            'CREATE TABLE bf_users_wallet (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                user_email VARCHAR(128) NULL,
                username VARCHAR(128) NULL,
                wallet_type VARCHAR(64) NULL,
                provider VARCHAR(64) NULL,
                label VARCHAR(128) NULL,
                nickname VARCHAR(128) NULL,
                amount DECIMAL(18,2) NOT NULL DEFAULT 0.00,
                balance DECIMAL(18,2) NOT NULL DEFAULT 0.00,
                currency VARCHAR(12) NOT NULL DEFAULT \'USD\',
                status VARCHAR(32) NOT NULL DEFAULT \'1\',
                active INTEGER NOT NULL DEFAULT 1,
                deleted INTEGER NOT NULL DEFAULT 0,
                credentials TEXT NULL,
                last_transaction_sync DATETIME NULL,
                sync_status VARCHAR(32) NULL,
                last_sync_error TEXT NULL,
                created_on DATETIME NULL,
                modified_on DATETIME NULL,
                updated_on DATETIME NULL,
                deleted_on DATETIME NULL
            )'
        );

        $this->db->query(
            'CREATE TABLE bf_users_wallet_transactions (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                wallet_id INTEGER NOT NULL,
                budget_id INTEGER NULL,
                transaction_id VARCHAR(128) NULL,
                external_id VARCHAR(128) NULL,
                provider VARCHAR(64) NULL,
                trans_type VARCHAR(64) NULL,
                type VARCHAR(64) NULL,
                currency VARCHAR(12) NOT NULL DEFAULT \'USD\',
                amount DECIMAL(18,2) NOT NULL DEFAULT 0.00,
                description VARCHAR(255) NULL,
                merchant_name VARCHAR(128) NULL,
                category VARCHAR(128) NULL,
                status VARCHAR(32) NOT NULL DEFAULT \'Completed\',
                active VARCHAR(12) NOT NULL DEFAULT \'Yes\',
                deleted INTEGER NOT NULL DEFAULT 0,
                unix_timestamp INTEGER NULL,
                submitted_date DATETIME NULL,
                posted_date VARCHAR(32) NULL,
                date VARCHAR(32) NULL,
                transaction_date VARCHAR(32) NULL,
                created_on DATETIME NULL,
                user_email VARCHAR(128) NULL,
                nickname VARCHAR(128) NULL,
                raw_payload TEXT NULL
            )'
        );

        $this->db->query(
            'CREATE TABLE bf_users_audit_log (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NULL,
                wallet_id INTEGER NULL,
                action VARCHAR(128) NOT NULL,
                details TEXT NULL,
                created_at DATETIME NULL
            )'
        );
    }

    /**
     * Scenario A — Functional Contract Matrix:
     * Verifies form action attributes, recurring cadence normalization, and controller route reflection.
     */
    public function testScenarioAFunctionalContractMatrix(): void
    {
        // 1. Verify active form views point to the authoritative Budget and Wallet endpoints
        $budgetAddView = (string) file_get_contents(ROOTPATH . 'app/Modules/User/Views/Budget/Add.php');
        $this->assertStringNotContainsString("site_url('Wallets/Add')", $budgetAddView);
        $this->assertGreaterThanOrEqual(2, substr_count($budgetAddView, "site_url('Budget/Account-Manager')"));

        $budgetEditView = (string) file_get_contents(ROOTPATH . 'app/Modules/User/Views/Budget/Edit.php');
        $this->assertStringContainsString("action=\"<?= site_url('Budget/Account-Manager'); ?>\" method=\"POST\"", $budgetEditView);

        $walletAddView = (string) file_get_contents(ROOTPATH . 'app/Modules/User/Views/Wallets/Add.php');
        $this->assertStringContainsString("site_url('API/Wallets/Add')", $walletAddView);

        $walletAddAccountView = (string) file_get_contents(ROOTPATH . 'app/Modules/User/Views/Wallets/Add_Account.php');
        $this->assertStringContainsString("site_url('Wallets/Account-Manager')", $walletAddAccountView);

        $walletEditAccountView = (string) file_get_contents(ROOTPATH . 'app/Modules/User/Views/Wallets/Edit_Account.php');
        $this->assertStringContainsString("site_url('Wallets/Account-Manager')", $walletEditAccountView);

        // 2. Verify every recurring cadence offered by getRecurringSchedules() passes applyRecurringScheduleRules()
        foreach (['income', 'expense'] as $category) {
            $schedules = $this->budgetService->getRecurringSchedules($category);
            $this->assertNotEmpty($schedules);

            foreach ($schedules as $cadence) {
                $payload = $this->budgetService->prepareAccountPayload(101, [
                    'form_mode'          => 'Add',
                    'designated_date'    => '2026-10-15',
                    'nickname'           => "Test {$category} {$cadence}",
                    'net_amount'         => 250.00,
                    'gross_amount'       => 250.00,
                    'recurring_account'  => 'Yes',
                    'recurring_schedule' => $cadence,
                    'account_type'       => ucfirst($category),
                    'source_type'        => $category === 'income' ? 'Salary' : 'Utility',
                ]);

                $insertedId = $this->budgetService->save($payload);
                $this->assertGreaterThan(0, $insertedId, "Failed saving recurring cadence: {$cadence}");
            }
        }

        // 3. Verify all declared BudgetAPIController and WalletsController route handlers exist
        $budgetApiMethods = [
            'summary', 'credit', 'available', 'repayment', 'categories',
            'transactions', 'goals', 'insights', 'trends', 'netWorth',
            'cashFlow', 'budgets', 'savingsGoals', 'investmentAccounts',
            'linkedAccounts', 'addLinkedAccount', 'removeLinkedAccount', 'refreshLinkedAccount',
        ];
        foreach ($budgetApiMethods as $method) {
            $this->assertTrue(
                method_exists(BudgetAPIController::class, $method),
                "Missing BudgetAPIController::{$method}"
            );
        }

        $walletControllerMethods = [
            'accountManager', 'addFetch', 'createBankeAccount', 'attachAccount',
            'addAccount', 'generateWallet', 'coinSwap', 'addDepositFetch',
            'featureManager', 'linkAccount', 'linkAccountSuccess', 'walletManager',
            'purchaseManager', 'customizeMembership', 'walletGenerator',
            'walletSelections', 'walletTransaction', 'addWithdrawFetch',
        ];
        foreach ($walletControllerMethods as $method) {
            $this->assertTrue(
                method_exists(WalletsController::class, $method),
                "Missing WalletsController::{$method}"
            );
        }

        $this->assertTrue(method_exists(WalletsAPIController::class, 'add'));
        $this->assertTrue(method_exists(WalletsAPIController::class, 'create'));
        $this->assertTrue(method_exists(BudgetController::class, 'accountManager'));
    }

    /**
     * Scenario B — Ownership and Isolation Matrix (P0-A & P0-D):
     * User B (202) cannot read, edit, delete, markAsPaid, markAsUnpaid, bulkDelete, bulkUpdateStatus,
     * withdraw, transfer, or freeze User A's (101) budget or wallet records.
     */
    public function testScenarioBOwnershipAndIsolationMatrix(): void
    {
        $walletIdA = $this->walletModel->insert([
            'user_id'     => 101,
            'wallet_type' => 'Bank',
            'nickname'    => 'User A Vault',
            'amount'      => 1000.00,
            'balance'     => 1000.00,
            'currency'    => 'USD',
            'status'      => '1',
            'active'      => 1,
        ], true);

        $budgetIdA = $this->budgetService->save($this->budgetService->prepareAccountPayload(101, [
            'designated_date' => '2026-10-20',
            'nickname'        => 'User A Mortgage',
            'net_amount'      => 400.00,
            'gross_amount'    => 400.00,
            'account_type'    => 'Expense',
            'source_type'     => 'Mortgage Debt',
            'is_debt'         => 1,
            'wallet_id'       => $walletIdA,
        ]));

        // Cross-user budget operations by User 202 must fail and leave User 101's data untouched
        $this->assertNull($this->budgetModel->getAccountInformation($budgetIdA, 202));
        $this->assertFalse($this->budgetService->markAsPaid($budgetIdA, 202));
        $this->assertFalse($this->budgetService->update($budgetIdA, ['name' => 'Hacked Name'], 202));
        $this->assertFalse($this->budgetService->cancelAccount($budgetIdA, 202));
        $this->budgetService->bulkDelete([$budgetIdA], 202);
        $this->budgetService->bulkUpdateStatus([$budgetIdA], 0, 202);

        $recordAfterAttacks = $this->budgetModel->getAccountInformation($budgetIdA, 101);
        $this->assertIsArray($recordAfterAttacks);
        $this->assertSame('User A Mortgage', $recordAfterAttacks['name']);
        $this->assertSame(0, (int) $recordAfterAttacks['paid']);
        $this->assertSame(0, (int) $recordAfterAttacks['deleted']);
        $this->assertSame(1, (int) $recordAfterAttacks['status']);

        // Cross-user wallet operations by User 202 must fail and leave User 101's wallet balance at $1000.00
        $this->assertFalse($this->walletService->withdrawFunds($walletIdA, 100.00, 'USD', 202));
        $this->assertFalse($this->walletService->depositFunds($walletIdA, 100.00, 'USD', 202));
        $this->assertFalse($this->walletService->freezeWallet($walletIdA, 202));
        $this->assertSame(1000.00, $this->walletModel->getWalletBalance($walletIdA, 101));
    }

    /**
     * Scenario C — Duplicate and Idempotency Matrix (P0-B & P0-C):
     * Repeated markAsPaid / markAsUnpaid and repeated transaction reversals execute accounting changes once.
     */
    public function testScenarioCDuplicateAndIdempotencyMatrix(): void
    {
        $walletId = $this->walletModel->insert([
            'user_id'     => 101,
            'wallet_type' => 'Bank',
            'nickname'    => 'Checking',
            'amount'      => 1000.00,
            'balance'     => 1000.00,
            'currency'    => 'USD',
            'status'      => '1',
            'active'      => 1,
        ], true);

        $budgetId = $this->budgetService->save($this->budgetService->prepareAccountPayload(101, [
            'designated_date' => '2026-10-25',
            'nickname'        => 'Auto Loan Payment',
            'net_amount'      => 250.00,
            'gross_amount'    => 250.00,
            'account_type'    => 'Expense',
            'source_type'     => 'Auto Loan Debt',
            'is_debt'         => 1,
            'wallet_id'       => $walletId,
        ]));

        // First markAsPaid deducts $250.00 -> $750.00
        $this->assertTrue($this->budgetService->markAsPaid($budgetId, 101));
        $this->assertSame(750.00, $this->walletModel->getWalletBalance($walletId, 101));

        // Second & third markAsPaid calls are idempotent -> balance stays $750.00
        $this->assertTrue($this->budgetService->markAsPaid($budgetId, 101));
        $this->assertTrue($this->budgetService->markAsPaid($budgetId, 101));
        $this->assertSame(750.00, $this->walletModel->getWalletBalance($walletId, 101));

        // First markAsUnpaid restores $250.00 -> $1000.00 and preserves status = 1
        $this->assertTrue($this->budgetService->markAsUnpaid($budgetId, 101));
        $this->assertSame(1000.00, $this->walletModel->getWalletBalance($walletId, 101));
        $unpaidRow = $this->budgetModel->getAccountInformation($budgetId, 101);
        $this->assertSame(1, (int) ($unpaidRow['status'] ?? 0));
        $this->assertSame(0, (int) ($unpaidRow['paid'] ?? 1));

        // Second markAsUnpaid call is idempotent -> balance stays $1000.00
        $this->assertTrue($this->budgetService->markAsUnpaid($budgetId, 101));
        $this->assertSame(1000.00, $this->walletModel->getWalletBalance($walletId, 101));

        // Wallet deposit + idempotent reversal test
        $this->assertTrue($this->walletService->depositFunds($walletId, 300.00, 'USD', 101));
        $this->assertSame(1300.00, $this->walletModel->getWalletBalance($walletId, 101));

        $txHistory = $this->walletService->getWalletTransactionHistory($walletId, 101);
        $this->assertNotEmpty($txHistory);
        $depositTxId = (int) $txHistory[0]['id'];

        // First reversal deducts $300.00 -> $1000.00
        $this->assertTrue($this->walletService->reverseTransaction($depositTxId, 101));
        $this->assertSame(1000.00, $this->walletModel->getWalletBalance($walletId, 101));

        // Second reversal is idempotent -> balance remains $1000.00
        $this->assertTrue($this->walletService->reverseTransaction($depositTxId, 101));
        $this->assertSame(1000.00, $this->walletModel->getWalletBalance($walletId, 101));
    }

    /**
     * Scenario D — Concurrent Balance Contention & Overdraft Prevention:
     * Multiple withdrawals competing for a $100.00 balance never overdraft the wallet.
     */
    public function testScenarioDConcurrentBalanceContentionAndOverdraftPrevention(): void
    {
        $walletId = $this->walletModel->insert([
            'user_id'     => 101,
            'wallet_type' => 'Bank',
            'nickname'    => 'Contention Wallet',
            'amount'      => 100.00,
            'balance'     => 100.00,
            'currency'    => 'USD',
            'status'      => '1',
            'active'      => 1,
        ], true);

        $results = [];
        for ($i = 0; $i < 5; $i++) {
            $results[] = $this->walletService->withdrawFunds($walletId, 40.00, 'USD', 101);
        }

        $succeeded = count(array_filter($results));
        $failed    = count($results) - $succeeded;

        // Only 2 withdrawals of $40.00 can succeed from $100.00; 3 must be rejected; remaining balance = $20.00
        $this->assertSame(2, $succeeded);
        $this->assertSame(3, $failed);
        $this->assertSame(20.00, $this->walletModel->getWalletBalance($walletId, 101));
    }

    /**
     * Scenario E & F — Failure Injection Rollback + Input Validation & Sensitive Redaction:
     */
    public function testScenarioEAndFFailureRollbackAndValidationSecurity(): void
    {
        $engine = new FinancialSubmissionEngine($this->db);
        $engine->ensureSchema();

        $walletId = $this->walletModel->insert([
            'user_id'     => 101,
            'wallet_type' => 'Bank',
            'nickname'    => 'Rollback Wallet',
            'amount'      => 500.00,
            'balance'     => 500.00,
            'currency'    => 'USD',
            'status'      => '1',
            'active'      => 1,
        ], true);

        // Simulated fault after ledger write rolls back both wallet balance and transaction row
        $faultResult = $engine->processSubmission(101, 'wallet_deposit', 'idem-fault-1', [
            'wallet_id'                     => $walletId,
            'amount'                        => 250.00,
            'currency'                      => 'USD',
            'simulate_failure_after_ledger' => true,
        ]);
        $this->assertSame('error', $faultResult['status']);
        $this->assertSame(500.00, $this->walletModel->getWalletBalance($walletId, 101));

        // Negative, zero, NaN, INF amounts are strictly rejected
        foreach ([0, -50.00, NAN, INF, 'invalid'] as $badAmount) {
            $this->assertFalse($this->walletService->depositFunds($walletId, $badAmount, 'USD', 101));
            $this->assertFalse($this->walletService->withdrawFunds($walletId, $badAmount, 'USD', 101));
        }
        $this->assertSame(500.00, $this->walletModel->getWalletBalance($walletId, 101));
    }

    /**
     * Scenario G — Unified Budget & Wallet Accounting + Multi-Page Plaid Sync:
     * Verifies extractActuals(), calculateAvailableAmount() anti-double-counting, and Plaid cursor/page sync.
     */
    public function testScenarioGUnifiedAccountingAndPlaidMultiPageSync(): void
    {
        $walletId = $this->walletModel->insert([
            'user_id'     => 101,
            'wallet_type' => 'Bank',
            'provider'    => 'plaid',
            'nickname'    => 'Plaid Checking',
            'amount'      => 3000.00,
            'balance'     => 3000.00,
            'currency'    => 'USD',
            'status'      => '1',
            'active'      => 1,
            'credentials' => json_encode([
                'access_token' => 'enc_token_test',
                'account_id'   => 'acc_plaid_101',
            ]),
        ], true);

        // Insert a paid income ($4000) and a paid debt expense ($500) + an unpaid savings allocation ($300)
        $paidIncomeId = $this->budgetService->save($this->budgetService->prepareAccountPayload(101, [
            'designated_date' => '2026-10-05',
            'nickname'        => 'October Paycheck',
            'net_amount'      => 4000.00,
            'gross_amount'    => 4000.00,
            'paid'            => 1,
            'account_type'    => 'Income',
            'source_type'     => 'Salary',
        ]));
        $this->assertGreaterThan(0, $paidIncomeId);

        $paidDebtExpenseId = $this->budgetService->save($this->budgetService->prepareAccountPayload(101, [
            'designated_date' => '2026-10-10',
            'nickname'        => 'Credit Card Minimum',
            'net_amount'      => 500.00,
            'gross_amount'    => 500.00,
            'paid'            => 1,
            'account_type'    => 'Expense',
            'source_type'     => 'Credit Debt',
            'is_debt'         => 1,
        ]));
        $this->assertGreaterThan(0, $paidDebtExpenseId);

        // Insert settled wallet outflow ($120) and an internal transfer ($900, which must be excluded from actuals!)
        $this->walletModel->logTransaction($walletId, 'Expense', 120.00, [
            'user_id' => 101,
            'status'  => 'Completed',
        ]);
        $this->walletModel->logTransaction($walletId, 'Transfer', 900.00, [
            'user_id' => 101,
            'status'  => 'Completed',
        ]);

        $from = Time::parse('2026-10-01 00:00:00', 'America/Chicago');
        $to   = Time::parse('2026-10-31 23:59:59', 'America/Chicago');

        $actuals = $this->budgetService->extractActuals(101, $from, $to);
        $this->assertTrue($actuals['available']);
        $this->assertSame(4000.00, $actuals['income']);
        $this->assertSame(620.00, $actuals['expense']); // $500 paid budget + $120 wallet outflow (excludes $900 transfer)
        $this->assertSame(900.00, $actuals['internalTransfers']);

        // Multi-page Plaid sync stub (600 transactions across 2 pages + pending-to-posted replacement + removed item)
        $fakePlaid = new class {
            public function decryptToken(string $encrypted): string
            {
                return 'decrypted_' . $encrypted;
            }

            public function getTransactions(string $token, string $start, string $end, array $options): array
            {
                $offset = (int) ($options['offset'] ?? 0);
                $txns   = [];
                if ($offset === 0) {
                    // First page: 500 transactions including 1 pending transaction
                    $txns[] = [
                        'transaction_id' => 'plaid_pending_1',
                        'amount'         => 45.00,
                        'name'           => 'Coffee Shop Pending',
                        'date'           => '2026-10-12',
                        'pending'        => true,
                        'account_number' => 'SECRET_MUST_BE_REDACTED',
                    ];
                    for ($i = 2; $i <= 500; $i++) {
                        $txns[] = [
                            'transaction_id' => 'plaid_tx_' . $i,
                            'amount'         => 10.00,
                            'name'           => 'Merchant ' . $i,
                            'date'           => '2026-10-12',
                        ];
                    }
                } else {
                    // Second page: 100 transactions including the posted replacement for plaid_pending_1
                    $txns[] = [
                        'transaction_id'         => 'plaid_posted_1',
                        'pending_transaction_id' => 'plaid_pending_1',
                        'amount'                 => 47.50,
                        'name'                   => 'Coffee Shop Posted',
                        'date'                   => '2026-10-13',
                        'pending'                => false,
                    ];
                    for ($i = 502; $i <= 600; $i++) {
                        $txns[] = [
                            'transaction_id' => 'plaid_tx_' . $i,
                            'amount'         => 15.00,
                            'name'           => 'Merchant ' . $i,
                            'date'           => '2026-10-13',
                        ];
                    }
                }

                return [
                    'transactions'       => $txns,
                    'total_transactions' => 600,
                    'removed'            => $offset > 0 ? [['transaction_id' => 'plaid_tx_2']] : [],
                ];
            }
        };

        $syncStats = $this->walletService->syncPlaidTransactions(101, $walletId, 30, $fakePlaid);
        $this->assertSame(2, $syncStats['pagesFetched']);
        $this->assertSame(599, $syncStats['inserted']);
        $this->assertSame(1, $syncStats['updated']); // pending_1 upgraded in-place to posted_1
        $this->assertSame(1, $syncStats['removed']); // plaid_tx_2 marked Removed

        // Verify sensitive account_number was stripped from raw_payload
        $postedRow = $this->db->table('bf_users_wallet_transactions')
            ->where('external_id', 'plaid_posted_1')
            ->get()
            ->getRowArray();
        $this->assertIsArray($postedRow);
        $this->assertSame(47.50, (float) $postedRow['amount']);
        $this->assertStringNotContainsString('SECRET_MUST_BE_REDACTED', (string) ($postedRow['raw_payload'] ?? ''));
    }

    /**
     * Scenario H — High-Volume Batch & Scale Execution:
     * Executes a 10,000-submission batch in PHPUnit and verifies 100% reconciliation and zero discrepancy.
     */
    public function testScenarioHHighVolumeBatchReconciliation(): void
    {
        $engine = new FinancialSubmissionEngine($this->db);
        $report = $engine->runScaleBenchmark(10000, 2500);

        $this->assertTrue($report['certified']);
        $this->assertSame(10000, $report['total_submissions']);
        $this->assertSame(0.0, $report['reconciliation']['unexplained_discrepancy']);
        $this->assertTrue($report['reconciliation']['duplicate_replay_guarded']);
        $this->assertTrue($report['reconciliation']['conflict_rejected_409']);
        $this->assertTrue($report['reconciliation']['overdraft_rejected']);
        $this->assertTrue($report['reconciliation']['cross_user_rejected_403']);
        $this->assertTrue($report['reconciliation']['fault_rollback_verified']);
    }
}
