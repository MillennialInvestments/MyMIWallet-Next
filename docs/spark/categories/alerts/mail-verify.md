# spark:mail:verify

## Purpose
Verify SMTP settings by sending a diagnostic email and logging the outcome.

## Usage
php spark mail:verify you@example.com

## Arguments
- to (string) – Recipient email address (required).

## What It Touches
- Database tables: None
- Files/directories: None
- Cache: None
- External APIs: SMTP server

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (sends email)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: No
- Suggested schedule: On-demand testing.

## Related Commands
- spark:mail:test
- spark:mail:send

## Failure Modes
- SMTP authentication failures.
- Network/transport errors.

## Status
- Existing
