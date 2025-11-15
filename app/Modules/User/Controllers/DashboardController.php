<?php namespace App\Modules\User\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use App\Config\{Auth, SiteSettings, SocialMedia};
use App\Controllers\UserController;
use App\Libraries\{MyMIAlerts, MyMIAnalytics, MyMIBudget, MyMICoin, MyMIDashboard, MyMIExchange, MyMIGold, MyMIInvestments, MyMIMarketing, MyMIOnboarding, MyMIProjects, MyMISolana, MyMIUser, MyMIWallet, MyMIWallets};
use App\Models\{AccountsModel, AlertsModel, DashboardModel, MarketingModel, SolanaModel, UserModel};
use App\Services\{AccountService, BudgetService, DashboardService, EmailService, SolanaService, UserService};
use CodeIgniter\API\ResponseTrait;
use Myth\Auth\Authorization\GroupModel;
use DateTime;
use Psr\Log\LoggerInterface;

#[\AllowDynamicProperties]
class DashboardController extends UserController
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

    public function __construct()
    {
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

        $userBudget = $this->getMyMIBudget()->getUserBudget($cuID);
        log_message('info', 'DashboardController L72 - $checkingSummary: ' . $userBudget['checkingSummary']);
        $this->data['checkingSummary'] = $userBudget['checkingSummary'];
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
            if (!isset($this->solanaService)) {
                $this->solanaService = service('solanaService'); // or however you DI it
            }
            $data['solanaNetworkStatus'] = $this->solanaService->getNetworkStatus();
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
                        $this->data['userBudget'] = $this->getBudgetService()->getUserBudget($this->cuID);
                        $this->data['userBudgetRecords'] = $this->getBudgetService()->getUserBudgetRecords($this->cuID);
                        $this->data['repaymentSchedules'] = $this->getBudgetService()->calculateRepaymentSchedules(
                            $this->getAccountService()->getUserCreditAccounts($this->cuID)
                        );
                        $this->data['checkingSummary'] = $this->getBudgetService()->getUserBudget($this->cuID)['checkingSummary'];
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
                // $this->MyMIMarketing                        = new MyMIMarketing();
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
                    
                        $marketing = new MyMIMarketing();
                    
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
            } elseif ($pageURIC === 'Wallets') {
                $pageURID = $this->uri->getSegment(4);
                // inside loadModalContent(...)
                if ($formtype === 'Edit' && str_starts_with($endpoint, 'edit')) {
                    $uid = $this->cuID;
                    $row = $this->findAccountRowForEdit($endpoint, (int)$accountid, (int)$uid);

                    if (!$row) {
                        // return a small error view to the modal and stop
                        return $this->renderTheme('UserModule\Views\Errors\CannotLoadPage', [
                            'message' => 'We couldn’t find that account. Please refresh and try again.',
                        ]);
                    }

                    // Build field payload:
                    $fieldData = $this->buildEditFieldData($endpoint, $row, [
                        'siteSettings' => $this->siteSettings,
                        'cuID'         => $this->cuID,
                        'cuEmail'      => $this->data['cuEmail'] ?? '',
                        'cuUsername'   => $this->data['cuUsername'] ?? '',
                        'accountID'    => (int)$accountid,
                    ]);

                    // hand off to the view
                    $this->data['pageView']      = $row['__pageView'];         // e.g. banking_fields
                    $this->data['addModalTitle'] = $row['__title'];            // e.g. Edit Bank Account
                    $this->data['fieldData']     = $fieldData;

                    // (optional) if you prefer API submit, pass a formAction to the view
                    $this->data['formAction']    = site_url("API/Wallets/Banking/Update/{$accountid}");
                }

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

        // ✅ Only now build userService/commonData
        // $this->userService = new \App\Services\UserService($this->siteSettings, $activeUserId, $this->request);
        // $userData          = $this->userService->commonData();
        // $this->data        = array_merge(($this->data ?? []), $userData);

        try {
            $summary = $this->getMyMIDashboard()->getExecutiveDashboardSummary($activeUserId);
            $this->data = array_merge($this->data ?? [], $summary);
        } catch (\Throwable $e) {
            log_message('error', 'DashboardController::index failed to load executive summary: {msg}', [
                'msg' => $e->getMessage(),
            ]);
        }

        return $this->renderTheme('User/Dashboard/index', $this->data);
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
        if ($this->debug == 1) {
            log_message('debug', "DashboardController L516 - loadModalContent called with formtype: $formtype, endpoint: $endpoint, accountid: $accountid, category: $category, platform: $platform");
        }

        $cuID = $this->resolveCuID($this->cuID);
        // Define a mapping array for all possible endpoints to their corresponding view paths
        $mapping = [

            // Alert Management 
            'addChart' => 'ManagementModule\Views\Alerts\modals\createTradeAlert',
            'createTradeAlert' => 'ManagementModule\Views\Alerts\modals\createTradeAlert',
            'manageTradeAlert' => 'ManagementModule\Views\Alerts\modals\manageTradeAlert',
            'sendDiscordAlert' => 'ManagementModule\Views\Alerts\sendDiscordAlert',
            'tradeDetails' => 'ManagementModule\Views\Alerts\tradeDetails',
            'updateExchange' => 'ManagementModule\Views\Alerts\modals\updateExchange',
            'viewTradeChart' => 'ManagementModule\Views\Alerts\modals\viewTradeChart',

            // Budget Models
            'addBudgetIncome' => 'UserModule\Views\Budget\Add',
            'addBudgetExpense' => 'UserModule\Views\Budget\Add',
            'viewHistory' => 'UserModule\Views\Budget\History',
            
            // Email Management 
            'addMember'     => 'ManagementModule\Views\Email\modals\addMember',
            'campaignStats' => 'ManagementModule\Views\Email\modals\campaignStats',
            'cloneCampaign'     => 'ManagementModule\Views\Email\modals\cloneCampaign',
            'createDraftCampaign' => 'ManagementModule\Views\Email\modals\createDraftCampaign',
            'createList'    => 'ManagementModule\Views\Email\modals\createQuickList',
            'editCampaign' => 'ManagementModule\Views\Email\modals\editCampaign',
            'scheduleCampaign' => 'ManagementModule\Views\Email\modals\scheduleCampaign',
            'sendCampaign'  => 'ManagementModule\Views\Email\modals\sendCampaign',

            // Marketing Management
            'addCampaign' => 'ManagementModule\Views\Marketing\Add',
            'viewCampaign' => 'ManagementModule\Views\Marketing\Campaigns\View',
            'activeCampaigns' => 'ManagementModule\Views\Marketing\Campaigns\Overview',
            'addCampaignStep' => 'ManagementModule\Views\Marketing\Add',
            'viewCampaignStep' => 'ManagementModule\Views\Marketing\Campaigns\View',
            'activeCampaignsStep' => 'ManagementModule\Views\Marketing\Campaigns\Overview',
            'addIdea' => 'ManagementModule\Views\Marketing\AddIdea',
            'addSchedule' => 'ManagementModule\Views\Marketing\Schedule\Add',
            'generateContent' => 'ManagementModule\Views\Marketing\Promote\Generate_Content',
            'generatePostMedia' => 'ManagementModule\Views\Marketing\modals\generatePostMedia',
            'generateScheduleContent' => 'ManagementModule\Views\Marketing\Promote\Default\Generate_Content',
            'generateVideo' => 'ManagementModule\Views\Marketing\Promote\Generate_Video',
            'previewGeneratedPost' => 'ManagementModule\Views\Marketing\modals\previewGeneratedPost',
            'shareTo' => 'ManagementModule\Views\Marketing\Promote\Share_To',

            // Investment Models
            'addBondTrade' => 'UserModule\Views\Investments\Add',
            'addCryptoTrade' => 'UserModule\Views\Investments\Add',
            'addOptionsTrade' => 'UserModule\Views\Investments\Add',
            'addStockTrade' => 'UserModule\Views\Investments\Add',
            'editBondTrade' => 'UserModule\Views\Investments\Edit',
            'editCryptoTrade' => 'UserModule\Views\Investments\Edit',
            'editOptionsTrade' => 'UserModule\Views\Investments\Edit',
            'editStockTrade' => 'UserModule\Views\Investments\Edit',
            'addWatchlist' => 'UserModule\Views\Investments\Add', 

            // Projects Models 
            'newProject' => 'UserModule\Views\Projects\Add',
            'commitProject' => 'UserModule\Views\Projects\forms\project_commit',
            'discussProject' => 'UserModule\Views\Projects\forms\project_discuss',
            'investProject' => 'UserModule\Views\Projects\forms\project_invest',
            'sellProject' => 'UserModule\Views\Projects\forms\project_sell',
            'viewProject' => 'UserModule\Views\Projects\index\project_overview',
            'adminViewProject' => 'ManagementModule\Views\Projects\management\project_overview',

            // Wallet Models
            'addBankAccount' => 'UserModule\Views\Wallets\Add',
            'addCreditAccount' => 'UserModule\Views\Wallets\Add',
            'addDebtAccount' => 'UserModule\Views\Wallets\Add',
            'addInvestAccount' => 'UserModule\Views\Wallets\Add',
            'addCryptoAccount' => 'UserModule\Views\Wallets\Add',
            'deleteWallet' => 'UserModule\Views\Wallets\Delete',
            'editBankAccount' => 'UserModule\Views\Wallets\Edit',
            'editCreditAccount' => 'UserModule\Views\Wallets\Edit',
            'editDebtAccount' => 'UserModule\Views\Wallets\Edit',
            'editCryptoAccount' => 'UserModule\Views\Wallets\Edit',
            'editInvestAccount' => 'UserModule\Views\Wallets\Edit',
            'purchasePaypal' => 'UserModule\Views\Wallets\Purchase',
            'walletSelection' => 'UserModule\Views\Dashboard\walletSelection',

            // Referral Models
            'createReferral' => 'UserModule\Views\Referral_Program\Create',

            // !! Old
            // 'Wallets/Add/Credit' => 'UserModule\Views\Dashboard\addCreditAccount',
            // 'Add-Wallet/Digital' => 'UserModule\Views\Dashboard\addDigitalWallet',
            // 'Add-Wallet/Fiat' => 'UserModule\Views\Dashboard\addFiatWallet',
            // 'Admin/Add-External-Site' => 'UserModule\Views\Dashboard\addExternalSite',
            // 'Wallets/Investment/Add/Account/Modal' => 'UserModule\Views\Dashboard\addInvestmentAccount',
            // 'Exchange/Coin-Listing/Request' => 'UserModule\Views\Dashboard\createAssetRequest',
            // 'Exchange/Coin-Listing/Asset-Information-Modal/Existing' => 'UserModule\Views\Dashboard\completeAssetRequest',
            // 'Wallets/Delete' => 'UserModule\Views\Dashboard\deleteWallet',
            // 'Wallets/Address-Generator' => 'UserModule\Views\Dashboard\generateWalletAddress',
            // 'Announcements/Post' => 'UserModule\Views\Dashboard\postAnnouncement',
            // 'Purchase-Wallet/Digital' => 'UserModule\Views\Dashboard\purchaseDigitalWallet',
            // 'Purchase-Wallet/Fiat' => 'UserModule\Views\Dashboard\purchaseFiatWallet',
            // 'MyMI-Gold/Purchase' => 'UserModule\Views\Dashboard\purchaseMyMIGold',
            // 'Add-Wallet-Deposit-Fetch' => 'UserModule\Views\Dashboard\trackDeposit',
            // 'Add-Wallet-Withdraw-Fetch' => 'UserModule\Views\Dashboard\trackWithdraw',
            // 'Wallet-Selection/Digital' => 'UserModule\Views\Dashboard\walletSelectionDigital',
            // 'Wallet-Selection/Fiat' => 'UserModule\Views\Dashboard\walletSelectionFiat',
            // 'Withdraw-Funds' => 'UserModule\Views\Dashboard\withdrawFunds',
        ];

        if ($formtype === 'Alerts') {
            if ($endpoint === 'createTradeAlert') {
                $viewPath = $mapping['createTradeAlert'];
            }
            if ($endpoint === 'manageTradeAlert') {
                $viewPath = $mapping['manageTradeAlert'];
            }
            if ($endpoint === 'updateExchange') {
                $viewPath = $mapping['updateExchange'];
                // Fetch trade alert details
                $tradeAlert = $this->alertsModel->getAlertById($accountid);
                if (!$tradeAlert) {
                    return "Error: Trade alert not found.";
                }
        
                // Send ticker data
                $this->data['ticker'] = $tradeAlert['ticker'];
            }
            if ($endpoint === 'viewTradeChart') {
                $viewPath = $mapping['viewTradeChart'];
    
                // Fetch trade alert details
                $tradeAlert = $this->alertsModel->getAlertById($accountid);
                if (!$tradeAlert) {
                    return "Error: Trade alert not found.";
                }
    
                // Fetch ticker details (including exchange)
                $tickerInfo = $this->alertsModel->getTickerInfo($tradeAlert['ticker']);
                if (!$tickerInfo || empty($tickerInfo->exchange)) {
                    $this->data['exchange_missing'] = true;
                    $this->data['ticker'] = $tradeAlert['ticker'];
                } else {
                    $this->data['exchange_missing'] = false;
                    $this->data['exchange'] = $tickerInfo->exchange;
                    $this->data['ticker'] = $tradeAlert['ticker'];
                }
    
                return $this->renderTheme($viewPath, $this->data);
            }
        }
        if ($formtype === 'Budget') {
            log_message('debug', 'DashboardController L743 - $formtype: ' . $formtype);
            if ($endpoint === 'Add') {
                log_message('debug', 'DashboardController L745 - $endpoint: ' . $endpoint);
                if ($category === 'Income') {
                    log_message('debug', 'DashboardController L747 - $category: ' . $category);
                    $viewPath = $mapping['addBudgetIncome'];
                    log_message('debug', 'DashboardController L749 - $viewPath: ' . $viewPath);
                } elseif ($category === 'Expense') {
                    log_message('debug', 'DashboardController L751 - $category: ' . $category);
                    $viewPath = $mapping['addBudgetExpense'];
                    log_message('debug', 'DashboardController L753 - $viewPath: ' . $viewPath);
                } else {                    
                    log_message('debug', "DashboardController L755 - No mapping found for formtype: $formtype, endpoint: $endpoint");
                }
            } elseif ($endpoint === 'View') {
                if ($category === 'History') {
                    $viewPath = $mapping['viewHistory']; 
                }
            }
        }

        // Handle Marketing-specific mappings
        elseif ($formtype === 'Marketing') {
            if ($endpoint === 'activeCampaigns' && $category === 'View') {
                log_message('debug', 'DashboardController L767 - $activeCampaigns reached! Category: ' . $category);
                $viewPath = $mapping['viewCampaign'];
            } elseif (isset($mapping[$endpoint])) {
                $viewPath = $mapping[$endpoint];
            } elseif ($endpoint === 'generatePostMedia') {
                log_message('debug', 'DashboardController L772 - $activeCampaigns reached! Category: ' . $category);
                $viewPath = $mapping['generatePostMedia'];
            } elseif ($endpoint === 'previewGeneratedPost') {
                log_message('debug', 'DashboardController L772 - $activeCampaigns reached! Category: ' . $category);
                $viewPath = $mapping['previewGeneratedPost'];
            } else {
                log_message('error', "DashboardController - No mapping found for formtype: $formtype, endpoint: $endpoint");
            }
        }

        elseif ($formtype === 'Projects') {
            if ($endpoint === 'Add' && $category === 'newProject') {
                log_message('debug', 'DashboardController L781 - Add New Project reached.'); 
                $viewPath = $mapping[$category];
            } elseif ($endpoint === 'Add' && $category === 'commitProject') {
                log_message('debug', 'DashboardController L784 - Add New Project reached.'); 
                $viewPath = $mapping[$category];
            } elseif ($endpoint === 'Add' && $category === 'discussProject') {
                log_message('debug', 'DashboardController L787 - Add New Project reached.'); 
                $viewPath = $mapping[$category];
            } elseif ($endpoint === 'Add' && $category === 'investProject') {
                log_message('debug', 'DashboardController L790 - Add New Project reached.'); 
                $viewPath = $mapping[$category];
            } elseif ($endpoint === 'Add' && $category === 'sellProject') {
                log_message('debug', 'DashboardController L793 - Add New Project reached.'); 
                $viewPath = $mapping[$category];
            } elseif ($endpoint === 'Admin' && $category === 'adminViewProject') {
                log_message('debug', 'DashboardController L796 - Add New Project reached.'); 
                $viewPath = $mapping[$category];
            }
        }

        // Handle Solana-specific mappings
        elseif ($formtype === 'Solana') {
            $solanaMapping = [
                'addSolanaWallet' => 'ExchangeModule\Views\Solana\walletSelect',
                'coinSwap' => 'ExchangeModule\Views\Solana\swap',
                'connectWalletModal' => 'ExchangeModule\Views\Solana\connectWallet',
                'createSolanaToken' => 'ExchangeModule\Views\Solana\createToken',
                'disconnectSolanaWallet' => 'ExchangeModule\Views\Solana\Disconnect\wallet',
                'tradeSolana' => 'ExchangeModule\Views\Solana\trade',
                'viewSolanaOrders' => 'ExchangeModule\Views\Solana\orders',
                'viewSolanaToken' => 'ExchangeModule\Views\Solana\token',
                'viewSolanaWallet' => 'ExchangeModule\Views\Solana\viewWallet',
            ];
            $viewPath = $solanaMapping[$endpoint] ?? null;
        }

        // Handle ProductDetails-specific mappings
        elseif ($formtype === 'ProductDetails') {
            $getFeatures = $this->getMyMIDashboard()->getFeatures();
            if (!empty($getFeatures)) {
                if ($this->debug == 1) {
                    log_message('debug', 'DashboardController L180 - $this->getFeatures(): ' . print_r($getFeatures, true));
                }
                foreach ($getFeatures as $feature) {
                    $mapping[$feature['identifier']] = 'UserModule\Views\Wallets\Purchase\Memberships\Features';
                }
            }
        } else {            
            $viewPath = $mapping[$endpoint] ?? null;
        }

        // Log and render the view
        if ($this->debug == 1) {
            log_message('debug', 'DashboardController L489 - $viewPath: ' . $viewPath);
        }
        if ($viewPath === 'UserModule\Views\Errors\CannotLoadPage') {
            $this->sendErrorNotification($endpoint);
        }
        if ($viewPath && $this->request->isAJAX()) {
            if ($this->debug == 1) {
                log_message('debug', '$viewPath: ' . $viewPath . ' | $this->data: ' . print_r($this->data, true));
            }
            if ($formtype === 'Solana') {
                $cuID = $this->currentUserId();
                $row = model(\App\Models\SolanaModel::class)->getDefaultAddressFromExchangeTable($cuID);
                $address = $row['address'] ?? null;
                session()->set('solana_public_key', $address);
                $this->data['address'] = $address;

//                 $this->MyMISolana = new MyMISolana(); // replaced by BaseController getter
                $userSolana = $this->MyMISolana->getUserDefaultSolana($cuID);
                $this->data['userSolana'] = $userSolana;

                // Fetch and verify the Solana price and transactions
                $this->data['solanaPrice'] = $this->getSolanaService()->getSolanaPrice();
                $solPrice = $this->MyMISolana->getSolanaPrice();
                $this->data['solanaPrice'] = is_numeric($solPrice) ? (float)$solPrice : null;
                $transactions = service('myMISolana')->getTransactions($cuID, $address);
                $this->data['cryptoTransactions'] = $transactions;

                if (!isset($this->data['cryptoAccount']['coin_address']) || empty($this->data['cryptoAccount']['coin_address'])) {
                    $exchange = 'Solana';
                    $this->data['cryptoAccount']['coin_address'] = $this->getMyMIDashboard()->getCryptoAccount($cuID, $exchange)['accountInfo'] ?? ['User Address Not Defined'];
                } 
                log_message('debug', 'DashboardController L199 - $cryptoAccount: ' . print_r($this->data['cryptoAccount'], true));

                if ($endpoint === 'coinSwap') {
                    $exchange = $formtype;
                    $cryptoTokens = $this->getMyMIDashboard()->getAllTokensByBlock($exchange);
                    log_message('error', 'DashboardController L485 - $cryptoTokens: ' . print_r($cryptoTokens, true));

                    $this->data['cryptoTokens'] = $cryptoTokens ?? [];
                    $this->data['cryptoPT'] = $userSolana['cuSolanaDW']['public_token'];
                }

                if ($endpoint === 'viewSwap') {
                    $this->data['cuSolanaDW'] = $userSolana['cuSolanaDW']; 
                }
            }

            $this->data['pageTitle'] = 'MyMI Transaction Model | MyMI Wallet | The Future of Finance';
            $this->commonData();
            echo view($viewPath, $this->data);
        } else {
            log_message('error', 'Failed to load content. $viewPath: ' . $viewPath . ' | Data: ' . print_r($this->data, true));
            echo "Content could not be loaded.";
        }
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
//             $this->MyMIMarketing = new MyMIMarketing(); // replaced by BaseController getter
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
        // Map endpoint -> table + pageView + title
        $map = [
            'editBankAccount'   => ['table' => 'bf_users_bank_accounts',   'pageView' => 'UserModule\Views\Wallets\Edit_Account\banking_fields',    'title' => 'Edit Bank Account'],
            'editCreditAccount' => ['table' => 'bf_users_credit_accounts', 'pageView' => 'UserModule\Views\Wallets\Edit_Account\credit_fields',     'title' => 'Edit Credit Account'],
            'editDebtAccount'   => ['table' => 'bf_users_debt_accounts',   'pageView' => 'UserModule\Views\Wallets\Edit_Account\debt_fields',       'title' => 'Edit Debt Account'],
            'editInvestAccount' => ['table' => 'bf_users_invest_accounts', 'pageView' => 'UserModule\Views\Wallets\Edit_Account\investment_fields', 'title' => 'Edit Investment Account'],
            // add editCryptoAccount if you have one
        ];

        if (!isset($map[$endpoint])) return null;

        $db  = db_connect();
        $row = $db->table($map[$endpoint]['table'])
            ->groupStart()
                ->where('id', $accountId)
                ->orWhere('wallet_id', $accountId)
            ->groupEnd()
            ->where('user_id', $userId)     // safety
            ->get()
            ->getRowArray();

        if (!$row) {
            log_message('error', "Edit modal: {$endpoint} not found for accountId={$accountId} (matched on id OR wallet_id) user={$userId}");
            return null;
        }

        // annotate for later use
        $row['__pageView'] = $map[$endpoint]['pageView'];
        $row['__title']    = $map[$endpoint]['title'];
        return $row;
    }

    /**
     * Build the $fieldData array the partial expects, from the per-type row.
     */
    private function buildEditFieldData(string $endpoint, int $accountID, int $cuID, string $cuEmail, string $cuUsername, $beta): array
    {
        $wm = new \App\Models\WalletModel();
        $redirectURL = site_url('/Wallets');

        switch ($endpoint) {
            case 'editBankAccount':
                $info = $wm->getBankAccountByIdOrWallet($accountID);
                if (!$info) { return []; }
                return [
                    'errorClass'        => 'error',
                    'controlClass'      => 'span6',
                    'redirectURL'       => $redirectURL,
                    'cuID'              => $cuID,
                    'cuEmail'           => $cuEmail,
                    'accountBeta'       => $beta,
                    'accountID'         => $accountID,
                    'accountWalletID'   => $accountID,
                    'accountUserID'     => $cuID,
                    'accountUserEmail'  => $cuEmail,
                    'accountUsername'   => $cuUsername,
                    'accountType'       => 'editBankAccount',
                    'accountTypeText'   => 'Bank Account',
                    'accountBank'       => $info['bank_name']         ?? '',
                    'accountOwner'      => $info['bank_account_owner']?? '',
                    'accountRouting'    => $info['routing_number']    ?? '',
                    'accountNumber'     => $info['account_number']    ?? '',
                    'accountName'       => $info['nickname']          ?? '',
                    'accountNickname'   => $info['nickname']          ?? '',
                    'accountBalance'    => $info['balance']           ?? '',
                ];

            case 'editCreditAccount':
                $info = $wm->getCreditAccountByIdOrWallet($accountID);
                if (!$info) { return []; }
                return [
                    'errorClass'        => 'error',
                    'controlClass'      => 'span6',
                    'redirectURL'       => $redirectURL,
                    'cuID'              => $cuID,
                    'cuEmail'           => $cuEmail,
                    'accountBeta'       => $beta,
                    'accountID'         => $accountID,
                    'accountWalletID'   => $accountID,
                    'accountUserID'     => $cuID,
                    'accountUserEmail'  => $cuEmail,
                    'accountUsername'   => $cuUsername,
                    'accountType'       => 'editCreditAccount',
                    'accountTypeText'   => 'Credit Account',
                    'accountBank'             => $info['bank_name']         ?? '',
                    'accountNumber'           => $info['account_number']    ?? '',
                    'accountName'             => $info['nickname']          ?? '',
                    'accountNickname'         => $info['nickname']          ?? '',
                    'accountCreditLimit'      => $info['credit_limit']      ?? '',
                    'accountCurrentBalance'   => $info['current_balance']   ?? '',
                    'accountAvailableBalance' => $info['available_balance'] ?? '',
                    'accountCreditStatus'     => $info['credit_status']     ?? '',
                    'accountDueDate'          => $info['due_date']          ?? '',
                    'accountPaymentDue'       => $info['payment_due']       ?? '',
                    'accountInterestRate'     => $info['interest_rate']     ?? '',
                ];

            case 'editDebtAccount':
                $info = $wm->getDebtAccountByIdOrWallet($accountID);
                if (!$info) { return []; }
                return [
                    'errorClass'        => 'error',
                    'controlClass'      => 'span6',
                    'redirectURL'       => $redirectURL,
                    'cuID'              => $cuID,
                    'cuEmail'           => $cuEmail,
                    'accountBeta'       => $beta,
                    'accountID'         => $accountID,
                    'accountWalletID'   => $accountID,
                    'accountUserID'     => $cuID,
                    'accountUserEmail'  => $cuEmail,
                    'accountUsername'   => $cuUsername,
                    'accountStatus'           => $info['account_status']   ?? '',
                    'accountSourceType'       => $info['account_type']     ?? '',
                    'accountTypeText'         => 'Debt Account',
                    'accountDebtor'           => $info['debtor']           ?? '',
                    'accountName'             => $info['nickname']         ?? '',
                    'accountNickname'         => $info['nickname']         ?? '',
                    'accountNumber'           => $info['account_number']   ?? '',
                    'accountDueDate'          => $info['due_date']         ?? '',
                    'accountCreditLimit'      => $info['credit_limit']     ?? '',
                    'accountCurrentBalance'   => $info['current_balance']  ?? '',
                    'accountAvailableBalance' => $info['available_balance']?? '',
                    'accountMonthlyPayment'   => $info['monthly_payment']  ?? '',
                    'accountInterestRate'     => $info['interest_rate']    ?? '',
                ];

            case 'editInvestAccount':
                $info = $wm->getInvestAccountByIdOrWallet($accountID);
                if (!$info) { return []; }
                return [
                    'errorClass'        => 'error',
                    'controlClass'      => 'span6',
                    'redirectURL'       => $redirectURL,
                    'cuID'              => $cuID,
                    'cuEmail'           => $cuEmail,
                    'accountBeta'       => $beta,
                    'accountID'         => $accountID,
                    'accountWalletID'   => $accountID,
                    'accountUserID'     => $cuID,
                    'accountUserEmail'  => $cuEmail,
                    'accountUsername'   => $cuUsername,
                    'accountType'       => 'editInvestAccount',
                    'accountTypeText'   => 'Investment Account',
                    'accountName'       => $info['nickname']        ?? '',
                    'accountNickname'   => $info['nickname']        ?? '',
                    'accountBroker'     => $info['broker']          ?? '',
                    'accountNumber'     => $info['account_number']  ?? '',
                    'accountAmount'     => $info['amount']          ?? '',
                    'accountInitialValue'=> $info['initial_value']  ?? '',
                    'accountAvailableFunds'=> $info['available_funds'] ?? '',
                    'accountNetWorth'   => $info['net_worth']       ?? '',
                ];
        }
        return [];
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

}
?>
