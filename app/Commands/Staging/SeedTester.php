<?php

declare(strict_types=1);

namespace App\Commands\Staging;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

/**
 * Seed staging-tester account with realistic budget, bank accounts, debt,
 * historical transactions, alert webhooks, and options campaigns.
 */
class SeedTester extends SafeBaseCommand
{
    protected $group       = 'Staging';
    protected $name        = 'staging:seed:tester';
    protected $description = 'Seed staging-tester account with realistic budget data, bank accounts, recurring items, and trade alerts.';
    protected $usage       = 'php spark staging:seed:tester [--user=<email_or_id>] [--reset] [--dry-run]';
    protected $options     = [
        '--user'    => 'Target user email or user_id (defaults to staging-tester@staging.invalid or id 3693)',
        '--reset'   => 'Clear previous synthetic budget and demo records before seeding',
        '--dry-run' => 'Preview actions without modifying the database',
    ];

    public function run(array $params)
    {
        if (ENVIRONMENT === 'production') {
            CLI::error('ABORT: staging:seed:tester cannot be executed in production environment.');
            return EXIT_ERROR;
        }

        $dryRun = CLI::getOption('dry-run') !== null;
        $reset  = CLI::getOption('reset') !== null;
        $userArg = CLI::getOption('user');

        $db = Database::connect();

        // 1. Resolve Target User
        $userId = $this->resolveUserId($db, $userArg ? (string) $userArg : null);
        if ($userId <= 0) {
            CLI::error('Target tester user could not be found. Please create staging-tester@staging.invalid or pass --user=<id>.');
            return EXIT_ERROR;
        }

        CLI::write("===> Seeding test data for User ID: {$userId} (dry-run: " . ($dryRun ? 'YES' : 'NO') . ")", 'cyan');

        if ($dryRun) {
            CLI::write('Dry run complete. No records written.', 'yellow');
            return EXIT_SUCCESS;
        }

        // 2. Optional Reset of prior seed data
        if ($reset) {
            $this->resetUserData($db, $userId);
            CLI::write('Cleaned previous seed data for tester.', 'yellow');
        }

        // 3. Seed Bank Accounts
        $this->seedBankAccounts($db, $userId);

        // 4. Seed Credit & Debt Accounts
        $this->seedCreditAndDebt($db, $userId);

        // 5. Seed Recurring Budget Items & Historical Actuals
        $this->seedBudgetRecords($db, $userId);

        // 6. Seed Webhooks & Trade Alerts
        $this->seedAlertsAndWebhooks($db, $userId);

        // 7. Seed Options Positions
        $this->seedOptionsPositions($db, $userId);

        CLI::write("✓ Successfully prepopulated staging-tester (User ID: {$userId}) with full budget, bank, alert, and options data!", 'green');
        return EXIT_SUCCESS;
    }

    protected function resolveUserId($db, ?string $userArg): int
    {
        $userTable = $db->tableExists('bf_users') ? 'bf_users' : ($db->tableExists('users') ? 'users' : null);
        if (!$userTable) {
            return 3693; // Default fallback staging-tester ID in non-live/sqlite environment
        }

        try {
            if ($userArg) {
                if (is_numeric($userArg)) {
                    return (int) $userArg;
                }
                if ($db->fieldExists('email', $userTable)) {
                    $row = $db->table($userTable)->select('id')->where('email', $userArg)->get()?->getRowArray();
                    if ($row) {
                        return (int) $row['id'];
                    }
                }
            }

            // Default lookups for staging-tester
            if ($db->fieldExists('email', $userTable)) {
                $row = $db->table($userTable)->select('id')
                    ->where('email', 'staging-tester@staging.invalid')
                    ->orWhere('id', 3693)
                    ->orderBy('id', 'DESC')
                    ->get()?->getRowArray();

                if ($row) {
                    return (int) $row['id'];
                }
            }
        } catch (\Throwable) {
            // Safe fallback
        }

        return 3693;
    }

    protected function resetUserData($db, int $userId): void
    {
        if ($db->tableExists('bf_users_bank_accounts')) {
            $db->table('bf_users_bank_accounts')->where('user_id', $userId)->delete();
        }
        if ($db->tableExists('bf_users_credit_accounts')) {
            $db->table('bf_users_credit_accounts')->where('user_id', $userId)->delete();
        }
        if ($db->tableExists('bf_users_debt_accounts')) {
            $db->table('bf_users_debt_accounts')->where('user_id', $userId)->delete();
        }
        if ($db->tableExists('bf_users_budgeting')) {
            $db->table('bf_users_budgeting')->where('created_by', $userId)->delete();
        }
    }

    protected function seedBankAccounts($db, int $userId): void
    {
        if (!$db->tableExists('bf_users_bank_accounts')) {
            return;
        }

        $count = $db->table('bf_users_bank_accounts')->where('user_id', $userId)->countAllResults();
        if ($count > 0) {
            CLI::write('  - Bank accounts already present, skipping.', 'white');
            return;
        }

        $accounts = [
            [
                'user_id'           => $userId,
                'bank_name'         => 'Chase Bank',
                'nickname'          => 'Chase Premier Checking',
                'account_type'      => 'Checking',
                'account_number'    => '4821',
                'current_balance'   => 8450.00,
                'available_balance' => 8450.00,
                'status'            => 1,
            ],
            [
                'user_id'           => $userId,
                'bank_name'         => 'Marcus by Goldman',
                'nickname'          => 'High-Yield Savings (4.4%)',
                'account_type'      => 'Savings',
                'account_number'    => '9014',
                'current_balance'   => 24500.00,
                'available_balance' => 24500.00,
                'status'            => 1,
            ],
            [
                'user_id'           => $userId,
                'bank_name'         => 'Fidelity Investments',
                'nickname'          => 'Core Brokerage Account',
                'account_type'      => 'Investment',
                'account_number'    => '3392',
                'current_balance'   => 42100.00,
                'available_balance' => 42100.00,
                'status'            => 1,
            ],
        ];

        foreach ($accounts as $acc) {
            $db->table('bf_users_bank_accounts')->insert($acc);
        }
        CLI::write('  ✓ Seeded 3 primary bank & investment accounts', 'green');
    }

    protected function seedCreditAndDebt($db, int $userId): void
    {
        if ($db->tableExists('bf_users_credit_accounts')) {
            $count = $db->table('bf_users_credit_accounts')->where('user_id', $userId)->countAllResults();
            if ($count === 0) {
                $db->table('bf_users_credit_accounts')->insert([
                    'user_id'           => $userId,
                    'bank_name'         => 'Chase Card Services',
                    'nickname'          => 'Chase Sapphire Preferred',
                    'account_type'      => 'Credit Card',
                    'account_number'    => '1098',
                    'current_balance'   => 1240.00,
                    'available_balance' => 13760.00,
                    'credit_limit'      => 15000.00,
                    'payment_due'       => 125.00,
                    'interest_rate'     => 19.99,
                    'due_date'          => '15',
                    'status'            => 1,
                ]);
                CLI::write('  ✓ Seeded 1 credit card account', 'green');
            }
        }

        if ($db->tableExists('bf_users_debt_accounts')) {
            $count = $db->table('bf_users_debt_accounts')->where('user_id', $userId)->countAllResults();
            if ($count === 0) {
                $db->table('bf_users_debt_accounts')->insert([
                    'user_id'           => $userId,
                    'debt_name'         => 'Auto Finance',
                    'nickname'          => 'Tesla Model 3 Loan',
                    'account_type'      => 'Auto Loan',
                    'account_number'    => '7741',
                    'current_balance'   => 12400.00,
                    'available_balance' => 0.00,
                    'monthly_payment'   => 385.00,
                    'status'            => 1,
                ]);
                CLI::write('  ✓ Seeded 1 auto debt account', 'green');
            }
        }
    }

    protected function seedBudgetRecords($db, int $userId): void
    {
        if (!$db->tableExists('bf_users_budgeting')) {
            return;
        }

        $now = time();

        // 1. Recurring Budget Schedule Entries
        $recurring = [
            ['name' => 'Bi-Weekly Tech Salary', 'account_type' => 'Income', 'net' => 4250.00, 'monthly' => 8500.00],
            ['name' => 'Quarterly Dividend Distribution', 'account_type' => 'Income', 'net' => 650.00, 'monthly' => 216.67],
            ['name' => 'Apartment Lease', 'account_type' => 'Expense', 'net' => 1850.00, 'monthly' => 1850.00],
            ['name' => 'Electric & Gas Utilities', 'account_type' => 'Expense', 'net' => 185.00, 'monthly' => 185.00],
            ['name' => 'Health & Dental Care', 'account_type' => 'Expense', 'net' => 340.00, 'monthly' => 340.00],
            ['name' => 'Fiber Internet 1Gbps', 'account_type' => 'Expense', 'net' => 85.00, 'monthly' => 85.00],
            ['name' => 'Monthly Groceries & Dining', 'account_type' => 'Expense', 'net' => 600.00, 'monthly' => 600.00],
            ['name' => 'Auto Insurance & Fuel', 'account_type' => 'Expense', 'net' => 195.00, 'monthly' => 195.00],
        ];

        foreach ($recurring as $item) {
            $db->table('bf_users_budgeting')->insert([
                'created_by'        => $userId,
                'name'              => $item['name'],
                'account_type'      => $item['account_type'],
                'net_amount'        => $item['net'],
                'gross_amount'      => $item['net'],
                'monthly_payment'   => $item['monthly'],
                'recurring_account' => 1,
                'designated_date'   => date('Y-m-01', $now),
                'month'             => (int) date('n', $now),
                'year'              => (int) date('Y', $now),
                'status'            => 1,
                'paid'              => 1,
                'source_type'       => 'staging_tester_seed',
            ]);
        }

        // 2. Past 6 Months of Historical Actual Transactions
        $itemsTemplate = [
            ['name' => 'Payroll Direct Deposit - Tech Corp', 'type' => 'Income', 'amount' => 4250.00, 'day' => 1],
            ['name' => 'Payroll Direct Deposit - Tech Corp', 'type' => 'Income', 'amount' => 4250.00, 'day' => 15],
            ['name' => 'Rent Payment - Leasing Office', 'type' => 'Expense', 'amount' => 1850.00, 'day' => 2],
            ['name' => 'Utility Bill - Power & Gas', 'type' => 'Expense', 'amount' => 185.00, 'day' => 8],
            ['name' => 'Health Insurance Premium', 'type' => 'Expense', 'amount' => 340.00, 'day' => 5],
            ['name' => 'Whole Foods Market', 'type' => 'Expense', 'amount' => 285.50, 'day' => 12],
            ['name' => 'Trader Joe\'s Grocery', 'type' => 'Expense', 'amount' => 245.20, 'day' => 22],
            ['name' => 'Fidelity S&P 500 Index Auto-Invest', 'type' => 'Expense', 'amount' => 1500.00, 'day' => 16],
        ];

        for ($m = 5; $m >= 0; $m--) {
            $monthTime = strtotime("-{$m} months", $now);
            $yearStr  = (int) date('Y', $monthTime);
            $monthStr = (int) date('n', $monthTime);

            foreach ($itemsTemplate as $tmpl) {
                $dayStr = min((int) date('t', $monthTime), $tmpl['day']);
                $dateStr = sprintf('%04d-%02d-%02d', $yearStr, $monthStr, $dayStr);

                $db->table('bf_users_budgeting')->insert([
                    'created_by'        => $userId,
                    'name'              => $tmpl['name'],
                    'account_type'      => $tmpl['type'],
                    'net_amount'        => $tmpl['amount'],
                    'gross_amount'      => $tmpl['amount'],
                    'monthly_payment'   => $tmpl['amount'],
                    'recurring_account' => 0,
                    'designated_date'   => $dateStr,
                    'day'               => $dayStr,
                    'month'             => $monthStr,
                    'year'              => $yearStr,
                    'status'            => 1,
                    'paid'              => 1,
                    'source_type'       => 'staging_tester_seed',
                ]);
            }
        }

        CLI::write('  ✓ Seeded recurring budget entries + 6 months of historical transactions', 'green');
    }

    protected function seedAlertsAndWebhooks($db, int $userId): void
    {
        // 1. Webhook Token
        $webhookService = new \App\Services\Alerts\AlertWebhookService();
        $webhook = $webhookService->getOrCreateWebhook($userId);

        // 2. Incoming Alerts
        $existing = $webhookService->getUserAlerts($userId);
        if (empty($existing)) {
            $sampleAlerts = [
                [
                    'source'    => 'TradingView',
                    'ticker'    => 'NVDA',
                    'direction' => 'BUY',
                    'price'     => 142.25,
                    'strategy'  => 'Momentum Breakout 4H',
                    'message'   => 'NVDA Bullish breakout confirmed above $140.00 resistance with heavy volume surge.',
                ],
                [
                    'source'    => 'TrendSpider',
                    'ticker'    => 'TSLA',
                    'direction' => 'BUY',
                    'price'     => 218.50,
                    'strategy'  => 'Multi-Timeframe MACD Bull Cross',
                    'message'   => 'TSLA Daily MACD bullish crossover with RSI recovery from oversold territory.',
                ],
                [
                    'source'    => 'TradingView',
                    'ticker'    => 'SPY',
                    'direction' => 'CALL',
                    'price'     => 592.10,
                    'strategy'  => 'Institutional Sweep Detector',
                    'message'   => 'SPY Institutional aggressive call sweep detected: 5,000 contracts 595C Exp Friday.',
                ],
            ];

            foreach ($sampleAlerts as $alertData) {
                $webhookService->ingestByToken($webhook['webhook_token'], json_encode($alertData));
            }
            CLI::write('  ✓ Seeded active personal alert webhook & sample incoming alerts feed', 'green');
        }
    }

    protected function seedOptionsPositions($db, int $userId): void
    {
        if (!$db->tableExists('bf_options_positions')) {
            return;
        }

        $count = $db->table('bf_options_positions')->where('user_id', $userId)->countAllResults();
        if ($count > 0) {
            return;
        }

        $now = date('Y-m-d H:i:s');
        $expiry = date('Y-m-d', strtotime('+30 days'));

        $positions = [
            [
                'trade_uuid'             => 'DEMO-OPT-' . uniqid(),
                'user_id'                => $userId,
                'ticker'                 => 'NVDA',
                'strategy'               => 'LONG_CALL',
                'expiry'                 => $expiry,
                'contracts_count'        => 2,
                'call_strike'            => 145.0000,
                'put_strike'             => 0.0000,
                'entry_stock_price'      => 142.2500,
                'entry_debit_per_pair'   => 4.2000,
                'total_entry_debit'      => 840.0000,
                'target_net_profit'      => 600.0000,
                'target_combined_exit'   => 7.2000,
                'current_unrealized_pnl' => 180.0000,
                'status'                 => 'OPEN',
                'notes'                  => 'Earnings run-up momentum position',
                'created_at'             => $now,
            ],
            [
                'trade_uuid'             => 'DEMO-OPT-' . uniqid(),
                'user_id'                => $userId,
                'ticker'                 => 'SPY',
                'strategy'               => 'BULL_CALL_SPREAD',
                'expiry'                 => date('Y-m-d', strtotime('+14 days')),
                'contracts_count'        => 5,
                'call_strike'            => 590.0000,
                'put_strike'             => 600.0000,
                'entry_stock_price'      => 592.1000,
                'entry_debit_per_pair'   => 3.1000,
                'total_entry_debit'      => 1550.0000,
                'target_net_profit'      => 1200.0000,
                'target_combined_exit'   => 5.5000,
                'current_unrealized_pnl' => 320.0000,
                'status'                 => 'OPEN',
                'notes'                  => 'FOMC rally follow-through spread',
                'created_at'             => $now,
            ],
        ];

        foreach ($positions as $pos) {
            $db->table('bf_options_positions')->insert($pos);
        }
        CLI::write('  ✓ Seeded 2 active options momentum campaigns', 'green');
    }
}
