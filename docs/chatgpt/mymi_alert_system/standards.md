Platform

Application Framework

CodeIgniter 4 (API-first design)

PHP 8.x runtime (DreamHost VPS–compatible)

Frontend Stack

JavaScript (AJAX / Fetch)

DataTablesJS

ChartJS

Bootstrap-based UI

Dynamic modal loading system (dynamicModalLoader)

Infrastructure

DreamHost VPS

NGINX

CRON scheduler

Email server (IMAP access)

Discord server + webhooks

Architecture

Layered Architecture

Controllers → Models → Libraries → External APIs

Strong separation of ingestion, processing, enrichment, and distribution

Processing Model

Status-driven workflows (In Review → Processed)

Idempotent processing logic

Snapshot-based historical persistence

Execution Modes

CRON-driven background execution

On-demand manual triggers (admin UI)

Read operations that auto-trigger processing when needed

Core Modules

Alerts Module

AlertsController

AlertsModel

Trade alert lifecycle management

Alert Ingestion Module

Email scraping

Raw record staging

Symbol extraction

Ticker Management Module

Symbol existence validation

Metadata caching

External symbol lookup

Alert History Module

Immutable snapshots

Time-series tracking

Notification Module

Discord alert publishing

Deduplication logic

Admin Management Module (Implied)

Alert review dashboard

Manual alert creation/editing

Force-fetch controls

Community Alerts Module (Implied)

Read-only alert views

Symbol-based alert pages

Data Models / Tables

bf_investment_scraper

Raw scraped email content

Status control (In Review, Processed)

bf_investment_trade_alerts

Current alert state

Occurrence count

Price / OHLC fields

Timestamps

bf_investment_tickers

Symbol metadata

Exchange, name, currency

bf_investment_alert_history

Historical snapshots

Alert evolution over time

APIs & Integrations

Market Data APIs

AlphaVantage (primary, rate-limited)

Future: MarketAux

Trading Platforms

ThinkorSwim (email-based alerts)

TradingView (chart links)

Communication Platforms

Discord (webhooks, embeds)

Email Systems

IMAP inbox for ingestion

Automation & CRON

Email Fetching

Periodic inbox polling

Insert into scraper table

Alert Processing

Symbol extraction

Alert insert/update

History snapshot creation

Status finalization

Market Data Updates

Active-alert-only updates

Periodic enrichment runs

Notification Dispatch

Discord notifications

One-time send enforcement

Implied Future Automation

News correlation

Batch processing queues

Retry/backoff logic

UI / UX

Admin UI

Alert Management Dashboard

Filtered alert tables

Manual alert modals

Force-fetch actions

Community UI

Alerts overview table

Alert preview pages (/preview/alert/{symbol})

Historical alert views

UX Patterns

AJAX-loaded tables

Modal-based workflows

Time-range filtering

Pagination

Security

Access Control (Implied)

Admin-only alert creation/editing

Community read-only access

Data Integrity

Status gating to prevent reprocessing

Notification flags to prevent duplicates

API Safety

API rate-limit awareness

Metadata caching to reduce calls

Future Security Needs

Role-based permissions

Abuse/rate protection on manual triggers

Logging & Monitoring

Application Logging

CodeIgniter logging

Alert processing logs

API error handling

Operational Monitoring (Implied)

CRON job success/failure tracking

Email ingestion monitoring

Notification send confirmation

Future Enhancements

Alert-level audit logs

API quota exhaustion detection

Health-check endpoints

Performance & Scaling

Current Strategies

Pagination for large datasets

Active-alert-only updates

Ticker metadata caching

Status-based deduplication

Scaling Considerations

10,000+ alert volume

API rate limits (75 req/min)

Long-running CRON jobs

Known Gaps

No formal job queue

No worker-based processing

Limited real-time feedback during processing

Content / Media

Generated Content

TradingView chart links

Discord embeds

Planned Content

Voice scripts

Video scripts

Educational summaries

Market commentary

Supporting Assets

Excel alert planning file

Future: media automation pipelines

Operations & Maintenance

Operational Tasks

CRON management

API key management

Email inbox maintenance

Alert cleanup and review

Admin Controls

Manual processing triggers

Alert overrides

Force re-ingestion

Maintenance Concerns

Handling stuck scraper records

Managing large alert volumes

Ensuring API quota safety

Roadmap
Short Term

Create Alert modal (prepopulated)

Force-fetch emails button completion

UI processing indicators

Manual alert editing

Mid Term

Alert analytics & performance metrics

Symbol discussion hubs

Role-based content gating

Alert tagging & classification

Long Term

News → alert correlation

Automated media generation

Multi-platform social distribution

Sentiment analysis

Risk scoring & AI commentary

✅ Normalization Complete

All known and implied components of this project now exist in a stable, industry-standard classification.

Next logical steps (when you’re ready):

Dependency graph

Failure-mode analysis

Queue/worker design

Codex execution plan

Architecture diagram (C4 or system-level)