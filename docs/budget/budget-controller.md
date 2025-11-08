# Budget Controller Reference

_Last updated: 2025-09-27 02:15 UTC_

## Overview

`App\Modules\User\Controllers\BudgetController` renders the Budget Hub shell (`GET /Budget`) and exposes short-lived JSON
endpoints under `/API/Budget/*` for the dashboard widgets. Every handler enforces authenticated user context, clamps
responses to the session owner, and returns a consistent `{ status, data, fromCache, asOf }` envelope.

### Request Flow

```text
Browser (GET /Budget)
  ├─> BudgetController::index() ──> UserController::renderTheme()
  └─> fetch('/API/Budget/...')    ──> BudgetService aggregators + cache
```

### Data Providers

| Concern                | Source(s)                                                                                             |
|------------------------|-------------------------------------------------------------------------------------------------------|
| Period windowing       | `BudgetService::resolvePeriodWindow()`                                                                |
| Budget records         | `BudgetModel::getPeriodRecords()` filtered & classified in `BudgetService::computeLedgerSnapshot()`    |
| Credit & debt totals   | `AccountsModel::getUserCreditAccounts()`, `AccountsModel::getUserDebtAccounts()`, `BudgetModel::sumDebtMinimums()` |
| Bank / cash balances   | `AccountsModel::getUserBankAccounts()` (summed via `BudgetService::coerceCashEquivalents()`)           |
| Repayment math         | `BudgetService::buildRepaymentSnapshot()` (avalanche/snowball ordering, payoff estimates)              |
| Category variance      | `BudgetService::buildCategoryVariance()`                                                              |
| Legacy dashboard data  | `BudgetModel::getUserBudgetData()` and companion helpers (still exposed for backwards compatibility)   |

## Primary API Endpoints

All endpoints are guarded by the `login` filter and respond with `{ status: 'success'|'degraded'|'error', data, fromCache, asOf }`.

| Method | Path                    | Handler                        | Notes |
|--------|------------------------|--------------------------------|-------|
| GET    | `/API/Budget/summary`  | `BudgetController::summary()`  | Default month (America/Chicago). Optional `from=YYYY-MM-DD&to=YYYY-MM-DD`. Returns income/expense/net cards, savings rate, credit utilisation, available breakdown. |
| GET    | `/API/Budget/credit`   | `BudgetController::credit()`   | Per-card utilisation, aggregate limits/balances/minimums, weighted APR. |
| GET    | `/API/Budget/available`| `BudgetController::available()`| Returns the available cash formula inputs & clamped totals for the active period. |
| GET    | `/API/Budget/repayment`| `BudgetController::repayment()`| Optional `strategy=avalanche|snowball` (default avalanche). Includes next-payment queue, payoff estimates, aggregate balances. |
| GET    | `/API/Budget/categories`| `BudgetController::categories()`| Supports `from`, `to`, `page` (default 1), `perPage` (default 25, max 100). Provides paginated variance by category. |

### Example (`GET /API/Budget/summary`)

```json
{
  "status": "degraded",
  "data": {
    "period": {
      "from": "2025-09-01",
      "to": "2025-09-30",
      "timezone": "America/Chicago"
    },
    "cards": {
      "income": {"budgeted": 8200.0, "actual": 0, "variance": 8200.0},
      "expenses": {"budgeted": 6150.0, "actual": 0, "variance": 6150.0},
      "net": {"budgeted": 2050.0, "actual": 0, "variance": 2050.0},
      "available": {"raw": 850.0, "display": 850.0, "overAllocation": 0},
      "savingsRate": {"percent": 12.5, "reserved": 1025.0},
      "creditUtilization": {"totalLimit": 15000.0, "totalBalance": 4200.0, "totalAvailable": 10800.0, "utilizationPercent": 28.0, "minimumDue": 245.0, "weightedApr": 17.2}
    },
    "availableBreakdown": {
      "income": 8200.0,
      "fixedExpenses": 4200.0,
      "variableBudget": 1350.0,
      "minDebtPayments": 245.0,
      "adjustments": 0,
      "reservedSavings": 555.0
    },
    "flags": {
      "actualsAvailable": false,
      "notes": [
        "Actual transaction data unavailable; using budgeted amounts for variance.",
        "1 credit account(s) missing due dates; estimated using the 28th of the month."
      ]
    }
  },
  "fromCache": false,
  "asOf": "2025-09-27 02:15:00"
}
```

### Query Parameters & Validation

- `from` / `to`: Sanitised via `resolvePeriodWindow()`. Invalid values fall back to the current month and append a warning note.
- `strategy`: Only `avalanche` or `snowball` are accepted; anything else defaults to `avalanche`.
- `page` / `perPage`: Clamped to positive integers (perPage ≤ 100) before reaching the cache layer.

### Legacy Endpoints (still available under `/Budget/*`)

The previous JSON handlers (`getUserBudgetRecords`, `getUserCreditBalances`, `getUserAvailableBalances`, `getUserRepaymentSummary`) remain for older dashboards but are considered deprecated. New UI work should prefer the `/API/Budget/*` surface.

## Calculations & Formulas

- **Period Windowing:** Defaults to the current calendar month in `America/Chicago`. Custom `from`/`to` ranges are validated and swapped if `from > to`.
- **Available Cash:**
  `income_budgeted – fixed_expenses – variable_budget – min_debt_payments + adjustments – reserved_savings`
  returned alongside `raw`, `display` (never below 0), and `overAllocation` deltas.
- **Savings Rate:** `reserved_savings / income_budgeted`, rounded to two decimals.
- **Credit Utilisation:** Per-card and aggregate calculations include limits, balances, minimums, and weighted APR. Missing due dates fall back to the 28th of the current month and set `dueDateEstimated = true`.
- **Repayment Forecast:** Each account receives avalanche/snowball ordering, minimum-payment validation, estimated payoff months (`log`-based amortisation), and payoff date projections. Accounts with insufficient minimums generate degraded notes.
- **Category Variance:** Budget records are grouped by `source_type` (fallback `account_type`), paginated server-side, and exposed with budgeted totals, placeholder actuals (until transaction ingest arrives), and variance.
- **Actuals Placeholder:** Plaid / linked-account reconciliation is stubbed; until wired up, responses flag `actualsAvailable = false` and mark the payload as `degraded`.

## Caching & Performance

- Cache keys follow `budget:<segment>:<userId>[:md5(context)]` with a 60-second TTL.
- Segments tracked: `budget-records`, `available-balances`, `credit-balances`, `repayment-summary`, `api-summary`, `api-credit`, `api-available`, `api-repayment`, `api-categories`.
- Each response exposes `fromCache` for telemetry; hits are logged via `$this->cacheHits` for observability hooks.

## Error Handling & Observability

- Unauthorized access short-circuits with HTTP 401 (`respondUnauthorized`).
- All exceptions bubble through `logException()` with `{ controller, action, userId, period_from, period_to, memory_usage, error_hash }` context.
- External data gaps (missing due dates, absent actuals, insufficient minimums) push the endpoint into `status: 'degraded'` but still return structured data for the UI to render empty/error states.
- Security-sensitive issues (payload/user mismatches) log warnings via `logSecurityEvent()` and return 403.

## Admin / Developer Workflows

### Adding a New Category or Debt Account Type

1. Update the relevant database tables/models (`BudgetModel`, debt/credit tables) to accept the new type.
2. Extend `BudgetService::computeLedgerSnapshot()` classification helpers if the new type should count as savings/adjustments.
3. Ensure repayment helpers (`buildRepaymentSnapshot`) understand the new account fields (balances, minimums, APR).
4. Update any forms/validators that whitelist account types.
5. Surface the new category in the dashboard UI tabs/cards.
6. Add test coverage for summary, available, and variance outputs touching the new type.
7. Document the change here for support teams.

### Troubleshooting Checklist

- **401 responses:** Session likely missing `cuID`; prompt the user to log back in.
- **Unexpected `status: degraded`:** Check application logs for warnings emitted by `logException()` or `logSecurityEvent()`.
- **Stale figures:** Verify cache expiry; keys are namespaced `budget:<segment>:<userId>`.
- **Repayment math seems off:** Confirm `monthly_payment` / `payment_due` values exist; zero/insufficient payments generate degraded notes.

## Known Limitations / Next Steps

- Actual transaction reconciliation (Plaid, wallet sync) is not yet wired; once available, populate `extractActuals()` for precise variance reporting.
- Category variance currently treats all entries as budgeted amounts; hook real actuals once ingest is live.
- Consider exporting the repayment queue and available breakdown as Prometheus metrics for deeper observability.
- UI still relies on legacy endpoints in a few places; plan a clean-up pass once the dashboard consumes only `/API/Budget/*` routes.