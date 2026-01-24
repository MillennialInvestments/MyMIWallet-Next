# spark:discord:wire-check

## Purpose
Validate Discord environment variables, tables, and queue health.

## Usage
php spark discord:wire-check

## Arguments
- None.

## What It Touches
- Database tables: `bf_discord_channels`, `bf_discord_templates`, `bf_discord_subscriptions`, `bf_discord_queue`, `bf_discord_message_history`, `bf_discord_policies`, `bf_discord_events_log`, `bf_discord_logs` (read)
- Files/directories: None
- Cache: None
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes (low cost)
- Suggested schedule: On-demand or weekly health checks.

## Related Commands
- spark:discord:list
- spark:discord:process-queue

## Failure Modes
- Missing Discord tables.
- Database connectivity errors.

## Status
- Existing
