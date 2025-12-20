## MyMI Alert System

## Link to conversation:
## https://chatgpt.com/g/g-p-675d07da79b0819192200bce51fbf174-mymi-alert-system/c/694699b0-5774-8330-88f9-8e26cfb730c8

📌 Project Executive Summary

Project Name: MyMI Alert System (Core of MyMI Wallet Ecosystem)
Primary Stack: CodeIgniter 4 · PHP 8.x · MySQL · Redis · JS (ChartJS, DataTables)
Core Domains:

Trade alerts (stocks, ETFs, crypto)

Email → alert automation

Market data enrichment

Discord + social distribution

Marketing/news content automation

Admin + Community dashboards

This project is not a prototype — it is a production-grade alert ingestion, processing, enrichment, and distribution platform designed to scale beyond 10,000 alerts with strict API limits.

🧠 System Architecture (Inferred & Confirmed)
1. Data Ingestion Layer
Source Inputs

ThinkorSwim / TradingView alert emails

Manual admin alerts

Future: MarketAux / AlphaVantage news feeds

Entry Point

MyMIAlerts::fetchAndStoreAlertsEmails()

Pulls unseen emails

Stores raw data in bf_investment_scraper

Sets status = "In Review"

📌 Critical Rule:
Anything not marked "Processed" will be re-evaluated.

2. Scraper → Alert Processor (Core Engine)
Controller

AlertsController

getFilteredAlerts()

processAlerts() (CRON-safe)

Forces processing before reads

Model

AlertsModel::processScrapedSymbols()
This is the heart of the system:

Per scraper record:

Extract ticker symbols from subject/body

Normalize timestamps

ensureTickerExists()

Inserts missing symbols into bf_investment_tickers

Check bf_investment_trade_alerts

Insert if new

Increment occurrences if existing

Snapshot state into bf_investment_alert_history

Mark scraper record as "Processed"

✅ Prevents duplicates
✅ Preserves history
✅ Supports re-analysis

3. Market Data Enrichment
Library

MyMIAlerts::updateAlerts()

Pulls price, OHLC, volume, indicators

Updates bf_investment_trade_alerts

Inserts snapshots into history table

Constraints

AlphaVantage Pro: 75 req/min

System already designed for:

Pagination

Active-alert-only updates

Caching ticker metadata

4. Alert Distribution Layer
Discord

sendDiscordNotification($alert)

Generates TradingView chart link

Sends formatted embed

Sets notification_sent = 1

🚫 Prevents duplicate Discord posts

5. Frontend Consumption
Admin Dashboard

Alert Management

Manual overrides

Force fetch emails

Review open vs historical alerts

Community Dashboard

Read-only distributed alerts

Backlinks to /preview/alert/{symbol}

Future: comments + sentiment

🗃️ Database Roles (Authoritative)
Table	Purpose
bf_investment_scraper	Raw emails (staging)
bf_investment_trade_alerts	Active alert state
bf_investment_alert_history	Immutable snapshots
bf_investment_tickers	Symbol metadata cache
🔁 End-to-End Workflow (Canonical)
EMAIL →
  bf_investment_scraper (In Review) →
    processScrapedSymbols() →
      ensureTickerExists()
      insert/update trade alert
      insert alert history
      mark Processed →
        updateAlerts() →
          Discord notification →
            User dashboards

⚙️ Operational Characteristics
Designed For:

High volume (10k+ alerts)

Idempotent processing

API rate limit survival

CRON + manual triggering

Historical auditability

Already Implemented:

Duplicate prevention

History snapshots

Status-based gating

Notification deduplication

🚧 Unfinished / In-Progress Items (Explicit & Implied)
🔴 High Priority

Create Alert Modal

Uses dynamicModalLoader

Prepopulates from trade data

Force Fetch Emails Button

Wiring + debounce + UI feedback

Backend Queue / Processing Indicator

Needed for long-running CRON jobs

🟠 Medium Priority

Alert Editing Forms

Partial/manual alert override support

Preview Alert Page

/preview/alert/{symbol} central discussion hub

Role-based visibility

Free vs Premium content gating

🟡 Expansion Ready

MarketAux News → Alerts

Voice / Video Script Generation

Automated Social Bundling

Sentiment & Performance Scoring

📁 Uploaded Files Review (Purpose)
File	Role
AlertsController.php	Orchestration + CRON
AlertsModel.php	Core business logic
MyMIAlerts.php	External integrations
Trade-Alert-Generator.xlsx	Manual alert planning / QA

These files align correctly with the described workflow — no architectural conflicts detected.

🧩 Architectural Strengths

✅ Clean separation of concerns
✅ Status-based processing safety
✅ History-first data model
✅ External API minimization
✅ Scales horizontally

⚠️ Architectural Risks (To Watch)

Long CRON jobs without UI state

AlphaVantage rate spikes if alert count explodes

Memory pressure during bulk updates

Manual alerts bypassing history if not normalized

🎯 Project Goal (Inferred)

Build a fully autonomous, auditable, multi-channel trade alert intelligence system that:

Ingests signals

Enriches them with market data

Preserves history

Distributes once

Scales safely

Feeds marketing, education, and community engagement