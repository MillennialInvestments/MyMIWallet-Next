<?php

namespace App\Libraries;

use App\Libraries\{BaseLoader, MyMIBudget, MyMICoin, MyMIGold, MyMIInvestments, MyMINotifications, MyMIProjects, MyMISolana, MyMIWallet};
use App\Models\{AlertsModel, BudgetModel, DashboardModel, ExchangeModel, InvestmentModel, InvestorModel, MarketingModel, MyMICoinModel, SolanaModel, TrackerModel, UserModel, WalletModel};
use App\Services\BudgetService;
use CodeIgniter\Session\Session;
use Config\Services;
use Config\{APIs, SiteSettings, SocialMedia};

#[\AllowDynamicProperties]
class MyMIDashboard
{

    protected $auth;
    protected $cuID;
    protected $db;
    protected $debug;
    protected $helpers = (['auth']);
    protected $request;
    protected $session;
    protected $siteSettings;
    protected $budgetModel;
    protected $dashboardModel;
    protected $exchangeModel;
    protected $investorModel;
    protected $solanaModel;
    protected $trackerModel;
    protected $userModel;
    protected $walletModel;
    protected $MyMICoinModel;
    protected $MyMICoin;
    protected $MyMIGold;
    protected $MyMINotifications;
    protected $MyMISolana;
    protected $MyMIWallet;
    protected $userSolana;

    public function __construct()
    {
        $this->auth = service('authentication');
        $this->db = \Config\Database::connect();
        $this->request = service('request');
        $this->siteSettings = config('SiteSettings');
        $this->debug = $this->siteSettings->debug;
        $this->session = Services::session();
        $this->cuID = $this->session->get('user_id') ?? $this->auth->id() ?? 0;

        $this->budgetModel = new BudgetModel();
        $this->dashboardModel = new DashboardModel();
        $this->MyMICoinModel = new MyMICoinModel();
        $this->trackerModel = new TrackerModel();
        // $this->userModel = new UserModel();
        $this->walletModel = new WalletModel();
        $this->MyMICoin = new MyMICoin();
        $this->MyMIGold = new MyMIGold();
    }

    public function dashboardInfo($cuID) {
        if ($cuID === 0) {
            return [
                'getFeatures' => [],
                'promotionalBanners' => [],
                'progressGoalData' => [],
            ];
        }

        $getFeatures = $this->getFeatures(); 
        $promotionalBanners = $this->dashboardModel->getPromotionalBanners();
        $progressGoalData = $this->processGoalData($cuID);

        $dashboardInfo = [
            'getFeatures' => $getFeatures,
            'promotionalBanners' => $promotionalBanners,
            'progressGoalData' => $progressGoalData,
        ];

        return $dashboardInfo;
    }

    public function getAllTokensByBlock($exchange) {
        if ($exchange === 'Solana') {
            if ($this->siteSettings->solanaExchange === 1) {
                $this->solanaModel          = new SolanaModel(); 
                $exchange                   = 'SOL';
                $getListedTokens            = $this->solanaModel->getListedTokens($exchange);
                return $getListedTokens; 
            }
        }
    }

    public function getTokenDetails($exchange, $symbol = null) {
        if ($exchange === 'Solana') {
            $this->solanaModel              = new SolanaModel();
            $getTokenDetails                = $this->solanaModel->getTokenInfoBySymbol($symbol);
            return $getTokenDetails;
        }
    }

    public function getTokenDetailsByID($exchange, $tokenID = null) {
        if ($exchange === 'Solana') {
            $this->solanaModel              = new SolanaModel();
            $getTokenDetails                = $this->solanaModel->getTokenInfoByID($tokenID);
            return $getTokenDetails;
        }
    }

    public function getCryptoAccount($cuID, $exchange = null) {
        if ($cuID === 0) {
            return [
                'accountInfo' => [
                    'id' => 0,
                    'status' => 0,
                    'public_token' => 'N/A',
                    'nickname' => 'Guest',
                    'auto_staking' => 'N/A',
                    'notifications' => 'N/A',
                ],
                'ledger' => []
            ];
        }
        // log_message('debug', 'MyMIDashboard L110 - $cuID: ' . $cuID); 

        if ($exchange === 'Solana' && $this->siteSettings->solanaExchange === 1) {
            $this->MyMISolana = new MyMISolana();
            $cuSolanaDW = $this->MyMISolana->getUserDefaultSolana($cuID)['cuSolanaDW'];

            return [
                'accountInfo' => [
                    'id' => $cuSolanaDW['id'] ?? 0,
                    'status' => $cuSolanaDW['status'] ?? 0,
                    'public_token' => $cuSolanaDW['public_token'] ?? 'N/A',
                    'nickname' => $cuSolanaDW['nickname'] ?? 'N/A',
                    'auto_staking' => $cuSolanaDW['auto_staking'] ?? 'N/A',
                    'notifications' => $cuSolanaDW['notifications'] ?? 'N/A',
                ],
                'ledger' => []
            ];
        }

        return [];
    }
    
    public function getFeatures() {
        $getFeatures                        = $this->dashboardModel->getFeatures(); 
        if ($this->debug === 1) {
            // log_message('debug', 'MyMIDashboard L90 - $getFeatures: ' . (print_r($getFeatures, true)));
        }
        return $getFeatures; 
    }

    public function getUpcomingEconomicEvents() {
        $getUpcomingEconomicEvents          = $this->dashboardModel->getUpcomingEconomicEvents(); 
        return $getUpcomingEconomicEvents; 
    }
    
    public function getTransactions($cuID, $exchange, $publicKey) {
        if ($exchange === 'Solana') {
            $cryptoTransactions             = $this->MyMISolana->getTransactions($cuID, $publicKey);
            $ledger                         = [
                'transactions'              => $cryptoTransactions,
            ];
        }
        return $ledger;
    }
    
    public function getTransactionsBySymbol($cuID, $exchange, $symbol) {
        if ($exchange === 'Solana') {
            $getTokenDetails                = $this->getTokenDetails($exchange, $symbol); 
            $cryptoTransactions             = $this->MyMISolana->getTransactionsBySymbol($cuID, $getTokenDetails['address']);
            $ledger                         = [
                'transactions'              => $cryptoTransactions,
            ];
        }
        return $ledger;
    }

    private function getNextTask($goals, $completions)
    {
        $completedOrderIds = array_column($completions, 'order_id');
        foreach ($goals as $goal) {
            if (!in_array($goal['order_id'], $completedOrderIds)) {
                return $goal;
            }
        }
        return null;
    }

    public function processGoalData($userId)
    {
        $goals                              = $this->dashboardModel->getGoals($userId);
        $completions                        = $this->dashboardModel->getCompletions($userId);
        $nextTask                           = $this->getNextTask($goals, $completions);
        return ['goals' => $goals, 'completions' => $completions, 'nextTask' => $nextTask];
    }

    public function getExecutiveDashboardSummary(int $userId): array
    {
        if ($userId <= 0) {
            return $this->emptyExecutiveSummary();
        }

        $budgetService = new BudgetService($userId);
        $budgetOverview = $this->safeArray($budgetService->getUserBudget($userId));
        $budgetLibrary  = new MyMIBudget();
        $budgetInsights = $this->safeArray($budgetLibrary->allUserBudgetInfo($userId));

        $portfolioSummary = $this->getInvestmentsSummary($userId);

        return [
            'assets'    => $this->getAssetsSummary($userId, $budgetService, $budgetOverview, $budgetInsights),
            'budget'    => $this->getBudgetSummary($budgetOverview, $budgetInsights),
            'portfolio' => $portfolioSummary,
            'projects'  => $this->getProjectsSummary($userId),
            'alerts'    => $this->getAlertsSummary($userId),
            'news'      => $this->getNewsSummary($userId, $portfolioSummary['symbols'] ?? []),
        ];
    }

    protected function getAssetsSummary(int $userId, BudgetService $budgetService, array $budgetOverview, array $budgetInsights): array
    {
        $totalAssets      = $this->toFloat($budgetOverview['totalAccountBalance'] ?? 0.0);
        $totalLiabilities = $this->toFloat($budgetOverview['debtSummary'] ?? 0.0);
        $netWorth         = $totalAssets - $totalLiabilities;

        $breakdown = [
            'cash'           => $this->toFloat($budgetOverview['checkingSummary'] ?? 0.0),
            'investments'    => $this->toFloat($budgetOverview['investSummary'] ?? 0.0),
            'crypto'         => $this->toFloat($budgetOverview['cryptoSummary'] ?? 0.0),
            'availableCredit'=> $this->toFloat($budgetOverview['creditAvailable'] ?? 0.0),
        ];

        $trend = $this->buildNetWorthTrend($budgetService, $userId);

        return [
            'netWorth'         => $netWorth,
            'totalAssets'      => $totalAssets,
            'totalLiabilities' => $totalLiabilities,
            'trend'            => $trend,
            'breakdown'        => $breakdown,
        ];
    }

    protected function getBudgetSummary(array $budgetOverview, array $budgetInsights): array
    {
        $monthlyIncome   = $this->toFloat($budgetOverview['thisMonthsIncome'] ?? 0.0);
        $monthlyExpenses = $this->toFloat($budgetOverview['thisMonthsExpense'] ?? 0.0);
        $monthlyNet      = $monthlyIncome - $monthlyExpenses;
        $availableToInvest = $this->extractAvailableToInvest($budgetInsights, $monthlyNet, $budgetOverview);

        return [
            'monthlyIncome'     => $monthlyIncome,
            'monthlyExpenses'   => $monthlyExpenses,
            'monthlyNet'        => $monthlyNet,
            'availableToInvest' => $availableToInvest,
            'ytdIncome'         => $this->toFloat($budgetOverview['incomeYTDSummary'] ?? 0.0),
            'ytdExpenses'       => $this->toFloat($budgetOverview['expenseYTDSummary'] ?? 0.0),
        ];
    }

    protected function getInvestmentsSummary(int $userId): array
    {
        try {
            $investments = new MyMIInvestments();
            $portfolio   = $investments->buildPortfolioLight($userId, ['maxSymbols' => 50]);
        } catch (\Throwable $e) {
            log_message('error', 'MyMIDashboard::getInvestmentsSummary failed: {msg}', ['msg' => $e->getMessage()]);
            $portfolio = [];
        }

        $positions    = $this->safeArray($portfolio['positions'] ?? []);
        $totals       = $this->safeArray($portfolio['totals'] ?? []);
        $totalValue   = $this->toFloat($totals['value'] ?? 0.0);
        $positionCount= (int) ($totals['count'] ?? count($positions));
        $symbols      = array_values(array_unique(array_filter(array_map(static function ($row) {
            return strtoupper(trim((string) ($row['symbol'] ?? '')));
        }, $positions))));

        $allocation = $this->calculateInvestmentAllocation($userId);

        return [
            'totalValue'    => $totalValue,
            'positionCount' => $positionCount,
            'pnl'           => $this->toFloat($totals['pnl'] ?? 0.0),
            'positions'     => $positions,
            'allocation'    => $allocation,
            'symbols'       => $symbols,
        ];
    }

    protected function getProjectsSummary(int $userId): array
    {
        try {
            $projectsLib = new MyMIProjects();
            $projects    = $projectsLib->projectsData($userId);
        } catch (\Throwable $e) {
            log_message('error', 'MyMIDashboard::getProjectsSummary failed: {msg}', ['msg' => $e->getMessage()]);
            return [
                'activeCount'       => 0,
                'totalCommitments'  => 0.0,
                'nextDeadline'      => null,
                'topProjects'       => [],
            ];
        }

        $list = $this->safeArray($projects['list'] ?? []);
        $activeProjects = array_values(array_filter($list, static function ($row) {
            $status = strtolower((string) ($row['project']['status'] ?? ''));
            return in_array($status, ['collecting', 'active', 'funded'], true);
        }));

        usort($activeProjects, static function ($a, $b) {
            $aDate = $a['project']['commit_deadline'] ?? $a['project']['created_at'] ?? '';
            $bDate = $b['project']['commit_deadline'] ?? $b['project']['created_at'] ?? '';
            return strcmp($aDate, $bDate);
        });

        $topProjects = array_map(static function ($row) {
            $project = $row['project'] ?? [];
            return [
                'title'      => $project['title'] ?? 'Project',
                'status'     => $project['status'] ?? 'pending',
                'allocation' => (float) ($row['committed'] ?? 0.0),
                'deadline'   => $project['commit_deadline'] ?? null,
            ];
        }, array_slice($activeProjects, 0, 5));

        $deadlines = array_filter(array_map(static function ($row) {
            return $row['project']['commit_deadline'] ?? null;
        }, $activeProjects));
        sort($deadlines);

        return [
            'activeCount'      => count($activeProjects),
            'totalCommitments' => $this->toFloat($projects['totalCommitments'] ?? 0.0),
            'nextDeadline'     => $deadlines[0] ?? null,
            'topProjects'      => $topProjects,
        ];
    }

    protected function getAlertsSummary(int $userId): array
    {
        try {
            $alertsModel = new AlertsModel();
            $openStatuses = ['Opened', 'Open', 'Active', 'Watching'];
            $builder = $alertsModel->builder();
            $openCount = $builder
                ->where('user_id', $userId)
                ->whereIn('status', $openStatuses)
                ->countAllResults();

            $rows = $alertsModel->builder()
                ->select('id, ticker, direction, entry_price, stop_loss, status, modified_on, created_on')
                ->where('user_id', $userId)
                ->orderBy('modified_on', 'DESC')
                ->limit(10)
                ->get()
                ->getResultArray();
        } catch (\Throwable $e) {
            log_message('error', 'MyMIDashboard::getAlertsSummary failed: {msg}', ['msg' => $e->getMessage()]);
            $openCount = 0;
            $rows = [];
        }

        $recent = array_map(function (array $row) {
            return [
                'ticker'     => strtoupper((string) ($row['ticker'] ?? '')),
                'direction'  => $row['direction'] ?? null,
                'entry'      => $this->toFloat($row['entry_price'] ?? 0.0),
                'stop'       => $this->toFloat($row['stop_loss'] ?? 0.0),
                'status'     => $row['status'] ?? '',
                'updated_at' => $row['modified_on'] ?? $row['created_on'] ?? null,
            ];
        }, $rows);

        return [
            'openCount' => $openCount,
            'recent'    => $recent,
        ];
    }

    protected function getNewsSummary(int $userId, array $symbols = []): array
    {
        try {
            $marketingModel = new MarketingModel();
            $newsRows = $marketingModel->getNewsUpdates(10);
        } catch (\Throwable $e) {
            log_message('error', 'MyMIDashboard::getNewsSummary failed: {msg}', ['msg' => $e->getMessage()]);
            $newsRows = [];
        }

        $symbols = array_unique(array_filter(array_map('strtoupper', $symbols)));

        $items = [];
        foreach ($this->safeArray($newsRows) as $row) {
            $title = (string) ($row['title'] ?? $row['summary'] ?? 'News Item');
            $symbol = strtoupper((string) ($row['symbol'] ?? ''));
            if ($symbols && $symbol && !in_array($symbol, $symbols, true)) {
                // Skip unrelated symbol specific stories if we have a watchlist filter
                continue;
            }

            $items[] = [
                'title'       => $title,
                'summary'     => $row['summary'] ?? null,
                'source'      => $row['source'] ?? ($row['email_sender'] ?? 'MarketAux'),
                'symbol'      => $symbol ?: null,
                'published_at'=> $row['created_at'] ?? $row['email_date'] ?? null,
                'url'         => $row['url'] ?? $row['link'] ?? null,
            ];
            if (count($items) >= 5) {
                break;
            }
        }

        return [
            'items' => $items,
        ];
    }

    private function buildNetWorthTrend(BudgetService $budgetService, int $userId): array
    {
        try {
            $records = $budgetService->getUserBudgetRecords($userId) ?? [];
        } catch (\Throwable $e) {
            log_message('error', 'MyMIDashboard::buildNetWorthTrend failed to load records: {msg}', ['msg' => $e->getMessage()]);
            $records = [];
        }

        $buckets = [];
        foreach ($this->safeArray($records) as $row) {
            try {
                $record = $budgetService->normalizeBudgetRecord((array) $row, $userId);
            } catch (\Throwable $e) {
                continue;
            }

            $monthKey = $record->date->format('Y-m');
            $buckets[$monthKey] = ($buckets[$monthKey] ?? 0.0) + $record->netAmount;
        }

        $now  = new \DateTimeImmutable('first day of this month');
        $trend = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = $now->sub(new \DateInterval('P' . $i . 'M'));
            $key   = $month->format('Y-m');
            $label = $month->format('M y');
            $trend[] = [
                'label' => $label,
                'value' => round($buckets[$key] ?? 0.0, 2),
            ];
        }

        return $trend;
    }

    private function calculateInvestmentAllocation(int $userId): array
    {
        try {
            $model = new InvestmentModel();
            $rows  = $model->where('user_id', $userId)
                ->where('status', 'Active')
                ->where('closed', 'false')
                ->select('category, trade_type, position_type, symbol, shares, current_price, entry_price')
                ->findAll();
        } catch (\Throwable $e) {
            log_message('error', 'MyMIDashboard::calculateInvestmentAllocation failed: {msg}', ['msg' => $e->getMessage()]);
            $rows = [];
        }

        $allocation = [
            'stocks'   => 0.0,
            'etfs'     => 0.0,
            'crypto'   => 0.0,
            'projects' => 0.0,
            'other'    => 0.0,
        ];

        foreach ($this->safeArray($rows) as $row) {
            $value = $this->toFloat($row['current_price'] ?? $row['entry_price'] ?? 0.0) * $this->toFloat($row['shares'] ?? 0.0);
            $bucket = $this->resolveAllocationBucket($row);
            $allocation[$bucket] += $value;
        }

        return $allocation;
    }

    private function resolveAllocationBucket(array $row): string
    {
        $category = strtolower((string) ($row['category'] ?? ''));
        $type     = strtolower((string) ($row['trade_type'] ?? $row['position_type'] ?? ''));
        $symbol   = strtoupper((string) ($row['symbol'] ?? ''));

        if (str_contains($category, 'project')) {
            return 'projects';
        }
        if (str_contains($category, 'crypto') || str_contains($type, 'crypto') || preg_match('/^(BTC|ETH|SOL|ADA|XRP)/', $symbol)) {
            return 'crypto';
        }
        if (str_contains($category, 'etf') || str_contains($symbol, 'ETF')) {
            return 'etfs';
        }
        if (str_contains($category, 'stock') || str_contains($type, 'equity') || preg_match('/^[A-Z]{1,5}$/', $symbol)) {
            return 'stocks';
        }

        return 'other';
    }

    private function extractAvailableToInvest(array $budgetInsights, float $monthlyNet, array $budgetOverview): float
    {
        $periodSummaries = $this->safeArray($budgetInsights['periodSummaries'] ?? []);
        if (!empty($periodSummaries['thisMonth']['availableToInvest'])) {
            return $this->toFloat($periodSummaries['thisMonth']['availableToInvest']);
        }

        $invested = $this->toFloat($budgetOverview['thisMonthsInvestments'] ?? 0.0);
        return max($monthlyNet - $invested, 0.0);
    }

    private function emptyExecutiveSummary(): array
    {
        return [
            'assets'    => ['netWorth' => 0.0, 'totalAssets' => 0.0, 'totalLiabilities' => 0.0, 'trend' => [], 'breakdown' => []],
            'budget'    => ['monthlyIncome' => 0.0, 'monthlyExpenses' => 0.0, 'monthlyNet' => 0.0, 'availableToInvest' => 0.0, 'ytdIncome' => 0.0, 'ytdExpenses' => 0.0],
            'portfolio' => ['totalValue' => 0.0, 'positionCount' => 0, 'pnl' => 0.0, 'positions' => [], 'allocation' => [], 'symbols' => []],
            'projects'  => ['activeCount' => 0, 'totalCommitments' => 0.0, 'nextDeadline' => null, 'topProjects' => []],
            'alerts'    => ['openCount' => 0, 'recent' => []],
            'news'      => ['items' => []],
        ];
    }

    private function toFloat($value): float
    {
        if (is_numeric($value)) {
            return (float) $value;
        }
        if (is_string($value)) {
            $normalized = preg_replace('/[^0-9\.-]/', '', $value);
            return is_numeric($normalized) ? (float) $normalized : 0.0;
        }
        return 0.0;
    }

    private function safeArray($value): array
    {
        return is_array($value) ? $value : (array) $value;
    }
}
?>
