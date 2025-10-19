<?php 
// app/Controllers/Home.php
namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use Config\Services; 
use Myth\Auth\Authorization\GroupModel;
use App\Config\{Auth, SiteSettings, SocialMedia}; 
use App\Controllers\UserController;
use App\Libraries\{BaseLoader, MyMIAnalytics, MyMIBudget, MyMICoin, MyMIDashboard, MyMIExchange, MyMIGold, MyMIUser, MyMIWallet, MyMIWallets};
use App\Modules\User\Libraries\{DashboardLibrary}; 
use App\Models\{InvestmentModel, PageSEOModel, ReferralModel, SubscribeModel, UserModel};
use App\Services\{InvestmentService};
use CodeIgniter\API\ResponseTrait; 

#[\AllowDynamicProperties]
class InvestmentsController extends UserController
{
    use ResponseTrait; // Use the trait in your controller
    protected $auth;
    protected $config;
    protected $helpers = (['auth', 'form', 'url']);
    protected $request;
    protected $session;
    protected $socialMedia;
    protected $siteSettings;
    protected $MyMIAnalytics;
    protected $MyMIDashboard;
    protected $MyMIUser;
    protected $pageSEOModel;
    protected $investmentModel; 
    protected $referralModel; 
    protected $subscribeModel;
    protected $userModel;
    protected $investmentService;
    public function __construct() 
    {
        $this->auth                         = service('authentication'); // Use the 'authentication' service
        $this->request                      = service('request');
        $this->session                      = service('session');
        $this->config                       = config('Auth');
        $this->socialMedia                  = config('SocialMedia');
        $this->siteSettings                 = config('SiteSettings');
        $this->debug                        = $this->siteSettings->debug;
//         $this->MyMIAnalytics                = new MyMIAnalytics(); // replaced by BaseController getter
        // $this->MyMIUser                     = new MyMIUser(); 
        $this->investmentModel              = new InvestmentModel();
        $this->referralModel                = new ReferralModel(); 
        $this->pageSEOModel                 = new PageSEOModel();
        $this->subscribeModel               = new SubscribeModel();
        // $this->cuID                         = $this->auth->id() ?? $this->session->get('user_id') ?? 0;
        $this->investmentService            = new InvestmentService(); 
    }

    public function commonData(): array {
        // $userAccount                        = $this->getMyMIUser()->getUserInformation($this->cuID); 
        $this->data = parent::commonData();

        $this->data['auth']                 = $this->auth;
        $this->data['debug']                = $this->debug;
        $this->data['socialMedia']          = $this->socialMedia;
        $this->data['siteSettings']         = $this->siteSettings;
        $this->data['beta']                 = $this->siteSettings->beta; 
        $this->data['request']              = $this->request;
        $this->data['session']              = $this->session;
        $this->data['uri']                  = $this->request->getUri();
        $this->data['userAgent']            = $this->request->getUserAgent();

        // // Add user-specific data
        // $this->data['cuID']                 = $this->cuID;
        // $this->data['cuRole']               = $userAccount['cuRole'];
        // $this->data['cuEmail']              = $userAccount['cuEmail'];
        // $this->data['cuUsername']           = $userAccount['cuUsername'];
        // $this->data['cuDisplayName']        = $userAccount['cuDisplayName'];
        // $this->data['cuNameInitials']       = $userAccount['cuNameInitials'];
        // $this->data['cuKYC']                = $userAccount['cuKYC'];
        // $this->data['cuReferrer']           = $userAccount['cuReferrer'];
        // $this->data['cuKYC']                = $userAccount['cuKYC'];
        // $this->data['cuReferrerCode']       = $userAccount['cuReferrerCode'];
        

        $reporting                          = $this->getMyMIAnalytics()->reporting();
        $this->data['totalActiveUsers']     = $reporting['totalActiveUsers'];
        $this->data['totalWalletsCreated']  = $reporting['totalWalletsCreated'];
        $this->data['totalTradesTracked']   = $reporting['totalTradesTracked'];
        $this->data['totalActivePartners']  = $reporting['totalActivePartners'];
        $this->data['totalApprovedAssets']  = $reporting['totalApprovedAssets'];
        return $this->data;
}

    public function index()
    {
        // Override default data or add new data
        $this->data['pageTitle'] = 'MyMI Wallet | The Future of Finance | Budgeting & Investments';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('themes/public/home', $this->data);
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

    public function getInvestmentData($cuID) {
        try {
    
            // Fetch data
            $investmentData = $this->getinvestmentService()->getInvestmentData($cuID);
    
            // Respond with JSON
            return $this->response->setJSON([
                'status' => 'success',
                'cuID' => $cuID,
                'data' => $investmentData
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error fetching investment data: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to fetch investment data.'
            ])->setStatusCode(500);
        }
    }

    public function fetchActiveTrades()
    {
        try {
            $cuID = $this->getCurrentUserId();
            if (!$cuID) {
                return $this->failUnauthorized("User not authenticated.");
            }
    
            $investments = $this->MyMIInvestments->getUserPortfolio($cuID);
            return $this->respond([
                'status' => 'success',
                'data' => $investments
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error fetching active trades: ' . $e->getMessage());
            return $this->failServerError("Failed to retrieve active trades.");
        }
    }
    
    public function fetchMonthAndInsightsData() {
        try {
            $userId = $this->cuID;
    
            $data = [
                'cuID' => $userId,
                'monthToMonth' => $this->getMonthToMonthData($userId),
                'insights' => $this->getInsightsData($userId),
            ];
    
            return $this->response->setJSON(['status' => 'success', 'data' => $data]);
        } catch (\Exception $e) {
            log_message('error', 'Error fetching Month and Insights data: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to fetch data.'
            ])->setStatusCode(500);
        }
    }
    
    private function getMonthToMonthData($userId) {
        // Example: Replace with actual logic for Month-to-Month data
        $investmentRecords = $this->investmentModel->getInvestmentMonthToMonth($userId);
    
        $chartData = [];
        foreach ($investmentRecords as $record) {
            $chartData[$record['month']] = $record['net_gains'];
        }
    
        return [
            'chartData' => [
                'labels' => array_keys($chartData),
                'datasets' => [
                    [
                        'label' => 'Monthly Gains',
                        'data' => array_values($chartData),
                        'backgroundColor' => 'rgba(0,123,255,0.5)',
                        'borderColor' => 'rgba(0,123,255,1)',
                    ],
                ],
            ],
        ];
    }
    
    private function getInsightsData($userId) {
        // Example: Replace with actual logic for Insights data
        $activeTrades = $this->investmentModel->getActiveTrades($userId);
    
        $tradeList = [];
        foreach ($activeTrades as $trade) {
            $tradeList[] = [
                'name' => $trade['symbol'] . ' (' . $trade['open_date'] . ')',
                // 'value' => $trade['current_price'] * $trade['shares'],
                'value' => '',
            ];
        }
    
        return [
            'activeTrades' => $tradeList,
        ];
    }

    public function searchTickers()
    {
        $q = trim((string) $this->request->getGet('query'));
        $limit = (int) ($this->request->getGet('limit') ?? 10);
        $limit = max(1, min(25, $limit));

        if ($q === '') {
            return $this->response->setJSON(['status' => 'success', 'data' => []]);
        }

        try {
            /** @var \CodeIgniter\Database\BaseConnection $db */
            $db = \Config\Database::connect();
            $builder = $db->table('bf_investment_tickers');
            $builder->select('symbol, name, exchange, currency');
            $builder->like('symbol', $q, 'after');
            $builder->orLike('name', $q);
            $builder->limit($limit);

            $rows = $builder->get()->getResultArray();

            $data = [];
            foreach ($rows as $row) {
                $data[] = [
                    'symbol'   => (string) ($row['symbol'] ?? ''),
                    'name'     => (string) ($row['name'] ?? ''),
                    'exchange' => (string) ($row['exchange'] ?? ''),
                    'currency' => (string) ($row['currency'] ?? 'USD'),
                    'source'   => 'local',
                ];
            }

            if (count($data) < $limit && mb_strlen($q) >= 2) {
                helper('text');

                $cache = \Config\Services::cache();
                $cacheKey = 'ticker_search_' . md5(strtolower($q));
                $cacheKeySanitized = sanitizeCacheKey($cacheKey);
                $av = $cache->get($cacheKeySanitized);

                if ($av === null) {
                    /** @var \App\Libraries\MyMIInvestments $inv */
                    $inv = service('mymiInvestments');

                    if (method_exists($inv, 'searchSymbols')) {
                        $av = $inv->searchSymbols($q);
                    } else {
                        $avAll = $inv->getSymbolsByTradeType('stock');
                        $av = array_filter($avAll ?? [], static function ($row) use ($q) {
                            $sym = strtolower((string) ($row['symbol'] ?? ''));
                            $nam = strtolower((string) ($row['name'] ?? ''));
                            $q2  = strtolower($q);

                            return str_starts_with($sym, $q2) || strpos($nam, $q2) !== false;
                        });
                    }

                    if (is_array($av)) {
                        $cache->save($cacheKeySanitized, $av, 300);
                    }
                }

                $av = is_array($av) ? array_values($av) : [];
                $seen = array_column($data, 'symbol');

                /** @var \App\Libraries\MyMIInvestments|null $inv */
                $inv ??= isset($inv) ? $inv : service('mymiInvestments');

                foreach ($av as $row) {
                    if (count($data) >= $limit) {
                        break;
                    }

                    $symbol   = (string) ($row['symbol'] ?? $row['1. symbol'] ?? '');
                    $name     = (string) ($row['name'] ?? $row['2. name'] ?? '');
                    $exchange = (string) ($row['exchange'] ?? $row['4. region'] ?? '');
                    $currency = (string) ($row['currency'] ?? $row['8. currency'] ?? 'USD');

                    if ($symbol === '' || in_array($symbol, $seen, true)) {
                        continue;
                    }

                    $data[] = [
                        'symbol'   => $symbol,
                        'name'     => $name,
                        'exchange' => $exchange,
                        'currency' => $currency,
                        'source'   => 'alpha',
                    ];
                    $seen[] = $symbol;

                    try {
                        if (method_exists($inv, 'ensureTickerExists')) {
                            $inv->ensureTickerExists($symbol);
                        }
                    } catch (\Throwable $e) {
                        log_message('warning', 'searchTickers ensureTickerExists failed: {msg}', ['msg' => $e->getMessage()]);
                    }
                }
            }

            return $this->response->setJSON([
                'status' => 'success',
                'data'   => array_values($data),
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'searchTickers error: {msg}', ['msg' => $e->getMessage()]);

            return $this->response
                ->setStatusCode(500)
                ->setJSON(['status' => 'error', 'message' => 'Internal error']);
        }
    }
    
    public function validateSymbol()
    {
        $symbol = strtoupper($this->request->getPost('symbol'));
        $exchange = strtoupper($this->request->getPost('exchange'));
    
        $ticker = $this->alertsModel->getTickerBySymbol($symbol);
    
        if ($ticker) {
            return $this->response->setJSON(['status' => 'success', 'exists' => true, 'ticker' => $ticker]);
        }
    
        // Optionally fetch and store via ensureTickerExists()
        $this->alertsModel->ensureTickerExists($symbol);
        $ticker = $this->alertsModel->getTickerBySymbol($symbol);
    
        return $this->response->setJSON([
            'status' => $ticker ? 'success' : 'error',
            'exists' => (bool)$ticker,
            'ticker' => $ticker,
        ]);
    }
}

