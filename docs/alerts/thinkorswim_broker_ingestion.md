# ThinkorSwim Broker Email Ingestion

## Overview
This document describes the ThinkorSwim “Order Filled” broker-email ingestion pipeline for MyMI Wallet. It normalizes each execution into `bf_investment_trade_alerts`, records audit history, and routes Discord notifications based on `account_type`.

## Key Data Flow
1. IMAP ingestion stores raw emails in `bf_investment_scraper` with `source`, `account_type`, and `message_hash`.
2. Broker parsers (ThinkorSwim first) attempt to normalize execution fills.
3. Each fill is inserted via `execution_id` (idempotent) and logged into `bf_investment_alert_history`.
4. Discord notification is queued once per execution fill (`notified_discord = 1`).

## IMAP-First Decision (alerts:fetch-raw-emails)
- **Primary path**: IMAP is used for mailbox access, `INBOX` reads, raw message retrieval, message move to `Processed`, and expunge.
- **Why IMAP**: This workflow is mailbox-native (fetch, move, expunge), and IMAP is the protocol designed for those operations.
- **Why not DreamHost API**: DreamHost API is reserved for account/mailbox administration and is not used for day-to-day message ingestion/move operations.
- **Failure safety**: If `Processed` is missing, the command attempts IMAP create; if create fails, DB inserts continue and only move/expunge is skipped.

### Command usage
```bash
php spark alerts:fetch-raw-emails --approve --limit=200 --folder=INBOX --target-folder=Processed --since="1 day ago"
php spark alerts:fetch-raw-emails --dry-run --limit=50 --since="2026-03-30" --verbose
```

### Required env/config keys
- `alerts.imap.host` (default: `imap.dreamhost.com`)
- `alerts.imap.port` (default: `993`)
- `alerts.imap.flags` (default: `/imap/ssl`)
- `alerts.imap.mailbox` (optional full IMAP mailbox path)
- `alerts.imap.user` (set to `tradealerts@mymiwallet.com`)
- `alerts.imap.pass`
- `alerts.imap.processed_folder` (default: `Processed`)

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
