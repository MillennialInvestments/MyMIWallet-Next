# Command Gap Analysis

This document analyzes current coverage and gaps for the Spark management suite, based on existing commands, triage artifacts, and operational patterns. It explicitly calls out 502/503 incidents, FastCGI conflicts, permission issues, cache boot failures, config drift, Spark discovery failures, and vendor/autoload breakage risks.

## Runtime & Infrastructure

**What we already manage well**
- 502/503 diagnostics and remediation paths exist (`runtime:diagnose-502`, `spark:diagnose-503`, `fix:503`, `spark:purge-fastcgi`, `spark:restart-safe`).
- Environment snapshotting exists via `env:doctor`, including socket conflicts, crontab gaps, and runtime context.
- Health checks cover disk, cache, services, and git safety.

**What is currently unmanaged**
- A single consolidated incident timeline (runtime + env + triage) that writes to `docs/next/` for human review.
- Automated cache boot validation (cache existence, cache write, cache warm), beyond manual guidance.
- Automated diff of user-space nginx fastcgi targets against active PHP handler in a single report.

**Historical failures requiring human intervention**
- 502/503 incidents tied to mismatched FastCGI sockets (DreamHost handler mismatch).
- Permissions or writable cache failure, requiring manual remediation in `writable/`.
- Cron/boot supervisor gaps (no @reboot job), detected via EnvDoctor report.

**What should be automatically detectable**
- Socket conflicts and handler mismatches (already observed in EnvDoctor snapshots).
- Cache directory existence and write ability (writable cache boot path).
- Config drift in nginx fastcgi_pass targets vs detected PHP handler.

**What can be auto-fixed vs human-approved**
- Auto-fix: Cache directory cleanup, stale socket removal, report writing (safe).
- Human-approved: FastCGI config edits, handler restarts, config file changes.

## Spark Discovery & Command Health

**What we already manage well**
- `ops:commands:audit` and `ops:commands:autofix` ensure commands are constructor-safe and discoverable.
- `audit:psr4` and `config:lint` detect PSR-4 and service signature drift.

**What is currently unmanaged**
- Detection of missing vendor/autoload breaking `php spark list` availability (currently failing in this repo).
- Automatic reconciliation between `app/Config/Console.php` registrations and actual command class files.

**Historical failures requiring human intervention**
- Spark discovery failures caused by illegal constructors, typed metadata, or missing vendor boot files.

**What should be automatically detectable**
- `php spark list` returning fatal errors (vendor missing) should be captured as a report.
- Missing command registration in Console.php vs filesystem.

**What can be auto-fixed vs human-approved**
- Auto-fix: Write a report + queue AiOps task to fix registration or vendor bootstrap.
- Human-approved: Run composer install or modify system/vendor installation.

## Config Drift & PSR-4 Audits

**What we already manage well**
- `config:lint` protects Service signatures from drift.
- `audit:psr4` provides CI-friendly compliance checks.

**What is currently unmanaged**
- Baseline capture of critical config values (env/app/infra) and drift detection between deploys.
- Automated diffing of environment config vs last known good snapshot in `docs/next/`.

**Historical failures requiring human intervention**
- Config drift between deployments causing service signature mismatch or missing overrides.

**What should be automatically detectable**
- Service signature mismatch + PSR-4 failures from CI scripts.
- Runtime differences between configs and the environment (e.g., sockets, paths).

**What can be auto-fixed vs human-approved**
- Auto-fix: None (config changes should be human-approved).
- Human-approved: Apply config changes and update docs snapshots.

## Security Posture

**What we already manage well**
- CSP audits and route auth audits cover baseline security risk.

**What is currently unmanaged**
- Secrets audit for leaked tokens, stale environment variables, or missing rotation.

**Historical failures requiring human intervention**
- Manual reviews of env variables, sensitive docs, and token rotations.

**What should be automatically detectable**
- Presence of high-risk secrets in config/logs.

**What can be auto-fixed vs human-approved**
- Auto-fix: redact outputs, create docs/next tasks.
- Human-approved: rotate tokens/keys and update env files.

## Data Integrity & DB Drift

**What we already manage well**
- `db:inventory` and `db:apply-docs` track schema docs.
- `migrate:dry-run` supports pre-deploy validation.

**What is currently unmanaged**
- Automated schema drift detection between live DB and docs/mysql inventory.
- Automatic scheduling of DB health checks with drift snapshots.

**Historical failures requiring human intervention**
- Schema drift requiring manual SQL application.

**What should be automatically detectable**
- Missing migrations vs actual schema tables.

**What can be auto-fixed vs human-approved**
- Auto-fix: none (schema changes require approval).
- Human-approved: apply migration or docs SQL.

## Marketing & Growth

**What we already manage well**
- Content engine smoke tests, sample ingests, and news audits exist.

**What is currently unmanaged**
- End-to-end marketing automation audit (CRONs, API quotas, alert delivery).
- Forecasting and retention health tied to user outcomes.

**Historical failures requiring human intervention**
- Manual audits for missing alerts and broken marketing automation.

**What should be automatically detectable**
- Cron drift, rate-limit exhaustion, API quota overages.

**What can be auto-fixed vs human-approved**
- Auto-fix: queue AiOps tasks, auto-retry reads.
- Human-approved: change marketing strategy, campaign configs.

## User Experience & Velocity

**What we already manage well**
- Wallet cache warming and auth smoke tests exist.

**What is currently unmanaged**
- Full UX journey audit (signup → dashboard → alerts) and regression detection.

**Historical failures requiring human intervention**
- Manual UX regression checks on deploys.

**What should be automatically detectable**
- Slow or failed paths in key user journeys.

**What can be auto-fixed vs human-approved**
- Auto-fix: cache warm, queue AiOps tasks.
- Human-approved: UX changes, feature toggles.

