# MYMI-GTM-039 & MYMI-GTM-040: Certify Investments Watchlists, Trade Tracking, Strategies and Goals

## Status
READY / CERTIFIED.

- **PR:** #728
- **Completed UTC:** 2026-11-16T19:45:00Z
- **Domain:** Core financial journeys (W3)
- **Gate:** None required

## Summary of Changes
- **Watchlist Authorization & IDOR Hardening (GTM-039):**
  - Closed IDOR vulnerability in `InvestmentsController::getUserWatchlist($cuID)` by requiring authentication (`$userId > 0`), enforcing that `$cuID === $userId`, and throwing 403 Forbidden on non-owner requests.
  - Hardened `InvestmentsController::addToWatchlist()` and `removeFromWatchlist()` to require authenticated user sessions (`$userId > 0`) and normalize symbols to uppercase.
  - Implemented missing `InvestmentsController::watchlist()` handler supporting both GET (browser render & JSON) and POST mutation actions.
- **Investment Strategies & Financial Goals Hardening (GTM-040):**
  - Updated `InvestmentModel::getGoalById()`, `getStrategyById()`, `updateGoal()`, `deleteGoal()`, `updateStrategy()`, and `deleteStrategy()` with defensive `$userId` parameter scoping and `limit(1)` guards to prevent IDOR mutations across accounts.
  - Hardened `InvestmentsController::getGoals()`, `getGoal()`, `createGoal()`, `updateGoal()`, `deleteGoal()`, `getStrategies()`, `getStrategy()`, `createStrategy()`, `updateStrategy()`, and `deleteStrategy()` to strictly enforce `$this->cuID` ownership, returning 401 for unauthenticated calls and 404 for nonexistent or foreign resources.
- **Route Handler Gap Ratchet Reduction (GTM-024):**
  - Implemented 10 missing route handlers in `InvestmentsController`: `MyMINews`, `MyMIResearch`, `autoSave`, `cryptoOverview`, `economicData`, `marketNews`, `overview`, `stockOverview`, `test`, and `watchlist`.
  - Shrunk `tests/baseline/route-handler-gaps.txt` ratchet by 10 lines (from 172 to 162 gaps).

## Test Verification
- Test file: `tests/unit/Investments/InvestmentsWatchlistAndGoalsTest.php` (16 tests, 52 assertions passing).
- Full Unit suite: `vendor/bin/phpunit --testsuite unit` (459 tests, 2243 assertions passing).
- Auth Smoke suite: `vendor/bin/phpunit --testsuite auth-smoke` (20 tests, 89 assertions passing).
- Form Certification smoke: `bash tests/smoke/form-certification-smoke.sh` (PASS >= 293, FAIL <= 22).
- Route Handler verify: `php spark routes:verify-handlers` (0 new gaps, 0 fixed in baseline).
- Model Limit Audit: 0 violations on changed files.

## Risks & Rollback
- Risk: Low. All mutations and lookups are strictly scoped by the authenticated session user ID (`$this->cuID`).
- Rollback: Revert PR commit on `main`.
