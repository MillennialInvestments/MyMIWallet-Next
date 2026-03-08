## Overview

Supplemental operational documentation entry for this Spark scope.

## Operational Purpose

Provide standardized runbook sections for operators and developers.

## Command Inventory

- See local command tables and linked inventories.

## Command Reference

- Reference command blocks in this file or parent category docs.

## Dependencies

- Use `docs/spark/_spark_command_dependencies.json` for relationship data.

## Execution Workflows

- Run category bootstrap, diagnostics, and validation sequences as applicable.

## Operational Playbooks

- Incident triage: logs, services, routes, and database diagnostics.

## Troubleshooting

- Use `php spark ops:commands:audit`, `php spark ops:commands:missing`, and runtime diagnostics.

## Related Commands

- `ops:commands:audit`
- `ops:commands:missing`
- `spark:commands:graph`

---

# CLI Commands — Overview

This document inventories every discovered Spark CLI command implemented under `app/Commands/`, including purpose, syntax, flags/arguments, and practical usage patterns.

- Total commands documented: **206**.

## Table of Contents
- [Quick Command Index](#quick-command-index)
- [Command Reference](#command-reference)
- [Grouping / Workflow Combos](#grouping--workflow-combos)
- [Usage Examples](#usage-examples)

## Quick Command Index

| Command | Purpose | Syntax |
|---|---|---|
| `aiops:alerts-check` | Fetch emails and queue them for processing | `php spark aiops:alerts-check` |
| `aiops:alerts-clean` | Delete completed aiops alert queue rows older than 30 days | `php spark aiops:alerts-clean` |
| `aiops:alerts-health` | Run health checks on aiops alert queue and notify if failures are high | `php spark aiops:alerts-health` |
| `aiops:alerts-worker` | Process queued alert emails | `php spark aiops:alerts-worker` |
| `aiops:api:schema` | Validate API endpoints return JSON (optionally check required keys) | `php spark aiops:api:schema` |
| `aiops:audit` | Audit aiops runtime, orchestration routes, and n8n/docs readiness | `php spark aiops:audit` |
| `aiops:auto-run` | Run AIOPS using manual priorities first, falling back to log-driven auto priorities. | `php spark aiops:auto-run [--dry-run=1\|0] [--limit-tasks=1] [--limit-errors=3] [--auto-threshold=CRITICAL\|ERROR] [--write-auto-tasks=1\|0] [--create-pr=1\|0] [--notify=1\|0] [--job-file=docs/_aiops/patch_jobs/<id>.md] [--force=1\|0]` |
| `aiops:backlog` | Reconcile outstanding AIOPS patch workflow jobs. | `php spark aiops:backlog [--run=1\|0] [--force=1\|0]` |
| `aiops:build-command` | Generate a Spark command from text logic using AIOps | `php spark aiops:build-command` |
| `aiops:chat-gov-index` | Index ChatGPT governance steps from archived chats and sync CSV/DB outputs. | `php spark aiops:chat-governance-index [--write-files=1\|0] [--db-sync=1\|0] [--metrics=1\|0] [--path=path] [--limit=number]` |
| `aiops:command-index` | Scan and classify Spark commands for AIOps governance. | `php spark aiops:command-index [--json] [--notify] [--db]` |
| `aiops:continue` | Operational audit (server + runtime focus) | `php spark aiops:continue` |
| `aiops:copilot:validate` | Validate copilot instructions and Spark command safety rules. | `php spark aiops:copilot:validate [--json] [--notify] [--db]` |
| `aiops:db:slow_scan` | Scan logs for slow query markers (best-effort) | `php spark aiops:db:slow_scan` |
| `aiops:diff:format` | Generate a real unified diff from current working tree | `php spark aiops:diff:format` |
| `aiops:email-scan` | Scan alerts mailbox for new emails and record AIOps counts. | `php spark aiops:email-scan [--mailbox=INBOX] [--from=alerts@mymiwallet.com] [--since=YYYY-MM-DD] [--lookback-days=2] [--limit=250] [--dry-run]` |
| `aiops:gate:cost` | Enforce daily AI cost cap; auto-disable AiOps LLM when threshold exceeded | `php spark aiops:gate:cost` |
| `aiops:governance:analyze` | Analyze token usage + model anomalies | `php spark aiops:governance:analyze` |
| `aiops:health:full` | Run full system health checks and generate a consolidated report | `php spark aiops:health:full` |
| `aiops:init` | Initialize and validate the AIOps PR factory (one-time or rare use). | `php spark aiops:init` |
| `aiops:manual-run` | Run manual-priority AIOPS correlation, state refresh, and PR creation. | `php spark aiops:manual-run [--dry-run=1\|0] [--limit-tasks=1] [--limit-errors=3] [--only=file.md] [--write-state=1\|0] [--create-pr=1\|0] [--notify=1\|0]` |
| `aiops:manual:index` | Index AI manual documentation under docs/_aiops/manual | `php spark aiops:manual:index` |
| `aiops:n8n:logs` | Tail n8n logs | `php spark aiops:n8n:logs` |
| `aiops:n8n:restart` | Restart n8n | `php spark aiops:n8n:restart` |
| `aiops:n8n:start` | Start n8n | `php spark aiops:n8n:start` |
| `aiops:n8n:stop` | Stop n8n | `php spark aiops:n8n:stop` |
| `aiops:observe` | Parse logs and detect recurring error signatures | `php spark aiops:observe` |
| `aiops:observe:cost` | Correlate observability signals with AI cost logs | `php spark aiops:observe:cost` |
| `aiops:observe:hash` | Fingerprint recurring errors into stable hashes | `php spark aiops:observe:hash` |
| `aiops:observe:map` | Map errors to routes and controllers | `php spark aiops:observe:map` |
| `aiops:observe:patch` | Create patch file from suggestions | `php spark aiops:observe:patch` |
| `aiops:observe:regression` | Detect fingerprint regressions vs previous snapshot | `php spark aiops:observe:regression` |
| `aiops:observe:scan` | Scan logs and persist recurring errors | `php spark aiops:observe:scan` |
| `aiops:observe:snapshot` | Snapshot fingerprint map for regression detection | `php spark aiops:observe:snapshot` |
| `aiops:observe:suggest` | Generate fix suggestions for recurring errors | `php spark aiops:observe:suggest` |
| `aiops:patch:apply` | Safely apply AI-generated patch under guardrails | `php spark aiops:patch:apply` |
| `aiops:patch:dry_run` | Apply patch in temporary branch | `php spark aiops:patch:dry_run` |
| `aiops:patch:hallucination` | Detect hallucinated symbols in aiops_generated_patch.diff before apply | `php spark aiops:patch:hallucination` |
| `aiops:patch:risk_score` | Calculate patch risk score | `php spark aiops:patch:risk_score` |
| `aiops:patch:validate` | Validate PHP syntax after patch apply | `php spark aiops:patch:validate` |
| `aiops:pr:auto` | Full safe pipeline: observe → validate → regression → PR | `php spark aiops:pr:auto` |
| `aiops:pr:create` | Create a branch, push, and open a PR (requires token + enabled flags) | `php spark aiops:pr:create` |
| `aiops:public-pages:audit` | Audit public pages schema coverage, freshness, and governance conditions. | `php spark aiops:public-pages:audit` |
| `aiops:public-pages:import` | Import docs/_aiops/inputs/public_pages.csv into bf_public_pages_catalog. | `php spark aiops:public-pages:import` |
| `aiops:public-pages:report` | Generate report artifacts for a public pages run. | `php spark aiops:public-pages:report` |
| `aiops:public-pages:run` | Run public pages source collection and draft generation. | `php spark aiops:public-pages:run` |
| `aiops:redis:stats` | Fetch Redis INFO stats (best-effort) | `php spark aiops:redis:stats` |
| `aiops:repair` | Apply safe aiops repairs | `php spark aiops:repair` |
| `aiops:repair:run` | Full autonomous repair pipeline | `php spark aiops:repair:run` |
| `aiops:repair:run_safe` | Run repair pipeline with rollback safety + gating before PR | `php spark aiops:repair:run_safe` |
| `aiops:rollback` | Rollback working tree to clean state (hard reset) | `php spark aiops:rollback` |
| `aiops:routes:compare` | Compare staging vs production routes scan | `php spark aiops:routes:compare` |
| `aiops:routes:gate` | Gate based on routes_scan.json thresholds | `php spark aiops:routes:gate` |
| `aiops:routes:regress` | Detect route scan regressions vs previous snapshot | `php spark aiops:routes:regress` |
| `aiops:routes:scan` | Scan Routes.php (GET routes), parallel curl, write JSON+CSV+snapshot | `php spark aiops:routes:scan` |
| `aiops:routes:scan_auth` | Authenticated scan using AIOPS_AUTH_COOKIE | `php spark aiops:routes:scan_auth` |
| `aiops:run` | Manually run the AI-Ops worker and generate docs/_aiops reports | `php spark aiops:run [--mode=manual\|nightly] [--dry-run]` |
| `aiops:scan:cells` | Stateful scanner for repeated UI blocks and Cell candidates. | `php spark aiops:scan:cells [--dry-run=1] [--sleep=900] [--batch=5] [--max-prs=1] [--write-pr=0] [--once=0] [--reset=0]` |
| `aiops:seed` | Seed default AI Ops caps and pricing configuration. | `php spark aiops:seed` |
| `aiops:self-heal` | Run one-pass self-heal | `php spark aiops:self-heal` |
| `aiops:status` | AIOps runtime status | `php spark aiops:status` |
| `aiops:sync-perf` | Scan Routes.php and sync perf_urls.txt automatically | `php spark aiops:sync-perf` |
| `aiops:unlock` | Manually unlock an AIOPS patch job and reset retries. | `php spark aiops:unlock {jobId}` |
| `aiops:watch` | Continuous aiops audit watcher | `php spark aiops:watch` |
| `alerts:audit` | Audit recent scraped alert emails against generated trade alerts. | `php spark alerts:audit` |
| `alerts:parse-test` | Parse a broker email sample and output normalized execution data. | `php spark alerts:parse-test [file] [subject] [--dry-run]` |
| `api:audit` | Audit API endpoints defined in docs/api/schematic.yaml and capture runtime health. | `php spark api:audit` |
| `app:compat-audit` | Audit MyMI Wallet for CI4 + PHP compatibility issues. | `php spark app:compat-audit [--fix] [--php=8.2] [--json=path] [--csv=path]` |
| `app:gate:coverage` | Gate on PHPUnit coverage if available (coverage-text). | `php spark app:gate:coverage` |
| `app:healthcheck` | Compatibility healthcheck command aligned to AI-Ops spark checks. | `php spark app:healthcheck` |
| `app:test` | Run PHPUnit test suite | `php spark app:test` |
| `app:update` | Deprecated. Use ops:app:update instead. | `php spark app:update (deprecated)` |
| `audit:all` | Full system visibility audit | `php spark audit:all` |
| `audit:node` | Detect tracked node_modules and native build artifacts (read-only). | `php spark audit:node` |
| `audit:psr4` | Audit PSR-4 compliance for the app namespace. | `php spark audit:psr4` |
| `auth:audit` | Audit Myth:Auth authentication and account lifecycle flows end-to-end, including registration, login, and reset flows. | `php spark auth:audit` |
| `auth:flow-smoke` | Smoke test for auth redirect safety and login route no-cache headers. | `php spark auth:flow-smoke` |
| `auth:funnel-check` | Check auth funnel sanity using recent user events and emit alerts on drop-offs. | `php spark auth:funnel-check` |
| `auth:smoke` | Run a safe authentication smoke test and record health results for ops visibility. | `php spark auth:smoke` |
| `auth:smoke-test` | Deterministic Myth/Auth smoke test for login/session/reset flow. | `php spark auth:smoke-test` |
| `cache:audit` | Scan the repo for unsafe cache key usage. | `php spark cache:audit` |
| `chat:audit` | Chat audit | `php spark chat:audit` |
| `chat:logs` | Tail persisted chat logs from writable/logs/chat. | `php spark chat:logs` |
| `chat:repair` | Chat repairs | `php spark chat:repair` |
| `chat:restart` | Restart chat | `php spark chat:restart` |
| `chat:start` | Start chat | `php spark chat:start` |
| `chat:status` | Chat status with PID and listening-port verification. | `php spark chat:status` |
| `chat:stop` | Stop chat | `php spark chat:stop` |
| `chat:unlock` | Safely clear stale chat runtime lock and pid files. | `php spark chat:unlock [--force] [--json]` |
| `codex:audit` | Full repository audit via OpenAI | `php spark codex:audit` |
| `codex:continue` | Continue audit in batches (default 5 files) with OpenAI + severity tracking | `php spark codex:continue` |
| `codex:gate` | Fail build if high severity issues exist | `php spark codex:gate` |
| `codex:gate:severity` | Fail if severity counters exceed thresholds | `php spark codex:gate:severity` |
| `codex:index` | Index repository and initialize audit state | `php spark codex:index` |
| `codex:instruct:audit` | Batch review repository files via OpenAI API | `php spark codex:instruct:audit` |
| `codex:instruct:devops_review` | Generate instruction payload to audit AI DevOps layer against docs/* | `php spark codex:instruct:devops_review` |
| `codex:instruct:summarize` | Generate structured AI documentation summary template | `php spark codex:instruct:summarize` |
| `codex:review` | Generate Codex review artifacts (summary + prompt payload) | `php spark codex:review` |
| `codex:review:commit` | Commit Codex review artifacts intentionally (latest or by date). | `php spark codex:review:commit --latest\|--date=YYYY-MM-DD [--dry-run] [--approve]` |
| `codex:review:list` | List available Codex review artifacts stored under docs. | `php spark codex:review:list [--limit=5] [--latest]` |
| `codex:review:pr-outbox` | Review the latest PR outbox bundle and publish CODEX_REVIEW.md. | `php spark codex:review:pr-outbox [--dry-run]` |
| `codex:review:publish` | Aggregate governance lint results and publish review artifacts. | `php spark codex:review:publish [--dry-run]` |
| `codex:status` | Show audit status | `php spark codex:status` |
| `config:drift` | Compare deployed config and environment to repo baselines. | `php spark config:drift [--emit=docs] [--out=path] [--dry-run] [--approve]` |
| `config:lint` | Lint Config/Services.php overrides against CI4 service signatures. | `php spark config:lint` |
| `content:ingest-sample` | Load sample Daily Top Gainers JSON, ingest, score, and print the top 5 ideas. | `php spark content:ingest-sample` |
| `contentengine:smoke` | End-to-end smoke test for the Content Engine ingest → scoring → drafts pipeline. | `php spark contentengine:smoke` |
| `db:apply-docs` | Compile SQL from docs/mysql and apply statements with audit logging. | `php spark db:apply-docs [db-group] [--dry-run]` |
| `db:drift` | Compare live schema to expected inventory. | `php spark db:drift [--emit=docs] [--out=path] [--dry-run] [--approve]` |
| `db:inventory` | Scan code and migrations to inventory MyMI Wallet tables and generate integrity docs/SQL adjustments. | `php spark db:inventory [write-docs] [write-sql] [limit] [db-group] [--dry-run]` |
| `discord:list` | List configured Discord channels/webhooks/IDs from config and database. | `php spark discord:list` |
| `discord:process-queue` | Process queued Discord messages respecting quiet hours and pacing. | `php spark discord:process-queue [limit] [--dry-run] [--approve]` |
| `discord:test` | Send a test payload through the Discord queue pipeline. | `php spark discord:test` |
| `discord:test-liquidity` | Send a test Liquidity Scan alert to alerts.liquidity channel | `php spark discord:test-liquidity` |
| `discord:wire-check` | Validate Discord env vars, tables, and queue health for MyMIDiscord. | `php spark discord:wire-check` |
| `dreamhost:dns-verify` | Ops helper command: dreamhost:dns-verify | `php spark dreamhost:dns-verify` |
| `dreamhost:email-audit` | Ops helper command: dreamhost:email-audit | `php spark dreamhost:email-audit` |
| `dreamhost:email-list` | Ops helper command: dreamhost:email-list | `php spark dreamhost:email-list` |
| `dreamhost:limits` | Ops helper command: dreamhost:limits | `php spark dreamhost:limits` |
| `email:healthcheck` | Ops helper command: email:healthcheck | `php spark email:healthcheck` |
| `email:queue-scan` | Ops helper command: email:queue-scan | `php spark email:queue-scan` |
| `email:test` | Send a test email using the current SMTP configuration. | `php spark email:test` |
| `email:test` | Ops helper command: email:test | `php spark email:test` |
| `env:doctor` | Environment diagnostics and snapshot. | `php spark env:doctor` |
| `fix:503` | Diagnose and attempt safe auto-fixes for 503 errors. | `php spark fix:503 [--dry-run] [--approve]` |
| `forecasts:evaluate` | Evaluate forecasts for accuracy windows. | `php spark forecasts:evaluate [limit] [--dry-run]` |
| `forecasts:refresh` | Refresh forecasts for open alerts. | `php spark forecasts:refresh [limit] [--dry-run] [--approve]` |
| `gap:sync` | Enrich gap tracker CSV and produce a report. | `php spark gap:sync [limit] [priority] [--dry-run] [--report-only]` |
| `github:search` | Search the local git repository for a given string or pattern. | `php spark github:search` |
| `growth:retention-watch` | Detect retention anomalies from engagement signals. | `php spark growth:retention-watch [--emit=docs] [--out=path] [--dry-run] [--approve]` |
| `health:cache` | Check CI4 writable cache directories for access. | `php spark health:cache` |
| `health:disk` | Check disk and inode usage for the host. | `php spark health:disk` |
| `health:git-safety` | Check git ignore rules for env/writable and tracked secrets. | `php spark health:git-safety` |
| `health:services` | Detect web server + PHP handler status without systemctl. | `php spark health:services` |
| `investments:economy:updateall` | Fetch and store economic indicators from FRED into local tables. | `php spark investments:economy:updateall` |
| `keys:generate` | Generate a cryptographically secure encryption key. | `php spark keys:generate [bits]` |
| `keys:generate-ci4` | Generate and rotate CodeIgniter 4 encryption.key | `php spark keys:generate-ci4 [bits]` |
| `logs:full-report` | Summarize CI4 + Apache + PHP logs for a given date. | `php spark logs:full-report [today\|yesterday\|YYYY-MM-DD] [--save] [--fix-hints] [--discord]` |
| `logs:healthcheck` | Emit test logs and verify file + DB log sinks are functioning. | `php spark logs:healthcheck` |
| `logs:scan` | Ops helper command: logs:scan | `php spark logs:scan` |
| `logs:summarize` | Summarize CI4 logs for a given date, including new entries since the last run. | `php spark logs:summarize [date\|yesterday] [--dry-run] [--json]` |
| `logs:summarize-all` | Summarize logs for all known subsystems from writable/logs/** and emit docs/_aiops/logs markdown reports. | `php spark logs:summarize-all [--json]` |
| `logs:test` | Canonical logging test command (writes debug/info/error and validates file + DB sinks). | `php spark logs:test` |
| `logs:watch` | Ops helper command: logs:watch | `php spark logs:watch` |
| `mail:send` | Process and send queued mail jobs. | `php spark mail:send [limit] [--dry-run] [--approve]` |
| `mail:send-test` | Send a test email using branded templates. | `php spark mail:send-test [to] [template] [--dry-run]` |
| `mail:test` | Send a DreamHost SMTP test email and output transport diagnostics. | `php spark mail:test` |
| `mail:verify` | Verify SMTP settings by sending a diagnostic email. | `php spark mail:verify you@example.com` |
| `marketing:automation-audit` | Verify marketing automations, cron hooks, and API usage expectations. | `php spark marketing:automation-audit [--emit=docs] [--out=path] [--dry-run] [--approve]` |
| `mdit:nav:compute_daily` | Compute and snapshot the daily MDIT NAV. | `php spark mdit:nav:compute_daily [cash_value] [equities_value]` |
| `migrate:dry-run` | List pending migrations without executing them. | `php spark migrate:dry-run` |
| `news:audit` | Audit recent marketing news ingestion, summarization, and post generation. | `php spark news:audit` |
| `ops:alerts:ingest` | Ingest ThinkorSwim alert emails and upsert trade alerts. | `php spark ops:alerts:ingest [--since=15m\|1h\|today] [--limit=200] [--dry-run] [--verbose]` |
| `ops:analyze-commands` | Analyze parsed ops inbox items and generate AI plans | `php spark ops:analyze-commands` |
| `ops:app:update` | Safely update and validate the CI4 application. | `php spark ops:app:update [--dry-run] [--strict] [--migrate] [--migrate-only] [--no-api] [--no-aiops] [--json]` |
| `ops:ci:prepare` | Prepare deterministic writable/artifact directories for CI runs. | `php spark ops:ci:prepare` |
| `ops:commands:audit` | Audit Spark commands for illegal constructors. | `php spark ops:commands:audit` |
| `ops:commands:autofix` | Auto-fix Spark commands that define illegal constructors. | `php spark ops:commands:autofix [--dry-run] [--approve]` |
| `ops:commands:inventory` | Generate Spark command inventory from Console.php and command files. | `php spark ops:commands:inventory [--emit=docs] [--out=path] [--dry-run] [--approve]` |
| `ops:commands:lint` | Lint Spark commands for runtime safety contracts and documentation coverage. | `php spark ops:commands:lint [--json]` |
| `ops:config:lint` | Lint Config files for illegal patterns (env(), dynamic expressions, protocols). | `php spark ops:config:lint` |
| `ops:config:reset` | Clear config-related caches after config changes. | `php spark ops:config:reset` |
| `ops:fetch-commands` | Fetch unread ops commands from IMAP and store them in bf_ops_command_inbox | `php spark ops:fetch-commands` |
| `ops:filesystem-scan` | Ops helper command: ops:filesystem-scan | `php spark ops:filesystem-scan` |
| `ops:filesystem:fix` | Auto-fix filesystem governance violations | `php spark ops:filesystem:fix` |
| `ops:filesystem:lint` | Lint and optionally auto-fix filesystem governance violations. | `php spark ops:filesystem:lint [--fix] [--report] [--json]` |
| `ops:healthcheck` | Ops helper command: ops:healthcheck | `php spark ops:healthcheck` |
| `ops:next-steps` | Generate next-steps issues from audit commands and write docs/snapshots. | `php spark ops:next-steps [--emit=docs\|db\|both] [--date=YYYY-MM-DD] [--dry-run] [--approve]` |
| `ops:next-steps:sync` | Diff latest snapshots and queue net-new issues. | `php spark ops:next-steps:sync [--emit=docs] [--out=path] [--dry-run] [--approve]` |
| `ops:next-steps:sync-manual` | Sync manual TODOs from docs/_aiops/next-steps.md into the database. | `php spark ops:next-steps:sync-manual [--dry-run]` |
| `ops:nginx-status` | Ops helper command: ops:nginx-status | `php spark ops:nginx-status` |
| `ops:php-fpm-health` | Ops helper command: ops:php-fpm-health | `php spark ops:php-fpm-health` |
| `ops:propose-pr` | Generate and validate a PR artifact bundle, then export to tracked outbox for GitHub automation. | `php spark ops:propose-pr --slug=... --title=... --body=... --patch=... [--risk=low\|medium\|high] [--approve] [--dry-run]` |
| `ops:report` | Ops helper command: ops:report | `php spark ops:report` |
| `ops:self-heal` | Ops helper command: ops:self-heal | `php spark ops:self-heal` |
| `ops:spark-reset` | Purge Spark command cache and rebuild autoloads safely. | `php spark ops:spark-reset` |
| `ops:spark-reset` | Reset Spark-related caches and metadata (guarded). | `php spark ops:spark-reset [--emit=docs] [--out=path] [--dry-run] [--approve]` |
| `ops:subs:audit` | Run subsystem audits | `php spark ops:subs:audit` |
| `ops:subs:doctor` | Friendly subsystem triage | `php spark ops:subs:doctor` |
| `ops:subs:repair` | Run subsystem repairs | `php spark ops:subs:repair` |
| `ops:subs:status` | Combined subsystem status | `php spark ops:subs:status` |
| `ops:work` | Process AiOps task queue items safely. | `php spark ops:work [limit] [--lock=minutes] [--dry-run]` |
| `optimize:safe` | Run CI4 optimize safely (CI-only) | `php spark optimize:safe` |
| `perf:k6` | Run k6 load test | `php spark perf:k6` |
| `revenue:cost-forecast` | Forecast infra and API costs and detect overruns. | `php spark revenue:cost-forecast [--emit=docs] [--out=path] [--dry-run] [--approve]` |
| `revenue:scan` | Scan the repository for monetizable features and generate revenue stream docs. | `php spark revenue:scan` |
| `routes:auth-audit` | Audit public routes for unauthenticated access regressions. | `php spark routes:auth-audit` |
| `runtime:cache-boot` | Validate cache boot health and warm critical cache keys. | `php spark runtime:cache-boot [--emit=docs] [--out=path] [--dry-run] [--approve]` |
| `runtime:check` | Validate runtime invariants (nginx, php, permissions, etc.). | `php spark runtime:check` |
| `runtime:diagnose-502` | Diagnose and optionally remediate 502/503 gateway errors | `php spark runtime:diagnose-502 [--approve]` |
| `runtime:spark-doctor` | Validate Spark command discovery and CI4 compatibility | `php spark runtime:spark-doctor` |
| `runtime:spark-doctor` | Validate Spark command discovery and CI4 compatibility (runtime scope). | `php spark runtime:spark-doctor [--emit=docs] [--out=path] [--dry-run] [--approve]` |
| `runtime:triage` | Consolidate runtime diagnostics into a single report. | `php spark runtime:triage [--emit=docs] [--out=path] [--dry-run] [--approve]` |
| `scraper:audit-emails` | Audit recent trade and news emails against the expected scraper schema. | `php spark scraper:audit-emails [limit] [--limit=25]` |
| `security:csp:audit` | Scan view templates for CSP-unsafe inline scripts, styles, and handlers. | `php spark security:csp:audit` |
| `security:secrets-audit` | Detect sensitive secrets in configs, logs, or docs. | `php spark security:secrets-audit [--emit=docs] [--out=path] [--dry-run] [--approve]` |
| `spark:diagnose-503` | Diagnose common 503 causes (cache, maintenance filter, upstream, writable). | `php spark spark:diagnose-503 [--discord]` |
| `spark:doctor` | System health inspector for Spark commands. | `php spark spark:doctor [--json] [--notify] [--db]` |
| `spark:fix` | Safely repair Spark command and cache issues. | `php spark spark:fix [--dry-run] [--approve] [--json] [--notify] [--db]` |
| `spark:fix` | Auto-heal Spark command standards and generate a fix report | `php spark spark:fix` |
| `spark:purge-fastcgi` | Detect and neutralize legacy FastCGI/php-pm socket references safely. | `php spark spark:purge-fastcgi [--approve]` |
| `spark:restart-safe` | Flush caches/sessions safely and guide a no-sudo restart flow on DreamHost. | `php spark spark:restart-safe [--hard] [--dry-run] [--approve]` |
| `spark:traffic-spike-guard` | Detect traffic/error spikes that commonly lead to 503 and alert Discord. | `php spark spark:traffic-spike-guard [--lines=500] [--threshold=15] [--discord]` |
| `test:redis` | Test Redis connection | `php spark test:redis` |
| `ux:journey-audit` | Validate critical user journeys (signup to dashboard flow checks). | `php spark ux:journey-audit [--emit=docs] [--out=path] [--dry-run] [--approve]` |
| `wallets:warm-summary-cache` | Pre-warm the /API/Wallets/summary cache for active users. | `php spark wallets:warm-summary-cache [user-id] [--dry-run] [--approve]` |

## Command Reference

### `aiops:*` commands

#### `aiops:alerts-check`
- **Class:** `App\Commands\AiOps\AlertsCheck`
- **Source:** `app/Commands/AiOps/AlertsCheck.php`
- **Purpose:** Fetch emails and queue them for processing
- **Usage:** `php spark aiops:alerts-check`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:alerts-clean`
- **Class:** `App\Commands\AiOps\AlertsClean`
- **Source:** `app/Commands/AiOps/AlertsClean.php`
- **Purpose:** Delete completed aiops alert queue rows older than 30 days
- **Usage:** `php spark aiops:alerts-clean`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:alerts-health`
- **Class:** `App\Commands\AiOps\AlertsHealth`
- **Source:** `app/Commands/AiOps/AlertsHealth.php`
- **Purpose:** Run health checks on aiops alert queue and notify if failures are high
- **Usage:** `php spark aiops:alerts-health`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:alerts-worker`
- **Class:** `App\Commands\AiOps\AlertsWorker`
- **Source:** `app/Commands/AiOps/AlertsWorker.php`
- **Purpose:** Process queued alert emails
- **Usage:** `php spark aiops:alerts-worker`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:api:schema`
- **Class:** `App\Commands\AiOps\API\SchemaValidate`
- **Source:** `app/Commands/AiOps/API/SchemeValidate.php`
- **Purpose:** Validate API endpoints return JSON (optionally check required keys)
- **Usage:** `php spark aiops:api:schema`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:audit`
- **Class:** `App\Commands\AiOps\Audit`
- **Source:** `app/Commands/AiOps/Audit.php`
- **Purpose:** Audit aiops runtime, orchestration routes, and n8n/docs readiness
- **Usage:** `php spark aiops:audit`
- **Arguments:** none declared.
- **Options:**
  - `--json` — Output JSON payload.

#### `aiops:auto-run`
- **Class:** `App\Commands\AiOps\AutoRun`
- **Source:** `app/Commands/AiOps/AutoRun.php`
- **Purpose:** Run AIOPS using manual priorities first, falling back to log-driven auto priorities.
- **Usage:** `php spark aiops:auto-run [--dry-run=1\|0] [--limit-tasks=1] [--limit-errors=3] [--auto-threshold=CRITICAL\|ERROR] [--write-auto-tasks=1\|0] [--create-pr=1\|0] [--notify=1\|0] [--job-file=docs/_aiops/patch_jobs/<id>.md] [--force=1\|0]`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Evaluate only. No PR creation when enabled.
  - `--limit-tasks` — Max tasks per execution.
  - `--limit-errors` — Max signatures per task/PR batch.
  - `--auto-threshold` — Severity threshold for auto mode (CRITICAL\|ERROR).
  - `--write-auto-tasks` — Persist generated auto priority files when in auto mode.
  - `--create-pr` — Create PR branches + GitHub PRs for matching signatures.
  - `--notify` — Send Discord notifications (if configured).
  - `--job-file` — Optional patch job file under docs/_aiops/patch_jobs/.
  - `--force` — Regenerate patch output even when docs/_aiops/patches/{job_id}.diff exists

#### `aiops:backlog`
- **Class:** `App\Commands\AiOps\Backlog`
- **Source:** `app/Commands/AiOps/Backlog.php`
- **Purpose:** Reconcile outstanding AIOPS patch workflow jobs.
- **Usage:** `php spark aiops:backlog [--run=1\|0] [--force=1\|0]`
- **Arguments:** none declared.
- **Options:**
  - `--run` — Execute reconciliation actions for outstanding jobs.
  - `--force` — Force rerun for failed/partial jobs.

#### `aiops:build-command`
- **Class:** `App\Commands\AiOps\BuildCommand`
- **Source:** `app/Commands/AiOps/BuildCommand.php`
- **Purpose:** Generate a Spark command from text logic using AIOps
- **Usage:** `php spark aiops:build-command`
- **Arguments:**
  - `text` — Natural language logic definition
- **Options:** none declared.

#### `aiops:chat-gov-index`
- **Class:** `App\Commands\AiOps\ChatGovernanceIndex`
- **Source:** `app/Commands/AiOps/ChatGovernanceIndex.php`
- **Purpose:** Index ChatGPT governance steps from archived chats and sync CSV/DB outputs.
- **Usage:** `php spark aiops:chat-governance-index [--write-files=1\|0] [--db-sync=1\|0] [--metrics=1\|0] [--path=path] [--limit=number]`
- **Arguments:** none declared.
- **Options:**
  - `--write-files` — Write CSV/JSON outputs (default: config).
  - `--db-sync` — Sync results into MySQL tables (default: config).
  - `--metrics` — Write JSON metrics output (default: config).
  - `--path` — Override base path (default: docs/chatgpt/chats).
  - `--limit` — Limit number of files scanned.

#### `aiops:command-index`
- **Class:** `App\Commands\AiOps\CommandIndex`
- **Source:** `app/Commands/AiOps/CommandIndex.php`
- **Purpose:** Scan and classify Spark commands for AIOps governance.
- **Usage:** `php spark aiops:command-index [--json] [--notify] [--db]`
- **Arguments:** none declared.
- **Options:**
  - `--json` — Emit JSON output to stdout
  - `--notify` — Send summary notification via Discord or email
  - `--db` — Store index snapshot in aiops_command_index table

#### `aiops:continue`
- **Class:** `App\Commands\AiOps\ContinueAutdit`
- **Source:** `app/Commands/AiOps/ContinueAudit.php`
- **Purpose:** Operational audit (server + runtime focus)
- **Usage:** `php spark aiops:continue`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:copilot:validate`
- **Class:** `App\Commands\AiOps\CopilotValidate`
- **Source:** `app/Commands/AiOps/CopilotValidate.php`
- **Purpose:** Validate copilot instructions and Spark command safety rules.
- **Usage:** `php spark aiops:copilot:validate [--json] [--notify] [--db]`
- **Arguments:** none declared.
- **Options:**
  - `--json` — Emit JSON output to stdout
  - `--notify` — Send summary notification via Discord or email
  - `--db` — Store JSON snapshot in aiops_command_snapshots table
  - `--ci` — Force CI-safe mode (no external network or DB persistence)

#### `aiops:db:slow_scan`
- **Class:** `App\Commands\AiOps\DB\SlowScan`
- **Source:** `app/Commands/AiOps/DB/SlowScan.php`
- **Purpose:** Scan logs for slow query markers (best-effort)
- **Usage:** `php spark aiops:db:slow_scan`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:diff:format`
- **Class:** `App\Commands\AiOps\DiffFormat`
- **Source:** `app/Commands/AiOps/DiffFormat.php`
- **Purpose:** Generate a real unified diff from current working tree
- **Usage:** `php spark aiops:diff:format`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:email-scan`
- **Class:** `App\Commands\AiOps\EmailScan`
- **Source:** `app/Commands/AiOps/EmailScan.php`
- **Purpose:** Scan alerts mailbox for new emails and record AIOps counts.
- **Usage:** `php spark aiops:email-scan [--mailbox=INBOX] [--from=alerts@mymiwallet.com] [--since=YYYY-MM-DD] [--lookback-days=2] [--limit=250] [--dry-run]`
- **Arguments:** none declared.
- **Options:**
  - `--mailbox` — IMAP mailbox folder (default: INBOX).
  - `--from` — Filter by sender email address (default: alerts@mymiwallet.com).
  - `--since` — IMAP SINCE date in YYYY-MM-DD format (overrides lookback-days).
  - `--lookback-days` — Number of days to look back when --since is not provided (default: 2).
  - `--limit` — Maximum number of emails to scan per run.
  - `--dry-run` — Preview counts without writing to the database.

#### `aiops:gate:cost`
- **Class:** `App\Commands\AiOps\GateCost`
- **Source:** `app/Commands/AiOps/GateCost.php`
- **Purpose:** Enforce daily AI cost cap; auto-disable AiOps LLM when threshold exceeded
- **Usage:** `php spark aiops:gate:cost`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:governance:analyze`
- **Class:** `App\Commands\AiOps\GovernanceAnalyze`
- **Source:** `app/Commands/AiOps/GovernanceAnalyze.php`
- **Purpose:** Analyze token usage + model anomalies
- **Usage:** `php spark aiops:governance:analyze`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:health:full`
- **Class:** `App\Commands\AiOps\HealthFull`
- **Source:** `app/Commands/AiOps/HealthFull.php`
- **Purpose:** Run full system health checks and generate a consolidated report
- **Usage:** `php spark aiops:health:full`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:init`
- **Class:** `App\Commands\AiOps\Init`
- **Source:** `app/Commands/AiOps/Init.php`
- **Purpose:** Initialize and validate the AIOps PR factory (one-time or rare use).
- **Usage:** `php spark aiops:init`
- **Arguments:** none declared.
- **Options:**
  - `--approve` — Required to export PR bundle to outbox.
  - `--dry-run` — Validate only, do not write files.

#### `aiops:manual-run`
- **Class:** `App\Commands\AiOps\ManualRun`
- **Source:** `app/Commands/AiOps/ManualRun.php`
- **Purpose:** Run manual-priority AIOPS correlation, state refresh, and PR creation.
- **Usage:** `php spark aiops:manual-run [--dry-run=1\|0] [--limit-tasks=1] [--limit-errors=3] [--only=file.md] [--write-state=1\|0] [--create-pr=1\|0] [--notify=1\|0]`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Evaluate only. No PR creation or writes when enabled.
  - `--limit-tasks` — Max tasks per execution.
  - `--limit-errors` — Max signatures per PR batch.
  - `--only` — Single priority file name to evaluate.
  - `--write-state` — Persist state files.
  - `--create-pr` — Create PR branches + GitHub PRs for matching signatures.
  - `--notify` — Send Discord notifications (if configured).

#### `aiops:manual:index`
- **Class:** `App\Commands\AiOps\ManualIndex`
- **Source:** `app/Commands/AiOps/ManualIndex.php`
- **Purpose:** Index AI manual documentation under docs/_aiops/manual
- **Usage:** `php spark aiops:manual:index`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:n8n:logs`
- **Class:** `App\Commands\AiOps\N8nLogs`
- **Source:** `app/Commands/AiOps/N8nLogs.php`
- **Purpose:** Tail n8n logs
- **Usage:** `php spark aiops:n8n:logs`
- **Arguments:** none declared.
- **Options:**
  - `--lines` — Lines
  - `--json` — JSON

#### `aiops:n8n:restart`
- **Class:** `App\Commands\AiOps\N8nRestart`
- **Source:** `app/Commands/AiOps/N8nRestart.php`
- **Purpose:** Restart n8n
- **Usage:** `php spark aiops:n8n:restart`
- **Arguments:** none declared.
- **Options:**
  - `--json` — JSON
  - `--dry-run` — Dry

#### `aiops:n8n:start`
- **Class:** `App\Commands\AiOps\N8nStart`
- **Source:** `app/Commands/AiOps/N8nStart.php`
- **Purpose:** Start n8n
- **Usage:** `php spark aiops:n8n:start`
- **Arguments:** none declared.
- **Options:**
  - `--json` — JSON
  - `--dry-run` — Dry

#### `aiops:n8n:stop`
- **Class:** `App\Commands\AiOps\N8nStop`
- **Source:** `app/Commands/AiOps/N8nStop.php`
- **Purpose:** Stop n8n
- **Usage:** `php spark aiops:n8n:stop`
- **Arguments:** none declared.
- **Options:**
  - `--json` — JSON
  - `--dry-run` — Dry

#### `aiops:observe`
- **Class:** `App\Commands\AiOps\Observe`
- **Source:** `app/Commands/AiOps/Observe.php`
- **Purpose:** Parse logs and detect recurring error signatures
- **Usage:** `php spark aiops:observe`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:observe:cost`
- **Class:** `App\Commands\AiOps\Observe\Cost`
- **Source:** `app/Commands/AiOps/Observe/Cost.php`
- **Purpose:** Correlate observability signals with AI cost logs
- **Usage:** `php spark aiops:observe:cost`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:observe:hash`
- **Class:** `App\Commands\AiOps\Observe\Hash`
- **Source:** `app/Commands/AiOps/Observe/Hash.php`
- **Purpose:** Fingerprint recurring errors into stable hashes
- **Usage:** `php spark aiops:observe:hash`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:observe:map`
- **Class:** `App\Commands\AiOps\Observe\Map`
- **Source:** `app/Commands/AiOps/Observe/Map.php`
- **Purpose:** Map errors to routes and controllers
- **Usage:** `php spark aiops:observe:map`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:observe:patch`
- **Class:** `App\Commands\AiOps\ObservePatch`
- **Source:** `app/Commands/AiOps/Observe/Patch.php`
- **Purpose:** Create patch file from suggestions
- **Usage:** `php spark aiops:observe:patch`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:observe:regression`
- **Class:** `App\Commands\AiOps\Observe\Regression`
- **Source:** `app/Commands/AiOps/Observe/Regression.php`
- **Purpose:** Detect fingerprint regressions vs previous snapshot
- **Usage:** `php spark aiops:observe:regression`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:observe:scan`
- **Class:** `App\Commands\AiOps\Observe\Scan`
- **Source:** `app/Commands/AiOps/Observe/Scan.php`
- **Purpose:** Scan logs and persist recurring errors
- **Usage:** `php spark aiops:observe:scan`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:observe:snapshot`
- **Class:** `App\Commands\AiOps\Observe\Snapshot`
- **Source:** `app/Commands/AiOps/Observe/Snapshot.php`
- **Purpose:** Snapshot fingerprint map for regression detection
- **Usage:** `php spark aiops:observe:snapshot`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:observe:suggest`
- **Class:** `App\Commands\AiOps\ObserveSuggest`
- **Source:** `app/Commands/AiOps/Observe/Suggest.php`
- **Purpose:** Generate fix suggestions for recurring errors
- **Usage:** `php spark aiops:observe:suggest`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:patch:apply`
- **Class:** `App\Commands\AiOps\Patch\Apply`
- **Source:** `app/Commands/AiOps/Patch/Apply.php`
- **Purpose:** Safely apply AI-generated patch under guardrails
- **Usage:** `php spark aiops:patch:apply`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:patch:dry_run`
- **Class:** `App\Commands\AiOps\Patch\DryRun`
- **Source:** `app/Commands/AiOps/Patch/DryRun.php`
- **Purpose:** Apply patch in temporary branch
- **Usage:** `php spark aiops:patch:dry_run`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:patch:hallucination`
- **Class:** `App\Commands\AiOps\Patch\Hallucination`
- **Source:** `app/Commands/AiOps/Patch/Hallucination.php`
- **Purpose:** Detect hallucinated symbols in aiops_generated_patch.diff before apply
- **Usage:** `php spark aiops:patch:hallucination`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:patch:risk_score`
- **Class:** `App\Commands\AiOps\Patch\RiskScore`
- **Source:** `app/Commands/AiOps/Patch/RiskScore.php`
- **Purpose:** Calculate patch risk score
- **Usage:** `php spark aiops:patch:risk_score`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:patch:validate`
- **Class:** `App\Commands\AiOps\Validate`
- **Source:** `app/Commands/AiOps/Patch/Validate.php`
- **Purpose:** Validate PHP syntax after patch apply
- **Usage:** `php spark aiops:patch:validate`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:pr:auto`
- **Class:** `App\Commands\AiOps\PRAuto`
- **Source:** `app/Commands/AiOps/PRAuto.php`
- **Purpose:** Full safe pipeline: observe → validate → regression → PR
- **Usage:** `php spark aiops:pr:auto`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:pr:create`
- **Class:** `App\Commands\AiOps\PRCreate`
- **Source:** `app/Commands/AiOps/PRCreate.php`
- **Purpose:** Create a branch, push, and open a PR (requires token + enabled flags)
- **Usage:** `php spark aiops:pr:create`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:public-pages:audit`
- **Class:** `App\Commands\AiOps\PublicPagesAudit`
- **Source:** `app/Commands/AiOps/PublicPagesAudit.php`
- **Purpose:** Audit public pages schema coverage, freshness, and governance conditions.
- **Usage:** `php spark aiops:public-pages:audit`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:public-pages:import`
- **Class:** `App\Commands\AiOps\PublicPagesImport`
- **Source:** `app/Commands/AiOps/PublicPagesImport.php`
- **Purpose:** Import docs/_aiops/inputs/public_pages.csv into bf_public_pages_catalog.
- **Usage:** `php spark aiops:public-pages:import`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:public-pages:report`
- **Class:** `App\Commands\AiOps\PublicPagesReport`
- **Source:** `app/Commands/AiOps/PublicPagesReport.php`
- **Purpose:** Generate report artifacts for a public pages run.
- **Usage:** `php spark aiops:public-pages:report`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:public-pages:run`
- **Class:** `App\Commands\AiOps\PublicPagesRun`
- **Source:** `app/Commands/AiOps/PublicPagesRun.php`
- **Purpose:** Run public pages source collection and draft generation.
- **Usage:** `php spark aiops:public-pages:run`
- **Arguments:** none declared.
- **Options:**
  - `--due` — Process pages due in next 24h (default).
  - `--page_id` — Process a specific page_id.

#### `aiops:redis:stats`
- **Class:** `App\Commands\AiOps\Redis\Stats`
- **Source:** `app/Commands/AiOps/Redis/Stats.php`
- **Purpose:** Fetch Redis INFO stats (best-effort)
- **Usage:** `php spark aiops:redis:stats`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:repair`
- **Class:** `App\Commands\AiOps\Repair`
- **Source:** `app/Commands/AiOps/Repair.php`
- **Purpose:** Apply safe aiops repairs
- **Usage:** `php spark aiops:repair`
- **Arguments:** none declared.
- **Options:**
  - `--json` — JSON
  - `--dry-run` — Dry

#### `aiops:repair:run`
- **Class:** `App\Commands\AiOps\RepairRun`
- **Source:** `app/Commands/AiOps/RepairRun.php`
- **Purpose:** Full autonomous repair pipeline
- **Usage:** `php spark aiops:repair:run`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:repair:run_safe`
- **Class:** `App\Commands\AiOps\RepairRunSafe`
- **Source:** `app/Commands/AiOps/RepairRunSafe.php`
- **Purpose:** Run repair pipeline with rollback safety + gating before PR
- **Usage:** `php spark aiops:repair:run_safe`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:rollback`
- **Class:** `App\Commands\AiOps\Rollback`
- **Source:** `app/Commands/AiOps/Rollback.php`
- **Purpose:** Rollback working tree to clean state (hard reset)
- **Usage:** `php spark aiops:rollback`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:routes:compare`
- **Class:** `App\Commands\AiOps\Routes\Compare`
- **Source:** `app/Commands/AiOps/Routes/Compare.php`
- **Purpose:** Compare staging vs production routes scan
- **Usage:** `php spark aiops:routes:compare`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:routes:gate`
- **Class:** `App\Commands\AiOps\Routes\Gate`
- **Source:** `app/Commands/AiOps/Routes/Gate.php`
- **Purpose:** Gate based on routes_scan.json thresholds
- **Usage:** `php spark aiops:routes:gate`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:routes:regress`
- **Class:** `App\Commands\AiOps\Routes\Regress`
- **Source:** `app/Commands/AiOps/Routes/Regress.php`
- **Purpose:** Detect route scan regressions vs previous snapshot
- **Usage:** `php spark aiops:routes:regress`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:routes:scan`
- **Class:** `App\Commands\AiOps\Routes\Scan`
- **Source:** `app/Commands/AiOps/Routes/Scan.php`
- **Purpose:** Scan Routes.php (GET routes), parallel curl, write JSON+CSV+snapshot
- **Usage:** `php spark aiops:routes:scan`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:routes:scan_auth`
- **Class:** `App\Commands\AiOps\Routes\ScanAuth`
- **Source:** `app/Commands/AiOps/Routes/ScanAuth.php`
- **Purpose:** Authenticated scan using AIOPS_AUTH_COOKIE
- **Usage:** `php spark aiops:routes:scan_auth`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:run`
- **Class:** `App\Commands\AiOps\Run`
- **Source:** `app/Commands/AiOps/Run.php`
- **Purpose:** Manually run the AI-Ops worker and generate docs/_aiops reports
- **Usage:** `php spark aiops:run [--mode=manual\|nightly] [--dry-run]`
- **Arguments:** none declared.
- **Options:**
  - `--mode` — Run mode (manual\|nightly). Default: manual
  - `--dry-run` — Validate paths and configuration without executing the worker
  - `--job-file` — Optional patch job file under docs/_aiops/patch_jobs/
  - `--force` — Regenerate patch output even when docs/_aiops/patches/{job_id}.diff exists

#### `aiops:scan:cells`
- **Class:** `App\Commands\AiOps\ScanCells`
- **Source:** `app/Commands/AiOps/ScanCells.php`
- **Purpose:** Stateful scanner for repeated UI blocks and Cell candidates.
- **Usage:** `php spark aiops:scan:cells [--dry-run=1] [--sleep=900] [--batch=5] [--max-prs=1] [--write-pr=0] [--once=0] [--reset=0]`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — 1\|0 default 1
  - `--sleep` — seconds between cycles (default 900)
  - `--batch` — queue items per cycle (default 5)
  - `--max-prs` — max PR actions per cycle (default 1)
  - `--write-pr` — 1\|0 enable phase 2 patching/PR fallback write
  - `--once` — 1\|0 run single cycle then exit
  - `--reset` — 1\|0 reset scanner queue and state before running

#### `aiops:seed`
- **Class:** `App\Commands\AiOps\Seed`
- **Source:** `app/Commands/AiOps/Seed.php`
- **Purpose:** Seed default AI Ops caps and pricing configuration.
- **Usage:** `php spark aiops:seed`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without writing to the database

#### `aiops:self-heal`
- **Class:** `App\Commands\AiOps\SelfHeal`
- **Source:** `app/Commands/AiOps/SelfHeal.php`
- **Purpose:** Run one-pass self-heal
- **Usage:** `php spark aiops:self-heal`
- **Arguments:** none declared.
- **Options:**
  - `--attempts` — max 3
  - `--json` — JSON

#### `aiops:status`
- **Class:** `App\Commands\AiOps\Status`
- **Source:** `app/Commands/AiOps/Status.php`
- **Purpose:** AIOps runtime status
- **Usage:** `php spark aiops:status`
- **Arguments:** none declared.
- **Options:**
  - `--json` — JSON output

#### `aiops:sync-perf`
- **Class:** `App\Commands\AiOps\SyncPerfRoutes`
- **Source:** `app/Commands/AiOps/SyncPerfRoutes.php`
- **Purpose:** Scan Routes.php and sync perf_urls.txt automatically
- **Usage:** `php spark aiops:sync-perf`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:unlock`
- **Class:** `App\Commands\AiOps\Unlock`
- **Source:** `app/Commands/AiOps/Unlock.php`
- **Purpose:** Manually unlock an AIOPS patch job and reset retries.
- **Usage:** `php spark aiops:unlock {jobId}`
- **Arguments:** none declared.
- **Options:** none declared.

#### `aiops:watch`
- **Class:** `App\Commands\AiOps\Watch`
- **Source:** `app/Commands/AiOps/Watch.php`
- **Purpose:** Continuous aiops audit watcher
- **Usage:** `php spark aiops:watch`
- **Arguments:** none declared.
- **Options:**
  - `--interval` — Seconds
  - `--max-cycles` — 0 infinite
  - `--heal` — Run self-heal


### `alerts:*` commands

#### `alerts:audit`
- **Class:** `App\Commands\AlertsAudit`
- **Source:** `app/Commands/AlertsAudit.php`
- **Purpose:** Audit recent scraped alert emails against generated trade alerts.
- **Usage:** `php spark alerts:audit`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without writing audit artifacts

#### `alerts:parse-test`
- **Class:** `App\Commands\AlertsParseTest`
- **Source:** `app/Commands/AlertsParseTest.php`
- **Purpose:** Parse a broker email sample and output normalized execution data.
- **Usage:** `php spark alerts:parse-test [file] [subject] [--dry-run]`
- **Arguments:**
  - `file` — Path to the email file to parse.
  - `subject` — Optional subject line override.
- **Options:**
  - `--dry-run` — Preview actions without running parser


### `api:*` commands

#### `api:audit`
- **Class:** `App\Commands\API\ApiAudit`
- **Source:** `app/Commands/API/ApiAudit.php`
- **Purpose:** Audit API endpoints defined in docs/api/schematic.yaml and capture runtime health.
- **Usage:** `php spark api:audit`
- **Arguments:** none declared.
- **Options:** none declared.


### `app:*` commands

#### `app:compat-audit`
- **Class:** `App\Commands\CompatAudit`
- **Source:** `app/Commands/CompatAudit.php`
- **Purpose:** Audit MyMI Wallet for CI4 + PHP compatibility issues.
- **Usage:** `php spark app:compat-audit [--fix] [--php=8.2] [--json=path] [--csv=path]`
- **Arguments:** none declared.
- **Options:**
  - `--fix` — Attempt safe auto-fixes for deterministic replacements.
  - `--php` — Target PHP version for forward-compat assessment (default: current).
  - `--json` — Write JSON report to path (default: writable/compat-audit-<timestamp>.json).
  - `--csv` — Write CSV report to path (default: writable/compat-audit-<timestamp>.csv).

#### `app:gate:coverage`
- **Class:** `App\Commands\App\CoverageGate`
- **Source:** `app/Commands/App/CoverageGate.php`
- **Purpose:** Gate on PHPUnit coverage if available (coverage-text).
- **Usage:** `php spark app:gate:coverage`
- **Arguments:** none declared.
- **Options:** none declared.

#### `app:healthcheck`
- **Class:** `App\Commands\App\Healthcheck`
- **Source:** `app/Commands/App/Healthcheck.php`
- **Purpose:** Compatibility healthcheck command aligned to AI-Ops spark checks.
- **Usage:** `php spark app:healthcheck`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without writing data

#### `app:test`
- **Class:** `App\Commands\App\Test`
- **Source:** `app/Commands/App/Test.php`
- **Purpose:** Run PHPUnit test suite
- **Usage:** `php spark app:test`
- **Arguments:** none declared.
- **Options:** none declared.

#### `app:update`
- **Class:** `App\Commands\AppUpdate`
- **Source:** `app/Commands/AppUpdate.php`
- **Purpose:** Deprecated. Use ops:app:update instead.
- **Usage:** `php spark app:update (deprecated)`
- **Arguments:** none declared.
- **Options:** none declared.


### `audit:*` commands

#### `audit:all`
- **Class:** `App\Commands\Audit\All`
- **Source:** `app/Commands/Audit/All.php`
- **Purpose:** Full system visibility audit
- **Usage:** `php spark audit:all`
- **Arguments:** none declared.
- **Options:** none declared.

#### `audit:node`
- **Class:** `App\Commands\Audit\NodeAudit`
- **Source:** `app/Commands/Audit/NodeAudit.php`
- **Purpose:** Detect tracked node_modules and native build artifacts (read-only).
- **Usage:** `php spark audit:node`
- **Arguments:** none declared.
- **Options:** none declared.

#### `audit:psr4`
- **Class:** `App\Commands\AuditPsr4`
- **Source:** `app/Commands/AuditPsr4.php`
- **Purpose:** Audit PSR-4 compliance for the app namespace.
- **Usage:** `php spark audit:psr4`
- **Arguments:** none declared.
- **Options:**
  - `--ci` — Exit non-zero if violations are detected.
  - `--json` — Output JSON instead of CLI formatting.
  - `--dry-run` — Preview actions without writing data


### `auth:*` commands

#### `auth:audit`
- **Class:** `App\Commands\Auth\Audit`
- **Source:** `app/Commands/Auth/Audit.php`
- **Purpose:** Audit Myth:Auth authentication and account lifecycle flows end-to-end, including registration, login, and reset flows.
- **Usage:** `php spark auth:audit`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without writing data

#### `auth:flow-smoke`
- **Class:** `App\Commands\Auth\FlowSmoke`
- **Source:** `app/Commands/Auth/FlowSmoke.php`
- **Purpose:** Smoke test for auth redirect safety and login route no-cache headers.
- **Usage:** `php spark auth:flow-smoke`
- **Arguments:** none declared.
- **Options:** none declared.

#### `auth:funnel-check`
- **Class:** `App\Commands\Auth\FunnelCheck`
- **Source:** `app/Commands/Auth/FunnelCheck.php`
- **Purpose:** Check auth funnel sanity using recent user events and emit alerts on drop-offs.
- **Usage:** `php spark auth:funnel-check`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without writing data

#### `auth:smoke`
- **Class:** `App\Commands\Auth\Smoke`
- **Source:** `app/Commands/Auth/Smoke.php`
- **Purpose:** Run a safe authentication smoke test and record health results for ops visibility.
- **Usage:** `php spark auth:smoke`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without writing data

#### `auth:smoke-test`
- **Class:** `App\Commands\Auth\SmokeTest`
- **Source:** `app/Commands/Auth/SmokeTest.php`
- **Purpose:** Deterministic Myth/Auth smoke test for login/session/reset flow.
- **Usage:** `php spark auth:smoke-test`
- **Arguments:** none declared.
- **Options:**
  - `--json` — Output machine-readable JSON only


### `cache:*` commands

#### `cache:audit`
- **Class:** `App\Commands\CacheAudit`
- **Source:** `app/Commands/CacheAudit.php`
- **Purpose:** Scan the repo for unsafe cache key usage.
- **Usage:** `php spark cache:audit`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without writing data


### `chat:*` commands

#### `chat:audit`
- **Class:** `App\Commands\Chat\Audit`
- **Source:** `app/Commands/Chat/Audit.php`
- **Purpose:** Chat audit
- **Usage:** `php spark chat:audit`
- **Arguments:** none declared.
- **Options:**
  - `--json` — JSON

#### `chat:logs`
- **Class:** `App\Commands\Chat\Logs`
- **Source:** `app/Commands/Chat/Logs.php`
- **Purpose:** Tail persisted chat logs from writable/logs/chat.
- **Usage:** `php spark chat:logs`
- **Arguments:** none declared.
- **Options:**
  - `--lines` — Number of lines to output (default: 200).
  - `--json` — Return JSON payload with per-file log sources.
  - `--since` — Filter by relative window (e.g. 5m, 2h, 1d).

#### `chat:repair`
- **Class:** `App\Commands\Chat\Repair`
- **Source:** `app/Commands/Chat/Repair.php`
- **Purpose:** Chat repairs
- **Usage:** `php spark chat:repair`
- **Arguments:** none declared.
- **Options:**
  - `--json` — JSON
  - `--dry-run` — Dry

#### `chat:restart`
- **Class:** `App\Commands\Chat\Restart`
- **Source:** `app/Commands/Chat/Restart.php`
- **Purpose:** Restart chat
- **Usage:** `php spark chat:restart`
- **Arguments:** none declared.
- **Options:**
  - `--json` — JSON
  - `--dry-run` — Dry

#### `chat:start`
- **Class:** `App\Commands\Chat\Start`
- **Source:** `app/Commands/Chat/Start.php`
- **Purpose:** Start chat
- **Usage:** `php spark chat:start`
- **Arguments:** none declared.
- **Options:**
  - `--json` — JSON
  - `--dry-run` — Dry

#### `chat:status`
- **Class:** `App\Commands\Chat\Status`
- **Source:** `app/Commands/Chat/Status.php`
- **Purpose:** Chat status with PID and listening-port verification.
- **Usage:** `php spark chat:status`
- **Arguments:** none declared.
- **Options:**
  - `--json` — JSON

#### `chat:stop`
- **Class:** `App\Commands\Chat\Stop`
- **Source:** `app/Commands/Chat/Stop.php`
- **Purpose:** Stop chat
- **Usage:** `php spark chat:stop`
- **Arguments:** none declared.
- **Options:**
  - `--json` — JSON
  - `--dry-run` — Dry

#### `chat:unlock`
- **Class:** `App\Commands\Chat\Unblock`
- **Source:** `app/Commands/Chat/Unblock.php`
- **Purpose:** Safely clear stale chat runtime lock and pid files.
- **Usage:** `php spark chat:unlock [--force] [--json]`
- **Arguments:** none declared.
- **Options:**
  - `--force` — Also kill a running process if PID exists (dangerous).
  - `--json` — Output JSON payload.


### `codex:*` commands

#### `codex:audit`
- **Class:** `App\Commands\Codex\Audit`
- **Source:** `app/Commands/Codex/Audit.php`
- **Purpose:** Full repository audit via OpenAI
- **Usage:** `php spark codex:audit`
- **Arguments:** none declared.
- **Options:** none declared.

#### `codex:continue`
- **Class:** `App\Commands\Codex\ContinueAudit`
- **Source:** `app/Commands/Codex/ContinueAudit.php`
- **Purpose:** Continue audit in batches (default 5 files) with OpenAI + severity tracking
- **Usage:** `php spark codex:continue`
- **Arguments:** none declared.
- **Options:** none declared.

#### `codex:gate`
- **Class:** `App\Commands\Codex\Gate`
- **Source:** `app/Commands/Codex/Gate.php`
- **Purpose:** Fail build if high severity issues exist
- **Usage:** `php spark codex:gate`
- **Arguments:** none declared.
- **Options:** none declared.

#### `codex:gate:severity`
- **Class:** `App\Commands\Codex\GateSeverity`
- **Source:** `app/Commands/Codex/GateSeverity.php`
- **Purpose:** Fail if severity counters exceed thresholds
- **Usage:** `php spark codex:gate:severity`
- **Arguments:** none declared.
- **Options:** none declared.

#### `codex:index`
- **Class:** `App\Commands\Codex\Index`
- **Source:** `app/Commands/Codex/Index.php`
- **Purpose:** Index repository and initialize audit state
- **Usage:** `php spark codex:index`
- **Arguments:** none declared.
- **Options:** none declared.

#### `codex:instruct:audit`
- **Class:** `App\Commands\Codex\Instructions\Audit`
- **Source:** `app/Commands/Codex/Instructions/Audit.php`
- **Purpose:** Batch review repository files via OpenAI API
- **Usage:** `php spark codex:instruct:audit`
- **Arguments:** none declared.
- **Options:** none declared.

#### `codex:instruct:devops_review`
- **Class:** `App\Commands\Codex\Instructions\DevOpsReview`
- **Source:** `app/Commands/Codex/Instructions/DevOpsReview.php`
- **Purpose:** Generate instruction payload to audit AI DevOps layer against docs/*
- **Usage:** `php spark codex:instruct:devops_review`
- **Arguments:** none declared.
- **Options:** none declared.

#### `codex:instruct:summarize`
- **Class:** `App\Commands\Codex\Instructions\Summarize`
- **Source:** `app/Commands/Codex/Instructions/Summarize.php`
- **Purpose:** Generate structured AI documentation summary template
- **Usage:** `php spark codex:instruct:summarize`
- **Arguments:** none declared.
- **Options:** none declared.

#### `codex:review`
- **Class:** `App\Commands\Codex\Review`
- **Source:** `app/Commands/Codex/Review.php`
- **Purpose:** Generate Codex review artifacts (summary + prompt payload)
- **Usage:** `php spark codex:review`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without writing output files

#### `codex:review:commit`
- **Class:** `App\Commands\Codex\ReviewCommit`
- **Source:** `app/Commands/Codex/ReviewCommit.php`
- **Purpose:** Commit Codex review artifacts intentionally (latest or by date).
- **Usage:** `php spark codex:review:commit --latest\|--date=YYYY-MM-DD [--dry-run] [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--latest` — Commit the latest review artifacts
  - `--date=YYYY-MM-DD` — Commit review artifacts for a specific date
  - `--dry-run` — Preview git commands without committing
  - `--approve` — Approve destructive changes (required for real commit)

#### `codex:review:list`
- **Class:** `App\Commands\Codex\ReviewList`
- **Source:** `app/Commands/Codex/ReviewList.php`
- **Purpose:** List available Codex review artifacts stored under docs.
- **Usage:** `php spark codex:review:list [--limit=5] [--latest]`
- **Arguments:** none declared.
- **Options:**
  - `--limit=5` — Limit the number of review files shown
  - `--latest` — Show only the latest review file

#### `codex:review:pr-outbox`
- **Class:** `App\Commands\Codex\ReviewPrOutbox`
- **Source:** `app/Commands/Codex/ReviewPrOutbox.php`
- **Purpose:** Review the latest PR outbox bundle and publish CODEX_REVIEW.md.
- **Usage:** `php spark codex:review:pr-outbox [--dry-run]`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview review output without writing.

#### `codex:review:publish`
- **Class:** `App\Commands\Codex\ReviewPublish`
- **Source:** `app/Commands/Codex/ReviewPublish.php`
- **Purpose:** Aggregate governance lint results and publish review artifacts.
- **Usage:** `php spark codex:review:publish [--dry-run]`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview payloads without writing artifacts

#### `codex:status`
- **Class:** `App\Commands\Codex\Status`
- **Source:** `app/Commands/Codex/Status.php`
- **Purpose:** Show audit status
- **Usage:** `php spark codex:status`
- **Arguments:** none declared.
- **Options:** none declared.


### `config:*` commands

#### `config:drift`
- **Class:** `App\Commands\Config\Drift`
- **Source:** `app/Commands/Config/Drift.php`
- **Purpose:** Compare deployed config and environment to repo baselines.
- **Usage:** `php spark config:drift [--emit=docs] [--out=path] [--dry-run] [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--emit` — Output mode: docs (default: docs).
  - `--out` — Override artifact directory (must be inside docs/aiops/artifacts).
  - `--dry-run` — Generate a report without mutating state.
  - `--approve` — Acknowledge execution (required for mutating commands).

#### `config:lint`
- **Class:** `App\Commands\ConfigLint`
- **Source:** `app/Commands/ConfigLint.php`
- **Purpose:** Lint Config/Services.php overrides against CI4 service signatures.
- **Usage:** `php spark config:lint`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without writing data
  - `--json` — Emit JSON summary


### `content:*` commands

#### `content:ingest-sample`
- **Class:** `App\Commands\ContentIngestSample`
- **Source:** `app/Commands/ContentIngestSample.php`
- **Purpose:** Load sample Daily Top Gainers JSON, ingest, score, and print the top 5 ideas.
- **Usage:** `php spark content:ingest-sample`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without writing ingest data


### `contentengine:*` commands

#### `contentengine:smoke`
- **Class:** `App\Commands\ContentEngineSmoke`
- **Source:** `app/Commands/ContentEngineSmoke.php`
- **Purpose:** End-to-end smoke test for the Content Engine ingest → scoring → drafts pipeline.
- **Usage:** `php spark contentengine:smoke`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without writing ingest data


### `db:*` commands

#### `db:apply-docs`
- **Class:** `App\Commands\Database\ApplyDocs`
- **Source:** `app/Commands/Database/ApplyDocs.php`
- **Purpose:** Compile SQL from docs/mysql and apply statements with audit logging.
- **Usage:** `php spark db:apply-docs [db-group] [--dry-run]`
- **Arguments:**
  - `db-group` — Optional: database group to use (default: default).
- **Options:**
  - `--dry-run` — Compile SQL without executing statements.

#### `db:drift`
- **Class:** `App\Commands\Database\Drift`
- **Source:** `app/Commands/Database/Drift.php`
- **Purpose:** Compare live schema to expected inventory.
- **Usage:** `php spark db:drift [--emit=docs] [--out=path] [--dry-run] [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--emit` — Output mode: docs (default: docs).
  - `--out` — Override artifact directory (must be inside docs/aiops/artifacts).
  - `--dry-run` — Generate a report without mutating state.
  - `--approve` — Acknowledge execution (required for mutating commands).

#### `db:inventory`
- **Class:** `App\Commands\Database\Inventory`
- **Source:** `app/Commands/Database/Inventory.php`
- **Purpose:** Scan code and migrations to inventory MyMI Wallet tables and generate integrity docs/SQL adjustments.
- **Usage:** `php spark db:inventory [write-docs] [write-sql] [limit] [db-group] [--dry-run]`
- **Arguments:**
  - `write-docs` — Optional: 1 to write docs (default 1).
  - `write-sql` — Optional: 1 to write SQL adjustments (default 1).
  - `limit` — Optional: limit tables processed (0 = no limit).
  - `db-group` — Optional: database group to inspect (default: default).
- **Options:**
  - `--dry-run` — Preview actions without writing data


### `discord:*` commands

#### `discord:list`
- **Class:** `App\Commands\DiscordList`
- **Source:** `app/Commands/DiscordList.php`
- **Purpose:** List configured Discord channels/webhooks/IDs from config and database.
- **Usage:** `php spark discord:list`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without querying the database

#### `discord:process-queue`
- **Class:** `App\Commands\DiscordProcessQueue`
- **Source:** `app/Commands/DiscordProcessQueue.php`
- **Purpose:** Process queued Discord messages respecting quiet hours and pacing.
- **Usage:** `php spark discord:process-queue [limit] [--dry-run] [--approve]`
- **Arguments:**
  - `limit` — Optional: max messages to process (default 25).
- **Options:**
  - `--dry-run` — Preview actions without processing the queue
  - `--approve` — Acknowledge and send queued messages

#### `discord:test`
- **Class:** `App\Commands\DiscordTest`
- **Source:** `app/Commands/DiscordTest.php`
- **Purpose:** Send a test payload through the Discord queue pipeline.
- **Usage:** `php spark discord:test`
- **Arguments:**
  - `channel` — Optional channel key (default staging).
  - `message` — Optional message text.
- **Options:**
  - `--dry-run` — Preview actions without sending Discord alerts

#### `discord:test-liquidity`
- **Class:** `App\Commands\DiscordTestLiquidity`
- **Source:** `app/Commands/DiscordTestLiquidity.php`
- **Purpose:** Send a test Liquidity Scan alert to alerts.liquidity channel
- **Usage:** `php spark discord:test-liquidity`
- **Arguments:**
  - `ticker` — Optional ticker symbol (default TEST).
- **Options:**
  - `--dry-run` — Preview actions without sending Discord alerts

#### `discord:wire-check`
- **Class:** `App\Commands\DiscordWireCheck`
- **Source:** `app/Commands/DiscordWireCheck.php`
- **Purpose:** Validate Discord env vars, tables, and queue health for MyMIDiscord.
- **Usage:** `php spark discord:wire-check`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without querying the database


### `dreamhost:*` commands

#### `dreamhost:dns-verify`
- **Class:** `App\Commands\Ops\DreamHost\DnsVerify`
- **Source:** `app/Commands/Ops/DreamHost/DnsVerify.php`
- **Purpose:** Ops helper command: dreamhost:dns-verify
- **Usage:** `php spark dreamhost:dns-verify`
- **Arguments:** none declared.
- **Options:** none declared.

#### `dreamhost:email-audit`
- **Class:** `App\Commands\Ops\DreamHost\EmailAudit`
- **Source:** `app/Commands/Ops/DreamHost/EmailAudit.php`
- **Purpose:** Ops helper command: dreamhost:email-audit
- **Usage:** `php spark dreamhost:email-audit`
- **Arguments:** none declared.
- **Options:** none declared.

#### `dreamhost:email-list`
- **Class:** `App\Commands\Ops\DreamHost\EmailList`
- **Source:** `app/Commands/Ops/DreamHost/EmailList.php`
- **Purpose:** Ops helper command: dreamhost:email-list
- **Usage:** `php spark dreamhost:email-list`
- **Arguments:** none declared.
- **Options:** none declared.

#### `dreamhost:limits`
- **Class:** `App\Commands\Ops\DreamHost\Limits`
- **Source:** `app/Commands/Ops/DreamHost/Limits.php`
- **Purpose:** Ops helper command: dreamhost:limits
- **Usage:** `php spark dreamhost:limits`
- **Arguments:** none declared.
- **Options:** none declared.


### `email:*` commands

#### `email:healthcheck`
- **Class:** `App\Commands\Ops\Email\Healthcheck`
- **Source:** `app/Commands/Ops/Email/Healthcheck.php`
- **Purpose:** Ops helper command: email:healthcheck
- **Usage:** `php spark email:healthcheck`
- **Arguments:** none declared.
- **Options:** none declared.

#### `email:queue-scan`
- **Class:** `App\Commands\Ops\Email\QueueScan`
- **Source:** `app/Commands/Ops/Email/QueueScan.php`
- **Purpose:** Ops helper command: email:queue-scan
- **Usage:** `php spark email:queue-scan`
- **Arguments:** none declared.
- **Options:** none declared.

#### `email:test`
- **Class:** `App\Commands\TestEmail`
- **Source:** `app/Commands/TestEmail.php`
- **Purpose:** Send a test email using the current SMTP configuration.
- **Usage:** `php spark email:test`
- **Arguments:**
  - `to` — Recipient email address.
- **Options:**
  - `--dry-run` — Preview actions without sending email

#### `email:test`
- **Class:** `App\Commands\Ops\Email\Test`
- **Source:** `app/Commands/Ops/Email/Test.php`
- **Purpose:** Ops helper command: email:test
- **Usage:** `php spark email:test`
- **Arguments:** none declared.
- **Options:** none declared.


### `env:*` commands

#### `env:doctor`
- **Class:** `App\Commands\Env\EnvDoctor`
- **Source:** `app/Commands/Env/EnvDoctor.php`
- **Purpose:** Environment diagnostics and snapshot.
- **Usage:** `php spark env:doctor`
- **Arguments:** none declared.
- **Options:**
  - `--notify=discord` — Send summary to Discord.
  - `--pack` — Bundle JSON/Markdown into a tar.gz for sharing.


### `fix:*` commands

#### `fix:503`
- **Class:** `App\Commands\Fix503`
- **Source:** `app/Commands/Fix503.php`
- **Purpose:** Diagnose and attempt safe auto-fixes for 503 errors.
- **Usage:** `php spark fix:503 [--dry-run] [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Run diagnostics without taking any corrective actions
  - `--approve` — Acknowledge and apply corrective actions


### `forecasts:*` commands

#### `forecasts:evaluate`
- **Class:** `App\Commands\ForecastEvaluate`
- **Source:** `app/Commands/ForecastEvaluate.php`
- **Purpose:** Evaluate forecasts for accuracy windows.
- **Usage:** `php spark forecasts:evaluate [limit] [--dry-run]`
- **Arguments:**
  - `limit` — Optional: max forecasts to evaluate (default 100, max 500).
- **Options:**
  - `--dry-run` — Preview actions without running evaluation

#### `forecasts:refresh`
- **Class:** `App\Commands\ForecastRefresh`
- **Source:** `app/Commands/ForecastRefresh.php`
- **Purpose:** Refresh forecasts for open alerts.
- **Usage:** `php spark forecasts:refresh [limit] [--dry-run] [--approve]`
- **Arguments:**
  - `limit` — Optional: max alerts to refresh (default 50, max 200).
- **Options:**
  - `--dry-run` — Preview actions without running refresh jobs
  - `--approve` — Acknowledge and run forecast refresh jobs


### `gap:*` commands

#### `gap:sync`
- **Class:** `App\Commands\GapTrackerSync`
- **Source:** `app/Commands/GapTrackerSync.php`
- **Purpose:** Enrich gap tracker CSV and produce a report.
- **Usage:** `php spark gap:sync [limit] [priority] [--dry-run] [--report-only]`
- **Arguments:**
  - `limit` — Optional: max rows to process (default 25).
  - `priority` — Optional: priority filter (e.g., P1).
- **Options:**
  - `--dry-run` — Preview actions without writing files
  - `--report-only` — Generate report without updating CSV


### `github:*` commands

#### `github:search`
- **Class:** `App\Commands\GitHub\SearchRepo`
- **Source:** `app/Commands/GitHub/SearchRepo.php`
- **Purpose:** Search the local git repository for a given string or pattern.
- **Usage:** `php spark github:search`
- **Arguments:** none declared.
- **Options:**
  - `--regex` — Treat search text as regex
  - `--ext` — Comma-separated file extensions (e.g. php,env,md)
  - `--path` — Limit search to a subdirectory


### `growth:*` commands

#### `growth:retention-watch`
- **Class:** `App\Commands\Growth\RetentionWatch`
- **Source:** `app/Commands/Growth/RetentionWatch.php`
- **Purpose:** Detect retention anomalies from engagement signals.
- **Usage:** `php spark growth:retention-watch [--emit=docs] [--out=path] [--dry-run] [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--emit` — Output mode: docs (default: docs).
  - `--out` — Override artifact directory (must be inside docs/aiops/artifacts).
  - `--dry-run` — Generate a report without mutating state.
  - `--approve` — Acknowledge execution (required for mutating commands).


### `health:*` commands

#### `health:cache`
- **Class:** `App\Commands\Health\Cache`
- **Source:** `app/Commands/Health/Cache.php`
- **Purpose:** Check CI4 writable cache directories for access.
- **Usage:** `php spark health:cache`
- **Arguments:** none declared.
- **Options:** none declared.

#### `health:disk`
- **Class:** `App\Commands\Health\Disk`
- **Source:** `app/Commands/Health/Disk.php`
- **Purpose:** Check disk and inode usage for the host.
- **Usage:** `php spark health:disk`
- **Arguments:** none declared.
- **Options:** none declared.

#### `health:git-safety`
- **Class:** `App\Commands\Health\GitSafety`
- **Source:** `app/Commands/Health/GitSafety.php`
- **Purpose:** Check git ignore rules for env/writable and tracked secrets.
- **Usage:** `php spark health:git-safety`
- **Arguments:** none declared.
- **Options:** none declared.

#### `health:services`
- **Class:** `App\Commands\Health\Services`
- **Source:** `app/Commands/Health/Services.php`
- **Purpose:** Detect web server + PHP handler status without systemctl.
- **Usage:** `php spark health:services`
- **Arguments:** none declared.
- **Options:** none declared.


### `investments:*` commands

#### `investments:economy:updateall`
- **Class:** `App\Commands\Investments\EconomyUpdateAll`
- **Source:** `app/Commands/Investments/EconomyUpdateAll.php`
- **Purpose:** Fetch and store economic indicators from FRED into local tables.
- **Usage:** `php spark investments:economy:updateall`
- **Arguments:** none declared.
- **Options:** none declared.


### `keys:*` commands

#### `keys:generate`
- **Class:** `App\Commands\Security\GenerateKey`
- **Source:** `app/Commands/Security/GenerateKey.php`
- **Purpose:** Generate a cryptographically secure encryption key.
- **Usage:** `php spark keys:generate [bits]`
- **Arguments:**
  - `bits` — Key size in bits (32, 64, 128, 256). Default: 256
- **Options:** none declared.

#### `keys:generate-ci4`
- **Class:** `App\Commands\Security\GenerateCI4Key`
- **Source:** `app/Commands/Security/GenerateCI4Key.php`
- **Purpose:** Generate and rotate CodeIgniter 4 encryption.key
- **Usage:** `php spark keys:generate-ci4 [bits]`
- **Arguments:**
  - `bits` — Key size in bits (32, 64, 128, 256). Default: 256
- **Options:** none declared.


### `logs:*` commands

#### `logs:full-report`
- **Class:** `App\Commands\LogsFullReport`
- **Source:** `app/Commands/LogsFullReport.php`
- **Purpose:** Summarize CI4 + Apache + PHP logs for a given date.
- **Usage:** `php spark logs:full-report [today\|yesterday\|YYYY-MM-DD] [--save] [--fix-hints] [--discord]`
- **Arguments:**
  - `date` — Optional: today\|yesterday\|YYYY-MM-DD (defaults to today).
- **Options:**
  - `--save` — Write the report to docs/aiops/logs
  - `--fix-hints` — Include fix hints in the report
  - `--discord` — Send a condensed summary to Discord

#### `logs:healthcheck`
- **Class:** `App\Commands\Logs\Healthcheck`
- **Source:** `app/Commands/Logs/Healthcheck.php`
- **Purpose:** Emit test logs and verify file + DB log sinks are functioning.
- **Usage:** `php spark logs:healthcheck`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without writing data

#### `logs:scan`
- **Class:** `App\Commands\Ops\Logs\Scan`
- **Source:** `app/Commands/Ops/Logs/Scan.php`
- **Purpose:** Ops helper command: logs:scan
- **Usage:** `php spark logs:scan`
- **Arguments:** none declared.
- **Options:** none declared.

#### `logs:summarize`
- **Class:** `App\Commands\Logs\Summarize`
- **Source:** `app/Commands/Logs/Summarize.php`
- **Purpose:** Summarize CI4 logs for a given date, including new entries since the last run.
- **Usage:** `php spark logs:summarize [date\|yesterday] [--dry-run] [--json]`
- **Arguments:**
  - `date` — Optional:
- **Options:**
  - `--dry-run` — Preview actions without writing data
  - `--json` — Output compact JSON payload for automation

#### `logs:summarize-all`
- **Class:** `App\Commands\Logs\SummarizeAll`
- **Source:** `app/Commands/Logs/SummarizeAll.php`
- **Purpose:** Summarize logs for all known subsystems from writable/logs/** and emit docs/_aiops/logs markdown reports.
- **Usage:** `php spark logs:summarize-all [--json]`
- **Arguments:** none declared.
- **Options:**
  - `--json` — Print JSON output in addition to files.

#### `logs:test`
- **Class:** `App\Commands\LogsTest`
- **Source:** `app/Commands/LogsTest.php`
- **Purpose:** Canonical logging test command (writes debug/info/error and validates file + DB sinks).
- **Usage:** `php spark logs:test`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview checks without writing records

#### `logs:watch`
- **Class:** `App\Commands\Ops\Logs\Watch`
- **Source:** `app/Commands/Ops/Logs/Watch.php`
- **Purpose:** Ops helper command: logs:watch
- **Usage:** `php spark logs:watch`
- **Arguments:** none declared.
- **Options:** none declared.


### `mail:*` commands

#### `mail:send`
- **Class:** `App\Commands\MailSend`
- **Source:** `app/Commands/MailSend.php`
- **Purpose:** Process and send queued mail jobs.
- **Usage:** `php spark mail:send [limit] [--dry-run] [--approve]`
- **Arguments:**
  - `limit` — Optional: max number of queued emails to send (default 25).
- **Options:**
  - `--dry-run` — Preview actions without sending emails
  - `--approve` — Acknowledge and send queued emails

#### `mail:send-test`
- **Class:** `App\Commands\MailSendTest`
- **Source:** `app/Commands/MailSendTest.php`
- **Purpose:** Send a test email using branded templates.
- **Usage:** `php spark mail:send-test [to] [template] [--dry-run]`
- **Arguments:**
  - `to` — Recipient email address.
  - `template` — Template name: activation, reset, or generic (default generic).
- **Options:**
  - `--dry-run` — Preview actions without sending email

#### `mail:test`
- **Class:** `App\Commands\MailTest`
- **Source:** `app/Commands/MailTest.php`
- **Purpose:** Send a DreamHost SMTP test email and output transport diagnostics.
- **Usage:** `php spark mail:test`
- **Arguments:**
  - `to` — Recipient email address.
- **Options:**
  - `--dry-run` — Preview actions without sending email

#### `mail:verify`
- **Class:** `App\Commands\MailVerify`
- **Source:** `app/Commands/MailVerify.php`
- **Purpose:** Verify SMTP settings by sending a diagnostic email.
- **Usage:** `php spark mail:verify you@example.com`
- **Arguments:**
  - `to` — Recipient email address.
- **Options:**
  - `--dry-run` — Preview actions without sending email


### `marketing:*` commands

#### `marketing:automation-audit`
- **Class:** `App\Commands\Marketing\AutomationAudit`
- **Source:** `app/Commands/Marketing/AutomationAudit.php`
- **Purpose:** Verify marketing automations, cron hooks, and API usage expectations.
- **Usage:** `php spark marketing:automation-audit [--emit=docs] [--out=path] [--dry-run] [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--emit` — Output mode: docs (default: docs).
  - `--out` — Override artifact directory (must be inside docs/aiops/artifacts).
  - `--dry-run` — Generate a report without mutating state.
  - `--approve` — Acknowledge execution (required for mutating commands).


### `mdit:*` commands

#### `mdit:nav:compute_daily`
- **Class:** `App\Commands\MditNavComputeDaily`
- **Source:** `app/Commands/MditNavComputeDaily.php`
- **Purpose:** Compute and snapshot the daily MDIT NAV.
- **Usage:** `php spark mdit:nav:compute_daily [cash_value] [equities_value]`
- **Arguments:**
  - `cash_value` — Optional cash value override (default 0).
  - `equities_value` — Optional equities value override (default 0).
- **Options:** none declared.


### `migrate:*` commands

#### `migrate:dry-run`
- **Class:** `App\Commands\Database\MigrateDryRun`
- **Source:** `app/Commands/Database/MigrateDryRun.php`
- **Purpose:** List pending migrations without executing them.
- **Usage:** `php spark migrate:dry-run`
- **Arguments:** none declared.
- **Options:** none declared.


### `news:*` commands

#### `news:audit`
- **Class:** `App\Commands\NewsAudit`
- **Source:** `app/Commands/NewsAudit.php`
- **Purpose:** Audit recent marketing news ingestion, summarization, and post generation.
- **Usage:** `php spark news:audit`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without writing audit artifacts


### `ops:*` commands

#### `ops:alerts:ingest`
- **Class:** `App\Commands\Ops\AlertsIngest`
- **Source:** `app/Commands/Ops/AlertsIngest.php`
- **Purpose:** Ingest ThinkorSwim alert emails and upsert trade alerts.
- **Usage:** `php spark ops:alerts:ingest [--since=15m\|1h\|today] [--limit=200] [--dry-run] [--verbose]`
- **Arguments:** none declared.
- **Options:**
  - `--since` — How far back to scan (default: 15m). Supports 15m\|1h\|today.
  - `--limit` — Max emails to scan (default: 200).
  - `--dry-run` — Preview ingestion without DB writes.
  - `--verbose` — Verbose logging to CLI.

#### `ops:analyze-commands`
- **Class:** `App\Commands\OpsAnalyzeCommands`
- **Source:** `app/Commands/OpsAnalyzeCommands.php`
- **Purpose:** Analyze parsed ops inbox items and generate AI plans
- **Usage:** `php spark ops:analyze-commands`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without updating inbox items
  - `--approve` — Acknowledge and update inbox items

#### `ops:app:update`
- **Class:** `App\Commands\Ops\AppUpdate`
- **Source:** `app/Commands/Ops/AppUpdate.php`
- **Purpose:** Safely update and validate the CI4 application.
- **Usage:** `php spark ops:app:update [--dry-run] [--strict] [--migrate] [--migrate-only] [--no-api] [--no-aiops] [--json]`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Report only (no changes)
  - `--strict` — External failures become fatal
  - `--migrate` — Run pending migrations
  - `--migrate-only` — Run database checks and stop
  - `--no-api` — Skip API checks
  - `--no-aiops` — Skip AIOps snapshot
  - `--json` — Emit JSON output
  - `--allow-ci` — Allow running in CI environment

#### `ops:ci:prepare`
- **Class:** `App\Commands\Ops\CiPrepare`
- **Source:** `app/Commands/Ops/CiPrepare.php`
- **Purpose:** Prepare deterministic writable/artifact directories for CI runs.
- **Usage:** `php spark ops:ci:prepare`
- **Arguments:** none declared.
- **Options:** none declared.

#### `ops:commands:audit`
- **Class:** `App\Commands\Ops\CommandsAudit`
- **Source:** `app/Commands/Ops/CommandsAudit.php`
- **Purpose:** Audit Spark commands for illegal constructors.
- **Usage:** `php spark ops:commands:audit`
- **Arguments:** none declared.
- **Options:**
  - `--json` — Emit JSON output and write docs/_ops/commands-audit/ops-commands-audit.json

#### `ops:commands:autofix`
- **Class:** `App\Commands\Ops\CommandsAutofix`
- **Source:** `app/Commands/Ops/CommandsAutofix.php`
- **Purpose:** Auto-fix Spark commands that define illegal constructors.
- **Usage:** `php spark ops:commands:autofix [--dry-run] [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview changes without modifying files (default)
  - `--approve` — Apply fixes and write updated files

#### `ops:commands:inventory`
- **Class:** `App\Commands\Ops\CommandsInventory`
- **Source:** `app/Commands/Ops/CommandsInventory.php`
- **Purpose:** Generate Spark command inventory from Console.php and command files.
- **Usage:** `php spark ops:commands:inventory [--emit=docs] [--out=path] [--dry-run] [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--emit` — Output mode: docs (default: docs).
  - `--out` — Override artifact directory (must be inside docs/aiops/artifacts).
  - `--dry-run` — Generate a report without mutating state.
  - `--approve` — Acknowledge execution (required for mutating commands).

#### `ops:commands:lint`
- **Class:** `App\Commands\Ops\CommandsLint`
- **Source:** `app/Commands/Ops/CommandsLint.php`
- **Purpose:** Lint Spark commands for runtime safety contracts and documentation coverage.
- **Usage:** `php spark ops:commands:lint [--json]`
- **Arguments:** none declared.
- **Options:**
  - `--json` — Emit JSON results to stdout

#### `ops:config:lint`
- **Class:** `App\Commands\Ops\ConfigLint`
- **Source:** `app/Commands/Ops/ConfigLint.php`
- **Purpose:** Lint Config files for illegal patterns (env(), dynamic expressions, protocols).
- **Usage:** `php spark ops:config:lint`
- **Arguments:** none declared.
- **Options:** none declared.

#### `ops:config:reset`
- **Class:** `App\Commands\Ops\ConfigReset`
- **Source:** `app/Commands/Ops/ConfigReset.php`
- **Purpose:** Clear config-related caches after config changes.
- **Usage:** `php spark ops:config:reset`
- **Arguments:** none declared.
- **Options:** none declared.

#### `ops:fetch-commands`
- **Class:** `App\Commands\OpsFetchCommands`
- **Source:** `app/Commands/OpsFetchCommands.php`
- **Purpose:** Fetch unread ops commands from IMAP and store them in bf_ops_command_inbox
- **Usage:** `php spark ops:fetch-commands`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without storing inbox items
  - `--approve` — Acknowledge and store inbox items

#### `ops:filesystem-scan`
- **Class:** `App\Commands\Ops\Diagnostics\FilesystemScan`
- **Source:** `app/Commands/Ops/Diagnostics/FilesystemScan.php`
- **Purpose:** Ops helper command: ops:filesystem-scan
- **Usage:** `php spark ops:filesystem-scan`
- **Arguments:** none declared.
- **Options:** none declared.

#### `ops:filesystem:fix`
- **Class:** `App\Commands\Ops\FilesystemFix`
- **Source:** `app/Commands/Ops/FilesystemFix.php`
- **Purpose:** Auto-fix filesystem governance violations
- **Usage:** `php spark ops:filesystem:fix`
- **Arguments:** none declared.
- **Options:** none declared.

#### `ops:filesystem:lint`
- **Class:** `App\Commands\Ops\FilesystemLint`
- **Source:** `app/Commands/Ops/FilesystemLint.php`
- **Purpose:** Lint and optionally auto-fix filesystem governance violations.
- **Usage:** `php spark ops:filesystem:lint [--fix] [--report] [--json]`
- **Arguments:** none declared.
- **Options:**
  - `--fix` — Automatically apply safe fixes
  - `--report` — Write fix plan to docs/_ops/filesystem-lint.md
  - `--json` — JSON output

#### `ops:healthcheck`
- **Class:** `App\Commands\Ops\Health\Healthcheck`
- **Source:** `app/Commands/Ops/Health/Healthcheck.php`
- **Purpose:** Ops helper command: ops:healthcheck
- **Usage:** `php spark ops:healthcheck`
- **Arguments:** none declared.
- **Options:** none declared.

#### `ops:next-steps`
- **Class:** `App\Commands\Ops\NextSteps`
- **Source:** `app/Commands/Ops/NextSteps.php`
- **Purpose:** Generate next-steps issues from audit commands and write docs/snapshots.
- **Usage:** `php spark ops:next-steps [--emit=docs\|db\|both] [--date=YYYY-MM-DD] [--dry-run] [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--emit` — docs (default), db, or both
  - `--date` — Override the snapshot date (YYYY-MM-DD)
  - `--dry-run` — Run analyzers but skip writes
  - `--approve` — Acknowledge and write docs/snapshots/tasks

#### `ops:next-steps:sync`
- **Class:** `App\Commands\Ops\NextStepsSync`
- **Source:** `app/Commands/Ops/NextStepsSync.php`
- **Purpose:** Diff latest snapshots and queue net-new issues.
- **Usage:** `php spark ops:next-steps:sync [--emit=docs] [--out=path] [--dry-run] [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--emit` — Output mode: docs (default: docs).
  - `--out` — Override artifact directory (must be inside docs/aiops/artifacts).
  - `--dry-run` — Generate a report without mutating state.
  - `--approve` — Acknowledge execution (required for mutating commands).

#### `ops:next-steps:sync-manual`
- **Class:** `App\Commands\Ops\NextStepsSyncManual`
- **Source:** `app/Commands/Ops/NextStepsSyncManual.php`
- **Purpose:** Sync manual TODOs from docs/_aiops/next-steps.md into the database.
- **Usage:** `php spark ops:next-steps:sync-manual [--dry-run]`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview changes without writing to the database.

#### `ops:nginx-status`
- **Class:** `App\Commands\Ops\Server\NginxStatus`
- **Source:** `app/Commands/Ops/Server/NginxStatus.php`
- **Purpose:** Ops helper command: ops:nginx-status
- **Usage:** `php spark ops:nginx-status`
- **Arguments:** none declared.
- **Options:** none declared.

#### `ops:php-fpm-health`
- **Class:** `App\Commands\Ops\PHP\FpmHealth`
- **Source:** `app/Commands/Ops/PHP/FpmHealth.php`
- **Purpose:** Ops helper command: ops:php-fpm-health
- **Usage:** `php spark ops:php-fpm-health`
- **Arguments:** none declared.
- **Options:** none declared.

#### `ops:propose-pr`
- **Class:** `App\Commands\Ops\ProposePr`
- **Source:** `app/Commands/Ops/ProposePr.php`
- **Purpose:** Generate and validate a PR artifact bundle, then export to tracked outbox for GitHub automation.
- **Usage:** `php spark ops:propose-pr --slug=... --title=... --body=... --patch=... [--risk=low\|medium\|high] [--approve] [--dry-run]`
- **Arguments:** none declared.
- **Options:**
  - `--slug` — Required. Short identifier (kebab-case). Example: spark-taxonomy-fix
  - `--title` — Required. PR title.
  - `--body` — Required. PR description body (plain text or markdown).
  - `--patch` — Required. Path to unified diff patch file.
  - `--risk` — Optional. low\|medium\|high. Default: low
  - `--emit` — Optional. table\|json\|md (default: table)
  - `--out` — Optional. Write a summary artifact to a file path.
  - `--dry-run` — Optional. Do not write files; show what would be done.
  - `--approve` — Optional. Required to export to tracked outbox (mutating operation).
  - `--artifact` — Optional. Write a lightweight aiops artifact json file

#### `ops:report`
- **Class:** `App\Commands\Ops\Report`
- **Source:** `app/Commands/Ops/Report.php`
- **Purpose:** Ops helper command: ops:report
- **Usage:** `php spark ops:report`
- **Arguments:** none declared.
- **Options:** none declared.

#### `ops:self-heal`
- **Class:** `App\Commands\Ops\SelfHeal`
- **Source:** `app/Commands/Ops/SelfHeal.php`
- **Purpose:** Ops helper command: ops:self-heal
- **Usage:** `php spark ops:self-heal`
- **Arguments:** none declared.
- **Options:** none declared.

#### `ops:spark-reset`
- **Class:** `App\Commands\SparkReset`
- **Source:** `app/Commands/SparkReset.php`
- **Purpose:** Purge Spark command cache and rebuild autoloads safely.
- **Usage:** `php spark ops:spark-reset`
- **Arguments:** none declared.
- **Options:** none declared.

#### `ops:spark-reset`
- **Class:** `App\Commands\Ops\SparkReset`
- **Source:** `app/Commands/Ops/SparkReset.php`
- **Purpose:** Reset Spark-related caches and metadata (guarded).
- **Usage:** `php spark ops:spark-reset [--emit=docs] [--out=path] [--dry-run] [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--emit` — Output mode: docs (default: docs).
  - `--out` — Override artifact directory (must be inside docs/aiops/artifacts).
  - `--dry-run` — Preview actions without mutating cache state.
  - `--approve` — Allow cache mutations (required).

#### `ops:subs:audit`
- **Class:** `App\Commands\Ops\SubsAudit`
- **Source:** `app/Commands/Ops/SubsAudit.php`
- **Purpose:** Run subsystem audits
- **Usage:** `php spark ops:subs:audit`
- **Arguments:** none declared.
- **Options:**
  - `--json` — JSON
  - `--strict` — Strict

#### `ops:subs:doctor`
- **Class:** `App\Commands\Ops\SubsDoctor`
- **Source:** `app/Commands/Ops/SubsDoctor.php`
- **Purpose:** Friendly subsystem triage
- **Usage:** `php spark ops:subs:doctor`
- **Arguments:** none declared.
- **Options:**
  - `--json` — JSON

#### `ops:subs:repair`
- **Class:** `App\Commands\Ops\SubsRepair`
- **Source:** `app/Commands/Ops/SubsRepair.php`
- **Purpose:** Run subsystem repairs
- **Usage:** `php spark ops:subs:repair`
- **Arguments:** none declared.
- **Options:**
  - `--json` — JSON

#### `ops:subs:status`
- **Class:** `App\Commands\Ops\SubsStatus`
- **Source:** `app/Commands/Ops/SubsStatus.php`
- **Purpose:** Combined subsystem status
- **Usage:** `php spark ops:subs:status`
- **Arguments:** none declared.
- **Options:**
  - `--json` — JSON

#### `ops:work`
- **Class:** `App\Commands\OpsWork`
- **Source:** `app/Commands/OpsWork.php`
- **Purpose:** Process AiOps task queue items safely.
- **Usage:** `php spark ops:work [limit] [--lock=minutes] [--dry-run]`
- **Arguments:**
  - `limit` — Maximum number of tasks to process in this run (default 10).
- **Options:**
  - `--lock` — Lock duration in minutes (default 15).
  - `--dry-run` — Preview actions without processing tasks
  - `--code` — Process code-eligible tasks only and write PR outbox bundle.


### `optimize:*` commands

#### `optimize:safe`
- **Class:** `App\Commands\Runtime\SparkOptimize`
- **Source:** `app/Commands/Runtime/SparkOptimize.php`
- **Purpose:** Run CI4 optimize safely (CI-only)
- **Usage:** `php spark optimize:safe`
- **Arguments:** none declared.
- **Options:** none declared.


### `perf:*` commands

#### `perf:k6`
- **Class:** `App\Commands\Performance\K6Run`
- **Source:** `app/Commands/Performance/K6Run.php`
- **Purpose:** Run k6 load test
- **Usage:** `php spark perf:k6`
- **Arguments:** none declared.
- **Options:** none declared.


### `revenue:*` commands

#### `revenue:cost-forecast`
- **Class:** `App\Commands\Revenue\CostForecast`
- **Source:** `app/Commands/Revenue/CostForecast.php`
- **Purpose:** Forecast infra and API costs and detect overruns.
- **Usage:** `php spark revenue:cost-forecast [--emit=docs] [--out=path] [--dry-run] [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--emit` — Output mode: docs (default: docs).
  - `--out` — Override artifact directory (must be inside docs/aiops/artifacts).
  - `--dry-run` — Generate a report without mutating state.
  - `--approve` — Acknowledge execution (required for mutating commands).

#### `revenue:scan`
- **Class:** `App\Commands\RevenueStreamsScan`
- **Source:** `app/Commands/RevenueStreamsScan.php`
- **Purpose:** Scan the repository for monetizable features and generate revenue stream docs.
- **Usage:** `php spark revenue:scan`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without writing documentation


### `routes:*` commands

#### `routes:auth-audit`
- **Class:** `App\Commands\RoutesAuthAudit`
- **Source:** `app/Commands/RoutesAuthAudit.php`
- **Purpose:** Audit public routes for unauthenticated access regressions.
- **Usage:** `php spark routes:auth-audit`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without making HTTP requests


### `runtime:*` commands

#### `runtime:cache-boot`
- **Class:** `App\Commands\Runtime\CacheBoot`
- **Source:** `app/Commands/Runtime/CacheBoot.php`
- **Purpose:** Validate cache boot health and warm critical cache keys.
- **Usage:** `php spark runtime:cache-boot [--emit=docs] [--out=path] [--dry-run] [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--emit` — Output mode: docs (default: docs).
  - `--out` — Override artifact directory (must be inside docs/aiops/artifacts).
  - `--dry-run` — Preview actions without changing cache state.
  - `--approve` — Allow cache mutations (required).

#### `runtime:check`
- **Class:** `App\Commands\RuntimeCheck`
- **Source:** `app/Commands/RuntimeCheck.php`
- **Purpose:** Validate runtime invariants (nginx, php, permissions, etc.).
- **Usage:** `php spark runtime:check`
- **Arguments:** none declared.
- **Options:** none declared.

#### `runtime:diagnose-502`
- **Class:** `App\Commands\Runtime\Diagnose502`
- **Source:** `app/Commands/Runtime/Diagnose502.php`
- **Purpose:** Diagnose and optionally remediate 502/503 gateway errors
- **Usage:** `php spark runtime:diagnose-502 [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--approve` — Apply safe fixes (clear cache, remove stale sockets) after diagnostics

#### `runtime:spark-doctor`
- **Class:** `App\Commands\Runtime\SparkDoctor`
- **Source:** `app/Commands/Runtime/SparkDoctor.php`
- **Purpose:** Validate Spark command discovery and CI4 compatibility
- **Usage:** `php spark runtime:spark-doctor`
- **Arguments:** none declared.
- **Options:** none declared.

#### `runtime:spark-doctor`
- **Class:** `App\Commands\Runtime\SparkDoctorRuntime`
- **Source:** `app/Commands/Runtime/SparkDoctorRuntime.php`
- **Purpose:** Validate Spark command discovery and CI4 compatibility (runtime scope).
- **Usage:** `php spark runtime:spark-doctor [--emit=docs] [--out=path] [--dry-run] [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--emit` — Output mode: docs (default: docs).
  - `--out` — Override artifact directory (must be inside docs/aiops/artifacts).
  - `--dry-run` — Generate a report without mutating state.
  - `--approve` — Acknowledge execution (required for mutating commands).

#### `runtime:triage`
- **Class:** `App\Commands\Runtime\Triage`
- **Source:** `app/Commands/Runtime/Triage.php`
- **Purpose:** Consolidate runtime diagnostics into a single report.
- **Usage:** `php spark runtime:triage [--emit=docs] [--out=path] [--dry-run] [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--emit` — Output mode: docs (default: docs).
  - `--out` — Override artifact directory (must be inside docs/aiops/artifacts).
  - `--dry-run` — Generate a report without mutating state.
  - `--approve` — Acknowledge execution (required for mutating commands).


### `scraper:*` commands

#### `scraper:audit-emails`
- **Class:** `App\Commands\Scrapers\EmailScraperAudit`
- **Source:** `app/Commands/Scrapers/EmailScraperAudit.php`
- **Purpose:** Audit recent trade and news emails against the expected scraper schema.
- **Usage:** `php spark scraper:audit-emails [limit] [--limit=25]`
- **Arguments:** none declared.
- **Options:**
  - `--limit` — Number of emails to scan (default: 25).


### `security:*` commands

#### `security:csp:audit`
- **Class:** `App\Commands\SecurityCspAudit`
- **Source:** `app/Commands/SecurityCspAudit.php`
- **Purpose:** Scan view templates for CSP-unsafe inline scripts, styles, and handlers.
- **Usage:** `php spark security:csp:audit`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without writing data

#### `security:secrets-audit`
- **Class:** `App\Commands\Security\SecretsAudit`
- **Source:** `app/Commands/Security/SecretsAudit.php`
- **Purpose:** Detect sensitive secrets in configs, logs, or docs.
- **Usage:** `php spark security:secrets-audit [--emit=docs] [--out=path] [--dry-run] [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--emit` — Output mode: docs (default: docs).
  - `--out` — Override artifact directory (must be inside docs/aiops/artifacts).
  - `--dry-run` — Generate a report without mutating state.
  - `--approve` — Acknowledge execution (required for mutating commands).


### `spark:*` commands

#### `spark:diagnose-503`
- **Class:** `App\Commands\Diagnose503`
- **Source:** `app/Commands/Diagnose503.php`
- **Purpose:** Diagnose common 503 causes (cache, maintenance filter, upstream, writable).
- **Usage:** `php spark spark:diagnose-503 [--discord]`
- **Arguments:** none declared.
- **Options:**
  - `--discord` — Send failures to Discord if configured

#### `spark:doctor`
- **Class:** `App\Commands\SparkDoctor`
- **Source:** `app/Commands/SparkDoctor.php`
- **Purpose:** System health inspector for Spark commands.
- **Usage:** `php spark spark:doctor [--json] [--notify] [--db]`
- **Arguments:** none declared.
- **Options:**
  - `--json` — Emit JSON output to stdout
  - `--notify` — Send summary notification via Discord or email
  - `--db` — Store JSON snapshot in aiops_command_snapshots table

#### `spark:fix`
- **Class:** `App\Commands\SparkFix`
- **Source:** `app/Commands/SparkFix.php`
- **Purpose:** Safely repair Spark command and cache issues.
- **Usage:** `php spark spark:fix [--dry-run] [--approve] [--json] [--notify] [--db]`
- **Arguments:** none declared.
- **Options:**
  - `--dry-run` — Preview actions without modifying files (default)
  - `--approve` — Apply fixes and write updates
  - `--json` — Emit JSON output to stdout
  - `--notify` — Send summary notification via Discord or email
  - `--db` — Store JSON snapshot in aiops_command_snapshots table

#### `spark:fix`
- **Class:** `App\Commands\Runtime\SparkFix`
- **Source:** `app/Commands/Runtime/SparkFix.php`
- **Purpose:** Auto-heal Spark command standards and generate a fix report
- **Usage:** `php spark spark:fix`
- **Arguments:** none declared.
- **Options:** none declared.

#### `spark:purge-fastcgi`
- **Class:** `App\Commands\PurgeFastCGI`
- **Source:** `app/Commands/PurgeFastCGI.php`
- **Purpose:** Detect and neutralize legacy FastCGI/php-pm socket references safely.
- **Usage:** `php spark spark:purge-fastcgi [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--approve` — Acknowledge and rename files that reference FastCGI/php-pm sockets

#### `spark:restart-safe`
- **Class:** `App\Commands\RestartSafe`
- **Source:** `app/Commands/RestartSafe.php`
- **Purpose:** Flush caches/sessions safely and guide a no-sudo restart flow on DreamHost.
- **Usage:** `php spark spark:restart-safe [--hard] [--dry-run] [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--hard` — Also purge session files (file handler only)
  - `--dry-run` — Preview actions without purging
  - `--approve` — Acknowledge and apply cache/session purges

#### `spark:traffic-spike-guard`
- **Class:** `App\Commands\TrafficSpikeGuard`
- **Source:** `app/Commands/TrafficSpikeGuard.php`
- **Purpose:** Detect traffic/error spikes that commonly lead to 503 and alert Discord.
- **Usage:** `php spark spark:traffic-spike-guard [--lines=500] [--threshold=15] [--discord]`
- **Arguments:** none declared.
- **Options:**
  - `--lines` — Number of log lines to scan (default 500)
  - `--threshold` — Spike threshold per metric (default 15)
  - `--discord` — Send alert to Discord if spike detected


### `test:*` commands

#### `test:redis`
- **Class:** `App\Commands\Test\RedisPing`
- **Source:** `app/Commands/Test/RedisPing.php`
- **Purpose:** Test Redis connection
- **Usage:** `php spark test:redis`
- **Arguments:** none declared.
- **Options:** none declared.


### `ux:*` commands

#### `ux:journey-audit`
- **Class:** `App\Commands\Ux\JourneyAudit`
- **Source:** `app/Commands/Ux/JourneyAudit.php`
- **Purpose:** Validate critical user journeys (signup to dashboard flow checks).
- **Usage:** `php spark ux:journey-audit [--emit=docs] [--out=path] [--dry-run] [--approve]`
- **Arguments:** none declared.
- **Options:**
  - `--emit` — Output mode: docs (default: docs).
  - `--out` — Override artifact directory (must be inside docs/aiops/artifacts).
  - `--dry-run` — Generate a report without mutating state.
  - `--approve` — Acknowledge execution (required for mutating commands).


### `wallets:*` commands

#### `wallets:warm-summary-cache`
- **Class:** `App\Commands\WalletsWarmSummaryCache`
- **Source:** `app/Commands/WalletsWarmSummaryCache.php`
- **Purpose:** Pre-warm the /API/Wallets/summary cache for active users.
- **Usage:** `php spark wallets:warm-summary-cache [user-id] [--dry-run] [--approve]`
- **Arguments:**
  - `user-id` — Optional user ID to warm (default: all active).
- **Options:**
  - `--dry-run` — Preview actions without warming cache
  - `--approve` — Acknowledge and warm summary cache

## Grouping / Workflow Combos

These commands are easiest to run as grouped workflows based on their naming prefixes and responsibilities:

- **AIOps lifecycle (`aiops:*`)**: initialize with `aiops:init`, assess with `aiops:audit`/`aiops:status`, run automation via `aiops:run` or `aiops:auto-run`, then remediate with `aiops:repair`/`aiops:rollback`.
- **Operations hygiene (`ops:*`)**: start with inventory/lint commands (`ops:commands:inventory`, `ops:commands:lint`, `ops:commands:audit`), then apply remediation (`ops:commands:autofix`, `ops:self-heal`), and finish with reporting (`ops:report`).
- **Codex governance (`codex:*`)**: build index (`codex:index`), audit (`codex:audit`), perform reviews (`codex:review*`), and enforce policy gates (`codex:gate`, `codex:gate-severity`).
- **Auth verification (`auth:*`)**: run `auth:smoke` or `auth:smoke-test`, then deeper checks via `auth:funnel-check` and `auth:audit`.
- **Runtime recovery (`spark:*`, `runtime:*`, `diagnose*`)**: use doctor/diagnostics commands first, apply reset/fix commands second, then verify with health checks.
- **Mail/Discord/Logs pipelines**: test connectivity (`mail:test`, `discord:test`, `logs:test`) before queue processing (`discord:process-queue`) and summarization/report commands.

## Usage Examples

```bash
# 1) Full AIOps baseline + repair flow
php spark aiops:init
php spark aiops:audit
php spark aiops:status
php spark aiops:repair:run_safe --dry-run

# 2) Command inventory and lint before deployment
php spark ops:commands:inventory
php spark ops:commands:lint
php spark ops:commands:audit

# 3) Runtime diagnosis and remediation
php spark spark:doctor
php spark runtime:triage
php spark diagnose:502
php spark spark:fix

# 4) Auth and email safety checks
php spark auth:smoke
php spark auth:funnel-check
php spark ops:email:healthcheck

# 5) Logs and observability review
php spark logs:healthcheck
php spark logs:summarize --hours=24
php spark logs:full-report
```
