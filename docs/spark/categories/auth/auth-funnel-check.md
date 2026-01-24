# spark:auth:funnel-check

## Purpose
Check auth funnel sanity using recent user events and emit alerts on drop-offs.

## Usage
php spark auth:funnel-check

## Arguments
- None.

## What It Touches
- Database tables: `bf_user_events` (read)
- Files/directories: None
- Cache: None
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes
- Suggested schedule: Daily or hourly depending on traffic.

## Related Commands
- spark:auth:smoke
- spark:auth:audit

## Failure Modes
- Missing `bf_user_events` table.
- No recent events to analyze.

## Status
- Existing
