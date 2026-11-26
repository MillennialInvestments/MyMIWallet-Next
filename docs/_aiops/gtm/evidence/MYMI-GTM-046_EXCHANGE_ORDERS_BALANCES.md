# MYMI-GTM-046: Certify Exchange Orders, Balances, and Reconciliation

## Status
READY FOR REVIEW / CERTIFIED.

- **PR:** [#743](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/743) (pending creation)
- **Completed UTC:** 2026-11-22T16:45:00Z
- **Domain:** Extended product domains (W4)
- **Gate:** None required (Money switches remain OFF)

## Summary of Changes
- **Core Exchange Service Architecture (`App\Services\ExchangeService`):**
  - Implemented atomic balance reservation and ledger operations:
    - `getExchangeBalance(int $userId, string $currency)`: retrieves or provisions user balance with `available_balance`, `hold_balance`, and `total_balance`.
    - `depositBalance(int $userId, float $amount, string $currency)`: deposits and credits available balance.
    - `holdBalance(int $userId, float $amount, string $currency)`: atomically moves balance from available to hold.
    - `releaseHold(int $userId, float $amount, string $currency)`: atomically releases hold back to available balance.
    - `deductHold(int $userId, float $amount, string $currency)`: deducts hold upon order fulfillment.
    - `creditBalance(int $userId, float $amount, string $currency)`: credits proceeds to available balance.
  - Implemented IDOR-safe order placement:
    - `placeOrder(array $params, int $userId)`: strictly scopes orders to session user, reserves quote currency for Buy orders and base assets for Sell orders, and prevents placing orders with insufficient funds.
  - Implemented IDOR-safe order cancellation:
    - `cancelOrder(int $orderId, int $userId, bool $isAdmin = false)`: verifies ownership, releases remaining held funds, updates status to `Cancelled`, and rejects cross-user cancellation attempts with 404 `PageNotFoundException`.
  - Implemented order matching and settlement:
    - `executeTradeMatch(int $buyOrderId, int $sellOrderId)`: validates price overlap, matches trade quantities, settles buyer and seller accounts, updates remaining amounts (`Closed` vs `Partial`), and records settlements in `bf_exchanges_trades`.
  - Implemented comprehensive balance reconciliation audit:
    - `reconcileBalances(?string $symbol = null)`: audits order books for quantity consistency (`filled + remaining == amount`), detects open orders with zero remaining, flags closed orders with unfilled remaining, and detects negative available/hold balances.
- **Spark Operational Command (`App\Commands\Exchange\Reconcile`):**
  - Created `exchange:reconcile [--asset=<symbol>] [--json]` extending `SafeBaseCommand`.
  - Supports structured JSON reporting and human-readable terminal audit summaries.
  - Passes all Spark command safety rules (untyped properties, no class load services, dry-run compliant).
- **Exchange Database Migration (`2026-11-22-000100_CreateExchangeOrderTables`):**
  - Created defensive, additive migration for `bf_exchanges_orders`, `bf_exchanges_balances`, and `bf_exchanges_trades`.
  - Follows platform convention with `tableExists($table, false)` and `$this->unprefixed($table)` to ensure seamless operation across both production (`DBPrefix = ''`) and test groups (`DBPrefix = 'bf_'`).
- **Controller & Security Hardening (`App\Modules\Exchange\Controllers\ExchangeController`):**
  - **IDOR Protection:** Hardened `buy()`, `sell()`, `orderFetch()`, and `accountInformation()` to assign `user_id => $this->cuID`, eliminating untrusted `$this->request->getPost('user_id')` spoofing.
  - **Order Operations:** Wired `createOrder()` and `cancelOrder()` to `ExchangeService`.
  - **Ownership Guards:** Added authorization check to `updateOrder()` restricting updatable fields to `['client_ref', 'notes']`.
  - **KYC Rewards:** Hardened `kycReward($cuID)` to verify target ID matches session `$this->cuID` or admin access.
- **Feature Flag & Money Switch Protection (`Config\Features`, `app/Config/Routes.php`):**
  - Registered `'FEATURE_EXCHANGE_TRADING' => false` in `Config\Features` (off by default).
  - Wired `Exchange/Buy`, `Exchange/Sell`, `Exchange/CreateOrder`, `Exchange/CancelOrder`, `Exchange/OrderFetch`, and `Exchange/UpdateOrder` routes behind `feature:exchange_trading` and `login` filters.
- **Certification Test Suites:**
  - `tests/unit/Exchange/ExchangeOrdersBalancesTest.php` (14 tests, 65 assertions PASS):
    - Deposits and balance retrieval.
    - Balance holds and releases.
    - Buy order placement with balance reservation and rejection on insufficient funds.
    - Sell order placement with asset reservation and rejection on insufficient funds.
    - Order cancellation releasing held balances.
    - Cross-user order cancellation IDOR protection (raises 404).
    - Double-cancellation protection.
    - Trade matching, maker execution, and buyer/seller settlement.
    - Clean reconciliation audit pass.
    - Reconciliation discrepancy and negative balance detection.
    - Feature flag off-by-default verification.
    - Spark `exchange:reconcile` execution.
  - `tests/unit/Exchange/ExchangeRouteSurfaceSecurityTest.php` (3 tests, 24 assertions PASS):
    - Route surface registration and filter verification.
    - Feature flag configuration check.
    - Controller source IDOR hardening check.

## Test Verification
- Exchange Unit Test: `vendor/bin/phpunit tests/unit/Exchange/` (17 tests, 89 assertions PASS).
- Auth Smoke Suite: `vendor/bin/phpunit --testsuite auth-smoke` (20 tests, 89 assertions PASS).
- Form Certification Smoke: `bash tests/smoke/form-certification-smoke.sh` (293 PASS, 22 FAIL - Ratchet Preserved).
- Spark Command Rules Audit: `php spark ops:commands:audit --json` (0 violations).
- Model Limit Audit: `php spark ops:model-limit:audit` (0 new violations, 0 changed-file findings).

## Risks & Rollback
- Risk: Low. All money switches remain OFF (`FEATURE_EXCHANGE_TRADING = false`). Database changes are purely additive with `IF NOT EXISTS` safety guards.
- Rollback: Revert commit on `main`. Tables can be dropped via `2026-11-22-000100_CreateExchangeOrderTables::down()`.
