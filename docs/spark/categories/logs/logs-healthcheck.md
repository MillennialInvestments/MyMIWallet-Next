# spark:logs:healthcheck

## Purpose
Emit test logs and verify file + DB log sinks are functioning.

## Usage
php spark logs:healthcheck

## Arguments
- None.

## What It Touches
- Database tables: `bf_error_logs` (read via log sink)
- Files/directories: Writes to current log file under `writable/logs/`.
- Cache: None
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (writes log records)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes
- Suggested schedule: Daily.

## Related Commands
- spark:logs:summarize

## Failure Modes
- Log file path missing/unwritable.
- Database log sink missing.

## Implementation
- File: `app/Commands/Logs/Healthcheck.php`
- Service: `app/Services/Spark/LogHealthcheckService.php`

## Example Output
```
Starting logs:healthcheck

Log healthcheck summary
----------------------------------------
marker: 1f2c3d4a5b6c
file_log_path: /path/to/writable/logs/log-2024-03-02.php
file_log_ok=true
db_log_ok=true
db_rows=1
overall=PASS
```

## Status
- Implemented
