# Nightly AIOps Log Summarization

## Purpose
`php spark logs:summarize` produces a daily, low-noise summary of the last 24 hours of MyMI Wallet logs, detects regressions, and optionally prepares PR bundles for human review.

## How it works
- Collects log entries from:
  - `writable/logs/*.log` and `log-*.php`
  - Database table `bf_error_logs` (if available)
- Filters to the last 24 hours using the application timezone.
- Normalizes messages, deduplicates stack traces, and groups errors by file/line/exception.
- Detects regressions by comparing error fingerprints against the previous summary.
- Applies an intelligence layer to flag actionable fixes (null checks, undefined keys, deprecated methods, PSR-4 issues, memory exhaustion, and repeated DB failures).
- Outputs:
  - Markdown summary: `/writable/aiops/logs/summaries/YYYY-MM-DD-log-summary.md`
  - JSON summary: `/writable/aiops/logs/json/YYYY-MM-DD-log-summary.json`
  - CSV summary: `/writable/aiops/logs/csv/YYYY-MM-DD-log-summary.csv`
  - Execution audit: `/writable/aiops/logs/audit/logs-summarize-YYYY-MM-DD.log`

## Command usage
```
php spark logs:summarize
php spark logs:summarize yesterday
php spark logs:summarize 2026-02-03
php spark logs:summarize --dry-run=0 --pr=1
```

### Flags
- `--dry-run` (default ON): Preview only; do not write artifacts.
- `--dry-run=0`: Disable dry-run and write artifacts.
- `--pr=1`: Generate PR bundles for actionable fixes (requires `--dry-run=0`).

## PR rules
When actionable fixes are detected, the command creates **one PR bundle per logical fix group** at:
```
/writable/aiops/logs/prs/YYYY-MM-DD/<short-slug>
```
Each bundle includes:
- `pr.md` (description with summary, references, risk, rollback)
- `manifest.json` (labels, guardrails, severity)
- `changes.patch` (documentation-only patch by default)

Labels applied in the manifest:
- `aiops`
- `logs`
- `automated`
- `severity:blocker|high|medium|low`

## Guardrails & safety constraints
- No automatic modifications to migrations.
- No `.env` edits.
- No force-push or auto-merge.
- Lockfile to prevent overlapping runs: `/writable/aiops/logs/locks/logs-summarize.lock`.
- Requires explicit `--pr=1` to generate PR bundles.
- Default dry-run prevents accidental writes.

## CRON schedule (CST-aware)
Add this to your server crontab (uses America/Chicago timezone):
```
59 11 * * * TZ=America/Chicago cd /home/mymiteam/mymiwallet/site/current \
  && php spark logs:summarize --pr=1 --dry-run=0 \
  >> /home/mymiteam/mymiwallet/site/current/writable/aiops/logs/audit/logs-summarize-cron.log 2>&1
```

## How to disable or pause
- Temporarily disable by commenting out the CRON entry.
- For emergency pause, create the lockfile manually and remove it when ready:
  - `/writable/aiops/logs/locks/logs-summarize.lock`
