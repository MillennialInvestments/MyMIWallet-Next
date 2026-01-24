# spark:discord:test

## Purpose
Queue and dispatch a test Discord message through the pipeline.

## Usage
php spark discord:test [channelKey] [message]

## Arguments
- channelKey (string) – Discord channel key (default: `staging`).
- message (string) – Message text (default: `MyMI Discord test message`).

## What It Touches
- Database tables: `bf_discord_queue`, `bf_discord_channels`, `bf_discord_events_log`
- Files/directories: None
- Cache: None
- External APIs: Discord webhook/bot API

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (queues and dispatches messages)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: No
- Suggested schedule: On-demand testing.

## Related Commands
- spark:discord:process-queue
- spark:discord:test-liquidity

## Failure Modes
- Discord channel config missing.
- Message blocked by policy/sanitization.

## Status
- Existing
