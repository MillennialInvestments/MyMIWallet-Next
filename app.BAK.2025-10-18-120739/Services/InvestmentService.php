<?php

namespace App\Services;

use App\Models\{AccountsModel, InvestmentModel, MgmtBudgetModel, WalletModel};
use CodeIgniter\Cache\CacheInterface;
use CodeIgniter\Session\Session;
use Psr\Log\LoggerInterface;
use CodeIgniter\HTTP\CURLRequest;
use App\Config\{APIs, SiteSettings};
use App\Libraries\{BaseLoader, FRED, MyMICoin, MyMIDashboard, MyMIFractalAnalyzer, MyMIGold, MyMIInvestments, MyMIMarketing, MyMIWallet};

class InvestmentService
{

    protected $accountsModel; // Add this line to hold the AccountsModel instance
    protected $investmentModel;
    protected $MyMIInvestments;
    public function __construct() {
    
        // Set up all the injected services
        $this->accountsModel = new AccountsModel(); // Initialize AccountsModel
        $this->investmentModel = new InvestmentModel();

        // Initialize the MyMIInvestments library with all the dependencies
        $this->MyMIInvestments = new MyMIInvestments();
    }  

    // Internal function to analyze risk
    private function analyzeRisk($portfolio)
    {
        $riskExposure = 0;
        foreach ($portfolio as $investment) {
            $riskExposure += $investment['value'] * $investment['risk_factor'];
        }
        return $riskExposure;
    }

    // Calculate risk exposure for a user portfolio
    public function calculateRiskExposure($userId)
    {
        $portfolio = $this->investmentModel->getUserPortfolio($userId);
        // Add logic here for calculating risk exposure
        return $this->analyzeRisk($portfolio);
    }

    // Fetch real-time data for a given symbol
    public function fetchRealTimeData($symbol)
    {
        return $this->MyMIInvestments->fetchRealTimeData($symbol);
    }

    // Get custom alerts for a user
    public function getCustomAlerts($userId)
    {
        return $this->investmentModel->getCustomAlerts($userId);
    }

    public function getInvestmentDashboard($cuID) {
        $getUpcomingEconomicCalendar = $this->investmentModel->getUpcomingEconomicEvents();

        $investDashboard = [
            'economicData' => [],
            'economicCalendar' => $getUpcomingEconomicCalendar,
            'investmentTools' => [],
        ];

        return $investDashboard;
    }

    public function getInvestmentData($cuID)
    {
        $data = [];
    
        // Fetch the user investment accounts
        $data['userInvestmentWallets'] = $this->accountsModel->getUserInvestAccounts($cuID);
    
        // Fetch all user investments, including overview and performance metrics
        $allUserInvestments = $this->MyMIInvestments->allUserInvestmentsInfo($cuID);
    
        // Fetch all Investment Dashboard Supplementary Information
        $investDashboard = $this->getInvestmentDashboard($cuID); 

        // Populate the data array with the necessary keys from $allUserInvestments
        $data = array_merge($data, [
            'investmentOverview' => $allUserInvestments['investmentOverview'] ?? [],
            'userInvestmentRecords' => $allUserInvestments['userInvestmentRecords'] ?? [],
            'activeInvestments' => $allUserInvestments['activeInvestments'] ?? [],
            'totalUserInvestments' => $allUserInvestments['activeInvestments'] ?? [],
            'totalTradeValue' => $allUserInvestments['totalTradeValue'] ?? 0,
            'totalTradeValueSum' => $allUserInvestments['totalTradeValueSum'] ?? 0,
            'totalAssetValueSum' => $allUserInvestments['totalAssetValueSum'] ?? 0,
            'totalLastTradeValueSum' => $allUserInvestments['totalLastTradeValueSum'] ?? 0,
            'totalAnnualTradeValueSum' => $allUserInvestments['totalAnnualTradeValueSum'] ?? 0,
            'totalAnnualTradePerformance' => $allUserInvestments['totalGrowth'] ?? 0,
            'thisMonthTradePerformance' => $allUserInvestments['totalMonthlyTradesCount'] ?? 0,
            'totalTradeCount' => $allUserInvestments['totalTradeCount'] ?? 0,
            'totalActiveTradeCount' => $allUserInvestments['totalActiveTradeCount'] ?? 0,
            'totalUserAssetsValue' => $allUserInvestments['totalUserAssetsValue'] ?? 0,
            'totalUserAssetsCount' => $allUserInvestments['totalUserAssetsCount'] ?? 0,
            'totalUserAssetPerformance' => $allUserInvestments['totalUserAssetPerformance'] ?? 0,
            'totalMonthlyTradesCount' => $allUserInvestments['totalMonthlyTradesCount'] ?? 0,
            'totalAssetCount' => $allUserInvestments['totalAssetCount'] ?? 0,
            'totalGrowth' => $allUserInvestments['totalGrowth'] ?? 0,
            'userCurrentAnnualValue' => $allUserInvestments['userCurrentAnnualValue'] ?? 0,
            'userCurrentAnnualPerformance' => $allUserInvestments['userCurrentAnnualPerformance'] ?? 0,
            'userCurrentAnnualTarget' => $allUserInvestments['userCurrentAnnualTarget'] ?? 0,
            'userTopGainers' => $allUserInvestments['userTopGainers'] ?? [],
            'userTopGainer' => $allUserInvestments['userTopGainer'] ?? [],
            'userTopLosers' => $allUserInvestments['userTopLosers'] ?? [],
            'userTopLoser' => $allUserInvestments['userTopLoser'] ?? [],
            'userWatchlist' => $allUserInvestments['userWatchlist'] ?? [],
            'topPerformers' => $allUserInvestments['investmentOverview']['topInvestmentPerformers'] ?? [],
            'topLosers' => $allUserInvestments['investmentOverview']['topInvestmentLosers'] ?? [],
            'economicData' => $investDashboard['economicData'] ?? [],
            'economicCalendar' => $investDashboard['economicCalendar'] ?? [],
            'investmentTools' => $investDashboard['investmentTools'] ?? [],
        ]);
    
        return $data;
    }  

    // Get market news for the user
    public function getMarketNews($cuID)
    {
        return $this->MyMIMarketData->fetchNews($cuID);
    }

    // Get symbols based on trade type
    public function getSymbolsByTradeType($tradeType)
    {
        return $this->MyMIInvestments->getSymbolsByTradeType($tradeType);
    }

    public function getUserInvestments($userId)
    {
        // Assuming $this->investmentModel is already defined and retrieves investments
        $userInvestments = $this->investmentModel->getUserInvestments($userId);
        log_message('debug', 'InvestmentService L32 - $userInvestments Array: ' . (print_r($userInvestments, true)));
    } 

    // Get user investment summary
    public function getUserInvestmentSummary($userId)
    {
        return $this->investmentModel->getInvestmentSummary($userId);
    }

    // Set custom alerts for a user
    public function setCustomAlert($userId, $alertData)
    {
        return $this->investmentModel->setCustomAlert($userId, $alertData);
    }

    // Track the returns on a specific investment
    public function trackInvestmentReturns($userId, $investmentId)
    {
        return $this->investmentModel->getInvestmentReturns($userId, $investmentId);
    }
}
