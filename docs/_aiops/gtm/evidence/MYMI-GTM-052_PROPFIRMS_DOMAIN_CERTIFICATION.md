# MYMI-GTM-052: Certify PropFirms Domain

## Status
IN REVIEW / CERTIFIED.

- **PR:** [#753](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/753) (pending creation)
- **Branch:** `feature/mymi-gtm-052-propfirms-domain`
- **Domain:** Extended product domains (W4)
- **Gate:** None required

## Summary of Changes
- **PropFirm Engine & Rule Set Certification (`PropFirmEngine`, `ApexRuleEngine`, `TopstepRuleEngine`):**
  - Verified evaluation of trailing drawdown, daily loss limit (DLL), profit consistency percent (e.g. 50% max day cap), maximum position size, and stop-loss requirements.
  - Verified risk state transitions (`healthy`, `warning`, `breached`) and trade eligibility checks.
  - Verified snapshot persistence to `bf_prop_equity_history` and allowed symbol gating via `bf_prop_allowed_symbols`.
  - Added bounded limit on queries in `PropFirmsService::dashboardSummary` (`limit(100)`).
- **IDOR Protection & Ownership Enforcement (`AccountsController`, `NotificationsController`, `TradovateController`):**
  - **AccountsController:** Enforced session-user ownership validation (`$this->findOwnedAccount($id)`) across `detail`, `update`, `delete`, `refreshState`, `accountState`, and `connectBroker`. Non-owners receive 404 `Account not found.`
  - **NotificationsController:** Enforced session-user ownership on `markRead(int $id)` by validating the notification's account belongs to `$this->cuID`. Cross-user attempts receive 404 `Notification not found.`
  - **TradovateController:** Enforced account ownership (`isOwnedAccount`) across `connect`, `disconnect`, `sync`, `syncOrders`, `syncFills`, and `syncPositions`.
  - **PropFirmsController:** Protected `seedDefaults()` with role check, returning 403 for non-admin/team users.
- **Model Limit Audit Compliance:**
  - Bounded queries in `AccountsController` (`findAll(100)` for firms, rule sets, and user accounts).
  - Bounded queries in `PropFirmsService::dashboardSummary` (`limit(100)` on accounts).
- **Certification Test Suite (`tests/unit/PropFirms/PropFirmsDomainTest.php`):**
  - 9 comprehensive unit tests (66 assertions) covering:
    - `PropFirmDefaultsSeeder`: Idempotent seeding of Apex and Topstep firms and default rule sets.
    - `ApexRuleEngine`: Drawdown calculation, DLL, stop-loss requirements, and max contract enforcement.
    - `TopstepRuleEngine`: Real-time trailing drawdown, DLL, and profit consistency cap warnings.
    - `PropFirmEngine`: Registry resolution, snapshot persistence to `bf_prop_equity_history`, allowed symbol gating, and graceful error handling.
    - `PropFirmsService`: Multi-account dashboard summary aggregation and strict user isolation.
    - `AccountsController`: Comprehensive IDOR protection against cross-user reads and mutations.
    - `NotificationsController`: IDOR protection against cross-user notification marking.
    - `TradovateController`: IDOR protection against cross-user broker sync/connect.
    - `PropFirmsController`: Seed defaults role authorization check.

## Test Verification
- Unit Test: `vendor/bin/phpunit tests/unit/PropFirms/PropFirmsDomainTest.php` (9 tests, 66 assertions PASS).
- Full Unit Suite: `vendor/bin/phpunit --testsuite unit` (582 tests, 2980 assertions PASS).
- Form Certification Smoke: `bash tests/smoke/form-certification-smoke.sh` (293 PASS, 22 FAIL - Ratchet Preserved).
- Route Handler Gaps: `php spark routes:verify-handlers` (0 new gaps, 0 fixed in baseline).
- API Filter Coverage: `php spark api:filters-check` (No CRITICAL filter gaps).
- Rate-Limit Coverage: `php spark api:rate-limit-check` (Rate-limit coverage passed).

## Risks & Rollback
- Risk: Low. Additive IDOR defenses, role authorization checks, bounded queries, and unit tests.
- Rollback: Revert PR commit on `main`.
