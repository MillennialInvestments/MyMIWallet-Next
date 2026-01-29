# Recommended New Commands (Design Only)

All proposed commands must follow the Spark command standards already enforced in this repo:
- No constructors or DI in command classes.
- No typed Spark metadata.
- Extend `SafeBaseCommand` and register in `app/Config/Console.php`.
- All fixes route through `ops:next-steps` → `bf_aiops_tasks` → `ops:work`.
- Human-reviewable artifacts are written to `/docs/next/`.

Each command below is **design-only**; no PHP code is requested.

## runtime:triage
- **Group:** runtime
- **Description:** Consolidate 502/503 diagnostics, envdoctor snapshots, cache boot checks, and FastCGI scans into a single report.
- **Audits:** FastCGI socket/handler mismatches, writable permissions, cache boot, current runtime status.
- **Fixes:** None by default; suggests `--force` actions (cache clear, stale socket cleanup) if available.
- **Mode:** suggestive (audit-only by default).
- **Safe-mode behavior:** read-only; writes summary to `docs/next/` and `writable/triage/`.
- **AiOps enqueue:** If failures detected, enqueue tasks via `ops:next-steps` to bf_aiops_tasks.
- **Writes to /docs/next:** `docs/next/Runtime-Triage.md` + snapshot JSON.

## runtime:cache-boot
- **Group:** runtime
- **Description:** Validate cache boot health and warm critical cache keys.
- **Audits:** writable/cache existence, write permissions, cache service readiness.
- **Fixes:** Clear cache, recreate cache directories, and warm key summaries.
- **Mode:** auto-fix with `--force`.
- **Safe-mode behavior:** without `--force`, only reports and suggests fixes.
- **AiOps enqueue:** Queue cache repair tasks when cache health fails.
- **Writes to /docs/next:** `docs/next/Cache-Boot-Report.md`.

## config:drift
- **Group:** config
- **Description:** Compare deployed config + environment to repo baseline and prior snapshots.
- **Audits:** config keys, env overrides, CI4 Services signatures.
- **Fixes:** None (human-approved only).
- **Mode:** audit-only.
- **Safe-mode behavior:** read-only diff and severity scoring.
- **AiOps enqueue:** Queue a drift remediation task if delta exceeds thresholds.
- **Writes to /docs/next:** `docs/next/Config-Drift.md`.

## ops:commands:inventory
- **Group:** ops
- **Description:** Generate authoritative command inventory from Console.php + filesystem, and (when available) `php spark list`.
- **Audits:** Missing registrations, discovery failures, duplicates, illegal metadata.
- **Fixes:** None by default; suggests ops:commands:autofix for constructors.
- **Mode:** audit-only.
- **Safe-mode behavior:** read-only inventory output.
- **AiOps enqueue:** Queue a task when discoverability diverges or spark list fails.
- **Writes to /docs/next:** `docs/next/Command-Inventory.md`.

## db:drift
- **Group:** database
- **Description:** Compare live schema (from docs/mysql snapshots or SQL dump) vs expected inventory.
- **Audits:** Missing tables, columns, indexes, and migration coverage.
- **Fixes:** None (approval required).
- **Mode:** audit-only.
- **Safe-mode behavior:** read-only report.
- **AiOps enqueue:** Queue drift remediation tasks and manual SQL review prompts.
- **Writes to /docs/next:** `docs/next/DB-Drift.md`.

## security:secrets-audit
- **Group:** security
- **Description:** Detect sensitive secrets in configs, logs, or docs; validate rotation metadata.
- **Audits:** env files, config entries, docs for accidental secrets.
- **Fixes:** None; only suggestions + redaction guidance.
- **Mode:** audit-only.
- **Safe-mode behavior:** redacts sensitive data in outputs.
- **AiOps enqueue:** Queue key rotation tasks if exposure detected.
- **Writes to /docs/next:** `docs/next/Security-Secrets.md`.

## marketing:automation-audit
- **Group:** marketing
- **Description:** Verify marketing automations (cron, email, content engine, API usage).
- **Audits:** scheduled jobs, API quotas, automation hooks, queue sizes.
- **Fixes:** None without approval; propose retry or backfill.
- **Mode:** suggestive.
- **Safe-mode behavior:** read-only.
- **AiOps enqueue:** Queue automation fixes or retries when gaps exist.
- **Writes to /docs/next:** `docs/next/Marketing-Automation.md`.

## growth:retention-watch
- **Group:** growth
- **Description:** Detect retention anomalies and churn indicators from engagement metrics.
- **Audits:** daily active users, alert interaction, wallet usage declines.
- **Fixes:** None; suggests interventions.
- **Mode:** audit-only.
- **Safe-mode behavior:** read-only.
- **AiOps enqueue:** Queue analysis tasks with prompt payloads.
- **Writes to /docs/next:** `docs/next/Growth-Retention.md`.

## ux:journey-audit
- **Group:** ux
- **Description:** Validate critical user journeys (signup → dashboard → alerts → wallet).
- **Audits:** smoke checks, error rates, latency thresholds.
- **Fixes:** None; suggest cache warm or revert actions.
- **Mode:** suggestive.
- **Safe-mode behavior:** read-only run, no state change.
- **AiOps enqueue:** Queue tasks when regression detected.
- **Writes to /docs/next:** `docs/next/UX-Journey.md`.

## revenue:cost-forecast
- **Group:** revenue
- **Description:** Forecast infra/API costs and detect overruns.
- **Audits:** usage caps (AiOps), API consumption, alert volumes.
- **Fixes:** None; suggests throttle or optimization.
- **Mode:** audit-only.
- **Safe-mode behavior:** read-only.
- **AiOps enqueue:** Queue cost-optimization tasks when thresholds exceed targets.
- **Writes to /docs/next:** `docs/next/Revenue-Cost-Forecast.md`.

## ops:next-steps:sync
- **Group:** ops
- **Description:** Diff last snapshot, queue only net-new issues to AiOps tasks.
- **Audits:** compare issue snapshots, detect resolved vs open items.
- **Fixes:** None.
- **Mode:** audit-only with queue behavior.
- **Safe-mode behavior:** read-only diff if `--dry-run`.
- **AiOps enqueue:** Only net-new issues are queued.
- **Writes to /docs/next:** `docs/next/Next-Steps-Diff.md`.

