# log_summarize_and_diff

## Purpose
Summarize latest CI4 logs and highlight deltas since previous summary.

## Schedule
Hourly at minute 0.

## Entrypoint
`scripts/ops/log_summarize_and_diff.sh`

## Inputs
- Optional `LOG_DATE=YYYY-MM-DD` (defaults to today).
- Optional `PREVIOUS_DATE` to compare two days explicitly.

## Outputs
- JSON summary counts by level and "new since last run" section.

## Failure modes
- Missing log file for target date.
- Insufficient permissions to read `writable/logs`.

## Logging locations
- stdout for cron capture.
- Optional append to `HEALTH_LOG` path.

## Rollback
Not applicable; rerun with corrected date or permissions.

## Manual run command (SSH-safe)
```bash
bash scripts/ops/log_summarize_and_diff.sh
```

## Security notes
- Do not include secrets; script truncates lines and avoids writing raw stack traces to JSON when possible.
