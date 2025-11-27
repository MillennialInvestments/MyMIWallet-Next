# Discord Alerts & Queueing Overview

This document summarizes how the MyMI Discord integration is wired so the ops team can inspect and manage it without relying on live Discord API introspection.

## Delivery model

- **Primary path:** Discord webhooks configured per channel key. Webhooks can be stored in the database (`bf_discord_channels.webhook_url`) or in environment variables loaded by `Config\Discord::$channelWebhooks`.
- **Optional fallback:** The Bot API can be used when `DISCORD_USE_BOT_API_FALLBACK=true` and the target `channel_id` is present in the DB or config. Core functionality should continue to work without the Bot API.
- **Queue-first:** All messages flow through `bf_discord_queue`. The library coalesces, respects quiet hours, enforces pacing, and logs results.

## Channels & configuration

Channel keys map to Discord channels and should be present in `bf_discord_channels` as well as `.env` if you want config fallbacks:

- `alerts` → #trade-alerts (paid tiers)
- `alerts.free` → #trade-alerts-free
- `alerts.tier1` → #trade-alerts-tier1 (Basic)
- `alerts.tier2` → #trade-alerts-tier2 (Premium)
- `alerts.tier3` → #trade-alerts-tier3 (Gold)
- `marketing` → #marketing-news
- `earnings` → #earnings-watch
- `ops` → #ops-status
- `support` → #support (optional)
- `staging` → #staging-sandbox

Environment variables:

- Webhooks: `DISCORD_*_WEBHOOK` (one per channel key above)
- Channel IDs (Bot fallback): `DISCORD_*_CHANNEL_ID`
- Core flags: `DISCORD_DEFAULT_WEBHOOK`, `DISCORD_USE_BOT_API_FALLBACK`, `DISCORD_STORE_WEBHOOK_MSG_ID`, `DISCORD_ALERTS_STRICT`, `DISCORD_ALERTS_DRY_RUN`
- Quiet hours: `DISCORD_TIMEZONE`, `DISCORD_QUIET_HOURS_START`, `DISCORD_QUIET_HOURS_END`

## Database tables

Migrations create the following tables under the `bf_discord_*` namespace:

- `bf_discord_channels` — channel registry, pacing, and webhook/channel ID storage. Seeded with baseline channel keys.
- `bf_discord_subscriptions` — event → channel/template routing, digests, and quiet-hour bypass.
- `bf_discord_queue` — queued payloads, dedupe, coalescing, retry/backoff state.
- `bf_discord_policies` — content sanitization rules (drop/mask).
- `bf_discord_events_log` — optional structured log of Discord-related events.

Run migrations with `php spark migrate` and inspect data with `php spark db:seed` if additional seeders are added later.

## CLI helpers

Use the Spark commands to validate wiring without hitting live Discord APIs:

- `php spark discord:list` — prints environment/config summary plus DB channel rows (webhook/channel ID presence, pacing, enabled state). No HTTP calls are made.
- `php spark discord:test staging "hello"` — enqueues a test message to the given `channel_key` (default `staging`) and immediately processes a small batch to deliver through webhook/Bot fallback.

## Adding a new channel

1. Add the `channel_key` to `.env` (`DISCORD_<KEY>_WEBHOOK` and optionally `DISCORD_<KEY>_CHANNEL_ID`).
2. Insert or update a row in `bf_discord_channels` with `channel_key`, `is_enabled = 1`, webhook URL, and pacing settings.
3. (Optional) add subscriptions in `bf_discord_subscriptions` that reference the new channel.
4. Run `php spark discord:list` to confirm the channel appears with webhook/channel ID presence.

## Troubleshooting

- If the VPS receives HTML responses from Discord APIs, do not rely on `apiGet()`. Webhook delivery should still succeed.
- Quiet hours and min interval pacing can defer messages; `bf_discord_queue.available_at` shows when a message will retry.
- Content that matches a `bf_discord_policies` drop rule is removed during sanitization; adjust policies if legitimate messages are dropped.
- Critical failures should be surfaced to the `ops` channel by enqueuing a plain message: `model('MyMIDiscord')->enqueuePlain('ops', 'Alert system offline');`.

## Management UI (roadmap)

- Phase 1: read-only admin view that lists `bf_discord_channels` (enabled flag, min interval, presence of webhook/channel IDs).
- Phase 2: editable forms to toggle `is_enabled` and adjust pacing/webhook/channel ID fields, plus subscription management for `bf_discord_subscriptions`.
- Keep the UI backed by the same tables; no live Discord API calls should be required.