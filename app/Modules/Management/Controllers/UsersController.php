<?php

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Authorization\GroupModel;
use App\Config\{Auth, SiteSettings, SocialMedia}; 
use Config\Services;
use App\Controllers\UserController;
use App\Libraries\{MyMIAnalytics, MyMIBudget, MyMICoin, MyMIDashboard, MyMIExchange, MyMIGold, MyMIReferrals, MyMISolana, MyMIUser, MyMIUsers, MyMIWallet, MyMIWallets};
use App\Models\{AccountsModel, BudgetModel, InvestmentModel, MarketingModel, MyMIGoldModel, UserModel, WalletModel};
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\API\RequestTrait;
use CodeIgniter\RESTful\ResourceController;

#[\AllowDynamicProperties]
class UsersController extends UserController
{
    use ResponseTrait;

    protected $auth;
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

    protected $marketingModel;
    protected $accountsModel;
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
//         $this->MyMIUser = new MyMIUser(); // replaced by BaseController getter 
//         $this->MyMIUsers = new MyMIUsers(); // replaced by BaseController getter 
//         $this->MyMIWallet = new MyMIWallet(); // replaced by BaseController getter 
//         $this->MyMIWallets = new MyMIWallets(); // replaced by BaseController getter 

        $this->marketingModel = new MarketingModel();
        $this->accountsModel = new AccountsModel();
        $this->budgetModel = new BudgetModel();
        $this->investmentModel = new InvestmentModel();
        $this->mymigoldModel = new MyMIGoldModel();
        $this->userModel = new UserModel(); 
        $this->walletModel = new WalletModel();

        $this->session = Services::session();
        $this->cuID = $this->auth->id() ?? $this->session->get('user_id');

        // $this->userAccount = $this->getMyMIUser()->getUserInformation($this->cuID); 
        // $this->userAssessment = $this->getMyMIUser()->getUserFinancialAssessment($this->cuID);  
        // $this->userBudget = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID); 
        // $this->userDashboard = $this->getMyMIDashboard()->dashboardInfo($this->cuID); 
        // $this->userWallets = $this->MyMIWallets->getUserWallets($this->cuID); 
    }

    public function commonData(): array
    {
        $this->data = parent::commonData();
        $this->data = $this->data ?? [];
        $cuID = getCuID();  // Get current user ID once
        $this->cuID = $cuID;  // Ensure $this->cuID is set for use elsewhere
        $userData = $this->getMyMIUser()->getUserInformation($cuID);  // ✅ Correct method call
     
        // Dashboard Info
        $dashboardInfo = $this->getMyMIDashboard()->dashboardInfo($this->cuID);
        $this->data['completedGoals'] = $dashboardInfo['progressGoalData']['completions'];
        // log_message('debug', 'DashboardController L104 - $pendingGoals - $dashboardInfo[progressGoalData][goals]: ' . (print_r($dashboardInfo['progressGoalData']['goals'], true)));
        $this->data['pendingGoals'] = $dashboardInfo['progressGoalData']['goals'];
        $this->data['promotionalBanners'] = $dashboardInfo['promotionalBanners'];
    
        // Merge the user data with BudgetController data
        $this->data = array_merge($this->data, $userData);
    
        $this->data['siteSettings'] = $this->siteSettings;
        $this->data['debug'] = $this->siteSettings->debug;
        $this->data['uri'] = $this->request->getUri();
        $this->data['userAgent'] = $this->request->getUserAgent();
        $this->data['date'] = $this->siteSettings->date;
        $this->data['time'] = $this->siteSettings->time;
        $this->data['cuID'] = $this->cuID;

        // Additional dynamic data from the service
        $this->data['getFeatures'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['getFeatures'];
        $this->data['totalAccountBalance'] = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['totalAccountBalance'];
        $this->data['totalAccountBalanceFMT'] = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['totalAccountBalanceFMT'];
        $this->data['completedGoals'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['progressGoalData']['completions'];
        $this->data['pendingGoals'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['progressGoalData']['goals'];
        $this->data['promotionalBanners'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['promotionalBanners'];
        $this->data['userBudget'] = $this->getMyMIBudget()->getUserBudget($this->cuID);
        $this->data['userWallets'] = $this->getMyMIWallets()->getUserWallets($this->cuID);  
        $this->data['reporting'] = $this->getMyMIAnalytics()->reporting($this->cuID);
        // Fetch Solana data
        $this->data['cuSolanaDW'] = $this->getMyMIDashboard()->getCryptoAccount($this->cuID, 'Solana')['accountInfo'];
        $this->data['solanaNetworkStatus'] = $this->MyMISolana->getUserSolana($this->cuID)['solanaNetworkStatus'];
        $this->data['cuSolanaTotal'] = $this->MyMISolana->getUserSolana($this->cuID)['cuSolanaTotal'] ?? 0;
        $this->data['cuSolanaValue'] = $this->MyMISolana->getUserSolana($this->cuID)['cuSolanaValue'] ?? 0;
        return $this->data;
}

    public function index()
    {
        $this->data['pageTitle']                    = 'MyMI Users | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Users\index', $this->data);
    }

    public function assets()
    {
        $this->data['pageTitle']                    = 'MyMI Users | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Alerts\index', $this->data);
    }
    
    public function ajaxBlockUser()
    {
        $userID = $this->request->getPost('user_id');
    
        if (!is_numeric($userID)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid user ID']);
        }
    
        $user = $this->userModel->find($userID);
    
        if (!$user) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'User not found']);
        }
    
        $updated = $this->userModel->update($userID, ['banned' => 1]);
    
        if ($updated) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'User successfully banned']);
        }
    
        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to ban user']);
    }
    
    public function ajaxBulkBanUsers()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403)->setJSON(['status' => 'error', 'message' => 'Invalid access.']);
        }
    
        $userIds = $this->request->getPost('user_ids');
    
        if (!is_array($userIds)) {
            return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'No users selected.']);
        }
    
        $success = $this->userModel->bulkBanUsers($userIds);
    
        return $this->response->setJSON([
            'status'  => $success ? 'success' : 'error',
            'message' => $success ? 'Users banned successfully.' : 'Failed to ban users.'
        ]);
    }
    
    public function blockUser($userID)
    {
        if ($this->userModel->blockUser($userID)) {
            return redirect()->to('/Management/Users')->with('message', 'User Blocked Successfully');
        }
    }

    public function distribute()
    {
        $this->data['pageTitle']                    = 'MyMI Users | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Alerts\index', $this->data);
    }

    public function exportUsers()
    {
        $tableName = 'users';
        $filePath = './public/assets/documents/Exports/Users/bf_users.csv';
        $this->csvexportmodel->saveTableToCsv($tableName, $filePath);
        $this->csvexport->export($filePath);
    }

    public function forceReset($userID)
    {
        if ($this->userModel->forceReset($userID)) {
            return redirect()->to('/Management/Users')->with('message', 'User Forced Reset Submitted Successfully');
        }
    }

    public function orders($userID)
    {
        $this->data['pageTitle']                    = 'MyMI Users | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Alerts\index', $this->data);
    }

    public function profile($userID = null)
    {
        $this->data['pageTitle']                    = 'User Management | MyMI Wallet | The Future of Finance';
        $this->commonData(); // Ensure this is correctly populating $this->data
        return $this->renderTheme('UserModule\Views\Dashboard\Profile', $this->data);
    }

    public function resendActivationCode($userID)
    {
        $currentUserID = $this->session->get('user_id');
        $user = $this->userModel->find($userID);

        if (!$user) {
            $logMsg = "User with ID {$userID} not found.";
            log_message('error', $logMsg);
            return redirect()->to("/Management/Users/Profile/{$userID}")->with('error', $logMsg);
        }

        if ($user->active === '1') {
            $logMsg = "User with ID {$userID} is already active.";
            log_message('error', $logMsg);
            return redirect()->to("/Management/Users/Profile/{$userID}")->with('error', $logMsg);
        }

        $activation = $this->userModel->setActivation($userID);
        $message = $activation['message'];
        $error = $activation['error'];

        if (!$error) {
            $emailer = Services::emailer();
            $emailMessageData = [
                'title' => $this->siteSettings->item('site.title'),
                'link' => site_url("/Account-Information/{$userID}")
            ];

            $data = [
                'to' => $user->email,
                'subject' => lang('us_account_active'),
                'message' => view('_emails/activated', $emailMessageData)
            ];

            if ($emailer->send($data)) {
                $logMsg = "Activation code resent to user with ID {$userID}.";
                log_message('info', $logMsg);
                return redirect()->to("/Management/Users/Profile/{$userID}")->with('message', $logMsg);
            } else {
                $logMsg = "Failed to send email to user with ID {$userID}.";
                log_message('error', $logMsg);
                return redirect()->to("/Management/Users/Profile/{$userID}")->with('error', $logMsg);
            }
        } else {
            $logMsg = "Failed to resend activation code to user with ID {$userID}.";
            log_message('error', $logMsg);
            return redirect()->to("/Management/Users/Profile/{$userID}")->with('error', $message);
        }
    }

    private function generateActivationCode()
    {
        return bin2hex(openssl_random_pseudo_bytes(16));
    }

    private function saveData($type = 'insert', $id = 0)
    {
        if ($type != 'insert') {
            if ($id == 0) {
                $id = $this->request->getVar('navbarID');
            }
            $this->request->setVar('id', $id);
            if ($this->request->getVar('id') != $id) {
                $this->validator->setRule('email', 'Invalid Navbar ID');
                return false;
            }
        }

        $validationRules = $this->dashboardModel->getValidationRules($type);
        if (!$this->validate($validationRules)) {
            return false;
        }

        $data = $this->dashboardModel->prepData($this->request->getPost());
        $result = false;

        if ($type == 'insert') {
            $id = $this->dashboardModel->insert($data);
            if (is_numeric($id)) {
                $result = $id;
            }
        } else {
            $result = $this->dashboardModel->update($id, $data);
        }

        return $result;
    }

    protected function setCurrentUser()
    {
        $auth = service('authentication');
        if ($auth->check()) {
            $this->currentUser = $auth->user();
            $this->currentUser->user_img = gravatar_link($this->currentUser->email, 22, $this->currentUser->email, "{$this->currentUser->email} Profile");
            if (isset($this->currentUser->language)) {
                config('App')->setLocale($this->currentUser->language);
            }
            view()->set('current_user', $this->currentUser);
        }
    }

    public function renderView(string $view, array $data = [])
    {
        $this->setCurrentUser();

        $data = array_merge([
            'pageName'     => 'Web_Design_Dashboard',
            'siteSettings' => $this->siteSettings,
        ], $data);

        return parent::renderView($view, $data);
    }

    private function addJsModule($module, $file)
    {
        $nonceAttr = $this->data['nonce']['script'] ?? '';
        $src       = base_url("assets/modules/{$module}/js/{$file}");

        $scriptTag = '<script' . ($nonceAttr ? ' ' . $nonceAttr : '') . ' src="' . $src . '"></script>';

        echo $scriptTag;
    }
}
