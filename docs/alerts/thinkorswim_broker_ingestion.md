# ThinkorSwim Broker Email Ingestion

## Overview
This document describes the ThinkorSwim “Order Filled” broker-email ingestion pipeline for MyMI Wallet. It normalizes each execution into `bf_investment_trade_alerts`, records audit history, and routes Discord notifications based on `account_type`.

## Key Data Flow
1. IMAP ingestion stores raw emails in `bf_investment_scraper` with `source`, `account_type`, and `message_hash`.
2. Broker parsers (ThinkorSwim first) attempt to normalize execution fills.
3. Each fill is inserted via `execution_id` (idempotent) and logged into `bf_investment_alert_history`.
4. Discord notification is queued once per execution fill (`notified_discord = 1`).

## Endpoints
- `GET /API/Alerts/processBrokerEmails?cronKey=...`
  - Processes only `source=thinkorswim` records.
- `GET /API/Alerts/processAllEmails?cronKey=...`
  - Runs the normal pipeline, including broker parsing and fallback symbol extraction.
- `GET /API/Alerts/previewScraper/{id}`
  - Admin-only parser preview for a specific scraper row.

## Discord Routing
- Live fills queue to `trade_alerts`.
- Paper fills queue to `paper_trades` (map to your `#paper-trades` channel).

## CLI Parse Harness
```
php spark alerts:parse-test --file=docs/alerts/samples/thinkorswim_order_filled_buy.txt
php spark alerts:parse-test --file=docs/alerts/samples/thinkorswim_order_filled_sell.txt --subject="Order Filled"
```

## Samples
Sample payloads live in `docs/alerts/samples/`:
- `thinkorswim_order_filled_buy.txt`
- `thinkorswim_order_filled_sell.txt`
- `thinkorswim_order_filled_partial.txt`
- `thinkorswim_order_filled_multileg.txt`
- `thinkorswim_order_filled_malformed.txt`

## CRON (DreamHost-safe)
```
# Every 3–5 minutes during trading hours
curl -s "https://www.mymiwallet.com/index.php/API/Alerts/processBrokerEmails?cronKey=YOUR_TOKEN" >> /home/mymiteam/cron_logs/alerts_broker.log 2>&1

# Weekly maintenance
curl -s "https://www.mymiwallet.com/index.php/API/Alerts/processAllEmails?cronKey=YOUR_TOKEN" >> /home/mymiteam/cron_logs/alerts_all.log 2>&1
```

## Acceptance Checklist
- [ ] Insert 5 sample rows into `bf_investment_scraper` using the sample files.
- [ ] Run `/API/Alerts/processBrokerEmails`.
- [ ] Confirm:
  - Trade alerts inserted (one per fill).
  - Duplicate fills skipped by `execution_id`.
  - Scraper rows marked `Processed`.
  - History snapshots written to `bf_investment_alert_history`.
  - Discord notifications queued once and `notified_discord=1`.
