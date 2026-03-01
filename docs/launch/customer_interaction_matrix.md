# Customer Interaction Surface Audit

## Scope & Filtering
- Source of truth: `app/Config/Routes.php`.
- Included: end-user routes mapped to Authentication, Budgeting, Investments, Wallets, Predictions, Alerts, Onboarding, and Profile/Account.
- Excluded: admin (`/Management`, `/Admin`), debug (`/Debug`, `/debug`), cron/ops (`/ops`, `/API/Ops`, scheduler-like routes), and backend API-only surfaces.
- Notes:
  - Many routes are `match(['GET','POST'], ...)`; these are treated as form-capable (`POST` supported).
  - Some route targets are missing controllers/methods in-repo (flagged below).

---

## 1) Authentication

| Route | Controller::method | Form submit (POST/PUT) | Models used | DB tables written | Validation rules | Error handling notes |
|---|---|---:|---|---|---|---|
| `/login` (GET) | `AuthController::login` | No | N/A | None | None | View render path. |
| `/login` (POST) | `AuthController::attemptLogin` | Yes | `UserModel` (auth provider path), `ipHistoryModel` | Indirect auth persistence/logs | `login: required(+valid_email when configured)`, `password: required` | Has `try/catch` around `$this->auth->attempt(...)`; validation failures redirect with errors (non-200 semantic via redirect). |
| `/logout` (GET/POST) | `AuthController::logout` | Yes (POST route exists) | auth service | session/auth state | None | Standard logout handling. |
| `/register`, `/register/(:segment)`, `/:any/register`, `/:any/register/:segment` (GET) | `AuthController::register` | No | N/A | None | None | View render path. |
| `/register`, `/:any/register`, `/:any/register/:segment` (POST) | `AuthController::attemptRegister` | Yes | `UserModel`, `ipHistoryModel` | `users` (+ auth tables via Myth/Auth models) | Basic: username/email rules (`registrationRules` fallback shown), then password rules: `password required|strong_password`, `pass_confirm required|matches[password]` | Wrapped in `try/catch`; redirects with validation errors. |
| `/register/resend-activation` (POST) | `AuthController::resendRegistrationActivation` | Yes | `UserModel` | none/indirect mail workflow | No explicit `$this->validate(...)` in method | No explicit `try/catch` observed in method. |
| `/activate`, `/activate-account` (GET/POST), `/activate-account/:segment` (POST) | `AuthController::activateAccount` | Yes | `UserModel` | `users` (`active`, activation fields) | No formal validation rules; token checked manually | No explicit `try/catch`; throttling + guard branches present. |
| `/resend-activate-account` (GET) | `AuthController::resendActivateAccount` | No | `UserModel` | None | No formal validation | No explicit `try/catch`; throttling + safe responses. |
| `/resend-activation` (GET), `/resend-activation` and `/auth/resend-activation` (POST) | `AuthController::resendActivation`, `resendActivationCode` | Yes | `UserModel` | None | No formal validation; manual email empty check | No `try/catch` in resend code path. |
| `/forgot-password` (GET), `/forgot` (POST) | `AuthController::forgotPassword`, `attemptForgot` | Yes | `UserModel`, `ipHistoryModel` | `users` (reset hash fields) | `email: required|valid_email` | Validation + branch guards; no `try/catch`. |
| `/reset-password` (GET/POST) | `AuthController::resetPassword`, `attemptReset` | Yes | `UserModel`, `ipHistoryModel` | `users` (password/reset fields) | `token required`, `email required|valid_email`, `password required|strong_password`, `pass_confirm required|matches[password]` | Validation + branch guards; no explicit `try/catch`. |
| `/Auth/link-robinhood`, `/Auth/link-snaptrade` (POST) | `AuthController::linkRobinhood`, `linkSnapTrade` | Yes | **Method not found in inspected controller file** | Unknown | Unknown | Route target appears unresolved in repo snapshot. |
| `/auth/provider/:segment`, `/auth/provider/:segment/callback`, `/auth/link/:segment`, `/auth/unlink/:segment` (GET) | `AuthController::redirectToProvider`, `handleProviderCallback`, `linkProvider`, `unlinkProvider` | No | **Methods not found in inspected controller file** | Unknown | Unknown | Route targets appear unresolved in repo snapshot. |

---

## 2) Onboarding

| Route | Controller::method | Form submit | Models used | DB tables written | Validation rules | Error handling notes |
|---|---|---:|---|---|---|---|
| `/Dashboard/onboarding` (GET) | `DashboardController::onboarding` | No | `MyMIOnboarding` service | None | None | Standard render path. |
| `/Dashboard/checkOnboardingStatus` (GET) | `DashboardController::checkOnboardingStatus` | No | `MyMIOnboarding` service | None | None | JSON response. |
| `/Dashboard/completeOnboardingStep/:segment` (POST) | `DashboardController::completeOnboardingStep` | Yes | `MyMIOnboarding` service | onboarding progress table(s) via service | No formal validation | No explicit `try/catch`; redirect on unauthenticated. |
| `/Dashboard/setup/dismiss` (POST) | `DashboardController::dismissSetup` | Yes | `SetupStatusService` | dismiss preference table(s) via service | No formal validation (`scope` parsed manually) | No `try/catch`; explicit 401 JSON for unauthorized. |
| `/Dashboard/onboarding/progress` (GET) | `OnboardingWalkthroughController::progress` | No | `OnboardingProgressService` | None | Manual auth check only | Uses `respondError(...)` with proper HTTP statuses. |
| `/Dashboard/onboarding/profile` (POST) | `OnboardingWalkthroughController::saveProfile` | Yes | DB query builder (no model class) | `bf_user_profiles`, `bf_user_employment` | Manual checks: first/last required | No outer `try/catch` around inserts/updates; uses explicit 422/500 error responses. |
| `/Dashboard/onboarding/budget-income` (POST) | `OnboardingWalkthroughController::saveBudgetIncome` | Yes | DB query builder | `bf_users_budgeting` | Manual check: amount > 0 | No outer `try/catch`; explicit 422/500 responses. |
| `/Dashboard/onboarding/credit-debt` (POST) | `OnboardingWalkthroughController::saveCreditDebt` | Yes | DB query builder | `bf_users_credit_accounts`, `bf_users_debt_accounts` | Manual check: either credit or debt > 0 | No outer `try/catch`; explicit 422/500 responses. |
| `/Dashboard/onboarding/recurring-expense` (POST) | `OnboardingWalkthroughController::saveRecurringExpense` | Yes | DB query builder | `bf_users_budgeting` | Manual check: amount > 0 | No outer `try/catch`; explicit 422/500 responses. |
| `/Dashboard/onboarding/watchlist` (POST) | `OnboardingWalkthroughController::saveWatchlist` | Yes | DB query builder | `bf_users_watchlist` | Manual check: symbol required | No outer `try/catch`; explicit 422/500 responses. |

---

## 3) Profile / Account

| Route | Controller::method | Form submit | Models used | DB tables written | Validation rules | Error handling notes |
|---|---|---:|---|---|---|---|
| `/Profile`, `/Profile/:segment` (GET) | `DashboardController::profile` | No | account/profile services loaded by controller | Read-only in inspected path | None | Render path. |
| `/Account` + subpages (`Activity`, `Billing`, `Connected-Accounts`, `Notifications`, `Security`, `Social-Media`) (GET) | `DashboardController::*` | No | account/profile services | None in these methods | None | Render paths. |
| `/Accounts/createLinkToken` (GET) | `AccountController::createLinkToken` | No | `plaidModel`/Plaid service path | None | No formal validation | No explicit `try/catch` in method. |
| `/Support/Account` (GET), `/Support/resendActivation` (POST) | `AccountSupportController::index`, `resendActivation` | Yes (POST resend) | support/auth services | none/indirect mail workflow | No formal validation in resend method | No explicit `try/catch` in resend method. |

---

## 4) Alerts

| Route | Controller::method | Form submit | Models used | DB tables written | Validation rules | Error handling notes |
|---|---|---:|---|---|---|---|
| `/Alerts/Preview/:segment` and `/Preview/Alert/:segment` (GET) | `AlertsController::preview` | No | `AlertsModel`, `MyMIAlerts` service | None | Manual check: symbol required | No explicit `try/catch`; guarded branches/redirects. |
| `/Alerts` (GET/POST via `match`) | `AlertsController::index` | Yes-capable | `AlertsModel`, `BudgetModel`, `MyMIAlerts`, `MyMIBudget` | Writes forecast entry via `BudgetModel->updateForecastEntry(...)` | No formal validation | **DB write present without surrounding try/catch in this method** (other non-write reads are guarded). |
| `/Alerts/Trades` (GET/POST via `match`) | `AlertsController::trades` | Yes-capable | `AlertsModel`, `MyMIAlerts` | None | None | Auth guard + render. |

---

## 5) Budgeting

| Route group | Controller::method(s) | Form submit | Models used | DB tables written | Validation rules | Error handling notes |
|---|---|---:|---|---|---|---|
| `/Budget`, `/Budget/Search/:any`, month/forecast/history/settings/status routes | `BudgetController::*` | Mixed (`match` routes accept POST) | `budgetModel`, `budgetService` | Primarily budgeting and debt account tables via model/service | Mostly manual checks; limited centralized validator usage in inspected methods | `accountManager()` has robust `try/catch` + 422 JSON error responses; many other methods are render/flow wrappers with minimal explicit validation. |
| `/Budget/Account-Manager` (GET/POST) | `BudgetController::accountManager` | Yes | `budgetModel`, `budgetService` | Budget records + debt account upserts (via model/service) | Manual payload checks (AJAX required, payload present, user match) | Has `try/catch` (`UnexpectedValueException`, `Throwable`) and returns non-200 on failure. |
| `/Budget/Add`, `/Budget/Edit`, `/Budget/Delete-Account`, `/Budget/Approve-Recurring-Schedule`, `/Budget/Status/*` | `BudgetController::{add,edit,deleteAccount,approveRecurringSchedule,paid,unpaid,...}` | Yes-capable | budget/domain services | Varies by method (many route aliases into `accountManager` or service paths) | No formal CI validation rules observed in these route handlers | Error handling uneven; many paths rely on redirects/service outcomes. |

---

## 6) Investments

| Route | Controller::method | Form submit | Models used | DB tables written | Validation rules | Error handling notes |
|---|---|---:|---|---|---|---|
| `/Trade-Tracker` (GET) | `InvestmentsController::tradeTracker` | No | investment service/model for view data | None | None | Render path. |
| `/Trade-Tracker/getTradeData` (GET) | `InvestmentsController::getTradeData` | No | `investmentModel` | None | None | JSON response; logs JSON decode anomalies. |
| `/Trade-Tracker/saveTradeData` (POST) | `InvestmentsController::saveTradeData` | Yes | `investmentModel` | trade/investment records via `addTrade` / `updateTrade` | Manual checks (JSON valid, `trade` payload exists) | No explicit `try/catch`; returns 400/500 via `fail(...)` on errors. |
| `/Investments` + `/My-Investments` + `/My-Trades` | `InvestmentsController::index` | Yes-capable (`match`) | investment services/models | None in index | None | Render path. |
| `/Investments/Account-Manager` (POST) | `InvestmentsController::accountManager` | Yes | `investmentModel` | watchlist/trade writes via model calls | Manual JSON checks and custom `validateTradeInput(...)` path | Has `try/catch(Exception)` and non-200 on failures. |
| `/Investments/Add`, `/Investments/Save`, `/Investments/Autosave` | `InvestmentsController::{add,save,...}` | Yes-capable | `investmentModel` | inserts via `saveInvestmentData(...)` and related model methods | No formal `$this->validate(...)` in `save` path | Error handling present through `respond/fail`; not universally wrapped in `try/catch`. |
| `/Investments/Watchlist` (match) + add-watchlist internal handler | `InvestmentsController::watchlist` / `addWatchlist` | Yes-capable | `watchlistModel` | watchlist table via model insert | `addWatchlist` uses `$this->validate(...)` for symbol_name/asset_type/market/user_id | **Validation failure in `addWatchlist` returns JSON without explicit non-200 status (defaults to 200)**. |
| `/Investments/Strategies*`, `/Investments/Goals*` | `InvestmentController::*` | Yes (`POST/PUT/DELETE`) | **Controller not found in repository snapshot** | Unknown | Unknown | **Route targets unresolved**. |

---

## 7) Wallets

| Route group | Controller::method(s) | Form submit | Models used | DB tables written | Validation rules | Error handling notes |
|---|---|---:|---|---|---|---|
| `/Wallets` and extensive aliases (`All`, `Add*`, `Edit*`, `Deposit*`, `Withdraw*`, `Transfer-Funds`, `Purchase*`, `Link-Account*`, `Wallet-Transactions*`, etc.) | `WalletsController::*` | Yes-capable (`match` widely used) | `walletModel`, `walletsSvc`/wallet service, `transactionService`, `currencyService`, MyMIGold/purchase models | wallet, transaction, service-purchase tables via model/service (example: `add()` path writes wallet records; purchase flow writes purchase/service tables via service/model layer) | Very limited explicit CI validation in inspected methods; mostly manual parsing | Mixed handling: some methods (`deposit`, `withdraw`) wrap core logic in `try/catch`; many write-capable methods rely on service/model calls without route-level validation. |
| `/Wallets/Add*` | `WalletsController::add` | Yes-capable | wallet service/model | wallet table via `create()/insert()` | No active validator (validation block present but commented out) | Has no explicit `try/catch` in `add`; redirects on success. |
| `/Wallets/Deposit*` | `WalletsController::deposit` | Yes-capable | `transactionService`, wallet service | transaction + wallet balance updates via service layer | No formal validation | Has `try/catch(Exception)` around core flow. |
| `/Wallets/Withdraw*` | `WalletsController::withdraw` | Yes-capable | `transactionService`, wallet service | transaction + wallet balance updates via service layer | No formal validation | Has `try/catch(Exception)` around core flow. |
| `/Wallets/Purchase*` | `WalletsController::{purchase,purchaseComplete,purchaseMyMIGold,...}` | Yes-capable | wallet/membership/payment services/models | purchase and wallet transaction tables via service/model layer | No formal validation observed at route handlers | Error handling varies; several purchase paths do not show consistent try/catch wrappers in inspected segments. |

---

## 8) Predictions

| Route | Controller::method | Form submit | Models used | DB tables written | Validation rules | Error handling notes |
|---|---|---:|---|---|---|---|
| `/Predictions`, `/Predictions/Markets`, `/Predictions/Market/:num`, `/Predictions/Portfolio`, `/Predictions/Settlements` | `PredictionsController::*` | No | Predictions service (`service('mymipredictions')`) | None | None | `view()` has try/catch and 404 mapping. |
| `/Predictions/PlaceOrder` (POST) | `PredictionsController::placeOrder` | Yes | None in method | None in method | None | Currently redirects back; no order-processing logic in method. |
| `/Predictions/CancelOrder` (POST) | `PredictionsController::cancelOrder` | Yes | None in method | None in method | None | Currently redirects back; no cancellation logic in method. |

---

## Highlighted Findings

### A) Routes missing validation rules (server-side formal validation absent in handlers)
- Multiple auth auxiliary endpoints: `resendActivationCode`, `activateAccount`, `resendActivateAccount` (manual guards, no `$this->validate`).
- Most onboarding write endpoints use manual checks instead of centralized validator rules.
- Most wallets write-capable endpoints (`/Wallets/*` aliases) have no explicit `$this->validate(...)` at route handlers.
- Several budgeting and investments write paths rely on manual checks/service guards rather than declarative validation rules.

### B) Routes missing explicit error handling (no route-method-level try/catch)
- Onboarding write handlers (`saveProfile`, `saveBudgetIncome`, `saveCreditDebt`, `saveRecurringExpense`, `saveWatchlist`) perform DB writes without outer try/catch.
- `InvestmentsController::saveTradeData` writes via model calls without try/catch.
- Wallet add/purchase style handlers (various) are inconsistent; some methods catch exceptions, many do not.

### C) Routes writing to DB without try/catch
- `/Dashboard/onboarding/profile` (`bf_user_profiles`, `bf_user_employment`)
- `/Dashboard/onboarding/budget-income` (`bf_users_budgeting`)
- `/Dashboard/onboarding/credit-debt` (`bf_users_credit_accounts`, `bf_users_debt_accounts`)
- `/Dashboard/onboarding/recurring-expense` (`bf_users_budgeting`)
- `/Dashboard/onboarding/watchlist` (`bf_users_watchlist`)
- `/Alerts` (via `AlertsController::index` -> `BudgetModel->updateForecastEntry(...)`)
- `/Trade-Tracker/saveTradeData` (trade write via model)

### D) Routes returning 200 on validation failure
- `InvestmentsController::addWatchlist` returns `setJSON([...status=>'error'...])` on validation failure without setting non-200 status code.

### E) Route-to-controller integrity gaps
- Social provider auth routes map to methods not found in current `AuthController` snapshot (`redirectToProvider`, `handleProviderCallback`, `linkProvider`, `unlinkProvider`, `linkRobinhood`, `linkSnapTrade`).
- `/Investments/Strategies*` and `/Investments/Goals*` map to `InvestmentController` methods, but that controller file is not present in this repo snapshot.

---

## Appendix: High-Risk Endpoints (write-capable + broad surface)
- `/Wallets/*` `match(['GET','POST'], ...)` endpoints (very large interaction surface).
- `/Budget/Account-Manager`.
- `/Investments/Account-Manager`, `/Trade-Tracker/saveTradeData`.
- Onboarding POST endpoints under `/Dashboard/onboarding/*`.
