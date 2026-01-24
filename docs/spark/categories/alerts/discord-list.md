# spark:discord:list

## Purpose
List configured Discord channels, webhooks, and IDs from config and database.

## Usage
php spark discord:list

## Arguments
- None.

## What It Touches
- Database tables: `bf_discord_channels`, `bf_discord_subscriptions` (read)
- Files/directories: None
- Cache: None
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: No
- Suggested schedule: On-demand troubleshooting.

## Related Commands
- spark:discord:wire-check
- spark:discord:process-queue

## Failure Modes
- Discord tables missing.
- Database connection errors.

## Status
- Existing
