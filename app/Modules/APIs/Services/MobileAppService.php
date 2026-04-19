<?php

declare(strict_types=1);

namespace App\Modules\APIs\Services;

use App\Models\AlertsModel;
use App\Models\InvestmentModel;
use App\Services\BudgetService;

class MobileAppService
{
    public function dashboard(int $userId): array
    {
        $budgetService = new BudgetService($userId);
        $summary = $budgetService->buildBudgetSummary($userId);
        $repayment = $budgetService->buildRepaymentSnapshot($userId, ['strategy' => 'avalanche']);

        $investments = new InvestmentModel();
        $activeTrades = $investments->getActiveTrades($userId);
        $watchlist = $investments->getUserWatchlist($userId);

        return [
            'budget' => $summary['data'] ?? $summary,
            'repayment' => $repayment['data'] ?? $repayment,
            'active_trades_count' => is_array($activeTrades) ? count($activeTrades) : 0,
            'watchlist_count' => is_array($watchlist) ? count($watchlist) : 0,
            'as_of' => date('c'),
        ];
    }

    public function budget(int $userId): array
    {
        $budgetService = new BudgetService($userId);

        return [
            'summary' => $budgetService->buildBudgetSummary($userId),
            'credit' => $budgetService->buildCreditBreakdown($userId),
            'available' => $budgetService->buildAvailableSnapshot($userId),
            'repayment' => $budgetService->buildRepaymentSnapshot($userId, ['strategy' => 'avalanche']),
        ];
    }

    public function investments(int $userId): array
    {
        $investments = new InvestmentModel();

        return [
            'active_trades' => $investments->getActiveTrades($userId),
            'watchlist' => $investments->getUserWatchlist($userId),
        ];
    }

    public function alerts(int $userId): array
    {
        $alerts = new AlertsModel();

        return [
            'subscribed_alerts' => $alerts->getUserSubscribedAlerts($userId),
        ];
    }
}
