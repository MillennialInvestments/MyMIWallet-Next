# ops/log_summarize_and_diff.sh

## Purpose
Summarize log level counts for a given day (default today) and optionally compare to yesterday, emitting JSON for dashboards.

## How to run
- `bash scripts/ops/log_summarize_and_diff.sh`
- `LOG_DATE=2025-12-20 PREVIOUS_DATE=2025-12-19 bash scripts/ops/log_summarize_and_diff.sh`

## Inputs / outputs
- **Inputs**: Env `LOG_DATE`, `PREVIOUS_DATE`, `HEALTH_LOG` optional.
- **Outputs**: JSON with counts per log level; optional append to HEALTH_LOG.

## Dependencies
- bash, awk, date, file access to `writable/logs/log-<date>.log`.

## Risks found
- When log file missing, returns JSON error but exits 0—may hide failure in automation.
- No usage/help or validation of date formats.

## Suggested improvements
- Add `usage()` and exit non-zero when current log is missing (unless `--allow-missing`).
- Add `--format pretty` option and optional level allowlist to reduce payload size.

## Proposed patch summary
- Implement argument parsing with defaults, non-zero exit on missing logs, and improved JSON formatting.

## Owner Notes
- DreamHost-safe. Ensure log paths exist and are readable by the shell user.
