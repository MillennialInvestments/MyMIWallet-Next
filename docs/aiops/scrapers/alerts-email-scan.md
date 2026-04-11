# Alert Email Scan Pipeline

## Overview

The AIOps email scan job polls the alerts mailbox every 15 minutes, dedupes messages by IMAP UID + mailbox, and records run telemetry for auditability. The scanner does **not** delete or mark messages as read; it uses IMAP peek reads only.

Key behaviors:

- **Deduped** by `mailbox + imap_uid` (safe for repeated runs).
- **Non-destructive**: no deletes or \Seen flag changes.
- **Counts tracked** per ticker and per day.
- **Optional lineage** captured when a scanner name is present in the email content.

## Tables

### `bf_aiops_runs`
Run-level audit log for each scan execution.

- `run_key`: `email_scan`
- `mailbox`, `source_email`
- `status`, `started_at`, `finished_at`, `duration_seconds`
- `scanned_count`, `processed_count`, `duplicate_count`, `ticker_count`
- `meta_json` (criteria, tickers, dry-run flag)

### `bf_aiops_email_processed`
Tracks individual IMAP messages that have already been scanned to prevent reprocessing.

- `mailbox`, `imap_uid` (unique pair)
- `message_id`, `from_email`, `subject`, `received_at`
- `processed_at`, `status`, `meta_json` (tickers + scanner info)

### `bf_investment_ticker_daily_counts`
Daily rollup for ticker occurrences from alert emails.

- `ticker`, `scan_date`
- `source` (`email`)
- `scanner_key` (from `ScannerRouter`)
- `occurrences`

### `bf_investment_scanner_lineage` (optional)
Captures scanner-to-event lineage when a scanner name can be extracted.

- `scanner_key`, `scanner_name`, `source`
- `meta_json` (mailbox + sender context)

## Spark Command

```bash
php spark aiops:email-scan \
  --mailbox=INBOX \
  --from=tradealerts@mymiwallet.com \
  --lookback-days=2 \
  --limit=250
```

The command acquires a MySQL advisory lock (`GET_LOCK`) to ensure only one run is active at a time. Each run writes a row into `bf_aiops_runs` and prints a summary with counts and duration.

## DreamHost Cron Setup

**Schedule (every 15 minutes):**

```
*/15 * * * *
```

**Command template:**

```bash
*/15 * * * * /usr/local/bin/php /home/mymiteam/mymiwallet/site/current/spark aiops:email-scan --mailbox=INBOX --from=tradealerts@mymiwallet.com
```

Update the IMAP environment variables on the server as needed:

- `MYMI_ALERTS_IMAP_HOST`
- `MYMI_ALERTS_IMAP_USER`
- `MYMI_ALERTS_IMAP_PASS`
- `MYMI_ALERTS_IMAP_MAILBOX` (optional override)
- `MYMI_ALERTS_IMAP_LOOKBACK_DAYS` (optional)
- `MYMI_ALERTS_IMAP_LIMIT` (optional)
