# AlertsController

## Purpose
Serves authenticated alert workflows, including trade alert management, previews, and common data hydration for alert-focused pages.

## Data sources
- `AlertsModel` for alert records and trade alert lookup.
- `MyMIAlerts` for alert refresh logic and headline stats.
- `BudgetModel`, `MyMIBudget`, `MyMIDashboard`, `MyMIUser`, `MyMIAdvisor` for supporting context.
- `UserService`, `GoalTrackingService`, `BudgetService`, `AccountService`, `SolanaService` for shared user data.

## View responsibilities
- Renders alert-related views (preview, management, and alert workflow pages).
- Supplies headline stats and alert metadata for alert preview pages.

## Endpoints invoked / served
- `AlertsController::preview()` → GET `/Alerts/preview/{symbol}` (public preview).
- Additional alert management endpoints within the Alerts module (standard CRUD and utility endpoints).

## Performance notes
- Uses cached alert refresh heuristics (`MyMIAlerts::needsSymbolRefresh`).
- Avoids redundant refreshes by checking `last_updated_time` fields.

## Forecasting integration
- No direct forecast computation in this controller.
- Forecast-related fields live on `bf_investment_trade_alerts` (used by forecasting services) but are not mutated here.
