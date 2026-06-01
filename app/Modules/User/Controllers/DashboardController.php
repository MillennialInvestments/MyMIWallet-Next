<?php namespace App\Modules\User\Controllers;

use App\Controllers\BaseUserController;

use Config\Services;
use Config\{Auth, SiteSettings, SocialMedia};
use App\Libraries\{MyMIAlerts, MyMIAnalytics, MyMIAssistant, MyMIBudget, MyMICoin, MyMIDashboard, MyMIExchange, MyMIGold, MyMIInvestments, MyMIMarketing, MyMIOnboarding, MyMIProjects, MyMISolana, MyMIUser, MyMIWallet, MyMIWallets};
use App\Models\{AccountsModel, AlertsModel, DashboardModel, DiscordLinkModel, MarketingModel, SolanaModel, UserModel};
use App\Services\{AccountCompletionService, AccountService, BudgetService, DashboardService, EmailService, OnboardingProgressService, SolanaService, UserService};
use App\Services\Ops\EnvDoctorService;
use CodeIgniter\API\ResponseTrait;
use Myth\Auth\Authorization\GroupModel;
use DateTime;
use Psr\Log\LoggerInterface;

#[\AllowDynamicProperties]
class DashboardController extends BaseUserController
{
    use ResponseTrait;
    protected $auth;
    protected $session;
    protected $siteSettings;
    protected $uri;
    protected $logger;
    // Primary Model
    protected $dashboardModel;

    // Supportive Models
    protected $accountsModel;
    protected $alertsModel;
    protected $marketingModel;
    protected $userModel;

    protected $accountService;
    protected $budgetService;
    protected $dashboardService;
    protected $emailService;
    protected $solanaService;
    protected $userService;
    protected ?MyMIInvestments $MyMIInvestments = null;
    protected array $requestCache = [];

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->auth = service('authentication');
        $this->session = Services::session();
        $this->request = service('request');
        $this->siteSettings = config('SiteSettings');
        $this->debug = $this->siteSettings->debug;
        $this->uri = $this->request->getUri();
        $this->logger = service('logger');

        $this->alertsModel = new AlertsModel();
        $this->dashboardModel = new DashboardModel();
        $this->userModel = new UserModel();

        $this->accountService = new AccountService();
        $this->budgetService = new BudgetService();
        $this->dashboardService = new DashboardService();
        $this->emailService = new EmailService();
        $this->solanaService = new SolanaService();

        $this->MyMIInvestments = $this->getMyMIInvestments();

        $this->cuID = $this->auth->id() ?? $this->session->get('user_id');
    }

    public function commonData(): array
    {
        $this->data = parent::commonData();
        $cuID      = (int)($this->cuID ?? session('cuID') ?? session('user_id') ?? 0);

        if ($cuID <= 0) {
            log_message('debug', 'DashboardController::commonData guest context; skipping authenticated data hydration.');
            return $this->data;
        }

        $this->userService = new UserService($this->siteSettings, $cuID, $this->request);
        $userData          = $this->userService->commonData();
        $this->data        = array_merge($this->data, $userData);

        $this->data['siteSettings'] = $this->siteSettings;
        $this->data['debug'] = (string)$this->siteSettings->debug;
        $this->data['uri'] = $this->uri;
        $this->data['request'] = $this->request;
        $this->data['cuID'] = $this->cuID;     

        $userBudget = $this->getMyMIBudget()->getUserBudget($cuID) ?? [];
        $checkingSummary = (float) ($userBudget['checkingSummary'] ?? 0.0);
        log_message('info', 'DashboardController L72 - $checkingSummary: {value}', ['value' => $checkingSummary]);
        $this->data['checkingSummary'] = $checkingSummary;
        $this->data['checkingSummaryFMT'] = $userBudget['checkingSummaryFMT'] ?? '$0.00';
        // Other Budget-related data
        $creditAccounts = $this->getAccountService()->getUserCreditAccounts($cuID);
        $debtAccounts = $this->getAccountService()->getUserDebtAccounts($cuID);
        $repaymentSummary = $this->getBudgetService()->getRepaymentSummary($cuID);
        $repaymentSchedules = $this->getBudgetService()->calculateRepaymentSchedules($creditAccounts);
        $currentBalances = $this->getBudgetService()->getCurrentBalances($creditAccounts);
        $availableBalances = $this->getBudgetService()->getAvailableBalances($repaymentSchedules);
        $totalAvailableBalance = $this->getBudgetService()->getTotalAvailableBalance($debtAccounts);
        $this->data['userBudget'] = $this->getBudgetService()->getUserBudget($cuID);
        $this->data['userBudgetRecords'] = $this->getBudgetService()->getUserBudgetRecords($cuID);
        $this->data['currentBalances'] = $currentBalances;
        $this->data['availableBalances'] = $availableBalances;
        $this->data['totalAvailableBalance'] = $totalAvailableBalance;
        $this->data['repaymentSummary'] = $repaymentSummary;
        $this->data['repaymentSchedules'] = $repaymentSchedules;
        $budgetInfo = $this->getMyMIBudget()->allUserBudgetInfo($cuID);

        $dashboardInfo = $this->getMyMIDashboard()->dashboardInfo($cuID);
        $this->data['completedGoals'] = $dashboardInfo['progressGoalData']['completions'];
        $this->data['pendingGoals'] = $dashboardInfo['progressGoalData']['goals'];
        $this->data['promotionalBanners'] = $dashboardInfo['promotionalBanners'];

        $userInfo = $this->getMyMIUser()->getUserInformation($cuID);
        $this->data['cuWalletID'] = $userInfo['cuWalletID'];
        $this->data['cuRole'] = $userInfo['cuRole'] ?? 4;
        $this->data['cuUserType'] = $userInfo['cuUserType'] ?? '';
        $this->data['cuEmail'] = $userInfo['cuEmail'] ?? '';
        $this->data['cuDisplayName'] = $userInfo['cuDisplayName'] ?? '';
        $this->data['cuUsername'] = $userInfo['cuUsername'] ?? '';
        $this->data['cuNameInitials'] = $userInfo['cuNameInitials'] ?? '';
        $this->data['cuKYC'] = $userInfo['cuKYC'] ?? '';
        $this->data['cuWalletCount'] = $userInfo['cuWalletCount'];
        $this->data['MyMIGCoinSum'] = $userInfo['MyMIGCoinSum'];
        $this->data['walletID'] = $userInfo['walletID'];

        /** @var OnboardingProgressService $onboardingProgress */
        $onboardingProgress = service('onboardingProgressService');
        $progressPayload = $onboardingProgress->computeProgress($cuID);
        $this->data['onboardingProgress'] = $progressPayload;
        $this->data['onboardingIncomplete'] = ! ($progressPayload['isComplete'] ?? false);
        $this->data['sourceAwareWelcome'] = $onboardingProgress->getSourceAwareWelcomeState($cuID);

        /** @var AccountCompletionService $accountCompletion */
        $accountCompletion = service('accountCompletionService');
        $this->data['accountCompletion'] = $accountCompletion->evaluate((int) $cuID);

        try {
            $this->data['opsHealth'] = (new EnvDoctorService())->latestSummary();
        } catch (\Throwable $e) {
            log_message('warning', 'DashboardController opsHealth unavailable: {msg}', ['msg' => $e->getMessage()]);
            $this->data['opsHealth'] = null;
        }

        try {
            $this->data['emailAuditHealth'] = $this->loadEmailScraperAuditHealth();
        } catch (\Throwable $e) {
            log_message('warning', 'DashboardController emailAuditHealth unavailable: {msg}', ['msg' => $e->getMessage()]);
            $this->data['emailAuditHealth'] = null;
        }

        if ($this->session->get('onboarding_show_modal')) {
            $this->data['onboardingShowModal'] = true;
            $this->session->remove('onboarding_show_modal');
            service('eventTracker')->track('setup.guided_open', [], (int) $cuID, 'onboarding');
            log_message('info', 'DashboardController: onboarding walkthrough modal triggered for user_id={id}', [
                'id' => $cuID,
            ]);
        } else {
            $this->data['onboardingShowModal'] = false;
        }

        $userSolanaData = $this->getSolanaService()->getSolanaData($cuID);
        $addrRow = model(\App\Models\SolanaModel::class)->getDefaultAddressFromExchangeTable($cuID);
        $base58Address = $addrRow['address'] ?? null;

        // Make it available to the view (and copy to session for modals)
        if ($base58Address) {
            $this->session->set('solana_public_key', $base58Address);
        }

        // If you already build $cuSolanaDW for the view, inject address there:
        if (is_array($cuSolanaDW ?? null)) {
            $cuSolanaDW['address'] = $base58Address;     // <<< view can now show/copy address
        } else {
            $cuSolanaDW = ['address' => $base58Address];
        }

        // Then pass $cuSolanaDW to the view like you already do in $data
        $data['cuSolanaDW'] = $cuSolanaDW;        // Ensure Solana network status exists to avoid "Undefined array key"
        try {
            $svc = $this->solanaService instanceof SolanaService ? $this->solanaService : (service('solanaService') ?: null);
            if ($svc instanceof SolanaService) {
                $data['solanaNetworkStatus'] = $svc->getSafeNetworkStatus();
                $this->solanaService = $svc;
            } else {
                log_message('info', 'DashboardController getNetworkStatus skipped: SolanaService not configured; returning offline');
                $data['solanaNetworkStatus'] = ['healthy' => false, 'status' => 'offline', 'degraded' => true];
            }
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController getNetworkStatus failed: {msg}', ['msg' => $e->getMessage()]);
            $data['solanaNetworkStatus'] = [
                'healthy' => false,
                'slot'    => null,
                'version' => null,
                'error'   => $e->getMessage(),
            ];
        }
        $this->data['cuSolanaTotal'] = $userSolanaData['userSolanaWallets']['cuSolanaTotal'] ?? 0;
        $this->data['cuSolanaValue'] = $userSolanaData['userSolanaWallets']['cuSolanaValue'] ?? 0;

        // Segment-based Dynamic Logic for Investments
        if ($this->uri->getTotalSegments() >= 3) {
            $pageURIC = $this->uri->getSegment(3);
            if ($pageURIC === 'Alerts') {
                $pageURID = $this->uri->getSegment(4); 
                if ($pageURID === 'addChart') {
                    log_message('debug', 'DashboardController L159 - $this->uri->getSegment(6): ' . $this->uri->getSegment(6)); 
                    $tradeAlertID = $this->uri->getSegment(6); 
                    $this->data['tradeAlertID'] = $tradeAlertID;
                    $this->data['getAlertInfo'] = $this->alertsModel->getAlertById($tradeAlertID); 
                }

                if ($pageURID === 'createTradeAlert') {
                    $tradeAlertID = $this->uri->getSegment(5); // May be null for new alerts
                    log_message('info', 'DashboardController L138 - $tradeAlertID: ' . $tradeAlertID); 
                    if (!isset($this->alertsModel)) {
                        $this->alertsModel = new AlertsModel();
                    }
                
                    if (!empty($tradeAlertID)) {
                        // Existing Trade Alert
                        $alertData = $this->alertsModel->getAlertById($tradeAlertID);
                
                        if ($alertData) {
                            $this->data['alert'] = $alertData;
                            $this->data['tradeAlertID'] = $tradeAlertID;
                            $this->data['formMode'] = 'Update';
                        } else {
                            log_message('error', "Trade Alert ID $tradeAlertID not found.");
                            return redirect()->to('/dashboard')->with('error', 'Trade alert not found.');
                        }
                    } else {
                        // 🔄 New Trade Alert Flow
                        $this->data['alert'] = [
                            'formMode' => 'Add',
                            'ticker' => '',
                            'price' => '',
                            'sentiment' => '',
                            'strategy' => '',
                            'note' => '',
                            'chart_link' => '',
                            'analysis_summary' => '',
                            'status' => 'Draft',
                            'ema_9'   => '',
                            'ema_21'  => '',
                            'ema_34'  => '',
                            'ema_48'  => '',
                            'ema_100' => '',
                            'ema_200' => '',
                            'locked_profit_stop' => '',
                            'trailing_stop_percent' => '',
                        ];
                        $this->data['tradeAlertID'] = null;
                        log_message('info', 'DashboardController - Initializing new trade alert entry.');
                    }
                }
                

                if ($pageURID === 'manageTradeAlert') {
                    $tradeAlertID = $this->uri->getSegment(5); 
                    
                    if (!isset($this->alertsModel)) {
                        $this->alertsModel = new AlertsModel(); 
                    }

                    if (!empty($tradeAlertID)) {
                        $alertData = $this->alertsModel->getAlertById($tradeAlertID); 
            
                        if ($alertData) {
                            if ($alertData['ticker']) {
                                $this->data['alertHistory'] = $this->alertsModel->fetchAlertHistory($alertData['ticker']) ?? []; 
                            } 
                            $this->data['alert'] = $alertData;
                            $this->data['tradeAlertID'] = $tradeAlertID;
                        } else {
                            log_message('error', "Trade Alert ID $tradeAlertID not found.");
                            return redirect()->to('/dashboard')->with('error', 'Trade alert not found.');
                        }
                    }
                }
            
                if ($pageURID === 'View') {
                    $pageURIE = $this->uri->getSegment(4); 
                    if ($pageURIE === 'alertDetails') {
                        $tradeAlertID = $this->uri->getSegment(5); 
                        $this->data['tradeAlertID'] = $tradeAlertID;
                        $this->data['getAlertInfo'] = $MyMIAlerts->getTradeAlertInfo($tradeAlertID); 
                    }
                    if ($pageURIE === 'viewChart') {
                        $tradeAlertID = $this->uri->getSegment(6); 
                        $this->data['tradeAlertID'] = $tradeAlertID;
                        $this->data['getAlertInfo'] = $MyMIAlerts->getTradeAlertInfo($tradeAlertID);
                    }
                }
            } elseif ($pageURIC === 'Budget') {
                $this->accountsModel                                = new AccountsModel();
                $this->budgetService                                = new BudgetService();
                $pageURID = $this->uri->getSegment(4);
                if ($pageURID === 'View') {
                    $pageURIF = $this->uri->getSegment(6); 
                    if ($pageURIF === 'History') {                     
                        // Hydrate necessary data for the modal here
                        $budgetService = $this->getBudgetService();
                        $modalBudget   = $budgetService->getUserBudget($this->cuID) ?? [];
                        $this->data['userBudget'] = $modalBudget;
                        $this->data['userBudgetRecords'] = $budgetService->getUserBudgetRecords($this->cuID);
                        $this->data['repaymentSchedules'] = $budgetService->calculateRepaymentSchedules(
                            $this->getAccountService()->getUserCreditAccounts($this->cuID)
                        );
                        $this->data['checkingSummary'] = (float) ($modalBudget['checkingSummary'] ?? 0.0);
                        $this->data['checkingSummaryFMT'] = $modalBudget['checkingSummaryFMT'] ?? '$0.00';
                        $this->data['creditSummary'] = $this->getAccountService()->getCreditAvailable($this->cuID);
                    }
                }
            
            } elseif ($pageURIC === 'Campaign') {
            } elseif ($pageURIC === 'Drip-Campaign') {                
                $this->marketingModel = new MarketingModel();
                $pageURID = $this->uri->getSegment(4);
                $campaignID = $this->uri->getSegment(5);

                if (!isset($this->marketingModel)) {
                    $this->marketingModel = new \App\Models\MarketingModel(); // ✅ Use your existing MarketingModel
                }

                // View/Edit/Generate Campaign Content
                if (in_array($pageURID, ['viewCampaign', 'editCampaign', 'generateCampaignContent'])) {
                    if (!empty($campaignID)) {
                        $campaign = $this->marketingModel->getDripCampaignById($campaignID);
                        $steps = $this->marketingModel->getDripCampaignStepsById($campaignID);
                        $generatedContent = $this->marketingModel->getGeneratedContentByCampaign($campaignID);
                        $generatedStepContent = $this->marketingModel->getGeneratedContentByStep($campaignID);

                        log_message('info', 'User/DashboardController L231 - $generatedContent Array: ' . (print_r($generatedContent, true)));
                        log_message('info', 'User/DashboardController L232 - $generatedStepContent Array: ' . (print_r($generatedStepContent, true)));
                        if ($campaign) {
                            $this->data['pageType'] = 'Campaign'; 
                            $this->data['dripCampaign'] = $campaign;
                            $this->data['dripCampaignSteps'] = $steps;
                            $this->data['generatedContent'] = $generatedContent[0] ?? null;
                            $this->data['generatedStepContent'] = $generatedStepContent[0] ?? null;
                        } else {
                            log_message('error', '❌ Drip campaign not found for ID: ' . $campaignID);
                        }
                    }
                }                
                if (in_array($pageURID, ['viewCampaignStep', 'editCampaignStep', 'generateCampaignStepContent'])) {
                    if (!empty($campaignID)) {
                        $stepID = $campaignID; 
                        log_message('info', 'User/DashboardController L246 - $stepID: ' . $stepID);
                        $step = $this->marketingModel->getDripCampaignStepsById($stepID);
                        $campaign = $this->marketingModel->getDripCampaignById($campaignID);
                        // $steps = $this->marketingModel->getDripCampaignStepsByCampaignId($campaignID);
                        $generatedContent = $this->marketingModel->getGeneratedContentByCampaign($campaignID);
                        $generatedStepContent = $this->marketingModel->getGeneratedContentByStep($campaignID);

                        log_message('info', 'User/DashboardController L231 - $generatedContent Array: ' . (print_r($generatedContent, true)));
                        log_message('info', 'User/DashboardController L232 - $generatedStepContent Array: ' . (print_r($generatedStepContent, true)));
                        if ($campaign) {
                            $this->data['pageType'] = 'Step'; 
                            $this->data['dripCampaign'] = $campaign;
                            $this->data['dripCampaignStep'] = $step;
                            $this->data['generatedContent'] = $generatedContent[0] ?? null;
                            $this->data['generatedStepContent'] = $generatedStepContent[0] ?? null;
                        } else {
                            log_message('error', '❌ Drip campaign not found for ID: ' . $campaignID);
                        }
                    }
                }

                // Generate Campaign Step Content
                if ($pageURID === 'generateCampaignStepContent') {
                    $stepID = $this->uri->getSegment(5);
                    if (!empty($stepID)) {
                        $campaign = $this->marketingModel->getDripCampaignById($campaignID);
                        $steps = $this->marketingModel->getDripCampaignStepsById($campaignID);
                        $generatedContent = $this->marketingModel->getGeneratedContentByCampaign($campaignID);
                        $generatedStepContent = $this->marketingModel->getGeneratedContentByStep($campaignID);
                        if ($step) {
                            $this->data['dripCampaign'] = $campaign;
                            $this->data['dripCampaignSteps'] = $steps;
                            $this->data['generatedContent'] = $generatedContent;
                            $this->data['generatedStepContent'] = $generatedStepContent;
                        } else {
                            log_message('error', '❌ Drip campaign step not found for ID: ' . $stepID);
                        }
                    }
                }

                $this->data['dripViewMode'] = $pageURID; // Useful for modal/view logic
            } elseif ($pageURIC === 'Email') {
                if ($endpoint === 'createList') {
                    // No extra data needed for Create List
                } elseif ($endpoint === 'addMember') {
                    $this->data['lists']                            = $this->emailService->getActiveLists();
                } elseif ($endpoint === 'sendCampaign') {
                    $this->data['lists']                            = $this->emailService->getActiveLists();
                    $this->data['campaigns']                        = $this->emailService->getAvailableCampaigns(); // We'll add getAvailableCampaigns() next
                }
            } elseif ($pageURIC === 'Investments') {
                if (! ($this->MyMIInvestments instanceof MyMIInvestments)) {
                    $this->MyMIInvestments = $this->getMyMIInvestments();
                }

                if (! ($this->MyMIInvestments instanceof MyMIInvestments)) {
                    log_message(
                        'error',
                        'DashboardController::commonData getInvestmentDashboard failed: MyMIInvestments is null for user {id}',
                        ['id' => $this->cuID ?? null]
                    );

                    $this->data['investDashboard'] = [
                        'status'             => 'Unavailable',
                        'message'            => 'Investment dashboard is temporarily unavailable.',
                        'investmentOverview' => [],
                    ];
                    $this->data['investmentDashboardUnavailable'] = true;

                    return $this->data;
                }
                
//                 $this->MyMIInvestments                              = new MyMIInvestments(); // replaced by BaseController getter
                $this->accountsModel                                = new AccountsModel();
                $this->data['investDashboard']                      = $this->MyMIInvestments->getInvestmentDashboard($this->cuID);
                $this->data['userInvestmentWallets']                = $this->accountsModel->getUserInvestAccounts($this->cuID);

                $investmentType                                     = $this->uri->getSegment(4);
                $subViewFile                                        = '';
                $subViewDirectory                                   = 'UserModule\Views\\';
                switch ($investmentType) {
                    case 'addBondTrade':
                        $subViewTitle                               = 'Add Bond Investment';
                        $subViewFile                                = 'Investments\Add\stock_fields';
                        $tradeType                                  = 'Bond';
                        $includeDateTime                            = 1;
                        $includeWallets                             = 1;
                        break;
                    case 'addCryptoTrade':
                        $subViewTitle                               = 'Add Crypto Investment';
                        $subViewFile                                = 'Investments\Add\crypto_fields';
                        $tradeType                                  = 'Crypto';
                        $includeDateTime                            = 1;
                        $includeWallets                             = 1;
                        break;
                    case 'ETF':
                        $subViewTitle                               = 'Add ETF Investment';
                        $subViewFile                                = 'Investments\Add\ETF_fields';
                        $tradeType                                  = 'ETF';
                        $includeDateTime                            = 1;
                        $includeWallets                             = 1;
                        break;
                    case 'Forex':
                        $subViewTitle                               = 'Add Forex Investment';
                        $subViewFile                                = 'Investments\Add\forex_fields';
                        $tradeType                                  = 'Forex';
                        $includeDateTime                            = 1;
                        $includeWallets                             = 1;
                        break;
                    case 'Real-Estate':
                        $subViewTitle                               = 'Add Real Estate Investment';
                        $subViewFile                                = 'Investments\Add\stock_fields';
                        $tradeType                                  = 'Real Estate';
                        $includeDateTime                            = 1;
                        $includeWallets                             = 1;
                        break;
                    case 'addStockTrade':
                        $subViewTitle                               = 'Add Stock Investment';
                        $subViewFile                                = 'Investments\Add\stock_fields';
                        $tradeType                                  = 'Stock';
                        $includeDateTime                            = 1;
                        $includeWallets                             = 1;
                        break;
                    case 'addWatchlist':
                        $subViewTitle                               = 'Add Asset To Watchlist';
                        $subViewFile                                = 'Investments\Add\watchlist_fields';
                        $tradeType                                  = 'Watchlist';
                        $includeDateTime                            = 0;
                        $includeWallets                             = 0;
                        break;
                    // Add more investment cases as needed
                }
                $this->data['includeDateTime']                      = $includeDateTime; 
                $this->data['includeWallets']                       = $includeWallets; 
                $this->data['tradeType']                            = $tradeType;
                $this->data['subViewTitle']                         = $subViewTitle;
                $this->data['subViewFile']                          = $subViewDirectory . $subViewFile;
            } elseif ($pageURIC === 'Marketing') { // Segment-based Dynamic Logic for Marketing
                
                if (!isset($this->marketingModel)) {
                    $this->marketingModel = new MarketingModel();
                }
                // $this->MyMIMarketing                        = service('MyMIMarketing');
                $this->data['recentMarketingPosts']         = $this->getMyMIMarketing()->getRecentPosts(10);

                $this->data['managementTeam']               = $this->getMyMIMarketing()->getManagementTeam(); 
                if (!empty($this->uri->getSegment(4))) {
                    $pageURID                               = $this->uri->getSegment(4);
                    if ($pageURID === 'addCampaign') {
                    } elseif($pageURID === 'viewCampaign') {
                        if (!empty($this->uri->getSegment(5))) {
                            $campaignID                     = $this->uri->getSegment(5);
                            $this->data['campaignInfo']     = $this->getMyMIMarketing()->getCampaignByID($campaignID);
                            if (!$this->data['campaignInfo']) {
                                log_message('error', 'No campaign info found for ID: ' . $campaignID);
                            }                            
                        }
                    } elseif ($pageURID === 'addIdea') {
                    } elseif ($pageURID === 'addSchedule') {
                        $viewPath                           = 'ManagementModule\Views\Marketing\Schedule\Add';
                        return $this->renderTheme($viewPath, $this->data);
                    } elseif ($pageURID === 'generateContent') {
                        $category                           = $this->uri->getSegment(6) ?? 'default';
                        if ($category === 'Solana') {
                            $this->solanaModel              = new SolanaModel();
                            $tokenInfo                      = $this->solanaModel->getTokenInfoByID($this->uri->getSegment(5));
                        } else {
                            $tokenInfo                      = [];
                        }
                        if (!empty($tokenInfo)) {
                            $scrapedData                    = $this->getMyMIMarketing()->scrapeTokenContent($tokenInfo);
                            $generatedData                  = $this->getMyMIMarketing()->generateContentFromScrapedData($scrapedData, $this->uri->getSegment(7) ?? 'default');
                            $this->data['generatedData']    = $generatedData;
                            $viewPath                       = 'ManagementModule\Views\Marketing\Promote\\' . $category . '\Generate_Content';
                            return $this->renderTheme($viewPath, $this->data);
                        } else {
                            return "Token information is not available.";
                        }
                    } elseif ($pageURID === 'generatePostMedia' || $pageURID === 'previewGeneratedPost') {
                        $accountID = $this->uri->getSegment(5);
                        log_message('info', "DashboardController - $pageURID triggered. \$accountID: {$accountID}");
                    
                        $post = $this->marketingModel->findFinalizedById($accountID);
                        if (!$post) {
                            log_message('error', "❌ {$pageURID}: Post not found for ID {$accountID}");
                            return "Error: Post not found.";
                        }
                    
                        $marketing = service('MyMIMarketing');
                    
                        // Clean, summarize, extract
                        $cleanedSummary = $marketing->cleanHtmlSummaryPreview($post['summary'] ?? '');
                        $sentences = $marketing->splitIntoSentences($cleanedSummary);
                        $topKeywords = $marketing->extractKeywords($sentences);
                        $formatted = esc(format_summary_preview($post['summary'] ?? ''));
                    
                        // Add supplemental data
                        $post['cta'] = $marketing->generateCTA($post['summary'] ?? '');
                        $post['voiceover'] = $post['voice_script'] ?? null;
                    
                        // Pass data to the view
                        $this->data['post'] = $post;
                        $this->data['summary'] = $post['summary'] ?? '';
                        $this->data['formatted_summary'] = $formatted;
                        $this->data['cleaned_summary'] = $cleanedSummary;
                        $this->data['keywords'] = $topKeywords;
                        $this->data['voiceover_url'] = $post['voiceover_url'] ?? null;
                    
                        log_message('debug', "✅ Modal prepared for {$pageURID}: {$accountID}");
                    }
                    
                }
            } elseif ($pageURIC === 'Projects') {
                if(!empty($this->uri->getSegment(4))) {
                    $pageURID = $this->uri->getSegment(4); 
                    if ($pageURID === 'Admin') {
                        if (!empty($this->uri->getSegment(6))) {
                            $pageURIE = $this->uri->getSegment(5); 
                            $pageURIF = $this->uri->getSegment(6); 
                            if ($pageURIF === 'viewProject') { 
                                $getProjectInfo = $this->getMyMIProjects()->getProjectFullDetails($pageURIE); 
                                $projectOwnerID = $getProjectInfo['created_by']; 
                                $getOwnerInfo = $this->getMyMIUser()->getUserInformation($projectOwnerID);
                                log_message('debug', 'DashboardController L250 - $getOwnerInfo Array: ' . (print_r($getOwnerInfo, true)));
                                $this->data['project'] = $getProjectInfo; 
                                $this->data['owner'] = $getOwnerInfo; 
                            }
                        }   
                    }
                }
            } elseif ($pageURIC === 'Solana') {
                log_message('debug', 'DashboardController L285: We are here now!');

            }
        }

        // Set User Goals
        $completedGoals = array_column($this->data['completedGoals'], 'goal_id');
        $nextGoal = null;
        foreach ($completedGoals as $goal) {
            if (!in_array($goal, $completedGoals)) {
                $nextGoal = $goal;
                break;
            }
        }
        $this->data['userNextGoal'] = $nextGoal ?? ['gold_reward' => 0];
        return $this->data;
}
    
    private function resolveCuID(?int $cuID): ?int
    {
        if (!empty($cuID) && $cuID > 0) return $cuID;
        $session = session();
        $cuID = (int)($session->get('cuID') ?? $session->get('user_id') ?? 0);
        return $cuID > 0 ? $cuID : null;
    }

    /** Canonical address lookup for a user id (session → exchange table), normalized to Base58 */
    private function solanaAddressForUser(?int $cuID = null): ?string
    {
        $svc = service('solanaService');
        if (!$cuID) {
            $cuID = $this->currentUserId();
        }

        // 1) Session
        $addr = session('solana_public_key') ?? null;

        // 2) Exchange table canonical fallback
        if (!$addr) {
            $row = model(\App\Models\SolanaModel::class)->getDefaultAddressFromExchangeTable($cuID);
            $addr = is_array($row) ? ($row['address'] ?? null) : null;
        }

        return is_string($addr) ? $svc->normalizeAddress($addr) : null;
    }

    // Views
    public function index()
    {
        $this->data['pageTitle'] = 'MyMI Dashboard | MyMI Wallet | The Future of Finance';

        // ✅ Resolve active user first
        $activeUserId = (int) ($this->cuID ?? $this->resolveCurrentUserId() ?? 0);
        if ($activeUserId <= 0) {
            // Guest → send them to login or home
            log_message('debug', 'DashboardController::index guest access; redirecting to login.');
            return redirect()->to(site_url('login'));
        }

        log_message('debug', '[DASHBOARD] Enter', [
            'user_id'    => $activeUserId,
            'session_id' => session_id(),
        ]);

        // ✅ Only now build userService/commonData
        // $this->userService = new \App\Services\UserService($this->siteSettings, $activeUserId, $this->request);
        // $userData          = $this->userService->commonData();
        // $this->data        = array_merge(($this->data ?? []), $userData);

        try {
            $summary = $this->getDashboardService()->getExecutiveDashboardSummary($activeUserId);
            $this->data = array_merge($this->data ?? [], $summary);
        } catch (\Throwable $e) {
            log_message('error', 'DashboardController::index failed to load executive summary: {msg}', [
                'msg' => $e->getMessage(),
            ]);
        }

        try {
            $this->data['squeezeHighRiskCount'] = $this->getMyMIInvestments()->getSqueezeHighRiskCount(80, 24);
        } catch (\Throwable $e) {
            log_message('debug', 'DashboardController::index squeeze count unavailable: {msg}', [
                'msg' => $e->getMessage(),
            ]);
            $this->data['squeezeHighRiskCount'] = 0;
        }

        helper(['news']);

        try {
            $marketingModel = model(\App\Models\MarketingModel::class);
            $this->data['dailyNews'] = $marketingModel->getDailyDashboardNews($activeUserId, 5);
        } catch (\Throwable $e) {
            log_message('error', 'DashboardController::index failed to load daily news: {msg}', [
                'msg' => $e->getMessage(),
            ]);
            $this->data['dailyNews'] = [];
        }

        try {
            $alertsModel = model(\App\Models\AlertsModel::class);

            $startOfDay = date('Y-m-d 00:00:00');
            $endOfDay   = date('Y-m-d 23:59:59');

            $this->data['dailyTradeAlerts'] = $alertsModel
                ->where('created_on >=', $startOfDay)
                ->where('created_on <=', $endOfDay)
                ->orderBy('created_on', 'DESC')
                ->findAll(10);
        } catch (\Throwable $e) {
            log_message('error', 'DashboardController::index failed to load trade alerts: {msg}', [
                'msg' => $e->getMessage(),
            ]);
            $this->data['dailyTradeAlerts'] = [];
        }

        try {
            $assistant = new MyMIAssistant();
            $this->data['aiSessionKey'] = $assistant->ensureSessionKey($activeUserId);
            $this->data['aiNotes']      = $assistant->getNotesForUser($activeUserId);
        } catch (\Throwable $e) {
            log_message('error', 'DashboardController::index failed to prep AI session: {msg}', [
                'msg' => $e->getMessage(),
            ]);
            $this->data['aiSessionKey'] = null;
            $this->data['aiNotes']      = [];
        }

        /** @var \App\Services\SetupStatusService $setupService */
        $setupService = service('setupStatusService');
        $this->data['setupStatus'] = $setupService->getSetupStatus($activeUserId);
        $this->data['setupPrefs'] = $setupService->getDismissPreferences($activeUserId);
        $this->data['setupContext'] = 'dashboard';
        $this->data['forecastHeatmapEnabled'] = true;
        $this->data['forecastHeatmapDefaultTimeframe'] = '5m';

        return $this->renderTheme('User/Dashboard/index', $this->data);
    }

    public function getForecastHighlights()
    {
        $forecaster = service('mymiForecaster');
        return $this->respond($forecaster->getForecastHighlights());
    }


    public function account()
    {
        $this->data['pageTitle'] = 'My Account | MyMI Wallet | The Future of Finance';
        $this->userAccountData();
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Dashboard\Account', $this->data);
    }

    public function activity()
    {
        $this->data['pageTitle'] = 'My Activity | MyMI Wallet | The Future of Finance';

        // $this->userModel = new UserModel(); 
        $loginActivity = $this->userModel->getUserLoginActivity($this->cuID);
        $this->data['loginActivity'] = $loginActivity; 
        $this->userAccountData(); 
        $this->commonData(); 
        return $this->renderTheme('App\Modules\User\Views\Dashboard\Account\Activity', $this->data);
    }

    public function billing()
    {
        $this->data['pageTitle'] = 'Billing & Subscriptions | MyMI Wallet | The Future of Finance';
        $this->userAccountData(); 
        $this->commonData(); 
        return $this->renderTheme('App\Modules\User\Views\Dashboard\Account\Billing', $this->data);
    }

    /**
     * 📌 AJAX: Check Onboarding Status for Pop-up Prompt
     */
    public function checkOnboardingStatus()
    {
        $incompleteSteps = $this->MyMIOnboarding->checkOnboardingStatus($this->cuID);
        return $this->response->setJSON(['incomplete' => $incompleteSteps]);
    }

    /**
     * 📌 Mark Onboarding Step as Completed
     * - Updates onboarding step and refreshes view
     */
    public function completeOnboardingStep($step)
    {
        if (!$this->cuID) {
            return redirect()->to('/login');
        }

        $this->MyMIOnboarding->completeStep($this->cuID, $step);
        return redirect()->to('/dashboard/onboarding')->with('success', ucfirst(str_replace('_', ' ', $step)) . ' completed.');
    }

    public function connectedAccounts()
    {
        $this->data['pageTitle'] = 'My Connected Accounts | MyMI Wallet | The Future of Finance';
        $this->userAccountData(); 
        $this->commonData(); 
        return $this->renderTheme('App\Modules\User\Views\Dashboard\Account\ConnectedAccounts', $this->data);
    }

    private function generatePromotionalMessage($formtype, $category, $platform, $tokenInfo)
    {
        $baseMessage = "Check out {$tokenInfo['symbol']} on the MyMI {$tokenInfo['blockchain']} Blockchain!";
        $messages = [];
        switch ($platform) {
            case 'Discord':
                $messages['Discord'] = $baseMessage . " Swap tokens on MyMI Exchange now!";
                break;
            case 'Twitter':
                $message = $baseMessage . " Follow us for updates!";
                $messages['Twitter'] = (strlen($message) > 280) ? substr($message, 0, 277) . '...' : $message;
                break;
            default:
                $messages['default'] = $baseMessage;
                break;
        }

        return $messages;
    }

    public function goals($category = null)
    {
        $this->data['pageTitle'] = 'My Goals | MyMI Wallet | The Future of Finance';
        // $this->data['taskCategory'] = $category ?? 'All'; 
        $this->userAccountData(); 
        $this->commonData(); 
        return $this->renderTheme('App\Modules\User\Views\Dashboard\Goals', $this->data);
    }

    public function loadingScreen()
    {
        return $this->renderTheme('UserModule\Views\Dashboard\index\modal-loading-page');
    }

    public function loadModalContent($formtype, $endpoint, $accountid = null, $category = null, $platform = null)
    {

        // MYMI_SOLANA_VIEW_WALLET_HARD_200_20260601
        // Hard-stop this one modal before broad Dashboard/Solana payload loading.
        // This prevents raw 500s while the full wallet modal is rebuilt safely.
        if (strcasecmp((string) $formtype, 'Solana') === 0 && (string) $endpoint === 'viewSolanaWallet') {
            log_message('warning', 'Solana viewSolanaWallet hard fallback served before heavy modal loading.');

            $html = <<<'HTML'
<div class="modal-header">
    <h5 class="modal-title">Solana Wallet</h5>
    <button type="button" class="close btn-close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="alert alert-info mb-3">
        <strong>Wallet view is being upgraded.</strong><br>
        Your Solana wallet connection and security settings are protected. We are rebuilding this wallet detail modal to load faster and avoid transaction interruptions.
    </div>
    <p class="mb-0 text-muted">
        You can continue using the Solana Exchange dashboard while this wallet detail view is being optimized.
    </p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" data-dismiss="modal" data-bs-dismiss="modal">Close</button>
</div>
HTML;

            return $this->response
                ->setStatusCode(200)
                ->setContentType('text/html')
                ->setBody($html);
        }


        if ($this->debug == 1) {
            log_message('debug', "DashboardController::loadModalContent formtype={$formtype} endpoint={$endpoint} accountid={$accountid} category={$category} platform={$platform}");

        // MYMI_SOLANA_VIEW_WALLET_HOTFIX_20260601
        // viewSolanaWallet is currently failing in production during heavy modal payload rendering.
        // Return a safe, user-friendly 200 modal instead of a raw 500 until the full wallet view is rebuilt.
        if (strcasecmp((string) ($formtype ?? ''), 'Solana') === 0 && (string) ($endpoint ?? '') === 'viewSolanaWallet') {
            log_message('warning', 'Solana viewSolanaWallet modal served fallback to avoid runtime 500.');

            return $this->response
                ->setStatusCode(200)
                ->setBody($this->solanaModalFallbackHtml('viewSolanaWallet'));
        }

        }

        $cuID = $this->resolveCuID($this->cuID);
        if ($cuID === null) {
            return $this->response
                ->setStatusCode(401)
                ->setHeader('X-Session-Expired', '1')
                ->setBody($this->modalErrorHtml('Your session has expired. Please sign in again.'));
        }

        $this->commonData();

        if ($formtype === 'Setup' && $endpoint === 'continueSetup') {
            $context = $category ?: $accountid;
            return $this->continueSetupModal(is_string($context) ? $context : null);
        }

        $payloadResponse = $this->prepareModalPayload(
            (string) $formtype,
            (string) $endpoint,
            is_scalar($accountid) ? (string) $accountid : null,
            is_scalar($category) ? (string) $category : null,
            is_scalar($platform) ? (string) $platform : null,
            (int) $cuID
        );

        if ($payloadResponse instanceof \CodeIgniter\HTTP\ResponseInterface) {
            return $payloadResponse;
        }

        $viewPath = $this->resolveModalViewPath((string) $formtype, (string) $endpoint, is_scalar($category) ? (string) $category : null);
        if ($viewPath === null) {
            log_message('error', 'DashboardController::loadModalContent missing mapping formtype={formtype} endpoint={endpoint} category={category}', [
                'formtype' => $formtype,
                'endpoint'  => $endpoint,
                'category'  => $category,
            ]);

            return $this->response
                ->setStatusCode(404)
                ->setBody($this->modalErrorHtml('This modal is not available. Please refresh and try again.'));
        }

        if ($this->debug == 1) {
            log_message('debug', 'DashboardController::loadModalContent resolved viewPath=' . $viewPath);
        }

        $this->data['pageTitle'] = 'MyMI Transaction Model | MyMI Wallet | The Future of Finance';

        if (! $this->request->isAJAX()) {
            log_message('warning', 'DashboardController::loadModalContent non-AJAX modal request formtype={formtype} endpoint={endpoint}', [
                'formtype' => $formtype,
                'endpoint'  => $endpoint,
            ]);
        }

        return $this->renderModalViewSafely($viewPath, (string) $formtype, (string) $endpoint);
    }

    private function resolveModalViewPath(string $formtype, string $endpoint, ?string $category = null): ?string
    {
        $mapping = [
            // Alert Management
            'addChart' => 'ManagementModule\\Views\\Alerts\\modals\\createTradeAlert',
            'createTradeAlert' => 'ManagementModule\\Views\\Alerts\\modals\\createTradeAlert',
            'manageTradeAlert' => 'ManagementModule\\Views\\Alerts\\modals\\manageTradeAlert',
            'sendDiscordAlert' => 'ManagementModule\\Views\\Alerts\\sendDiscordAlert',
            'tradeDetails' => 'ManagementModule\\Views\\Alerts\\tradeDetails',
            'updateExchange' => 'ManagementModule\\Views\\Alerts\\modals\\updateExchange',
            'viewTradeChart' => 'ManagementModule\\Views\\Alerts\\modals\\viewTradeChart',

            // Budget Models
            'addBudgetIncome' => 'UserModule\\Views\\Budget\\Add',
            'addBudgetExpense' => 'UserModule\\Views\\Budget\\Add',
            'viewHistory' => 'UserModule\\Views\\Budget\\History',

            // Email Management
            'addMember' => 'ManagementModule\\Views\\Email\\modals\\addMember',
            'campaignStats' => 'ManagementModule\\Views\\Email\\modals\\campaignStats',
            'cloneCampaign' => 'ManagementModule\\Views\\Email\\modals\\cloneCampaign',
            'createDraftCampaign' => 'ManagementModule\\Views\\Email\\modals\\createDraftCampaign',
            'createList' => 'ManagementModule\\Views\\Email\\modals\\createQuickList',
            'editCampaign' => 'ManagementModule\\Views\\Email\\modals\\editCampaign',
            'scheduleCampaign' => 'ManagementModule\\Views\\Email\\modals\\scheduleCampaign',
            'sendCampaign' => 'ManagementModule\\Views\\Email\\modals\\sendCampaign',

            // Marketing Management
            'addCampaign' => 'ManagementModule\\Views\\Marketing\\Add',
            'viewCampaign' => 'ManagementModule\\Views\\Marketing\\Campaigns\\View',
            'activeCampaigns' => 'ManagementModule\\Views\\Marketing\\Campaigns\\Overview',
            'addCampaignStep' => 'ManagementModule\\Views\\Marketing\\Add',
            'viewCampaignStep' => 'ManagementModule\\Views\\Marketing\\Campaigns\\View',
            'activeCampaignsStep' => 'ManagementModule\\Views\\Marketing\\Campaigns\\Overview',
            'addIdea' => 'ManagementModule\\Views\\Marketing\\AddIdea',
            'addSchedule' => 'ManagementModule\\Views\\Marketing\\Schedule\\Add',
            'generateContent' => 'ManagementModule\\Views\\Marketing\\Promote\\Generate_Content',
            'generatePostMedia' => 'ManagementModule\\Views\\Marketing\\modals\\generatePostMedia',
            'generateScheduleContent' => 'ManagementModule\\Views\\Marketing\\Promote\\Default\\Generate_Content',
            'generateVideo' => 'ManagementModule\\Views\\Marketing\\Promote\\Generate_Video',
            'previewGeneratedPost' => 'ManagementModule\\Views\\Marketing\\modals\\previewGeneratedPost',
            'shareTo' => 'ManagementModule\\Views\\Marketing\\Promote\\Share_To',

            // Investment Models
            'addBondTrade' => 'UserModule\\Views\\Investments\\Add',
            'addCryptoTrade' => 'UserModule\\Views\\Investments\\Add',
            'addOptionsTrade' => 'UserModule\\Views\\Investments\\Add',
            'addStockTrade' => 'UserModule\\Views\\Investments\\Add',
            'editBondTrade' => 'UserModule\\Views\\Investments\\Edit',
            'editCryptoTrade' => 'UserModule\\Views\\Investments\\Edit',
            'editOptionsTrade' => 'UserModule\\Views\\Investments\\Edit',
            'editStockTrade' => 'UserModule\\Views\\Investments\\Edit',
            'addWatchlist' => 'UserModule\\Views\\Investments\\Add',

            // Projects Models
            'newProject' => 'UserModule\\Views\\Projects\\Add',
            'commitProject' => 'UserModule\\Views\\Projects\\forms\\project_commit',
            'discussProject' => 'UserModule\\Views\\Projects\\forms\\project_discuss',
            'investProject' => 'UserModule\\Views\\Projects\\forms\\project_invest',
            'sellProject' => 'UserModule\\Views\\Projects\\forms\\project_sell',
            'viewProject' => 'UserModule\\Views\\Projects\\index\\project_overview',
            'adminViewProject' => 'ManagementModule\\Views\\Projects\\management\\project_overview',

            // Wallet Models
            'addBankAccount' => 'UserModule\\Views\\Wallets\\Add',
            'addCreditAccount' => 'UserModule\\Views\\Wallets\\Add',
            'addDebtAccount' => 'UserModule\\Views\\Wallets\\Add',
            'addInvestAccount' => 'UserModule\\Views\\Wallets\\Add',
            'addCryptoAccount' => 'UserModule\\Views\\Wallets\\Add',
            'deleteWallet' => 'UserModule\\Views\\Wallets\\Delete',
            'editBankAccount' => 'UserModule\\Views\\Wallets\\Edit',
            'editCreditAccount' => 'UserModule\\Views\\Wallets\\Edit',
            'editDebtAccount' => 'UserModule\\Views\\Wallets\\Edit',
            'editCryptoAccount' => 'UserModule\\Views\\Wallets\\Edit',
            'editInvestAccount' => 'UserModule\\Views\\Wallets\\Edit',
            'purchasePaypal' => 'UserModule\\Views\\Wallets\\Purchase',
            'walletSelection' => 'UserModule\\Views\\Dashboard\\walletSelection',

            // Referral Models
            'createReferral' => 'UserModule\\Views\\Referral_Program\\Create',
        ];

        if ($formtype === 'Budget') {
            if ($endpoint === 'Add' && $category === 'Income') {
                return $mapping['addBudgetIncome'];
            }

            if ($endpoint === 'Add' && $category === 'Expense') {
                return $mapping['addBudgetExpense'];
            }

            if ($endpoint === 'View' && $category === 'History') {
                return $mapping['viewHistory'];
            }

            return null;
        }

        if ($formtype === 'Marketing' && $endpoint === 'activeCampaigns' && $category === 'View') {
            return $mapping['viewCampaign'];
        }

        if ($formtype === 'Projects') {
            if (in_array($category, ['newProject', 'commitProject', 'discussProject', 'investProject', 'sellProject'], true) && $endpoint === 'Add') {
                return $mapping[$category] ?? null;
            }

            if ($endpoint === 'Admin' && $category === 'adminViewProject') {
                return $mapping['adminViewProject'];
            }

            return $mapping[$endpoint] ?? null;
        }

        if ($formtype === 'Solana') {
            $solanaMapping = [
                'addSolanaWallet' => 'ExchangeModule\\Views\\Solana\\walletSelect',
                'coinSwap' => 'ExchangeModule\\Views\\Solana\\swap',
                'connectWalletModal' => 'ExchangeModule\\Views\\Solana\\connectWallet',
                'createSolanaToken' => 'ExchangeModule\\Views\\Solana\\createToken',
                'disconnectSolanaWallet' => 'ExchangeModule\\Views\\Solana\\Disconnect\\wallet',
                'tradeSolana' => 'ExchangeModule\\Views\\Solana\\trade',
                'viewSolanaOrders' => 'ExchangeModule\\Views\\Solana\\orders',
                'viewSolanaToken' => 'ExchangeModule\\Views\\Solana\\token',
                'viewSolanaWallet' => 'ExchangeModule\\Views\\Solana\\viewWallet',
            ];

            return $solanaMapping[$endpoint] ?? null;
        }

        if ($formtype === 'ProductDetails') {
            foreach ($this->getMyMIDashboard()->getFeatures() ?: [] as $feature) {
                if (($feature['identifier'] ?? null) === $endpoint) {
                    return 'UserModule\\Views\\Wallets\\Purchase\\Memberships\\Features';
                }
            }

            return null;
        }

        return $mapping[$endpoint] ?? null;
    }

    private function prepareModalPayload(
        string $formtype,
        string $endpoint,
        ?string $accountid,
        ?string $category,
        ?string $platform,
        int $cuID
    ) {
        if ($formtype === 'Alerts') {
            if (in_array($endpoint, ['updateExchange', 'viewTradeChart'], true)) {
                $tradeAlert = $this->alertsModel->getAlertById($accountid);
                if (!$tradeAlert) {
                    log_message('error', 'DashboardController::prepareModalPayload trade alert not found endpoint={endpoint} accountid={accountid}', [
                        'endpoint' => $endpoint,
                        'accountid' => $accountid,
                    ]);

                    return $this->response
                        ->setStatusCode(404)
                        ->setBody($this->modalErrorHtml('Trade alert not found. Please refresh and try again.'));
                }

                $this->data['ticker'] = $tradeAlert['ticker'];

                if ($endpoint === 'viewTradeChart') {
                    $tickerInfo = $this->alertsModel->getTickerInfo($tradeAlert['ticker']);
                    $this->data['exchange_missing'] = ! $tickerInfo || empty($tickerInfo->exchange);
                    if (! $this->data['exchange_missing']) {
                        $this->data['exchange'] = $tickerInfo->exchange;
                    }
                }
            }

            return null;
        }

        if ($formtype === 'Budget') {
            $this->data['budgetModalCategory'] = $category;
            return null;
        }

        if ($formtype === 'Marketing' && in_array($endpoint, ['generatePostMedia', 'previewGeneratedPost'], true)) {
            $postId = (int) ($accountid ?? 0);
            $post = $this->marketingModel->findFinalizedById($postId);
            if (!$post) {
                log_message('error', 'DashboardController::prepareModalPayload marketing post not found endpoint={endpoint} accountid={accountid}', [
                    'endpoint' => $endpoint,
                    'accountid' => $accountid,
                ]);

                return $this->response
                    ->setStatusCode(404)
                    ->setBody($this->modalErrorHtml('Marketing post not found. Please refresh and try again.'));
            }

            $marketing = service('MyMIMarketing');
            $cleanedSummary = $marketing->cleanHtmlSummaryPreview($post['summary'] ?? '');
            $sentences = $marketing->splitIntoSentences($cleanedSummary);
            $topKeywords = $marketing->extractKeywords($sentences);

            $post['cta'] = $marketing->generateCTA($post['summary'] ?? '');
            $post['voiceover'] = $post['voice_script'] ?? null;

            $this->data['post'] = $post;
            $this->data['summary'] = $post['summary'] ?? '';
            $this->data['formatted_summary'] = esc(format_summary_preview($post['summary'] ?? ''));
            $this->data['cleaned_summary'] = $cleanedSummary;
            $this->data['keywords'] = $topKeywords;
            $this->data['voiceover_url'] = $post['voiceover_url'] ?? null;

            return null;
        }

        if ($formtype === 'Projects' && $endpoint === 'Admin' && $category === 'adminViewProject') {
            $projectId = (int) ($accountid ?? 0);
            $project = $this->getMyMIProjects()->getProjectFullDetails($projectId);
            if (! empty($project)) {
                $this->data['project'] = $project;
                $this->data['owner'] = $this->getMyMIUser()->getUserInformation($project['created_by'] ?? 0);
            }

            return null;
        }

        if ($formtype === 'Solana') {
            $payload = $this->buildSolanaModalPayload($cuID, $endpoint);
            $this->data = array_merge($this->data, $payload);

            return null;
        }

        if ($formtype === 'Wallets') {
            $accountID = (int) ($accountid ?? 0);
            $this->data['accountID'] = $accountID;
            $this->data['walletID'] = $accountID;
            $this->data['accountType'] = $category ?: $endpoint;
            $this->data['walletCategory'] = $category;
            $this->data['platform'] = $platform;

            if ($endpoint === 'deleteWallet') {
                $this->data['deleteWalletID'] = $accountID;
                $this->data['deleteWalletCategory'] = $category;
                return null;
            }

            if (str_starts_with($endpoint, 'edit')) {
                $row = $this->findAccountRowForEdit($endpoint, $accountID, $cuID);
                if (!$row) {
                    return $this->response
                        ->setStatusCode(404)
                        ->setBody($this->modalErrorHtml('We couldn’t find that account. Please refresh and try again.'));
                }

                $fieldData = $this->buildEditFieldData($endpoint, $row, [
                    'siteSettings' => $this->siteSettings,
                    'cuID' => $cuID,
                    'cuEmail' => $this->data['cuEmail'] ?? '',
                    'cuUsername' => $this->data['cuUsername'] ?? '',
                    'accountID' => $accountID,
                    'beta' => $this->siteSettings->beta ?? 0,
                ]);

                $this->data['pageView'] = $row['__pageView'];
                $this->data['addModalTitle'] = $row['__title'];
                $this->data['fieldData'] = $fieldData;
                $this->data['formAction'] = site_url("API/Wallets/Banking/Update/{$accountID}");
            }
        }

        return null;
    }


    /**
     * Build only the Solana data needed by the requested modal. This avoids
     * broad dashboard token/account helpers and defers transaction history until
     * a wallet details modal actually needs it.
     */
    private function buildSolanaModalPayload(int $cuID, string $endpoint): array
    {
        $row = $this->cachedSolanaDefaultAddress($cuID);
        $address = $row['address'] ?? null;

        if (is_string($address) && $address !== '') {
            session()->set('solana_public_key', $address);
        }

        $userSolana = $this->cachedSolanaDefaultWallet($cuID);
        $cuSolanaDW = $userSolana['cuSolanaDW'] ?? $row ?? [];
        $price = $this->cachedSolanaPrice();

        $payload = [
            'address'            => $address,
            'userSolana'         => $userSolana,
            'cuSolanaDW'         => $cuSolanaDW,
            'solanaPrice'        => $price,
            'cryptoPT'           => $cuSolanaDW['public_token'] ?? $address,
            'cryptoTransactions' => [],
            'cryptoAccount'      => array_merge($this->data['cryptoAccount'] ?? [], [
                'coin_address' => $address ?: ['User Address Not Defined'],
                'address'      => $address,
            ]),
        ];

        if ($endpoint === 'coinSwap' || $endpoint === 'swapSolana') {
            $payload['cryptoTokens'] = $this->cachedSolanaTopListedTokens();
        }

        if (in_array($endpoint, ['viewSolanaWallet', 'viewSwap'], true)) {
            $payload['cryptoTransactions'] = $this->cachedSolanaTransactions($cuID, $address);
        }

        return $payload;
    }

    private function cachedSolanaDefaultAddress(int $cuID): ?array
    {
        $key = 'solanaDefaultAddress:' . $cuID;
        if (! array_key_exists($key, $this->requestCache)) {
            $this->requestCache[$key] = model(\App\Models\SolanaModel::class)->getDefaultAddressFromExchangeTable($cuID);
        }

        return is_array($this->requestCache[$key]) ? $this->requestCache[$key] : null;
    }

    private function cachedSolanaDefaultWallet(int $cuID): array
    {
        $key = 'solanaDefaultWallet:' . $cuID;
        if (! array_key_exists($key, $this->requestCache)) {
            $this->requestCache[$key] = $this->getMyMISolana()->getUserDefaultSolana($cuID) ?? [];
        }

        return is_array($this->requestCache[$key]) ? $this->requestCache[$key] : [];
    }

    private function cachedSolanaPrice(): ?float
    {
        if (! array_key_exists('solanaPrice', $this->requestCache)) {
            $price = $this->getSolanaService()->getSolanaPrice();
            $this->requestCache['solanaPrice'] = is_numeric($price) ? (float) $price : null;
        }

        return $this->requestCache['solanaPrice'];
    }

    private function cachedSolanaTopListedTokens(): array
    {
        if (! array_key_exists('solanaTopListedTokens', $this->requestCache)) {
            $this->requestCache['solanaTopListedTokens'] = model(\App\Models\SolanaModel::class)->getTopListedTokens();
        }

        return is_array($this->requestCache['solanaTopListedTokens']) ? $this->requestCache['solanaTopListedTokens'] : [];
    }

    private function cachedSolanaTransactions(int $cuID, ?string $address): array
    {
        $key = 'solanaTransactions:' . $cuID . ':' . (string) $address;
        if (! array_key_exists($key, $this->requestCache)) {
            $this->requestCache[$key] = $address ? service('myMISolana')->getTransactions($cuID, $address) : [];
        }

        return is_array($this->requestCache[$key]) ? $this->requestCache[$key] : [];
    }


    private function renderModalViewSafely(string $viewPath, string $formtype, string $endpoint): string
    {
        if (strcasecmp($formtype, 'Solana') === 0) {
            $this->prepareSolanaModalPayloadDefaults($endpoint);
        }

        try {
            return view($viewPath, $this->data);
        } catch (\Throwable $e) {
            log_message('error', 'DashboardController::renderModalViewSafely failed formtype={formtype} endpoint={endpoint} view={view} error={error}', [
                'formtype' => $formtype,
                'endpoint' => $endpoint,
                'view'     => $viewPath,
                'error'    => $e->getMessage(),
            ]);

            if (strcasecmp($formtype, 'Solana') === 0) {
                return $this->solanaModalFallbackHtml($endpoint);
            }

            throw $e;
        }
    }

    private function prepareSolanaModalPayloadDefaults(string $endpoint): void
    {
        $userId = $this->cuID ?? session()->get('user_id') ?? session()->get('id') ?? 0;

        $this->data['cuID'] = $this->data['cuID'] ?? $userId;

        $defaults = [
            'cuSolanaDW'            => [],
            'cuSolanaWallet'        => [],
            'cuSolanaWallets'       => [],
            'solanaWallet'          => [],
            'solanaWallets'         => [],
            'solanaListing'         => [],
            'solanaTokens'          => [],
            'solanaAssets'          => [],
            'solanaOrders'          => [],
            'solanaToken'           => [],
            'token'                 => [],
            'wallet'                => [],
            'wallets'               => [],
            'orders'                => [],
            'assets'                => [],
            'endpoint'              => $endpoint,
            'solana_modal_warning'  => null,
            'solana_modal_disabled' => false,
        ];

        foreach ($defaults as $key => $value) {
            if (! array_key_exists($key, $this->data)) {
                $this->data[$key] = $value;
            }
        }

        if (in_array($endpoint, ['coinSwap', 'tradeSolana', 'viewSolanaWallet', 'connectWalletModal'], true)) {
            $this->data['solana_modal_warning'] = $this->data['solana_modal_warning']
                ?? 'Solana wallet data is being prepared. Some actions may be unavailable until your wallet is connected.';
        }
    }

    private function solanaModalFallbackHtml(string $endpoint): string
    {
        $safeEndpoint = esc($endpoint);

        return '<div class="modal-header">'
            . '<h5 class="modal-title">Solana Feature Temporarily Unavailable</h5>'
            . '<button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>'
            . '</div>'
            . '<div class="modal-body">'
            . '<div class="alert alert-warning mb-3">'
            . 'This Solana action is currently being prepared for production. Your wallet and funds are safe. '
            . 'Please refresh the page and try again. If the issue continues, contact support.'
            . '</div>'
            . '<div class="small text-muted">Endpoint: ' . $safeEndpoint . '</div>'
            . '</div>';
    }


    private function modalErrorHtml(string $message): string
    {
        return '<div class="modal-header"><h3 class="modal-title">Unable to Load</h3>'
            . '<button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button></div>'
            . '<div class="modal-body"><div class="alert alert-warning mb-0">'
            . esc($message)
            . '</div></div>';
    }


    // Added method to process notifications if needed
    public function notifications()
    {
        $this->data['pageTitle'] = 'My Notifications | MyMI Wallet | The Future of Finance';
        $this->userAccountData();
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Dashboard\Account\Notifications', $this->data);
    }

    /**
     * 📌 Onboarding Page
     * - Displays incomplete onboarding steps
     */
    public function onboarding()
    {
        $this->commonData();
        $this->data['pageTitle'] = 'Complete Your Setup | MyMI Wallet';

        $this->data['incompleteSteps'] = $this->MyMIOnboarding->checkOnboardingStatus($this->cuID);
        return $this->renderTheme('App\Modules\User\Views\Dashboard\Onboarding', $this->data);
    }

    public function continueSetupModal(?string $context = null)
    {
        $userId = (int) ($this->cuID ?? session('user_id') ?? 0);
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setBody('Unauthorized');
        }

        $context = strtolower(trim((string) ($context ?: $this->request->getGet('context') ?: 'dashboard')));
        $context = in_array($context, ['budget', 'wallets', 'dashboard'], true) ? $context : 'dashboard';

        $this->commonData();

        /** @var \App\Services\SetupStatusService $setupService */
        $setupService = service('setupStatusService');
        $this->data['setupStatus'] = $setupService->getSetupStatus($userId);
        $this->data['setupPrefs'] = $setupService->getDismissPreferences($userId);
        $this->data['setupContext'] = $context;

        service('eventTracker')->track('setup.modal_open', [
            'context' => $context,
        ], $userId, 'onboarding');

        return view('UserModule\Views\Setup\continue_setup_modal', $this->data);
    }

    public function dismissSetup()
    {
        $userId = (int) ($this->cuID ?? session('user_id') ?? 0);
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        }

        $scope = strtolower(trim((string) $this->request->getPost('scope')));
        $dismiss = (int) ($this->request->getPost('dismiss') ?? 0) === 1;

        /** @var \App\Services\SetupStatusService $setupService */
        $setupService = service('setupStatusService');
        $result = $setupService->updateDismissPreference($userId, $scope, $dismiss);

        if ($dismiss) {
            if ($scope === 'all') {
                service('eventTracker')->track('setup.dismiss_all', [], $userId, 'onboarding');
            } else {
                service('eventTracker')->track('setup.dismiss_context', [
                    'context' => $scope,
                ], $userId, 'onboarding');
            }
        }

        log_message('info', '[SETUP] Dismiss updated', [
            'user_id' => $userId,
            'scope'   => $scope,
            'dismiss' => $dismiss ? 1 : 0,
        ]);

        return $this->response->setJSON($result + [
            'csrfName' => csrf_token(),
            'csrfHash' => csrf_hash(),
        ]);
    }

    public function performance()
    {
        $this->data['pageTitle'] = 'My Performance | MyMI Wallet | The Future of Finance';
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Dashboard\Performance', $this->data);
    }    
    
    // public function profile($username = null)
    // {
    //     $this->data['pageTitle'] = 'My Performance | MyMI Wallet | The Future of Finance';
    //     $this->commonData();
    //     return $this->renderTheme('App\Modules\User\Views\Dashboard\Performance', $this->data);
    // }

    public function profile($cuUsername = null)
    {
        if ($cuUsername === null) {
            return redirect()->to('/Profile')->with('error', 'No username provided.');
        }
    
        // Fetch user data based on the username
        $userInfo = $this->getMyMIUser()->getUserByUsername($cuUsername);
        $userID = $userInfo['id'];
        $userProjects = $this->getMyMIProjects()->getUserProjects($userID); 
        $totalActiveUsers = $this->getMyMIAnalytics()->reporting()['totalActiveUsers']; 

        log_message('debug', 'DashboardController L344 - $totalActiveUsers: ' . (print_r($totalActiveUsers, true)));
    
        if (!$userInfo) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Profile for user '{$cuUsername}' not found.");
        } else {
            log_message('debug', 'DashboardController L331 - Profile Method: Username = ' . $cuUsername);
        }
    
        $this->data['pageTitle'] = "{$cuUsername} | Profile at MyMI Wallet | The Future of Finance";
        $this->commonData();
        $this->data['cuUsername'] = $cuUsername;
        $this->data['userProjects'] = $userProjects;
        $this->data['totalActiveUsers'] = $totalActiveUsers; 
        $this->data['userInfo'] = $userInfo; // Add user data for the view
        
        return $this->renderTheme('App\Modules\User\Views\Dashboard\Profile', $this->data);
        // return $this->renderTheme('App\Modules\User\Views\Dashboard\Performance', $this->data);
    }
    
    public function schedule()
    {
        $this->data['pageTitle'] = 'My Schedule | MyMI Wallet | The Future of Finance';
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Dashboard\Schedule', $this->data);
    }
    
    private function scrapeAndGenerateContent($accountid, $category, $platform)
    {
        // Function to scrape and generate content
        $generatedData = [];
        if ($category === 'Solana') {
            $this->solanaModel = new SolanaModel();
            $tokenInfo = $this->solanaModel->getTokenInfoByID($accountid);
        } else {
            $tokenInfo = [];
        }

        if (!empty($tokenInfo)) {
//             $this->MyMIMarketing = service('MyMIMarketing'); // replaced by BaseController getter
            try {
                $scrapedData = $this->getMyMIMarketing()->scrapeTokenContent($tokenInfo);
            } catch (\Exception $e) {
                log_message('critical', 'Error scraping token content: ' . $e->getMessage());
            }

            try {
                if (!empty($scrapedData)) {
                    $generatedData = $this->getMyMIMarketing()->generateContentFromScrapedData($scrapedData, $platform);
                }
            } catch (\Exception $e) {
                log_message('critical', 'Error generating content: ' . $e->getMessage());
            }
        }

        return $generatedData;
    }

    public function search()
    {
        $keyword = $this->request->getVar('q');
        $this->data['pageTitle'] = 'Search Results';
        $this->data['searchResults'] = $this->dashboardModel->searchLinks($keyword);
        return $this->renderTheme('App\Modules\User\Views\Dashboard\SearchResults', $this->data);
    }

    public function security()
    {
        $this->data['pageTitle'] = 'My Security | MyMI Wallet | The Future of Finance';
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Dashboard\Account\Security', $this->data);
    }

    public function socialMedia()
    {
        $this->data['pageTitle'] = 'My Social Media | MyMI Wallet | The Future of Finance';
        $this->commonData();
        $linkModel = new DiscordLinkModel();

        $linkMessage = null;
        $source      = $this->request->getGet('source');
        $token       = $this->request->getGet('code');

        if ($source === 'discord' && $token) {
            $linkMessage = $linkModel->consumeToken($token, (int) $this->cuID);
        }

        $this->data['discordLink']        = $linkModel->findByUserId($this->cuID);
        $this->data['discordLinkMessage'] = $linkMessage;
        $this->data['discordLinkUrl']     = site_url('/Account/Social-Media?source=discord');
        $scopes = [];
        if (!empty($this->data['discordLink']['scopes_json'] ?? null)) {
            $decoded = json_decode($this->data['discordLink']['scopes_json'], true) ?? [];
            $scopes  = array_map('boolval', $decoded);
        }
        $this->data['discordScopes']  = array_merge([
            'budget'     => true,
            'alerts'     => true,
            'watchlists' => true,
            'marketing'  => false,
        ], $scopes);
        $this->data['discordPersona'] = $this->data['discordLink']['ai_persona'] ?? 'investor';
        return $this->renderTheme('App\Modules\User\Views\Dashboard\Account\Social', $this->data);
    }

    public function support()
    {
        $this->data['pageTitle'] = 'My Support | MyMI Wallet | The Future of Finance';
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Support\index', $this->data);
    }

    // Refactored userAccountData to ensure all account-related data is captured
    private function userAccountData() {
        $userInfo = $this->getMyMIUser()->getUserInformation($this->cuID);
        $this->data['cuFirstName'] = $userInfo['cuFirstName'] ?? '';
        $this->data['cuMiddleName'] = $userInfo['cuMiddleName'] ?? '';
        $this->data['cuLastName'] = $userInfo['cuLastName'] ?? '';
        $this->data['cuNameSuffix'] = $userInfo['cuNameSuffix'] ?? '';
        $this->data['cuPhone'] = $userInfo['cuPhone'] ?? '';
        $this->data['cuDOB'] = $userInfo['cuDOB'] ?? '';
        $this->data['cuMailingAddress'] = $userInfo['cuMailingAddress'] ?? '';

        if ($this->siteSettings->solanaExchange === 1) {
            $exchange = 'Solana';
            $this->data['cuSolanaDW'] = $this->getMyMIDashboard()->getCryptoAccount($this->cuID, $exchange)['accountInfo'] ?? ['User Address Not Defined'];
        }
    }

    /**
     * Find the per-type account row by id OR wallet_id for the current user.
     */
    private function findAccountRowForEdit(string $endpoint, int $accountId, int $userId): ?array
    {
        /** @var \App\Models\WalletModel $walletModel */
        $walletModel = model(\App\Models\WalletModel::class);
        return $walletModel->findAccountRowForEdit($endpoint, $accountId, $userId);
    }

    /**
     * Build the $fieldData array the edit partial expects from the resolved account row.
     */
    private function buildEditFieldData(string $endpoint, array $row, array $ctx): array
    {
        /** @var \App\Models\WalletModel $walletModel */
        $walletModel = model(\App\Models\WalletModel::class);
        return $walletModel->buildEditFieldData($endpoint, $row, $ctx);
    }

    /********* ADD THIS HELPER *********/
    private function currentUserId(): int
    {
        // Fallbacks cover both older and newer session keys
        return (int) ($this->cuID ?? $this->session->get('cuID') ?? $this->session->get('user_id') ?? 0);
    }

    /********* OPTIONAL (but recommended) *********/
    private function extractBase58Address($maybe = null, ?int $cuID = null): ?string
    {
        $svc = service('solanaService');

        // If string, normalize/validate directly
        if (is_string($maybe)) {
            return $svc->normalizeAddress($maybe);
        }

        // If array (e.g., $cuSolanaDW), try address fields then normalize
        if (is_array($maybe)) {
            $cand = $maybe['address']
                ?? ($maybe['public_token'] ?? ($maybe['coin_address']['address'] ?? null));
            $norm = is_string($cand) ? $svc->normalizeAddress($cand) : null;
            if ($norm) return $norm;
        }

        // Fallback: default from model
        $uid = $cuID ?? $this->currentUserId();
        if ($uid > 0) {
            $row  = model(\App\Models\SolanaModel::class)->getDefaultAddressFromExchangeTable($uid);
            $addr = is_array($row) ? ($row['address'] ?? null) : null;
            $norm = is_string($addr) ? $svc->normalizeAddress($addr) : null;
            if ($norm) return $norm;
        }

        // Last chance: session
        $sess = session('solana_public_key');
        return is_string($sess) ? $svc->normalizeAddress($sess) : null;
    }

    private function loadEmailScraperAuditHealth(): array
    {
        $dir = WRITEPATH . 'triage';
        $files = glob($dir . DIRECTORY_SEPARATOR . 'email-scraper-audit-*.json');
        if (! $files) {
            return [
                'status' => 'unknown',
                'message' => 'No audit reports found.',
                'summary' => [],
                'generated_at' => null,
            ];
        }

        rsort($files);
        $latest = $files[0];
        $payload = json_decode((string) file_get_contents($latest), true);
        if (! is_array($payload)) {
            return [
                'status' => 'unknown',
                'message' => 'Latest audit report unreadable.',
                'summary' => [],
                'generated_at' => null,
            ];
        }

        $runAt = $payload['run']['timestamp'] ?? null;
        $runTimestamp = $runAt ? strtotime((string) $runAt) : null;
        $isFresh = $runTimestamp !== null && $runTimestamp >= strtotime('-24 hours');

        $summary = $payload['summary'] ?? [];
        $failures = (int) ($summary['failed'] ?? 0);
        $fallbacks = (int) ($summary['fallbacks_applied'] ?? 0);

        $status = 'healthy';
        $message = 'Pipeline Healthy';
        if (! $isFresh) {
            $status = 'stale';
            $message = 'Audit stale';
        } elseif ($failures > 0) {
            $status = 'attention';
            $message = 'Attention Needed';
        } elseif ($fallbacks > 0) {
            $status = 'recovered';
            $message = 'Recovered with defaults';
        }

        return [
            'status' => $status,
            'message' => $message,
            'summary' => $summary,
            'generated_at' => $runAt,
            'report_path' => $latest,
        ];
    }

}
?>
