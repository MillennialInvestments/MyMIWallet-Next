# Budget System Health Tests

✅ Health Test: `php spark budget:health-forecast`
Priority: P0
Feature: Add income + forecast generation
Primary Entry Point(s):
- `app/Modules/User/Controllers/BudgetController.php::add()`
- `app/Services/BudgetService.php::forecastBasedOnTrends()`
- `app/Models/BudgetModel.php::buildForecast()`
Dependencies:
- DB: `bf_users_budgeting`
What it should verify (checklist):
- Step 1: Insert budget income record for test user.
- Step 2: Run 12-month forecast and validate totals.
What it should log: user_id, record_id, forecast rows.
Failure modes to detect: insert failures, empty forecast arrays.
Where to implement: `app/Commands/BudgetForecastHealth.php` (new).
Suggested command name: `budget:health-forecast`
Expected log file: `writable/logs/health_budget.log`

✅ Health Test: `php spark budget:health-repayment`
Priority: P0
Feature: Credit/debt repayment calculations
Primary Entry Point(s):
- `app/Services/BudgetService.php::calculateRepaymentSchedules()`
- `app/Services/BudgetService.php::buildRepaymentSnapshot()`
Dependencies:
- DB: `bf_users_budgeting`
What it should verify (checklist):
- Step 1: Load credit/debt accounts.
- Step 2: Compute repayment schedule and validate output.
What it should log: account count, schedule totals.
Failure modes to detect: null schedule, invalid numeric values.
Where to implement: `app/Commands/BudgetRepaymentHealth.php` (new).
Suggested command name: `budget:health-repayment`
Expected log file: `writable/logs/health_budget.log`

✅ Health Test: `php spark budget:health-recurring`
Priority: P1
Feature: Recurring schedules + projection
Primary Entry Point(s):
- `app/Modules/User/Controllers/BudgetController.php::recurringSchedule()`
- `app/Services/BudgetService.php::forecastRecurringSchedule()`
Dependencies:
- DB: `bf_users_budgeting`
What it should verify (checklist):
- Step 1: Load recurring account.
- Step 2: Generate 12-month schedule with correct date ordering.
What it should log: account_id, schedule_count.
Failure modes to detect: invalid dates, missing recurring config.
Where to implement: `app/Commands/BudgetRecurringHealth.php` (new).
Suggested command name: `budget:health-recurring`
Expected log file: `writable/logs/health_budget.log`

✅ Health Test: `php spark budget:health-dashboard-api`
Priority: P0
Feature: Budget dashboard API endpoints
Primary Entry Point(s):
- `app/Modules/APIs/Controllers/BudgetController.php::apiBudgetData()`
- `app/Modules/APIs/Controllers/BudgetController.php::apiAvailableData()`
- `app/Modules/APIs/Controllers/BudgetController.php::apiCreditData()`
- `app/Modules/APIs/Controllers/BudgetController.php::apiRepaymentSummary()`
Dependencies:
- DB: `bf_users_budgeting`
- Cache: CodeIgniter cache service
What it should verify (checklist):
- Step 1: Call each API handler.
- Step 2: Validate response payload keys.
- Step 3: Confirm cache status flag.
What it should log: endpoint name, status, fromCache.
Failure modes to detect: auth guard failure, empty response payload.
Where to implement: `app/Commands/BudgetApiHealth.php` (new).
Suggested command name: `budget:health-dashboard-api`
Expected log file: `writable/logs/health_budget.log`
