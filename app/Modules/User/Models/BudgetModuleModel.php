<?php 
namespace App\Modules\User\Models;

use CodeIgniter\Model;

class BudgetModuleModel extends Model {
    protected $DBGroup = 'default';
    protected $table = 'bf_users_budgeting';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField = 'created_on';
    protected $updatedField = 'modified_on';
    protected $deletedField = 'deleted_at';
    protected $allowedFields = [
        'submitted_on', 'unix_timestamp', 'trade_date', 'trade_time', 'user_type', 'user_id', 
        'username', 'email', 'trading_account', 'trade_type', 'purchase_type', 'symbol_type', 
        'exchange', 'symbol', 'company', 'link', 'current_price', 'price_target', 'position_size', 
        'remaining_position', 'total_trade_cost', 'differential', 'potential_gain', 'stop_loss_percent', 
        'stop_loss_differential', 'stop_loss', 'option_type', 'exp_day', 'exp_month', 'exp_year', 
        'expiration', 'option_price', 'strike', 'details', 'type', 'market', 'url_link', 
        'tradingview_link', 'website_link', 'status'
    ];

    public function __construct() {
        parent::__construct();
        // Additional code required for initialization
        // $this->db = $table; 
    }


    public function getBudgetData($cuID) {
        // Aggregate budget data here. This method must be implemented based on your specific needs.
        // The following is a placeholder structure to demonstrate how you might structure this method.

        $data = [
            'userBudgetRecords' => $this->getUserBudgetRecords($cuID),
            'getDailyBudgetReq' => $this->getDailyBudgetReq($cuID),
            'monthlyIncome' => $this->getThisMonthsIncome($cuID)['net_amount'] ?? 0,
            'monthlyExpense' => $this->getThisMonthsExpense($cuID)['net_amount'] ?? 0,
            'lastMonthsIncome' => $this->getLastMonthsIncome($cuID)['net_amount'] ?? 0,
            'lastMonthsExpense' => $this->getLastMonthsExpense($cuID)['net_amount'] ?? 0,
            'annualIncome' => $this->getAnnualIncome($cuID)['net_amount'] ?? 0,
            'annualExpense' => $this->getAnnualExpense($cuID)['net_amount'] ?? 0,
        ];

        return $data;
    }

    public function getUserBudgetRecords($cuID) {
        return $this->where(['created_by' => $cuID, 'status' => 1, 'deleted' => 0])->findAll();
    }

    /**
     * Get Daily Budget Requirement.
     * Sums up the amount for expenses and divides by the current number of days in the month.
     *
     * @return float Daily budget requirement to cover monthly expenses.
     */

     public function getDailyBudgetReq($cuID) {
        $currentMonth = date('m');
        $currentYear = date('Y');
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
    
        // Adjusted to use the model's built-in methods for querying
        $totalExpensesResult = $this->selectSum('net_amount')
                                    ->where([
                                        'created_by' => $cuID,
                                        'account_type' => 'Expense',
                                        'status' => 1
                                    ])
                                    ->first();
    
        $totalExpenses = $totalExpensesResult['net_amount'] ?? 0;
        $dailyBudgetReq = $totalExpenses / $daysInMonth;
        $getDailyBudgetReq = [
            'totalExpenses' => $totalExpenses ?? 0,
            'dailyBudgetReq' => $dailyBudgetReq,
        ];
    
        return $getDailyBudgetReq;
    }
    
    public function getTodaysEarnings($cuID) {
        // Define today's date in the format that matches your database records.
        $today = date('Y-m-d');
    
        // Sum the net_amount of all records for today that are marked as Income.
        $totalIncomeToday = $this->selectSum('net_amount')
                                 ->where([
                                     'created_by' => $cuID,
                                     'account_type' => 'Income',
                                     'status' => 1,
                                     // Assuming your date field is named 'submitted_date' and formatted as 'Y-m-d'.
                                     'submitted_on' => $today
                                 ])
                                 ->first();
    
        // Return the summed amount or 0 if no records are found.
        return $totalIncomeToday['net_amount'] ?? 0;
    } 
    
    public function getTodaysExpenses($cuID) {
        // Define today's date in the format that matches your database records.
        $today = date('Y-m-d');
    
        // Sum the net_amount of all records for today that are marked as Income.
        $totalIncomeToday = $this->selectSum('net_amount')
                                 ->where([
                                     'created_by' => $cuID,
                                     'account_type' => 'Expense',
                                     'status' => 1,
                                     // Assuming your date field is named 'submitted_date' and formatted as 'Y-m-d'.
                                     'submitted_on' => $today
                                 ])
                                 ->first();
    
        // Return the summed amount or 0 if no records are found.
        return $totalIncomeToday['net_amount'] ?? 0;
    }    
    
    public function getMonthlyEarnings($cuID) {
        // Define the current month and year to match against database records.
        $currentMonth = date('m');
        $currentYear = date('Y');
    
        // Sum the net_amount of all Income records for the current month.
        $totalIncomeThisMonth = $this->selectSum('net_amount')
                                     ->where([
                                         'created_by' => $cuID,
                                         'account_type' => 'Income',
                                         'status' => 1,
                                         // Assuming your date fields are separate for month and year.
                                         'month' => $currentMonth,
                                         'year' => $currentYear
                                     ])
                                     ->first();
    
        // Return the summed amount or 0 if no records are found.
        return $totalIncomeThisMonth['net_amount'] ?? 0;
    }
    
    public function getMonthlyExpenses($cuID) {
        // Define the current month and year to target the specific period.
        $currentMonth = date('m');
        $currentYear = date('Y');
    
        // Sum the net_amount of all Expense records for the current month.
        $totalExpensesThisMonth = $this->selectSum('net_amount')
                                       ->where([
                                           'created_by' => $cuID,
                                           'account_type' => 'Expense',
                                           'status' => 1,
                                           // Assuming your date fields are separate for month and year.
                                           'month' => $currentMonth,
                                           'year' => $currentYear
                                       ])
                                       ->first();
    
        // Return the summed amount or 0 if no records are found.
        return $totalExpensesThisMonth['net_amount'] ?? 0;
    }

    public function getUserBudgetRecord($cuID, $recordID)
    {
        return $this->where('id', $recordID)
                    ->where('created_by', $cuID)
                    ->findAll();
    }
    
    public function getBudgetAccountRelatedRecords($cuID, $accountName)
    {
        return $this->where([
                    'deleted' => 0,
                    'created_by' => $cuID,
                    'name' => $accountName
                ])->findAll();
    }
    
    public function getThisMonthsIncome($cuID)
    {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID,
                        'account_type' => 'Income',
                        'status' => 1,
                        'month' => date("m")
                    ])->first();
    }
    
    public function getThisMonthsExpense($cuID)
    {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID,
                        'account_type' => 'Expense',
                        'status' => 1,
                        'month' => date("m")
                    ])->first();
    }
    
    public function getLastMonthsIncome($cuID)
    {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID,
                        'account_type' => 'Income',
                        'status' => 1,
                        'month' => date("m", strtotime("-1 months"))
                    ])->first();
    }
    
    public function getLastMonthsExpense($cuID)
    {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID,
                        'account_type' => 'Expense',
                        'status' => 1,
                        'month' => date("m", strtotime("-1 months"))
                    ])->first();
    }

    public function getNextMonthsIncome($cuID)
    {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID,
                        'account_type' => 'Income',
                        'status' => 1,
                        'month' => date("m", strtotime("+1 months"))
                    ])->first();
    }

    public function getNextMonthsExpense($cuID)
    {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID,
                        'account_type' => 'Expense',
                        'status' => 1,
                        'month' => date("m", strtotime("+1 months"))
                    ])->first();
    }

    public function getAnnualIncome($cuID)
    {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID,
                        'account_type' => 'Income',
                        'status' => 1,
                        'year' => date("Y")
                    ])->first();
    }

    public function getAnnualExpense($cuID)
    {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID,
                        'account_type' => 'Expense',
                        'status' => 1,
                        'year' => date("Y")
                    ])->first();
    }

    public function getCheckingSummary($cuID)
    {
        // Assuming you have a separate model for bank accounts, use it accordingly
        $bankAccountsModel = new \App\Models\BankAccountsModel();
        return $bankAccountsModel->selectSum('balance')
                                ->where('user_id', $cuID)
                                ->first();
    }

    public function getIncomeYtdSummary($cuID)
    {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID,
                        'account_type' => 'Income',
                        'month <=' => date('m'),
                        'day <=' => date('d'),
                        'year' => date('Y')
                    ])->first();
    }

    public function getExpenseYtdSummary($cuID)
    {
        return $this->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID,
                        'account_type' => 'Expense',
                        'month <=' => date('m'),
                        'day <=' => date('d'),
                        'year' => date('Y')
                    ])->first();
    }

    public function getCreditKimitSummary($cuID)
    {
        // Assuming a separate model for credit accounts
        $creditAccountsModel = new \App\Models\CreditAccountsModel();
        return $creditAccountsModel->selectSum('credit_limit')
                                ->where([
                                    'status' => 1,
                                    'deleted' => 0,
                                    'user_id' => $cuID
                                ])->first();
    }

    public function getCreditAvailableSummary($cuID)
    {
        $creditAccountsModel = new \App\Models\CreditAccountsModel();
        return $creditAccountsModel->selectSum('available_balance')
                                ->where('user_id', $cuID)
                                ->where('status', 1)
                                ->where('deleted', 0)
                                ->first();
    }

    public function getDebtAccounts($cuID)
    {
        // Assuming a separate model for debt accounts
        $debtAccountsModel = new \App\Models\DebtAccountsModel();
        return $debtAccountsModel->select('account_type')
                                ->selectSum('available_balance')
                                ->where([
                                    'status' => 1,
                                    'deleted' => 0,
                                    'user_id' => $cuID
                                ])->groupBy('account_type')
                                ->findAll();
    }

    public function getLoanAccounts($cuID)
    {
        // Assuming loan accounts are tracked similarly to budgeting in your application
        return $this->select('account_type')
                    ->selectSum('net_amount')
                    ->where([
                        'created_by' => $cuID,
                        'status' => 1,
                        'deleted' => 0,
                        'source_type LIKE' => 'Loan'
                    ])->findAll();
    }

    public function approveRecurringAccount($accountID)
    {
        return $this->update($accountID, ['status' => 1]);
    }

    public function cancelAccount($accountID)
    {
        return $this->update($accountID, ['status' => 0, 'deleted' => 1]);
    }

    public function paidAccount($accountID)
    {
        // This method involves more complex logic, including updating wallet balances
        // You may need to interact with other models/services to handle wallet updates
        return $this->update($accountID, [
            'paid' => 1,
            'paid_date' => date("Y-m-d"),
            'paid_time' => date("H:i:s")
        ]);
    }

    public function unpaidAccount($accountID)
    {
        return $this->update($accountID, ['paid' => 0]);
    }


}
