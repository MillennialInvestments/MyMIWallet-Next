# MyMI Budgeting Architecture — Initial Bank Balance

## Components
- MyMIBudget Library
- BudgetService (App\Modules\User\Services\BudgetService)
- BudgetModel   (App\Modules\User\Models\BudgetModel)
- BudgetController (App\Modules\User\Controllers\BudgetController)
- Views: app/Modules/User/Views/Budget/index/*.php

## Data Source
- Bank Accounts: bf_users_bank_accounts (id, user_id, opening_balance, status, created_at, ...)
- Bank Transactions: bf_users_bank_transactions (id, user_id, account_id, amount, status, posted_at, ...)

## Definition: “Initial Bank Account Balance” (as-of date D)
For each active bank account owned by the user:
   opening_balance
 + SUM(all posted transactions with DATE(posted_at) <= D)
 = balance_as_of_D

If multiple accounts are displayed together, the page’s “Initial Bank Balance” is the sum across accounts.

## Exclusions
- Transactions with status != 'posted' (exclude 'pending', 'scheduled', etc.)
- Transactions with posted_at > D (future-dated)
- Accounts not owned by the user or with status != 'active'

## Flow
1. Controller determines context (userId, asOf, accountId).
2. Controller calls BudgetService::getInitialBankBalance(userId, asOf, accountId)
3. Service delegates to BudgetModel::getInitialBankBalance(...) with caching and error logging.
4. Controller injects 'initialBankBalance' into $this->data and renders index view.
5. Views (browser_table.php, mobile_table.php) DISPLAY ONLY; no SQL/logic.

## Formatting
- Use app-wide currency helper or `number_format($value, 2)` as a fallback.
- Always show the as-of date next to the number for clarity.

## Testing / Verification
- Compare JSON from /API/User/Budget/debugInitialBalance?asOf=YYYY-MM-DD against SQL sums.
- Add seed data covering: multiple accounts, pending vs posted, future vs past, zero-opening accounts.
- Ensure America/Chicago timezone normalization before date filters.
