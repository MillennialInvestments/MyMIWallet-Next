# Log Review & Repair Report — 2026-03-08

## Root Cause Analysis

### Routing Issues
- 404 misses came from legacy or typo paths (`/index.php/`, `Management/API`, `Management/Docs`, `Features/Brokerage-Integration`, and `Features/Advanced-Investment-Portfoio-Manager`).
- The `Features` route group pointed at `Features::...` while the real controller class is `FeaturesController`, causing route/controller mismatch.

### API Runtime Issues
- `getForecastAccuracySummary` called `ForecastAccuracyEvaluator::getAccuracyDashboardData()` but the adapter service did not expose that method.
- `getConfidenceHeatmap` forwarded a string `window` parameter to a service signature expecting `int $windowMinutes`.

### Cache Key Validation Issues
- Forecast aggregation cache keys were not normalized before cache operations.

### Database Schema Issues
- Scorecard table usage existed in models, but no dedicated SQL fix artifact for `bf_squeeze_scorecards` was present.

### Runtime Initialization Warnings
- `MyMIWallets initialized without numeric user context` guard already exists in the codebase and was confirmed.

### AIOps Patch Warnings
- `OllamaPatchRunner` did not hard-stop when diff output was empty, allowing repeated invalid patch warnings.

## Route Resolution Audit

### Valid Routes (targeted)
- `API/Management/Run-CRON-Tasks` → `ManagementAPIController::Run_CRON_Tasks`
- `API/Investments/getConfidenceHeatmap` → `InvestmentsAPIController::getConfidenceHeatmap`
- `API/Investments/getForecastAccuracySummary` → `InvestmentsAPIController::getForecastAccuracySummary`

### Missing Routes (targeted, now added/fixed)
- `Management/API` → `APIAdminController::index`
- `Management/Docs` → `DocsAdminController::index`
- `Features/Brokerage-Integration` alias → `FeaturesController::BrokerageIntegrations`
- Index.php bare-root redirects (`index.php`, `index.php/`) → `/`

### Broken Routes (targeted, now corrected)
- `Features` routes used `Features::...` (class not present) and now map to `FeaturesController::...`.
- `Features/Advanced-Investment-Portfoio-Manager` typo now redirected to `Features/Advanced-Investment-Portfolio-Manager`.

## Files Modified
- `app/Config/Routes.php`
- `app/Modules/Advertise/Controllers/FeaturesController.php`
- `app/Modules/APIs/Controllers/InvestmentsAPIController.php`
- `app/Services/ForecastAccuracyEvaluator.php`
- `app/Services/ForecastAggregationService.php`
- `app/Config/Filters.php`
- `app/Filters/BotBlocker.php`
- `app/Services/AIOps/OllamaPatchRunner.php`
- `app/Models/SqueezeScorecardModel.php`
- `docs/sql/fixes_2026_03_08.sql`

## SQL Changes
- Added `docs/sql/fixes_2026_03_08.sql` with `CREATE TABLE IF NOT EXISTS bf_squeeze_scorecards (...)`.

## Route Changes
- Added route group handlers for `Management/API` and `Management/Docs`.
- Fixed features controller references and added alias route for singular brokerage path.
- Added redirects for typo/legacy paths and common 404-generating links.

## Controller/Service Patches
- Added `getAccuracyDashboardData()` adapter to `ForecastAccuracyEvaluator`.
- Enforced integer window handling for confidence heatmap API.
- Added cache key sanitization in forecast aggregation service.
- Added empty-diff protection in `OllamaPatchRunner`.
- Added bot-blocking filter and registered globally.

## Remaining Warnings
- `ops:commands:audit` still reports pre-existing command-rule violations not part of this log-fix patch.
- `ops:filesystem:lint` still reports numerous pre-existing path policy warnings/errors.
- `aiops:routes:audit` command does not exist in this repository; nearest available command is `aiops:routes:scan`.
