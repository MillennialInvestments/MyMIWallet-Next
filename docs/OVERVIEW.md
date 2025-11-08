# MyMI Documentation Overview

> Last generated: 2025-10-09

## Directories Covered
- wallets
- tasks
- security
- search
- resolutions
- README.md (root)
- operations
- ops
- predictions
- nginx
- marketing
- logs
- hardening-playbook.md
- exports_schema.md
- esports_preflight.md
- discord_seed.sql.md
- discord_schema.sql.md
- discord
- csp-and-commondata.md
- budgeting
- budget
- bitcoin-standardization.md
- auctions
- adr

---

## Directory Summaries

### /docs/wallets
**Purpose (from docs):** Describes the Wallets dashboard data flow, dependencies, caching, and error handling expectations for `/Wallets` and future JSON endpoints.【F:docs/wallets/wallets-index.md†L1-L73】
**Key Files:** `wallets-index.md`
**Declared Requirements:**
- Guard `/Wallets` behind the login filter and hydrate budget, Solana, account, and summary data before rendering.【F:docs/wallets/wallets-index.md†L8-L33】
- Maintain 60-second cache TTLs for budget snapshots and expose source metadata in `financialSummary` payloads.【F:docs/wallets/wallets-index.md†L35-L55】
- Ensure graceful degradation when upstream services fail, populating fallback structures instead of breaking views.【F:docs/wallets/wallets-index.md†L57-L71】
**Interfaces & Routes Mentioned:** `/Wallets` controller flow and planned `/API/Wallets/summary` JSON endpoint for dashboards.【F:docs/wallets/wallets-index.md†L8-L33】【F:docs/wallets/wallets-index.md†L73-L101】
**Expected Data/DB Artifacts:** Cached budget keys (`wallets:budget:{userId}`), WalletModel/provider metadata, AccountService & Solana snapshots.【F:docs/wallets/wallets-index.md†L35-L63】
**Operational Tasks / CRON:** Nightly cache pre-warming CLI for wallet budgets is listed as a follow-up.【F:docs/wallets/wallets-index.md†L103-L117】
**Security/Compliance Notes:** Login filter must protect `/Wallets`; services should handle network failures gracefully.【F:docs/wallets/wallets-index.md†L12-L23】【F:docs/wallets/wallets-index.md†L57-L71】
**Open Questions / Ambiguities:** JSON endpoint implementation remains pending; client-side status badges are future work.【F:docs/wallets/wallets-index.md†L73-L117】
**Cross-Module Dependencies:** Depends on `MyMIBudget`, `MyMIWallet`, `MyMISolana`, `AccountService`, and future Solana service integrations.【F:docs/wallets/wallets-index.md†L25-L33】

### /docs/tasks
**Purpose (from docs):** No Markdown guidance exists yet; `_index.md` notes the absence of task documentation.
**Key Files:** `_index.md`
**Declared Requirements:** None documented.
**Interfaces & Routes Mentioned:** None.
**Expected Data/DB Artifacts:** None.
**Operational Tasks / CRON:** Not documented.
**Security/Compliance Notes:** Not documented.
**Open Questions / Ambiguities:** Need to capture CRON/task inventory per Stage 2 playbook.
**Cross-Module Dependencies:** Unknown; documentation pending.

### /docs/security
**Purpose (from docs):** Captures the Oct 2025 remediation plan covering frontend asset hygiene, dependency pinning, KDF upgrades, and CI4 patch alignment.【F:docs/security/2025-10-remediation.md†L1-L15】
**Key Files:** `2025-10-remediation.md`
**Declared Requirements:**
- Source frontend libraries via npm/Vite and avoid vendored JS in the webroot.【F:docs/security/2025-10-remediation.md†L9-L13】【F:docs/security/2025-10-remediation.md†L18-L22】
- Enforce Argon2/PBKDF2 transitions per KDF versioning guidance.【F:docs/security/2025-10-remediation.md†L4-L8】【F:docs/security/2025-10-remediation.md†L24-L26】
**Interfaces & Routes Mentioned:** None.
**Expected Data/DB Artifacts:** None explicitly; focuses on asset and config state.
**Operational Tasks / CRON:** Periodic review of dependency overrides implied by remediation scope.【F:docs/security/2025-10-remediation.md†L4-L13】
**Security/Compliance Notes:** Hardened CSP, npm-based builds, and password hashing policies are mandatory for compliance posture.【F:docs/security/2025-10-remediation.md†L4-L26】
**Open Questions / Ambiguities:** Follow-up cadence for security audits not specified.
**Cross-Module Dependencies:** Impacts marketing (asset pipelines), authentication (KDF), and DevOps tooling.

### /docs/search
**Purpose (from docs):** Documents the navbar ticker search API contract and UX flow for autocomplete and results navigation.【F:docs/search/README.md†L1-L18】
**Key Files:** `README.md`
**Declared Requirements:**
- `/API/Investments/searchTickers` must clamp result limits, prioritize local DB hits, and expose source metadata.【F:docs/search/README.md†L4-L11】
- Navbar JS should debounce and route to `/Investments/Symbol/{symbol}` or `/Search` appropriately.【F:docs/search/README.md†L13-L18】
**Interfaces & Routes Mentioned:** `/API/Investments/searchTickers`, `/Search`, `/Investments/Symbol/{symbol}`.【F:docs/search/README.md†L4-L18】
**Expected Data/DB Artifacts:** Local ticker tables supporting autocomplete; integration with AlphaVantage fallback.【F:docs/search/README.md†L4-L11】
**Operational Tasks / CRON:** Future enhancements include caching popular queries and adding new providers.【F:docs/search/README.md†L20-L24】
**Security/Compliance Notes:** None beyond authenticated context assumptions.
**Open Questions / Ambiguities:** Site-wide search expansion remains TBD.【F:docs/search/README.md†L20-L24】
**Cross-Module Dependencies:** Depends on Investments module data sources and AlphaVantage integration.

### /docs/resolutions
**Purpose (from docs):** Tracks remediation decisions and root-cause analyses for major incidents and code changes.【F:docs/resolutions/2025-10-07-psr4-fixes.md†L1-L16】【F:docs/resolutions/PR-128-resolution.md†L1-L19】
**Key Files:** `2025-10-07-psr4-fixes.md`, `PR-128-resolution.md`
**Declared Requirements:**
- Maintain PSR-4 autoload compliance and quarantine duplicates when discovered.【F:docs/resolutions/2025-10-07-psr4-fixes.md†L1-L23】
- Ensure Myth/Auth overrides stay compatible to prevent HTTP 500 regressions; document verification steps per incident.【F:docs/resolutions/PR-128-resolution.md†L13-L33】
**Interfaces & Routes Mentioned:** Health endpoints and authentication filters referenced in regression summaries.【F:docs/resolutions/PR-128-resolution.md†L31-L37】
**Expected Data/DB Artifacts:** `bf_error_logs` touched indirectly via logging discussions.【F:docs/resolutions/2025-10-07-psr4-fixes.md†L8-L16】
**Operational Tasks / CRON:** Use provided smoke tests and scripts like `tools/smoke-500.sh` after applying fixes.【F:docs/resolutions/PR-128-resolution.md†L35-L41】
**Security/Compliance Notes:** Secrets handling and error hardening surfaced in autoload fix context.【F:docs/resolutions/2025-10-07-psr4-fixes.md†L17-L23】
**Open Questions / Ambiguities:** Follow-up renames and namespace fixes still pending.【F:docs/resolutions/2025-10-07-psr4-fixes.md†L17-L23】
**Cross-Module Dependencies:** Ties into DevOps runbooks and operations audits documenting the same incidents.

### /docs/README.md (root)
**Purpose (from docs):** Placeholder entrypoint for documentation index.【F:docs/README.md†L1-L4】
**Key Files:** `README.md`
**Declared Requirements:** Replace placeholder with curated index in future iteration.
**Interfaces & Routes Mentioned:** None.
**Expected Data/DB Artifacts:** None.
**Operational Tasks / CRON:** None.
**Security/Compliance Notes:** None.
**Open Questions / Ambiguities:** Needs expansion per playbook objectives.
**Cross-Module Dependencies:** Should eventually reference all doc directories.

### /docs/operations
**Purpose (from docs):** Comprehensive operational audits covering CI4 foundation, libraries, controllers, cron, database, DevOps, marketing growth, security, UI, and roadmap alignment.【F:docs/operations/01-foundation.md†L1-L32】【F:docs/operations/10-roadmap.md†L1-L25】
**Key Files:** `01-` through `10-` series reports.
**Declared Requirements:**
- Restore vendor stack, secure `.env`, deduplicate routes, and resolve BaseLoader service gaps for application stability.【F:docs/operations/01-foundation.md†L7-L36】
- Harden libraries by adding dependency injection, caching, telemetry, and service registries for investments, exchange, assets, gold, and alerts.【F:docs/operations/02-libraries.md†L9-L53】
- Align controllers and cron endpoints with documented automation flows (Management, Marketing, Alerts).【F:docs/operations/03-controllers.md†L1-L40】【F:docs/operations/04-cron-automation.md†L1-L36】
- Produce ERD/migrations for critical `bf_*` tables and enforce cleanup routines for staging data.【F:docs/operations/05-database.md†L7-L53】
- Implement DevOps guardrails, UI hardening, and phased roadmap milestones with telemetry KPIs.【F:docs/operations/06-devops.md†L1-L42】【F:docs/operations/09-frontend-ui.md†L5-L38】【F:docs/operations/10-roadmap.md†L7-L27】
**Interfaces & Routes Mentioned:** Health endpoints, `/Support`, `/API/Management/*`, `/API/Marketing/*`, cron triggers, and UI routes tied to roadmap phases.【F:docs/operations/01-foundation.md†L21-L36】【F:docs/operations/04-cron-automation.md†L7-L40】【F:docs/operations/09-frontend-ui.md†L31-L40】
**Expected Data/DB Artifacts:** `bf_investment_*`, `bf_marketing_*`, `bf_error_logs`, `bf_projects`, `bf_assets`, plus roadmap-critical migrations.【F:docs/operations/05-database.md†L13-L53】
**Operational Tasks / CRON:** Reconcile cron pipelines (Alpha Vantage, alerts, marketing) and define telemetry for each batch.【F:docs/operations/04-cron-automation.md†L7-L46】【F:docs/operations/07-marketing-growth.md†L7-L44】
**Security/Compliance Notes:** Re-enable CSP, rotate secrets, audit error views, and ensure toolbar/CI_DEBUG gating per security doc.【F:docs/operations/01-foundation.md†L21-L36】【F:docs/operations/08-security-compliance.md†L5-L38】
**Open Questions / Ambiguities:** BaseLoader helper strategy and route duplication resolution need implementation decisions.【F:docs/operations/01-foundation.md†L21-L36】
**Cross-Module Dependencies:** Interlocks with marketing automation, alerts processing, Solana exchange, budgeting, and DevOps runbooks.

### /docs/ops
**Purpose (from docs):** Deep-dive audits, runbooks, and postmortems supporting operations, PSR-4 compliance, HTTP 500 recovery, and incident handling.【F:docs/ops/01-foundation.report.md†L1-L41】【F:docs/ops/500-audit.md†L1-L43】
**Key Files:** Audit reports, PSR-4 autoload audit, HTTP 500 audit, 502 playbook, unexpected token LT audit, runbooks.
**Declared Requirements:**
- Maintain vendor stack compatibility with PHP 8.2 and CI4; ensure `.env` hygiene and logger availability.【F:docs/ops/01-foundation.report.md†L9-L41】
- Follow runbooks for env keys, database log review, AlphaVantage rotation, marketing cron, and UI smoke tests.【F:docs/ops/runbooks/env-baseline-keys.md†L1-L26】【F:docs/ops/runbooks/marketing-cron-playbook.md†L1-L40】
- Remediate HTTP 500 incidents via config fixes, Hybridauth deferrals, and lint-based verification.【F:docs/ops/500-audit.md†L1-L69】
**Interfaces & Routes Mentioned:** `/system/healthz`, `/API/Management/*`, `/API/Alerts/*`, and cron endpoints referenced in audits.【F:docs/ops/500-audit.md†L45-L69】
**Expected Data/DB Artifacts:** `bf_error_logs`, `writable/logs`, marketing and alerts staging tables referenced for ops validation.【F:docs/ops/500-audit.md†L31-L69】
**Operational Tasks / CRON:** Runbooks define manual checks, smoke tests, env backups, cron verification, and rotation schedules.【F:docs/ops/runbooks/env-baseline-keys.md†L9-L26】【F:docs/ops/runbooks/marketing-cron-playbook.md†L15-L40】
**Security/Compliance Notes:** Emphasizes secure `.env`, PSR-4 compliance, and verifying Support route hardening.【F:docs/ops/01-foundation.report.md†L21-L53】
**Open Questions / Ambiguities:** Need follow-up renames and root-cause coverage for additional incidents noted in runbooks.
**Cross-Module Dependencies:** Aligns with operations docs, marketing automation, alerts controllers, and DevOps infrastructure.

### /docs/predictions
**Purpose (from docs):** Outlines the Predictions module configuration, migrations, API surface, and CRON requirements for market settlement and payouts.【F:docs/predictions/README.md†L1-L53】【F:docs/predictions/mysql-migrations.md†L1-L67】
**Key Files:** `README.md`, `mysql-migrations.md`
**Declared Requirements:**
- Configure `app/Config/Predictions.php` with `.env` toggles and mode settings for Gold-centric vs multi-asset markets.【F:docs/predictions/README.md†L5-L24】
- Run migrations creating markets, options, orders, trades, positions, liquidity, settlements, and payouts tables.【F:docs/predictions/README.md†L26-L43】【F:docs/predictions/mysql-migrations.md†L1-L111】
- Expose REST endpoints for markets, orders, and settlement with validation and telemetry.【F:docs/predictions/README.md†L55-L88】
**Interfaces & Routes Mentioned:** `/Predictions/Markets`, `/Predictions/Market/{id}`, `/API/Predictions/*` endpoints, CRON tasks for locking markets and processing payouts.【F:docs/predictions/README.md†L55-L110】
**Expected Data/DB Artifacts:** `bf_predictions_*` tables per migrations, Gold ledger integration for payouts.【F:docs/predictions/mysql-migrations.md†L1-L146】
**Operational Tasks / CRON:** Lock markets post `lock_at`, process payouts, and log batch context.【F:docs/predictions/README.md†L96-L110】
**Security/Compliance Notes:** Ensure admin-only endpoints for market creation and settlement; handle ledger fallbacks safely.【F:docs/predictions/README.md†L71-L88】
**Open Questions / Ambiguities:** Multi-asset mode flagged for future enablement; telemetry not fully defined.【F:docs/predictions/README.md†L11-L24】【F:docs/predictions/README.md†L96-L110】
**Cross-Module Dependencies:** Relies on MyMI Gold ledger, liquidity providers, and admin UI flows.

### /docs/nginx
**Purpose (from docs):** Documents user-space Nginx layout, DreamHost proxy chain, and the `mymiwallet.conf` virtual host design.【F:docs/nginx/README.md†L1-L34】【F:docs/nginx/mymiwallet.md†L1-L59】
**Key Files:** `README.md`, `01-structure.md`, `mymiwallet.md`, `config-nginx.md`, `nginx.md`
**Declared Requirements:**
- Maintain home-directory Nginx structure with single `nginx.conf` and symlinked site configs.【F:docs/nginx/01-structure.md†L1-L21】
- Map forwarded proto headers to `$https_flag` and propagate to PHP-FPM.【F:docs/nginx/README.md†L18-L30】
- Serve static assets directly with cache hints and guard PHP handling with proper FastCGI parameters.【F:docs/nginx/mymiwallet.md†L41-L92】
**Interfaces & Routes Mentioned:** None beyond virtual host endpoints; emphasises `/index.php` front controller and DreamHost proxy port 9001.【F:docs/nginx/README.md†L1-L34】【F:docs/nginx/mymiwallet.md†L1-L38】
**Expected Data/DB Artifacts:** N/A (infra focus).
**Operational Tasks / CRON:** Run `nginx -t` and `nginx -s reload` after changes; reset caches during deployments.【F:docs/nginx/README.md†L36-L51】
**Security/Compliance Notes:** Force HTTPS detection, manage DreamHost proxy IP rotation, avoid stale allowlists.【F:docs/nginx/mymiwallet.md†L9-L39】
**Open Questions / Ambiguities:** None documented.
**Cross-Module Dependencies:** Supports CI4 routing and PHP-FPM connectivity for all modules.

### /docs/marketing
**Purpose (from docs):** Houses marketing campaign blueprints feeding automation engines, with YAML metadata, KPIs, and multi-channel content strategies.【F:docs/marketing/README.md†L1-L24】【F:docs/marketing/01-mymi-gold-and-coin.md†L1-L74】
**Key Files:** Campaign docs `01-16`, `README.md`, `_templates/CAMPAIGN_TEMPLATE.md`, `_assets/README.md`, `index.md`
**Declared Requirements:**
- Duplicate `_templates/CAMPAIGN_TEMPLATE.md` for new initiatives and maintain monthly review cadence.【F:docs/marketing/README.md†L7-L18】
- Source factual product data from modules/libraries and database tables noted in each campaign.【F:docs/marketing/01-mymi-gold-and-coin.md†L25-L52】
- Track KPIs, CTAs, compliance notes, and distribution channel specifics per campaign.【F:docs/marketing/01-mymi-gold-and-coin.md†L5-L24】【F:docs/marketing/01-mymi-gold-and-coin.md†L74-L139】
**Interfaces & Routes Mentioned:** Management dashboard ingests docs at `/management/marketing/*`; Discord automation uses campaign prompts.【F:docs/marketing/README.md†L19-L27】【F:docs/marketing/01-mymi-gold-and-coin.md†L134-L165】
**Expected Data/DB Artifacts:** `bf_users_memberships`, `bf_marketing_scraper`, `bf_investment_trade_alerts`, `bf_referrals` referenced for metrics.【F:docs/marketing/01-mymi-gold-and-coin.md†L25-L52】
**Operational Tasks / CRON:** Marketing engine pulls prompts/templates; runbook references marketing cron cadence in ops docs.【F:docs/marketing/README.md†L7-L27】【F:docs/operations/07-marketing-growth.md†L7-L44】
**Security/Compliance Notes:** Compliance notes per campaign emphasise risk disclosures and no performance guarantees.【F:docs/marketing/01-mymi-gold-and-coin.md†L17-L24】
**Open Questions / Ambiguities:** Need automation to mark stale docs; monthly review requirement ensures currency.【F:docs/marketing/README.md†L13-L18】
**Cross-Module Dependencies:** Integrates with Marketing library, Alerts, Exchange/Solana, Memberships, Referrals modules.

### /docs/logs
**Purpose (from docs):** Daily log triage report summarizing top CI4 errors and severity scoring.【F:docs/logs/log-2025-10-06.md†L1-L12】
**Key Files:** `log-2025-10-06.md`
**Declared Requirements:** Monitor CRITICAL and ERROR entries, especially marketing undefined array keys and ManagementController null responses.【F:docs/logs/log-2025-10-06.md†L6-L16】
**Interfaces & Routes Mentioned:** `ManagementController`, `MarketingController` stack traces imply API endpoints requiring fixes.【F:docs/logs/log-2025-10-06.md†L6-L16】
**Expected Data/DB Artifacts:** Relies on `bf_error_logs` ingestion from `php spark logs:triage` tooling.【F:docs/logs/log-2025-10-06.md†L1-L4】
**Operational Tasks / CRON:** Generated by `php spark logs:triage`; should feed into ops review cadence.【F:docs/logs/log-2025-10-06.md†L1-L4】
**Security/Compliance Notes:** None beyond prompt remediation of critical alerts.
**Open Questions / Ambiguities:** Requires follow-up tasks to resolve listed errors.
**Cross-Module Dependencies:** Highlights marketing and management automation reliability.

### /docs/hardening-playbook.md
**Purpose (from docs):** Defines the stability hardening workflow, tooling setup, code quarantine, smoke tests, and PR checklist for Phase 1 hardening.【F:docs/hardening-playbook.md†L1-L63】【F:docs/hardening-playbook.md†L67-L105】
**Key Files:** `hardening-playbook.md`
**Declared Requirements:**
- Establish safety freeze tags, install dev tooling, quarantine backups, and run smoke tests prior to hardening PR.【F:docs/hardening-playbook.md†L1-L63】
- Deliver PR titled “Phase 1: Stability, Standards & Observability” with checklist items for standards, routes, health endpoints, and ADR.【F:docs/hardening-playbook.md†L67-L105】
**Interfaces & Routes Mentioned:** `/system/healthz`, `/system/diag`, `/API/Management/*` endpoints to be added/stubbed.【F:docs/hardening-playbook.md†L45-L96】
**Expected Data/DB Artifacts:** None directly; emphasises moving backups out of autoload paths.
**Operational Tasks / CRON:** Sequence of CLI commands for freeze, tooling, linting, and rollback.【F:docs/hardening-playbook.md†L1-L63】
**Security/Compliance Notes:** Avoid reintroducing quarantined assets; run checks before deployment.【F:docs/hardening-playbook.md†L1-L63】
**Open Questions / Ambiguities:** Offers optional controller diff generation assistance.
**Cross-Module Dependencies:** Touches Management, Alerts, Logger, and ADR modules.

### /docs/exports_schema.md
**Purpose (from docs):** Provides SQL DDL for esports tables covering creators, events, entries, pools, escrows, payouts, disputes, and webhook logs.【F:docs/exports_schema.md†L1-L118】
**Key Files:** `exports_schema.md`
**Declared Requirements:** Execute statements sequentially with foreign key awareness and consistent collation.【F:docs/exports_schema.md†L1-L40】
**Interfaces & Routes Mentioned:** Implicit tie-in to esports APIs for event ingestion and payouts.
**Expected Data/DB Artifacts:** `bf_esports_*` tables for creators, events, entries, pools, escrows, payouts, disputes, webhooks.【F:docs/exports_schema.md†L1-L118】
**Operational Tasks / CRON:** Ensure migrations or manual SQL align with DreamHost MySQL access controls.
**Security/Compliance Notes:** Manage foreign key cascades carefully when modifying production data.【F:docs/exports_schema.md†L1-L118】
**Open Questions / Ambiguities:** Statement on running each command individually hints at client limitations; no migration parity confirmation.
**Cross-Module Dependencies:** Integrates with esports preflight discovery and Solana escrow services.

### /docs/esports_preflight.md
**Purpose (from docs):** Maps reusable services, route patterns, migrations, and tooling prerequisites for NexusArena esports integration.【F:docs/esports_preflight.md†L1-L43】
**Key Files:** `esports_preflight.md`
**Declared Requirements:**
- Reuse existing Solana, exchange, marketing, and rate limiter libraries for esports features.【F:docs/esports_preflight.md†L3-L25】
- Align controllers and routes within `/API/Esports` namespace and follow CI4 migration conventions.【F:docs/esports_preflight.md†L27-L49】
- Respect retry/backoff environment keys for esports job workers.【F:docs/esports_preflight.md†L63-L71】
**Interfaces & Routes Mentioned:** `/API/Esports/*` group; caution against collisions with Management, Health, Ops routes.【F:docs/esports_preflight.md†L27-L49】
**Expected Data/DB Artifacts:** `bf_esports_*` tables referenced with Forge-style migrations; no existing tables detected yet.【F:docs/esports_preflight.md†L45-L59】
**Operational Tasks / CRON:** Cron/queue design should mirror Marketing/Alerts patterns with idempotent ingestion.【F:docs/esports_preflight.md†L19-L33】【F:docs/esports_preflight.md†L59-L71】
**Security/Compliance Notes:** Rate limiting and logging patterns mirror existing libraries for abuse prevention.【F:docs/esports_preflight.md†L19-L33】
**Open Questions / Ambiguities:** MySQL CLI unavailable in container; schema verification pending environment access.【F:docs/esports_preflight.md†L45-L55】
**Cross-Module Dependencies:** Shares services with Gold ledger, Solana exchange, marketing automation, and alerts.

### /docs/discord_seed.sql.md
**Purpose (from docs):** Seeds Discord templates and subscriptions for digest automation with example data.【F:docs/discord_seed.sql.md†L1-L9】
**Key Files:** `discord_seed.sql.md`
**Declared Requirements:** Update `bf_discord_templates` and `bf_discord_subscriptions` to use digest template keys.【F:docs/discord_seed.sql.md†L1-L9】
**Interfaces & Routes Mentioned:** Applies to Discord automation triggered by marketing/alerts workflows.
**Expected Data/DB Artifacts:** `bf_discord_templates`, `bf_discord_subscriptions` entries.【F:docs/discord_seed.sql.md†L1-L9】
**Operational Tasks / CRON:** Ensure seeds run in deployments or migrations where Discord digests are required.
**Security/Compliance Notes:** None beyond verifying channel keys.
**Open Questions / Ambiguities:** Need to confirm template keys exist before update.
**Cross-Module Dependencies:** Works with marketing digest automation and Discord worker tasks.

### /docs/discord_schema.sql.md
**Purpose (from docs):** Alters Discord tables to add digest templates, quiet-hour bypass, normalized hashes, and policy tables.【F:docs/discord_schema.sql.md†L1-L25】
**Key Files:** `discord_schema.sql.md`
**Declared Requirements:** Apply `ALTER TABLE` statements for subscriptions/history and create policy/queue indexes.【F:docs/discord_schema.sql.md†L1-L25】
**Interfaces & Routes Mentioned:** Supports Discord queue processing pipeline.
**Expected Data/DB Artifacts:** `bf_discord_subscriptions`, `bf_discord_message_history`, `bf_discord_policies`, `bf_discord_queue` indexes.【F:docs/discord_schema.sql.md†L1-L25】
**Operational Tasks / CRON:** Digest and queue workers must respect new fields (digest templates, quiet bypass, normalized hashes).【F:docs/discord_schema.sql.md†L1-L18】
**Security/Compliance Notes:** Policies enable regex-based masking/blocking to enforce community standards.【F:docs/discord_schema.sql.md†L15-L25】
**Open Questions / Ambiguities:** None noted.
**Cross-Module Dependencies:** Feeds Discord integrations triggered by marketing and alerts libraries.

### /docs/discord
**Purpose (from docs):** Provides schema and seed updates for Discord integration (see above) and indexes via `_index.md`.
**Key Files:** `_index.md`, `discord_schema_v3.sql.md`, `discord_seed_v3.sql.md`
**Declared Requirements:** Same as sections for schema/seed; ensure v3 adjustments applied.
**Interfaces & Routes Mentioned:** Discord automation endpoints.
**Expected Data/DB Artifacts:** Discord tables and templates.
**Operational Tasks / CRON:** Align digest jobs with new templates and normalized hashes.
**Security/Compliance Notes:** Policy table enables content filtering.
**Open Questions / Ambiguities:** Need confirmation of migrations vs manual SQL approach.
**Cross-Module Dependencies:** Marketing, alerts, Discord bot workers.

### /docs/csp-and-commondata.md
**Purpose (from docs):** Standardizes CSP modes and the shared `commonData()` payload returned by BaseController for views.【F:docs/csp-and-commondata.md†L1-L40】【F:docs/csp-and-commondata.md†L58-L101】
**Key Files:** `csp-and-commondata.md`
**Declared Requirements:**
- Support `off`, `relaxed`, and `strict` CSP modes controlled via `APP_CSP_MODE` with nonce distribution to views.【F:docs/csp-and-commondata.md†L5-L37】
- Ensure `commonData()` hydrates user profile, budget, Solana, goals, and analytics values with try/catch guards and smoke tests.【F:docs/csp-and-commondata.md†L39-L101】
**Interfaces & Routes Mentioned:** `/debug/common-data/smoke` referenced for validation.【F:docs/csp-and-commondata.md†L92-L101】
**Expected Data/DB Artifacts:** Data from MyMIUser, MyMIDashboard, GoalTrackingService, BudgetService, SolanaService, AccountService, MyMIAnalytics.【F:docs/csp-and-commondata.md†L80-L101】
**Operational Tasks / CRON:** None directly; ensures consistent payload for dashboards.
**Security/Compliance Notes:** CSP enforcement toggles; strict mode requires nonce usage across views.【F:docs/csp-and-commondata.md†L5-L37】
**Open Questions / Ambiguities:** Legacy helpers vs new nonce array usage to reconcile.【F:docs/csp-and-commondata.md†L68-L101】
**Cross-Module Dependencies:** Affects all controllers using BaseController (wallets, budgeting, dashboards).

### /docs/budgeting
**Purpose (from docs):** Defines budgeting architecture for calculating initial bank balances and the supporting services/models.【F:docs/budgeting/architecture.md†L1-L40】
**Key Files:** `architecture.md`
**Declared Requirements:**
- Use BudgetService/BudgetModel to compute balances from bank accounts and transactions tables filtered by posted status/date.【F:docs/budgeting/architecture.md†L7-L33】
- Controllers must call `BudgetService::getInitialBankBalance` with caching and error logging; views remain presentation-only.【F:docs/budgeting/architecture.md†L31-L47】
**Interfaces & Routes Mentioned:** `/API/User/Budget/debugInitialBalance` for verification.【F:docs/budgeting/architecture.md†L47-L55】
**Expected Data/DB Artifacts:** `bf_users_bank_accounts`, `bf_users_bank_transactions` inputs.【F:docs/budgeting/architecture.md†L13-L23】
**Operational Tasks / CRON:** Provide seed data and timezone normalization for tests.【F:docs/budgeting/architecture.md†L47-L55】
**Security/Compliance Notes:** Ensure only active, user-owned accounts included.【F:docs/budgeting/architecture.md†L21-L29】
**Open Questions / Ambiguities:** None beyond implementing CLI/API verification.
**Cross-Module Dependencies:** Integrates with Wallets, BudgetService, AccountService.

### /docs/budget
**Purpose (from docs):** Documents BudgetController endpoints, UI suggestions, performance notes, and API contracts.【F:docs/budget/budget-controller.md†L1-L78】【F:docs/budget/UI-Suggestions.md†L1-L23】
**Key Files:** `budget-controller.md`, `UI-Suggestions.md`
**Declared Requirements:**
- Enforce authenticated JSON envelope `{status,data,fromCache,asOf}` across `/API/Budget/*` endpoints with caching TTL and validation.【F:docs/budget/budget-controller.md†L5-L115】
- Improve UI structure, tooltips, and DataTables usage per suggestions.【F:docs/budget/UI-Suggestions.md†L3-L23】
**Interfaces & Routes Mentioned:** `/Budget`, `/API/Budget/summary`, `/API/Budget/credit`, `/API/Budget/available`, `/API/Budget/repayment`, `/API/Budget/categories` plus legacy endpoints.【F:docs/budget/budget-controller.md†L49-L124】
**Expected Data/DB Artifacts:** Budget, accounts, repayment models, caching keys, and flags for degraded states.【F:docs/budget/budget-controller.md†L49-L210】
**Operational Tasks / CRON:** None; relies on API responses and caching.
**Security/Compliance Notes:** Guard endpoints with login filter and log security events for payload mismatches.【F:docs/budget/budget-controller.md†L5-L210】
**Open Questions / Ambiguities:** Actual transaction ingest pending; flagged as known limitation.【F:docs/budget/budget-controller.md†L205-L214】
**Cross-Module Dependencies:** Ties into Wallets, AccountsModel, BudgetService, analytics dashboards.

### /docs/bitcoin-standardization.md
**Purpose (from docs):** Establishes canonical BitcoinJS loading pattern, API endpoints, adapters, and guardrails to avoid drift.【F:docs/bitcoin-standardization.md†L1-L21】
**Key Files:** `bitcoin-standardization.md`
**Declared Requirements:**
- Load shared Bitcoin scripts via layout includes only; no per-view injections.【F:docs/bitcoin-standardization.md†L5-L13】
- Route Bitcoin operations through `MyMIBitcoin`/`BitcoinService` and expose `/API/Bitcoin/*` endpoints.【F:docs/bitcoin-standardization.md†L13-L18】
- Use `MyMIBTCFlow.attach` for form wiring and enforce CI script guardrails.【F:docs/bitcoin-standardization.md†L17-L27】
**Interfaces & Routes Mentioned:** `/API/Bitcoin/buildUnsignedPsbt`, `/API/Bitcoin/broadcastSignedTx`.【F:docs/bitcoin-standardization.md†L13-L18】
**Expected Data/DB Artifacts:** None; focuses on JS loading and API design.
**Operational Tasks / CRON:** Smoke `/Dev/BitcoinTest` during deployments.【F:docs/bitcoin-standardization.md†L21-L27】
**Security/Compliance Notes:** Standardization prevents outdated scripts and enforces consistent validation flows.【F:docs/bitcoin-standardization.md†L1-L27】
**Open Questions / Ambiguities:** Migration checklist tasks pending verification.【F:docs/bitcoin-standardization.md†L19-L27】
**Cross-Module Dependencies:** Wallet send flows, Bitcoin service clients, JS build pipeline.

### /docs/auctions
**Purpose (from docs):** Supplies SQL schema for auctions, covering items, lots, bids, settlements, balances, payments, watchlists, and activity logs.【F:docs/auctions/auction-schema.md†L1-L62】
**Key Files:** `auction-schema.md`
**Declared Requirements:** Execute schema creation sequentially, enforce unique keys, and model escrow/payments properly.【F:docs/auctions/auction-schema.md†L1-L86】
**Interfaces & Routes Mentioned:** Implicit reliance on auction module APIs for bids and settlements.
**Expected Data/DB Artifacts:** `bf_auction_*` tables and related indexes.【F:docs/auctions/auction-schema.md†L1-L86】
**Operational Tasks / CRON:** Manage settlement workflows and payment processing referencing generated tables.【F:docs/auctions/auction-schema.md†L62-L86】
**Security/Compliance Notes:** Ensure escrow and payout states track status transitions accurately.【F:docs/auctions/auction-schema.md†L62-L86】
**Open Questions / Ambiguities:** Need migrations or automation to apply SQL consistently.
**Cross-Module Dependencies:** Interacts with MyMI Gold balances, payments, and user accounts.

### /docs/adr
**Purpose (from docs):** Records architectural decision regarding standards, logging, and API response contracts (ADR 0001).【F:docs/adr/0001-standards-and-response-contract.md†L1-L23】
**Key Files:** `0001-standards-and-response-contract.md`
**Declared Requirements:**
- Adopt PHP 8.2 + CI4 with PSR-12 formatting and static analysis tooling.【F:docs/adr/0001-standards-and-response-contract.md†L7-L15】
- Unify logging across file/database handlers with request context and standardize API responses via `App\Support\Http`.【F:docs/adr/0001-standards-and-response-contract.md†L13-L23】
- Route back-office APIs under `/API/{Module}/...` and health under `/system/*`.【F:docs/adr/0001-standards-and-response-contract.md†L15-L23】
**Interfaces & Routes Mentioned:** `/system/*`, `/API/{Module}/...` per decision.【F:docs/adr/0001-standards-and-response-contract.md†L15-L23】
**Expected Data/DB Artifacts:** None, though logging expects DB handler context.
**Operational Tasks / CRON:** Align deployments with standards enforcement.
**Security/Compliance Notes:** Consistent logging aids audit trails; API contracts improve observability.【F:docs/adr/0001-standards-and-response-contract.md†L13-L23】
**Open Questions / Ambiguities:** Future ADRs anticipated for module-specific patterns.
**Cross-Module Dependencies:** Applies to entire platform, guiding Management/Alerts hardening.

---

## Review Status
| Directory | Status | Notes |
| --- | --- | --- |
| wallets | Pending | Awaiting Stage 2 compliance review |
| tasks | Pending | Documentation missing; review requires source discovery |
| security | Pending | Need to verify npm/Vite pipeline and KDF rollout |
| search | Pending | Confirm `/API/Investments/searchTickers` behaviour in code |
| resolutions | Pending | Validate incidents linked to code state |
| README.md (root) | Pending | Replace placeholder with curated index |
| operations | Pending | Comprehensive audit requires code alignment |
| ops | Pending | Runbook implementation checks outstanding |
| predictions | Pending | Verify migrations, configs, and CRON hooks |
| nginx | Pending | Confirm user-space config matches deployment |
| marketing | Pending | Ensure automation consumes documented campaigns |
| logs | Pending | Resolve triage items in application code |
| hardening-playbook.md | Pending | Execute checklist and track progress |
| exports_schema.md | Pending | Confirm schema applied via migrations |
| esports_preflight.md | Pending | Build esports module per discovery |
| discord_seed.sql.md | Pending | Ensure seeds applied to production |
| discord_schema.sql.md | Pending | Validate ALTER statements and workers |
| discord | Pending | Holistic review of Discord integration |
| csp-and-commondata.md | Pending | Confirm BaseController implementation |
| budgeting | Pending | Check BudgetService logic against docs |
| budget | Pending | Audit API responses and UI contracts |
| bitcoin-standardization.md | Pending | Validate canonical loader in views |
| auctions | Pending | Verify auction tables/migrations exist |
| adr | Pending | Ensure ADR standards enforced |

## Cross-Module Map
- **Operations ↔ Ops:** Operations audits rely on Ops runbooks and incident reports to prioritize remediation work.【F:docs/operations/01-foundation.md†L7-L36】【F:docs/ops/01-foundation.report.md†L9-L41】
- **Marketing ↔ Alerts ↔ Discord:** Marketing campaigns trigger alerts and Discord digests, requiring aligned templates, webhooks, and queue policies.【F:docs/marketing/01-mymi-gold-and-coin.md†L25-L165】【F:docs/discord_schema.sql.md†L1-L25】
- **Wallets ↔ Budgeting ↔ Budget:** Wallet dashboards depend on BudgetService calculations and BudgetController APIs for financial summaries.【F:docs/wallets/wallets-index.md†L25-L55】【F:docs/budgeting/architecture.md†L7-L47】【F:docs/budget/budget-controller.md†L49-L124】
- **Predictions ↔ MyMI Gold:** Predictions module settlements credit MyMI Gold balances and require Gold ledger fallbacks.【F:docs/predictions/README.md†L71-L110】
- **Esports ↔ Exports Schema ↔ Solana/Exchange:** Esports preflight draws on Solana, exchange, marketing, and logging services while the exports schema provisions related tables.【F:docs/esports_preflight.md†L3-L71】【F:docs/exports_schema.md†L1-L118】
- **Hardening Playbook ↔ ADR:** Hardening checklist enforces standards and routes mandated by ADR 0001.【F:docs/hardening-playbook.md†L67-L105】【F:docs/adr/0001-standards-and-response-contract.md†L7-L23】
