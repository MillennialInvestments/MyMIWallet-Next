# Alerts System Health Tests

✅ Health Test: `php spark alerts:health-scrape-email`
Priority: P0
Feature: Email scrape → `bf_investment_scraper` insert
Primary Entry Point(s):
- `app/Libraries/MyMIAlerts.php::fetchAndStoreAlertsEmails()`
- `app/Models/AlertsModel.php::storeEmails()`
Dependencies:
- DB: `bf_investment_scraper`
What it should verify (checklist):
- Step 1: Fetch new alert emails.
- Step 2: Insert records into `bf_investment_scraper`.
What it should log: fetched count, inserted count.
Failure modes to detect: inbox auth failure, insert failures.
Where to implement: `app/Commands/AlertsScrapeHealth.php` (new).
Suggested command name: `alerts:health-scrape-email`
Expected log file: `writable/logs/health_alerts.log`

✅ Health Test: `php spark alerts:health-parse-symbols`
Priority: P0
Feature: Parse symbols → trade alerts upsert
Primary Entry Point(s):
- `app/Models/AlertsModel.php::processScrapedSymbols()`
- `app/Models/AlertsModel.php::parseEmailForTradeAlert()`
Dependencies:
- DB: `bf_investment_scraper`, `bf_investment_trade_alerts`
What it should verify (checklist):
- Step 1: Parse symbols from a scraper record.
- Step 2: Insert/update trade alert rows.
- Step 3: Mark scraper record processed.
What it should log: scraper_id, symbols parsed, insert/update counts.
Failure modes to detect: empty symbol extraction, partial updates.
Where to implement: `app/Commands/AlertsParseHealth.php` (new).
Suggested command name: `alerts:health-parse-symbols`
Expected log file: `writable/logs/health_alerts.log`

✅ Health Test: `php spark alerts:health-market-refresh`
Priority: P1
Feature: Market data refresh for alerts
Primary Entry Point(s):
- `app/Modules/APIs/Controllers/AlertsController.php::updateTradeAlerts()`
- `app/Models/AlertsModel.php::batchInsertMarketData()`
Dependencies:
- DB: `bf_investment_trade_alerts`, `bf_investment_tickers`
- API: AlphaVantage
What it should verify (checklist):
- Step 1: Fetch market data for active tickers.
- Step 2: Update trade alert records.
What it should log: symbol count, updated rows.
Failure modes to detect: rate-limit failures, API errors.
Where to implement: `app/Commands/AlertsMarketRefreshHealth.php` (new).
Suggested command name: `alerts:health-market-refresh`
Expected log file: `writable/logs/health_alerts.log`

✅ Health Test: `php spark alerts:health-discord-notify`
Priority: P1
Feature: Discord notification send (dry-run)
Primary Entry Point(s):
- `app/Libraries/MyMIAlerts.php::sendDiscordNotification()`
- `app/Modules/APIs/Controllers/DiscordController.php::processQueue()`
Dependencies:
- DB: `bf_discord_queue`, `bf_discord_templates`, `bf_discord_channels`
- Env: `CRON_SHARED_KEY`
What it should verify (checklist):
- Step 1: Enqueue a sample alert notification.
- Step 2: Process queue in dry-run mode.
- Step 3: Confirm queue status changes.
What it should log: queue_id, channel_key, status.
Failure modes to detect: missing templates, webhook failures.
Where to implement: `app/Commands/AlertsDiscordHealth.php` (new).
Suggested command name: `alerts:health-discord-notify`
Expected log file: `writable/logs/health_alerts.log`
