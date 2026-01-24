# spark:mail:send

## Purpose
Process and send queued mail jobs.

## Usage
php spark mail:send [limit]

## Arguments
- limit (int) – Maximum mail queue items to process (default: 25).

## What It Touches
- Database tables: `bf_mail_queue`
- Files/directories: None
- Cache: None
- External APIs: SMTP/Postmark depending on provider

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (updates mail queue status)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes
- Suggested schedule: Every 5–15 minutes or hourly.

## Related Commands
- spark:mail:send-test
- spark:mail:test
- spark:mail:verify

## Failure Modes
- Mail provider unavailable or misconfigured.
- Queue items fail and are deferred.

## Status
- Existing
