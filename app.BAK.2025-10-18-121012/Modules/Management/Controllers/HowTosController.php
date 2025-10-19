<?php
// app/Modules/User/Controllers/DashboardController.php
namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use Myth\Auth\Authorization\GroupModel;
use App\Config\{Auth, SiteSettings, SocialMedia}; 
use App\Controllers\UserController;
use App\Libraries\{MyMIAnalytics, MyMIBudget, MyMICoin, MyMIDashboard, MyMIExchange, MyMIGold, MyMIUser, MyMIWallet, MyMIWallets};
use App\Models\{AccountsModel, BudgetModel, UserModel, WalletModel};
use App\Services\{AccountService, BudgetService, DashboardService, GoalTrackingService, MarketingService, SolanaService, UserService, WalletService};
// use App\Modules\User\Libraries\{DashboardLibrary}; 
use CodeIgniter\API\ResponseTrait; // Import the ResponseTrait

#[\AllowDynamicProperties]
class HowTosController extends UserController
{
    protected $auth;
    protected $logger;
    protected $session;
    protected $siteSettings;
    protected $walletModel;
    protected $accountService;
    protected $budgetService;
    protected $dashboardService;
    protected $goalTrackingService;
    protected $marketingService;
    protected $solanaService;
    protected $userService;
    protected $walletService;
    protected $budgetModel;
    protected $MyMIDashboard;
    protected $helpers = ['auth', 'form', 'url'];

    public function __construct()
    {
        $this->auth = service('authentication');
        $this->session = Services::session();
        $this->siteSettings = config('SiteSettings');
        $this->debug = $this->siteSettings->debug; 

        // Check for user ID
        $this->cuID = $this->auth->id() ?? session('logged_in') ?? $this->session->get('user_id');
        log_message('debug', 'HowTosController L47 - $this->cuID: ' . (print_r($this->cuID, true)));
        if (empty($this->cuID)) {
            log_message('error', 'Failed to retrieve user ID.');
            return redirect()->to('/login')->with('redirect_url', current_url())->send();
        }

        $this->accountService = new AccountService();
        $this->budgetService = new BudgetService();
        $this->dashboardService = new DashboardService();
        $this->goalTrackingService = new GoalTrackingService();
        $this->marketingService  = new MarketingService();
        $this->solanaService  = new SolanaService();

        $this->budgetModel = new BudgetModel(); 
//         $this->MyMIDashboard = new MyMIDashboard(); // replaced by BaseController getter 
        $this->logger = service('logger');
        $this->walletModel = new WalletModel();
        $this->walletService = new WalletService($this->logger, $this->walletModel);

        // Initialize UserService and pass required dependencies
        $this->cuID = getCuID();  // Assuming getCuID() is a helper or service
$this->userService = new UserService($this->siteSettings, $this->cuID, Services::request());

    }

    public function commonData(): array
    {
        $this->data = parent::commonData();

        if (!$this->userService) {
            $this->checkUserAuthentication();  // Ensure user is authenticated before proceeding
        }
        // Fetch data from UserService
        $userData = $this->getuserService()->commonData();        

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
        $this->data['getFeatures'] = $this->getMyMIDashboard()->getFeatures();
        $this->data['totalAccountBalance'] = $this->getBudgetService()->getTotalAccountBalance($this->cuID);
        $this->data['completedGoals'] = $this->getGoalTrackingService()->getCompletedGoals($this->cuID);
        $this->data['pendingGoals'] = $this->getGoalTrackingService()->getPendingGoals($this->cuID);
        $this->data['promotionalBanners'] = $this->getDashboardService()->getPromotionalBanners($this->cuID);
        $this->data['userBudget'] = $this->getBudgetService()->getUserBudget($this->cuID);
        $this->data['userWallets'] = $this->getWalletService()->getUserWallets($this->cuID);

        // Fetch Solana data
        $userSolanaData = $this->getSolanaService()->getSolanaData($this->cuID);
        $this->data['cuSolanaDW'] = $userSolanaData['userSolanaWallets']['cuSolanaDW'] ?? null;
        // Ensure Solana network status exists to avoid "Undefined array key"
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
        return $this->data;
}

    public function index()
    {
        $this->data['pageTitle']                    = 'MyMI Management | MyMI Wallet | The Future of Finance';
        $this->commonData(); // Ensure this is correctly populating $this->data
        return $this->renderTheme('ManagementModule\Views\HowTos\index', $this->data);
    }

    public function employeeAccountSetup()
    {
        $this->data['pageTitle']                    = 'MyMI Management | MyMI Wallet | The Future of Finance';
        $this->commonData(); // Ensure this is correctly populating $this->data
        return $this->renderTheme('ManagementModule\Views\HowTos\index', $this->data);
    }

    public function employeeEmailSetup()
    {
        $this->data['pageTitle']                    = 'MyMI Management | MyMI Wallet | The Future of Finance';
        $this->commonData(); // Ensure this is correctly populating $this->data
        return $this->renderTheme('ManagementModule\Views\HowTos\Employees\setupEmails', $this->data);
    }

    // public function add()
    public function add($type = null)
    {
        // Site settings and user data
        $this->data['pageTitle']                    = 'Add Budget Record | MyMI Wallet | The Future of Finance';
        $this->commonData(); // Ensure this is correctly populating $this->data
        return $this->renderTheme('App\Modules\User\Views\Budget\Add', $this->data);
    }

    public function accountOverview()
    {        
        $uri                                        = $this->request->getUri();  
        $budgetType                                 = $uri->getSegment(2);
        
        $this->data['pageTitle']                    = 'Account Overview | MyMI Wallet | The Future of Finance';
        if ($budgetType === 'Expenses') {
            $accountType                            = 'Expense';
        } else {
            $accountType                            = $budgetType;
        }
        $this->data['accountType']                  = $accountType;
        $this->data['budgetType']                   = $budgetType;
        $this->data['getSourceRecords']             = $this->budgetModel->getSourceRecords($this->cuID, $budgetType);
        if ($this->debug === 1) {
        // log_message('debug', 'BudgetController L148 - $getSourceRecords: ' . print_r($this->budgetModel->getSourceRecords($this->cuID, $budgetType), true));
        }
        $this->commonData(); // Ensure this is correctly populating $this->data
        return $this->renderTheme('App\Modules\User\Views\Budget\Account_Overview', $this->data);
    }

    public function details($accountID)
    {
        // Site settings and user data
        $this->data['pageTitle']                    = 'Account Details & History | MyMI Wallet | The Future of Finance';
        $userBudgetRecord                           = $this->getMyMIBudget()->getUserBudgetRecord($this->cuID, $accountID);
        $this->data['userBudgetRecord']             = $userBudgetRecord;
        if ($this->debug === 1) {
        // log_message('debug', 'BudgetController::details L153 - $this->data[\'userBudgetRecord\']: ' . print_r($this->data['userBudgetRecord'], true));
        }
        $userBudgetRecordName                       = $userBudgetRecord['accountName'];
        $this->data['userRelatedBudgetAccounts']    = $this->getMyMIBudget()->getUserRelatedBudgetRecords($this->cuID, $userBudgetRecordName);
        if ($this->debug === 1) {
        // log_message('debug', 'BudgetController::details L153 - $this->data[\'userRelatedBudgetAccounts\']: ' . print_r($this->data['userRelatedBudgetAccounts'], true));
        }
        $this->commonData(); // Ensure this is correctly populating $this->data
        return $this->renderTheme('App\Modules\User\Views\Budget\Details', $this->data);
    }

    // public function add()
    public function edit($type = null)
    {
        $uri                                        = $this->request->getUri();  
        $formMode                                   = $uri->getSegment(2);
        if ($formMode === 'Recurring-Account') {
            $accountID                              = $uri->getSegment(4);
        } else {
            $accountID                              = $uri->getSegment(3);
        }
        if ($this->debug === 1) {
        // log_message('debug', 'BudgetController L151 - $userBudgetRecord: ' . print_r($userBudgetRecord, true));
        }
        $userBudgetRecord                           = $this->getMyMIBudget()->getUserBudgetRecord($this->cuID, $accountID);
        if ($this->debug === 1) {
        // log_message('debug', 'BudgetController L151 - $userBudgetRecord: ' . print_r($userBudgetRecord, true));
        }
        $userBudgetRecordID                         = $userBudgetRecord['accountID'];
        $userBudgetRecordName                       = $userBudgetRecord['accountName'];
        if ($this->debug === 1) {
        // log_message('debug', 'BudgetController L153 - $userBudgetRecordName: ' . $userBudgetRecordName);
        }
        $userRelatedBudgetAccounts                  = $this->getMyMIBudget()->getUserRelatedBudgetRecords($this->cuID, $userBudgetRecordID);
        if ($this->debug === 1) {
        // log_message('debug', 'BudgetController L155 - $userRelatedBudgetAccounts: ' . print_r($userRelatedBudgetAccounts, true));
        }
        // Site settings and user data
        $this->data['pageTitle']                    = 'Edit Budget Record | MyMI Wallet | The Future of Finance';
        $this->data['getAccountInfo']               = $userBudgetRecord;
        $this->data['userRelatedBudgetAccounts']    = $userRelatedBudgetAccounts;
        $this->data['formMode']                     = $formMode;
        $this->data['accountID']                    = $accountID;                       
        
        $this->commonData(); // Ensure this is correctly populating $this->data
        return $this->renderTheme('App\Modules\User\Views\Budget\Edit', $this->data);
    }

    // public function add()
    public function history($type = null)
    {
        // Site settings and user data
        $this->data['pageTitle']                    = 'Account Details & History | MyMI Wallet | The Future of Finance';
        $this->data['getUserBankAccounts']          = $this->accountsModel->getUserBankAccounts($this->cuID);
        $this->data['getUserCreditAccounts']        = $this->accountsModel->getUserCreditAccounts($this->cuID);
        $this->commonData(); // Ensure this is correctly populating $this->data
        return $this->renderTheme('App\Modules\User\Views\Budget\History', $this->data);
    }

    // public function add()
    public function recurringSchedule($accountID = null)
    {
        $uri = $this->request->getUri();
        $getAccountInfo = $this->budgetModel->getUserBudgetRecord($this->cuID, $accountID);
        $lastAccountInfo = $this->budgetModel->getLastRecurringAccountInfo($this->cuID);

        $accountDetails = $getAccountInfo ?: $lastAccountInfo;
        $account = $accountDetails[0] ?? [];

        $accountID = $accountID ?? $account['id'] ?? $uri->getSegment(4);
        $accountName = $account['name'] ?? '';
        $accountType = $account['account_type'] ?? '';
        $accountSourceType = $account['source_type'] ?? '';
        $accountNetAmount = $account['net_amount'] ?? 0;
        $accountGrossAmount = $account['gross_amount'] ?? 0;
        $accountRecAccount = $account['recurring_account'] ?? 'No';
        $accountIntervals = $account['intervals'] ?? 'Monthly';
        $accountDesDate = $this->safeDateFormat($account['designated_date'] ?? date("m/d/Y"), 'm/d/Y') ?: date("m/d/Y");

        $startDate = \DateTime::createFromFormat('m/d/Y', $accountDesDate);
        $endDate = new \DateTime('12/31/' . date('Y'));
        $data = [];

        if ($accountIntervals === '15th/Last') {
            if ((int)$startDate->format('d') >= 15) {
                $startDate = $startDate->modify('last day of this month');
            } else {
                $startDate = $startDate->setDate((int)$startDate->format('Y'), (int)$startDate->format('m'), 15);
            }

            while ($startDate <= $endDate) {
                $data[] = [
                    'dueDate' => $startDate->format('m/d/Y'),
                    'cuID' => $this->cuID, 
                    'cuEmail' => $this->userAccount['cuEmail'], 
                    'cuUsername' => $this->userAccount['cuUsername'], 
                    'accountID' => $accountID,
                    'accountName' => $accountName,
                    'accountType' => $accountType,
                    'accountSourceType' => $accountSourceType,
                    'netAmount' => $accountNetAmount,
                    'grossAmount' => $accountGrossAmount,
                ];

                if ((int)$startDate->format('d') == 15) {
                    $startDate = $startDate->modify('last day of this month');
                } else {
                    $startDate = $startDate->modify('first day of next month')->setDate(
                        (int)$startDate->format('Y'), 
                        (int)$startDate->format('m'), 
                        15
                    );
                }

                if ($startDate > $endDate) {
                    break;
                }
            }
        } else {
            $intervalMap = [
                'Daily' => '+1 day',
                'Weekly' => '+1 week',
                'Bi-Weekly' => '+2 weeks',
                'Monthly' => '+1 month',
                'Quarterly' => '+3 months',
                'Semi-Annual' => '+6 months',
                'Annually' => '+1 year',
            ];

            $intervalString = $intervalMap[$accountIntervals] ?? '+1 month';

            while ($startDate <= $endDate) {
                $data[] = [
                    'dueDate' => $startDate->format('m/d/Y'),
                    'cuID' => $this->cuID, 
                    'cuEmail' => $this->userAccount['cuEmail'], 
                    'cuUsername' => $this->userAccount['cuUsername'], 
                    'accountID' => $accountID,
                    'accountName' => $accountName,
                    'accountType' => $accountType,
                    'accountSourceType' => $accountSourceType,
                    'netAmount' => $accountNetAmount,
                    'grossAmount' => $accountGrossAmount,
                ];
                $startDate = $startDate->modify($intervalString);
            }
        }

        $this->data['pageTitle'] = 'Create Recurring Schedule | MyMI Wallet | The Future of Finance';
        $this->data['recurringSchedule'] = $data; // Pass generated schedules to the view
        $this->data['accountInfo'] = $getAccountInfo;
        $this->data['lastAccountInfo'] = $lastAccountInfo;
        $this->commonData(); // Populate $this->data with common data
        return $this->renderTheme('App\Modules\User\Views\Budget\Recurring_Account\Schedule', $this->data);
    } 

    public function approveRecurringSchedule($accountID)
    {
        $jsonData = $this->request->getJSON();
        if (!$jsonData) {
            return $this->failValidationError('Invalid request.');
        }
    
        foreach ($jsonData as $schedule) {
            $data = [
                'account_id' => $accountID,
                'status' => 1,
                'beta' => $this->siteSettings->beta,
                'mode' => 'Recurring',
                'created_by' => $this->cuID,
                'created_by_email' => $schedule->cuEmail,
                'unix_timestamp' => time(),
                'designated_date' => $schedule->dueDate,
                'month' => date('m', strtotime($schedule->dueDate)),
                'day' => date('d', strtotime($schedule->dueDate)),
                'year' => date('Y', strtotime($schedule->dueDate)),
                'username' => $schedule->cuUsername,
                'name' => $schedule->accountName,
                'net_amount' => $schedule->netAmount,
                'gross_amount' => $schedule->grossAmount,
                'recurring_account' => 'Yes',
                'account_type' => $schedule->accountType,
                'source_type' => $schedule->accountSourceType,
            ];
    
            if (!$this->budgetModel->approveRecurringSchedule($data)) {
                log_message('error', 'Failed to insert recurring schedule for account ID: ' . $accountID);
            }
        }
    
        session()->setFlashdata('message', 'Recurring schedules successfully created.');
        return redirect()->to('/Budget');
    }
    

    protected function safeDateFormat($date, $format)
    {
        $dateTime = \DateTime::createFromFormat('m/d/Y', $date);
        return $dateTime ? $dateTime->format($format) : false;
    }

    // public function add()
    public function settings($type = null)
    {
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
        $this->commonData(); // Ensure this is correctly populating $this->data
        return $this->renderTheme('App\Modules\User\Views\Budget\Settings', $this->data);
    }

    public function accountManager() { 
        $json = $this->request->getJSON(true);
        $status = 1;
        $beta = $json['beta'] ?? 'No';
        $formMode = $json['form_mode'] ?? 'Add';
        $userId = $json['user_id'] ?? null;
        $userEmail = $json['user_email'] ?? null;
        $username = $json['username'] ?? null;
        $nickname = $json['nickname'] ?? null;
        $netAmount = str_replace(',', '', $json['net_amount'] ?? '0');
        $grossAmount = str_replace(',', '', $json['gross_amount'] ?? '0');
        $recurringAccount = $json['recurring_account'] ?? 'No';
        $accountType = $json['account_type'] ?? null;
        $sourceType = $json['source_type'] ?? null;
        $isDebt = preg_match('/(Debt|Loan|Mortgage)/i', $sourceType) === 1 ? 1 : 0;
        $intervals = $json['intervals'] ?? null;
    
        // Parsing designated_date to extract day, month, year
        $designatedDate = $json['designated_date'] ?? null;
        if ($designatedDate) {
            $dateTranslator = strtotime($designatedDate);
            $designatedDate = date('m/d/Y', $dateTranslator);
            $month = date('m', $dateTranslator);
            $day = date('d', $dateTranslator);
            $year = date('Y', $dateTranslator);
        } else {
           $designatedDate = $month = $day = $year = null; // Default values if no date provided
        }
    
        $accountData = [
            'status' => $status,
            'beta' => $beta,
            'mode' => $formMode,
            'created_by' => $userId,
            'created_by_email' => $userEmail,
            'unix_timestamp' => time(),
            'designated_date' => $designatedDate,
            'month' => (int)$month, // Ensure these are integers
            'day' => (int)$day,
            'year' => (int)$year,
            'username' => $username,
            'name' => $nickname,
            'net_amount' => (float)$netAmount, // Ensure this is a float
            'gross_amount' => (float)$grossAmount,
            'paid' => 0, // Assuming not paid by default
            'recurring_account' => $recurringAccount,
            'account_type' => $accountType,
            'source_type' => $sourceType,
            'is_debt' => $isDebt,
            'intervals' => $intervals,
        ];
        if ($this->debug === 1) {
        // log_message('debug', 'BudgetController L450 - Received $accountData: ' . print_r($accountData, true));
        }
        // Insert or update logic as before, ensuring the array keys match your table column names
        try {
            $formMode                           = $json['form_mode'];
            switch ($formMode) {
                case 'Add':
                    if ($isDebt) {
                        $debtData               = [
                            'beta'              => $beta,
                            'status'            => $status,
                            'date'              => $designatedDate,
                            // 'time'           => $time,
                            'user_id'           => $userId,
                            'user_email'        => $userEmail,
                            'username'          => $username,
                            'account_type'      => $accountType,
                            'debtor'            => $nickname,
                            'available_balance' => $grossAmount,
                            'current_balance'   => $netAmount,
                        ];
                        $this->budgetModel->insertDebtAccount($debtData);
                    }
        
                    if ($this->debug === 1) {
                    // log_message('debug', 'BudgetController L473 - Sending $accountData to Model: ' . print_r($accountData, true));
                        }
                    $insertedID = $this->budgetModel->insertAccount($accountData);
                    if ($insertedID) {
                        $responseData           = [
                            'accountID'         => $insertedID,
                            'recurringAccount'  => $accountData['recurring_account'],
                        ];
                        session()->setFlashdata('message', 'Budget Record added successfully.');
                        session()->setFlashdata('alert-class', 'success');
                        return $this->response->setStatusCode(201, 'Created')->setJSON($responseData);
                    } else {
                        log_message('error', 'Insert failed');
                    }
                    break;
        
                case 'Edit':
                    log_message('info', 'CRON job for fetching emails completed');
                    $updated = $this->budgetModel->updateAccount($json['account_id'], $accountData);
                    if ($updated) {
                        $responseData           = [
                            'accountID'         => $json['account_id'],
                            'recurringAccount'  => $accountData['recurring_account'],
                        ];
                        session()->setFlashdata('message', 'Budget Record added successfully.');
                        session()->setFlashdata('alert-class', 'success');
                        return $this->response->setStatusCode(200, 'OK')->setJSON($responseData);
                    } else {
                        // !! FIX THIS: Redirect to Edit + Account Type (Income/Expense) and add session()->setFlashdata
                        log_message('error', 'Update failed');
                    }
                    break;
        
                case 'Copy':
                    $insertedID                 = $this->budgetModel->insertAccount($accountData);
                    if ($insertedID) {
                        $responseData           = [
                            'accountID'         => $insertedID,
                            'recurringAccount'  => $accountData['recurring_account'],
                        ];
                        return $this->response->setStatusCode(201, 'Created')->setJSON($responseData);
                    } else {
                        // !! FIX THIS: Redirect to Copy + Account Type (Income/Expense) and add session()->setFlashdata
                        log_message('error', 'Insert failed');
                    }
                    break;
        
                default:
                    // !! TEST THIS
                    session()->setFlashdata('message', 'There was an error submitting your changes. Contact support by clicking <a href="' . site_url('/Support') . '">here!</a>');
                    session()->setFlashdata('alert-class', 'danger');
                    return $this->response->setStatusCode(400, 'Bad Request')->setBody('Invalid form mode.');
            }
        } catch (\Exception $e) {
            log_message('error', 'Exception caught: ' . $e->getMessage());
            return $this->response->setStatusCode(500, 'Server Error')->setBody('Exception occurred: ' . $e->getMessage());
        }        
    }

    public function deleteAccount($accountID) { // !! THIS WORKS
        // Get the HTTP referrer, or default to the '/Budget' route if not available
        $referer  = $this->request->getServer('HTTP_REFERER');
        $fallback = site_url_safe('/Budget');
    
        if ($this->budgetModel->cancelAccount($accountID)) {
            session()->setFlashdata('message', 'Recurring Account deleted.');
            session()->setFlashdata('alert-class', 'success');
        } else {
            session()->setFlashdata('message', 'Account could not be deleted');
            session()->setFlashdata('alert-class', 'error');
        }
    
        // Redirect to the referrer or the specified default route
        return redirect_to_safe(
            is_string($referer) && $referer !== '' ? $referer : null,
            $fallback
        );
    }      
    
    public function cancelAccount($accountID)
    {
        $accountInfo = $this->budgetModel->getUserBudgetRecord($this->cuID, $accountID);

        foreach($accountInfo as $account) {
            if ($account['recurring_account_primary'] === 'Yes') {
                if ($this->budgetModel->cancelAccount($accountID)) {
                    session()->setFlashdata('message', 'Recurring Account deleted.');
                    return redirect()->to('/Budget');
                } else {
                    session()->setFlashdata('message', 'Recurring Account could not be deleted');
                    return redirect()->to("/Budget/Edit/{$accountID}");
                }
            } else {
                if ($this->budgetModel->cancelSubaccount($accountID)) {
                    session()->setFlashdata('message', 'Subaccount deleted.');
                    return redirect()->to("/Budget/Edit/{$accountID}");
                } else {
                    session()->setFlashdata('message', 'Subaccount could not be deleted');
                    return redirect()->to("/Budget/Recurring-Account/Schedule/{$accountID}");
                }
            }
        }
    }

    public function paid($accountID) {
        if ($this->budgetModel->paidAccount($accountID)) {
            session()->setFlashdata('message', 'Account status changed to: "Paid"');
            session()->setFlashdata('message_type', 'success');
            return redirect()->to('/Budget');
        } else {
            session()->setFlashdata('message', 'Account could not be updated');
            session()->setFlashdata('message_type', 'error');
            return redirect()->to('/Budget');
        }
    }
    
    public function unpaid($accountID) {
        if ($this->budgetModel->unpaidAccount($accountID)) {
            session()->setFlashdata('message', 'Account status changed to: "Unpaid"');
            session()->setFlashdata('message_type', 'success');
            return redirect()->to('/Budget');
        } else {
            session()->setFlashdata('message', 'Account could not be updated');
            session()->setFlashdata('message_type', 'error');
            return redirect()->to('/Budget');
        }
    }
    
    public function bulkUpdateStatus()
    {
        $ids = $this->request->getPost('ids');
        $status = $this->request->getPost('status');
        $budgetModel = new \App\Models\BudgetModel();

        if ($budgetModel->bulkUpdateStatus($ids, $status)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Records updated successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update records.']);
        }
    }

    public function createLinkToken()
    {
        $plaidModel = new \App\Models\PlaidModel();
        $client_id = config('Plaid')->client_id; // Assuming Plaid settings are stored in a separate config file
        $secret = config('Plaid')->secret;

        $linkTokenData = $plaidModel->getLinkToken($client_id, $secret);
        return $this->response->setJSON($linkTokenData);
    }

    public function exchangeToken()
    {
        $publicToken = $this->request->getPost('public_token');
        $plaidModel = new \App\Models\PlaidModel();

        $exchangeData = $plaidModel->exchangePublicToken($publicToken);
        return $this->response->setJSON($exchangeData);
    }

    public function bulkDelete()
    {
        $ids = $this->request->getPost('ids');
        $budgetModel = new \App\Models\BudgetModel();

        if ($budgetModel->bulkDelete($ids)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Records deleted successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete records.']);
        }
    }

    private function checkUserAuthentication()
    {
        $this->cuID = $this->auth->id() ?? session('logged_in') ?? $this->session->get('user_id');
        log_message('debug', 'HowTosController - checkUserAuthentication - $this->cuID: ' . (print_r($this->cuID, true)));
    
        if (empty($this->cuID)) {
            log_message('error', 'Failed to retrieve user ID.');
            // Perform the redirect and stop further execution
            redirect()->to('/login')->with('redirect_url', current_url())->send();
            exit; // Ensure the script stops running after the redirect
        }
    }
    
    
    // Implement other methods as in CI3, adapting to CI4's syntax and best practices
    // Implement other private and public methods, converting CI3 syntax and functionality to CI4
}
