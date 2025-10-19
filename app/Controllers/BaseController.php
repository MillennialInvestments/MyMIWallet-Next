<?php namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Psr\Log\LoggerInterface;
use Throwable;
use function esc;

use App\Libraries\{MyMIAnalytics, MyMIBudget, MyMICoin, MyMIDashboard, MyMIAdvisor, MyMIProjects, MyMISolana, MyMIUser, MyMIWallet, MyMIWallets};
use App\Services\{AccountService, BudgetService, DashboardService, GoalTrackingService, MarketingService, SolanaService, UserService, WalletService};
use App\Models\WalletModel; // <-- add this

class BaseController extends Controller
{
    /** Make base_url() available for self-hosted assets */
    protected $helpers = []; 

    protected ?int $cuID = null;
    protected array $data = [];
    protected bool $stringAsHtml = false; 
    protected array $csp = [];
    protected array $nonce = [];
    protected array $nonceAttributes = [];

    /** @var \CodeIgniter\Shield\Auth|null|\CodeIgniter\Shield\Authentication\Authentication|null|mixed */
    protected $auth;

    /** @var \CodeIgniter\HTTP\IncomingRequest */
    protected $request;

    /** @var \CodeIgniter\Session\Session */
    protected $session;

    protected $siteSettings;
    protected int $debug = 0;

    private ?MyMIAdvisor $myMIAdvisor = null;
    private ?MyMIAnalytics $myMIAnalytics = null;
    private ?MyMIBudget $myMIBudget = null;
    private ?MyMICoin $myMICoin = null;
    private ?MyMIDashboard $myMIDashboard = null;
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

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);

        // Core boot
        $this->session      = Services::session();
        $this->auth         = service('authentication');
        $this->siteSettings = config('SiteSettings');
        $this->debug        = (int)($this->siteSettings->debug ?? 0);
        $this->cuID         = $this->resolveCurrentUserId();

        // CSP
        $this->csp = [
            'script' => $this->generateNonce(),
            'style'  => $this->generateNonce(),
        ];
        $this->cspNonce = $this->csp['script'];

        // Apply CSP once based on mode
        $this->applyContentSecurityPolicy($response);

        // Nonces/renderer exposure
        $this->nonceAttributes = $this->data['nonce'] ?? ['script' => '', 'style' => ''];
        $this->data['nonce']   = $this->nonceAttributes;

        Services::renderer()->setData([
            'csp'      => $this->csp,
            'nonce'    => $this->nonceAttributes,
            'cspNonce' => $this->cspNonce,
        ], 'raw');

        // Common page data
        $this->data['debug']       = $this->debug;
        $this->data['siteSettings']= $this->siteSettings;
        $this->data['cuID']        = $this->cuID;
        $this->data['uri']         = $this->request->getUri();
        $this->data['userAgent']   = $this->request->getUserAgent();
    }

    /** Decide relaxed vs strict by path prefix (case-insensitive) */
    // BaseController.php — drop in these methods
    // --- BEGIN: CSP helpers + mode switch (BaseController.php) ---
    protected ?string $cspNonce = null;

    protected function commonData(): array
    {
        // --- Preserve already-set items and fallbacks
        $this->data['debug']       = $this->data['debug']       ?? $this->debug;
        $this->data['siteSettings']= $this->data['siteSettings']?? $this->siteSettings;
        $this->data['uri']         = $this->data['uri']         ?? $this->request->getUri();
        $this->data['userAgent']   = $this->data['userAgent']   ?? $this->request->getUserAgent();
        $this->data['cuID']        = $this->data['cuID']        ?? $this->resolveCurrentUserId();
        $this->data['csp']         = $this->data['csp']         ?? $this->csp;
        $this->data['nonce']       = $this->data['nonce']       ?? $this->nonceAttributes;

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
                $v = trim($value);
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
                if (!empty($userBudget['userBudgetRecords']))       $setValue('userBudgetRecords', $userBudget['userBudgetRecords']);
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
                if (!empty($records)) $setValue('userBudgetRecords', $records);
            }
        } catch (\Throwable $e) {
            log_message('error', 'BaseController commonData(): getUserBudget failed: '.$e->getMessage());
        }

        // --- Solana summary (non-fatal)
        try {
            $solanaSummary = [];

            // >>> Short-circuit when RPC network/circuits are degraded
            $solService = $this->getSolanaService();
            if (method_exists($solService, 'isNetworkDegraded') && $solService->isNetworkDegraded()) {
                log_message('notice', 'BaseController commonData(): Solana network degraded, skipping live calls');
                throw new \RuntimeException('solana-network-degraded');
            }
            // <<< end short-circuit

            try {
                $solanaSummary = $this->getMyMISolana()->getUserSolana($this->cuID) ?? [];
            } catch (\Throwable $inner) {
                log_message('error', 'BaseController commonData(): MyMISolana getUserSolana failed: '.$inner->getMessage());
            }

            if (!empty($solanaSummary)) {
                if (!empty($solanaSummary['cuSolanaDW'])) $setValue('cuSolanaDW', $solanaSummary['cuSolanaDW']);
                if (array_key_exists('cuSolanaTotal', $solanaSummary)) $this->data['cuSolanaTotal'] = (float)$solanaSummary['cuSolanaTotal'];
                if (array_key_exists('cuSolanaValue', $solanaSummary)) $this->data['cuSolanaValue'] = (float)$solanaSummary['cuSolanaValue'];
                if (!empty($solanaSummary['solanaNetworkStatus'])) $setValue('solanaNetworkStatus', $solanaSummary['solanaNetworkStatus']);
            }

            $address = $solanaSummary['cuSolanaDW']['public_token']
                ?? $solanaSummary['cuSolanaDW']['address']
                ?? $solanaSummary['address_b58']
                ?? null;

            if ($address) {
                $snapshot = $solService->getSolanaData($address) ?? [];
                if (isset($snapshot['nativeSOL'])) {
                    $this->data['cuSolanaTotal'] = (float)$snapshot['nativeSOL'];
                }
                if (!empty($snapshot['solanaNetworkStatus'])) {
                    $setValue('solanaNetworkStatus', $snapshot['solanaNetworkStatus']);
                }
            }

            $network = $solService->getNetworkStatus();
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
            log_message('error', 'BaseController commonData(): Solana calls failed: '.$e->getMessage());
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
        return $this->data;
    }

    /**
     * PERMISSIVE policy:
     * - No nonces in script-src/style-src
     * - Allow 'unsafe-inline' so existing inline <script> and style="" keep working
     * - Whitelist your CDNs and widgets
     */

    // BaseController.php — drop in these methods
    protected function applyContentSecurityPolicy(ResponseInterface $response): void
    {
        $mode = strtolower((string) (getenv('APP_CSP_MODE') ?: 'permissive'));

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
            $this->csp['script'] = '';
            $this->csp['style']  = '';

            $this->applyCspRelaxed($response);

            $this->data['csp']   = $this->csp;
            $this->data['nonce'] = ['script' => '', 'style' => ''];
            $this->nonceAttributes = $this->data['nonce'];
            return;
        }

        // STRICT by default
        $this->csp['mode']   = 'strict';
        $this->csp['script'] = $this->csp['script'] ?? $this->generateNonce();
        $this->csp['style']  = $this->csp['style']  ?? $this->generateNonce();

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

    private function applyCspRelaxed(ResponseInterface $response): void
    {
        // PERMISSIVE: allows inline <script> and style="", and whitelists your CDNs/widgets
        $directives = [
            "default-src 'self'",
            // **NO nonce here** (so 'unsafe-inline' is honored)
            "script-src 'self' 'unsafe-inline' https://code.jquery.com https://cdn.jsdelivr.net https://cdn.datatables.net https://cdnjs.cloudflare.com https://unpkg.com https://www.googletagmanager.com https://www.google-analytics.com https://www.google.com https://www.gstatic.com https://s3.tradingview.com https://www.tradingview.com https://maxcdn.bootstrapcdn.com https://stackpath.bootstrapcdn.com",
            "script-src-elem 'self' 'unsafe-inline' https://code.jquery.com https://cdn.jsdelivr.net https://cdn.datatables.net https://cdnjs.cloudflare.com https://unpkg.com https://www.googletagmanager.com https://www.google-analytics.com https://www.google.com https://www.gstatic.com https://s3.tradingview.com https://www.tradingview.com https://maxcdn.bootstrapcdn.com https://stackpath.bootstrapcdn.com",

            "style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://fonts.googleapis.com https://unpkg.com https://maxcdn.bootstrapcdn.com https://stackpath.bootstrapcdn.com",
            "style-src-elem 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://fonts.googleapis.com https://unpkg.com https://maxcdn.bootstrapcdn.com https://stackpath.bootstrapcdn.com",

            "img-src 'self' data: https:",
            "font-src 'self' data: https: https://fonts.gstatic.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://maxcdn.bootstrapcdn.com https://stackpath.bootstrapcdn.com https://static.tradingview.com",

            "connect-src 'self' https: https://www.google-analytics.com https://www.googletagmanager.com https://s3.tradingview.com https://www.tradingview.com",

            // Embeds (YouTube, TradingView)
            "frame-src 'self' https://www.youtube.com https://www.google.com https://www.tradingview.com",

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
        ];

        $styleSrc = [
            "'self'",
            'https://fonts.googleapis.com',
            'https://cdn.jsdelivr.net',
        ];

        $connectSrc = [
            "'self'",
            'https://www.googletagmanager.com',
            'https://www.google-analytics.com',
            'https://s3.tradingview.com',
            'https://www.tradingview.com',
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
            "frame-src 'self' https://cdn.plaid.com https://www.youtube.com https://www.tradingview.com https://www.google.com",
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
    // --- END: CSP helpers + mode switch ---


    /**
     * Generate a base64url nonce for CSP.
     */
    protected function generateNonce(int $bytes = 16): string
    {
        return rtrim(strtr(base64_encode(random_bytes($bytes)), '+/', '-_'), '=');
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
        if ($this->cuID !== null) return $this->cuID;
        $session = session();
        $id = $session->get('user_id');
        $this->cuID = ($id && is_numeric($id)) ? (int) $id : null;
        return $this->cuID;
    }

    protected function resolveUserId(): ?int
    {
        // Myth/Auth style
        try {
            $auth = service('authentication');
            if ($auth && method_exists($auth, 'check') && $auth->check()) {
                $id = $auth->id();
                return is_numeric($id) ? (int) $id : null;
            }
        } catch (\Throwable $e) {
            // ignore and fall through
        }

        // Session fallback
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
    protected function getMyMIAnalytics(): MyMIAnalytics
    {
        return $this->myMIAnalytics ??= service('myMIAnalytics');
    }
    protected function getMyMIBudget(): MyMIBudget
    {
        return $this->myMIBudget ??= new MyMIBudget();
    }
    protected function getMyMICoin(): MyMICoin
    {
        return $this->myMICoin ??= new MyMICoin();
    }
    protected function getMyMIDashboard(): MyMIDashboard
    {
        return $this->myMIDashboard ??= new MyMIDashboard();
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
        return $this->dashboardService ??= new DashboardService();
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

        $getter = 'get' . $name;
        if (method_exists($this, $getter)) {
            $this->$name = $this->$getter();
            return $this->$name;
        }

        static $map = [
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
     * Render a content view, optionally inside a theme layout.
     * $theme: 'public' | 'dashboard' | null (null = content only)
     */
    protected function render(string $view, array $vars = [], ?string $theme = 'public'): string
    {
        // normalize slashes
        $view = str_replace('\\', '/', $view);

        $data    = method_exists($this, 'commonData') ? $this->commonData() : [];
        $payload = $data + $vars;

        $content = view($view, $payload);

        if ($theme === null) {
            return $content; // raw content only
        }

        // expects app/Views/themes/{theme}/layouts/index.php
        return view("themes/{$theme}/layouts/index", [
            'content' => $content,
        ] + $payload);
    }

    public function renderView(string $path, array $data = []): string
    {
        $data = array_merge($this->commonData(), $data);
        $path = ltrim($path, '/\\');

        if (file_exists(APPPATH . "Views/{$path}.php")) {
            return $this->renderTheme($path, $data);
        }
        return '';
    }
}