# Alerts Automation

This document maps how trade alerts move from ingestion to Discord delivery and outlines improvements for fully autonomous pipelines.

## Data Pipeline (Current State)
```
Email scraper → bf_marketing_temp_scraper (raw emails) → AlertsModel::processScrapedSymbols → bf_investment_trade_alerts (status: Pending/In Review/Processed) → MyMIAlerts::updateAlerts & history writes → bf_investment_alert_history → MyMIAlerts::sendDiscordNotification → Discord webhook
```
- **Email ingestion & parsing:** `MyMIAlerts::processScrapedSymbols()` extracts tickers from scraped email text before alerts are created in `bf_investment_trade_alerts`.
- **Alert enrichment:** `MyMIAlerts::updateAlerts()` and market-data fetchers populate price/EMA fields and persist snapshots to `bf_investment_alert_history`.
- **Distribution trigger:** `ManagementController::sendAllDiscordAlerts()` fetches new alerts with TradingView charts and invokes `MyMIAlerts::sendDiscordNotification()`.
- **Deduplication:** `sendDiscordNotification` checks `notification_sent` and sets it after queuing, preventing repeat sends for the same alert.

## Alert Types and Templates
- **Types:** Derived from alert metadata and Trade-Alert-Generator mappings (e.g., Active Buy/Sell, Liquidity Watch, Momentum). Use status (`Opened`, `Processed`, `Closed`) plus `trade_type`, `category`, and `market_sentiment` to tailor copy.
- **Suggested Payload:**
  ```json
  {
    "content": "📢 {status} Alert: {ticker}\nPrice: ${price} | TP: {tp} | SL: {sl}\n{summary}\n🔗 TradingView: {chartUrl}\n🔗 MyMI Wallet: {alertLink}"
  }
  ```
- **Channel Targeting:** Map tiers (Free, Tier 1-3) to channel IDs; keep webhook URLs in ENV/config and avoid hard-coding.

## Triggers
- **CRON/HTTP:** Scheduled calls to `sendAllDiscordAlerts` or custom cron commands (e.g., `php spark alerts:process`) to pick up new or updated alerts.
- **Manual:** Admin-triggered send or manual call to `sendDiscordTradeAlert` for tiered delivery.
- **Lifecycle Events:** Promote future hooks on status changes (`Pending → Opened`, `Opened → Closed`) for follow-up posts.

## Duplicate Prevention & Backoff
- **Flags:** `notification_sent` guards repeat dispatches; ensure it is cleared when re-queuing updated alerts.
- **Rate Limits:** Batch sends and insert short sleeps if firing multiple webhooks; Discord limit is ~50 requests/second.
- **Idempotency:** Use hash of alert ID + status + last_updated to avoid double-posting during retries.

## Manual Trade Alerts
- **Creation:** Management UI calls `AlertsModel::addTrade` to insert manual alerts into `bf_investment_trade_alerts`.
- **Distribution Hook:** After save/update, invoke `MyMIAlerts::sendDiscordNotification` (or `sendDiscordTradeAlert` for tiered mapping) when `status` reaches `Opened` and a chart URL exists.
- **History:** Continue inserting snapshots into `bf_investment_alert_history` for lifecycle reporting.

## Future Enhancements
- **Lifecycle Posts:** Auto-post updates when `status` flips to `Closed`, including P&L delta between `entry_price`/`price` and close price.
- **Daily Digest:** Morning and evening summaries aggregating active alerts and top movers since creation.
- **TradingView Assets:** Use `saveTradingViewChart` outputs to attach chart thumbnails or links with CDN hosting.
- **Cross-Channel Sync:** Mirror messages to Zapier/email with consistent template fragments maintained alongside Discord payloads.