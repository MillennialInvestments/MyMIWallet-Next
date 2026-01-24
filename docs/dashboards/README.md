# Dashboards Overview

## Dashboard inventory

| Dashboard | Controller | View | Purpose |
| --- | --- | --- | --- |
| Executive Dashboard | `DashboardController` | `User/Dashboard/index` | Executive snapshot of net worth, budget, portfolio, alerts, AI insights. |
| Investments Dashboard | `InvestmentsController` | `App\Modules\User\Views\Investments\index` | Portfolio performance, watchlist, forecast intelligence, insights. |
| Alerts Dashboard | `AlertsController` | Alerts views | Trade alert management and previews. |
| Budget Dashboard | `BudgetController` | Budget views | Budget summaries, repayment schedules, account balances. |
| Wallets Dashboard | `WalletsController` | Wallet views | Wallet management and balance summaries. |

## Shared dashboard patterns
- **Fetch API + JSON endpoints**: internal `/API/*` routes power dynamic panels (heatmaps, accuracy, highlights).
- **DataTables**: used for tables that require sorting and filtering (existing dashboard tables).
- **dynamicModalLoader**: standard modal pattern for showing details (forecast modal, setup modal).
- **Caching**: controller endpoints cache JSON payloads to avoid per-row network or external API calls.

## Forecasting integration map
- Executive Dashboard: forecast highlights card + heatmap card (`/API/Investments/getForecastHighlights`, `/API/Investments/getConfidenceHeatmap`).
- Investments Dashboard: heatmap panel + accuracy tab + modal (`/API/Investments/getConfidenceHeatmap`, `/API/Investments/getForecastAccuracySummary`, `/Investments/forecastModal/{ticker}`).
- Alerts Dashboard: no direct UI integration, but uses forecast fields from `bf_investment_trade_alerts`.

## UI consistency rules
- **Badges**: use `badge bg-success|warning|info|secondary` for confidence levels.
- **Timestamps**: display `updated_at` or `recorded_at` with a text-soft style.
- **Tooltips**: use `data-bs-toggle="tooltip"` and icon helpers for explanatory hints.
- **No external calls from UI**: dashboards must only call internal API endpoints.
