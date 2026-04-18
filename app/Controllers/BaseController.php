<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services; 
use Throwable; 
use Psr\Log\LoggerInterface;


use App\Libraries\{CrudCacheInvalidator, MyMIAdvisor, MyMIAlerts, MyMIAlphaVantage, MyMIAnalytics, MyMIBudget, MyMICoin, MyMIDashboard, MyMIExchange, MyMIInvestments, MyMIMarketing, MyMIProjects, MyMISolana, MyMIUser, MyMIWallet, MyMIWallets, SiteSettingsRuntime};
use App\Services\{AccountService, BudgetService, DashboardService, GoalTrackingService, MarketingService, SolanaService, UserService, WalletService};
use App\Models\WalletModel; // <-- add this

abstract class BaseController extends Controller
{
    /** Make base_url() available for self-hosted assets */
    protected $helpers = ['auth', 'form', 'url', 'cache']; 

    protected ?int $cuID = null;
    protected array $data = [];

    /** @var \CodeIgniter\Shield\Auth|null|\CodeIgniter\Shield\Authentication\Authentication|null|mixed */
    protected $auth;

    /** @var \CodeIgniter\HTTP\IncomingRequest */
    protected $request;

    /** @var \CodeIgniter\Session\Session */
    protected $session;

    protected $siteSettings;
    protected $socialMedia;
    protected int $debug = 0;
    protected string $theme = 'public';
    protected array $csp = [];
    protected ?string $cspNonce = null;
    protected bool $telemetryEnabled = false;
    protected ?string $requestId = null;
    protected ?float $startTime = null;
    protected int $maxListItems = 250;

    protected array $pageDefaults = [
        'pageName'  => '',
        'pageTitle' => 'MyMI Wallet',
        'meta'      => [
            'description' => 'Budgeting & Investments for the future of finance.',
            'keywords'    => 'finance, budgeting, investments, crypto, stocks',
        ],
    ];

    protected $alerts;
    protected $nonceAttributes;

    private ?MyMIAdvisor $myMIAdvisor = null;
    private ?MyMIAlerts $myMIAlerts = null;
    private ?MyMIAlphaVantage $MyMIAlphaVantage = null;
    private ?MyMIAnalytics $myMIAnalytics = null;
    private ?MyMIBudget $myMIBudget = null;
    private ?MyMICoin $myMICoin = null;
    private ?MyMIDashboard $myMIDashboard = null;
    private ?MyMIExchange $myMIExchange = null;
    private ?MyMIInvestments $myMIInvestments = null;
    private ?MyMIMarketing $myMIMarketing = null;
    private ?MyMIProjects $myMIProjects = null;
    private ?MyMISolana $myMISolana = null;
    private ?MyMIUser $myMIUser = null;
    private ?MyMIWallet $myMIWallet = null;
    private ?MyMIWallets $myMIWallets = null;

    private ?AccountService $accountService = null;
    private ?BudgetService $budgetService = null;
    private ?DashboardService $dashboardService = null;
    private ?GoalTrackingService $goalTrackingService = null;
    private ?MarketingService $marketingService = null;
    private ?SolanaService $solanaService = null;
    private ?UserService $userService = null;

    /** Properly-declared properties for wallet dependencies */
    private ?WalletService $walletService = null;
    private ?WalletModel   $walletModel   = null;
    private ?CrudCacheInvalidator $crudCacheInvalidator = null;

    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
        $this->normalizeAppOverridesFolder();
        
        if (strtolower($request->getMethod()) === 'head') {
            return;
        }

        $this->startTime = microtime(true);
        $this->requestId = bin2hex(random_bytes(6));
        $this->trace('[INIT] ' . static::class . '::' . $this->request->getMethod());
        $this->memoryCheckpoint('controller-start');
        $this->logRequestTrace();

        if (is_cli()) {
            return;
        }

        // Pick theme by first URI segment when not running in CLI
        if (! ($this->request instanceof CLIRequest)) {
            $uri   = $this->request->getUri();          // <-- accessor, not $this->request->getUri()
            $first = $uri->getSegment(1);
            if ($first === 'dashboard') {
                $this->theme = 'dashboard';
            }
        }

        if (function_exists('service')) {
            $this->alerts = service('alerts');
        }

        // Core boot
        $this->session      = Services::session();
        try {
            $this->auth = service('authentication');
        } catch (\Throwable $e) {
            log_message('critical', 'BaseController auth bootstrap failed: {message}', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);

            $this->auth = null;
        }
        $this->siteSettings = config('SiteSettings');

        // ✅ Apply runtime overrides AFTER boot (helpers + cache are live)
        SiteSettingsRuntime::apply($this->siteSettings);

        $this->socialMedia  = config('SocialMedia');
        $this->debug        = (int)($this->siteSettings->debug ?? 0);

        $this->cuID         = $this->resolveCurrentUserId();
        $this->telemetryEnabled = (bool) env('app.debugTelemetry', false);

        // CSP
        $this->data['cspNonce'] = bin2hex(random_bytes(16));
        $this->cspNonce = $this->data['cspNonce'];
        $this->csp = [
            'script' => $this->cspNonce,
            'style'  => $this->cspNonce,
        ];

        // Apply CSP once based on mode
        $this->applyContentSecurityPolicy($response);

        // Nonces/renderer exposure
        $this->nonceAttributes = $this->normalizeNonceAttributes($this->data['nonce'] ?? ['script' => '', 'style' => '']);
        $this->data['nonce']   = $this->nonceAttributes;

        Services::renderer()->setData([
            'csp'      => $this->csp,
            'nonce'    => $this->nonceAttributes,
            'cspNonce' => $this->cspNonce,
        ], 'raw');

        $this->hydrateLegacyLibraryProperties();

        // Common page data
        $this->data['debug']       = $this->debug;
        $this->data['siteSettings']= $this->siteSettings;
        $this->data['cuID']        = $this->cuID;
        $this->data['uri']         = $this->request->getUri();
        $this->data['userAgent']   = $this->request->getUserAgent();

        if ($this->request->isAJAX()) {
            $this->trace('[AJAX_HEADERS] ' . json_encode($this->request->headers()));
            $this->trace('[AJAX_POST] ' . json_encode($this->request->getPost()));
        }

        if (CI_DEBUG && ENVIRONMENT !== 'production') {
            Services::toolbar();
            log_message('debug', '[AIOPS][GOVERNANCE] Toolbar service initialized from BaseController.');
        }
    }

    protected function getCuID(): ?int
    {
        return $this->resolveCurrentUserId();
    }

    protected function trace($message, $level = 'debug'): void
    {
        log_message($level, '[REQ_ID=' . ($this->requestId ?? 'N/A') . '] ' . $message);
    }

    protected function logRequestTrace(): void
    {
        log_message('debug', '[TRACE]', [
            'url' => current_url(),
            'method' => $this->request->getMethod(),
            'controller' => static::class,
            'memory' => memory_get_usage(true),
            'user_id' => $this->safeAuthId() ?: null,
        ]);
    }

    protected function memoryCheckpoint($label): void
    {
        $this->trace('[MEMORY][' . $label . '] ' . memory_get_usage(true), 'info');
    }

    protected function logMemory($label = ''): void
    {
        $this->memoryCheckpoint((string) $label);
    }


    protected function hydrateLegacyLibraryProperties(): void
    {
        $legacyHydration = [
            'MyMIAlerts'   => fn() => $this->getMyMIAlerts(),
            'MyMIExchange' => fn() => $this->getMyMIExchange(),
            'MyMISolana'   => fn() => $this->getMyMISolana(),
            'MyMIWallet'   => fn() => $this->getMyMIWallet(),
            'MyMIWallets'  => fn() => $this->getMyMIWallets(),
        ];

        foreach ($legacyHydration as $property => $resolver) {
            if (! property_exists($this, $property)) {
                continue;
            }

            if ($this->$property !== null) {
                continue;
            }

            $this->$property = $resolver();
        }
    }

    protected function crudCacheInvalidator(): CrudCacheInvalidator
    {
        if ($this->crudCacheInvalidator === null) {
            /** @var CrudCacheInvalidator $invalidator */
            $invalidator = service('crudCacheInvalidator');
            $this->crudCacheInvalidator = $invalidator;
        }

        return $this->crudCacheInvalidator;
    }

    /**
     * Clear caches tied to the provided logical tags.
     *
     * @param array<int,string> $tags
     */
    protected function invalidateCrudCache(array $tags): void
    {
        if ($tags === []) {
            return;
        }

        $filtered = array_values(array_filter($tags, static fn($tag) => is_string($tag) && $tag !== ''));
        if ($filtered === []) {
            return;
        }

        $this->crudCacheInvalidator()->clear($filtered);
    }

    protected function safeView($view, array $data = [])
    {
        $this->normalizeAppOverridesFolder();

        $normalizedView = $this->requireValidViewPath($view, 'view', __METHOD__);

        $resolvedLayout = $this->resolveOptionalViewPath(
            $data['layout'] ?? null,
            'layout',
            'themes/public/layouts/index'
        );
        $resolvedHeader = $this->resolveOptionalViewPath(
            $data['headerView'] ?? null,
            'headerView'
        );
        $resolvedFooter = $this->resolveOptionalViewPath(
            $data['footerView'] ?? null,
            'footerView'
        );
        $resolvedAuthLayout = $this->resolveOptionalViewPath(
            $data['authLayout'] ?? null,
            'authLayout'
        );
        $resolvedContentView = $this->resolveOptionalViewPath(
            $data['contentView'] ?? null,
            'contentView'
        );
        $resolvedIntroView = $this->resolveOptionalViewPath(
            $data['introView'] ?? null,
            'introView'
        );

        $this->logRenderDiagnostics($normalizedView, $resolvedLayout, [
            'headerView' => $resolvedHeader,
            'footerView' => $resolvedFooter,
            'authLayout' => $resolvedAuthLayout,
            'contentView' => $resolvedContentView,
            'introView'   => $resolvedIntroView,
        ]);

        if (! is_file(APPPATH . 'Views/' . str_replace('\\', '/', $normalizedView) . '.php')) {
            log_message('error', '[MISSING VIEW] {view}', ['view' => $normalizedView]);
        }

        // Only pass valid resolved render-path keys into the view layer.
        // This avoids null path-like values later being treated as view paths.
        unset(
            $data['layout'],
            $data['headerView'],
            $data['footerView'],
            $data['authLayout'],
            $data['contentView'],
            $data['introView']
        );

        if ($resolvedLayout !== null) {
            $data['layout'] = $resolvedLayout;
        }

        if ($resolvedHeader !== null) {
            $data['headerView'] = $resolvedHeader;
        }

        if ($resolvedFooter !== null) {
            $data['footerView'] = $resolvedFooter;
        }

        if ($resolvedAuthLayout !== null) {
            $data['authLayout'] = $resolvedAuthLayout;
        }

        if ($resolvedContentView !== null) {
            $data['contentView'] = $resolvedContentView;
        }

        if ($resolvedIntroView !== null) {
            $data['introView'] = $resolvedIntroView;
        }

        return view($normalizedView, $data);
    }

    protected function respondWithRendered(string $view, array $data = []): ResponseInterface
    {
        $this->normalizeAppOverridesFolder();

        $normalizedView = $this->requireValidViewPath($view, 'view', __METHOD__);

        return $this->response->setBody(view($normalizedView, $data));
    }

    protected function forceSupportAlert(
        string $type,
        string $title,
        string $message,
        string $errorCode,
        ?Throwable $e = null,
        array $context = []
    ): void {
        $requestId = $this->requestId ?? bin2hex(random_bytes(6));
        $this->requestId = $requestId;

        $safeMessage = $message;
        $supportUrl = site_url('Support?code=' . rawurlencode($errorCode)
            . '&message=' . rawurlencode($safeMessage)
            . '&request_id=' . rawurlencode($requestId)
            . '&source=auth');

        $payload = [
            'type' => $type,
            'title' => $title,
            'message' => $safeMessage,
            'error_code' => $errorCode,
            'request_id' => $requestId,
            'support_url' => $supportUrl,
        ];

        if (ENVIRONMENT !== 'production' && $e !== null) {
            $payload['debug_message'] = $e->getMessage();
            $payload['debug_file'] = $e->getFile();
            $payload['debug_line'] = $e->getLine();
        }

        log_message('error', '[FORCED_SUPPORT_ALERT]', $payload + $context);
        session()->setFlashdata('forced_alert', $payload);
        session()->setFlashdata('auth_message', $payload + ['text' => $safeMessage]);
    }

    protected function commonData(): array|ResponseInterface
    {
        $this->logTelemetryMemory('commonData:start');
        $this->logMemory('commonData:start');
        $cuID = $this->getCuID();
        $this->data['cuID'] = $cuID;

        if ($cuID === null) {
            // For API controllers, force 401
            if ($this->request->isAJAX() || str_starts_with($this->request->getUri()->getPath(), 'API/')) {
                return $this->response->setStatusCode(401)
                    ->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
            }
            $this->data['currentUser'] = null;
            // $session    = session();
            // $currentUrl = current_url();

            // if (! $session->has('redirect_url')) {
            //     $session->set('redirect_url', $currentUrl);
            // }

            // log_message('debug', 'BaseController::commonData() redirecting guest to login from: ' . $currentUrl);

            // // For web controllers, redirect to login
            // return redirect()->to(site_url('/'));
        }
        // --- Preserve already-set items and fallbacks
        $this->data['debug']       = $this->data['debug']       ?? $this->debug;
        $this->data['siteSettings']= $this->data['siteSettings']?? $this->siteSettings;
        $this->data['uri']         = $this->data['uri']         ?? $this->request->getUri();
        $this->data['userAgent']   = $this->data['userAgent']   ?? $this->request->getUserAgent();
        $this->data['cuID']        = $this->data['cuID']        ?? $this->resolveCurrentUserId();
        $this->data['csp']         = $this->data['csp']         ?? $this->csp;
        $this->data['nonce']       = $this->normalizeNonceAttributes($this->data['nonce'] ?? $this->nonceAttributes);

        // Expose URI segments count for footer
        try {
            $this->data['totalSegments'] = $this->data['totalSegments']
                ?? count($this->request->getUri()->getSegments());
        } catch (\Throwable $e) {
            $this->data['totalSegments'] = 0;
        }

        // Defaults so views never explode
        $defaults = [
            'cuUsername' => '', 'cuDisplayName' => '', 'cuEmail' => '',
            'cuRole' => '', 'cuKYC' => '', 'cuUserType' => '',
            'progressGoalData' => [], 'completedGoals' => [], 'pendingGoals' => [],
            'promotionalBanners' => [],
            'totalAccountBalance' => 0.0,
            'totalAccountBalanceFMT' => number_format((float)($this->data['totalAccountBalance'] ?? 0), 2),
            'balance' => [
                'amount'   => (float)($this->data['balance']['amount'] ?? 0.0),
                'currency' => $this->data['balance']['currency'] ?? 'USD',
                'components' => $this->data['balance']['components'] ?? [],
                'asOf'     => $this->data['balance']['asOf'] ?? null,
                'mode'     => $this->data['balance']['mode'] ?? 'net-liquid',
            ],
            'cuSolanaDW' => $this->data['cuSolanaDW'] ?? [],
            'cuSolanaTotal' => (float)($this->data['cuSolanaTotal'] ?? 0),
            'cuSolanaValue' => (float)($this->data['cuSolanaValue'] ?? 0),
            'solanaNetworkStatus' => $this->data['solanaNetworkStatus'] ?? ['healthy' => false, 'slot' => null, 'version' => null],

            'userBudget' => $this->data['userBudget'] ?? [],
            'userBudgetRecords' => $this->data['userBudgetRecords'] ?? [],
            'userActiveBudgetRecords' => $this->data['userActiveBudgetRecords'] ?? [],
            'initialBankBalance' => (float)($this->data['initialBankBalance'] ?? 0.0),
            'initialBankBalanceFMT' => $this->data['initialBankBalanceFMT']
                ?? number_format((float)($this->data['initialBankBalance'] ?? 0.0), 2),
            'initialBankBalanceAsOf' => $this->data['initialBankBalanceAsOf'] ?? null,

            'repaymentSummary' => $this->data['repaymentSummary'] ?? [],
            'currentBalances' => $this->data['currentBalances'] ?? [],
            'availableBalances' => $this->data['availableBalances'] ?? [],
            'totalAvailableBalance' => (float)($this->data['totalAvailableBalance'] ?? 0.0),
            'repaymentSchedules' => $this->data['repaymentSchedules'] ?? [],
        ];
        // merge defaults without overwriting any already set keys
        foreach ($defaults as $k => $v) if (!array_key_exists($k, $this->data)) $this->data[$k] = $v;

        $this->cuID = $this->data['cuID'];
        if (empty($this->cuID)) {
            // guest context: ensure minimal safe fields exist
            $this->data['currentUser'] = null;
            $this->data['totalAccountBalanceFMT'] = number_format((float)$this->data['totalAccountBalance'], 2);
            return $this->data;
        }

        $cuID = $this->cuID;
        $setValue = function (string $key, $value): void {
            if ($value === null) return;
            if (is_string($value)) {
                $v = trim((string) $value);
                if ($v === '') return;
                $this->data[$key] = $v;
                return;
            }
            if (is_array($value) && $value === []) return;
            $this->data[$key] = $value;
        };

        // --- Current user
        try {
            $userInfo = $this->getMyMIUser()->getUserInformation($cuID);
            if (is_array($userInfo) && $userInfo !== []) {
                foreach (['cuUsername','cuDisplayName','cuEmail','cuRole','cuKYC','cuUserType'] as $field) {
                    if (array_key_exists($field, $userInfo)) {
                        $setValue($field, $userInfo[$field]);
                    }
                }
                $this->data['currentUser'] = $userInfo;
            } else {
                $this->data['currentUser'] = null;
            }
        } catch (\Throwable $e) {
            log_message('error', 'BaseController commonData(): getUserInformation failed: '.$e->getMessage());
            $this->data['currentUser'] = null;
        }

        $shouldLoadHeavy = $this->shouldLoadHeavyData();
        if (! $shouldLoadHeavy) {
            $this->logTelemetryMemory('commonData:light-return');
            return $this->data;
        }

        // --- Dashboard info
        try {
            $dashboardInfo = $this->getMyMIDashboard()->dashboardInfo($cuID);
            if (is_array($dashboardInfo) && $dashboardInfo !== []) {
                if (!empty($dashboardInfo['progressGoalData'])) {
                    $setValue('progressGoalData', $dashboardInfo['progressGoalData']);
                }
                if (!empty($dashboardInfo['promotionalBanners'])) {
                    $setValue('promotionalBanners', $dashboardInfo['promotionalBanners']);
                }
            }
        } catch (\Throwable $e) {
            log_message('error', 'BaseController commonData(): getDashboardInfo failed: '.$e->getMessage());
        }

        // --- Goals
        try {
            $gt = $this->getGoalTrackingService();
            $completed = $gt->getCompletedGoals($this->cuID) ?: [];
            if (!empty($completed)) $setValue('completedGoals', $completed);
            $pending = $gt->getPendingGoals($this->cuID) ?: [];
            if (!empty($pending)) $setValue('pendingGoals', $pending);
        } catch (\Throwable $e) {
            log_message('error', 'BaseController commonData(): getCompletedGoals failed: '.$e->getMessage());
        }

        // --- Budget
        try {
            $bs = $this->getBudgetService();
            $userBudget = $bs->getUserBudget($this->cuID) ?: [];
            if (!empty($userBudget)) {
                $setValue('userBudget', $userBudget);
                if (!empty($userBudget['userActiveBudgetRecords'])) $setValue('userActiveBudgetRecords', $userBudget['userActiveBudgetRecords']);
                if (!empty($userBudget['userBudgetRecords']))       $setValue('userBudgetRecords', array_slice($userBudget['userBudgetRecords'], 0, $this->maxListItems));
                if (array_key_exists('totalAccountBalance', $userBudget)) {
                    $this->data['totalAccountBalance'] = (float)$userBudget['totalAccountBalance'];
                    $this->data['totalAccountBalanceFMT'] = $userBudget['totalAccountBalanceFMT'] ?? number_format($this->data['totalAccountBalance'], 2);
                }
                if (array_key_exists('initialBankBalance', $userBudget)) {
                    $this->data['initialBankBalance'] = (float) $userBudget['initialBankBalance'];
                    $this->data['initialBankBalanceFMT'] = $userBudget['initialBankBalanceFMT']
                        ?? number_format($this->data['initialBankBalance'], 2);
                }
            }
            if ($this->data['userBudgetRecords'] === []) {
                $records = $bs->getUserBudgetRecords($this->cuID) ?? [];
                if (!empty($records)) $setValue('userBudgetRecords', array_slice($records, 0, $this->maxListItems));
            }
        } catch (\Throwable $e) {
            log_message('error', 'BaseController commonData(): getUserBudget failed: '.$e->getMessage());
        }

        // --- Solana summary (non-fatal)
        try {
            $solanaSummary = [];
            $solService    = $this->getSolanaService();

            // >>> Short-circuit when RPC network/circuits are degraded
            $solService = $this->getSolanaService();
            if (method_exists($solService, 'isNetworkDegraded') && $solService->isNetworkDegraded()) {
                log_message('notice', 'BaseController commonData(): Solana network degraded, skipping live calls');
            } else {
                try {
                    $solanaSummaryRaw = $this->getMyMISolana()->getUserSolana($this->cuID);
                    if (! is_array($solanaSummaryRaw)) {
                        log_message('debug', 'BaseController commonData(): MyMISolana returned non-array, applying defaults');
                        $solanaSummaryRaw = [];
                    }
                    $solanaSummary = array_merge([
                        'cuSolanaDW'          => [],
                        'cuSolanaTotal'       => 0.0,
                        'cuSolanaValue'       => 0.0,
                        'solanaNetworkStatus' => ['healthy' => false, 'status' => 'unavailable'],
                    ], $solanaSummaryRaw);
                } catch (\Throwable $inner) {
                    log_message('error', 'BaseController commonData(): MyMISolana getUserSolana failed: '.$inner->getMessage());
                }

                if (!empty($solanaSummary)) {
                    if (!empty($solanaSummary['cuSolanaDW'])) $setValue('cuSolanaDW', $solanaSummary['cuSolanaDW']);
                    if (array_key_exists('cuSolanaTotal', $solanaSummary)) $this->data['cuSolanaTotal'] = (float)$solanaSummary['cuSolanaTotal'];
                    if (array_key_exists('cuSolanaValue', $solanaSummary)) $this->data['cuSolanaValue'] = (float)$solanaSummary['cuSolanaValue'];
                    if (!empty($solanaSummary['solanaNetworkStatus'])) $setValue('solanaNetworkStatus', $solanaSummary['solanaNetworkStatus']);
                }

                $walletRow = is_array($solanaSummary['cuSolanaDW'] ?? null) ? $solanaSummary['cuSolanaDW'] : [];
                $address = $walletRow['public_token']
                    ?? $walletRow['address']
                    ?? $solanaSummary['address_b58']
                    ?? null;

                if ($address) {
                    try {
                        $snapshot = $solService->getSolanaData($address) ?? null;
                        if (is_array($snapshot)) {
                            if (isset($snapshot['nativeSOL'])) {
                                $this->data['cuSolanaTotal'] = (float)$snapshot['nativeSOL'];
                            }
                            if (!empty($snapshot['solanaNetworkStatus'])) {
                                $setValue('solanaNetworkStatus', $snapshot['solanaNetworkStatus']);
                            }
                        } else {
                            log_message('debug', 'BaseController commonData(): Solana data unavailable for address {address}', ['address' => $address]);
                        }
                    } catch (\Throwable $inner) {
                        log_message('debug', 'BaseController commonData(): Solana snapshot failed for {address}: {msg}', ['address' => $address, 'msg' => $inner->getMessage()]);
                    }
                }
            }

            $network = $solService->getSafeNetworkStatus();
            if (!empty($network)) $setValue('solanaNetworkStatus', $network);

            if ($this->data['cuSolanaValue'] === 0.0 && $this->data['cuSolanaTotal'] !== 0.0) {
                try {
                    $price = $solService->getSolanaPrice();
                    if (is_numeric($price)) $this->data['cuSolanaValue'] = $this->data['cuSolanaTotal'] * (float)$price;
                } catch (\Throwable $inner) {
                    log_message('error', 'BaseController commonData(): Solana price lookup failed: '.$inner->getMessage());
                }
            }
        } catch (\Throwable $e) {
            log_message('debug', 'BaseController commonData(): Solana calls failed: '.$e->getMessage());
        }

        // --- Credit/Debt & repayments
        try {
            $as = $this->getAccountService();
            $bs = $this->getBudgetService();

            $creditAccounts     = $as->getUserCreditAccounts($this->cuID) ?? [];
            $debtAccounts       = $as->getUserDebtAccounts($this->cuID) ?? [];
            $repaymentSchedules = $bs->calculateRepaymentSchedules($creditAccounts) ?? [];
            $repaymentSummary   = $bs->getRepaymentSummary($this->cuID) ?? [];

            if (!empty($repaymentSummary))   $setValue('repaymentSummary', $repaymentSummary);
            $currentBalances = $bs->getCurrentBalances($creditAccounts) ?? [];
            if (!empty($currentBalances))    $setValue('currentBalances', $currentBalances);
            $availableBalances = $bs->getAvailableBalances($repaymentSchedules) ?? [];
            if (!empty($availableBalances))  $setValue('availableBalances', $availableBalances);

            $totalAvailable = $bs->getTotalAvailableBalance($debtAccounts);
            if ($totalAvailable !== null) $this->data['totalAvailableBalance'] = (float)$totalAvailable;

            if (!empty($repaymentSchedules)) $setValue('repaymentSchedules', $repaymentSchedules);
        } catch (\Throwable $e) {
            log_message('error', 'BaseController commonData(): account/budget helpers failed: '.$e->getMessage());
        }

        // --- Portfolio balance (analytics)
        try {
            $balance = $this->getMyMIAnalytics()->getCurrentBalance($this->cuID);
            if (!empty($balance) && is_array($balance)) $this->data['balance'] = $balance;
        } catch (\Throwable $e) {
            log_message('error', 'BaseController commonData(): analytics balance failed: '.$e->getMessage());
        }

        $this->data['totalAccountBalanceFMT'] = number_format((float)$this->data['totalAccountBalance'], 2);
        $this->logTelemetryMemory('commonData:end');
        return $this->data;
    }


    public function __destruct()
    {
        if ($this->startTime !== null) {
            $duration = microtime(true) - $this->startTime;
            $this->trace('[PERF] Execution time=' . number_format($duration, 6), 'info');
        }
    }

    protected function normalizeAppOverridesFolder(): void
    {
        $config = config('App');

        if (! isset($config->appOverridesFolder) || ! is_string($config->appOverridesFolder)) {
            $config->appOverridesFolder = '';
            return;
        }

        $config->appOverridesFolder = trim((string) ($config->appOverridesFolder ?? ''), "/\\");
    }

    protected function renderTheme(string $view, ResponseInterface|array $data = []): ResponseInterface|string
    {
        if ($data instanceof ResponseInterface) {
            return $data; // just hand it back
        }
        $this->trace('[VIEW_RENDER] ' . $view);
        $this->normalizeAppOverridesFolder();

        // Pick theme (public/dashboard) just like before
        $theme = $data['layout'] ?? $this->theme ?? 'public';

        // Auto-resolve view path if you passed '*'
        if ($view === '*') {
            $view = $this->autoViewPath($theme, $data['view'] ?? null);
        }

        $base = $this->commonData();
        if ($base instanceof ResponseInterface) {
            return $base;
        }

        $data = array_merge($base, $data);

        // Merge your global defaults and request-derived stuff
        $data = $this->injectThemeDefaults($theme, $data);

        // 1) Render the inner view to a string
        $innerHtml = view($view, $data);

        // 2) Pass it to the theme’s layout as `$content`
        $payload            = $data;
        $payload['content'] = $innerHtml;

        // (Optional but handy) make sure nonce is available even if subViewData overrides
        if (! isset($payload['nonce']) && isset($this->nonceAttributes)) {
            $payload['nonce'] = $this->nonceAttributes;
        }

        // 3) Render the layout that expects `$content`
        $layout = "themes/{$theme}/layouts/index";
        return $this->tryView($layout, $payload, [
            "themes/{$theme}/layouts/default",
            "themes/{$theme}/index",
        ]);
    }

    protected function tryView(string $view, array $data = [], array $alternatives = []): string
    {
        $resolved = $this->resolveView($view, $alternatives);
        if (! $resolved) {
            log_message('error', 'renderTheme could not locate view: {view}', ['view' => $view]);
            throw PageNotFoundException::forPageNotFound($view);
        }

        $this->normalizeAppOverridesFolder();

        return view($resolved, $data);
    }

    protected function resolveView(string $candidate, array $alternatives = []): ?string
    {
        $paths = array_merge($this->expandViewCandidates($candidate), $alternatives);

        foreach ($paths as $path) {
            foreach ($this->expandViewCandidates($path) as $option) {
                if ($this->viewExists($option)) {
                    return $option;
                }
            }
        }

        return null;
    }

    protected function viewExists(string $path): bool
    {
        $locator = service('locator');
        if ($locator->locateFile($path, 'Views')) {
            return true;
        }

        $normalized = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $path);
        $candidates = [
            APPPATH . 'Views' . DIRECTORY_SEPARATOR . $normalized . '.php',
        ];

        $segments = explode(DIRECTORY_SEPARATOR, $normalized);
        if (count($segments) > 1) {
            $module     = array_shift($segments);
            $moduleDir  = str_ends_with($module, 'Module') ? substr($module, 0, -6) : $module;
            $moduleBase = APPPATH . 'Modules' . DIRECTORY_SEPARATOR . $moduleDir . DIRECTORY_SEPARATOR;

            if (! empty($segments)) {
                if ($segments[0] === 'Views') {
                    $moduleCandidates = $moduleBase . implode(DIRECTORY_SEPARATOR, $segments) . '.php';
                } else {
                    $moduleCandidates = $moduleBase . 'Views' . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $segments) . '.php';
                }
                $candidates[] = $moduleCandidates;
            }
        }

        foreach ($candidates as $file) {
            if (is_file($file)) {
                return true;
            }
        }

        return false;
    }

    protected function expandViewCandidates(string $view): array
    {
        $candidates = [$view];

        if (str_contains($view, '\\')) {
            $candidates[] = str_replace('\\', '/', $view);
        } else {
            $normalized = str_replace('\\', '/', $view);
            $segments   = explode('/', $normalized);

            if (count($segments) > 1) {
                $module    = array_shift($segments);
                $namespace = str_ends_with($module, 'Module') ? $module : $module . 'Module';
                $remainder = implode('\\', $segments);
                $namespaced = $namespace . '\\Views\\' . $remainder;

                if ($namespaced !== $view) {
                    array_unshift($candidates, $namespaced);
                }
            }
        }

        return array_values(array_unique($candidates));
    }
    
    protected function autoViewPath(string $theme, ?string $explicit = null): string
    {
        if ($explicit) {
            return "themes/{$theme}/{$explicit}";
        }

        $segments = [];
        if (! ($this->request instanceof \CodeIgniter\HTTP\CLIRequest)) {
            $segments = $this->request->getUri()->getSegments();
        }

        // Strip "dashboard" when using dashboard theme
        if ($theme === 'dashboard' && isset($segments[0]) && $segments[0] === 'dashboard') {
            array_shift($segments);
        }

        // If we have path segments, map them directly.
        if (! empty($segments)) {
            return "themes/{$theme}/" . implode('/', $segments);
        }

        // Fallback: use the resolved controller/method (e.g., Dashboard/index)
        $router = service('router');
        $controllerFQCN = $router->controllerName();   // e.g., App\Modules\Users\Controllers\DashboardController
        $method         = $router->methodName() ?? 'index';

        if ($controllerFQCN) {
            // Get short name without "Controller" suffix, lowercase it for view paths
            $short = basename(str_replace('\\', '/', $controllerFQCN));      // DashboardController
            $short = preg_replace('/Controller$/', '', $short);              // Dashboard
            $short = strtolower($short);                                     // dashboard

            return "themes/{$theme}/{$short}/{$method}";
        }

        // Final fallback
        return "themes/{$theme}/home";
    }

    protected function injectThemeDefaults(string $theme, array $data): array
    {
        $merged = array_replace_recursive($this->pageDefaults, $data);
        $merged['layout'] = $theme;
        return $merged;
    }

    protected function shouldLoadHeavyData(): bool
    {
        $path = strtolower(trim((string) $this->request->getUri()->getPath(), '/'));
        if ($path === '') {
            return false;
        }

        $heavyPrefixes = [
            'dashboard',
            'account',
            'wallets',
            'trade-tracker',
            'my-account',
            'mymi-wallet',
            'profile',
            'performance',
            'schedule',
        ];

        foreach ($heavyPrefixes as $prefix) {
            if (str_starts_with($path, $prefix)) {
                return true;
            }
        }

        return $this->request->isAJAX();
    }

    protected function logTelemetryMemory(string $label): void
    {
        if (! $this->telemetryEnabled) {
            return;
        }

        $usageKb = (int) (memory_get_usage(true) / 1024);
        $peakKb  = (int) (memory_get_peak_usage(true) / 1024);
        log_message('debug', "telemetry:{$label} mem={$usageKb}KB peak={$peakKb}KB");
    }

    /**
     * Resolves and returns the current user's ID, or null if not logged in.
     * Caches the result in $this->cuID for efficiency.
     */
    protected function loadCurrentUserOrNull(): ?array
    {
        $id = $this->resolveCurrentUserId();
        return $id ? $this->getMyMIUser()->getUserInformation($id) : null; // ensure we call the getter
    }

    protected function resolveCurrentUserId(): ?int
    {
        if ($this->cuID !== null) {
            return $this->cuID;
        }

        $session    = function_exists('session') ? session() : null;
        $candidates = [];

        if ($session) {
            foreach (['cuID', 'user_id', 'userId', 'id', 'currentUserID', 'currentUserId'] as $key) {
                if ($session->has($key)) {
                    $value = $session->get($key);
                    if (is_numeric($value) && (int) $value > 0) {
                        $candidates[] = (int) $value;
                    }
                }
            }
        }

        // Shield helpers (available when shield is loaded)
        try {
            $value = $this->safeAuthId();
            if ($value > 0) {
                $candidates[] = $value;
            }

            $user = $this->safeAuthUser();
            $value = $user->id ?? null;
            if (is_numeric($value) && (int) $value > 0) {
                $candidates[] = (int) $value;
            }
        } catch (\Throwable $e) {
            log_message('debug', 'resolveCurrentUserId safe auth lookup failed: ' . $e->getMessage());
        }

        foreach ($candidates as $candidate) {
            if ($candidate <= 0) {
                continue;
            }

            $this->cuID = (int) $candidate;

            if ($session && method_exists($session, 'set') && ! $session->has('cuID')) {
                $session->set('cuID', $this->cuID);
            }

            return $this->cuID;
        }

        $this->cuID = null;
        return null;
    }

    protected function resolveUserId(): ?int
    {
        try {
            if ($this->safeAuthCheck()) {
                $id = $this->safeAuthId();
                return $id > 0 ? $id : null;
            }
        } catch (\Throwable $e) {
            log_message('debug', 'resolveUserId safe auth lookup failed: ' . $e->getMessage());
        }

        $sid = session()->get('user_id') ?? session()->get('id');
        if (is_numeric($sid)) {
            return (int) $sid;
        }

        return null;
    }

    /**
     * Optional gate for API endpoints: return 401 JSON if not logged in.
     */
    protected function requireUserOrJson(): ?\CodeIgniter\HTTP\Response
    {
        if ($this->cuID === null) {
            return service('response')->setJSON([
                'status'  => 'error',
                'asOf'    => gmdate('c'),
                'message' => 'Authentication required.',
            ])->setStatusCode(401);
        }
        return null;
    }

    /** Lazy service getters */
    protected function getMyMIAdvisor(): MyMIAdvisor
    {
        return $this->myMIAdvisor ??= new MyMIAdvisor();
    }
    protected function getMyMIAnalytics(): \App\Libraries\MyMIAnalytics
    {
        if (! ($this->myMIAnalytics instanceof \App\Libraries\MyMIAnalytics)) {
            // try DI/service first
            try {
                $svc = service('myMIAnalytics');
                if ($svc instanceof \App\Libraries\MyMIAnalytics) {
                    $this->myMIAnalytics = $svc;
                }
            } catch (\Throwable $e) {
                // ignore and fallback to manual
            }

            if (! ($this->myMIAnalytics instanceof \App\Libraries\MyMIAnalytics)) {
                $this->myMIAnalytics = new \App\Libraries\MyMIAnalytics();
            }
        }
        return $this->myMIAnalytics;
    }

    protected function getMyMIBudget(): MyMIBudget
    {
        return $this->myMIBudget ??= new MyMIBudget();
    }
    protected function getMyMICoin(): MyMICoin
    {
        return $this->myMICoin ??= new MyMICoin();
    }
    protected function getMyMIInvestments(): MyMIInvestments
    {
        if (! ($this->myMIInvestments instanceof MyMIInvestments)) {
            try {
                $svc = service('myMIInvestments');
                if ($svc instanceof MyMIInvestments) {
                    $this->myMIInvestments = $svc;
                }
            } catch (\Throwable $e) {
                // ignore and fallback to manual initialization
            }

            if (! ($this->myMIInvestments instanceof MyMIInvestments)) {
                $this->myMIInvestments = new MyMIInvestments();
            }
        }

        return $this->myMIInvestments;
    }
    protected function getMyMIMarketing(): MyMIMarketing
    {
        if (! ($this->myMIMarketing instanceof MyMIMarketing)) {
            try {
                $svc = service('myMIMarketing');
                if ($svc instanceof MyMIMarketing) {
                    $this->myMIMarketing = $svc;
                }
            } catch (\Throwable $e) {
                $this->logRenderFailureToChannels(
                    'warning',
                    'BaseController failed to resolve myMIMarketing service; creating new instance.',
                    ['error' => $e->getMessage()]
                );
            }

            if (! ($this->myMIMarketing instanceof MyMIMarketing)) {
                $this->myMIMarketing = new MyMIMarketing();
            }
        }

        return $this->myMIMarketing;
    }
    protected function getMyMIDashboard(): MyMIDashboard
    {
        return $this->myMIDashboard ??= new MyMIDashboard();
    }
    protected function getMyMIExchange(): MyMIExchange
    {
        return $this->myMIExchange ??= new MyMIExchange();
    }
    protected function getMyMIProjects(): MyMIProjects
    {
        return $this->myMIProjects ??= new MyMIProjects();
    }
    protected function getMyMISolana(): MyMISolana
    {
        return $this->myMISolana ??= new MyMISolana();
    }
    protected function getMyMIUser(): MyMIUser
    {
        return $this->myMIUser ??= new MyMIUser();
    }
    protected function getMyMIWallet(): MyMIWallet
    {
        return $this->myMIWallet ??= new MyMIWallet();
    }
    protected function getMyMIWallets(): MyMIWallets
    {
        return $this->myMIWallets ??= new MyMIWallets();
    }

    protected function getMyMIAlerts(): MyMIAlerts
    {
        return $this->myMIAlerts ??= new MyMIAlerts();
    }

    /**
     * @throws \InvalidArgumentException
     */
    protected function requireValidViewPath(mixed $candidate, string $variableName, string $method): string
    {
        if (! is_string($candidate) || trim($candidate) === '') {
            $context = [
                'controller' => static::class,
                'method' => $method,
                'variable' => $variableName,
                'type' => gettype($candidate),
                'is_empty' => empty($candidate),
            ];
            $this->logRenderFailureToChannels('critical', 'Auth register render failed: missing required view path', $context);
            throw new \InvalidArgumentException(sprintf('Invalid view path for "%s".', $variableName));
        }

        return trim($candidate, "/\\ \t\n\r\0\x0B");
    }

    protected function resolveOptionalViewPath(mixed $candidate, string $variableName, ?string $default = null): ?string
    {
        if (is_string($candidate) && trim($candidate) !== '') {
            return trim($candidate, "/\\ \t\n\r\0\x0B");
        }

        if (is_string($default) && trim($default) !== '') {
            $resolvedDefault = trim($default, "/\\ \t\n\r\0\x0B");
            $this->logRenderFailureToChannels('warning', 'Optional view path missing; using default path', [
                'controller' => static::class,
                'variable' => $variableName,
                'default' => $resolvedDefault,
            ]);
            return $resolvedDefault;
        }

        if ($candidate !== null && $candidate !== '') {
            $this->logRenderFailureToChannels('warning', 'Optional view path rejected; skipping partial render', [
                'controller' => static::class,
                'variable' => $variableName,
                'type' => gettype($candidate),
            ]);
        }

        return null;
    }

    protected function logRenderDiagnostics(string $requestedView, ?string $resolvedLayout, array $partials = []): void
    {
        $emptyPartials = [];
        foreach ($partials as $name => $value) {
            if (! is_string($value) || trim($value) === '') {
                $emptyPartials[] = $name;
            }
        }

        log_message('debug', '[VIEW_RESOLUTION] Render configuration', [
            'controller' => static::class,
            'requested_view' => $requestedView,
            'resolved_layout' => $resolvedLayout,
            'partials' => $partials,
            'empty_partial_names' => $emptyPartials,
        ]);
    }

    protected function logRenderFailureToChannels(string $level, string $message, array $context = []): void
    {
        log_message($level, $message, $context);

        try {
            $db = \Config\Database::connect();
            if (method_exists($db, 'tableExists') && ! $db->tableExists('bf_error_logs')) {
                return;
            }

            $payload = [
                'log_message' => $message,
                'uri'         => isset($this->request) ? (string) $this->request->getUri() : null,
                'method'      => isset($this->request) ? $this->request->getMethod() : null,
                'ip_address'  => isset($this->request) ? $this->request->getIPAddress() : null,
                'severity'    => strtoupper($level),
                'context'     => json_encode($context, JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR),
                'created_at'  => date('Y-m-d H:i:s'),
            ];

            $columns = array_map('strtolower', $db->getFieldNames('bf_error_logs'));
            $filtered = [];
            foreach ($payload as $key => $value) {
                if (in_array(strtolower((string) $key), $columns, true)) {
                    $filtered[$key] = $value;
                }
            }

            if ($filtered !== []) {
                $db->table('bf_error_logs')->insert($filtered);
            }
        } catch (\Throwable $e) {
            log_message('error', 'Failed to mirror render failure to bf_error_logs: {error}', ['error' => $e->getMessage()]);
        }
    }

    protected function getAccountService(): AccountService
    {
        return $this->accountService ??= new AccountService();
    }
    protected function getBudgetService(): BudgetService
    {
        if (!isset($this->budgetService)) {
            $this->budgetService = new BudgetService();
        }

        $this->budgetService->setUserId($this->resolveCurrentUserId());

        return $this->budgetService;
    }
    protected function getDashboardService(): DashboardService
    {
        return $this->dashboardService ??= service('dashboardService');
    }
    protected function getGoalTrackingService(): GoalTrackingService
    {
        return $this->goalTrackingService ??= new GoalTrackingService();
    }
    protected function getMarketingService(): MarketingService
    {
        return $this->marketingService ??= new MarketingService();
    }
    protected function getSolanaService(): SolanaService
    {
        return $this->solanaService ??= new SolanaService();
    }
    protected function getUserService(): UserService
    {
        return $this->userService ??= new UserService($this->siteSettings, $this->cuID, $this->request);
    }
    
    protected function loadCurrentUser(): void
    {
        $session = service('session');
        $userId  = (int) ($session->get('user_id') ?? 0);

        if ($userId > 0) {
            $this->user = $this->myMiUser->getUserInformation($userId);
        } else {
            $this->user = null;
        }
    }

    /**
     * WalletService needs exactly two arguments (LoggerInterface, WalletModel).
     * We wire both here and keep it lazily initialized.
     */
    protected function getWalletService(): WalletService
    {
        // Ensure we have a WalletModel instance
        $this->walletModel ??= new WalletModel();

        return $this->walletService ??= new WalletService($this->logger, $this->walletModel);
    }

    private function summarizeWalletGroups(array $walletGroups): float
    {
        $total = 0.0;

        foreach ($walletGroups as $group) {
            if (!is_iterable($group)) {
                continue;
            }

            foreach ($group as $wallet) {
                if (is_array($wallet)) {
                    $total += (float)($wallet['walletAmount'] ?? 0);
                }
            }
        }

        return $total;
    }

    /**
     * Legacy property bridging
     */
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        if ($name === 'walletService') {
            $this->walletService = $this->getWalletService();
            return $this->walletService;
        }

        if ($name === 'MyMIAlerts') {
            $this->myMIAlerts = $this->getMyMIAlerts();
            return $this->myMIAlerts;
        }

        $getter = 'get' . $name;
        if (method_exists($this, $getter)) {
            $this->$name = $this->$getter();
            return $this->$name;
        }

        static $map = [
            'MyMIAlerts'      => 'myMIAlerts',
            'MyMIUser'        => 'myMIUser',
            'MyMIWallet'      => 'myMIWallet',
            'MyMIWallets'     => 'myMIWallets',
            'MyMIGold'        => 'myMIGold',
            'MyMIInvestments' => 'myMIInvestments',
            'MyMIMarketing'   => 'myMIMarketing',
            'MyMIDashboard'   => 'myMIDashboard',
            'MyMIBudget'      => 'myMIBudget',
            'MyMICoin'        => 'myMICoin',
            'budgetService'   => 'budgetService',
            'userService'     => 'userService',
            'solanaService'   => 'solanaService',
            'walletService'   => 'walletService', // <-- allow legacy access
            'email'           => 'email',
        ];

        if (isset($map[$name])) {
            try {
                $this->$name = service($map[$name]);
                if (function_exists('log_message')) {
                    log_message('debug', 'Legacy proxy: $this->' . $name . ' => service("' . $map[$name] . '")');
                }
                return $this->$name;
            } catch (\Throwable $e) {
                if (function_exists('log_message')) {
                    log_message('error', "Legacy proxy failed for \${$name}: " . $e->getMessage());
                }
            }
        }

        if (function_exists('log_message')) {
            log_message('notice', "Unknown legacy property \${$name} on " . static::class);
        }
        return null;
    }

    /**
     * Generate a base64url nonce for CSP.
     */
    protected function generateNonce(int $bytes = 16): string
    {
        return rtrim(strtr(base64_encode(random_bytes($bytes)), '+/', '-_'), '=');
    }

    // BaseController.php — drop in these methods
    protected function applyContentSecurityPolicy(ResponseInterface $response): void
    {
        if (is_cli()) {
            return;
        }

        $mode = strtolower((string) (env('APP_CSP_MODE') ?: 'permissive'));

        if ($mode === 'relaxed') {
            $mode = 'permissive';
        }

        $response->removeHeader('Content-Security-Policy');

        if (!is_array($this->csp)) {
            $this->csp = [];
        }

        if ($mode === 'off') {
            $this->csp['mode']   = 'off';
            $this->csp['script'] = '';
            $this->csp['style']  = '';

            $this->data['csp']   = $this->csp;
            $this->data['nonce'] = ['script' => '', 'style' => ''];
            $this->nonceAttributes = $this->data['nonce'];
            return;
        }

        if ($mode === 'permissive') {
            $this->csp['mode']   = 'permissive';
            $this->csp['script'] = $this->cspNonce ?? $this->generateNonce();
            $this->csp['style']  = $this->cspNonce ?? $this->generateNonce();

            $this->applyCspRelaxed($response);

            $this->data['csp']   = $this->csp;
            $this->data['nonce'] = [
                'script' => $this->cspAttr('script', $this->csp['script'] ?? ''),
                'style'  => $this->cspAttr('style',  $this->csp['style']  ?? ''),
            ];
            $this->nonceAttributes = $this->data['nonce'];
            return;
        }

        // STRICT by default
        $this->csp['mode']   = 'strict';
        $this->csp['script'] = $this->cspNonce ?? $this->generateNonce();
        $this->csp['style']  = $this->cspNonce ?? $this->generateNonce();

        $this->applyCspStrict($response);

        $this->data['csp']   = $this->csp;
        $this->data['nonce'] = [
            'script' => $this->cspAttr('script', $this->csp['script'] ?? ''),
            'style'  => $this->cspAttr('style',  $this->csp['style']  ?? ''),
        ];
        $this->nonceAttributes = $this->data['nonce'];
    }

    private function cspAttr(string $type, string $raw): string
    {
        return $raw ? 'nonce="' . esc($raw, 'attr') . '"' : '';
    }

    /**
     * Normalize nonce values into full HTML attributes.
     *
     * @param array|string|null $nonce
     * @return array{script:string,style:string}
     */
    private function normalizeNonceAttributes(array|string|null $nonce): array
    {
        if (is_array($nonce)) {
            $script = (string)($nonce['script'] ?? '');
            $style  = (string)($nonce['style'] ?? '');
        } else {
            $script = (string)($nonce ?? '');
            $style  = (string)($nonce ?? '');
        }

        return [
            'script' => $this->formatNonceAttribute($script),
            'style'  => $this->formatNonceAttribute($style),
        ];
    }

    private function formatNonceAttribute(string $nonce): string
    {
        $nonce = trim((string) $nonce);
        if ($nonce === '') {
            return '';
        }

        return str_contains($nonce, 'nonce=')
            ? $nonce
            : 'nonce="' . esc($nonce, 'attr') . '"';
    }

    private function applyCspRelaxed(ResponseInterface $response): void
    {
        // PERMISSIVE: nonce-based inline, allows broader CDNs/widgets
        $scriptNonce = $this->csp['script'] ?? '';
        $styleNonce  = $this->csp['style']  ?? '';

        $directives = [
            "default-src 'self'",
            "script-src 'self' 'nonce-{$scriptNonce}' https://code.jquery.com https://cdn.jsdelivr.net https://cdn.datatables.net https://cdnjs.cloudflare.com https://unpkg.com https://www.googletagmanager.com https://www.google-analytics.com https://www.google.com https://www.gstatic.com https://s3.tradingview.com https://www.tradingview.com https://maxcdn.bootstrapcdn.com https://stackpath.bootstrapcdn.com https://connect.facebook.net https://www.clarity.ms https://scripts.clarity.ms",
            "script-src-elem 'self' 'nonce-{$scriptNonce}' https://code.jquery.com https://cdn.jsdelivr.net https://cdn.datatables.net https://cdnjs.cloudflare.com https://unpkg.com https://www.googletagmanager.com https://www.google-analytics.com https://www.google.com https://www.gstatic.com https://s3.tradingview.com https://www.tradingview.com https://maxcdn.bootstrapcdn.com https://stackpath.bootstrapcdn.com https://connect.facebook.net https://www.clarity.ms https://scripts.clarity.ms",
            "connect-src 'self' https: https://www.google-analytics.com https://www.googletagmanager.com https://s3.tradingview.com https://www.tradingview.com https://connect.facebook.net https://www.clarity.ms",
            "style-src 'self' 'nonce-{$styleNonce}' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://fonts.googleapis.com https://unpkg.com https://maxcdn.bootstrapcdn.com https://stackpath.bootstrapcdn.com",
            "style-src-elem 'self' 'nonce-{$styleNonce}' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://fonts.googleapis.com https://unpkg.com https://maxcdn.bootstrapcdn.com https://stackpath.bootstrapcdn.com",

            "img-src 'self' data: https:",
            "font-src 'self' data: https: https://fonts.gstatic.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://maxcdn.bootstrapcdn.com https://stackpath.bootstrapcdn.com https://static.tradingview.com",

            // Embeds (YouTube, TradingView, Clarity)
            "frame-src 'self' https://www.youtube.com https://www.google.com https://www.tradingview.com https://s.tradingview.com https://www.clarity.ms",

            "worker-src 'self' blob:",
            "object-src 'none'",
            "base-uri 'self'",
            "form-action 'self'",
            "upgrade-insecure-requests",
        ];
        $response->setHeader('Content-Security-Policy', implode('; ', $directives));
    }

    private function applyCspStrict(ResponseInterface $response): void
    {
        // STRICT: inline requires nonces; element style="" will be blocked unless you move into <style nonce> or CSS files
        $scriptNonce = $this->csp['script'] ?? '';
        $styleNonce  = $this->csp['style']  ?? '';

        if (! function_exists('vite_is_dev')) {
            helper('vite');
        }

        $allowViteDev = function_exists('vite_is_dev') && vite_is_dev();

        $scriptSrc = [
            "'self'",
            'https://code.jquery.com',
            'https://cdn.jsdelivr.net',
            'https://cdnjs.cloudflare.com',
            'https://www.googletagmanager.com',
            'https://s3.tradingview.com',
            'https://connect.facebook.net', // + Facebook
            'https://unpkg.com',
            'https://unpkg.com',
            'https://www.clarity.ms',
            'https://scripts.clarity.ms',
        ];

        $styleSrc = [
            "'self'",
            'https://fonts.googleapis.com',
            'https://cdn.jsdelivr.net',
            'https://unpkg.com', 
        ];

        $connectSrc = [
            "'self'",
            'https://www.googletagmanager.com',
            'https://www.google-analytics.com',
            'https://s3.tradingview.com',
            'https://www.tradingview.com',
            'https://connect.facebook.net', // + Facebook
            'https://www.clarity.ms',
            'https://scripts.clarity.ms',
        ];

        if ($allowViteDev) {
            $scriptSrc[]  = 'http://127.0.0.1:5173';
            $connectSrc[] = 'http://127.0.0.1:5173';
            $connectSrc[] = 'ws://127.0.0.1:5173';
        }

        $scriptSrc[] = $scriptNonce !== '' ? "'nonce-{$scriptNonce}'" : '';
        $styleSrc[]  = $styleNonce !== '' ? "'nonce-{$styleNonce}'" : '';

        $directives = [
            "default-src 'self' data: blob:",
            "base-uri 'self'",
            "frame-ancestors 'self'",
            'script-src ' . implode(' ', array_filter(array_unique($scriptSrc))),
            'style-src ' . implode(' ', array_filter(array_unique($styleSrc))),
            "img-src 'self' data: https:",
            "font-src 'self' https://fonts.gstatic.com data:",
            'connect-src ' . implode(' ', array_filter(array_unique($connectSrc))),
            "frame-src 'self' https://cdn.plaid.com https://www.youtube.com https://www.tradingview.com https://s.tradingview.com https://www.google.com https://www.clarity.ms https://scripts.clarity.ms",
            "manifest-src 'self'",
            "worker-src 'self' blob:",
            "object-src 'none'",
            "form-action 'self'",
            "upgrade-insecure-requests",
        ];

        if ($scriptNonce !== '') {
            $response->setHeader('X-CSP-Nonce', $scriptNonce);
        }

        if ($styleNonce !== '') {
            $response->setHeader('X-CSP-Style-Nonce', $styleNonce);
        }

        $response->setHeader('Content-Security-Policy', implode('; ', $directives));
    }

    protected function safeAuthService()
    {
        try {
            return service('authentication');
        } catch (\Throwable $e) {
            log_message('error', 'BaseController safeAuthService failed: {message}', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);
        }

        return null;
    }

    protected function safeAuthCheck(): bool
    {
        try {
            $auth = $this->auth ?? $this->safeAuthService();
            if ($auth && method_exists($auth, 'check')) {
                return (bool) $auth->check();
            }
        } catch (\Throwable $e) {
            log_message('error', 'BaseController safeAuthCheck failed: {message}', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);
        }

        return false;
    }

    protected function safeAuthId(): int
    {
        try {
            $auth = $this->auth ?? $this->safeAuthService();
            if ($auth && method_exists($auth, 'id')) {
                return (int) ($auth->id() ?? 0);
            }
        } catch (\Throwable $e) {
            log_message('error', 'BaseController safeAuthId failed: {message}', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);
        }

        return 0;
    }

    protected function safeAuthUser()
    {
        try {
            $auth = $this->auth ?? $this->safeAuthService();
            if ($auth && method_exists($auth, 'user')) {
                return $auth->user();
            }
        } catch (\Throwable $e) {
            log_message('error', 'BaseController safeAuthUser failed: {message}', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);
        }

        return null;
    }
}
