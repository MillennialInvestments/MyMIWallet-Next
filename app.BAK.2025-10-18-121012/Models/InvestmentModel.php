<?php namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class InvestmentModel extends Model
{
    protected $table = 'bf_users_trades'; // Update table name as per CI4 database schema
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'active',
        'status',
        'submitted_date',
        'created_on',
        'modified_on',
        'created_by',
        'modified_by',
        'user_id',
        'user_email',
        'username',
        'trading_account',
        'order_status',
        'category',
        'trade_type',
        'closed',
        'symbol',
        'current_price',
        'entry_price',
        'net_gains',
        'open_date',
        'open_time',
        'position_type',
        'shares',
        'total_trade_cost',
        'wallet',
        'json_user_fields', // To store custom columns data dynamically
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_on';
    protected $updatedField  = 'modified_on';
    protected $createdByField= 'created_by';
    protected $updatedByField= 'modified_by';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  

    public function activateInvestorAccount($userId, $data) {
        $builder = $this->db->table('users');
        $builder->where('id', $userId);
        return $builder->update($data);
    }

    public function addExchangeOrders($data) {
        $builder = $this->db->table('bf_exchanges_orders');
        if ($builder->insert($data)) {
            return $this->db->insertID();
        }
        return false;
    }
    
    /**
     * Add a new trade for quick trade scenarios
     * 
     * @param array $data
     * @return int|false Insert ID or false on failure
     */
    public function addQuickTrade($data)
    {
        log_message('debug', 'InvestmentModel - addQuickTrade: ' . print_r($data, true));
        return $this->insert($data);
    }
    
    public function addRequest($data) {
        $builder = $this->db->table('bf_users_coin_purchases');
        if ($builder->insert($data)) {
            return $this->db->insertID();
        }
        return false;
    }
    
    // CRUD Operations
    public function addStock($data)
    {
        $this->table = 'bf_investment_stock_listing'; // Change table for stock listing
        return $this->insert($data);
    }

    /**
     * Add a new trade
     * 
     * @param array $investmentData
     * @return bool|int Insert ID or false on failure
     */
    public function addTrade(array $investmentData)
    {
        log_message('debug', 'InvestmentModel - addTrade: ' . print_r($investmentData, true));
    
        // Required fields validation
        $requiredFields = ['user_id', 'order_status', 'symbol', 'shares', 'entry_price', 'total_trade_costs'];
        foreach ($requiredFields as $field) {
            if (!isset($investmentData[$field]) || empty($investmentData[$field])) {
                log_message('error', "InvestmentModel - Missing or empty required field: {$field}");
                return false;
            }
        }

        // Ensure JSON encoding for custom fields
        if (isset($investmentData['json_user_fields']) && is_array($investmentData['json_user_fields'])) {
            $investmentData['json_user_fields'] = json_encode($investmentData['json_user_fields']);
        }
    
        // Validate numeric fields
        if ((float)$investmentData['shares'] <= 0 || (float)$investmentData['entry_price'] <= 0) {
            log_message('error', 'InvestmentModel - Invalid numerical values for shares or entry_price');
            return false;
        }
        // Determine order_type based on order_status
        $orderType = isset($investmentData['order_status']) && $investmentData['order_status'] === 'Open' ? 'OPENING' : 'CLOSING';
        log_message('debug', 'InvestmentModel - orderType: ' . $orderType);
        $investmentData['order_status'] = $orderType; 
        if ($orderType === 'OPENING') {
            $investmentData['closed'] = 'false'; 
        } elseif ($orderType === 'CLOSING') {
            $investmentData['closed'] = 'true'; 
        } else { 
            $investmentData['closed'] = 'false'; 
        }
        $investmentData['active'] = 1; 
        $investmentData['status'] = 'Active'; 
        $result = $this->insert($investmentData, true);

        if ($result) {
            // Clear related cache
            $cache = \Config\Services::cache();
            $cacheKey = "investment_overview_user_{$investmentData['user_id']}";
            $cache->delete(sanitizeCacheKey($cacheKey));
        }
    
        return $result;
    } 

    public function addToWatchlist($userId, $symbol)
    {
        $builder = $this->db->table('bf_users_watchlist');
    
        try {
            $result = $builder->insert([
                'user_id' => $userId,
                'symbol' => $symbol
            ]);
    
            if ($result) {
                log_message('debug', 'Successfully added to watchlist for user ' . $userId);
                return true;
            }
    
            log_message('error', 'Failed to add to watchlist for user ' . $userId);
            return false;
        } catch (\Exception $e) {
            log_message('critical', 'Exception in addToWatchlist: ' . $e->getMessage());
            return false;
        }
    }  

    public function adjustValue($purchaseId, $data) {
        $builder = $this->db->table('bf_mymicoin_overview');
        $builder->where('id', $purchaseId);
        return $builder->update($data);
    }

    public function allActiveUserInvestmentsInfo($cuID) {
        $builder = $this->db->table('bf_users_trades');
        $builder->where(['status' => 'Active', 'closed' => 'false', 'user_id' => $cuID]);
        $builder->orderBy('id', 'desc');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function allUserInvestmentsInfo($cuID) {
        $builder = $this->db->table('bf_users_trades');
        $builder->where(['status' => 'Active', 'user_id' => $cuID]);
        $builder->orderBy('id', 'desc');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function annualTradePerformanceByUser($cuID) {
        $builder = $this->db->table($this->table);
        $builder->selectSum('net_gains');
        $builder->where('user_id', $cuID);
        $builder->where('status', 'Active');
        $builder->where('open_date >=', date('Y-01-01'));
        $builder->where('open_date <=', date('Y-m-d'));
        $query = $builder->get();

        $result = $query->getRowArray();
        return $result['net_gains'] ?? 0;
    }

    public function calculateTotalTradeValueSumByUser($cuID)
    {
        $builder = $this->db->table('bf_users_trades');
        $builder->selectSum('net_gains');
        $builder->where(['user_id' => $cuID, 'status' => 'Active']);
        $query = $builder->get();
        
        $tradeValueSum = $query->getRow()->net_gains ?? 0;
    
        if ($tradeValueSum == 0) {
            log_message('debug', "No active trade data found for User ID: {$cuID} in bf_users_trades.");
        } else {
            log_message('debug', "Calculated total trade value sum for User ID: {$cuID} - Value: {$tradeValueSum}");
        }
    
        return $tradeValueSum;
    }    

    public function calculateTotalAssetsByUser($cuID) {
        $builder = $this->db->table('bf_exchanges_assets');
        $builder->selectSum('market_cap');
        $builder->where(['user_id' => $cuID, 'active' => 1, 'status' => 'Approved']);
        $query = $builder->get();
        return $query->getRow()->market_cap ?? 0;
    }

    private function clearCache($userId)
    {
        $cache = \Config\Services::cache();
        $cacheKey = "investment_overview_user_{$userId}";
        $cache->delete(sanitizeCacheKey($cacheKey));
    }

    public function closeTrade($trade_id, $data)
    {
        return $this->update($trade_id, $data);
    }

    public function deleteSubtrade($tradeID)
    {
        $this->where('trade_id', $tradeID);
        return $this->delete();
    }

    /**
     * Delete a trade
     * 
     * @param int $tradeID
     * @return bool True on success, false on failure
     */
    public function deleteTrade($tradeID)
    {
        log_message('debug', "InvestmentModel - deleteTrade ID: {$tradeID}");
        if (empty($tradeID) || !is_numeric($tradeID)) {
            log_message('error', "InvestmentModel - Invalid ID for deletion: {$tradeID}");
            return false;
        }

        $deleteResult = $this->delete($tradeID);
        if (!$deleteResult) {
            log_message('error', 'InvestmentModel - Delete failed: ' . print_r($this->errors(), true));
        }
        $trade = $this->find($tradeID); // Get user_id from trade
        $result = $this->delete($tradeID);
    
        if ($result && $trade) {
            // Clear related cache
            $cache = \Config\Services::cache();
            $cacheKey = "investment_overview_user_{$trade['user_id']}";
            $cache->delete(sanitizeCacheKey($cacheKey));
        }
    
        return $result;
    }

    public function getActiveByUser(int $userId): array
    {
        return $this->asArray()
            ->select('id,symbol,entry_price,shares,current_price,status')
            ->where('user_id', $userId)
            ->where('deleted', '0')
            ->where('status', 'Active')
            ->orderBy('id', 'desc')
            ->findAll(1000); // hard safety cap
    }

    public function getActiveTrades($userId) {
        $builder = $this->db->table('bf_users_trades');
        $builder->select('symbol, shares, current_price, open_date');
        $builder->where('user_id', $userId);
        $builder->where('closed', false); // Only include open/active trades
        $builder->orderBy('open_date', 'DESC');
    
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getAllInvestments()
    {
        return $this->findAll();
    }

    // public function getUserInvestments($userId)
    // {
    //     return $this->where('user_id', $userId)->findAll();
    // }

    public function getUserInvestments($userId) {
        $builder = $this->db->table('bf_users_trades')
                        ->where('user_id', $userId)
                        ->limit(20)
                        ->get()->getResultArray();
        return $builder;
    }

    public function getAdvancedAnalytics($userId)
    {
        $investmentData = $this->getUserInvestments($userId);
        $analytics = [];
        
        // Calculate portfolio diversification
        $assetTypes = array_column($investmentData, 'asset_type');
        $analytics['diversification'] = array_count_values($assetTypes);

        // Calculate average return on investment
        $totalReturns = 0;
        $totalInvestments = 0;
        foreach ($investmentData as $investment) {
            $totalReturns += ($investment['current_price'] - $investment['entry_price']) * $investment['quantity'];
            $totalInvestments += $investment['entry_price'] * $investment['quantity'];
        }
        $analytics['averageROI'] = ($totalReturns / $totalInvestments) * 100;

        // Add more analytics as needed

        return $analytics;
    }

    public function getAllSymbolsByEarnings() {
        $builder =  $this->db->table('bf_investment_calendar')
                             ->where('date >=', date('Y-m-d'))
                             ->where('event_type', 'Earnings')
                             ->orderBy('date', 'ASC')
                             ->get()
                             ->getResultArray();
        return $builder;
    }

    /**
     * Fetch all trades for a given user
     * 
     * @param int $userId
     * @return array List of trades
     */
    public function getAllTradesByUser($userId)
    {
        log_message('debug', "InvestmentModel - getAllTradesByUser for User ID: {$userId}");
        return $this->where('user_id', $userId)->findAll();
    }

    public function getAllTradeTrackerConfigs()
    {
        $this->table = 'bf_users_trades_configs'; // Change table for trade tracker configs
        return $this->where('status', 1)->findAll();
    }

    public function getAllWalletTrades($walletID)
    {
        return $this->where('trading_account', $walletID)->findAll();
    }
    
    public function getBasicRetirementProjection($userId)
    {
        $plan = $this->getRetirementPlan($userId);
        $currentAge = $plan['current_age'];
        $retirementAge = $plan['retirement_age'];
        $yearsToRetirement = $retirementAge - $currentAge;
        $monthlySavings = $plan['monthly_savings'];
        $currentSavings = $plan['current_savings'];
        $estimatedAnnualReturn = 0.05; // 5% estimated return
    
        $futureValue = $currentSavings * pow(1 + $estimatedAnnualReturn, $yearsToRetirement);
        for ($i = 0; $i < $yearsToRetirement; $i++) {
            $futureValue += $monthlySavings * 12 * pow(1 + $estimatedAnnualReturn, $yearsToRetirement - $i);
        }
    
        return [
            'years_to_retirement' => $yearsToRetirement,
            'estimated_savings' => $futureValue,
        ];
    }  

    public function getCategoryMonthToMonthData($userId) {
        $builder = $this->db->table('bf_users_trades');
        $builder->select("
            DATE_FORMAT(open_date, '%Y-%m') AS month, 
            category, 
            SUM((current_price - entry_price) * shares) AS net_gains
        ");
        $builder->where('user_id', $userId);
        $builder->where('closed', false);
        $builder->groupBy("DATE_FORMAT(open_date, '%Y-%m'), category");
        $builder->orderBy('month', 'ASC');
    
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getClosedTrades($walletID)
    {
        return $this->where('trading_account', $walletID)
                    ->where('status', 'Closed')
                    ->findAll();
    }

    public function getCompanyEarnings($symbol) {
        $currentDateTime = date('Y-m-d H:i:s'); // Get the current date and time
        // log_message('debug', 'InvestmentModel L434 - $currentDateTime: ' . $currentDateTime); 
        $results = $this->db->table('bf_investment_calendar')
                            ->where('date >=', $currentDateTime)
                            ->where('event_type', 'Earnings')
                            ->where('symbol', $symbol)
                            ->orderBy('date', 'ASC')
                            ->get()
                            ->getResultArray();
        // log_message('debug', 'InvestmentModel L440 - getUpcomingEconomicEvents $results: ' . (print_r($results, true))); 
        return $results;         
    }

    public function getDetailedActiveTrades($userId) {
        $builder = $this->db->table('bf_users_trades');
        $builder->select("
            symbol, 
            shares, 
            current_price, 
            entry_price, 
            (current_price - entry_price) * shares AS net_gain,
            ((current_price - entry_price) / entry_price) * 100 AS gain_percentage,
            open_date
        ");
        $builder->where('user_id', $userId);
        $builder->where('closed', false); // Only include open/active trades
        $builder->orderBy('open_date', 'DESC');
    
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getExistingLogos($symbol) {
        $builder = $this->db->table('bf_company_logos')->where('symbol', $symbol)->get()->getRow();
        return $builder; 
    }
    
    public function getInvestmentGoals($userId)
    {
        return $this->db->table('investment_goals')->where('user_id', $userId)->findAll();
    }
    
    public function getInvestmentMonthToMonth($userId) {
        $builder = $this->db->table('bf_users_trades');
        $builder->select("DATE_FORMAT(open_date, '%Y-%m') AS month, SUM((current_price - entry_price) * shares) AS net_gains");
        $builder->where('user_id', $userId);
        $builder->where('closed', false); // Include only active/open trades
        $builder->groupBy("DATE_FORMAT(open_date, '%Y-%m')");
        $builder->orderBy('month', 'ASC');
    
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getInvestmentRequest() {
        $builder = $this->db->table('bf_users_coin_purchases');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // Fetch and Update Operations
    public function getInvestmentWallet($walletID) {
        $builder = $this->db->table('bf_users_wallet'); 
        $builder->where('id', $walletID); 
        $result = $builder->get()->getRow(); 
        return $result; 
    }

    /**
     * ✅ Get Latest 50 Trade Alerts
     */
    public function getLast50TradeAlerts()
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->orderBy('created_on', 'DESC')
            ->limit(50)
            ->get()
            ->getResultArray();
    }

    public function getLastTradeInfoByUser($cuID)
    {
        return $this->where('user_id', $cuID)
                    ->orderBy('id', 'DESC')
                    ->first();
    }
    
    public function getOrderInformation($orderID) {
        $builder = $this->db->table('bf_users_coin_purchases');
        $builder->where('id', $orderID);
        $query = $builder->get();
        return $query->getRow();
    }

    public function getTotalCoinsAndValue($cuWalletID) {
        $builder = $this->db->table('bf_users_coin_purchases');
        $builder->selectSum('total', 'totalCoins');
        $builder->selectSum('amount', 'totalValue');
        $builder->where('wallet_id', $cuWalletID);
        $query = $builder->get();
        return $query->getRow();
    }

    /**
     * ✅ Check If Ticker Exists in `bf_investment_tickers`
     */
    public function getTickerBySymbol($symbol)
    {
        return $this->db->table('bf_investment_tickers')
            ->where('symbol', $symbol)
            ->get()
            ->getRowArray();
    }
    
    public function getTodaysTrades($cuID)
    {
        $today = date("F jS Y");
        return $this->where('user_id', $cuID)
                    ->where('submitted_date', $today)
                    ->where('status', 'Closed')
                    ->findAll();
    }
    
    public function getTradeById($tradeId)
    {
        return $this->find($tradeId);
    }
    
    public function getTradeLogDetails($trade_id)
    {
        return $this->where('id', $trade_id)
                    ->orWhere('trade_id', $trade_id)
                    ->orderBy('id', 'ASC')
                    ->findAll();
    }

    public function getUpcomingEarnings() {
        $currentDateTime = date('Y-m-d H:i:s'); // Get the current date and time
        // log_message('debug', 'InvestmentModel L434 - $currentDateTime: ' . $currentDateTime); 
        $results = $this->db->table('bf_investment_calendar')
                            ->where('date >=', $currentDateTime)
                            ->where('event_type', 'Earnings')
                            ->orderBy('date', 'ASC')
                            ->get()
                            ->getResultArray();
        // log_message('debug', 'InvestmentModel L440 - getUpcomingEconomicEvents $results: ' . (print_r($results, true))); 
        return $results;         
    }

    public function getUpcomingEconomicEvents() {
        $currentDateTime = date('Y-m-d H:i:s'); // Get the current date and time
        // log_message('debug', 'InvestmentModel L434 - $currentDateTime: ' . $currentDateTime); 
        $results = $this->db->table('bf_investment_calendar')
                            ->where('date >=', $currentDateTime)
                            ->orderBy('date', 'ASC')
                            ->get()
                            ->getResultArray();
        // log_message('debug', 'InvestmentModel L440 - getUpcomingEconomicEvents $results: ' . (print_r($results, true))); 
        return $results;         
    }

    public function getUserWatchlist($userId) {
        $builder = $this->db->table('bf_users_watchlist');
        $builder->select('symbol, current_price');
        $builder->where('user_id', $userId);
    
        $query = $builder->get();
        return $query->getResultArray();
    } 

    public function getRetirementPlan($userId)
    {
        return $this->db->table('bf_users_retirement_plans')->where('user_id', $userId)->get()->getRowArray();
    }

    public function insertEconomicData($dataItem) {
        $builder = $this->db->table('bf_investment_economic_data');
        if ($builder->insert($dataItem)) {
            return $this->db->insertID();
        }
        return false;
    }

    /**
     * ✅ Insert SEC Filings Data
     */
    public function insertSecFilings($filing)
    {
        $existingFiling = $this->db->table('bf_investment_filings')
            ->where('accession_number', $filing['accession_number'])
            ->get()
            ->getRowArray();

        if (!$existingFiling) {
            return $this->db->table('bf_investment_filings')->insert($filing);
        }

        return false; // Already exists
    }

    public function removeFromWatchlist($userId, $symbol) {
        $builder = $this->db->table('bf_users_watchlist');
        return $builder->delete(['user_id' => $userId, 'symbol' => $symbol]);
    }

    /**
     * ✅ Update or Insert Ticker Data
     */
    public function saveTickerData($symbol, $marketData)
    {
        $existingTicker = $this->getTickerBySymbol($symbol);
        
        $tickerData = [
            'symbol'       => $symbol,
            'name'         => $marketData['company'] ?? $existingTicker['name'] ?? 'Unknown',
            'currency'     => $marketData['currency'] ?? $existingTicker['currency'] ?? 'USD',
            'exchange'     => $marketData['exchange'] ?? $existingTicker['exchange'] ?? 'Unknown',
            'market_cap'   => $marketData['market_cap'] ?? $existingTicker['market_cap'] ?? null,
            'created_on'   => $existingTicker['created_on'] ?? date('Y-m-d H:i:s'),
        ];

        if ($existingTicker) {
            return $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->update($tickerData);
        } else {
            return $this->db->table('bf_investment_tickers')->insert($tickerData);
        }
    }

    public function saveInvestmentGoal($data)
    {
        $this->db->table('investment_goals')->replace($data);
    }

    public function saveTrade(array $tradeData)
    {
        log_message('debug', 'InvestmentModel L259 - $tradeData[id]: ' . $tradeData['id']);
        if (isset($tradeData['id']) && !empty($tradeData['id'])) {
            log_message('debug', 'InvestmentModel L259 - Updated, did not insert');
            $result = $this->update($tradeData['id'], $tradeData);
        } else {
            log_message('debug', 'InvestmentModel L259 - Inserted, did not update');
            $result = $this->insert($tradeData);
        }

        if ($result) {
            $this->clearCache($tradeData['user_id']);
        } else {
            log_message('error', 'Failed to save trade: ' . print_r($this->errors(), true));
        }

        return $result;
        log_message('debug', 'InvestmentModel L156 - Generated SQL Query: ' . $this->db->getLastQuery());
    }

    public function sellTrade($trade_id, $data)
    {
        return $this->update($trade_id, $data);
    }
    
    public function totalActiveTradeCountByUser($cuID) {
        $builder = $this->db->table('bf_users_trades');
        $builder->where(['user_id' => $cuID, 'status' => 'Active']);
        return $builder->countAllResults();
    }

    public function totalTradeCountByUser($cuID) {
        $builder = $this->db->table('bf_users_trades');
        $builder->where(['user_id' => $cuID]);
        return $builder->countAllResults();
    }

    public function totalTradeValueByUser($cuID) {
        $builder = $this->db->table('bf_users_trades');
        $builder->selectSum('total_trade_cost');
        $builder->where('user_id', $cuID);
        $query = $builder->get();
        return $query->getRow()->total_trade_cost ?? 0;
    }

    public function totalTradeValueByUserLastMonth($cuID) {
        $builder = $this->db->table('bf_users_trades');
        $builder->selectSum('total_trade_cost');
        $builder->where('user_id', $cuID);
        $builder->where('submitted_date >=', 'DATE_SUB(NOW(), INTERVAL 1 MONTH)', false);
        $query = $builder->get();
        return $query->getRow()->total_trade_cost ?? 0;
    }

    public function totalTradeValueByUserAnnual($cuID) {
        $builder = $this->db->table('bf_users_trades');
        $builder->selectSum('total_trade_cost');
        $builder->where('user_id', $cuID);
        $builder->where('submitted_date >=', 'DATE_SUB(NOW(), INTERVAL 1 YEAR)', false);
        $query = $builder->get();
        return $query->getRow()->total_trade_cost ?? 0;
    }

    public function totalUserAssetsValue($cuID) {
        $builder = $this->db->table('bf_exchanges_assets');
        $builder->selectSum('coin_value', 'coin_quantity');
        $builder->where(['user_id' => $cuID, 'status' => 'Active']);
        $query = $builder->get();
        return $query->getRow()->value ?? 0;
    }

    public function totalUserAssetsCount($cuID) {
        $builder = $this->db->table('bf_exchanges_assets');
        $builder->where(['user_id' => $cuID, 'status' => 'Active']);
        return $builder->countAllResults();
    }

    public function totalUserAssetPerformance($cuID) {
        $assets = $this->getUserAssets($cuID);
        $totalPerformance = 0;
        $assetCount = count($assets);

        foreach ($assets as $asset) {
            $performance = $this->calculateAssetPerformance($asset['id']);
            $totalPerformance += $performance;
        }

        if ($assetCount == 0) {
            return 0;
        }

        return $totalPerformance / $assetCount;
    }

    public function tradeStatusClosed($trade_id, $status, $purchase_type, $remaining_position)
    {
        return $this->update($trade_id, [
            'status' => $status,
            'purchase_type' => $purchase_type,
            'remaining_position' => $remaining_position
        ]);
    }

    public function updateInitialTrade($trade_id, $remaining_position)
    {
        return $this->update($trade_id, ['remaining_position' => $remaining_position]);
    }
    
    /**
     * Update an existing trade
     * 
     * @param int $id
     * @param array $data
     * @return bool True on success, false on failure
     */
    public function updateTrade($id, $data)
    {
        log_message('debug', "InvestmentModel - updateTrade ID: {$id}, Data: " . print_r($data, true));

        // Ensure the ID is valid
        if (empty($id) || !is_numeric($id)) {
            log_message('error', "InvestmentModel - Invalid ID for update: {$id}");
            return false;
        }

        // Update record
        $updateResult = $this->update($id, $data);
        if (!$updateResult) {
            log_message('error', 'InvestmentModel - Update failed: ' . print_r($this->errors(), true));
        }
        $result = $this->update($id, $data);
    
        if ($result) {
            // Clear related cache
            $cache = \Config\Services::cache();
            $trade = $this->find($id);
            $cacheKey = "investment_overview_user_{$trade['user_id']}";
            $cache->delete(sanitizeCacheKey($cacheKey));
        }
    
        return $result;
    }

    /**
     * Validate and process dynamic fields
     * 
     * @param array $fields
     * @return array Validated fields
     */
    public function validateDynamicFields($fields)
    {
        $validatedFields = [];
        foreach ($fields as $key => $value) {
            // Basic sanitation
            $validatedFields[$key] = htmlspecialchars(strip_tags($value));
        }

        log_message('debug', 'InvestmentModel - validateDynamicFields: ' . print_r($validatedFields, true));
        return $validatedFields;
    }  


    public function purchaseComplete($transId, $data) {
        $builder = $this->db->table('bf_exchanges_orders');
        $builder->where('id', $transId);
        return $builder->update($data);
    }

    public function submitInvestmentRequest($data) {
        $builder = $this->db->table('bf_users_coin_purchases');
        if ($builder->insert($data)) {
            return $this->db->insertID();
        }
        return false;
    }

    public function processLike($postId, $userId) {
        $likeData = [
            'post_id' => $postId,
            'user_id' => $userId,
            'submitted_date' => date('Y-m-d H:i:s'),
        ];

        $builder = $this->db->table('bf_users_post_likes');
        if ($builder->insert($likeData)) {
            return ['status' => 'success'];
        } else {
            return ['error' => 'Database insert failed'];
        }
    }

    public function updateEconomicDataSummary($id, $summary) {
        $builder = $this->db->table('bf_investment_economic_data');
        $builder->where('id', $id);
        if ($builder->update(['summary' => $summary])) {
            return true;
        }
        return false;
    }    

    public function calculateIncomeToExpenseRatio($userId) {
        $incomeBuilder = $this->db->table('bf_users_budgeting');
        $incomeBuilder->selectSum('net_amount', 'total_income');
        $incomeBuilder->where(['created_by' => $userId, 'account_type' => 'Income']);
        $totalIncome = $incomeBuilder->get()->getRow()->total_income;

        $expenseBuilder = $this->db->table('bf_users_budgeting');
        $expenseBuilder->selectSum('net_amount', 'total_expense');
        $expenseBuilder->where(['created_by' => $userId, 'account_type' => 'Expense']);
        $totalExpense = $expenseBuilder->get()->getRow()->total_expense;

        if ($totalIncome > 0 && $totalExpense > 0) {
            return $totalIncome / $totalExpense;
        }
        return 0;
    }

    public function getInvestmentPerformanceData($userId) {
        $performanceData = [];

        $transactionBuilder = $this->db->table('transactions');
        $transactionBuilder->select('investment_id, price, quantity');
        $transactionBuilder->where('user_id', $userId);
        $transactions = $transactionBuilder->get()->getResultArray();

        foreach ($transactions as $transaction) {
            // Process and calculate performance based on transaction data
        }

        return $performanceData;
    }
    
    public function fetchRealTimeData($symbol)
    {
        $apiKey = $this->alphavantageKey;
        $url = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol={$symbol}&interval=5min&apikey={$apiKey}";
    
        $response = $this->curlrequest->get($url);
        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody(), true);
            return $data['Time Series (5min)'];
        } else {
            throw new \Exception("Failed to fetch real-time data for symbol: {$symbol}");
        }
    }
    
    public function getPortfolioOverview($userId) {
        $overviewData = [
            'portfolioPerformance' => $this->getPortfolioPerformance($userId),
            'assetAllocation' => $this->getAssetAllocation($userId),
        ];

        return $overviewData;
    }

    public function summarizeEconomicDataNotes($notes, $length = 120) {
        $summary = substr($notes, 0, $length);
        if (strlen($notes) > $length) {
            $summary .= '...';
        }
        return $summary;
    }

    public function adjustPortfolioBasedOnMarketTrends($userId, $preferences) {
        $currentPortfolio = $this->getUserPortfolio($userId);
        $marketTrends = $this->getCurrentMarketTrends();

        $adjustments = [];
        foreach ($currentPortfolio as $asset) {
            if ($this->shouldAdjustAsset($asset, $marketTrends, $preferences)) {
                $adjustments[] = $this->calculateAdjustmentForAsset($asset, $marketTrends);
            }
        }

        foreach ($adjustments as $adjustment) {
            $this->applyAdjustmentToPortfolio($userId, $adjustment);
        }

        return $adjustments;
    }

    protected function getUserPortfolio($userId) {
        $portfolio = $this->portfolioModel->getByUserId($userId);

        return $portfolio;
    }

    public function getInvestorProfile($userId)
    {
        return $this->db->table('users')->where('id', $userId)->get()->getRowArray();
    }
    
    public function getUserAlerts($userId)
    {
        return $this->db->table('alerts')->where('user_id', $userId)->findAll();
    }
    
    public function getRetirementRecommendations($userId)
    {
        // Fetch user's financial data
        $userFinancialData = $this->getUserFinancialData($userId);
        $age = $userFinancialData['age'];
        $monthlySavings = $userFinancialData['monthly_savings'];
        $investmentPortfolio = $this->getUserInvestments($userId);
    
        // Dynamic recommendations based on user's financial status
        $recommendations = [];
    
        if ($age < 30) {
            $recommendations[] = 'Consider investing more in high-growth stocks';
        } elseif ($age < 50) {
            $recommendations[] = 'Diversify your investment portfolio with bonds and real estate';
        } else {
            $recommendations[] = 'Increase focus on income-generating investments like dividends and rental properties';
        }
    
        if ($monthlySavings < 500) {
            $recommendations[] = 'Increase monthly savings by at least 20%';
        } else {
            $recommendations[] = 'Maintain or increase your current savings rate';
        }
    
        if (count($investmentPortfolio) < 5) {
            $recommendations[] = 'Expand your portfolio with diversified investments';
        } else {
            $recommendations[] = 'Review and rebalance your portfolio regularly';
        }
    
        return $recommendations;
    }
    
    public function getRetirementVisualizations($userId)
    {
        // Fetch user's financial data and generate projections
        $userFinancialData = $this->getUserFinancialData($userId);
        $currentAge = $userFinancialData['age'];
        $retirementAge = $userFinancialData['retirement_age'];
        $yearsToRetirement = $retirementAge - $currentAge;
        $monthlySavings = $userFinancialData['monthly_savings'];
        $currentSavings = $userFinancialData['current_savings'];
        $estimatedAnnualReturn = 0.06; // 6% estimated return
    
        $ages = range($currentAge, $retirementAge);
        $savings = [];
        $goals = [];
    
        $futureValue = $currentSavings;
        foreach ($ages as $age) {
            if ($age > $currentAge) {
                $futureValue += $monthlySavings * 12 * pow(1 + $estimatedAnnualReturn, $yearsToRetirement - ($age - $currentAge));
            }
            $savings[] = $futureValue;
            $goals[] = $futureValue * 0.8; // Example goal: 80% of savings as the target
        }
    
        return [
            'age' => $ages,
            'savings' => $savings,
            'goal' => $goals,
        ];
    }   
    
    protected function getCurrentMarketTrends() {
        $marketTrends = $this->marketTrendsService->fetchCurrentTrends();

        return $marketTrends;
    }

    public function saveAlert($data)
    {
        $this->db->table('alerts')->replace($data);
        // Trigger notification logic here if needed
    }

    protected function shouldAdjustAsset($asset, $marketTrends, $preferences) {
        foreach ($marketTrends as $trend) {
            if ($trend->sector === $asset->sector && $trend->performance === 'poor') {
                return true;
            }
        }

        return false;
    }

    protected function calculateAdjustmentForAsset($asset, $marketTrends) {
        $adjustment = [];
        foreach ($marketTrends as $trend) {
            if ($trend->sector === $asset->sector && $trend->performance === 'poor') {
                $adjustment = ['action' => 'sell', 'units' => $asset->units];
                break;
            }
        }

        return $adjustment;
    }

    protected function applyAdjustmentToPortfolio($userId, $adjustment) {
        if ($adjustment['action'] === 'sell') {
            $this->tradingService->executeSellOrder($userId, $adjustment['units']);
        }
    }

    public function getInvestmentOverview($userId) {
        return [
            'portfolioPerformance' => $this->getPortfolioPerformance($userId),
            'assetAllocation' => $this->getAssetAllocation($userId),
            'marketTrends' => $this->getMarketTrends(),
            'riskAssessment' => $this->getRiskAssessment($userId),
            'investmentOpportunities' => $this->getInvestmentOpportunities(),
            'topInvestmentPerformers' => $this->getTopInvestmentPerformers(),
            'topInvestmentLosers' => $this->getTopInvestmentLosers(),
            'taxEfficiency' => $this->getTaxEfficiency($userId),
            'retirementPlanning' => $this->getRetirementPlanning($userId),
        ];
    }

    private function getPortfolioPerformance($userId)
    {
        // Use CodeIgniter Cache
        $cache = \Config\Services::cache();
    
        // Define a unique cache key for the user's portfolio performance
        $cacheKey = "portfolio_performance_user_$userId";
    
        // Check if data exists in cache
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        $cachedData = $cache->get($cacheKeySanitized);
        if ($cachedData) {
            return $cachedData; // Return cached data if available
        }
    
        // Fetch data from the database if not in cache
        $builder = $this->db->table('bf_users_trades');
        $builder->select('symbol, shares as quantity, current_price');
        $builder->where(['user_id' => $userId, 'active' => 1, 'deleted' => 0]);
        $trades = $builder->get()->getResultArray();
    
        $performanceMetrics = [];
        foreach ($trades as $trade) {
            $performanceMetrics[$trade['symbol']] = $trade['current_price'] * $trade['quantity'];
        }
    
        // Save the result to the cache with a TTL of 10 minutes
        $cache->save($cacheKeySanitized, $performanceMetrics, 600);
    
        return $performanceMetrics;
    }    

    // private function getPortfolioPerformance($userId) {
    //     $builder = $this->db->table('bf_users_trades');
    //     $builder->select('symbol, shares as quantity, current_price');
    //     $builder->where(['user_id' => $userId, 'active' => 1, 'deleted' => 0]);
    //     $trades = $builder->get()->getResultArray();

    //     $performanceMetrics = [];
    //     foreach ($trades as $trade) {
    //         $performanceMetrics[$trade['symbol']] = $trade['current_price'] * $trade['quantity'];
    //     }
    //     return $performanceMetrics;
    // }

    private function getAssetAllocation($userId) {
        $builder = $this->db->table('bf_users_trades');
        $builder->select('category, SUM(shares) as total_quantity');
        $builder->where(['user_id' => $userId, 'active' => 1, 'deleted' => 0]);
        $builder->groupBy('category');
        $assets = $builder->get()->getResultArray();

        $totalInvestments = array_sum(array_column($assets, 'total_quantity'));
        $assetAllocation = [];
        foreach ($assets as $asset) {
            $assetAllocation[$asset['category']] = ($totalInvestments > 0) ? ($asset['total_quantity'] / $totalInvestments) * 100 : 0;
        }
        return $assetAllocation;
    }

    private function getCurrentMarketValue($symbol) {
        $apiKey = 'YOUR_ALPHA_VANTAGE_API_KEY';
        $url = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=$symbol&apikey=$apiKey";
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        return $data['Global Quote']['05. price'] ?? 0;
    }

    private function getMarketTrends() {
        return [
            'trend1' => 'Bullish trend in tech stocks',
            'trend2' => 'Rising interest in sustainable investments'
        ];
    }

    private function getRiskAssessment($userId) {
        $builder = $this->db->table('bf_users_trades');
        $builder->select('category, SUM(shares) as total_shares');
        $builder->where(['user_id' => $userId, 'active' => 1, 'deleted' => 0]);
        $builder->groupBy('category');
        $assets = $builder->get()->getResultArray();

        $riskLevel = 'Low';
        foreach ($assets as $asset) {
            if ($asset['category'] === 'High Risk Category') {
                $riskLevel = 'High';
                break;
            }
        }

        $recommendation = ($riskLevel == 'High') ? 'Consider diversifying' : 'Aligned with profile';
        return ['riskLevel' => $riskLevel, 'recommendation' => $recommendation];
    }

    private function getInvestmentOpportunities() {
        $builder = $this->db->table('bf_investment_trade_alerts');
        $builder->select('*');
        $builder->where('status', 'Active');
        $builder->orderBy('potential_gain', 'DESC');
        $builder->limit(5);

        $query = $builder->get();

        if (count($query->getResultArray()) > 0) {
            return $query->getResultArray();
        } else {
            return [];
        }
    }
    
    public function getTopHeldSymbols($limit) {
        $builder = $this->db->table('bf_users_trades');
    
        // Replace `symbol` with the correct column name for the asset/ticker
        $builder->select('symbol, COUNT(*) as count')
                ->groupBy('symbol')
                ->orderBy('count', 'DESC')
                ->limit($limit);
    
        $query = $builder->get();
        $results = $query->getResultArray();
    }

    private function getTopInvestmentPerformers() {
        $builder = $this->db->table('bf_investment_trade_alerts');
        $builder->select('*');
        $builder->where('status', 'Active');
        $builder->orderBy('percent_change', 'DESC');
        $builder->limit(5);

        $query = $builder->get();

        if (count($query->getResultArray()) > 0) {
            return $query->getResultArray();
        } else {
            return [];
        }
    }

    private function getTopInvestmentLosers() {
        $builder = $this->db->table('bf_investment_trade_alerts');
        $builder->select('*');
        $builder->where('status', 'Active');
        $builder->orderBy('percent_change', 'ASC');
        $builder->limit(5);

        $query = $builder->get();

        if (count($query->getResultArray()) > 0) {
            return $query->getResultArray();
        } else {
            return [];
        }
    }

    private function getTaxEfficiency($userId) {
        $investments = $this->getUserInvestments($userId);

        $taxEfficiencyRating = 'Moderate';
        $suggestions = [];

        foreach ($investments as $investment) {
            if ($investment->holdingPeriod ?? 0 > 365) {
                $taxEfficiencyRating = 'High';
                $suggestions[] = 'Maintain long-term holdings for tax benefits';
            }
        }

        if ($taxEfficiencyRating !== 'High') {
            $suggestions[] = 'Consider tax-loss harvesting to improve efficiency';
        }

        return [
            'efficiencyRating' => $taxEfficiencyRating,
            'suggestions' => $suggestions
        ];
    }

    public function getRetirementPlanning($userId) {
        // Fetch retirement goals and current investments
        $retirementGoals = $this->getRetirementGoals($userId);
        $currentInvestmentsValue = $this->getCurrentInvestmentsValue($userId);
    
        // Check if retirement goals and current investments value are defined
        if ($retirementGoals && isset($retirementGoals->targetValue) && $currentInvestmentsValue) {
            // Analyze alignment with goals
            $onTrack = ($currentInvestmentsValue >= $retirementGoals->targetValue);
        } else {
            // Default to false if goals or current investment value are not set
            $onTrack = false;
        }
    
        $suggestions = $onTrack ? 'Well done! Consider diversifying your investments further.' : 
                                  'Increase monthly savings rate to meet your retirement goals.';
    
        return [
            'onTrack' => $onTrack,
            'suggestions' => $suggestions
        ];
    }    

    public function getRetirementGoals($userId) {
        $builder = $this->db->table('bf_users_retirement_goals');
        $builder->where('user_id', $userId);
        $result = $builder->get()->getRow();

        if (empty($result)) {
            return null;
        }

        return $result;
    }



    // Fetch all active retirement plans for a user
    public function getUserRetirementPlans($userId)
    {
        return $this->db->table('bf_users_retirement_plans')
            ->where('user_id', $userId)
            ->where('status', 'Active')
            ->get()
            ->getResultArray();
    }

    // Fetch details of a specific retirement plan
    public function getRetirementPlanById($planId)
    {
        return $this->db->table('bf_users_retirement_plans')
            ->where('id', $planId)
            ->get()
            ->getRowArray();
    }

    // Investment Strategy Methods
    protected function calculateAssetPerformance($assetId) {
        $builder = $this->db->table('bf_exchanges_assets');
        $builder->select('performance');
        $builder->where('id', $assetId);
        $query = $builder->get();
        $result = $query->getRow();

        return $result->performance ?? 0;
    }

    // Complete a retirement plan
    public function completeRetirementPlan($planId)
    {
        $this->db->table('bf_users_retirement_plans')
            ->where('id', $planId)
            ->set('status', 'Completed')
            ->update();
    }

    public function createStrategy($data)
    {
        $builder = $this->db->table('bf_investment_strategies');
        return $builder->insert($data);
    }

    public function createGoal($data)
    {
        $builder = $this->db->table('bf_financial_goals');
        return $builder->insert($data);
    }

    public function deleteGoal($id)
    {
        $builder = $this->db->table('bf_financial_goals');
        $builder->where('id', $id);
        return $builder->delete();
    }

    public function deleteStrategy($id)
    {
        $builder = $this->db->table('bf_investment_strategies');
        $builder->where('id', $id);
        return $builder->delete();
    }

    private function getCacheKey($userId) {
        return sanitizeCacheKey("investment_overview_user_{$userId}");
    }   

    public function getCurrentInvestmentsValue($userId) {
        $investments = $this->db->table('bf_users_trades')
                        ->select('id, symbol, shares')
                        ->where('user_id', $userId)
                        ->limit(10)
                        // ->orderBy('desc', 'id')
                        ->get()->getResultArray();

        $totalValue = 0;
        foreach ($investments as $investment) {
            $marketValue = $this->getMarketValue($investment['symbol']);
            $investmentValue = $marketValue * $investment['shares'];
            $totalValue += $investmentValue;
        }

        return $totalValue;
    }

    // Financial Goals Methods
    public function getGoalsByUser($userId)
    {
        $builder = $this->db->table('bf_financial_goals');
        $builder->where('user_id', $userId);
        return $builder->get()->getResultArray();
    } 

    protected function getInitialInvestment($cuID) {
        $builder = $this->db->table('bf_users_trades');
        $builder->selectSum('total_trade_cost');
        $builder->where('user_id', $cuID);
        $query = $builder->get();
        $result = $query->getRow();

        return $result->initial_investment ?? 0;
    }

    public function getInvestmentSymbol($investmentId) {
        $builder = $this->db->table('bf_users_trades');
        $builder->select('symbol');
        $builder->where('id', $investmentId);
        $query = $builder->get();

        $row = $query->getRow();
        if (!empty($row)) {
            return $row->symbol;
        } else {
            log_message('error', "No investment found for ID: {$investmentId}");
            return null;
        }
    }

    private function getMarketValue($investmentId) {
        $apiKey = '<API_KEY>';
        $symbol = $this->getInvestmentSymbol($investmentId);
        $url = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$symbol}&apikey={$apiKey}";

        $client = \Config\Services::curlrequest();
        $response = $client->get($url, ['timeout' => 30]);

        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody(), true);
            if (isset($data['Global Quote']['05. price'])) {
                return (float) $data['Global Quote']['05. price'];
            }
        }

        log_message('error', "Failed to fetch market value for investment ID: {$investmentId} using symbol: {$symbol}");
        return 0;
    }

    public function getStrategiesByUser($userId)
    {
        $builder = $this->db->table('bf_investment_strategies');
        $builder->where('user_id', $userId);
        return $builder->get()->getResultArray();
    }

    protected function getUserAssets($cuID) {
        $builder = $this->db->table('bf_exchanges_assets');
        $builder->where('user_id', $cuID);
        $query = $builder->get();
        $result = $query->getResultArray();

        return $result;
    }
    
    public function logTradeAlertChanges($alertId, $oldPrice, $newPrice, $oldVolume, $newVolume)
    {
        try {
            $data = [
                'alert_id'              => $alertId,
                'previous_price'        => $oldPrice, 
                'new_price'             => $newPrice,
                'previous_volume'       => $oldVolume,
                'new_volume'            => $newVolume,
                'change_detected'       => date('Y-m-d H:i:s'),
            ];
    
            $this->db->table('bf_investment_trade_alert_changes')->insert($data);
            //log_message('info', "Logged trade alert changes for alert ID: {$alertId}");
    
        } catch (\Exception $e) {
            log_message('error', "Failed to log trade alert changes for alert ID: {$alertId} - " . $e->getMessage());
        }
    }
    
    public function importInvestmentsFromCSV($filePath)
    {
        $file = fopen($filePath, 'r');
        while (($line = fgetcsv($file)) !== FALSE) {
            $investmentData = [
                'user_id' => $this->session->get('user_id'),
                'symbol' => $line[0],
                'shares' => $line[1],
                'entry_price' => $line[2],
                'current_price' => $line[3],
                'trade_date' => $line[4],
            ];
            $this->addTrade($investmentData);
        }
        fclose($file);
    }

    public function lastMonthTradePerformanceByUser($cuID) {
        $builder = $this->db->table('bf_users_trades');
        $builder->selectSum('net_gains');
        $builder->where('user_id', $cuID);
        $builder->where('status', 'Active');
        $builder->where('open_date >=', date('Y-m-01', strtotime("-1 month")));
        $builder->where('open_date <', date('Y-m-01'));
        $query = $builder->get();
        return $query->getRow()->net_gains ?? 0;
    }

    /**
     * Add or update a retirement plan.
     *
     * @param array $retirementData
     * @return bool|int
     */
    public function saveRetirementPlan(array $retirementData)
    {
        if (empty($retirementData['user_id'])) {
            return false;
        }

        $existingPlan = $this->db->table('bf_users_retirement_plans')
            ->where('user_id', $retirementData['user_id'])
            ->where('category', 'Retirement')
            ->get()
            ->getRow();

        if ($existingPlan) {
            return $this->db->table('bf_users_retirement_plans')->update($existingPlan->id, $retirementData);
        } else {
            return $this->db->table('bf_users_retirement_plans')->insert($retirementData);
        }
    }

    public function thisMonthTradePerformanceByUser($cuID) {
        $builder = $this->db->table('bf_users_trades');
        $builder->selectSum('net_gains');
        $builder->where('user_id', $cuID);
        $builder->where('status', 'Active');
        $builder->where('open_date >=', date('Y-m-01'));
        $builder->where('open_date <=', date('Y-m-d'));
        $query = $builder->get();
        return $query->getRow()->net_gains ?? 0;
    }

    public function updateGoal($id, $data)
    {
        $builder = $this->db->table('bf_financial_goals');
        $builder->where('id', $id);
        return $builder->update($data);
    }

    // Update progress of a retirement plan
    public function updateRetirementProgress($planId, $amount)
    {
        $this->db->table('bf_users_retirement_plans')
            ->where('id', $planId)
            ->set('current_progress', 'current_progress + ' . $amount, false)
            ->update();

        $this->db->table('retirement_progress_logs')
            ->insert([
                'retirement_plan_id' => $planId,
                'progress_amount' => $amount,
            ]);
    }

    public function updateStrategy($id, $data)
    {
        $builder = $this->db->table('bf_investment_strategies');
        $builder->where('id', $id);
        return $builder->update($data);
    }

    /**
     * ✅ Update Trade Alert History for a Given Ticker
     */
    public function updateTradeAlertHistory($symbol, $marketData)
    {
        return $this->db->table('bf_investment_alert_history')
            ->where('ticker', $symbol)
            ->update([
                'price'         => $marketData['price'],
                'change'        => $marketData['change'],
                'change_percent' => $marketData['changePercent'],
                'market_cap'    => $marketData['market_cap'] ?? 0,
                'volume'        => $marketData['volume'],
                'last_updated'  => date('Y-m-d H:i:s')
            ]);
    }

    /**
     * ✅ Update Trade Alerts for a Given Ticker
     */
    public function updateTradeAlerts($symbol, $marketData)
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('ticker', $symbol)
            ->update([
                'price'         => $marketData['price'],
                'change'        => $marketData['change'],
                'change_percent' => $marketData['changePercent'],
                // 'market_cap'    => $marketData['market_cap'],
                'volume'        => $marketData['volume'],
                'last_updated'  => date('Y-m-d H:i:s')
            ]);
    }

    public function userTopGainers($cuID) {
        $builder = $this->db->table('bf_users_trades');
        $builder->select('*');
        $builder->where('user_id', $cuID);
        $builder->orderBy('net_gains', 'DESC');
        $builder->limit(5);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function userTopGainer($cuID) {
        $builder = $this->db->table('bf_users_trades');
        $builder->select('*');
        $builder->where('user_id', $cuID);
        $builder->orderBy('net_gains', 'DESC');
        $builder->limit(1);
        $query = $builder->get();
        return $query->getRow();
    }

    public function userTopLosers($cuID) {
        $builder = $this->db->table('bf_users_trades');
        $builder->select('*');
        $builder->where('user_id', $cuID);
        $builder->orderBy('net_gains', 'ASC');
        $builder->limit(5);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function userTopLoser($cuID) {
        $builder = $this->db->table('bf_users_trades');
        $builder->select('*');
        $builder->where('user_id', $cuID);
        $builder->orderBy('net_gains', 'ASC');
        $builder->limit(1);
        $query = $builder->get();
        return $query->getRow();
    }

    public function userCurrentAnnualValue($cuID) {
        $builder = $this->db->table('bf_users_trades');
        $builder->selectSum('current_price');
        $builder->where('user_id', $cuID);
        $builder->where('status', 'Active');
        $query = $builder->get();
        return $query->getRow()->current_value ?? 0;
    }

    public function userCurrentAnnualPerformance($cuID) {
        $currentValue = $this->userCurrentAnnualValue($cuID);
        $initialInvestment = $this->getInitialInvestment($cuID);

        if ($initialInvestment == 0) {
            return 0;
        }

        $performance = (($currentValue - $initialInvestment) / $initialInvestment) * 100;
        return $performance;
    }

    public function userCurrentAnnualTarget($cuID) {
        $target = $this->getRetirementGoals($cuID);

        if (empty($target) || !isset($target->annual_return_target)) {
            return null;
        }

        return $target->annual_return_target;
    }

}
?>
