# Core Application Foundation

## Overview
Covers the base CI4 stack: framework versioning, environment configuration, routing safety, shared loader utilities, logging, and error handling that shape application stability and observability.

## Inventory (Auto-collected)
- Generated on: 2025-10-06 21:17 UTC
- Tooling: grep/awk/php spark/composer/git

## Status Table
| Area / Item | Current Status | Action Needed | Priority | Notes |
|---|---|---|---|---|
| CI4 Version / PHP 8.2 alignment | ⚙️ Needs Review | Install vendor stack and lock PHP runtime to 8.2-compatible build before deploy. | 🟠 High | `php spark --version` fails because `vendor/codeigniter4/framework` is missing; composer requires CI4 ^4.5 but no dependencies installed. |
| .env keys (baseURL, DB, mail, session, CSP) | ⚙️ Needs Review | Restore secure defaults (DB creds, cookie.secure true, CSP) via baseline env checklist. | 🟠 High | Production `.env` sets `cookie.secure=false`, leaves DB/email commented, and disables CSP, requiring manual reconciliation. |
| Routes.php duplicates/missing | ⚙️ Needs Review | Deduplicate health/ops and API route groups; ensure Support routes use single source. | 🟠 High | Health endpoints defined twice; Support routes appear both active and commented with overlap. |
| BaseLoader::commonData() presence/usage | ❌ Broken/Unknown | Implement missing service getters (Solana, Budget, Dashboard) or refactor controllers to avoid undefined calls. | 🔴 Critical | Trait calls `$this->getSolanaService()` and other helpers that are undefined, producing fatal errors when invoked. |
| Logger (DatabaseLoggerHandler + FileHandler) & Toolbar ($enabled=false) | ⚙️ Needs Review | Verify DatabaseLoggerHandler autoload and ensure toolbar disabled in prod via CI_DEBUG gating. | 🟡 Medium | Logger registers DB handler only in production; toolbar toggles by ENVIRONMENT but relies on absent CI_DEBUG wiring. |
| Custom Error Pages wired to /Support redirect | ⚙️ Needs Review | Replace raw `@mail` in 404 template with queue + verify Support redirect logic. | 🟡 Medium | 404 view emails support directly and links to Dashboard, not Support knowledge base. |

## Findings (Evidence)
- `composer.json` requires `codeigniter4/framework` ^4.5 but repo lacks installed vendor directory, causing spark failure.【F:composer.json†L12-L43】【7eace4†L1-L10】
- `.env` keeps production defaults with disabled CSP and insecure cookies; database/email keys remain commented.【F:.env†L19-L82】
- `Routes.php` duplicates health group and Support routes, increasing drift risk.【F:app/Config/Routes.php†L70-L99】【F:app/Config/Routes.php†L1220-L1224】
- `BaseLoader` trait calls undefined service accessors like `getSolanaService()` and `getBudgetService()`, leading to runtime errors when controllers rely on it.【F:app/Libraries/BaseLoader.php†L108-L188】
- Logger config wires `App\Log\Handlers\DatabaseLoggerHandler` conditionally and relies on custom CriticalFile handler requiring verification.【F:app/Config/Logger.php†L33-L53】
- 404 error template directly issues support emails and DB inserts while redirecting to Dashboard instead of Support area.【F:app/Views/errors/html/error_404.php†L52-L118】

## Required Fixes / Tasks
- [ ] Install composer dependencies and pin PHP runtime to 8.2-compatible toolchain; update deployment checklist accordingly (owner: Codex).
- [ ] Refactor `Routes.php` and `BaseLoader` consumers to remove duplicates and inject missing service getters (owner: Codex).
- [ ] Review production `.env` secrets and CSP toggles per [env-baseline-keys.md](../ops/runbooks/env-baseline-keys.md) (owner: Teddy/manual).

## Links & References
- `app/Config/Routes.php`, `app/Libraries/BaseLoader.php`, `app/Config/Logger.php`
- `composer.json`, `.env`, `app/Views/errors/html/error_404.php`
