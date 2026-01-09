# Budget + Investments Quick Setup

## Goal
Detect missing budget/investment setup and collect required data through onboarding endpoints.

## Detection + completion logic
- **Service:** `app/Services/OnboardingProgressService.php`
- Computes completion status from real tables plus `steps_json` in `bf_user_onboarding`.
- Checks:
  - Budget income entries in `bf_users_budgeting`.
  - Credit/debt in `bf_users_credit_accounts` and `bf_users_debt_accounts`.
  - Recurring expenses in `bf_users_budgeting` with `recurring_account = Yes`.
  - Watchlist entries in `bf_users_watchlist`.

## API endpoints
All endpoints live under the authenticated Dashboard group.

| Endpoint | Controller | Purpose |
| --- | --- | --- |
| `POST /Dashboard/onboarding/budget-income` | `OnboardingWalkthroughController::saveBudgetIncome()` | Save monthly income into `bf_users_budgeting`. |
| `POST /Dashboard/onboarding/credit-debt` | `OnboardingWalkthroughController::saveCreditDebt()` | Save credit/debt balances into credit/debt tables. |
| `POST /Dashboard/onboarding/recurring-expense` | `OnboardingWalkthroughController::saveRecurringExpense()` | Save one recurring expense into `bf_users_budgeting`. |
| `POST /Dashboard/onboarding/watchlist` | `OnboardingWalkthroughController::saveWatchlist()` | Add starter watchlist symbol. |

## Data persistence
- **Budget entries:** Inserts are filtered to existing table columns and flagged with `mode = Onboarding`.
- **Credit/Debt:** Uses `bf_users_credit_accounts` and `bf_users_debt_accounts` with default placeholders.
- **Watchlist:** Inserts `symbol`, `user_id`, and optional `list_type` if available.

## Code placement notes
- Endpoints reside in `app/Modules/User/Controllers/OnboardingWalkthroughController.php`.
- Route definitions are in `app/Config/Routes.php` under the `Dashboard` group.
- The modal UI for these steps lives in `app/Modules/User/Views/Dashboard/modals/onboarding.php`.

## Logging
Each endpoint logs:
- Validation warnings (missing amounts/symbols).
- Save success events per user.
- Table inspection errors (if schema mismatches occur).
