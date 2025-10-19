<?php namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class MgmtBudgetModel extends Model
{
    protected $table      = 'bf_users_budgeting';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'created_by', 'created_by_date', 'unix_timestamp', 'month', 'day', 'year',
        'time', 'status', 'account_type', 'source_type', 'intervals', 'name',
        'amount', 'designated_date',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_on';
    protected $updatedField  = 'modified_on';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public $galleryPath;

    public function __construct()
    {
        parent::__construct();
        $this->galleryPath = realpath(APPPATH . '../images/');
    }

    public function addAccount($data)
    {
        return $this->insert($data);
    }

    public function getAccountInformation($accountID)
    {
        return $this->where('id', $accountID)->first();
    }

    public function getAccounts()
    {
        return $this->where('status', 1)
                    ->where('deleted', 0)
                    ->findAll();
    }

    public function getIncomeAccounts()
    {
        return $this->where('account_type', 'Income')
                    ->where('status', 1)
                    ->where('deleted', 0)
                    ->findAll();
    }

    public function getExpenseAccounts()
    {
        return $this->where('account_type', 'Expense')
                    ->where('status', 1)
                    ->where('deleted', 0)
                    ->findAll();
    }

    public function getAccountsOrderAscByDate()
    {
        return $this->where('status', 1)
                    ->where('deleted', 0)
                    ->orderBy('year', 'asc')
                    ->orderBy('month', 'asc')
                    ->orderBy('day', 'asc')
                    ->findAll();
    }

    public function getLastRecurringAccountInfo($cuID)
    {
        return $this->where('created_by', $cuID)
                    ->where('recurring_account_primary', 'Yes')
                    ->where('status', 1)
                    ->where('deleted', 0)
                    ->orderBy('id', 'DESC')
                    ->first();
    }

    public function getRecurringAccounts($accountID)
    {
        return $this->where('recurring_account_id', $accountID)
                    ->findAll();
    }

    public function approveRecurringAccount($accountID)
    {
        return $this->update($accountID, ['status' => 1]);
    }

    public function cancelAccount($accountID)
    {
        return $this->update($accountID, ['status' => 0, 'deleted' => 1]);
    }

    public function getPaidStatus($accountID)
    {
        $result = $this->select('paid')
                       ->where('id', $accountID)
                       ->first();
        return $result['paid'] ?? null;
    }

    public function paidAccount($accountID)
    {
        return $this->update($accountID, ['paid' => 1]);
    }

    public function unpaidAccount($accountID)
    {
        return $this->update($accountID, ['paid' => 0]);
    }

    // Summarize Income Accounts
    public function getIncomeAccountSummary($cuID) {
        return $this->selectSum('net_amount')
                    ->where([
                        'status' => 1,
                        'deleted' => 0,
                        'created_by' => $cuID,
                        'account_type' => 'Income'
                    ])
                    ->first();
    }

    // Summarize Income for the Current Month
    public function getThisMonthIncomeAccountSummary($cuID) {
        $thisMonth = date("m");
        return $this->selectSum('net_amount')
                    ->where([
                        'status' => 1,
                        'deleted' => 0,
                        'created_by' => $cuID,
                        'account_type' => 'Income',
                        'month' => $thisMonth
                    ])
                    ->first();
    }

    // Summarize Income for the Last Month
    public function getLastMonthIncomeAccountSummary($cuID) {
        $lastMonth = date("m", strtotime("-1 month"));
        return $this->selectSum('net_amount')
                    ->where([
                        'status' => 1,
                        'deleted' => 0,
                        'created_by' => $cuID,
                        'account_type' => 'Income',
                        'month' => $lastMonth
                    ])
                    ->first();
    }

    // Summarize Expense Accounts
    public function getExpenseAccountSummary($cuID) {
        return $this->selectSum('net_amount')
                    ->where([
                        'status' => 1,
                        'deleted' => 0,
                        'created_by' => $cuID,
                        'account_type' => 'Expense'
                    ])
                    ->first();
    }

    // Summarize Expenses for the Current Month
    public function getThisMonthExpenseAccountSummary($cuID) {
        $thisMonth = date("m");
        return $this->selectSum('net_amount')
                    ->where([
                        'status' => 1,
                        'deleted' => 0,
                        'created_by' => $cuID,
                        'account_type' => 'Expense',
                        'month' => $thisMonth
                    ])
                    ->first();
    }

    // Summarize Expenses for the Last Month
    public function getLastMonthExpenseAccountSummary($cuID) {
        $lastMonth = date("m", strtotime("-1 month"));
        return $this->selectSum('net_amount')
                    ->where([
                        'status' => 1,
                        'deleted' => 0,
                        'created_by' => $cuID,
                        'account_type' => 'Expense',
                        'month' => $lastMonth
                    ])
                    ->first();
    }

    // Summarize Debt Accounts
    public function getDebtAccounts($cuID) {
        return $this->selectSum('net_amount')
                    ->where([
                        'status' => 1,
                        'deleted' => 0,
                        'created_by' => $cuID,
                        'is_debt' => 1
                    ])
                    ->first();
    }

    // Get the First Budget Account
    public function getFirstBudgetAccount($cuID) {
        return $this->where([
                        'created_by' => $cuID,
                        'status' => 1
                    ])
                    ->orderBy('id', 'ASC')
                    ->first();
    }

    // More methods...
}
