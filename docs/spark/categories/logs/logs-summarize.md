# spark:logs:summarize

## Purpose
Summarize CI4 logs for a given date, including new entries since the last run.

## Usage
php spark logs:summarize [date|yesterday]

## Arguments
- date (string) – Optional `yesterday` or `YYYY-MM-DD` date string.

## What It Touches
- Database tables: None
- Files/directories: Reads daily log file and writes `summary-YYYY-MM-DD.log` and `summary-YYYY-MM-DD.state` in the log directory.
- Cache: None
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (summary/state log files)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes
- Suggested schedule: Daily.

## Related Commands
- spark:logs:healthcheck

## Failure Modes
- Log file not found for the date.
- Insufficient permissions to read/write log directory.

## Implementation
- File: `app/Commands/Logs/Summarize.php`
- Service: `app/Services/Spark/LogSummarizeService.php`

## Example Output
```
Starting logs:summarize
Summary generated for 2024-03-02: /path/to/writable/logs/summary-2024-03-02.log
Last processed timestamp updated to: 2024-03-02 09:42:10
total_entries=128
new_entries=12
```

## Status
- Implemented
