# Discord Environment Variables

Use this file as the canonical list of environment variables required by the MyMIDiscord pipeline. Populate them in `.env` or your host configuration; the CI4 `Config\\Discord` class and `MyMIDiscord::hydrateConfigFromEnv()` already read these keys.

## Required core variables
- `DISCORD_BOT_TOKEN` — Bot token for optional Bot API fallback and future role sync.
- `DISCORD_GUILD_ID` — Guild/server ID used for member/role operations.
- `DISCORD_TIMEZONE` — Timezone for quiet hours and pacing checks (default `America/Chicago`).
- `DISCORD_MIN_SECONDS_BETWEEN_POSTS` — Global pacing value when a channel row does not override `min_interval_sec`.
- `DISCORD_QUIET_HOURS_START` / `DISCORD_QUIET_HOURS_END` — Quiet-hour window (`HH:MM`, 24h) respected by queue processing.

## Global feature flags
- `DISCORD_USE_BOT_API_FALLBACK` — Allow Bot API sends when a channel ID is present and webhook is missing.
- `DISCORD_STORE_WEBHOOK_MSG_ID` — Store webhook message IDs for follow-up edits/deletes.
- `DISCORD_ALERTS_STRICT` — Require a webhook URL or channel ID per channel; skip sends when missing.
- `DISCORD_ALERTS_DRY_RUN` — Log payloads without sending (useful for tests and staging).

## Default / fallback webhooks
- `DISCORD_DEFAULT_WEBHOOK` — Fallback webhook if no per-channel webhook is configured.

## Per-channel webhooks
Set one variable per `channel_key` (keys mirror `bf_discord_channels.channel_key` and `Config\Discord::$channelWebhooks`).

- `DISCORD_ALERTS_WEBHOOK`
- `DISCORD_ALERTS_FREE_WEBHOOK`
- `DISCORD_ALERTS_TIER1_WEBHOOK`
- `DISCORD_ALERTS_TIER2_WEBHOOK`
- `DISCORD_ALERTS_TIER3_WEBHOOK`
- `DISCORD_ALERTS_LIQUIDITY_SCANS_WEBHOOK`
- `DISCORD_ALERTS_MOMENTUM_WEBHOOK`
- `DISCORD_ALERTS_AI_WEBHOOK`
- `DISCORD_ALERTS_EMA_WEBHOOK`
- `DISCORD_ALERTS_NEWS_WEBHOOK`
- `DISCORD_MARKETING_WEBHOOK`
- `DISCORD_MARKETING_NEWS_WEBHOOK`
- `DISCORD_EARNINGS_WEBHOOK`
- `DISCORD_OPS_WEBHOOK`
- `DISCORD_SUPPORT_WEBHOOK`
- `DISCORD_STAGING_WEBHOOK`

## Per-channel Bot API IDs
Use when `DISCORD_USE_BOT_API_FALLBACK=true` to allow bot sends if webhooks are unavailable.

- `DISCORD_ALERTS_CHANNEL_ID`
- `DISCORD_ALERTS_FREE_CHANNEL_ID`
- `DISCORD_ALERTS_TIER1_CHANNEL_ID`
- `DISCORD_ALERTS_TIER2_CHANNEL_ID`
- `DISCORD_ALERTS_TIER3_CHANNEL_ID`
- `DISCORD_ALERTS_LIQUIDITY_SCANS_CHANNEL_ID`
- `DISCORD_ALERTS_MOMENTUM_CHANNEL_ID`
- `DISCORD_ALERTS_AI_CHANNEL_ID`
- `DISCORD_ALERTS_EMA_CHANNEL_ID`
- `DISCORD_ALERTS_NEWS_CHANNEL_ID`
- `DISCORD_MARKETING_CHANNEL_ID`
- `DISCORD_MARKETING_NEWS_CHANNEL_ID`
- `DISCORD_EARNINGS_CHANNEL_ID`
- `DISCORD_OPS_CHANNEL_ID`
- `DISCORD_SUPPORT_CHANNEL_ID`
- `DISCORD_STAGING_CHANNEL_ID`

## Role mapping
- `DISCORD_ROLE_PLAN_MAP` — JSON map of MyMI plans → Discord role IDs for nightly syncs (e.g., `{ "free": "...", "basic": "...", "premium": "...", "gold": "..." }`).

## Testing / backoff helpers
- `DISCORD_ALERTS_JOB_RETRY_BASE_SEC` — Base seconds for queue retry backoff (optional, default 30 seconds).

## Notes
- Secrets should live in 1Password and be injected at deploy time; do not commit webhook URLs or tokens.
- Per-channel variables can be omitted when the database stores `webhook_url` and `channel_id` values directly.
