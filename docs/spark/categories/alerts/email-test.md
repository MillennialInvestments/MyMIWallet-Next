# spark:email:test

## Purpose
Send a test email using the current SMTP configuration via `mailService`.

## Usage
php spark email:test you@example.com

## Arguments
- to (string) – Recipient email address (or env `test.email.to`).

## What It Touches
- Database tables: None
- Files/directories: None
- Cache: None
- External APIs: SMTP provider

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (sends email)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: No
- Suggested schedule: On-demand testing.

## Related Commands
- spark:mail:test
- spark:mail:verify

## Failure Modes
- SMTP configuration invalid.
- mailService returns error.

## Status
- Existing
