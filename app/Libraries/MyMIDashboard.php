<?php

namespace App\Libraries;

use CodeIgniter\Session\Session;
use Config\Services;
use Config\{APIs, SiteSettings, SocialMedia};
use App\Models\{BudgetModel, DashboardModel, ExchangeModel, InvestorModel, MyMICoinModel, SolanaModel, TrackerModel, UserModel, WalletModel};
use App\Libraries\{BaseLoader, MyMICoin, MyMIGold, MyMINotifications, MyMISolana, MyMIWallet};

#[\AllowDynamicProperties]
class MyMIDashboard
{

    protected $auth;
    protected $cuID;
    protected $db;
    protected $debug;
    protected $helpers = (['auth']);
    protected $request;
    protected $session;
    protected $siteSettings;
    protected $budgetModel;
    protected $dashboardModel;
    protected $exchangeModel;
    protected $investorModel;
    protected $solanaModel;
    protected $trackerModel;
    protected $userModel;
    protected $walletModel;
    protected $MyMICoinModel;
    protected $MyMICoin;
    protected $MyMIGold;
    protected $MyMINotifications;
    protected $MyMISolana;
    protected $MyMIWallet;
    protected $userSolana;

    public function __construct()
    {
        $this->auth = service('authentication');
        $this->db = \Config\Database::connect();
        $this->request = service('request');
        $this->siteSettings = config('SiteSettings');
        $this->debug = $this->siteSettings->debug;
        $this->session = Services::session();
        $this->cuID = $this->session->get('user_id') ?? $this->auth->id() ?? 0;

        $this->budgetModel = new BudgetModel();
        $this->dashboardModel = new DashboardModel();
        $this->MyMICoinModel = new MyMICoinModel();
        $this->trackerModel = new TrackerModel();
        // $this->userModel = new UserModel();
        $this->walletModel = new WalletModel();
        $this->MyMICoin = new MyMICoin();
        $this->MyMIGold = new MyMIGold();
    }

    public function dashboardInfo($cuID) {
        if ($cuID === 0) {
            return [
                'getFeatures' => [],
                'promotionalBanners' => [],
                'progressGoalData' => [],
            ];
        }

        $getFeatures = $this->getFeatures(); 
        $promotionalBanners = $this->dashboardModel->getPromotionalBanners();
        $progressGoalData = $this->processGoalData($cuID);

        $dashboardInfo = [
            'getFeatures' => $getFeatures,
            'promotionalBanners' => $promotionalBanners,
            'progressGoalData' => $progressGoalData,
        ];

        return $dashboardInfo;
    }

    public function getAllTokensByBlock($exchange) {
        if ($exchange === 'Solana') {
            if ($this->siteSettings->solanaExchange === 1) {
                $this->solanaModel          = new SolanaModel(); 
                $exchange                   = 'SOL';
                $getListedTokens            = $this->solanaModel->getListedTokens($exchange);
                return $getListedTokens; 
            }
        }
    }

    public function getTokenDetails($exchange, $symbol = null) {
        if ($exchange === 'Solana') {
            $this->solanaModel              = new SolanaModel();
            $getTokenDetails                = $this->solanaModel->getTokenInfoBySymbol($symbol);
            return $getTokenDetails;
        }
    }

    public function getTokenDetailsByID($exchange, $tokenID = null) {
        if ($exchange === 'Solana') {
            $this->solanaModel              = new SolanaModel();
            $getTokenDetails                = $this->solanaModel->getTokenInfoByID($tokenID);
            return $getTokenDetails;
        }
    }

    public function getCryptoAccount($cuID, $exchange = null) {
        if ($cuID === 0) {
            return [
                'accountInfo' => [
                    'id' => 0,
                    'status' => 0,
                    'public_token' => 'N/A',
                    'nickname' => 'Guest',
                    'auto_staking' => 'N/A',
                    'notifications' => 'N/A',
                ],
                'ledger' => []
            ];
        }
        // log_message('debug', 'MyMIDashboard L110 - $cuID: ' . $cuID); 

        if ($exchange === 'Solana' && $this->siteSettings->solanaExchange === 1) {
            $this->MyMISolana = new MyMISolana();
            $cuSolanaDW = $this->MyMISolana->getUserDefaultSolana($cuID)['cuSolanaDW'];

            return [
                'accountInfo' => [
                    'id' => $cuSolanaDW['id'] ?? 0,
                    'status' => $cuSolanaDW['status'] ?? 0,
                    'public_token' => $cuSolanaDW['public_token'] ?? 'N/A',
                    'nickname' => $cuSolanaDW['nickname'] ?? 'N/A',
                    'auto_staking' => $cuSolanaDW['auto_staking'] ?? 'N/A',
                    'notifications' => $cuSolanaDW['notifications'] ?? 'N/A',
                ],
                'ledger' => []
            ];
        }

        return [];
    }
    
    public function getFeatures() {
        $getFeatures                        = $this->dashboardModel->getFeatures(); 
        if ($this->debug === 1) {
            // log_message('debug', 'MyMIDashboard L90 - $getFeatures: ' . (print_r($getFeatures, true)));
        }
        return $getFeatures; 
    }

    public function getUpcomingEconomicEvents() {
        $getUpcomingEconomicEvents          = $this->dashboardModel->getUpcomingEconomicEvents(); 
        return $getUpcomingEconomicEvents; 
    }
    
    public function getTransactions($cuID, $exchange, $publicKey) {
        if ($exchange === 'Solana') {
            $cryptoTransactions             = $this->MyMISolana->getTransactions($cuID, $publicKey);
            $ledger                         = [
                'transactions'              => $cryptoTransactions,
            ];
        }
        return $ledger;
    }
    
    public function getTransactionsBySymbol($cuID, $exchange, $symbol) {
        if ($exchange === 'Solana') {
            $getTokenDetails                = $this->getTokenDetails($exchange, $symbol); 
            $cryptoTransactions             = $this->MyMISolana->getTransactionsBySymbol($cuID, $getTokenDetails['address']);
            $ledger                         = [
                'transactions'              => $cryptoTransactions,
            ];
        }
        return $ledger;
    }

    private function getNextTask($goals, $completions)
    {
        $completedOrderIds = array_column($completions, 'order_id');
        foreach ($goals as $goal) {
            if (!in_array($goal['order_id'], $completedOrderIds)) {
                return $goal;
            }
        }
        return null;
    }

    public function processGoalData($userId)
    {
        $goals                              = $this->dashboardModel->getGoals($userId);
        $completions                        = $this->dashboardModel->getCompletions($userId);
        $nextTask                           = $this->getNextTask($goals, $completions);
        return ['goals' => $goals, 'completions' => $completions, 'nextTask' => $nextTask];
    }
}
?>
