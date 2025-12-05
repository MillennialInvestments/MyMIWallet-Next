# MyMIDiscord – Server Setup & Alert Routing Guide

This guide walks through configuring a Discord server, wiring environment variables, registering database rows, and using the `MyMIDiscord` library so MyMI Wallet can deliver automated alerts (scanner, earnings, news, trades, ops) into the right Discord channels.

## Pipeline at a Glance
```
MyMI Data (Emails / Scanners / APIs)
  → Alerts / Marketing libraries
  → MyMIDiscord::dispatch() / enqueuePlain()
  → bf_discord_queue (coalesce + quiet-hour deferrals)
  → php spark discord:process-queue
  → Discord Channel / Webhook
```

## 1) Prerequisites
- A Discord **server (guild)** where you can manage channels and webhooks.
- A **Discord bot** created in the Developer Portal with:
  - Bot token
  - Guild ID (server ID)
- A deployed **MyMI Wallet (CodeIgniter 4)** app with:
  - `app/Config/Discord.php` loaded by CI4 and hydrated via `.env`
  - `app/Libraries/MyMIDiscord.php` available
  - Database tables present: `bf_discord_channels`, `bf_discord_templates`, `bf_discord_subscriptions`, `bf_discord_queue`, `bf_discord_message_history`, and optional `bf_discord_policies`, `bf_discord_events_log`, `bf_discord_logs`, `bf_discord_rate_limits`
- **PHP CLI / CRON** access to run `php spark` commands.

## 2) Environment Variables (.env) Setup
`Config\Discord` pulls every value from `.env` (CI4 uses `env()`/`getenv()`), so key names must match exactly. A typical block:
```
DISCORD_BOT_TOKEN="xxxxxxxxxxxxxxxxxxxxxxxx"
DISCORD_GUILD_ID="726783076188815452"
DISCORD_TIMEZONE="America/Chicago"

DISCORD_ALERTS_LIQUIDITY_SCANS_CHANNEL_ID="1443981138837110844"
DISCORD_ALERTS_LIQUIDITY_SCANS_WEBHOOK="https://discord.com/api/webhooks/..."
DISCORD_ALERTS_NEWS_WEBHOOK="https://discord.com/api/webhooks/..."    # example

DISCORD_MIN_SECONDS_BETWEEN_POSTS=60
DISCORD_QUIET_HOURS_START="22:00"
DISCORD_QUIET_HOURS_END="06:30"

DISCORD_USE_BOT_API_FALLBACK=true
DISCORD_STORE_WEBHOOK_MSG_ID=true
DISCORD_ALERTS_STRICT=false
DISCORD_ALERTS_DRY_RUN=false
DISCORD_ALERTS_JOB_RETRY_BASE_SEC=30
```
Key notes:
- Channel-specific keys follow the pattern `DISCORD_<CHANNELKEY_IN_CAPS>_WEBHOOK` and `DISCORD_<CHANNELKEY>_CHANNEL_ID` (for Bot API fallback). Examples: `DISCORD_ALERTS_WEBHOOK`, `DISCORD_ALERTS_TIER1_WEBHOOK`, `DISCORD_MARKETING_NEWS_WEBHOOK`, `DISCORD_EARNINGS_WEBHOOK`, `DISCORD_OPS_WEBHOOK`.
- Timezone, quiet hours, and min spacing are hydrated from `.env` by `Config\Discord` and `MyMIDiscord::hydrateConfigFromEnv()`.
- Retry pacing uses `DISCORD_ALERTS_JOB_RETRY_BASE_SEC` (exponential backoff seed).

Verify wiring via CLI:
- `php spark discord:list` – dumps env-backed config plus DB channels/subscriptions.
- `php spark discord:wire-check` – if present in your build, runs a connectivity sanity check; otherwise use `discord:test` below.
- `php spark discord:test staging "hello"` – enqueues and processes a single message end-to-end.

## 3) Discord Server: Channels & Webhooks
Follow these steps in Discord (Developer Mode helps copy IDs):
1. Create or identify channels for each alert type, e.g. `#liquidity-scans` (`channel_key = alerts.liquidity`), `#trade-alerts-free` (`alerts.free`), `#trade-alerts-tier1` (`alerts.tier1`), `#marketing-news` (`marketing.news`), `#ops-status` (`ops`).
2. For each channel: **Right-click → Edit Channel → Integrations → Webhooks**.
3. Create a webhook (e.g., “MyMI Liquidity Scanner”), copy the **webhook URL**.
4. With Developer Mode on, right-click the channel name → **Copy ID** (for Bot API fallback).
5. Paste webhook + channel ID into `.env` using the matching keys (e.g., `DISCORD_ALERTS_LIQUIDITY_SCANS_WEBHOOK`, `DISCORD_ALERTS_LIQUIDITY_SCANS_CHANNEL_ID`).
6. Prefer webhooks for stability. `MyMIDiscord::deliver()` will fall back to the Bot API if `useBotApiFallback` is true and a webhook is missing/invalid.

See `server_setup_and_ci4_integration.md` for Discord UI screenshots and CI4 bootstrap tips.

## 4) Database Tables – Schema & Purpose
(See `discord_schema.sql.md` and `discord_schema_v3.sql.md` for full SQL.)

### `bf_discord_channels`
Registers logical channel keys and pacing:
- Key fields: `channel_key`, `name`, `webhook_url`, `channel_id`, `is_enabled`, `allow_embeds`, `min_interval_sec`, `last_sent_at`, `role_id`, `category`, `priority`, `topic`, timestamps.
- `channel_key` is the logical name used in code (e.g., `alerts.liquidity`, `marketing.news`).
- `webhook_url` + `channel_id` define delivery targets; `min_interval_sec` enforces per-channel rate limiting; `is_enabled` can disable a channel without deleting it.

### `bf_discord_templates`
Stores message bodies and embeds for `renderTemplate()`:
- Fields: `template_key`, `title`, `content`, `embed_json`, `is_enabled`, timestamps.
- Content supports mustache-style placeholders like `{{ticker}}`, `{{scanner}}`, loops `{{#items}}…{{/items}}`; embeds are stored as JSON strings.

### `bf_discord_subscriptions`
Maps events to channels and templates:
- Fields: `event_key`, `channel_key`, `template_key`, `filters_json`, `role_key`, `mention_role`, `priority`, `coalesce_key`, `digest_window_sec`, `max_per_window`, `digest_template_key`, `quiet_bypass`, `is_enabled`, timestamps.
- `filters_json` can scope by ticker list, etc. `digest_window_sec` + `coalesce_key` drive batching. `quiet_bypass` overrides quiet hours for urgent events.

### `bf_discord_queue`
Holds payloads until the worker sends them:
- Fields include `channel_key`, `payload_json`, `dedupe_hash`, `dedupe_key`, `status`, `priority`, `coalesce_key`, `attempts`, `available_at`, `error`, timestamps.
- Populated via `enqueue()`/`dispatch()`/`enqueuePlain()`. `processQueue()` applies quiet hours, pacing, dedupe, backoff.

### Supporting tables
- `bf_discord_message_history` (dedupe + message ID storage), including `normalized_hash` for fuzzy matching.
- `bf_discord_policies` (regex block/mask rules used by `sanitize()` to drop or mask content).
- `bf_discord_events_log` / `bf_discord_logs` / `bf_error_logs` (operational logging) and optional `bf_discord_rate_limits`.

## 5) MyMIDiscord Library – How to Use
Key methods (see `app/Libraries/MyMIDiscord.php`):
- `dispatch(string $eventKey, array $data): bool`
  - Looks up subscriptions via `DiscordModel::getEnabledSubscriptions($eventKey)`.
  - Renders the linked template with `renderTemplate()`.
  - Enqueues payloads into `bf_discord_queue` (one per subscription).
- `enqueuePlain(string $channelKey, string $content, array $context = []): bool`
  - Queues a raw message to a specific `channel_key`; accepts optional `embeds`, `priority`, `dedupe_key`, `coalesce_key`.
- `processQueue(int $limit = 25): array`
  - Worker loop: coalesces digests, enforces quiet hours, per-channel pacing, dedupe, and backoff before calling `deliver()`.
- `renderTemplate(string $templateKey, array $data): ?array`
  - Returns `['content' => ..., 'embeds' => [...]]` using a lightweight mustache replacer.
- `notifyLiquidityScan(array $payload): bool`
  - Normalizes scanner fields then calls `dispatch('scanner.liquidity', ...)`.
- `apiGet(string $endpoint)`
  - Helper for Bot API reads; used by CLI tools to enumerate guild data.

Usage examples:
```php
$discord = new \App\Libraries\MyMIDiscord();

// Simple plain-text send
$discord->enqueuePlain('alerts.liquidity', 'Test liquidity alert from CLI.');

// Event-based dispatch using templates
$discord->dispatch('scanner.liquidity', [
    'ticker'       => 'AAPL',
    'scanner'      => '0001 - EMA Liquidity 1Hr',
    'timeframe'    => '1H',
    'price'        => 230.15,
    'notes'        => 'Break above VWAP',
    'triggered_at' => date('Y-m-d H:i:s'),
]);
```

Process the queue (CRON-friendly):
```
php spark discord:process-queue --limit 50
```

See `discord_to_ci4_commands.md` for command cheatsheets and `operations_and_montioring.md` for health checks.

## 6) Liquidity Scanner – End-to-End Wiring Example
1. **Environment**
   - `DISCORD_ALERTS_LIQUIDITY_SCANS_CHANNEL_ID="1443981138837110844"`
   - `DISCORD_ALERTS_LIQUIDITY_SCANS_WEBHOOK="https://discord.com/api/webhooks/..."`
2. **Channel row (`bf_discord_channels`)**
   - `channel_key = alerts.liquidity`, `webhook_url` + `channel_id` set, `is_enabled = 1`, `min_interval_sec` as desired.
3. **Template (`bf_discord_templates`)**
   - `template_key = scanner.liquidity.basic`
   - `content` example: `Scanner: {{scanner}} | Ticker: {{ticker}} | TF: {{timeframe}} | Price: {{price}} | Notes: {{notes}}`
   - Optional `embed_json` with richer fields or thumbnails.
4. **Subscription (`bf_discord_subscriptions`)**
   - `event_key = scanner.liquidity`
   - `channel_key = alerts.liquidity`
   - `template_key = scanner.liquidity.basic`
   - Optional: `coalesce_key` for batch mode, `quiet_bypass` if needed.
5. **Backend call** (e.g., when parsing Thinkorswim/Email scanner hits):
```php
public function sendLiquidityScannerAlert(array $row): void
{
    $discord = new \App\Libraries\MyMIDiscord();

    $discord->dispatch('scanner.liquidity', [
        'ticker'       => $row['symbol'],
        'scanner'      => $row['scanner_name'],
        'timeframe'    => $row['timeframe'] ?? '1H',
        'price'        => $row['last_price'] ?? null,
        'notes'        => $row['notes'] ?? null,
        'triggered_at' => $row['triggered_at'] ?? date('Y-m-d H:i:s'),
    ]);
}
```
6. **Queue worker / CRON**
   - Run every minute (example DreamHost cron):
     ```
     * * * * * /usr/local/php82/bin/php /home/ACCOUNT/mymiwallet/site/current/spark discord:process-queue --limit 50 \
       >> /home/ACCOUNT/logs/discord_process_queue.log 2>&1
     ```
   - Messages send when the worker runs; quiet hours/pacing still apply.

## 7) Other Event Types (patterns to follow)
Apply the same pattern for additional signals:
- `scanner.top_gainers`, `scanner.super_ultron`, `scanner.penny_swing` → create channel keys (e.g., `alerts.scanners`, `alerts.tier2`), add channel row, template, subscription, then call `dispatch('scanner.top_gainers', $data)` from the relevant scanner parser.
- `alerts.earnings` → earnings calendar automation posts; see `earnings_calendar_automation.md` for payload structure.
- `alerts.news` / `marketing.news` → news digests or one-offs; see `marketing_news_automation.md` for examples and digest coalescing.
- `alerts.trade` → trade open/close alerts sourced from `bf_investment_trade_alerts`; see `alerts_automation.md` for channel routing and templating guidance.
- `ops.*` / `support.*` → operational or support pings (e.g., queue backpressure, API outages) routed to `ops` or `support` channels.

For each event: define `channel_key`, create `bf_discord_channels` row, add a `bf_discord_templates` entry, add a `bf_discord_subscriptions` row, then call `dispatch()` from the owning library/controller.

## 8) Monitoring, Debugging & Safety
- **Logs**: delivery failures are logged via `DiscordModel::logEvent()` into `bf_discord_events_log`, `bf_discord_logs`, and mirrored to `bf_error_logs` when available. Transport errors also surface in PHP logs.
- **Invalid webhooks**: `deliver()` automatically disables channels (`is_enabled = 0`) on HTTP 401/403/404 responses.
- **Policies**: `bf_discord_policies` lets you drop or mask content via regex before sending.
- **Dry run**: set `DISCORD_ALERTS_DRY_RUN=true` to log payloads without posting.
- **Diagnostics**: use `php spark discord:list` to view env wiring and DB rows; `discord:test` or `discord:test-liquidity` to exercise the pipeline; `processQueue` to flush queued payloads.

## 9) Additional References
- `alerts_automation.md` – trade alert templating and distribution.
- `earnings_calendar_automation.md` – earnings posts and scheduling.
- `marketing_news_automation.md` – news ingestion and digesting.
- `operations_and_montioring.md` – health checks, ops alerts, and CRON hygiene.
- `discord_integration_overview.md` – high-level touchpoints.
- `discord_to_ci4_commands.md` – CLI command summary.
