# Trade Alert & Marketing Pipeline

This document summarizes how trade alerts and marketing/news items flow through the current CodeIgniter 4 stack.

## Sources
- **Email ingestion** via `MyMIAlerts` (`app/Libraries/MyMIAlerts.php`)
  - ThinkOrSwim and TradingView scanner emails filtered by known subjects/senders.
  - Press-release/news style emails identified via vendor prefixes/keywords.
- **Manual/API creation** through `APIs\AlertsController::addTradeAlert` and dashboard modals.
- **External data enrichment** from Alpha Vantage and tracking helpers inside `MyMIAlerts` and `AlertsModel`.

## Storage Layers
- **Raw/staging**: `bf_marketing_temp_scraper` caches inbound email hashes to prevent duplicates.
- **Trade alerts (primary)**: `bf_investment_trade_alerts`
  - Populated by ingestion, manual entry, or cron jobs.
  - Historical snapshots stored in `bf_investment_alert_history`.
- **Ticker reference data**: `bf_investment_tickers` keeps exchange/type and market data updated in batches.
- **News/press releases**: `bf_marketing_scraper` holds sanitized news items and marketing-ready metadata.
- **Generated marketing content**: `bf_marketing_generated_content` (when present) stores multi-channel payloads.

## News Classification & Promotion
- `MyMIAlerts` classifies press-release style emails (e.g., PR Newswire/GlobeNewswire) as news.
- Content is cleaned, summarized, and promoted into `bf_marketing_scraper` with extracted titles/keywords.
- A cron-friendly API endpoint (Management module) exposes promotion for scheduled processing.

## Dashboard Feeds
- **Daily News & Updates** on the user dashboard pulls from `MarketingModel::getDailyDashboardNews`, which queries `bf_marketing_scraper` and humanizes timestamps for display.
- Trade alert summaries are sourced from `bf_investment_trade_alerts` for the same-day view.

## Alert → Marketing Integration
- Trade alerts now carry marketing-friendly fields (`title`, `summary`, `keywords`, marketing status/timestamps, distribution channel JSON) via migration.
- `AlertsModel` exposes helpers to fetch pending alerts and mark alerts as marketed for downstream MyMIMarketing processing.
- `MyMIMarketing::generateMarketingFromAlert` turns an alert payload into structured Discord/email/social content so it can be distributed or stored alongside news-driven marketing assets.
