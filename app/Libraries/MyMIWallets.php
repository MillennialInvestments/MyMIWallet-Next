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
    private array $tableColumnCache = [];

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
                $rawRows = call_user_func([$this->walletModel, $methodName], $this->cuID);
                $rows = $this->normalizeWalletResult($rawRows);
                $count = is_array($rows) ? count($rows) : 0;
                log_message('debug', 'MyMIWallets::getUserWallets user={user} type={type} rows={count}', [
                    'user'  => $this->cuID,
                    'type'  => strtolower($type),
                    'count' => $count,
                ]);

                $walletData[strtolower($type) . 'Wallets'] = array_map(
                    [$this, 'processWalletData'],
                    $rows
                );
            } else {
                log_message('debug', 'MyMIWallets::getUserWallets missing method {method}', [
                    'method' => $methodName,
                ]);
            }
        }

        return $walletData;
    }

    public function getUserBankAccounts($cuID) {
        $getBankAccounts = $this->walletModel->getUserBankAccounts($this->cuID); 
        return $getBankAccounts; 
    }

    private function processWalletData(array $defaultWallet): array {
        $broker = $defaultWallet['broker']
            ?? $defaultWallet['bank_name']
            ?? $defaultWallet['exchange']
            ?? $defaultWallet['provider']
            ?? $defaultWallet['debtor']
            ?? null;

        $nickname = $defaultWallet['nickname']
            ?? $defaultWallet['account_name']
            ?? $defaultWallet['label']
            ?? null;

        $walletTitle = $this->buildWalletTitle($broker, $nickname);

        return [
            'walletID'         => (int)($defaultWallet['id'] ?? 0),
            'walletTitle'      => $walletTitle,
            'walletAmount'     => $this->resolveWalletAmount($defaultWallet),
            'walletBroker'     => $broker,
            'walletNickname'   => $nickname,
            'walletDefault'    => $defaultWallet['default_wallet'] ?? null,
            'walletExchange'   => $defaultWallet['exchange_wallet'] ?? ($defaultWallet['exchange'] ?? null),
            'walletMarketPair' => $defaultWallet['market_pair'] ?? null,
            'walletMarket'     => $defaultWallet['market'] ?? ($defaultWallet['account_type'] ?? ($defaultWallet['wallet_type'] ?? null)),
            'walletStatus'     => $defaultWallet['status'] ?? null,
            'walletType'       => $defaultWallet['wallet_type'] ?? $defaultWallet['account_type'] ?? null,
            'walletCategory'   => $defaultWallet['category'] ?? null,
        ];
    }

    private function buildWalletTitle(?string $broker, ?string $nickname): string
    {
        $broker   = $broker ? trim($broker) : '';
        $nickname = $nickname ? trim($nickname) : '';

        if ($nickname !== '' && $broker !== '' && strcasecmp($broker, $nickname) !== 0) {
            return sprintf('%s - %s', $broker, $nickname);
        }

        return $nickname !== '' ? $nickname : ($broker !== '' ? $broker : 'Wallet');
    }

    private function resolveWalletAmount(array $wallet): float
    {
        $candidates = [
            $wallet['walletAmount'] ?? null,
            $wallet['available_balance'] ?? null,
            $wallet['current_balance'] ?? null,
            $wallet['balance'] ?? null,
            $wallet['amount'] ?? null,
            $wallet['investment_amount'] ?? null,
            $wallet['net_worth'] ?? null,
        ];

        foreach ($candidates as $candidate) {
            if ($candidate === null || $candidate === '') {
                continue;
            }

            if (is_numeric($candidate)) {
                return (float)$candidate;
            }

            $normalized = preg_replace('/[^0-9.\-]/', '', (string)$candidate);
            if ($normalized !== '' && is_numeric($normalized)) {
                return (float)$normalized;
            }
        }

        return 0.0;
    }

    private function normalizeWalletResult($rows): array
    {
        if (is_array($rows)) {
            return $rows;
        }

        if ($rows instanceof BaseResult) {
            return $rows->getResultArray();
        }

        if ($rows instanceof \Traversable) {
            return \iterator_to_array($rows, true);
        }

        return [];
    }

    private function tableHasColumn(string $table, string $column): bool
    {
        $column = strtolower($column);
        if (!isset($this->tableColumnCache[$table])) {
            try {
                $fields = db_connect()->getFieldNames($table);
            } catch (\Throwable $e) {
                $fields = [];
            }
            $this->tableColumnCache[$table] = array_map('strtolower', $fields ?? []);
        }

        return in_array($column, $this->tableColumnCache[$table], true);
    }

    public function reconcileUserWallets(int $userId, bool $logSummary = true): array
    {
        $summary = [
            'userId'    => $userId,
            'processed' => 0,
            'created'   => 0,
            'issues'    => [],
            'orphans'   => [],
        ];

        if ($userId <= 0) {
            return $summary;
        }

        $wallets = $this->walletModel->listByUser($userId, null, false);
        $summary['processed'] = count($wallets);

        $walletIds = [];

        foreach ($wallets as $wallet) {
            $walletIds[] = (int)($wallet['id'] ?? 0);
            $mapping = $this->walletModel->mapWalletRow($wallet);
            if (!$mapping) {
                continue;
            }

            $subsidiary = $this->walletModel->findSubsidiaryForWallet($wallet);
            if (empty($subsidiary['row'])) {
                $created = $this->walletModel->createSubsidiaryFromWallet($mapping['type'], $wallet);
                if ($created) {
                    $summary['created']++;
                    $subsidiary['row'] = $created;
                }
            } elseif (!empty($subsidiary['table']) && !empty($subsidiary['row']['id'])) {
                $this->walletModel->ensureSubsidiaryLink(
                    $subsidiary['table'],
                    (int)$subsidiary['row']['id'],
                    (int)$wallet['id']
                );
            }

            if (!empty($subsidiary['row'])) {
                $missing = $this->walletModel->requiredMissingForType(
                    $mapping['type'],
                    $subsidiary['row'],
                    $subsidiary['table']
                );
                if (!empty($missing)) {
                    $summary['issues'][] = [
                        'wallet_id'  => (int)$wallet['id'],
                        'subsidiary' => $mapping['type'],
                        'missing'    => $missing,
                    ];
                }
            }
        }

        $db = db_connect();
        $subsidiaryTables = [
            'bank'       => 'bf_users_bank_accounts',
            'credit'     => 'bf_users_credit_accounts',
            'crypto'     => 'bf_users_crypto_accounts',
            'debt'       => 'bf_users_debt_accounts',
            'investment' => 'bf_users_invest_accounts',
        ];

        foreach ($subsidiaryTables as $type => $table) {
            $builder = $db->table($table)->where('user_id', $userId);
            if ($this->tableHasColumn($table, 'deleted')) {
                $builder->where('deleted', 0);
            }
            $rows = $builder->get()->getResultArray();
            foreach ($rows as $row) {
                $walletId = (int)($row['wallet_id'] ?? 0);
                if ($walletId === 0 || !in_array($walletId, $walletIds, true)) {
                    $summary['orphans'][] = [
                        'type'      => $type,
                        'record_id' => (int)($row['id'] ?? 0),
                        'wallet_id' => $walletId,
                    ];
                }
            }
        }

        if ($logSummary) {
            log_message('info', 'Wallet reconciliation summary user={user} processed={processed} created={created} issues={issues} orphans={orphans}', [
                'user'      => $userId,
                'processed' => $summary['processed'],
                'created'   => $summary['created'],
                'issues'    => count($summary['issues']),
                'orphans'   => count($summary['orphans']),
            ]);
        }

        return $summary;
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
