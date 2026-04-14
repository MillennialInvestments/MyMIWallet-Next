# Python Utilities for Discord Support

The PHP/CI4 stack remains the source of truth for Discord alerts, but optional Python workers can provide digests, analytics, and MEE6 exploration without disrupting the core pipeline.

## Folder layout
- `tools/python/discord/realtime_digest_worker.py`
- `tools/python/discord/engagement_analytics_worker.py`
- `tools/python/discord/mee6_bridge_explorer.py`
- `tools/python/discord/config.sample.json` (sample shared config)

Each script is CLI-driven (`python realtime_digest_worker.py`) and expects a `.env` or `config.json` file with API hosts, webhook URLs, and tokens.

### Common configuration keys
- `api_base` — Base URL for CI4 APIs (e.g., `https://www.mymiwallet.com/index.php`).
- `cron_key` — Optional Management cron key when calling secured CI4 routes.
- `discord_webhook_digest` — Webhook URL for digest posts.
- `discord_webhook_engagement` — Webhook or channel for engagement metrics.
- `discord_mymi_ai_bot_token` — Primary bot token for optional Discord REST calls (rate-limit safely).
- `discord_bot_token` — Optional backward-compatible fallback key for older worker configs.
- `guild_id` — Guild ID for role/member lookups.
- `lookback_minutes` — Default lookback for digests or analytics.

## Scripts

### realtime_digest_worker.py
Purpose: poll a CI4 endpoint (e.g., `/API/Discord/feed/alerts-recent` or a DB view) for the last N alerts, roll them into a 5-minute/15-minute summary, and post the digest to a Discord webhook.

Behavior:
- Loads config from `config.json` or `.env`.
- Fetches alerts JSON; groups by symbol and recency.
- Builds a concise text payload and posts to the digest webhook.
- Logs to stdout for CRON supervision; supports dry-run mode.

### engagement_analytics_worker.py
Purpose: gather basic engagement metrics to fuel Discord upsells.

Behavior:
- Pulls message/reaction counts either from Discord REST (when `discord_mymi_ai_bot_token` is provided, or legacy `discord_bot_token` fallback exists) or from a local `bf_discord_events`/`bf_discord_events_log` view if available.
- Calculates totals by channel and tier (e.g., free vs. paid alert channels).
- POSTs metrics back to a CI4 endpoint (stubbed in the script) or writes a local JSON report.
- Can emit an upsell-friendly summary to a Discord webhook.

### mee6_bridge_explorer.py
Purpose: document what can be mirrored between MEE6 and MyMIDiscord without assuming private APIs.

Behavior:
- Reads Discord roles/members using the bot token and `guild_id`.
- Compares role IDs to MyMI plan data pulled from CI4 (e.g., `/API/Management/getAssets` or a dedicated plan endpoint).
- Prints a report of role coverage and gaps to stdout and optionally posts a short note to a webhook.

## Running the workers

```bash
cd tools/python/discord
python realtime_digest_worker.py --config config.json
python engagement_analytics_worker.py --config config.json --dry-run
python mee6_bridge_explorer.py --config config.json
```

- Use `--dry-run` to log payloads instead of posting to Discord.
- Schedule via CRON/systemd timers; ensure Python 3.9+ is installed and outbound HTTPS is allowed.

## Safety notes
- Do not hardcode secrets. The scripts prefer `config.json` but will also read `.env` if `python-dotenv` is installed.
- Respect Discord rate limits; the scripts include simple sleep/cooldown helpers to avoid spam.
- Keep summaries under 2000 characters to match webhook limits.
