<?php

namespace App\Libraries;

use App\Libraries\MyMIWallets;
use App\Models\AnalyticalModel;
use CodeIgniter\HTTP\RequestInterface;
use Config\Services;

#[\AllowDynamicProperties]
class MyMIAnalytics
{

    protected $analyticalModel;
    protected $session;
    protected $request;
    protected $cuID;

    public function __construct()
    {
        $this->analyticalModel = new AnalyticalModel();
        $this->request = Services::request();
        $this->session = Services::session();
        $cuID = $this->session->get('user_id');
    }

    public function reporting($cuID = null)
    {
        $cuID = $this->session->get('user_id');
        $uri = $this->request->getUri();
        $pageURIB = ($uri->getTotalSegments() >= 2) ? $uri->getSegment(2) : null;
        $department = $pageURIB;
    
        // Gather data from various methods
        $pendingAssets = $this->get_pending_assets();
        $totalPendingAssets = $pendingAssets['totalPendingAssets'] ?? 0;
        $getPendingAssets = $pendingAssets['getPendingAssets'] ?? 0;
        $approvedAssets = $this->get_approved_assets();
        $totalApprovedAssets = $approvedAssets['totalApprovedAssets'] ?? 0;
        $getApprovedAssets = $approvedAssets['getApprovedAssets'] ?? 0;

        $totalAmounts = $this->get_total_amount();
        $totalTransTotalsPlain = $totalAmounts['totalTransTotalsPlain'] ?? 0;
        $totalTransFeesPlain = $totalAmounts['totalTransFeesPlain'] ?? 0;
        $getTotalAmounts = $totalAmounts['getTotalAmounts'] ?? 0;
        $totalPartnerTransTotalsPlain = $totalAmounts['totalPartnerTransTotalsPlain'] ?? 0;
        $totalPartnerTransFeesPlain = $totalAmounts['totalPartnerTransFeesPlain'] ?? 0;
        $getTotalPartnerAmounts = $totalAmounts['getTotalPartnerAmounts'] ?? 0;
        $totalTransFees = $totalAmounts['totalTransFees'] ?? 0;
        $totalTransTotals = $totalAmounts['totalTransTotals'] ?? 0;
        $totalPartnerTransTotals = $totalAmounts['totalPartnerTransTotals'] ?? 0;
        $totalPartnerTransFees = $totalAmounts['totalPartnerTransFees'] ?? 0;

        $totalTransOrders = $this->get_total_transactions();
        $totalTransactions = $totalTransOrders['totalTransactions'] ?? 0;
        $getTotalTrans = $totalTransOrders['getTotalTrans'] ?? 0;

        $lastTotalAmounts = $this->get_last_total_amount();
        $totalLastTransTotals = $lastTotalAmounts['amount'] ?? 0;
        $totalLastTransFees = $lastTotalAmounts['fees'] ?? 0;
        $getLastTotalAmounts = $lastTotalAmounts['getLastTotalAmounts'] ?? 0;

        $pendingSupport = $this->get_pending_support($department);
        $totalPendingSupport = $pendingSupport['totalPendingSupport'] ?? 0;
        $getPendingSupport = $pendingSupport['getPendingSupport'] ?? 0;
        $getPendingPartnerSupport = $pendingSupport['getPendingPartnerSupport'] ?? 0;
        $totalPendingPartnerSupport = $pendingSupport['totalPendingPartnerSupport'] ?? 0;

        $completeSupport = $this->get_complete_support($department);
        $totalCompleteSupport = $completeSupport['totalCompleteSupport'] ?? 0;
        $getCompleteSupport = $completeSupport['getCompleteSupport'] ?? 0;
        $getCompletePartnerSupport = $completeSupport['getCompletePartnerSupport'] ?? 0;
        $totalCompletePartnerSupport = $completeSupport['totalCompletePartnerSupport'] ?? 0;

        $trackedTrades = $this->get_total_trades_tracked();
        $totalTradesTracked = $trackedTrades['totalTradesTracked'] ?? 0;
        $getTotalTradesTracked = $trackedTrades['getTotalTradesTracked'] ?? 0;

        $pendingUsers = $this->get_pending_users();
        $totalPendingUsers = $pendingUsers['totalPendingUsers'] ?? 0;
        $getPendingUsers = $pendingUsers['getPendingUsers'] ?? 0;

        $activeUsers = $this->get_active_users();
        // log_message('info', 'HomeController L83 - $activeUsers Array: ' . (print_r($activeUsers, true)));
        $totalActiveUsers = $activeUsers['totalActiveUsers']; // Altered by removing ?? 0 to test
        // $totalActiveUsers = $activeUsers['totalActiveUsers'] ?? 0;
        $getActiveUsers = $activeUsers['getActiveUsers'] ?? [];

        $inactiveUsers = $this->get_inactive_users();
        // log_message('debug', 'MyMIAnalytics L86 - $inactiveUsers array: ' . (print_r($inactiveUsers, true)));
        $totalInactiveUsers = $inactiveUsers['totalInactiveUsers'] ?? 0;
        $getInactiveUsers = $inactiveUsers['getInactiveUsers'] ?? [];

        $inactivePartners = $this->get_inactive_partners();
        $totalInactivePartners = $inactivePartners['totalInactivePartners'] ?? 0;
        $getInactivePartners = $inactivePartners['getInactivePartners'] ?? [];

        $activeServices = $this->get_active_services();
        $totalActiveServices = $activeServices['totalActiveServices'] ?? 0;
        $getActiveServices = $activeServices['getActiveServices'] ?? 0;
        $totalActiveSubscriptions = $activeServices['totalActiveSubscriptions'] ?? 0;
        $getActiveSubscriptions = $activeServices['getActiveSubscriptions'] ?? 0;

        $pendingPartners = $this->get_pending_partners();
        $totalPendingPartners = $pendingPartners['totalPendingPartners'] ?? 0;
        $getPendingPartners = $pendingPartners['getPendingPartners'] ?? 0;

        $activePartners = $this->get_active_partners();
        $totalActivePartners = $activePartners['totalActivePartners'] ?? 0;
        $getActivePartners = $activePartners['getActivePartners'] ?? 0;

        $pendingPartnerAssets = $this->get_pending_partner_assets();
        $totalPendingPartnerAssets = $pendingPartnerAssets['totalPendingPartnerAssets'] ?? 0;
        $getPendingPartnerAssets = $pendingPartnerAssets['getPendingPartnerAssets'] ?? 0;

        $approvedPartnerAssets = $this->get_approved_partner_assets();
        $totalApprovedPartnerAssets = $approvedPartnerAssets['totalApprovedPartnerAssets'] ?? 0;
        $getApprovedPartnerAssets = $approvedPartnerAssets['getApprovedPartnerAssets'] ?? 0;

        $activeWallets = $this->get_total_active_wallets();
        $totalWalletsCreated = $activeWallets['totalWalletsCreated'] ?? 0;
        $getTotalActiveWallets = $activeWallets['getTotalActiveWallets'] ?? 0;

        $defaultWallets = $this->get_total_default_wallets(); 
        $totalDefaultWalletsCreated = $defaultWallets['totalDefaultWalletsCreated'] ?? 0;
        $getTotalWalletTransactions = $defaultWallets['getTotalWalletTransactions'] ?? 0;

        $walletTransactions = $this->get_total_wallet_transactions(); 
        $getTotalWalletTransactions = $walletTransactions['getTotalWalletTransactions'] ?? 0; 
        $totalWalletTransactions = $walletTransactions['totalWalletTransactions'] ?? 0;
        $averageWalletTransactions = $totalWalletsCreated > 0 ? number_format($totalWalletTransactions / $totalWalletsCreated, 2) : '0.00';

        $getUserActivity = $this->get_user_activity($cuID) ?? [];

        // Calculate percentages and prepare the reporting array
        // Example for one calculation
        $target                                         = $this->targets(); // Ensure this method returns an array with all target keys
        $assetPercentage                                = number_format((($totalApprovedAssets / $target['targetAssets']) * 100), 2) . '%';
        $pendingAssetsPercentage                        = number_format(((($totalApprovedAssets + $totalPendingAssets)/ $target['targetAssets']) * 100),2) . '%'; 
        $subscriptionPercentage                         = number_format((($totalActiveServices / $target['targetSubscriptions']) * 100), 2) . '%'; 
        $transactionPercentage                          = number_format((($totalTransactions / $target['targetTransactions']) * 100),2) . '%'; 
        $tradesPercentage                               = number_format((($totalTradesTracked / $target['targetTrades']) * 100),2) . '%'; 
        $usersPercentage                                = number_format((($totalActiveUsers / $target['targetUsers']) * 100),2) . '%'; 
        $walletsPercentage                              = number_format((($totalWalletsCreated / $target['targetWallets']) * 100),2) . '%'; 
        $transAmountPercentage                          = number_format((($totalTransTotalsPlain / $target['targetTransAmount']) * 100),2) . '%'; 
        $transFeesPercentage                            = number_format((($totalTransFeesPlain / $target['targetTransFees']) * 100),2) . '%'; 
        // Partner Subset
        $partnerAssetPercentage                         = number_format((($totalApprovedPartnerAssets / $target['targetPartnerAssets']) * 100),2) . '%'; 
        $partnerPercentage                              = number_format((($totalActivePartners / $target['targetPartners']) * 100),2) . '%'; 
        // $partnerTransactionPercentage                    = number_format((($activePartners->totalPartnerTransactions / $target['targetPartnerTransactions']) * 100),2) . '%'; 
        $partnerTransAmountPercentage                   = number_format((($totalPartnerTransTotalsPlain / $target['targetPartnerTransAmount']) * 100),2) . '%'; 
        $partnerTransFeesPercentage                     = number_format((($totalPartnerTransFeesPlain / $target['targetPartnerTransFees']) * 100),2) . '%'; 
        if (!empty($pendingSupport->totalPendingPartnerSupport) OR !empty($totalCompletePartnerSupport)) {
            $partnerSupportPercentage                   = number_format((($totalPendingPartnerSupport / $totalCompletePartnerSupport) * 100),2) . '%'; 
        } else {
            
            $partnerSupportPercentage                   = '0.00%';
        }

        $reporting = [
            // Get Approved Reports
            'getApprovedAssets'                         => $getApprovedAssets,
            'totalApprovedAssets'                       => $totalApprovedAssets,
            'getPendingPartnerAssets'                   => $getPendingPartnerAssets,
            'totalPendingPartnerAssets'                 => $totalPendingPartnerAssets,
            'getApprovedPartnerAssets'                  => $getApprovedPartnerAssets,
            'totalApprovedPartnerAssets'                => $totalApprovedPartnerAssets,
            'getActiveUsers'                            => $getActiveUsers,
            'totalActiveUsers'                          => $totalActiveUsers,
            'getInactiveUsers'                          => $getInactiveUsers,
            'totalInactiveUsers'                        => $totalInactiveUsers,
            'getActivePartners'                         => $getActivePartners,
            'totalActivePartners'                       => $totalActivePartners,
            'getInactivePartners'                       => $getInactivePartners,
            'totalInactivePartners'                     => $totalInactivePartners,
            'getActiveServices'                         => $getActiveServices,
            'totalActiveServices'                       => $totalActiveServices,
            'getActiveSubscriptions'                    => $getActiveSubscriptions,
            'totalActiveSubscriptions'                  => $totalActiveSubscriptions,
            'getActiveSubscriptions'                    => $getActiveSubscriptions,
            'getCompleteSupport'                        => $getCompleteSupport,
            'totalCompleteSupport'                      => $totalCompleteSupport,
            'getCompletePartnerSupport'                 => $getCompletePartnerSupport,
            'totalCompletePartnerSupport'               => $totalCompletePartnerSupport,
           
            // Get Pending Reports
            'getPendingAssets'                          => $getPendingAssets,
            'totalPendingAssets'                        => $totalPendingAssets,
            'getPendingSupport'                         => $getPendingSupport,
            'totalPendingSupport'                       => $totalPendingSupport,
            'getPendingPartnerSupport'                  => $getPendingPartnerSupport,
            'totalPendingPartnerSupport'                => $totalPendingPartnerSupport,
            'getPendingUsers'                           => $getPendingUsers,
            'totalPendingUsers'                         => $totalPendingUsers,
            'getPendingPartners'                        => $getPendingPartners,
            'totalPendingPartners'                      => $totalPendingPartners,
            
            // Get Percentages               
            'assetPercentage'                           => $assetPercentage,
            'pendingAssetsPercentage'                   => $pendingAssetsPercentage,
            'subscriptionPercentage'                    => $subscriptionPercentage,
            'transactionPercentage'                     => $transactionPercentage,
            'tradesPercentage'                          => $tradesPercentage,
            'usersPercentage'                           => $usersPercentage,
            'walletsPercentage'                         => $walletsPercentage,
            'partnerPercentage'                         => $partnerPercentage,
            'transAmountPercentage'                     => $transAmountPercentage,
            'transFeesPercentage'                       => $transFeesPercentage,
            // Partner Subset
            'partnerAssetPercentage'                    => $partnerAssetPercentage,
            // 'partnerTransationPercentage'               => $partnerTransactionPercentage,
            'partnerTransAmountPercentage'              => $partnerTransAmountPercentage,
            'partnerTransFeesPercentage'                => $partnerTransFeesPercentage,
            'partnerSupportPercentage'                  => $partnerSupportPercentage,

            // Get Targets
            'targetAssets'                              => $target['targetAssets'],
            'targetSubscriptions'                       => $target['targetSubscriptions'],
            'targetTransactions'                        => $target['targetTransactions'],
            'targetTransAmount'                         => $target['targetTransAmount'],
            'targetTransFees'                           => $target['targetTransFees'],
            'targetTrades'                              => $target['targetTrades'],
            'targetWallets'                             => $target['targetWallets'],
            'targetUsers'                               => $target['targetUsers'],
            'targetPartners'                            => $target['targetPartners'],
            'targetPartnerAssets'                       => $target['targetPartnerAssets'],
            'targetPartnerTransactions'                 => $target['targetPartnerTransactions'],
            'targetPartnerTransAmount'                  => $target['targetPartnerTransAmount'],
            'targetPartnerTransFees'                    => $target['targetPartnerTransFees'],

            // Get Totals            
            'getTotalTrans'                             => $getTotalTrans,
            'totalTransactions'                         => $totalTransactions,
            'getTotalAmounts'                           => $getTotalAmounts,
            'getTotalPartnerAmounts'                    => $getTotalPartnerAmounts,
            'totalTransFees'                            => $totalTransFees,
            'totalTransTotals'                          => $totalTransTotals,
            'totalTransFeesPlain'                       => $totalTransFeesPlain,
            'totalTransTotalsPlain'                     => $totalTransTotalsPlain,
            'totalPartnerTransTotals'                   => $totalPartnerTransTotals,
            'totalPartnerTransTotalsPlain'              => $totalPartnerTransTotalsPlain,
            'totalPartnerTransFees'                     => $totalPartnerTransFees,
            'totalPartnerTransFeesPlain'                => $totalPartnerTransFeesPlain,
            'getLastTotalAmounts'                       => $getLastTotalAmounts,
            'totalLastTransFees'                        => $totalLastTransFees,
            'totalLastTransTotals'                      => $totalLastTransTotals,
            'getTotalTradesTracked'                     => $getTotalTradesTracked,
            'totalTradesTracked'                        => $totalTradesTracked,  
            // 'totalMarketingTasks'                       => $departmentPendingTasks['totalMarketingTasks,
            // 'getUserActivity'                           => $getUserActivity['getUserActivity']->result_array(),  

            // Get Wallet Information
            'getTotalActiveWallets'                     => $getTotalActiveWallets,
            'totalWalletsCreated'                       => $totalWalletsCreated,
            'totalDefaultWalletsCreated'                => $totalDefaultWalletsCreated,
            'getTotalWalletTransactions'                => $getTotalWalletTransactions,
            'totalWalletTransactions'                   => $totalWalletTransactions,
            'averageWalletTransactions'                 => $averageWalletTransactions,
        ];
        return $reporting;
    }

    /**
     * Single source of truth for user balance.
     * Returns raw numeric amount plus currency and components.
     */
    public function getCurrentBalance(int $userId, string $mode = 'net-liquid'): array
    {
        $budgetService  = new \App\Services\BudgetService();
        $accountService = new \App\Services\AccountService();
        $wallets        = new MyMIWallets();

        // Cash & bank accounts
        $budget  = $budgetService->getUserBudget($userId) ?? [];
        $cash    = (float) ($budget['checkingSummary'] ?? 0);

        // Wallet balances (sum of wallet amounts)
        $walletData  = $wallets->getUserWallets();
        $walletTotal = 0.0;
        foreach ($walletData as $group) {
            foreach ($group as $w) {
                $walletTotal += (float) ($w['walletAmount'] ?? 0);
            }
        }

        // Credit cards / short term debt
        $creditAccounts = $accountService->getUserCreditAccounts($userId) ?? [];
        $debtAccounts   = $accountService->getUserDebtAccounts($userId)   ?? [];
        $credit = 0.0;
        foreach ($creditAccounts as $c) {
            $credit += (float) ($c['current_balance'] ?? 0);
        }
        $shortTermDebt = 0.0;
        foreach ($debtAccounts as $d) {
            $shortTermDebt += (float) ($d['current_balance'] ?? 0);
        }

        $amount = $cash + $walletTotal - $credit - $shortTermDebt;

        return [
            'amount'     => $amount,
            'currency'   => $budget['defaultCurrency'] ?? 'USD',
            'components' => [
                'cash'          => $cash,
                'wallets'       => $walletTotal,
                'credit'        => $credit,
                'shortTermDebt' => $shortTermDebt,
            ],
            'asOf' => date('Y-m-d H:i:s'),
            'mode' => $mode,
        ];
    }

    public function get_user_activity($cuID)
    {
        return $this->analyticalModel->getUsersActivity($cuID);
    }

    public function get_users_activity()
    {
        return $this->analyticalModel->get_users_activity();
    }

    public function targets()
    {
        $activeUsers                                    = $this->get_active_users();
        $totalActiveUsers                               = $activeUsers['totalActiveUsers'] ?? 0;
        $targetUsers                                    = $this->calculateTargets($totalActiveUsers, [500, 1000, 2500, 5000, 10000, 25000, 50000, 100000, 250000, 500000, 1000000, 2500000, 5000000, 10000000]);

        $approvedAssets                                 = $this->get_approved_assets();
        $totalApprovedAssets                            = $approvedAssets['totalApprovedAssets'] ?? 0;
        $targetAssets                                   = $this->calculateTargets($totalApprovedAssets, [100, 250, 500, 1000, 2500, 5000, 10000, 25000, 50000, 100000, 250000, 500000, 1000000]);

        $activeServices                                 = $this->get_active_services();
        $totalActiveSubscriptions                       = $activeServices['totalActiveSubscriptions'] ?? 0;
        $targetSubscriptions                            = $this->calculateTargets($totalActiveSubscriptions, [100, 250, 500, 1000, 2500, 5000, 10000, 25000, 50000, 100000, 250000, 500000, 1000000]);

        $targetTransactions                             = 1000;
        $targetTransAmount                              = 100000;
        $targetTransFees                                = 10000;
        $targetTrades                                   = 25000;
        $targetWallets                                  = 1000; 
        $targetPartners                                 = 100;
        $targetPartnerAssets                            = 10;
        $targetPartnerTransactions                      = 10000;
        $targetPartnerTransAmount                       = 1000000;
        $targetPartnerTransFees                         = 100000;
        // ... continue with other targets ...

        return [
            'targetAssets'                              => $targetAssets,
            'targetSubscriptions'                       => $targetSubscriptions,
            'targetTransactions'                        => $targetTransactions, 
            'targetTransAmount'                         => $targetTransAmount,
            'targetTransFees'                           => $targetTransFees,
            'targetTrades'                              => $targetTrades,
            'targetUsers'                               => $targetUsers,
            'targetWallets'                             => $targetWallets,
            'targetPartners'                            => $targetPartners,
            'targetPartnerAssets'                       => $targetPartnerAssets,            
            'targetPartnerTransactions'                 => $targetPartnerTransactions,            
            'targetPartnerTransAmount'                  => $targetPartnerTransAmount,            
            'targetPartnerTransFees'                    => $targetPartnerTransFees,      
        ];
    }

    private function calculateTargets($actual, $thresholds)
    {
        foreach ($thresholds as $threshold) {
            if ($actual <= $threshold) {
                return $threshold;
            }
        }
        return end($thresholds); // Return the last value if actual exceeds all thresholds
    }

    public function get_pending_assets()
    {
        $today = date("Y-m-d");
        return $this->analyticalModel->getPendingAssets($today);
    }

    public function get_pending_asset_by_id($appID)
    {
        $getPendingAssetByID = $this->analyticalModel->get_pending_asset_by_id($appID);
        if (empty($getPendingAssetByID)) {
            return null; // Handle case where no data is found
        }

        foreach ($getPendingAssetByID as $pendingAsset) {
            $userID = $pendingAsset['user_id'];
        }

        $getUserInfo = $this->analyticalModel->user_account_info($userID);
        return [
            'pendingAsset' => $getPendingAssetByID[0],
            'getUserInfo' => $getUserInfo
        ];
    }

    public function get_active_services()
    {
        return $this->analyticalModel->getActiveServices();
    }

    public function get_approved_assets()
    {
        return $this->analyticalModel->getApprovedAssets();
    }

    public function get_pending_partner_assets()
    {
        $today = date("Y-m-d");
        return $this->analyticalModel->getPendingPartnerAssets($today);
    }

    public function get_approved_partner_assets()
    {
        return $this->analyticalModel->getApprovedPartnerAssets();
    }

    public function migrate_asset_request_info($appID)
    {
        return $this->analyticalModel->migrate_asset_request_info($appID);
    }

    public function get_total_transactions()
    {
        return $this->analyticalModel->getTotalTransactions();
    }

    public function get_total_amount() {
        // Query Database for Amount Totals (by User and by Partners)
        $totalAmountsData = $this->analyticalModel->getTotalAmounts();
        $getPartnerAssetOrders = $this->analyticalModel->getTotalPartnerAmounts();
    
        // Ensure the returned data is an object and has the expected properties
        $totalTransFees = 'N/A';
        $totalTransTotals = 'N/A';
        $totalTransFeesPlain = '0.00';
        $totalTransTotalsPlain = '0.00';
    
        if (!empty($totalAmountsData)) {
            if (isset($totalAmountsData['fees'])) {
                $totalTransFees = ($totalAmountsData['fees'] > 0) 
                                  ? '<span>$' . number_format($totalAmountsData['fees'], 2) . '</span>' 
                                  : '<span class="statusRed">-$' . number_format($totalAmountsData['fees'], 2) . '</span>';
                $totalTransFeesPlain = number_format($totalAmountsData['fees'], 2, '.', '');
            }
            if (isset($totalAmountsData['amount'])) {
                $totalTransTotals = ($totalAmountsData['amount'] > 0) 
                                    ? '<span>$' . number_format($totalAmountsData['amount'], 2) . '</span>' 
                                    : '<span class="statusRed">-$' . number_format($totalAmountsData['amount'], 2) . '</span>';
                $totalTransTotalsPlain = number_format($totalAmountsData['amount'], 2, '.', '');
            }
        }
    
        // Define Partner Total Amounts
        $totalPartnerTransFees = '$0.00';
        $totalPartnerTransFeesPlain = '0.00';
        $totalPartnerTransTotals = '$0.00';
        $totalPartnerTransTotalsPlain = '0.00';
    
        if (!empty($getPartnerAssetOrders)) {
            foreach ($getPartnerAssetOrders as $partnerAssets) {
                if (isset($partnerAssets['fees'])) {
                    if ($partnerAssets['fees'] > 0) {
                        $totalPartnerTransFees = '<span>$' . number_format($partnerAssets['fees'], 2) . '</span>';
                        $totalPartnerTransFeesPlain = '0.00';
                    } elseif ($partnerAssets['fees'] < 0) {
                        $totalPartnerTransFees = '<span class="statusRed">-$' . number_format($partnerAssets['fees'], 2) . '</span>';
                        $totalPartnerTransFeesPlain = '0.00';
                    }
                }
                if (isset($partnerAssets['amount'])) {
                    if ($partnerAssets['amount'] > 0) {
                        $totalPartnerTransTotals = '<span>$' . number_format($partnerAssets['amount'], 2) . '</span>';
                        $totalPartnerTransTotalsPlain = $partnerAssets['amount'];
                    } elseif ($partnerAssets['amount'] < 0) {
                        $totalPartnerTransTotals = '<span class="statusRed">-$' . number_format($partnerAssets['amount'], 2) . '</span>';
                        $totalPartnerTransTotalsPlain = $partnerAssets['amount'];
                    }
                }
            }
        }
    
        $totalAmounts = [
            'getTotalAmounts' => $totalAmountsData,
            'getPartnerAssetOrders' => $getPartnerAssetOrders,
            'totalTransFees' => $totalTransFees,
            'totalTransTotals' => $totalTransTotals,
            'totalTransFeesPlain' => $totalTransFeesPlain,
            'totalTransTotalsPlain' => $totalTransTotalsPlain,
            'totalPartnerTransTotals' => $totalPartnerTransTotals,
            'totalPartnerTransTotalsPlain' => $totalPartnerTransTotalsPlain,
            'totalPartnerTransFees' => $totalPartnerTransFees,
            'totalPartnerTransFeesPlain' => $totalPartnerTransFeesPlain
        ];
    
        return $totalAmounts;
    }    

    public function get_last_total_amount()
    {
        return $this->analyticalModel->getLastTotalAmount();
    }

    public function get_pending_support($department)
    {
        return $this->analyticalModel->getPendingSupport($department);
    }

    public function get_complete_support($department)
    {
        return $this->analyticalModel->getCompleteSupport($department);
    }

    public function get_total_active_wallets()
    {
        return $this->analyticalModel->getTotalActiveWallets();
    }

    public function get_total_default_wallets()
    {
        return $this->analyticalModel->getTotalActiveDefaultWallets();
    }

    public function get_total_wallet_transactions()
    {
        return $this->analyticalModel->getTotalWalletTransactions();
    }

    public function get_total_trades_tracked()
    {
        return $this->analyticalModel->getTotalTradesTracked();
    }

    public function get_pending_users()
    {
        return $this->analyticalModel->getPendingUsers();
    }

    public function get_active_users()
    {
        return $this->analyticalModel->getActiveUsers();
    }

    public function get_inactive_users()
    {
        return $this->analyticalModel->getInactiveUsers();
    }

    public function get_pending_partners()
    {
        return $this->analyticalModel->getPendingPartners();
    }

    public function get_active_partners()
    {
        return $this->analyticalModel->getActivePartners();
    }

    public function get_inactive_partners()
    {
        return $this->analyticalModel->getInactivePartners();
    }

    public function get_department_tasks($department, $tasks)
{
    $tasksByDepartment = $this->analyticalModel->get_tasks_by_department($department); 
    $totalTasksByDepartment = $tasksByDepartment['num_rows'];
    $totalTasksByTypeArr = [];

    foreach ($tasks as $taskType) {
        $tasksByType = $this->analyticalModel->get_tasks_by_type($department, $taskType); 
        $totalTasksByTypeArr[$taskType] = $tasksByType['num_rows'];
    }

    $departmentPendingTasks = array(
        'getTasksByDepartment' => $tasksByDepartment['result'],
        'totalTasks' => $totalTasksByDepartment,
        'totalTasksByType' => $totalTasksByTypeArr,
    );

    return $departmentPendingTasks; 
}
    // Other methods follow a similar pattern
    // Replace CI3 style calls with CI4 style
    // Use model methods directly for database interactions
    // Use session and request services for session data and URI segments
}
