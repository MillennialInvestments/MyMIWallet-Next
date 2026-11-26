# MYMI-GTM-049: Certify Projects and CoinVault

## Status
READY FOR REVIEW / CERTIFIED.

- **PR:** Pending
- **Completed UTC:** 2026-11-23T16:45:00Z
- **Domain:** Extended product domains (W4)
- **Gate:** None required (Money switches remain OFF)

## Summary of Changes
- **Model Query Bounds & Audit Remediation (`App\Models\ProjectsModel`, `App\Models\TbiProjectCoinModel`):**
  - Remediated 8 unbounded query pattern findings across `ProjectsModel` and `TbiProjectCoinModel`:
    - Bound `getProjectFundHolders(int $projectId, int $limit = 100)` with `->limit($limit)`.
    - Bound `getProjectNAVHistory(int $projectId, int $limit = 30)` with `->limit($limit)`.
    - Bound `getProjectFundTransactions(int $projectId, int $limit = 25)` with `->limit($limit)`.
    - Bound `getProjectDistributionsDetailed(int $projectId, int $limit = 50)` with `->limit($limit)`.
    - Bound `getFundCapitalFlows(int $projectId, int $limit = 40)` with `->limit($limit)`.
    - Bound `getFundAuditTrail(int $projectId, int $limit = 50)` with `->limit($limit)`.
    - Bound `getActiveProjectsWithStats(int $limit = 50)` with `->limit($limit)`.
    - Bound `getProjectFullDetails` navHistory query with `->limit(60)`.
    - Bound `TbiProjectCoinModel::getCoinsForProject(int $projectId, int $limit = 50)` with `findAll($limit)`.
    - Bound `TbiProjectCoinModel::getContributionCategories(int $limit = 50)` with `->limit($limit)`.
  - Result: Unsafe query patterns dropped from 28 to 20 repo-wide, with 0 findings remaining in Projects and CoinVault models.
- **Session-User IDOR Protection & Authorization Guards:**
  - `App\Modules\CoinVault\Controllers\Api\CoinVaultApiController`:
    - Hardened `requestPayout` to strictly authenticate session user (`service('authentication')->id() ?? auth()->id() ?? session()->get('user_id')`) and reject unauthenticated requests with HTTP 401 Unauthorized. Client-supplied `user_id` payload is completely ignored, eliminating IDOR vulnerabilities.
    - Defensively guarded `approveContribution`, `rejectContribution`, `approvePayout`, and `rejectPayout` to enforce active admin authentication (`$adminId > 0`), returning HTTP 401 if unauthenticated.
  - `App\Modules\APIs\Controllers\TbiProjectCoinsAPIController`:
    - Hardened `recordContribution` to authenticate session user before validation, rejecting unauthenticated callers with HTTP 401 and ignoring client-supplied `user_id`.
    - Hardened `approveContribution` and `rejectContribution` to enforce admin authentication.
  - `App\Modules\User\Controllers\ProjectsController`:
    - Verified all project actions (`commit`, `withdrawCommit`, `myCommitments`, `requestMonthlyWithdrawal`, `purchaseFundUnits`, `submitCommit`, `submitInvest`, `submitSell`, `submitProposal`, `reportRevenue`) strictly bind to session user identity via `currentUserId()`.
    - Enforced ownership verification on `reportRevenue` (rejecting non-creators).
- **CoinVault Service & Cross-Database Compatibility (`App\Modules\CoinVault\Services\CoinVaultService`):**
  - Replaced MySQL-specific `FIELD()` function in `getCategoryId` with standard ANSI SQL `CASE WHEN ... THEN 0 ELSE 1 END`, ensuring complete SQLite, MySQL, and PostgreSQL portability.
  - Verified CoinVault balance reservation logic:
    - Payout requests lock balances (`available -= amount`, `locked += amount`) and insert pending requests with idempotency keys.
    - Payout rejection restores locked balances to available balances.
    - Payout approval decrements locked balance, increments lifetime withdrawals, and logs debit ledger entries within a database transaction.
    - Contribution approval verifies project vault balance, credits available/voting balances, decrements project vault balance, and increments released supply.
- **Route Level Money Switches (`App\Config\Routes.php`):**
  - Attached `['filter' => ['login', 'feature:project_investing']]` to:
    - `POST Projects/Commit/(:num)`
    - `POST Projects/Withdraw-Commit/(:num)`
    - `POST Projects/Request-Monthly-Withdrawal/(:num)`
    - `POST Projects/Accept-Private-Allocation/(:num)`
    - `POST Projects/PurchaseFundUnits`
  - Kept money switch `FEATURE_PROJECT_INVESTING` strictly `false` by default, returning HTTP 503 when off.
  - Added `class_exists` safety guards around non-production dev/debug routes (`Dev/BitcoinTest`, `CommonDataController::smoke`).
- **Comprehensive Test Suite (`Tests\Unit\Projects\ProjectsCoinVaultTest`):**
  - 11 unit tests with 86 assertions covering:
    - Projects & CoinVault configuration defaults and off-by-default money switches.
    - `ProjectsModel` bounded queries.
    - `TbiProjectCoinModel` bounded queries and quantity calculation math (zero/negative division safety).
    - CoinVault wallet creation and voting balance ownership calculation.
    - CoinVault payout lifecycle (balance reservation, rejection unlock, approval settlement).
    - CoinVault contribution approval/rejection and project vault supply balance accounting.
    - External contribution service HMAC authentication, timestamp freshness, and idempotency deduplication.
    - `CoinVaultApiController` IDOR rejection and admin authorization guards.
    - `TbiProjectCoinsAPIController` authentication and admin guards.
    - `ProjectsController` session identity scoping and unauthorized rejection.

## Test Verification
- Projects/CoinVault Unit Tests: `vendor/bin/phpunit tests/unit/Projects/ProjectsCoinVaultTest.php` (11 tests, 86 assertions PASS).
- Unit Test Suite: `vendor/bin/phpunit --testsuite unit` (624 tests, 3,243 assertions PASS).
- Form Certification Smoke: `bash tests/smoke/form-certification-smoke.sh` (293 PASS, 22 FAIL - Ratchet Preserved).
- Route Handlers Ratchet Check: `php spark routes:verify-handlers` (153 known gaps, 0 new, 0 fixed but in baseline).
- API Filters Gate: `php spark api:filters-check` (0 critical filter coverage gaps).
- Rate Limit Gate: `php spark api:rate-limit-check` (Passed).
- Model Limit Audit: `php spark ops:model-limit:audit` (0 findings in Projects/CoinVault models).

## Known Risks & Rollback
- Risk: Low. All project investing routes and mutations remain gated behind `FEATURE_PROJECT_INVESTING = false`. All changes are additive and defensive.
- Rollback: `git revert` or checkout prior commit on branch `feature/mymi-gtm-049-projects-coinvault`.
