# Controllers Audit

## Overview
Reviews major module controllers for routing coverage, shared loader usage, and JSON response compliance to keep HTTP interfaces reliable.

## Inventory (Auto-collected)
- Generated on: 2025-10-06 21:17 UTC
- Tooling: grep/awk/php spark/composer/git

## Status Table
| Area / Item | Current Status | Action Needed | Priority | Notes |
|---|---|---|---|---|
| DashboardController (User) | ❌ Broken/Unknown | Restore BaseLoader helpers and fix missing `getuserService()` accessor before deploy. | 🔴 Critical | `commonData()` calls undefined helper and references `$data` variable, leading to fatal errors. |
| BudgetController (User) | ⚙️ Needs Review | Add JSON response validation and limit logging noise in `commonData()`. | 🟠 High | Relies on BaseController state but logs large payloads; needs tighter guards. |
| InvestmentsController (APIs) | ❌ Broken/Unknown | Implement proper service getters and ensure JSON endpoints return `{status,data}` consistently. | 🔴 Critical | Calls `$this->getinvestmentService()` without definition and mixes `respond()`/`response->setJSON()`. |
| ManagementController (APIs) | ⚙️ Needs Review | Wrap cron workflow in transaction/log summary and enforce cron key audit logging. | 🟠 High | Depends on internal `MarketingController` instantiation and manual cron key checks. |
| MarketingController (API) | ⚙️ Needs Review | Ensure `MyMIMarketing` service injected and document cron endpoints with rate limits. | 🟠 High | Controller expects BaseController helper to resolve marketing library while performing network operations. |
| AlertsController (APIs) | ⚙️ Needs Review | Externalize webhook URLs and enforce schema validation on `addTradeAlert`. | 🟠 High | Placeholder Discord/Zapier hooks remain and EMA enrichment relies on service getters. |
| SupportController (Support module) | ⚙️ Needs Review | Add JSON failover for support articles and ensure route list matches published docs. | 🟡 Medium | Uses BaseLoader but only returns HTML views; needs error handling for missing articles. |

## Findings (Evidence)
- Dashboard controller relies on an undefined `getuserService()` helper and manipulates `$data` without declaration, so view rendering fails.【F:app/Modules/User/Controllers/DashboardController.php†L63-L150】
- Budget controller extends `UserController` and logs large datasets in `commonData()`, increasing risk of sensitive exposure.【F:app/Modules/User/Controllers/BudgetController.php†L82-L120】
- Investments API controller mixes manual JSON responses with `respond()` and references missing service getters, causing runtime exceptions.【F:app/Modules/APIs/Controllers/InvestmentsController.php†L55-L166】
- Management controller cron workflow instantiates Marketing controller directly and executes multiple cron tasks without queueing.【F:app/Modules/APIs/Controllers/ManagementController.php†L39-L126】
- Marketing API controller depends on `$this->MyMIMarketing` resolved via helper and runs content distribution routines with minimal error handling.【F:app/Modules/APIs/Controllers/MarketingController.php†L31-L148】
- Alerts controller handles trade alerts but still contains placeholder webhook URLs and manual EMA fetch logic.【F:app/Modules/APIs/Controllers/AlertsController.php†L63-L171】
- Support controller renders support views without JSON fallback, relying solely on BaseLoader defaults.【F:app/Modules/Support/Controllers/SupportController.php†L36-L47】
- Routes map multiple controller groups with duplicates, indicating need for systematic audit.【F:app/Config/Routes.php†L128-L200】

## Required Fixes / Tasks
- [ ] Build controller integration tests ensuring `{status,data|message}` schema for JSON endpoints (owner: Codex).
- [ ] Refactor Dashboard/Budget controllers to consume BaseController helpers instead of manual service calls (owner: Codex).
- [ ] Execute manual route verification per [routes-audit-playbook.md](../ops/runbooks/routes-audit-playbook.md) (owner: Teddy/manual).

## Links & References
- `app/Modules/User/Controllers/DashboardController.php`, `BudgetController.php`
- `app/Modules/APIs/Controllers/InvestmentsController.php`, `ManagementController.php`, `MarketingController.php`, `AlertsController.php`
- `app/Modules/Support/Controllers/SupportController.php`, `app/Config/Routes.php`
