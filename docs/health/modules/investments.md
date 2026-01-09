# Investments System Health Tests

✅ Health Test: `php spark invest:health-watchlist`
Priority: P1
Feature: Symbol search / add watchlist
Primary Entry Point(s):
- `app/Modules/User/Controllers/InvestmentsController.php::addWatchlist()`
- `app/Models/InvestmentModel.php::addToWatchlist()`
Dependencies:
- DB: `bf_users_watchlist`
What it should verify (checklist):
- Step 1: Add a test symbol to watchlist.
- Step 2: Confirm insert success and duplicate handling.
What it should log: user_id, symbol, insert status.
Failure modes to detect: insert failures, invalid symbol normalization.
Where to implement: `app/Commands/InvestWatchlistHealth.php` (new).
Suggested command name: `invest:health-watchlist`
Expected log file: `writable/logs/health_invest.log`

✅ Health Test: `php spark invest:health-quotes`
Priority: P0
Feature: Price fetch + caching
Primary Entry Point(s):
- `app/Libraries/MyMIInvestments.php::getMarketQuoteSafe()`
- `app/Libraries/MyMIAlphaVantage.php::getAlphaVantageResponse()`
Dependencies:
- Cache: CodeIgniter cache
- Env: `ALPHA_VANTAGE_API_KEYS`, `ALPHA_VANTAGE_API_KEY*`
What it should verify (checklist):
- Step 1: Fetch quote for a sample symbol.
- Step 2: Confirm cache write/read path.
What it should log: symbol, data source, cache hit.
Failure modes to detect: rate limit notices, missing keys.
Where to implement: `app/Commands/InvestQuoteHealth.php` (new).
Suggested command name: `invest:health-quotes`
Expected log file: `writable/logs/health_invest.log`

✅ Health Test: `php spark invest:health-portfolio`
Priority: P1
Feature: Portfolio performance evaluation
Primary Entry Point(s):
- `app/Services/InvestmentService.php::getInvestmentData()`
- `app/Modules/User/Controllers/InvestmentsController.php::getInvestmentPerformance()`
Dependencies:
- DB: `bf_users_trades`
What it should verify (checklist):
- Step 1: Load trades and compute summary.
- Step 2: Validate totals and performance metrics.
What it should log: trade count, total value, performance.
Failure modes to detect: empty portfolio unexpectedly, invalid numeric casts.
Where to implement: `app/Commands/InvestPortfolioHealth.php` (new).
Suggested command name: `invest:health-portfolio`
Expected log file: `writable/logs/health_invest.log`

✅ Health Test: `php spark invest:health-predictions-cron`
Priority: P1
Feature: Predictions pipeline cron
Primary Entry Point(s):
- `app/Modules/APIs/Controllers/PredictionsController.php::cronFetchMarketData()`
- `app/Modules/APIs/Controllers/PredictionsController.php::cronUpdateMarketPrices()`
Dependencies:
- DB: predictions tables created by `app/Database/Migrations/2025-09-09-0000*_CreatePredictions*.php`
What it should verify (checklist):
- Step 1: Call cron methods in dry-run mode.
- Step 2: Validate response payload and timing.
What it should log: cron name, records processed.
Failure modes to detect: missing tables, cron token errors.
Where to implement: `app/Commands/InvestPredictionsHealth.php` (new).
Suggested command name: `invest:health-predictions-cron`
Expected log file: `writable/logs/health_invest.log`
