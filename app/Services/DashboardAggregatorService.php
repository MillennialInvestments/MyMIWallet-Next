<?php namespace App\Services;

use App\Services\BudgetService;
use App\Libraries\MyMIDashboard;
use App\Libraries\MyMIInvestments;
use App\Models\AlertsModel;
use App\Models\MarketingModel;

class DashboardAggregatorService
{
    protected int $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    public function getManagementOverview(): array
    {
        if ($this->userId <= 0) {
            return [];
        }

        $cacheKey = "management_overview_{$this->userId}";
        $cache = cache();

        if ($cached = $cache->get($cacheKey)) {
            return $cached;
        }

        // -----------------------------
        // SERVICES
        // -----------------------------
        $budgetService = new BudgetService($this->userId);
        $dashboardLib  = new MyMIDashboard();
        $investments   = new MyMIInvestments();
        $alertsModel   = new AlertsModel();
        $marketing     = new MarketingModel();

        // -----------------------------
        // AGGREGATION
        // -----------------------------
        $budgetData = $budgetService->getUserBudget($this->userId);

        $portfolio  = $investments->buildPortfolioLight($this->userId, [
            'maxSymbols' => 50
        ]);

        $alerts     = $alertsModel
            ->where('created_by', $this->userId)
            ->whereIn('status', ['Open','Opened','Active','Watching'])
            ->countAllResults();

        $news       = $marketing->getNewsUpdates(5);

        $dashboard  = $dashboardLib->dashboardInfo($this->userId);

        $overview = [
            'budget'    => $budgetData,
            'portfolio' => $portfolio,
            'alerts'    => $alerts,
            'news'      => $news,
            'dashboard' => $dashboard,
        ];

        // -----------------------------
        // CACHE FOR 120 SECONDS
        // -----------------------------
        $cache->save($cacheKey, $overview, 120);

        return $overview;
    }
}
