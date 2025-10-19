<?php

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;
use App\Controllers\UserController;
use App\Libraries\{MyMIAnalytics, MyMIBudget, MyMICoin, MyMIDashboard, MyMIExchange, MyMIGold, MyMIReferrals, MyMISolana, MyMIUser, MyMIUsers, MyMIWallet, MyMIWallets, MyMISecurity};
use App\Models\{AccountsModel, AnnouncementsModel, AnalyticalModel, BudgetModel, DesignModel, InvestmentModel, MarketingModel, MyMIGoldModel, UserModel, WalletModel};
use Config\Services;
use Myth\Auth\Authorization\GroupModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\API\RequestTrait;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\IncomingRequest;

#[\AllowDynamicProperties]
class WebDesignController extends UserController
{
    use ResponseTrait;
    use RequestTrait;

    protected $auth;
    protected $format;
    protected $helpers = ['auth', 'form', 'url'];
    protected $request;
    protected $session;
    protected $siteSettings;
    protected $template;
    protected $MyMIAnalytics;
    protected $MyMIBudget;
    protected $MyMICoin;
    protected $MyMIDashboard;
    protected $MyMIGold;
    protected $MyMIReferrals;
    protected $MyMISolana;
    protected $MyMIUser;
    protected $MyMIUsers;
    protected $MyMIWallet;
    protected $MyMIWallets;
    protected $MyMISecurity;
    protected $marketingModel;
    protected $accountsModel;
    protected $analyticalModel;
    protected $announcementsModel;
    protected $designModel;
    protected $budgetModel;
    protected $investmentModel;
    protected $mymigoldModel;
    protected $userModel;
    protected $walletModel;
    protected $userAccount;
    protected $userAssessment;
    protected $userBudget;
    protected $userDashboard;
    protected $userSolana;
    protected $userWallets;

    public function __construct()
    {
        $this->auth = service('authentication');
        $this->request = service('request');
        $this->siteSettings = config('SiteSettings');
        $this->debug = $this->siteSettings->debug;
//         $this->MyMIAnalytics = new MyMIAnalytics(); // replaced by BaseController getter
//         $this->MyMIBudget = new MyMIBudget(); // replaced by BaseController getter
//         $this->MyMICoin = new MyMICoin(); // replaced by BaseController getter
//         $this->MyMIDashboard = new MyMIDashboard(); // replaced by BaseController getter
//         $this->MyMIGold = new MyMIGold(); // replaced by BaseController getter
//         $this->MyMIReferrals = new MyMIReferrals(); // replaced by BaseController getter
//         $this->MyMISolana = new MyMISolana(); // replaced by BaseController getter
        $this->MyMIUser = service('MyMIUser');
//         $this->MyMIUsers = new MyMIUsers(); // replaced by BaseController getter
//         $this->MyMIWallet = new MyMIWallet(); // replaced by BaseController getter
//         $this->MyMIWallets = new MyMIWallets(); // replaced by BaseController getter
//         $this->MyMISecurity = new MyMISecurity(); // replaced by BaseController getter
        $this->marketingModel = new MarketingModel();
        $this->accountsModel = new AccountsModel();
        $this->analyticalModel = new AnalyticalModel();
        $this->announcementsModel = new AnnouncementsModel();
        $this->designModel = new DesignModel();
        $this->budgetModel = new BudgetModel();
        $this->investmentModel = new InvestmentModel();
        $this->mymigoldModel = new MyMIGoldModel();
        // $this->userModel = new UserModel();
        $this->walletModel = new WalletModel();
        $this->session = Services::session();
        
        $this->userAccount = $this->getMyMIUser()->getUserInformation($this->cuID);
        $this->userAssessment = $this->getMyMIUser()->getUserFinancialAssessment($this->cuID);
        $this->userBudget = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID);
        $this->userDashboard = $this->getMyMIDashboard()->dashboardInfo($this->cuID);
        $this->userWallets = $this->MyMIWallets->getUserWallets($this->cuID);
    }

    public function commonData(): array
    {
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
        return $this->data;
}

    public function index()
    {
        $this->data['pageTitle'] = 'Web Design | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Web_Design\index', $this->data);
    }

    public function contentCreator()
    {
        $this->data['pageTitle'] = 'Content Creator | Web Design | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Web_Design\content_creator', $this->data);
    }

    public function curlGenerator()
    {
        $this->data['pageTitle'] = 'CURL Generator | Web Design | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Web_Design\curl_generator', $this->data);
    }

    public function pages()
    {
        $this->data['pageTitle'] = 'Pages | Web Design | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Web_Design\pages', $this->data);
    }

    public function pageTemplate()
    {
        $this->data['pageTitle'] = 'Page Template | Web Design | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Web_Design\page_template', $this->data);
    }

    public function testPage()
    {
        $this->data['pageTitle'] = 'Test Page | Web Design | Management | MyMI Wallet';
        $this->commonData();
        $this->auth->restrict();
        return $this->renderTheme('App\Modules\Management\Views\Web_Design\test_page', $this->data);
    }

    public function testPageEmail()
    {
        $this->data['pageTitle'] = 'Test Page Email | Web Design | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Web_Design\test_page_email', $this->data);
    }

    public function testPageCB()
    {
        $this->data['pageTitle'] = 'Test Page CB | Web Design | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Web_Design\test_page_cb', $this->data);
    }

    public function sitemapGenerator()
    {
        $this->data['pageTitle'] = 'Sitemap Generator | Web Design | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Web_Design\sitemap_generator', $this->data);
    }

    public function basicUI()
    {
        $this->data['pageTitle'] = 'Basic UI | Web Design | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Web_Design\basic_ui', $this->data);
    }

    public function icons()
    {
        $this->data['pageTitle'] = 'Icons | Web Design | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Web_Design\icons', $this->data);
    }

    public function forms()
    {
        $this->data['pageTitle'] = 'Forms | Web Design | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Web_Design\forms', $this->data);
    }

    public function charts()
    {
        $this->data['pageTitle'] = 'Charts | Web Design | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Web_Design\charts', $this->data);
    }

    public function tables()
    {
        $this->data['pageTitle'] = 'Tables | Web Design | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Web_Design\tables', $this->data);
    }

    public function uiElements()
    {
        $this->data['pageTitle'] = 'UI Elements | Web Design | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Web_Design\ui_elements', $this->data);
    }

    public function emailTest()
    {
        $data = new \stdClass();
        $emailLink = $this->request->getPost('emailLink');
        $userEmail = 'tburks2392@gmail.com';
        $displayName = 'Tim';
        $alert = [
            'from' => 'support@mymillennialinvestments.com',
            'to' => $userEmail,
            'subject' => 'Test Email | Millennial Investments',
            'message' => view($emailLink)
        ];
        $this->emailer->send($alert);
        return redirect()->to('/Web-Design/Test-Page-Email')->with('message', 'Updated Successfully');
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
