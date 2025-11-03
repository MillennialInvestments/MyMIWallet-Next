<?php
// app/Modules/User/Controllers/DashboardController.php
namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use Myth\Auth\Authorization\GroupModel;
use App\Config\{Auth, SiteSettings, SocialMedia}; 
use App\Controllers\UserController;
use App\Libraries\{MyMIAdvisor, MyMIAlerts, MyMIAnalytics, MyMIBudget, MyMICoin, MyMIDashboard, MyMIExchange, MyMIGold, MyMIUser, MyMIWallet, MyMIWallets};
use App\Models\{AccountsModel, AlertsModel, BudgetModel, UserModel};
// use App\Modules\User\Libraries\{DashboardLibrary}; 
use CodeIgniter\API\ResponseTrait; // Import the ResponseTrait
use Google\Cloud\TextToSpeech\V1\TextToSpeechClient;
use Google\Cloud\TextToSpeech\V1\SynthesisInput;
use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;
use Google\Cloud\TextToSpeech\V1\AudioConfig;
use Google\Cloud\TextToSpeech\V1\AudioEncoding;

#[\AllowDynamicProperties]
class AlertsController extends UserController
{
    protected $API;
    protected $auth;
    protected $helpers = ['auth', 'form', 'url'];
    protected $library;
    protected $session;
    protected $siteSettings;
    protected $socialMedia;
    protected $uri;
    protected $NewsEmail;
    protected $MyMIAdvisor;
    protected $MyMIAlerts;
    protected $MyMIAnalytics;
    protected $MyMIBudget;
    protected $MyMICoin;
    protected $MyMIDashboard;
    protected $MyMIGold;
    protected $MyMIUser;
    protected $MyMIWallet;
    protected $MyMIWallets;
    protected $alertsModel;
    protected $budgetModel;
    protected $accountsModel;
    protected $userModel;
    protected $reporting;
    protected $todaysEarnings;
    protected $userAccount;
    protected $userAssessment;
    protected $userBudget;
    protected $userDashboard;
    protected $userWallets; 

    public function __construct()
    {
        $this->auth                                 = service('authentication');
        $this->request                              = service('request');
        $this->API                                  = config('APISettings');
        $this->NewsEmail                            = config('NewsEmailServer');
        $this->siteSettings                         = config('SiteSettings');
        $this->socialMedia                          = config('SocialMedia');
        $this->session                              = Services::session();
        $this->debug                                = $this->siteSettings->debug;
        $this->uri                                  = $this->request->getUri();

        $this->alertsModel                          = new AlertsModel(); 
        $this->accountsModel                        = new AccountsModel(); 
        $this->budgetModel                          = new BudgetModel(); 
        $this->userModel                            = new UserModel(); 

//         $this->MyMIAdvisor                          = new MyMIAdvisor(); // replaced by BaseController getter 
//         $this->MyMIAlerts                           = new MyMIAlerts(); // replaced by BaseController getter 
//         $this->MyMIAnalytics                        = new MyMIAnalytics(); // replaced by BaseController getter 
//         $this->MyMIBudget                           = new MyMIBudget(); // replaced by BaseController getter 
//         $this->MyMICoin                             = new MyMICoin(); // replaced by BaseController getter
//         $this->MyMIDashboard                        = new MyMIDashboard(); // replaced by BaseController getter  
//         $this->MyMIGold                             = new MyMIGold(); // replaced by BaseController getter 
//         $this->MyMIUser                             = new MyMIUser(); // replaced by BaseController getter 
//         $this->MyMIWallet                           = new MyMIWallet(); // replaced by BaseController getter 
//         $this->MyMIWallets                          = new MyMIWallets(); // replaced by BaseController getter 
        // Check for user ID
        $this->cuID                                 = $this->auth->id() ?? session('logged_in') ?? $this->session->get('user_id');
        log_message('debug', 'HowTosController L47 - $this->cuID: ' . (print_r($this->cuID, true)));
        if (empty($this->cuID)) {
            log_message('error', 'Failed to retrieve user ID.');
            return redirect()->to('/login')->with('redirect_url', current_url())->send();
        }
        $this->userAccount                          = $this->getMyMIUser()->getUserInformation($this->cuID); 
        $this->userAssessment                       = $this->getMyMIUser()->getUserFinancialAssessment($this->cuID);  
        $this->userBudget                           = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID); 
        $this->userDashboard                        = $this->getMyMIDashboard()->dashboardInfo($this->cuID); 
        $this->userWallets                          = $this->getMyMIWallets()->getUserWallets($this->cuID);  
        $this->reporting                            = $this->getMyMIAnalytics()->reporting($this->cuID);  
    }

    public function commonData(): array {  
        $this->data = parent::commonData();
        // Fetch general site settings
        $this->data['siteSettings'] = $this->siteSettings;
        $this->data['beta'] = (string)$this->siteSettings->beta;
        $this->data['uri'] = $this->request->getUri();
        $this->data['date'] = $this->siteSettings->date;
        $this->data['time'] = $this->siteSettings->time;
        $this->data['hostTime'] = $this->siteSettings->hostTime;
        $this->data['userAgent'] = $this->request->getUserAgent();

        $this->data['cuID'] = $this->cuID;
        
        $this->data['checkingSummaryFMT'] = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['checkingSummaryFMT'];
        $this->data['totalAccountBalance'] = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['totalAccountBalance'];
        $this->data['totalAccountBalanceFMT'] = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['totalAccountBalanceFMT'];
        $this->data['cuSolanaDW'] = $this->getMyMIDashboard()->getCryptoAccount($this->cuID, 'Solana')['accountInfo'];
        $this->data['getFeatures'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['getFeatures'];
        $this->data['completedGoals'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['progressGoalData']['completions'];
        $this->data['pendingGoals'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['progressGoalData']['goals'];
        $this->data['promotionalBanners'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['promotionalBanners'];
        $this->data['cuRole'] = $this->getMyMIUser()->getUserInformation($this->cuID)['cuRole'] ?? 4;
        $this->data['cuUserType'] = $this->getMyMIUser()->getUserInformation($this->cuID)['cuUserType'] ?? '';
        $this->data['cuEmail'] = $this->getMyMIUser()->getUserInformation($this->cuID)['cuEmail'] ?? '';
        $this->data['cuDisplayName'] = $this->getMyMIUser()->getUserInformation($this->cuID)['cuDisplayName'] ?? '';
        $this->data['cuUsername'] = $this->getMyMIUser()->getUserInformation($this->cuID)['cuUsername'] ?? '';
        $this->data['cuNameInitials'] = $this->getMyMIUser()->getUserInformation($this->cuID)['cuNameInitials'] ?? '';
        $this->data['cuKYC'] = $this->getMyMIUser()->getUserInformation($this->cuID)['cuKYC'] ?? '';
        $this->data['cuWalletID'] = $this->getMyMIUser()->getUserInformation($this->cuID)['cuWalletID'];
        $this->data['cuWalletCount'] = $this->getMyMIUser()->getUserInformation($this->cuID)['cuWalletCount'];
        $this->data['MyMIGCoinSum'] = $this->getMyMIUser()->getUserInformation($this->cuID)['MyMIGCoinSum'];
        $this->data['walletID'] = $this->getMyMIUser()->getUserInformation($this->cuID)['walletID'];
        $this->data['cuPFBT'] = 'N/A';
        $this->data['getIncomeYTDSummary'] = $this->budgetModel->getIncomeYTDSummary($this->cuID);
        $this->data['incomeYTDSummaryFMT'] = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['incomeYTDSummaryFMT'] ?? 0;
        $this->data['expenseYTDSummaryFMT'] = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['expenseYTDSummaryFMT'] ?? 0;
        $this->data['ytdTotals'] = $this->budgetModel->getYTDTotals($this->cuID);
        $this->data['MyMICoinSum'] = $this->getMyMICoin()->getUserCoinTotal($this->cuID);
        $this->data['getUserBankAccounts'] = $this->accountsModel->getUserBankAccounts($this->cuID);
        $this->data['getUserCreditAccounts'] = $this->accountsModel->getUserCreditAccounts($this->cuID);
        $this->data['creditAvailable'] = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['creditAvailable'];
        $this->data['creditAvailableFMT'] = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['creditAvailableFMT'];
        $this->data['creditLimit'] = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['creditLimit'];
        $this->data['creditLimitFMT'] = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['creditLimitFMT'];
        $this->data['debtSummaryFMT'] = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['debtSummaryFMT'];
        $this->data['totalAccountBalance'] = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['totalAccountBalance'];
        $this->data['totalAccountBalanceFMT'] = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['totalAccountBalanceFMT'];
        $this->data['reporting'] = $this->getMyMIAnalytics()->reporting();
        $this->data['alertsInfo']                   = $this->getMyMIAlerts()->getAlertInfo();;
        
        if ($this->debug === 1) {
            // log_message('debug', 'BudgetController L107 - $ytdTotals: ' . print_r($this->budgetModel->getYTDTotals($this->cuID), true));
        }
        return $this->data;
}

    // Inside the AlertsController
    public function index()
    {
        // ── Page meta / lightweight dashboard data ─────────────────────────────
        $this->data['pageTitle'] = 'MyMI Alerts | Management | MyMI Wallet';

        $this->data['marketEvents']     = $this->getMyMIDashboard()->getUpcomingEconomicEvents();
        $this->data['advisorUserId']    = $this->cuID;

        // Budget snapshot
        $this->data['incomeYTDSummaryFMT']  = $this->userBudget['incomeYTDSummaryFMT']  ?? 0;
        $this->data['expenseYTDSummaryFMT'] = $this->userBudget['expenseYTDSummaryFMT'] ?? 0;
        $this->data['checkingSummaryFMT']   = $this->userBudget['checkingSummaryFMT']   ?? 0;
        $this->data['creditAvailableFMT']   = $this->userBudget['creditAvailableFMT']   ?? 0;
        $this->data['debtSummaryFMT']       = $this->userBudget['debtSummaryFMT']       ?? 0;
        $this->data['investSummaryFMT']     = $this->userBudget['investSummaryFMT']     ?? 0;
        $this->data['totalAccountBalance']  = $this->userBudget['totalAccountBalance']  ?? 0;

        // User context defaults
        $this->data['cuSolanaDW'] = $this->data['cuSolanaDW'] ?? [];
        $this->data['cuUserType'] = $this->data['cuUserType'] ?? '';

        // ── Search / pagination for Pending table (uses Management\Models\AlertsModel) ──
        $params = [
            'q'       => $this->request->getGet('q'),
            'page'    => $this->request->getGet('page'),
            'perPage' => $this->request->getGet('perPage'),
            'status'  => 'Opened',
        ];

        // Use the Management module model for the new methods without breaking your existing $this->alertsModel
        $pending   = $this->alertsModel->getPendingAlerts($params);

        // Expose to the view (keep legacy key for compatibility)
        $this->data['search']            = $params['q'] ?? '';
        $this->data['pending']           = $pending['data'];          // new key
        $this->data['pendingTradeAlerts']= $pending['data'];          // legacy key used by existing view(s)
        $this->data['total']             = $pending['total'];
        $this->data['page']              = $pending['page'];
        $this->data['perPage']           = $pending['perPage'];

        // Advisor media defaults + generation
        $advisorMedia                       = $this->getMyMIAdvisor()->generateAdvisorMediaPackage($this->cuID) ?? [];
        $advisorSummary                     = $advisorMedia['summary']        ?? '';
        $advisorScript                      = $advisorMedia['script']         ?? '';
        $advisorAudio                       = $advisorMedia['voiceover_url']  ?? '';
        $advisorCapcutUrl                   = $this->getMyMIAdvisor()->exportCapCutJsonTemplate($advisorMedia) ?? '';
        $advisorZipUrl                      = $this->getMyMIAdvisor()->packageAdvisorMediaAsZip($advisorMedia) ?? '';
        $advisorPick                        = $advisorMedia['pick']          ?? '';
        $this->data['advisorSummary']       = $pending['advisorSummary'];
        $this->data['advisorScript']        = $pending['advisorScript'];
        $this->data['advisorAudio']         = $pending['advisorAudio'];
        $this->data['advisorCapcutUrl']     = $pending['advisorCapcutUrl'];
        $this->data['advisorZipUrl']        = $pending['advisorZipUrl'];
        $this->data['advisorPick']          = $pending['advisorPick'];

        // ── Opportunistic CRON trigger based on idle timeout ───────────────────
        $lastActiveKey = sanitizeCacheKey('user_alerts_activity_' . $this->cuID);
        $lastActive = cache()->get($lastActiveKey);
        $now        = time();
        if (!$lastActive || ($now - $lastActive) > 900) { // 15 min
            cache()->save($lastActiveKey, $now, 3600);
            exec('php ' . FCPATH . 'spark trade:processAlerts > /dev/null 2>/dev/null &');
            log_message('debug', "Triggered processAlerts CRON for user {$this->cuID}");
        }

        // Call once to hydrate shared $this->data (theme/header/footer, etc.)
        $this->commonData();

        // Single, correct render target
        return $this->renderTheme('ManagementModule\Views\Alerts\index', $this->data);
    }

    // public function index()
    // {
    //     $this->data['pageTitle'] = 'MyMI Alerts | Management | MyMI Wallet';

    //     $this->data['pendingTradeAlerts'] = $this->alertsModel->getPendingTradeAlerts();
    //     $this->data['marketEvents'] = $this->getMyMIDashboard()->getUpcomingEconomicEvents();

    //     $regenerate = $this->request->getGet('regenerate');

    //     if ($regenerate) {
    //         $this->getMyMIAdvisor()->clearCachedAdvisorMedia($this->cuID); // optional cache bust
    //     }

    //     // Advisor Media Preview for Admin Review (Optional: limit to certain users)
    //     $advisorMedia = $this->getMyMIAdvisor()->prepareAdvisorMediaPackage($this->cuID);
        
    //     $this->data['advisorMedia'] = $advisorMedia; 
    //     $this->data['advisorPick'] = [
    //         'ticker' => $advisorMedia['ticker'] ?? null,
    //         'summary' => $advisorMedia['summary'] ?? null,
    //         'score' => $advisorMedia['score'] ?? null,
    //         'sentiment' => $advisorMedia['sentiment'] ?? null,
    //         'chart_url' => $advisorMedia['chart_url'] ?? null,
    //         'generated_on' => $advisorMedia['timestamp'] ?? null,
    //     ];
    //     $this->data['advisorSummary'] = $advisorMedia['summary'] ?? 'No advisor data available.';
    //     $this->data['advisorScript'] = $advisorMedia['script'] ?? '';
    //     $this->data['advisorAudio'] = $advisorMedia['voiceover_url'] ?? '';
    //     $this->data['advisorCapcutUrl'] = $this->getMyMIAdvisor()->exportCapCutJsonTemplate($advisorMedia);
    //     $this->data['advisorZipUrl'] = $this->getMyMIAdvisor()->packageAdvisorMediaAsZip($advisorMedia);

    //     // Budget Data
    //     $this->data['incomeYTDSummaryFMT'] = $this->userBudget['incomeYTDSummaryFMT'] ?? 0;
    //     $this->data['expenseYTDSummaryFMT'] = $this->userBudget['expenseYTDSummaryFMT'] ?? 0;
    //     $this->data['checkingSummaryFMT'] = $this->userBudget['checkingSummaryFMT'] ?? 0;
    //     $this->data['creditAvailableFMT'] = $this->userBudget['creditAvailableFMT'] ?? 0;
    //     $this->data['debtSummaryFMT'] = $this->userBudget['debtSummaryFMT'] ?? 0;
    //     $this->data['investSummaryFMT'] = $this->userBudget['investSummaryFMT'] ?? 0;
    //     $this->data['totalAccountBalance'] = $this->userBudget['totalAccountBalance'] ?? 0;
    //     $this->data['cuSolanaDW'] = $this->data['cuSolanaDW'] ?? [];
    //     $this->data['cuUserType'] = $this->data['cuUserType'] ?? '';

    //     $this->commonData();

    //     // Async cron trigger
    //     $lastActive = cache('user_alerts_activity_' . $this->cuID);
    //     $now = time();
    //     if (!$lastActive || ($now - $lastActive) > 300) {
    //         cache()->save('user_alerts_activity_' . $this->cuID, $now, 3600);
    //         exec('php ' . FCPATH . 'spark trade:processAlerts > /dev/null 2>/dev/null &');
    //     }

    //     return $this->renderTheme('ManagementModule\Views\Alerts\index', $this->data);
    // }
    
    // public function index()
    // {
    //     $this->data['pageTitle'] = 'MyMI Alerts | Management | MyMI Wallet';
    //     $pendingTradeAlerts = $this->alertsModel->getStaleTradeAlerts();
    
    //     $now = time();
    //     $alertsToUpdate = [];
    
    //     foreach ($pendingTradeAlerts as $alert) {
    //         $lastUpdated = strtotime($alert['updated_at'] ?? '1970-01-01 00:00:00');
    //         $hasExchange = !empty($alert['exchange']);
    
    //         if (!$hasExchange || ($now - $lastUpdated > 3600)) {
    //             $alertsToUpdate[] = $alert;
    //         }
    //     }
    
    //     // ✅ Limit how many are passed at once (optional)
    //     $alertsToUpdate = array_slice($alertsToUpdate, 0, 10);
    
    //     if (!empty($alertsToUpdate)) {
    //         $marketDataMap = $this->alertsModel->fetchBatchMarketData($alertsToUpdate);
    //     }
    
    //     $this->data['pendingTradeAlerts'] = $pendingTradeAlerts;
    //     $this->data['marketEvents'] = $this->getMyMIDashboard()->getUpcomingEconomicEvents();
    
    //     $this->data['incomeYTDSummaryFMT'] = $this->userBudget['incomeYTDSummaryFMT'] ?? 0;
    //     $this->data['expenseYTDSummaryFMT'] = $this->userBudget['expenseYTDSummaryFMT'] ?? 0;
    //     $this->data['checkingSummaryFMT'] = $this->userBudget['checkingSummaryFMT'] ?? 0;
    //     $this->data['creditAvailableFMT'] = $this->userBudget['creditAvailableFMT'] ?? 0;
    //     $this->data['debtSummaryFMT'] = $this->userBudget['debtSummaryFMT'] ?? 0;
    //     $this->data['investSummaryFMT'] = $this->userBudget['investSummaryFMT'] ?? 0;
    //     $this->data['totalAccountBalance'] = $this->userBudget['totalAccountBalance'] ?? 0;
    //     $this->data['cuSolanaDW'] = $this->data['cuSolanaDW'] ?? [];
    //     $this->data['cuUserType'] = $this->data['cuUserType'] ?? '';
    
    //     $this->commonData();
    
    //     return $this->renderTheme('ManagementModule\Views\Alerts\index', $this->data);
    // }    

    public function add($alertID = null)
    {
        if (!empty($alertID)) {
            $getAlertInformation = $this->alertsModel->getAlertInfo($alertID);
            foreach ($getAlertInformation as $alert) {
                $alertSymbol = $alert['ticker'];
            }
            $this->data['pageTitle'] = 'Add ' . $alertSymbol . ' Alert Details | Management | MyMI Wallet';
            $viewFileLink = 'ManagementModule\Views\Alerts\details';
        } else {
            $this->data['pageTitle'] = 'Add Trade Alert | Management | MyMI Wallet';
            $viewFileLink = 'ManagementModule\Views\Alerts\add';
        }
        $this->commonData();
        return $this->renderTheme($viewFileLink, $this->data);
    }

    public function addTradeAlert()
    {
        $post = $this->request->getPost();
    
        if (!isset($post['user_id'])) {
            return $this->respond([
                'status'  => 'error',
                'message' => 'Missing required user_id',
            ], 400);
        }
    
        $userID = intval($post['user_id']);
        $symbol = strtoupper(trim($post['symbol'] ?? ''));
        $entryPrice = floatval($post['entry_price'] ?? 0.00);
        $orderStatus = strtoupper($post['order_status'] ?? '');
    
        // 🧠 Auto-calculate stop/target if entry_price exists
        if ($entryPrice > 0) {
            $post['target_price'] = round($entryPrice * 1.03, 2); // 3% gain
            $post['locked_profit_stop'] = $post['target_price']; // lock that in
        }
    
        // 🧠 Inject AlphaVantage EMA values
        if (!empty($symbol)) {
            try {
                $emaFetcher = new \App\Libraries\MyMIAlphaVantage();
                $emaData = $emaFetcher->fetchEMAs($symbol);
                $post = array_merge($post, $emaData);
            } catch (\Throwable $e) {
                log_message('error', 'EMA Fetch Failed for ' . $symbol . ': ' . $e->getMessage());
            }
        }
    
        // 🧠 Build base alert array
        $data = [
            'user_id'             => $userID,
            'symbol'              => $symbol,
            'entry_price'         => $entryPrice,
            'order_status'        => $orderStatus,
            'trailing_stop_percent' => $post['trailing_stop_percent'] ?? null,
            'target_price'        => $post['target_price'] ?? null,
            'locked_profit_stop'  => $post['locked_profit_stop'] ?? null,
            'ema_9'               => $post['ema_9'] ?? null,
            'ema_21'              => $post['ema_21'] ?? null,
            'ema_34'              => $post['ema_34'] ?? null,
            'ema_48'              => $post['ema_48'] ?? null,
            'ema_100'             => $post['ema_100'] ?? null,
            'ema_200'             => $post['ema_200'] ?? null,
        ];
    
        // 🧠 Determine status based on order_status value
        $data['status'] = ($orderStatus === 'OPENING') ? 'Opened' : 'Closed';
        $data['occurrences'] = 1;
    
        // ✅ Save new alert
        $this->alertModel->addTrade($data);
    
        return $this->respond([
            'status'  => 'success',
            'message' => 'Trade alert created successfully.',
            'data'    => $data
        ]);
    }
    
    public function advisorMedia()
    {
        $this->data['pageTitle'] = 'MyMI Alerts | Management | MyMI Wallet';

        $this->data['pendingTradeAlerts'] = $this->alertsModel->getPendingTradeAlerts();
        $this->data['marketEvents'] = $this->getMyMIDashboard()->getUpcomingEconomicEvents();

        // Advisor Media Preview for Admin Review (Optional: limit to certain users)
        $advisorMedia = $this->getMyMIAdvisor()->generateAdvisorMediaPackage($this->cuID);
        $this->data['advisorSummary'] = $advisorMedia['summary'] ?? 'No advisor data available.';
        $this->data['advisorScript'] = $advisorMedia['script'] ?? '';
        $this->data['advisorAudio'] = $advisorMedia['voiceover_url'] ?? '';
        $this->data['advisorCapcutUrl'] = $this->getMyMIAdvisor()->exportCapCutJsonTemplate($advisorMedia);
        $this->data['advisorZipUrl'] = $this->getMyMIAdvisor()->packageAdvisorMediaAsZip($advisorMedia);

        // Budget Data
        $this->data['incomeYTDSummaryFMT'] = $this->userBudget['incomeYTDSummaryFMT'] ?? 0;
        $this->data['expenseYTDSummaryFMT'] = $this->userBudget['expenseYTDSummaryFMT'] ?? 0;
        $this->data['checkingSummaryFMT'] = $this->userBudget['checkingSummaryFMT'] ?? 0;
        $this->data['creditAvailableFMT'] = $this->userBudget['creditAvailableFMT'] ?? 0;
        $this->data['debtSummaryFMT'] = $this->userBudget['debtSummaryFMT'] ?? 0;
        $this->data['investSummaryFMT'] = $this->userBudget['investSummaryFMT'] ?? 0;
        $this->data['totalAccountBalance'] = $this->userBudget['totalAccountBalance'] ?? 0;
        $this->data['cuSolanaDW'] = $this->data['cuSolanaDW'] ?? [];
        $this->data['cuUserType'] = $this->data['cuUserType'] ?? '';

        $this->commonData();

        // Async cron trigger
        $lastActiveKey = sanitizeCacheKey('user_alerts_activity_' . $this->cuID);
        $lastActive = cache()->get($lastActiveKey);
        $now = time();
        if (!$lastActive || ($now - $lastActive) > 300) {
            cache()->save($lastActiveKey, $now, 3600);
            exec('php ' . FCPATH . 'spark trade:processAlerts > /dev/null 2>/dev/null &');
        }

        return $this->renderTheme('ManagementModule\Views\Alerts\resources\adisorMedias', $this->data);
    } 

    public function auditEmailScraper()
    {
        helper(['form', 'url']);

        $emails = $this->alertsModel->getLastScrapedEmails(100);
        $emailsFormatted = [];

        foreach ($emails as $email) {
            $decodedSubject = html_entity_decode($email['email_subject']);
            $tickers = $this->extractTickersFromSubject($decodedSubject);
            $email['decoded_subject'] = $decodedSubject;
            $email['extracted_tickers'] = $tickers;
            $emailsFormatted[] = $email;
        }


        // Advisor Media Preview for Admin Review (Optional: limit to certain users)
        $advisorMedia = $this->getMyMIAdvisor()->generateAdvisorMediaPackage($this->cuID);
        $this->data['advisorSummary'] = $advisorMedia['summary'] ?? 'No advisor data available.';
        $this->data['advisorScript'] = $advisorMedia['script'] ?? '';
        $this->data['advisorAudio'] = $advisorMedia['voiceover_url'] ?? '';
        $this->data['advisorCapcutUrl'] = $this->getMyMIAdvisor()->exportCapCutJsonTemplate($advisorMedia);
        $this->data['advisorZipUrl'] = $this->getMyMIAdvisor()->packageAdvisorMediaAsZip($advisorMedia);

        $this->data['emails'] = $emailsFormatted;
        $this->data['recordedEmails'] = $emailsFormatted;

        $this->data['title']   = 'Audit Scraper Results';
        $this->data['cuID']    = $this->cuID;
        // $this->data['cuRole']  = $this->cuRole;
        $this->data['emails'] = $emailsFormatted;
        $this->data['recordedEmails'] = $emailsFormatted;
        $this->data['filteredAlerts'] = $this->alertsModel->getFilteredTradeAlerts(); 

        $this->commonData();
        return $this->renderTheme('ManagementModule\Views\Alerts\batchEmailAudit', $this->data);
    }

    /**
     * Backfill categories for uncategorized alerts using scraper data.
     */
    public function backfillCategoriesFromScraper(int $windowMinutes = 15): array
    {
        $alerts = $this->db->table('bf_investment_trade_alerts')
            ->select('id, ticker, created_on, submitted_date, category')
            ->where('status', 'Opened')
            ->groupStart()->where('category', null)->orWhere('category', '')->groupEnd()
            ->orderBy('created_on', 'DESC')
            ->get()->getResultArray();

        $updated = 0; $checked = count($alerts);
        foreach ($alerts as $a) {
            $ts = $a['submitted_date'] ?? $a['created_on'];
            if (!$ts) { continue; }

            $start = date('Y-m-d H:i:s', strtotime($ts . ' -' . $windowMinutes . ' minutes'));
            $end   = date('Y-m-d H:i:s', strtotime($ts . ' +' . $windowMinutes . ' minutes'));

            $scrapers = $this->db->table('bf_investment_scraper')
                ->select('email_subject, email_body, email_date, content')
                ->where('email_date >=', $start)
                ->where('email_date <=', $end)
                ->orderBy('email_date', 'ASC')
                ->get()->getResultArray();

            $category = null;
            foreach ($scrapers as $s) {
                $hay = strtolower(($s['content'] ?? '') . ' ' . ($s['email_subject'] ?? '') . ' ' . ($s['email_body'] ?? ''));
                if (str_contains($hay, 'active buy')) { $category = 'Active Buy'; break; }
                if (str_contains($hay, 'active sell')) { $category = 'Active Sell'; break; }
                if (str_contains($hay, 'liquidity')) { $category = 'Liquidity Stocks'; break; }
            }

            if ($category) {
                $this->db->table('bf_investment_trade_alerts')->where('id', $a['id'])->update(['category' => $category]);
                $updated++;
            }
        }

        return ['checked' => $checked, 'updated' => $updated];
    }
    
    public function distributeAlert($alertID)
    {
        $alert = $this->alertsModel->getAlertById($alertID);
    
        if (!$alert) {
            log_message('error', "Alert ID {$alertID} not found.");
            return false;
        }
    
        // Distribute alert (e.g., send emails, generate promotions)
        $this->sendPromotionalEmail($alert);
        $this->alertsModel->incrementDistributedCount($alert['ticker']);
    
        log_message('info', "Alert distributed for ticker: {$alert['ticker']}");
        return true;
    }
        
    public function distributeAlerts() {
        $this->load->library('NotificationHandler'); // Assuming a NotificationHandler library exists

        $filters = $this->input->post('filters');
        $alerts = $this->alertsModel->fetchAlerts($filters);

        foreach ($alerts as $alert) {
            // Example of dynamic distribution
            $this->NotificationHandler->send(
                $alert['user_id'], // Recipient
                $alert['message'], // Message
                $alert['channel'] // Channel: email, SMS, etc.
            );
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['status' => 'success']));
    }  
    
    private function extractTickersFromSubject($subject)
    {
        preg_match_all('/\b[A-Z]{1,5}\b/', $subject, $matches);
        return implode(', ', array_unique($matches[0]));
    }

    public function fetchAndProcessEmails() {
        if ($this->getMyMIAlerts()->fetchAndStoreAlertsEmails()) {
            $this->alertsModel->processScrapedSymbols();
        }
    }  
    
    // Update your fetchAndStoreAlertsEmails method
    private function fetchAndStoreAlertsEmailsOrig()
    {
        $hostname = '{imap.dreamhost.com:993/imap/ssl}INBOX';
        $username = 'alerts@mymiwallet.com';
        $password = $this->API->emailPassword;

        $inbox = imap_open($hostname, $username, $password);

        if (!$inbox) {
            log_message('error', 'Cannot connect to email server: ' . imap_last_error());
            return false;
        }

        try {
            // Get the latest email date from the database
            $latestEmailDate = $this->alertsModel->getLatestEmailDate();
            $sinceDate = $latestEmailDate ? date("d-M-Y", strtotime($latestEmailDate)) : date("d-M-Y", strtotime("-1 days"));

            $emails = imap_search($inbox, 'SINCE "' . $sinceDate . '"');

            if ($emails) {
                $config = HTMLPurifier_Config::createDefault();
                $purifier = new HTMLPurifier($config);

                foreach ($emails as $email_number) {
                    $overview = imap_fetch_overview($inbox, $email_number, 0)[0];
                    $subject = $this->getMyMIMarketing()->convertToUtf8($overview->subject ?? '');
                    $date = date("Y-m-d H:i:s", strtotime($overview->date));
                    $sender = $overview->from ?? '';

                    $emailIdentifier = md5($subject . $date . $sender);
                    if ($this->alertsModel->isEmailProcessed($emailIdentifier)) {
                        log_message('info', 'Email already processed: ' . $emailIdentifier);
                        continue;
                    };                    

                    $decodedMessage = imap_fetchbody($inbox, $email_number, 1);
                    $sanitizedBody = $purifier->purify($decodedMessage);

                    preg_match_all('/\b[A-Z]{1,5}\b/', $sanitizedBody, $symbols);
                    $uniqueSymbols = array_unique($symbols[0]);
                    $symbolString = implode(', ', $uniqueSymbols);

                    $email_data = [
                        'status' => 'In Review',
                        'type' => 'Trade Alerts',
                        'summary' => $symbolString,
                        'email_date' => $date,
                        'email_subject' => $subject,
                        'email_body' => $symbolString,
                        'email_sender' => $sender,
                        'created_on' => date("Y-m-d H:i:s"),
                        'email_identifier' => $emailIdentifier
                    ];

                    if (!$this->alertsModel->storeAlerts($email_data)) {
                        log_message('error', 'Failed to store email data');
                    }
                }
                return true;
            } else {
                log_message('error', 'No new emails found');
            }
        } catch (Exception $e) {
            log_message('error', 'Exception occurred: ' . $e->getMessage());
        } finally {
            imap_close($inbox);
        }
        return false;
    }
    
    // private function fetchAndStoreAlertsEmails()
    // {
    //     $hostname = '{imap.dreamhost.com:993/imap/ssl}INBOX';
    //     $username = 'alerts@mymiwallet.com';
    //     $password = $this->API->emailPassword;

    //     $inbox = imap_open($hostname, $username, $password);

    //     if (!$inbox) {
    //         log_message('error', 'Cannot connect to email server: ' . imap_last_error());
    //         return false;
    //     }

    //     try {
    //         $latestEmailDate = $this->alertsModel->getLatestEmailDate();
    //         $sinceDate = $latestEmailDate ? date("d-M-Y", strtotime($latestEmailDate)) : date("d-M-Y", strtotime("-30 days"));

    //         $emails = imap_search($inbox, 'SINCE "' . $sinceDate . '"');

    //         if ($emails) {
    //             $config = \HTMLPurifier_Config::createDefault();
    //             $purifier = new \HTMLPurifier($config);

    //             foreach ($emails as $email_number) {
    //                 $overview = imap_fetch_overview($inbox, $email_number, 0)[0];
    //                 $subject = $this->getMyMIMarketing()->convertToUtf8($overview->subject ?? '');
    //                 $date = date("Y-m-d H:i:s", strtotime($overview->date));
    //                 $sender = $overview->from ?? '';

    //                 // Specific subject pattern for Active Buy or Sell Alert Scanner
    //                 if (preg_match('/Alert: New symbols?:.*was added to 0 - Active (Buy|Sell) Alert Scanner\./i', $subject, $matches)) {
    //                     $alertType = $matches[1]; // 'Buy' or 'Sell'
    //                 } else {
    //                     continue; // Skip emails not matching the pattern
    //                 }

    //                 $emailIdentifier = md5($subject . $date . $sender);

    //                 if ($this->alertsModel->isEmailProcessed($emailIdentifier)) {
    //                     continue;
    //                 }

    //                 $decodedMessage = imap_fetchbody($inbox, $email_number, 1);
    //                 $sanitizedBody = $purifier->purify($decodedMessage);

    //                 preg_match_all('/\b[A-Z]{1,5}\b/', $sanitizedBody, $symbols);
    //                 $uniqueSymbols = array_unique($symbols[0]);
    //                 $symbolString = implode(', ', $uniqueSymbols);

    //                 $email_data = [
    //                     'status' => 'In Review',
    //                     'type' => $alertType, // 'Buy' or 'Sell'
    //                     'summary' => $symbolString,
    //                     'email_date' => $date,
    //                     'email_subject' => $subject,
    //                     'email_body' => $sanitizedBody,
    //                     'email_sender' => $sender,
    //                     'created_on' => date("Y-m-d H:i:s"),
    //                     'email_identifier' => $emailIdentifier
    //                 ];

    //                 if (!$this->alertsModel->storeAlerts($email_data)) {
    //                     log_message('error', 'Failed to store email data');
    //                 }
    //             }
    //             return true;
    //         } else {
    //             log_message('error', 'No new emails found');
    //         }
    //     } catch (Exception $e) {
    //         log_message('error', 'Exception occurred: ' . $e->getMessage());
    //     } finally {
    //         imap_close($inbox);
    //     }
    //     return false;
    // }
    public function fetchAndStoreAlertsEmails()
    {
        $hostname = '{imap.dreamhost.com:993/imap/ssl}INBOX';
        $username = 'alerts@mymiwallet.com';
        $password = $this->emailPassword;
    
        $inbox = imap_open($hostname, $username, $password);
        if (!$inbox) {
            log_message('error', 'Cannot connect to email server: ' . imap_last_error());
            return false;
        }
        log_message('info', 'Successfully connected to the email server.');
    
        try {
            $emails = imap_search($inbox, 'UNSEEN');
            if (!$emails) {
                log_message('info', 'No new emails found.');
                return true;
            }
    
            foreach ($emails as $email_number) {
                $header = imap_headerinfo($inbox, $email_number);
                $body = imap_fetchbody($inbox, $email_number, 1.2);
                if (empty($body)) {
                    $body = imap_fetchbody($inbox, $email_number, 1);
                }
                log_message('info', 'Fetched email header: ' . print_r($header, true));
                log_message('info', 'Fetched email body: ' . $body);
    
                $emailData = $this->parseEmail($body);
                if ($emailData) {
                    log_message('info', 'Parsed email data: ' . print_r($emailData, true));
                    $insertResult = $this->alertsModel->storeAlerts($emailData);
                    if ($insertResult) {
                        log_message('info', 'Email stored successfully: ID ' . $insertResult);
                    } else {
                        log_message('error', 'Failed to store email in database: ' . print_r($emailData, true));
                    }
                } else {
                    log_message('error', 'Failed to parse email content: ' . $body);
                }
            }
        } catch (Exception $e) {
            log_message('error', 'Exception occurred: ' . $e->getMessage());
        } finally {
            imap_close($inbox);
        }
    
        return true;
    }
    
    public function fetchData()
    {
        if ($this->fetchAndStoreAlertsEmails()) {
            if ($this->debug === 1) {
                log_message('debug', 'AlertsController L180 - Emails Stored Successfully');
            }
            if ($this->processStoredEmails()) {
                if ($this->debug === 1) {
                    log_message('debug', 'AlertsController L182 - Emails Processed Successfully');
                }
                // if ($this->alertsModel->updateTradeAlertsWithCurrentPrices()) {
                //     log_message('error', 'AlertsController L186 - Alert Data Updated Successfully!');
                // } else {
                //     log_message('error', 'AlertsController L186 - Alert Data Not Updated Successfully!');
                // }
            } else {
                log_message('error', 'AlertsController L189 - Emails Not Processed Successfully!');
            }
        } else {
            log_message('error', 'AlertsController L192 - Emails Not Stored Successfully!');
        }
    }

    public function fetchEmails()
    {
        $hostname = '{imap.server.com:993/imap/ssl}INBOX';
        $username = 'alerts@mymiwallet.com';
        $password = 'your_password';

        $inbox = imap_open($hostname, $username, $password);
        $emails = imap_search($inbox, 'ALL');

        if ($emails) {
            $alertsModel = new AlertsModel();
            foreach ($emails as $email_number) {
                $message = imap_fetchbody($inbox, $email_number, 1);
                $alertData = $this->parseEmail($message);
                $alertsModel->save($alertData);  // Save to DB
            }
        }

        imap_close($inbox);
    }    
    
    public function fetchEmailAlerts() {
        if ($this->getMyMIAlerts()->fetchAndStoreAlertsEmails()) {
            if ($this->getMyMIAlerts()->processScrapedSymbols()) {
                return $this->respond(["status" => "success", "message" => "Emails fetched and processed successfully."]);
            }
            return $this->respond(["status" => "error", "message" => "Failed to process symbols."], 500);
        }
        return $this->respond(["status" => "error", "message" => "Failed to fetch emails."], 500);
    }

    private function fetchMarketData($ticker)
    {
        $apiKey = config('APISettings')->alphaVantageApiKey;
        $url = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$ticker}&apikey={$apiKey}";

        $response = file_get_contents($url);

        if ($response === false) {
            log_message('error', "Failed to fetch market data for ticker: {$ticker}");
            return null;
        }

        $data = json_decode($response, true);

        if (isset($data['Global Quote'])) {
            return [
                'price' => $data['Global Quote']['05. price'],
                'open' => $data['Global Quote']['02. open'],
                'high' => $data['Global Quote']['03. high'],
                'low' => $data['Global Quote']['04. low'],
                'volume' => $data['Global Quote']['06. volume'],
            ];
        }

        log_message('error', "Invalid market data for ticker: {$ticker}");
        return null;
    }

    public function fetchTickerDetails($symbol) {
        $tickerInfo = $this->alertsModel->getTickerInfo($symbol);

        if (!$tickerInfo) {
            $apiKey = $this->API->alphaVantageApiKey;
            $url = "https://www.alphavantage.co/query?function=OVERVIEW&symbol={$symbol}&apikey={$apiKey}";

            $response = file_get_contents($url);
            $data = json_decode($response, true);

            if (!empty($data)) {
                $newData = [
                    'symbol' => $symbol,
                    'name' => $data['Name'] ?? '',
                    'currency' => $data['Currency'] ?? '',
                    'exchange' => $data['Exchange'] ?? '',
                    'mic_code' => $data['MarketIdentificationCode'] ?? '',
                    'country' => $data['Country'] ?? '',
                    'type' => $data['AssetType'] ?? ''
                ];

                $this->alertsModel->insertTicker($newData);
                return $newData; // Optionally return new data or perform further actions
            }
        }

        return $tickerInfo; // Return the fetched or newly inserted ticker info
    } 

    public function getAlerts() {
        $filters = $this->input->get('filters'); // Get filters from request
        $page = $this->input->get('page') ?? 1;
        $limit = $this->input->get('limit') ?? 20;

        $this->load->model('AlertsModel');

        $alerts = $this->AlertsModel->fetchAlerts($filters, $page, $limit);
        $total = $this->AlertsModel->countAlerts($filters);

        // Response with alerts and pagination info
        $response = [
            'alerts' => $alerts,
            'pagination' => [
                'total' => $total,
                'page' => $page,
                'limit' => $limit
            ]
        ];

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function getFilteredAlerts()
    {
        //log_message('debug', '🔍 getFilteredAlerts - Request received.');
    
        $postData = $this->request->getPost();
        //log_message('debug', '📩 getFilteredAlerts - Received POST data: ' . json_encode($postData));
    
        // Check if timeRange exists
        $timeRange = $postData['timeRange'] ?? null;
        if (!$timeRange) {
            log_message('error', '❌ getFilteredAlerts - Missing timeRange parameter.');
            return $this->response->setJSON(['error' => 'Missing time range'])->setStatusCode(400);
        }
    
        // Generate date range
        $dateRange = $this->getDateRange($timeRange);
        if (!$dateRange) {
            log_message('error', '❌ getFilteredAlerts - Invalid timeRange: ' . $timeRange);
            return $this->response->setJSON(['error' => 'Invalid time range'])->setStatusCode(400);
        }
    
        //log_message('debug', '🗓 getFilteredAlerts - Generated date range: ' . json_encode($dateRange));
    
        // Fetch alerts from model
        $alerts = $this->alertsModel->getFilteredTradeAlerts($dateRange)->get()->getResultArray();
        
        if (empty($alerts)) {
            log_message('warning', '⚠️ getFilteredAlerts - No alerts found for date range: ' . json_encode($dateRange));
        } else {
            log_message('debug', '✅ getFilteredAlerts - Found ' . count($alerts) . ' alerts.');
        }
    
        $response = [
            'draw' => $postData['draw'] ?? 1,
            'recordsTotal' => count($alerts),
            'recordsFiltered' => count($alerts),
            'data' => $alerts
        ];
    
        //log_message('debug', '📤 getFilteredAlerts - Returning response: ' . json_encode($response));
        return $this->response->setJSON($response);
    }
       
    public function importTickers() {
        $file = $this->request->getFile('ticker_file');
        if ($file->isValid() && !$file->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $filepath);
    
            // Now read and process the file
            $file = fopen($filepath, "r");
            while (($row = fgetcsv($file, 10000, ",")) !== FALSE) {
                // Assuming CSV columns match the database fields in order
                $symbol = $row[0];
                $this->fetchTickerDetails($symbol); // Use the function created above to handle data insertion
            }
            fclose($file);
    
            // Optionally, add a message to session or return a response
            return redirect()->to('/Management/Alerts')->with('message', 'Tickers imported successfully');
        }
    }

    private function parseEmail($message) {
        $config = \HTMLPurifier_Config::createDefault();
        $purifier = new \HTMLPurifier($config);
        $sanitizedBody = $purifier->purify($message);
    
        preg_match_all('/\b[A-Z]{1,5}\b/', $sanitizedBody, $symbols);
        preg_match('/Alert:.*Active (Buy|Sell) Alert Scanner\./i', $sanitizedBody, $typeMatch);
    
        if (!empty($symbols[0]) && isset($typeMatch[1])) {
            return [
                'ticker'     => implode(', ', array_unique($symbols[0])),
                'type'       => $typeMatch[1],
                'created_on' => date('Y-m-d H:i:s'),
                'status'     => 'In Review'  // Set default status here!
            ];
        }
    
        log_message('error', 'Failed to parse email: ' . $message);
        return null;
    }
          

    private function prepareDataArray($requestData)
    {
        return [
            'ticker' => strtoupper(trim($requestData['ticker'])),
            'price' => floatval($requestData['price']),
            'volume' => intval($requestData['volume']),
            'type' => $requestData['alertType'],
            'details' => trim($requestData['details']),
            'created_on' => date("Y-m-d H:i:s"),
            'open' => $requestData['open'] ?? null,
            'high' => $requestData['high'] ?? null,
            'low' => $requestData['low'] ?? null,
            'change' => $requestData['change'] ?? null,
            'change_percent' => $requestData['change_percent'] ?? null,
            'market_cap' => $requestData['fdv'] ?? null,
            'exchange' => $requestData['exchange'] ?? null,
            'company' => $requestData['company'] ?? null,
            'link' => $requestData['link'] ?? null,
            'current_price' => $requestData['current_price'] ?? null,
            'potential_price' => $requestData['potential_price'] ?? null,
            'stop_loss' => $requestData['stop_loss'] ?? null,
            'stop_loss_percent' => $requestData['stop_loss_percent'] ?? null,
            'support' => $requestData['support'] ?? null,
            'max_entry' => $requestData['max_entry'] ?? null,
            'percent_change' => $requestData['percent_change'] ?? null,
            'last_updated' => date("Y-m-d H:i:s")
        ];
    }
    
    private function processStoredEmails()
    {
        if ($this->debug === 1) {
            // log_message('debug', 'Processing stored emails to extract symbols...');
        }
        $symbolCounts = $this->alertsModel->processSymbols();
        if ($this->debug === 1) {
            // log_message('debug', 'Symbol counts: ' . print_r($symbolCounts, true));
        }
        return true;
    }

    public function research() {
        $this->commonData(); 
        return $this->renderTheme('ManagementModule\Views\Alerts\research', $this->data);
    }

    public function sendTestEmail()
    {
        // Define the data for the test email
        $data = [
            'tradeId' => 'TID20241115001', // Example Trade ID
            'ticker' => 'AAPL', // Example Stock Symbol
            'tradeType' => 'Buy', // Buy or Sell
            'entryPrice' => 150.50, // Entry Price
            'targetPrice' => 160.00, // Target Price
            'stopLoss' => 145.00, // Stop Loss Price
            'alertDetails' => 'Apple stock shows bullish momentum. Entry recommended.', // Alert Details
            'date' => date('Y-m-d'), // Current Date
            'time' => date('H:i:s'), // Current Time
        ];

        // Initialize email service
        $email = Services::email();
        $email->setTo('testuser@example.com'); // Replace with your test recipient email
        $email->setFrom('noreply@MyMIWallet.com', 'MyMI Wallet - Trade Alerts');
        $email->setSubject('Test Trade Alert Email');

        // Generate email content using the template
        $emailContent = view('emails/layout', [
            'content' => view('emails/trade_alert', $data),
            'title' => 'Trade Alert',
        ]);
        $email->setMessage($emailContent);

        // Send the email and log the result
        if ($email->send()) {
            return redirect()->to('/TradeAlerts/Test')->with('message', 'Test email sent successfully.');
        } else {
            log_message('error', $email->printDebugger(['headers', 'subject', 'body']));
            return redirect()->to('/TradeAlerts/Test')->with('error', 'Failed to send test email.');
        }
    }

    public function sendTradeAlertEmail($tradeId)
    {
        // Fetch trade details based on tradeId (Example only)
        $tradeDetails = $this->alertsModel->getTradeDetails($tradeId);
    
        // Example data array (replace with dynamic values from the database)
        $data = [
            'tradeId' => $tradeDetails['id'],
            'ticker' => $tradeDetails['ticker'],
            'tradeType' => $tradeDetails['type'],
            'assetType' => $tradeDetails['category'],
            'entryPrice' => $tradeDetails['current_price'],
            'targetPrice' => $tradeDetails['potential_price'],
            'stopLoss' => $tradeDetails['stop_loss'],
            'alertDetails' => $tradeDetails['details'],
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
        ];
    
        // Initialize email service
        $email = Services::email();
        $email->setTo('premium.alerts@mymiwallet.com');
        $email->setFrom('noreply@MyMIWallet.com', 'MyMI Wallet - Trade Alerts');
        $email->setSubject('MyMI Wallet - New Trade Alert');
    
        // Generate email content using the template
        $emailContent = view('emails/trade_alert', $data);
        $email->setMessage($emailContent);
    
        // Send the email and log result
        if ($email->send()) {
            log_message('info', "Trade Alert Email Sent Successfully for Trade ID: $tradeId");
            return true;
        } else {
            log_message('error', $email->printDebugger(['headers', 'subject', 'body']));
            return false;
        }
    }  

    /**
     * Display a comprehensive stock overview page.
     */
    public function stockOverview($exchange, $symbol)
    {
        $this->commonData();
        $symbol = strtoupper($symbol);

        $data = [
            'exchange'      => strtoupper($exchange),
            'symbol'        => $symbol,
            'tickerInfo'    => $this->MyMIAlerts->getTickerDetails($symbol),
            'tradeAlerts'   => $this->MyMIAlerts->getAlertsBySymbol($symbol),
            'alertHistory'  => $this->MyMIAlerts->getAlertHistory($symbol),
            'scrapedEmails' => $this->MyMIAlerts->getScrapedEmailsBySymbol($symbol),
            'secFilings'    => $this->MyMISEC->getSECData($symbol),
        ];

        return $this->renderTheme('App\\Modules\\Management\\Views\\Alerts\\stockOverview', $data);
    }

    public function submitTradingView()
    {
        try {
            $payload = [
                'ticker'         => strtoupper(trim($this->request->getPost('ticker') ?? '')),
                'tv_title'       => trim($this->request->getPost('tv_title') ?? ''),
                'chart_link'     => trim($this->request->getPost('chart_link') ?? ''),
                'chart_image'    => trim($this->request->getPost('chart_image') ?? ''),
                'tv_description' => trim($this->request->getPost('tv_description') ?? ''),
                'category'       => trim($this->request->getPost('category') ?? ''),
            ];

            // Infer ticker from TV title if omitted (simple heuristic)
            if ($payload['ticker'] === '' && preg_match('/\b[A-Z]{1,5}\b/', $payload['tv_title'], $m)) {
                $payload['ticker'] = $m[0];
            }

            $model   = new \App\Modules\Management\Models\AlertsModel();
            $alertId = $model->submitTradingViewPost($payload);

            // Optional: trigger Discord (guards/dup-prevention should live in MyMIAlerts)
            try {
                $lib   = new \App\Libraries\MyMIAlerts();
                $alert = $model->db->table('bf_investment_trade_alerts')->where('id', $alertId)->get()->getRowArray();
                if (!empty($alert['chart_link'])) {
                    $lib->sendDiscordNotification($alert);
                }
            } catch (\Throwable $e) {
                log_message('warning', 'Discord notify skipped: ' . $e->getMessage());
            }

            return redirect()->to(site_url('Management/Alerts'))->with('message', 'TradingView post submitted.');
        } catch (\Throwable $e) {
            log_message('error', 'submitTradingView error: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function test()
    {
        $this->commonData(); 
        return $this->renderTheme('ManagementModule\Views\Alerts\test', $this->data);
    }

    public function testAlertEmail()
    {
        $tradeId = 1416;
        // Fetch trade details based on tradeId (Example only)
        $tradeDetails = $this->alertsModel->getTradeDetails($tradeId);
    
        // Example data array (replace with dynamic values from the database)
        $data = [
            'tradeId' => $tradeDetails['id'],
            'ticker' => $tradeDetails['ticker'],
            'tradeType' => $tradeDetails['type'],
            'assetType' => $tradeDetails['category'],
            'entryPrice' => $tradeDetails['current_price'],
            'targetPrice' => $tradeDetails['potential_price'],
            'stopLoss' => $tradeDetails['stop_loss'],
            'alertDetails' => $tradeDetails['details'],
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
        ];

        // Render the email content for preview
        $emailContent = view('emails/layout', [
            'content' => view('ManagementModule/Views/Alerts/emails/trade_alert', $data), // Pass the trade alert template as a subview
            'title' => 'MyMI Premium Trade Alert', // Title for the layout
        ]);

        // Return the rendered email view to the browser for preview
        return $this->response->setBody($emailContent);
    }

    public function testEmail()
    {
        $tradeId = 1416;
        // Fetch trade details based on tradeId (Example only)
        $tradeDetails = $this->alertsModel->getUserSingleTrades($tradeId);
    
        // Example data array (replace with dynamic values from the database)
        $data = [
            'tradeId' => $tradeDetails['id'],
            'ticker' => $tradeDetails['ticker'],
            'tradeType' => $tradeDetails['type'],
            'assetType' => $tradeDetails['category'],
            'entryPrice' => $tradeDetails['current_price'],
            'targetPrice' => $tradeDetails['potential_price'],
            'stopLoss' => $tradeDetails['stop_loss'],
            'alertDetails' => $tradeDetails['details'],
            'date' => $tradeDetails['submitted_date'],
            'time' => $tradeDetails['time'],
        ];

        // Render the email content for preview
        $emailContent = view('emails/layout', [
            'content' => view('ManagementModule\Views\Alerts\emails\trade_alerts', $data), // Pass the trade alert template as a subview
            'title' => $tradeDetails['ticker'] . ' | ' . $tradeDetails['type'] . ' Trade Alert | MyMI Wallet Alerts', // Title for the layout
            'siteSettings' => $this->siteSettings,
            'socialMedia' => $this->socialMedia,
        ]);

        // Return the rendered email view to the browser for preview
        return $this->response->setBody($emailContent);
    }

    public function trades()
    {
        $this->data['pageTitle']                    = 'MyMI Trade Alerts | Management | MyMI Wallet';
        $this->commonData();
        $this->renderTheme('App\Modules\Management\Views\Alerts\index', $this->data);
    }

    public function updateAlerts()
    {
        $alerts = $this->alertsModel->getPendingTradeAlerts();

        foreach ($alerts as $alert) {
            $ticker = $alert['ticker'];

            $marketData = $this->fetchMarketData($ticker);

            if ($marketData) {
                $updateData = [
                    'price' => $marketData['price'],
                    'open' => $marketData['open'],
                    'high' => $marketData['high'],
                    'low' => $marketData['low'],
                    'volume' => $marketData['volume'],
                ];

                $this->alertsModel->updateTrade($alert['id'], $updateData);
                log_message('info', "Alert updated for ticker: {$ticker}");
            } else {
                log_message('error', "Failed to fetch market data for ticker: {$ticker}");
            }
        }

        return true;
    }
    
    public function updateTradeChart()
    {
        $postData = $this->request->getPost();
        if (empty($postData['symbol']) || empty($postData['chart_url'])) {
            return $this->respond(['status' => 'error', 'message' => 'Missing symbol or chart URL'], 400);
        }
    
        $symbol = strtoupper(trim($postData['symbol']));
        $chartUrl = trim($postData['chart_url']);
    
        if ($this->alertsModel->updateTradeAlertWithChart($symbol, $chartUrl)) {
            return $this->respond(['status' => 'success', 'message' => 'Chart URL updated successfully']);
        } else {
            return $this->respond(['status' => 'error', 'message' => 'Failed to update chart URL'], 500);
        }
    }
    
    private function validateRequestData($data)
    {
        if (empty($data['ticker']) || empty($data['price']) || empty($data['volume']) || empty($data['alertType']) || empty($data['details'])) {
            log_message('error', 'Validation error: Missing required fields');
            return false;
        }
        if (!is_numeric($data['price'])) {
            log_message('error', 'Validation error: Price must be a numeric value');
            return false;
        }
        if (!ctype_digit($data['volume'])) {
            log_message('error', 'Validation error: Volume must be an integer');
            return false;
        }
        return true;
    }

    public function viewAlert($symbol = null, $tradeID = null)
    {
        $this->data['pageTitle'] = 'MyMI Alerts | Management | MyMI Wallet';
        // $this->data['pendingTradeAlerts'] = $this->getMyMIAlerts()->getPendingTradeAlerts();
        $pendingTradeAlerts = $this->alertsModel->getPendingTradeAlerts();
        $marketDataMap = $this->alertsModel->fetchBatchMarketData($pendingTradeAlerts);
        
        foreach ($pendingTradeAlerts as &$alert) {
            if (isset($marketDataMap[$alert['ticker']])) {
                $alert = array_merge($alert, $marketDataMap[$alert['ticker']]);
            }
        }
        $this->data['pendingTradeAlerts'] = $pendingTradeAlerts;        

        $this->data['marketEvents'] = $this->getMyMIDashboard()->getUpcomingEconomicEvents(); 
    
        // Explicitly set variables needed in views
        $this->data['incomeYTDSummaryFMT'] = $this->userBudget['incomeYTDSummaryFMT'] ?? 0;
        $this->data['expenseYTDSummaryFMT'] = $this->userBudget['expenseYTDSummaryFMT'] ?? 0;
        $this->data['checkingSummaryFMT'] = $this->userBudget['checkingSummaryFMT'] ?? 0;
        $this->data['creditAvailableFMT'] = $this->userBudget['creditAvailableFMT'] ?? 0;
        $this->data['debtSummaryFMT'] = $this->userBudget['debtSummaryFMT'] ?? 0;
        $this->data['investSummaryFMT'] = $this->userBudget['investSummaryFMT'] ?? 0;
        $this->data['totalAccountBalance'] = $this->userBudget['totalAccountBalance'] ?? 0;
        $this->data['cuSolanaDW'] = $this->data['cuSolanaDW'] ?? [];
        $this->data['cuUserType'] = $this->data['cuUserType'] ?? '';
        $this->commonData();
        
        // Update trade alerts with current market prices when this page is visited
        // $this->alertsModel->updateTradeAlertsWithCurrentPrices();

        // In your controller right before rendering the view
        // log_message('debug', 'Pending Trade Alerts: ' . print_r($this->data['pendingTradeAlerts'], true));
        return $this->renderTheme('ManagementModule\Views\Alerts\tradeDetails', $this->data);
    }

    public function viewTradeChart()
    {
        $symbol = $this->request->getGet('symbol') ?? 'AAPL'; // Get ticker from request
        $exchange = $this->request->getGet('exchange') ?? 'NASDAQ'; // Default exchange

        return $this->renderTheme('ManagementModule\Views\Alerts\resources\viewTradeChart', [
            'ticker' => $symbol,
            'exchange' => $exchange
        ]);
    }

    public function weeklyTopPerformance()
    {
        $this->response->setContentType('application/json');

        $limit = (int)($this->request->getGet('limit') ?? 10);
        $model = new \App\Modules\Management\Models\AlertsModel();

        return $this->response->setJSON([
            'status' => 'success',
            'data'   => $model->getWeeklyTopPerformance($limit),
        ]);
    }
}
?>
