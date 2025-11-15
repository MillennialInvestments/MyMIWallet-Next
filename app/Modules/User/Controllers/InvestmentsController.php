<?php namespace App\Modules\User\Controllers;

use App\Controllers\UserController;
use App\Config\{Auth, SiteSettings, SocialMedia};
use App\Libraries\{MyMIBudget, MyMIDashboard, MyMICoin, MyMIGold, MyMIInvestments, MyMIMarketData, MyMIMarketing, MyMIReferrals, MyMISolana, MyMIUser, MyMIWallet, MyMIWallets, MyMISimulator, FRED, MyMIFractalAnalyzer};
use App\Models\{AccountsModel, BudgetModel, InvestmentModel, MarketingModel, MgmtBudgetModel, MyMIGoldModel, UserModel, WalletModel};
use App\Services\{BudgetService, DashboardService, GoalTrackingService, InvestmentService, SolanaService, UserService, WalletService};
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Cache\CacheInterface;
use Config\Services;
use Maatwebsite\Excel\Facades\Excel;
use Myth\Auth\Authorization\GroupModel;
use Psr\Log\LoggerInterface;

#[\AllowDynamicProperties]
class InvestmentsController extends UserController
{
    use ResponseTrait;
    // Controller Settings
    protected $auth;
    protected CacheInterface $cache;
    protected $session;
    protected $siteSettings;
    protected $uri;
    protected $userAccount; 
    protected $budgetService; 
    protected $dashboardService; 
    protected $goalTrackingService; 
    protected $investmentService;
    protected $solanaService;
    protected $userService;
    protected $walletService;
    
    // Models
    protected $accountsModel;
    protected $budgetModel;
    protected $investmentModel;
    protected $marketingModel;
    protected $myMIGoldModel;
    protected $userModel;
    protected $walletModel;
    
    // Libraries

    public function __construct()
    {
        $this->auth = service('authentication');
        $this->cache = cache();
        // $this->config = config('Auth');
        $this->request = service('request');
        $this->session = Services::session();
        $this->siteSettings = config('SiteSettings');
        $this->debug = $this->siteSettings->debug;
        $this->uri = $this->request->getUri();
        $this->cuID = $this->session->get('user_id') ?? $this->auth->id();
        if (!$this->cuID) {
            log_message('error', 'Investments ControllerFailed to retrieve valid User ID in MyMIInvestments');
            throw new \RuntimeException('User ID could not be retrieved.');
        }
        log_message('debug', "InvestmentsController: cuID initialized as {$this->cuID}");
        $this->userAccount = $this->getMyMIUser()->getUserInformation($this->cuID);
        $userBudget = $this->getMyMIBudget()->getUserBudget($this->cuID); 
        log_message('info', 'DashboardController L72 - $checkingSummary: ' . $userBudget['checkingSummary']);
        $this->data['checkingSummary'] = $userBudget['checkingSummary'];
        // $this->budgetService = new BudgetService(); 
        // $this->dashboardService = new DashboardService(); 
        // $this->goalTrackingService = new GoalTrackingService(); 
        // $this->solanaService = []; 
        $this->logger = service('logger');
        $this->walletModel = new WalletModel();
        $this->investmentService = new InvestmentService();
        $this->walletService = new WalletService($this->logger, $this->walletModel);

        // In InvestmentService.php or InvestmentsController.php

        $myMIFractalAnalyzer = new \App\Libraries\MyMIFractalAnalyzer(new \App\Models\InvestmentModel(), service('curlrequest'), service('logger'));
        // $accountsModel = new \App\Models\AccountsModel();

        // Correct the parameters passed to InvestmentService
        // $this->investmentService = new InvestmentService();

        // Fetch Solana data
        // $userSolanaData = $this->getSolanaService()->getSolanaData($this->cuID);
        // $this->data['cuSolanaDW'] = $userSolanaData['userSolanaWallets']['cuSolanaDW'] ?? null;
        // // Ensure Solana network status exists to avoid "Undefined array key"
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
        // $this->data['cuSolanaTotal'] = $userSolanaData['userSolanaWallets']['cuSolanaTotal'] ?? 0;
        // $this->data['cuSolanaValue'] = $userSolanaData['userSolanaWallets']['cuSolanaValue'] ?? 0;
        
        $userSolanaData = [
            'userSolanaWallets'     => [
                'cuSolanaDW' => 'N/A', 
                'cuSolanaTotal' => 'N/A', 
                'cuSolanaValue' => 'N/A', 
            ],
            'solanaNetworkStatus' => 'N/A',
        ];
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
        
        // // Initialize other libraries and services
        // $this->MyMIBudget = new MyMIBudget();
        // $this->MyMIDashboard = new MyMIDashboard();
        // $this->MyMIInvestments = new MyMIInvestments();
        // $this->MyMIMarketData = new MyMIMarketData();  // Add this if MyMIMarketData is a class you need
        // $this->MyMIReferrals = new MyMIReferrals();
        $this->MyMISolana = new MyMISolana();
        // $this->MyMIUser = service('MyMIUser');
        // $this->MyMIWallets = new MyMIWallets();

        $this->accountsModel = new AccountsModel();
        $this->budgetModel = new BudgetModel();
        $this->investmentModel = new InvestmentModel();
        $this->marketingModel = new MarketingModel();
        $this->myMIGoldModel = new MyMIGoldModel();
        // $this->userModel = new UserModel();

        // // Initialize UserService and pass required dependencies
        // $this->cuID = getCuID();  // Assuming getCuID() is a helper or service
        // $this->userService = new UserService($this->siteSettings, $this->cuID, Services::request());

    }

    public function commonData(): array
    {
        $this->data = parent::commonData();
        $this->data['siteSettings'] = $this->siteSettings;
        $this->data['beta'] = (string) $this->siteSettings->beta;
        $this->data['uri'] = $this->request->getUri();
        $this->data['userAgent'] = $this->request->getUserAgent();
        $this->data['date'] = $this->siteSettings->date;
        $this->data['time'] = $this->siteSettings->time;
        $this->data['hostTime'] = $this->siteSettings->hostTime;
        $this->data['cuID'] = $this->cuID;

        // User Info
        // $userInfo = $this->getMyMIUser()->getUserInformation($this->cuID);

        // Fetch data from UserService
        // $userData = $this->getuserService()->commonData(); 
        // Merge the user data with BudgetController data
        // $this->data = array_merge($this->data, $userData); 
        // Merge the user data with BudgetController data
        // $this->data = array_merge($this->data, $userData);

        $this->data['cuRole']                       = $this->getMyMIUser()->getUserInformation($this->cuID)['cuRole'];
        $this->data['cuUserType']                   = $this->getMyMIUser()->getUserInformation($this->cuID)['cuUserType'] ?? '';
        $this->data['cuEmail']                      = $this->getMyMIUser()->getUserInformation($this->cuID)['cuEmail'];
        $this->data['cuUsername']                   = $this->getMyMIUser()->getUserInformation($this->cuID)['cuUsername'];
        $this->data['cuDisplayName']                = $this->getMyMIUser()->getUserInformation($this->cuID)['cuDisplayName'] ?? '';
        $this->data['cuNameInitials']               = $this->getMyMIUser()->getUserInformation($this->cuID)['cuNameInitials'] ?? '';
        $this->data['cuWalletID']                   = $this->getMyMIUser()->getUserInformation($this->cuID)['cuWalletID'] ?? '';
        $this->data['cuKYC']                        = $this->getMyMIUser()->getUserInformation($this->cuID)['cuKYC'] ?? 'N/A';
        $this->data['cuWalletCount']                = $this->getMyMIUser()->getUserInformation($this->cuID)['cuWalletCount'] ?? 'N/A';
        $this->data['cuSolanaDW']                   = $this->MyMISolana->getUserSolana($this->cuID)['cuSolanaDW'] ?? 'N/A';
        $this->data['cryptoPT']                     = $this->MyMISolana->getUserSolana($this->cuID)['cuSolanaDW']['public_token'] ?? 'N/A';

        // Additional dynamic data from the service
        $this->data['totalAccountBalance'] = $this->getBudgetService()->getTotalAccountBalance($this->cuID);
        $this->data['completedGoals'] = $this->getGoalTrackingService()->getCompletedGoals($this->cuID);
        $this->data['pendingGoals'] = $this->getGoalTrackingService()->getPendingGoals($this->cuID);
        $this->data['promotionalBanners'] = $this->getDashboardService()->getPromotionalBanners($this->cuID);
        $this->data['userBudget'] = $this->getBudgetService()->getUserBudget($this->cuID);
        $this->data['userWallets'] = $this->getWalletService()->getUserWallets($this->cuID);
        $this->data['getIncomeYTDSummary'] = $this->budgetModel->getIncomeYTDSummary($this->cuID); // Assuming this method fetches the required data

        // Investment Dashboard
        // Get investment data from the service
        $investmentData = $this->investmentService->getInvestmentData($this->cuID);
        // log_message('debug', 'InvestmentsController L170 - $investmentData[economicCalendar: ' . (print_r($investmentData['economicCalendar'], true)));
        $this->data['investDashboard'] = $investmentData;
        // Check if the required key exists, otherwise set a default value
        $this->data['userInvestmentRecords'] = $investmentData['userInvestmentRecords'] ?? [];
        $this->data['userInvestmentWallets'] = $investmentData['userInvestmentWallets'] ?? [];
        $this->data['userWatchlist'] = $investmentData['userWatchlist'] ?? [];
        // Set userCurrentAnnualValue and other potential missing keys with defaults
        $this->data['userCurrentAnnualValue'] = $investmentData['userCurrentAnnualValue'] ?? 0;
        $this->data['userCurrentAnnualPerformance'] = $investmentData['userCurrentAnnualPerformance'] ?? 0;
        $this->data['userCurrentAnnualTarget'] = $investmentData['userCurrentAnnualTarget'] ?? 0;
        
        // Additional Investment Info
        $this->data['totalTradeValue'] = $this->investmentModel->totalTradeValueByUser($this->cuID);
        $this->data['completedGoals'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['progressGoalData']['completions'];
        $this->data['pendingGoals'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['progressGoalData']['goals'];
        $this->data['promotionalBanners'] = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['promotionalBanners'];
        
        // Assuming you are retrieving the total account balance from a model or service
        $totalAccountBalance = $this->getBudgetService()->getTotalAccountBalance($this->cuID); // Adjust this line based on your logic
    
        // Format the balance (e.g., as a formatted string with currency)
        $totalAccountBalanceFMT = number_format($totalAccountBalance, 2); // Formatting for display
    
        // Pass the formatted balance to the view
        $this->data['totalAccountBalanceFMT'] = $totalAccountBalanceFMT;
        return $this->data;
}

    private function userAccountData()
    {
        $userInfo = $this->getMyMIUser()->getUserInformation($this->cuID);
        $this->data['cuFirstName'] = $userInfo['cuFirstName'] ?? '';
        $this->data['cuMiddleName'] = $userInfo['cuMiddleName'] ?? '';
        $this->data['cuLastName'] = $userInfo['cuLastName'] ?? '';
        $this->data['cuNameSuffix'] = $userInfo['cuNameSuffix'] ?? '';
        $this->data['cuPhone'] = $userInfo['cuPhone'] ?? '';
        $this->data['cuType'] = $userInfo['cuType'] ?? '';
        $this->data['cuDOB'] = $userInfo['cuDOB'] ?? '';
        $this->data['cuMailingAddress'] = $userInfo['cuMailingAddress'] ?? '';
        $this->data['cuWallets'] = $userInfo['userWallets'] ?? [];
    }

    // Views
    public function index()
    {
        // Assuming you have a model or service that fetches user investments
        $cuID = $this->cuID; // User ID
        $userInvestments = $this->investmentService->getInvestmentData($cuID); // Adjust this line to your implementation

        // Pass investments to the view
        $this->data['userInvestments'] = $userInvestments;
    
        // Pass other data as needed
        $this->commonData(); // Ensure other necessary data is prepared
    
        return $this->renderTheme('App\Modules\User\Views\Investments\index', $this->data);
    }    

    public function add()
    {
        $investmentType = $this->uri->getSegment(3);
        $subViewFile = '';
        $subViewDirectory = 'UserModule\Views\\';

        switch ($investmentType) {
            case 'Bond':
                $subViewTitle = 'Add Bond Investment';
                $subViewFile = 'Investments\Add\bond_fields';
                $subViewForm = 'Investments\Add\Bond';
                break;
            case 'Crypto':
                $subViewTitle = 'Add Crypto Investment';
                $subViewFile = 'Investments\Add\crypto_fields';
                $subViewForm = 'Investments\Add\Crypto';
                break;
            case 'Stock':
                $subViewTitle = 'Add Stock Investment';
                $subViewFile = 'Investments\Add\stock_fields';
                $subViewForm = 'Investments\Add\Stock';
                break;
            // Add more cases as needed
        }

        $this->data['pageTitle'] = $subViewTitle . ' | MyMI Wallet | The Future of Finance';
        $this->data['subViewFile'] = $subViewDirectory . $subViewFile;
        $this->data['subViewTitle'] = $subViewTitle;
        $this->data['subViewForm'] = $subViewForm;
        $this->commonData();

        return $this->renderTheme('App\Modules\User\Views\Investments\Add', $this->data);
    }
    
    public function addWatchlist()
    {
        $request = service('request');
    
        if (!$this->validate([
            'symbol_name' => 'required|string',
            'asset_type' => 'required|string',
            'market' => 'required|string',
            'user_id' => 'required|integer'
        ])) {
            return $this->response->setJSON(['status' => 'error', 'message' => $this->validator->getErrors()]);
        }
    
        $data = [
            'symbol_name' => $request->getPost('symbol_name'),
            'asset_type' => $request->getPost('asset_type'),
            'market' => $request->getPost('market'),
            'user_id' => $request->getPost('user_id'),
            'created_at' => date('Y-m-d H:i:s'),
        ];
    
        if ($this->watchlistModel->insert($data)) {
            $userId = (int) ($data['user_id'] ?? 0);
            $this->invalidateCrudCache(array_filter([
                'investments',
                $userId > 0 ? 'user:' . $userId : null,
            ]));
            return $this->response->setJSON(['status' => 'success', 'message' => 'Watchlist updated successfully']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update watchlist']);
        }
    }
    
    public function edit($tradeId)
    {
        $this->data['pageTitle'] = 'Edit Trade | MyMI Wallet | The Future of Finance';
        $this->data['trade'] = $this->investmentModel->getTradeById($tradeId);
        
        if ($this->request->getMethod() === 'post') {
            $updateData = $this->request->getPost();
            $this->investmentModel->updateTrade($tradeId, $updateData);
            $userId = (int) ($trade['user_id'] ?? ($updateData['user_id'] ?? 0));
            $this->invalidateCrudCache(array_filter([
                'investments',
                $userId > 0 ? 'user:' . $userId : null,
            ]));
            return redirect()->to('/Investments');
        }

        return $this->renderTheme('App\Modules\User\Views\Investments\edit_trade', $this->data);
    }

    public function deleteTrade($tradeId)
    {
        $trade = $this->investmentModel->getTradeById($tradeId);
        $this->investmentModel->deleteTrade($tradeId);
        $userId = (int)($trade['user_id'] ?? $this->cuID ?? 0);
        $this->invalidateCrudCache(array_filter([
            'investments',
            $userId > 0 ? 'user:' . $userId : null,
        ]));
        return redirect()->to('/Investments');
    }

    public function retirement()
    {
        // Assuming you have a model or service that fetches user investments
        $cuID = $this->cuID; // User ID
        // $userInvestments = $this->getinvestmentService()->getInvestmentData($cuID); // Adjust this line to your implementation
    
        // Pass investments to the view
        // $this->data['userInvestments'] = $userInvestments;
    
        // Pass other data as needed
        $this->commonData(); // Ensure other necessary data is prepared
    
        return $this->renderTheme('App\Modules\User\Views\Investments\retirement', $this->data);
    }   

    public function services()
    {
        // Assuming you have a model or service that fetches user investments
        $cuID = $this->cuID; // User ID
        // $userInvestments = $this->getinvestmentService()->getInvestmentData($cuID); // Adjust this line to your implementation
    
        // Pass investments to the view
        // $this->data['userInvestments'] = $userInvestments;
    
        // Pass other data as needed
        $this->commonData(); // Ensure other necessary data is prepared
    
        return $this->renderTheme('App\Modules\User\Views\Investments\services', $this->data);
    }    

    public function sharePortfolio($userId)
    {
        $this->data['pageTitle'] = 'Share Portfolio | MyMI Wallet | The Future of Finance';
        $this->data['portfolio'] = $this->investmentModel->getUserPortfolio($userId);
        $this->commonData(); // Ensure other necessary data is prepared
        return $this->renderTheme('App\Modules\User\Views\Investments\share_portfolio', $this->data);
    }
    
    public function tradeTracker()
    {
        $this->data['pageTitle'] = 'MyMI Trade Tracker | MyMI Wallet | The Future of Finance';
    
        // Define stock tickers and predefined analytics
        $this->data['stockTickers'] = ['AAPL', 'GOOGL', 'AMZN', 'TSLA', 'MSFT'];
        $this->data['predefinedAnalytics'] = [
            ['symbol' => 'AAPL', 'shares' => 10, 'entry_price' => 150, 'current_price' => 170],
            ['symbol' => 'GOOGL', 'shares' => 5, 'entry_price' => 2500, 'current_price' => 2800],
        ];
    
        $this->commonData(); // Ensure this is correctly defined to set `$this->data`
        return $this->renderTheme('App\Modules\User\Views\Investments\tradeTracker', $this->data);
    }
    
  
    public function fetchRealTimeData($symbol)
    {
        $realTimeData = $this->getinvestmentService()->fetchRealTimeData($symbol);
        return $this->respond(['status' => 'success', 'data' => $realTimeData]);
    }
       
    public function accountManager()
    {
        $rawInput = $this->request->getBody();
        log_message('debug', 'InvestmentsController::accountManager L290 - Raw Input: ' . $rawInput);
    
        $json = json_decode($rawInput, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('critical', 'JSON Parsing Error: ' . json_last_error_msg());
            return $this->fail('Invalid JSON format: ' . json_last_error_msg(), 400);
        }
    
        log_message('debug', 'InvestmentsController::accountManager L297 - $json Array: ' . print_r($json, true));
    
        try {
            if (isset($json['form_mode']) && $json['form_mode'] === 'Watchlist') {
                log_message('debug', 'InvestmentsController::accountManager L304 - Adding to Watchlist.');
                $result = $this->investmentModel->addToWatchlist($this->cuID, $json['symbol']);
    
                if ($result) {
                    log_message('debug', 'InvestmentsController::accountManager L306 - Successfully added to Watchlist.');
                    return $this->response->setJSON(['status' => 'success'])->setStatusCode(200);
                }
    
                log_message('error', 'InvestmentsController::accountManager L308 - Failed to add to Watchlist.');
                return $this->fail('Failed to add to watchlist.', 500);
            }
    
            log_message('debug', 'InvestmentsController::accountManager L310 - Processing investment.');
            $response = $this->processInvestment($json);
    
            if ($response->getStatusCode() === 200) {
                log_message('debug', 'Investment processed successfully.');
                return $this->response->setJSON(['status' => 'success']);
            }
    
            log_message('error', 'Failed to process investment.');
            return $this->fail('An error occurred while processing the investment.', 500);
        } catch (\Exception $e) {
            log_message('critical', 'Exception: ' . $e->getMessage());
            return $this->fail('An unexpected error occurred: ' . $e->getMessage(), 500);
        }
    }
    
    private function processInvestment(array $json) {
        $validation = $this->validateTradeInput($json);
        if (!$validation['isValid']) {
            log_message('error', $validation['message']);
            return $this->fail($validation['message'], 400);
        }
    
        $tradeData = $this->computeTradeData($json);
    
        // Use the model's saveTrade method
        $result = $this->investmentModel->saveTrade($tradeData);
        if (!$result) {
            log_message('error', 'Failed to process trade: ' . json_encode($tradeData));
            return $this->fail('Trade could not be processed.', 500);
        }
    
        return $this->response->setJSON(['status' => 'success']);
    }    
    
    // private function validateTradeInput(array $json) {
    //     if (!isset($json['shares'], $json['price'], $json['user_id'])) {
    //         return ['isValid' => false, 'message' => 'Missing required trade fields'];
    //     }
    //     return ['isValid' => true];
    // }
    
    private function computeTradeData(array $json) {
        $totalTradeCost = (float)$json['shares'] * (float)$json['price'];
        $json['user_id'] = $json['user_id'] ?? $this->cuID;        

        // Fetch data from UserService
        $userData = $this->getuserService()->commonData(); 
        $tradeData = [
            'id' => $json['id'] ?? '',
            'status' => 'Active',
            'user_id' => $json['user_id'] ?? $this->cuID,
            'user_email' => $userData['cuEmail'],
            'username' => $userData['cuUsername'],
            'modified_by' => $json['user_id'] ?? $this->cuID,
            'open_date' => $json['open_date'] ?? 'N/A',
            'open_time' => $json['open_time'] ?? 'N/A',
            'trade_type' => $json['trade_type'] ?? '',
            'symbol' => $json['symbol'] ?? '',
            'shares' => $json['shares'],
            'entry_price' => $json['price'],
            'total_trade_cost' => $totalTradeCost,
            'order_status' => $json['order_status'] ?? 'OPENING',
            'closed' => $json['order_status'] === 'CLOSING' ? 'true' : 'false',
            'submitted_date' => date('Y-m-d H:i:s'),
            'modified_on' => date('Y-m-d H:i:s'),
            'updated_on' => date('Y-m-d H:i:s'),
            // 'json_user_fields' => $json,
        ];

        log_message('debug', 'InvestmentsController L466 - $tradeData Array: ' . (print_r($tradeData, true)));
        return $tradeData;
    }
    
    private function loadDynamicData(array $fields, array $json)
    {
        $dynamicData = [];
        foreach ($fields as $field) {
            $dynamicData[$field] = $json[$field] ?? null;
        }
        log_message('debug', 'Dynamic Data Processed: ' . print_r($dynamicData, true));
        return $dynamicData;
    }  
    
    public function save()
    {
        $this->validateSaveRequest();
        $formData = $this->request->getPost();
        return $this->saveInvestmentData($formData);
    }

    public function assessment()
    {
        $this->data['pageTitle'] = 'My Retirement Assessment | MyMI Wallet | The Future of Finance';
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Investments\Assessment', $this->data);
    }

    public function trackInvestmentReturns($userId, $investmentId)
    {
        $returns = $this->investmentModel->getInvestmentReturns($userId, $investmentId);
        if ($returns) {
            return $this->respond(['status' => 'success', 'returns' => $returns]);
        } else {
            return $this->fail('No investment returns data found', 404);
        }
    }
 
    public function getUserInvestmentSummary()
    {
        $summary = $this->getinvestmentService()->getUserInvestmentSummary($this->cuID);
        if ($summary) {
            return $this->respond(['status' => 'success', 'summary' => $summary]);
        } else {
            return $this->fail('No summary found', 404);
        }
    }

    public function getInvestmentPerformance($userId)
    {
        $performance = $this->investmentModel->getInvestmentPerformance($userId);
        if ($performance) {
            return $this->respond(['status' => 'success', 'performance' => $performance]);
        } else {
            return $this->fail('No investment performance data found', 404);
        }
    }

    public function analyzeUserPortfolio($userId)
    {
        $analysis = $this->investmentModel->analyzePortfolio($userId);
        if ($analysis) {
            return $this->respond(['status' => 'success', 'analysis' => $analysis]);
        } else {
            return $this->fail('Portfolio analysis failed', 500);
        }
    }
    
    public function getSymbolsByTradeType($tradeType)
    {
        $symbols = $this->getinvestmentService()->getSymbolsByTradeType($tradeType);
        if ($symbols) {
            return $this->respond(['status' => 'success', 'symbols' => $symbols]);
        } else {
            return $this->fail('No symbols found for this trade type', 404);
        }
    }
    
    public function dynamicRiskAssessment($userId)
    {
        $riskProfile = $this->getinvestmentService()->calculateRiskExposure($userId);
        if ($riskProfile) {
            return $this->respond(['status' => 'success', 'riskProfile' => $riskProfile]);
        } else {
            return $this->fail('Failed to assess risk', 500);
        }
    }    

    public function getCustomAlerts()
    {
        $alerts = $this->getinvestmentService()->getCustomAlerts($this->cuID);
        if ($alerts) {
            return $this->respond(['status' => 'success', 'alerts' => $alerts]);
        } else {
            return $this->fail('No custom alerts found', 404);
        }
    }

    public function getMarketNews()
    {
        $marketNews = $this->getinvestmentService()->getMarketNews($this->cuID);
        if ($marketNews) {
            return $this->respond(['status' => 'success', 'marketNews' => $marketNews]);
        } else {
            return $this->fail('Failed to retrieve market news', 500);
        }
    }    
    
    public function getUserWatchlist($cuID)
    {
        try {
            $watchlist = $this->investmentModel->getUserWatchlist($cuID);
            return $this->response->setJSON(['status' => 'success', 'data' => $watchlist]);
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)
                                ->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function setCustomAlert()
    {
        $alertData = $this->request->getPost();
        $this->getinvestmentService()->setCustomAlert($this->cuID, $alertData);
        return $this->respond(['status' => 'success', 'message' => 'Alert set successfully']);
    }

    public function retirementPlanner()
    {
        $this->data['pageTitle'] = 'My Retirement Planner | MyMI Wallet | The Future of Finance';
        $this->commonData();
        $this->data['retirementPlan'] = $this->investmentModel->getRetirementPlan($this->cuID);
        return $this->renderTheme('App\Modules\User\Views\Investments\Retirement_Planner', $this->data);
    }   
    
    public function manageTrades()
    {
        $this->data['pageTitle'] = 'Manage Trades | MyMI Wallet | The Future of Finance';
        $this->data['trades'] = $this->investmentModel->getAllTradesByUser($this->cuID);
        return $this->renderTheme('App\Modules\User\Views\Investments\manage_trades', $this->data);
    }
    
    // Other investment-specific methods...

    private function validateSaveRequest()
    {
        if (!$this->request->isAJAX() || $this->request->getMethod() !== 'post') {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('This action is not allowed');
        }
    }

    private function saveInvestmentData($formData)
    {
        $result = $this->investmentModel->insert($formData);
        if ($result) {
            $userId = (int) ($formData['user_id'] ?? $this->cuID ?? 0);
            $this->invalidateCrudCache(array_filter([
                'investments',
                $userId > 0 ? 'user:' . $userId : null,
            ]));
            return $this->respond(['status' => 'success']);
        }

        return $this->fail('Failed to save data');
    }

    // Trade Tracker Functionality: 

    public function getTradeData()
    {
        $userId = $this->request->getGet('user_id');
    
        // Fetch trades for the user
        $trades = $this->investmentModel->allUserInvestmentsInfo($this->cuID);
    
        // Decode custom fields from `json_user_fields`
        foreach ($trades as &$trade) {
            if (!empty($trade['json_user_fields'])) {
                $customFields = json_decode($trade['json_user_fields'] ?? '{}', true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $trade['custom_columns'] = $customFields['custom_columns'] ?? [];
                    $trade['custom_data'] = $customFields['custom_data'] ?? [];
                } else {
                    log_message('error', 'Invalid JSON in json_user_fields for trade ID: ' . $trade['id']);
                    $trade['custom_columns'] = [];
                    $trade['custom_data'] = [];
                }
            } else {
                $trade['custom_columns'] = [];
                $trade['custom_data'] = [];
            }
        }
        log_message('debug', 'InvestmentsController L625 - $trades array: ' . (print_r($trades, true)));
        return $this->response->setJSON(['trades' => $trades]);
    } 

    public function saveTradeData()
    {
        log_message('debug', 'InvestmentsController: Starting saveTradeData');
        $decodedInput = $this->request->getJSON(true); // Parse JSON payload
        log_message('debug', 'Decoded Input: ' . print_r($decodedInput, true));
    
        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('critical', 'Invalid JSON format: ' . json_last_error_msg());
            return $this->fail('Invalid JSON format: ' . json_last_error_msg(), 400);
        }
    
        $tradeInfo = $decodedInput['trade'] ?? null;
        if (!$tradeInfo || !is_array($tradeInfo)) {
            log_message('error', 'Invalid input structure for trade data');
            return $this->fail('Invalid trade data', 400);
        }
    
        // Ensure the `id` is used to update an existing record
        $result = null;
        if (isset($tradeInfo['id']) && !empty($tradeInfo['id'])) {
            $result = $this->investmentModel->updateTrade($tradeInfo['id'], $tradeInfo);
            log_message('debug', "Updated trade with ID: {$tradeInfo['id']}");
        } else {
            $result = $this->investmentModel->addTrade($tradeInfo);
            log_message('debug', "Inserted new trade: " . print_r($tradeInfo, true));
        }

        if ($result) {
            $userId = (int) ($tradeInfo['user_id'] ?? 0);
            if (! $userId && !empty($tradeInfo['id'])) {
                $existing = $this->investmentModel->getTradeById($tradeInfo['id']);
                $userId = (int)($existing['user_id'] ?? 0);
            }
            if (! $userId) {
                $userId = (int) ($this->cuID ?? 0);
            }

            $this->invalidateCrudCache(array_filter([
                'investments',
                $userId > 0 ? 'user:' . $userId : null,
            ]));

            return $this->respond(['status' => 'success', 'message' => 'Trade saved successfully']);
        } else {
            return $this->fail('Failed to save trade data', 500);
        }
    }
    
    private function validateTradeInput(array $json)
    {
        $requiredFields = ['trade_type', 'symbol', 'shares', 'price', 'user_id'];
        foreach ($requiredFields as $field) {
            if (empty($json[$field])) {
                log_message('error', "Validation failed: Missing required field {$field}");
                return ['isValid' => false, 'message' => "Missing required field: {$field}"];
            }
        }
        return ['isValid' => true];
    }    

    private function prepareTradeData(array $tradeInfo): array
    {
        $totalTradeCost = (float)$tradeInfo['shares'] * (float)$tradeInfo['entry_price'];
        return [
            'user_id' => $tradeInfo['user_id'],
            'symbol' => $tradeInfo['symbol'],
            'shares' => $tradeInfo['shares'],
            'entry_price' => $tradeInfo['entry_price'],
            'current_price' => $tradeInfo['current_price'] ?? $tradeInfo['entry_price'],
            'total_trade_cost' => $totalTradeCost,
            'net_gains' => ($tradeInfo['shares'] * ($tradeInfo['current_price'] ?? 0)) - $totalTradeCost,
            'order_status' => $tradeInfo['order_status'] ?? 'OPENING',
            'closed' => $tradeInfo['order_status'] === 'CLOSING' ? 'true' : 'false',
            'submitted_date' => date('Y-m-d H:i:s'),
        ];
    }
    public function exportExcel()
    {
        $data = [
            ['symbol' => 'AAPL', 'shares' => 10, 'entry_price' => 150, 'current_price' => 170],
            ['symbol' => 'GOOGL', 'shares' => 5, 'entry_price' => 2500, 'current_price' => 2800],
        ];

        $filename = 'TradeTracker_' . date('Y-m-d_H:i:s') . '.xlsx';

        Excel::download(function ($excel) use ($data) {
            $excel->sheet('Trades', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        }, $filename);
    }
}
?>
