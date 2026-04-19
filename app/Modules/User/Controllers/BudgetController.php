<?php namespace App\Modules\User\Controllers;

use App\Controllers\BaseUserController;

use Config\Services;
use App\Libraries\{MyMIDashboard, SafeCache};
use App\Models\{AccountsModel, BudgetModel};
use App\Services\{AccountService, BudgetService, DashboardService, GoalTrackingService, MarketingService, SolanaService, UserService, WalletService};
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use DateTime;
use DateTimeZone;
use Psr\Log\LoggerInterface;

#[\AllowDynamicProperties]
class BudgetController extends BaseUserController
{
    use ResponseTrait;
    // protected $data = [];
    protected $request;
    protected int $debug;
    // protected ?int $cuID;
    // Only if you absolutely insist on it here — but recommended to keep it only in BaseController.
    protected ?int $cuID = null;
    protected $auth;
    protected $logger;
    protected $session;
    protected $uri;
    protected $siteSettings;
    protected $accountsModel;
    protected $walletModel;
    protected $accountService;
    protected $budgetService;
    protected $dashboardService;
    protected $goalTrackingService;
    protected $marketingService;
    protected $solanaService;
    protected $userService;
    protected ?WalletService $walletService = null;
    protected $budgetModel;
    protected SafeCache $safeCache;
    protected int $apiCacheTtl = 60;
    protected array $cacheHits = [
        'budget-records'     => false,
        'available-balances' => false,
        'credit-balances'    => false,
        'repayment-summary'  => false,
        'api-summary'        => false,
        'api-credit'         => false,
        'api-available'      => false,
        'api-repayment'      => false,
        'api-categories'     => false,
    ];
    protected $helpers = ['auth', 'form', 'url', 'cache', 'feature', 'premium'];
    protected ?ResponseInterface $featureGuardResponse = null;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] initController');
        parent::initController($request, $response, $logger);
        $this->auth = service('authentication');
        $this->request                              = service('request'); 
        $this->session = Services::session();
        $this->siteSettings = config('SiteSettings');
        $this->debug = (int) $this->siteSettings->debug;
        $this->uri                                  = $this->request->getUri();

        $this->cuID = $this->resolveCurrentUserId();
        $activeUserId = $this->cuID;
        $this->uri  = $this->request->getUri();
        $this->accountService = new AccountService();
        $this->budgetService = new BudgetService($activeUserId);
        $this->goalTrackingService = new GoalTrackingService();
        $this->solanaService  = new SolanaService();
        $this->accountsModel = new AccountsModel();
        $this->budgetModel = new BudgetModel();
        $this->safeCache = service('safeCache');
        $this->logger = service('logger');
        log_message('debug', 'BudgetController L53 Initialized with cuID: ' . var_export($this->cuID, true));
        log_message(
            'debug',
            'BudgetController::constructor - sanitizedCacheKey exists? ' . (function_exists('sanitizedCacheKey') ? 'YES' : 'NO')
        );

        $this->featureGuardResponse = feature_guard('FEATURE_BUDGET', ['controller' => __CLASS__, 'phase' => 'phase_a']);
    }

    public function commonData(): ResponseInterface|array
    {
        if ($this->featureGuardResponse instanceof ResponseInterface) {
            return $this->featureGuardResponse;
        }
        $base = parent::commonData();

        if ($base instanceof ResponseInterface) {
            return $base;
        }

        $baseArray    = is_array($base) ? $base : [];
        $existingData = is_array($this->data ?? null) ? $this->data : [];

        $this->data = array_merge($existingData, $baseArray);

        log_message('debug', 'BudgetController::commonData snapshot: ' . json_encode([
            'cuID'                => $this->data['cuID'] ?? null,
            'cuEmail'             => $this->data['cuEmail'] ?? null,
            'totalAccountBalance' => $this->data['totalAccountBalance'] ?? null,
            'nonce'               => $this->data['nonce'] ?? null,
        ]));

        return $this->data;
    }

    protected function ensureCommonDataReady(): ResponseInterface|array
    {
        $common = $this->commonData();
        if ($common instanceof ResponseInterface) {
            return $common;
        }

        $this->data = is_array($common) ? $common : (is_array($this->data ?? null) ? $this->data : []);

        return $this->data;
    }

    // public function commonData(): array
    // {
    //     // 1) Seed from parent and set always-available basics
    //     $this->data = parent::commonData();

    //     $this->data['debug']        = (int)($this->siteSettings->debug ?? 0);
    //     $this->data['siteSettings'] = $this->siteSettings;
    //     $this->data['uri']          = $this->request->getUri();
    //     $this->data['userAgent']    = $this->request->getUserAgent();

    //     // 2) Ensure view-safe defaults (prevents "Undefined variable" notices)
    //     $this->data += [
    //         'cuID'                   => $this->data['cuID'] ?? null,
    //         'cuUsername'             => $this->data['cuUsername'] ?? '',
    //         'cuDisplayName'          => $this->data['cuDisplayName'] ?? '',
    //         'cuEmail'                => $this->data['cuEmail'] ?? '',
    //         'cuRole'                 => $this->data['cuRole'] ?? '',
    //         'cuKYC'                  => $this->data['cuKYC'] ?? '',
    //         'cuUserType'             => $this->data['cuUserType'] ?? '',
    //         'progressGoalData'       => $this->data['progressGoalData'] ?? [],
    //         'completedGoals'         => $this->data['completedGoals'] ?? [],
    //         'pendingGoals'           => $this->data['pendingGoals'] ?? [],
    //         'promotionalBanners'     => $this->data['promotionalBanners'] ?? [],
    //         'totalAccountBalance'    => (float)($this->data['totalAccountBalance'] ?? 0.0),
    //         'totalAccountBalanceFMT' => $this->data['totalAccountBalanceFMT'] ?? number_format((float)($this->data['totalAccountBalance'] ?? 0), 2),
    //         'cuSolanaDW'             => $this->data['cuSolanaDW'] ?? null,
    //         'cuSolanaTotal'          => (float)($this->data['cuSolanaTotal'] ?? 0),
    //         'cuSolanaValue'          => (float)($this->data['cuSolanaValue'] ?? 0),
    //         'solanaNetworkStatus'    => $this->data['solanaNetworkStatus'] ?? ['healthy' => false, 'slot' => null, 'version' => null],
    //         'userBudget'             => $this->data['userBudget'] ?? [],
    //         'userBudgetRecords'      => $this->data['userBudgetRecords'] ?? [],
    //         'userActiveBudgetRecords'=> $this->data['userActiveBudgetRecords'] ?? [],
    //     ];

    //     // Track in controller
    //     $this->cuID = $this->data['cuID'];

    //     // 3) If no logged-in user, stop here (avoid noisy service calls)
    //     if (empty($this->cuID)) {
    //         return $this->data;
    //     }

    //     // 4) Enrich with user-specific data (each call wrapped for safety)
    //     try {
    //         $userData = $this->getMyMIUser()->getUserInformation($this->cuID) ?: [];
    //         $this->data['cuUsername']    = $userData['cuUsername']   ?? $this->data['cuUsername'];
    //         $this->data['cuDisplayName'] = $userData['cuDisplayName']?? $this->data['cuDisplayName'];
    //         $this->data['cuEmail']       = $userData['cuEmail']      ?? $this->data['cuEmail'];
    //         $this->data['cuRole']        = $userData['cuRole']       ?? $this->data['cuRole'];
    //         $this->data['cuKYC']         = $userData['cuKYC']        ?? $this->data['cuKYC'];
    //         $this->data['cuUserType']    = $userData['cuUserType']   ?? $this->data['cuUserType'];
    //     } catch (\Throwable $e) {
    //         log_message('error', 'BudgetController commonData(): getUserInformation failed: '.$e->getMessage());
    //     }

    //     try {
    //         $dash = $this->getMyMIDashboard()->dashboardInfo($this->cuID) ?: [];
    //         $this->data['progressGoalData']   = $dash['progressGoalData']   ?? [];
    //         $this->data['promotionalBanners'] = $dash['promotionalBanners'] ?? [];
    //     } catch (\Throwable $e) {
    //         log_message('error', 'BudgetController commonData(): dashboardInfo failed: '.$e->getMessage());
    //     }

    //     try {
    //         $this->data['completedGoals'] = $this->goalTrackingService->getCompletedGoals($this->cuID) ?? [];
    //         $this->data['pendingGoals']   = $this->goalTrackingService->getPendingGoals($this->cuID)   ?? [];
    //     } catch (\Throwable $e) {
    //         log_message('error', 'BudgetController commonData(): goal tracking failed: '.$e->getMessage());
    //     }

    //     try {
    //         $userBudget = $this->getBudgetService()->getUserBudget($this->cuID) ?: [];
    //         $this->data['userBudget']              = $userBudget;
    //         $this->data['userActiveBudgetRecords'] = $userBudget['userActiveBudgetRecords'] ?? [];
    //         $this->data['userBudgetRecords']       = $userBudget['userBudgetRecords'] ?? $this->getBudgetService()->getUserBudgetRecords($this->cuID) ?? [];
    //         $this->data['totalAccountBalance']     = (float)($userBudget['totalAccountBalance'] ?? $this->data['totalAccountBalance']);
    //         $this->data['totalAccountBalanceFMT']  = $userBudget['totalAccountBalanceFMT'] ?? number_format($this->data['totalAccountBalance'], 2);
    //     } catch (\Throwable $e) {
    //         log_message('error', 'BudgetController commonData(): budget data failed: '.$e->getMessage());
    //     }

    //     try {
    //         $userSol = $this->getSolanaService()->getSolanaData($this->cuID) ?: [];
    //         $w = $userSol['userSolanaWallets'] ?? [];
    //         $this->data['cuSolanaDW']    = $w['cuSolanaDW']    ?? null;
    //         $this->data['cuSolanaTotal'] = (float)($w['cuSolanaTotal'] ?? 0);
    //         $this->data['cuSolanaValue'] = (float)($w['cuSolanaValue'] ?? 0);
    //         // Network status (use $this->data NOT $data)
    //         if (!isset($this->solanaService)) {
    //             $this->solanaService = service('solanaService');
    //         }
    //         $this->data['solanaNetworkStatus'] = $this->solanaService->getNetworkStatus();
    //     } catch (\Throwable $e) {
    //         log_message('error', 'BudgetController commonData(): Solana calls failed: '.$e->getMessage());
    //     }

    //     try {
    //         $creditAccounts                = $this->getAccountService()->getUserCreditAccounts($this->cuID) ?? [];
    //         $debtAccounts                  = $this->getAccountService()->getUserDebtAccounts($this->cuID)   ?? [];
    //         $this->data['repaymentSummary']= $this->getBudgetService()->getRepaymentSummary($this->cuID)   ?? [];
    //         $repaymentSchedules            = $this->getBudgetService()->calculateRepaymentSchedules($creditAccounts) ?? [];
    //         $this->data['currentBalances'] = $this->getBudgetService()->getCurrentBalances($creditAccounts)          ?? [];
    //         $this->data['availableBalances']= $this->getBudgetService()->getAvailableBalances($repaymentSchedules)   ?? [];
    //         $this->data['totalAvailableBalance'] = (float)($this->getBudgetService()->getTotalAvailableBalance($debtAccounts) ?? 0);
    //         $this->data['repaymentSchedules']    = $repaymentSchedules;
    //     } catch (\Throwable $e) {
    //         log_message('error', 'BudgetController commonData(): account/budget helpers failed: '.$e->getMessage());
    //     }

    //     // 5) Always return the array
    //     return $this->data;
    // }

    public function index()
    {
        if ($this->featureGuardResponse instanceof ResponseInterface) {
            return $this->featureGuardResponse;
        }
        log_message('debug', '[BudgetController::METHOD_ENTRY] index');
        $activeUserId = $this->cuID ?? null;
        log_message(
            'debug',
            'Dashboard::index() reached in BudgetController. User ID: ' . ($activeUserId !== null ? (string) $activeUserId : 'guest')
        );

        $this->data['pageTitle'] = 'My Budget | MyMI Wallet | The Future of Finance';

        // Run commonData and honor auth redirects from BaseController
        $result = $this->commonData();
        if ($result instanceof RedirectResponse) {
            return $result;
        }

        $asOf = $this->request->getGet('asOf');
        $asOf = is_string($asOf) && trim($asOf) !== '' ? trim($asOf) : date('Y-m-d');

        $accountIdParam = $this->request->getGet('accountId');
        $accountId      = is_numeric($accountIdParam) ? (int) $accountIdParam : null;
        $initialBankBalance = 0.0;
        if (!empty($this->cuID)) {
            $initialBankBalance = $this->budgetService->getInitialBankBalance($this->cuID, $asOf, $accountId);
        }

        $formattedInitialBalance = ($initialBankBalance < 0 ? '-$' : '$') . number_format(abs($initialBankBalance), 2);

        $this->data['asOf'] = $asOf;
        $this->data['selectedAccountId'] = $accountId;
        $this->data['initialBankBalance'] = $initialBankBalance;
        $this->data['initialBankBalanceFMT'] = $formattedInitialBalance;
        $this->data['initialBankBalanceAsOf'] = $asOf;

        if ($activeUserId !== null) {
            try {
                $executiveSummary = $this->getDashboardService()->getExecutiveDashboardSummary((int) $activeUserId);
                $this->data = array_merge($this->data ?? [], $executiveSummary);
            } catch (\Throwable $e) {
                log_message('error', 'BudgetController::index failed to build executive summary: {msg}', ['msg' => $e->getMessage()]);
            }
        }

        if (! empty($activeUserId)) {
            /** @var \App\Services\SetupStatusService $setupService */
            $setupService = service('setupStatusService');
            $this->data['setupStatus'] = $setupService->getSetupStatus((int) $activeUserId);
            $this->data['setupPrefs'] = $setupService->getDismissPreferences((int) $activeUserId);
            $this->data['setupContext'] = 'budget';
        }

        // Render the page
        return $this->renderTheme('App\Modules\User\Views\Budget\index', $this->data);
    }
    

    public function thisMonth(?string $type = null)
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] thisMonth');
        return $this->renderMonthlyPeriod(
            $type,
            'first day of this month 00:00:00',
            'last day of this month 23:59:59',
            'first day of this month',
            'This Month',
            'Budget/This-Month'
        );
    }

    public function lastMonth(?string $type = null)
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] lastMonth');
        return $this->renderMonthlyPeriod(
            $type,
            'first day of last month 00:00:00',
            'last day of last month 23:59:59',
            'first day of last month',
            'Last Month',
            'Budget/Last-Month'
        );
    }

    public function nextMonth(?string $type = null)
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] nextMonth');
        return $this->renderMonthlyPeriod(
            $type,
            'first day of next month 00:00:00',
            'last day of next month 23:59:59',
            'first day of next month',
            'Next Month',
            'Budget/Next-Month'
        );
    }

    private function renderMonthlyPeriod(?string $type, string $startPhrase, string $endPhrase, string $labelPhrase, string $title, string $routeBase)
    {
        $filterType = $this->normalizeBudgetFilterType($type);

        $timezone  = new \DateTimeZone('America/Chicago');
        $startDate = (new \DateTime($startPhrase, $timezone))->format('Y-m-d H:i:s');
        $endDate   = (new \DateTime($endPhrase, $timezone))->format('Y-m-d H:i:s');

        $common = $this->commonData();
        if ($common instanceof ResponseInterface) {
            return $common;
        }

        $commonArray = is_array($common) ? $common : [];

        $summary      = ['income' => 0.0, 'expense' => 0.0, 'net' => 0.0];
        $transactions = [];

        try {
            if (method_exists($this->budgetService, 'getMonthlySummary')) {
                $summary = $this->budgetService->getMonthlySummary($this->cuID, $startDate, $endDate);
            }
            if (method_exists($this->budgetService, 'getMonthlyTransactions')) {
                $transactions = $this->budgetService->getMonthlyTransactions($this->cuID, $startDate, $endDate, $filterType);
            } elseif (method_exists($this->budgetService, 'getTransactionsByDateRange')) {
                $allTx = $this->budgetService->getTransactionsByDateRange($this->cuID, $startDate, $endDate);
                if ($filterType) {
                    $transactions = array_values(array_filter($allTx, static function ($row) use ($filterType) {
                        return (isset($row['type']) && strtolower((string)($row['type'] ?? '')) === $filterType);
                    }));
                } else {
                    $transactions = $allTx;
                }
            }
        } catch (\Throwable $e) {
            log_message('error', 'BudgetController::renderMonthlyPeriod failed: {msg}', ['msg' => $e->getMessage()]);
        }

        $periodLabel = (new \DateTime($labelPhrase, $timezone))->format('F Y');

        $this->data = array_merge($this->data ?? [], $commonArray, [
            'pageTitle'        => $title,
            'periodTitle'      => $title,
            'periodLabel'      => $periodLabel,
            'startDate'        => $startDate,
            'endDate'          => $endDate,
            'filterType'       => $filterType,
            'summary'          => $summary,
            'transactions'     => $transactions,
            'periodRouteBase'  => $routeBase,
        ]);

        $this->logMemory('before-view-render:monthly-overview');
        return $this->renderTheme('User/Budget/monthly_overview', $this->data);
    }

    private function normalizeBudgetFilterType(?string $type): ?string
    {
        if (!is_string($type)) {
            return null;
        }

        $normalized = strtolower($type);
        return in_array($normalized, ['income', 'expense'], true) ? $normalized : null;
    }
    
    public function accountManager()
    {
        if ($this->featureGuardResponse instanceof ResponseInterface) {
            return $this->featureGuardResponse;
        }
        $this->trace('[METHOD_ENTRY] ' . __FUNCTION__);
        $this->trace('[AJAX CHECK] isAJAX=' . ($this->request->isAJAX() ? 'YES' : 'NO'));
        $this->trace('[AJAX_HEADERS] ' . json_encode($this->request->headers()));
        $this->trace('[AJAX_POST] ' . json_encode($this->request->getPost()));

        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->respondUnauthorized('Authentication required to manage budget accounts.');
        }

        if (! $this->request->isAJAX()) {
            return redirect()->to('/Budget');
        }
 
        $post = $this->request->getPost();
        $json = $this->request->getJSON(true);

        log_message('debug', 'Budget/Account-Manager POST: ' . json_encode($post));
        log_message('debug', 'Budget/Account-Manager JSON: ' . json_encode($json));

        if (!is_array($post) || $post === []) {
            $post = (array) $json;
        }

        if (!is_array($post) || $post === []) {
            return $this->response->setStatusCode(422)->setJSON([
                'status' => 'error',
                'errors' => [
                    'payload' => 'Invalid request payload.',
                ],
            ]);
        }

        $json = $post;

        if (isset($json['user_id']) && (int) $json['user_id'] !== $userId) {
            $this->logSecurityEvent('accountManager', 'User ID mismatch detected during payload validation.', $userId, $json);
            return $this->response->setStatusCode(422)->setJSON([
                'status' => 'error',
                'errors' => [
                    'user_id' => 'User mismatch detected for this session.',
                ],
            ]);
        }

        $status     = 1;
        $beta       = $json['beta'] ?? 'No';
        $formMode   = $json['form_mode'] ?? 'Add';
        $username   = $this->session->get('username') ?? ($json['username'] ?? '');
        $userEmail  = $this->session->get('email') ?? ($json['user_email'] ?? '');
        $nickname   = $json['nickname'] ?? $username;
        $netAmount  = $this->sanitizeCurrency($json['net_amount'] ?? 0);
        $grossAmount= $this->sanitizeCurrency($json['gross_amount'] ?? 0);
        // Recurring schedule inventory: recurring_schedule is stored alongside recurring_account,
        // while intervals remains the legacy schedule engine field.
        $recurringAccount = $json['recurring_account'] ?? 'No';
        $recurringSchedule = $json['recurring_schedule'] ?? null;
        
        $accountType = isset($json['account_type']) ? trim((string) $json['account_type']) : null;
        $sourceType  = isset($json['source_type']) ? trim((string) $json['source_type']) : null;
        $isDebt      = $sourceType ? (preg_match('/(Debt|Loan|Mortgage)/i', $sourceType) === 1 ? 1 : 0) : 0;
        $intervals   = $json['intervals'] ?? null;

        $designatedDateRaw = $json['designated_date'] ?? null;
        $dueDateEstimated = false;
        if ($designatedDateRaw) {
            $dateTranslator = strtotime($designatedDateRaw);
            if ($dateTranslator === false) {
                $dueDateEstimated = true;
                [$designatedDate, $month, $day, $year] = $this->defaultDueDate();
            } else {
                $dueDateEstimated = true;
                [$designatedDate, $month, $day, $year] = $this->defaultDueDate();
            }
        } else {
           $designatedDate = $month = $day = $year = null; // Default values if no date provided
        }
    
        $accountData = [
            'status'            => $status,
            'beta'              => $beta,
            'mode'              => $formMode,
            'created_by'        => $userId,
            'created_by_email'  => $userEmail,
            'unix_timestamp'    => time(),
            'designated_date'   => $designatedDate,
            'month'             => (int) $month,
            'day'               => (int) $day,
            'year'              => (int) $year,
            'username'          => $username,
            'name'              => $nickname,
            'net_amount'        => $netAmount,
            'gross_amount'      => $grossAmount,
            'paid'              => 0,
            'recurring_account' => $recurringAccount,
            'recurring_schedule'=> $recurringSchedule,
            'account_type'      => $accountType,
            'source_type'       => $sourceType,
            'is_debt'           => $isDebt,
            'intervals'         => $intervals,
        ];
        // Insert or update logic as before, ensuring the array keys match your table column names
        try {
            log_message('debug', 'BudgetController::accountManager recurring payload: ' . json_encode([
                'recurring_account' => $recurringAccount,
                'recurring_schedule' => $recurringSchedule,
                'intervals' => $intervals,
                'account_type' => $accountType,
            ]));

            $formMode                           = $json['form_mode'];
            switch ($formMode) {
                case 'Add':
                    if ($isDebt) {
                        // Check if the debt account already exists for the user and source type
                        $existingDebtAccount = $this->budgetModel->getDebtAccountByUserAndSource($userId, $sourceType);

                        if (is_array($existingDebtAccount) && !empty($existingDebtAccount)) {
                            $updatedDebtData = [
                                'available_balance' => (float) ($existingDebtAccount['available_balance'] ?? 0) + $grossAmount,
                                'current_balance'   => (float) ($existingDebtAccount['current_balance'] ?? 0) + $netAmount,
                            ];

                            $this->budgetModel->updateDebtAccount($existingDebtAccount['id'], $updatedDebtData);
                            $insertedID = (int) $existingDebtAccount['id'];
                        } else {
                            $debtData = [
                                'beta'               => $beta,
                                'status'             => $status,
                                'date'               => $designatedDate,
                                'user_id'            => $userId,
                                'user_email'         => $userEmail,
                                'username'           => $username,
                                'account_type'       => $sourceType,
                                'debtor'             => $nickname,
                                'available_balance'  => $grossAmount,
                                'current_balance'    => $netAmount,
                            ];
                            $insertedID = (int) $this->budgetModel->insertDebtAccount($debtData);
                        }
                    }
                
                    if ($this->debug === 1) {
                        log_message('debug', 'BudgetController L473 - Sending $accountData to Model: ' . print_r($accountData, true));
                    }

                    $this->logMemory('before-db-insert');
                    $insertedID = (int) $this->budgetService->save($accountData);
                    $this->logMemory('after-db-insert');
                    if ($insertedID > 0) {
                        $this->invalidateCrudCache(array_filter([
                            'budget',
                            $userId > 0 ? 'user:' . $userId : null,
                        ]));
                        session()->setFlashdata('message', 'Budget record added successfully.');
                        session()->setFlashdata('alert-class', 'success');
                        $accountId = $insertedID;

$this->trace('[JSON_RESPONSE] ' . __FUNCTION__ . ' accountID=' . $accountId);
                        $this->trace('[METHOD_EXIT] ' . __FUNCTION__);
                        return $this->response->setJSON([
                            'status' => 'success',
                            'accountID' => $accountId,
                        ]);
                    }
                    return $this->response->setStatusCode(422)->setJSON([
                        'status' => 'error',
                        'errors' => [
                            'account' => 'Unable to create the budget record.',
                        ],
                    ]);
        
                case 'Edit':
                    $accountId = isset($json['account_id']) ? (int) $json['account_id'] : 0;
                    if ($accountId <= 0) {
                        return $this->respondFailure('Account identifier is required for updates.', 400);
                    }

                    $updated = $this->budgetService->update($accountId, $accountData);
                    if ($updated) {
                        $this->invalidateCrudCache(array_filter([
                            'budget',
                            $userId > 0 ? 'user:' . $userId : null,
                        ]));
                        session()->setFlashdata('message', 'Budget record updated successfully.');
                        session()->setFlashdata('alert-class', 'success');
$this->trace('[JSON_RESPONSE] ' . __FUNCTION__ . ' accountID=' . $accountId);
                        $this->trace('[METHOD_EXIT] ' . __FUNCTION__);
                        return $this->response->setJSON([
                            'status' => 'success',
                            'accountID' => $accountId,
                        ]);
                    }

                    return $this->response->setStatusCode(422)->setJSON([
                        'status' => 'error',
                        'errors' => [
                            'account' => 'Unable to update the budget record.',
                        ],
                    ]);
        
                 case 'Copy':
                    $this->logMemory('before-db-insert');
                    $insertedID = (int) $this->budgetService->save($accountData);
                    $this->logMemory('after-db-insert');
                    if ($insertedID > 0) {
                        $this->invalidateCrudCache(array_filter([
                            'budget',
                            $userId > 0 ? 'user:' . $userId : null,
                        ]));
                        $accountId = $insertedID;

$this->trace('[JSON_RESPONSE] ' . __FUNCTION__ . ' accountID=' . $accountId);
                        $this->trace('[METHOD_EXIT] ' . __FUNCTION__);
                        return $this->response->setJSON([
                            'status' => 'success',
                            'accountID' => $accountId,
                        ]);
                    }

                    return $this->response->setStatusCode(422)->setJSON([
                        'status' => 'error',
                        'errors' => [
                            'account' => 'Unable to duplicate the budget record.',
                        ],
                    ]);

                default:
                    session()->setFlashdata('message', 'There was an error submitting your changes. Contact support by clicking <a href="' . site_url('/Support') . '">here!</a>');
                    session()->setFlashdata('alert-class', 'danger');
                    return $this->response->setStatusCode(422)->setJSON([
                        'status' => 'error',
                        'errors' => [
                            'form_mode' => 'Invalid form mode supplied.',
                        ],
                    ]);
            }
        } catch (\UnexpectedValueException $e) {
            log_message('debug', 'BudgetController::accountManager recurring validation failed: ' . $e->getMessage());
            return $this->response->setStatusCode(422)->setJSON([
                'status' => 'error',
                'errors' => [
                    'validation' => $e->getMessage(),
                ],
            ]);
        } catch (\Throwable $e) {
            $this->logException('accountManager', $e, $userId, ['payloadKeys' => array_keys($json)]);
            return $this->response->setStatusCode(422)->setJSON([
                'status' => 'error',
                'errors' => [
                    'server' => 'An unexpected error occurred while processing the account.',
                ],
            ]);
        }
    }

    protected function resolveAuthenticatedUserId(): ?int
    {
        if ($this->cuID !== null) {
            return is_numeric($this->cuID) ? (int) $this->cuID : null;
        }

        $userId = $this->resolveCurrentUserId();
        if ($userId !== null) {
            $this->cuID = (int) $userId;
            return $this->cuID;
        }

        return null;
    }

    protected function respondUnauthorized(string $message): ResponseInterface
    {
        return $this->respondFailure($message, 401, [], 'error');
    }

    protected function respondSuccess(array $data, bool $fromCache = false, string $message = '', int $statusCode = 200, string $statusLabel = 'success'): ResponseInterface
    {
        $payload = [
            'status'    => $statusLabel,
            'data'      => $data,
            'fromCache' => $fromCache,
            'asOf'      => $this->currentTimestamp(),
        ];

        if ($message !== '') {
            $payload['message'] = $message;
        }

        return $this->respond($payload, $statusCode);
    }

    protected function respondFailure(string $message, int $statusCode = 500, array $extra = [], string $status = 'error'): ResponseInterface
    {
        $payload = array_merge([
            'status'  => $status,
            'message' => $message,
            'asOf'    => $this->currentTimestamp(),
        ], $extra);

        return $this->respond($payload, $statusCode);
    }

    protected function respondNotReady(string $action, array $context = []): ResponseInterface
    {
        $message = sprintf('The %s endpoint is not yet available.', $action);

        if (!empty($context)) {
            $contextString = json_encode($context, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            if ($contextString === false) {
                $contextString = '[unserializable context]';
            }

            log_message('notice', sprintf(
                'BudgetController::%s invoked before implementation. Context: %s',
                $action,
                $contextString
            ));
        } else {
            log_message('notice', sprintf('BudgetController::%s invoked before implementation.', $action));
        }

        return $this->respondSuccess([], false, $message, 200, 'degraded');
    }

    protected function currentTimestamp(): string
    {
        return Time::now('America/Chicago')->toDateTimeString();
    }

    // protected function sanitizeCurrency($value): float
    // {
    //     if (is_string($value)) {
    //         $value = preg_replace('/[^0-9.\-]/', '', $value);
    //     }

    //     return round((float) $value, 2);
    // }

    // /**
    //  * Returns an estimated due date when one is missing or invalid.
    //  * Defaults to the 28th of the current month in America/Chicago.
    //  */
    // protected function defaultDueDate(): array
    // {
    //     $timezone = new DateTimeZone('America/Chicago');
    //     $now      = new DateTime('now', $timezone);
    //     $lastDay  = (int) $now->format('t');
    //     $targetDay= min(28, $lastDay);
    //     $now->setDate((int) $now->format('Y'), (int) $now->format('m'), $targetDay);

    //     return [
    //         $now->format('m/d/Y'),
    //         (int) $now->format('m'),
    //         $targetDay,
    //         (int) $now->format('Y'),
    //     ];
    // }

    protected function logSecurityEvent(string $action, string $message, int $userId, array $payload = []): void
    {
        $context = [
            'controller'  => static::class,
            'action'      => $action,
            'userId'      => $userId,
            'payloadKeys' => array_keys($payload),
        ];

        if ($this->logger instanceof LoggerInterface) {
            $this->logger->warning($message, $context);
            return;
        }

        log_message('warning', $message . ' Context: ' . json_encode($context));
    }

    protected function logException(string $action, \Throwable $exception, ?int $userId = null, array $context = []): void
    {
        $baseContext = array_merge([
            'controller'   => static::class,
            'action'       => $action,
            'userId'       => $userId,
            'memory_usage' => memory_get_usage(true),
            'error_hash'   => md5($exception->getMessage()),
        ], $context);

        if ($this->logger instanceof LoggerInterface) {
            $this->logger->error($exception->getMessage(), $baseContext);
        } else {
            log_message('error', $exception->getMessage() . ' Context: ' . json_encode($baseContext));
        }
    }

    protected function rememberUserData(string $segment, int $userId, callable $callback, array $context = []): array
    {
        $cached = $this->safeCache->getUser('budget', $segment, $userId, $context);

        if ($cached !== null) {
            $this->cacheHits[$segment] = true;
            return ['data' => $cached, 'fromCache' => true];
        }

        $data = $callback();
        $this->safeCache->saveUser('budget', $segment, $userId, $data, $this->apiCacheTtl, $context);
        $this->cacheHits[$segment] = false;

        return ['data' => $data, 'fromCache' => false];
    }


    public function accountOverview() {
        log_message('debug', '[BudgetController::METHOD_ENTRY] accountOverview');
        $budgetType = $this->request->getUri()->getSegment(2);
        $this->data['pageTitle'] = 'Account Overview | MyMI Wallet | The Future of Finance';

        // Get account type and source records
        $this->data['accountType'] = $budgetType === 'Expenses' ? 'Expense' : $budgetType;
        $this->data['budgetType'] = $budgetType;
        $this->data['getSourceRecords'] = $this->getBudgetService()->getSourceRecords($this->cuID, $budgetType);

        $common = $this->ensureCommonDataReady();
        if ($common instanceof ResponseInterface) {
            return $common;
        }
        return $this->renderTheme('App\Modules\User\Views\Budget\Account_Overview', $this->data);
    }

    public function add($type = null) {
        log_message('debug', '[BudgetController::METHOD_ENTRY] add');
        $requestMethod = strtoupper((string) $this->request->getMethod());
        $normalizedType = in_array((string) $type, ['Income', 'Expense'], true) ? (string) $type : 'Expense';
        $postPayload = $this->request->getPost() ?? [];
        $postKeys = array_keys(is_array($postPayload) ? $postPayload : []);

        log_message('debug', 'BudgetController::add request diagnostics: method=' . $requestMethod . ' normalizedType=' . $normalizedType . ' postKeys=' . json_encode($postKeys));

        $this->data['pageTitle'] = 'Add Budget Record | MyMI Wallet | The Future of Finance';
        $this->data['accountType'] = $normalizedType;
        $this->data['configMode'] = 'Add';

        if ($requestMethod === 'POST') {
            $userId = $this->resolveAuthenticatedUserId();
            if ($userId === null) {
                return redirect()->to('/Login')->with('error', 'Please log in to add a budget record.');
            }

            $rules = [
                'designated_date'  => 'required|valid_date[Y-m-d]',
                'source_type'      => 'required|string|max_length[100]',
                'nickname'         => 'permit_empty|string|max_length[255]',
                'net_amount'       => 'permit_empty|decimal',
                'gross_amount'     => 'permit_empty|decimal',
                'paid'             => 'required|in_list[0,1,N/A]',
                'recurring_account'=> 'permit_empty|in_list[Yes,No,N/A]',
                'recurring_schedule'=> 'permit_empty|string|max_length[50]',
                'intervals'        => 'permit_empty|string|max_length[50]',
            ];

            $isValid = $this->validateData($postPayload, $rules);
            log_message('debug', 'BudgetController::add validation=' . ($isValid ? 'pass' : 'fail'));

            if (! $isValid) {
                $errors = $this->validator ? $this->validator->getErrors() : [];
                log_message('error', 'BudgetController::add validation errors: ' . json_encode($errors));
                return redirect()->back()->withInput()->with('error', 'Please correct the highlighted form errors.');
            }

            try {
                $designatedDate = (string) ($postPayload['designated_date'] ?? '');
                $timestamp = strtotime($designatedDate);
                $month = $timestamp ? (int) date('m', $timestamp) : null;
                $day = $timestamp ? (int) date('d', $timestamp) : null;
                $year = $timestamp ? (int) date('Y', $timestamp) : null;
                $sourceType = isset($postPayload['source_type']) ? trim((string) $postPayload['source_type']) : null;
                $isDebt = $sourceType ? (preg_match('/(Debt|Loan|Mortgage)/i', $sourceType) === 1 ? 1 : 0) : 0;

                $netAmount = (float) preg_replace('/[^0-9.\-]/', '', (string) ($postPayload['net_amount'] ?? '0'));
                $grossAmount = (float) preg_replace('/[^0-9.\-]/', '', (string) ($postPayload['gross_amount'] ?? '0'));

                $insertData = [
                    'status'             => 1,
                    'beta'               => ($postPayload['beta'] ?? '') === 'Yes' ? 'Yes' : 'No',
                    'mode'               => 'Add',
                    'created_by'         => $userId,
                    'created_by_email'   => $this->session->get('email') ?? ($postPayload['user_email'] ?? ''),
                    'unix_timestamp'     => time(),
                    'designated_date'    => $designatedDate ?: null,
                    'month'              => $month,
                    'day'                => $day,
                    'year'               => $year,
                    'username'           => $this->session->get('username') ?? ($postPayload['username'] ?? ''),
                    'name'               => trim((string) ($postPayload['nickname'] ?? '')),
                    'net_amount'         => round($netAmount, 2),
                    'gross_amount'       => round($grossAmount, 2),
                    'paid'               => ((string) ($postPayload['paid'] ?? '0') === '1') ? 1 : 0,
                    'recurring_account'  => $postPayload['recurring_account'] ?? 'No',
                    'recurring_schedule' => $postPayload['recurring_schedule'] ?? null,
                    'account_type'       => $normalizedType,
                    'source_type'        => $sourceType,
                    'is_debt'            => $isDebt,
                    'intervals'          => $postPayload['intervals'] ?? null,
                ];

                $insertId = (int) $this->budgetService->save($insertData);
                log_message('debug', 'BudgetController::add insert=' . ($insertId > 0 ? 'success' : 'failure') . ' insertId=' . $insertId);

                if ($insertId > 0) {
                    $this->invalidateCrudCache(array_filter([
                        'budget',
                        $userId > 0 ? 'user:' . $userId : null,
                    ]));
                    return redirect()->to('/Budget')->with('message', 'Budget record added successfully.')->with('alert-class', 'success');
                }

                return redirect()->back()->withInput()->with('error', 'Unable to add budget record at this time.');
            } catch (\Throwable $exception) {
                log_message('error', 'BudgetController::add insert exception: ' . $exception->getMessage() . ' file=' . $exception->getFile() . ' line=' . $exception->getLine() . ' trace=' . $exception->getTraceAsString());
                return redirect()->back()->withInput()->with('error', 'Unexpected error while adding budget record.');
            }
        }

        try {
            log_message('debug', 'BudgetController::add GET before commonData');
            $common = $this->ensureCommonDataReady();
            log_message('debug', 'BudgetController::add GET after commonData');
            if ($common instanceof ResponseInterface) {
                return $common;
            }

            $this->data['accountType'] = $normalizedType;

            log_message('debug', 'BudgetController::add GET before renderTheme');
            $response = $this->renderTheme('App\Modules\User\Views\Budget\Add', $this->data);
            log_message('debug', 'BudgetController::add GET after renderTheme');

            return $response;
        } catch (\Throwable $exception) {
            log_message('error', 'BudgetController::add render exception: ' . $exception->getMessage() . ' file=' . $exception->getFile() . ' line=' . $exception->getLine() . ' trace=' . $exception->getTraceAsString());
            throw $exception;
        }
    }

    public function approveRecurringSchedule($accountID)
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] approveRecurringSchedule');
        log_message('debug', 'BudgetController::approveRecurringSchedule - Start processing for AccountID: ' . $accountID);
    
        // Check if the request content type is JSON
        if ($this->request->getHeaderLine('Content-Type') === 'application/json') {
            $formData = json_decode($this->request->getBody(), true);
        } else {
            // Fallback to default POST retrieval
            $formData = $this->request->getPost(true);
        }
    
        // Log the raw input if formData is invalid
        if (!$formData) {
            log_message('error', 'BudgetController::approveRecurringSchedule - Invalid input received.');
            return $this->response->setStatusCode(400, 'Bad Request')->setJSON([
                'success' => false,
                'message' => 'Invalid request data. Please ensure the payload is correct.',
            ]);
        }
    
        log_message('debug', 'BudgetController::approveRecurringSchedule - Received Data: ' . print_r($formData, true));
    
        // Extract and validate recurringData
        $recurringData = $formData['recurringData'] ?? [];
        if (!is_array($recurringData) || empty($recurringData)) {
            log_message('error', 'BudgetController::approveRecurringSchedule - No valid recurring schedule data found.');
            return $this->response->setStatusCode(400, 'Bad Request')->setJSON([
                'success' => false,
                'message' => 'No valid recurring schedule data provided.',
            ]);
        }
    
        // Process each schedule entry
        foreach ($recurringData as $schedule) {
            $netAmount = isset($schedule['netAmount']) ? floatval($schedule['netAmount']) : 0;
            $grossAmount = isset($schedule['grossAmount']) ? floatval($schedule['grossAmount']) : 0;
            $dueDate = isset($schedule['dueDate']) ? $schedule['dueDate'] : null;
        
            // Validate dueDate
            if (!$dueDate || strtotime($dueDate) === false) {
                log_message('error', 'Invalid or missing dueDate in recurring schedule.');
                continue;
            }
        
            $formattedDate = date('m/d/Y', strtotime($dueDate));
            $designMonth = date('m', strtotime($dueDate));  
            $designDay = date('d', strtotime($dueDate));  
            $designYear = date('Y', strtotime($dueDate));  
        
            $data = [
                'status' => 1,
                'mode' => 'Recurring',
                'created_by' => $this->cuID,
                'unix_timestamp' => time(),
                'designated_date' => $formattedDate,
                'month' => $designMonth,
                'day' => $designDay,
                'year' => $designYear,
                'net_amount' => $netAmount,
                'gross_amount' => $grossAmount,
                'recurring_account' => 'Yes',
                'name' => $schedule['accountName'] ?? null, // Add name
                'account_type' => $schedule['accountType'] ?? null, // Add account type
                'source_type' => $schedule['accountSourceType'] ?? null, // Add source type
            ];
        
            log_message('debug', 'Processed Recurring Schedule Entry: ' . print_r($data, true));
        
            if (!$this->budgetModel->approveRecurringSchedule($data)) {
                log_message('error', 'Failed to insert recurring schedule data for Account ID: ' . $accountID);
            }
        }        
    
        log_message('info', 'Successfully inserted recurring schedules for Account ID: ' . $accountID);
    
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Recurring schedules successfully created.',
        ]);
    }
    
    public function approveRecurringScheduleOld($accountID) {
        log_message('debug', '[BudgetController::METHOD_ENTRY] approveRecurringScheduleOld');
        log_message('debug', 'Request headers: ' . print_r($this->request->getHeaders(), true));
        log_message('debug', 'Request body: ' . $this->request->getBody());
        
        // Get JSON request data if the form is sent via AJAX or standard POST request for normal form submission
        $jsonData = $this->request->getPost(); // Use getPost() if the form is a regular POST form
        
        if (!$jsonData) {
            session()->setFlashdata('error', 'Invalid request.');
            return redirect()->back();
        }
        log_message('debug', 'BudgetController L273 - $approveRecurringSchedule - $jsonData: ' . print_r($jsonData, true));
        // Pass the form data to the service for processing
        if ($this->getBudgetService()->approveRecurringSchedule($accountID, $jsonData)) {
            $this->invalidateCrudCache(array_filter([
                'budget',
                $this->cuID ? 'user:' . $this->cuID : null,
            ]));
            session()->setFlashdata('message', 'Recurring schedules successfully created.');
            return redirect()->to('/Budget');
        } else {
            log_message('error', $result['message']);
            session()->setFlashdata('error', 'Failed to insert recurring schedule.');
            return redirect()->back();
        }    
    }    

    public function bulkDelete() {
        log_message('debug', '[BudgetController::METHOD_ENTRY] bulkDelete');
        $ids = $this->request->getPost('ids');

        if ($this->getBudgetService()->bulkDelete($ids)) {
            $this->invalidateCrudCache(array_filter([
                'budget',
                $this->cuID ? 'user:' . $this->cuID : null,
            ]));
            return $this->response->setJSON(['status' => 'success', 'message' => 'Records deleted successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete records.']);
        }
    }

    public function bulkUpdateStatus() {
        log_message('debug', '[BudgetController::METHOD_ENTRY] bulkUpdateStatus');
        $ids = $this->request->getPost('ids');
        $status = $this->request->getPost('status');

        if ($this->getBudgetService()->bulkUpdateStatus($ids, $status)) {
            $this->invalidateCrudCache(array_filter([
                'budget',
                $this->cuID ? 'user:' . $this->cuID : null,
            ]));
            return $this->response->setJSON(['status' => 'success', 'message' => 'Records updated successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update records.']);
        }
    }      
    
    public function cancelAccount($accountID)
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] cancelAccount');
        $accountInfo = $this->budgetModel->getUserBudgetRecord($this->cuID, $accountID);

        foreach($accountInfo as $account) {
            if ($account['recurring_account_primary'] === 'Yes') {
                if ($this->budgetModel->cancelAccount($accountID)) {
                    $this->invalidateCrudCache(array_filter([
                        'budget',
                        $this->cuID ? 'user:' . $this->cuID : null,
                    ]));
                    session()->setFlashdata('message', 'Recurring Account deleted.');
                    return redirect()->to('/Budget');
                } else {
                    session()->setFlashdata('message', 'Recurring Account could not be deleted');
                    return redirect()->to("/Budget/Edit/{$accountID}");
                }
            } else {
                if ($this->budgetModel->cancelSubaccount($accountID)) {
                    $this->invalidateCrudCache(array_filter([
                        'budget',
                        $this->cuID ? 'user:' . $this->cuID : null,
                    ]));
                    session()->setFlashdata('message', 'Subaccount deleted.');
                    return redirect()->to("/Budget/Edit/{$accountID}");
                } else {
                    session()->setFlashdata('message', 'Subaccount could not be deleted');
                    return redirect()->to("/Budget/Recurring-Account/Schedule/{$accountID}");
                }
            }
        }
    }

    public function deleteAccount($accountID) {
        log_message('debug', '[BudgetController::METHOD_ENTRY] deleteAccount');
        if ($this->getBudgetService()->cancelAccount($accountID)) {
            $this->invalidateCrudCache(array_filter([
                'budget',
                $this->cuID ? 'user:' . $this->cuID : null,
            ]));
            session()->setFlashdata('message', 'Recurring Account deleted.');
            return redirect()->back()->withInput()->with('message', 'Account deleted successfully!');
        } else {
            session()->setFlashdata('message', 'Account could not be deleted.');
            return redirect()->back()->withInput()->with('message', 'Account could not be deleted');
        }
    }

    public function details($accountID) {
        log_message('debug', '[BudgetController::METHOD_ENTRY] details');
        $this->data['pageTitle'] = 'Account Details & History | MyMI Wallet | The Future of Finance';
        $this->data['userBudgetRecord'] = $this->getBudgetService()->getUserBudgetRecord($this->cuID, $accountID);

        // Get related budget records for display
        $userBudgetRecordName = $this->data['userBudgetRecord']['accountName'];
        $this->data['userRelatedBudgetAccounts'] = $this->getBudgetService()->getUserRelatedBudgetRecords($this->cuID, $userBudgetRecordName);

        $common = $this->ensureCommonDataReady();
        if ($common instanceof ResponseInterface) {
            return $common;
        }
        return $this->renderTheme('App\Modules\User\Views\Budget\Details', $this->data);
    }

    public function edit($type = null) {
        log_message('debug', '[BudgetController::METHOD_ENTRY] edit');
        $uri = $this->request->getUri();
        $formMode = $uri->getSegment(2);
        $accountID = ($formMode === 'Recurring-Account') ? $uri->getSegment(4) : $uri->getSegment(3);
    
        if ($this->debug === 1) {
            log_message('debug', 'BudgetController::edit - $accountID: ' . $accountID);
        }
    
        // Fetch the budget record
        $userBudgetRecord = $this->getBudgetService()->getUserBudgetRecord($this->cuID, $accountID);
        if (!$userBudgetRecord) {
            log_message('error', 'BudgetController::edit - Budget record not found for account ID: ' . $accountID);
            return redirect()->back()->with('error', 'The budget record you are trying to access does not exist.');
        }
        if ($this->debug === 1) {
            log_message('debug', 'BudgetController L172 - $userBudgetRecord: ' . (print_r($userBudgetRecord, true)));
        }
        // if (!$userBudgetRecord) {
        //     log_message('error', 'BudgetController::edit - Budget record not found for account ID: ' . $accountID);
        //     return redirect()->back()->with('error', 'The budget record you are trying to access does not exist. Please try again.');
        // }
    
        $userBudgetRecordID = $userBudgetRecord['accountID'] ?? null;
        $userBudgetRecordName = $userBudgetRecord['accountName'] ?? null;
    
        if ($this->debug === 1) {
            log_message('debug', 'BudgetController::edit - $userBudgetRecord: ' . print_r($userBudgetRecord, true));
            log_message('debug', 'BudgetController::edit - $userBudgetRecordName: ' . $userBudgetRecordName);
        }
    
        $userRelatedBudgetAccounts = $this->getBudgetService()->getUserRelatedBudgetRecords($this->cuID, $userBudgetRecordID);
    
        if ($this->debug === 1) {
            log_message('debug', 'BudgetController::edit - $userRelatedBudgetAccounts: ' . print_r($userRelatedBudgetAccounts, true));
        }
        $referrer = $this->request->getServer('HTTP_REFERER');
        if ($referrer && !str_contains($referrer, '/Dashboard/')) {
            session()->setFlashdata('return_to', $referrer);
        }

        $this->data['pageTitle'] = 'Edit Budget Record | MyMI Wallet | The Future of Finance';
        $this->data['getAccountInfo'] = $userBudgetRecord;
        $this->data['userBudgetRecord'] = $userBudgetRecord;
        $this->data['userRelatedBudgetAccounts'] = $userRelatedBudgetAccounts;
        $this->data['formMode'] = $formMode;
        $this->data['accountID'] = $accountID;
        
        $common = $this->ensureCommonDataReady();
        if ($common instanceof ResponseInterface) {
            return $common;
        }
    
        return $this->renderTheme('App\Modules\User\Views\Budget\Edit', $this->data);
    }
    
    public function financialAnalysis() {
        log_message('debug', '[BudgetController::METHOD_ENTRY] financialAnalysis');
        $this->data['pageTitle'] = 'My Financial Analysis | MyMI Wallet | The Future of Finance';

        if ($premiumGuard = premium_guard('budget.financial_analysis')) {
            return $premiumGuard;
        }

        // Use service for financial analysis data
        $financialData = $this->getBudgetService()->getFinancialAnalysisData($this->cuID);

        // Merge data into view
        $this->data = array_merge($this->data, $financialData);

        $common = $this->ensureCommonDataReady();
        if ($common instanceof ResponseInterface) {
            return $common;
        }
        return $this->renderTheme('App\Modules\User\Views\Budget\Financial_Analysis', $this->data);
    }

    public function financialForecaster()
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] financialForecaster');
        $this->data['pageTitle'] = 'Financial Forecaster | MyMI Wallet | The Future of Finance';

        if ($premiumGuard = premium_guard('budget.forecasting')) {
            return $premiumGuard;
        }

        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return redirect()->to(site_url('login'));
        }

        $allowedYears   = [1, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50];
        $requestedYears = (int) ($this->request->getGet('forecastPeriod') ?? 1);
        $forecastPeriod = in_array($requestedYears, $allowedYears, true) ? $requestedYears : 1;

        $forecastData = $this->getBudgetService()->forecastBasedOnTrends($userId, $forecastPeriod);

        $months    = $forecastData['months']    ?? [];
        $incomes   = $forecastData['incomes']   ?? [];
        $expenses  = $forecastData['expenses']  ?? [];
        $surpluses = $forecastData['surpluses'] ?? [];

        // Prepare data for the view
        $this->data['forecastPeriod'] = $forecastPeriod;
        $this->data['forecastYears']  = $allowedYears;
        $this->data['months']         = $months;
        $this->data['incomes']        = $incomes;
        $this->data['expenses']       = $expenses;
        $this->data['surpluses']      = $surpluses;
        $this->data['totalIncome']    = array_sum($incomes);
        $this->data['totalExpenses']  = array_sum($expenses);
        $this->data['totalSurplus']   = array_sum($surpluses);
        $this->data['historicalData'] = $forecastData['historical'] ?? [];

        $common = $this->ensureCommonDataReady();
        if ($common instanceof ResponseInterface) {
            return $common;
        }
        return $this->renderTheme('App\Modules\User\Views\Budget\Financial_Forecaster', $this->data);
    }

    /**
     * Forecast: supports /Budget/Forecast and /Budget/Forecast/{1y|5y|10y|15y|30y|<months>}
     * Accepts GET params: incomeGrowth, expenseGrowth, inflation, startingBalance, useAvgMonths
     */
    public function forecast(?string $horizon = null)
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] forecast');
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return redirect()->to(site_url('login'));
        }

        $h = strtolower(trim((string) ($horizon ?? '')));
        $yearsMap = ['1y' => 12, '5y' => 60, '10y' => 120, '15y' => 180, '30y' => 360];
        $months = 12;
        if (isset($yearsMap[$h])) {
            $months = $yearsMap[$h];
        } elseif ($h !== '' && ctype_digit($h)) {
            $months = max(1, (int) $h);
        } elseif ($h !== '' && preg_match('/^(\d+)\s*y$/', $h, $m)) {
            $months = max(12, ((int) $m[1]) * 12);
        }

        $req = $this->request;
        $incomeGrowthPct  = (float) ($req->getGet('incomeGrowth') ?? 3.0);
        $expenseGrowthPct = (float) ($req->getGet('expenseGrowth') ?? 2.0);
        $inflationPct     = (float) ($req->getGet('inflation') ?? 2.0);
        $startingBalance  = (float) ($req->getGet('startingBalance') ?? 0.0);
        $useAvgMonths     = (int) ($req->getGet('useAvgMonths') ?? 3);

        $incomeGrowthPct  = max(-50, min(50, $incomeGrowthPct));
        $expenseGrowthPct = max(-50, min(50, $expenseGrowthPct));
        $inflationPct     = max(-50, min(50, $inflationPct));
        $useAvgMonths     = max(1, min(12, $useAvgMonths));

        $monthlyIncomeGrowth  = pow(1 + ($incomeGrowthPct / 100), 1 / 12) - 1;
        $monthlyExpenseGrowth = pow(1 + ($expenseGrowthPct / 100), 1 / 12) - 1;
        $monthlyInflation     = pow(1 + ($inflationPct / 100), 1 / 12) - 1;

        $common = $this->ensureCommonDataReady();
        if ($common instanceof ResponseInterface) {
            return $common;
        }
        $now    = new \DateTime('first day of this month', new \DateTimeZone('America/Chicago'));

        $queryParams = [
            'incomeGrowth'    => $req->getGet('incomeGrowth'),
            'expenseGrowth'   => $req->getGet('expenseGrowth'),
            'inflation'       => $req->getGet('inflation'),
            'startingBalance' => $req->getGet('startingBalance'),
            'useAvgMonths'    => $req->getGet('useAvgMonths'),
        ];
        $queryParams = array_filter($queryParams, static function ($value) {
            return $value !== null && $value !== '';
        });

        $baseline = ['income' => 0.0, 'expense' => 0.0];
        try {
            if (isset($this->budgetService) && method_exists($this->budgetService, 'getRecentMonthlyAverages')) {
                $baseline = $this->budgetService->getRecentMonthlyAverages($userId, $useAvgMonths);
            } elseif (isset($this->budgetService) && method_exists($this->budgetService, 'getBaselineMonthly')) {
                $baseline = $this->budgetService->getBaselineMonthly($userId, $useAvgMonths);
            }
        } catch (\Throwable $e) {
            log_message('error', 'BudgetController::forecast baseline error: {msg}', ['msg' => $e->getMessage()]);
        }

        $startIncome    = (float) ($baseline['income'] ?? 0.0);
        $startExpense   = (float) ($baseline['expense'] ?? 0.0);
        $baselineMonths = (int) ($baseline['monthsConsidered'] ?? $useAvgMonths);
        $baselineSeries = is_array($baseline['series'] ?? null) ? $baseline['series'] : [];

        $forecast = [];
        try {
            if (isset($this->budgetService) && method_exists($this->budgetService, 'buildForecast')) {
                $forecast = $this->budgetService->buildForecast($userId, $months, [
                    'startIncome'          => $startIncome,
                    'startExpense'         => $startExpense,
                    'monthlyIncomeGrowth'  => $monthlyIncomeGrowth,
                    'monthlyExpenseGrowth' => $monthlyExpenseGrowth,
                    'monthlyInflation'     => $monthlyInflation,
                    'startingBalance'      => $startingBalance,
                    'startDate'            => $now,
                ]);
            } else {
                $forecast = $this->inlineBuildForecast($months, [
                    'startIncome'          => $startIncome,
                    'startExpense'         => $startExpense,
                    'monthlyIncomeGrowth'  => $monthlyIncomeGrowth,
                    'monthlyExpenseGrowth' => $monthlyExpenseGrowth,
                    'monthlyInflation'     => $monthlyInflation,
                    'startingBalance'      => $startingBalance,
                    'startDate'            => $now,
                ]);
            }
        } catch (\Throwable $e) {
            log_message('error', 'BudgetController::forecast build error: {msg}', ['msg' => $e->getMessage()]);
        }

        $ending = end($forecast) ?: [
            'income'     => 0,
            'expense'    => 0,
            'net'        => 0,
            'cumulative' => $startingBalance,
            'date'       => $now->format('Y-m-01'),
            'monthIndex' => 0,
        ];
        $totalIncome  = array_sum(array_column($forecast, 'income'));
        $totalExpense = array_sum(array_column($forecast, 'expense'));
        $totalSurplus = array_sum(array_column($forecast, 'net'));
        $years        = max(1, (int) ceil($months / 12));
        $periodLabel  = $years === 1 ? '1 Year' : ($years . ' Years');

        $this->data = array_merge($this->data ?? [], $commonArray ?? [], [
            'pageTitle'      => 'Budget Forecast',
            'periodLabel'    => $periodLabel,
            'months'         => $months,
            'useAvgMonths'   => $useAvgMonths,
            'baselineMonths' => $baselineMonths,
            'assumptions'    => [
                'incomeGrowth'    => $incomeGrowthPct,
                'expenseGrowth'   => $expenseGrowthPct,
                'inflation'       => $inflationPct,
                'startingBalance' => $startingBalance,
            ],
            'baseline'         => ['income' => $startIncome, 'expense' => $startExpense],
            'baselineHistory'  => $baselineSeries,
            'ending'           => [
                'income'  => (float) ($ending['income'] ?? 0),
                'expense' => (float) ($ending['expense'] ?? 0),
                'net'     => (float) ($ending['net'] ?? 0),
                'balance' => (float) ($ending['cumulative'] ?? $startingBalance),
            ],
            'forecast'         => $forecast,
            'forecastTotals'   => [
                'income'  => round($totalIncome, 2),
                'expense' => round($totalExpense, 2),
                'surplus' => round($totalSurplus, 2),
            ],
            'queryParams'      => $queryParams,
        ]);

        return $this->renderTheme('App\Modules\User\Views\Budget\forecast', $this->data);
    }

    /**
     * Fallback builder so the page works before service/model wiring.
     * Returns rows: [monthIndex,date,income,expense,net,cumulative]
     */
    private function inlineBuildForecast(int $months, array $opt): array
    {
        $startIncome  = (float) ($opt['startIncome'] ?? 0.0);
        $startExpense = (float) ($opt['startExpense'] ?? 0.0);
        $gInc         = (float) ($opt['monthlyIncomeGrowth'] ?? 0.0);
        $gExp         = (float) ($opt['monthlyExpenseGrowth'] ?? 0.0);
        $gInf         = (float) ($opt['monthlyInflation'] ?? 0.0); // reserved for real-terms use
        $balance      = (float) ($opt['startingBalance'] ?? 0.0);
        $startDate    = $opt['startDate'] ?? new \DateTime('first day of this month', new \DateTimeZone('America/Chicago'));
        if ($startDate instanceof \DateTimeInterface) {
            $cursor = (clone $startDate);
        } else {
            try {
                $cursor = new \DateTime(is_string($startDate) ? $startDate : 'first day of this month', new \DateTimeZone('America/Chicago'));
            } catch (\Exception $e) {
                $cursor = new \DateTime('first day of this month', new \DateTimeZone('America/Chicago'));
            }
        }
        $cursor->setTime(0, 0)->modify('first day of this month');

        $rows    = [];
        $income  = $startIncome;
        $expense = $startExpense;
        for ($i = 0; $i < $months; $i++) {
            $income  *= (1 + $gInc);
            $expense *= (1 + $gExp);
            $net      = $income - $expense;
            $balance += $net;
            $rows[] = [
                'monthIndex' => $i + 1,
                'date'       => $cursor->format('Y-m-01'),
                'income'     => round($income, 2),
                'expense'    => round($expense, 2),
                'net'        => round($net, 2),
                'cumulative' => round($balance, 2),
            ];
            $cursor->modify('+1 month');
        }

        return $rows;
    } 

    public function summary()
    {
        if ($this->featureGuardResponse instanceof ResponseInterface) {
            return $this->featureGuardResponse;
        }
        log_message('debug', '[BudgetController::METHOD_ENTRY] summary');
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->respondUnauthorized('User not logged in.');
        }

        $from = $this->request->getGet('from');
        $to   = $this->request->getGet('to');

        try {
            $service = $this->getBudgetService();
            $period  = $service->resolvePeriodWindow($from, $to);
            $context = [
                'from' => $period['from']->toDateString(),
                'to'   => $period['to']->toDateString(),
            ];

            $result = $this->rememberUserData(
                'api-summary',
                $userId,
                fn () => $service->buildBudgetSummary($userId, ['from' => $from, 'to' => $to]),
                $context
            );

            $resultData  = $result['data'] ?? [];
            $statusLabel = $resultData['status'] ?? 'success';
            $payload     = $resultData['data'] ?? $resultData;

            return $this->respondSuccess($payload, $result['fromCache'], '', 200, $statusLabel);
        } catch (\Throwable $e) {
            $this->logException('summary', $e, $userId, ['from' => $from, 'to' => $to]);
            return $this->respondFailure('Failed to compile budget summary.', 500, [], 'degraded');
        }
    }

    public function credit()
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] credit');
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->respondUnauthorized('User not logged in.');
        }

        try {
            $service = $this->getBudgetService();
            $result = $this->rememberUserData(
                'api-credit',
                $userId,
                fn () => $service->buildCreditBreakdown($userId)
            );

            $resultData  = $result['data'] ?? [];
            $statusLabel = $resultData['status'] ?? 'success';
            $payload     = $resultData['data'] ?? $resultData;

            return $this->respondSuccess($payload, $result['fromCache'], '', 200, $statusLabel);
        } catch (\Throwable $e) {
            $this->logException('credit', $e, $userId);
            return $this->respondFailure('Failed to retrieve credit utilization data.', 500, [], 'degraded');
        }
    }

    public function available()
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] available');
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->respondUnauthorized('User not logged in.');
        }

        $from = $this->request->getGet('from');
        $to   = $this->request->getGet('to');

        try {
            $service = $this->getBudgetService();
            $period  = $service->resolvePeriodWindow($from, $to);
            $context = [
                'from' => $period['from']->toDateString(),
                'to'   => $period['to']->toDateString(),
            ];

            $result = $this->rememberUserData(
                'api-available',
                $userId,
                fn () => $service->buildAvailableSnapshot($userId, ['from' => $from, 'to' => $to]),
                $context
            );

            $resultData  = $result['data'] ?? [];
            $statusLabel = $resultData['status'] ?? 'success';
            $payload     = $resultData['data'] ?? $resultData;

            return $this->respondSuccess($payload, $result['fromCache'], '', 200, $statusLabel);
        } catch (\Throwable $e) {
            $this->logException('available', $e, $userId, ['from' => $from, 'to' => $to]);
            return $this->respondFailure('Failed to calculate available funds.', 500, [], 'degraded');
        }
    }

    public function repayment()
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] repayment');
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->respondUnauthorized('User not logged in.');
        }

        $strategyParam = $this->request->getGet('strategy');
        $strategy = $strategyParam ? strtolower((string) $strategyParam) : 'avalanche';
        if (!in_array($strategy, ['avalanche', 'snowball'], true)) {
            $strategy = 'avalanche';
        }

        try {
            $service = $this->getBudgetService();
            $result = $this->rememberUserData(
                'api-repayment',
                $userId,
                fn () => $service->buildRepaymentSnapshot($userId, ['strategy' => $strategy]),
                ['strategy' => $strategy]
            );

            $resultData  = $result['data'] ?? [];
            $statusLabel = $resultData['status'] ?? 'success';
            $payload     = $resultData['data'] ?? $resultData;

            return $this->respondSuccess($payload, $result['fromCache'], '', 200, $statusLabel);
        } catch (\Throwable $e) {
            $this->logException('repayment', $e, $userId, ['strategy' => $strategy]);
            return $this->respondFailure('Failed to generate repayment snapshot.', 500, [], 'degraded');
        }
    }

    public function categories()
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] categories');
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->respondUnauthorized('User not logged in.');
        }

        $from    = $this->request->getGet('from');
        $to      = $this->request->getGet('to');
        $page    = max(1, (int) ($this->request->getGet('page') ?? 1));
        $perPageRaw = (int) ($this->request->getGet('perPage') ?? 25);
        $perPage = $perPageRaw > 0 ? min(100, $perPageRaw) : 25;

        try {
            $service = $this->getBudgetService();
            $period  = $service->resolvePeriodWindow($from, $to);
            $context = [
                'from'    => $period['from']->toDateString(),
                'to'      => $period['to']->toDateString(),
                'page'    => $page,
                'perPage' => $perPage,
            ];

            $result = $this->rememberUserData(
                'api-categories',
                $userId,
                fn () => $service->buildCategoryVariance($userId, [
                    'from'    => $from,
                    'to'      => $to,
                    'page'    => $page,
                    'perPage' => $perPage,
                ]),
                $context
            );

            $resultData  = $result['data'] ?? [];
            $statusLabel = $resultData['status'] ?? 'success';
            $payload     = $resultData['data'] ?? $resultData;

            return $this->respondSuccess($payload, $result['fromCache'], '', 200, $statusLabel);
        } catch (\Throwable $e) {
            $this->logException('categories', $e, $userId, [
                'from'    => $from,
                'to'      => $to,
                'page'    => $page,
                'perPage' => $perPage,
            ]);

            return $this->respondFailure('Failed to build category variance.', 500, [], 'degraded');
        }
    }

    public function transactions()
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] transactions');
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->respondUnauthorized('User not logged in.');
        }

        return $this->respondNotReady(__FUNCTION__, ['userId' => $userId]);
    }

    public function goals()
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] goals');
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->respondUnauthorized('User not logged in.');
        }

        return $this->respondNotReady(__FUNCTION__, ['userId' => $userId]);
    }

    public function insights()
    {
        if ($this->featureGuardResponse instanceof ResponseInterface) {
            return $this->featureGuardResponse;
        }
        log_message('debug', '[BudgetController::METHOD_ENTRY] insights');
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->respondUnauthorized('User not logged in.');
        }

        return $this->respondNotReady(__FUNCTION__, ['userId' => $userId]);
    }

    public function trends()
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] trends');
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->respondUnauthorized('User not logged in.');
        }

        return $this->respondNotReady(__FUNCTION__, ['userId' => $userId]);
    }

    public function netWorth()
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] netWorth');
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->respondUnauthorized('User not logged in.');
        }

        return $this->respondNotReady(__FUNCTION__, ['userId' => $userId]);
    }

    public function cashFlow()
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] cashFlow');
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->respondUnauthorized('User not logged in.');
        }

        return $this->respondNotReady(__FUNCTION__, ['userId' => $userId]);
    }

    public function budgets()
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] budgets');
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->respondUnauthorized('User not logged in.');
        }

        return $this->respondNotReady(__FUNCTION__, ['userId' => $userId]);
    }

    public function savingsGoals()
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] savingsGoals');
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->respondUnauthorized('User not logged in.');
        }

        return $this->respondNotReady(__FUNCTION__, ['userId' => $userId]);
    }

    public function investmentAccounts()
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] investmentAccounts');
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->respondUnauthorized('User not logged in.');
        }

        return $this->respondNotReady(__FUNCTION__, ['userId' => $userId]);
    }

    public function linkedAccounts()
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] linkedAccounts');
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->respondUnauthorized('User not logged in.');
        }

        return $this->respondNotReady(__FUNCTION__, ['userId' => $userId]);
    }

    public function addLinkedAccount()
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] addLinkedAccount');
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->respondUnauthorized('User not logged in.');
        }

        return $this->respondNotReady(__FUNCTION__, ['userId' => $userId]);
    }

    public function removeLinkedAccount(string $accountKey)
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] removeLinkedAccount');
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->respondUnauthorized('User not logged in.');
        }

        return $this->respondNotReady(__FUNCTION__, [
            'userId'     => $userId,
            'accountKey' => $accountKey,
        ]);
    }

    public function refreshLinkedAccount(string $accountKey)
    {
        log_message('debug', '[BudgetController::METHOD_ENTRY] refreshLinkedAccount');
        $userId = $this->resolveAuthenticatedUserId();
        if ($userId === null) {
            return $this->respondUnauthorized('User not logged in.');
        }

        return $this->respondNotReady(__FUNCTION__, [
            'userId'     => $userId,
            'accountKey' => $accountKey,
        ]);
    }
    
    public function forecastBudget($accountId) {
        log_message('debug', '[BudgetController::METHOD_ENTRY] forecastBudget');
        // Fetch account details using the model
        $account = $this->budgetModel->getAccountInformation($accountId);
    
        if ($account) {
            $recurringSchedule = $account['recurring_schedule'];
            $designatedDate = $account['designated_date'];
            $userId = $account['created_by'];
    
            // Generate forecast using the BudgetService
            $forecast = $this->getBudgetService()->forecastRecurringSchedule($recurringSchedule, $designatedDate);
    
            // Save forecast using the model
            foreach ($forecast as $date) {
                $this->budgetModel->saveForecast($userId, $accountId, $date, $recurringSchedule);
            }
        } else {
            log_message('error', 'Account not found for forecasting. Account ID: ' . $accountId);
        }
    }    
    
    

    // public function add()
    public function history($type = null) {
        log_message('debug', '[BudgetController::METHOD_ENTRY] history');
        // Site settings and user data
        $this->data['pageTitle'] = 'Account Details & History | MyMI Wallet | The Future of Finance';

        $userId = $this->resolveCurrentUserId();
        $this->data['getUserBankAccounts']   = $userId ? $this->accountsModel->getUserBankAccounts($userId)   : [];
        $this->data['getUserCreditAccounts'] = $userId ? $this->accountsModel->getUserCreditAccounts($userId) : [];
        $common = $this->ensureCommonDataReady();
        if ($common instanceof ResponseInterface) {
            return $common;
        }
        return $this->renderTheme('App\Modules\User\Views\Budget\History', $this->data);
    }

    public function paid($accountID) {
        log_message('debug', '[BudgetController::METHOD_ENTRY] paid');
        if ($this->getBudgetService()->markAsPaid($accountID)) {
            session()->setFlashdata('message', 'Account status changed to: "Paid"');
            return redirect()->back()->withInput()->with('message', 'Account status changed to: "Paid"');
        } else {
            session()->setFlashdata('message', 'Account could not be updated.');
            return redirect()->back()->withInput()->with('message', 'Account could not be updated.');
        }
    }

    public function recurringSchedule($accountID = null) {
        log_message('debug', '[BudgetController::METHOD_ENTRY] recurringSchedule');
        log_message('debug', 'BudgetController::recurringSchedule  L531 - Recurring Schedule - Start processing for Account ID: ' . $accountID);
    
        $common = $this->ensureCommonDataReady();
        if ($common instanceof ResponseInterface) {
            return $common;
        }
        $accountDetails = $this->getBudgetService()->getRecurringAccountInfo($this->cuID, $accountID);
        log_message('debug', 'BudgetController::recurringSchedule  - Account Details Retrieved: ' . print_r($accountDetails, true));
        
    
        if (!$accountDetails || empty($accountDetails['accountInfo'])) {
            log_message('error', 'Account not found or details are empty for Account ID: ' . $accountID);
            return redirect()->to('/Budget')->with('error', 'Account not found.');
        }
    
        log_message('debug', 'BudgetController::recurringSchedule - Account Details: ' . print_r($accountDetails, true));
    
        $accountInfo = $accountDetails['accountInfo'];
        $recurringSchedule = $accountDetails['recurring_schedule'] ?? [];
    
        log_message('debug', 'BudgetController::recurringSchedule L567 - Recurring Schedule - Generated Schedule: ' . print_r($recurringSchedule, true));
    
        $this->data['recurringSchedule'] = $recurringSchedule;
        $this->data['accountInfo'] = $accountInfo;
        $this->data['accountID'] = $accountID;
        $this->data['pageTitle'] = 'Recurring Schedule Review';
    
        log_message('debug', 'BudgetController::recurringSchedule L574 - Recurring Schedule - Data prepared for view.');
    
        return $this->renderTheme('App\Modules\User\Views\Budget\Recurring_Account\Schedule', $this->data);
    }
    
    
    // public function recurringSchedule($accountID = null) {
    //     $uri = $this->request->getUri();
    //     $accountDetails = $this->getBudgetService()->getRecurringAccountInfo($this->cuID, $accountID);
        
    //     // Log the data for debugging purposes
    //     log_message('debug', 'Recurring Account Data: ' . print_r($accountDetails, true));
        
    //     // Ensure that 'recurring_schedule' exists before trying to use it
    //     $recurringSchedule = $accountDetails['recurring_schedule'] ?? [];
    
    //     // Prepare view data
    //     $this->data['pageTitle'] = 'Create Recurring Schedule | MyMI Wallet | The Future of Finance';
    //     $this->data['recurringSchedule'] = $recurringSchedule;
    //     $this->data['accountInfo'] = $accountDetails['accountInfo'];
    
    //     $this->commonData();
    //     return $this->renderTheme('App\Modules\User\Views\Budget\Recurring_Account\Schedule', $this->data);
    // }

    // public function add()
    public function settings($type = null) {
        log_message('debug', '[BudgetController::METHOD_ENTRY] settings');
        $uri                                        = $this->request->getUri(); 
        // Determine budget type from URL segment or parameter
        $budgetType                                 = $uri->getSegment(3) ?? $type; 
    
        // Initialize settings data array, which will hold all the settings related to the specific budget type
        $settingsData                               = [];
    
        switch ($budgetType) {
            case 'Income':
                $settingsData = [
                    'primaryIncomeSource'           => '', // e.g., 'Employment'
                    'incomeFrequency'               => '', // e.g., 'Monthly'
                    'automaticIncomeTracking'       => false,
                    'incomeNotifications'           => false,
                    'incomeCategories'              => [],
                    'taxWithholdingPreferences'     => false,
                ];
                break;
    
            case 'Expenses':
                $settingsData = [
                    'expenseTrackingMode'           => '', // e.g., 'Automatic'
                    'monthlyBudgetLimit'            => 0,
                    'criticalExpenseAlerts'         => false,
                    'recurringExpenses'             => [],
                    'expenseCategories'             => [],
                    'savingsGoals'                  => [],
                ];
                break;
    
            case 'Credit':
            case 'Debt': // Assuming Credit and Debt have similar settings
                $settingsData = [   
                    'debtRepaymentStrategy'         => '', // e.g., 'Snowball'
                    'creditUtilizationAlert'        => false,
                    'automaticPaymentReminders'     => false,
                    'interestRateTracking'          => false,
                    'creditScoreMonitoring'         => false,
                    'debtFreeGoalDate'              => '',
                ];
                break;
    
            case 'Investments':
                $settingsData = [
                    'riskToleranceProfile'          => '', // e.g., 'Moderate'
                    'automaticInvestment'           => false,
                    'investmentPortfolioOverview'   => [],
                    'dividendReinvestment'          => false,
                    'performanceAlerts'             => false,
                    'taxLossHarvestingPreferences'  => false,
                ];
                break;
    
            default:
                // Redirect or show error if budgetType is not recognized
                log_message('error', 'BudgetController L245 - $budgetType: ' . $budgetType);
                return redirect()->back()->with('error', 'Invalid budget type specified.');
        }
    
        // Load common data and settings specific to the budget type
        $this->data['pageTitle']                    = 'Budget Settings | MyMI Wallet | The Future of Finance';
        $this->data['budgetType']                   = $budgetType;
        $this->data['settingsData']                 = $settingsData;        
    
        $common = $this->ensureCommonDataReady();
        if ($common instanceof ResponseInterface) {
            return $common;
        }
        return $this->renderTheme('App\Modules\User\Views\Budget\Settings', $this->data);
    }

    public function unpaid($accountID) {
        log_message('debug', '[BudgetController::METHOD_ENTRY] unpaid');
        if ($this->getBudgetService()->markAsUnpaid($accountID)) {
            session()->setFlashdata('message', 'Account status changed to: "Unpaid"');
            return redirect()->back()->withInput()->with('message', 'Account status changed to: "Unpaid"');
        } else {
            session()->setFlashdata('message', 'Account could not be updated.');
            return redirect()->back()->withInput()->with('message', 'Account could not be updated');
        }
    }

    /**
     * Safely formats a date string into a specific format.
     *
     * @param string $dateString The date string to format.
     * @param string $format The desired date format (default is 'm/d/Y').
     * @return string|null The formatted date string or null if invalid.
     */
    private function safeDateFormat($dateString, $format = 'm/d/Y') {
        try {
            $date = \DateTime::createFromFormat($format, $dateString);
            if ($date && $date->format($format) === $dateString) {
                return $date->format($format);  // Return the formatted date if valid
            }
            return null;  // Return null for invalid dates
        } catch (\Exception $e) {
            return null;  // Return null in case of any parsing exception
        }
    }

}
?>
