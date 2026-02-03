# AIOps Scraper Control Index

## Investment Alerts
- Inbox: alerts@mymiwallet.com
- Entry Command: alerts:parse-test / maintenance:alerts:audit
- Data Flow:
  Email → Scraper → Normalizer → Trade Alerts → Discord / UI

## Marketing Scraper
- Source: Marketing newsletters + APIs
- Entry Command: news:audit / marketing:automation-audit
- Data Flow:
  Source → Ingest → Score → Draft → Queue → Publish

## AIOps Responsibilities
- Trigger via Spark
- Monitor logs
- Detect anomalies
- Halt on repeated failures
- Open GitHub issues (never hot-fix)

## Forbidden Actions
- Do not parse content directly
- Do not modify scraping logic
- Do not bypass queues
