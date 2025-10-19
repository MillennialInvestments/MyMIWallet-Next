<?php namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class TrackerModel extends Model
{
    protected $table = 'bf_applications'; // Update as per CI4 database schema
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        // Update this with the actual fields of your database table
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_on';
    protected $updatedField  = 'modified_on';
    protected $deletedField  = 'deleted_at'; // If using soft deletes

    public $galleryPath;

    public function __construct()
    {
        parent::__construct();
        $this->galleryPath = realpath(APPPATH . '../images/');
    }

    // Implementing methods from CI3 model

    public function getAllSymbols()
    {
        $builder = $this->db->table('bf_investment_stock_listing'); 
        $builder->orderBy('symbol'); 
        return $builder->get()->getResultArray(); 
    }

    public function getSymbolTickers()
    {
        $builder = $this->db->table('bf_investment_stock_listing'); 
        $builder->select('id, symbol, type'); 
        $builder->orderBy('symbol'); 
        return $builder->get()->getResultArray(); 
    }

    public function getSymbolInfo($stockSym)
    {
        $builder = $this->db->table('bf_investment_stock_listing'); 
        $builder->where('symbol', $stockSym); 
        return $builder->get()->getResultArray(); 
    }

    public function getUserWallets($cuID)
    {
        $builder = $this->db->table('bf_users_wallet'); 
        $builder->select('id, broker, nickname'); 
        $builder->where('user_id', $cuID); 
        $builder-wherer('default_wallet', 'No'); 
        return $builder->get()->getResultArray(); 
    }

    public function getUserInfo($cuID)
    {
        $builder = $this->db->table('users'); 
        $builder->select('email, username'); 
        $builder->where('id', $cuID); 
        return $builder->get()->getResultArray(); 
    }

    public function getUserTrades($cuID)
    {
        $builder = $this->db->table('bf_users_trades'); 
        $builder->where('user_id', $cuID); 
        return $builder->get()->getResultArray(); 
    }

    public function getUserClosedTrades($cuID)
    {
        $builder = $this->db->table('bf_users_trades'); 
        $builder->selectSum('net_gains'); 
        $builder->where('user_id', $cuID); 
        $builder->where('order_status', 'CLOSING'); 
        return $builder->get()->getResultArray(); 
    }

    public function getUserTradesSum($cuID)
    {
        return $this->table('bf_users_trades')
                    ->selectSum('net_gains')
                    ->where('user_id', $cuID)
                    ->where('status', 'Closed')
                    ->get()
                    ->getRow();
    }

    public function getUserTradesPercentChange($cuID)
    {
        return $this->table('bf_users_trades')
                    ->selectAvg('percent_change')
                    ->where('user_id', $cuID)
                    ->where('status', 'Closed')
                    ->get()
                    ->getRow();
    }

    public function getUserSingleTrades($tradeID)
    {
        return $this->table('bf_users_trades')
                    ->where('id', $tradeID)
                    ->get()
                    ->getRow();
    }

    public function getAllNetGains($walletID)
    {
        return $this->table('bf_users_trades')
                    ->selectSum('net_gains')
                    ->where('trading_account', $walletID)
                    ->get()
                    ->getRow();
    }

    public function getAllPercentChange($walletID)
    {
        return $this->table('bf_users_trades')
                    ->selectSum('closed_perc')
                    ->where('trading_account', $walletID)
                    ->get()
                    ->getRow();
    }

    public function getWalletTrades($walletID)
    {
        return $this->table('bf_users_trades')
                    ->where('wallet', $walletID)
                    ->get()
                    ->getResult();
    }

    public function getWalletTradesOpenings($walletID)
    {
        return $this->table('bf_users_trades')
                    ->where('wallet', $walletID)
                    ->where('order_status', 'OPENING')
                    ->get()
                    ->getResult();
    }

    public function getWalletTradesNetGains($walletID)
    {
        $builder = $this->db->table('bf_users_trades'); 
        $builder->selectSum('net_gains'); 
        $builder->where('wallet', $walletID); 
        return $builder->get()->getResultArray(); 
    }

    public function getNetGains($trade_id)
    {
        return $this->table('bf_users_trades')
                    ->selectSum('net_gains')
                    ->where('trade_id', $trade_id)
                    ->get()
                    ->getRow();
    }

    public function getPercentChange($trade_id)
    {
        return $this->table('bf_users_trades')
                    ->selectSum('percent_change')
                    ->where('trade_id', $trade_id)
                    ->get()
                    ->getRow();
    }

    public function getRemainingPosition($trade_id)
    {
        return $this->table('bf_users_trades')
                    ->selectSum('remaining_position')
                    ->where('trade_id', $trade_id)
                    ->get()
                    ->getRow();
    }

    public function getLastRemainingPosition($trade_id)
    {
        return $this->table('bf_users_trades')
                    ->where('trade_id', $trade_id)
                    ->orderBy('id', 'DESC')
                    ->limit(1)
                    ->get()
                    ->getRow();
    }

    public function getMostRecentTrades($cuID)
    {
        return $this->table('bf_users_trades')
                    ->notLike('user_id', $cuID)
                    ->limit(5)
                    ->orderBy('id', 'DESC')
                    ->get()
                    ->getResult();
    }

    public function getAllWalletTrades($walletID)
    {
        return $this->where('trading_account', $walletID)
                    ->findAll();
    }

    public function getClosedTrades($walletID)
    {
        return $this->where('trading_account', $walletID)
                    ->where('status', 'Closed')
                    ->findAll();
    }

    public function getTodaysTrades($cuID)
    {
        $today = date("F jS, Y");
        return $this->where('user_id', $cuID)
                    ->where('submitted_date', $today)
                    ->where('status', 'Closed')
                    ->findAll();
    }

    public function getLastTradeInfoByUser($cuID)
    {
        return $this->where('user_id', $cuID)
                    ->orderBy('id', 'DESC')
                    ->first();
    }

    public function getTradeLogDetails($trade_id)
    {
        return $this->where('id', $trade_id)
                    ->orWhere('trade_id', $trade_id)
                    ->orderBy('id', 'ASC')
                    ->findAll();
    }

    public function addStock($data)
    {
        return $this->insert($data);
    }

    public function getAllTradeTrackerConfigs()
    {
        return $this->db->table('bf_users_trades_configs')
                        ->where('status', 1)
                        ->get()
                        ->getResultArray();
    }

    // Implement other methods like get_user_closed_trades, get_user_trades_sum, etc.

    // Note: Be sure to adapt each method to use CI4's query builder syntax and test them individually
}
