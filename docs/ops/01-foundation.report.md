# Core Application Foundation — Repo Analysis Report

## Overview
Reviewed the CodeIgniter 4 foundation for MyMI Wallet, covering framework installation state, environment configuration, routing hygiene, loader traits, logging, and error handling. Focused on gaps that would block PHP 8.2 deployments, secure defaults, and production observability.

## Inventory (Auto-collected)
- Generated: 2025-10-07 01:20 UTC
- Commands:
  - `php -v`; `php spark --version || ./spark --version`; `composer show | head -n 50`
  - `ls -1 app/Config | sort`; `nl -ba app/Config/Routes.php | sed -n '1,200p'`; `nl -ba app/Config/Logger.php | sed -n '1,200p'`; `nl -ba app/Config/Toolbar.php | sed -n '1,200p'`
  - `grep -RIn "error_403|error_404|error_500|error_504" app`; `rg --no-heading -n -- 'SupportController|/Support' app`; `nl -ba app/Views/errors/html/error_404.php | sed -n '40,140p'`
  - `rg --no-heading -n -- 'trait\s\+BaseLoader|commonData\s*\(' app`; `nl -ba app/Libraries/BaseLoader.php | sed -n '1,220p'`
  - `grep -E '^(CI_ENVIRONMENT|app\.baseURL|database\.|email\.)' .env`; `nl -ba .env | sed -n '1,320p'`
  - `ls -1 writable/logs`

## Status Table
| Area / Item | Current Status | Action Needed | Priority | Notes |
|---|---|---|---|---|
| CI4 Version vs PHP 8.2 | ⚙️ Needs Review | Restore vendor/`spark` tooling and pin runtime to a CI4-supported 8.2 build. | 🟠 High | PHP CLI is 8.4.12 and `php spark --version` fails because `vendor/codeigniter4/framework` is missing. |
| .env keys (baseURL, DB, mail, session, CSP) | ❌ Broken/Unknown | Reinstate secure defaults, move secrets to vault, and audit cookie/CSP/session flags. | 🔴 Critical | `.env` keeps CSP disabled, forces insecure cookies, and stores live SMTP/API secrets in-repo while DB/email keys stay commented. |
| Routes.php (duplicates/missing) | ⚙️ Needs Review | Deduplicate health/support groups and align API routes to single definitions. | 🟠 High | Health group and Support routes are declared twice with overlapping handlers. |
| BaseLoader::commonData() usage | ⚙️ Needs Review | Either implement required service accessors in trait consumers or retire the trait. | 🔴 Critical | Trait references `getSolanaService()`/`getBudgetService()` et al. that are undefined in trait scope, causing fatals if mixed in. |
| Logger config (handlers/threshold/dateFormat) | ⚙️ Needs Review | Verify DB handler autoload + ensure file handler path exists in deployments. | 🟡 Medium | Logger expects `bf_error_logs` writes in production and WRITEPATH `logs/`, which is absent in repo. |
| Toolbar $enabled=false in prod | ✅ OK | Keep monitoring CI_DEBUG gating for non-prod debugging. | 🔵 Low | Config disables toolbar when `ENVIRONMENT === 'production'`. |
| Custom error pages -> /Support redirect | ⚙️ Needs Review | Normalize error views to funnel users into Support instead of Dashboard/email blasts. | 🟡 Medium | 403/500 meta-refresh to /Support but 404 emails support directly and links to Dashboard. |
| Writable logs present (today) | ❌ Broken/Unknown | Provision `writable/logs` with correct permissions in deployment artifacts. | 🟠 High | Repository lacks `writable/logs`, so file handler cannot emit logs. |

## Findings (Evidence)
- `composer.json:L12-L37` — Requires `codeigniter4/framework ^4.5` yet vendor tree is absent; `php spark --version` aborts loading `system/Boot.php`. Command `./spark` also fails. 
- `.env:L19-L115` — Production CI environment with `CI_DEBUG=false`, `cookie.secure=false`, and `security.CSPEnabled=false`; database/email keys remain commented. `.env:L260-L304` stores live SMTP/API secrets in plaintext. 
- `app/Config/Routes.php:L70-L89` — Root health/status routes duplicated immediately again at `app/Config/Routes.php:L81-L89`. `app/Config/Routes.php:L1223-L1229` redefines Support group in a separate namespace. 
- `app/Libraries/BaseLoader.php:L34-L188` — Trait `commonData()` calls `$this->getSolanaService()`/`getBudgetService()`/`getAccountService()` that the trait itself never defines. 
- `app/Config/Logger.php:L9-L27` — Logger threshold spans all levels with file handler targeting `WRITEPATH . 'logs/'` plus production-only `DatabaseLoggerHandler`. `app/Log/Handlers/DatabaseLoggerHandler.php:L33-L66` writes to `bf_error_logs` only when `ENVIRONMENT === 'production'`. 
- `app/Config/Toolbar.php:L27-L49` — `$enabled` resolves to `false` in production via `ENVIRONMENT` check; collectors list remains default. 
- `app/Views/errors/html/error_404.php:L52-L139` — 404 view mails support, logs directly to DB, and links users to `/Dashboard` instead of Support. `app/Views/errors/html/error_403.php:L52-L102` and `app/Views/errors/html/error_500.php:L55-L88` meta-refresh to `/Support`. 
- `ls writable/logs` — Command fails because directory is missing, so FileHandler writes will error.

## Required Fixes / Tasks
- [ ] Vendor stack recovery: run `composer install`, reinstate `vendor/`, and lock runtime to PHP 8.2-compatible build before release (owner: Codex, priority: 🟠).
- [ ] Secure environment baselines: move secrets to vaulted config, enforce `cookie.secure=true`, re-enable CSP/session hardening, and publish env key checklist for ops review (owner: Codex, priority: 🔴; Teddy to rotate credentials).
- [ ] Routes consolidation: collapse duplicate health/support groups and audit API route coverage against controllers (owner: Codex, priority: 🟠).
- [ ] BaseLoader trait decision: either supply the missing service accessors for trait consumers or deprecate/replace with service locator pattern to avoid fatal calls (owner: Codex, priority: 🔴).
- [ ] Logging hardening: create `writable/logs`, confirm FileHandler permissions, and smoke-test `DatabaseLoggerHandler` inserts into `bf_error_logs` (owner: Codex, priority: 🟡).
- [ ] Error-page alignment: remove direct `@mail` usage, centralize support redirects, and document SupportController contact flow (owner: Codex, priority: 🟡).
- [ ] Ops coordination: rotate exposed SMTP/API keys and validate Support redirect experience (owner: Teddy, priority: 🔴).

## Links & References
- app/Config/Routes.php; app/Config/Logger.php; app/Config/Toolbar.php
- app/Libraries/BaseLoader.php
- .env / .env.example
- app/Views/errors/html/error_403.php, error_404.php, error_500.php; app/Config/Exceptions.php
- app/Log/Handlers/DatabaseLoggerHandler.php
- Proposed runbooks: /docs/ops/runbooks/logger-repair.md, /docs/ops/runbooks/routes-audit-playbook.md, /docs/ops/runbooks/env-baseline-keys.md
