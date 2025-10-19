<?php

namespace App\Modules\User\Controllers;

use App\Controllers\UserController;
use App\Libraries\{MyMIWallet, MyMISolana};
use App\Models\{MyMIGoldModel, WalletModel};
use App\Services\{AccountService, CurrencyService, GoalTrackingService, MarketingService, SolanaService, TransactionService, WalletService, WalletSummaryCalculator};
use CodeIgniter\HTTP\RedirectResponse;
use DateTime;
use Exception;

#[\AllowDynamicProperties]
class WalletsController extends UserController
{

    protected $API;
    protected $auth;
    protected $logger;
    protected $session;
    protected $promotionSettings;
    protected $siteSettings;
    protected $uri;
    protected $accountService;
    protected $budgetService;
    protected $currencyService;
    protected $dashboardService;
    protected $goalTrackingService;
    protected $marketingService;
    protected $solanaService;
    protected $transactionService;
    protected $walletService;
    protected $mymigoldModel;
    protected $walletModel;

    /** Cached per-request aggregates */
    private ?array $budgetSnapshot = null;
    private ?array $solanaSnapshot = null;
    private ?array $walletSummaryCache = null;
    private ?array $accountCollections = null;
    private ?array $userCommonData = null;

    /** Lazily-resolved helpers */
    private ?WalletService $walletsSvc = null;
    private ?WalletSummaryCalculator $summaryCalculator = null;
    private ?MyMISolana $solanaLibrary = null;
    protected $userAccount;
    protected $helpers = ['auth', 'form', 'url'];

    public function __construct()
    {
//         $this->auth = service('authentication');
//         $this->API = config('APIs');
//         $this->siteSettings = config('SiteSettings');
//         $this->promotionSettings = config('promotionSettings');
//         $this->request = service('request');
//         $this->session = Services::session();
//         $this->debug = $this->siteSettings->debug;
//         $this->uri = $this->request->getUri();
//         $this->logger = service('logger');

//         $this->walletModel = new WalletModel();
//         $this->accountService = new AccountService();
//         $this->budgetService = new BudgetService();
//         $this->goalTrackingService = new GoalTrackingService();
//         $this->solanaService = new SolanaService();
//         $this->walletService = new WalletService($this->logger, $this->walletModel);
// //         $this->MyMIUser = new MyMIUser(); // replaced by BaseController getter
//         $this->cuID   = $this->getMyMIUser()->getCurrentUserId() ?? $this->session->get('cuID');
//         if (empty($this->cuID)) {
//             log_message('debug', 'WalletsController::__construct - cuID missing; defaulting to 0 for manual wallet ops');
//             $this->cuID = 0;
//         }
//         // log_message('debug', "InvestmentsController: cuID initialized as {$this->cuID}");
//         $this->userAccount = $this->getMyMIUser()->getUserInformation($this->cuID);
//         $userBudget = $this->getMyMIBudget()->getUserBudget($this->cuID); 
//         // log_message('info', 'DashboardController L72 - $checkingSummary: ' . $userBudget['checkingSummary']);
//         $this->data['checkingSummary'] = $userBudget['checkingSummary'];
        helper($this->helpers);

        $this->walletModel        = new WalletModel();
        $this->accountService     = new AccountService();
        $this->currencyService    = new CurrencyService();
        $this->goalTrackingService= new GoalTrackingService();
        $this->marketingService   = new MarketingService();
        $this->solanaService      = new SolanaService();
        $this->transactionService = new TransactionService();
        $this->mymigoldModel      = new MyMIGoldModel();
    }

    /**
     * Normalize form post into DB-ready array by wallet type.
     */
    private function mapFormToWalletData(string $type, array $post): array
    {
        $status  = 1;
        $active  = in_array($post['active'] ?? '1', ['1', 1, 'true', 'on', 'Yes'], true) ? 1 : 0;
        $beta    = in_array($post['beta'] ?? '0', ['1', 1, 'true', 'on', 'Yes'], true) ? 1 : 0;
        $now     = date('Y-m-d H:i:s');

        $base = [
            'status'     => $status,
            'active'     => $active,
            'beta'       => $beta,
            'user_id'    => (int)($post['user_id'] ?? $this->cuID),
            'user_email' => (string)($post['user_email'] ?? ''),
            'username'   => (string)($post['username'] ?? ''),
            'updated_on' => $now,
        ];

        switch (strtolower($type)) {
            case 'bank':
                return $base + [
                    'wallet_type'    => 'Bank',
                    'bank_name'      => (string)($post['bank_name'] ?? ''),
                    'account_type'   => (string)($post['account_type'] ?? ''),
                    'account_number' => (string)($post['account_number'] ?? ''),
                    'routing_number' => (string)($post['routing_number'] ?? ''),
                    'balance'        => (float)($post['balance'] ?? 0),
                    'nickname'       => (string)($post['nickname'] ?? ''),
                ];
            case 'investment':
                return $base + [
                    'wallet_type'       => 'Investment',
                    'broker'            => (string)($post['broker'] ?? ''),
                    'account_type'      => (string)($post['account_type'] ?? ''),
                    'nickname'          => (string)($post['nickname'] ?? ''),
                    'investment_amount' => (float)($post['amount'] ?? 0),
                    'net_worth'         => (float)($post['net_worth'] ?? 0),
                    'available_funds'   => (float)($post['available_funds'] ?? 0),
                    'investment_type'   => (string)($post['investment_type'] ?? ''),
                    'investment_date'   => (string)($post['investment_date'] ?? ''),
                    'symbol'            => (string)($post['symbol'] ?? ''),
                    'account_number'    => (string)($post['account_number'] ?? ''),
                ];
            case 'crypto':
                return $base + [
                    'wallet_type'  => 'Crypto',
                    'exchange'     => (string)($post['exchange'] ?? ''),
                    'network'      => (string)($post['network'] ?? ''),
                    'address'      => (string)($post['address'] ?? ''),
                    'nickname'     => (string)($post['nickname'] ?? ''),
                    'balance'      => (float)($post['balance'] ?? 0),
                ];
            default:
                return $base + ['wallet_type' => ucfirst($type)];
        }
    }

    // public function commonData(): array
    // {
    //     $this->data = parent::commonData();
    //     // $cuID = $this->cuID;
    //     // $userData = $this->getMyMIUser()->getUserInformation($cuID);
    //     // $totalAvailableBalance = $this->getBudgetService()->getTotalAvailableBalance($debtAccounts);

    //     // $this->data['debug'] = $this->siteSettings->debug;
    //     // $this->data['siteSettings'] = $this->siteSettings;
    //     // $this->data['uri'] = $this->request->getUri();
    //     // $this->data['userAgent'] = $this->request->getUserAgent();
    //     // $this->data['cuID'] = $cuID;
    //     // $this->data['cuDisplayName'] = $userData['cuDisplayName'];
    //     // $this->data['cuEmail'] = $userData['cuEmail'];
    //     // $this->data['cuRole'] = $userData['cuRole'];
    //     // $this->data['cuKYC'] = $userData['cuKYC'];
    //     // $this->data['cuUserType'] = $userData['cuUserType'];
    //     // $this->data['totalAccountBalanceFMT'] = $totalAvailableBalance ?? 0.00;

    //     // $dashboardInfo = $this->getMyMIDashboard()->dashboardInfo($cuID);
    //     // $this->data['progressGoalData'] = $dashboardInfo['progressGoalData'];
    //     // $this->data['promotionalBanners'] = $dashboardInfo['promotionalBanners'];

    //     // $this->data['completedGoals'] = $this->getGoalTrackingService()->getCompletedGoals($cuID) ?? [];
    //     // $this->data['pendingGoals'] = $this->getGoalTrackingService()->getPendingGoals($cuID);

    //     // $userSolanaData = $this->getSolanaService()->getSolanaData($cuID);
    //     // $this->data['cuSolanaDW'] = $userSolanaData['userSolanaWallets']['cuSolanaDW'] ?? null;
    //     // $this->data['cuSolanaTotal'] = $userSolanaData['userSolanaWallets']['cuSolanaTotal'] ?? 0;
    //     // $this->data['cuSolanaValue'] = $userSolanaData['userSolanaWallets']['cuSolanaValue'] ?? 0;

    //     // Fetch user data via a UserService
    //     // if (!empty($this->getuserService()->commonData())) { 
    //     //     $userData = $this->getuserService()->commonData();  // Assume this service optimally fetches all user-related data
    //     // } else {
    //     //     log_message('error', 'Failed to retrieve user ID.');
    //     //     return redirect()->to('/login')->with('redirect_url', current_url())->send();
    //     // }
    //     $this->data = $this->data ?? [];
    //     // Fetch data from UserService
    //     $userData = $this->getuserService()->commonData(); 
    //     // Merge the user data with BudgetController data
    //     $this->data = array_merge($this->data, $userData);  
    
    //     // Fetch general site settings
    //     $this->data['siteSettings'] = $this->siteSettings;
    //     $this->data['beta'] = (string)$this->siteSettings->beta;
    //     $this->data['uri'] = $this->request->getUri();
    //     $this->data['date'] = $this->siteSettings->date;
    //     $this->data['time'] = $this->siteSettings->time;
    //     $this->data['hostTime'] = $this->siteSettings->hostTime;
    
    //     // Optimize dashboard data retrieval (use caching if necessary)
    //     $dashboardInfo = $this->getDashboardService()->getDashboardInfo($this->cuID);  // Batch fetch data
    //     $this->data['completedGoals'] = $this->getGoalTrackingService()->getCompletedGoals($this->cuID);
    //     $this->data['pendingGoals'] = $this->getGoalTrackingService()->getPendingGoals($this->cuID);
    //     $this->data['promotionalBanners'] = $dashboardInfo['promotionalBanners'];
    
    //     // Fetch total account balance and cache it (to avoid repeated calls)
    //     $userBudget = $this->getBudgetService()->getUserBudget($this->cuID);
    //     $this->data['totalAccountBalance'] = $userBudget['totalAccountBalance'] ?? 0;
    //     $this->data['totalAccountBalanceFMT'] = $userBudget['totalAccountBalanceFMT'] ?? '0.00';
        
    //     // Fetch Solana data (consider using a caching strategy)
    //     $userSolanaData = $this->getSolanaService()->getSolanaData($this->cuID);
    //     $this->data['cuSolanaDW'] = $userSolanaData['userSolanaWallets']['cuSolanaDW'] ?? null;
    //     // Ensure Solana network status exists to avoid "Undefined array key"
    //     try {
    //         if (!isset($this->solanaService)) {
    //             $this->solanaService = service('solanaService');
    //         }
    //         $this->data['solanaNetworkStatus'] = $this->solanaService->getNetworkStatus();
    //     } catch (\Throwable $e) {
    //         log_message('error', 'WalletsController getNetworkStatus failed: {msg}', ['msg' => $e->getMessage()]);
    //         $this->data['solanaNetworkStatus'] = [
    //             'healthy' => false, 'slot' => null, 'version' => null, 'error' => $e->getMessage(),
    //         ];
    //     }

    //     $this->data['cuSolanaTotal'] = $userSolanaData['userSolanaWallets']['cuSolanaTotal'] ?? 0;
    //     $this->data['cuSolanaValue'] = $userSolanaData['userSolanaWallets']['cuSolanaValue'] ?? 0;
    
    //     // Merge user data into the $this->data array (if not already handled by a service)
    //     $this->data = array_merge($this->data, $userData);
    
    //     // Conditionally run debug-specific logic
    //     if ($this->debug === 1) {
    //         // Add your debug logic here
    //     }
    //     $this->data['getUserBankAccounts'] = $this->accountService->getUserBankAccounts($this->cuID);
    //     $this->data['getUserCreditAccounts'] = $this->accountService->getUserCreditAccounts($this->cuID);
    //     $this->data['getUserCryptoAccounts'] = $this->accountService->getUserCryptoAccounts($this->cuID);
    //     $this->data['getUserDebtAccounts'] = $this->accountService->getUserDebtAccounts($this->cuID);
    //     $this->data['getUserInvestAccounts'] = $this->accountService->getUserInvestAccounts($this->cuID);

    //     $this->data['getBudgetRecordsIsDebt'] = $this->getMyMIBudget()->getBudgetRecordsIsDebt($this->cuID);

    //     $this->data['checkingSummaryFMT'] = number_format($this->getMyMIBudget()->getUserBudget($this->cuID)['checkingSummary'] ?? 0, 2);
    //     $this->data['cryptoSummaryFMT'] = number_format($this->getMyMIBudget()->getUserBudget($this->cuID)['cryptoSummary'] ?? 0, 2);
    //     $this->data['debtSummaryFMT'] = number_format($this->getMyMIBudget()->getUserBudget($this->cuID)['debtSummary'] ?? 0, 2);
    //     $this->data['investSummaryFMT'] = number_format($this->getMyMIBudget()->getUserBudget($this->cuID)['investSummary'] ?? 0, 2);

    //     $walletSummary = $this->getMyMIWallet()->getWalletSummaries($this->cuID);
    //     $this->data['walletSummary'] = $walletSummary['totalWalletSummaries'];
    //     return $this->data;
    // }

    

    private function guardAuthenticated(): ?RedirectResponse
    {
        $cuID = $this->resolveCurrentUserId();
        if ($cuID && $cuID > 0) {
            return null;
        }

        log_message('warning', 'WalletsController guard failed; redirecting to login.');

        return redirect()->to('/login')->with('redirect_url', current_url());
    }

    private function loadUserCommonData(): array
    {
        if ($this->userCommonData !== null) {
            return $this->userCommonData;
        }

        $this->userCommonData = [];
        $cuID = $this->resolveCurrentUserId();
        if (!$cuID) {
            return $this->userCommonData;
        }

        try {
            $userData = $this->getUserService()->commonData();
            if (is_array($userData)) {
                $this->userCommonData = $userData;
            }
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController::loadUserCommonData failed: {message}', [
                'message' => $e->getMessage(),
            ]);
        }

        return $this->userCommonData;
    }

    private function loadBudgetSnapshot(): array
    {
        if ($this->budgetSnapshot !== null) {
            return $this->budgetSnapshot;
        }

        $defaults = [
            'raw'       => [],
            'totals'    => [
                'checking'        => 0.0,
                'crypto'          => 0.0,
                'debt'            => 0.0,
                'invest'          => 0.0,
                'creditAvailable' => 0.0,
                'creditLimit'     => 0.0,
            ],
            'formatted' => [],
            'meta'      => [
                'generatedAt' => null,
                'source'      => 'none',
            ],
        ];

        $this->budgetSnapshot = $defaults;
        $cuID = $this->resolveCurrentUserId();
        if (!$cuID) {
            return $this->budgetSnapshot;
        }

        $cacheKey = 'wallets:budget:' . $cuID;
        $cacheKeySanitized = sanitizedCacheKey($cacheKey);
        $cache    = service('cache');
        if ($cache) {
            $cached = $cache->get($cacheKeySanitized);
            if (is_array($cached)) {
                $cached['meta']['source'] = 'cache';
                $this->budgetSnapshot = $cached + $defaults;
                return $this->budgetSnapshot;
            }
        }

        try {
            $budget = $this->getMyMIBudget()->getUserBudget($cuID) ?? [];
            $totals = [
                'checking'        => (float)($budget['checkingSummary'] ?? 0),
                'crypto'          => (float)($budget['cryptoSummary'] ?? 0),
                'debt'            => max(0.0, (float)($budget['debtSummary'] ?? 0)),
                'debtAvailable'   => (float)($budget['debtAvailable'] ?? 0),
                'debtCreditLimit' => (float)($budget['debtCreditLimit'] ?? 0),
                'invest'          => (float)($budget['investSummary'] ?? 0),
                'creditAvailable' => (float)($budget['creditAvailable'] ?? 0),
                'creditLimit'     => (float)($budget['creditLimit'] ?? 0),
            ];

            $formatted = [];
            foreach ($totals as $key => $value) {
                $formatted[$key] = $this->formatCurrency($value);
            }

            $this->budgetSnapshot = [
                'raw'       => $budget,
                'totals'    => $totals,
                'formatted' => $formatted,
                'meta'      => [
                    'generatedAt' => date(DateTime::ATOM),
                    'source'      => 'fresh',
                ],
            ];

            if ($cache) {
                $cache->save($cacheKeySanitized, $this->budgetSnapshot, 60);
            }
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController::loadBudgetSnapshot failed: {message}', [
                'message' => $e->getMessage(),
            ]);
        }

        return $this->budgetSnapshot;
    }

    protected function getMyMISolana(): MyMISolana
    {
        return $this->solanaLibrary ??= new MyMISolana();
    }

    private function loadSolanaSnapshot(): array
    {
        if ($this->solanaSnapshot !== null) {
            return $this->solanaSnapshot;
        }

        $this->solanaSnapshot = [
            'wallet' => null,
            'totals' => [
                'quantity' => 0.0,
                'value'    => 0.0,
            ],
            'network' => [
                'healthy' => false,
                'slot'    => null,
                'version' => null,
                'error'   => null,
            ],
        ];

        $cuID = $this->resolveCurrentUserId();
        if (!$cuID) {
            return $this->solanaSnapshot;
        }

        try {
            $solana = $this->getMyMISolana()->getUserSolana($cuID) ?? [];

            $this->solanaSnapshot['wallet'] = $solana['cuSolanaDW'] ?? null;
            $this->solanaSnapshot['totals']['quantity'] = (float)($solana['cuSolanaTotal'] ?? 0);
            $this->solanaSnapshot['totals']['value']    = (float)($solana['cuSolanaValue'] ?? 0);

            $network = $solana['solanaNetworkStatus'] ?? [];
            if (!is_array($network) || !array_key_exists('healthy', $network)) {
                try {
                    $network = $this->getSolanaService()->getNetworkStatus();
                } catch (\Throwable $networkException) {
                    $network = ['healthy' => false, 'slot' => null, 'version' => null, 'error' => $networkException->getMessage()];
                }
            }

            $this->solanaSnapshot['network'] = array_merge($this->solanaSnapshot['network'], $network);
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController::loadSolanaSnapshot failed: {message}', [
                'message' => $e->getMessage(),
            ]);
            $this->solanaSnapshot['network']['error'] = $e->getMessage();
        }

        return $this->solanaSnapshot;
    }

    private function loadWalletSummary(): array
    {
        if ($this->walletSummaryCache !== null) {
            return $this->walletSummaryCache;
        }

        $this->walletSummaryCache = [];
        $cuID = $this->resolveCurrentUserId();
        if (!$cuID) {
            return $this->walletSummaryCache;
        }

        try {
            $summary = $this->getMyMIWallet()->getWalletSummaries($cuID);
            if (is_array($summary)) {
                $this->walletSummaryCache = $summary;
            }
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController::loadWalletSummary failed: {message}', [
                'message' => $e->getMessage(),
            ]);
        }

        return $this->walletSummaryCache;
    }

    private function loadAccountCollections(int $cuID): array
    {
        if ($this->accountCollections !== null) {
            return $this->accountCollections;
        }

        $collections = [
            'bank'        => [],
            'credit'      => [],
            'crypto'      => [],
            'debt'        => [],
            'investment'  => [],
        ];

        if ($cuID <= 0) {
            $this->accountCollections = $collections;
            return $this->accountCollections;
        }

        try {
            $collections['bank']       = $this->accountService->getUserBankAccounts($cuID) ?? [];
            $collections['credit']     = $this->accountService->getUserCreditAccounts($cuID) ?? [];
            $collections['crypto']     = $this->accountService->getUserCryptoAccounts($cuID) ?? [];
            $collections['debt']       = $this->accountService->getUserDebtAccounts($cuID) ?? [];
            $collections['investment'] = $this->accountService->getUserInvestAccounts($cuID) ?? [];
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController::loadAccountCollections failed: {message}', [
                'message' => $e->getMessage(),
            ]);
        }

        $this->accountCollections = $collections;

        return $this->accountCollections;
    }

    private function getSummaryCalculator(): WalletSummaryCalculator
    {
        return $this->summaryCalculator ??= new WalletSummaryCalculator();
    }

    private function buildFinancialSummary(array $budgetSnapshot): array
    {
        $totals  = $budgetSnapshot['totals'] ?? [];
        $signals = [
            'thisMonthsInvestments' => (float)($budgetSnapshot['raw']['thisMonthsInvestments'] ?? 0),
            'thisMonthsSurplus'     => (float)($budgetSnapshot['raw']['thisMonthsSurplus'] ?? 0),
        ];

        $calculator = $this->getSummaryCalculator();
        $values     = $calculator->calculate($totals, $signals);

        $formatted = [];
        foreach ($values as $key => $value) {
            if (is_array($value)) {
                continue;
            }
            $formatted[$key] = $this->formatCurrency($value);
        }

        if (isset($values['breakdown']) && is_array($values['breakdown'])) {
            $formatted['breakdown'] = [];
            foreach ($values['breakdown'] as $bk => $bv) {
                $formatted['breakdown'][$bk] = $this->formatCurrency($bv);
            }
        }

        return [
            'values'    => $values,
            'formatted' => $formatted,
            'asOf'      => $budgetSnapshot['meta']['generatedAt'] ?? null,
            'source'    => $budgetSnapshot['meta']['source'] ?? 'unknown',
        ];
    }

    private function formatCurrency(float $value): string
    {
        return number_format($value, 2, '.', ',');
    }

    public function commonData(): array
    {
        $base = parent::commonData();
        $cuID = $this->resolveCurrentUserId() ?? 0;

        $userData = $this->loadUserCommonData();
        if (!empty($userData)) {
            $base = array_merge($base, $userData);
        }

        $budgetSnapshot = $this->loadBudgetSnapshot();
        $solanaSnapshot = $this->loadSolanaSnapshot();
        $walletSummary  = $this->loadWalletSummary();

        $base['userBudget'] = $budgetSnapshot['raw'];

        foreach (['checking', 'crypto', 'debt', 'invest'] as $key) {
            $value = $budgetSnapshot['totals'][$key] ?? 0.0;
            $base[$key . 'Summary']    = $value;
            $base[$key . 'SummaryFMT'] = $budgetSnapshot['formatted'][$key] ?? $this->formatCurrency($value);
        }

        $base['creditAvailable']    = $budgetSnapshot['totals']['creditAvailable'] ?? 0.0;
        $base['creditAvailableFMT'] = $budgetSnapshot['formatted']['creditAvailable'] ?? $this->formatCurrency($base['creditAvailable']);
        $base['creditLimit']        = $budgetSnapshot['totals']['creditLimit'] ?? 0.0;
        $base['creditLimitFMT']     = $budgetSnapshot['formatted']['creditLimit'] ?? $this->formatCurrency($base['creditLimit']);

        $base['debtAvailable']    = $budgetSnapshot['totals']['debtAvailable'] ?? 0.0;
        $base['debtAvailableFMT'] = $budgetSnapshot['formatted']['debtAvailable'] ?? $this->formatCurrency($base['debtAvailable']);
        $base['debtCreditLimit']    = $budgetSnapshot['totals']['debtCreditLimit'] ?? 0.0;
        $base['debtCreditLimitFMT'] = $budgetSnapshot['formatted']['debtCreditLimit'] ?? $this->formatCurrency($base['debtCreditLimit']);

        $base['financialSummary'] = $this->buildFinancialSummary($budgetSnapshot);

        $base['cuSolanaDW']    = $solanaSnapshot['wallet'];
        $base['cuSolanaTotal'] = $solanaSnapshot['totals']['quantity'];
        $base['cuSolanaValue'] = $solanaSnapshot['totals']['value'];
        $base['solanaNetworkStatus'] = $solanaSnapshot['network'];

        $accounts = $this->loadAccountCollections($cuID);
        $base['accountCollections']   = $accounts;
        $base['getUserBankAccounts']  = $accounts['bank'];
        $base['getUserCreditAccounts']= $accounts['credit'];
        $base['getUserCryptoAccounts']= $accounts['crypto'];
        $base['getUserDebtAccounts']  = $accounts['debt'];
        $base['getUserInvestAccounts']= $accounts['investment'];

        try {
            $base['getBudgetRecordsIsDebt'] = $this->getMyMIBudget()->getBudgetRecordsIsDebt($cuID);
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController::commonData getBudgetRecordsIsDebt failed: {message}', [
                'message' => $e->getMessage(),
            ]);
            $base['getBudgetRecordsIsDebt'] = [];
        }

        if (!empty($walletSummary['totalWalletSummaries'])) {
            $base['walletSummary'] = $walletSummary['totalWalletSummaries'];
        } elseif (!empty($walletSummary)) {
            $base['walletSummary'] = $walletSummary;
        } else {
            $base['walletSummary'] = [];
        }

        if ($cuID > 0) {
            try {
                $dashboardInfo = $this->getDashboardService()->getDashboardInfo($cuID);
                $base['promotionalBanners'] = $dashboardInfo['promotionalBanners'] ?? [];
            } catch (\Throwable $e) {
                log_message('error', 'WalletsController::commonData dashboard info failed: {message}', [
                    'message' => $e->getMessage(),
                ]);
                $base['promotionalBanners'] = $base['promotionalBanners'] ?? [];
            }

            try {
                $base['completedGoals'] = $this->goalTrackingService->getCompletedGoals($cuID) ?? [];
                $base['pendingGoals']   = $this->goalTrackingService->getPendingGoals($cuID) ?? [];
            } catch (\Throwable $e) {
                log_message('error', 'WalletsController::commonData goals failed: {message}', [
                    'message' => $e->getMessage(),
                ]);
            }
        }

        $this->data = $base;
        return $this->data;
    }

    public function index()
    {
        $this->data['pageTitle'] = 'My Wallets | MyMI Wallet | The Future of Finance';

        if ($redirect = $this->guardAuthenticated()) {
            return $redirect;
        }

        $cuID = (int)($this->resolveCurrentUserId() ?? 0);

        $budgetSnapshot = $this->loadBudgetSnapshot();
        $solanaSnapshot = $this->loadSolanaSnapshot();
        $accounts       = $this->loadAccountCollections($cuID);

        $this->commonData();

        try {
            $this->data['getUserWallets'] = $this->walletModel->getUserWallets($cuID);
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController@index getUserWallets failed: {message}', [
                'message' => $e->getMessage(),
            ]);
            $this->data['getUserWallets'] = [];
        }

        $this->data['creditAvailable']    = $budgetSnapshot['totals']['creditAvailable'] ?? 0.0;
        $this->data['creditAvailableFMT'] = $budgetSnapshot['formatted']['creditAvailable'] ?? $this->formatCurrency($this->data['creditAvailable']);
        $this->data['creditLimit']        = $budgetSnapshot['totals']['creditLimit'] ?? 0.0;
        $this->data['creditLimitFMT']     = $budgetSnapshot['formatted']['creditLimit'] ?? $this->formatCurrency($this->data['creditLimit']);

        $this->data['financialSummary'] = $this->buildFinancialSummary($budgetSnapshot);

        $this->data['accountCollections'] = $accounts;

        $this->data['walletDataSources'] = [
            'budget' => $budgetSnapshot['meta'],
            'solana' => [
                'healthy' => $solanaSnapshot['network']['healthy'] ?? false,
                'error'   => $solanaSnapshot['network']['error'] ?? null,
            ],
            'generatedAt' => date(DateTime::ATOM),
        ];

        return $this->renderTheme('App\Modules\User\Views\Wallets\index', $this->data);
    }

    // public function index()
    // {
    //     $this->data['pageTitle'] = 'My Wallets | MyMI Wallet | The Future of Finance';

    //     // Hard guard: if not logged in, do NOT hit wallet queries
    //     $cuID = (int) ($this->cuID ?? 0);
    //     if ($cuID <= 0) {
    //         log_message('warning', 'WalletsController@index: cuID missing; rendering empty wallets list.');
    //         $this->data['getUserWallets']   = [];
    //         $this->data['creditAvailable']  = 0.0;
    //         $this->data['creditAvailableFMT'] = number_format(0, 2);
    //         $this->data['creditLimit']      = 0.0;
    //         $this->data['creditLimitFMT']   = number_format(0, 2);

    //         $this->commonData();
    //         return $this->renderTheme('App\Modules\User\Views\Wallets\index', $this->data);
    //     }

    //     // Logged-in path (safe)
    //     $this->data['getUserWallets'] = $this->walletModel->getUserWallets($cuID);

    //     // Avoid duplicate heavy calls
    //     $all = $this->getMyMIBudget()->allUserBudgetInfo($cuID);
    //     $creditAvailable = (float) ($all['creditAvailable'] ?? 0);
    //     $creditLimit     = (float) ($all['creditLimit'] ?? 0);

    //     $this->data['creditAvailable']    = $creditAvailable;
    //     $this->data['creditAvailableFMT'] = number_format($creditAvailable, 2);
    //     $this->data['creditLimit']        = $creditLimit;
    //     $this->data['creditLimitFMT']     = number_format($creditLimit, 2);

    //     $this->commonData();
    //     return $this->renderTheme('App\Modules\User\Views\Wallets\index', $this->data);
    // }

    public function add()
    {
        log_message('debug', "WalletsController::add - START");
        
        if ($this->request->getMethod() === 'POST') {
            log_message('debug', "WalletsController::add - POST detected.");
            
             $walletType = (string)($this->request->getPost('wallet_type') ?? '');
            $data       = $this->mapFormToWalletData(strtolower($walletType), $this->request->getPost());
            $data['created_on'] = date('Y-m-d H:i:s');

            $service = $this->walletsSvc ?? $this->getWalletService();
            $this->walletsSvc = $service;

            // if ($service && method_exists($service, 'validateNewWalletData')) {
            //     $validation = $service->validateNewWalletData($data);
            //     if ($validation !== true) {
            //         log_message('warning', 'WalletsController::add - Validation failed: {errors}', ['errors' => json_encode($validation)]);
            //         $this->commonData();
            //         $this->data['pageTitle'] = 'Add New Wallet | MyMI Wallet | The Future of Finance';
            //         $this->data['validationErrors'] = $validation;
            //         return $this->renderTheme('App\Modules\User\Views\Wallets\Add', $this->data);
            //     }
            // } else {    

            $service = $this->walletsSvc ?? $this->getWalletService();
            $this->walletsSvc = $service;

            if ($service && method_exists($service, 'create')) {
                $id = $service->create($data);
            } else {
                $id = $this->walletModel->insert($data, true);
            }

            log_message('info', 'WalletsController::add - Wallet added successfully. ID: {id}', ['id' => $id]);
            return redirect()->to('/Wallets')->with('message', ucfirst($walletType) . ' wallet added successfully.');
        }
        $this->commonData();
        $this->data['pageTitle'] = 'Add New Wallet | MyMI Wallet | The Future of Finance';
        return $this->renderTheme('App\Modules\User\Views\Wallets\Add', $this->data);
    }

    /**
     * Normalize & whitelist payload for a given account type.
     * $type: bank|credit|debt|investment|crypto
     */
    public function prepareAccountData(array $payload, string $type): array
    {
        $type = strtolower($type);

        // tiny sanitizers
        $clean = static function($v) {
            if (is_string($v)) return trim($v);
            return $v;
        };

        // common optional fields present in your forms
        $nickname = $clean($payload['nickname'] ?? ($payload['accountNickname'] ?? null));

        switch ($type) {
            case 'bank':
                $map = [
                    'bank_name'      => $payload['bank_name']       ?? $payload['accountBank']      ?? null,
                    'account_type'   => $payload['account_type']    ?? $payload['accountTypeText']  ?? null,
                    'account_number' => $payload['account_number']  ?? null,
                    'routing_number' => $payload['routing_number']  ?? null,
                    'bank_account_owner' => $payload['bank_account_owner'] ?? null,
                    'balance'        => $payload['balance']         ?? $payload['accountBalance']   ?? null,
                    'nickname'       => $nickname,
                ];
                break;

            case 'credit':
                $map = [
                    'bank_name'         => $payload['bank_name']          ?? null,
                    'account_number'    => $payload['account_number']     ?? null,
                    'nickname'          => $nickname,
                    'credit_limit'      => $payload['credit_limit']       ?? $payload['accountCreditLimit']      ?? null,
                    'current_balance'   => $payload['current_balance']    ?? $payload['accountCurrentBalance']   ?? null,
                    'available_balance' => $payload['available_balance']  ?? $payload['accountAvailableBalance'] ?? null,
                    'credit_status'     => $payload['credit_status']      ?? $payload['accountCreditStatus']     ?? null,
                    'due_date'          => $payload['due_date']           ?? $payload['accountDueDate']          ?? null,
                    'payment_due'       => $payload['payment_due']        ?? $payload['accountPaymentDue']       ?? null,
                    'interest_rate'     => $payload['interest_rate']      ?? $payload['accountInterestRate']     ?? null,
                ];
                break;

            case 'debt':
                $map = [
                    'account_status'    => $payload['account_status']     ?? $payload['accountStatus']           ?? null,
                    'account_type'      => $payload['account_type']       ?? $payload['accountSourceType']       ?? null,
                    'debtor'            => $payload['debtor']             ?? $payload['accountDebtor']           ?? null,
                    'nickname'          => $nickname,
                    'account_number'    => $payload['account_number']     ?? null,
                    'due_date'          => $payload['due_date']           ?? $payload['accountDueDate']          ?? null,
                    'credit_limit'      => $payload['credit_limit']       ?? $payload['accountCreditLimit']      ?? null,
                    'current_balance'   => $payload['current_balance']    ?? $payload['accountCurrentBalance']   ?? null,
                    'available_balance' => $payload['available_balance']  ?? $payload['accountAvailableBalance'] ?? null,
                    'monthly_payment'   => $payload['monthly_payment']    ?? $payload['accountMonthlyPayment']   ?? null,
                    'interest_rate'     => $payload['interest_rate']      ?? $payload['accountInterestRate']     ?? null,
                ];
                break;

            case 'investment':
                $map = [
                    'nickname'        => $nickname,
                    'broker'          => $payload['broker']          ?? $payload['accountBroker']        ?? null,
                    'account_number'  => $payload['account_number']  ?? null,
                    'amount'          => $payload['amount']          ?? $payload['accountAmount']        ?? null,
                    'initial_value'   => $payload['initial_value']   ?? $payload['accountInitialValue']  ?? null,
                    'available_funds' => $payload['available_funds'] ?? $payload['accountAvailableFunds']?? null,
                    'net_worth'       => $payload['net_worth']       ?? $payload['accountNetWorth']      ?? null,
                ];
                break;

            case 'crypto':
                // adjust if you have a dedicated table/columns
                $map = [
                    'nickname'       => $nickname,
                    'account_number' => $payload['account_number'] ?? null,
                    'balance'        => $payload['balance']        ?? null,
                ];
                break;

            default:
                $map = [];
        }

        // Strip nulls so we don't update unset columns.
        $filtered = array_filter($map, static fn($v) => $v !== null);

        log_message('debug', 'Prepared data for {t}: {d}', [
            't' => $type,
            'd' => print_r($filtered, true),
        ]);

        return $filtered;
    }
    
    // public function edit($accountType = null, $accountID = null)
    // {
    //     log_message('debug', "WalletsController::edit - START: AccountType: {$accountType}, AccountID: {$accountID}");
    
    //     if ($this->request->getMethod() === 'POST') {
    //         log_message('debug', "WalletsController::edit - POST detected.");
    
    //         $formData = $this->request->getPost();
    //         log_message('debug', "WalletsController::edit - FormData: " . print_r($formData, true));
    
    //         // Common wallet data
    //         $commonWalletData = [
    //             'status' => 1,
    //             'active' => isset($formData['active']) && $formData['active'] === 'Yes' ? 1 : 0,
    //             'beta' => $formData['beta'],
    //             'user_id' => $formData['user_id'],
    //             'user_email' => $formData['user_email'],
    //             'username' => $formData['username'],
    //             // 'wallet_type' => $formData['wallet_type'],
    //             'updated_on' => date('Y-m-d H:i:s'),
    //         ];
    
    //         try {
    //             $accountTypes = [
    //                 'editBankAccount' => 'bank',
    //                 'editCreditAccount' => 'credit',
    //                 'editDebtAccount' => 'debt',
    //                 'editInvestAccount' => 'investment',
    //                 'editCryptoAccount' => 'crypto',
    //             ];
    
    //             if (!isset($accountTypes[$accountType])) {
    //                 log_message('error', "WalletsController::edit - Invalid account type: {$accountType}");
    //                 return redirect()->back()->with('error', 'Invalid account type.');
    //             }
    
    //             // Prepare specific data based on account type
    //             $preparedData = $this->getWalletService()->prepareAccountData($formData, $accountTypes[$accountType]);
    //             log_message('debug', "WalletsController::edit - PreparedData: " . print_r($preparedData, true));
    
    //             // Merge common data
    //             $walletData = array_merge($commonWalletData, $preparedData);
    
    //             // Call appropriate service method
    //             $editMethod = "edit" . ucfirst($accountTypes[$accountType]) . "Wallet";
    //             if (!method_exists($this->walletService, $editMethod)) {
    //                 throw new \Exception("Invalid method: {$editMethod}");
    //             }
    
    //             $result = $this->getWalletService()->$editMethod($accountID, $walletData);
    
    //             if ($result) {
    //                 log_message('info', "WalletsController::edit - Wallet updated successfully for AccountID: {$accountID}");
    //                 return redirect()->to('/Wallets')->with('message', ucfirst($accountType) . ' wallet updated successfully.');
    //             } else {
    //                 log_message('error', "WalletsController::edit - Failed to update wallet for AccountID: {$accountID}");
    //                 return redirect()->back()->withInput()->with('error', 'Failed to update wallet.');
    //             }
    //         } catch (\Exception $e) {
    //             log_message('error', "WalletsController::edit - Exception: {$e->getMessage()}");
    //             return redirect()->back()->withInput()->with('error', 'An error occurred. Please try again.');
    //         }
    //     }
    
    //     // For GET requests, load the form
    //     log_message('debug', "WalletsController::edit - Loading edit form for AccountType: {$accountType}, AccountID: {$accountID}");
    //     $this->data['accountID'] = $accountID;
    //     $this->data['accountType'] = $accountType;
    //     $this->commonData();
    //     return $this->renderTheme('App\Modules\User\Views\Wallets\Edit', $this->data);
    // }

    /**
     * POST /Wallets/Edit/{accountType}/{id}
     * e.g. /Wallets/Edit/editBankAccount/89
     */
    // public function edit(string $accountType = '', $id = null)
    // {
    //     log_message('debug', 'WalletsController::edit - START: AccountType: {t}, AccountID: {i}', ['t' => $accountType, 'i' => $id]);

    //     if (strtolower($this->request->getMethod()) !== 'post') {
    //         return $this->response->setStatusCode(405)->setBody('Method Not Allowed');
    //     }

    //     $type = $this->mapType($accountType); // bank|credit|debt|investment|crypto
    //     if ($type === null) {
    //         return $this->response->setJSON(['status' => 'error', 'message' => 'Unsupported account type'])->setStatusCode(400);
    //     }

    //     $id = (int) $id;
    //     if ($id <= 0) {
    //         return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid account id'])->setStatusCode(422);
    //     }

    //     // Accept JSON, FormData, or urlencoded
    //     $payload = $this->request->getPost();
    //     if (empty($payload)) {
    //         $payload = $this->request->getRawInput();
    //     }
    //     if (empty($payload) && str_starts_with($this->request->getHeaderLine('Content-Type'), 'application/json')) {
    //         $payload = $this->request->getJSON(true) ?: [];
    //     }
    //     log_message('debug', 'WalletsController::edit - FormData: {p}', ['p' => print_r($payload, true)]);

    //     try {
    //         // Use your existing prep function (already maps modal fields)
    //         $prepared = $this->walletService->prepareAccountData($payload, $type);
    //         log_message('debug', 'WalletsController::edit - PreparedData: {p}', ['p' => print_r($prepared, true)]);

    //         // >>> CHANGE: go through WalletModel once to update subsidiary + bf_users_wallet together
    //         /** @var \App\Models\WalletModel $wm */
    //         $wm = model(\App\Models\WalletModel::class);
    //         $ok = $wm->updateAccountAndWallet($type, $id, $prepared, (int) $this->cuID);

    //         if ($ok) {
    //             log_message('info', 'WalletsController::edit - Wallet updated successfully for AccountID: {id}', ['id' => $id]);
    //             if ($this->request->isAJAX()) {
    //                 return $this->response->setJSON(['status' => 'success']);
    //             }
    //             return redirect()->back()->with('message', 'Wallet updated');
    //         }

    //         if ($this->request->isAJAX()) {
    //             return $this->response->setJSON(['status' => 'error', 'message' => 'Update failed'])->setStatusCode(500);
    //         }
    //         return redirect()->back()->with('error', 'Update failed');

    //     } catch (\Throwable $e) {
    //         log_message('error', 'WalletsController::edit - Exception: {m}', ['m' => $e->getMessage()]);
    //         if ($this->request->isAJAX()) {
    //             return $this->response->setJSON(['status' => 'error', 'message' => 'Server error: ' . $e->getMessage()])->setStatusCode(500);
    //         }
    //         return redirect()->back()->with('error', 'Server error.');
    //     }
    // }
    public function edit($accountType = null, $accountID = null)
    {
        log_message('debug', 'WalletsController::edit - START: AccountType: ' . $accountType . ', AccountID: ' . $accountID);

        if ($this->request->getMethod() === 'POST') {
            $walletId   = (int)$this->request->getPost('wallet_id', FILTER_VALIDATE_INT);
            $walletType = (string)($this->request->getPost('wallet_type') ?? $this->request->getVar('wallet_type') ?? '');
            $data       = $this->mapFormToWalletData(strtolower($walletType), $this->request->getPost());

            if ($this->walletsSvc && method_exists($this->walletsSvc, 'update')) {
                $ok = $this->walletsSvc->update($walletId, $data);
            } else {
                $ok = $this->walletModel->update($walletId, $data);
            }

            log_message('info', 'WalletsController::edit - Wallet updated {status} for AccountID: {id}', [
                'status' => $ok ? 'successfully' : 'FAILED',
                'id'     => $walletId,
            ]);

            return redirect()->to('/Wallets')->with('message', ucfirst($walletType) . ' wallet updated successfully.');
        }

        $this->data['accountID']   = $accountID;
        $this->data['accountType'] = $accountType;
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Wallets\Edit', $this->data);
    }

    // REPLACE the entire submitEdit() with this (for non-AJAX fallbacks using a form POST)
    public function submitEdit()
    {
        log_message('debug', 'WalletsController::submitEdit - Form submission started.');
        $formData   = $this->request->getPost();
        log_message('debug', "WalletsController::submitEdit - FormData: " . print_r($formData, true));

        $accountType = $formData['accountType'] ?? null; // e.g., editBankAccount
        $accountID   = (int)($formData['accountID'] ?? 0);

        try {
            $accountTypes = [
                'editBankAccount'   => 'bank',
                'editCreditAccount' => 'credit',
                'editDebtAccount'   => 'debt',
                'editInvestAccount' => 'investment',
                'editCryptoAccount' => 'crypto',
            ];
            if (!isset($accountTypes[$accountType]) || $accountID <= 0) {
                log_message('error', "submitEdit - Invalid account type or id: type={$accountType}, id={$accountID}");
                return redirect()->back()->withInput()->with('error', 'Invalid account type or id.');
            }

            $type     = $accountTypes[$accountType];
            $prepared = $this->getWalletService()->prepareAccountData($formData, $type);
            log_message('debug', "WalletsController::submitEdit - PreparedData: " . print_r($prepared, true));

            /** @var \App\Models\WalletModel $wm */
            $wm = model(\App\Models\WalletModel::class);
            $result = $wm->updateAccountAndWallet($type, $accountID, $prepared, (int) $this->cuID);

            if ($result) {
                log_message('info', "Wallet updated successfully for AccountID: {$accountID}");
                return redirect()->to('/Wallets')->with('message', ucfirst($accountType) . ' wallet updated successfully.');
            } else {
                log_message('error', "Wallet update failed for AccountID: {$accountID}");
                return redirect()->back()->withInput()->with('error', 'Failed to update wallet.');
            }
        } catch (Exception $e) {
            log_message('error', "Error in WalletsController::submitEdit: {$e->getMessage()}");
            return redirect()->back()->withInput()->with('error', 'An error occurred. Please try again.');
        }
    }


    /**
     * Map edit route segment to normalized type the service/model expects.
     */
    private function mapType(string $accountType): ?string
    {
        $accountType = strtolower($accountType);
        return match ($accountType) {
            'editbankaccount'   => 'bank',
            'editcreditaccount' => 'credit',
            'editdebtaccount'   => 'debt',
            'editinvestaccount' => 'investment',
            'editcryptoaccount' => 'crypto',
            default             => null,
        };
    }
    
    public function delete($id = null)
    {
        $id = (int)($id ?? $this->request->getPost('wallet_id'));
        if (!$id) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Missing wallet_id']);
        }

        $row = $this->walletModel->find($id);
        if (!$row || (int)$row['user_id'] !== (int)$this->cuID) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Not found or not permitted']);
        }

        $this->walletModel->delete($id);
        log_message('info', 'WalletsController::delete - Deleted wallet {id}', ['id' => $id]);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function copy($accountID)
    {
        if ($this->request->getMethod() === 'post') {
            $formData = $this->request->getPost();
            if (!isset($formData['wallet_type'])) {
                return redirect()->back()->with('error', 'Wallet type is required.');
            }

            $accountType = $formData['wallet_type'];
            $walletModelMethod = '';
            $accountInfoMethod = '';

            switch ($accountType) {
                case 'Bank':
                    $accountInfoMethod = 'getBankAccountInfo';
                    $walletModelMethod = 'addBankWallet';
                    break;
                case 'Credit':
                    $accountInfoMethod = 'getCreditAccountInfo';
                    $walletModelMethod = 'addCreditWallet';
                    break;
                case 'Debt':
                    $accountInfoMethod = 'getDebtAccountInfo';
                    $walletModelMethod = 'addDebtWallet';
                    break;
                case 'Investment':
                    $accountInfoMethod = 'getInvestmentAccountInfo';
                    $walletModelMethod = 'addInvestmentWallet';
                    break;
            }

            $previousData = $this->getWalletService()->$accountInfoMethod($accountID);
            unset($previousData['id']);
            $previousData['user_id'] = $formData['user_id'];
            $this->getWalletService()->$walletModelMethod($previousData);

            return redirect()->to('/Wallets')->with('message', ucfirst($accountType) . ' account copied successfully');
        }
    }

    // Example of using the CurrencyService and TransactionService within a deposit method
    public function deposit()
    {
        $amount = $this->request->getPost('amount');
        $walletID = $this->request->getPost('wallet_id');
        $currency = $this->request->getPost('currency', 'USD'); // Default to USD

        try {
            // Convert amount to USD if needed
            $convertedAmount = $this->currencyService->convert($amount, $currency, 'USD');

            // Log the transaction with a status of "Pending"
            $transactionID = $this->transactionService->logTransaction('Deposit', $walletID, $this->cuID, $convertedAmount);

            // Process the deposit through the WalletService
            $this->getWalletService()->depositFunds($walletID, $convertedAmount);

            // Complete the deposit and update the transaction status
            $this->transactionService->completeDeposit($transactionID);

            return redirect()->to('/Wallets')->with('message', 'Deposit successful.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error during deposit: ' . $e->getMessage());
        }
    }

    // Example of using CurrencyService and TransactionService within a withdrawal method
    public function withdraw()
    {
        $amount = $this->request->getPost('amount');
        $walletID = $this->request->getPost('wallet_id');
        $currency = $this->request->getPost('currency', 'USD'); // Default to USD

        try {
            // Convert amount to USD if needed
            $convertedAmount = $this->currencyService->convert($amount, $currency, 'USD');

            // Log the transaction with a status of "Pending"
            $transactionID = $this->transactionService->logTransaction('Withdrawal', $walletID, $this->cuID, $convertedAmount);

            // Process the withdrawal through the WalletService
            $this->getWalletService()->withdrawFunds($walletID, $convertedAmount);

            // Complete the withdrawal and update the transaction status
            $this->transactionService->completeDeposit($transactionID);

            return redirect()->to('/Wallets')->with('message', 'Withdrawal successful.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error during withdrawal: ' . $e->getMessage());
        }
    }

    // Method to handle currency exchange between wallets
    public function exchangeCurrency()
    {
        $fromWalletID = $this->request->getPost('from_wallet_id');
        $toWalletID = $this->request->getPost('to_wallet_id');
        $amount = $this->request->getPost('amount');
        $fromCurrency = $this->request->getPost('from_currency');
        $toCurrency = $this->request->getPost('to_currency');

        try {
            // Convert amount from one currency to another
            $convertedAmount = $this->currencyService->convert($amount, $fromCurrency, $toCurrency);

            // Log the currency exchange as a transaction
            $transactionID = $this->transactionService->logTransaction('Exchange', $fromWalletID, $this->cuID, $convertedAmount);

            // Transfer between wallets using WalletService
            $this->getWalletService()->exchangeFunds($fromWalletID, $toWalletID, $convertedAmount);

            return redirect()->to('/Wallets')->with('message', 'Currency exchanged successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error during currency exchange: ' . $e->getMessage());
        }
    }

    public function details($accountID)
    {
        $uri = $this->request->getUri();
        $accountType = $uri->getSegment(2);
        $accountInfoMethod = '';

        switch ($accountType) {
            case 'Banking':
                $accountInfoMethod = 'getBankAccountInfo';
                break;
            case 'Credit':
                $accountInfoMethod = 'getCreditAccountInfo';
                break;
            case 'Debt':
                $accountInfoMethod = 'getDebtAccountInfo';
                break;
            case 'Investment':
                $accountInfoMethod = 'getInvestmentAccountInfo';
                break;
        }

        $this->data['previousData'] = $this->getWalletService()->$accountInfoMethod($accountID);
        $this->data['pageTitle'] = 'Wallet Details | MyMI Wallet | The Future of Finance';
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Wallets\Details', $this->data);
    }

    public function transferFunds()
    {
        $this->data['pageTitle'] = 'Transfer Funds | MyMI Wallet | The Future of Finance';
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Wallets\Transfer_Funds', $this->data);
    }

    public function executeSwap()
    {
        $fromToken = $this->request->getPost('fromToken');
        $toToken = $this->request->getPost('toToken');
        $amount = $this->request->getPost('amount');

        $result = $this->getWalletService()->executeSwap($fromToken, $toToken, $amount);
        return $this->response->setJSON($result);
    }

    public function walletSelection()
    {
        $this->data['pageTitle'] = 'Select Wallet | MyMI Wallet | The Future of Finance';
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Wallets\Wallet_Selection', $this->data);
    }

    // Example for the Purchase method:
    // public function purchase()
    // {
    //     $this->data['pageTitle']                = 'Purchase Wallet | MyMI Wallet | The Future of Finance';
    //     $this->commonData($this->cuID); // Ensure this is correctly populating $this->data
    //     // Render the view with the compiled data
    //     return $this->renderTheme('App\Modules\User\Views\Wallets\Purchase', $this->data);
    // }

    public function purchase()
    {
        if ($this->uri->getTotalSegments() >= 2) {
            if ($this->uri->getSegment(2) === 'Purchase') {
                if ($this->uri->getTotalSegments() >= 4) {
                    if ($this->uri->getSegment(4) === 'Starter' || $this->uri->getSegment(4) === 'Basic' || $this->uri->getSegment(4) === 'Pro' || $this->uri->getSegment(4) === 'Premium') {
                        if ($this->uri->getTotalSegments() >= 5) {
                            $promoCode = $this->uri->getSegment(5);
                        } else {
                            $promoCode = $this->request->getGet('promo_code') ?? '';
                        }
                    }
                }
            }
        }
        log_message('debug', 'WalletsController L466 - $promoCode: ' . $promoCode);
        $this->data['promoCode'] = $promoCode;

        $discount = 0;
        if (!empty($promoCode) && isset($this->promotionsConfig->promoCodes[$promoCode])) {
            $discount = $this->promotionsConfig->promoCodes[$promoCode];
        }

        $membershipFee = $this->request->getPost('membership_fee') ?? 100; // Example fee
        $finalAmount = max(0, $membershipFee - $discount); // Ensure no negative amounts

        $this->data['membershipFee'] = $membershipFee;
        $this->data['discount'] = $discount;
        $this->data['finalAmount'] = $finalAmount;

        // Add logic for premium service purchases
        $serviceId = $this->request->getPost('service_id');
        $tier = $this->request->getPost('tier');

        if ($serviceId) {
            $service = $this->db->table('bf_users_services')->where('id', $serviceId)->get()->getRowArray();
            if (!$service) {
                return redirect()->back()->with('error', 'Service not found.');
            }

            $finalServiceAmount = max(0, $service['price'] - $discount);

            $this->data['service'] = $service;
            $this->data['tier'] = $tier;
            $this->data['finalServiceAmount'] = $finalServiceAmount;
        }

        $this->commonData($this->cuID); // Ensure this is correctly populating $this->data

        return $this->renderTheme('UserModule\Views\Wallets\Purchase', $this->data);
    }

    // !! 12/15/2024 - Working Version of Code
    // public function purchase()
    // {
        
    //     if ($this->uri->getTotalSegments() >= 2) {
    //         if ($this->uri->getSegment(2) === 'Purchase') {
    //             if ($this->uri->getTotalSegments() >= 4) {
    //                 if ($this->uri->getSegment(4) === 'Starter' OR 'Basic' OR 'Pro' OR 'Premium') {
    //                     if ($this->uri->getTotalSegments() >= 5) {
    //                         $promoCode = $this->uri->getSegment(5); 
    //                     } else {
    //                         if (!$this->request->getGet('promo_code')) {
    //                             $promoCode = ''; 
    //                         } else {
    //                             $promoCode = $this->request->getGet('promo_code'); // Get promo code from URL or input
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }
    //     log_message('debug', 'WalletsController L466 - $promoCode: ' . $promoCode);
    //     $this->data['promoCode'] = $promoCode; 
        
    //     // if ($this->uri->getTotalSegments() >= 5) {
    //     //     $promoCode = $this->uri->getSegment(4); // Get promo code from URL or input
    //     // } else {
    //     //     if (!$this->request->getGet('promo_code')) {
    //     //         $promoCode = $this->request->getGet('promo_code'); // Get promo code from URL or input
    //     //     } else {
    //     //         $promoCode = NULL; 
    //     //     }
    //     // }
    //     $discount = 0;
    
    //     if (!empty($promoCode) && isset($this->promotionsConfig->promoCodes[$promoCode])) {
    //         $discount = $this->promotionsConfig->promoCodes[$promoCode];
    //     }
    
    //     $membershipFee = $this->request->getPost('membership_fee') ?? 100; // Example fee
    //     $finalAmount = max(0, $membershipFee - $discount); // Ensure no negative amounts
    
    //     $this->data['membershipFee'] = $membershipFee;
    //     $this->data['discount'] = $discount;
    //     $this->data['finalAmount'] = $finalAmount;
    //     $this->commonData($this->cuID); // Ensure this is correctly populating $this->data
    //     return $this->renderTheme('UserModule\Views\Wallets\Purchase', $this->data);
    // }
    
    public function purchaseGold()
    {
        $this->data['pageTitle'] = 'Purchase MyMI Gold | MyMI Wallet | The Future of Finance';
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Wallets\Purchase_MyMI_Gold', $this->data);
    }

    // Example for the Purchase_MyMI_Gold method:
    public function purchaseMyMIGold()
    {
        $this->data['pageTitle']                = 'Purchase MyMI Gold | MyMI Wallet | The Future of Finance';
        $this->commonData($this->cuID); // Ensure this is correctly populating $this->data
        // Render the view with the compiled data
        return $this->renderTheme('App\Modules\User\Views\Wallets\Purchase_MyMI_Gold', $this->data);
    }

    public function handleMyMIGPayPalCallback()
    {
        $request = $this->request;// Code to capture values from input and PayPal transaction ID
        $transactionID = $request->getPost('transaction_id');
        $totalCost = $request->getPost('total_cost');
        $walletID = $request->getPost('wallet_id');
        $userID = $request->getPost('user_id');
        $userEmail = $request->getPost('user_email');
        $transFee = $request->getPost('trans_fee');

        // Add other required data here

        $data = [
            'transaction_id' => $transactionID,
            'total_cost' => $totalCost,
            'user_id' => $userID,
            'wallet_id' => $walletID,
            'user_email' => $userEmail,
            'status' => 'completed',
            'active' => 1,
            'unix_timestamp' => time(),
            'submitted_date' => date('Y-m-d H:i:s'),
            'trans_type' => 'MyMI Gold Purchase', // Adjust accordingly
            'currency' => 'USD',
            'amount' => $totalCost,
            'fees' => $transFee,
            'type' => 'Purchase'
        ];

        $this->walletsModel->submitMyMIGold($data);

        return redirect()->to('/Wallets/Purchase/MyMIGold/Complete/' . $transactionID);
    }
    
    public function purchaseMembershipSuccess()
    {
        // Append or overwrite specific keys for the current view context
        $this->data['pageTitle']                = 'Add New Wallet | MyMI Wallet | The Future of Finance';
        $this->commonData(); // Ensure this is correctly populating $this->data
        // Render the view with the compiled data
        echo view('App/Modules/User\Views\Wallets\Purchase\Memberships\Success', $this->data);
    }

    // Example for the Complete_Purchase method:
    public function completePurchase()
    {
        $this->data['pageTitle']                = 'Complete Your Purchase | MyMI Wallet | The Future of Finance';
        $this->commonData($this->cuID); // Ensure this is correctly populating $this->data
        // Render the view with the compiled data
        return $this->renderTheme('App\Modules\User\Views\Wallets\Complete_Purchase', $this->data);
    }

    public function purchaseComplete($coin = null, $trans_id = null)
    {
        $this->data['pageTitle'] = 'Purchase Complete | MyMI Wallet | The Future of Finance';
        $this->commonData($this->cuID);
    
        if (!$trans_id) {
            $getUserLastOrderID = $this->mymigoldModel->getLastCompletedOrderIDByUser($this->cuID);
            $trans_id = $getUserLastOrderID[0]['id'] ?? null;
        }
    
        log_message('debug', 'WalletsController L490 - $trans_id: ' . $trans_id);
    
        // Fetch completed order information
        $userLastCompletedOrder = $this->mymigoldModel->getLastCompletedOrderInfo($trans_id);
    
        log_message('debug', 'WalletsController L493 - $userLastCompletedOrder: ' . print_r($userLastCompletedOrder, true));
    
        // Validate ownership of the transaction
        if ($userLastCompletedOrder && $userLastCompletedOrder['user_id'] == $this->cuID) {
            $this->data['userLastCompletedOrder'] = $userLastCompletedOrder;
    
            // Check if this is a service purchase
            if (!empty($userLastCompletedOrder['service_id'])) {
                $serviceDetails = $this->db->table('bf_users_services_purchases')
                    ->where('id', $userLastCompletedOrder['service_id'])
                    ->get()
                    ->getRowArray();
                $this->data['serviceDetails'] = $serviceDetails;
            }
    
            return $this->renderTheme('App\Modules\User\Views\Wallets\Purchase_Complete', $this->data);
        } else {
            log_message('error', "Unauthorized access attempt by User ID {$this->cuID} for transaction ID {$trans_id}");
    
            // Notify security
            $email = service('email');
            $email->setFrom('no-reply@mymiwallet.com', 'MyMI Wallet');
            $email->setTo('security@mymiwallet.com');
            $email->setSubject('Unauthorized Transaction Access Attempt');
            $email->setMessage("User with ID {$this->cuID} tried to access unauthorized transaction {$trans_id}.");
            $email->send();
    
            $webhook = new Client(['base_uri' => 'https://discord.com/api/webhooks/...']);
            $webhook->post('', ['json' => ['content' => "Alert! User with ID {$this->cuID} tried to access unauthorized transaction: {$trans_id}."]]);
    
            return redirect()->to('/Wallets/Purchase/MyMIGold/Security/' . $trans_id);
        }
    }
    
    // !! 12/15/2024 - Working Verion of Code
    // public function purchaseComplete($coin = null, $trans_id = null)
    // {
    //     // Test Link: https://www.mymiwallet.com/index.php/Wallets/Purchase/Complete/MyMIGold/231
    //     $this->data['pageTitle'] = 'Purchase Complete | MyMI Wallet | The Future of Finance';
    //     $this->commonData($this->cuID);
    
    //     // Retrieve the last transaction ID if not provided
    //     if (!$trans_id) {
    //         $getUserLastOrderID = $this->mymigoldModel->getLastCompletedOrderIDByUser($this->cuID);
    //         $trans_id = $getUserLastOrderID[0]['id'] ?? null;
    //     }
    
    //     log_message('debug', 'WalletsController L490 - $trans_id: ' . $trans_id);
    
    //     // Fetch the last completed order information
    //     $userLastCompletedOrder = $this->mymigoldModel->getLastCompletedOrderInfo($trans_id);
    //     log_message('debug', 'WalletsController L493 - $userLastCompletedOrder: ' . print_r($userLastCompletedOrder, true));
    
    //     // Validate ownership of the transaction
    //     if ($userLastCompletedOrder && $userLastCompletedOrder['user_id'] == $this->cuID) {
    //         $this->data['userLastCompletedOrder'] = $userLastCompletedOrder;
    //         return $this->renderTheme('App\Modules\User\Views\Wallets\Purchase_Complete', $this->data);
    //     } else {
    //         log_message('error', "Unauthorized access attempt by User ID {$this->cuID} for transaction ID {$trans_id}");
    
    //         // Send an email to security@mymiwallet.com
    //         $email = service('email');
    //         $email->setFrom('no-reply@mymiwallet.com', 'MyMI Wallet');
    //         $email->setTo('security@mymiwallet.com');
    //         $email->setSubject('Unauthorized Transaction Access Attempt');
    //         $email->setMessage("User with ID {$this->cuID} tried to access unauthorized transaction {$trans_id}.");
    //         $email->send();
    
    //         // Send a notification to Discord
    //         $webhook = new Client(['base_uri' => 'https://discord.com/api/webhooks/1235020137363411095/tRJOdPsHeSg17Dd1BMdHMBocLkCNL3wmQdf1eqV4DCvp2wGuZze_QR8bTa1rJiLghiYN']);
    //         $response = $webhook->post('', [
    //             'json' => [
    //                 'content' => "Alert! User with ID {$this->cuID} tried to access unauthorized transaction: {$trans_id}."
    //             ]
    //         ]);
    
    //         return redirect()->to('/Wallets/Purchase/MyMIGold/Security/' . $trans_id);
    //     }
    // }
    
    public function securityViolation()    {
        if ($this->uri->getSegment(4) === 'Security') {
            $trans_id = $this->uri->getSegment(5); 
            $this->data['pageTitle'] = 'Security Violation | MyMI Wallet | The Future of Finance';
            $this->data['trans_id'] = $trans_id; 
            $this->commonData($this->cuID);
            return $this->renderTheme('App\Modules\User\Views\Dashboard\Defaults\security', $this->data); // Ensure you have this view set up
        }
    }

    public function confirmDeposit()
    {
        $this->data['pageTitle'] = 'Confirm Deposit | MyMI Wallet | The Future of Finance';
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Wallets\Confirm_Deposit', $this->data);
    }

    public function depositComplete($transID)
    {
        if ($this->getWalletService()->completeDeposit($transID)) {
            session()->setFlashdata('message', 'Funds Deposited Successfully');
            return redirect()->to('/Wallets');
        } else {
            session()->setFlashdata('error', 'Deposit completion failed');
            return redirect()->to('/Wallets');
        }
    }
    
    // 1. View Transaction History
    public function viewTransactionHistory($walletId)
    {
        $this->data['pageTitle'] = 'Transaction History | MyMI Wallet';
        $this->data['transactionHistory'] = $this->getWalletService()->getWalletTransactionHistory($walletId);
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Wallets\Transaction_History', $this->data);
    }

    // 2. Audit Wallet Activities
    public function auditWallet($walletId)
    {
        $this->data['pageTitle'] = 'Audit Wallet | MyMI Wallet';
        $this->data['auditLog'] = $this->getWalletService()->getWalletAuditLog($walletId); // Assuming this method is present in WalletService
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Wallets\Audit_Log', $this->data);
    }

    // 3. Fraud Detection
    public function detectFraud($walletId)
    {
        $fraudDetectionResult = $this->getWalletService()->detectFraudInWallet($walletId); // Assuming fraud detection logic is in the service
        if ($fraudDetectionResult) {
            return redirect()->to('/Wallets')->with('warning', 'Suspicious activity detected in your wallet. Please review.');
        } else {
            return redirect()->to('/Wallets')->with('message', 'No suspicious activity detected.');
        }
    }

    // 4. Handle Currency Conversion for Transactions
    public function convertCurrency($walletId)
    {
        $amount = $this->request->getPost('amount');
        $fromCurrency = $this->request->getPost('fromCurrency');
        $toCurrency = $this->request->getPost('toCurrency');

        $convertedAmount = $this->currencyService->convertCurrency($amount, $fromCurrency, $toCurrency);
        $this->data['convertedAmount'] = $convertedAmount;
        return $this->response->setJSON(['status' => 'success', 'convertedAmount' => $convertedAmount]);
    }

    // 5. Generate Wallet Statements
    public function generateStatement($walletId)
    {
        $statementData = $this->getWalletService()->generateWalletStatement($walletId); // Assuming this method in WalletService
        $this->data['pageTitle'] = 'Wallet Statement | MyMI Wallet';
        $this->data['statement'] = $statementData;
        return $this->renderTheme('App\Modules\User\Views\Wallets\Wallet_Statement', $this->data);
    }

    // 6. Freeze/Unfreeze Wallet (For security purposes)
    public function freezeWallet($walletId)
    {
        if ($this->getWalletService()->freezeWallet($walletId)) {
            return redirect()->to('/Wallets')->with('message', 'Wallet has been frozen successfully.');
        } else {
            return redirect()->to('/Wallets')->with('error', 'Failed to freeze the wallet.');
        }
    }

    public function unfreezeWallet($walletId)
    {
        if ($this->getWalletService()->unfreezeWallet($walletId)) {
            return redirect()->to('/Wallets')->with('message', 'Wallet has been unfrozen successfully.');
        } else {
            return redirect()->to('/Wallets')->with('error', 'Failed to unfreeze the wallet.');
        }
    }

    /**
     * Fetch Available Services
     */
    public function getAvailableServices() {
        $services = $this->db->table('bf_users_services')
            ->where('status', 1)
            ->get()
            ->getResultArray();

        return $this->response->setJSON(['status' => 'success', 'services' => $services]);
    }

    /**
     * Activate Premium Service for a User
     */
    public function activatePremiumService() {
        $userId = $this->request->getPost('user_id');
        $serviceId = $this->request->getPost('service_id');
        $tier = $this->request->getPost('tier');

        $service = $this->db->table('bf_users_services')->where('id', $serviceId)->get()->getRowArray();
        if (!$service) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Service not found.']);
        }

        // Insert purchase data
        $purchaseData = [
            'user_id' => $userId,
            'service_id' => $serviceId,
            'service_name' => $service['service'],
            'cost' => $service['cost'],
            'price' => $service['price'],
            'tier' => $tier,
            'status' => 'active',
            'purchase_time' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('bf_users_services_purchases')->insert($purchaseData);

        // Update user's wallet transaction log
        $transactionLog = [
            'transaction_id' => uniqid('service_'),
            'status' => 'completed',
            'user_id' => $userId,
            'type' => 'Service Purchase',
            'amount' => $service['price'],
            'currency' => 'USD',
            'wallet_id' => $this->request->getPost('wallet_id'),
            'submitted_date' => date('Y-m-d H:i:s'),
        ];
        $this->db->table('bf_users_wallet_transactions')->insert($transactionLog);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Premium service activated.']);
    }

}
?>
