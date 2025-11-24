# Discord Integration Overview

This overview lists current and planned Discord touchpoints, the triggers that drive them, and the data sources they rely on.

## Active/Existing Touchpoints

### Real-time Trade Alert Dispatch
- **Type:** Alerts
- **Trigger:** Manual HTTP endpoint `ManagementController::sendAllDiscordAlerts()` typically invoked via CRON or admin call.
- **Source Data:** `bf_investment_trade_alerts` rows with new TradingView charts (`getAlertsWithNewTVChart`).
- **Destination:** Webhook-based queue via `MyMIAlerts::sendDiscordNotification()`.
- **Code References:**
  - `app/Modules/APIs/Controllers/ManagementController::sendAllDiscordAlerts()`.
  - `app/Libraries/MyMIAlerts::sendDiscordNotification()`.

### Marketing/News Posts
- **Type:** Marketing / News
- **Trigger:** Campaign distribution routines and generated trade-alert distribution.
- **Source Data:** Marketing campaigns and generated posts pulled through `MarketingModel` and `generateTradeAlertMessage` flows.
- **Destination:** Discord webhook (`DISCORD_WEBHOOK_URL`) via `MyMIMarketing::postToDiscord()`.
- **Code References:**
  - `app/Libraries/MyMIMarketing::distributeTradeAlert()` (trade alert messaging to Discord alongside social channels).
  - `app/Libraries/MyMIMarketing::postToDiscord()` (generic webhook sender for campaigns and digests).

### Alert Channel Abstraction (Placeholder)
- **Type:** Alerts (future-ready)
- **Trigger:** Library-driven when dispatching via `AlertChannelInterface` implementations.
- **Source Data:** Alerts passed through generic channel dispatcher.
- **Destination:** Placeholder logging unless a Discord client is injected.
- **Code Reference:** `app/Libraries/AlertChannels/DiscordChannel::deliver()`.

## Planned / Candidate Integrations

### Manual Alert Publishing
- **Type:** Alerts / Manual Ideas
- **Trigger:** Admin creates/updates alert in management UI; hook after save to queue Discord dispatch.
- **Source Data:** `bf_investment_trade_alerts`, including manual entries and marketing-enriched summaries.
- **Destination:** Tiered Discord channels (free vs. premium) using templated payloads.

### Earnings Watch Posts
- **Type:** Earnings / Watchlist
- **Trigger:** Weekly CRON for “This Week’s Earnings” and optional daily morning posts.
- **Source Data:** `EarningsModel::getUpcomingEarnings()` output (backed by earnings calendar table/API), plus user watchlists and open alerts.
- **Destination:** Channels such as `#earnings-watchlist` or `#daily-earnings` via webhook.

### System Health Notifications
- **Type:** Ops
- **Trigger:** CRON errors (AlphaVantage throttle, email scrape failures) or alert processing backpressure.
- **Source Data:** Log events and queue metrics.
- **Destination:** `#system-status` webhook with rate-limited, batched messages.

## Environment and Secrets
- Webhook URLs are injected via environment (e.g., `DISCORD_WEBHOOK_URL`); replace placeholder channel IDs before production use.
- Store secrets in 1Password and load through CI4 config/ENV to avoid hard-coding inside libraries.

## Channel and Template Governance
- Use management UI (`/Management/Discord`) to register channels, templates, subscriptions, and policies when available.
- Keep payloads within Discord’s 2000-character limit; truncate with ellipses in shared formatter helpers.