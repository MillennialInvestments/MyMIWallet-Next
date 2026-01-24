# spark:discord:test-liquidity

## Purpose
Send a test Liquidity Scan alert to the alerts.liquidity channel.

## Usage
php spark discord:test-liquidity [ticker]

## Arguments
- ticker (string) – Optional ticker symbol override (default: `TEST`).

## What It Touches
- Database tables: `bf_discord_queue`, `bf_discord_events_log`
- Files/directories: None
- Cache: None
- External APIs: Discord webhook/bot API

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (queues liquidity alert)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: No
- Suggested schedule: On-demand testing.

## Related Commands
- spark:discord:process-queue
- spark:discord:test

## Failure Modes
- Discord config missing for liquidity channel.
- Queue insert failures.

## Status
- Existing
