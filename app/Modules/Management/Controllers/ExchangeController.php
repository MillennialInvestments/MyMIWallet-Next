<?php
// app/Modules/User/Controllers/DashboardController.php
namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use Myth\Auth\Authorization\GroupModel;
use App\Config\{Auth, SiteSettings, SocialMedia}; 
use App\Controllers\UserController;
use App\Libraries\{MyMIAnalytics, MyMIBudget, MyMICoin, MyMIDashboard, MyMIDexScreener, MyMIExchange, MyMIGold, MyMIReferrals, MyMISecurity, MyMISolana, MyMIUser, MyMIUsers, MyMIWallet, MyMIWallets, WebSocketClient};
use App\Models\{AccountsModel, AnalyticalModel, AnnouncementsModel, BudgetModel, ExchangeModel, InvestmentModel, MyMIGoldModel, SolanaModel, UserModel, WalletModel};
// use App\Modules\User\Libraries\{DashboardLibrary}; 
use CodeIgniter\API\ResponseTrait; // Import the ResponseTrait

#[\AllowDynamicProperties]
class ExchangeController extends UserController
{
    use ResponseTrait;

    protected $auth;
    protected $db;
    // Remove protected $format; to avoid conflict with ResponseTrait
    protected $helpers = ['auth', 'form', 'url'];
    protected $request;
    protected $session;
    protected $siteSettings;
    protected $template;
    protected $MyMIAnalytics;
    protected $MyMIBudget;
    protected $MyMICoin;
    protected $MyMIDashboard;
    protected $MyMIDexScreener;
    protected $MyMIExchange;
    protected $MyMIGold;
    protected $MyMIReferrals;
    protected $MyMISecurity;
    protected $MyMISolana;
    protected $MyMIUser;
    protected $MyMIUsers;
    protected $MyMIWallet;
    protected $MyMIWallets;
    // protected $marketingModel;
    protected $accountsModel;
    protected $analyticalModel;
    protected $announcementsModel;
    // protected $designModel;
    protected $budgetModel;
    protected $exchangeModel;
    protected $investmentModel;
    protected $mymigoldModel;
    protected $solanaModel;
    protected $userModel;
    protected $walletModel;
    protected $userAccount;
    protected $userAssessment;
    protected $userBudget;
    protected $userDashboard;
    protected $userSolana;
    protected $userWallets;
    protected $webSocketClient;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->auth = service('authentication');
        $this->request = service('request');
        $this->siteSettings = config('SiteSettings');
        $this->debug = $this->siteSettings->debug;
//         $this->MyMIAnalytics = new MyMIAnalytics(); // replaced by BaseController getter
//         $this->MyMIBudget = new MyMIBudget(); // replaced by BaseController getter
//         $this->MyMICoin = new MyMICoin(); // replaced by BaseController getter
//         $this->MyMIDashboard = new MyMIDashboard(); // replaced by BaseController getter
//         $this->MyMIDexScreener = new MyMIDexScreener($this->db); // replaced by BaseController getter
//         $this->MyMIExchange = new MyMIExchange(); // replaced by BaseController getter
//         $this->MyMIGold = new MyMIGold(); // replaced by BaseController getter
//         $this->MyMIReferrals = new MyMIReferrals(); // replaced by BaseController getter
//         $this->MyMISolana = new MyMISolana(); // replaced by BaseController getter
        $this->MyMIUser = service('MyMIUser');
//         $this->MyMIUsers = new MyMIUsers(); // replaced by BaseController getter
//         $this->MyMIWallet = new MyMIWallet(); // replaced by BaseController getter
//         $this->MyMIWallets = new MyMIWallets(); // replaced by BaseController getter
//         $this->MyMISecurity = new MyMISecurity(); // replaced by BaseController getter
        // $this->marketingModel = new MarketingModel();
        $this->accountsModel = new AccountsModel();
        $this->analyticalModel = new AnalyticalModel();
        $this->announcementsModel = new AnnouncementsModel();
        // $this->designModel = new DesignModel();
        $this->budgetModel = new BudgetModel();
        $this->exchangeModel = new ExchangeModel();
        $this->investmentModel = new InvestmentModel();
        $this->mymigoldModel = new MyMIGoldModel();
        $this->solanaModel = new SolanaModel();
        // $this->userModel = new UserModel();
        $this->walletModel = new WalletModel();
        $this->session = Services::session();
        
        $this->userAccount = $this->getMyMIUser()->getUserInformation($this->cuID);
        $this->userAssessment = $this->getMyMIUser()->getUserFinancialAssessment($this->cuID);
        $this->userBudget = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID);
        $this->userDashboard = $this->getMyMIDashboard()->dashboardInfo($this->cuID);
        $this->userWallets = $this->MyMIWallets->getUserWallets($this->cuID);
        // $this->webSocketClient = new WebSocketClient('https://solana-api.projectserum.com', 443); // Change host and port as necessary  
        $this->webSocketClient = new WebSocketClient('www.mymiwallet.com', 443, 'API/Solana/updatePrices');
    }

    public function commonData(): array {  
        $this->data = parent::commonData();
        $this->data['request'] = $this->request;
        $this->data['siteSettings'] = $this->siteSettings;
        $this->data['beta'] = (string) $this->siteSettings->beta;
        $this->data['uri'] = $this->request->getUri();
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
        $this->data['exchangeAssets'] = $this->MyMIExchange->getAssets(); 
        if ($this->debug === 1) {
            // log_message('debug', 'BudgetController L107 - $ytdTotals: ' . print_r($this->budgetModel->getYTDTotals($this->cuID), true));
        }
        return $this->data;
}

    public function index()
    {
        $this->data['pageTitle'] = 'Exchange | Management | MyMI Wallet';
        $this->commonData(); 
        return $this->renderTheme('App\Modules\Management\Views\Exchange\index', $this->data);
    }

    public function assets()
    {
        $this->data['pageTitle'] = 'Exchange | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Exchange\assets', $this->data);
    }

    public function markTransactionAsSuspicious($id)
    {
        $reason = $this->request->getPost('reason');
        $reportedBy = $this->cuID;
        $this->MyMIExchange->flagTransactionAsSuspicious($id, $reason, $reportedBy);
        return redirect()->back()->with('message', 'Transaction marked as suspicious.');
    }

    public function suspiciousTransactions()
    {
        $data['suspiciousTransactions'] = $this->MyMIExchange->getSuspiciousTransactions();
        $data['totalSuspiciousTransactions'] = $this->MyMIExchange->getSuspiciousTransactionCount();
        $this->commonData(); 
        return $this->renderTheme('App\Modules\Management\Views\Exchange\Suspicious_Transactions', $this->data);
    }

    public function triggerWebSocket() {
        try {
            $this->webSocketClient = new WebSocketClient('127.0.0.1', 8080);
            $this->webSocketClient->connect();
            $message = json_encode(['method' => 'updateMarketPrices', 'params' => []]);
            $response = $this->webSocketClient->sendMessage($message);
            $marketData = json_decode($response, true);
            log_message('debug', 'ExchangeController - $marketData array: ' . print_r($marketData, true));
            $this->solanaModel->updateMarketData($marketData);
            $this->webSocketClient->close();
            return $this->response->setJSON(['status' => 'success']);
        } catch (\Exception $e) {
            log_message('error', 'Failed to fetch real-time data: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    protected function fetchRealTimeData() {
        try {
            $message = json_encode(['method' => 'updateMarketPrices', 'params' => []]);
            $response = $this->webSocketClient->sendMessage($message);
            $marketData = json_decode($response, true);
            log_message('debug', 'ExchangeController - $marketData array: ' . print_r($marketData, true));
            $this->solanaModel->updateMarketData($marketData);
            $this->data['solanaMarketData'] = $marketData;
        } catch (\Exception $e) {
            log_message('error', 'Failed to fetch real-time data: ' . $e->getMessage());
        }
    }

    public function updatePrices()
    {
        $this->MyMIDexScreener->updateMarketPrices();
        return $this->response->setJSON(['status' => 'success']);
    }

    // protected function fetchRealTimeData()
    // {
    //     try {
    //         $message = json_encode([
    //             'method' => 'getMarketData',
    //             'params' => [],
    //             'id' => 1
    //         ]);
    //         $response = $this->webSocketClient->sendMessage($message);
    //         $marketData = json_decode($response, true);
    //         log_message('debug', 'ExchangeController L517 - $marketData array: ' . (print_r($marketData, true))); 
            
    //         // Save or update market data in the database
    //         $this->solanaModel->updateMarketData($marketData);

    //         $this->data['solanaMarketData'] = $marketData;
    //     } catch (Exception $e) {
    //         log_message('error', 'Failed to fetch real-time data: ' . $e->getMessage());
    //     }
    // }

    // protected function fetchRealTimeData()
    // {
    //     try {
    //         $message = json_encode(['method' => 'updateMarketPrices', 'params' => []]);
    //         $response = $this->webSocketClient->sendMessage($message);
    //         $marketData = json_decode($response, true);
    //         log_message('debug', 'ExchangeController - $marketData array: ' . print_r($marketData, true));
    //         $this->solanaModel->updateMarketData($marketData);
    //         $this->data['solanaMarketData'] = $marketData;
    //     } catch (\Exception $e) {
    //         log_message('error', 'Failed to fetch real-time data: ' . $e->getMessage());
    //     }
    // }

    public function __destruct()
    {
        $this->webSocketClient->close();
    }

    private function saveData($type = 'insert', $id = 0)
    {
        if ($type !== 'insert' && $id === 0) {
            return false;
        }
        $validation = \Config\Services::validation();
        $rules = $this->dashboard_model->getValidationRules($type);
        if (!$this->validate($rules)) {
            return false;
        }
        $data = $this->dashboard_model->prepData($this->request->getPost());
        if ($type === 'insert') {
            $result = $this->dashboard_model->insert($data);
        } else {
            $result = $this->dashboard_model->update($id, $data);
        }
        return $result;
    }

    protected function set_current_user()
    {
        if (class_exists('Auth')) {
            if ($this->auth->check()) {
                $this->data['current_user'] = $this->auth->user();
                $this->data['current_user']->user_img = gravatar_link($this->data['current_user']->email, 22, $this->data['current_user']->email, "{$this->data['current_user']->email} Profile");
                if (isset($this->data['current_user']->language)) {
                    $this->config->set('language', $this->data['current_user']->language);
                }
            } else {
                $this->data['current_user'] = null;
            }
        }
    }
}
