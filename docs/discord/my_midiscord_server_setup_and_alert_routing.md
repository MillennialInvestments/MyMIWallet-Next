# MyMIDiscord Server Setup & Alert Routing

Use this guide to deploy MyMIDiscord on a new server, hook up channels/templates, and validate that alerts flow end-to-end.

## Quick wiring checklist
- Confirm webhooks or channel IDs exist for each channel key in `bf_discord_channels` (see `discord_seed_v3.sql.md`).
- Populate env vars from `environments.md` and confirm `Config\\Discord` picks them up.
- Seed templates and subscriptions per `events_matrix.md`.
- Enable CRON or supervisors that call `php spark discord:process-queue --limit 25` regularly.

## CLI helpers
- `php spark discord:list` — summarize env/config and database channels/subscriptions.
- `php spark discord:wire-check` — verify required env vars, table presence, and basic queue health.
- `php spark discord:process-queue --limit 10` — run the queue worker once (respects quiet hours + pacing).
- `php spark discord:test staging "hello"` — enqueue and process a quick test payload.
- `php spark discord:test-liquidity NVDA` — enqueue a sample liquidity scan event for `alerts.liquidity`.

## Dispatch examples (For Developers)
```php
$discord = new \App\Libraries\MyMIDiscord();

// Plain text to a specific channel
$discord->enqueuePlain('alerts.free', "Test alert at " . date('H:i:s'));

// Templated dispatch using event_key + template_key mapping
$discord->dispatch('scanner.liquidity', [
    'ticker'       => 'AAPL',
    'scanner'      => 'EMA Liquidity 1Hr',
    'timeframe'    => '1h',
    'price'        => 187.42,
    'triggered_at' => date('Y-m-d H:i:s'),
]);
```

## How to verify everything is working
1. **Env check:** run `php spark discord:wire-check` and confirm all required env vars resolve and core tables exist.
2. **Channel listing:** run `php spark discord:list` to verify channel keys have either a webhook or channel ID plus pacing settings.
3. **Queue a test alert:** from a controller, Spark command, or queued worker running inside CI4 runtime, call:
   ```php
   $discord = new \App\Libraries\MyMIDiscord();
   $discord->enqueuePlain('alerts.liquidity', 'Test liquidity alert at ' . date('H:i:s'));
   ```
4. **Process the queue:** run `php spark discord:process-queue --limit 5` and confirm the message lands in Discord (or logs as dry run).
5. **Quiet hours/pacing:** if messages defer, inspect `bf_discord_queue.available_at` and `bf_discord_channels.min_interval_sec`.
6. **Template rendering:** use the unit tests (`phpunit --filter MyMIDiscordTest`) to validate mustache replacements and queue behaviors without hitting real webhooks.

## Routing reminders
- HTTP triggers still exist for alerts: `/API/Alerts/sendDiscordAlerts`, `/API/Alerts/sendDiscordAlertsBySymbol/{symbol}`, and `/API/Management/sendAllDiscordAlerts`.
- Keep `DISCORD_ALERTS_DRY_RUN=true` on staging when validating new templates or channels.
- Respect the 2000-character limit and leverage digest templates for noisy events.
