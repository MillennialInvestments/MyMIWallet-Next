## MyMI Alert System

## Link to conversation:
## https://chatgpt.com/g/g-p-675d07da79b0819192200bce51fbf174-mymi-alert-system/c/694699b0-5774-8330-88f9-8e26cfb730c8

1. Project Purpose & Long-Term Goal (Identified)
Immediate Purpose

Ingest trade-related signals (primarily via email)

Normalize, deduplicate, enrich, and store trade alerts

Track alert lifecycle and historical performance

Distribute validated alerts to community channels (Discord first)

Long-Term Goal (Implied)

A fully autonomous Trade Intelligence & Distribution Engine that:

Supports stocks, ETFs, crypto

Feeds dashboards, marketing, education, and media

Serves both internal admins and external community users

Scales to tens of thousands of concurrent alerts

Acts as a backbone for MyMI Wallet’s investing ecosystem

2. Core Systems / Modules
API / Alerts Domain

AlertsController

AlertsModel

MyMIAlerts library

Alert Management System

Trade alert ingestion

Symbol extraction and classification

Alert state tracking (Opened, occurrences)

Alert history snapshots

Ticker Management System

bf_investment_tickers

On-demand symbol creation via external API

Metadata caching to reduce API calls

Alert History System

Immutable historical snapshots

Used for:

Performance tracking

Auditability

Trend analysis

Distribution System

Discord notification subsystem

Chart link generation (TradingView implied)

Admin Management System (Implied)

Alert review dashboard

Manual alert creation/editing

Force-fetch controls

Status overrides

Community Consumption System (Implied)

Public or gated alert listings

Symbol-based preview pages

Community discussion hub per ticker

3. Data Sources
Databases (Explicit)

MySQL

Tables

bf_investment_scraper

bf_investment_trade_alerts

bf_investment_tickers

bf_investment_alert_history

External APIs (Explicit & Implied)

Market data API (AlphaVantage implied)

TradingView (chart links, embeds)

ThinkorSwim (email alerts)

MarketAux (future / implied)

SEC / filings (implied future)

Files

Uploaded PHP source files

Excel planning file (Trade-Alert-Generator.xlsx)

Email

IMAP/SMTP inbox for alert ingestion

4. Automation Workflows
CRON-Based Automations

Fetch unseen alert emails

Process scraper records

Update active alerts with market data

Send Discord notifications

Status-Driven Pipelines

"In Review" → "Processed" gating

Notification flags to prevent re-posts

Implied Pipelines

Batch alert processing

Paginated alert retrieval

Time-range filtering (today, yesterday, etc.)

5. UI / User-Facing Components
Admin Interfaces (Explicit / Implied)

Alert Management Dashboard

Filtered alert tables

Manual alert creation modal

Alert editing forms

Force-fetch emails button

Community Interfaces (Implied)

Alerts overview table

Alert detail / preview page (/preview/alert/{symbol})

Historical alert views

UI Technologies

DataTablesJS

ChartJS

AJAX / Fetch

Dynamic modal loader (dynamicModalLoader)

6. Background Services / Jobs
Email Scraping Service

Runs unattended

Feeds bf_investment_scraper

Alert Processing Engine

processScrapedSymbols()

Idempotent

Status-based execution

Market Data Updater

Updates only active alerts

Stores snapshots

Notification Dispatcher

Discord webhook sender

One-time-per-alert logic

7. Security, Logging & Monitoring Mechanisms
Security (Implied / Partial)

API rate limiting awareness

Status-based deduplication

Admin-only controls for alert creation

Separation of admin vs community views

Logging (Explicit & Implied)

CodeIgniter logging

Alert processing logging

API failure awareness

Missing ticker fallback handling

Monitoring (Implied)

CRON health monitoring

API quota exhaustion detection (future)

Notification success/failure tracking

8. Known Bugs, Technical Debt, Blockers
Known / Mentioned Issues

Missing backend queue for long-running jobs

No UI feedback during alert processing

Force-fetch emails button incomplete

Create Alert modal not yet wired

Potential API rate-limit exhaustion risk

Large alert volume requiring pagination & batching

Technical Debt

Lack of explicit job queue

Manual alert paths not fully normalized

Partial UI–backend coupling

No alert scoring or prioritization yet

9. Planned Features / Roadmap Items (Identified)
Near-Term

Create Alert modal (prepopulated)

Manual alert overrides

Backend processing indicators

Alert editing forms

Mid-Term

Alert performance analytics

Symbol discussion hubs

User role gating (Free vs Premium)

Alert tagging / classification

Long-Term

News → alert correlation

Automated video & voice scripts

Multi-social distribution

Sentiment analysis

Risk scoring

AI-assisted alert commentary

10. External Integrations
Trading & Market Platforms

ThinkorSwim (email alerts)

TradingView (charts, links)

AlphaVantage (market data)

Communication Platforms

Discord (webhooks, embeds)

Infrastructure

DreamHost VPS

CRON scheduler

Email server

Development / Planning Tools

Excel (alert planning)

ChatGPT Codex (code generation, audits)