<?php

namespace App\Modules\User\Controllers;

use App\Controllers\BaseUserController;
use App\Libraries\{MyMIWallets, MyMISolana};
use App\Models\{MyMIGoldModel, WalletModel};
use App\Services\{
    AccountService,
    CurrencyService,
    GoalTrackingService,
    MarketingService,
    SolanaService,
    TransactionService,
    WalletService,
    WalletSummaryCalculator
};
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use DateTime;
use Exception;
use Throwable;

#[\AllowDynamicProperties]
class WalletsController extends BaseUserController
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
    protected ?SolanaService $solanaService = null;
    protected $transactionService;
    protected ?WalletService $walletService = null;
    protected $mymigoldModel;
    protected $walletModel;
    protected $userAccount;

    private ?array $budgetSnapshot = null;
    private ?array $solanaSnapshot = null;
    private ?array $walletSummaryCache = null;
    private ?array $accountCollections = null;
    private ?array $userCommonData = null;

    private ?WalletService $walletsSvc = null;
    private ?WalletSummaryCalculator $summaryCalculator = null;
    private ?MyMISolana $solanaLibrary = null;

    protected $helpers = ['auth', 'form', 'url', 'feature', 'premium', 'uri_guard'];
    protected ?ResponseInterface $walletFeatureGuardResponse = null;

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);

        $this->logger   = $logger;
        $this->request  = $request;
        $this->response = $response;
        $this->session  = session();
        $this->uri      = $request->getUri();

        try {
            $this->API = config('APISettings');
        } catch (Throwable $e) {
            $this->API = null;
        }

        try {
            $this->siteSettings = config('SiteSettings');
        } catch (Throwable $e) {
            $this->siteSettings = null;
        }

        try {
            $this->promotionSettings = config('PromotionSettings');
        } catch (Throwable $e) {
            $this->promotionSettings = null;
        }

        helper($this->helpers);

        $this->walletFeatureGuardResponse = $this->resolveWalletFeatureGuard();

        $this->walletModel         = new WalletModel();
        $this->walletService       = new WalletService($this->logger, $this->walletModel);
        $this->walletsSvc          = $this->walletService;
        $this->accountService      = new AccountService();
        $this->currencyService     = new CurrencyService();
        $this->goalTrackingService = new GoalTrackingService();
        $this->marketingService    = new MarketingService();
        $this->solanaService       = $this->resolveSolanaService();
        $this->transactionService  = new TransactionService();
        $this->mymigoldModel       = new MyMIGoldModel();

        $this->cuID = $this->currentWalletUserId();

        log_message('debug', 'WalletsController initialized. cuID={cuID}', [
            'cuID' => (int) $this->cuID,
        ]);
    }

    private function resolveWalletFeatureGuard(): ?ResponseInterface
    {
        $enabled = filter_var(env('FEATURE_WALLETS', true), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

        if ($enabled !== false) {
            return null;
        }

        if (function_exists('feature_guard')) {
            $guard = feature_guard('FEATURE_WALLETS', [
                'controller' => __CLASS__,
                'phase'      => 'phase_a',
                'uri'        => (string) current_url(),
            ]);

            return $guard instanceof ResponseInterface ? $guard : null;
        }

        log_message('warning', 'FEATURE_WALLETS=false but feature_guard() helper is unavailable. Returning 503.');

        return $this->response
            ->setStatusCode(503)
            ->setBody('Wallets are temporarily unavailable.');
    }

    private function guardWalletFeature(): ?ResponseInterface
    {
        return $this->walletFeatureGuardResponse instanceof ResponseInterface
            ? $this->walletFeatureGuardResponse
            : null;
    }

    private function currentWalletUserId(): int
    {
        $candidates = [];

        if (isset($this->cuID)) {
            $candidates[] = $this->cuID;
        }

        if (method_exists($this, 'resolveCurrentUserId')) {
            try {
                $candidates[] = $this->resolveCurrentUserId();
            } catch (Throwable $e) {
                log_message('debug', 'WalletsController currentWalletUserId resolveCurrentUserId failed: {message}', [
                    'message' => $e->getMessage(),
                ]);
            }
        }

        try {
            if (method_exists($this, 'getMyMIUser')) {
                $candidates[] = $this->getMyMIUser()->getCurrentUserId();
            }
        } catch (Throwable $e) {
            log_message('debug', 'WalletsController currentWalletUserId getMyMIUser failed: {message}', [
                'message' => $e->getMessage(),
            ]);
        }

        if ($this->session) {
            $candidates[] = $this->session->get('cuID');
            $candidates[] = $this->session->get('user_id');
        }

        foreach ($candidates as $candidate) {
            $id = (int) ($candidate ?? 0);
            if ($id > 0) {
                return $id;
            }
        }

        return 0;
    }

    private function resolveWalletService(): WalletService
    {
        if ($this->walletsSvc instanceof WalletService) {
            return $this->walletsSvc;
        }

        if ($this->walletService instanceof WalletService) {
            $this->walletsSvc = $this->walletService;
            return $this->walletsSvc;
        }

        if (! $this->walletModel instanceof WalletModel) {
            $this->walletModel = new WalletModel();
        }

        $this->walletService = new WalletService($this->logger, $this->walletModel);
        $this->walletsSvc    = $this->walletService;

        return $this->walletsSvc;
    }

    private function safeCacheService(): ?object
    {
        try {
            $safeCache = service('safeCache');
            return is_object($safeCache) ? $safeCache : null;
        } catch (Throwable $e) {
            log_message('debug', 'WalletsController safeCache unavailable: {message}', [
                'message' => $e->getMessage(),
            ]);
            return null;
        }
    }

    private function resolveSolanaService(): SolanaService
    {
        try {
            $service = service('solanaService');
            if ($service instanceof SolanaService) {
                return $service;
            }
        } catch (Throwable $e) {
            log_message('debug', 'WalletsController resolveSolanaService fallback: {message}', [
                'message' => $e->getMessage(),
            ]);
        }

        return new SolanaService();
    }

    protected function getSolanaService(): SolanaService
    {
        if ($this->solanaService instanceof SolanaService) {
            return $this->solanaService;
        }

        $this->solanaService = $this->resolveSolanaService();

        return $this->solanaService;
    }

    protected function getMyMISolana(): MyMISolana
    {
        return $this->solanaLibrary ??= new MyMISolana();
    }

    private function mapFormToWalletData(string $type, array $post): array
    {
        $status = 1;
        $active = in_array($post['active'] ?? '1', ['1', 1, true, 'true', 'on', 'Yes', 'yes'], true) ? 1 : 0;
        $beta   = in_array($post['beta'] ?? '0', ['1', 1, true, 'true', 'on', 'Yes', 'yes'], true) ? 1 : 0;
        $now    = date('Y-m-d H:i:s');

        $base = [
            'status'     => $status,
            'active'     => $active,
            'beta'       => $beta,
            'user_id'    => (int) ($post['user_id'] ?? $this->currentWalletUserId()),
            'user_email' => (string) ($post['user_email'] ?? ''),
            'username'   => (string) ($post['username'] ?? ''),
            'updated_on' => $now,
        ];

        switch (strtolower($type)) {
            case 'bank':
                return $base + [
                    'wallet_type'    => 'Bank',
                    'bank_name'      => (string) ($post['bank_name'] ?? ''),
                    'account_type'   => (string) ($post['account_type'] ?? ''),
                    'account_number' => (string) ($post['account_number'] ?? ''),
                    'routing_number' => (string) ($post['routing_number'] ?? ''),
                    'balance'        => (float) ($post['balance'] ?? 0),
                    'nickname'       => (string) ($post['nickname'] ?? ''),
                ];

            case 'investment':
            case 'invest':
                return $base + [
                    'wallet_type'       => 'Investment',
                    'broker'            => (string) ($post['broker'] ?? ''),
                    'account_type'      => (string) ($post['account_type'] ?? ''),
                    'nickname'          => (string) ($post['nickname'] ?? ''),
                    'investment_amount' => (float) ($post['amount'] ?? $post['investment_amount'] ?? 0),
                    'net_worth'         => (float) ($post['net_worth'] ?? 0),
                    'available_funds'   => (float) ($post['available_funds'] ?? 0),
                    'investment_type'   => (string) ($post['investment_type'] ?? ''),
                    'investment_date'   => (string) ($post['investment_date'] ?? ''),
                    'symbol'            => (string) ($post['symbol'] ?? ''),
                    'account_number'    => (string) ($post['account_number'] ?? ''),
                ];

            case 'crypto':
                return $base + [
                    'wallet_type' => 'Crypto',
                    'exchange'    => (string) ($post['exchange'] ?? ''),
                    'network'     => (string) ($post['network'] ?? ''),
                    'address'     => (string) ($post['address'] ?? ''),
                    'nickname'    => (string) ($post['nickname'] ?? ''),
                    'balance'     => (float) ($post['balance'] ?? 0),
                ];

            case 'credit':
                return $base + [
                    'wallet_type'       => 'Credit',
                    'bank_name'         => (string) ($post['bank_name'] ?? ''),
                    'account_number'    => (string) ($post['account_number'] ?? ''),
                    'nickname'          => (string) ($post['nickname'] ?? ''),
                    'credit_limit'      => (float) ($post['credit_limit'] ?? 0),
                    'current_balance'   => (float) ($post['current_balance'] ?? 0),
                    'available_balance' => (float) ($post['available_balance'] ?? 0),
                    'due_date'          => (string) ($post['due_date'] ?? ''),
                    'payment_due'       => (float) ($post['payment_due'] ?? 0),
                    'interest_rate'     => (float) ($post['interest_rate'] ?? 0),
                ];

            case 'debt':
                return $base + [
                    'wallet_type'       => 'Debt',
                    'debtor'            => (string) ($post['debtor'] ?? ''),
                    'account_type'      => (string) ($post['account_type'] ?? ''),
                    'account_number'    => (string) ($post['account_number'] ?? ''),
                    'nickname'          => (string) ($post['nickname'] ?? ''),
                    'credit_limit'      => (float) ($post['credit_limit'] ?? 0),
                    'current_balance'   => (float) ($post['current_balance'] ?? 0),
                    'available_balance' => (float) ($post['available_balance'] ?? 0),
                    'monthly_payment'   => (float) ($post['monthly_payment'] ?? 0),
                    'due_date'          => (string) ($post['due_date'] ?? ''),
                    'interest_rate'     => (float) ($post['interest_rate'] ?? 0),
                ];

            default:
                return $base + [
                    'wallet_type' => ucfirst($type ?: 'Wallet'),
                ];
        }
    }

    private function guardAuthenticated(): ?RedirectResponse
    {
        $cuID = $this->currentWalletUserId();
        if ($cuID > 0) {
            return null;
        }

        log_message('warning', 'WalletsController guard failed; redirecting to login.');

        $raw = (string) current_url();
        $sanitized = function_exists('redirect_url_store')
            ? redirect_url_store($raw, [
                'writer'     => 'WalletsController::guardAuthenticated',
                'route'      => trim((string) $this->request->getUri()->getPath(), '/'),
                'request_id' => (string) ($this->request->getHeaderLine('X-Request-Id') ?: ''),
            ])
            : $raw;

        $redirect = redirect()->to('/login');
        return $sanitized ? $redirect->with('redirect_url', $sanitized) : $redirect;
    }

    private function loadUserCommonData(): array
    {
        if ($this->userCommonData !== null) {
            return $this->userCommonData;
        }

        $this->userCommonData = [];
        $cuID = $this->currentWalletUserId();

        if ($cuID <= 0) {
            return $this->userCommonData;
        }

        try {
            if (method_exists($this, 'getUserService')) {
                $userData = $this->getUserService()->commonData();
                if (is_array($userData)) {
                    $this->userCommonData = $userData;
                }
            }
        } catch (Throwable $e) {
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
                'debtAvailable'   => 0.0,
                'debtCreditLimit' => 0.0,
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
        $cuID = $this->currentWalletUserId();

        if ($cuID <= 0) {
            return $this->budgetSnapshot;
        }

        $safeCache = $this->safeCacheService();

        if ($safeCache && method_exists($safeCache, 'getUser')) {
            $cached = $safeCache->getUser('wallets', 'budget', $cuID);
            if (is_array($cached)) {
                $cached = array_replace_recursive($defaults, $cached);
                $cached['meta']['source'] = 'cache';
                $this->budgetSnapshot = $cached;

                return $this->budgetSnapshot;
            }
        }

        try {
            $budget = method_exists($this, 'getMyMIBudget')
                ? ($this->getMyMIBudget()->getUserBudget($cuID) ?? [])
                : [];

            $totals = [
                'checking'        => (float) ($budget['checkingSummary'] ?? 0),
                'crypto'          => (float) ($budget['cryptoSummary'] ?? 0),
                'debt'            => max(0.0, (float) ($budget['debtSummary'] ?? 0)),
                'debtAvailable'   => (float) ($budget['debtAvailable'] ?? 0),
                'debtCreditLimit' => (float) ($budget['debtCreditLimit'] ?? 0),
                'invest'          => (float) ($budget['investSummary'] ?? 0),
                'creditAvailable' => (float) ($budget['creditAvailable'] ?? 0),
                'creditLimit'     => (float) ($budget['creditLimit'] ?? 0),
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

            if ($safeCache && method_exists($safeCache, 'saveUser')) {
                $safeCache->saveUser('wallets', 'budget', $cuID, $this->budgetSnapshot, 60);
            }
        } catch (Throwable $e) {
            log_message('error', 'WalletsController::loadBudgetSnapshot failed: {message}', [
                'message' => $e->getMessage(),
            ]);
        }

        return $this->budgetSnapshot;
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

        $cuID = $this->currentWalletUserId();

        if ($cuID <= 0) {
            return $this->solanaSnapshot;
        }

        try {
            $solana = $this->getMyMISolana()->getUserSolana($cuID) ?? [];

            $this->solanaSnapshot['wallet'] = $solana['cuSolanaDW'] ?? null;
            $this->solanaSnapshot['totals']['quantity'] = (float) ($solana['cuSolanaTotal'] ?? 0);
            $this->solanaSnapshot['totals']['value']    = (float) ($solana['cuSolanaValue'] ?? 0);

            $network = $solana['solanaNetworkStatus'] ?? [];

            if (! is_array($network) || ! array_key_exists('healthy', $network)) {
                try {
                    $network = $this->getSolanaService()->getNetworkStatus();
                } catch (Throwable $networkException) {
                    $network = [
                        'healthy' => false,
                        'slot'    => null,
                        'version' => null,
                        'error'   => $networkException->getMessage(),
                    ];
                }
            }

            $this->solanaSnapshot['network'] = array_merge($this->solanaSnapshot['network'], $network);
        } catch (Throwable $e) {
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
        $cuID = $this->currentWalletUserId();

        if ($cuID <= 0) {
            return $this->walletSummaryCache;
        }

        try {
            if (method_exists($this, 'getMyMIWallet')) {
                $summary = $this->getMyMIWallet()->getWalletSummaries($cuID);
                if (is_array($summary)) {
                    $this->walletSummaryCache = $summary;
                }
            }
        } catch (Throwable $e) {
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
            'bank'       => [],
            'credit'     => [],
            'crypto'     => [],
            'debt'       => [],
            'investment' => [],
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
        } catch (Throwable $e) {
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
        $totals = $budgetSnapshot['totals'] ?? [];

        $signals = [
            'thisMonthsInvestments' => (float) ($budgetSnapshot['raw']['thisMonthsInvestments'] ?? 0),
            'thisMonthsSurplus'     => (float) ($budgetSnapshot['raw']['thisMonthsSurplus'] ?? 0),
        ];

        $calculator = $this->getSummaryCalculator();
        $values     = $calculator->calculate($totals, $signals);

        $formatted = [];

        foreach ($values as $key => $value) {
            if (is_array($value)) {
                continue;
            }

            $formatted[$key] = $this->formatCurrency((float) $value);
        }

        if (isset($values['breakdown']) && is_array($values['breakdown'])) {
            $formatted['breakdown'] = [];

            foreach ($values['breakdown'] as $bk => $bv) {
                $formatted['breakdown'][$bk] = $this->formatCurrency((float) $bv);
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
        $base = [];

        try {
            $parentCommon = parent::commonData();

            if (is_array($parentCommon)) {
                $base = $parentCommon;
            }
        } catch (Throwable $e) {
            log_message('error', 'WalletsController::commonData parent failed: {message}', [
                'message' => $e->getMessage(),
            ]);
        }

        $cuID = $this->currentWalletUserId();

        $userData = $this->loadUserCommonData();

        if (! empty($userData)) {
            $base = array_merge($base, $userData);
        }

        $budgetSnapshot = $this->loadBudgetSnapshot();
        $solanaSnapshot = $this->loadSolanaSnapshot();
        $walletSummary  = $this->loadWalletSummary();

        $base['userBudget'] = $budgetSnapshot['raw'];

        foreach (['checking', 'crypto', 'debt', 'invest'] as $key) {
            $value = (float) ($budgetSnapshot['totals'][$key] ?? 0.0);
            $base[$key . 'Summary']    = $value;
            $base[$key . 'SummaryFMT'] = $budgetSnapshot['formatted'][$key] ?? $this->formatCurrency($value);
        }

        $base['creditAvailable']    = (float) ($budgetSnapshot['totals']['creditAvailable'] ?? 0.0);
        $base['creditAvailableFMT'] = $budgetSnapshot['formatted']['creditAvailable'] ?? $this->formatCurrency($base['creditAvailable']);
        $base['creditLimit']        = (float) ($budgetSnapshot['totals']['creditLimit'] ?? 0.0);
        $base['creditLimitFMT']     = $budgetSnapshot['formatted']['creditLimit'] ?? $this->formatCurrency($base['creditLimit']);

        $base['debtAvailable']      = (float) ($budgetSnapshot['totals']['debtAvailable'] ?? 0.0);
        $base['debtAvailableFMT']   = $budgetSnapshot['formatted']['debtAvailable'] ?? $this->formatCurrency($base['debtAvailable']);
        $base['debtCreditLimit']    = (float) ($budgetSnapshot['totals']['debtCreditLimit'] ?? 0.0);
        $base['debtCreditLimitFMT'] = $budgetSnapshot['formatted']['debtCreditLimit'] ?? $this->formatCurrency($base['debtCreditLimit']);

        $base['financialSummary'] = $this->buildFinancialSummary($budgetSnapshot);

        $base['cuSolanaDW']          = $solanaSnapshot['wallet'];
        $base['cuSolanaTotal']       = $solanaSnapshot['totals']['quantity'];
        $base['cuSolanaValue']       = $solanaSnapshot['totals']['value'];
        $base['solanaNetworkStatus'] = $solanaSnapshot['network'];

        $accounts = $this->loadAccountCollections($cuID);

        $base['accountCollections']    = $accounts;
        $base['getUserBankAccounts']   = $accounts['bank'];
        $base['getUserCreditAccounts'] = $accounts['credit'];
        $base['getUserCryptoAccounts'] = $accounts['crypto'];
        $base['getUserDebtAccounts']   = $accounts['debt'];
        $base['getUserInvestAccounts'] = $accounts['investment'];

        try {
            $base['getBudgetRecordsIsDebt'] = method_exists($this, 'getMyMIBudget')
                ? $this->getMyMIBudget()->getBudgetRecordsIsDebt($cuID)
                : [];
        } catch (Throwable $e) {
            log_message('error', 'WalletsController::commonData getBudgetRecordsIsDebt failed: {message}', [
                'message' => $e->getMessage(),
            ]);

            $base['getBudgetRecordsIsDebt'] = [];
        }

        if (! empty($walletSummary['totalWalletSummaries'])) {
            $base['walletSummary'] = $walletSummary['totalWalletSummaries'];
        } elseif (! empty($walletSummary)) {
            $base['walletSummary'] = $walletSummary;
        } else {
            $base['walletSummary'] = [];
        }

        if ($cuID > 0) {
            try {
                if (method_exists($this, 'getDashboardService')) {
                    $dashboardInfo = $this->getDashboardService()->getDashboardInfo($cuID);
                    $base['promotionalBanners'] = $dashboardInfo['promotionalBanners'] ?? [];
                }
            } catch (Throwable $e) {
                log_message('error', 'WalletsController::commonData dashboard info failed: {message}', [
                    'message' => $e->getMessage(),
                ]);

                $base['promotionalBanners'] = $base['promotionalBanners'] ?? [];
            }

            try {
                $base['completedGoals'] = $this->goalTrackingService->getCompletedGoals($cuID) ?? [];
                $base['pendingGoals']   = $this->goalTrackingService->getPendingGoals($cuID) ?? [];
            } catch (Throwable $e) {
                log_message('error', 'WalletsController::commonData goals failed: {message}', [
                    'message' => $e->getMessage(),
                ]);

                $base['completedGoals'] = $base['completedGoals'] ?? [];
                $base['pendingGoals']   = $base['pendingGoals'] ?? [];
            }
        }

        $this->data = $base;

        return $this->data;
    }

    private function renderWalletLandingPage(): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        $this->data['pageTitle'] = 'My Wallets | MyMI Wallet | The Future of Finance';

        if ($redirect = $this->guardAuthenticated()) {
            return $redirect;
        }

        $cuID = $this->currentWalletUserId();

        $budgetSnapshot = $this->loadBudgetSnapshot();
        $solanaSnapshot = $this->loadSolanaSnapshot();
        $accounts       = $this->loadAccountCollections($cuID);

        $this->commonData();

        try {
            $this->data['getUserWallets'] = $this->walletModel->getUserWallets($cuID);
        } catch (Throwable $e) {
            log_message('error', 'WalletsController@index getUserWallets failed: {message}', [
                'message' => $e->getMessage(),
            ]);

            $this->data['getUserWallets'] = [];
        }

        $walletCount = is_array($this->data['getUserWallets']) ? count($this->data['getUserWallets']) : 0;

        log_message('debug', 'WalletsController@index user={user} walletsReturned={count} filters=non-deleted', [
            'user'  => $cuID,
            'count' => $walletCount,
        ]);

        $shouldReconcile = $this->request->getGet('reconcile') === '1';

        if ($shouldReconcile && $cuID > 0) {
            try {
                $walletLibrary = new MyMIWallets();
                $this->data['walletReconciliation'] = $walletLibrary->reconcileUserWallets($cuID);
            } catch (Throwable $e) {
                log_message('error', 'WalletsController wallet reconciliation failed: {message}', [
                    'message' => $e->getMessage(),
                ]);

                $this->data['walletReconciliation'] = [
                    'status'  => 'error',
                    'message' => $e->getMessage(),
                ];
            }
        }

        $this->data['creditAvailable']    = (float) ($budgetSnapshot['totals']['creditAvailable'] ?? 0.0);
        $this->data['creditAvailableFMT'] = $budgetSnapshot['formatted']['creditAvailable'] ?? $this->formatCurrency($this->data['creditAvailable']);
        $this->data['creditLimit']        = (float) ($budgetSnapshot['totals']['creditLimit'] ?? 0.0);
        $this->data['creditLimitFMT']     = $budgetSnapshot['formatted']['creditLimit'] ?? $this->formatCurrency($this->data['creditLimit']);
        $this->data['financialSummary']   = $this->buildFinancialSummary($budgetSnapshot);
        $this->data['accountCollections'] = $accounts;

        $this->data['walletDataSources'] = [
            'budget' => $budgetSnapshot['meta'],
            'solana' => [
                'healthy' => $solanaSnapshot['network']['healthy'] ?? false,
                'error'   => $solanaSnapshot['network']['error'] ?? null,
            ],
            'generatedAt' => date(DateTime::ATOM),
        ];

        if ($cuID > 0) {
            try {
                $setupService = service('setupStatusService');

                $this->data['setupStatus']  = $setupService->getSetupStatus($cuID);
                $this->data['setupPrefs']   = $setupService->getDismissPreferences($cuID);
                $this->data['setupContext'] = 'wallets';
            } catch (Throwable $e) {
                log_message('debug', 'WalletsController setupStatusService unavailable: {message}', [
                    'message' => $e->getMessage(),
                ]);

                $this->data['setupStatus']  = [];
                $this->data['setupPrefs']   = [];
                $this->data['setupContext'] = 'wallets';
            }
        }

        return $this->renderTheme('App\\Modules\\User\\Views\\Wallets\\index', $this->data);
    }

    public function index(): ResponseInterface|string
    {
        return $this->renderWalletLandingPage();
    }

    public function checking(): ResponseInterface|string
    {
        return $this->renderWalletLandingPage();
    }

    public function bank(): ResponseInterface|string
    {
        return $this->renderWalletLandingPage();
    }

    public function banking(): ResponseInterface|string
    {
        return $this->renderWalletLandingPage();
    }

    public function all(): ResponseInterface|string
    {
        return $this->renderWalletLandingPage();
    }

    public function crypto(): ResponseInterface|string
    {
        return $this->renderWalletLandingPage();
    }

    public function credit(): ResponseInterface|string
    {
        return $this->renderWalletLandingPage();
    }

    public function debt(): ResponseInterface|string
    {
        return $this->renderWalletLandingPage();
    }

    public function investments(): ResponseInterface|string
    {
        return $this->renderWalletLandingPage();
    }

    public function add(): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        log_message('debug', 'WalletsController::add - START');

        if (strtolower($this->request->getMethod()) === 'post') {
            $expectsJson = $this->request->isAJAX()
                || str_contains(strtolower((string) $this->request->getHeaderLine('Accept')), 'application/json');
            $post = $this->request->getPost();

            $walletTypeRaw = (string) ($post['wallet_type'] ?? '');
            $type = match (strtolower($walletTypeRaw)) {
                'bank', 'banking', 'checking', 'savings', 'fiat' => 'bank',
                'credit'                                       => 'credit',
                'debt', 'loan'                                  => 'debt',
                'investment', 'invest', 'brokerage'             => 'investment',
                'crypto', 'cryptocurrency'                      => 'crypto',
                default                                         => null,
            };

            if ($type === null) {
                log_message('error', 'WalletsController::add invalid wallet_type: {wallet_type}', [
                    'wallet_type' => $walletTypeRaw,
                ]);

                if ($expectsJson) {
                    return $this->response->setStatusCode(422)->setJSON([
                        'status' => 'error',
                        'message' => 'Invalid wallet type.',
                        'csrfHash' => csrf_hash(),
                    ]);
                }

                return redirect()->back()->withInput()->with('error', 'Invalid wallet type.');
            }

            try {
                $service = $this->resolveWalletService();

                $prepared = method_exists($service, 'prepareAccountData')
                    ? $service->prepareAccountData($post, $type)
                    : $this->prepareAccountData($post, $type);

                $prepared += [
                    'status'     => 1,
                    'active'     => in_array($post['active'] ?? '1', ['1', 1, true, 'true', 'on', 'Yes', 'yes'], true) ? 1 : 0,
                    'beta'       => in_array($post['beta'] ?? '0', ['1', 1, true, 'true', 'on', 'Yes', 'yes'], true) ? 1 : 0,
                    'user_id'    => (int) ($post['user_id'] ?? $this->currentWalletUserId()),
                    'user_email' => (string) ($post['user_email'] ?? ''),
                    'username'   => (string) ($post['username'] ?? ''),
                ];

                $method = match ($type) {
                    'bank'       => 'addBankWallet',
                    'credit'     => 'addCreditWallet',
                    'debt'       => 'addDebtWallet',
                    'investment' => 'addInvestmentWallet',
                    'crypto'     => 'addCryptoWallet',
                };

                if (! method_exists($service, $method)) {
                    throw new \RuntimeException("Wallet service method missing: {$method}");
                }

                $result = $service->{$method}($prepared);

                $userId = (int) ($prepared['user_id'] ?? $this->currentWalletUserId());
                $this->invalidateWalletCache($userId);

                log_message('info', 'WalletsController::add wallet created', [
                    'type'   => $type,
                    'user'   => $userId,
                    'result' => $result,
                ]);

                if ($expectsJson) {
                    return $this->response->setJSON([
                        'status' => 'success',
                        'message' => ucfirst($type) . ' wallet added successfully.',
                        'redirect' => site_url('/Wallets'),
                        'csrfHash' => csrf_hash(),
                    ]);
                }

                return redirect()->to('/Wallets')->with('message', ucfirst($type) . ' wallet added successfully.');
            } catch (Throwable $e) {
                log_message('error', 'WalletsController::add failed: {message}', [
                    'message' => $e->getMessage(),
                ]);

                if ($expectsJson) {
                    return $this->response->setStatusCode(500)->setJSON([
                        'status' => 'error',
                        'message' => 'Unable to add wallet. Please try again.',
                        'csrfHash' => csrf_hash(),
                    ]);
                }

                return redirect()->back()->withInput()->with('error', 'Unable to add wallet. Please try again.');
            }
        }

        $this->commonData();

        $this->data['pageTitle'] = 'Add New Wallet | MyMI Wallet | The Future of Finance';

        return $this->renderTheme('App\\Modules\\User\\Views\\Wallets\\Add', $this->data);
    }

    public function prepareAccountData(array $payload, string $type): array
    {
        $type = strtolower($type);

        $clean = static function ($value) {
            return is_string($value) ? trim($value) : $value;
        };

        $nickname = $clean($payload['nickname'] ?? ($payload['accountNickname'] ?? null));

        switch ($type) {
            case 'bank':
                $map = [
                    'bank_name'          => $payload['bank_name'] ?? $payload['accountBank'] ?? null,
                    'account_type'       => $payload['account_type'] ?? $payload['accountTypeText'] ?? null,
                    'account_number'     => $payload['account_number'] ?? null,
                    'routing_number'     => $payload['routing_number'] ?? null,
                    'bank_account_owner' => $payload['bank_account_owner'] ?? null,
                    'balance'            => $payload['balance'] ?? $payload['accountBalance'] ?? null,
                    'nickname'           => $nickname,
                ];
                break;

            case 'credit':
                $map = [
                    'bank_name'         => $payload['bank_name'] ?? null,
                    'account_number'    => $payload['account_number'] ?? null,
                    'nickname'          => $nickname,
                    'credit_limit'      => $payload['credit_limit'] ?? $payload['accountCreditLimit'] ?? null,
                    'current_balance'   => $payload['current_balance'] ?? $payload['accountCurrentBalance'] ?? null,
                    'available_balance' => $payload['available_balance'] ?? $payload['accountAvailableBalance'] ?? null,
                    'credit_status'     => $payload['credit_status'] ?? $payload['accountCreditStatus'] ?? null,
                    'due_date'          => $payload['due_date'] ?? $payload['accountDueDate'] ?? null,
                    'payment_due'       => $payload['payment_due'] ?? $payload['accountPaymentDue'] ?? null,
                    'interest_rate'     => $payload['interest_rate'] ?? $payload['accountInterestRate'] ?? null,
                ];
                break;

            case 'debt':
                $map = [
                    'account_status'    => $payload['account_status'] ?? $payload['accountStatus'] ?? null,
                    'account_type'      => $payload['account_type'] ?? $payload['accountSourceType'] ?? null,
                    'debtor'            => $payload['debtor'] ?? $payload['accountDebtor'] ?? null,
                    'nickname'          => $nickname,
                    'account_number'    => $payload['account_number'] ?? null,
                    'due_date'          => $payload['due_date'] ?? $payload['accountDueDate'] ?? null,
                    'credit_limit'      => $payload['credit_limit'] ?? $payload['accountCreditLimit'] ?? null,
                    'current_balance'   => $payload['current_balance'] ?? $payload['accountCurrentBalance'] ?? null,
                    'available_balance' => $payload['available_balance'] ?? $payload['accountAvailableBalance'] ?? null,
                    'monthly_payment'   => $payload['monthly_payment'] ?? $payload['accountMonthlyPayment'] ?? null,
                    'interest_rate'     => $payload['interest_rate'] ?? $payload['accountInterestRate'] ?? null,
                ];
                break;

            case 'investment':
                $map = [
                    'nickname'        => $nickname,
                    'broker'          => $payload['broker'] ?? $payload['accountBroker'] ?? null,
                    'account_number'  => $payload['account_number'] ?? null,
                    'amount'          => $payload['amount'] ?? $payload['accountAmount'] ?? null,
                    'initial_value'   => $payload['initial_value'] ?? $payload['accountInitialValue'] ?? null,
                    'available_funds' => $payload['available_funds'] ?? $payload['accountAvailableFunds'] ?? null,
                    'net_worth'       => $payload['net_worth'] ?? $payload['accountNetWorth'] ?? null,
                ];
                break;

            case 'crypto':
                $map = [
                    'nickname'       => $nickname,
                    'account_number' => $payload['account_number'] ?? null,
                    'balance'        => $payload['balance'] ?? null,
                ];
                break;

            default:
                $map = [];
        }

        $filtered = array_filter($map, static fn ($value) => $value !== null);

        log_message('debug', 'Prepared account data for {type}: {data}', [
            'type' => $type,
            'data' => print_r($filtered, true),
        ]);

        return $filtered;
    }

    public function edit($accountType = null, $accountID = null): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        log_message('debug', 'WalletsController::edit - START: AccountType: {type}, AccountID: {id}', [
            'type' => $accountType,
            'id'   => $accountID,
        ]);

        if (strtolower($this->request->getMethod()) === 'post') {
            $expectsJson = $this->request->isAJAX()
                || str_contains(strtolower((string) $this->request->getHeaderLine('Accept')), 'application/json');
            $post = $this->request->getPost();

            $incomingType = (string) (
                $post['accountType']
                ?? $post['wallet_type']
                ?? $accountType
                ?? ''
            );

            $type = $this->mapType($incomingType);

            if ($type === null) {
                $type = match (strtolower($incomingType)) {
                    'bank', 'banking', 'checking', 'savings', 'fiat' => 'bank',
                    'credit'                                       => 'credit',
                    'debt', 'loan'                                  => 'debt',
                    'investment', 'invest', 'brokerage'             => 'investment',
                    'crypto', 'cryptocurrency'                      => 'crypto',
                    default                                         => null,
                };
            }

            $id = (int) (
                $post['accountID']
                ?? $post['account_id']
                ?? $post['wallet_id']
                ?? $accountID
                ?? 0
            );

            if ($type === null || $id <= 0) {
                log_message('error', 'WalletsController::edit invalid type or id', [
                    'incoming_type' => $incomingType,
                    'resolved_type' => $type,
                    'id'            => $id,
                ]);

                if ($expectsJson) {
                    return $this->response->setStatusCode(422)->setJSON([
                        'status' => 'error',
                        'message' => 'Invalid account type or ID.',
                        'csrfHash' => csrf_hash(),
                    ]);
                }

                return redirect()->back()->withInput()->with('error', 'Invalid account type or ID.');
            }

            try {
                $service = $this->resolveWalletService();

                $prepared = method_exists($service, 'prepareAccountData')
                    ? $service->prepareAccountData($post, $type)
                    : $this->prepareAccountData($post, $type);

                $wm = model(WalletModel::class);

                $ok = $wm->updateAccountAndWallet(
                    $type,
                    $id,
                    $prepared,
                    $this->currentWalletUserId()
                );

                if (! $ok) {
                    if ($expectsJson) {
                        return $this->response->setStatusCode(500)->setJSON([
                            'status' => 'error',
                            'message' => 'Failed to update wallet.',
                            'csrfHash' => csrf_hash(),
                        ]);
                    }

                    return redirect()->back()->withInput()->with('error', 'Failed to update wallet.');
                }

                $this->invalidateWalletCache($this->currentWalletUserId());

                if ($expectsJson) {
                    return $this->response->setJSON([
                        'status' => 'success',
                        'message' => ucfirst($type) . ' wallet updated successfully.',
                        'redirect' => site_url('/Wallets'),
                        'csrfHash' => csrf_hash(),
                    ]);
                }

                return redirect()->to('/Wallets')->with('message', ucfirst($type) . ' wallet updated successfully.');
            } catch (Throwable $e) {
                log_message('error', 'WalletsController::edit failed: {message}', [
                    'message' => $e->getMessage(),
                ]);

                if ($expectsJson) {
                    return $this->response->setStatusCode(500)->setJSON([
                        'status' => 'error',
                        'message' => 'An error occurred while updating the wallet.',
                        'csrfHash' => csrf_hash(),
                    ]);
                }

                return redirect()->back()->withInput()->with('error', 'An error occurred while updating the wallet.');
            }
        }

        $this->data['accountID']   = $accountID;
        $this->data['accountType'] = $accountType;

        $this->commonData();

        return $this->renderTheme('App\\Modules\\User\\Views\\Wallets\\Edit', $this->data);
    }

    public function editBankAccount($accountId = null): ResponseInterface|string
    {
        return $this->renderEditAccountByEndpoint('editBankAccount', $accountId);
    }

    public function editCreditAccount($accountId = null): ResponseInterface|string
    {
        return $this->renderEditAccountByEndpoint('editCreditAccount', $accountId);
    }

    public function editCryptoAccount($accountId = null): ResponseInterface|string
    {
        return $this->renderEditAccountByEndpoint('editCryptoAccount', $accountId);
    }

    public function editDebtAccount($accountId = null): ResponseInterface|string
    {
        if (function_exists('log_if_placeholder_in_uri')) {
            log_if_placeholder_in_uri((string) $this->request->getUri(), 'wallets.editDebtAccount');
        }

        return $this->renderEditAccountByEndpoint('editDebtAccount', $accountId);
    }

    public function editInvestAccount($accountId = null): ResponseInterface|string
    {
        return $this->renderEditAccountByEndpoint('editInvestAccount', $accountId);
    }

    private function renderEditAccountByEndpoint(string $endpoint, $accountId = null): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        $rawAccountId = trim((string) $accountId);
        $userId       = $this->currentWalletUserId();
        $endpointL    = strtolower(trim($endpoint));

        $supported = [
            'editbankaccount',
            'editcreditaccount',
            'editcryptoaccount',
            'editdebtaccount',
            'editinvestaccount',
        ];

        if (! in_array($endpointL, $supported, true)) {
            log_message('error', 'WalletsController::renderEditAccountByEndpoint unsupported endpoint', [
                'endpoint' => $endpoint,
                'uri'      => (string) $this->request->getUri(),
                'user'     => $userId,
            ]);

            throw PageNotFoundException::forPageNotFound('Invalid account type');
        }

        if ($rawAccountId === '' || strpos($rawAccountId, ':segment') !== false || strpos($rawAccountId, '(') !== false) {
            log_message('error', 'WalletsController::renderEditAccountByEndpoint placeholder detected in account id', [
                'endpoint' => $endpointL,
                'id'       => $rawAccountId,
                'uri'      => (string) $this->request->getUri(),
                'user'     => $userId,
            ]);

            throw PageNotFoundException::forPageNotFound('Invalid account ID');
        }

        if (! ctype_digit($rawAccountId)) {
            log_message('error', 'WalletsController::renderEditAccountByEndpoint invalid account id', [
                'endpoint' => $endpointL,
                'id'       => $rawAccountId,
                'uri'      => (string) $this->request->getUri(),
                'user'     => $userId,
            ]);

            throw PageNotFoundException::forPageNotFound('Invalid account ID');
        }

        $accountId = (int) $rawAccountId;

        try {
            $row = $this->walletModel->findAccountRowForEdit($endpointL, $accountId, $userId);

            if (! $row) {
                log_message('warning', 'WalletsController::renderEditAccountByEndpoint account not found', [
                    'endpoint' => $endpointL,
                    'id'       => $accountId,
                    'user'     => $userId,
                ]);

                throw PageNotFoundException::forPageNotFound('Account not found');
            }

            $this->data['accountID']    = $accountId;
            $this->data['accountType']  = $endpointL;
            $this->data['pageView']     = $row['__pageView'] ?? null;
            $this->data['previousData'] = $row;

            $this->commonData();

            log_message('debug', 'WalletsController::renderEditAccountByEndpoint rendering edit view', [
                'endpoint' => $endpointL,
                'id'       => $accountId,
                'user'     => $userId,
            ]);

            return $this->renderTheme('App\\Modules\\User\\Views\\Wallets\\Edit', $this->data);
        } catch (Throwable $e) {
            log_message('error', 'WalletsController::renderEditAccountByEndpoint failed', [
                'endpoint' => $endpointL,
                'id'       => $accountId,
                'user'     => $userId,
                'error'    => $e->getMessage(),
                'trace'    => $e->getTraceAsString(),
            ]);

            throw $e;
        }
    }

    public function submitEdit(): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        log_message('debug', 'WalletsController::submitEdit - Form submission started.');

        $formData = $this->request->getPost();

        log_message('debug', 'WalletsController::submitEdit - FormData: {data}', [
            'data' => print_r($formData, true),
        ]);

        $accountType = $formData['accountType'] ?? null;
        $accountID   = (int) ($formData['accountID'] ?? 0);

        try {
            $accountTypes = [
                'editBankAccount'   => 'bank',
                'editCreditAccount' => 'credit',
                'editDebtAccount'   => 'debt',
                'editInvestAccount' => 'investment',
                'editCryptoAccount' => 'crypto',
            ];

            if (! isset($accountTypes[$accountType]) || $accountID <= 0) {
                log_message('error', 'WalletsController::submitEdit invalid account type or id: type={type}, id={id}', [
                    'type' => $accountType,
                    'id'   => $accountID,
                ]);

                return redirect()->back()->withInput()->with('error', 'Invalid account type or ID.');
            }

            $type = $accountTypes[$accountType];

            $service = $this->resolveWalletService();

            $prepared = method_exists($service, 'prepareAccountData')
                ? $service->prepareAccountData($formData, $type)
                : $this->prepareAccountData($formData, $type);

            log_message('debug', 'WalletsController::submitEdit - PreparedData: {data}', [
                'data' => print_r($prepared, true),
            ]);

            $wm = model(WalletModel::class);

            $result = $wm->updateAccountAndWallet($type, $accountID, $prepared, $this->currentWalletUserId());

            if ($result) {
                log_message('info', 'WalletsController::submitEdit wallet updated successfully for AccountID: {id}', [
                    'id' => $accountID,
                ]);

                $this->invalidateWalletCache($this->currentWalletUserId());

                return redirect()->to('/Wallets')->with('message', ucfirst($type) . ' account updated successfully.');
            }

            log_message('error', 'WalletsController::submitEdit wallet update failed for AccountID: {id}', [
                'id' => $accountID,
            ]);

            return redirect()->back()->withInput()->with('error', 'Failed to update wallet.');
        } catch (Exception $e) {
            log_message('error', 'Error in WalletsController::submitEdit: {message}', [
                'message' => $e->getMessage(),
            ]);

            return redirect()->back()->withInput()->with('error', 'An error occurred. Please try again.');
        }
    }

    private function mapType(string $accountType): ?string
    {
        return match (strtolower($accountType)) {
            'editbankaccount'   => 'bank',
            'editcreditaccount' => 'credit',
            'editdebtaccount'   => 'debt',
            'editinvestaccount' => 'investment',
            'editcryptoaccount' => 'crypto',
            'bank'              => 'bank',
            'credit'            => 'credit',
            'debt'              => 'debt',
            'invest'            => 'investment',
            'investment'        => 'investment',
            'crypto'            => 'crypto',
            default             => null,
        };
    }

    public function delete($accountType = null, $walletID = null)
    {
        $expectsJson = $this->request->isAJAX()
            || str_contains(strtolower((string) $this->request->getHeaderLine('Accept')), 'application/json');

        log_message('debug', 'WalletsController::delete - START', [
            'account_type' => $accountType,
            'wallet_id'    => $walletID,
            'query'        => $this->request->getGet(),
        ]);

        if (!$accountType || !$walletID) {
            log_message('error', 'WalletsController::delete - Missing account type or wallet ID.', [
                'account_type' => $accountType,
                'wallet_id'    => $walletID,
            ]);

            if ($expectsJson) {
                return $this->response->setStatusCode(422)->setJSON([
                    'status' => 'error',
                    'message' => 'Invalid request. Account type or wallet ID is missing.',
                    'csrfHash' => csrf_hash(),
                ]);
            }

            return redirect()
                ->back()
                ->with('error', 'Invalid request. Account type or wallet ID is missing.');
        }

        try {
            $walletID = (int) $walletID;

            if ($walletID <= 0) {
                log_message('error', 'WalletsController::delete - Invalid wallet ID.', [
                    'wallet_id' => $walletID,
                ]);

                if ($expectsJson) {
                    return $this->response->setStatusCode(422)->setJSON([
                        'status' => 'error',
                        'message' => 'Invalid wallet ID.',
                        'csrfHash' => csrf_hash(),
                    ]);
                }

                return redirect()
                    ->back()
                    ->with('error', 'Invalid wallet ID.');
            }

            $subsidiaryId = (int) (
                $this->request->getGet('account_id')
                ?? $this->request->getPost('account_id')
                ?? 0
            );

            $cuID = (int) ($this->cuID ?? 0);

            if ($cuID <= 0 && method_exists($this, 'currentUserId')) {
                $cuID = (int) $this->currentUserId();
            }

            if ($cuID <= 0 && function_exists('auth')) {
                try {
                    $cuID = (int) (auth()->id() ?? 0);
                } catch (\Throwable $authError) {
                    log_message('warning', 'WalletsController::delete - auth()->id() lookup skipped: {m}', [
                        'm' => $authError->getMessage(),
                    ]);
                }
            }

            if ($cuID <= 0) {
                log_message('error', 'WalletsController::delete - Unable to resolve current user ID.');
                if ($expectsJson) {
                    return $this->response->setStatusCode(401)->setJSON([
                        'status' => 'error',
                        'message' => 'Unauthorized wallet delete request.',
                        'csrfHash' => csrf_hash(),
                    ]);
                }
                return redirect()
                    ->back()
                    ->with('error', 'Unauthorized wallet delete request.');
            }

            $deleteReport = $this->getWalletService()->deleteWalletCascade(
                (string) $accountType,
                $walletID,
                $cuID,
                $subsidiaryId > 0 ? $subsidiaryId : null
            );

            if (empty($deleteReport['success'])) {
                log_message('error', 'WalletsController::delete - Cascade delete failed.', [
                    'account_type'  => $accountType,
                    'wallet_id'     => $walletID,
                    'subsidiary_id' => $subsidiaryId,
                    'report'        => $deleteReport,
                ]);

                if ($expectsJson) {
                    return $this->response->setStatusCode(500)->setJSON([
                        'status' => 'error',
                        'message' => $deleteReport['message'] ?? 'Failed to delete wallet.',
                        'csrfHash' => csrf_hash(),
                    ]);
                }

                return redirect()
                    ->back()
                    ->with('error', $deleteReport['message'] ?? 'Failed to delete wallet.');
            }

            $resolvedWalletId = (int) ($deleteReport['wallet_id'] ?? $walletID);

            if (method_exists($this->getWalletService(), 'logWalletDeletion')) {
                $this->getWalletService()->logWalletDeletion($cuID, $resolvedWalletId, (string) $accountType);
            }

            log_message('info', 'WalletsController::delete - Wallet deleted successfully.', [
                'account_type'       => $accountType,
                'requested_id'       => $walletID,
                'subsidiary_id'      => $subsidiaryId,
                'resolved_wallet_id' => $resolvedWalletId,
                'report'             => $deleteReport,
            ]);

            if ($expectsJson) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Wallet deleted successfully.',
                    'redirect' => site_url('/Wallets'),
                    'csrfHash' => csrf_hash(),
                ]);
            }

            return redirect()
                ->to(site_url('/Wallets'))
                ->with('message', 'Wallet deleted successfully.');
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController::delete - Exception: {m}', [
                'm'            => $e->getMessage(),
                'account_type' => $accountType,
                'wallet_id'    => $walletID,
            ]);

            if ($expectsJson) {
                return $this->response->setStatusCode(500)->setJSON([
                    'status' => 'error',
                    'message' => 'An error occurred while deleting the wallet. Please try again.',
                    'csrfHash' => csrf_hash(),
                ]);
            }

            return redirect()
                ->back()
                ->with('error', 'An error occurred while deleting the wallet. Please try again.');
        }
    }

    public function copy($accountID): ResponseInterface|string|null
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        if (strtolower($this->request->getMethod()) !== 'post') {
            return null;
        }

        $formData = $this->request->getPost();

        if (! isset($formData['wallet_type'])) {
            return redirect()->back()->with('error', 'Wallet type is required.');
        }

        $accountType       = $formData['wallet_type'];
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

            case 'Crypto':
                $accountInfoMethod = 'getCryptoAccountInfo';
                $walletModelMethod = 'addCryptoWallet';
                break;

            default:
                return redirect()->back()->with('error', 'Unsupported wallet type.');
        }

        $service = $this->resolveWalletService();

        if (! method_exists($service, $accountInfoMethod) || ! method_exists($service, $walletModelMethod)) {
            return redirect()->back()->with('error', 'Wallet copy method is unavailable.');
        }

        $previousData = $service->{$accountInfoMethod}($accountID);

        unset($previousData['id']);

        $previousData['user_id'] = (int) ($formData['user_id'] ?? $this->currentWalletUserId());

        $service->{$walletModelMethod}($previousData);

        $this->invalidateWalletCache((int) $previousData['user_id']);

        return redirect()->to('/Wallets')->with('message', ucfirst($accountType) . ' account copied successfully.');
    }

    public function deposit(): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        $amount   = (float) $this->request->getPost('amount');
        $walletID = (int) $this->request->getPost('wallet_id');
        $currency = (string) ($this->request->getPost('currency') ?? 'USD');

        try {
            $convertedAmount = $this->currencyService->convert($amount, $currency, 'USD');
            $transactionID = $this->transactionService->logTransaction('Deposit', $walletID, $this->currentWalletUserId(), $convertedAmount);

            $this->resolveWalletService()->depositFunds($walletID, $convertedAmount);
            $this->transactionService->completeDeposit($transactionID);
            $this->invalidateWalletCache($this->currentWalletUserId());

            return redirect()->to('/Wallets')->with('message', 'Deposit successful.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error during deposit: ' . $e->getMessage());
        }
    }

    public function withdraw(): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        $amount   = (float) $this->request->getPost('amount');
        $walletID = (int) $this->request->getPost('wallet_id');
        $currency = (string) ($this->request->getPost('currency') ?? 'USD');

        try {
            $convertedAmount = $this->currencyService->convert($amount, $currency, 'USD');
            $transactionID = $this->transactionService->logTransaction('Withdrawal', $walletID, $this->currentWalletUserId(), $convertedAmount);

            $this->resolveWalletService()->withdrawFunds($walletID, $convertedAmount);
            $this->transactionService->completeDeposit($transactionID);
            $this->invalidateWalletCache($this->currentWalletUserId());

            return redirect()->to('/Wallets')->with('message', 'Withdrawal successful.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error during withdrawal: ' . $e->getMessage());
        }
    }

    public function exchangeCurrency(): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        $fromWalletID = (int) $this->request->getPost('from_wallet_id');
        $toWalletID   = (int) $this->request->getPost('to_wallet_id');
        $amount       = (float) $this->request->getPost('amount');
        $fromCurrency = (string) $this->request->getPost('from_currency');
        $toCurrency   = (string) $this->request->getPost('to_currency');

        try {
            $convertedAmount = $this->currencyService->convert($amount, $fromCurrency, $toCurrency);

            $this->transactionService->logTransaction('Exchange', $fromWalletID, $this->currentWalletUserId(), $convertedAmount);
            $this->resolveWalletService()->exchangeFunds($fromWalletID, $toWalletID, $convertedAmount);
            $this->invalidateWalletCache($this->currentWalletUserId());

            return redirect()->to('/Wallets')->with('message', 'Currency exchanged successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error during currency exchange: ' . $e->getMessage());
        }
    }

    public function details($accountID = null): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        try {
            $accountID = (int) $accountID;

            if ($accountID <= 0) {
                log_message('error', 'WalletsController::details - Invalid account ID.', [
                    'account_id' => $accountID,
                ]);

                return redirect()
                    ->to(site_url('Wallets'))
                    ->with('error', 'Invalid wallet/account ID.');
            }

            $uri = $this->request->getUri();

            $accountTypeRaw = (string) $uri->getSegment(2);
            $accountTypeKey = strtolower($accountTypeRaw);

            $typeMap = [
                'bank'        => 'bank',
                'banking'     => 'bank',
                'checking'    => 'bank',
                'financial'   => 'bank',
                'fiat'        => 'bank',
                'credit'      => 'credit',
                'debt'        => 'debt',
                'loan'        => 'debt',
                'investment'  => 'investment',
                'investments' => 'investment',
                'invest'      => 'investment',
                'crypto'      => 'crypto',
            ];

            $normalizedType = $typeMap[$accountTypeKey] ?? null;

            if ($normalizedType === null) {
                log_message('error', 'WalletsController::details - Unsupported account type.', [
                    'account_type' => $accountTypeRaw,
                    'account_id'   => $accountID,
                ]);

                return redirect()
                    ->to(site_url('Wallets'))
                    ->with('error', 'Unsupported wallet/account type.');
            }

            $walletModel = $this->walletModel instanceof \App\Models\WalletModel
                ? $this->walletModel
                : new \App\Models\WalletModel();

            $previousData = null;

            switch ($normalizedType) {
                case 'bank':
                    $previousData = $walletModel->getBankAccountByIdOrWallet($accountID);
                    break;
                case 'credit':
                    $previousData = $walletModel->getCreditAccountByIdOrWallet($accountID);
                    break;
                case 'debt':
                    $previousData = $walletModel->getDebtAccountByIdOrWallet($accountID);
                    break;
                case 'investment':
                    $previousData = $walletModel->getInvestAccountByIdOrWallet($accountID);
                    break;
                case 'crypto':
                    $previousData = $walletModel->getCryptoAccountByIdOrWallet($accountID);
                    break;
            }

            if (empty($previousData) || ! is_array($previousData)) {
                log_message('warning', 'WalletsController::details - No account row found.', [
                    'account_type'    => $accountTypeRaw,
                    'normalized_type' => $normalizedType,
                    'account_id'      => $accountID,
                    'user_id'         => $this->currentWalletUserId(),
                ]);

                return redirect()
                    ->to(site_url('Wallets'))
                    ->with('error', 'Wallet/account record not found.');
            }

            $rowUserId     = (int) ($previousData['user_id'] ?? 0);
            $currentUserId = (int) $this->currentWalletUserId();

            if ($rowUserId > 0 && $currentUserId > 0 && $rowUserId !== $currentUserId) {
                log_message('error', 'WalletsController::details - User mismatch.', [
                    'account_type' => $accountTypeRaw,
                    'account_id'   => $accountID,
                    'row_user_id'  => $rowUserId,
                    'current_user' => $currentUserId,
                ]);

                return redirect()
                    ->to(site_url('Wallets'))
                    ->with('error', 'You are not authorized to view this wallet/account.');
            }

            $transactionWalletId = (int) ($previousData['wallet_id'] ?? 0);

            if ($transactionWalletId <= 0) {
                $parentWallet = $walletModel->where('id', $accountID)
                    ->where('user_id', (string) $currentUserId)
                    ->first();

                if (is_array($parentWallet) && ! empty($parentWallet['id'])) {
                    $transactionWalletId = (int) $parentWallet['id'];
                }
            }

            if ($transactionWalletId <= 0 && ! empty($previousData['account_id'])) {
                $parentWallet = $walletModel->where('account_id', (string) $previousData['account_id'])
                    ->where('user_id', (string) $currentUserId)
                    ->first();

                if (is_array($parentWallet) && ! empty($parentWallet['id'])) {
                    $transactionWalletId = (int) $parentWallet['id'];
                }
            }

            if ($transactionWalletId <= 0) {
                $parentWallet = $walletModel->where('account_id', (string) $accountID)
                    ->where('user_id', (string) $currentUserId)
                    ->first();

                if (is_array($parentWallet) && ! empty($parentWallet['id'])) {
                    $transactionWalletId = (int) $parentWallet['id'];
                }
            }

            if ($transactionWalletId <= 0) {
                $transactionWalletId = $accountID;
            }

            $transactionHistory = [];

            try {
                $transactionHistory = $this->resolveWalletService()
                    ->getWalletTransactionHistory($transactionWalletId, $currentUserId, 100);
            } catch (\Throwable $transactionError) {
                log_message('error', 'WalletsController::details - Transaction history load failed: {m}', [
                    'm'                     => $transactionError->getMessage(),
                    'account_id'            => $accountID,
                    'transaction_wallet_id' => $transactionWalletId,
                    'user_id'               => $currentUserId,
                ]);

                $transactionHistory = [];
            }

            log_message('debug', 'WalletsController::details - Loaded wallet/account details.', [
                'account_type'          => $accountTypeRaw,
                'normalized_type'       => $normalizedType,
                'account_id'            => $accountID,
                'transaction_wallet_id' => $transactionWalletId,
                'transaction_count'     => is_array($transactionHistory) ? count($transactionHistory) : 0,
                'user_id'               => $currentUserId,
            ]);

            $baseData = $this->commonData();

            $this->data = array_merge($baseData, [
                'previousData'        => $previousData,
                'accountType'         => $normalizedType,
                'accountTypeRaw'      => $accountTypeRaw,
                'accountID'           => $accountID,
                'transactionWalletId' => $transactionWalletId,
                'transactionHistory'  => $transactionHistory,
                'useDataTables'       => true,
                'pageTitle'           => 'Wallet Details | MyMI Wallet | The Future of Finance',
            ]);

            return $this->renderTheme('App\Modules\User\Views\Wallets\Details', $this->data);
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController::details - Exception: {m}', [
                'm'          => $e->getMessage(),
                'account_id' => $accountID,
            ]);

            return redirect()
                ->to(site_url('Wallets'))
                ->with('error', 'Unable to load wallet/account details.');
        }
    }
    public function transferFunds(): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        $this->data['pageTitle'] = 'Transfer Funds | MyMI Wallet | The Future of Finance';

        $this->commonData();

        return $this->renderTheme('App\\Modules\\User\\Views\\Wallets\\Transfer_Funds', $this->data);
    }

    public function executeSwap(): ResponseInterface
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        if (function_exists('premium_guard')) {
            $premiumGuard = premium_guard('exchange.swap');

            if ($premiumGuard instanceof ResponseInterface) {
                return $premiumGuard;
            }
        }

        $fromToken = $this->request->getPost('fromToken');
        $toToken   = $this->request->getPost('toToken');
        $amount    = $this->request->getPost('amount');

        $result = $this->resolveWalletService()->executeSwap($fromToken, $toToken, $amount);

        return $this->response->setJSON($result);
    }

    public function walletSelection(): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        $this->data['pageTitle'] = 'Select Wallet | MyMI Wallet | The Future of Finance';

        $this->commonData();

        return $this->renderTheme('App\\Modules\\User\\Views\\Wallets\\Wallet_Selection', $this->data);
    }

    public function purchase(): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        if ($redirect = $this->guardAuthenticated()) {
            return $redirect;
        }

        $uri       = $this->request->getUri();
        $segments  = $uri->getTotalSegments();
        $promoCode = '';
        $tier      = (string) ($this->request->getPost('tier') ?? '');

        if ($segments >= 2 && $uri->getSegment(2) === 'Purchase') {
            $tierFromUri = null;

            if ($segments >= 3) {
                $thirdSegment = $uri->getSegment(3);

                if ($thirdSegment === 'Memberships') {
                    if ($segments >= 4) {
                        $tierFromUri = $uri->getSegment(4);
                    }

                    if ($segments >= 5) {
                        $promoCode = $uri->getSegment(5);
                    }
                } elseif (in_array($thirdSegment, ['Starter', 'Basic', 'Pro', 'Premium'], true)) {
                    $tierFromUri = $thirdSegment;

                    if ($segments >= 4) {
                        $promoCode = $uri->getSegment(4);
                    }
                }
            }

            if ($tierFromUri !== null) {
                $tier = $tierFromUri;
            }
        }

        if ($promoCode === '' && $this->request->getGet('promo_code')) {
            $promoCode = (string) $this->request->getGet('promo_code');
        }

        log_message('debug', 'WalletsController::purchase - promoCode: {promoCode}', [
            'promoCode' => $promoCode,
        ]);

        $this->data['promoCode'] = $promoCode;

        $promoCodes = [];

        try {
            $config = config('Promotions');

            if ($config && isset($config->promoCodes) && is_array($config->promoCodes)) {
                $promoCodes = $config->promoCodes;
            }
        } catch (Throwable $e) {
            log_message('debug', 'WalletsController::purchase Promotions config unavailable: {message}', [
                'message' => $e->getMessage(),
            ]);
        }

        $discount = 0.0;

        if ($promoCode !== '' && isset($promoCodes[$promoCode])) {
            $discount = (float) $promoCodes[$promoCode];
        }

        $membershipFee = (float) ($this->request->getPost('membership_fee') ?? 100);
        $finalAmount   = max(0.0, $membershipFee - $discount);

        $this->data['membershipFee'] = $membershipFee;
        $this->data['discount']      = $discount;
        $this->data['finalAmount']   = $finalAmount;
        $this->data['tier']          = $tier;

        $serviceId = $this->request->getPost('service_id');

        if ($serviceId) {
            $service = $this->db->table('bf_users_services')
                ->where('id', $serviceId)
                ->get()
                ->getRowArray();

            if (! $service) {
                return redirect()->back()->with('error', 'Service not found.');
            }

            $finalServiceAmount = max(0.0, (float) ($service['price'] ?? 0) - $discount);

            $this->data['service']            = $service;
            $this->data['finalServiceAmount'] = $finalServiceAmount;
        }

        $this->commonData();

        return $this->renderTheme('App\\Modules\\User\\Views\\Wallets\\Purchase', $this->data);
    }

    public function purchaseGold(): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        $this->data['pageTitle'] = 'Purchase MyMI Gold | MyMI Wallet | The Future of Finance';

        $this->commonData();

        return $this->renderTheme('App\\Modules\\User\\Views\\Wallets\\Purchase_MyMI_Gold', $this->data);
    }

    public function purchaseMyMIGold(): ResponseInterface|string
    {
        return $this->purchaseGold();
    }

    public function handleMyMIGPayPalCallback(): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        $request = $this->request;

        $transactionID = $request->getPost('transaction_id');
        $totalCost     = $request->getPost('total_cost');
        $walletID      = $request->getPost('wallet_id');
        $userID        = $request->getPost('user_id');
        $userEmail     = $request->getPost('user_email');
        $transFee      = $request->getPost('trans_fee');

        $data = [
            'transaction_id' => $transactionID,
            'total_cost'     => $totalCost,
            'user_id'        => $userID,
            'wallet_id'      => $walletID,
            'user_email'     => $userEmail,
            'status'         => 'completed',
            'active'         => 1,
            'unix_timestamp' => time(),
            'submitted_date' => date('Y-m-d H:i:s'),
            'trans_type'     => 'MyMI Gold Purchase',
            'currency'       => 'USD',
            'amount'         => $totalCost,
            'fees'           => $transFee,
            'type'           => 'Purchase',
        ];

        if (isset($this->walletsModel) && method_exists($this->walletsModel, 'submitMyMIGold')) {
            $this->walletsModel->submitMyMIGold($data);
        } elseif ($this->mymigoldModel && method_exists($this->mymigoldModel, 'submitMyMIGold')) {
            $this->mymigoldModel->submitMyMIGold($data);
        } else {
            log_message('error', 'WalletsController::handleMyMIGPayPalCallback no submitMyMIGold method available.');

            return redirect()->back()->with('error', 'Unable to submit MyMI Gold purchase.');
        }

        $this->invalidateWalletCache((int) $userID);

        return redirect()->to('/Wallets/Purchase/MyMIGold/Complete/' . $transactionID);
    }

    public function purchaseMembershipSuccess(): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        $this->data['pageTitle'] = 'Membership Purchase Successful | MyMI Wallet | The Future of Finance';

        $this->commonData();

        return view('App\\Modules\\User\\Views\\Wallets\\Purchase\\Memberships\\Success', $this->data);
    }

    public function completePurchase(): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        $this->data['pageTitle'] = 'Complete Your Purchase | MyMI Wallet | The Future of Finance';

        $this->commonData();

        return $this->renderTheme('App\\Modules\\User\\Views\\Wallets\\Complete_Purchase', $this->data);
    }

    public function purchaseComplete($coin = null, $trans_id = null): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        $cuID = $this->currentWalletUserId();

        $this->data['pageTitle'] = 'Purchase Complete | MyMI Wallet | The Future of Finance';

        $this->commonData();

        if (! $trans_id) {
            $getUserLastOrderID = $this->mymigoldModel->getLastCompletedOrderIDByUser($cuID);
            $trans_id = $getUserLastOrderID[0]['id'] ?? null;
        }

        log_message('debug', 'WalletsController::purchaseComplete - trans_id: {transId}', [
            'transId' => $trans_id,
        ]);

        $userLastCompletedOrder = $this->mymigoldModel->getLastCompletedOrderInfo($trans_id);

        log_message('debug', 'WalletsController::purchaseComplete - userLastCompletedOrder: {order}', [
            'order' => print_r($userLastCompletedOrder, true),
        ]);

        if ($userLastCompletedOrder && (int) ($userLastCompletedOrder['user_id'] ?? 0) === $cuID) {
            $this->data['userLastCompletedOrder'] = $userLastCompletedOrder;

            if (! empty($userLastCompletedOrder['service_id'])) {
                $serviceDetails = $this->db->table('bf_users_services_purchases')
                    ->where('id', $userLastCompletedOrder['service_id'])
                    ->get()
                    ->getRowArray();

                $this->data['serviceDetails'] = $serviceDetails;
            }

            return $this->renderTheme('App\\Modules\\User\\Views\\Wallets\\Purchase_Complete', $this->data);
        }

        log_message('error', 'Unauthorized transaction access attempt by User ID {userId} for transaction ID {transId}', [
            'userId'  => $cuID,
            'transId' => $trans_id,
        ]);

        try {
            $email = service('email');
            $email->setFrom('no-reply@mymiwallet.com', 'MyMI Wallet');
            $email->setTo('security@mymiwallet.com');
            $email->setSubject('Unauthorized Transaction Access Attempt');
            $email->setMessage("User with ID {$cuID} tried to access unauthorized transaction {$trans_id}.");
            $email->send();
        } catch (Throwable $e) {
            log_message('error', 'WalletsController::purchaseComplete security email failed: {message}', [
                'message' => $e->getMessage(),
            ]);
        }

        try {
            (new \App\Libraries\MyMIDiscord())->enqueuePlain(
                'ops',
                "Alert! User with ID {$cuID} tried to access unauthorized transaction: {$trans_id}.",
                [
                    'dedupe_key' => 'unauthorized|' . $cuID . '|' . $trans_id,
                    'priority'   => 9,
                ]
            );
        } catch (Throwable $e) {
            log_message('error', 'WalletsController::purchaseComplete Discord alert failed: {message}', [
                'message' => $e->getMessage(),
            ]);
        }

        return redirect()->to('/Wallets/Purchase/MyMIGold/Security/' . $trans_id);
    }

    public function securityViolation(): ResponseInterface|string|null
    {
        $uri = $this->request->getUri();

        if ($uri->getSegment(4) === 'Security') {
            $trans_id = $uri->getSegment(5);

            $this->data['pageTitle'] = 'Security Violation | MyMI Wallet | The Future of Finance';
            $this->data['trans_id']  = $trans_id;

            $this->commonData();

            return $this->renderTheme('App\\Modules\\User\\Views\\Dashboard\\Defaults\\security', $this->data);
        }

        return null;
    }

    public function confirmDeposit(): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        $this->data['pageTitle'] = 'Confirm Deposit | MyMI Wallet | The Future of Finance';

        $this->commonData();

        return $this->renderTheme('App\\Modules\\User\\Views\\Wallets\\Confirm_Deposit', $this->data);
    }

    public function depositComplete($transID): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        if ($this->resolveWalletService()->completeDeposit($transID)) {
            session()->setFlashdata('message', 'Funds Deposited Successfully');
        } else {
            session()->setFlashdata('error', 'Deposit completion failed');
        }

        $this->invalidateWalletCache($this->currentWalletUserId());

        return redirect()->to('/Wallets');
    }

    public function viewTransactionHistory($walletId): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        $this->data['pageTitle'] = 'Transaction History | MyMI Wallet';
        $this->data['transactionHistory'] = $this->resolveWalletService()->getWalletTransactionHistory($walletId);

        $this->commonData();

        return $this->renderTheme('App\\Modules\\User\\Views\\Wallets\\Transaction_History', $this->data);
    }

    public function auditWallet($walletId): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        $this->data['pageTitle'] = 'Audit Wallet | MyMI Wallet';
        $this->data['auditLog'] = $this->resolveWalletService()->getWalletAuditLog($walletId);

        $this->commonData();

        return $this->renderTheme('App\\Modules\\User\\Views\\Wallets\\Audit_Log', $this->data);
    }

    public function detectFraud($walletId): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        $fraudDetectionResult = $this->resolveWalletService()->detectFraudInWallet($walletId);

        if ($fraudDetectionResult) {
            return redirect()->to('/Wallets')->with('warning', 'Suspicious activity detected in your wallet. Please review.');
        }

        return redirect()->to('/Wallets')->with('message', 'No suspicious activity detected.');
    }

    public function convertCurrency($walletId): ResponseInterface
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        $amount       = (float) $this->request->getPost('amount');
        $fromCurrency = (string) $this->request->getPost('fromCurrency');
        $toCurrency   = (string) $this->request->getPost('toCurrency');

        $convertedAmount = $this->currencyService->convertCurrency($amount, $fromCurrency, $toCurrency);

        return $this->response->setJSON([
            'status'          => 'success',
            'wallet_id'       => (int) $walletId,
            'convertedAmount' => $convertedAmount,
        ]);
    }

    public function generateStatement($walletId): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        $statementData = $this->resolveWalletService()->generateWalletStatement($walletId);

        $this->data['pageTitle'] = 'Wallet Statement | MyMI Wallet';
        $this->data['statement'] = $statementData;

        return $this->renderTheme('App\\Modules\\User\\Views\\Wallets\\Wallet_Statement', $this->data);
    }

    public function freezeWallet($walletId): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        if ($this->resolveWalletService()->freezeWallet($walletId)) {
            $row = $this->walletModel->find($walletId);

            $this->invalidateWalletCache((int) ($row['user_id'] ?? $this->currentWalletUserId()));

            return redirect()->to('/Wallets')->with('message', 'Wallet has been frozen successfully.');
        }

        return redirect()->to('/Wallets')->with('error', 'Failed to freeze the wallet.');
    }

    public function unfreezeWallet($walletId): ResponseInterface|string
    {
        if ($blocked = $this->guardWalletFeature()) {
            return $blocked;
        }

        if ($this->resolveWalletService()->unfreezeWallet($walletId)) {
            $row = $this->walletModel->find($walletId);

            $this->invalidateWalletCache((int) ($row['user_id'] ?? $this->currentWalletUserId()));

            return redirect()->to('/Wallets')->with('message', 'Wallet has been unfrozen successfully.');
        }

        return redirect()->to('/Wallets')->with('error', 'Failed to unfreeze the wallet.');
    }

    public function getAvailableServices(): ResponseInterface
    {
        $services = $this->db->table('bf_users_services')
            ->where('status', 1)
            ->get()
            ->getResultArray();

        return $this->response->setJSON([
            'status'   => 'success',
            'services' => $services,
        ]);
    }

    public function activatePremiumService(): ResponseInterface
    {
        $userId    = (int) $this->request->getPost('user_id');
        $serviceId = (int) $this->request->getPost('service_id');
        $tier      = (string) $this->request->getPost('tier');

        $service = $this->db->table('bf_users_services')
            ->where('id', $serviceId)
            ->get()
            ->getRowArray();

        if (! $service) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Service not found.',
            ])->setStatusCode(404);
        }

        $purchaseData = [
            'user_id'       => $userId,
            'service_id'    => $serviceId,
            'service_name'  => $service['service'] ?? '',
            'cost'          => $service['cost'] ?? 0,
            'price'         => $service['price'] ?? 0,
            'tier'          => $tier,
            'status'        => 'active',
            'purchase_time' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('bf_users_services_purchases')->insert($purchaseData);

        $transactionLog = [
            'transaction_id' => uniqid('service_', true),
            'status'         => 'completed',
            'user_id'        => $userId,
            'type'           => 'Service Purchase',
            'amount'         => $service['price'] ?? 0,
            'currency'       => 'USD',
            'wallet_id'      => $this->request->getPost('wallet_id'),
            'submitted_date' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('bf_users_wallet_transactions')->insert($transactionLog);

        $this->invalidateWalletCache($userId);

        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Premium service activated.',
        ]);
    }

    private function invalidateWalletCache(int $userId = 0): void
    {
        $tags = ['wallets'];

        if ($userId > 0) {
            $tags[] = 'user:' . $userId;
        }

        if (method_exists($this, 'invalidateCrudCache')) {
            try {
                $this->invalidateCrudCache($tags);
            } catch (Throwable $e) {
                log_message('debug', 'WalletsController invalidateCrudCache failed: {message}', [
                    'message' => $e->getMessage(),
                ]);
            }
        }

        $safeCache = $this->safeCacheService();

        if ($safeCache && method_exists($safeCache, 'deleteUser') && $userId > 0) {
            try {
                $safeCache->deleteUser('wallets', 'budget', $userId);
            } catch (Throwable $e) {
                log_message('debug', 'WalletsController safeCache deleteUser failed: {message}', [
                    'message' => $e->getMessage(),
                ]);
            }
        }
    }
}
