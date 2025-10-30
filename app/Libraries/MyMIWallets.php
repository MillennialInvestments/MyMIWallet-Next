<?php

namespace App\Libraries;


use App\Libraries\{BaseLoader, MyMICoin, MyMIGold};
use App\Models\{AnalyticalModel, InvestorModel, TrackerModel, WalletModel};
use Config\Services;

#[\AllowDynamicProperties]
class MyMIWallets {

    protected $cuID;
    protected $auth;
    protected $request;
    protected $session;
    protected $mymiCoin;
    protected $mymiGold;
    protected $analyticsModel;
    protected $investorModel;
    protected $trackerModel;
    protected $walletModel;

    public function __construct() {
        $this->auth = service('authentication');
        $this->request = service('request');
        $this->session = service('session');
        $this->cuID = $this->session->get('user_id') ?? $this->request->getIPAddress();
        $this->mymiCoin = new MyMICoin();
        $this->mymiGold = new MyMIGold();
        $this->analyticsModel = new AnalyticalModel();
        $this->investorModel = new InvestorModel();
        $this->trackerModel = new TrackerModel();
        $this->walletModel = new WalletModel();
    }

    // Refactoring: Simplified method to get user wallet information
    public function getUserWalletInformation() {
        return $this->getUserWallets();
    }
    

    // Refactoring: Simplified and streamlined wallet data fetching
    public function getUserWallets() {
        $walletTypes = ['Checking', 'Credit', 'Debt', 'Investment', 'Savings'];
        $walletData = [];
    
        foreach ($walletTypes as $type) {
            $methodName = "get{$type}Wallets";
            if (method_exists($this->walletModel, $methodName)) {
                $walletData[strtolower($type) . 'Wallets'] = array_map(
                    [$this, 'processWalletData'],
                    call_user_func([$this->walletModel, $methodName], $this->cuID)
                );
            }
        }
    
        return $walletData;
    }    

    public function getUserBankAccounts($cuID) {
        $getBankAccounts = $this->walletModel->getUserBankAccounts($this->cuID); 
        return $getBankAccounts; 
    }

    private function processWalletData($defaultWallet) {
        $walletTitle = $defaultWallet['nickname'] ?? $defaultWallet['broker'] . ' - ' . $defaultWallet['nickname'];
        return [
            'walletID' => $defaultWallet['id'],
            'walletTitle' => $walletTitle,
            'walletAmount' => $defaultWallet['amount'],
            'walletBroker' => $defaultWallet['broker'],
            'walletNickname' => $defaultWallet['nickname'],
            'walletDefault' => $defaultWallet['default_wallet'],
            'walletExchange' => $defaultWallet['exchange_wallet'],
            'walletMarketPair' => $defaultWallet['market_pair'],
            'walletMarket' => $defaultWallet['market'],
        ];
    }    

    public function getTotalWalletValue()
    {
        $defWalletInfo = $this->getDefaultWalletInfo();
        $defWalletID = $defWalletInfo['walletID'] ?? null;
        // Further processing based on the defWalletID
    }

    public function getWalletTotals()
    {
        $getUserCoinTotal = $this->userModel->getUserAccountInfo($this->cuID);
        $totalValue = $getUserCoinTotal['MyMIGoldValue'] ?? 0;
        $myMICCurrentValue = $getUserCoinTotal['MyMICCurrentValue'] ?? 0;
        $myMIGCurrentValue = $getUserCoinTotal['MyMIGCurrentValue'] ?? 0;
        
        $walletTotals = $this->walletModel->getWalletTotals($this->cuID);
        $walletSum = 0;

        foreach ($walletTotals as $walletTotal) {
            $walletSum += $walletTotal['amount'] ?? 0;
        }

        $walletSum += $myMIGCurrentValue;
        $formattedWalletSum = '$' . number_format($walletSum, 2);

        return [
            'walletSum' => $formattedWalletSum,
            'totalValue' => $totalValue,
            'myMIGCurrentValue' => $myMIGCurrentValue
        ];
    }

    public function getTotalOpenValue($cuID)
    {
        $walletTotals = $this->walletModel->getNonDefaultWalletTotals($cuID);
        $openValues = [];

        foreach ($walletTotals as $walletTotal) {
            $walletID = $walletTotal['id'];
            $initialAmount = $walletTotal['amount'];
            $walletGains = $this->trackerModel->getTotalGains($walletID);
            $totalAmount = $initialAmount + $walletGains;
            $percentChange = ($initialAmount != 0) ? (($totalAmount - $initialAmount) / $initialAmount * 100) : 0;

            $openValues[] = [
                'walletID' => $walletID,
                'initialAmount' => $initialAmount,
                'totalAmount' => $totalAmount,
                'percentChange' => $percentChange
            ];
        }

        return $openValues;
    }


    private function calculateDeposits($cuID, $walletID) {
        // Logic to calculate deposits...
    }
    
    private function calculateWithdrawals($cuID, $walletID) {
        // Logic to calculate withdrawals...
    }
    
    private function calculateWalletGains($walletID) {
        // Logic to calculate wallet gains...
    }
    
    private function prepareWalletSummary($walletInfo, $walletTotalAmount, $walletPercentChange) {
        // Logic to prepare wallet summary...
    }

    public function getWalletInfo($cuID, $walletID)
    {
        $getWalletDeposits = $this->walletModel->getWalletDeposits($cuID, $walletID);
        $depositAmount = array_sum(array_column($getWalletDeposits, 'amount'));

        $getWalletWithdrawals = $this->walletModel->getWalletWithdrawals($cuID, $walletID);
        $withdrawAmount = array_sum(array_column($getWalletWithdrawals, 'amount'));

        $getWalletTradesNetGain = $this->trackerModel->getWalletTradesNetGains($walletID);
        $walletGains = array_sum(array_column($getWalletTradesNetGain, 'net_gains'));

        $getWalletsTotals = $this->walletModel->getWalletTotals($cuID);
        $walletInitialAmount = $walletTotalAmount = 0;
        foreach ($getWalletsTotals as $walletTotals) {
            $walletInitialAmount += $walletTotals['amount'] + $depositAmount - $withdrawAmount;
            $walletTotalAmount += $walletTotals['amount'] + $depositAmount - $withdrawAmount + $walletGains;
        }
        
        $getWalletInfo = $this->walletModel->getWalletInfo($walletID);
        $walletInfoData = $getWalletInfo->getRowArray();
        
        if (!empty($walletInfoData)) {
            $walletTitle = !empty($walletInfoData['nickname']) ? $walletInfoData['nickname'] : $walletInfoData['broker'] . ' Account';
            $walletInfoData['walletTitle'] = $walletTitle;
        } else {
            log_message('error', "No wallet found for ID: $walletID");
            // Handle error or throw exception as per application requirement
        }
        
        $getAllPercentChange = $this->trackerModel->getAllPercentChange($walletID);
        $percentChangeData = $getAllPercentChange->getRowArray();
        $percentChange = $percentChangeData['closed_perc'] ?? 0;
        $percentChangeFormatted = $this->formatPercentChange($percentChange);
        $getUserWalletTrades = $this->trackerModel->getWalletTrades($walletID);
        $totalTrades = $getUserWalletTrades->getNumRows();

        $userWalletInfo = [
            'walletType' => $walletInfoData['wallet_type'] ?? null,
            'walletID' => $walletID,
            'walletBroker' => $walletInfoData['broker'] ?? null,
            'walletAccountID' => $walletInfoData['account_id'] ?? null,
            'walletAccessCode' => $walletInfoData['access_code'] ?? null,
            'walletPremium' => $walletInfoData['premium_wallet'] ?? null,
            'walletInitialAmount' => $walletInitialAmount,
            'walletTitle' => $walletTitle ?? null,
            'walletNickname' => $walletInfoData['nickname'] ?? null,
            'walletDefault' => $walletInfoData['default_wallet'] ?? null,
            'walletExchange' => $walletInfoData['exchange_wallet'] ?? null,
            'walletMarketPair' => $walletInfoData['market_pair'] ?? null,
            'walletMarket' => $walletInfoData['market'] ?? null,
            'walletAmount' => $walletInfoData['amount'] ?? null,
            'walletTotalAmount' => $walletTotalAmount,
            'depositAmount' => $depositAmount,
            'withdrawAmount' => $withdrawAmount,
            'walletGains' => $walletGains,
            'percentChange' => $percentChangeFormatted,
            'totalTrades' => $totalTrades,
            'getUserWalletTrades' => $getUserWalletTrades
        ];

        return $userWalletInfo;

    }   

    private function formatPercentChange($percentChange) {
        if ($percentChange === null) {
            return '<span>0%</span>';
        } elseif ($percentChange >= 0) {
            return '<span class="text-success">' . $percentChange . '%</span>';
        } else {
            return '<span class="text-danger">' . $percentChange . '%</span>';
        }
    }
    
    public function getWalletInformation($walletID)
    {
        $getWalletInformation              	 	= $this->walletModel->getWalletInfo($walletID);
        foreach ($getWalletInformation->result_array() as $walletInfo) {
            $walletData                     	= array(
                'type'                     		=> $walletInfo['type'],
                'broker'                   		=> $walletInfo['broker'],
                'nickname'                 		=> $walletInfo['nickname'],
                'amount'             	    	=> $walletInfo['amount'],
            );
            
            return $walletData;
        }
    }

    public function getTotalWalletPercentage($cuID)
    {
        $wallets = $this->walletModel->getWalletsByUser($cuID);
        $totalPortfolioValue = array_sum(array_column($wallets, 'amount'));
        $percentages = [];

        foreach ($wallets as $wallet) {
            $percentages[$wallet['id']] = ($totalPortfolioValue > 0) ? ($wallet['amount'] / $totalPortfolioValue * 100) : 0;
        }

        return $percentages;
    }
   
    public function getLastActivity($cuID)
    {
        $wallets = $this->walletModel->getWalletsByUser($cuID);
        $lastActivities = [];
    
        foreach ($wallets as $wallet) {
            $walletID = $wallet['id'];
            $lastTrade = $this->trackerModel->getLastTradeInfoByWallet($walletID);
            $lastDeposit = $this->walletModel->getLastWalletDeposit($walletID);
            $lastWithdraw = $this->walletModel->getLastWalletWithdraw($walletID);
    
            $lastActivities[$walletID] = [
                'lastTrade' => $lastTrade['activity_date'] ?? 'N/A',
                'lastDeposit' => $lastDeposit['activity_date'] ?? 'N/A',
                'lastWithdraw' => $lastWithdraw['activity_date'] ?? 'N/A'
            ];
        }
    
        return $lastActivities;
    }   

    public function getWalletsByUser($userID) {
        return $this->analyticalModel->getTotalActiveWalletsByUser($userID);
    }    

    public function getTradesByUser($userID) {
        return $this->analyticalModel->getTradesByUser($userID);
    }
    

    public function updateAssetApprovalStatus($appID, $assetStatus) {
        $userData                               = array(
            'status'                            => $assetStatus,
        ); 
        $this->db->where('id', $appID); 
        $this->db->update('bf_exchanges_assets'); 
        
    }
}
?>
