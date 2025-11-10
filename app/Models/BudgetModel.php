<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;

#[\AllowDynamicProperties]
class BudgetModel extends Model
{
    protected $table = 'bf_users_budgeting'; // Update the table name as per your CI4 database schema
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'id', 'status', 'deleted', 'mode', 'paid', 'paid_date', 'paid_time', 'beta', 'submitted_on',
        'unix_timestamp', 'designated_date', 'designated_date_override', 'initial_weeks_left', 'last_date',
        'month', 'day', 'year', 'time', 'created_by', 'created_by_email', 'username', 'account_type',
        'source_type', 'name', 'net_amount', 'gross_amount', 'monthly_payment', 'account_summary',
        'wallet_id', 'is_debt', 'is_cc_payment', 'intervals', 'recurring_account', 'recurring_account_primary',
        'recurring_account_id', 'recurring_account_order', 'recurring_schedule', 'link'
    ];

    protected string $timezone = 'America/Chicago';

    public function getRecentMonthlyAverages(int $userId, int $months = 3): array
    {
        $months = max(1, min(24, $months));

        $series = $this->collectMonthlyBudgetData($userId, $months);

        if (empty($series)) {
            return [
                'income'            => 0.0,
                'expense'           => 0.0,
                'monthsConsidered'  => $months,
                'series'            => [],
            ];
        }

        $totalIncome  = array_sum(array_column($series, 'income'));
        $totalExpense = array_sum(array_column($series, 'expense'));

        return [
            'income'           => round($totalIncome / $months, 2),
            'expense'          => round($totalExpense / $months, 2),
            'monthsConsidered' => $months,
            'series'           => $series,
        ];
    }

    public function buildForecast(int $userId, int $months, array $opt = []): array
    {
        $months = max(1, $months);

        $startIncome  = (float) ($opt['startIncome'] ?? 0.0);
        $startExpense = (float) ($opt['startExpense'] ?? 0.0);
        $gInc         = (float) ($opt['monthlyIncomeGrowth'] ?? 0.0);
        $gExp         = (float) ($opt['monthlyExpenseGrowth'] ?? 0.0);
        $balance      = (float) ($opt['startingBalance'] ?? 0.0);

        $startDateOpt = $opt['startDate'] ?? null;
        if ($startDateOpt instanceof DateTimeInterface) {
            $cursor = DateTimeImmutable::createFromInterface($startDateOpt);
        } elseif (is_string($startDateOpt) && $startDateOpt !== '') {
            $cursor = new DateTimeImmutable($startDateOpt, new DateTimeZone($this->timezone));
        } else {
            $cursor = new DateTimeImmutable('first day of this month', new DateTimeZone($this->timezone));
        }

        $cursor = $cursor->setTime(0, 0)->modify('first day of this month');

        $rows    = [];
        $income  = $startIncome;
        $expense = $startExpense;

        for ($i = 0; $i < $months; $i++) {
            $income  *= (1 + $gInc);
            $expense *= (1 + $gExp);
            $net      = $income - $expense;
            $balance += $net;

            $rows[] = [
                'monthIndex' => $i + 1,
                'date'       => $cursor->format('Y-m-01'),
                'income'     => round($income, 2),
                'expense'    => round($expense, 2),
                'net'        => round($net, 2),
                'cumulative' => round($balance, 2),
            ];

            $cursor = $cursor->modify('+1 month');
        }

        return $rows;
    }

    public function getHistoricalData(int $userId, int $months = 12): array
    {
        $months = max(1, min(60, $months));

        return $this->collectMonthlyBudgetData($userId, $months);
    }

    /**
     * @return array<int, array{year:int,month:int,date:string,label:string,income:float,expense:float}>
     */
    protected function collectMonthlyBudgetData(int $userId, int $months, ?DateTimeInterface $end = null): array
    {
        if ($months <= 0) {
            return [];
        }

        $tz = new DateTimeZone($this->timezone);
        if ($end instanceof DateTimeInterface) {
            $anchor = DateTimeImmutable::createFromInterface($end)->setTimezone($tz)->setTime(0, 0);
        } else {
            $anchor = new DateTimeImmutable('first day of this month', $tz);
        }

        $anchor = $anchor->modify('first day of this month');

        $periods = [];
        $cursor  = $anchor;
        for ($i = 0; $i < $months; $i++) {
            $key = $cursor->format('Y-m');
            $periods[$key] = [
                'year'    => (int) $cursor->format('Y'),
                'month'   => (int) $cursor->format('n'),
                'date'    => $cursor->format('Y-m-01'),
                'label'   => $cursor->format('M Y'),
                'income'  => 0.0,
                'expense' => 0.0,
            ];

            $cursor = $cursor->modify('-1 month');
        }

        if (empty($periods)) {
            return [];
        }

        $builder = $this->db->table($this->table)
            ->select('year, month, account_type, source_type, net_amount')
            ->where('created_by', $userId)
            ->where('deleted', 0)
            ->where('status', 1);


        $keys = array_keys($periods);
        $startBound = (int) str_replace('-', '', min($keys));
        $endBound   = (int) str_replace('-', '', max($keys));

        $builder
            ->where('year IS NOT NULL', null, false)
            ->where('month IS NOT NULL', null, false)
            ->where('(year * 100 + month) >=', $startBound)
            ->where('(year * 100 + month) <=', $endBound)
            ->orderBy('year', 'DESC')
            ->orderBy('month', 'DESC');

        $rows = $builder->get()->getResultArray();

        foreach ($rows as $row) {
            $year  = isset($row['year']) ? (int) $row['year'] : 0;
            $month = isset($row['month']) ? (int) $row['month'] : 0;
            if ($year <= 0 || $month <= 0) {
                continue;
            }

            $key = sprintf('%04d-%02d', $year, $month);
            if (!isset($periods[$key])) {
                continue;
            }

            $amount = $this->toFloat($row['net_amount'] ?? 0);
            $type   = $this->classifyRecordType($row['account_type'] ?? '', $row['source_type'] ?? '', $amount);

            if ($type === 'income') {
                $periods[$key]['income'] += max(0.0, $amount);
            } else {
                $periods[$key]['expense'] += abs($amount);
            }
        }

        foreach ($periods as &$period) {
            $period['income']  = round($period['income'], 2);
            $period['expense'] = round($period['expense'], 2);
        }
        unset($period);

        return array_values(array_reverse($periods, true));
    }

    protected function toFloat($value): float
    {
        if (is_numeric($value)) {
            return (float) $value;
        }

        if (is_string($value)) {
            $clean = preg_replace('/[^0-9.\-]/', '', $value);
            if ($clean === null || $clean === '' || $clean === '-' || $clean === '.') {
                return 0.0;
            }

            return (float) $clean;
        }

        return 0.0;
    }

    protected function classifyRecordType(string $accountType, string $sourceType, float $amount): string
    {
        $accountType = strtolower(trim($accountType));
        $sourceType  = strtolower(trim($sourceType));

        $incomeTokens  = ['income', 'salary', 'wage', 'pay', 'bonus', 'deposit', 'refund', 'rebate', 'self-employ', 'dividend'];
        $expenseTokens = ['expense', 'bill', 'debt', 'loan', 'liab', 'rent', 'mortgage', 'utility', 'subscription', 'payment'];

        foreach ($incomeTokens as $token) {
            if (str_contains($accountType, $token) || str_contains($sourceType, $token)) {
                return 'income';
            }
        }

        foreach ($expenseTokens as $token) {
            if (str_contains($accountType, $token) || str_contains($sourceType, $token)) {
                return 'expense';
            }
        }

        if ($amount < 0) {
            return 'expense';
        }

        return $accountType === 'income' ? 'income' : 'expense';
    }

    public function addAccount($data) {
        return $this->insert($data);
    }

    public function approveRecurringAccount($accountID) {
        if (!$data) {
            log_message('error', 'No data provided for recurring schedule approval.');
            return false;
        }
        // Ensure we're updating only the specific account by using a "where" clause
        return $this->where('id', $accountID)
                    ->set(['status' => 1])
                    ->update();
    }
    
    public function approveRecurringSchedule($data) {
        log_message('debug', 'BudgetModel L38 - $approveRecurringSchedule - $data: ' . (print_r($data, true)));
        if (!$data) {
            log_message('error', 'No data provided for recurring schedule approval.');
            return false;
        }

        $result = $this->db->table('bf_users_budgeting')->insert($data);
        
        if (!$result) {
            log_message('error', 'Failed to insert recurring schedule data.');
            return false;
        }

        return true;
    }

    public function attachAccount($accountID, $walletID) {
        return $this->update($accountID, ['wallet_id' => $walletID]);
    }
    
    public function bulkDelete($ids) {
        return $this->whereIn('id', $ids)->set(['status' => 0, 'deleted' => 1])->update();
    }    
    
    public function bulkUpdateStatus($ids, $status) {
        return $this->whereIn('id', $ids)->set(['status' => $status])->update();
    }

    public function cancelAccount($accountID) {
        $builder = $this->db->table('bf_users_budgeting');
        $builder->where('id', $accountID); 
        return $builder->update(['deleted' => 1]);
    }

    public function cancelSubaccount($accountID) {
        $builder = $this->db->table('bf_users_budgeting');
        $builder->where('id', $accountID);
        return $builder->update(['deleted' => 1]);
    }
    
    public function getAccounts($cuID) {
        return $this->where(['created_by' => $cuID, 'status' => 1])->findAll();
    }

    public function getAccountsOrderByDate($cuID, $order = 'asc', $paidStatus = null, $isDebt = null) {
        $builder = $this->where(['created_by' => $cuID, 'deleted' => 0]);

        if (!is_null($paidStatus)) {
            $builder->where('paid', $paidStatus);
        }

        if (!is_null($isDebt)) {
            $builder->where('is_debt', $isDebt);
        }

        return $builder->orderBy('year', $order)
                    ->orderBy('month', $order)
                    ->orderBy('day', $order)
                    ->findAll();
    }

    public function getAccountInformation($accountID) {
        $builder = $this->db->table('bf_users_budgeting'); 
        $builder->where('id', $accountID); 
        $result = $builder->get()->getRowArray(); 
        return $result;
    }

    public function getAnnualExpense($cuID) {
        return $this->selectSum('net_amount', 'total_expense')
                    ->where('created_by', $cuID)
                    ->where('account_type', 'Expense')
                    ->where('status', 1)
                    ->where('year', date("Y"))
                    ->first();
    }
    
    public function getAnnualExpenseYTD($cuID) {
        $startDate = date('Y-01-01'); // January 1st of the current year
        $endDate = date('Y-m-d'); // Today's date
    
        return $this->selectSum('net_amount', 'total_expense')
                    ->where('created_by', $cuID)
                    ->where('account_type', 'Expense')
                    ->where('status', 1)
                    ->where('designated_date >=', $startDate)
                    ->where('designated_date <=', $endDate)
                    ->first();
    }
    
    public function getAnnualForecast(int $userId): array
    {
        return $this->db->table('bf_users_budgeting_forecast')
            ->where('user_id', $userId)
            ->orderBy('month')
            ->get()->getResultArray();
    }
    
    public function getAnnualIncome($cuID) {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID, 
                        'account_type' => 'Income',
                        'status' => 1, 
                        'year' => date("Y")
                    ])
                    ->first();
    } 
    
    public function getAnnualIncomeYTD($cuID) {
        $startDate = date('Y-01-01'); // January 1st of the current year
        $endDate = date('Y-m-d'); // Today's date
    
        return $this->selectSum('net_amount')
                    ->where('created_by', $cuID)
                    ->where('account_type', 'Income')
                    ->where('status', 1)
                    ->where('designated_date >=', $startDate)
                    ->where('designated_date <=', $endDate)
                    ->first();
    }
    
    public function getAvailableBalances($cuID)
    {
        return $this->db->table('bf_users_credit_accounts')
            ->select('account_type, bank_name, nickname, available_balance')
            ->where('user_id', $cuID)
            ->where('status', 1)
            ->get()
            ->getResultArray();
    }
    
    public function getBudgetByUser($userID) {
        return $this->db->table('bf_users_budgeting')
                        ->where('created_by', $userID)
                        ->where('status', 1)
                        ->where('deleted', 0)
                        ->where('year', date("Y"))
                        ->get()
                        ->getResultArray();
    }
    
    public function getCheckingSummary($cuID) {
        // Bank account rows already persist the most recent cleared balance. The
        // $asOf parameter is preserved for API compatibility should historical
        // snapshots become available in the future.

        $builder = $this->db->table('bf_users_bank_accounts')
                            ->selectSum('balance')
                            ->where('user_id', $cuID)
                            ->where('status', 1)
                            ->get()
                            ->getRowArray();

        // Ensure a valid result is always returned
        if (!isset($builder['balance']) || is_null($builder['balance'])) {
            return ['balance' => 0]; // Return a default value if the sum is NULL
        }

        return $builder;
    }

    public function getInitialBankBalance(int $userId, ?string $asOf = null, ?int $accountId = null): float
    {

        $builder = $this->db->table('bf_users_bank_accounts')
            ->select('id, balance, current_balance, available_balance')
            ->where('user_id', $userId)
            ->where('status', 1)
            ->where('deleted', 0);

        if ($accountId !== null) {
            $builder->where('id', $accountId);
        }

        $accounts = $builder->get()->getResultArray();
        if (empty($accounts)) {
            return 0.0;
        }

        $total = 0.0;

        foreach ($accounts as $account) {
            $opening = 0.0;

            if (isset($account['balance']) && $account['balance'] !== null) {
                $opening = (float) $account['balance'];
            } elseif (isset($account['current_balance']) && $account['current_balance'] !== null) {
                $opening = (float) $account['current_balance'];
            } elseif (isset($account['available_balance']) && $account['available_balance'] !== null) {
                $opening = (float) $account['available_balance'];
            }

            $total += $opening;
        }

        return round($total, 2);
    }
    
    public function getCheckingSummary_old($cuID) {
        $builder = $this->db->table('bf_users_wallet');
        $result = $builder->selectSum('amount')
                ->where('user_id', $cuID)
                ->where('wallet_type', 'Banking')
                ->where('status', 1)
                ->where('active', 'Yes')
                ->get()
                ->getRowArray();
    
        // Ensure a valid result is always returned
        if (!isset($result['amount']) || is_null($result['amount'])) {
            return ['amount' => 0]; // Return a default value if the sum is NULL
        }
    
        return $result;
    }
    
    public function getCreditAccounts($cuID) {
        // Access the database connection and Query Builder for a specific table
        $builder = $this->db->table('bf_users_credit_accounts');

        // Construct the query using the Query Builder
        $result = $builder->select('account_type')
                ->where('user_id', $cuID)
                ->where('status', 1)
                ->findAll();

        return $result;
    }

    public function getCreditAccountsSummary($cuID) {
        $builder = $this->db->table('bf_users_credit_accounts');
        $builder->select('status, id, wallet_id, account_type, bank_name, nickname, account_number, SUM(available_balance) as available_balance, SUM(current_balance) as current_balance', false);
        $builder->where('user_id', $cuID);
        $builder->where('status', 1);
        $result = $builder->get()->getRowArray();

        return $result;
    }
    
    public function getCreditAvailableSummary($cuID) {
        // Access the database connection and Query Builder for a specific table
        $builder = $this->db->table('bf_users_credit_accounts');

        // Construct the query using the Query Builder
        $result = $builder->selectSum('credit_limit', 'current_balance', 'available_balance')
                ->where('user_id', $cuID)
                ->where('status', 1)
                ->where('deleted', 0)
                ->get()
                ->getRowArray();

        return $result;
    }
    
    public function getCreditLimitSummary($cuID) {
        $builder = $this->db->table('bf_users_credit_accounts');
        $builder->select('status, id, wallet_id, account_type, bank_name, nickname, account_number, SUM(available_balance) as available_balance, SUM(credit_limit) as credit_limit, SUM(current_balance) as current_balance', false);
        $builder->where('user_id', $cuID);
        $builder->where('status', 1);
        $result = $builder->get()->getResultArray();
    
        // log_message('info', 'WalletsModel - getUserCreditAccountsSummary() $result: ' . print_r($result, true));
    
        // // Initialize sums to 0 if not present to avoid undefined index errors
        // $result['available_balance'] = $result['available_balance'] ?? 0;
        // $result['credit_limit'] = $result['credit_limit'] ?? 0;
        // $result['current_balance'] = $result['current_balance'] ?? 0;
    
        return $result;
    }
    
    public function getCryptoAccountsSummary($cuID) {
        // Access the database connection and Query Builder for a specific table
        $builder = $this->db->table('bf_users_crypto_accounts');

        // Construct the query using the Query Builder
        $result = $builder->select('account_type')
                ->selectSum('net_worth')
                ->where('user_id', $cuID)
                ->where('status', 1)
                ->get()
                ->getRowArray();

        return $result;
    }
    
    // Fetch the summary of user's crypto accounts from the bf_users_crypto_accounts table
    public function getCryptoSummary($userId) {
        // Define the table where crypto accounts are stored
        $db = \Config\Database::connect();
        $builder = $db->table('bf_users_crypto_accounts'); // This is your table for crypto accounts

        // Query to get crypto summary (e.g., total amount)
        return $builder->selectSum('amount') // Sum of the 'amount' field
                       ->where('user_id', $userId)
                       ->get()
                       ->getRow()
                       ->amount; // Returns the total amount across all crypto accounts
    }
    // public function getDebtAccounts($cuID) {
    //     $debtAccountsModel = new \App\Models\DebtAccountsModel();
    //     return $debtAccountsModel->select('account_type')
    //                              ->selectSum('available_balance', 'total_available_balance')
    //                              ->where('user_id', $cuID)
    //                              ->where('status', 1)
    //                              ->where('deleted', 0)
    //                              ->findAll();
    // }
    
    public function getCurrentCreditBalances($cuID)
    {
        return $this->db->table('bf_users_credit_accounts')
            ->select('account_type, bank_name, nickname, current_balance')
            ->where('user_id', $cuID)
            ->where('status', 1)
            ->get()
            ->getResultArray();
    }    
    
    public function getDebtAccounts($cuID) {
        // Access the database connection and Query Builder for a specific table
        $builder = $this->db->table('bf_users_debt_accounts');

        // Construct the query using the Query Builder
        $result = $builder->select('account_type')
                ->where('user_id', $cuID)
                ->where('status', 1)
                ->findAll();

        return $result;
    }

    public function getDebtAccountByUserAndSource($userId, $sourceType) {
        return $this->db->table('bf_users_debt_accounts')->where([
            'user_id' => $userId,
            'account_type' => $sourceType,
        ])->get()->getRowArray();
    }
    
    public function getDebtRecordsByUser($userId)
    {
        return $this->db->table('bf_users_budgeting')
            ->where('created_by', $userId)
            ->where('is_debt', 1)
            ->get()
            ->getResultArray();
    }    
    
    public function getDebtAccountsSummary($cuID) {
        $builder = $this->db->table('bf_users_debt_accounts');
        $builder->select('status, id, wallet_id, account_type, debtor, nickname, account_number, SUM(available_balance) as available_balance, SUM(credit_limit) as credit_limit, SUM(current_balance) as current_balance', false);
        $builder->where('user_id', $cuID);
        $builder->where('status', 1);
        $result = $builder->get()->getRowArray();

        return $result;
    }

    public function getExpenseAccounts($cuID) {
        return $this->where([
            'created_by' => $cuID,
            'status' => 1,
            'account_type' => 'Expense',
        ])->findAll();
    }

    public function getExpenseAccountsSummary($cuID) {
        $startDate = date('Y-01-01'); // January 1st of the current year
        $endDate = date('Y-m-d'); // Today's date
        return $this->select('source_type')
                ->selectSum('net_amount')
                    ->where('created_by', $cuID)
                    ->where('account_type', 'Income')
                    ->where('designated_date >=', $startDate)
                    ->where('designated_date <=', $endDate)
                    ->where('year', date("Y"))
                    ->where("month <=", date('m'))
                    ->where("day <=", date('d'))
                    ->findAll();
    }
    
    public function getExpenseYTDSummary($cuID) {
        return $this->selectSum('net_amount', 'ytd_expense')
                    ->where('paid', 1)
                    ->where('deleted', 0)
                    ->where('created_by', $cuID)
                    ->where('account_type', 'Expense')
                    ->where('year', date("Y"))
                    ->where("month <=", date('n'))
                    ->where("day <=", date('j'))
                    ->findAll();
    }

    public function getFirstBudgetAccount($cuID) {
        return $this->where([
            'created_by' => $cuID,
            'status' => 1,
        ])->orderBy('id', 'asc')->first();
    }

    public function getForecastHistory($userId): array
    {
        return $this->db->table('bf_users_budgeting_forecast')
            ->where('user_id', $userId)
            ->orderBy('forecast_date', 'desc')
            ->get()
            ->getResultArray();
    }

    // Method to fetch goals based on status and user ID
    public function getGoalsByStatus($userId, $status) {
        return $this->db->table('bf_users_goal_checklist')
                        ->select('bf_users_goal_checklist.*, bf_users_goal_completions.*')
                        ->join('bf_users_goal_completions', 'bf_users_goal_checklist.id = bf_users_goal_completions.goal_id', 'left')
                        ->where('bf_users_goal_checklist.status', $status)  // Status from checklist table
                        ->where('bf_users_goal_completions.user_id', $userId) // User ID from completions table
                        ->get()
                        ->getResultArray();
    }
    
    public function getIncomeAccounts($cuID) {
        return $this->where([
            'created_by' => $cuID,
            'status' => 1,
            'account_type' => 'Income',
        ])->findAll();
    }

    public function getIncomeAccountsSummary($cuID) {
        $startDate = date('Y-01-01'); // January 1st of the current year
        $endDate = date('Y-m-d'); // Today's date
        $result = $this->select('source_type')
                    ->selectSum('net_amount')
                    ->where('created_by', $cuID)
                    ->where('account_type', 'Income')
                    ->where('designated_date >=', $startDate)
                    ->where('designated_date <=', $endDate)
                    ->where('year', date("Y"))
                    ->where("month <=", date('m'))
                    ->where("day <=", date('d'))
                    ->findAll();
        // log_message('info', 'BudgetModel - L426: getIncomeAccountsSummary Array' . print_r($result, true));
        return $result;
    }  

    public function getIncomeYTDSummary($cuID) {
        return $this->selectSum('net_amount', 'ytd_income')
                    ->where('paid', 1)
                    ->where('deleted', 0)
                    ->where('created_by', $cuID)
                    ->where('account_type', 'Income')
                    ->where('year', date("Y"))
                    ->where("month <=", date('n'))
                    ->where("day <=", date('j'))
                    ->findAll();
    }
    
    public function getInvestAccountsSummary($cuID) {
        // Access the database connection and Query Builder for a specific table
        $builder = $this->db->table('bf_users_invest_accounts');

        // Construct the query using the Query Builder
        $result = $builder->select('account_type')
                ->selectSum('net_worth')
                ->where('user_id', $cuID)
                ->where('status', 1)
                ->get()
                ->getRowArray();

        return $result;
    }
    
    public function getLastMonthsExpense($cuID) {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID, 
                        'account_type' => 'Expense',
                        'status' => 1, 
                        'month' => date("m", strtotime("-1 month"))
                    ])
                    ->first();
    }
    
    public function getLastMonthsIncome($cuID) {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID, 
                        'account_type' => 'Income',
                        'status' => 1, 
                        'month' => date("m", strtotime("-1 month"))
                    ])
                    ->first();
    }

    public function getLastMonthExpenseAccountSummary($cuID) {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID, 
                        'account_type' => 'Expense',
                        'month' => date("m", strtotime("-1 month")),
                        'year' => date("Y", strtotime("-1 month"))
                    ])
                    ->first();
    }

    public function getLastMonthIncomeAccountSummary($cuID) {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID, 
                        'account_type' => 'Income',
                        'month' => date("m", strtotime("-1 month")),
                        'year' => date("Y", strtotime("-1 month"))
                    ])
                    ->first();
    }

    // Fetch last month's investments for a user
    public function getLastMonthsInvestments($cuID) {
        return $this->selectSum('net_amount')
            ->where([
                'created_by' => $cuID,
                'account_type' => 'Investment',
                'month' => date('m', strtotime('-1 month')),
                'year' => date('Y', strtotime('-1 month')),
                'status' => 1
            ])
            ->first();
    }    
    
    public function getLastRecurringAccountInfo($cuID)
    {
        return $this->where(['created_by' => $cuID, 'recurring_account_primary' => 'Yes', 'status' => 1, 'deleted' => 0])
                    ->orderBy('id', 'desc')
                    ->first();
    }
    
    public function getLastYTDExpenseSummary($cuID) {
        $lastYear = date("Y", strtotime("-1 year"));
        $startDate = $lastYear . '-01-01'; // January 1st of last year
        $endDate = $lastYear . '-12-31'; // December 31st of last year
        return $this->selectSum('net_amount', 'ytd_expense')
                    ->where('created_by', $cuID)
                    ->where('account_type', 'Expense')
                    ->where('designated_date >=', $startDate)
                    ->where('designated_date <=', $endDate)
                    ->where('year', $lastYear)
                    ->findAll();
    }
    
    public function getLastYTDIncomeSummary($cuID) {
        $lastYear = date("Y", strtotime("-1 year"));
        $startDate = $lastYear . '-01-01'; // January 1st of last year
        $endDate = $lastYear . '-12-31'; // December 31st of last year
        return $this->selectSum('net_amount', 'ytd_income')
                    ->where('created_by', $cuID)
                    ->where('account_type', 'Income')
                    ->where('designated_date >=', $startDate)
                    ->where('designated_date <=', $endDate)
                    ->where('year', $lastYear)
                    ->findAll();
    }

    public function getLoanAccounts($cuID) {
        return $this->select('account_type')
                    ->selectSum('net_amount', 'total_loan_amount')
                    ->where('created_by', $cuID)
                    ->where('status', 1)
                    ->like('source_type', 'Loan')
                    ->findAll();
    }
    
    public function getLoanAccountsSummary($cuID) {
        return $this->select('account_type')
                    ->selectSum('net_amount', 'total_loan_summary')
                    ->where('created_by', $cuID)
                    ->where('status', 1)
                    ->like('source_type', 'Loan')
                    ->findAll();
    }

    public function getNextMonthsIncome($cuID) {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID, 
                        'account_type' => 'Income',
                        'status' => 1, 
                        'month' => date("m", strtotime("+1 month"))
                    ])
                    ->first();
    }
    
    public function getNextMonthsExpense($cuID) {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID, 
                        'account_type' => 'Expense',
                        'status' => 1, 
                        'month' => date("m", strtotime("+1 month"))
                    ])
                    ->first();
    }

    // Fetch next month's investments for a user
    public function getNextMonthsInvestments($cuID) {
        return $this->selectSum('net_amount')
            ->where([
                'created_by' => $cuID,
                'account_type' => 'Investment',
                'month' => date('m', strtotime('+1 month')),
                'year' => date('Y', strtotime('+1 month')),
                'status' => 1
            ])
            ->first();
    }

    public function getPaginatedData($limit, $offset) {
        return $this->orderBy('id', 'ASC')->findAll($limit, $offset);
    }   

    public function getPaidStatus($accountID) {
        $builder = $this->db->table('bf_users_budgeting');
        $builder->where('id', $accountID); 
        $result = $builder->get()->getRowArray(); 
        return $result['paid'] ?? null;
    }

    public function getRecurringAccounts($accountID)
    {
        return $this->where(['recurring_account_id' => $accountID])->findAll();
    }
    
    public function getRecurringAccountDetails($userId, $accountId) {
        // Ensure to adjust the table and column names according to your database schema.
        return $this->db->table('bf_users_budgeting')
            ->where('created_by', $userId)
            ->where('id', $accountId)
            ->where('recurring_account', 'Yes')
            ->get()
            ->getRowArray(); 
    }

    public function getRepaymentSummary($cuID)
    {
        return $this->db->table('bf_users_debt_accounts')
            ->select('account_type, debtor, nickname, monthly_payment')
            ->where('user_id', $cuID)
            ->where('status', 1)
            ->get()
            ->getResultArray();
    }
    
    public function getSourceRecords($cuID, $budgetType) {
        $builder = $this->db->table('bf_users_budgeting');
        $builder->select('source_type, name, net_amount, submitted_on')
                ->where(['created_by' => $cuID, 'account_type' => $budgetType, 'paid' => 1])
                ->orderBy('submitted_on', 'DESC')
                ->limit(5); 
        $result = $builder->get()->getResultArray();   
        // log_message('info', 'BudgetModel - L53: getSourceRecords $results Array: ' . print_r($result));
        return $result; 
    }

    public function getSummaryByType($cuID, $type) {
        $result = $this->select('account_type, SUM(net_amount) AS total_amount')
                       ->where('created_by', $cuID)
                       ->where('account_type', $type)
                       ->groupBy('account_type')
                       ->first();

        return [
            'type' => $type,
            'total_amount' => $result['total_amount'] ?? 0,
        ];
    }
    
    public function getThisMonthsExpense($cuID) {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID, 
                        'account_type' => 'Expense',
                        'status' => 1, 
                        'month' => date("m"),
                        'year' => date("Y")
                    ])
                    ->first();
    }

    public function getThisMonthsIncome($cuID) {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID, 
                        'account_type' => 'Income',
                        'status' => 1, 
                        'month' => date("m"),
                        'year' => date("Y")
                    ])
                    ->first();
    }

    public function getThisMonthExpenseAccountSummary($cuID) {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID, 
                        'account_type' => 'Expense',
                        'month' => date("m"),
                        'year' => date("Y")
                    ])
                    ->first();
    }
    
    public function getThisMonthIncomeAccountSummary($cuID) {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID, 
                        'account_type' => 'Income',
                        'month' => date("m"),
                        'year' => date("Y")
                    ])
                    ->first();
    }

    // Fetch this month's investments for a user
    public function getThisMonthsInvestments($cuID) {
        return $this->selectSum('net_amount')
            ->where([
                'created_by' => $cuID,
                'account_type' => 'Investment',
                'month' => date('m'),
                'year' => date('Y'),
                'status' => 1
            ])
            ->first();
    }

    // Fetch the total account balance for a specific user
    public function getTotalAccountBalance($userId) {
        return $this->db->table('bf_users_budgeting')
                    ->where('status', 1)
                    ->where('paid', 0)
                    ->where('deleted', 0)
                    ->where('created_by', $userId)
                    ->selectSum('net_amount') // Adjust based on your database structure
                    ->get()
                    ->getRow()
                    ->net_amount; // This returns the total of net_amount
    }

    // Fetch total investments for a user (all-time)
    public function getTotalInvestments($cuID) {
        return $this->selectSum('net_amount')
            ->where([
                'created_by' => $cuID,
                'account_type' => 'Investment',
                'status' => 1
            ])
            ->first();
    }

    public function getUserActiveBudgetRecords($cuID) {
        // log_message('info', 'BudgetModel - L20: ' . $cuID);
        $builder = $this->where(['status' => 1, 'paid' => 0, 'created_by' => $cuID, 'deleted' => 0]);
        $result = $builder->get()->getResultArray();        
        // log_message('info', 'BudgetModel - L23: ' . print_r($result, true));
        return $result; 
    } 
    
    public function getUserBudgetData($cuID)
    {
        return $this->where(['created_by' => $cuID, 'deleted' => 0])
                    ->orderBy('year', 'ASC')
                    ->orderBy('month', 'ASC')
                    ->orderBy('day', 'ASC')
                    ->findAll();
    }

    /**
     * Retrieve budget records that fall within the provided unix timestamp window.
     * Records that do not have a unix timestamp are filtered by year bounds and
     * returned so the caller can apply more granular checks.
     */
    public function getPeriodRecords(int $userId, int $fromTimestamp, int $toTimestamp, int $fromYear, int $toYear): array
    {
        $builder = $this->db->table('bf_users_budgeting');

        $builder
            ->select([
                'id',
                'status',
                'mode',
                'paid',
                'paid_date',
                'paid_time',
                'submitted_on',
                'unix_timestamp',
                'designated_date',
                'month',
                'day',
                'year',
                'account_type',
                'source_type',
                'name',
                'net_amount',
                'gross_amount',
                'recurring_account',
                'intervals',
                'is_debt',
                'recurring_schedule',
            ])
            ->where('created_by', $userId)
            ->where('deleted', 0)
            ->where('status', 1)
            ->groupStart()
                ->groupStart()
                    ->where('unix_timestamp >=', $fromTimestamp)
                    ->where('unix_timestamp <=', $toTimestamp)
                ->groupEnd()
                ->orGroupStart()
                    ->groupStart()
                        ->where('unix_timestamp', null)
                        ->orWhere('unix_timestamp', 0)
                    ->groupEnd()
                    ->where('year >=', $fromYear)
                    ->where('year <=', $toYear)
                ->groupEnd()
            ->groupEnd()
            ->orderBy('year', 'ASC')
            ->orderBy('month', 'ASC')
            ->orderBy('day', 'ASC');

        return $builder->get()->getResultArray();
    }

    /**
     * Sum the minimum required payments across credit and debt accounts for the user.
     */
    public function sumDebtMinimums(int $userId): array
    {
        $creditRow = $this->db->table('bf_users_credit_accounts')
            ->selectSum('payment_due', 'total_credit_minimum')
            ->where('user_id', $userId)
            ->where('status', 1)
            ->get()
            ->getRowArray() ?? [];

        $debtRow = $this->db->table('bf_users_debt_accounts')
            ->selectSum('monthly_payment', 'total_debt_minimum')
            ->where('user_id', $userId)
            ->where('status', 1)
            ->get()
            ->getRowArray() ?? [];

        $creditMinimum = (float) ($creditRow['total_credit_minimum'] ?? 0);
        $debtMinimum   = (float) ($debtRow['total_debt_minimum'] ?? 0);

        return [
            'credit' => $creditMinimum,
            'debt'   => $debtMinimum,
            'total'  => $creditMinimum + $debtMinimum,
        ];
    }
    
    public function getUserBudgetRecord($cuID, $accountID) {
        $builder = $this->db->table('bf_users_budgeting');
        return $builder->where('id', $accountID)
                       ->get()
                       ->getResultArray(); 
    }

    public function getUserBudgetRecords($cuID) {
        // log_message('info', 'BudgetModel - L20: ' . $cuID);
        $builder = $this->where(['status' => 1, 'created_by' => $cuID, 'deleted' => 0]);
        $result = $builder->get()->getResultArray();        
        // log_message('info', 'BudgetModel - L23: ' . print_r($result, true));
        return $result; 
    }         
    
    public function getUserRelatedBudgetRecords($cuID, $accountName) {
        return $this->where([
                    'status' => 1, 
                    'deleted' => 0, 
                    'created_by' => $cuID, 
                    'name' => $accountName
                ])
                ->findAll();
    }

    public function getUserMonthlyIncome(int $userId): float
    {
        return (float) ($this->getThisMonthsIncome($userId)['net_amount'] ?? 0);
    }

    public function getUserMonthlyExpenses(int $userId): float
    {
        return (float) ($this->getThisMonthsExpense($userId)['net_amount'] ?? 0);
    }
    // public function getUserMonthlyExpenses(int $userId): float
    // {
    //     $row = $this->selectSum('net_amount')
    //         ->where([
    //             'created_by' => $userId,
    //             'account_type' => 'Expense',
    //             'status' => 1,
    //             'month' => date('m'),
    //             'year' => date('Y'),
    //         ])
    //         ->first();

    //     return (float) ($row['net_amount'] ?? 0);
    // }

    // public function getUserMonthlyIncome(int $userId): float
    // {
    //     $row = $this->selectSum('net_amount')
    //         ->where([
    //             'created_by' => $userId,
    //             'account_type' => 'Income',
    //             'status' => 1,
    //             'month' => date('m'),
    //             'year' => date('Y'),
    //         ])
    //         ->first();

    //     return (float) ($row['net_amount'] ?? 0);
    // }
    
    public function getUtilityAccountsSummary($cuID)
    {
        return $this->select('source_type')
            ->selectSum('net_amount', 'total_utility_amount')
            ->where('created_by', $cuID)
            ->where('status', 1)
            ->like('source_type', 'Utility')
            ->findAll();
    }
    
    public function getWalletInfo($walletID) {
        $walletModel = new \App\Models\WalletModel(); // Assuming WalletModel exists and is correct
        return $walletModel->find($walletID);
    }

    /**
     * Aggregate monthly income and expense data for a user.
     */
    public function getFinancialAnalysisData(int $userId): array
    {
        $records = $this->getUserBudgetData($userId);

        $months    = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        $incomes   = array_fill(0, 12, 0);
        $expenses  = array_fill(0, 12, 0);

        foreach ($records as $row) {
            $monthIndex = date('n', strtotime($row['designated_date'])) - 1;
            if ($row['account_type'] === 'Income') {
                $incomes[$monthIndex] += $row['net_amount'];
            } elseif ($row['account_type'] === 'Expense') {
                $expenses[$monthIndex] += $row['net_amount'];
            }
        }

        $surpluses = [];
        for ($i = 0; $i < 12; $i++) {
            $surpluses[$i] = $incomes[$i] - $expenses[$i];
        }

        return [
            'months'        => $months,
            'incomes'       => $incomes,
            'expenses'      => $expenses,
            'surpluses'     => $surpluses,
            'totalIncome'   => array_sum($incomes),
            'totalExpenses' => array_sum($expenses),
            'totalSurplus'  => array_sum($surpluses),
        ];
    }
    
    public function getYTDTotals($cuID) {
        $startDate = date('Y-01-01'); // January 1st of the current year, in Y-m-d format
        $endDate = date('Y-m-d'); // Today's date, in Y-m-d format
        // log_message('info', 'BudgetModel L717 - getYTDTotals $endDate: ' . $endDate);
        $results = $this->select('name, account_type, intervals, SUM(net_amount) as ytd_total')
                        ->where('created_by', $cuID)
                        ->where('status', 1)
                        ->where('paid', 1)
                        ->where('STR_TO_DATE(designated_date, "%m/%d/%Y") >=', $startDate) // Convert designated_date format and compare
                        ->where('STR_TO_DATE(designated_date, "%m/%d/%Y") <=', $endDate) // Convert designated_date format and compare
                        ->groupBy('name')->get()->getResultArray();
        // log_message('info', 'BudgetModel L717 - getYTDTotals $results: ' . print_r($results, true));
        return $results;
    }   

    public function insertAccount($data) {
        // log_message('debug', 'BudgetModel L363 - Attempting to insert account data: ' . print_r($data, true));
    
        if ($this->insert($data)) {
            $insertID = $this->insertID();
            // log_message('info', 'Insert successful: ID ' . $insertID);
    
            // Debugging: Output the last query
            // log_message('info', 'Last Query: ' . $this->db->getLastQuery());
    
            return $insertID;
        } else {
            // log_message('error', 'Insert failed');
    
            // Debugging: Output the last query
            // log_message('info', 'Last Query on Failure: ' . $this->db->getLastQuery());
    
            return false;
        }
    }  
    
    public function insertDebtAccount($data) {
        $db = \Config\Database::connect();
        $builder = $db->table('bf_users_debt_accounts');
        log_message('info', 'Attempting to insert debt account data: ' . print_r($data, true));
        if ($builder->insert($data)) {
            $insertID = $db->insertID();
            log_message('info', 'Debt account insert successful: ID ' . $insertID);
            return $insertID;
        } else {
            log_message('error', 'Debt account insert failed');
            return false;
        }
    }
    
    public function paidAccount($accountID) {
        return $this->update($accountID, [
            'paid' => '1',
            'paid_date' => date("Y-m-d"),
            'paid_time' => date("H:i:s"),
        ]);
    }

    public function saveForecast($userId, $accountId, $forecastDate, $recurringSchedule) {
        $this->db->table('bf_users_budgeting_forecast')->insert([
            'user_id' => $userId,
            'account_id' => $accountId,
            'forecast_date' => $forecastDate,
            'recurring_schedule' => $recurringSchedule,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }    

    public function updateAccount($accountID, $data) {
        
        // log_message('debug', 'Attempting to update account. ID: ' . $accountID . ' Data: ' . print_r($data, true));
        if ($this->update($accountID, $data)) {
            // log_message('debug', 'Update successful for account ID: ' . $accountID);
            return true;
        } else {
            log_message('error', 'Update failed for account ID: ' . $accountID);
            return false;
        }
    }  

    public function updateDebtAccount($accountId, $data){
        return $this->db->table('bf_users_debt_accounts')->where('id', $accountId)->update($data);
    }    
    
    public function updateForecastEntry($userId, $forecastDate, array $data): bool
    {
        return $this->db->table('bf_users_budgeting_forecast')
            ->where('user_id', $userId)
            ->where('forecast_date', $forecastDate)
            ->update($data);
    }

    public function updateWalletBalance($walletID, $amount) {
        $walletModel = new \App\Models\WalletModel(); // Assuming WalletModel exists
        $wallet = $walletModel->find($walletID);
        if ($wallet) {
            $newBalance = $wallet['balance'] + $amount; // Assuming 'balance' is the field name in your wallet table
            $walletModel->update($walletID, ['balance' => $newBalance]);
            return true;
        }
        return false;
    }
    
    public function unpaidAccount($accountID) {
        return $this->update($accountID, ['paid' => 0]);
    }
    // public function getUserBudgetRecords($cuID) {
    //     $builder = $this->db->table('bf_users_budgeting');
    //     $result = $builder->where('created_by', $cuID)
    //                     //   ->where('status', 1)
    //                     //   ->where('deleted', 0)
    //                       ->get();
    //     log_message('info', 'BudgetModel - L26: getUserBudgetRecords($cuID): ' . print_r($result->getResult(), true));
    //     return $result;
    // }    
        
    // public function approveRecurringSchedule($accountID)
    // {
    //     // Ensure we're updating only schedules related to the specific account
    //     return $this->where('recurring_account_id', $accountID)
    //                 ->set(['status' => 1])
    //                 ->update();
    // }   
    
    // public function getIncomeAccountsSummary($cuID) {
    //     return $this->select('source_type')
    //                 ->selectSum('net_amount', 'total_expense')
    //                 ->where([
    //                     'created_by' => $cuID,
    //                     'account_type' => 'Income',
    //                     'status' => 1,
    //                 ])->first();
    // }

    // public function getDebtAccounts($cuID) {
    //     // Assuming a separate model or method for debt accounts
    //     $debtAccountsModel = new \App\Models\DebtAccountsModel();
    //     return $debtAccountsModel->selectSum('available_balance')
    //                              ->where(['user_id' => $cuID])
    //                              ->findAll();
    // }
    
    // public function getThisMonthIncomeAccountSummary($cuID) {
    //     return $this->selectSum('net_amount', 'this_month_income')
    //                 ->where([
    //                     'created_by' => $cuID,
    //                     'account_type' => 'Income',
    //                     'month' => date("m"),
    //                 ])->first();
    // }
    
    // public function getLastMonthIncomeAccountSummary($cuID) {
    //     $lastMonth = date("m", strtotime("-1 month"));
    //     return $this->selectSum('net_amount', 'last_month_income')
    //                 ->where([
    //                     'created_by' => $cuID,
    //                     'account_type' => 'Income',
    //                     'month' => $lastMonth,
    //                 ])->first();
    // }
    
    // public function getExpenseAccountSummary($cuID) {
    //     return $this->selectSum('net_amount', 'total_expense')
    //                 ->where([
    //                     'created_by' => $cuID,
    //                     'account_type' => 'Expense',
    //                 ])->first();
    // }
    
    // public function getThisMonthExpenseAccountSummary($cuID) {
    //     return $this->selectSum('net_amount', 'this_month_expense')
    //                 ->where([
    //                     'created_by' => $cuID,
    //                     'account_type' => 'Expense',
    //                     'month' => date("m"),
    //                 ])->first();
    // }
    
    // public function getLastMonthExpenseAccountSummary($cuID) {
    //     $lastMonth = date("m", strtotime("-1 month"));
    //     return $this->selectSum('net_amount', 'last_month_expense')
    //                 ->where([
    //                     'created_by' => $cuID,
    //                     'account_type' => 'Expense',
    //                     'month' => $lastMonth,
    //                 ])->first();
    // }
     
}
?>
