# Discord Server Setup & CI4 Integration Guide

Step-by-step checklist to provision the Discord server, webhooks, and CI4 wiring required for the alert, marketing/news, earnings, and ops pipelines documented in this folder.

## 1) Create the Discord server foundation
> For the Support-first onboarding layout (default landing in `#welcome-support` with MEE6/Community onboarding), see [`server_setup_support_category.md`](server_setup_support_category.md) and reuse that structure for both production and staging.
1. **Create/rename the server** to something recognizable (e.g., `MyMI Wallet`).
2. **Roles**:
   - `Admin` (full control).
   - `Automation Bot` (used by webhooks/bot token; restrict to target channels only).
   - `Moderator` (manage messages in alert/news channels).
3. **Channels** (rename to your preference; create both production + staging):
   - `#trade-alerts` — real-time alert openings and updates.
   - `#alert-lifecycle` — status changes / recaps.
   - `#marketing-news` — MarketAux + newsletter digests and “Today’s Story”.
   - `#earnings-watch` — weekly and daily earnings posts.
   - `#ops-status` — CRON/health notifications.
   - `#staging-sandbox` — safe webhook tests before promotion.

## 2) Generate webhooks per channel
1. In each channel → **Settings → Integrations → Webhooks → New Webhook**.
2. Name the webhook with scope (e.g., `Trade Alerts (prod)`, `Marketing Digest (stg)`).
3. Copy the URL and store it in **1Password** under a shared vault.
4. Create both **production** and **staging** webhooks; keep staging URLs pointed at `#staging-sandbox`.

## 3) Map webhooks to CI4 configuration
1. Add secrets to `.env` (or your hosting ENV) — examples:
   ```env
   DISCORD_DEFAULT_WEBHOOK="https://discord.com/api/webhooks/xxx/yyy"   # fallback
   DISCORD_ALERTS_WEBHOOK="https://discord.com/api/webhooks/xxx/alerts"
   DISCORD_MARKETING_WEBHOOK="https://discord.com/api/webhooks/xxx/marketing"
   DISCORD_EARNINGS_WEBHOOK="https://discord.com/api/webhooks/xxx/earnings"
   DISCORD_OPS_WEBHOOK="https://discord.com/api/webhooks/xxx/ops"
   DISCORD_SUPPORT_WEBHOOK="https://discord.com/api/webhooks/xxx/support"     # optional: support inbox
   DISCORD_ALERTS_TIER1_WEBHOOK="https://discord.com/api/webhooks/xxx/tier1"  # optional: tiered alert routing
   DISCORD_BOT_TOKEN="<bot-token-if-using-bot-api>"
   DISCORD_GUILD_ID="<guild-id>"
   DISCORD_ALERTS_DRY_RUN=false        # set true on staging
   DISCORD_USE_BOT_API_FALLBACK=true   # allow bot API when channel_id is present
   ```
2. Ensure `app/Config/Discord.php` reads these env keys (already wired for `DISCORD_DEFAULT_WEBHOOK`, `DISCORD_BOT_TOKEN`, `DISCORD_GUILD_ID`, `DISCORD_USE_BOT_API_FALLBACK`, `DISCORD_ALERTS_DRY_RUN`).
3. If you prefer database-driven channels/templates, seed `bf_discord_channels`, `bf_discord_templates`, and `bf_discord_subscriptions` through the **Management → Discord** UI; store webhook URLs in `bf_discord_channels.target_webhook`.

## 4) Wire alerts to Discord
1. Verify CI4 routes are reachable (API namespace):
   - `GET/POST /API/Alerts/sendDiscordAlerts` — bulk/manual dispatch.
   - `GET/POST /API/Alerts/sendDiscordAlertsBySymbol/{symbol}` — single-symbol dispatch from modal UI.
   - `POST /API/Management/sendAllDiscordAlerts` — management trigger for queued alerts.
2. Enable CRON or queue workers that call these endpoints or run `MyMIAlerts::sendDiscordNotification()` when new alerts are created/updated.
3. In alert creation forms (`distribution_channels[]`), check **Discord** so alerts are eligible for dispatch.
4. Use staging webhooks first; confirm `notification_sent` (or queue status) flips after send to avoid duplicates.

## 5) Wire marketing/news to Discord
1. Configure MarketAux/news scraping credentials as documented in `marketing_news_automation.md`.
2. In **Management → Marketing** flows, ensure Discord is an allowed channel (e.g., campaign platform dropdowns include Discord).
3. Point marketing digests or “Today’s Story” tasks to the `DISCORD_MARKETING_WEBHOOK` (or a DB channel key). Use digest templates if sending multiple stories.

## 6) Wire earnings calendar posts
1. Confirm the earnings fetch job (AlphaVantage or other source) is scheduled before the Monday/ daily posts described in `earnings_calendar_automation.md`.
2. Map the weekly and daily payloads to `DISCORD_EARNINGS_WEBHOOK` (or the `earnings` channel key in `bf_discord_channels`).
3. Keep BMO/AMC timestamps in the template; validate message length (< 2000 chars).

## 7) Ops & health monitoring
1. Point CRON success/failure pings to `DISCORD_OPS_WEBHOOK` or a dedicated ops channel subscription.
2. Enable **dry-run mode** (`DISCORD_ALERTS_DRY_RUN=true`) during template tests; switch to false for production.
3. Set **quiet hours** and pacing in `app/Config/Discord.php` (e.g., `quietHoursStart`, `quietHoursEnd`, `minSecondsBetweenPosts`) to avoid spam.

## 8) End-to-end validation checklist
1. Post a **staging test message** from `Management → Discord → Templates` using the staging webhook.
2. Trigger a **sample alert** (manual or scraped) and confirm it lands in `#trade-alerts` with the expected template.
3. Trigger a **marketing digest** send and validate formatting in `#marketing-news`.
4. Run a **Monday earnings test** with upcoming data; validate `#earnings-watch` payload.
5. Check logs/DB (`bf_discord_queue`, `bf_discord_events`) for any failures; adjust rate limits or templates as needed.

## 9) Deployment hygiene
- Store all secrets in 1Password and `.env` (never commit URLs/tokens).
- Use the staging webhook for all new templates until formatting is approved.
- Rotate webhook URLs if exposed; update `.env` and `bf_discord_channels` accordingly.
- Document final channel names/IDs in the runbook so CRON jobs and human operators know the targets.