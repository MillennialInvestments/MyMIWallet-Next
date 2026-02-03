# Alerts Automation Playbook

## Pipeline Tables
- `bf_investment_scraper` (raw email intake, status `In Review` → `Processed`)
- `bf_investment_trade_alerts` (normalized trade alerts)
- `bf_investment_alert_history` (alert history snapshots)
- `bf_trade_alert_scanner_meta` (scanner key/timeframe/tags per alert)
- `bf_scanner_taxonomy` (normalized scanner names)
- `bf_aiops_ingest_runs` (ingest metrics by run)

## Spark Commands
- `php spark ops:alerts:ingest --since=15m --limit=200` (ingest alerts email into scraper + upsert alerts)
- `php spark alerts:audit` (validate scraper + trade alert health)

## Definition of Done
- New alert emails are stored in `bf_investment_scraper` with status `In Review`.
- Alerts are parsed into `bf_investment_trade_alerts` and history is recorded.
- Scanner taxonomy rows exist for new scanner names.
- Scraper rows are marked `Processed` after handling.
- Ingest run metrics are stored in `bf_aiops_ingest_runs`.

## Dedupe Rules
- Email dedupe uses message-id or canonical hash in `bf_investment_scraper`.
- Trade alerts dedupe by ticker/status (open alerts updated vs inserted).
- Broker executions dedupe by `execution_id`.
- Scanner taxonomy inserts are idempotent by raw name.

## Rate Limiting / Pacing
- Default ingestion window: `--since=15m` with `--limit=200`.
- Cron should stagger alert ingestion away from marketing/news ingestion to avoid DB contention.

## Platform Constraints (Distribution)
- Discord: respect channel priority + dedupe keys (execution ID / alert ID).
- Email/SMS: do not batch multiple alerts into a single message without explicit config.
- Any outbound webhook should include idempotency keys from alert IDs.
