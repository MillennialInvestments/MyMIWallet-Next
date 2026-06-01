# Solana Exchange Performance Hygiene Validation

Date: 2026-06-01
Branch requested: `fix/solana-exchange-performance-hygiene`
Branch available in this workspace: `work` (no `fix/solana-exchange-performance-hygiene` branch exists locally)

## Scope

Implemented Solana Exchange performance and production log hygiene only. No wallet-secret encryption/backfill behavior, mainnet minting, browser-submitted private key handling, auth, CSRF, login filters, permissions, Solana modal fallbacks, or `API/Solana/health` behavior was intentionally changed.

## Before Findings

- `SolanaController::commonData()` loaded broad dashboard and budget data for Solana-only pages, including repeated calls to `getMyMIUser()->getUserInformation()`, `getMyMISolana()->getUserSolana()`, `getMyMIDashboard()->dashboardInfo()`, and `getMyMIBudget()->allUserBudgetInfo()`.
- `SolanaController::index()`, `assets()`, `coinSwap()`, and `create()` called `commonData()` before `renderTheme()`, while `UserController::renderTheme()` also calls `commonData()`, creating duplicate hydration opportunities.
- Solana modal payload preparation used broad dashboard helpers for crypto account and token payloads, and always fetched transaction history for any Solana modal request.
- `BudgetService::setUserId()` emitted a service trace before checking whether the user ID had changed.
- `BudgetService::getUserBudget()` and common `BudgetModel` budget-record methods had no per-request memoization.
- Production DEBUG noise existed for CSRF token traces, observed model `MODEL_WHERE` traces, BudgetService service traces, and Solana RPC payload traces.

## Changes Validated

- `SolanaController` now builds a Solana-only page payload that avoids broad dashboard/budget hydration and uses per-request caches for user account, default Solana wallet/profile, top listed tokens, price, and network status.
- Solana page actions no longer explicitly call `commonData()` before `renderTheme()`, avoiding duplicate page hydration.
- `DashboardController` now builds Solana modal payloads through a Solana-specific builder. Transaction history is deferred to wallet/view modals only, while swap modals load only token data needed for swap UI.
- `BudgetService::setUserId()` now returns before tracing when the same user ID is set repeatedly, and resets per-request budget cache only when the user changes.
- `BudgetService`, `BudgetModel`, `SolanaModel`, and `MyMISolana` include safe in-memory per-request memoization for repeated user budget, wallet/profile, token, summary, and address lookups.
- Production DEBUG log hygiene was added for CSRF debug traces, observed model traces including `MODEL_WHERE`, BudgetService service traces, and Solana RPC payload debug traces while preserving warning/error logs.

## Validation Commands

### PHP Syntax

Passed:

```bash
php -l app/Modules/Exchange/Controllers/SolanaController.php
php -l app/Modules/User/Controllers/DashboardController.php
php -l app/Services/BudgetService.php
php -l app/Models/BudgetModel.php
php -l app/Models/SolanaModel.php
php -l app/Models/ObservedModel.php
php -l app/Filters/CsrfDebugFilter.php
php -l app/Libraries/MyMISolana.php
php -l app/Services/SolanaService.php
git diff --check
```

### AIOps Analyzer

Requested commands were run, but the command fails in this workspace before analysis due to `AnalyzeCode::parseCommandOptions()` reading `$params[0]` when the params array is not zero-indexed. The logger also reports the local MySQL service is unavailable.

Failed with environment/tooling limitation:

```bash
php spark aiops:analyze:code --file app/Modules/Exchange/Controllers/SolanaController.php --no-ai
php spark aiops:analyze:code --file app/Modules/User/Controllers/DashboardController.php --no-ai
php spark aiops:analyze:code --file app/Services/BudgetService.php --no-ai
php spark aiops:analyze:code --path app/Modules/Exchange --ext php,js --max-files 50 --no-ai
```

Observed error excerpt:

```text
[MyMIDBLoggerHandler Fallback] Unable to connect to the database.
Main connection [MySQLi]: Connection refused
[ErrorException]
Undefined array key 0
at APPPATH/Commands/AnalyzeCode.php:112
```

A second attempt using `--file=...`, `--path=...`, and `--max-files=...` syntax failed with the same parser error.

### Wallet Secret Audit

Requested command was run, but this workspace does not register the command:

```bash
php spark solana:wallet-secrets:audit --limit 500
```

Observed error:

```text
Command "solana:wallet-secrets:audit" not found.
```

## Known Risks

- Solana Exchange pages now intentionally use zero-valued budget/dashboard fallbacks instead of broad budget/dashboard summaries. If any dashboard layout partial later requires real budget totals on Solana-only pages, that partial may need an explicit lightweight value added.
- Solana modal transaction history is now loaded only for wallet/view modals. If another Solana modal begins rendering transaction history, add that endpoint to the transaction-loading allowlist.
- Analyzer and wallet-secret audit validation could not complete in this workspace because of command/tooling availability issues noted above.

## Rollback Notes

- Revert this patch to restore prior broad Solana page hydration and DEBUG logging behavior.
- No database migrations or wallet-secret storage changes were made.
- No AIOps follow-up task files were queued under `docs/_aiops/tasks/` because implementation is complete; validation blockers are workspace command/tooling issues.
