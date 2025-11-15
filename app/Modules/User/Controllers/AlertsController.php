<?php

namespace App\Modules\User\Controllers;

use App\Controllers\UserController;
use App\Models\{AlertsModel, BudgetModel};
use App\Libraries\{
    MyMIAlphaVantage,
    MyMIAlerts,
    MyMIBudget,
    MyMIDashboard,
    MyMIUser,
    MyMIAdvisor
};
use App\Services\{
    UserService,
    GoalTrackingService,
    BudgetService,
    AccountService,
    SolanaService
};
use Config\Services;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class AlertsController extends UserController
{
    use ResponseTrait;

    protected $auth;
    protected $csp;
    protected $cspNonce;
    protected $session;
    protected $request;
    protected array $data = [];
    // protected ?int $cuID;
    protected $alertsModel;
    protected $budgetModel;
    protected $alertsManager;
    private ?MyMIUser $MyMIUser = null;
    private ?MyMIBudget    $MyMIBudget    = null;
    private ?MyMIDashboard $MyMIDashboard = null;
    private ?MyMIAdvisor   $MyMIAdvisor   = null;

    protected $userService;
    protected $siteSettings;
    protected $uri;

    // 🔧 Make these nullable and default to null
    protected GoalTrackingService $goalTrackingService;
    protected BudgetService       $budgetService;
    protected AccountService      $accountService;
    protected SolanaService       $solanaService;

    public function __construct()
    {
        $this->auth         = service('authentication');
        $this->request      = service('request');
        $this->session      = Services::session();
        $this->siteSettings = config('SiteSettings');
        $this->uri          = $this->request->getUri();

        $this->alertsManager = new MyMIAlerts();
        $this->alertsModel   = new AlertsModel();
        $this->budgetModel   = new BudgetModel();

        $this->cuID = $this->resolveCurrentUserId();

        // use the service container for user library
        $this->MyMIUser = service('myMIUser');
        if (! $this->MyMIUser instanceof MyMIUser) {
            $this->MyMIUser = new MyMIUser();
        }

        // services
        $this->userService         = new UserService($this->siteSettings, $this->cuID, $this->request);
        $this->goalTrackingService = new GoalTrackingService();
        $this->budgetService       = new BudgetService($this->cuID);
        $this->accountService      = new AccountService();
        $this->solanaService       = new SolanaService();

        // populate base data (safe even if guest)
        $this->commonData();
    }

    // 🔧 Lazy-init getters so the typed props are always initialized before use
    // Signature MUST match BaseController::getMyMIUser(): MyMIUser
    protected function getMyMIUser(): MyMIUser
    {
        // If already initialized, just return it
        if ($this->MyMIUser instanceof MyMIUser) {
            return $this->MyMIUser;
        }

        // Try resolving from the service container first
        $serviceInstance = service('myMIUser');

        if ($serviceInstance instanceof MyMIUser) {
            $this->MyMIUser = $serviceInstance;
            return $this->MyMIUser;
        }

        // Fallback: create a guest-safe instance
        $this->MyMIUser = new MyMIUser();

        return $this->MyMIUser;
    }

    protected function getMyMIBudget(): MyMIBudget
    {
        return $this->MyMIBudget ??= new MyMIBudget();
    }

    protected function getMyMIDashboard(): MyMIDashboard
    {
        return $this->MyMIDashboard ??= new MyMIDashboard();
    }

    protected function getMyMIAdvisor(): MyMIAdvisor
    {
        return $this->MyMIAdvisor ??= new MyMIAdvisor();
    }

    protected function getBudgetService(): BudgetService
    {
        $this->budgetService->setUserId($this->resolveCurrentUserId());

        return $this->budgetService;
    }

    protected function getAccountService(): AccountService
    {
        return $this->accountService;
    }

    protected function getSolanaService(): SolanaService
    {
        return $this->solanaService;
    }

    protected function getGoalTrackingService(): GoalTrackingService
    {
        return $this->goalTrackingService;
    }

    public function commonData(): array|ResponseInterface
    {
        $base = parent::commonData();
        if ($base instanceof ResponseInterface) {
            return $base;
        }

        $this->data                 = $base;
        $this->data['debug']        = (int) ($this->siteSettings->debug ?? 0);
        $this->data['siteSettings'] = $this->siteSettings;
        $this->data['uri']          = $this->request->getUri();
        $this->data['userAgent']    = $this->request->getUserAgent();

        $this->data += [
            'cuID'                    => $this->data['cuID'] ?? null,
            'cuUsername'              => $this->data['cuUsername'] ?? '',
            'cuDisplayName'           => $this->data['cuDisplayName'] ?? '',
            'cuEmail'                 => $this->data['cuEmail'] ?? '',
            'cuRole'                  => $this->data['cuRole'] ?? '',
            'cuKYC'                   => $this->data['cuKYC'] ?? '',
            'cuUserType'              => $this->data['cuUserType'] ?? '',
            'progressGoalData'        => $this->data['progressGoalData'] ?? [],
            'completedGoals'          => $this->data['completedGoals'] ?? [],
            'pendingGoals'            => $this->data['pendingGoals'] ?? [],
            'promotionalBanners'      => $this->data['promotionalBanners'] ?? [],
            'totalAccountBalance'     => (float) ($this->data['totalAccountBalance'] ?? 0),
            'totalAccountBalanceFMT'  => $this->data['totalAccountBalanceFMT']
                                        ?? number_format((float) ($this->data['totalAccountBalance'] ?? 0), 2),
            'cuSolanaDW'              => $this->data['cuSolanaDW'] ?? null,
            'cuSolanaTotal'           => (float) ($this->data['cuSolanaTotal'] ?? 0),
            'cuSolanaValue'           => (float) ($this->data['cuSolanaValue'] ?? 0),
            'solanaNetworkStatus'     => $this->data['solanaNetworkStatus'] ?? ['healthy' => false, 'slot' => null, 'version' => null],
            'userBudget'              => $this->data['userBudget'] ?? [],
            'userBudgetRecords'       => $this->data['userBudgetRecords'] ?? [],
            'userActiveBudgetRecords' => $this->data['userActiveBudgetRecords'] ?? [],
        ];

        $this->cuID = $this->data['cuID'];
        if (empty($this->cuID)) {
            return $this->data; // guest
        }

        try {
            $userData                    = $this->getMyMIUser()->getUserInformation($this->cuID) ?: [];
            $this->data['cuUsername']    = $userData['cuUsername']    ?? $this->data['cuUsername'];
            $this->data['cuDisplayName'] = $userData['cuDisplayName'] ?? $this->data['cuDisplayName'];
            $this->data['cuEmail']       = $userData['cuEmail']       ?? $this->data['cuEmail'];
            $this->data['cuRole']        = $userData['cuRole']        ?? $this->data['cuRole'];
            $this->data['cuKYC']         = $userData['cuKYC']         ?? $this->data['cuKYC'];
            $this->data['cuUserType']    = $userData['cuUserType']    ?? $this->data['cuUserType'];
        } catch (\Throwable $e) {
            log_message('error', 'AlertsController commonData(): getUserInformation failed: ' . $e->getMessage());
        }

        try {
            $dash                               = $this->getMyMIDashboard()->dashboardInfo($this->cuID) ?: [];
            $this->data['progressGoalData']     = $dash['progressGoalData']    ?? [];
            $this->data['promotionalBanners']   = $dash['promotionalBanners']  ?? [];
        } catch (\Throwable $e) {
            log_message('error', 'AlertsController commonData(): dashboardInfo failed: ' . $e->getMessage());
        }

        try {
            $this->data['completedGoals'] = $this->goalTrackingService->getCompletedGoals($this->cuID) ?? [];
            $this->data['pendingGoals']   = $this->goalTrackingService->getPendingGoals($this->cuID)   ?? [];
        } catch (\Throwable $e) {
            log_message('error', 'AlertsController commonData(): goal tracking failed: ' . $e->getMessage());
        }

        try {
            $userBudget                               = $this->budgetService->getUserBudget($this->cuID) ?: [];
            $this->data['userBudget']                 = $userBudget;
            $this->data['userActiveBudgetRecords']    = $userBudget['userActiveBudgetRecords'] ?? [];
            $this->data['totalAccountBalance']        = (float) ($userBudget['totalAccountBalance'] ?? $this->data['totalAccountBalance']);
            $this->data['totalAccountBalanceFMT']     = $userBudget['totalAccountBalanceFMT'] ?? number_format($this->data['totalAccountBalance'], 2);
            $this->data['userBudgetRecords']          = $this->budgetService->getUserBudgetRecords($this->cuID) ?? [];
        } catch (\Throwable $e) {
            log_message('error', 'AlertsController commonData(): budget data failed: ' . $e->getMessage());
        }

        try {
            $userSol                          = $this->solanaService->getSolanaData($this->cuID) ?: [];
            $w                                = $userSol['userSolanaWallets'] ?? [];
            $this->data['cuSolanaDW']         = $w['cuSolanaDW']   ?? null;
            $this->data['cuSolanaTotal']      = (float) ($w['cuSolanaTotal'] ?? 0);
            $this->data['cuSolanaValue']      = (float) ($w['cuSolanaValue'] ?? 0);
            $this->data['solanaNetworkStatus']= $this->solanaService->getNetworkStatus();
        } catch (\Throwable $e) {
            log_message('error', 'AlertsController commonData(): Solana calls failed: ' . $e->getMessage());
        }

        try {
            $credit                                      = $this->accountService->getUserCreditAccounts($this->cuID) ?? [];
            $debt                                        = $this->accountService->getUserDebtAccounts($this->cuID)   ?? [];
            $this->data['repaymentSummary']              = $this->budgetService->getRepaymentSummary($this->cuID)    ?? [];
            $schedules                                   = $this->budgetService->calculateRepaymentSchedules($credit) ?? [];
            $this->data['currentBalances']               = $this->budgetService->getCurrentBalances($credit)          ?? [];
            $this->data['availableBalances']             = $this->budgetService->getAvailableBalances($schedules)     ?? [];
            $this->data['totalAvailableBalance']         = (float) ($this->budgetService->getTotalAvailableBalance($debt) ?? 0);
            $this->data['repaymentSchedules']            = $schedules;
        } catch (\Throwable $e) {
            log_message('error', 'AlertsController commonData(): account/budget helpers failed: ' . $e->getMessage());
        }

        return $this->data;
    }

    public function index()
    {
        $this->data['pageTitle'] = 'Trade Alerts | MyMI Wallet | Market Insights';

        $sentAlerts    = $this->alertsModel->getSentAlerts(50);
        $marketDataMap = $this->alertsManager->fetchBatchMarketData($sentAlerts);

        // ✅ these now safely lazy-init
        $userId = $this->cuID;
        if (!is_int($userId) || $userId <= 0) {
            // If this is an API action, respond gracefully:
            if ($resp = $this->requireUserOrJson()) {
                return $resp;
            }
            // If this is a page action, fall back to redirect (or show a friendly message)
            $session     = session();
            $currentUrl  = current_url();
            if (! $session->has('redirect_url')) {
                $session->set('redirect_url', $currentUrl);
            }

            log_message('debug', 'AlertsController::index() redirecting guest to login from: ' . $currentUrl);

            return redirect()->to(site_url('login'));
        }

        $risk     = $this->getMyMIBudget()->getUserRiskProfileSafe($userId);
        $forecast = $this->getMyMIBudget()->getForecastForUser($userId);
        $advisor  = $this->getMyMIAdvisor()->generateAdvisorNotes($userId);

        $this->budgetModel->updateForecastEntry(
            $this->cuID,
            date('Y-m-01'),
            [
                'advisor_notes'               => $advisor['summary'],
                'recommendation_score'        => $advisor['score'],
                'investment_opportunity_flag' => $advisor['flag_opportunity'],
                'risk_rating'                 => $advisor['risk_rating'],
            ]
        );

        foreach ($sentAlerts as &$alert) {
            if (isset($marketDataMap[$alert['ticker']])) {
                $alert = array_merge($alert, $marketDataMap[$alert['ticker']]);
            }
        }

        $this->data['alerts']                      = $sentAlerts;
        $this->data['risk']                        = $risk;
        $this->data['forecast']                    = $forecast;
        $this->data['advisor_notes']               = $advisor['summary'];
        $this->data['recommendation_score']        = $advisor['score'];
        $this->data['investment_opportunity_flag'] = $advisor['flag_opportunity'];
        $this->data['risk_rating']                 = $advisor['risk_rating'];
        $this->data['useDataTables']               = true;

        // Ensure the dashboard theme loads the jQuery DataTables bundle used by the view.
        $this->data['useDataTables'] = true;

        return $this->renderTheme('App\Modules\User\Views\Alerts\index', $this->data);
    }

    public function filterAlerts()
    {
        $filters = [
            'ticker'     => $this->request->getGet('ticker'),
            'category'   => $this->request->getGet('category'),
            'date_range' => $this->request->getGet('date_range')
        ];

        $this->data['alerts']        = $this->alertsModel->getFilteredUserAlerts($filters, $this->cuID);
        $this->data['useDataTables'] = true;

        return $this->renderTheme('App\Modules\User\Views\Alerts\index', $this->data);
    }

    public function viewAlert($alertID)
    {
        $alert = $this->alertsModel->getAlertById($alertID);
        if (!$alert || $alert['send_alert'] != 1) {
            return redirect()->to('/Users/Alerts')->with('error', 'Alert not found or not sent.');
        }

        $this->data['pageTitle'] = "Trade Alert Details | {$alert['ticker']}";
        $this->data['alert']     = $alert;

        return $this->renderTheme('App\Modules\User\Views\Alerts\view', $this->data);
    }

    public function getUserAlerts()
    {
        $userAlerts = $this->alertsModel->getUserSubscribedAlerts($this->cuID);
        return $this->respond(['status' => 'success', 'alerts' => $userAlerts]);
    }
}
?>
