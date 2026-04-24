# Marketing Distribution Operations Runbook

## Diagnose Discord 403 vs 429
- Run: `php spark marketing:audit:distribution --limit=100`
- Inspect `bf_marketing_distribution_targets.http_status` and `failure_class`.
- **403** (`discord_permission_denied`): permanent failure, do not retry until config fixed.
- **429** (`discord_rate_limited`): retryable, queue row should have `next_retry_at` set from `retry_after`.

## Rotate/update Discord webhook config
1. Update env/config key(s): `DISCORD_DEFAULT_WEBHOOK` and/or per-channel webhook settings.
2. Validate format: `https://discord.com/api/webhooks/{id}/{token}`.
3. Never log raw webhook value; only masked/hash surrogates.
4. Re-run a single message distribution after config update.

## Requeue retryable failures
- Command: `php spark marketing:retry-distribution --limit=50`
- Only `failed_retryable` rows are retried.
- Retries honor `max_attempts`; exhausted rows move to `dead_letter`.

## Dead-letter permanent failures
- Permanent failures are stored as `failed_permanent`.
- Move operationally exhausted retryable rows to `dead_letter` after max attempts.
- Investigate root cause before any manual requeue.

## Run the audit command
- `php spark marketing:audit:distribution --limit=100`
- Outputs:
  - counts by destination/status
  - top failure classes
  - retry/dead-letter backlog
  - latest 403/429 samples
  - approval/distribution mismatch count

## Manual verification commands
- `php spark migrate`
- `php spark marketing:audit:distribution --limit=100`
- `php spark marketing:distribute`
- `php spark marketing:retry-distribution --limit=25`
