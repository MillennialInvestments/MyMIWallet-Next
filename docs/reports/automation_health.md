# Calendar Automation Health Report

## Google Calendar Event Format (Required)
Use this exact key=value block inside the calendar notification/email body:

```ini
automation=marketing
workflow=market_digest
run_cron=cronFetchAndGenerateNews
channels=twitter,linkedin
tone=educational
dedupe_key=2026-04-01_midday_digest
```

## Pipeline
1. Inbox scrape (`CalendarEmailTriggerService::pollInboxAndQueue`)
2. Parse + validate (`automation=marketing`, optional `token=`)
3. Queue insert (`automation_jobs`, dedupe-safe)
4. Queue execution (`php spark automation:run`)
5. Route execution:
   - `MyMIMarketing::cronFetchAndGenerateNews()`
   - `MyMIMarketing::generateDailyContentDigest()`
   - `/API/Management/distributeTodaysNewsContent`

## Logging Signals
- `Calendar Trigger Received: ...`
- `Job Queued: ...`
- `Job Executed: ...`

## Ops Check Commands
```bash
php spark migrate
php spark db:seed AutomationRoutesSeeder
php spark automation:run
```
