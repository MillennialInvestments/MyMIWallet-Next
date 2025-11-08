# Schema & Data Integrity

## Overview
Evaluates core database tables powering users, alerts, marketing scrapers, and project tokenization to ensure structure and hygiene remain actionable.

## Inventory (Auto-collected)
- Generated on: 2025-10-06 21:17 UTC
- Tooling: grep/awk/php spark/composer/git

## Status Table
| Area / Item | Current Status | Action Needed | Priority | Notes |
|---|---|---|---|---|
| bf_users | ⚙️ Needs Review | Align user-derived tables (`bf_users_*`) with Auth migrations and enforce soft-delete constraints. | 🟠 High | Model mixes Myth/Auth `users` table with `bf_users_*` derivatives for onboarding, comments, rate limits. |
| bf_investment_scraper | ⚙️ Needs Review | Add processed flag + retention policy for scraped alerts. | 🟠 High | AlertsModel treats table as staging area for email ingests. |
| bf_investment_trade_alerts | ⚙️ Needs Review | Define unique keys on ticker/date and archive processed rows. | 🟠 High | Trade alert insertion and updates occur via cron without dedupe. |
| bf_investment_tickers | ⚙️ Needs Review | Index symbol/market columns and validate data types for market cap. | 🟡 Medium | Batch updates from market data rely on symbol lookups. |
| bf_investment_alert_history | ⚙️ Needs Review | Implement partitioning/TTL to prevent historical bloat. | 🟡 Medium | History updated on each trade alert refresh. |
| bf_marketing_temp_scraper | ⚙️ Needs Review | Purge stale temp rows and track processing status transitions. | 🟠 High | Marketing library iterates staging records without cleanup. |
| bf_marketing_scraper | ⚙️ Needs Review | Enforce unique `(source_id, date_generated)` and add content length checks. | 🟡 Medium | Finalized summaries inserted after processing temp records. |
| bf_error_logs | ⚙️ Needs Review | Normalize schema to avoid duplicate `message` spam and connect to alerting. | 🟡 Medium | Error pages and libraries write directly to bf_error_logs. |
| bf_projects | ⚙️ Needs Review | Audit timestamps/created_by columns and ensure slug uniqueness. | 🟡 Medium | ProjectsModel handles status transitions but assumes created_by column exists. |
| bf_assets | ❌ Broken/Unknown | Reconcile usage between `bf_assets` and `bf_exchanges_assets`; update models accordingly. | 🔴 Critical | AssetsModel points to `bf_exchanges_assets`, leaving `bf_assets` definitions ambiguous. |
| Project tokenization relations | ⚙️ Needs Review | Document relationships across commitments, allocations, payouts tables; add FK constraints. | 🟡 Medium | MyMIProjects orchestrates multiple `Project*Model` classes without explicit foreign keys. |

## Findings (Evidence)
- User domain mixes base `users` table with `bf_user_onboarding`, `bf_users_comments`, etc., increasing coupling across Auth and legacy schemas.【F:app/Models/UserModel.php†L16-L199】
- AlertsModel treats `bf_investment_scraper`, `bf_investment_trade_alerts`, `bf_investment_tickers`, and history tables as tightly coupled staging + live stores.【F:app/Models/AlertsModel.php†L12-L175】
- Marketing library processes `bf_marketing_temp_scraper` records into `bf_marketing_scraper` without dedupe or retention policy.【F:app/Libraries/MyMIMarketing.php†L2781-L2830】
- Custom error handling writes directly to `bf_error_logs` from error views and libraries.【F:app/Views/errors/html/error_404.php†L64-L75】【F:app/Libraries/MyMIMarketing.php†L4752-L4755】
- Projects domain references multiple tables (commitments, allocations, payouts, withdrawals) via `MyMIProjects`, relying on consistent schema for funding flows.【F:app/Libraries/MyMIProjects.php†L12-L127】
- AssetsModel targets `bf_exchanges_assets`, implying `bf_assets` needs review or migration cleanup.【F:app/Models/AssetsModel.php†L8-L179】

## Required Fixes / Tasks
- [ ] Produce ERD + migration checklist for active `bf_*` tables and validate column parity with models (owner: Codex).
- [ ] Implement nightly cleanup jobs for staging tables (`bf_marketing_temp_scraper`, alert history) with row caps (owner: Codex).
- [ ] Run manual log and staging review per [database-log-review.md](../ops/runbooks/database-log-review.md) (owner: Teddy/manual).

## Links & References
- `app/Models/UserModel.php`, `app/Models/AlertsModel.php`
- `app/Libraries/MyMIMarketing.php`, `app/Libraries/MyMIProjects.php`
- `app/Models/AssetsModel.php`, `app/Views/errors/html/error_404.php`
