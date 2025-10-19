<?php 

namespace App\Libraries;

use Config\Services;
use Myth\Auth\Authorization\GroupModel;
use App\Config\{APIs, SiteSettings};
use App\Libraries\{BaseLoader, FRED, MyMICoin, MyMIDashboard, MyMIFractalAnalyzer, MyMIGold, MyMIMarketing, MyMIWallet, SafeProcess};
use App\Models\{InvestmentModel, MgmtBudgetModel, UserModel, WalletModel};
use CodeIgniter\Cache\CacheInterface;
use CodeIgniter\HTTP\CURLRequest;
use CodeIgniter\Session\Session;
use Psr\Log\LoggerInterface;

#[\AllowDynamicProperties]
class MyMIInvestments
{

    protected $auth;
    protected $APIs;
    protected $alphavantageKey;
    protected $cache;
    protected $cuID;
    protected $curlRequest;
    protected $logger;
    protected $session;
    protected $siteSettings;
    protected $investmentModel;
    protected $mgmtBudgetModel;
    protected $userModel;
    protected $walletModel;
    protected $FRED;
    protected $MyMICoin;
    protected $MyMIDashboard;
    protected $MyMIFractalAnalyzer;
    protected $MyMIGold;
    protected $MyMIMarketing;
    protected $MyMIWallet;
    protected $queue;

    public function __construct()
    {
        // Initialize dependencies using Services and Config
        $this->auth = service('authentication');
        $this->session = Services::session();
        $this->cache = service('cache');
        $this->logger = service('logger');
        $this->curlRequest = service('curlrequest');
        $this->APIs = config('APIs');
        $this->siteSettings = config('SiteSettings');
        // $this->userModel = new UserModel(); 
        // Set cuID
        
        $this->cuID = $this->auth->id() ?? $this->session->get('user_id');
        $cuID = $this->cuID;
        if (empty($this->cuID)) {
            log_message('debug', 'MyMIInvestments: no session user detected; skipping personalized hydration.');
        }

        // Initialize other class dependencies
        $this->investmentModel = new InvestmentModel();
        // $this->userModel = new UserModel();
        $this->mgmtBudgetModel = new MgmtBudgetModel();
        $this->walletModel = new WalletModel();
        $this->FRED = new FRED();
        $this->MyMICoin = new MyMICoin();
        $this->MyMIDashboard = new MyMIDashboard();
        $this->MyMIGold = new MyMIGold();
        $this->MyMIFractalAnalyzer = new MyMIFractalAnalyzer();
        $this->MyMIMarketing = new MyMIMarketing();
        $this->MyMIWallet = new MyMIWallet();
        
        // // Pass required arguments to MyMIFractalAnalyzer constructor
        // $this->MyMIFractalAnalyzer = new MyMIFractalAnalyzer(
        //     $this->investmentModel, 
        //     $this->curlRequest, 
        //     $this->logger
        // );

        // $this->queue = service('queue');
        
        $this->alphavantageKey = getenv('ALPHA_VANTAGE_API_KEY') ?: $this->APIs->alphaVantageApiKey;
    }

    public function buildPortfolioLight(int $userId, array $opts = []): array
    {
        $opts = array_merge([
            'fetchHistory'     => false,
            'fetchSolanaTxs'   => false,
            'skipPlaceholders' => true,
            'maxSymbols'       => 25,
        ], $opts);

        $result = [
            'positions'   => [],
            'totals'      => ['count' => 0, 'value' => 0.0, 'pnl' => 0.0],
            'watchlist'   => [],
            'insights'    => [],
            'rateLimited' => false,
        ];

        $rows = $this->investmentModel->getActiveByUser($userId);

        // Basic guards + clamp fan-out
        $clean = [];
        foreach ($rows as $r) {
            $symbol = strtoupper(trim((string)($r['symbol'] ?? '')));
            if ($opts['skipPlaceholders'] && (!$symbol || $symbol === 'TEST')) {
                log_message('debug', 'Skipping placeholder symbol for row {id}', ['id' => $r['id'] ?? null]);
                continue;
            }
            $r['symbol'] = $symbol;
            $clean[] = $r;
            if (count($clean) >= (int)$opts['maxSymbols']) break;
        }

        // Per-request memo to avoid duplicate API calls for same symbol
        static $marketMemo = [];

        foreach ($clean as $row) {
            $symbol = $row['symbol'];

            // Market quote (use memo; don’t call AV if missing symbol)
            $quoteKey = "q:{$symbol}";
            if (!array_key_exists($quoteKey, $marketMemo)) {
                $marketMemo[$quoteKey] = $this->getMarketQuoteSafe($symbol);
            }
            $quote = $marketMemo[$quoteKey];

            // Optional: history and Solana deep scans only when asked
            $history = null;
            if ($opts['fetchHistory'] && $symbol) {
                $history = $this->getDailyHistorySafe($symbol);
                if ($history === '__rate_limited__') {
                    $result['rateLimited'] = true;
                    $history = null;
                }
            }

            // Compute PnL w/ safe numeric casts
            $entry   = (float)($row['entry_price'] ?? 0);
            $last    = (float)($quote['price'] ?? 0);
            $shares  = (float)($row['shares'] ?? 0);
            $value   = $last * $shares;
            $pnl     = ($last - $entry) * $shares;

            $result['positions'][] = [
                'id'      => $row['id'],
                'symbol'  => $symbol,
                'shares'  => $shares,
                'entry'   => $entry,
                'last'    => $last,
                'value'   => $value,
                'pnl'     => $pnl,
                'history' => $history, // often null here (by design)
            ];

            $result['totals']['count']++;
            $result['totals']['value'] += $value;
            $result['totals']['pnl']   += $pnl;
        }

        // Any other light data you need (watchlist, etc.) — ensure these use models only (no external calls)
        // $result['watchlist'] = $this->investmentModel->getWatchlistTickers($userId);

        return $result;
    }

    /**
     * Minimal quote fetcher with guards and single-call semantics.
     * Returns ['price' => float, 'source' => 'alpha'|'cache'|'dummy'].
     */
    private function getMarketQuoteSafe(string $symbol): array
    {
        if (!$symbol) {
            return ['price' => 0.0, 'source' => 'dummy'];
        }

        // First try cache (short TTL elsewhere)
        $cacheKey = "mktq:{$symbol}";
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        $cached   = cache()->get($cacheKeySanitized);
        if (is_array($cached)) return $cached + ['source' => $cached['source'] ?? 'cache'];

        // Call your existing provider but *catch* invalid responses and rate limits
        try {
            $data = $this->alphaVantageGetQuote($symbol); // <- call your existing method
            $price = (float)($data['price'] ?? 0);
            if ($price > 0) {
                $payload = ['price' => $price, 'source' => 'alpha'];
                cache()->save($cacheKeySanitized, $payload, 60);
                return $payload;
            }
            // fallback
            log_message('warning', 'AlphaVantage returned no price for {symbol}', ['symbol' => $symbol]);
            return ['price' => 0.0, 'source' => 'dummy'];
        } catch (\Throwable $e) {
            // if rate-limited, avoid hammering
            if (str_contains($e->getMessage(), '429') || str_contains($e->getMessage(), 'Invalid API call')) {
                log_message('notice', 'Quote rate-limited for {symbol}: {msg}', ['symbol' => $symbol, 'msg' => $e->getMessage()]);
                // soft-cache zero to prevent loops for 30s
                cache()->save($cacheKeySanitized, ['price' => 0.0, 'source' => 'dummy'], 30);
                return ['price' => 0.0, 'source' => 'dummy'];
            }
            log_message('error', 'Quote error for {symbol}: {msg}', ['symbol' => $symbol, 'msg' => $e->getMessage()]);
            return ['price' => 0.0, 'source' => 'dummy'];
        }
    }

    /**
     * Safe daily history; returns '__rate_limited__' if we detect throttling.
     */
    private function getDailyHistorySafe(string $symbol)
    {
        try {
            $series = $this->alphaVantageDaily($symbol); // your existing method
            if (isset($series['Time Series (Daily)'])) return $series['Time Series (Daily)'];
            if (isset($series['Error Message']) || isset($series['Note'])) {
                // classic AV rate-limit/invalid payloads
                return '__rate_limited__';
            }
            return null;
        } catch (\Throwable $e) {
            if (str_contains($e->getMessage(), '429') || str_contains($e->getMessage(), 'Invalid API call')) {
                return '__rate_limited__';
            }
            return null;
        }
    }

    /**
     * Aggregate crypto holdings for a user across supported chains.
     * Returns an array of positions with chain, symbol, amount, price and USD value.
     */
    public function portfolioForUser(int $userId): array
    {
        $session = service('session');
        $market  = service('myMIMarketData');

        $chains = [
            'bitcoin'  => ['symbol' => 'BTC', 'svc' => 'myMIBitcoin',      'session' => 'bitcoin_public_key'],
            'ethereum' => ['symbol' => 'ETH', 'svc' => 'ethereumService', 'session' => 'ethereum_public_key'],
            'solana'   => ['symbol' => 'SOL', 'svc' => 'myMISolana',      'session' => 'solana_public_key'],
        ];

        $positions = [];
        foreach ($chains as $chain => $info) {
            $addr = $session->get($info['session']);
            if (!$addr) {
                continue;
            }
            $svc = service($info['svc']);
            $norm = $svc->normalizeAddress($addr);
            if (!$norm) {
                continue;
            }
            $amount = 0.0;
            if ($chain === 'bitcoin') {
                $bal = $svc->getBalance($norm);
                $amount = $bal['btc'] ?? 0.0;
            } elseif ($chain === 'ethereum') {
                $bal = $svc->getBalance($norm);
                $amount = $bal['eth'] ?? 0.0;
            } elseif ($chain === 'solana') {
                $lamports = $svc->getBalanceLamports($norm);
                $amount = $lamports / 1e9;
            }
            $price = $market->price($info['symbol']);
            $positions[] = [
                'chain'  => $chain,
                'symbol' => $info['symbol'],
                'amount' => $amount,
                'price'  => $price ?? 0.0,
                'value'  => ($price ?? 0.0) * $amount,
            ];
        }

        return $positions;
    }
    
    public function allUserInvestmentsInfo($cuID)
    {
        // $cacheKey = "user_investments_info_{$cuID}";
        // $cachedData = $this->cache->get($cacheKey);
        // if ($cachedData !== null) {
        //     return $cachedData;
        // }

        // log_message('info', 'Queue service is not available, processing investments synchronously.');
        return $this->processUserInvestmentsInfo($cuID);  // direct call
    }    
    
    // Helper method to calculate volatility (standard deviation of returns)
    private function calculateVolatility($historicalData)
    {
        $returns = [];
        
        log_message('debug', 'MyMIInvestments L463 - $historalData Array: ' . (print_r($historicalData, true))); 
        // Calculate daily returns from historical price data
        for ($i = 1; $i < count($historicalData); $i++) {
            $priceToday = $historicalData[$i]['close'];
            $priceYesterday = $historicalData[$i - 1]['close'];
    
            // Avoid division by zero in return calculation
            if ($priceYesterday != 0) {
                $returns[] = ($priceToday - $priceYesterday) / $priceYesterday;
            }
        }
        
        // Calculate the standard deviation of the returns as a measure of volatility
        if (!empty($returns)) {
            $meanReturn = array_sum($returns) / count($returns);
            $variance = 0;
    
            foreach ($returns as $return) {
                $variance += pow($return - $meanReturn, 2);
            }
    
            // Safeguard against empty $returns
            if (count($returns) > 0) {
                $variance /= count($returns);
                $volatility = sqrt($variance); // Standard deviation
                return $volatility;
            }
        }
        
        // Return zero volatility if no valid returns
        return 0;
    }

    /**
     * Fetch real-time stock data from AlphaVantage
     */
    public function fetchRealTimeStockData($symbol)
    {
        $symbol = strtoupper(trim($symbol));
        if (empty($symbol)) {
            log_message('error', "Invalid stock symbol provided.");
            return ['error' => "Invalid stock symbol."];
        }
    
        $apiKey = config('APIs')->alphaVantageApiKey;
        $url = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$symbol}&apikey={$apiKey}";
    
        try {
            $response = @file_get_contents($url);
            if ($response === false) {
                throw new \Exception("Failed to fetch stock data from AlphaVantage.");
            }
    
            $data = json_decode($response, true);
            if (isset($data['Global Quote'])) {
                return [
                    'symbol'             => $symbol,
                    'price'              => $data['Global Quote']['05. price'] ?? 0.00,
                    'change'             => $data['Global Quote']['09. change'] ?? 0.00,
                    'changePercent'      => $data['Global Quote']['10. change percent'] ?? 0.00,
                    'volume'             => $data['Global Quote']['06. volume'] ?? 0.00,
                    'high'               => $data['Global Quote']['03. high'] ?? 0.00,
                    'low'                => $data['Global Quote']['04. low'] ?? 0.00,
                    'latestTradingDay'   => $data['Global Quote']['07. latest trading day'] ?? 'N/A',
                ];
            } else {
                throw new \Exception("No valid stock data returned.");
            }
        } catch (\Exception $e) {
            log_message('error', "Error fetching stock data: " . $e->getMessage());
            return ['error' => "Unable to retrieve stock data."];
        }
    }
    
    public function fetchStockData($symbol)
    {
        $symbol = filter_var($symbol, FILTER_SANITIZE_STRING);
        if (empty($symbol)) {
            $this->logger->error("Invalid stock symbol provided.");
            return ['error' => "Invalid stock symbol. Please check your input and try again."];
        }

        $cacheKey = "stock_data_{$symbol}";
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        $cachedData = $this->cache->get($cacheKeySanitized);
        if ($cachedData !== null) {
            return $cachedData;
        }

        $this->queue->push(function() use ($symbol, $cacheKeySanitized) {
            try {
                $data = $this->makeAlphaVantageAPICall("function=TIME_SERIES_DAILY&symbol={$symbol}");
                if (!isset($data['Time Series (Daily)'])) {
                    throw new \RuntimeException("No time series data found for symbol: {$symbol}");
                }
                $fractalData = $this->MyMIFractalAnalyzer->analyze($data['Time Series (Daily)']); // Apply fractal analysis
                $this->cache->save($cacheKeySanitized, $fractalData, 3600);
            } catch (\Exception $e) {
                $this->logger->error("Error in fetchStockData: " . $e->getMessage());
            }
        });

        return ['status' => 'Processing', 'message' => 'Stock data is being fetched.'];
    }
    
    // Moved the investment processing logic to its own method
    private function processUserInvestmentsInfo($cuID)
    {
        try {
            log_message('debug', "Processing investments for User ID: {$cuID}");
    
            // Retrieve investment data from the model
            $userInvestmentRecords = $this->investmentModel->allActiveUserInvestmentsInfo($cuID) ?? [];
            log_message('debug', "Retrieved user investment records for User ID: {$cuID}");
    
            $investmentOverview = $this->investmentModel->getInvestmentOverview($cuID) ?? [];
            log_message('debug', "Retrieved investment overview for User ID: {$cuID}");
    
            $activeInvestments = count($userInvestmentRecords);
            log_message('debug', "Active investments count: {$activeInvestments}");
    
            $totalTradeValueSum = '$0.00';
            try {
                $totalTradeValueSum = '$' . number_format($this->investmentModel->calculateTotalTradeValueSumByUser($cuID) ?? 0, 2);
            } catch (\Exception $e) {
                log_message('error', "Error calculating total trade value sum: {$e->getMessage()}");
            }
            log_message('debug', "Total trade value sum: {$totalTradeValueSum}");
    
            $totalAssetValueSum = '$0.00';
            try {
                $totalAssetValueSum = '$' . number_format($this->investmentModel->calculateTotalAssetsByUser($cuID) ?? 0, 2);
            } catch (\Exception $e) {
                log_message('error', "Error calculating total asset value sum: {$e->getMessage()}");
            }
            log_message('debug', "Total asset value sum: {$totalAssetValueSum}");
    
            $totalTradeValue = 0;
            try {
                $totalTradeValue = $this->investmentModel->totalTradeValueByUser($cuID) ?? 0;
            } catch (\Exception $e) {
                log_message('error', "Error calculating total trade value: {$e->getMessage()}");
            }
            log_message('debug', "Total trade value: {$totalTradeValue}");
    
            $totalTradeCount = 0;
            try {
                $totalTradeCount = $this->investmentModel->totalActiveTradeCountByUser($cuID) ?? 0;
            } catch (\Exception $e) {
                log_message('error', "Error calculating total trade count: {$e->getMessage()}");
            }
            log_message('debug', "Total trade count: {$totalTradeCount}");
    
            $totalMonthlyTradesCount = 0;
            try {
                $totalMonthlyTradesCount = $this->investmentModel->thisMonthTradePerformanceByUser($cuID) ?? 0;
            } catch (\Exception $e) {
                log_message('error', "Error calculating monthly trades count: {$e->getMessage()}");
            }
            log_message('debug', "Total monthly trades count: {$totalMonthlyTradesCount}");
    
            $totalAssetCount = 0;
            try {
                $totalAssetCount = $this->investmentModel->totalUserAssetsCount($cuID) ?? 0;
            } catch (\Exception $e) {
                log_message('error', "Error calculating total asset count: {$e->getMessage()}");
            }
            log_message('debug', "Total asset count: {$totalAssetCount}");
    
            $totalGrowth = 0;
            try {
                $totalGrowth = $this->investmentModel->annualTradePerformanceByUser($cuID) ?? 0;
            } catch (\Exception $e) {
                log_message('error', "Error calculating total growth: {$e->getMessage()}");
            }
            log_message('debug', "Total growth: {$totalGrowth}");
    
            $totalLastTradeValueSum = 0;
            try {
                $totalLastTradeValueSum = $this->investmentModel->totalTradeValueByUserLastMonth($cuID) ?? 0;
            } catch (\Exception $e) {
                log_message('error', "Error calculating last trade value sum: {$e->getMessage()}");
            }
            log_message('debug', "Total last trade value sum: {$totalLastTradeValueSum}");
    
            $totalAnnualTradeValueSum = 0;
            try {
                $totalAnnualTradeValueSum = $this->investmentModel->totalTradeValueByUserAnnual($cuID) ?? 0;
            } catch (\Exception $e) {
                log_message('error', "Error calculating annual trade value sum: {$e->getMessage()}");
            }
            log_message('debug', "Total annual trade value sum: {$totalAnnualTradeValueSum}");
    
            $userWatchlist = [];
            try {
                $userWatchlist = $this->getUserWatchlist($cuID) ?? [];
            } catch (\Exception $e) {
                log_message('error', "Error retrieving user watchlist: {$e->getMessage()}");
            }
            log_message('debug', "User watchlist retrieved for User ID: {$cuID}");
    
            $userTopGainers = [];
            try {
                $userTopGainers = $this->investmentModel->userTopGainers($cuID) ?? [];
            } catch (\Exception $e) {
                log_message('error', "Error retrieving top gainers: {$e->getMessage()}");
            }
            log_message('debug', "User top gainers retrieved");
    
            $userTopGainer = [];
            try {
                $userTopGainer = $this->investmentModel->userTopGainer($cuID) ?? [];
            } catch (\Exception $e) {
                log_message('error', "Error retrieving top gainer: {$e->getMessage()}");
            }
            log_message('debug', "User top gainer retrieved");
    
            $userTopLosers = [];
            try {
                $userTopLosers = $this->investmentModel->userTopLosers($cuID) ?? [];
            } catch (\Exception $e) {
                log_message('error', "Error retrieving top losers: {$e->getMessage()}");
            }
            log_message('debug', "User top losers retrieved");
    
            $userTopLoser = [];
            try {
                $userTopLoser = $this->investmentModel->userTopLoser($cuID) ?? [];
            } catch (\Exception $e) {
                log_message('error', "Error retrieving top loser: {$e->getMessage()}");
            }
            log_message('debug', "User top loser retrieved");
    
            $userCurrentAnnualValue = 0;
            try {
                $userCurrentAnnualValue = $this->investmentModel->userCurrentAnnualValue($cuID) ?? 0;
            } catch (\Exception $e) {
                log_message('error', "Error retrieving current annual value: {$e->getMessage()}");
            }
            log_message('debug', "User current annual value: {$userCurrentAnnualValue}");
    
            $userCurrentAnnualPerformance = 0;
            try {
                $userCurrentAnnualPerformance = $this->investmentModel->userCurrentAnnualPerformance($cuID) ?? 0;
            } catch (\Exception $e) {
                log_message('error', "Error retrieving current annual performance: {$e->getMessage()}");
            }
            log_message('debug', "User current annual performance: {$userCurrentAnnualPerformance}");
    
            $userCurrentAnnualTarget = '';
            try {
                $userCurrentAnnualTarget = $this->investmentModel->userCurrentAnnualTarget($cuID) ?? '';
            } catch (\Exception $e) {
                log_message('error', "Error retrieving current annual target: {$e->getMessage()}");
            }
            log_message('debug', "User current annual target: {$userCurrentAnnualTarget}");
    
            $totalUserAssetsValue = 0;
            try {
                $totalUserAssetsValue = $this->investmentModel->totalUserAssetsValue($cuID) ?? 0;
            } catch (\Exception $e) {
                log_message('error', "Error retrieving total user assets value: {$e->getMessage()}");
            }
            log_message('debug', "Total user assets value: {$totalUserAssetsValue}");
    
            $totalUserAssetsCount = 0;
            try {
                $totalUserAssetsCount = $this->investmentModel->totalUserAssetsCount($cuID) ?? 0;
            } catch (\Exception $e) {
                log_message('error', "Error retrieving total user assets count: {$e->getMessage()}");
            }
            log_message('debug', "Total user assets count: {$totalUserAssetsCount}");
    
            $totalUserAssetPerformance = 0;
            try {
                $totalUserAssetPerformance = $this->investmentModel->totalUserAssetPerformance($cuID) ?? 0;
            } catch (\Exception $e) {
                log_message('error', "Error retrieving total user asset performance: {$e->getMessage()}");
            }
            log_message('debug', "Total user asset performance: {$totalUserAssetPerformance}");
    
            $insights = [];
            try {
                $insights = $this->getInvestmentInsights($cuID) ?? [];
            } catch (\Exception $e) {
                log_message('error', "Error retrieving investment insights: {$e->getMessage()}");
            }
            log_message('debug', "Investment insights retrieved for User ID: {$cuID}");
    
            $riskManagement = [];
            try {
                $riskManagement = $this->generateRiskManagementTools($cuID) ?? [];
            } catch (\Exception $e) {
                log_message('error', "Error generating risk management tools: {$e->getMessage()}");
            }
            log_message('debug', "Risk management tools generated for User ID: {$cuID}");
    
            $financialReports = [];
            try {
                $financialReports = $this->generateFinancialReports($cuID) ?? [];
            } catch (\Exception $e) {
                log_message('error', "Error generating financial reports: {$e->getMessage()}");
            }
            log_message('debug', "Financial reports generated for User ID: {$cuID}");
    
            $economicCalendar = [];
            try {
                $economicCalendar = $this->investmentModel->getUpcomingEconomicEvents();
            } catch (\Exception $e) {
                log_message('error', "Error generating economic calendar: {$e->getMessage()}"); 
            }
            // Prepare and structure all necessary investment data
            $allUserInvestments = [
                'message_type' => 'Success',
                'message' => 'Data Retrieved Successfully',
                'userInvestmentRecords' => $userInvestmentRecords,
                'investmentOverview' => $investmentOverview,
                'activeInvestments' => $activeInvestments,
                'totalTradeValueSum' => $totalTradeValueSum,
                'totalAssetValueSum' => $totalAssetValueSum,
                'totalTradeValue' => $totalTradeValue,
                'totalTradeCount' => $totalTradeCount,
                'totalMonthlyTradesCount' => $totalMonthlyTradesCount,
                'totalAssetCount' => $totalAssetCount,
                'totalGrowth' => $totalGrowth,
                'totalLastTradeValueSum' => $totalLastTradeValueSum,
                'totalAnnualTradeValueSum' => $totalAnnualTradeValueSum,
                'userWatchlist' => $userWatchlist,
                'userTopGainers' => $userTopGainers,
                'userTopGainer' => $userTopGainer,
                'userTopLosers' => $userTopLosers,
                'userTopLoser' => $userTopLoser,
                'userCurrentAnnualValue' => $userCurrentAnnualValue,
                'userCurrentAnnualPerformance' => $userCurrentAnnualPerformance,
                'userCurrentAnnualTarget' => $userCurrentAnnualTarget,
                'totalUserAssetsValue' => $totalUserAssetsValue,
                'totalUserAssetsCount' => $totalUserAssetsCount,
                'totalUserAssetPerformance' => $totalUserAssetPerformance,
                'insights' => $insights,
                'riskManagement' => $riskManagement,
                'financialReports' => $financialReports,
                'economicCalendar' => $economicCalendar,
            ];
    
            log_message('debug', "Investment data structured successfully for User ID: {$cuID}");
            return $allUserInvestments;
    
        } catch (\Exception $e) {
            log_message('error', "Failed to process investments for User ID: {$cuID} - " . $e->getMessage());
            return ['message_type' => 'Error', 'message' => $e->getMessage()];
        }
    }    
    
    public function getInvestmentDashboard($cuID)
    {
        $cacheKey = "investment_dashboard_{$cuID}";
        $cachedData = $this->cache->get($cacheKey);
    
        if ($cachedData !== null) {
            return $cachedData;
        }

        // Fetching investment overview from your data source
        $investmentOverview = $this->investmentModel->getInvestmentOverview($cuID) ?? [];
    
        // Check if queue is available, if not, skip queue processing
        if ($this->queue) {
            $this->queue->push(function () use ($cuID, $cacheKey) {
                $this->prepareInvestmentDashboard($cuID, $cacheKey);
            });
        } else {
            log_message('warning', 'Queue service is not initialized, processing investment dashboard synchronously.');
            $this->prepareInvestmentDashboard($cuID, $cacheKey); // Fallback to synchronous processing
        }        
    
        return ['status' => 'Processing', 'message' => 'Dashboard data is being prepared.', 'investmentOverview' => $investmentOverview];
    }
    
    public function getInvestmentInsights($topic = null, $complexityLevel = null)
    {
        // Case: Specific request with topic and complexity level
        if (!empty($topic) && !empty($complexityLevel)) {
            try {
                $insights = $this->retrieveExpertInsights($topic, $complexityLevel) ?? 'No Data Available!';
                if (isset($insights['error'])) {
                    log_message('error', "No insights found for topic: $topic and complexity level: $complexityLevel");
                    return $insights;
                }
                return ['status' => 'success', 'insights' => $insights];
            } catch (\Exception $e) {
                log_message('error', "Error retrieving expert insights: {$e->getMessage()}");
                return ['error' => 'An error occurred while retrieving insights.'];
            }
        }
    
        // Case: Fallback to general insights
        try {
            $generalInsights = $this->retrieveGeneralInsights($this->cuID) ?? 'No Data Available!';
            return ['status' => 'success', 'data' => $generalInsights];
        } catch (\Exception $e) {
            log_message('error', "Error retrieving general insights: {$e->getMessage()}");
            return ['error' => 'An error occurred while retrieving general insights.'];
        }
    }
    
    public function getTopHeldSymbols($limit = 10)
    {
        $results = $this->investmentModel->getTopHeldSymbols($limit); 
    
        // Return array of symbols only
        return array_column($results, 'symbol');
    }
    
    public function performVolatilityAnalysis($userInvestments)
    {
        $volatilityReport = [];
        
        // Ensure userInvestments is not empty
        if (empty($userInvestments)) {
            log_message('error', "No investments found for volatility analysis.");
            return $volatilityReport;
        }
    
        // Loop through the user's investments and calculate volatility
        foreach ($userInvestments as $investment) {
            // Access properties as objects or convert to array if needed
            $symbol = !is_object($investment) ? $investment['symbol'] : $investment->symbol;
            $currentValue = !is_object($investment) ? $investment['shares'] * $investment['current_price'] : $investment->shares * $investment->current_price;
    
            // Fetch historical data using an API call
            $historicalData = $this->makeAlphaVantageAPICall("function=TIME_SERIES_DAILY&symbol={$symbol}");
            
            if (empty($historicalData)) {
                log_message('error', "No historical data found for symbol: $symbol");
                continue;
            }
    
            // Calculate volatility based on historical price fluctuations
            $volatility = $this->calculateVolatility($historicalData);
    
            $volatilityReport[] = [
                'symbol' => $symbol,
                'volatility' => $volatility,
                'current_value' => $currentValue
            ];
        }
    
        return $volatilityReport;
    }   
    
    private function prepareInvestmentDashboard($cuID, $cacheKey)
    {
        $investDashboard = [
            'cuAlerts' => $this->getAlertsByUserAccess($cuID)['cuAlerts'],
            'cuTradeAlerts' => $this->getAlertsByUserAccess($cuID)['cuTradeAlerts'],
            // 'investmentTools' => $this->getInvestmentTools(),
            'cryptoOverview' => [],
            'economicData' => [],
            'financialReports' => $this->generateFinancialReports($cuID),
            'getSymbols' => $this->getSymbolsByTradeType(),
            'insights' => $this->getInvestmentInsights($cuID),
            'marketNews' => [],
            'MyMINews' => [],
            'MyMIResearch' => [],
            'riskManagement' => $this->generateRiskManagementTools($cuID),
            'stockOverview' => [],
            'taxReport' => $this->generateTaxReport($cuID),
            'retirementSummary' => $this->getUserRetirementPlans($cuID), 
        ];
    
        // $this->cache->save($cacheKey, $investDashboard, 3600);
        return $investDashboard;
    } 
    
    // public function allUserInvestmentsInfo($cuID)
    // {
    //     // Define cache key
    //     $cacheKey = "user_investments_info_{$cuID}";
    
    //     // Check if cached data exists
    //     $cachedData = $this->cache->get($cacheKey);
    //     if ($cachedData !== null) {
    //         return $cachedData;
    //     }
    
    //     // If the queue service is available, use it
    //     if ($this->queue) {
    //         $this->queue->push(function() use ($cuID, $cacheKey) {
    //             $this->processUserInvestmentsInfo($cuID, $cacheKey); // Moved to a separate method for reusability
    //         });
    //         return ['status' => 'Processing', 'message' => 'Investment data is being prepared.'];
    //     }
    
    //     // If no queue, process synchronously
    //     log_message('warning', 'Queue service is not available, processing user investments synchronously.');
    //     return $this->processUserInvestmentsInfo($cuID, $cacheKey); // Synchronous processing
    // }

    public function performARIMAForecast($timeSeriesData)
    {
        $cacheKey = 'arima_forecast_' . md5(json_encode($timeSeriesData));
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        $cachedData = $this->cache->get($cacheKeySanitized);
        if ($cachedData !== null) {
            return $cachedData;
        }

        $this->queue->push(function() use ($timeSeriesData, $cacheKeySanitized) {
            try {
                $script = realpath(ROOTPATH . 'python/arima_forecast.py');
                if ($script === false || !is_file($script)) {
                    throw new \RuntimeException('ARIMA forecast script not available.');
                }

                $payload = json_encode($timeSeriesData, JSON_THROW_ON_ERROR);
                $python = env('python.binary', 'python3');
                $result = SafeProcess::run([$python, $script], [$python], $payload);

                if ($result['exitCode'] !== 0) {
                    throw new \RuntimeException('ARIMA forecast script error: ' . $result['stderr']);
                }

                $forecast = json_decode($result['stdout'], true, 512, JSON_THROW_ON_ERROR);
                $fractalForecast = $this->MyMIFractalAnalyzer->forecast($forecast);
                $this->cache->save($cacheKeySanitized, $fractalForecast, 3600);
            } catch (\Throwable $e) {
                $this->logger->error('Error in ARIMA forecast: ' . $e->getMessage());
                $this->cache->save($cacheKeySanitized, ['error' => 'An error occurred while performing the ARIMA forecast. Please try again later.'], 3600);
            }
        });

        return ['status' => 'Processing', 'message' => 'Forecast data is being prepared.'];
    }
    
    // Helper method for processing tax liability
    private function processTaxLiability($cuID, $cacheKey)
    {
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        $userInvestments = $this->investmentModel->getUserInvestments($cuID);
        $taxLiability = 0;
    
        foreach ($userInvestments as $investment) {
            $gain = $investment['current_price'] - $investment['entry_price'];
            $taxLiability += $this->applyTaxRate($gain);
        }
    
        // Updated to use MyMIFractalAnalyzer
        $fractalTaxLiability = $this->MyMIFractalAnalyzer->analyze($taxLiability);
        $this->cache->save($cacheKeySanitized, $fractalTaxLiability, 3600);
    
        return $fractalTaxLiability;
    }    
    
    private function applyTaxRate($gain)
    {
        $taxRate = 0.15;
        return $gain * $taxRate;
    }

    public function generateTaxReport($cuID)
    {
        $userInvestments = $this->investmentModel->getUserInvestments($cuID);
        $taxReport = [];
        foreach ($userInvestments as $investment) {
            $gain = $investment['current_price'] - $investment['entry_price'];
            $taxLiability = $this->applyTaxRate($gain);
            $fractalTaxLiability = $this->MyMIFractalAnalyzer->analyze($taxLiability); // Apply fractal analysis
            $taxReport[] = [
                'symbol' => $investment['symbol'],
                'entry_price' => $investment['entry_price'],
                'current_price' => $investment['current_price'],
                'gain' => $gain,
                'tax_liability' => $fractalTaxLiability,
            ];
        }
        return $taxReport;
    }

    private function makeAlphaVantageAPICall($params)
    {
        $url = "https://www.alphavantage.co/query?{$params}&apikey={$this->alphavantageKey}";
        $response = $this->curlRequest->get($url);
        if ($response->getStatusCode() !== 200) {
            throw new \RuntimeException("API call failed with status " . $response->getStatusCode());
        }
        $data = json_decode($response->getBody(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException("API returned invalid JSON");
        }
        return $data;
    }

    public function sendAlertNotifications()
    {
        $alerts = $this->userAlertModel->getActiveAlerts();
        foreach ($alerts as $alert) {
            $this->queue->push(function() use ($alert) {
                $conditionMet = $this->checkAlertCondition($alert);
                if ($conditionMet) {
                    $fractalAlert = $this->MyMIFractalAnalyzer->analyze($alert); // Apply fractal analysis to the alert
                    $this->sendNotification($fractalAlert);
                }
            });
        }
    }

    private function checkAlertCondition($alert)
    {
        switch ($alert['alert_type']) {
            case 'market_movement':
                return $this->evaluateMarketMovement($alert);
            case 'trade_execution':
                return $this->evaluateTradeExecution($alert);
            case 'portfolio_performance':
                return $this->evaluatePortfolioPerformance($alert);
            default:
                return false;
        }
    }

    private function evaluateMarketMovement($alert)
    {
        $symbol = $alert['symbol'] ?? 'AAPL';
        $currentPrice = $this->fetchCurrentPrice($symbol);
        return $currentPrice > $alert['alert_value'];
    }

    private function evaluateTradeExecution($alert)
    {
        $symbol = $alert['symbol'] ?? 'AAPL';
        $currentPrice = $this->fetchCurrentPrice($symbol);
    
        // Example condition: Execute trade if the current price exceeds the alert value by a certain percentage
        $executionThreshold = 1.05; // 5% increase
        if ($currentPrice >= $alert['alert_value'] * $executionThreshold) {
            return true; // Condition met for trade execution
        }
    
        return false; // Condition not met
    }    

    private function evaluatePortfolioPerformance($alert)
    {
        $cuID = $alert['user_id'];
        $userInvestments = $this->investmentModel->getUserInvestments($cuID);
    
        // Example condition: Alert if portfolio's overall performance falls below a certain ROI threshold
        $roiThreshold = 0.05; // 5% return on investment
        $totalInvestment = 0;
        $totalReturn = 0;
    
        foreach ($userInvestments as $investment) {
            $initialValue = $investment['entry_price'] * $investment['shares'];
            $currentValue = $investment['current_price'] * $investment['shares'];
            $totalInvestment += $initialValue;
            $totalReturn += $currentValue;
        }
    
        $roi = ($totalReturn - $totalInvestment) / $totalInvestment;
    
        if ($roi < $roiThreshold) {
            return true; // Condition met for portfolio performance alert
        }
    
        return false; // Condition not met
    }    

    private function fetchCurrentPrice($symbol)
    {
        $url = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$symbol}&apikey={$this->alphavantageKey}";
        $response = $this->curlRequest->get($url);
        $data = json_decode($response->getBody(), true);
        return $data['Global Quote']['05. price'] ?? 0;
    }

    private function runLSTMForecast($timeSeriesData)
    {
        $cacheKey = 'lstm_forecast_' . md5(json_encode($timeSeriesData));
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        $cachedData = $this->cache->get($cacheKeySanitized);
        if ($cachedData !== null) {
            return $cachedData;
        }

        $this->queue->push(function() use ($timeSeriesData, $cacheKeySanitized) {
            try {
                $script = realpath(ROOTPATH . 'python/lstm_forecast.py');
                if ($script === false || !is_file($script)) {
                    throw new \RuntimeException('LSTM forecast script not available.');
                }

                $payload = json_encode($timeSeriesData, JSON_THROW_ON_ERROR);
                $python = env('python.binary', 'python3');
                $result = SafeProcess::run([$python, $script], [$python], $payload);

                if ($result['exitCode'] !== 0) {
                    throw new \RuntimeException('LSTM forecast script error: ' . $result['stderr']);
                }

                $forecast = json_decode($result['stdout'], true, 512, JSON_THROW_ON_ERROR);
                $this->cache->save($cacheKeySanitized, $forecast, 3600);
            } catch (\Throwable $e) {
                $this->logger->error('Error in LSTM forecast: ' . $e->getMessage());
                $this->cache->save($cacheKeySanitized, ['error' => 'An error occurred while performing the LSTM forecast. Please try again later.'], 3600);
            }
        });

        return ['status' => 'Processing', 'message' => 'LSTM forecast data is being prepared.'];
    }

    public function calculateTaxLiability($cuID)
    {
        $cacheKey = "tax_liability_{$cuID}";
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        $cachedData = $this->cache->get($cacheKeySanitized);

        if ($cachedData !== null) {
            return $cachedData;
        }
    
        // Check if queue is available
        if ($this->queue) {
            $this->queue->push(function() use ($cuID, $cacheKeySanitized) {
                $this->processTaxLiability($cuID, $cacheKeySanitized);
            });
            return ['status' => 'Processing', 'message' => 'Tax liability is being calculated.'];
        } else {
            // Fallback: Synchronously process tax liability if queue is unavailable
            log_message('warning', 'Queue service is not initialized, processing tax liability synchronously.');
            return $this->processTaxLiability($cuID, $cacheKeySanitized);
        }
    }

    private function calculateValueAtRisk($portfolio)
    {
        // Implement the VaR calculation using historical simulation, parametric method, or Monte Carlo simulation
    }

    public function generateRiskManagementTools($cuID)
    {
        $userInvestments = $this->investmentModel->getUserInvestments($cuID);
        // log_message('debug', 'MyMIInvestments L770 - $userInvestments Array: ' . (print_r($userInvestments, true)));
        $volatilityAnalysis = $this->performVolatilityAnalysis($userInvestments);
        $scenarioPlanning = $this->performScenarioPlanning($userInvestments); // Assuming this exists
        $stressTesting = $this->performStressTesting($userInvestments);       // Assuming this exists
        $valueAtRisk = $this->calculateValueAtRisk($userInvestments);         // Assuming this exists
    
        return [
            'volatility_analysis' => $volatilityAnalysis,
            'scenario_planning' => $scenarioPlanning,
            'stress_testing' => $stressTesting,
            'value_at_risk' => $valueAtRisk,
        ];
    }
    
    private function performScenarioPlanning($userInvestments)
    {
        $scenarios = ['Bull Market', 'Bear Market', 'Recession'];
        $scenarioPlanning = [];
    
        foreach ($userInvestments as $investment) {
            $symbol = $investment['symbol'];
            $currentPrice = $investment['current_price'];
            $quantity = $investment['shares'];
    
            foreach ($scenarios as $scenario) {
                $impact = $this->simulateMarketScenario($symbol, $scenario);
                $valueChange = $impact['price_change'] * $quantity;
                $scenarioPlanning[] = [
                    'symbol' => $symbol,
                    'scenario' => $scenario,
                    'value_change' => $valueChange,
                ];
            }
        }
    
        return $scenarioPlanning;
    }
 
    public function performStressTesting($userInvestments)
    {
        $stressTestResults = [];

        if (empty($userInvestments)) {
            log_message('error', "No investments found for stress testing.");
            return $stressTestResults;
        }

        // Define different stress scenarios, e.g., Market Crash, Interest Rate Hike, Recession, etc.
        $scenarios = [
            'Market Crash' => -0.30, // Example: 30% market decline
            'Interest Rate Hike' => -0.10, // Example: 10% decline due to rate hike
            'Recession' => -0.20, // Example: 20% market decline
        ];

        // Loop through each investment and apply the stress scenarios
        foreach ($userInvestments as $investment) {
            $symbol = $investment['symbol'];
            $currentValue = $investment['current_price'] * $investment['shares'];
            $quantity = $investment['shares'];

            // Simulate each scenario for the current investment
            foreach ($scenarios as $scenario => $impact) {
                $stressedValue = $currentValue * (1 + $impact); // Apply impact to current value
                $loss = ($currentValue - $stressedValue) * $quantity;

                $stressTestResults[] = [
                    'symbol' => $symbol,
                    'scenario' => $scenario,
                    'original_value' => number_format($currentValue * $quantity, 2),
                    'stressed_value' => number_format($stressedValue * $quantity, 2),
                    'estimated_loss' => number_format($loss, 2),
                ];
            }
        }

        return $stressTestResults;
    }

    private function sendNotification($alert)
    {
        $message = "Alert: {$alert['alert_type']} condition has been met.";
        switch ($alert['delivery_method']) {
            case 'email':
                $this->sendEmailNotification($alert['user_id'], $message);
                break;
            case 'sms':
                $this->sendSMSNotification($alert['user_id'], $message);
                break;
            case 'push':
                $this->sendPushNotification($alert['user_id'], $message);
                break;
            default:
                $this->logger->error("Unknown delivery method: {$alert['delivery_method']}");
                break;
        }
    }

    private function sendEmailNotification($userId, $message)
    {
        $user = $this->userModel->find($userId);
        mail($user['email'], 'Custom Alert Notification', $message);
    }

    private function sendSMSNotification($userId, $message)
    {
        $user = $this->userModel->find($userId);
        $twilio = new TwilioClient($this->twilioSid, $this->twilioToken);
        $twilio->messages->create($user['phone'], ['from' => $this->twilioFrom, 'body' => $message]);
    }

    private function sendPushNotification($userId, $message)
    {
        $user = $this->userModel->find($userId);
        $fields = [
            'app_id' => $this->onesignalAppId,
            'include_player_ids' => [$user['onesignal_player_id']],
            'contents' => ["en" => $message],
        ];
        $response = $this->curlRequest->post('https://onesignal.com/api/v1/notifications', [
            'headers' => ['Authorization' => 'Basic ' . $this->onesignalApiKey, 'Content-Type' => 'application/json'],
            'body' => json_encode($fields),
        ]);
    }

    public function getEconomicData() {
        $api_key = $this->APIs->fred_api_key;
        $series_id = 'GDP';

        try {
            $data = $this->FRED->fetchData($series_id, $api_key);
            if (is_array($data) && !empty($data)) {
                return $data;
            } else {
                return array();
            }
        } catch (Exception $e) {
            log_message('error', 'Error fetching economic data: ' . $e->getMessage());
            return array();
        }
    }

    public function searchEconomicSeries($searchText) {
        $api_key = $this->APIs->fred_api_key;

        try {
            $searchResults = $this->FRED->searchSeries($searchText, $api_key);
            if (is_array($searchResults) && !empty($searchResults)) {
                return $searchResults;
            } else {
                return array();
            }
        } catch (Exception $e) {
            log_message('error', 'Error searching economic series: ' . $e->getMessage());
            return array('error' => $e->getMessage());
        }
    }

    public function fetchSeriesUpdates($limit = 5) {
        $this->FRED = new FRED();

        if (!is_int($limit)) {
            return array('error' => 'Limit must be an integer.');
        }

        try {
            $updates = $this->FRED->fetchSeriesUpdates($limit);
            return $updates;
        } catch (Exception $e) {
            log_message('error', 'Error fetching series updates: ' . $e->getMessage());
            return array('error' => $e->getMessage());
        }
    }

    public function summarizeEconomicDataNotes($notes, $length = 120) {
        $cleanedBody = $this->marketingModel->cleanHtmlEmailContent($notes);
        $summaryArray = $this->getMyMIMarketing()->summarizeContent($cleanedBody);
        if (is_array($summaryArray) && !empty($summaryArray)) {
            return implode(". ", $summaryArray);
        }
        return '';
    }

    private function makeAPICall($url, $apiKey) {
        $client = $this->curlRequest;

        $url = $url . "&apikey=" . $apiKey;

        $response = $client->request('GET', $url, [
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    public function getSymbolsByTradeType() {
        $url = "https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=stock";
        $makeAPICall = $this->makeAPICall($url, $this->alphavantageKey);
        log_message('debug', 'MyMIInvestments L979 - $makeAPICall: ' . (print_r($makeAPICall,true)));
        return $makeAPICall; 
    }

    public function getBondSymbols() {
        $url = "https://morningstarapi.example.com/bonds";
        return $this->makeAPICall($url, $this->morningstarKey);
    }

    public function getCommoditySymbols() {
        $url = "https://www.quandl.com/api/v3/datatables/SHFE?api_key=" . $this->quandlKey;
        return $this->makeAPICall($url, $this->quandlKey);
    }

    public function getCryptoSymbols() {
        $url = "https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=crypto";
        return $this->makeAPICall($url, $this->alphavantageKey);
    }

    public function getCryptoAssetSymbols() {
        $url = "https://api.coingecko.com/api/v3/coins/list";
        return $this->makeAPICall($url, null);
    }

    public function getETFSymbols() {
        $url = "https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=etf";
        return $this->makeAPICall($url, $this->alphavantageKey);
    }

    public function getForeignStockSymbols() {
        $url = "https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=foreign_stock";
        return $this->makeAPICall($url, $this->alphavantageKey);
    }

    public function getForexSymbols() {
        $url = "https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=forex";
        return $this->makeAPICall($url, $this->alphavantageKey);
    }

    public function getInternationalBondSymbols() {
        $url = "https://bonddata.devapi.example.com/international-bonds";
        return $this->makeAPICall($url, null);
    }

    public function getOptionSymbols() {
        $url = "https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=option";
        return $this->makeAPICall($url, $this->alphavantageKey);
    }

    public function getMutualFundSymbols() {
        $url = "https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=mutual_fund";
        return $this->makeAPICall($url, $this->alphavantageKey);
    }

    public function getPreciousMetalSymbols() {
        $url = "https://www.quandl.com/api/v3/datatables/LBMA?api_key=" . $this->quandlKey;
        return $this->makeAPICall($url, $this->quandlKey);
    }

    public function getRealEstateSymbols() {
        $url = "https://www.quandl.com/api/v3/datatables/ZILLOW?api_key=" . $this->quandlKey;
        return $this->makeAPICall($url, $this->quandlKey);
    }

    public function getUserWatchlist($cuID)
    {
        // Retrieve the watchlist from the InvestmentModel
        $watchlist = $this->investmentModel->getUserWatchlist($cuID); // Assuming the method exists in InvestmentModel

        // Return the watchlist data or an empty array if no data is found
        return $watchlist ?? [];
    }

    public function getUserStrategies($userId)
    {
        $builder = $this->investmentModel->db->table('bf_investment_strategies');
        $builder->where('user_id', $userId);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function createStrategy($data)
    {
        $builder = $this->investmentModel->db->table('bf_investment_strategies');
        return $builder->insert($data);
    }
    
    public function updateStockData($symbol)
    {
        log_message('info', "🔄 MyMIInvestments L1110 - Updating stock data for: {$symbol}");
    
        if (empty($symbol) || strlen($symbol) < 1) {
            log_message('error', "⚠️ Skipping empty or invalid symbol.");
            return false;
        }
    
        $marketData = $this->fetchRealTimeStockData($symbol);
    
        if (!is_array($marketData) || empty($marketData) || isset($marketData['error'])) {
            $errorMessage = $marketData['error'] ?? 'Empty or malformed API response';
            log_message('error', "❌ MyMIInvestments L1114 - Failed to retrieve market data for {$symbol}: " . $errorMessage);
            return false;
        }
    
        try {
            $this->investmentModel->saveTickerData($symbol, $marketData);
    
            $tradeAlerts = $this->investmentModel->getLast50TradeAlerts();
            foreach ($tradeAlerts as $alert) {
                $this->investmentModel->updateTradeAlerts($symbol, $marketData);
                $this->investmentModel->logTradeAlertChanges(
                    $alert['id'], $alert['price'], $marketData['price'], $alert['volume'], $marketData['volume']
                );
            }
    
            $this->investmentModel->updateTradeAlertHistory($symbol, $marketData);
    
            if (!empty($marketData['sec_filings'])) {
                foreach ($marketData['sec_filings'] as $filing) {
                    $this->investmentModel->insertSecFilings($filing);
                }
            }
    
            log_message('info', "✅ Successfully updated stock data for {$symbol} across all tables.");
            return true;
        } catch (\Throwable $e) {
            log_message('error', "❌ Exception while updating stock data for {$symbol}: " . $e->getMessage());
            return false;
        }
    }
    
    public function getStrategyById($id)
    {
        $builder = $this->investmentModel->db->table('bf_investment_strategies');
        $builder->where('id', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function updateStrategy($id, $data)
    {
        $builder = $this->investmentModel->db->table('bf_investment_strategies');
        $builder->where('id', $id);
        return $builder->update($data);
    }

    public function deleteStrategy($id)
    {
        $builder = $this->investmentModel->db->table('bf_investment_strategies');
        $builder->where('id', $id);
        return $builder->delete();
    }

    public function getUserGoals($userId)
    {
        $builder = $this->investmentModel->db->table('bf_investment_goals');
        $builder->where('user_id', $userId);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function createGoal($data)
    {
        $builder = $this->investmentModel->db->table('bf_investment_goals');
        return $builder->insert($data);
    }

    public function getGoalById($id)
    {
        $builder = $this->investmentModel->db->table('bf_investment_goals');
        $builder->where('id', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function updateGoal($id, $data)
    {
        $builder = $this->investmentModel->db->table('bf_investment_goals');
        $builder->where('id', $id);
        return $builder->update($data);
    }

    public function deleteGoal($id)
    {
        $builder = $this->investmentModel->db->table('bf_investment_goals');
        $builder->where('id', $id);
        return $builder->delete();
    }

    // New methods to be implemented

    public function cryptoOverview()
    {
        $builder = $this->investmentModel->db->table('bf_exchanges_assets');
        $builder->select('symbol, coin_name, coin_value, market_cap');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function economicData()
    {
        $builder = $this->investmentModel->db->table('bf_investment_economic_data');
        $builder->select('title, notes, last_updated, source_link');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function marketNews()
    {
        $builder = $this->investmentModel->db->table('bf_market_news');
        $builder->select('title, description, url, published_at');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function MyMINews()
    {
        $builder = $this->investmentModel->db->table('bf_mymi_news');
        $builder->select('title, description, url, published_at');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function MyMIResearch()
    {
        $builder = $this->investmentModel->db->table('bf_mymi_research');
        $builder->select('title, description, url, published_at');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function stockOverview()
    {
        $builder = $this->investmentModel->db->table('bf_investment_stock_listing');
        $builder->select('symbol, company_name, market_cap, sector');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getAlertsByUserAccess($cuID) // !! FIX THIS
    {
        // Placeholder data - Replace with actual logic to retrieve alerts
        return [
            'cuAlerts' => [], // Your user alerts logic
            'cuTradeAlerts' => [] // Your trade alerts logic
        ];
    }

    public function getInvestmentTools()
    {
        // Fetch investment tools from a model or another source
        $tools = $this->investmentModel->getInvestmentTools(); // Assume this method exists
    
        return $tools ?? []; // Return an empty array if no tools are available
    }

    public function getUserPortfolio($cuID)
    {
        // Retrieve all active investments for the user
        $investments = $this->investmentModel->getAllTradesByUser($cuID);
    
        // Initialize the portfolio array
        $portfolio = [];
    
        // Process each investment and calculate relevant details
        foreach ($investments as $investment) {
            // Calculate the total value of each investment (current price * quantity)
            $currentValue = $investment['current_price'] * $investment['shares'];
            
            // Calculate profit or loss for each investment
            $profitLoss = ($investment['current_price'] - $investment['entry_price']) * $investment['shares'];
    
            // Add the processed investment to the portfolio
            $portfolio[] = [
                'symbol' => $investment['symbol'],
                'entry_price' => number_format($investment['entry_price'], 2),
                'current_price' => number_format($investment['current_price'], 2),
                'quantity' => $investment['shares'],
                'total_value' => number_format($currentValue, 2),
                'profit_loss' => number_format($profitLoss, 2),
            ];
        }
    
        return $portfolio;
    }

    public function calculateProfitLoss($investmentRecords)
    {
        // Initialize the profit/loss array
        $profitLossMetrics = [
            'totalProfitLoss' => 0,
            'profitCount' => 0,
            'lossCount' => 0,
            'profitTrades' => [],
            'lossTrades' => [],
        ];
    
        // Check if there are any investments to process
        if (empty($investmentRecords)) {
            return $profitLossMetrics; // Return default if no records
        }
    
        $totalProfitLoss = 0;
    
        // Loop through each investment record
        foreach ($investmentRecords as $investment) {
            // Assuming the investment record has 'initial_value' and 'current_value'
            $initialValue = $investment['total_trade_cost'];
            $currentValue = $investment['current_price'] * $investment['shares'];
    
            // Calculate profit/loss
            $profitLoss = $currentValue - $initialValue;
    
            // Add profit/loss to total
            $totalProfitLoss += $profitLoss;
    
            // Categorize into profit or loss
            if ($profitLoss > 0) {
                $profitLossMetrics['profitCount']++;
                $profitLossMetrics['profitTrades'][] = [
                    'symbol' => $investment['symbol'],
                    'initial_value' => $initialValue,
                    'current_value' => $currentValue,
                    'profit_loss' => $profitLoss,
                ];
            } else {
                $profitLossMetrics['lossCount']++;
                $profitLossMetrics['lossTrades'][] = [
                    'symbol' => $investment['symbol'],
                    'initial_value' => $initialValue,
                    'current_value' => $currentValue,
                    'profit_loss' => $profitLoss,
                ];
            }
        }
    
        // Fill in the final results
        $profitLossMetrics['totalProfitLoss'] = $totalProfitLoss;
    
        return $profitLossMetrics;
    }
    
    public function calculateAssetAllocation($investmentRecords)
    {
        // Initialize asset allocation metrics
        $assetAllocation = [
            'totalInvestment' => 0,
            'allocationByAsset' => [],
        ];
    
        // Check if there are any investments to process
        if (empty($investmentRecords)) {
            return $assetAllocation; // Return default if no records
        }
    
        // Total current value for all assets
        $totalInvestment = 0;
    
        // Loop through each investment record to calculate asset allocation
        foreach ($investmentRecords as $investment) {
            // Check if necessary keys exist in the investment record
            if (!isset($investment['category'], $investment['current_price'], $investment['shares'])) {
                log_message('error', "Missing data in investment record: " . json_encode($investment));
                continue; // Skip invalid records
            }
    
            $assetType = $investment['category'];
            $currentValue = $investment['current_price'] * $investment['shares'];
    
            // Add the current value to the total
            $totalInvestment += $currentValue;
    
            // Group investments by asset type
            if (!isset($assetAllocation['allocationByAsset'][$assetType])) {
                $assetAllocation['allocationByAsset'][$assetType] = [
                    'current_value' => 0,
                    'allocation_percentage' => 0,
                ];
            }
    
            // Sum up current value for each asset type
            $assetAllocation['allocationByAsset'][$assetType]['current_value'] += $currentValue;
        }
    
        // Avoid division by zero
        if ($totalInvestment > 0) {
            // Calculate the allocation percentage for each asset type
            foreach ($assetAllocation['allocationByAsset'] as $assetType => &$data) {
                $data['allocation_percentage'] = ($data['current_value'] / $totalInvestment) * 100;
            }
        } else {
            log_message('error', "Total investment is zero. Cannot calculate allocation percentages.");
        }
    
        // Set total investment in the result
        $assetAllocation['totalInvestment'] = $totalInvestment;
    
        return $assetAllocation;
    }    

    public function calculateGrowthMetrics($investmentRecords)
    {
        // Initialize the growth metrics array
        $growthMetrics = [
            'totalGrowth' => 0,
            'averageGrowthRate' => 0,
            'yearlyGrowth' => [],
            'growthCount' => 0,
            'declineCount' => 0,
            'growthInvestments' => [],
            'declineInvestments' => []
        ];
    
        // Check if there are any investments to process
        if (empty($investmentRecords)) {
            return $growthMetrics; // Return the default empty metrics if no records
        }
    
        $totalInvestmentValue = 0;
        $totalGrowthValue = 0;
        $investmentCount = count($investmentRecords);
        $yearlyGrowthData = [];
    
        // Loop through each investment record
        foreach ($investmentRecords as $investment) {
            // Assuming your investment record has 'initial_value', 'current_value', and 'date'
            $initialValue = $investment['total_trade_cost'];
            $currentValue = $investment['current_price'] * $investment['shares'];
            $investmentDate = new \DateTime($investment['date']);
    
            // Calculate the growth for the investment
            $growth = ($currentValue - $initialValue) / $initialValue * 100; // Percentage growth
            $totalGrowthValue += $growth;
            $totalInvestmentValue += $initialValue;
    
            // Track investments with positive and negative growth
            if ($growth > 0) {
                $growthMetrics['growthCount']++;
                $growthMetrics['growthInvestments'][] = [
                    'symbol' => $investment['symbol'],
                    'growth' => $growth,
                ];
            } else {
                $growthMetrics['declineCount']++;
                $growthMetrics['declineInvestments'][] = [
                    'symbol' => $investment['symbol'],
                    'growth' => $growth,
                ];
            }
    
            // Accumulate yearly growth
            $year = $investmentDate->format('Y');
            if (!isset($yearlyGrowthData[$year])) {
                $yearlyGrowthData[$year] = ['growth' => 0, 'initial_value' => 0];
            }
            $yearlyGrowthData[$year]['growth'] += $growth;
            $yearlyGrowthData[$year]['initial_value'] += $initialValue;
        }
    
        // Calculate the total growth percentage
        if ($totalInvestmentValue > 0) {
            $growthMetrics['totalGrowth'] = ($totalGrowthValue / $totalInvestmentValue) * 100;
        }
    
        // Calculate the average growth rate
        $growthMetrics['averageGrowthRate'] = $totalGrowthValue / $investmentCount;
    
        // Calculate the yearly growth percentages
        foreach ($yearlyGrowthData as $year => $data) {
            $yearlyGrowth = 0;
            if ($data['initial_value'] > 0) {
                $yearlyGrowth = ($data['growth'] / $data['initial_value']) * 100;
            }
            $growthMetrics['yearlyGrowth'][$year] = $yearlyGrowth;
        }
    
        return $growthMetrics;
    }
    
    public function generateFinancialReports($cuID)
    {
        // Retrieve user-specific data
        $portfolio = $this->investmentModel->getUserInvestments($cuID);
        $totalAssets = $this->investmentModel->calculateTotalAssetsByUser($cuID);
        $totalTrades = $this->investmentModel->totalTradeCountByUser($cuID);
        $totalTradeValue = $this->investmentModel->totalTradeValueByUser($cuID);
        $userWallets = $this->walletModel->getUserWallets($cuID);
    
        // Updated references to MyMIFractalAnalyzer
        $growthMetrics = $this->MyMIFractalAnalyzer->analyzeGrowthMetrics($portfolio);
        $profitLossReport = $this->calculateProfitLoss($portfolio);
        $assetAllocation = $this->calculateAssetAllocation($portfolio);
    
        // Tax reports and liabilities (if applicable)
        $taxLiability = $this->calculateTaxLiability($cuID);
        $taxReport = $this->generateTaxReport($cuID);
    
        // Financial report structure
        $financialReport = [
            'totalAssets' => number_format($totalAssets, 2),
            'totalTrades' => $totalTrades,
            'totalTradeValue' => number_format($totalTradeValue, 2),
            'growthMetrics' => $growthMetrics,
            'profitLossReport' => $profitLossReport,
            'assetAllocation' => $assetAllocation,
            'wallets' => $userWallets,
            'taxLiability' => $taxLiability,
            'taxReport' => $taxReport,
        ];
    
        return $financialReport;
    }    
    
    public function simulateMarketScenario($symbol, $scenario)
    {
        // Get the current stock price or historical price data for the symbol
        $currentPriceData = $this->fetchHistoricalData($symbol);
        // // Optional Alternative Direct to Existing AlphaVantage API Caller
        // $currentPriceData = $this->makeAlphaVantageAPICall("function=TIME_SERIES_DAILY&symbol={$symbol}");

        
        if (empty($currentPriceData) || !isset($currentPriceData['Time Series (Daily)'])) {
            // If no price data is available, return a neutral impact
            return [
                'price_change' => 0, // No change
                'new_price' => 0
            ];
        }
    
        // Get the latest stock price from the historical data
        $latestDate = array_key_first($currentPriceData['Time Series (Daily)']);
        $currentPrice = $currentPriceData['Time Series (Daily)'][$latestDate]['4. close'];
    
        // Define different market scenarios and their typical percentage impact on stock prices
        $scenarios = [
            'Bull Market' => rand(10, 30) / 100,  // 10% to 30% increase in stock price
            'Bear Market' => rand(-30, -10) / 100, // 10% to 30% decrease in stock price
            'Recession' => rand(-50, -20) / 100,  // 20% to 50% decrease in stock price
            'Interest Rate Hike' => rand(-15, -5) / 100, // 5% to 15% decrease
            'Market Correction' => rand(-10, 10) / 100,  // -10% to 10% movement
            'Economic Boom' => rand(15, 40) / 100,  // 15% to 40% increase in stock price
        ];
    
        // Check if the provided scenario exists
        if (!isset($scenarios[$scenario])) {
            throw new \Exception("Invalid scenario provided: $scenario");
        }
    
        // Calculate the price change based on the selected scenario
        $priceChangePercentage = $scenarios[$scenario];
        $newPrice = $currentPrice * (1 + $priceChangePercentage);
    
        // Return the impact of the scenario
        return [
            'price_change' => $priceChangePercentage,
            'new_price' => number_format($newPrice, 2),
        ];
    }

    private function fetchHistoricalData($symbol)
    {
        $url = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol={$symbol}&apikey={$this->alphavantageKey}";
        $response = $this->curlRequest->get($url);
    
        if ($response->getStatusCode() !== 200) {
            log_message('error', "API call failed for symbol: $symbol with status " . $response->getStatusCode());
            return [];
        }
    
        $data = json_decode($response->getBody(), true);
    
        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('error', "Invalid JSON response for symbol: $symbol");
            return [];
        }
    
        return $data;
    }
    
    public function retrieveExpertInsights($topic, $complexityLevel)
    {
        // Validate inputs
        if (empty($topic) || empty($complexityLevel)) {
            log_message('error', 'Invalid parameters for retrieving expert insights');
            return ['error' => 'Invalid parameters for expert insights'];
        }

        try {
            // Simulate fetching expert insights, for example, from a database or external API
            $insightsData = $this->investmentModel->fetchExpertInsights($topic, $complexityLevel); // Hypothetical model method

            if (empty($insightsData)) {
                log_message('error', "No insights found for topic: $topic and complexity level: $complexityLevel");
                return ['error' => 'No insights found'];
            }

            // Return insights data with success status
            return ['status' => 'success', 'insights' => $insightsData];
        } catch (\Exception $e) {
            log_message('error', "Error retrieving expert insights: {$e->getMessage()}");
            return ['error' => 'An error occurred while retrieving expert insights'];
        }
    }

    public function retrieveGeneralInsights($cuID)
    {
        try {
            // Fetch general insights data relevant to the user
            $generalInsightsData = []; //$this->investmentModel->fetchGeneralInsights($cuID); // Hypothetical model method

            if (empty($generalInsightsData)) {
                log_message('error', "No general insights found for User ID: {$cuID}");
                return ['error' => 'No general insights found'];
            }

            // Return the general insights
            return ['status' => 'success', 'data' => $generalInsightsData];
        } catch (\Exception $e) {
            log_message('error', "Error retrieving general insights: {$e->getMessage()}");
            return ['error' => 'An error occurred while retrieving general insights'];
        }
    }

    // Method to fetch user retirement plans
    public function getUserRetirementPlans($userId)
    {
        $retirementPlans = $this->investmentModel->getUserRetirementPlans($userId);

        if (empty($retirementPlans)) {
            return ['status' => 'error', 'message' => 'No active retirement plans found.'];
        }

        return ['status' => 'success', 'data' => $retirementPlans];
    }

    // Method to track progress of a retirement plan
    public function trackRetirementProgress($planId, $progressAmount)
    {
        $plan = $this->investmentModel->getRetirementPlanById($planId);

        if (!$plan) {
            return ['status' => 'error', 'message' => 'Retirement plan not found.'];
        }

        $this->investmentModel->updateRetirementProgress($planId, $progressAmount);

        // Check if target amount has been reached
        $updatedPlan = $this->investmentModel->getRetirementPlanById($planId);
        if ($updatedPlan['current_progress'] >= $updatedPlan['target_amount']) {
            $this->investmentModel->completeRetirementPlan($planId);
            return ['status' => 'success', 'message' => 'Retirement plan completed.'];
        }

        return ['status' => 'success', 'message' => 'Progress updated.'];
    }

    // Method to retrieve a summary of retirement plans
    public function getRetirementSummary($userId)
    {
        $plans = $this->investmentModel->getUserRetirementPlans($userId);

        $summary = array_map(function ($plan) {
            return [
                'plan_id' => $plan['id'],
                'investment_id' => $plan['investment_id'],
                'target_amount' => $plan['target_amount'],
                'current_progress' => $plan['current_progress'],
                'remaining_amount' => $plan['target_amount'] - $plan['current_progress'],
                'retirement_date' => $plan['retirement_date'],
                'status' => $plan['status'],
            ];
        }, $plans);

        return $summary;
    }
}
