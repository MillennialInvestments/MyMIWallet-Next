# BudgetController

## Purpose
Provides authenticated budgeting dashboards, budget APIs, and shared budget data hydration for logged-in users.

## Data sources
- `BudgetModel`, `AccountsModel` for database queries.
- `BudgetService`, `AccountService`, `DashboardService`, `GoalTrackingService` for aggregated metrics.
- `SafeCache` for cached responses.

## View responsibilities
- Renders budget views and associated dashboard components.
- Supplies budget summaries, repayment schedules, and balance data to the views.

## Endpoints invoked / served
- Budget dashboard routes under `/Budget` and related API endpoints.

## Performance notes
- Uses `SafeCache` for budget API calls.
- Aggregates balances once and reuses cached results to avoid repeated queries.

## Forecasting integration
- No direct forecasting integration in this controller.
- Forecasting data is handled by Investments and Dashboard controllers.
