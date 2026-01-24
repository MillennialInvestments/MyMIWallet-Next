# spark:mail:send-test

## Purpose
Send a test email using branded templates (activation, reset, generic).

## Usage
php spark mail:send-test --to=you@example.com --template=activation

## Arguments
- --to (string) – Recipient email address (required).
- --template (string) – Template type: `activation`, `reset`, or `generic`.

## What It Touches
- Database tables: `bf_mail_queue`, `bf_email_outbox`
- Files/directories: Reads email templates from `app/Views/emails/`.
- Cache: None
- External APIs: SMTP provider

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (queues outbox + sends email)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: No
- Suggested schedule: On-demand testing.

## Related Commands
- spark:mail:send
- spark:mail:test
- spark:mail:verify

## Failure Modes
- Missing templates or SMTP config.
- Provider errors sending the email.

## Status
- Existing
