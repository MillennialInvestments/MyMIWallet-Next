<?php namespace App\Modules\User\Controllers;

use App\Controllers\BaseUserController;

use Config\{Auth, SiteSettings, SocialMedia};
use App\Libraries\{MyMIBudget, MyMIDashboard, MyMICoin, MyMIGold, MyMIInvestments, MyMIMarketData, MyMIMarketing, MyMIReferrals, MyMISolana, MyMIUser, MyMIWallet, MyMIWallets, MyMISimulator, FRED, MyMIFractalAnalyzer};
use App\Models\{AccountsModel, AlertsModel, BudgetModel, InvestmentForecastAccuracyModel, InvestmentForecastHistoryModel, InvestmentModel, InvestmentPriceForecastModel, MarketingModel, MgmtBudgetModel, MyMIGoldModel, UserModel, WalletModel};
use App\Services\ForecastAggregationService;
use App\Services\ForecastAccuracyEvaluator;
use App\Services\{BudgetService, DashboardService, GoalTrackingService, InvestmentService, SolanaService, UserService, WalletService};
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Cache\CacheInterface;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;
use Maatwebsite\Excel\Facades\Excel;
use Myth\Auth\Authorization\GroupModel;
use Psr\Log\LoggerInterface;

#[\AllowDynamicProperties]
class InvestmentsController extends BaseUserController
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
    protected ?WalletService $walletService = null;
    
    // Models
    protected $accountsModel;
    protected $budgetModel;
    protected $investmentModel;
    protected $marketingModel;
    protected $myMIGoldModel;
    protected $userModel;
    protected $walletModel;
    protected ?\CodeIgniter\HTTP\ResponseInterface $featureGuardResponse = null;
    
    // Libraries

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        helper(['feature', 'premium']);
        $this->featureGuardResponse = feature_guard('FEATURE_INVESTMENTS', ['controller' => __CLASS__, 'phase' => 'phase_a']);
        $this->auth = service('authentication');
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
        $networkStatus = [
            'healthy'  => false,
            'slot'     => null,
            'version'  => null,
            'status'   => 'offline',
            'degraded' => true,
        ];
        try {
            $svc = $this->solanaService instanceof SolanaService ? $this->solanaService : (service('solanaService') ?: null);
            if ($svc instanceof SolanaService) {
                $networkStatus       = $svc->getSafeNetworkStatus();
                $this->solanaService = $svc;
            } else {
                log_message('info', 'InvestmentsController getNetworkStatus skipped: SolanaService not configured');
            }
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController getNetworkStatus failed: {msg}', ['msg' => $e->getMessage()]);
            $networkStatus['error'] = $e->getMessage();
        }
        $data['solanaNetworkStatus'] = $networkStatus;
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
        $this->data['solanaNetworkStatus'] = $networkStatus;
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

    public function forecastModal(string $ticker)
    {
        if ($premiumGuard = premium_guard('investments.analytics')) {
            return $premiumGuard;
        }

        $ticker = strtoupper(trim($ticker));
        if ($ticker === '') {
            throw PageNotFoundException::forPageNotFound();
        }

        $forecastModel = new InvestmentPriceForecastModel();
        $historyModel = new InvestmentForecastHistoryModel();
        $config = config('MyMIForecasting');

        $latestForecasts = $forecastModel
            ->where('ticker', $ticker)
            ->orderBy('updated_at', 'DESC')
            ->findAll();

        $history = $historyModel
            ->where('ticker', $ticker)
            ->orderBy('recorded_at', 'DESC')
            ->limit(10)
            ->findAll();

        $data = [
            'ticker' => $ticker,
            'latestForecasts' => $latestForecasts,
            'historySnapshots' => $history,
            'forecastDetails' => $this->buildForecastDetailsPayload($ticker, $latestForecasts, $history),
            'confidenceThresholds' => $config->confidenceThresholds ?? [],
            'featureFlags' => $config->features ?? [],
            'heatmapColors' => [
                'low' => '#e85347',
                'medium' => '#f4bd0e',
                'high' => '#1ee0ac',
            ],
        ];

        return view('Investments/forecast_detail_modal', $data);
    }

    private function buildForecastDetailsPayload(string $ticker, array $latestForecasts, array $history): array
    {
        $timeframes = [];

        foreach ($latestForecasts as $forecast) {
            $timeframe = (string) ($forecast['timeframe'] ?? '');
            if ($timeframe === '') {
                continue;
            }

            $timeframes[$timeframe] = [
                'direction' => $forecast['forecast_direction'] ?? 'neutral',
                'confidence' => (int) ($forecast['confidence_score'] ?? 0),
                'target' => $forecast['target_price'] ?? null,
                'range' => [
                    $forecast['range_low'] ?? null,
                    $forecast['range_high'] ?? null,
                ],
                'indicators' => $this->decodeIndicators($forecast['indicators_json'] ?? null),
                'updated_at' => $forecast['updated_at'] ?? $forecast['created_at'] ?? null,
            ];
        }

        $historyPayload = array_map(static function (array $snapshot): array {
            return [
                'recorded_at' => $snapshot['recorded_at'] ?? null,
                'timeframe' => $snapshot['timeframe'] ?? null,
                'direction' => $snapshot['forecast_direction'] ?? null,
                'confidence' => (int) ($snapshot['confidence_score'] ?? 0),
                'target' => $snapshot['target_price'] ?? null,
                'range' => [
                    $snapshot['range_low'] ?? null,
                    $snapshot['range_high'] ?? null,
                ],
                'indicators' => $this->decodeIndicators($snapshot['indicators_json'] ?? null),
            ];
        }, $history);

        return [
            'ticker' => $ticker,
            'timeframes' => $timeframes,
            'history' => $historyPayload,
        ];
    }

    private function decodeIndicators(?string $payload): array
    {
        if (! $payload) {
            return [];
        }

        $decoded = json_decode($payload, true);
        return is_array($decoded) ? $decoded : [];
    }

    public function getForecastDetails(string $ticker)
    {
        $ticker = strtoupper(trim($ticker));
        if ($ticker === '') {
            return $this->failValidationError('Ticker is required.');
        }

        $forecastModel = new InvestmentPriceForecastModel();
        $historyModel = new InvestmentForecastHistoryModel();
        $accuracyModel = new InvestmentForecastAccuracyModel();

        $latestForecasts = $forecastModel
            ->where('ticker', $ticker)
            ->orderBy('updated_at', 'DESC')
            ->findAll();

        $grouped = [];
        foreach ($latestForecasts as $forecast) {
            $timeframe = $forecast['timeframe'] ?? 'n/a';
            $indicators = json_decode($forecast['indicators_json'] ?? '{}', true) ?? [];
            $forecast['indicators'] = $indicators;
            $grouped[$timeframe] = $forecast;
        }

        $history = $historyModel
            ->where('ticker', $ticker)
            ->orderBy('recorded_at', 'DESC')
            ->limit(10)
            ->findAll();

        $accuracyRows = $accuracyModel
            ->where('ticker', $ticker)
            ->orderBy('created_at', 'DESC')
            ->findAll();

        $hitTotal = count($accuracyRows);
        $hitCount = 0;
        foreach ($accuracyRows as $row) {
            if (($row['hit_result'] ?? '') === 'hit') {
                $hitCount++;
            }
        }

        $rolling = [];
        foreach ([7, 30] as $days) {
            $cutoff = strtotime("-{$days} days");
            $windowRows = array_filter($accuracyRows, static function ($row) use ($cutoff) {
                $createdAt = $row['created_at'] ?? null;
                return $createdAt && strtotime($createdAt) >= $cutoff;
            });
            $windowTotal = count($windowRows);
            $windowHits = 0;
            foreach ($windowRows as $row) {
                if (($row['hit_result'] ?? '') === 'hit') {
                    $windowHits++;
                }
            }
            $rolling[$days . 'd'] = $windowTotal > 0 ? round(($windowHits / $windowTotal) * 100, 1) : 0;
        }

        $accuracySummary = [
            'hit_rate' => $hitTotal > 0 ? round(($hitCount / $hitTotal) * 100, 1) : 0,
            'total' => $hitTotal,
            'rolling' => $rolling,
        ];

        return $this->respond([
            'ticker' => $ticker,
            'latest' => $grouped,
            'history' => $history,
            'accuracy' => $accuracySummary,
        ]);
    }

    public function getConfidenceHeatmap()
    {
        $timeframe = (string) ($this->request->getGet('timeframe') ?? '5m');
        $window = (int) ($this->request->getGet('window') ?? 60);
        $window = max(5, min(1440, $window));

        $cacheKey = 'forecast_heatmap_' . $timeframe . '_' . $window;
        $cached = $this->cache->get($cacheKey);
        if ($cached) {
            return $this->respond($cached);
        }

        /** @var ForecastAggregationService $aggregation */
        $aggregation = service('forecastAggregation');
        $payload = $aggregation->buildHeatmap($timeframe, $window);

        $this->cache->save($cacheKey, $payload, config('MyMIForecasting')->cacheTtls['heatmap'] ?? 60);

        return $this->respond($payload);
    }

    public function getForecastAccuracySummary()
    {
        $window = (string) ($this->request->getGet('window') ?? '7d');

        $cacheKey = 'forecast_accuracy_' . $window;
        $cached = $this->cache->get($cacheKey);
        if ($cached) {
            return $this->respond($cached);
        }

        /** @var ForecastAccuracyEvaluator $evaluator */
        $evaluator = service('forecastAccuracyEvaluator');
        $payload = $evaluator->buildAccuracySummary($window);

        $this->cache->save($cacheKey, $payload, config('MyMIForecasting')->cacheTtls['accuracySummary'] ?? 120);

        return $this->respond($payload);
    }

    public function getForecastHighlights()
    {
        $forecaster = service('mymiForecaster');
        return $this->respond($forecaster->getForecastHighlights());
    }

    public function reforecastTicker()
    {
        $ticker = strtoupper(trim((string) $this->request->getPost('ticker')));
        if ($ticker === '') {
            return $this->failValidationError('Ticker is required.');
        }

        $timeframesInput = trim((string) $this->request->getPost('timeframes'));
        $timeframes = $timeframesInput !== '' ? array_filter(array_map('trim', explode(',', $timeframesInput))) : [];

        $forecaster = service('mymiForecaster');
        $results = $forecaster->forecastForTicker($ticker, $timeframes);

        $alertsModel = new AlertsModel();
        $best = null;
        foreach ($results as $result) {
            if (! $best || ((int) ($result['confidence_score'] ?? 0)) > (int) ($best['confidence_score'] ?? 0)) {
                $best = $result;
            }
        }

        if ($best) {
            $alertsModel
                ->where('ticker', $ticker)
                ->set([
                    'latest_forecast_id' => $best['id'] ?? null,
                    'forecast_confidence' => $best['confidence_score'] ?? 0,
                    'forecast_direction' => $best['forecast_direction'] ?? 'neutral',
                    'forecast_target_price' => $best['target_price'] ?? null,
                    'forecast_range_low' => $best['range_low'] ?? null,
                    'forecast_range_high' => $best['range_high'] ?? null,
                    'forecast_updated_at' => $best['updated_at'] ?? date('Y-m-d H:i:s'),
                ])
                ->update();
        }

        return $this->respond([
            'status' => 'success',
            'ticker' => $ticker,
            'timeframes' => array_keys($results),
        ]);
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
        if ($this->featureGuardResponse instanceof \CodeIgniter\HTTP\ResponseInterface) {
            return $this->featureGuardResponse;
        }

        // Assuming you have a model or service that fetches user investments
        $cuID = $this->cuID; // User ID
        $userInvestments = $this->investmentService->getInvestmentData($cuID); // Adjust this line to your implementation

        // Pass investments to the view
        $this->data['userInvestments'] = $userInvestments;
    
        // Pass other data as needed
        $this->commonData(); // Ensure other necessary data is prepared

        try {
            $this->data['squeezeRadar'] = $this->getMyMIInvestments()->getSqueezeRadar(10);
        } catch (\Throwable $e) {
            log_message('debug', 'InvestmentsController::index squeeze radar unavailable: {msg}', ['msg' => $e->getMessage()]);
            $this->data['squeezeRadar'] = [];
        }
    
        return $this->renderTheme('App\Modules\User\Views\Investments\index', $this->data);
    }    

    public function add()
    {
        $investmentType   = $this->uri->getSegment(3) ?? 'Stock';
        $subViewDirectory = 'UserModule\\Views\\';
        $subViewFile      = 'Investments\\Add\\stock_fields';
        $subViewForm      = 'Investments\\Add\\Stock';
        $subViewTitle     = 'Add Investment';

        switch ($investmentType) {
            case 'Bond':
                $subViewTitle = 'Add Bond Investment';
                $subViewForm  = 'Investments\\Add\\Bond';
                $subViewFile  = 'Investments\\Add\\bond_fields';
                break;
            case 'Crypto':
                $subViewTitle = 'Add Crypto Investment';
                $subViewForm  = 'Investments\\Add\\Crypto';
                $subViewFile  = 'Investments\\Add\\crypto_fields';
                break;
            case 'Stock':
                $subViewTitle = 'Add Stock Investment';
                $subViewForm  = 'Investments\\Add\\Stock';
                $subViewFile  = 'Investments\\Add\\stock_fields';
                break;
            default:
                log_message('warning', 'InvestmentsController::add received unknown type: {type}', ['type' => $investmentType]);
                break;
        }

        $this->data['pageTitle']   = $subViewTitle . ' | MyMI Wallet | The Future of Finance';
        $this->data['subViewFile'] = $this->resolveSubViewPath($subViewDirectory, $subViewFile);
        $this->data['subViewTitle'] = $subViewTitle;
        $this->data['subViewForm']  = $subViewForm;
        $this->commonData();

        return $this->renderTheme('App\Modules\User\Views\Investments\Add', $this->data);
    }

    public function squeezes()
    {
        // Assuming you have a model or service that fetches user investments
        $cuID = $this->cuID; // User ID
        $userInvestments = $this->investmentService->getInvestmentData($cuID); // Adjust this line to your implementation

        // Pass investments to the view
        $this->data['userInvestments'] = $userInvestments;
    
        // Pass other data as needed
        $this->commonData(); // Ensure other necessary data is prepared

        try {
            $this->data['squeezeRadar'] = $this->getMyMIInvestments()->getSqueezeRadar(10);
        } catch (\Throwable $e) {
            log_message('debug', 'InvestmentsController::index squeeze radar unavailable: {msg}', ['msg' => $e->getMessage()]);
            $this->data['squeezeRadar'] = [];
        }
    
        return $this->renderTheme('App\Modules\User\Views\Investments\index', $this->data);
    }   

    private function resolveSubViewPath(string $base, string $relative, string $fallback = 'Investments\\Add\\stock_fields'): string
    {
        $candidate = $this->joinViewPath($base, $relative);
        if ($this->viewExists($candidate)) {
            return $candidate;
        }

        $fallbackPath = $this->joinViewPath($base, $fallback);
        if ($this->viewExists($fallbackPath)) {
            log_message('warning', 'InvestmentsController missing view {view}; using fallback {fallback}', [
                'view'     => $candidate,
                'fallback' => $fallbackPath,
            ]);
            return $fallbackPath;
        }

        throw PageNotFoundException::forPageNotFound($candidate);
    }

    private function joinViewPath(string $base, string $relative): string
    {
        $base = rtrim($base, '\\');
        $relative = ltrim($relative, '\\');
        return $base . '\\' . $relative;
    }
    
    public function addWatchlist()
    {
        if ($this->featureGuardResponse instanceof \CodeIgniter\HTTP\ResponseInterface) {
            return $this->featureGuardResponse;
        }

        if ($featureGuard = feature_guard('FEATURE_WATCHLIST', ['controller' => __CLASS__, 'method' => __FUNCTION__])) {
            return $featureGuard;
        }

        if ($premiumGuard = premium_guard('investments.watchlist')) {
            return $premiumGuard;
        }

        $request = service('request');
    
        if (!$this->validate([
            'symbol_name' => 'required|string',
            'asset_type' => 'required|string',
            'market' => 'required|string',
            'user_id' => 'required|integer'
        ])) {
            return $this->response->setStatusCode(422)->setJSON(['status' => 'error', 'message' => $this->validator->getErrors()]);
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
            return $this->response->setStatusCode(500)->setJSON(['status' => 'error', 'message' => 'Failed to update watchlist']);
        }
    }
    
    public function edit($tradeId)
    {
        $this->data['pageTitle'] = 'Edit Trade | MyMI Wallet | The Future of Finance';
        $this->data['trade'] = $this->investmentModel->getTradeById($tradeId);
        
        if (strtolower($this->request->getMethod()) === 'post') {
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
        $this->data['retirementGoals'] = (new \App\Services\Forms\UserPreferenceService())->get((int) ($cuID ?? 0), 'investments.retirement_goals');
    
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
        if ($premiumGuard = premium_guard('investments.realtime_data')) {
            return $premiumGuard;
        }

        $realTimeData = $this->getinvestmentService()->fetchRealTimeData($symbol);
        return $this->respond(['status' => 'success', 'data' => $realTimeData]);
    }
       
    public function accountManager()
    {
        if ($this->featureGuardResponse instanceof \CodeIgniter\HTTP\ResponseInterface) {
            return $this->featureGuardResponse;
        }

        $rawInput = $this->request->getBody();
        log_message('debug', 'InvestmentsController::accountManager L290 - Raw Input: ' . $rawInput);
    
        $json = json_decode($rawInput, true);
        if (json_last_error() !== JSON_ERROR_NONE || ! is_array($json)) {
            // The add-investment page posts a normal form; the JS widgets post JSON.
            $json = (array) $this->request->getPost();
            if ($json === []) {
                log_message('notice', 'InvestmentsController::accountManager: body is neither JSON nor a form post');
                return $this->fail('Invalid request body.', 400);
            }
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
            // Records always belong to the signed-in user, never to a posted user_id.
            $json['user_id'] = $this->cuID;
            $response = $this->processInvestment($json);
    
            if ($response->getStatusCode() === 200) {
                log_message('debug', 'Investment processed successfully.');
                return $this->response->setJSON(['status' => 'success']);
            }
            if ($response->getStatusCode() >= 400 && $response->getStatusCode() < 500) {
                return $response; // validation message, not a server error
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
            log_message('notice', $validation['message']);
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
        $json['user_id'] = $this->cuID; // never trust a posted user_id

        // Fetch data from UserService
        $userData = $this->getuserService()->commonData(); 
        $tradeData = [
            'id' => $json['id'] ?? '',
            'status' => 'Active',
            'user_id' => $this->cuID,
            'user_email' => $userData['cuEmail'],
            'username' => $userData['cuUsername'],
            'modified_by' => $this->cuID,
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
    
    public function getUserWatchlist($cuID = null)
    {
        $userId = (int) ($this->cuID ?? 0);
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        }

        if ($cuID !== null && (int) $cuID !== $userId) {
            return $this->response->setStatusCode(403)->setJSON(['status' => 'error', 'message' => 'Forbidden']);
        }

        if ($this->featureGuardResponse instanceof \CodeIgniter\HTTP\ResponseInterface) {
            return $this->featureGuardResponse;
        }

        if ($featureGuard = feature_guard('FEATURE_WATCHLIST', ['controller' => __CLASS__, 'method' => __FUNCTION__])) {
            return $featureGuard;
        }

        if ($premiumGuard = premium_guard('investments.watchlist')) {
            return $premiumGuard;
        }

        try {
            $watchlist = $this->investmentModel->getUserWatchlist($userId);
            $symbols = array_values(array_unique(array_filter(array_map(static fn ($row) => strtoupper((string) ($row['symbol'] ?? '')), $watchlist))));
            $squeezeMap = $symbols ? $this->getMyMIInvestments()->getSqueezeBySymbols($symbols) : [];
            foreach ($watchlist as &$row) {
                $symbol = strtoupper((string) ($row['symbol'] ?? ''));
                $row['squeeze'] = $squeezeMap[$symbol] ?? null;
            }
            unset($row);
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
        if ($premiumGuard = premium_guard('investments.retirement_planner')) {
            return $premiumGuard;
        }

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
        if (!$this->request->isAJAX() || strtolower($this->request->getMethod()) !== 'post') {
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
        if ($this->featureGuardResponse instanceof \CodeIgniter\HTTP\ResponseInterface) {
            return $this->featureGuardResponse;
        }

        $userId = (int) ($this->cuID ?? session('user_id') ?? 0);
        if ($userId <= 0) {
            return $this->failUnauthorized('Authentication required.');
        }

        log_message('debug', 'InvestmentsController: Starting saveTradeData');
        $decodedInput = $this->request->getJSON(true); // Parse JSON payload
        log_message('debug', 'Decoded Input: ' . print_r($decodedInput, true));
    
        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('critical', 'Invalid JSON format: ' . json_last_error_msg());
            return $this->fail('Invalid JSON format: ' . json_last_error_msg(), 400);
        }
    
        $tradeInfo = $decodedInput['trade'] ?? null;
        if (! $tradeInfo || ! is_array($tradeInfo)) {
            log_message('error', 'Invalid input structure for trade data');
            return $this->fail('Invalid trade data', 400);
        }

        // Strict ownership scoping: never trust client-supplied user_id
        $tradeInfo['user_id'] = $userId;
    
        // Ensure the `id` is used to update an existing record with ownership check
        $result = null;
        if (isset($tradeInfo['id']) && ! empty($tradeInfo['id'])) {
            $tradeId = (int) $tradeInfo['id'];
            $existing = $this->investmentModel->getTradeById($tradeId);
            if (! $existing) {
                return $this->failNotFound('Trade record not found.');
            }
            if ((int) ($existing['user_id'] ?? 0) !== $userId) {
                return $this->failForbidden('You do not have permission to modify this trade.');
            }

            $result = $this->investmentModel->updateTrade($tradeId, $tradeInfo);
            log_message('debug', "Updated trade with ID: {$tradeId}");
        } else {
            $result = $this->investmentModel->addTrade($tradeInfo);
            log_message('debug', "Inserted new trade for user {$userId}: " . print_r($tradeInfo, true));
        }

        if ($result) {
            $this->invalidateCrudCache([
                'investments',
                'user:' . $userId,
            ]);

            return $this->respond(['status' => 'success', 'message' => 'Trade saved successfully']);
        }

        return $this->fail('Failed to save trade data', 500);
    }

    /**
     * GTM-034: Import trades from CSV file or payload with duplicate detection.
     */
    public function importTradesCsv()
    {
        if ($this->featureGuardResponse instanceof \CodeIgniter\HTTP\ResponseInterface) {
            return $this->featureGuardResponse;
        }

        $userId = (int) ($this->cuID ?? session('user_id') ?? 0);
        if ($userId <= 0) {
            return $this->failUnauthorized('Authentication required.');
        }

        $file = $this->request->getFile('csv_file');
        $csvContent = '';

        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $csvContent = (string) file_get_contents($file->getTempName());
        } else {
            $csvContent = (string) ($this->request->getPost('csv_content') ?? '');
            if (empty($csvContent)) {
                $json = $this->request->getJSON(true);
                $csvContent = (string) ($json['csv_content'] ?? '');
            }
        }

        if (trim($csvContent) === '') {
            return $this->fail('CSV content or file is required.', 400);
        }

        $service = new \App\Services\TradeImportService($this->investmentModel);
        $parseResult = $service->parseCsv($csvContent);
        if (empty($parseResult['trades'])) {
            $errorMsg = ! empty($parseResult['errors'])
                ? implode('; ', $parseResult['errors'])
                : 'No valid trade rows found in CSV.';
            return $this->fail($errorMsg, 400);
        }

        $importResult = $service->importTrades($userId, $parseResult['trades'], true);
        if (! $importResult['success']) {
            return $this->fail('Import failed: ' . implode('; ', $importResult['errors']), 400);
        }

        $this->invalidateCrudCache(['investments', 'user:' . $userId]);

        return $this->respond([
            'status'          => 'success',
            'imported_count'  => $importResult['imported_count'],
            'duplicate_count' => $importResult['duplicate_count'],
            'errors'          => $importResult['errors'],
        ]);
    }
    
    private function validateTradeInput(array $json)
    {
        $requiredFields = ['trade_type', 'symbol', 'shares', 'price', 'user_id'];
        foreach ($requiredFields as $field) {
            if (empty($json[$field])) {
                log_message('notice', "Validation failed: Missing required field {$field}");
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

    // ---------------------------------------------------------------------
    // GT-FORM-ROUTES-001: retirement goals and economic data (FRED) endpoints.
    // ---------------------------------------------------------------------

    /** Fields of the retirement goals form, with their default values. */
    public const RETIREMENT_GOAL_FIELDS = [
        'current_age' => 0, 'retirement_age' => 0, 'current_savings' => 0, 'monthly_contribution' => 0,
        'target_amount' => 0, 'expected_return' => 0, 'risk_profile' => '',
    ];

    /** POST Investments/saveRetirementPlan: saves the user's retirement goals. */
    public function saveRetirementPlan()
    {
        $userId = (int) ($this->cuID ?? 0);
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Please sign in.']);
        }
        $json = $this->request->getJSON(true);
        $input = is_array($json) ? $json : (array) $this->request->getPost();
        $goals = \App\Services\Forms\UserPreferenceService::shape(self::RETIREMENT_GOAL_FIELDS, $input);
        if ($goals['retirement_age'] > 0 && $goals['current_age'] > 0 && $goals['retirement_age'] <= $goals['current_age']) {
            return $this->response->setStatusCode(422)->setJSON(['status' => 'error', 'message' => 'Retirement age must be after your current age.']);
        }
        $goals['saved_at'] = date('c');

        $ok = (new \App\Services\Forms\UserPreferenceService())->put($userId, 'investments.retirement_goals', $goals);

        return $this->response->setStatusCode($ok ? 200 : 503)->setJSON($ok
            ? ['status' => 'success', 'message' => 'Retirement goals saved.', 'goals' => $goals]
            : ['status' => 'error', 'message' => 'Retirement goals could not be saved yet.']);
    }

    /** GET Investments/fetchEconomicData?seriesId=GDP: latest observations from FRED (read only). */
    public function fetchEconomicData()
    {
        $series = strtoupper(trim((string) $this->request->getGet('seriesId')));
        if (! preg_match('/^[A-Z0-9_]{1,40}$/', $series)) {
            return $this->response->setStatusCode(422)->setJSON(['error' => 'Invalid series id.']);
        }
        $cacheKey = 'fred_obs_' . $series;
        $rows = cache($cacheKey);
        if (! is_array($rows)) {
            try {
                $rows = (new \App\Libraries\FRED())->fetchData($series);
            } catch (\Throwable $e) {
                log_message('error', 'fetchEconomicData failed: {m}', ['m' => $e->getMessage()]);
                $rows = [];
            }
            $rows = array_slice(is_array($rows) ? $rows : [], -120);
            cache()->save($cacheKey, $rows, 3600);
        }
        $liked = (new \App\Services\Forms\UserPreferenceService())->get((int) ($this->cuID ?? 0), 'investments.economic_likes');

        return $this->response->setJSON(array_map(static fn ($r) => [
            'id'    => $series,
            'date'  => (string) ($r['date'] ?? ''),
            'value' => (string) ($r['value'] ?? ''),
            'liked' => in_array($series, (array) ($liked['series'] ?? []), true),
        ], array_reverse($rows)));
    }

    /** GET Investments/searchEconomicData?searchText=inflation: FRED series search (read only). */
    public function searchEconomicData()
    {
        $text = mb_substr(trim(strip_tags((string) $this->request->getGet('searchText'))), 0, 80);
        if (mb_strlen($text) < 2) {
            return $this->response->setJSON([]);
        }
        try {
            $result = (new \App\Libraries\FRED())->searchSeries($text);
        } catch (\Throwable $e) {
            log_message('error', 'searchEconomicData failed: {m}', ['m' => $e->getMessage()]);
            $result = [];
        }
        $series = array_slice((array) ($result['seriess'] ?? []), 0, 20);

        return $this->response->setJSON(array_map(static fn ($s) => [
            'id'    => (string) ($s['id'] ?? ''),
            'title' => (string) ($s['title'] ?? ''),
        ], $series));
    }

    /** POST Investments/likeEconomicData: toggles a saved ("liked") FRED series for the user. */
    public function likeEconomicData()
    {
        $userId = (int) ($this->cuID ?? 0);
        $series = strtoupper(trim((string) ($this->request->getPost('id') ?? '')));
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'error' => 'Please sign in.']);
        }
        if (! preg_match('/^[A-Z0-9_]{1,40}$/', $series)) {
            return $this->response->setStatusCode(422)->setJSON(['status' => 'error', 'error' => 'Invalid series id.']);
        }
        $prefs = new \App\Services\Forms\UserPreferenceService();
        $data = $prefs->get($userId, 'investments.economic_likes');
        $list = array_values(array_filter((array) ($data['series'] ?? []), 'is_string'));
        $liked = ! in_array($series, $list, true);
        $list = $liked ? array_slice(array_merge([$series], $list), 0, 100) : array_values(array_diff($list, [$series]));
        $ok = $prefs->put($userId, 'investments.economic_likes', ['series' => $list]);

        return $this->response->setStatusCode($ok ? 200 : 503)->setJSON($ok
            ? ['status' => 'success', 'liked' => $liked]
            : ['status' => 'error', 'error' => 'Could not save yet.']);
    }

    // GT-FORM-ROUTES-001: Investment Strategies CRUD
    public function getStrategies()
    {
        $userId = (int) ($this->cuID ?? 0);
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        }
        $strategies = $this->investmentModel->getStrategiesByUser($userId);
        return $this->response->setJSON($strategies);
    }

    public function getStrategy(int $id)
    {
        $userId = (int) ($this->cuID ?? 0);
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        }
        $strategy = $this->investmentModel->getStrategyById($id, $userId);
        if (! $strategy) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Strategy not found']);
        }
        return $this->response->setJSON($strategy);
    }

    public function createStrategy()
    {
        $userId = (int) ($this->cuID ?? 0);
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        }
        $name = trim((string) ($this->request->getPost('name') ?? ''));
        if ($name === '') {
            return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Strategy name is required']);
        }
        $data = [
            'user_id'     => $userId,
            'name'        => $name,
            'description' => (string) ($this->request->getPost('description') ?? ''),
            'created_at'  => date('Y-m-d H:i:s'),
        ];
        $id = $this->investmentModel->createStrategy($data);
        return $this->response->setJSON(['status' => 'success', 'id' => $id]);
    }

    public function updateStrategy(int $id)
    {
        $userId = (int) ($this->cuID ?? 0);
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        }
        $existing = $this->investmentModel->getStrategyById($id, $userId);
        if (! $existing) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Strategy not found']);
        }
        $input = $this->request->getRawInput() ?? [];
        $data = array_filter([
            'name'        => (string) ($input['name'] ?? $this->request->getPost('name') ?? ''),
            'description' => (string) ($input['description'] ?? $this->request->getPost('description') ?? ''),
        ]);
        $this->investmentModel->updateStrategy($id, $data, $userId);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function deleteStrategy(int $id)
    {
        $userId = (int) ($this->cuID ?? 0);
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        }
        $existing = $this->investmentModel->getStrategyById($id, $userId);
        if (! $existing) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Strategy not found']);
        }
        $this->investmentModel->deleteStrategy($id, $userId);
        return $this->response->setJSON(['status' => 'success']);
    }

    // GT-FORM-ROUTES-001: Investment Financial Goals CRUD
    public function getGoals()
    {
        $userId = (int) ($this->cuID ?? 0);
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        }
        $goals = $this->investmentModel->getGoalsByUser($userId);
        return $this->response->setJSON($goals);
    }

    public function getGoal(int $id)
    {
        $userId = (int) ($this->cuID ?? 0);
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        }
        $goal = $this->investmentModel->getGoalById($id, $userId);
        if (! $goal) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Goal not found']);
        }
        return $this->response->setJSON($goal);
    }

    public function createGoal()
    {
        $userId = (int) ($this->cuID ?? 0);
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        }
        $name = trim((string) ($this->request->getPost('name') ?? ''));
        if ($name === '') {
            return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Goal name is required']);
        }
        $data = [
            'user_id'       => $userId,
            'name'          => $name,
            'target_amount' => (float) ($this->request->getPost('target_amount') ?? 0),
            'description'   => (string) ($this->request->getPost('description') ?? ''),
            'created_at'    => date('Y-m-d H:i:s'),
        ];
        $id = $this->investmentModel->createGoal($data);
        return $this->response->setJSON(['status' => 'success', 'id' => $id]);
    }

    public function updateGoal(int $id)
    {
        $userId = (int) ($this->cuID ?? 0);
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        }
        $existing = $this->investmentModel->getGoalById($id, $userId);
        if (! $existing) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Goal not found']);
        }
        $input = $this->request->getRawInput() ?? [];
        $data = array_filter([
            'name'          => (string) ($input['name'] ?? $this->request->getPost('name') ?? ''),
            'target_amount' => (float) ($input['target_amount'] ?? $this->request->getPost('target_amount') ?? 0),
            'description'   => (string) ($input['description'] ?? $this->request->getPost('description') ?? ''),
        ]);
        $this->investmentModel->updateGoal($id, $data, $userId);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function deleteGoal(int $id)
    {
        $userId = (int) ($this->cuID ?? 0);
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        }
        $existing = $this->investmentModel->getGoalById($id, $userId);
        if (! $existing) {
            return $this->response->setStatusCode(404)->setJSON(['status' => 'error', 'message' => 'Goal not found']);
        }
        $this->investmentModel->deleteGoal($id, $userId);
        return $this->response->setJSON(['status' => 'success']);
    }

    // GT-FORM-ROUTES-001: Watchlist Add / Remove Form Handlers
    public function addToWatchlist()
    {
        $userId = (int) ($this->cuID ?? 0);
        if ($userId <= 0) {
            if ($this->request->isAJAX()) {
                return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
            }
            return redirect()->to('/login');
        }

        $symbol = trim((string) ($this->request->getPost('symbol') ?? ''));
        if ($symbol === '') {
            if ($this->request->isAJAX()) {
                return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Symbol is required']);
            }
            return redirect()->back()->with('error', 'Symbol is required');
        }

        $this->investmentModel->addToWatchlist($userId, strtoupper($symbol));
        if ($this->request->isAJAX()) {
            return $this->response->setJSON(['status' => 'success', 'symbol' => strtoupper($symbol)]);
        }
        return redirect()->back()->with('success', 'Added to watchlist');
    }

    public function removeFromWatchlist()
    {
        $userId = (int) ($this->cuID ?? 0);
        if ($userId <= 0) {
            if ($this->request->isAJAX()) {
                return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
            }
            return redirect()->to('/login');
        }

        $symbol = trim((string) ($this->request->getPost('symbol') ?? ''));
        if ($symbol === '') {
            if ($this->request->isAJAX()) {
                return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Symbol is required']);
            }
            return redirect()->back()->with('error', 'Symbol is required');
        }

        $this->investmentModel->removeFromWatchlist($userId, strtoupper($symbol));
        if ($this->request->isAJAX()) {
            return $this->response->setJSON(['status' => 'success', 'symbol' => strtoupper($symbol)]);
        }
        return redirect()->back()->with('success', 'Removed from watchlist');
    }

    public function watchlist()
    {
        $userId = (int) ($this->cuID ?? 0);
        if ($userId <= 0) {
            if ($this->request->isAJAX()) {
                return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
            }
            return redirect()->to('/login');
        }

        if ($this->request->getMethod() === 'POST') {
            $action = $this->request->getPost('action') ?? 'add';
            $symbol = trim((string) ($this->request->getPost('symbol') ?? ''));
            if ($symbol !== '') {
                if ($action === 'remove') {
                    $this->investmentModel->removeFromWatchlist($userId, strtoupper($symbol));
                } else {
                    $this->investmentModel->addToWatchlist($userId, strtoupper($symbol));
                }
            }
        }

        $watchlist = $this->investmentModel->getUserWatchlist($userId);

        if ($this->request->isAJAX()) {
            return $this->response->setJSON(['status' => 'success', 'data' => $watchlist]);
        }

        $this->data['pageTitle'] = 'Investment Watchlist | MyMI Wallet';
        $this->data['watchlist'] = $watchlist;
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Investments\index', $this->data);
    }

    public function autoSave()
    {
        $userId = (int) ($this->cuID ?? 0);
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        }
        return $this->response->setJSON(['status' => 'success', 'saved_at' => date('Y-m-d H:i:s')]);
    }

    public function overview()
    {
        $this->data['pageTitle'] = 'Investment Overview | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Investments\index', $this->data);
    }

    public function test()
    {
        return $this->response->setJSON(['status' => 'success', 'service' => 'investments']);
    }

    public function cryptoOverview()
    {
        $this->data['pageTitle'] = 'Crypto Overview | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Investments\index', $this->data);
    }

    public function economicData()
    {
        $this->data['pageTitle'] = 'Economic Data | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Investments\index', $this->data);
    }

    public function marketNews()
    {
        $this->data['pageTitle'] = 'Market News | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Investments\index', $this->data);
    }

    public function MyMINews()
    {
        $this->data['pageTitle'] = 'MyMI News | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Investments\index', $this->data);
    }

    public function MyMIResearch()
    {
        $this->data['pageTitle'] = 'MyMI Research | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Investments\index', $this->data);
    }

    public function stockOverview()
    {
        $this->data['pageTitle'] = 'Stock Overview | MyMI Wallet';
        $this->commonData();
        return $this->renderTheme('App\Modules\User\Views\Investments\index', $this->data);
    }
}
?>
