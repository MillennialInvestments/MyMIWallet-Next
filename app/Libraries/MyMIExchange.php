<?php
namespace App\Libraries; 

use CodeIgniter\Controller;
use Myth\Auth\Authorization\GroupModel;
use App\Config\{Auth, SiteSettings, SocialMedia}; 
use Config\Services;
use App\Controllers\UserController;
use App\Libraries\{
    BaseLoader,
    MyMIBudget,
    MyMICoin,
    MyMIDashboard,
    MyMISolana,
    MyMIUser,
    MyMIWallet,
    MyMIWallets,
    MyMIEthereum,
    MyMIBitcoin,
    MyMIDigibyte,
    CryptoCurrencyInterface,
    ExchangeConnectorInterface,
    MyMIGemini,
    MyMIRobinhood
};
use App\Models\{ExchangeModel};
use CodeIgniter\API\ResponseTrait; // Import the ResponseTrait
use CodeIgniter\API\RequestTrait; // Import the ResponseTrait
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\IncomingRequest;

#[\AllowDynamicProperties]
class MyMIExchange
{

    // Controller Settings
    protected $auth;
    protected $cuID;
    protected $data;
    protected $debug;
    protected $format;
    protected $helpers = ['auth', 'form', 'url'];
    protected $request;
    protected $session;
    protected $siteSettings;
    protected $template;
    protected $MyMISolana; 
    protected $MyMIUser; 
    protected $exchangeModel;
    protected $userAccount;
    protected $userAssessment;
    protected $chains = [];
    protected $instances = [];
    protected array $connectors = [];

    public function __construct()
    {
        // Set Controller Config/Settings
        $this->auth                     = service('authentication'); 
        $this->request                  = service('request');
        $this->session                  = Services::session();
        $this->siteSettings             = config('SiteSettings'); 
        $this->chains                   = config('Exchanges')->chains;

        $this->MyMISolana               = service('myMISolana');
        $this->MyMIUser                 = service('myMIUser');
        $this->exchangeModel            = service('exchangeModel');
        // Resolve cuID the same way everywhere
        $this->cuID = $this->auth->id() ?? $this->session->get('user_id');

        $userLib = $this->getMyMIUser();
        if ($this->cuID && $userLib instanceof MyMIUser) {
            $this->userAccount    = $userLib->getUserInformation($this->cuID);
            $this->userAssessment = $userLib->getUserFinancialAssessment($this->cuID);
        } else {
            $this->userAccount    = null;
            $this->userAssessment = null;
            log_message(
                'warning',
                'MyMIExchange::__construct - No cuID or MyMIUser instance; skipping userAccount load.'
            );
        }
        $this->userAccount              = service('MyMIUser')->getUserInformation($this->cuID);  
        $this->userAssessment           = service('MyMIUser')->getUserFinancialAssessment($this->cuID);
    }

    /**
     * Retrieve a connector instance by name.
     */
    public function connector(string $name): ExchangeConnectorInterface
    {
        $key = strtolower($name);
        if (!isset($this->connectors[$key])) {
            switch ($key) {
                case 'gemini':
                    $this->connectors[$key] = new MyMIGemini();
                    break;
                case 'robinhood':
                    $this->connectors[$key] = new MyMIRobinhood();
                    break;
                default:
                    throw new \InvalidArgumentException('Unknown exchange connector: ' . $name);
            }
        }
        return $this->connectors[$key];
    }
    
    /**
     * User Default Information.
     *
     * Provides front-end functions for users, including access to login and logout.
     *
     * @package applications\library\MyMIWallet\Controllers\Users
     */

    public function getAssets() {
        $exchanges                      = [
            'approvedAssets'            => $this->approvedAssets(),
            'getNetworkStatus'          => $this->getNetworkStatus(), 
            'largeTransactions'         => $this->getLargeTransactions(),
        ]; 
        return $exchanges;
    }

    public function getSolanaTokens() {
        $solanaTokens = $this->MyMISolana->getSolanaTokens();
        
        // Returning the categorized tokens
        return $solanaTokens;
    }    
    
    public function createTradingPair($baseToken, $quoteToken) {
        $pair = [
            'baseToken' => $baseToken,
            'quoteToken' => $quoteToken,
            'marketStatus' => 'active'
        ];
        return $this->db->table('trading_pairs')->insert($pair);
    }
    
    public function executeTrade($pairId, $fromAddress, $toAddress, $amount) {
        $pair = $this->db->table('trading_pairs')->where('id', $pairId)->get()->getRowArray();
        if (!$pair) {
            return ['status' => 'error', 'message' => 'Trading pair not found.'];
        }
    
        // Logic for executing trade (call external APIs or internal matching engine)
        return ['status' => 'success', 'message' => 'Trade executed.'];
    }
    
    public function getNetworkStatus() {
        $networkStatus                  = [
            'Solana'                    => $this->MyMISolana->getNetworkStatus(),
        ];
        return $networkStatus;
    }

    public function approvedAssets() {
        $getTotalAssetsCount            = $this->exchangeModel->getTotalAssetsCount(); 
        $getTopApprovedAssets           = $this->exchangeModel->getTopApprovedAssets(); 
        $getPendingAssets               = $this->exchangeModel->getPendingAssets()['getPendingAssets']; 
        $totalPendingAssets             = $this->exchangeModel->getPendingAssets()['totalPendingAssets']; 
        $approvedAssets                 = [
            'getTopApprovedAssets'      => $getTopApprovedAssets,
            'getTotalAssetsCount'       => $getTotalAssetsCount,
            'getPendingAssets'          => $getPendingAssets,
            'totalPendingAssets'        => $totalPendingAssets,
        ];
        return $approvedAssets; 
    }

    public function getLargeTransactions() {
        $allLargeTransactions           = $this->exchangeModel->getLargeTransactions()['getLargeTransactions'];
        $totalLargeTransactions         = $this->exchangeModel->getLargeTransactions()['totalLargeTransactions']; 
        $mtdLargeTransactions           = $this->exchangeModel->getMTDLargeTransactions()['getMTDLargeTransactions']; 
        $totalMTDLargeTransactions      = $this->exchangeModel->getMTDLargeTransactions()['totalMTDLargeTransactions']; 
        $largeTransactions              = [
            'allLargeTransactions'      => $allLargeTransactions,
            'totalLargeTransactions'    => $totalLargeTransactions,
            'mtdLargeTransactions'      => $mtdLargeTransactions, 
            'totalMTDLargeTransactions' => $totalMTDLargeTransactions,
        ];
        return $largeTransactions; 
    }

    public function getSuspiciousTransactions()
    {
        return $this->exchangeModel->getSuspiciousTransactions();
    }

    public function getSuspiciousTransactionCount()
    {
        return $this->exchangeModel->getSuspiciousTransactionCount();
    }

    public function flagTransactionAsSuspicious($transactionId, $reason, $reportedBy)
    {
        return $this->exchangeModel->markAsSuspicious($transactionId, $reason, $reportedBy);
    }

    public function getMarketSummaries($market_pair, $market)
    {
        $getTotalCoinAmount			    = $this->exchangeModel->getMarketSummaryAmount($market_pair, $market);
        foreach ($getTotalCoinAmount as $totalCoins) {
            $marketValue			    = '<strong>Total Cash Volume:</strong><br>$' . number_format($totalCoins['amount'], 2);
        }

        $getTotalCoinCount			    = $this->exchangeModel->getMarketSummaryTotalCoins($market_pair, $market);
        foreach ($getTotalCoinCount as $totalCoinsCount) {
            $totalCoinsExchanged	    = '<strong>Total Coin Volume:</strong><br>' . number_format($totalCoinsCount['total'], 0) . ' <strong>' . $market . '</strong>';
        }

        $getTotalOpenCoins			    = $this->exchangeModel->getMarketSummaryOpenCoins($market_pair, $market);
        foreach ($getTotalOpenCoins as $totalOpenCoins) {
            $openCoinsExchanged		    = '<strong>Open Coin Volume:</strong><br>' . number_format(abs($totalOpenCoins['total']), 0) . ' <strong>' . $market . '</strong>';
        }

        $exchangeMarketData				= array(
            'marketValue'			    => $marketValue,
            'totalCoinsExchanged'	    => $totalCoinsExchanged,
            'openCoinsExchanged'	    => $openCoinsExchanged,
        );

        return $exchangeMarketData;
    }

    public function getUserExchange_info($cuID)
    {
        $getUserAssetInfo			    = $this->exchangeModel->getUserAssetInfo($cuID);
        $getUserAssetCount			    = $this->exchangeModel->getUserAssetCount($cuID);
        $getUserAssetNetWorth		    = $this->exchangeModel->getUserAssetNetWorth($cuID);
        foreach ($getUserAssetNetWorth as $userAssetNetWorth) {
            $cuAssetNetWorth		    = $userAssetNetWorth['current_value'];
        }
        $getUserAssetVolume			    = $this->exchangeModel->getUserAssetVolume($cuID);
        foreach ($getUserAssetVolume as $userAssetVolume) {
            $cuAssetVolume			    = $userAssetVolume['total_volume'];
        }
        
        // $cuID = 2;
        // $this->db->select_sum('current_value');
        // $this->db->from('bf_exchanges');
        // $this->db->where('market_pair', 'USD');
        // $this->db->where('creator', $cuID);
        // $getUserAssets						= $this->db->get();
        // foreach($getUserAssets as $userAssets) {
        // 	$cuAssetNetWorth = $userAssets['current_value'];
        // }
        
        // foreach ($getUserAssetNetWorth as $userAssetNetWorth) {
        // 	$cuAssetNetWorth		= $userAssetNetWorth['current_value'];
        // }
        $cuAssetCount				    = $getUserAssetCount->num_rows();
        
        // foreach($getUserAssetInfo as $userAssetInfo) {
            
        // }

        $userExchangeInfo			    = array(
            'cuAssetCount'			    => $cuAssetCount,
            'cuAssetNetWorth'		    => $cuAssetNetWorth,
            'cuAssetVolume'			    => $cuAssetVolume,
        );

        return $userExchangeInfo;
    }

    public function getUserAssetSummary($cuID)
    {
        $userAssetSummary               = array();
        $getUserAssetCount              = $this->exchangeModel->getUserAssetCount($cuID);
        if (!empty($getUserAssetCount)) {
            $assetTotalCount            = $getUserAssetCount->num_rows();
            $userAssetSummary[]         = $assetTotalCount;
            $getUserAssetNetWorth       = $this->exchangeModel->getUserAssetNetWorth($cuID);
            if (!empty($getUserAssetNetWorth)) {
                foreach ($getUserAssetNetWorth as $userAssetSum) {
                    $assetNetValue      = $userAssetSum['current_value'];
                }
                $userAssetSummary[]     = $assetNetValue;
            }
            $getUserAssetInfo           = $this->exchangeModel->getUserAssetInfo($cuID);
            if (!empty($getUserAssetInfo)) {
                foreach ($getUserAssetInfo as $userAssetInfo) {
                    $assetTotalGains    = number_format($userAssetInfo['current_value'] - $userAssetInfo['initial_value'], 2);
                }
                $userAssetSummary[]     = $assetTotalGains;
            } else {
                $assetTotalGains        = 0;
                $userAssetSummary[]     = $assetTotalGains;
            }
        }
        
        return $userAssetSummary;
    }

    /**
     * Resolve library for a specific chain.
     */
    public function forChain(string $chain): CryptoCurrencyInterface
    {
        if (!isset($this->chains[$chain])) {
            throw new \InvalidArgumentException('Unsupported chain: ' . $chain);
        }
        if (!isset($this->instances[$chain])) {
            $service = $this->chains[$chain];
            $this->instances[$chain] = service($service);
        }
        return $this->instances[$chain];
    }

    public function balance(string $address, string $chain = 'solana'): array
    {
        return $this->forChain($chain)->getBalance($address);
    }

    public function quote(array $params, string $chain = 'solana'): array
    {
        return $this->forChain($chain)->getQuote($params);
    }

    public function swap(array $params, string $chain = 'solana'): array
    {
        return $this->forChain($chain)->swap($params);
    }

    public function transfer(string $from, string $to, string $amount, array $opts = [], string $chain = 'solana'): array
    {
        return $this->forChain($chain)->transfer($from, $to, $amount, $opts);
    }
}
