# Functional Hardening Execution Queue

## Purpose
This queue converts the Customer Interaction Surface Audit into an execution-ordered hardening plan focused on financial mutation safety, validation consistency, exception handling, and route integrity for launch readiness.

---

## PHASE 1 – Wallet Financial Mutation Hardening
**Risk:** **CRITICAL**

### Controller methods involved (exact)
- `App\Modules\User\Controllers\WalletsController::add`
- `App\Modules\User\Controllers\WalletsController::deposit`
- `App\Modules\User\Controllers\WalletsController::withdraw`
- `App\Modules\User\Controllers\WalletsController::transferFunds`
- `App\Modules\User\Controllers\WalletsController::purchase`
- `App\Modules\User\Controllers\WalletsController::purchaseComplete`
- `App\Modules\User\Controllers\WalletsController::purchaseMyMIGold`
- `App\Modules\User\Controllers\WalletsController::confirmDeposit`
- `App\Modules\User\Controllers\WalletsController::depositComplete`
- `App\Modules\User\Controllers\WalletsController::handleMyMIGPayPalCallback`
- `App\Modules\User\Controllers\WalletsController::linkAccount`
- `App\Modules\User\Controllers\WalletsController::walletTransaction`

### DB tables affected
- Direct/known from controller + prior audit:
  - Wallet storage table(s) through `walletModel->insert(...)` and wallet service create paths (wallet table family).
  - Transaction table(s) via `transactionService->logTransaction(...)`/completion flows (transaction table family).
- Additional tables inferred via purchase/service flows in existing code/audit:
  - `bf_users_services`
  - `bf_users_services_purchases`
  - `bf_users_wallet_transactions`

### Validation gaps
- Most mutation endpoints rely on raw `POST` values (`amount`, `wallet_id`, `currency`, purchase payloads) without declarative CI4 validation rules.
- Validation block for wallet creation is present but commented out in `add()` path (inactive guard).
- No consistent input-shape enforcement for payment callback and purchase-complete endpoints.

### try/catch gaps
- `deposit()` and `withdraw()` do include `try/catch`.
- Multiple other write-capable methods are not consistently wrapped at route-method level (`add`, parts of purchase/link flows), creating uneven exception behavior.

### Transactional integrity gaps
- Financial operations appear to be multi-step (log transaction → mutate balance → mark complete) and can partially succeed without guaranteed rollback if any internal step fails.
- Purchase/payment callback paths have high likelihood of cross-table updates without explicit transaction boundary at controller layer.

### Transaction wrapping recommendation
- **Required** for all money-movement and purchase settlement paths.
- Apply atomic transaction envelopes at service level for:
  - balance mutation + ledger row insertion,
  - purchase row + entitlement row + wallet transaction linkage,
  - callback idempotency + settlement updates.

### Execution unit order
1. Inventory each wallet mutation endpoint by method + service call chain.
2. Add explicit request validation contracts per endpoint.
3. Enforce atomic DB transaction boundaries in write services.
4. Standardize exception policy and non-200 error responses for mutation failures.
5. Add idempotency guardrails for payment callback/success endpoints.

---

## PHASE 2 – Onboarding Transactional Integrity
**Risk:** **HIGH**

### Controller methods involved (exact)
- `App\Modules\User\Controllers\OnboardingWalkthroughController::saveProfile`
- `App\Modules\User\Controllers\OnboardingWalkthroughController::saveBudgetIncome`
- `App\Modules\User\Controllers\OnboardingWalkthroughController::saveCreditDebt`
- `App\Modules\User\Controllers\OnboardingWalkthroughController::saveRecurringExpense`
- `App\Modules\User\Controllers\OnboardingWalkthroughController::saveWatchlist`
- `App\Modules\User\Controllers\DashboardController::completeOnboardingStep`
- `App\Modules\User\Controllers\DashboardController::dismissSetup`

### DB tables affected
- `bf_user_profiles`
- `bf_user_employment`
- `bf_users_budgeting`
- `bf_users_credit_accounts`
- `bf_users_debt_accounts`
- `bf_users_watchlist`
- Onboarding status/progress storage via service (`OnboardingProgressService`/`SetupStatusService` backing tables).

### Validation gaps
- Uses manual inline checks (e.g., required names, amount > 0, symbol non-empty) instead of centralized validation rule sets.
- Missing field-level constraints for formats/ranges (phone normalization, symbol charset/length, realistic financial bounds).

### try/catch gaps
- Core onboarding write methods perform direct query-builder inserts/updates without outer `try/catch` in the methods themselves.
- `respondError()` helper exists, but not all write operations are exception-enclosed.

### Transactional integrity gaps
- `saveProfile()` writes to two tables (`bf_user_profiles` + `bf_user_employment`) without atomic envelope.
- Step completion/event tracking is logically coupled to data writes; partial writes can desync step state.

### Transaction wrapping recommendation
- **Required** for multi-table writes (`saveProfile`, `saveCreditDebt`).
- **Recommended** for single-table write + step-marking/event operations where consistency with onboarding state matters.

### Execution unit order
1. Define validation schemas for each onboarding mutation endpoint.
2. Wrap multi-table writes in transactions.
3. Ensure step-complete marker updates are committed only after successful data mutation.
4. Standardize error payload/status codes for all onboarding API responses.

---

## PHASE 3 – Investments & Trade Write Integrity
**Risk:** **HIGH**

### Controller methods involved (exact)
- `App\Modules\User\Controllers\InvestmentsController::accountManager`
- `App\Modules\User\Controllers\InvestmentsController::save`
- `App\Modules\User\Controllers\InvestmentsController::saveInvestmentData`
- `App\Modules\User\Controllers\InvestmentsController::saveTradeData`
- `App\Modules\User\Controllers\InvestmentsController::addWatchlist`
- `App\Modules\User\Controllers\InvestmentsController::processInvestment`
- Route-targeted but unresolved in repository snapshot:
  - `App\Modules\User\Controllers\InvestmentController::createStrategy`
  - `App\Modules\User\Controllers\InvestmentController::updateStrategy`
  - `App\Modules\User\Controllers\InvestmentController::deleteGoal`
  - `App\Modules\User\Controllers\InvestmentController::createGoal`
  - `App\Modules\User\Controllers\InvestmentController::updateGoal`

### DB tables affected
- Trade/investment storage table family via `investmentModel->addTrade/updateTrade/insert/saveTrade`.
- Watchlist table family via `watchlistModel->insert(...)`.
- Strategy/goal tables are expected from routes but unresolved due to missing `InvestmentController` source in current snapshot.

### Validation gaps
- `saveTradeData()` uses manual shape checks only; lacks declarative field rules (numeric bounds, enum constraints).
- `save()`/`saveInvestmentData()` accept broad form payload without route-level validation contract.
- `addWatchlist()` validates but returns JSON error without explicit non-200 status on validation failure.

### try/catch gaps
- `accountManager()` has try/catch.
- `saveTradeData()` performs model writes without try/catch wrapper.
- Strategy/goal write routes cannot be validated for error handling due to missing controller file.

### Transactional integrity gaps
- Trade mutation can involve create/update + cache invalidation; failure sequencing may leave stale state.
- Potential multi-write operations in service/model layer are not guaranteed atomic from route perspective.

### Transaction wrapping recommendation
- **Required** for any multi-row or multi-table trade mutation workflows.
- **Recommended** for trade save/update + ancillary side effects (e.g., ledger/stat updates) to preserve consistency.

### Execution unit order
1. Normalize validation contracts for all trade/investment write endpoints.
2. Fix HTTP semantics (`422/400`) for validation failures, including `addWatchlist()`.
3. Add transaction envelopes for composite write flows.
4. Reconcile unresolved `InvestmentController` route targets before enabling further write hardening.

---

## PHASE 4 – Alerts Forecast Write Path
**Risk:** **MEDIUM**

### Controller methods involved (exact)
- `App\Modules\User\Controllers\AlertsController::index`
- `App\Modules\User\Controllers\AlertsController::trades`

### DB tables affected
- Forecast-related budgeting table(s) written through:
  - `BudgetModel->updateForecastEntry(...)` in `AlertsController::index`.

### Validation gaps
- No formal validation is needed for basic page render inputs, but write-side safeguards are implicit rather than explicit.
- No explicit precondition checks around forecast write payload composition before model update call.

### try/catch gaps
- `index()` performs forecast write without local try/catch around that write call.

### Transactional integrity gaps
- Forecast update is a write side effect inside a read-heavy route; failures may interrupt page request or silently desync forecast state.

### Transaction wrapping recommendation
- **Recommended** if forecast update expands to multi-table writes.
- For current apparent single-write path, enforce guarded exception handling at minimum.

### Execution unit order
1. Isolate forecast-write side effect from page render critical path.
2. Add explicit exception handling around forecast update.
3. Define safe fallback behavior if write fails (render page without blocking user flow).

---

## PHASE 5 – Auth Auxiliary Endpoints
**Risk:** **MEDIUM**

### Controller methods involved (exact)
- `App\Controllers\AuthController::resendRegistrationActivation`
- `App\Controllers\AuthController::activateAccount`
- `App\Controllers\AuthController::resendActivateAccount`
- `App\Controllers\AuthController::resendActivation`
- `App\Controllers\AuthController::resendActivationCode`
- `App\Controllers\AuthController::attemptForgot`
- `App\Controllers\AuthController::attemptReset`
- Route-targeted but unresolved in repository snapshot:
  - `App\Controllers\AuthController::linkRobinhood`
  - `App\Controllers\AuthController::linkSnapTrade`
  - `App\Controllers\AuthController::redirectToProvider`
  - `App\Controllers\AuthController::handleProviderCallback`
  - `App\Controllers\AuthController::linkProvider`
  - `App\Controllers\AuthController::unlinkProvider`

### DB tables affected
- `users` table (activation/reset fields, account state).
- Auth audit/reset attempt tables via Myth/Auth model/service paths.
- Provider-linking tables unknown until unresolved methods are restored/located.

### Validation gaps
- Several auxiliary endpoints use manual checks + throttling rather than declarative validation rules.
- Email/token payload constraints are partially enforced procedurally, not consistently by CI validation layer.

### try/catch gaps
- Multiple auxiliary methods lack explicit try/catch around mail/service calls and persistence operations.

### Transactional integrity gaps
- Most endpoints are single-record updates; transaction need is low unless expanded to linked writes/audit writes requiring atomicity.

### Transaction wrapping recommendation
- **Recommended selectively** for multi-write auth side effects (user state + audit/event writes where strict consistency is required).
- Not mandatory for simple single-row updates if robust exception handling + retry strategy exist.

### Execution unit order
1. Normalize validation rules across resend/activate/reset auxiliary endpoints.
2. Add exception-safe wrappers around external dependencies (mailer/provider integrations).
3. Standardize responses to avoid information disclosure while preserving operational observability.
4. Resolve/restore missing social/provider route targets.

---

## PHASE 6 – Route-to-Controller Integrity Fixes
**Risk:** **HIGH**

### Controller methods involved (exact unresolved targets)
- Auth unresolved targets:
  - `AuthController::linkRobinhood`
  - `AuthController::linkSnapTrade`
  - `AuthController::redirectToProvider`
  - `AuthController::handleProviderCallback`
  - `AuthController::linkProvider`
  - `AuthController::unlinkProvider`
- Investment unresolved targets:
  - `InvestmentController::getStrategies`
  - `InvestmentController::createStrategy`
  - `InvestmentController::getStrategy`
  - `InvestmentController::updateStrategy`
  - `InvestmentController::deleteGoal`
  - `InvestmentController::getGoals`
  - `InvestmentController::createGoal`
  - `InvestmentController::updateGoal`

### DB tables affected
- Unknown/unverifiable until route-target methods are restored or mapped to existing controllers.

### Validation gaps
- Cannot assess endpoint-level validation for unresolved methods.

### try/catch gaps
- Cannot assess endpoint-level exception handling for unresolved methods.

### Transactional integrity gaps
- Cannot assess transactional behavior where controller targets are missing.
- This is itself a launch blocker for hardening because control-path visibility is incomplete.

### Transaction wrapping recommendation
- **Deferred pending integrity restoration.**
- After routes are mapped to concrete implementations, evaluate each write endpoint for atomic transaction requirements.

### Execution unit order
1. Build definitive route-to-controller-method inventory from `Routes.php` and class existence checks.
2. Repair broken mappings (rename routes or restore missing methods/classes).
3. Re-run hardening audit only after routing integrity is green.

---

## Global Sequencing & Exit Criteria

### Recommended execution order
1. **Phase 1** (Wallet financial mutations)
2. **Phase 2** (Onboarding transactional integrity)
3. **Phase 3** (Investments/trade writes)
4. **Phase 4** (Alerts forecast side effect)
5. **Phase 5** (Auth auxiliary endpoints)
6. **Phase 6** (Route-to-controller integrity completion if not already done earlier as prerequisite)

### Completion criteria per phase
- Validation rules are explicit and testable for all write-capable endpoints in phase scope.
- Exception handling is deterministic (no fatal/uncaught write-path failures).
- Multi-step write operations are atomic via transaction boundaries where required.
- Endpoint response semantics correctly distinguish validation failure (`4xx`) from success (`2xx`).
- Route mappings resolve to concrete controller methods present in repository.

---

## Evidence Baseline (source files)
- `app/Config/Routes.php`
- `app/Controllers/AuthController.php`
- `app/Modules/User/Controllers/WalletsController.php`
- `app/Modules/User/Controllers/OnboardingWalkthroughController.php`
- `app/Modules/User/Controllers/DashboardController.php`
- `app/Modules/User/Controllers/InvestmentsController.php`
- `app/Modules/User/Controllers/AlertsController.php`
