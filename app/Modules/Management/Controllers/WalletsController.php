<?php

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Authorization\GroupModel;
use App\Config\{Auth, SiteSettings, SocialMedia}; 
use Config\Services;
use App\Controllers\UserController;
use App\Libraries\{MyMIAnalytics, MyMIBudget, MyMICoin, MyMIDashboard, MyMIExchange, MyMIGold, MyMIReferrals, MyMISolana, MyMIUser, MyMIUsers, MyMIWallet, MyMIWallets};
use App\Models\{AccountsModel, BudgetModel, InvestmentModel, MarketingModel, MyMIGoldModel, UserModel, WalletModel};
use CodeIgniter\API\ResponseTrait; // Import the ResponseTrait
use CodeIgniter\API\RequestTrait; // Import the ResponseTrait
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\IncomingRequest;

#[\AllowDynamicProperties]
class WalletsController extends UserController
{
    // Controller Settings
    protected $auth;
    protected $format;
    protected $helpers = ['auth', 'form', 'url'];
    protected $request;
    protected $session;
    protected $siteSettings;
    protected $template;
    // Libraries
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
    // Models
    protected $marketingModel;
    protected $accountsModel;
    protected $budgetModel;
    protected $investmentModel;
    protected $mymigoldModel;
    protected $userModel;
    protected $walletModel;
    // User Account
    protected $userAccount;
    protected $userAssessment;
    protected $userBudget;
    protected $userDashboard;
    protected $userSolana;
    protected $userWallets; 
    
    public function __construct()
    {
        // Set Controller Settings
        $this->auth                                 = service('authentication'); // Use the 'authentication' service
        $this->request                              = service('request'); 
        $this->siteSettings                         = config('SiteSettings');
        $this->debug                                = $this->siteSettings->debug; 
        // Set Libraries
//         $this->MyMIAnalytics                        = new MyMIAnalytics(); // replaced by BaseController getter 
//         $this->MyMIBudget                           = new MyMIBudget(); // replaced by BaseController getter 
//         $this->MyMICoin                             = new MyMICoin(); // replaced by BaseController getter 
//         $this->MyMIDashboard                        = new MyMIDashboard(); // replaced by BaseController getter 
//         $this->MyMIGold                             = new MyMIGold(); // replaced by BaseController getter 
//         $this->MyMIReferrals                        = new MyMIReferrals(); // replaced by BaseController getter
//         $this->MyMIUser                             = new MyMIUser(); // replaced by BaseController getter 
//         $this->MyMIUsers                            = new MyMIUsers(); // replaced by BaseController getter 
//         $this->MyMIWallet                           = new MyMIWallet(); // replaced by BaseController getter 
//         $this->MyMIWallets                          = new MyMIWallets(); // replaced by BaseController getter 
        // Set Models
        $this->marketingModel                       = new MarketingModel();
        $this->accountsModel                        = new AccountsModel();
        $this->budgetModel                          = new BudgetModel();
        $this->investmentModel                      = new InvestmentModel();
        $this->mymigoldModel                        = new MyMIGoldModel();
        $this->userModel                            = new UserModel(); 
        $this->walletModel                          = new WalletModel();
        // Set Current User
        $this->session                              = Services::session();
        // log_message('debug', 'UsersController L84 - $this->auth: ' . (print_r($this->auth->id(), true))); 
        $this->cuID                                 = $this->auth->id() ?? $this->session->get('user_id');
        // log_message('debug', 'UsersController L86 - $this->cuID: ' . $this->cuID); 
        $this->userAccount                          = $this->getMyMIUser()->getUserInformation($this->cuID); 
        $this->userAssessment                       = $this->getMyMIUser()->getUserFinancialAssessment($this->cuID);  
        $this->userBudget                           = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID); 
        $this->userDashboard                        = $this->getMyMIDashboard()->dashboardInfo($this->cuID); 
        $this->userWallets                          = $this->MyMIWallets->getUserWallets($this->cuID); 
    }

    public function commonData(): array {
        $this->data = parent::commonData();
        $this->data['request']                      = $this->request;
        $this->data['siteSettings']                 = $this->siteSettings;
        $this->data['beta']                         = (string) $this->siteSettings->beta;
        $this->data['uri']                          = $this->request->getUri(); 
        $this->data['userAgent']                    = $this->request->getUserAgent();
        
        $this->data['cuID']                         = $this->cuID;
        $this->data['checkingSummaryFMT']           = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['checkingSummaryFMT'];
        $this->data['totalAccountBalance']          = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['totalAccountBalance'];
        $this->data['totalAccountBalanceFMT']       = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['totalAccountBalanceFMT'];
        $this->data['cuSolanaDW']                   = $this->getMyMIDashboard()->getCryptoAccount($this->cuID, 'Solana')['accountInfo'];
        $this->data['getFeatures']                  = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['getFeatures'];
        $this->data['completedGoals']               = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['progressGoalData']['completions'];
        $this->data['pendingGoals']                 = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['progressGoalData']['goals'];
        $this->data['promotionalBanners']           = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['promotionalBanners'];
        $this->data['cuRole']                       = $this->getMyMIUser()->getUserInformation($this->cuID)['cuRole'] ?? 4;
        $this->data['cuUserType']                   = $this->getMyMIUser()->getUserInformation($this->cuID)['cuUserType'] ?? '';
        $this->data['cuEmail']                      = $this->getMyMIUser()->getUserInformation($this->cuID)['cuEmail'] ?? '';
        $this->data['cuDisplayName']                = $this->getMyMIUser()->getUserInformation($this->cuID)['cuDisplayName'] ?? '';
        $this->data['cuUsername']                   = $this->getMyMIUser()->getUserInformation($this->cuID)['cuUsername'] ?? '';
        $this->data['cuNameInitials']               = $this->getMyMIUser()->getUserInformation($this->cuID)['cuNameInitials'] ?? '';
        $this->data['cuKYC']                        = $this->getMyMIUser()->getUserInformation($this->cuID)['cuKYC'] ?? '';
        $this->data['cuWalletID']                   = $this->getMyMIUser()->getUserInformation($this->cuID)['cuWalletID'];
        $this->data['cuWalletCount']                = $this->getMyMIUser()->getUserInformation($this->cuID)['cuWalletCount'];
        $this->data['MyMIGCoinSum']                 = $this->getMyMIUser()->getUserInformation($this->cuID)['MyMIGCoinSum'];
        $this->data['walletID']                     = $this->getMyMIUser()->getUserInformation($this->cuID)['walletID'];
        $this->data['cuPFBT']                       = 'N/A';
        $this->data['getIncomeYTDSummary']          = $this->budgetModel->getIncomeYTDSummary($this->cuID);
        $this->data['ytdTotals']                    = $this->budgetModel->getYTDTotals($this->cuID);
        $this->data['MyMICoinSum']                  = $this->getMyMICoin()->getUserCoinTotal($this->cuID);
        $this->data['getUserBankAccounts']          = $this->accountsModel->getUserBankAccounts($this->cuID);
        $this->data['getUserCreditAccounts']        = $this->accountsModel->getUserCreditAccounts($this->cuID);
        $this->data['creditAvailable']              = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['creditAvailable'];
        $this->data['creditAvailableFMT']           = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['creditAvailableFMT'];
        $this->data['creditLimit']                  = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['creditLimit'];
        $this->data['creditLimitFMT']               = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['creditLimitFMT'];
        $this->data['debtSummaryFMT']               = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['debtSummaryFMT'];
        $this->data['totalAccountBalance']          = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['totalAccountBalance'];
        $this->data['totalAccountBalanceFMT']       = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['totalAccountBalanceFMT'];
        $this->data['reporting']                    = $this->getMyMIAnalytics()->reporting(); 
        
        // $this->data['userAccount']                  = $this->userAccount;
        // $this->data['userDashboard']                = $this->userDashboard;
        return $this->data;
}

    public function index()
    {
        $this->data['pageTitle'] = 'Wallets | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Wallets\index', $this->data);
    }

    public function generateWallets()
    {
        $this->data['pageTitle'] = 'Generate Wallets | Management | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\Management\Views\Wallets\generate_wallets', $this->data);
    }

    public function amlMonitoring()
    {
        $suspiciousActivities = $this->getMyMIAnalytics()->getSuspiciousActivities();
        $largeTransactions = $this->getMyMIAnalytics()->getLargeTransactions();

        $this->data['suspiciousActivities'] = $suspiciousActivities;
        $this->data['largeTransactions'] = $largeTransactions;

        $this->data['pageTitle'] = 'AML Monitoring';
        return $this->renderTheme('App\Modules\Management\Views\Wallets\aml_monitoring', $this->data);
    }

    public function amlForm() {
        $this->data['pageTitle']            = 'AML Review/Verification | MyMI Wallet | The Future of Finance';
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Account\aml_form', $this->data);
    }

    public function complianceForm() {
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Account\compliance_form', $this->data);
    }

    public function submitCompliance() {
        $data = $this->request->getPost();
        if ($this->accountsModel->insertCompliance($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Compliance submitted successfully']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to submit Compliance']);
        }
    }

    public function submitAML() {
        $data = $this->request->getPost();
        if ($this->accountsModel->insertAML($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'AML submitted successfully']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to submit AML']);
        }
    }

    public function largeTransactionReview($transactionId)
    {
        $transactionDetails = $this->getMyMIAnalytics()->getTransactionDetails($transactionId);
        $this->data['transactionDetails'] = $transactionDetails;
        $this->data['pageTitle'] = 'Review Large Transaction';
        return $this->renderTheme('App\Modules\Management\Views\Wallets\large_transaction_review', $this->data);
    }

    public function kycForm() {
        $this->data['pageTitle']            = 'KYC Verification | MyMI Wallet | The Future of Finance';
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Account\kyc_form', $this->data);
    }

    public function submitKYC() {
        $data = $this->request->getPost();
        if ($this->accountsModel->insertKYC($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'KYC submitted successfully']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to submit KYC']);
        }
    }

    public function suspiciousActivityReview($activityId)
    {
        $activityDetails = $this->getMyMIAnalytics()->getActivityDetails($activityId);
        $this->data['activityDetails'] = $activityDetails;
        $this->data['pageTitle'] = 'Review Suspicious Activity';
        return $this->renderTheme('App\Modules\Management\Views\Wallets\suspicious_activity_review', $this->data);
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

    /**
     * Run reconciliation and show a simple report.
     * Route:  GET /Management/Wallets/Reconcile
     */


    /**
     * Press-a-button reconciliation: scans bf_users_wallet and ensures every wallet
     * has a corresponding row in its subsidiary table. Returns a simple HTML report.
     */
    public function reconcile()
    {
        $m = new WalletModel();
        $report = $m->reconcileWallets();

        // very basic HTML (replace with a view if you prefer)
        $html = '<div class="container my-4">';
        $html .= '<h3>Wallet Reconciliation Report</h3>';

        $html .= '<h5 class="mt-4">Created Subsidiary Rows ('.count($report['created']).')</h5>';
        $html .= $this->renderTable($report['created']);

        $html .= '<h5 class="mt-4">Existing Subsidiary Rows ('.count($report['existing']).')</h5>';
        $html .= $this->renderTable($report['existing']);

        $html .= '<h5 class="mt-4 text-warning">Incomplete Rows ('.count($report['incomplete']).')</h5>';
        $html .= $this->renderTable($report['incomplete'], true);

        if (!empty($report['errors'])) {
            $html .= '<h5 class="mt-4 text-danger">Errors ('.count($report['errors']).')</h5>';
            $html .= '<pre>'.esc(print_r($report['errors'], true)).'</pre>';
        }

        $html .= '</div>';
        return $html;
    }

    private function renderTable(array $rows, bool $withActions = false): string
    {
        if (!$rows) return '<p>No rows.</p>';

        $out = '<div class="table-responsive"><table class="table table-sm table-bordered">';
        $out .= '<thead><tr>';
        $cols = array_keys($rows[0]);
        foreach ($cols as $c) {
            $out .= '<th>'.esc($c).'</th>';
        }
        if ($withActions) {
            $out .= '<th>Actions</th>';
        }
        $out .= '</tr></thead><tbody>';

        foreach ($rows as $r) {
            $out .= '<tr>';
            foreach ($cols as $c) {
                $v = $r[$c] ?? '';
                $out .= '<td>'.esc(is_array($v) ? json_encode($v) : (string)$v).'</td>';
            }
            if ($withActions) {
                $uid = (int)($r['user_id'] ?? 0);
                $wid = (int)($r['wallet_id'] ?? 0);
                $editUrl = site_url('Dashboard/Transaction-Modal/Edit/'. $this->guessEditEndpoint($r) .'/'. ($wid ?: ($r['id'] ?? 0)));
                $emailUrl = site_url('Management/Wallets/NotifyUserMissingInfo/'. $uid .'/'. ($wid ?: ($r['id'] ?? 0)));
                $out .= '<td>
                    <a class="btn btn-primary btn-sm" target="_blank" href="'.esc($editUrl).'">Open Edit</a>
                    <a class="btn btn-outline-secondary btn-sm ml-2" href="'.esc($emailUrl).'">Email User</a>
                </td>';
            }
            $out .= '</tr>';
        }
        $out .= '</tbody></table></div>';
        return $out;
    }

    private function guessEditEndpoint(array $row): string
    {
        $t = $row['__table'] ?? '';
        return match ($t) {
            'bf_users_bank_accounts'   => 'editBankAccount',
            'bf_users_credit_accounts' => 'editCreditAccount',
            'bf_users_debt_accounts'   => 'editDebtAccount',
            'bf_users_invest_accounts' => 'editInvestAccount',
            'bf_users_crypto_accounts' => 'editCryptoAccount',
            default                    => 'editBankAccount'
        };
    }

    /**
     * Example: click-to-email user about missing info (implement with your EmailService)
     */
    public function NotifyUserMissingInfo(int $userId, int $walletId)
    {
        // TODO: inject/use your EmailService to send a templated email
        log_message('info', "NotifyUserMissingInfo: user={$userId} wallet={$walletId}");
        return redirect()->back()->with('message', 'User has been notified.');
    }

    /**
     * Optional: endpoint to email a user about a broken/missing account row.
     * Route: POST /Management/Wallets/NotifyUser
     * POST payload: user_id, wallet_id, subsidiary, edit_url
     */
    public function notifyUser()
    {
        $userId     = (int) ($this->request->getPost('user_id') ?? 0);
        $walletId   = (int) ($this->request->getPost('wallet_id') ?? 0);
        $editUrl    = (string) ($this->request->getPost('edit_url') ?? '');

        if (!$userId || !$walletId || !$editUrl) {
            return $this->response->setJSON(['status'=>'error','message'=>'Missing fields'])->setStatusCode(422);
        }

        // Plug into your EmailService here if you like.
        // $this->emailService->sendMissingInfoEmail($userId, $walletId, $editUrl);

        return $this->response->setJSON(['status' => 'ok', 'message' => 'Notification queued']);
    }

    public function emailUserAboutIssue(int $userId, int $walletId): ResponseInterface
    {
        helper(['url']);
        $db = db_connect();

        $w = $db->table('bf_users_wallet')->where('id', $walletId)->get()->getRowArray();
        if (!$w) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Wallet not found']);
        }

        $wm  = new WalletModel();
        $map = $wm->mapWalletRow($w);
        if (!$map) {
            return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Unknown wallet type']);
        }

        // Identify child row id
        $sub   = $db->table($map['table'])->where('wallet_id', $walletId)->get()->getRowArray();
        $subId = $sub['id'] ?? ($w['account_id'] ?? $walletId);

        $editUrl = site_url("Dashboard/Transaction-Modal/Edit/{$map['endpoint']}/{$subId}");

        // Recipient
        $user = $db->table('users')->select('email, username')->where('id', $userId)->get()->getRowArray();
        $to   = $user['email'] ?? null;
        if (!$to) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'User email not found']);
        }

        $free = $this->request->getPost('message') ?: "We noticed your wallet has missing details. Please click the link below to review and update it.";

        $email = Services::email();
        $email->setTo($to);
        $email->setSubject('Action needed: please update your MyMI Wallet details');
        $email->setMessage(
            "Hi " . esc($user['username'] ?? 'there') . ",\n\n" .
            $free . "\n\n" .
            "Edit your wallet here: " . $editUrl . "\n\n" .
            "If you didn’t request this, you can ignore this email."
        );

        if (!$email->send()) {
            log_message('error', 'Failed to send wallet issue email to {to}', ['to' => $to]);
            return $this->response->setStatusCode(500)->setJSON(['status' => 'error', 'message' => 'Failed to send email']);
        }

        return $this->response->setJSON(['status' => 'ok', 'edit_url' => $editUrl]);
    }
}
