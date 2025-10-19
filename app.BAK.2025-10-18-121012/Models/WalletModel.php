<?php
namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class WalletModel extends Model
{
    protected $table            = 'bf_users_wallet';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'status', 'active', 'beta',
        'user_id', 'user_email', 'username',
        'wallet_type',
        // Bank fields
        'bank_name', 'account_type', 'account_number', 'routing_number', 'balance', 'nickname',
        // Investment fields
        'broker', 'investment_type', 'investment_amount', 'investment_date', 'symbol', 'net_worth', 'available_funds',
        // Crypto fields
        'exchange', 'network', 'address',
        // Meta fields
        'id','status','active','unix_timestamp','submitted_date','month','day','year','time','trans_type',
        'currency','wallet_id','bank_account','broker','nickname','user_id','user_email','type','deposit_date',
        'withdraw_date','amount','initial_amount','current_amount','fees','total_cost','created_on','modified_on',
        'deleted_on', 'provider','credentials','category','label'
    ];
    protected $useTimestamps   = false;

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;

    protected $createdField = 'created_on';
    protected $updatedField = 'modified_on';
    protected $deletedField = 'deleted_on';

    // --- Core wallet ops -----------------------------------------------------

    public function addTokensToWallet($walletId, $amount)
    {
        return $this->db->table($this->table)
            ->set('amount', "amount + {$amount}", false)
            ->where('id', $walletId)
            ->update();
    }

    public function deductFunds($walletId, $amount)
    {
        return $this->db->table($this->table)
            ->set('amount', "amount - {$amount}", false)
            ->where('id', $walletId)
            ->update();
    }

    public function deleteWallet($walletId)
    {
        $data = ['active' => 0, 'deleted' => 1];
        return $this->db->table('bf_users_wallet')->where('id', $walletId)->update($data);
    }

    public function submitMyMIGold($data)
    {
        return $this->db->table('bf_users_wallet_transactions')->insert($data);
    }

    public function validateUserTransaction($cuID, $trans_id)
    {
        $builder = $this->db->table('bf_users_wallet_transactions');
        $builder->where('user_id', $cuID);
        $builder->where('transaction_id', $trans_id);
        $result = $builder->get()->getRowArray();
        return !empty($result) && $result['user_id'] === $cuID;
    }

    public function attachWalletToBudgetRecord($recordID, $walletID)
    {
        return $this->db->table('bf_users_budgeting')
            ->set('wallet_id', $walletID)
            ->where('id', $recordID)
            ->update();
    }

    public function getAllTransactions($cuID)
    {
        $builder = $this->db->table('bf_users_wallet_transactions');
        $builder->where('user_id', $cuID);
        $builder->where('active', 'Yes');
        return $builder->get()->getResultArray();
    }

    // --- Summaries / listings -----------------------------------------------

    public function getBankAccountsSummary($cuID)
    {
        $builder = $this->db->table('bf_users_bank_accounts');
        $builder->selectSum('balance');
        $builder->where('user_id', $cuID);
        $builder->where('status', 1);
        return $builder->get()->getRowArray();
    }

    public function getCreditAccountsSummary($cuID)
    {
        $builder = $this->db->table('bf_users_credit_accounts');
        $builder->selectSum('available_balance');
        $builder->where('user_id', $cuID);
        $builder->where('status', 1);
        $builder->where('deleted', 0);
        return $builder->get()->getRowArray();
    }

    public function getCheckingWallets($cuID)
    {
        return $this->db->table('bf_users_bank_accounts')
            ->where('account_type', 'Checking')
            ->where('status', 1)
            ->where('deleted', 0)
            ->where('user_id', $cuID)
            ->get()->getResultArray();
    }

    public function getCheckingWalletsSummary($cuID)
    {
        return $this->db->table('bf_users_wallet')
            ->selectSum('amount')
            ->where('wallet_type', 'Bank')
            ->where('status', 1)
            ->where('active', 1)
            ->where('user_id', $cuID)
            ->get()->getRowArray();
    }

    public function getTransactionSummaryByWallet($walletID)
    {
        $builder = $this->db->table('bf_users_wallet_transactions');
        $builder->select('trans_type, SUM(amount) as total_amount');
        $builder->where('wallet_id', $walletID);
        $builder->where('active', 'Yes');
        $builder->groupBy('trans_type');
        $result = $builder->get()->getResultArray();
        return !empty($result) ? $result : [['trans_type' => 'None', 'total_amount' => 0.00]];
    }

    public function getUserDefaultWallet($cuID)
    {
        $builder = $this->db->table('bf_users_wallet');
        $builder->where('user_id', $cuID);
        $builder->where('default_wallet', 'Yes');
        $result = $builder->get()->getRowArray();
        return $result ?: null;
    }

    public function generateWallet($userId, $beta, $privateKey, $publicKey)
    {
        return $this->db->table('users')
            ->set('beta_wallet', $beta)
            ->set('private_key', $privateKey)
            ->set('wallet_id', $publicKey)
            ->where('id', $userId)
            ->update();
    }

    public function addFundDeposit($data)
    {
        return $this->db->table('bf_users_wallet_transactions')->insert($data);
    }

    public function addWallet($data)
    {
        $data['active'] = isset($data['active']) && $data['active'] === 'Yes' ? 1 : 0;
        return $this->db->table('bf_users_wallet')->insert($data);
    }

    public function editGeneralWalletInfo($walletId, $formData)
    {
        $data = [
            'nickname'       => $formData['nickname'] ?? null,
            'amount'         => isset($formData['current_balance']) ? $formData['current_balance'] : (isset($formData['amount']) ? $formData['amount'] : null),
            'user_id'        => $formData['user_id'],
            'user_email'     => $formData['user_email'],
            'username'       => $formData['username'],
            'account_id'     => $formData['account_id'],
            'wallet_type'    => $formData['wallet_type'],
            'status'         => 1,
            'active'         => 'Yes',
            'beta'           => $formData['beta'],
            'default_wallet' => 0,
            'exchange_wallet'=> 0,
            'premium_wallet' => 0,
            'ach_enabled'    => 0,
            'broker'         => $formData['bank_name'] ?? $formData['debtor'] ?? null,
        ];
        $data = array_filter($data, static fn($v) => !is_null($v));
        return $this->editWallet($walletId, $data);
    }

    public function editWallet($walletId, $data)
    {
        if (isset($data['active'])) {
            $data['active'] = ($data['active'] === 'Yes' || $data['active'] === 1) ? 1 : 0;
        }
        return $this->db->table('bf_users_wallet')->where('id', $walletId)->update($data);
    }

    // --- Bank / Credit / Debt / Invest tables --------------------------------

    public function addBankWallet($data)
    {
        return $this->db->table('bf_users_bank_accounts')->insert($data);
    }

    public function editBankWallet($walletId, $data)
    {
        log_message('debug', 'WalletModel editBankWallet - $walletId: '.$walletId.' $data: '.print_r($data, true));
        return $this->db->table('bf_users_bank_accounts')
            ->groupStart()->where('id', (int)$walletId)->orWhere('wallet_id', (int)$walletId)->groupEnd()
            ->update($data);
    }

    public function deleteBankWallet($walletId)
    {
        $data = ['status' => 0, 'deleted' => 1];
        return $this->db->table('bf_users_bank_accounts')->where('id', $walletId)->update($data);
    }

    public function addCreditWallet($data)
    {
        return $this->db->table('bf_users_credit_accounts')->insert($data);
    }

    public function editCreditWallet($walletId, $data)
    {
        return $this->db->table('bf_users_credit_accounts')
            ->groupStart()->where('id', (int)$walletId)->orWhere('wallet_id', (int)$walletId)->groupEnd()
            ->update($data);
    }

    public function deleteCreditWallet($walletId)
    {
        $data = ['status' => 0, 'deleted' => 1];
        return $this->db->table('bf_users_credit_accounts')->where('id', $walletId)->update($data);
    }

    public function addCryptoWallet($data)
    {
        return $this->db->table('bf_users_credit_accounts')->insert($data);
    }

    public function editCryptoWallet($walletId, $data)
    {
        return $this->db->table('bf_users_crypto_accounts')
            ->groupStart()->where('id', (int)$walletId)->orWhere('wallet_id', (int)$walletId)->groupEnd()
            ->update($data);
    }

    public function deleteCryptoWallet($walletId)
    {
        $data = ['status' => 0, 'deleted' => 1];
        return $this->db->table('bf_users_credit_accounts')->where('id', $walletId)->update($data);
    }

    public function addDebtWallet($data)
    {
        log_message('info', 'WalletModel addDebtWallet - $data: '.print_r($data, true));
        return $this->db->table('bf_users_debt_accounts')->insert($data);
    }

    public function editDebtWallet($walletId, $data)
    {
        try {
            $result = $this->db->table('bf_users_debt_accounts')
                ->groupStart()->where('id', (int)$walletId)->orWhere('wallet_id', (int)$walletId)->groupEnd()
                ->update($data);
            if (!$result) {
                $error = $this->db->error();
                log_message('error', "Database update failed for debt wallet ID {$walletId}. Error: {$error['message']}");
                return false;
            }
            log_message('debug', "Debt wallet updated successfully for ID {$walletId}.");
            return true;
        } catch (\Exception $e) {
            log_message('error', "Exception in editDebtWallet for ID {$walletId}: {$e->getMessage()}");
            return false;
        }
    }

    public function deleteDebtWallet($walletId)
    {
        $data = ['status' => 0, 'deleted' => 1];
        return $this->db->table('bf_users_debt_accounts')->where('id', $walletId)->update($data);
    }

    public function addInvestmentWallet($data)
    {
        return $this->db->table('bf_users_invest_accounts')->insert($data);
    }

    public function editInvestmentWallet($walletId, $data)
    {
        return $this->db->table('bf_users_invest_accounts')
            ->groupStart()->where('id', (int)$walletId)->orWhere('wallet_id', (int)$walletId)->groupEnd()
            ->update($data);
    }

    public function deleteInvestmentWallet($walletId)
    {
        $data = ['status' => 0, 'deleted' => 1];
        return $this->db->table('bf_users_invest_accounts')->where('id', $walletId)->update($data);
    }

    // --- Sums / lookups ------------------------------------------------------

    public function getWalletDeposits($cuID, $walletID = null)
    {
        $builder = $this->db->table('bf_users_wallet_transactions')->selectSum('amount');
        if ($walletID !== null) {
            $builder->where('wallet_id', $walletID);
        } else {
            $builder->where('user_id', $cuID);
        }
        $builder->where('trans_type', 'Deposit');
        $result = $builder->get()->getRowArray();
        return $result ?? ['amount' => '0.00'];
    }

    public function getWalletWithdrawals($cuID, $walletID = null)
    {
        $builder = $this->db->table('bf_users_wallet_transactions')->selectSum('amount');
        if ($walletID !== null) {
            $builder->where('wallet_id', $walletID);
        } else {
            $builder->where('user_id', $cuID);
        }
        $builder->where('trans_type', 'Withdraw');
        $result = $builder->get()->getRowArray();
        return $result ?? ['amount' => '0.00'];
    }

    public function getSingleWalletDeposits($walletId)
    {
        return $this->db->table('bf_users_wallet_transactions')
            ->selectSum('amount')
            ->where('trans_type', 'Deposit')
            ->where('wallet_id', $walletId)
            ->get()->getRowArray();
    }

    public function getSingleWalletWithdrawals($walletId)
    {
        return $this->db->table('bf_users_wallet_transactions')
            ->selectSum('amount')
            ->where('trans_type', 'Withdraw')
            ->where('wallet_id', $walletId)
            ->get()->getRowArray();
    }

    public function getLastWalletDeposit($cuID, $walletId)
    {
        return $this->db->table('bf_users_wallet_transactions')
            ->where('trans_type', 'Deposit')
            ->where('wallet_id', $walletId)
            ->orderBy('id', 'DESC')->limit(1)
            ->get()->getRowArray();
    }

    public function getLastWalletWithdraw($cuID, $walletId)
    {
        return $this->db->table('bf_users_wallet_transactions')
            ->where('trans_type', 'Withdraw')
            ->where('wallet_id', $walletId)
            ->orderBy('id', 'DESC')->limit(1)
            ->get()->getRowArray();
    }

    public function completeDeposit($transId)
    {
        return $this->db->table('bf_users_wallet_transactions')
            ->set('active', 'Yes')
            ->where('id', $transId)
            ->update();
    }

    public function getMyMICDeposits($cuID)
    {
        return $this->db->table('bf_exchanges_orders')
            ->where('user_id', $cuID)
            ->orderBy('id', 'ASC')->limit(1)
            ->get()->getResultArray();
    }

    public function getMyMIGDeposits($cuID)
    {
        return $this->db->table('bf_users_coin_purchases')
            ->where('user_id', $cuID)
            ->where('coin', 'MYMIG')
            ->limit(1)
            ->get()->getResultArray();
    }

    public function purchaseFeature($data)
    {
        return $this->db->table('bf_users_purchases')->insert($data);
    }

    public function approveWallet($walletId)
    {
        return $this->db->table('bf_users_wallet')
            ->set('active', 'Yes')
            ->where('id', $walletId)
            ->update();
    }

    public function connectBankAccount($data)
    {
        return $this->db->table('bf_users_bank_accounts')->insert($data);
    }

    public function saveUserAccount($cuID, $refreshAuthCode)
    {
        $data = ['cuID' => $cuID, 'refresh_token' => $refreshAuthCode];
        return $this->db->table('bf_users_trading_accounts')->insert($data);
    }

    public function getUserBankAccounts($cuID)
    {
        return $this->db->table('bf_users_bank_accounts')
            ->where('user_id', $cuID)
            ->where('status', 1)
            ->get()->getResultArray();
    }

    public function getBankAccountInfo($accountID)
    {
        return $this->db->table('bf_users_bank_accounts')
            ->where('id', $accountID)
            ->get()->getRowArray();
    }

    public function getBankAccountInformation()
    {
        return $this->db->table('bf_users_bank_accounts')->get()->getResultArray();
    }

    public function getWalletCount($cuID)
    {
        return $this->db->table('bf_users_wallet')
            ->where('user_id', $cuID)
            ->where('status', 1)
            ->countAllResults();
    }

    public function getActiveSwingTradeAlerts($type)
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('status', 'Opened')
            ->where('category', 'Equity Trade')
            ->orderBy('id', 'DESC')->limit(5)
            ->get()->getResultArray();
    }

    public function getActiveOptionTradeAlerts($type)
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('status', 'Opened')
            ->where('category', 'Option Trade')
            ->orderBy('id', 'DESC')->limit(5)
            ->get()->getResultArray();
    }

    public function getAllSymbols()
    {
        return $this->db->table('bf_investment_stock_listing')
            ->orderBy('symbol')
            ->get()->getResultArray();
    }

    public function getAllWallets($cuID)
    {
        return $this->db->table('bf_users_wallet')
            ->where('user_id', $cuID)
            ->where('active', 1)
            ->get()->getResultArray();
    }

    public function getDebtAccountsSummary($cuID)
    {
        return $this->db->table('bf_users_debt_accounts')
            ->selectSum('current_balance', 'amount')
            ->where('user_id', $cuID)
            ->where('status', 1)
            ->where('deleted', 0)
            ->get()->getRowArray();
    }

    public function getDigitalWallets($cuID, $limit)
    {
        return $this->db->table('bf_users_wallet')
            ->where('user_id', $cuID)
            ->where('active', 1)
            ->where('wallet_type', 'Digital')
            ->where('default_wallet', 'No')
            ->orderBy('id', 'ASC')->limit($limit)
            ->get()->getResultArray();
    }

    public function getDigitalWalletTotalCount($cuID)
    {
        return $this->db->table('bf_users_wallet')
            ->where('user_id', $cuID)
            ->where('active', 1)
            ->where('wallet_type', 'Digital')
            ->countAllResults();
    }

    public function getFiatWallets($cuID, $limit)
    {
        return $this->db->table('bf_users_wallet')
            ->where('user_id', $cuID)
            ->where('active', 1)
            ->where('wallet_type', 'Fiat')
            ->where('default_wallet', 'No')
            ->orderBy('id', 'ASC')->limit($limit)
            ->get()->getResultArray();
    }

    public function getFiatWalletTotalCount($cuID)
    {
        return $this->db->table('bf_users_wallet')
            ->where('user_id', $cuID)
            ->where('active', 1)
            ->where('wallet_type', 'Fiat')
            ->countAllResults();
    }

    public function getInactiveWallets($cuID)
    {
        return $this->db->table('bf_users_wallet')
            ->where('user_id', $cuID)
            ->where('active', 'No')
            ->get()->getResultArray();
    }

    public function getLoanAccountsSummary($cuID)
    {
        return $this->db->table('bf_users_loan_accounts')
            ->selectSum('current_balance', 'amount')
            ->where('user_id', $cuID)
            ->where('status', 1)
            ->where('deleted', 0)
            ->get()->getRowArray();
    }

    public function getNonDefaultWalletCount($cuID)
    {
        return $this->db->table('bf_users_wallet')
            ->where('user_id', $cuID)
            ->where('default_wallet', 'No')
            ->countAllResults();
    }

    public function getNonDefaultWalletTotals($cuID)
    {
        return $this->db->table('bf_users_wallet')
            ->selectSum('amount')
            ->where('user_id', $cuID)
            ->where('active', 1)
            ->where('default_wallet !=', 'Yes')
            ->get()->getRowArray();
    }

    public function getSavingsAccountsSummary($cuID)
    {
        $builder = $this->db->table('bf_users_bank_accounts');
        $builder->selectSum('balance');
        $builder->where('user_id', $cuID);
        $builder->where('status', 1);
        $builder->where('deleted', 0);
        $builder->where('account_type', 'Savings');
        $result = $builder->get()->getRowArray();
        return $result ?? ['balance' => '0.00'];
    }

    public function getStockSymbols()
    {
        return $this->db->table('bf_investment_stock_listing')
            ->orderBy('symbol')
            ->groupStart()->where('type', 'Stock')->orWhere('type', 'ETF')->groupEnd()
            ->get()->getResultArray();
    }

    public function getSymbolInfo($symbol)
    {
        return $this->db->table('bf_investment_stock_listing')
            ->where('symbol', $symbol)
            ->get()->getRowArray();
    }

    public function getUserCryptoWallets($cuID)
    {
        return $this->db->table('bf_users_crypto_accounts')
            ->where('user_id', $cuID)
            ->where('status', 1)
            ->get()->getResultArray();
    }

    public function getUserInvestWallets($cuID)
    {
        return $this->db->table('bf_users_invest_accounts')
            ->where('user_id', $cuID)
            ->where('status', 1)
            ->get()->getResultArray();
    }

    public function getUtilityAccountsSummary($cuID)
    {
        return $this->db->table('bf_users_budgeting')
            ->select('source_type')
            ->selectSum('net_amount', 'total_utility_amount')
            ->where('created_by', $cuID)
            ->where('status', 1)
            ->like('source_type', 'Utility')
            ->get()->getResultArray();
    }

    public function getWalletInfo($walletID)
    {
        return $this->db->table('bf_users_wallet')->where('id', $walletID)->get()->getResultArray();
    }

    public function getWalletInitialSummary($walletID)
    {
        return $this->db->table('bf_users_wallet')->selectSum('amount')->where('id', $walletID)->get()->getRowArray();
    }

    public function getWalletTotals($cuID)
    {
        return $this->db->table('bf_users_wallet')->selectSum('amount')->where('user_id', $cuID)->where('active', 1)->get()->getRowArray();
    }

    /**
     * Insert into bf_users_wallet and return the new wallet ID.
     */
    public function addWalletReturnId(array $data): int
    {
        // normalize active like your addWallet()
        if (isset($data['active'])) {
            $data['active'] = ($data['active'] === 'Yes' || $data['active'] === 1) ? 1 : 0;
        }
        $this->db->table('bf_users_wallet')->insert($data);
        return (int) $this->db->insertID();
    }

    /**
     * Insert into bf_users_bank_accounts and return the new account ID.
     */
    public function addBankWalletReturnId(array $data): int
    {
        $this->db->table('bf_users_bank_accounts')->insert($data);
        return (int) $this->db->insertID();
    }

    /**
     * Ensure deleted=0 wallets don’t show in the list.
     * (Leave your existing filters; just add deleted=0.)
     */
    public function listByUser(int $userId, ?string $category = null): array
    {
        $db = db_connect();
        $b  = $db->table($this->table)
                 ->where('user_id', $userId)
                 ->where('deleted', 0); // <— hide soft-deleted rows

        $normMap = [
            'financial'  => ['Banking', 'Fiat'],
            'bank'       => ['Banking', 'Fiat'],
            'credit'     => ['Credit'],
            'debt'       => ['Debt'],
            'crypto'     => ['Crypto'],
            'investment' => ['Investment', 'Brokerage'],
        ];

        if (!empty($category)) {
            log_message('info', 'Listing wallets for user {u} category={c}', ['u' => $userId, 'c' => $category]);
            $norm = is_array($category) ? array_map('strtolower', $category) : [strtolower($category)];
            $want = [];
            foreach ($norm as $c) {
                $want = array_merge($want, $normMap[$c] ?? [ucfirst($c)]);
            }
            $want = array_values(array_unique($want));

            if (count($want) === 1) {
                $b->where('wallet_type', $want[0]);
            } else {
                $b->whereIn('wallet_type', $want);
            }

            // Your original code keeps this:
            $b->where('status', 1);
        }

        $b->orderBy('created_on', 'DESC')->orderBy('id', 'DESC');
        $rows = $b->get()->getResultArray();

        foreach ($rows as &$r) {
            if (isset($r['credentials']) && is_string($r['credentials'])) {
                $dec = json_decode($r['credentials'], true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $r['credentials'] = $dec;
                }
            }
        }
        return $rows;
    }

    public function logAuditTrail($userId, $walletId, $action, $details)
    {
        $auditData = [
            'user_id'   => $userId,
            'wallet_id' => $walletId,
            'action'    => $action,
            'details'   => json_encode($details),
            'created_at'=> date('Y-m-d H:i:s'),
        ];
        $result = $this->db->table('bf_users_audit_log')->insert($auditData);
        if (!$result) {
            log_message('error', "Failed to insert audit log for Wallet ID: {$walletId}, Action: {$action}");
            return false;
        }
        return true;
    }

    public function transferTokens($walletId, $amount)
    {
        $this->db->table('bf_token_transfers')->insert([
            'wallet_id'    => $walletId,
            'amount'       => $amount,
            'transfer_date'=> date('Y-m-d H:i:s')
        ]);
    }

    public function upsertProviderWallet(int $userId, string $provider, string $label, array $credentials = []): int
    {
        $provider = strtolower($provider);
        $builder  = $this->db->table($this->table);
        $exists = $builder->where('user_id', $userId)
            ->where('provider', $provider)
            ->where('category', 'investment')
            ->get()->getRowArray();

        $payload = [
            'user_id'    => $userId,
            'category'   => 'investment',
            'provider'   => $provider,
            'label'      => $label ?: ucfirst($provider),
            'status'     => 'linked',
            'credentials'=> json_encode($credentials, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE),
            'updated_on' => date('Y-m-d H:i:s'),
        ];

        if ($exists) {
            $builder->where('id', $exists['id'])->update($payload);
            return (int) $exists['id'];
        }

        $payload['created_on'] = date('Y-m-d H:i:s');
        $builder->insert($payload);
        return (int) $this->db->insertID();
    }

    public function createWallet(
        int $userId,
        string $category,
        string $provider,
        ?string $label,
        string $status='linked',
        array $credentials=[]
    ): int {
        $category = strtolower($category);
        $provider = strtolower($provider);
        $db = db_connect();
        $b  = $db->table($this->table);

        $exists = $b->select('id')
            ->where('user_id', $userId)
            ->where('provider', $provider)
            ->where('category', $category)
            ->get()->getRowArray();

        $payload = [
            'user_id'    => $userId,
            'category'   => $category,
            'provider'   => $provider,
            'label'      => $label ?: ucfirst($provider),
            'status'     => $status ?: 'linked',
            'credentials'=> json_encode($credentials, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE),
            'updated_on' => date('Y-m-d H:i:s'),
        ];

        if ($exists) {
            $db->table($this->table)->where('id', $exists['id'])->update($payload);
            return (int) $exists['id'];
        }

        $payload['created_on'] = date('Y-m-d H:i:s');
        $db->table($this->table)->insert($payload);
        return (int) $db->insertID();
    }

    public function updateWallet(int $userId, int $walletId, ?string $label=null, ?string $status=null, ?array $credentials=null): int
    {
        $db  = db_connect();
        $set = ['updated_on' => date('Y-m-d H:i:s')];
        if ($label !== null)       $set['label'] = $label;
        if ($status !== null)      $set['status'] = $status;
        if ($credentials !== null) $set['credentials'] = json_encode($credentials, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        if (count($set) === 1) return 0;

        $db->table($this->table)->where('id', $walletId)->where('user_id', $userId)->update($set);
        return $db->affectedRows();
    }

    public function unlinkWallet(int $userId, int $walletId): int
    {
        $db = db_connect();
        $db->table($this->table)
            ->where('id', $walletId)
            ->where('user_id', $userId)
            ->update(['status'=>'unlinked','updated_on'=>date('Y-m-d H:i:s')]);
        return $db->affectedRows();
    }

    public function getProvidersByCategory(?string $category=null): array
    {
        $db = db_connect();
        if ($db->tableExists('bf_wallet_providers')) {
            $b = $db->table('bf_wallet_providers')->where('enabled', 1)->orderBy('sort_order', 'ASC');
            if ($category) { $b->where("FIND_IN_SET(?, categories) > 0", strtolower($category)); }
            return $b->get()->getResultArray();
        }

        // fallback seed
        $rows = [
            ['key'=>'plaid','name'=>'Plaid','icon'=>'ni ni-globe','cta'=>'Connect Bank','categories'=>'financial,credit,debt'],
            ['key'=>'metamask','name'=>'MetaMask','icon'=>'ni ni-wallet-fill','cta'=>'Connect MetaMask','categories'=>'crypto'],
            ['key'=>'phantom','name'=>'Phantom','icon'=>'ni ni-wallet','cta'=>'Connect Phantom','categories'=>'crypto'],
            ['key'=>'robinhood','name'=>'Robinhood','icon'=>'ni ni-trend-up','cta'=>'Connect Robinhood','categories'=>'investment'],
            ['key'=>'snaptrade','name'=>'SnapTrade','icon'=>'ni ni-activity','cta'=>'Connect SnapTrade','categories'=>'investment'],
            ['key'=>'manual','name'=>'Manual','icon'=>'ni ni-edit','cta'=>'Add Manual Wallet','categories'=>'financial,credit,debt,crypto,investment'],
        ];

        if (!$category) return $rows;
        $category = strtolower($category);
        return array_values(array_filter($rows, static function($r) use ($category) {
            return in_array($category, explode(',', $r['categories']), true);
        }));
    }

    public function getUserWallets(int $userId, bool $onlyActive=false): array
    {
        // Don’t ever query “all” on empty/guest
        if ($userId <= 0) {
            return [];
        }
        $b = $this->db->table($this->table)->where('user_id', $userId);
        if ($onlyActive) {
            $b->groupStart()
                ->whereIn('status', ['linked', 'active', 'Active', 1, '1'])
                ->orWhereIn('active', [1, '1', 'Yes'])
            ->groupEnd();
        }
        return $b->orderBy('created_on','DESC')->get()->getResultArray();
    }

    public function getUserWalletsByCategory(int $userId, string $category, bool $onlyActive=false): array
    {
        $b = $this->db->table($this->table)
            ->where('user_id', $userId)
            ->where('category', strtolower($category));
        if ($onlyActive) $b->where('status','linked');
        return $b->orderBy('created_on','DESC')->get()->getResultArray();
    }

    /**
     * Map a bf_users_wallet row to a normalized type & subsidiary table/endpoints.
     * Returns: ['type' => bank|credit|debt|investment|crypto, 'table' => string, 'endpoint' => string]
     */
    public function mapWalletRow(array $w): ?array
    {
        $category   = strtolower((string)($w['category'] ?? ''));
        $walletType = strtolower((string)($w['wallet_type'] ?? ''));

        $type = null;
        if (
            in_array($category, ['financial','bank','banking','fiat'], true)
            || in_array($walletType, ['bank','banking','fiat'], true)
        ) {
            $type = 'bank';
        } elseif (in_array($category, ['credit'], true) || $walletType === 'credit') {
            $type = 'credit';
        } elseif (in_array($category, ['debt','loan'], true) || $walletType === 'debt') {
            $type = 'debt';
        } elseif (
            in_array($category, ['investment','brokerage'], true)
            || in_array($walletType, ['investment','brokerage'], true)
        ) {
            $type = 'investment';
        } elseif (in_array($category, ['crypto','cryptocurrency'], true) || $walletType === 'crypto') {
            $type = 'crypto';
        }

        if (!$type) { return null; }

        $tableMap = [
            'bank'       => ['table' => 'bf_users_bank_accounts',  'endpoint' => 'editBankAccount'],
            'credit'     => ['table' => 'bf_users_credit_accounts','endpoint' => 'editCreditAccount'],
            'debt'       => ['table' => 'bf_users_debt_accounts',  'endpoint' => 'editDebtAccount'],
            'investment' => ['table' => 'bf_users_invest_accounts','endpoint' => 'editInvestAccount'],
            'crypto'     => ['table' => 'bf_users_crypto_accounts','endpoint' => 'editCryptoAccount'],
        ];

        $m = $tableMap[$type];
        return ['type' => $type, 'table' => $m['table'], 'endpoint' => $m['endpoint']];
    }

    /**
     * Return the column-name map for a table (name => true).
     */
    private function getColumns(string $table): array
    {
        try {
            $names = $this->db->getFieldNames($table) ?: [];
            return array_fill_keys($names, true);
        } catch (\Throwable $e) {
            // Fallback for drivers not supporting getFieldNames
            $list = array_map(fn($f) => $f->name, $this->db->getFieldData($table));
            return array_fill_keys($list ?: [], true);
        }
    }

    /**
     * Find subsidiary record for a wallet row.
     * Looks by wallet_id; if wallet.account_id exists, tries id == account_id,
     * and also account_id column if that column exists in the target table.
     *
     * Returns: ['row' => ?array, 'table' => string, 'type' => string, 'endpoint' => string]
     */
    public function findSubsidiaryForWallet(array $wallet): array
    {
        $map = $this->mapWalletRow($wallet);
        if (!$map) {
            return ['row' => null, 'table' => '', 'type' => '', 'endpoint' => ''];
        }
        $table = $map['table'];
        $cols  = $this->getColumns($table);

        $b = $this->db->table($table);
        $b->groupStart()->where('wallet_id', (int)($wallet['id'] ?? 0));
        if (!empty($wallet['account_id'])) {
            $b->orWhere('id', (int)$wallet['account_id']);
            if (isset($cols['account_id'])) {
                $b->orWhere('account_id', (int)$wallet['account_id']);
            }
        }
        $b->groupEnd();

        $row = $b->get()->getRowArray();

        return [
            'row'      => $row ?: null,
            'table'    => $table,
            'type'     => $map['type'],
            'endpoint' => $map['endpoint'],
        ];
    }

    /**
     * Insert a minimal child (subsidiary) row so modal editors can resolve it.
     * Returns the inserted child id.
     */
    public function createSubsidiaryStub(string $type, array $wallet): int
    {
        $map = $this->mapWalletRow($wallet);
        if (!$map) { return 0; }
        $table = $map['table'];
        $cols  = $this->getColumns($table);
        $now   = date('Y-m-d H:i:s');

        // Common baseline
        $payload = [
            'user_id'    => (int)($wallet['user_id'] ?? 0),
            'wallet_id'  => (int)($wallet['id'] ?? 0),
            'nickname'   => $wallet['nickname'] ?? ($wallet['label'] ?? null),
            'status'     => 1,
            'deleted'    => 0,
            'created_on' => $now,
        ];

        // Type-specific hints (added only if columns exist)
        switch ($type) {
            case 'bank':
                if (isset($cols['bank_name']))    $payload['bank_name'] = $wallet['broker'] ?? ($wallet['bank_name'] ?? null);
                if (isset($cols['account_type'])) $payload['account_type'] = $wallet['account_type'] ?? null; // leave null if unknown
                if (isset($cols['balance']) && isset($wallet['amount'])) $payload['balance'] = $wallet['amount'];
                break;

            case 'credit':
                if (isset($cols['bank_name'])) $payload['bank_name'] = $wallet['broker'] ?? null;
                if (isset($cols['nickname']) && empty($payload['nickname'])) $payload['nickname'] = $wallet['nickname'] ?? null;
                break;

            case 'debt':
                if (isset($cols['debtor']))  $payload['debtor'] = $wallet['broker'] ?? null;
                if (isset($cols['nickname']) && empty($payload['nickname'])) $payload['nickname'] = $wallet['nickname'] ?? null;
                break;

            case 'investment':
                if (isset($cols['broker']))  $payload['broker'] = $wallet['broker'] ?? null;
                if (isset($cols['amount']) && isset($wallet['amount'])) $payload['amount'] = $wallet['amount'];
                break;

            case 'crypto':
                if (isset($cols['nickname']) && empty($payload['nickname'])) $payload['nickname'] = $wallet['nickname'] ?? null;
                break;
        }

        // Only keep fields the table actually has
        $payload = array_intersect_key($payload, $cols);

        $this->db->table($table)->insert($payload);
        return (int) $this->db->insertID();
    }

    /**
     * Ensure the subsidiary row is linked to its wallet_id.
     */
    public function ensureSubsidiaryLink(string $table, int $subId, int $walletId): bool
    {
        $cols = $this->getColumns($table);
        if (!isset($cols['wallet_id'])) return true;

        $row = $this->db->table($table)->select('wallet_id')->where('id', $subId)->get()->getRowArray();
        if (!$row) return false;

        if ((int)($row['wallet_id'] ?? 0) === (int)$walletId) return true;

        $set = ['wallet_id' => (int)$walletId];
        if (isset($cols['updated_on'])) {
            $set['updated_on'] = date('Y-m-d H:i:s');
        }
        return (bool)$this->db->table($table)->where('id', $subId)->update($set);
    }

    /**
     * Identify important/missing fields per account type.
     */
    public function requiredMissingForType(string $type, array $row, string $table): array
    {
        $cols = $this->getColumns($table);

        $req = [];
        switch ($type) {
            case 'bank':
                $req = ['bank_name','account_type','account_number','nickname'];
                break;
            case 'credit':
                $req = ['bank_name','account_number','credit_limit','current_balance','available_balance','nickname'];
                break;
            case 'debt':
                $req = ['debtor','account_number','current_balance','monthly_payment','interest_rate','nickname'];
                break;
            case 'investment':
                $req = ['broker','account_number','nickname'];
                break;
            case 'crypto':
                $req = ['nickname'];
                if (isset($cols['coin_address'])) $req[] = 'coin_address';
                break;
        }

        $missing = [];
        foreach ($req as $f) {
            if (!isset($cols[$f])) continue; // ignore fields that don't exist on this table
            $v = $row[$f] ?? null;
            if ($v === null || $v === '' || (is_string($v) && trim($v) === '')) {
                $missing[] = $f;
            }
        }
        return $missing;
    }

    /**
     * Map wallet_type/category to a subsidiary table key.
     * Banking/Fiat => bank, Credit => credit, Debt => debt, Investment/Brokerage => investment, Crypto => crypto
     */
    public function mapWalletRowToSubsidiary(array $w): ?string
    {
        $type  = strtolower($w['wallet_type'] ?? '');
        $cat   = strtolower($w['category'] ?? '');

        if (in_array($type, ['banking','fiat'], true) || in_array($cat, ['financial','bank'], true)) return 'bank';
        if ($type === 'credit' || $cat === 'credit') return 'credit';
        if ($type === 'debt'   || $cat === 'debt')   return 'debt';
        if (in_array($type, ['investment','brokerage'], true) || $cat === 'investment') return 'investment';
        if ($type === 'crypto' || $cat === 'crypto') return 'crypto';
        return null;
    }

    /** Return real table name by subsidiary key. */
    public function tableFor(string $sub): string
    {
        return [
            'bank'        => 'bf_users_bank_accounts',
            'credit'      => 'bf_users_credit_accounts',
            'debt'        => 'bf_users_debt_accounts',
            'investment'  => 'bf_users_invest_accounts',
            'crypto'      => 'bf_users_crypto_accounts',
        ][$sub] ?? '';
    }

    /** Generic fetch subsidiary by wallet_id (preferred) or by its own primary id. */
    public function getSubsidiaryByWalletOrId(string $sub, int $id): ?array
    {
        $table = $this->tableFor($sub);
        if (!$table) return null;

        // First try with wallet_id = $id
        $row = $this->db->table($table)
                        ->where('wallet_id', $id)
                        ->get()->getRowArray();

        if ($row) return $row;

        // Then try its own PK id = $id
        return $this->db->table($table)
                        ->where('id', $id)
                        ->get()->getRowArray() ?: null;
    }

    /** Create a minimal subsidiary row from the parent wallet row. Returns the new subsidiary row. */
    public function createSubsidiaryFromWallet(string $sub, array $walletRow): ?array
    {
        $table = $this->tableFor($sub);
        if (!$table) return null;

        $seed = [
            'wallet_id'   => (int)$walletRow['id'],
            'user_id'     => (int)$walletRow['user_id'],
            'user_email'  => $walletRow['user_email'] ?? null,
            'nickname'    => $walletRow['nickname']   ?? null,
            'status'      => 1,
            'deleted'     => 0,
        ];

        // Best-effort mapping of fields per subsidiary type
        switch ($sub) {
            case 'bank':
                $seed += [
                    'bank_name'        => $walletRow['broker'] ?? $walletRow['label'] ?? $walletRow['nickname'] ?? 'Unknown',
                    'account_type'     => 'Checking',
                    'account_number'   => null,
                    'balance'          => $walletRow['amount'] ?? 0,
                    'bank_account_owner'=> 'Yes',
                ];
                break;

            case 'credit':
                $seed += [
                    'bank_name'        => $walletRow['broker'] ?? $walletRow['label'] ?? 'Unknown',
                    'account_number'   => null,
                    'credit_limit'     => 0,
                    'current_balance'  => 0,
                    'available_balance'=> 0,
                    'credit_status'    => 'Open',
                ];
                break;

            case 'debt':
                $seed += [
                    'debtor'           => $walletRow['broker'] ?? $walletRow['label'] ?? 'Unknown',
                    'account_number'   => null,
                    'current_balance'  => 0,
                ];
                break;

            case 'investment':
                $seed += [
                    'broker'           => $walletRow['broker'] ?? $walletRow['label'] ?? 'Unknown',
                    'account_number'   => null,
                    'amount'           => $walletRow['amount'] ?? 0,
                    'initial_value'    => $walletRow['initial_amount'] ?? 0,
                    'available_funds'  => null,
                    'net_worth'        => null,
                ];
                break;

            case 'crypto':
                $seed += [
                    'exchange'         => $walletRow['provider'] ?? $walletRow['broker'] ?? 'Unknown',
                    'coin_address'     => null,
                    'nickname'         => $walletRow['nickname'] ?? null,
                ];
                break;
        }

        $this->db->table($table)->insert($seed);
        $newId = (int)$this->db->insertID();

        return $this->db->table($table)->where('id', $newId)->get()->getRowArray() ?: null;
    }

    /** Get wallet (parent) row by id. */
    public function getWalletById(int $walletId): ?array
    {
        return $this->db->table('bf_users_wallet')->where('id', $walletId)->get()->getRowArray() ?: null;
    }

    /**
     * Reconcile all active bf_users_wallet rows:
     *  - ensures a matching subsidiary row exists (by wallet_id),
     *  - returns a report of created rows and rows with missing critical fields.
     */
    public function reconcileAll(): array
    {
        $created = [];
        $issues  = []; // items missing critical fields

        $wallets = $this->db->table('bf_users_wallet')
            ->where('status', 1)
            ->get()->getResultArray();

        foreach ($wallets as $w) {
            $sub = $this->mapWalletRowToSubsidiary($w);
            if (!$sub) continue;

            $existing = $this->db->table($this->tableFor($sub))
                ->where('wallet_id', (int)$w['id'])
                ->get()->getRowArray();

            if (!$existing) {
                $row = $this->createSubsidiaryFromWallet($sub, $w);
                if ($row) {
                    $created[] = ['wallet_id' => (int)$w['id'], 'subsidiary' => $sub, 'id' => (int)$row['id']];
                    $existing  = $row;
                }
            }

            if ($existing) {
                // flag obvious required-field gaps (tune as you like)
                switch ($sub) {
                    case 'bank':
                        $need = [];
                        if (empty($existing['bank_name']))      $need[] = 'bank_name';
                        if (empty($existing['account_type']))   $need[] = 'account_type';
                        if (!isset($existing['account_number']))$need[] = 'account_number';
                        if (!isset($existing['balance']))       $need[] = 'balance';
                        if (empty($existing['nickname']))       $need[] = 'nickname';
                        if ($need) $issues[] = ['wallet_id'=>(int)$w['id'],'subsidiary'=>'bank','id'=>(int)$existing['id'],'missing'=>$need,'user_id'=>(int)$w['user_id']];
                        break;

                    case 'credit':
                        $need = [];
                        if (empty($existing['bank_name']))           $need[] = 'bank_name';
                        if (!isset($existing['credit_limit']))       $need[] = 'credit_limit';
                        if (!isset($existing['current_balance']))    $need[] = 'current_balance';
                        if (!isset($existing['available_balance']))  $need[] = 'available_balance';
                        if (empty($existing['nickname']))            $need[] = 'nickname';
                        if ($need) $issues[] = ['wallet_id'=>(int)$w['id'],'subsidiary'=>'credit','id'=>(int)$existing['id'],'missing'=>$need,'user_id'=>(int)$w['user_id']];
                        break;

                    case 'debt':
                        $need = [];
                        if (empty($existing['debtor']))              $need[] = 'debtor';
                        if (!isset($existing['current_balance']))    $need[] = 'current_balance';
                        if ($need) $issues[] = ['wallet_id'=>(int)$w['id'],'subsidiary'=>'debt','id'=>(int)$existing['id'],'missing'=>$need,'user_id'=>(int)$w['user_id']];
                        break;

                    case 'investment':
                        $need = [];
                        if (empty($existing['broker']))              $need[] = 'broker';
                        if (!isset($existing['amount']))             $need[] = 'amount';
                        if ($need) $issues[] = ['wallet_id'=>(int)$w['id'],'subsidiary'=>'investment','id'=>(int)$existing['id'],'missing'=>$need,'user_id'=>(int)$w['user_id']];
                        break;

                    case 'crypto':
                        $need = [];
                        if (empty($existing['exchange']))            $need[] = 'exchange';
                        if (!isset($existing['coin_address']))       $need[] = 'coin_address';
                        if ($need) $issues[] = ['wallet_id'=>(int)$w['id'],'subsidiary'=>'crypto','id'=>(int)$existing['id'],'missing'=>$need,'user_id'=>(int)$w['user_id']];
                        break;
                }
            }
        }

        return ['created' => $created, 'issues' => $issues];
    }

    // === Your existing helpers (kept) for "id or wallet_id" lookups ===
    // =========================
    // LOOKUPS BY id OR wallet_id
    // =========================
    public function getBankAccountByIdOrWallet(int $id): ?array
    {
        return $this->db->table('bf_users_bank_accounts')
            ->groupStart()->where('id', $id)->orWhere('wallet_id', $id)->groupEnd()
            ->get()->getRowArray() ?: null;
    }

    public function getCreditAccountByIdOrWallet(int $id): ?array
    {
        return $this->db->table('bf_users_credit_accounts')
            ->groupStart()->where('id', $id)->orWhere('wallet_id', $id)->groupEnd()
            ->get()->getRowArray() ?: null;
    }

    public function getDebtAccountByIdOrWallet(int $id): ?array
    {
        return $this->db->table('bf_users_debt_accounts')
            ->groupStart()->where('id', $id)->orWhere('wallet_id', $id)->groupEnd()
            ->get()->getRowArray() ?: null;
    }

    public function getInvestAccountByIdOrWallet(int $id): ?array
    {
        return $this->db->table('bf_users_invest_accounts')
            ->groupStart()->where('id', $id)->orWhere('wallet_id', $id)->groupEnd()
            ->get()->getRowArray() ?: null;
    }

    public function getCryptoAccountByIdOrWallet(int $id): ?array
    {
        return $this->db->table('bf_users_crypto_accounts')
            ->groupStart()->where('id', $id)->orWhere('wallet_id', $id)->groupEnd()
            ->get()->getRowArray() ?: null;
    }

    // ========================================
    // SHIM: choose subsidiary table from type
    // ========================================
    /**
     * Resolve which sub-table to use for an "edit*" endpoint and return
     * a hydrated row, plus a couple of meta fields used by the view.
     *
     * Returns:
     *   array row with keys from the sub-table (bank/credit/debt/invest),
     *   and the extra fields:
     *     __pageView  => UserModule\Views\Wallets\Edit_Account\*
     *     __title     => modal title
     *     __endpoint  => original endpoint (e.g. editBankAccount)
     *
     * If not found in subsidiary, it will try bf_users_wallet and synthesize
     * a minimal row so the form can still render.
     */
    public function findAccountRowForEdit(string $endpoint, int $id, int $userId): ?array
    {
        $endpoint = strtolower($endpoint);

        // Map endpoint => [type, pageView, title]
        $meta = $this->resolveEditMeta($endpoint);
        if (!$meta) {
            log_message('error', 'WalletModel::findAccountRowForEdit - unknown endpoint: ' . $endpoint);
            return null;
        }

        [$type, $pageView, $title] = $meta;

        // 1) Try subsidiary table by id or wallet_id
        $row = null;
        switch ($type) {
            case 'bank':
                $row = $this->getBankAccountByIdOrWallet($id);
                break;
            case 'credit':
                $row = $this->getCreditAccountByIdOrWallet($id);
                break;
            case 'debt':
                $row = $this->getDebtAccountByIdOrWallet($id);
                break;
            case 'invest':
                $row = $this->getInvestAccountByIdOrWallet($id);
                break;
        }

        // Validate ownership if present
        if ($row && isset($row['user_id']) && (int)$row['user_id'] !== (int)$userId) {
            log_message('error', 'WalletModel::findAccountRowForEdit - user mismatch for endpoint=' . $endpoint . ' id=' . $id);
            $row = null;
        }

        // 2) Fallback: synthesize from bf_users_wallet if subsidiary not found
        if (!$row) {
            $wr = $this->db->table('bf_users_wallet')
                ->where('id', $id)
                ->get()->getRowArray();

            if ($wr && (int)$wr['user_id'] === (int)$userId) {
                // Build a minimal row for each type so views can render
                $row = $this->synthesizeFromWalletRow($type, $wr);
            }
        }

        if (!$row) {
            return null;
        }

        // attach meta used by the caller/view
        $row['__pageView'] = $pageView;
        $row['__title']    = $title;
        $row['__endpoint'] = $endpoint;

        return $row;
    }

    /**
     * Map lowercased endpoint to [type, view, title]
     */
    private function resolveEditMeta(string $endpoint): ?array
    {
        // normalize common forms
        // expected incoming like: editbankaccount, editcreditaccount, etc.
        $map = [
            'editbankaccount'   => ['bank',   'UserModule\Views\Wallets\Edit_Account\banking_fields',    'Edit Bank Account'],
            'editcreditaccount' => ['credit', 'UserModule\Views\Wallets\Edit_Account\credit_fields',     'Edit Credit Account'],
            'editdebtaccount'   => ['debt',   'UserModule\Views\Wallets\Edit_Account\debt_fields',       'Edit Debt Account'],
            'editinvestaccount' => ['invest', 'UserModule\Views\Wallets\Edit_Account\investment_fields', 'Edit Investment Account'],
        ];

        // Also allow "editBankAccount" with original casing
        $key = strtolower($endpoint);
        return $map[$key] ?? null;
    }

    /**
     * Build a minimal subsidiary-like row from the main bf_users_wallet row.
     * Ensures keys exist so the partials can render. Values are conservative.
     */
    private function synthesizeFromWalletRow(string $type, array $wr): array
    {
        $nickname = $wr['nickname'] ?? '';
        $amount   = $wr['amount']   ?? 0;
        $userId   = (int)($wr['user_id'] ?? 0);

        switch ($type) {
            case 'bank':
                return [
                    'user_id'            => $userId,
                    'bank_name'          => $wr['broker'] ?? '',
                    'account_type'       => 'Checking',
                    'bank_account_owner' => 'Yes',
                    'routing_number'     => $wr['routing_numbers'] ?? '',
                    'account_number'     => $wr['account_number']  ?? '',
                    'nickname'           => $nickname,
                    'balance'            => $amount,
                    'wallet_id'          => (int)($wr['id'] ?? 0),
                ];
            case 'credit':
                return [
                    'user_id'           => $userId,
                    'bank_name'         => $wr['broker'] ?? '',
                    'account_number'    => $wr['account_number'] ?? '',
                    'nickname'          => $nickname,
                    'credit_limit'      => $wr['credit_limit'] ?? 0,
                    'current_balance'   => $wr['current_amount'] ?? ($wr['amount'] ?? 0),
                    'available_balance' => 0,
                    'credit_status'     => 'Open',
                    'due_date'          => null,
                    'payment_due'       => 0,
                    'interest_rate'     => 0,
                    'wallet_id'         => (int)($wr['id'] ?? 0),
                ];
            case 'debt':
                return [
                    'user_id'          => $userId,
                    'account_status'   => 'Open',
                    'account_type'     => 'Loan',
                    'debtor'           => $wr['broker'] ?? '',
                    'nickname'         => $nickname,
                    'account_number'   => $wr['account_number'] ?? '',
                    'due_date'         => null,
                    'credit_limit'     => 0,
                    'current_balance'  => $wr['current_amount'] ?? ($wr['amount'] ?? 0),
                    'available_balance'=> 0,
                    'monthly_payment'  => 0,
                    'interest_rate'    => 0,
                    'wallet_id'        => (int)($wr['id'] ?? 0),
                ];
            case 'invest':
                return [
                    'user_id'         => $userId,
                    'nickname'        => $nickname,
                    'broker'          => $wr['broker'] ?? '',
                    'account_number'  => $wr['account_number'] ?? '',
                    'amount'          => $wr['amount'] ?? 0,
                    'initial_value'   => $wr['initial_amount'] ?? 0,
                    'available_funds' => 0,
                    'net_worth'       => 0,
                    'wallet_id'       => (int)($wr['id'] ?? 0),
                ];
        }

        return [];
    }

    /**
     * Small safe getter + string cast so form helpers never receive non-strings.
     */
    public function sval($arr, string $key, $fallback = ''): string
    {
        if (!is_array($arr)) return (string) $fallback;
        $v = $arr[$key] ?? $fallback;
        // avoid arrays/objects leaking into form fields
        if (is_array($v) || is_object($v)) return '';
        return (string) $v;
    }

    private function toStr($v): string
    {
        return ($v === null) ? '' : (string) $v;
    }

    // ==========================================
    // Build the field payload your Edit.php uses
    // ==========================================
    public function buildEditFieldData(string $endpoint, array $row, array $ctx): array
    {
        $endpoint = strtolower($endpoint);

        $errorClass   = $this->toStr($ctx['errorClass']   ?? ' error');
        $controlClass = $this->toStr($ctx['controlClass'] ?? 'span6');
        $cuID         = (int)($ctx['cuID'] ?? 0);
        $cuEmail      = $this->toStr($ctx['cuEmail'] ?? '');
        $cuUsername   = $this->toStr($ctx['cuUsername'] ?? '');
        $accountID    = (int)($ctx['accountID'] ?? 0);
        $beta         = (int)($ctx['beta'] ?? 0);
        $walletId     = (int)($row['wallet_id'] ?? $accountID);

        // Common defaults (all strings!)
        $field = [
            'errorClass'       => $errorClass,
            'controlClass'     => $controlClass,
            'redirectURL'      => $this->toStr(site_url('/Wallets')),
            'cuID'             => $this->toStr($cuID),
            'cuEmail'          => $cuEmail,
            'accountBeta'      => $this->toStr($beta),
            'accountID'        => $this->toStr($accountID),
            'accountWalletID'  => $this->toStr($walletId),
            'accountUserID'    => $this->toStr($cuID),
            'accountUserEmail' => $cuEmail,
            'accountUsername'  => $cuUsername,
        ];

        if (str_starts_with($endpoint, 'editbank')) {
            $field['accountType']        = 'editBankAccount';
            $field['accountTypeText']    = 'Bank Account';
            $field['accountBank']        = $this->toStr($row['bank_name'] ?? '');
            $field['accountOwner']       = $this->toStr($row['bank_account_owner'] ?? '');
            $field['accountRouting']     = $this->toStr($row['routing_number'] ?? '');
            $field['accountNumber']      = $this->toStr($row['account_number'] ?? '');
            $field['accountName']        = $this->toStr($row['nickname'] ?? '');
            $field['accountNickname']    = $this->toStr($row['nickname'] ?? '');
            $field['accountBalance']     = $this->toStr($row['balance'] ?? '');
        } elseif (str_starts_with($endpoint, 'editcredit')) {
            $field['accountType']            = 'editCreditAccount';
            $field['accountTypeText']        = 'Credit Account';
            $field['accountBank']            = $this->toStr($row['bank_name'] ?? '');
            $field['accountNumber']          = $this->toStr($row['account_number'] ?? '');
            $field['accountName']            = $this->toStr($row['nickname'] ?? '');
            $field['accountNickname']        = $this->toStr($row['nickname'] ?? '');
            $field['accountCreditLimit']     = $this->toStr($row['credit_limit'] ?? '');
            $field['accountCurrentBalance']  = $this->toStr($row['current_balance'] ?? '');
            $field['accountAvailableBalance']= $this->toStr($row['available_balance'] ?? '');
            $field['accountCreditStatus']    = $this->toStr($row['credit_status'] ?? '');
            $field['accountDueDate']         = $this->toStr($row['due_date'] ?? '');
            $field['accountPaymentDue']      = $this->toStr($row['payment_due'] ?? '');
            $field['accountInterestRate']    = $this->toStr($row['interest_rate'] ?? '');
        } elseif (str_starts_with($endpoint, 'editdebt')) {
            $field['accountType']            = 'editDebtAccount';
            $field['accountTypeText']        = 'Debt Account';
            $field['accountStatus']          = $this->toStr($row['account_status'] ?? '');
            $field['accountSourceType']      = $this->toStr($row['account_type'] ?? '');
            $field['accountDebtor']          = $this->toStr($row['debtor'] ?? '');
            $field['accountName']            = $this->toStr($row['nickname'] ?? '');
            $field['accountNickname']        = $this->toStr($row['nickname'] ?? '');
            $field['accountNumber']          = $this->toStr($row['account_number'] ?? '');
            $field['accountDueDate']         = $this->toStr($row['due_date'] ?? '');
            $field['accountCreditLimit']     = $this->toStr($row['credit_limit'] ?? '');
            $field['accountCurrentBalance']  = $this->toStr($row['current_balance'] ?? '');
            $field['accountAvailableBalance']= $this->toStr($row['available_balance'] ?? '');
            $field['accountMonthlyPayment']  = $this->toStr($row['monthly_payment'] ?? '');
            $field['accountInterestRate']    = $this->toStr($row['interest_rate'] ?? '');
        } elseif (str_starts_with($endpoint, 'editinvest')) {
            $field['accountType']            = 'editInvestAccount';
            $field['accountTypeText']        = 'Investment Account';
            $field['accountName']            = $this->toStr($row['nickname'] ?? '');
            $field['accountNickname']        = $this->toStr($row['nickname'] ?? '');
            $field['accountBroker']          = $this->toStr($row['broker'] ?? '');
            $field['accountNumber']          = $this->toStr($row['account_number'] ?? '');
            $field['accountAmount']          = $this->toStr($row['amount'] ?? '');
            $field['accountInitialValue']    = $this->toStr($row['initial_value'] ?? '');
            $field['accountAvailableFunds']  = $this->toStr($row['available_funds'] ?? '');
            $field['accountNetWorth']        = $this->toStr($row['net_worth'] ?? '');
        } elseif (str_starts_with($endpoint, 'editcrypto')) {
            $field['accountType']            = 'editCryptoAccount';
            $field['accountTypeText']        = 'Crypto Account';
            $field['accountName']            = $this->toStr($row['nickname'] ?? '');
            $field['accountNickname']        = $this->toStr($row['nickname'] ?? '');
            $field['accountNumber']          = $this->toStr($row['account_number'] ?? '');
            // add other crypto fields as needed; ensure toStr()
        }

        return $field;
    }

    // ==========================================
    // RECONCILIATION HELPERS (model-centric)
    // ==========================================
    /**
     * Map a wallet row (bf_users_wallet) to a subsidiary table + a normalized type.
     * Returns ['table' => 'bf_users_bank_accounts', 'type' => 'bank'] or null.
     */
    public function mapWalletCategoryToTable(array $wallet): ?array
    {
        $category   = strtolower($wallet['category'] ?? '');
        $walletType = strtolower($wallet['wallet_type'] ?? '');

        // normalize
        if (in_array($walletType, ['banking','fiat'], true) || in_array($category, ['financial','bank'], true)) {
            return ['table' => 'bf_users_bank_accounts', 'type' => 'bank'];
        }
        if (in_array($walletType, ['credit'], true) || $category === 'credit') {
            return ['table' => 'bf_users_credit_accounts', 'type' => 'credit'];
        }
        if (in_array($walletType, ['debt'], true) || $category === 'debt') {
            return ['table' => 'bf_users_debt_accounts', 'type' => 'debt'];
        }
        if (in_array($walletType, ['investment','brokerage'], true) || $category === 'investment') {
            return ['table' => 'bf_users_invest_accounts', 'type' => 'investment'];
        }
        if (in_array($walletType, ['crypto'], true) || $category === 'crypto') {
            return ['table' => 'bf_users_crypto_accounts', 'type' => 'crypto'];
        }
        return null;
    }

    /**
     * Ensure a subsidiary row exists for a given wallet row. If missing, create.
     * Returns the subsidiary row (fresh from DB) and a flag 'created' bool.
     */
    public function ensureSubsidiaryForWallet(array $wallet): array
    {
        $map = $this->mapWalletCategoryToTable($wallet);
        if (!$map) return ['row' => null, 'created' => false, 'table' => null];

        $table = $map['table'];
        $wid   = (int)$wallet['id'];

        $existing = $this->db->table($table)->where('wallet_id', $wid)->get()->getRowArray();
        if ($existing) {
            return ['row' => $existing, 'created' => false, 'table' => $table];
        }

        // Build a minimal insert payload using wallet fields
        $insert = [
            'wallet_id'   => $wid,
            'user_id'     => (int)($wallet['user_id'] ?? 0),
            'user_email'  => $wallet['user_email'] ?? null,
            'username'    => $wallet['username'] ?? null,
            'nickname'    => $wallet['nickname'] ?? null,
            'status'      => 1,
            'deleted'     => 0,
            'created_on'  => date('Y-m-d H:i:s'),
        ];
        // add table-specific defaults if present
        if ($table === 'bf_users_bank_accounts') {
            $insert['account_type'] = $wallet['wallet_type'] ?? 'Checking'; // default guess
            $insert['balance']      = $wallet['amount'] ?? 0;
        } elseif ($table === 'bf_users_credit_accounts') {
            $insert['current_balance'] = $wallet['amount'] ?? 0;
            $insert['available_balance'] = 0;
        } elseif ($table === 'bf_users_debt_accounts') {
            $insert['current_balance'] = $wallet['amount'] ?? 0;
            $insert['account_type']    = 'Loan';
        } elseif ($table === 'bf_users_invest_accounts') {
            $insert['amount']          = $wallet['amount'] ?? 0;
            $insert['broker']          = $wallet['broker'] ?? null;
        } elseif ($table === 'bf_users_crypto_accounts') {
            $insert['amount']          = $wallet['amount'] ?? 0;
            $insert['crypto_type']     = $wallet['provider'] ?? null;
        }

        $this->db->table($table)->insert($insert);
        $created = $this->db->affectedRows() > 0;

        $fresh = $this->db->table($table)->where('wallet_id', $wid)->get()->getRowArray();
        return ['row' => $fresh, 'created' => $created, 'table' => $table];
    }

    /**
     * Rows considered "incomplete" for a quick admin report.
     */
    public function isSubsidiaryRowIncomplete(string $table, array $row): bool
    {
        // tweak this as you see fit; these are "important" fields per table
        if ($table === 'bf_users_bank_accounts') {
            return empty($row['bank_name']) || empty($row['account_type']) || empty($row['nickname']);
        }
        if ($table === 'bf_users_credit_accounts') {
            return empty($row['nickname']) || !isset($row['current_balance']);
        }
        if ($table === 'bf_users_debt_accounts') {
            return empty($row['nickname']) || !isset($row['current_balance']);
        }
        if ($table === 'bf_users_invest_accounts') {
            return empty($row['nickname']);
        }
        if ($table === 'bf_users_crypto_accounts') {
            return empty($row['nickname']);
        }
        return false;
    }

    /**
     * Reconcile all bf_users_wallet rows into respective subsidiary tables.
     * Returns an array report with created, exists, incomplete, and errors.
     */
    public function reconcileWallets(): array
    {
        $report = [
            'created'   => [],
            'existing'  => [],
            'incomplete'=> [],
            'errors'    => [],
        ];

        $wallets = $this->db->table('bf_users_wallet')->get()->getResultArray();
        foreach ($wallets as $w) {
            $map = $this->mapWalletCategoryToTable($w);
            if (!$map) {
                $report['errors'][] = [
                    'wallet_id' => $w['id'],
                    'user_id'   => $w['user_id'] ?? null,
                    'reason'    => 'Unrecognized wallet type/category',
                ];
                continue;
            }

            try {
                $res = $this->ensureSubsidiaryForWallet($w);
                if (!$res['row']) {
                    $report['errors'][] = [
                        'wallet_id' => $w['id'],
                        'user_id'   => $w['user_id'] ?? null,
                        'reason'    => 'Failed to create/load subsidiary row',
                    ];
                    continue;
                }

                $row = $res['row'];
                $row['__table'] = $res['table'];

                if ($res['created']) {
                    $report['created'][] = $row;
                } else {
                    $report['existing'][] = $row;
                }

                if ($this->isSubsidiaryRowIncomplete($res['table'], $row)) {
                    $report['incomplete'][] = $row;
                }
            } catch (\Throwable $e) {
                $report['errors'][] = [
                    'wallet_id' => $w['id'],
                    'user_id'   => $w['user_id'] ?? null,
                    'reason'    => $e->getMessage(),
                ];
            }
        }

        return $report;
    }

    /** Subsidiary table name per type */
    private function subsidiaryTableForType(string $type): string
    {
        return match (strtolower($type)) {
            'bank'   => 'bf_users_bank_accounts',
            'credit' => 'bf_users_credit_accounts',
            'debt'   => 'bf_users_debt_accounts',
            'invest' => 'bf_users_invest_accounts',
            default  => throw new \InvalidArgumentException("Unknown type: {$type}"),
        };
    }

    /**
     * Keep only columns that safely exist per subsidiary table.
     * This avoids "unknown column" errors from stray payload keys.
     */
    private function filterSubsidiaryColumns(string $type, array $data): array
    {
        $t = strtolower($type);

        // Whitelists are conservative on purpose; add more keys if your tables have them.
        $allow = match ($t) {
            'bank' => [
                'status','active','beta','user_id','user_email','username','updated_on',
                'bank_name','account_type','bank_account_owner','routing_number','account_number',
                'balance','nickname','wallet_id','deleted',
            ],
            'credit' => [
                'status','active','beta','user_id','user_email','username','updated_on',
                'bank_name','account_number','nickname','credit_limit','current_balance',
                'available_balance','credit_status','due_date','payment_due','interest_rate',
                'wallet_id','deleted',
            ],
            'debt' => [
                'status','active','beta','user_id','user_email','username','updated_on',
                'account_status','account_type','debtor','nickname','account_number','due_date',
                'credit_limit','current_balance','available_balance','monthly_payment','interest_rate',
                'wallet_id','deleted',
            ],
            'invest' => [
                'status','active','beta','user_id','user_email','username','updated_on',
                'broker','nickname','account_number','amount','initial_value','available_funds',
                'net_worth','wallet_id','deleted',
            ],
            default => [],
        };

        $out = [];
        foreach ($allow as $k) {
            if (array_key_exists($k, $data)) {
                $out[$k] = $data[$k];
            }
        }
        return $out;
    }

    /**
     * Minimal, safe mapping from form payload to bf_users_wallet fields.
     * We update only what’s commonly present and safe:
     *  - nickname
     *  - amount  (for bank = balance; for credit/debt we leave amount alone unless provided)
     *  - broker  (for bank use bank_name; for debt use debtor; for invest use broker)
     */
    private function mapWalletPatchFromType(string $type, array $data): array
    {
        $t = strtolower($type);
        $patch = [];

        // nickname commonly exists across forms
        if (isset($data['nickname'])) {
            $patch['nickname'] = $data['nickname'];
        }

        switch ($t) {
            case 'bank':
                // main wallet.amount mirrors bank balance
                if (isset($data['balance'])) {
                    $patch['amount'] = $data['balance'];
                }
                if (isset($data['bank_name'])) {
                    $patch['broker'] = $data['bank_name'];
                }
                break;

            case 'credit':
                // usually amount in main wallet is a *positive* asset; for cards you may not want to mirror liabilities.
                // If your UI intends amount=current_balance (negative), uncomment:
                // if (isset($data['current_balance'])) $patch['amount'] = 0 - abs((float)$data['current_balance']);
                if (isset($data['bank_name'])) $patch['broker'] = $data['bank_name'];
                break;

            case 'debt':
                // mirror debtor as broker label
                if (isset($data['debtor'])) $patch['broker'] = $data['debtor'];
                // Similar note as credit regarding amount; keep unchanged unless you want liabilities reflected.
                break;

            case 'invest':
                if (isset($data['amount']))         $patch['amount'] = $data['amount'];
                if (isset($data['broker']))         $patch['broker'] = $data['broker'];
                if (isset($data['initial_value']) && !isset($patch['amount'])) {
                    // fallback if form only sent initial_value
                    $patch['amount'] = $data['initial_value'];
                }
                break;
        }

        return $patch;
    }

    /**
     * Update subsidiary table row and mirror important fields to bf_users_wallet in one transaction.
     * $type: bank|credit|debt|investment|invest|crypto
     * $id: can be subsidiary id OR wallet id (we try both).
     */
    public function updateAccountAndWallet(string $type, int $id, array $prepared, int $userId): bool
    {
        $type = strtolower($type);

        $subsTableMap = [
            'bank'        => 'bf_users_bank_accounts',
            'credit'      => 'bf_users_credit_accounts',
            'debt'        => 'bf_users_debt_accounts',
            'investment'  => 'bf_users_invest_accounts',
            'invest'      => 'bf_users_invest_accounts',
            'crypto'      => 'bf_users_crypto_accounts',
        ];
        if (!isset($subsTableMap[$type])) {
            log_message('error', "WalletModel::updateAccountAndWallet unsupported type: {$type}");
            return false;
        }
        $subsTable = $subsTableMap[$type];

        // 1) Find subsidiary row by subsidiary id OR wallet_id
        $subsRow = null;
        switch ($type) {
            case 'bank':       $subsRow = $this->getBankAccountByIdOrWallet($id); break;
            case 'credit':     $subsRow = $this->getCreditAccountByIdOrWallet($id); break;
            case 'debt':       $subsRow = $this->getDebtAccountByIdOrWallet($id); break;
            case 'investment':
            case 'invest':     $subsRow = $this->getInvestAccountByIdOrWallet($id); break;
            case 'crypto':     // if you add crypto later, also add getCryptoAccountByIdOrWallet
                            $subsRow = $this->db->table('bf_users_crypto_accounts')
                                ->groupStart()->where('id',$id)->orWhere('wallet_id',$id)->groupEnd()
                                ->get()->getRowArray() ?: null;
                            break;
        }

        // 2) Try to read wallet row treating $id as wallet id (for fallback and mirror)
        $walletRow = $this->db->table('bf_users_wallet')->where('id', $id)->get()->getRowArray();

        $this->db->transStart();

        $walletIdForMirror = 0;

        if ($subsRow) {
            // Update subsidiary by its primary key
            $subsId  = (int) $subsRow['id'];
            $walletIdForMirror = (int) ($subsRow['wallet_id'] ?: ($walletRow['id'] ?? 0) ?: $id);

            // Ensure backref wallet_id is set if we know it
            if ($walletIdForMirror && (int)($subsRow['wallet_id'] ?? 0) !== $walletIdForMirror) {
                $this->db->table($subsTable)->where('id', $subsId)->update(['wallet_id' => $walletIdForMirror]);
            }

            // Update subsidiary with prepared data
            $this->db->table($subsTable)->where('id', $subsId)->update($prepared);
        } else {
            // No subsidiary row. Treat $id as wallet id if we have a wallet row.
            $walletIdForMirror = $walletRow ? (int) $walletRow['id'] : $id;

            // Create new subsidiary row linked back to wallet
            $insert = $prepared + [
                'user_id'   => $userId,
                'wallet_id' => $walletIdForMirror ?: null,
                'status'    => 1,
            ];
            $this->db->table($subsTable)->insert($insert);
            $subsId = (int) $this->db->insertID();

            // If we learned a wallet id later, persist it just in case
            if ($walletIdForMirror && empty($insert['wallet_id'])) {
                $this->db->table($subsTable)->where('id', $subsId)->update(['wallet_id' => $walletIdForMirror]);
            }
        }

        // 3) Mirror a small, safe subset of fields back to bf_users_wallet
        if ($walletIdForMirror) {
            $mirror = $this->computeWalletMirror($type, $prepared);
            if (!empty($mirror)) {
                $mirror['updated_on'] = date('Y-m-d H:i:s');
                $this->db->table('bf_users_wallet')->where('id', $walletIdForMirror)->update($mirror);
            }
        }

        $this->db->transComplete();
        $ok = $this->db->transStatus();
        if (!$ok) {
            $err = $this->db->error();
            log_message('error', "WalletModel::updateAccountAndWallet failed: {$err['message']} ({$err['code']})");
        }
        return $ok;
    }

    /**
     * Decide which fields to mirror back to bf_users_wallet for each type.
     * Keep this conservative so we don’t stomp unrelated columns.
     */
    private function computeWalletMirror(string $type, array $in): array
    {
        $type = strtolower($type);
        $out  = [];

        switch ($type) {
            case 'bank':
                if (isset($in['nickname']))     $out['nickname']       = (string) $in['nickname'];
                if (isset($in['balance']))      $out['amount']         = (float)  $in['balance'];
                if (isset($in['bank_name']))    $out['broker']         = (string) $in['bank_name'];
                // normalize high-level classification (optional; safe)
                $out['wallet_type'] = 'Banking';
                $out['category']    = 'financial';
                break;

            case 'credit':
                if (isset($in['nickname']))        $out['nickname']       = (string) $in['nickname'];
                if (isset($in['current_balance'])) $out['amount']         = (float)  $in['current_balance'];
                if (isset($in['bank_name']))       $out['broker']         = (string) $in['bank_name'];
                $out['wallet_type'] = 'Credit';
                $out['category']    = 'credit';
                break;

            case 'debt':
                if (isset($in['nickname']))        $out['nickname']       = (string) $in['nickname'];
                if (isset($in['current_balance'])) $out['amount']         = (float)  $in['current_balance'];
                if (isset($in['debtor']))          $out['broker']         = (string) $in['debtor'];
                $out['wallet_type'] = 'Debt';
                $out['category']    = 'debt';
                break;

            case 'investment':
            case 'invest':
                if (isset($in['nickname']))       $out['nickname']       = (string) $in['nickname'];
                if (isset($in['amount']))         $out['amount']         = (float)  $in['amount'];
                if (isset($in['initial_value']))  $out['initial_amount'] = (float)  $in['initial_value'];
                if (isset($in['net_worth']))      $out['current_amount'] = (float)  $in['net_worth'];
                if (isset($in['broker']))         $out['broker']         = (string) $in['broker'];
                $out['wallet_type'] = 'Investment';
                $out['category']    = 'investment';
                break;

            case 'crypto':
                if (isset($in['nickname']))  $out['nickname'] = (string) $in['nickname'];
                if (isset($in['balance']))   $out['amount']   = (float)  $in['balance'];
                $out['wallet_type'] = 'Crypto';
                $out['category']    = 'crypto';
                break;
        }

        // Normalize any Yes/No active values if they ever pass through (harmless)
        if (isset($out['active'])) {
            $out['active'] = ($out['active'] === 'Yes' || $out['active'] === 1) ? 1 : 0;
        }

        return $out;
    }

    public function findWalletIdForSubsidiary(string $type, int $id): ?int
    {
        $map = [
            'bank'       => 'bf_users_bank_accounts',
            'credit'     => 'bf_users_credit_accounts',
            'debt'       => 'bf_users_debt_accounts',
            'investment' => 'bf_users_invest_accounts',
            'crypto'     => 'bf_users_crypto_accounts',
        ];
        $t = $map[strtolower($type)] ?? null;
        if (!$t) return null;

        $row = $this->db->table($t)
            ->groupStart()->where('id', $id)->orWhere('wallet_id', $id)->groupEnd()
            ->get()->getRowArray();

        if (!$row) return null;
        // many of your rows historically duplicate id; prefer wallet_id if set
        return (int)($row['wallet_id'] ?? $row['id'] ?? 0) ?: null;
    }

    public function markSubsidiaryDeleted(string $type, int $id): bool
    {
        $map = [
            'bank'       => 'bf_users_bank_accounts',
            'credit'     => 'bf_users_credit_accounts',
            'debt'       => 'bf_users_debt_accounts',
            'investment' => 'bf_users_invest_accounts',
            'crypto'     => 'bf_users_crypto_accounts',
        ];
        $t = $map[strtolower($type)] ?? null;
        if (!$t) return false;

        return (bool) $this->db->table($t)
            ->groupStart()->where('id', $id)->orWhere('wallet_id', $id)->groupEnd()
            ->update(['status' => 0, 'deleted' => 1]);
    }

}
?>
