<?php namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class MyMICoinModel extends Model
{
    protected $table = 'bf_mymicoin_overview'; // Update as per CI4 database schema
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'Name', 'email', 'phone', 'message', // Update with actual fields from your database
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_on';
    protected $updatedField = 'modified_on';
    protected $createdByField = 'created_by';
    protected $updatedByField = 'modified_by';

    protected $validationRules = [
        'Name' => 'required|alpha|max_length[255]',
        'email' => 'required|valid_email|max_length[255]',
        'phone' => 'required|max_length[30]',
        'message' => 'alpha_dash|max_length[255]',
    ];

    public $galleryPath;

    public function __construct()
    {
        parent::__construct();
        $this->galleryPath = realpath(APPPATH . '../images/');
    }

    // Implement the methods from the CI3 model...

    public function getCoinValue($coin = 'MYMI') {
        $builder = $this->db->table('bf_exchanges');
        $builder->select('coin_value');
        $builder->where('market_pair', 'USD');
        $builder->where('market', $coin);
        return $builder->limit(1)->get()->getRowArray();
    }    
    
    public function getCoinInfo($coin) {
        $builder = $this->db->table('bf_exchanges');
        $builder->where('market_pair', 'USD');
        $builder->where('market', $coin);
        return $builder->limit(1)->get()->getRowArray();
    }    
    
    public function getUserCoinTotal($cuID) {
        $builder = $this->db->table('bf_exchanges_orders');
        $builder->select('initial_coin_value');
        $builder->selectSum('total');
        $builder->where('user_id', $cuID);
        $builder->where('market', 'MYMI');
        $builder->where('status', 'Closed');
        return $builder->get()->getRowArray();
    }
    
    public function completePurchase($transId) {
        $builder = $this->db->table('bf_users_coin_purchases');
        $builder->where('id', $transId);
        $builder->set(['status' => 'Complete']);
        return $builder->update();
    }
    
    public function getUserCoinTransactionTotals($cuID) {
        $builder = $this->db->table('bf_users_purchases');
        $builder->selectSum('amount');
        $builder->where('user_id', $cuID);
        return $builder->get()->getRowArray();
    }
    
    public function getTotalCoinsExchanged() {
        $builder = $this->db->table('bf_exchanges_orders');
        $builder->selectSum('total');
        $builder->where('trade_type', 'Buy');
        $builder->where('status', 'Closed');
        $builder->where('user_id !=', 2);
        return $builder->get()->getRowArray();
    }
    
    public function updateAvailableCoins($data) {
        $builder = $this->db->table('bf_investments_overview');
        return $builder->insert($data);
    }
    
    public function addUserRequest($data) {
        $builder = $this->db->table('bf_users_coin_purchases');
        return $builder->insert($data);
    }
    
    public function getTradeAlerts() {
        $builder = $this->db->table('bf_investment_trade_alerts');
        $builder->where('status', 'Opened');
        $builder->orderBy('id', 'DESC');
        return $builder->get()->getResultArray();
    }
    
    public function getUserSingleTrades($tradeID) {
        $builder = $this->db->table('bf_investment_trade_alerts');
        $builder->where('id', $tradeID);
        return $builder->get()->getRowArray();
    }
    
    public function addWallet($data) {
        $builder = $this->db->table('bf_users_wallet');
        return $builder->insert($data);
    }
    
    public function editWallet($walletId, $data) {
        $builder = $this->db->table('bf_users_wallet');
        $builder->where('id', $walletId);
        $builder->set($data);
        return $builder->update();
    }
    
    public function addWalletTransaction($data) {
        $builder = $this->db->table('bf_users_wallet_transactions');
        return $builder->insert($data);
    }
    
    public function getWalletCount($cuID) {
        $builder = $this->db->table('bf_users_wallet');
        $builder->where('user_id', $cuID);
        return $builder->countAllResults();
    }
    
    public function getWalletInfo($walletID) {
        $builder = $this->db->table('bf_users_wallet');
        $builder->where('id', $walletID);
        return $builder->get()->getRowArray();
    }
    
    public function getWalletInitialSummary($walletID) {
        $builder = $this->db->table('bf_users_wallet');
        $builder->selectSum('amount');
        $builder->where('id', $walletID);
        return $builder->get()->getRowArray();
    }
    
    public function getAllWallets($cuID) {
        $builder = $this->db->table('bf_users_wallet');
        $builder->where('user_id', $cuID);
        return $builder->get()->getResultArray();
    }
    
    public function getFiatWallets($cuID, $limit) {
        $builder = $this->db->table('bf_users_wallet');
        $builder->where('user_id', $cuID);
        $builder->where('active', 'Yes');
        $builder->where('type', 'Fiat');
        $builder->orderBy('amount', 'DESC');
        $builder->limit($limit);
        return $builder->get()->getResultArray();
    }
    
    public function getDigitalWallets($cuID, $limit) {
        $builder = $this->db->table('bf_users_wallet');
        $builder->where('user_id', $cuID);
        $builder->where('active', 'Yes');
        $builder->where('type', 'Digital');
        $builder->orderBy('amount', 'DESC');
        $builder->limit($limit);
        return $builder->get()->getResultArray();
    }
    
    public function getWalletTotals($cuID) {
        $builder = $this->db->table('bf_users_wallet');
        $builder->selectSum('amount');
        $builder->where('user_id', $cuID);
        $builder->where('active', 'Yes');
        return $builder->get()->getRowArray();
    }

    public function getWalletDeposits($cuID, $walletID = null) {
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
    
    public function getWalletWithdrawals($cuID, $walletID = null) {
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
    
    public function getSingleWalletDeposits($walletID) {
        $builder = $this->db->table('bf_users_wallet_transactions');
        $builder->selectSum('amount');
        $builder->where(['trans_type' => 'Deposit', 'wallet_id' => $walletID]);
        return $builder->get()->getRowArray();
    }
    
    public function getSingleWalletWithdrawals($walletID) {
        $builder = $this->db->table('bf_users_wallet_transactions');
        $builder->selectSum('amount');
        $builder->where(['trans_type' => 'Withdraw', 'wallet_id' => $walletID]);
        return $builder->get()->getRowArray();
    }
    
    public function getLastWalletDeposit($cuID, $walletID) {
        $builder = $this->db->table('bf_users_wallet_transactions');
        $builder->where(['trans_type' => 'Deposit', 'wallet_id' => $walletID]);
        $builder->orderBy('id', 'DESC');
        return $builder->limit(1)->get()->getRowArray();
    }
    
    public function getLastWalletWithdraw($cuID, $walletID) {
        $builder = $this->db->table('bf_users_wallet_transactions');
        $builder->where(['trans_type' => 'Withdraw', 'wallet_id' => $walletID]);
        $builder->orderBy('id', 'DESC');
        return $builder->limit(1)->get()->getRowArray();
    }
    
    public function getAllSymbols() {
        $builder = $this->db->table('bf_investment_stock_listing');
        $builder->orderBy('symbol');
        return $builder->get()->getResultArray();
    }
    
    public function getStockSymbols() {
        $builder = $this->db->table('bf_investment_stock_listing');
        $builder->groupBy(['type' => 'Stock', 'type' => 'ETF']);
        $builder->orderBy('symbol');
        return $builder->get()->getResultArray();
    }
    
    public function getActiveSwingTradeAlerts($type) {
        $builder = $this->db->table('bf_investment_trade_alerts');
        $builder->where(['status' => 'Opened', 'category' => 'Equity Trade']);
        $builder->orderBy('id', 'DESC');
        return $builder->limit(5)->get()->getResultArray();
    }
    
    public function getActiveOptionTradeAlerts($type) {
        $builder = $this->db->table('bf_investment_trade_alerts');
        $builder->where(['status' => 'Opened', 'category' => 'Option Trade']);
        $builder->orderBy('id', 'DESC');
        return $builder->limit(5)->get()->getResultArray();
    }
    
    public function getSymbolInfo($symbol) {
        $builder = $this->db->table('bf_investment_stock_listing');
        $builder->where('symbol', $symbol);
        return $builder->get()->getRowArray();
    }
    

    // Continue adding the rest of the methods...
}
