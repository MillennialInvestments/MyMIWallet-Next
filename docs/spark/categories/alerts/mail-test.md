# spark:mail:test

## Purpose
Send a DreamHost SMTP test email and output transport diagnostics.

## Usage
php spark mail:test you@example.com

## Arguments
- to (string) – Recipient email address (or env `mail.test.to`).

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
- spark:mail:send
- spark:mail:verify

## Failure Modes
- SMTP configuration invalid.
- SMTP connection failures.

## Status
- Existing
