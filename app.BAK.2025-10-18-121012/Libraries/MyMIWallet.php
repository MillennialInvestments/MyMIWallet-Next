<?php
namespace App\Libraries;

use App\Config\{SiteSettings};
use App\Libraries\{BaseLoader, MyMICoin, MyMIGold, MyMIUser};
use App\Models\{AnaltyicalModel, InvestorModel, MyMIGoldModel, TrackerModel, WalletModel};
use CodeIgniter\Session\Session;
use Config\Services;

#[\AllowDynamicProperties]
class MyMIWallet {

    protected $auth;
    protected $cuID;
    protected $debug;
    protected $request;
    protected $session;
    protected $siteSettings;
    protected $MyMICoin;
    protected $MyMIGold;
    protected $MyMIUser;
    protected $MyMIGoldModel; 
    protected $investorModel;
    protected $trackerModel;
    protected $walletModel;

    public function __construct() {
        $this->auth                                                 = service('authentication');
        $this->request                                              = service('request');
        $this->session                                              = service('session');
        $this->siteSettings                                         = config('SiteSettings');
        $this->debug                                                = $this->siteSettings->debug;
        $this->MyMICoin                                             = new MyMICoin(); 
        $this->MyMIGold                                             = new MyMIGold(); 
        $this->MyMIUser                                             = new MyMIUser(); 
        $this->MyMIGoldModel                                        = new MyMIGoldModel(); 
        $this->investorModel                                        = new InvestorModel();
        $this->trackerModel                                         = new TrackerModel();
        $this->walletModel                                          = new WalletModel();
        $this->cuID                                                 = $this->session->get('user_id') ?? $this->auth->id() ?? 0;
    }

    public function getUserCryptoWallets($cuID) {
        $getUserCryptoWallets                                       = $this->walletModel->getUserCryptoWallets($cuID) ?? []; 
        return $getUserCryptoWallets; 
    }

    public function getUserInvestWallets($cuID) {
        $getUserInvestWallets                                       = $this->walletModel->getUserInvestWallets($cuID) ?? []; 
        return $getUserInvestWallets; 
    }

    public function getDefaultWalletInfo($cuID) {
        $getUserDefaultWallet = $this->walletModel->getUserDefaultWallet($cuID);
        if ($getUserDefaultWallet === null) {
            // Handle case where no default wallet is found
            log_message('error', 'No default wallet found for user ID: ' . $cuID);
            return null;
        }
        $walletID                               		            = $getUserDefaultWallet['id'];
        $walletBroker                           		            = $getUserDefaultWallet['broker'];
        $walletNickname                         		            = $getUserDefaultWallet['nickname'];
        $walletDefault                          		            = $getUserDefaultWallet['default_wallet'];
        $walletExchange                        		 	            = $getUserDefaultWallet['exchange_wallet'];
        $walletMarketPair                       		            = $getUserDefaultWallet['market_pair'];
        $walletMarket                           		            = $getUserDefaultWallet['market'];
        if ($getUserDefaultWallet['nickname'] !== null) {
            $walletTitle                    		                = $getUserDefaultWallet['nickname'];
        } else {
            $walletTitle                    		                = $getUserDefaultWallet['broker'] . ' - ' . $getUserDefaultWallet['nickname'];
        };

        // MyMI Coin Information
        $userCoinData                            		            = $this->getMyMICoin()->getUserCoinTotal($cuID);
        $MyMICoinValue                          		            = $this->getMyMICoin()->getCoinValue();
        $MyMICCoinSum                           		            = $userCoinData['coinSum'];
        $MyMICCurrentValue                      		            = $MyMICoinValue * $MyMICCoinSum;
        if (!empty($userCoinData['myMICPerChange'])) {
            $MyMICPercentChange                     	            = $userCoinData['myMICPerChange'];
        } else {
            $MyMICPercentChange                                     = 0;
        }
        $coinsExchanged                         		            = $userCoinData['coinsExchanged'];

        // MyMI Gold Information
        $userGoldData                            		            = $this->MyMIGold->getUserCoinTotal($cuID);
        $MyMIGCoinSum                           		            = $userGoldData['coinSum'];
        // $getMyMIGoldValue                          		            = $this->MyMIGold->getCoinValue();
        $MyMIGoldValue                          		            = $this->MyMIGoldModel->getCoinValue();
        if ($this->debug === 1) {
            // log_message('debug', '$MyMIGoldValue (MyMIWallets - L73' . print_r($MyMIGoldValue, true));
        }
        if (!empty($MyMIGoldValue)) {

            $MyMIGCurrentValue                      	            = $MyMIGCoinSum;
            if (!empty($userGoldData['myMIGPerChange'])) {
                $MyMIGPercentChange                                 = $userGoldData['myMIGPerChange'];
            } else {
                $MyMIGPercentChange                                 = 0;
            }
        } else {
            $MyMIGCurrentValue				                        = 0;
            $MyMIGPercentChange                     	            = 0;
        }
        
        // Get All User Wallets
        $getWallets						                            = $this->walletModel->getAllWallets($cuID);
        $walletDepositAmount                    		            = 0;
        $walletWithdrawAmount                   		            = 0;
        if (!empty($getWallets)) {
            $getWalletTrans                                         = $this->walletModel->getAllTransactions($cuID);
            if (!empty($getWalletTrans)) {
                foreach ($getWalletTrans as $walletTrans) {
                    $transWalletID                                  = $walletTrans['wallet_id'];
                    $walletTransType                                = $walletTrans['trans_type'];
                    if ($transWalletID !== $walletID) {
                        if (!empty($walletTrans['amount'])) {
                            // Set Initial Variables for Transaction Type Sums
                            if ($walletTransType === 'Deposit') {
                                $walletDepositAmount                += $walletTrans['amount'];
                            } elseif ($walletTransType === 'Withdraw') {
                                $walletWithdrawAmount               += $walletTrans['amount'];
                            } else {
                                $walletDepositAmount                = '0.00';
                                $walletWithdrawAmount               = '0.00';
                            }
                        }
                    }
                }
            }
            $getWalletDeposits                                      = $this->walletModel->getWalletDeposits($cuID, $walletID);
            if ($this->debug === 1) {
                // log_message('debug', '$getWalletDeposits array: MyMIWallets L109' . print_r($getWalletDeposits, true));
            }
            if (!empty($getWalletDeposits)) {
                $depositAmount                                      = $getWalletDeposits['amount'];
                if ($this->debug === 1) {
                    // log_message('debug', '$depositAmount: MyMIWallets L112 ' . $depositAmount);
                }
            } else {
                $depositAmount                                      = '0.00';
            }
            $getWalletWithdrawals                                   = $this->walletModel->getWalletWithdrawals($cuID, $walletID);
            if (!empty($getWalletWithdrawals)) {
                $withdrawAmount                                     = $getWalletWithdrawals['amount'];
            } else {
                $withdrawAmount                                     = '0.00';
            }
            $walletFunds                                            = $depositAmount - $withdrawAmount;
            $getWalletTrades                                        = $this->trackerModel->getWalletTradesNetGains($walletID);
            if (!empty($getWalletTrades)) {
                foreach ($getWalletTrades as $walletTrades) {
                    if (!empty($walletTrades['net_gains'])) {
                        $walletGains                                = $walletTrades['net_gains'];
                    } else {
                        $walletGains                                = '0.00';
                    }
                }
            }
        }
        $walletInitialAmount                                        = $getUserDefaultWallet['amount'] + $depositAmount - $withdrawAmount;
        $walletAmount						                        = $getUserDefaultWallet['amount'] + $depositAmount - $withdrawAmount + $MyMICCurrentValue + $MyMIGCurrentValue + $walletGains;
        if ($walletAmount > 0) {
            $walletPercentChange			                        = (($walletInitialAmount - $walletAmount) / $walletAmount) + $MyMICPercentChange;
        } else {
            $walletPercentChange			                        = $MyMICPercentChange;
        }
        $walletInitialAmount                                        = 0;
        $walletAmount                                               = 0;
        $userDefaultWalletInfo				                        = array(
            'walletID'					    	                    => $walletID,
            'walletTitle'				    	                    => $walletTitle,
            'walletBroker'					                        => $walletBroker,
            'walletNickname'				                        => $walletNickname,
            'walletDefault'					                        => $walletDefault,
            'walletExchange'				                        => $walletExchange,
            'walletMarketPair'				                        => $walletMarketPair,
            'walletMarket'					                        => $walletMarket,
            'walletInitialAmount'			                        => $walletInitialAmount,
            'walletAmount'					                        => $walletAmount,
            'walletPercentChange'			                        => $walletPercentChange,
            'walletGains'					                        => $walletGains,
            'walletFunds'				    	                    => $walletFunds,
            'depositAmount'					                        => $depositAmount,
            'withdrawAmount'			    	                    => $withdrawAmount,
            'walletDepositAmount'			                        => $walletDepositAmount,
            'walletWithdrawAmount'		                            => $walletWithdrawAmount,
            'MyMICoinValue'				    	                    => $MyMICoinValue,
            'MyMICCurrentValue'			            	            => $MyMICCurrentValue,
            'MyMICCoinSum'				            	            => $MyMICCoinSum,
            'coinsExchanged'			            	            => $coinsExchanged,
            'MyMIGoldValue'				            	            => $MyMIGoldValue,
            'MyMIGCurrentValue'			            	            => $MyMIGCurrentValue,
            'MyMIGCoinSum'				    	                    => $MyMIGCoinSum,
            'getWallets'                                            => $getWallets,
        );

        return $userDefaultWalletInfo;
    }

    public function getWalletSummaries($cuID)
    {
        $getCheckingSummaries = $this->walletModel->getCheckingWalletsSummary($cuID); // Use model method directly
        $getCreditSummaries = $this->walletModel->getCreditAccountsSummary($cuID);
        $getDebtSummaries = $this->walletModel->getDebtAccountsSummary($cuID); // You'll need to define this
        $getLoanSummaries = $this->walletModel->getLoanAccountsSummary($cuID); // You'll need to define this
        $getSavingSummaries = $this->walletModel->getSavingsAccountsSummary($cuID); // You'll need to define this
        $getUtilitySummaries = $this->walletModel->getUtilityAccountsSummary($cuID); // You'll need to define this
    
        // Summaries math - ensure they’re numeric before addition
        $getWalletSummary = ($getCheckingSummaries['amount'] ?? 0) + ($getCreditSummaries['available_balance'] ?? 0) + ($getSavingSummaries['amount'] ?? 0);
        $getTotalWalletSummaries = $getWalletSummary + ($getDebtSummaries['amount'] ?? 0) + ($getLoanSummaries['amount'] ?? 0) + ($getUtilitySummaries['amount'] ?? 0);
    
        $userWalletSummaries = [
            'getCheckingSummaries' => $getCheckingSummaries,
            'getCreditSummaries' => $getCreditSummaries,
            'getDebtSummaries' => $getDebtSummaries,
            'getLoanSummaries' => $getLoanSummaries,
            'getSavingSummaries' => $getSavingSummaries,
            'getUtilitySummaries' => $getUtilitySummaries,
            'walletSummaryTotal' => $getWalletSummary,
            'totalWalletSummaries' => $getTotalWalletSummaries,
        ];
    
        return $userWalletSummaries;
    }
    
    public function getWalletData($cuID, $walletID) {
        $userWalletInfo     = array(
            'Hi'            => 'Hello',
        );
        return $userWalletInfo;
    }

    public function getTotalWalletValue($cuID) {
        $defWalletInfo				    	                                = $this->CI->mymiwallet->getDefaultWalletInfo($cuID);
        $defWalletID				    	                                = $defWalletInfo['walletID'];
        // $defWalletAmount			    	= $defWalletInfo['walletFunds'];
        // $defWalletDepositAmount			    = $defWalletInfo['depositAmount'];
        // $defWalletWithdrawAmount	    	= $defWalletInfo['withdrawAmount'];
        // $defWalletPercentChange			    = $defWalletInfo['walletPercentChange'];
    }

    public function getWalletTotals($cuID) {
        $this->CI->load->library('MyMIGold');
        // $getUserCoinTotal					    = $this->CI->mymigold->get_user_coin_total($cuID);
        $getUserCoinTotal                                                   = $this->CI->mymiuser->userAccountInfo($cuID);
        $totalValue						                                    = $getUserCoinTotal['MyMIGoldValue'];
        $myMICCurrentValue					                                = $getUserCoinTotal['MyMICCurrentValue'];
        $myMIGCurrentValue					                                = $getUserCoinTotal['MyMIGCurrentValue'];
        $walletTotals 					                                    = $this->walletModel->getWalletTotals($cuID);
        if (empty($walletTotals)) {
            $walletSum 					                                    = '$0.00';
            echo $walletSum;
        } else {
            foreach ($walletTotals as $walletTotal) {
                $walletSum 				                                    = $walletTotal['amount'] + $myMIGCurrentValue;
                $walletSum				                                    = '$' . number_format($walletSum, 2);
            }
        }
        $myMIWalletSummary					                                = array(
                    'walletSum'					                            => $walletSum,
                    'totalValue'				                            => $totalValue,
                    'myMIGCurrentValue'				                        => $myMIGCurrentValue
            );
        return $myMIWalletSummary;
    }

    public function getTotalOpenValue($cuID) {
        $depositAmount = 0;
        $withdrawAmount = 0;
        $walletGains = 0;
        
        $getNDWalletsTotals					                                = $this->walletModel->getNonDefaultWalletTotals($cuID);
        if (!empty($getNDWalletsTotals)) {
            foreach ($getNDWalletsTotals as $walletInfo) {
                if (!empty($walletInfo['id'])) {
                    $walletID					                            = $walletInfo['id'];
                    $walletAmount				                            = $walletInfo['amount'];
                    $walletInitialAmount		                            = $walletInfo['amount'] + $depositAmount - $withdrawAmount;
                    $walletTotalAmount			                            = $walletInfo['amount'] + $depositAmount - $withdrawAmount + $walletGains;
                    if (!empty($walletAmount)) {
                        $walletPercentChange	                            = ($walletTotalAmount - $walletAmount) / $walletAmount * 100;
                    } else {
                        $walletPercentChange	                            = 0.00;
                    }
                    $getWalletDeposits			                            = $this->walletModel->getWalletDeposits($cuID, $walletID);
                    foreach ($getWalletDeposits as $depositInfo) {
                        $depositAmount			                            = $depositInfo['amount'];
                    }
                    $getWalletWithdrawals		                            = $this->walletModel->getWalletWithdrawals($cuID, $walletID);
                    foreach ($getWalletWithdrawals as $withdrawInfo) {
                        $withdrawAmount			                            = $withdrawInfo['amount'];
                    }
                    $getWalletTrades			                            = $this->trackerModal->getWalletTradesNetGains($walletID);
                    foreach ($getWalletTrades as $walletTrades) {
                        //~ $walletGains				                = number_format($walletTrades['net_gains'], 2, '.', '');
                        $walletGains			                            = $walletTrades['net_gains'];
                    }
                    if (!empty($walletInfo['nickname'])) {
                        $walletTitle			                            = $walletInfo['nickname'];
                    } elseif (!empty($walletInfo['broker'])) {
                        $walletTitle			                            = $walletInfo['broker'] . 'Account';
                    } else {
                        $walletTitle                                        = null;
                    }
                    $userWalletOpenSummary			    	                = array(
                                'walletInitialAmount'		                => $walletInitialAmount,
                                'walletAmount'				                => $walletAmount,
                                'depositAmount'				                => $depositAmount,
                                'withdrawAmount'			                => $withdrawAmount,
                                'walletGains'				                => $walletGains,
                                'walletTitle'				                => $walletTitle,
                                'walletPercentChange'		                => $walletPercentChange,
                        );
                    return $userWalletOpenSummary;
                }
            }
        }
    }

    public function getTotalWalletPercentage($cuID) {
        $getAllWalletAmounts					                            = $this->walletModel->getAllWalletAmounts($cuID);
        $getAllWalletTransactions				                            = $this->walletModel->getAllWalletTransactions($cuID);
        $getAllExchangeTransactions				                            = $this->walletModel->getAllExchangesTransactions($cuID);
    }

    public function getLastActivity($cuID, $walletID) {
        $getLastTradeActivity					                            = $this->trackerModal->getLastTradeInfoByUser($cuID);
        if (!empty($getLastTradeActivity)) {
            $lastTradeActivity				    	                        = $getLastTradeActivity[0]['open_date'] . ' - ' . $getLastTradeActivity[0]['open_time'];
        } else {
            $lastTradeActivity				    	                        = 'N/A';
        }
        // Get Last Deposit Activity
        $getLastDepositActivity					                            = $this->walletModel->getLastWalletDeposit($cuID, $walletID);
        if (!empty($getLastDepositActivity)) {
            $depositDate							                        = $getLastDepositActivity[0]['submitted_date'];
            $convertedDepositDate					                        = strtotime($depositDate);
            $lastDepositActivity					                        = date('F jS, Y', $convertedDepositDate) . ' - ' . $getLastDepositActivity[0]['time'];
            if (!empty($getLastDepositActivity[0]['time'])) {
                $depositActivity					                        = $lastDepositActivity;
            } else {
                $depositActivity					                        = 'N/A';
            }
        } else {
            $depositActivity					                            = 'N/A';
        }
        // Get Last Withdraw Activity
        $getLastWithdrawActivity				                            = $this->walletModel->getLastWalletWithdraw($cuID, $walletID);
        if (!empty($getLastWithdrawActivity)) {
            $withdrawDate							                        = $getLastWithdrawActivity[0]['open_date'];
            $convertedWithdrawDate					                        = strtotime($withdrawDate);
            $lastWithdrawActivity					                        = date('F jS, Y', $convertedWithdrawDate) . ' - ' . $getLastWithdrawActivity[0]['time'];
            if (!empty($getLastWithdrawActivity[0]['time'])) {
                $withdrawActivity					                        = $lastWithdrawActivity;
            } else {
                $withdrawActivity					                        = 'N/A';
            }
        } else {
            $withdrawActivity					                            = 'N/A';
        }
            
        $userLastActivity					    	                        = array(
            'lastTradeActivity'					                            => $lastTradeActivity,
            'depositActivity'					                            => $depositActivity,
            'withdrawActivity'					                            => $withdrawActivity,
        );

        return $userLastActivity;
    }

    public function getWalletsByUser($userID) {
        $getUserWallets                                                 = $this->walletModel->getWalletTotals($userID); 
        return $getUserWallets;
    }

    public function getTradesByUser($userID) {
        $getTradesByUser                                                = $this->analyticalModel->getTradesByUser($userID);
        return $getTradesByUser;
    }

    public function updateAssetApprovalStatus($appID, $assetStatus) { 
        $userData = ['status' => $assetStatus];
        $this->db->table('bf_exchanges_assets')->where('id', $appID)->update($userData);
    }
}
