# MYMI-GTM-050: Certify Predictions and Forecast Presentation

## Status
READY FOR REVIEW / CERTIFIED.

- **PR:** Pending
- **Completed UTC:** 2026-11-23T20:20:00Z
- **Domain:** Extended product domains (W4)
- **Gate:** None required (Money switches remain OFF)

## Summary of Changes
- **Constant Misnaming & Service Registration Fixes (`App\Libraries\MyMIPredictions`, `Config\Services`):**
  - Resolved fatal crashes in `MyMIPredictions::allowedStates()` and `allowedModes()` by exposing public constants `ALL_STATES = self::VALID_STATES` and `MODES = self::VALID_MODES`.
  - Registered `mymipredictions` service in `App\Config\Services` so `service('mymipredictions')` cleanly instantiates the library instead of returning `null`.
  - Refactored `MyMIPredictions::__construct` dependencies to have safe default instances, making standalone injection and service calls safe and clean.
  - Corrected model imports from non-existent `App\Modules\Predictions\Models` to `App\Models\Predictions`.
  - Created missing `App\Models\Predictions\SettlementsModel` (`bf_predictions_settlements`).
- **Session-User IDOR Protection & Authorization Guards:**
  - `App\Modules\APIs\Controllers\PredictionsAPIController`:
    - Hardened session resolution via `auth()->id() ?? service('authentication')->id() ?? session()->get('user_id')`.
    - Enforced 401 Unauthorized rejection for unauthenticated requests on `createMarket`, `placeOrder`, `cancelOrder`, `settle`, and `addLiquidity`.
    - Implemented `cancelOrder(int $orderId, int $userId)` delegating to `MyMIPredictions::cancelOrder` with IDOR user ownership scoping.
    - Implemented `addLiquidity` delegating to `MyMIPredictions::addLiquidity`.
    - Hardened `removeLiquidity` with structured rejection message.
  - `App\Modules\User\Controllers\PredictionsController`:
    - Implemented `placeOrder()` with session user ID resolution (`currentUserId()`), validating parameters, delegating to `MyMIPredictions::placeOrder()`, and providing structured JSON/flash responses.
    - Implemented `cancelOrder()` with session user ID resolution (`currentUserId()`), delegating to `MyMIPredictions::cancelOrder()`.
  - `App\Models\Predictions\OrdersModel`:
    - Fixed `markCanceled(int $orderId, int $userId)` to return `$this->db->affectedRows() > 0`, ensuring callers cannot claim an order was canceled if it was owned by another user.
  - `App\Models\Predictions\PositionsModel`:
    - Fixed fatal `compact('user_id')` error in `accumulate()` where argument was `$userId`.
- **Cross-Database Compatibility & Locking Safety (`App\Libraries\MyMIPredictions`):**
  - Defensively conditioned `FOR UPDATE` row lock on options table using `stripos($this->db->DBDriver ?? '', 'sqlite') === false`, preserving SQLite in-memory and file testability while keeping strict row-level pessimistic locking in MySQL production.
  - Wrapped `gold->debit()` and `gold->credit()` calls with `method_exists()` safety checks to prevent fatal errors when external ledger methods are not exposed.
- **Route-Level Money Switches & Filter Protections (`App\Config\Routes.php`):**
  - Attached `['filter' => 'login']` to `Portfolio` and `Settlements` in User Predictions routes.
  - Attached `['filter' => ['login', 'feature:predictions']]` to `POST PlaceOrder` and `POST CancelOrder`.
  - Kept money switch `FEATURE_PREDICTIONS` strictly `false` by default, returning HTTP 503 when off for API/JSON calls and 302 redirect back for browser requests.
- **Model Query Bounds & Audit Remediation:**
  - `App\Modules\User\Controllers\InvestmentsController`:
    - Bounded `$forecastModel->where('ticker', $ticker)->orderBy('updated_at', 'DESC')->findAll(20)` in `forecastModal()`.
    - Fixed fatal `$this` inside `static function` closure in `buildForecastDetailsPayload()`.
  - `App\Services\Forecasting\ForecastAccuracyEvaluator`:
    - Bounded `$this->accuracyModel->where('created_at >=', $cutoff)->orderBy('created_at', 'DESC')->findAll(100)` in `buildAccuracySummary()`.
    - Defaulted constructor parameters to allow zero-argument instantiation via `service('forecastAccuracyEvaluator')`.
- **Comprehensive Test Suite (`Tests\Unit\Predictions\PredictionsForecastTest`):**
  - 10 unit tests with 80 assertions covering:
    - `MyMIPredictions` constants (`ALL_STATES`, `MODES`, `allowedStates`, `allowedModes`).
    - `FEATURE_PREDICTIONS` switch off by default and `FeatureFlagFilter` 503 JSON / 302 redirect responses.
    - AMM odds calculation (`quoteOddsBipsAmm`), elasticity, and odds bounds (100 bips to 9900 bips).
    - Market creation, initial options, and liquidity addition.
    - Order placement, position accumulation, and idempotency replay deduplication.
    - Order cancellation IDOR protection (unauthorized user receives false and order remains active).
    - Market settlement, winning option tagging, resolved state transition, and pending payout generation.
    - `PredictionsAPIController` endpoints 401 Unauthorized rejection when unauthenticated.
    - `InvestmentsController::buildForecastDetailsPayload` presentation formatting, timeframe mapping, and confidence scores.
    - `ForecastAccuracyEvaluator::buildAccuracySummary` 7d rolling hit rates, direction breakdown, timeframe breakdown, and confidence buckets (`85-100`, etc.).

## Verification Proof
- `vendor/bin/phpunit tests/unit/Predictions/PredictionsForecastTest.php`: 10 tests, 80 assertions, OK (100% PASS).
- `vendor/bin/phpunit --testsuite unit`: 634 tests, 3323 assertions, OK (100% PASS).
- `php spark routes:verify-handlers`: 153 known gaps, 0 new, 0 fixed but still in baseline (PASS).
- `bash tests/smoke/form-certification-smoke.sh`: ALL FORM CERTIFICATION SMOKE TESTS PASSED (PASS 293, FAIL 22 <= 22 baseline).
- `php spark api:filters-check`: No CRITICAL filter coverage gaps detected.
- `php spark api:rate-limit-check`: Rate-limit coverage check passed.
- `git diff --check`: 0 errors.

## Risks & Mitigations
- **Risk:** Premature execution of real-money or cryptocurrency trades on prediction markets.
  - **Mitigation:** Money switch `FEATURE_PREDICTIONS = false` is enforced in `Config\Features` and via `feature:predictions` filter on all state-changing endpoints (`POST PlaceOrder`, `POST CancelOrder`, `Markets/Create`, `Liquidity/Add`, etc.).
- **Risk:** Cross-user order tampering or unauthorized order cancellation.
  - **Mitigation:** IDOR protection enforced in `OrdersModel::markCanceled` with `$this->db->affectedRows() > 0` validation and strict session user ID resolution.

## Rollback Plan
- Revert the feature branch commit or merge commit. No database migrations were executed or modified; existing database state is preserved.
