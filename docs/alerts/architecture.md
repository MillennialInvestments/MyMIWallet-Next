# Alerts Architecture Overview

The MyMI Alerts stack now follows a queue-driven pipeline so new sources or delivery channels can be plugged in without rewriting controllers.  The core flow is illustrated below:

```
ThinkOrSwim / TradingView Emails
        │
        ▼
`bf_investment_scraper` (raw inbox data)
        │  (parse_alert jobs)
        ▼
`bf_investment_alert_jobs` queue  ──► workers (`/API/Alerts/runQueue/...`)
        │                                 │
        │                                 ├─ `parse_alert` → `bf_investment_trade_alerts`
        │                                 ├─ `update_market_data` → AlphaVantage / TwelveData enrichment + `bf_investment_alert_history`
        │                                 ├─ `generate_script` → MyMIAdvisor/MyMIMarketing script cache
        │                                 ├─ `generate_voiceover` → ElevenLabs (optional) media assets
        │                                 └─ `distribute_*` → Discord, email, Zapier, etc.
        ▼
Dashboards + distributor APIs (Discord, email, social, voiceover)
```

## Key libraries and controllers

| Layer | Components | Responsibility |
| --- | --- | --- |
| Ingestion | `MyMIAlerts::fetchAndStoreAlertsEmails`, `/API/Alerts/fetchEmailAlerts` | Fetch raw scanner/ThinkOrSwim mail, normalize metadata, enqueue `parse_alert` jobs. |
| Trade creation | `AlertsModel::processScraperRecord`, `AlertJobQueue` | Convert scraped payloads into `bf_investment_trade_alerts`, ensure tickers exist, log history snapshots. |
| Enrichment | `MyMIAlphaVantage`, `/API/Alerts/getLatestPrices`, `MyMIMarketing` | Refresh prices/technical indicators/news.  Guarded by a shared rate limiter so AlphaVantage calls stop at ~70/minute. |
| Content generation | `MyMIAdvisor`, `MyMIMarketing`, `/API/Alerts/generateVoiceover*` | Produce scripts, summaries, CapCut JSON, and voiceovers (optional).  ElevenLabs failures are tolerated to keep UI responsive. |
| Distribution | `/API/Alerts/sendDiscordAlerts`, `/API/Alerts/postMarketingContentToSocials`, delivery channel adapters | Push alerts to Discord, email, and future fan-out systems from standardized job payloads. |
| Admin / Observability | Management Alerts dashboard, docs in `docs/alerts/*.md` | Show queue health, manual triggers, and current advisor media. |

## Data stores

- `bf_investment_scraper`: temporary staging table for raw alert emails.
- `bf_investment_trade_alerts`: canonical trade alert records exposed to dashboards and distributors.
- `bf_investment_tickers`: ticker metadata created/updated while parsing alerts.
- `bf_investment_alert_history`: immutable snapshots of alert status/price changes.
- `bf_investment_alert_jobs`: lightweight job queue powering ingestion, enrichment, media generation, and delivery.

## Control surface

- **API ingestion**: `/API/Alerts/fetchEmailAlerts`, `/API/Alerts/processEmailAlerts`.
- **Enrichment**: `/API/Alerts/getLatestPrices`, `/API/Alerts/getFullMetrics`, `/API/Alerts/getTechnicalIndicators`.
- **Distribution**: `/API/Alerts/generateAndStoreVoiceover`, `/API/Alerts/sendDiscordAlerts`, `/API/Alerts/postMarketingContentToSocials`.
- **Workers**: `/API/Alerts/runQueue` (per type) pulls batches of jobs and calls the relevant libraries.

The documentation in this folder plus the shared queue helpers formalize the internal API so Teddy can focus on building new sources/channels instead of tracing dozens of ad-hoc flows.
