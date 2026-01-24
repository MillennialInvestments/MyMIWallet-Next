# spark:discord:process-queue

## Purpose
Process queued Discord messages respecting quiet hours, pacing, and dedupe rules.

## Usage
php spark discord:process-queue [limit]

## Arguments
- limit (int) – Maximum messages to send (default: 25).

## What It Touches
- Database tables: `bf_discord_queue`, `bf_discord_channels`, `bf_discord_subscriptions`, `bf_discord_policies`, `bf_discord_events_log`
- Files/directories: None
- Cache: None
- External APIs: Discord webhook/bot API

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (updates queue statuses, logs events)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes
- Suggested schedule: Every 5–15 minutes or hourly based on volume.

## Related Commands
- spark:discord:wire-check
- spark:discord:test

## Failure Modes
- Discord env/config missing.
- Queue claims fail or webhook errors.
- Quiet hours defer messages unexpectedly.

## Status
- Existing
