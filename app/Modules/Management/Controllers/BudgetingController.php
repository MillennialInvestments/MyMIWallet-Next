<?php
// app/Modules/User/Controllers/DashboardController.php
namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use Myth\Auth\Authorization\GroupModel;
use App\Config\{Auth, SiteSettings, SocialMedia}; 
use App\Controllers\UserController;
use App\Libraries\{MyMIAnalytics, MyMIBudget, MyMICoin, MyMIDashboard, MyMIExchange, MyMIGold, MyMIUser, MyMIWallet, MyMIWallets};
use App\Models\{AccountsModel, BudgetModel, UserModel};
// use App\Modules\User\Libraries\{DashboardLibrary}; 
use CodeIgniter\API\ResponseTrait; // Import the ResponseTrait

#[\AllowDynamicProperties]
class BudgetingController extends UserController
{
    protected $auth;
    protected $helpers = ['auth', 'form', 'url'];
    protected $library;
    protected $session;
    protected $siteSettings;
    protected $uri;
    protected $MyMIAnalytics;
    protected $MyMIBudget;
    protected $MyMIDashboard;
    protected $MyMIGold;
    protected $MyMIUser;
    protected $MyMIWallet;
    protected $MyMIWallets;
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
        $this->API                                  = config('APISettings');
        $this->siteSettings                         = config('SiteSettings');
        $this->request                              = service('request'); 
        $this->session                              = Services::session(); 
        $this->debug                                = $this->siteSettings->debug; 
        $this->uri                                  = $this->request->getUri(); 
        $this->accountsModel                        = new AccountsModel(); 
        $this->budgetModel                          = new BudgetModel(); 
        $this->userModel                            = new UserModel(); 
//         $this->MyMIAnalytics                        = new MyMIAnalytics(); // replaced by BaseController getter 
//         $this->MyMIBudget                           = new MyMIBudget(); // replaced by BaseController getter 
//         $this->MyMICoin                             = new MyMICoin(); // replaced by BaseController getter
//         $this->MyMIDashboard                        = new MyMIDashboard(); // replaced by BaseController getter  
//         $this->MyMIGold                             = new MyMIGold(); // replaced by BaseController getter 
//         $this->MyMIUser                             = new MyMIUser(); // replaced by BaseController getter 
//         $this->MyMIWallet                           = new MyMIWallet(); // replaced by BaseController getter 
//         $this->MyMIWallets                          = new MyMIWallets(); // replaced by BaseController getter 
        // Check multiple sources for user ID
        $this->cuID = $this->userModel->getUserID()
            ?? $this->auth->id()
            ?? session('logged_in')
            ?? $this->session->get('user_id');
        $this->userAccount                          = $this->getMyMIUser()->getUserInformation($this->cuID); 
        $this->userAssessment                       = $this->getMyMIUser()->getUserFinancialAssessment($this->cuID);  
        $this->userBudget                           = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID); 
        $this->userDashboard                        = $this->getMyMIDashboard()->dashboardInfo($this->cuID); 
        $this->userWallets                          = $this->MyMIWallets->getUserWallets($this->cuID);  
        $this->reporting                            = $this->getMyMIAnalytics()->reporting($this->cuID);  
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
        
        if ($this->debug === 1) {
            // log_message('debug', 'BudgetController L107 - $ytdTotals: ' . print_r($this->budgetModel->getYTDTotals($this->cuID), true));
        }
        return $this->data;
}

    public function index()
    {
        $this->data['pageTitle'] = 'Budgeting | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Budgeting\index', $this->data);
    }

    public function Debt_Collector_Cleanup()
    {
        if ($this->budgetModel->debt_collector_cleanup()) {
            return redirect()->to('/Management')->with('message', 'Recurring Account updated to \'is_debt\' = 1.')->with('message_type', 'success');
        } else {
            return redirect()->to('/Management')->with('message', 'Account could not be deleted')->with('message_type', 'error');
        }
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
