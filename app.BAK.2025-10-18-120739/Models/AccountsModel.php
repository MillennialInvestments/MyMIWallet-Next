<?php

namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class AccountsModel extends Model
{
    protected $table = 'bf_applications';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        // Add your allowed fields here
    ];

    protected $useSoftDeletes = false;
    protected $createdField  = 'created_on';
    protected $updatedField  = 'modified_on';
    protected $deletedField  = 'deleted_on';

    protected $validationRules    = [
        'name' => 'required|alpha_space|max_length[255]',
        'email' => 'required|valid_email|max_length[255]',
        'phone' => 'required|max_length[30]',
        'message' => 'permit_empty|alpha_dash|max_length[255]',
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function insertLedger($ledgerData) {
        $builder = $this->db->table('bf_users_account_ledger');
        return $builder->insert($ledgerData);
    }

    // Dynamically fetch account information based on the account type
    public function getAccountInfo($accountID, $accountType) {
        // log_message('debug', 'AccountsModel L38 - $accountType ' . $accountType);
        // if ($accountType === 'editBankAccount') {
        
        // } elseif ($accountType === 'editCreditAccount') {
        // } elseif ($accountType === 'editDebtAccount') {
        // } elseif ($accountType === 'editDebtAccount') {
            
        // }
        $tableNameMap = [
            'editBankAccount' => 'bf_users_bank_accounts',
            'editCreditAccount' => 'bf_users_credit_accounts',
            'editDebtAccount' => 'bf_users_debt_accounts',
            'editInvestmentAccount' => 'bf_users_invest_accounts',
        ];

        $table = $tableNameMap[$accountType] ?? null;
        if (!$table) {
            log_message('error', "AccountsModel L55 - Invalid account type: $accountType");
            log_message('error', "AccountsModel L56 - Invalid tableNameMap[accountType]: $tableNameMap[$accountType]");
            return null;  // Or throw an exception as per your error handling policy
        } else {
            log_message('debug', "AccountsModel L59 - Valid account type given: $accountType");
        }

        $builder = $this->db->table($table);
        $result = $builder->where('id', $accountID)->get()->getRowArray();
        log_message('debug', 'AccountsModel L64 - $result: ' . (print_r($result, true)));
        return $result;
    }    

    // Updates bank account details
    public function editBankAccount($accountID, $data) {
        $builder = $this->db->table('bf_users_bank_accounts');
        return $builder->where('id', $accountID)->update($data);
    }

    // Updates bank account details
    public function editBankWallet($accountID, $data) {
        $builder = $this->db->table('bf_users_bank_accounts');
        return $builder->where('id', $accountID)->update($data);
    }

    // Updates credit account details
    public function editCreditAccount($accountID, $data) {
        $builder = $this->db->table('bf_users_credit_accounts');
        return $builder->where('id', $accountID)->update($data);
    }

    // Updates credit account details
    public function editCreditWallet($accountID, $data) {
        $builder = $this->db->table('bf_users_credit_accounts');
        return $builder->where('id', $accountID)->update($data);
    }

    // Updates debt account details
    public function editDebtWallet($accountID, $data) {
        $builder = $this->db->table('bf_users_debt_accounts');
        return $builder->where('id', $accountID)->update($data);
    }

    // Updates debt account details
    public function editDebtAccount($accountID, $data) {
        $builder = $this->db->table('bf_users_debt_accounts');
        return $builder->where('id', $accountID)->update($data);
    }

    // Updates investment account details
    public function editInvestmentWallet($accountID, $data) {
        $builder = $this->db->table('bf_users_invest_accounts');
        return $builder->where('id', $accountID)->update($data);
    }

    // Updates investment account details
    public function editInvestmentAccount($accountID, $data) {
        $builder = $this->db->table('bf_users_invest_accounts');
        return $builder->where('id', $accountID)->update($data);
    }


    public function getUserPlaidPublicKey($cuID)
    {
        return $this->where('created_by', $cuID)->findAll();
    }

    public function getUserAchBankAccounts($cuID)
    {
        return $this->db->table('bf_users_bank_accounts')
                        ->where('user_id', $cuID)
                        ->where('status', 1)
                        ->where('ach_enabled', 1)
                        ->get()
                        ->getResultArray();
    }

    public function getAllPercentChange($walletID)
    {
        return $this->db->table('bf_users_trades')
                        ->selectSum('closed_perc')
                        ->where('wallet', $walletID)
                        ->get()
                        ->getRowArray();
    }

    public function walletTradeGains($walletID)
    {
        return $this->db->table('bf_users_trades')
                        ->selectSum('net_gains')
                        ->where('wallet', $walletID)
                        ->get()
                        ->getRowArray();
    }

    public function generateWallet($userId, $beta, $privateKey, $publicKey)
    {
        $data = [
            'beta_wallet' => $beta,
            'private_key' => $privateKey,
            'wallet_id' => $publicKey,
        ];
        return $this->update($userId, $data);
    }

    public function getWalletTransactions($cuID)
    {
        return $this->db->table('bf_users_wallet_transactions')
                        ->where('user_id', $cuID)
                        ->where('active', 'Yes')
                        ->get()
                        ->getResultArray();
    }

    public function getTradeAlerts()
    {
        return $this->db->table('bf_investment_trade_alerts')
                        ->where('status', 'Opened')
                        ->orderBy('id', 'DESC')
                        ->get()
                        ->getResultArray();
    }

    public function getUserSingleTrades($tradeID)
    {
        return $this->db->table('bf_investment_trade_alerts')
                        ->where('id', $tradeID)
                        ->get()
                        ->getRowArray();
    }

    public function getWalletTrades($walletID)
    {
        return $this->db->table('bf_users_trades')
                        ->where('wallet', $walletID)
                        ->get()
                        ->getResultArray();
    }

    public function getWalletTradesOpenings($walletID)
    {
        return $this->db->table('bf_users_trades')
                        ->where('wallet', $walletID)
                        ->where('order_status', 'OPENING')
                        ->get()
                        ->getResultArray();
    }

    public function getWalletDeposits($cuID, $walletID = null)
    {
        $builder = $this->db->table('bf_users_wallet_transactions');
        $builder->selectSum('amount');
        $builder->where('trans_type', 'Deposit');
        
        if ($walletID !== null) {
            $builder->where('wallet_id', $walletID);
        } else {
            $builder->where('user_id', $cuID);
        }

        return $builder->get()->getRowArray();
    }

    public function getWalletWithdrawals($cuID, $walletID = null)
    {
        $builder = $this->db->table('bf_users_wallet_transactions');
        $builder->selectSum('amount');
        $builder->where('trans_type', 'Withdraw');
        
        if ($walletID !== null) {
            $builder->where('wallet_id', $walletID);
        } else {
            $builder->where('user_id', $cuID);
        }

        return $builder->get()->getRowArray();
    }

    public function getSingleWalletDeposits($walletId) {
        $builder = $this->db->table('bf_users_wallet_transactions');
        $builder->selectSum('amount');
        $builder->where('trans_type', 'Deposit');
        $builder->where('wallet_id', $walletId);
        return $builder->get()->getRowArray();
    }
    
    public function getSingleWalletWithdrawals($walletId) {
        $builder = $this->db->table('bf_users_wallet_transactions');
        $builder->selectSum('amount');
        $builder->where('trans_type', 'Withdraw');
        $builder->where('wallet_id', $walletId);
        return $builder->get()->getRowArray();
    }
    
    public function getLastWalletDeposit($cuID, $walletId) {
        $builder = $this->db->table('bf_users_wallet_transactions');
        $builder->where('trans_type', 'Deposit');
        $builder->where('wallet_id', $walletId);
        $builder->orderBy('id', 'DESC');
        $builder->limit(1);
        return $builder->get()->getRowArray();
    }
    
    public function getLastWalletWithdraw($cuID, $walletId) {
        $builder = $this->db->table('bf_users_wallet_transactions');
        $builder->where('trans_type', 'Withdraw');
        $builder->where('wallet_id', $walletId);
        $builder->orderBy('id', 'DESC');
        $builder->limit(1);
        return $builder->get()->getRowArray();
    }
    
    public function completeDeposit($transId) {
        $builder = $this->db->table('bf_users_wallet_transactions');
        $builder->set('active', 'Yes');
        $builder->where('id', $transId);
        return $builder->update();
    }
    
    public function getMyMICDeposits($cuID) {
        $builder = $this->db->table('bf_exchanges_orders');
        $builder->where('user_id', $cuID);
        $builder->orderBy('id', 'ASC');
        $builder->limit(1);
        return $builder->get()->getResultArray();
    }
    
    public function getMyMIGDeposits($cuID) {
        $builder = $this->db->table('bf_users_coin_purchases');
        $builder->where('user_id', $cuID);
        $builder->where('coin', 'MYMIG');
        $builder->limit(1);
        return $builder->get()->getResultArray();
    }
    
    public function purchaseFeature($data) {
        $builder = $this->db->table('bf_users_purchases');
        return $builder->insert($data);
    }
    
    public function addWallet($data) {
        $builder = $this->db->table('bf_users_wallet');
        return $builder->insert($data);
    }
    
    public function approveWallet($walletId) {
        $builder = $this->db->table('bf_users_wallet');
        $builder->set('active', 'Yes');
        $builder->where('id', $walletId);
        return $builder->update();
    }
    
    public function editWallet($walletId, $data) {
        $builder = $this->db->table('bf_users_wallet');
        $builder->where('id', $walletId);
        return $builder->update($data);
    }
    
    public function deleteWallet($walletId) {
        $builder = $this->db->table('bf_users_wallet');
        $builder->where('id', $walletId);
        return $builder->delete();
    }
    
    public function addFundDeposit($data) {
        $builder = $this->db->table('bf_users_wallet_transactions');
        return $builder->insert($data);
    }
    
    public function addFundWithdraw($data) {
        $builder = $this->db->table('bf_users_wallet_transactions');
        return $builder->insert($data);
    }
    
    public function connectBankAccount($data) {
        $builder = $this->db->table('bf_users_bank_accounts');
        return $builder->insert($data);
    }

    public function getCreditUtilization($userId) {
        $creditSummary = $this->db->table('bf_users_credit_accounts')
            ->selectSum('credit_limit', 'total_credit_limit')
            ->selectSum('current_balance', 'total_balance_used')
            ->where('user_id', $userId)
            ->where('status', 1)
            ->get()
            ->getRowArray();
    
        if ($creditSummary['total_credit_limit'] > 0) {
            $creditUtilization = ($creditSummary['total_balance_used'] / $creditSummary['total_credit_limit']) * 100;
        } else {
            $creditUtilization = 0;
        }
    
        return round($creditUtilization, 2); // Return percentage
    }
    
    public function getUserBankAccounts($cuID) {
        // log_message('info', 'AccountsModel L353 - $cuID: ' . $cuID); 
        $builder = $this->db->table('bf_users_bank_accounts')
                            ->where('user_id', $cuID)
                            ->where('status', 1)
                            ->get()->getResultArray();

        // log_message('info', 'AccountsModel L358 - $getUserBankAccounts: ' . print_r($builder, true)); 
        return $builder;
    }

    public function getUserCreditAccounts($cuID) {
        return $this->db->table('bf_users_credit_accounts')
            ->select('id, bank_name, nickname, account_type, account_number, current_balance, available_balance, credit_limit, payment_due, interest_rate, due_date')
            ->where('user_id', $cuID)
            ->where('status', 1)
            ->get()
            ->getResultArray();
    }

    public function getUserCreditAccountsSummary($cuID) {
        $builder = $this->db->table('bf_users_credit_accounts');
        $builder->select('status, id, wallet_id, account_type, bank_name, nickname, account_number, SUM(available_balance) as available_balance, SUM(credit_limit) as credit_limit, SUM(current_balance) as current_balance', false);
        $builder->where('user_id', $cuID);
        $builder->where('status', 1);
        $result = $builder->get()->getRowArray();
    
        // log_message('info', 'WalletsModel - getUserCreditAccountsSummary() $result: ' . print_r($result, true));
    
        // Initialize sums to 0 if not present to avoid undefined index errors
        $result['available_balance'] = $result['available_balance'] ?? 0;
        $result['credit_limit'] = $result['credit_limit'] ?? 0;
        $result['current_balance'] = $result['current_balance'] ?? 0;
    
        return $result;
    }     
    
    public function getUserCryptoAccounts($cuID) {
        $builder = $this->db->table('bf_users_crypto_accounts');
        $builder->where('user_id', $cuID);
        $builder->where('status', 1);
        return $builder->get()->getResultArray();
    }
    
    public function getUserDebtAccounts($cuID) {
        $builder = $this->db->table('bf_users_debt_accounts');
        $builder->where('user_id', $cuID);
        $builder->where('status', 1);
        return $builder->get()->getResultArray();
    }
    
    public function getUserInvestAccounts($cuID) {
        $builder = $this->db->table('bf_users_invest_accounts');
        $builder->where('user_id', $cuID);
        $builder->where('status', 1);
        return $builder->get()->getResultArray();
    }
    
    public function getAccountTransactions($accountID) {
        $builder = $this->db->table('bf_users_budgeting');
        $builder->where('wallet_id', $accountID);
        return $builder->get()->getResultArray();
    }
    
    public function getAccountingAccountInfo($accountID) {
        $builder = $this->db->table('bf_users_accounting_accounts');
        $builder->where('id', $accountID);
        return $builder->get()->getRowArray();
    }
    
    public function getActiveOptionTradeAlerts() {
        $builder = $this->db->table('bf_investment_trade_alerts');
        $builder->where('status', 'Opened');
        $builder->where('category', 'Option Trade');
        $builder->orderBy('id', 'DESC');
        $builder->limit(5);
        return $builder->get()->getResultArray();
    }
    
    public function getActiveSwingTradeAlerts() {
        $builder = $this->db->table('bf_investment_trade_alerts');
        $builder->where('status', 'Opened');
        $builder->where('category', 'Equity Trade');
        $builder->orderBy('id', 'DESC');
        $builder->limit(5);
        return $builder->get()->getResultArray();
    }
    
    public function getAllSymbols() {
        $builder = $this->db->table('bf_investment_stock_listing');
        $builder->orderBy('symbol');
        return $builder->get()->getResultArray();
    }
    
    public function getAllWallets($cuID) {
        $builder = $this->db->table('bf_users_wallet');
        $builder->where('user_id', $cuID);
        $builder->where('active', 'Yes');
        return $builder->get()->getResultArray();
    }
    
    public function getBankAccountInfo($accountID) {
        $builder = $this->db->table('bf_users_bank_accounts');
        $builder->where('id', $accountID);
        return $builder->get()->getRowArray();
    }
    
    public function getBankAccountInformation() {
        $builder = $this->db->table('bf_users_bank_accounts');
        return $builder->get()->getResultArray();
    }
    
    public function getCreditAccountInfo($accountID) {
        $builder = $this->db->table('bf_users_credit_accounts');
        $builder->where('id', $accountID);
        return $builder->get()->getRowArray();
    }
    
    public function getDebtAccountInfo($accountID) {
        $builder = $this->db->table('bf_users_debt_accounts');
        $builder->where('id', $accountID);
        return $builder->get()->getRowArray();
    }

    public function getDebtToIncomeRatio($userId) {
        $income = $this->db->table('bf_users_budgeting')
            ->selectSum('net_amount', 'total_income')
            ->where('created_by', $userId)
            ->where('account_type', 'Income')
            ->where('status', 1)
            ->get()
            ->getRowArray();
    
        $debt = $this->db->table('bf_users_debt_accounts')
            ->selectSum('current_balance', 'total_debt')
            ->where('user_id', $userId)
            ->where('status', 1)
            ->get()
            ->getRowArray();
    
        if ($income['total_income'] > 0) {
            $dti = ($debt['total_debt'] / $income['total_income']) * 100;
        } else {
            $dti = 0;
        }
    
        return round($dti, 2); // Return percentage
    }    
    
    public function getEcommerceAccountInfo($accountID) {
        $builder = $this->db->table('bf_users_ecommerce_accounts');
        $builder->where('id', $accountID);
        return $builder->get()->getRowArray();
    }
    
    public function getInactiveWallets($cuID) {
        $builder = $this->db->table('bf_users_wallet');
        $builder->where('user_id', $cuID);
        $builder->where('active', 'No');
        return $builder->get()->getResultArray();
    }    
    
    public function getInvestAccountInfo($accountID) {
        $builder = $this->db->table('bf_users_invest_accounts');
        $builder->where('id', $accountID);
        return $builder->get()->getRowArray();
    }

    public function getInvestmentAccountInfo($accountID) {
        $builder = $this->db->table('bf_users_invest_accounts');
        $builder->where('id', $accountID);
        return $builder->get()->getRowArray();
    }
    
    public function getNonDefaultWalletCount($cuID) {
        $builder = $this->db->table('bf_users_wallet');
        $builder->where('user_id', $cuID);
        $builder->where('default_wallet', 'No');
        return $builder->countAllResults();
    }
    
    public function getStockSymbols() {
        $builder = $this->db->table('bf_investment_stock_listing');
        $builder->orderBy('symbol');
        $builder->groupStart()->where('type', 'Stock')->orWhere('type', 'ETF')->groupEnd();
        return $builder->get()->getResultArray();
    }
    
    public function getSymbolInfo($symbol) {
        $builder = $this->db->table('bf_investment_stock_listing');
        $builder->where('symbol', $symbol);
        return $builder->get()->getRowArray();
    }

    public function getUserFinancialSummary($userId) {
        return [
            'credit_utilization' => $this->getCreditUtilization($userId),
            'debt_to_income' => $this->getDebtToIncomeRatio($userId),
            'total_debt' => $this->db->table('bf_users_debt_accounts')
                ->selectSum('current_balance', 'total_debt')
                ->where('user_id', $userId)
                ->where('status', 1)
                ->get()
                ->getRowArray()['total_debt'],
            'total_credit' => $this->db->table('bf_users_credit_accounts')
                ->selectSum('current_balance', 'total_credit')
                ->where('user_id', $userId)
                ->where('status', 1)
                ->get()
                ->getRowArray()['total_credit']
        ];
    }
    
    public function getWalletCount($cuID) {
        $builder = $this->db->table('bf_users_wallet');
        $builder->where('user_id', $cuID);
        $builder->where('status', 1);
        return $builder->countAllResults();
    }
    
    public function getWalletInfo($walletID) {
        $builder = $this->db->table('bf_users_wallet');
        $builder->where('id', $walletID);
        return $builder->get()->getRowArray();
    }
    
    public function getWalletTotals($cuID) {
        $builder = $this->db->table('bf_users_wallet');
        $builder->selectSum('amount');
        $builder->where('user_id', $cuID);
        $builder->where('active', 'Yes');
        return $builder->get()->getRowArray();
    }

    public function saveUserAccount($cuID, $refreshAuthCode) {
        $data = ['cuID' => $cuID, 'refresh_token' => $refreshAuthCode];
        $builder = $this->db->table('bf_users_trading_accounts');
        return $builder->insert($data);
    }    
}
?>
