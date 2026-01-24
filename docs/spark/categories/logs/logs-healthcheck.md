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

## Status
- Existing
