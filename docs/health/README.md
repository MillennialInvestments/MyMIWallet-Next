# Health Tests & Logging Coverage (MyMI Wallet)

## Philosophy
Health tests are **single-purpose Spark commands** that exercise the most failure-prone backend workflows without relying on UI success signals. Each test should prove:

1. **Entry points** are callable (controllers/commands invoked without fatal errors).
2. **Dependencies** are reachable (DB, cache, external APIs, SMTP, webhook endpoints).
3. **Critical writes** happen (tables updated, queue records created).
4. **Silent failures** are surfaced (rate-limit notices, missing env vars, skipped inserts).

Health tests are not full E2E tests; they validate backend integrity with **targeted, low-risk checks** and clear logs.

## Naming conventions
Use `domain:health-<feature>` with domain-first grouping to match existing Spark conventions:

- `auth:health-registration`
- `budget:health-forecast`
- `invest:health-quotes`
- `alerts:health-scrape`
- `marketing:health-ingest`
- `discord:health-queue`
- `system:health-core`

## Log conventions
All health tests must overwrite a single log file per domain:

- `writable/logs/health_<domain>.log`

### Structured log format
Log in **sections** so humans can diff across runs:

```
[ENV]
app_env=production
app_version=<value>
php_version=<value>

[STEPS]
step=connect_db status=ok ms=12
step=fetch_alpha_vantage status=ok ms=240

[ASSERTIONS]
assert=db_connected status=ok
assert=alerts_inserted status=ok rows=1

[SUMMARY]
status=pass
warnings=0

[ERROR]
message=<masked>
trace=<masked>
```

Keep the log payload **flat and key-value** so it can be parsed by ops tooling.

## Dry-run behavior
Every health test should accept `--dry-run` (or environment flags like `*_SEND_EMAIL=false`) to avoid sending real notifications while still validating logic.

Recommended flags:

- `--dry-run` (skip external side effects)
- `--limit=<n>` (limit DB reads)
- `--symbol=<ticker>` (override test symbol)

## Shared helper approach
Create shared helpers to reduce duplicated logging/validation:

- `app/Libraries/Health/HealthLogger.php`
  - Handle file overwrite and sectioned logging.
- `app/Libraries/Health/HealthAssert.php`
  - Common assertions with consistent success/failure output.
- `app/Libraries/Health/HealthEnv.php`
  - Pulls env vars and masks secrets in logs.

Keep each Spark command short by delegating heavy logic to services/models.

## Implementation checklist
1. Add Spark command in `app/Commands/` (one command per health test).
2. Use services/models already wired in production code.
3. Log results into the domain log file (`writable/logs/health_<domain>.log`).
4. Ensure every failure returns a non-zero exit code.

## Evidence-first rule
Every checklist item references **real file paths and method names** to avoid guesswork.
