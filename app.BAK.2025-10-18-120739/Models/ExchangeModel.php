<?php namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class ExchangeModel extends Model
{
    protected $table = 'bf_exchanges'; // Update table name as per CI4 database schema
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    
    protected $allowedFields = ['active', 'status', 'deleted', 'created_on', 'completed_on', 'user_id', 'from_token', 'to_token', 'amount', 'fees', 'transaction_result', 'suspicious', 'suspicious_reason', 'reported_at', 'reported_by', 'kyc_status'];

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
    protected $validationMessages = []; // Add custom error messages for validation
    protected $skipValidation = false;

    public $galleryPath;

    public function __construct()
    {
        parent::__construct();
        $this->galleryPath = realpath(APPPATH . '../images/');
    }

    public function prepData($postData)
    {
        // Implement any data preparation logic you need before inserting/updating
        return $postData;
    }

    public function insertToken($data) {
        return $this->db->table('bf_exchanges_assets')->insert($data);
    }

    public function getTokensByBlockchain($blockchain) {
        return $this->where('blockchain', $blockchain)->findAll();
    }
    
    public function getExchanges()
    {
        return $this->table('bf_exchanges')
                    ->where('status', 'Yes')
                    ->findAll();
    }

    public function getPendingAssets()
    {
        $builder = $this->db->table('bf_exchanges_assets')->where('status', 'Pending');
        $result = $builder->get();
        return [
            'getPendingAssets' => $result->getResultArray(),
            'totalPendingAssets' => $result->getNumRows(),
        ];
    }

    public function getTopApprovedAssets()
    {
        $builder = $this->db->table('bf_exchanges_assets')
                            ->where('status', 'Approved')
                            ->where('market_cap IS NOT NULL', null, false)
                            ->orderBy('market_cap', 'DESC')
                            ->limit(50);
        $result = $builder->get();
        return [
            'topApprovedAssets' => $result->getResultArray(),
            'totalTopApprovedAssets' => $result->getNumRows(),
        ];
    }    

    public function getTotalAssetsCount()
    {
        $builder = $this->db->table('bf_exchanges_assets')
                            ->where('status', 'Approved')
                            ->where('market_cap IS NOT NULL', null, false);
        $result = $builder->get();
        return $result->getNumRows();
    }    

    public function getLargeTransactions() { 
        $builder = $this->db->table('bf_exchanges_assets_ledger')
                            ->where('status', 1)
                            ->where('deleted', 0)
                            ->where('reported !=', 0)
                            ->where('amount >=', 9999)
                            ->get(); 
        $request = $builder->getResultArray(); 
        $largeTransactions = [
            'getLargeTransactions' => $request,
            'totalLargeTransactions' => count($request),
        ];

        return $largeTransactions; 
    }

    public function getMTDLargeTransactions() { 
        $startDate = date('Y-01-01'); // January 1st of the current year
        $endDate = date('Y-m-d'); // Today's date
        $builder = $this->db->table('bf_exchanges_assets_ledger')
                            ->where('status', 1)
                            ->where('deleted', 0)
                            ->where('reported !=', 0)
                            ->where('amount >=', 9999)
                            ->where('created_on >=', $startDate)
                            ->where('created_on <=', $endDate)
                            ->get(); 
        $request            = $builder->getResultArray(); 
        $largeTransactions = [
            'getMTDLargeTransactions' => $request,
            'totalMTDLargeTransactions' => count($request),
        ];

        return $largeTransactions; 
    }

    public function markAsSuspicious($id, $reason, $reportedBy)
    {
        return $this->db->table('bf_exchanges_assets_ledger')->update($id, [
            'suspicious' => 1,
            'suspicious_reason' => $reason,
            'reported_at' => date('Y-m-d H:i:s'),
            'reported_by' => $reportedBy,
        ]);
    }

    public function getSuspiciousTransactions()
    {
        return $this->db->table('bf_exchanges_assets_ledger')->where('suspicious', 1)->findAll();
    }
    
    public function getSuspiciousTransactionCount()
    {
        return $this->db->table('bf_exchanges_assets_ledger')->where('suspicious', 1)->countAllResults();
    }

    public function getExchangeSummary($marketPair, $market)
    {
        return $this->table('bf_exchanges')
                    ->where('status', 'Yes')
                    ->where('market_pair', $marketPair)
                    ->where('market', $market)
                    ->findAll();
    }

    public function getAllOpenOrders($marketPair, $market)
    {
        $builder = $this->db->table('bf_exchanges_orders');
        $builder->select('id, status, current_date, trade_type, amount, total');
        $builder->where('market_pair', $marketPair);
        $builder->where('market', $market);
        $builder->orderBy('id', 'DESC');

        return $builder->get()->getResultArray();
    }

    public function getMarketSummaryAmount($marketPair, $market)
    {
        $builder = $this->db->table('bf_exchanges_orders');
        $builder->selectSum('amount');
        $builder->where('market_pair', $marketPair);
        $builder->where('market', $market);
        $builder->where('status', 'Closed');

        return $builder->get()->getRow();
    }

    public function getMarketSummaryTotalCoins($marketPair, $market)
    {
        $builder = $this->db->table('bf_exchanges_orders');
        $builder->selectSum('total');
        $builder->where('market_pair', $marketPair);
        $builder->where('market', $market);
        $builder->where('status', 'Closed');

        return $builder->get()->getRow();
    }

    public function getMarketSummaryOpenCoins($marketPair, $market)
    {
        $builder = $this->db->table('bf_exchanges_orders');
        $builder->selectSum('total');
        $builder->where('market_pair', $marketPair);
        $builder->where('market', $market);
        $builder->where('status', 'Open');

        return $builder->get()->getRow();
    }

    public function addOrder($data)
    {
        $this->table = 'bf_exchanges_orders'; // Change table for orders
        return $this->insert($data);
    }

    public function addOrderFetch($data)
    {
        $this->table = 'bf_exchanges_orders'; // Change table for orders
        return $this->insert($data);
    }

    public function getOrderById($orderId)
    {
        $this->table = 'bf_exchanges_orders'; // Change table for orders
        return $this->where('id', $orderId)->first();
    }

    public function addAccountInformation($userId, $data)
    {
        $this->table = 'users'; // Change table for user accounts
        $this->where('id', $userId);
        return $this->update($userId, $data);
    }

    public function getCoinValue()
    {
        $this->table = 'bf_mymigold_overview';
        return $this->orderBy('id', 'DESC')
                    ->first();
    }

    public function getUserInfo($cuID)
    {
        $this->table = 'users';
        return $this->where('id', $cuID)
                    ->first();
    }

    public function getUserContactInfo($cuID)
    {
        $this->table = 'bf_exchanges_coin_listing';
        return $this->where('user_id', $cuID)
                    ->findAll();
    }

    public function getUserWalletInfo($cuID)
    {
        $this->table = 'bf_users_wallet';
        return $this->where('user_id', $cuID)
                    ->where('default_wallet', 'Yes')
                    ->first();
    }

    public function getUserFundTotal($cuID)
    {
        $this->table = 'bf_users_wallet';
        return $this->where('user_id', $cuID)
                    ->where('default_wallet', 'Yes')
                    ->first();
    }

    public function updateWallet($cuID)
    {
        $this->table = 'bf_users_wallet';
        return $this->where('user_id', $cuID)
                    ->where('default_wallet', 'Yes')
                    ->first();
    }

    public function kycReward($data)
    {
        $this->table = 'bf_mymigold_overview';
        return $this->insert($data);
    }

    public function addReward($data)
    {
        $this->table = 'bf_users_coin_purchases';
        return $this->insert($data);
    }

    public function getMarketClosedOrders($marketPair, $market)
    {
        $this->table = 'bf_exchanges_orders';
        return $this->where('status', 'Closed')
                    ->where('market_pair', $marketPair)
                    ->where('market', $market)
                    ->findAll();
    }

    public function getOpenListingApp($cuID, $appID = null)
    {
        $this->table = 'bf_exchanges_listing_request';
        if (!empty($appID)) {
            return $this->where('id', $appID)->first();
        } else {
            return $this->where('user_id', $cuID)
                        ->notLike('status', 'Complete')
                        ->orderBy('id', 'DESC')
                        ->limit(1)
                        ->first();
        }
    }

    public function getOpenListingAppCount($cuID)
    {
        $this->table = 'bf_exchanges_listing_request';
        return $this->where('user_id', $cuID)
                    ->notLike('status', 'Complete')
                    ->countAllResults();
    }

    public function getBlockchains()
    {
        $this->table = 'bf_exchanges_blockchains';
        return $this->where('active', 'Yes')
                    ->findAll();
    }

    public function getKycStatus($cuID)
    {
        $this->table = 'users';
        $this->select('kyc');
        return $this->where('id', $cuID)
                    ->first();
    }

    public function getAssetListingRequests($cuID)
    {
        $this->table = 'bf_exchanges_listing_request';
        return $this->where('user_id', $cuID)
                    ->notLike('status', 'Approved')
                    ->findAll();
    }

    public function getUserAssetInfo($cuID)
    {
        $builder = $this->db->table('bf_exchanges');
        $result = $builder->where(['creator' => $cuID, 'market_pair' => 'USD', 'status' => 'Yes'])
                          ->get()
                          ->getResultArray();
        return $result; 
    }

    public function getUserAssetCount($cuID)
    {
        $this->table = 'bf_exchanges_listing_request';
        return $this->where('user_id', $cuID)
                    ->countAllResults();
    }

    public function getUserAssetNetWorth($cuID)
    {
        $builder = $this->db->table('bf_exchanges');
        $result = $builder->selectSum('current_value')
                ->where(['market_pair' => 'USD', 'creator' => $cuID])
                ->get()
                ->getRowArray();
        return $result;  
    }

    public function getUserAssetVolume($cuID)
    {
        $this->table = 'bf_exchanges';
        $this->selectSum('total_volume');
        return $this->where('creator', $cuID)
                    ->first();
    }

    // Continue implementing the remaining methods as required
}
