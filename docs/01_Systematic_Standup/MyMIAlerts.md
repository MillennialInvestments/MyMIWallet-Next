List everything we have ever talked about in this MyMI Alert System project that pertains directly to any of our direct CI4 Integrations or APIs/Solutions. I'm going to ask you to start providing the direct command prompts to validate and confirm what is left to do and provide those instructions to complete it, using TBI AIOps and Ollama to complete the task. No ChatGPT / no Codex/ nothing else.

Teddy, I’m going to consolidate this as a project inventory first, then separate what looks complete, partially complete, and what still needs validation before we start issuing AIOps/Ollama-only command prompts.

Thought for a few seconds

Teddy, here is the consolidated inventory of everything we have discussed in the MyMI Alert System project that directly pertains to CI4 integrations, APIs, services, automation, or platform solutions.

1. Core MyMI Alert System CI4 Modules
A. Email Alert Scraper Pipeline

We discussed a CI4 workflow where incoming trade-alert emails are scraped, stored, processed, and marked complete.

Direct components:

bf_investment_scraper
AlertsModel::getPendingScraperRecords()
AlertsModel::processScrapedSymbols()
MyMIAlerts::fetchAndStoreAlertsEmails()
AlertsController::getFilteredAlerts()

Primary purpose:

Fetch unseen alert emails
Insert raw email subject/body/date into bf_investment_scraper
Set status = "In Review"
Extract tickers and alert types
Convert email_date into submitted_date and last_updated_time
Mark records as "Processed" after successful handling
Prevent duplicate re-processing

Important fields discussed:

email_subject
email_body
email_date
status
created_on
last_updated

Key problem we identified:

If scraper records are never changed from "In Review" to "Processed",
the same email records will keep being evaluated and can create duplicate
alert occurrences or repeated downstream updates.
2. Processed Trade Alert Storage
A. Trade Alert Records

We discussed the main processed alert table:

bf_investment_trade_alerts

Purpose:

Stores active/opened trade alerts after symbols are extracted from scraped emails.

Important fields discussed:

ticker
status
occurrences
price
open
high
low
created_on
submitted_date
last_updated
last_updated_time
notification_sent
tradingview_chart_url

Core behavior:

If no alert exists for a ticker:
    Insert a new alert
    Set status = "Opened"
    Set occurrences = 1

If alert already exists:
    Increment occurrences
    Update timestamps
    Avoid duplicate alert rows

Direct CI4 method mapping:

AlertsModel::processScrapedSymbols()
AlertsModel::storeAlertHistory()
MyMIAlerts::updateAlerts()
AlertsController::processAlerts()
3. Ticker Metadata Integration
A. Ticker Lookup and Insert Automation

We discussed using this table:

bf_investment_tickers

Purpose:

Stores ticker metadata so repeated API calls are reduced.

Important fields discussed:

symbol
name
exchange
currency

Core method:

AlertsModel::ensureTickerExists($symbol)

Expected behavior:

Check whether ticker exists in bf_investment_tickers.
If missing, fetch ticker metadata from an external market-data API.
Insert the ticker metadata.
Reuse stored metadata on future alert runs.

Optimization goal:

Avoid repeatedly calling external APIs for the same symbol.
4. Alert History / Snapshot System
A. Historical Alert Snapshots

We discussed:

bf_investment_alert_history

Purpose:

Stores historical market snapshots for alerts over time.

Important fields discussed:

ticker
alerted_on
price
volume
open
high
low
created_on
last_updated

Direct method:

AlertsModel::storeAlertHistory($alert)

Use cases:

Track when an alert first appeared
Track later market updates
Compare alert performance over time
Build alert history charts
Support previous alert update summaries
Support digest/reporting features
5. Alert Filtering and Dashboard Retrieval
A. Filtered Alerts Endpoint

We discussed:

AlertsController::getFilteredAlerts()
AlertsModel::getFilteredAlerts()

Purpose:

Process new pending scraper records before returning visible alerts.
Apply date filters.
Apply pagination.
Return alert data for the frontend dashboard.

Filters discussed:

today
yesterday
this_week
last_week
custom date ranges
status filters
ticker filters

Important stability requirement:

getFilteredAlerts() should not blindly reprocess already-processed emails.
It should call processScrapedSymbols(), but that method must only process
records still marked as "In Review".
6. Market Data API Updates
A. Alert Market Updates

We discussed:

MyMIAlerts::updateAlerts()
AlertsController::processAlerts()

Purpose:

Fetch current market data for active/opened alerts.
Update price, open, high, low, volume, moving averages, and related market fields.
Store historical snapshots.

External API role:

Market data provider API
Ticker metadata API
Price API
Volume API
Possibly chart/technical indicator API

Optimization requirements discussed:

Batch API requests where possible
Cache ticker metadata
Cache common market responses
Avoid updating closed/inactive alerts unnecessarily
Use pagination/chunking for large alert sets
Rate-limit external API calls
7. TradingView Integration
A. TradingView Chart Link Generation

We discussed generating TradingView links for alerts.

Fields/behavior:

tradingview_chart_url
notification_sent

Purpose:

Attach a TradingView chart URL to an alert.
Use that URL in Discord notifications.
Prevent duplicate notifications once a chart link has already been sent.

Direct method:

MyMIAlerts::sendDiscordNotification($alert)

Expected behavior:

If new TradingView chart link is generated:
    Send Discord notification
    Set notification_sent = 1
Else:
    Do not send duplicate notification
8. Discord Notification Integration
A. Discord Alert Posting

We discussed Discord webhook-style notifications.

Direct method:

MyMIAlerts::sendDiscordNotification($alert)

Purpose:

Send formatted trade alerts to Discord.
Include ticker, price, alert type, TradingView chart link, and relevant metadata.

Duplicate-prevention requirement:

Only send once per unique alert/chart notification.
Use notification_sent or equivalent lock field.

Expected payload content:

Ticker
Alert status
Price
Volume
Alert type
TradingView chart link
Submitted date
Occurrences
9. MyMI Daily Digest Concept

We discussed a MyMI Wallet daily digest that uses the existing alert system and platform data.

Digest sections discussed:

Today's / This Week's Calendar
Top 5 Gainers of the Day
Top 5 Weekly Gainers from Last Week
Previous Alert Updates
News That Matters
Promotional Upselling Message
Feature rotation / promotional messages

Potential CI4 services/modules:

DigestService
MarketMoverService
CalendarDigestService
AlertSummaryService
NewsDigestService
PromotionRotatorService

Potential command:

php spark mymi:digest:daily

Potential CRON timing:

Morning before market open
Market-aware timing
Crypto-compatible timing if 24/7 digest support is added

Direct solution goal:

Use the data already being collected by MyMI Wallet and the alert system
to generate an automated daily summary.
10. News API / Market Headlines Integration

For the digest, we discussed adding news/headline sourcing.

Possible integration category:

Market news API
Crypto news API
Financial headline scraper
RSS feed ingestion

Use cases:

News That Matters
Ticker-related alert context
Daily digest enrichment
Weekly recap
Alert explanation

Stability requirements:

Cache news responses
Deduplicate headlines
Store source URL and publish date
Avoid excessive API calls
Filter irrelevant headlines

Likely future table concepts:

bf_investment_news_items
bf_investment_digest_items
bf_investment_ticker_news
11. Calendar Integration for Digest

We discussed including:

Today's / This Week's Calendar

Possible CI4 integration:

Google Calendar API
Internal MyMI calendar table
AIOps-generated daily agenda

Possible use cases:

Show trading-related reminders
Show business/project schedule
Show MyMI operational calendar items
Include upcoming tasks in digest

Potential future command:

php spark mymi:digest:calendar
12. CRON-Based Automation

We discussed running digest and alert processes automatically.

Potential commands:

php spark mymi:alerts:fetch-emails
php spark mymi:alerts:process-scraped
php spark mymi:alerts:update-market-data
php spark mymi:alerts:send-discord
php spark mymi:digest:daily

CRON goals:

Fetch new alert emails
Process pending scraper rows
Update active alert market data
Send Discord alerts
Generate daily digest
Avoid overlapping jobs

Important requirement:

The system should detect if a job is already running and avoid duplicated processing.

Potential locking pattern:

Database job lock
Redis lock
File lock
bf_aiops_task_runs lock
bf_mymi_job_locks
13. Redis / Caching Strategy

We discussed caching as part of the broader MyMI/API-heavy application strategy.

Direct relevance to alert system:

Cache ticker metadata
Cache market prices
Cache API responses
Cache common filtered alert queries
Cache digest sections
Cache news results

Possible cache keys:

mymi:ticker:{symbol}
mymi:market:quote:{symbol}
mymi:alerts:filtered:{hash}
mymi:digest:daily:{date}
mymi:news:{symbol}:{date}

Why it matters:

Reduces external API cost
Reduces latency
Improves dashboard performance
Prevents rate-limit issues
14. API Rate Limiting / Queueing

We discussed API batching, throttling, and queueing.

Relevant targets:

Market data APIs
Ticker metadata APIs
News APIs
Discord webhooks
Calendar APIs
Email APIs
TradingView link generation if externalized

Recommended CI4 solution pattern:

bf_aiops_task_runs
bf_mymi_api_queue
bf_mymi_rate_limit_events
bf_mymi_external_api_logs

Operational requirement:

Avoid making too many requests at once.
Retry failed requests safely.
Track API response status.
Prevent duplicate queue execution.
15. Error Handling and Monitoring

We discussed real-time alerts, automated debugging, and monitoring.

Direct alert-system requirements:

Log scraper failures
Log ticker extraction failures
Log missing ticker metadata
Log failed market-data calls
Log failed Discord notifications
Log failed digest generation
Surface issues in admin dashboard

Possible tables:

bf_mymi_alert_errors
bf_mymi_api_errors
bf_aiops_task_runs
bf_aiops_task_events

Recommended fields:

module
method
ticker
error_type
error_message
payload
status_code
created_on
resolved_on

Potential command:

php spark mymi:alerts:doctor
16. AIOps and Ollama Integration

You specifically want future work completed using:

TBI AIOps
Ollama
No ChatGPT
No Codex

We discussed AIOps/Ollama as the execution and validation layer.

Relevant uses:

Generate validation reports
Inspect CI4 routes
Inspect models/controllers/libraries
Detect missing methods
Detect duplicate processing risks
Generate SQL validation queries
Run smoke tests
Build task lists
Patch files through controlled AIOps workflow
Use Ollama locally for code review and analysis

Expected local Ollama environment:

export OLLAMA_MODE=local
export OLLAMA_BASE_URL=http://127.0.0.1:11434
export OLLAMA_INTERNAL_BASE_URL=http://127.0.0.1:11434
export OLLAMA_ENDPOINT=http://127.0.0.1:11434/api/generate

Likely models:

llama3.1:8b
codellama:latest
qwen2.5-coder
17. TBI AIOps Command/Task Style Discussed

You have repeatedly preferred direct server command blocks that:

Validate current branch
Validate current repo
Create report files
Run PHP lint
Run spark commands
Run route checks
Run migrations
Run smoke tests
Generate markdown reports
Commit/branch/PR only when appropriate
Avoid destructive changes unless explicitly scoped

For this project, that means future command prompts should follow this pattern:

cd /home/mymiteam/mymiwallet/site/current || exit 1

export PATH="$HOME/.local/bin:$HOME/.local/opt/gh/bin:$PATH"
export PAGER=cat
export GIT_PAGER=cat

export OLLAMA_MODE=local
export OLLAMA_BASE_URL=http://127.0.0.1:11434
export OLLAMA_INTERNAL_BASE_URL=http://127.0.0.1:11434
export OLLAMA_ENDPOINT=http://127.0.0.1:11434/api/generate

git branch --show-current
git status --short
php spark list
Current Known Files in This MyMI Alert System Workspace

You uploaded these project files for this alert system:

/mnt/data/AlertsController.php
/mnt/data/AlertsModel.php
/mnt/data/MyMIAlerts.php
/mnt/data/Trade-Alert-Generator.xlsx

Directly relevant CI4/legacy-migration components:

AlertsController.php
AlertsModel.php
MyMIAlerts.php

The spreadsheet likely relates to:

Alert generation
Ticker/alert test cases
Trade alert import logic
Validation data
Manual strategy-to-alert mapping

I have not yet performed a fresh file-by-file audit in this response. The next step should be a command-driven validation pass against the live MyMI Wallet CI4 repo and these alert-system files.

Consolidated “What We Have Talked About” Map
Completed/Defined Conceptually
Email scraper table and status lifecycle
Ticker extraction from email subject/body
Processed alert table behavior
Ticker metadata cache table
Alert history snapshots
Filtered alert dashboard endpoint
Market data update flow
Discord notification flow
TradingView chart link flow
Daily digest concept
Calendar/news/market mover digest sections
CRON automation strategy
Redis/API caching strategy
AIOps/Ollama-only execution preference
Needs Validation in Repo
Whether bf_investment_scraper exists with correct columns
Whether bf_investment_trade_alerts has all required fields
Whether bf_investment_tickers exists and is populated correctly
Whether bf_investment_alert_history exists
Whether processScrapedSymbols() safely marks records Processed
Whether duplicate alert handling is correct
Whether ensureTickerExists() is implemented safely
Whether updateAlerts() batches/rate-limits API calls
Whether Discord notifications are duplicate-protected
Whether TradingView chart URLs are generated consistently
Whether getFilteredAlerts() paginates and filters correctly
Whether CRON/spark commands already exist
Whether digest-related services/commands already exist
Whether AIOps has project-specific MyMI alert commands
Likely Missing or Still Needed
Formal smoke test command for alert processing
Formal doctor command for alert-system health
Database migration verification report
Duplicate-processing guard test
Discord notification idempotency test
Market API rate-limit/caching validation
Digest service implementation
Digest CRON command
News API integration
Calendar integration
Admin monitoring/report page
AIOps task queue integration for alert jobs
Ollama-generated validation report artifacts
Recommended Next Validation Phases
Phase 01 — Inventory Existing MyMI Alert System

Goal:

Find every controller/model/library/command/route/table related to alerts.
Generate a report of what already exists.
Do not modify code.

Output:

docs/_aiops/mymi_alerts/MYMI_ALERT_SYSTEM_INVENTORY.md
docs/_aiops/mymi_alerts/MYMI_ALERT_SYSTEM_INVENTORY.json
Phase 02 — Database Schema Validation

Goal:

Confirm all required tables and columns exist.
Identify missing columns, indexes, and constraints.

Tables:

bf_investment_scraper
bf_investment_trade_alerts
bf_investment_tickers
bf_investment_alert_history

Output:

docs/_aiops/mymi_alerts/MYMI_ALERT_SCHEMA_GAP_REPORT.md
Phase 03 — Processing Pipeline Validation

Goal:

Validate email scraping → symbol extraction → alert insert/update → history snapshot → scraper status Processed.

Output:

docs/_aiops/mymi_alerts/MYMI_ALERT_PIPELINE_VALIDATION.md
Phase 04 — API/Notification Validation

Goal:

Validate market API calls, ticker metadata API, TradingView link generation, and Discord notification idempotency.

Output:

docs/_aiops/mymi_alerts/MYMI_ALERT_API_NOTIFICATION_REPORT.md
Phase 05 — CRON, Queue, and AIOps Integration

Goal:

Create or validate spark commands for alert automation.
Ensure jobs can run through TBI AIOps/Ollama without ChatGPT or Codex.

Output:

docs/_aiops/mymi_alerts/MYMI_ALERT_AIOPS_CRON_REPORT.md
Phase 06 — Daily Digest Build/Validation

Goal:

Validate or build the MyMI Wallet daily digest using existing alert, market, calendar, news, and promotion data.

Output:

docs/_aiops/mymi_alerts/MYMI_DAILY_DIGEST_PLAN.md
Practical Next Step

The first command prompt I would provide next should be:

AIOps/Ollama-only inventory command for the live MyMI Wallet CI4 repo.

That command should:

cd into /home/mymiteam/mymiwallet/site/current
confirm repo/branch/status
confirm PHP/CI4/spark availability
search for alert-related files, classes, routes, commands, tables, and migrations
inspect AlertsController, AlertsModel, MyMIAlerts, and alert-related spark commands
generate a non-destructive markdown/json inventory report
avoid Codex
avoid ChatGPT
use only local shell, PHP, MySQL, TBI AIOps, and Ollama

This inventory pass should come before any patching because it gives us the authoritative answer to:

What already exists?
What is wired correctly?
What is missing?
What is duplicated?
What is safe to automate next?