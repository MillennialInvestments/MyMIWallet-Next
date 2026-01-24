# Spark Command Inventory

| Command | Category | Status | Risk | Cron | Notes |
| --- | --- | --- | --- | --- | --- |
| aiops:seed | aiops | Existing | Medium | On-demand | Seeds AI Ops caps defaults. |
| alerts:audit | alerts | Existing | Medium | Weekly | Audits scraped alerts vs trade alerts; writes error logs. |
| alerts:parse-test | alerts | Existing | Low | On-demand | Parses broker email samples for alert normalization. |
| auth:audit | auth | Existing | Medium | Weekly | Runs Myth:Auth lifecycle checks; creates test users. |
| auth:funnel-check | auth | Existing | Low | Daily | Reads bf_user_events for funnel sanity. |
| auth:smoke | auth | Existing | Medium | Daily | Auth smoke test with health run logging. |
| cache:audit | cache | Existing | Low | On-demand | Scans repo for unsafe cache key usage. |
| codex:review | diagnostics | Existing | Low | On-demand | Generates Codex review artifacts. |
| contentengine:smoke | marketing | Existing | Medium | On-demand | End-to-end Content Engine ingest/scoring/drafts. |
| content:ingest-sample | marketing | Existing | Medium | On-demand | Ingests sample gainers payload for scoring. |
| db:apply-docs | database | Existing | High | Manual | Applies compiled SQL from docs/mysql. |
| db:inventory | database | Existing | Medium | Monthly | Generates DB inventory/docs and SQL adjustments. |
| discord:list | alerts | Existing | Low | On-demand | Lists Discord channels/webhooks from config + DB. |
| discord:process-queue | alerts | Existing | Medium | Hourly | Sends queued Discord messages. |
| discord:test | alerts | Existing | Medium | On-demand | Queues and processes a test Discord message. |
| discord:test-liquidity | alerts | Existing | Medium | On-demand | Sends test Liquidity Scan alert. |
| discord:wire-check | alerts | Existing | Low | On-demand | Validates Discord env + table health. |
| forecasts:refresh | forecasting | Existing | Medium | Daily | Refreshes forecasts for open alerts. |
| gap:sync | maintenance | Existing | Medium | On-demand | Enriches gap tracker CSV and writes report. |
| logs:healthcheck | logs | Existing | Medium | Daily | Writes test logs and verifies sinks. |
| logs:summarize | logs | Existing | Medium | Daily | Summarizes CI logs and writes summary/state. |
| mail:send | alerts | Existing | Medium | Hourly | Sends queued mail jobs. |
| mail:send-test | alerts | Existing | Medium | On-demand | Sends branded template test emails. |
| mail:test | alerts | Existing | Medium | On-demand | Sends DreamHost SMTP test email. |
| mail:verify | alerts | Existing | Medium | On-demand | Verifies SMTP settings via diagnostic email. |
| news:audit | marketing | Existing | Medium | Weekly | Audits marketing ingestion/summarization/posts. |
| ops:analyze-commands | system | Existing | Medium | On-demand | Analyzes ops inbox with OpenAI. |
| ops:fetch-commands | system | Existing | Medium | On-demand | Fetches IMAP ops commands to inbox. |
| ops:work | system | Existing | Medium | Hourly | Processes ops queue jobs. |
| revenue:scan | marketing | Existing | Low | Monthly | Scans repo for revenue stream docs. |
| routes:auth-audit | security | Existing | Medium | Weekly | Audits public routes for auth regressions. |
| email:test | alerts | Existing | Medium | On-demand | Sends test email via mailService. |
| wallets:warm-summary-cache | users | Existing | Medium | Daily | Warms wallet summary cache for active users. |
