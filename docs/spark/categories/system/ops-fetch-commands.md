# spark:ops:fetch-commands

## Purpose
Fetch unread ops commands from IMAP and store them in the ops inbox table.

## Usage
php spark ops:fetch-commands

## Arguments
- None (uses IMAP env vars: `MYMI_OPS_IMAP_HOST`, `MYMI_OPS_IMAP_USER`, `MYMI_OPS_IMAP_PASS`).

## What It Touches
- Database tables: `bf_ops_command_inbox` (write)
- Files/directories: None
- Cache: None
- External APIs: IMAP mailbox

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (inserts inbox rows)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes
- Suggested schedule: Every 5–15 minutes or hourly.

## Related Commands
- spark:ops:analyze-commands
- spark:ops:work

## Failure Modes
- IMAP extension missing.
- IMAP credentials invalid.
- Sender not allowlisted or token mismatch.

## Status
- Existing
