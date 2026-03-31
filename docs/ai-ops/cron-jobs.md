# AI Ops CRON Jobs and Kickoffs

Use HTTP CRON hits or `php spark` commands (no sudo required). All jobs respect the AI Ops master switch and subsystem caps.

## HTTP endpoints (under `/API/AiOps/*`)

| Endpoint | Schedule (suggested) | Expected runtime | Behavior on failure | Kill-switch behavior |
| --- | --- | --- | --- | --- |
| `GET /API/AiOps/runMarketingDaily` | Daily 02:00 America/Chicago | < 2 minutes | Returns JSON error and logs event; no retries unless CRON handles | If master off, returns `{status:'error', message:'AI Ops disabled'}` |
| `GET /API/AiOps/runAlertsDigest` | Every 30–60 minutes | < 90 seconds | Logs error status and increments `status_error`; caller may retry | Kill-switch returns error JSON; no API calls |
| `GET /API/AiOps/runAnalyticsWeekly` | Weekly Sunday 04:00 America/Chicago | Up to 5 minutes | If denied, records event; heavy jobs should be batched | Kill-switch returns error JSON |
| `GET /API/AiOps/checkCapsAndAlert` | Daily 00:30 America/Chicago | < 20 seconds | If alert send fails, logs event but keeps flow running | Kill-switch still allowed (safe) |
| `GET /API/AiOps/status` | Ad-hoc | < 5 seconds | Returns JSON with usage/caps; no side effects | Kill-switch still allowed (status only) |

## Spark commands (optional equivalents)

- `php spark aiops:seed` — seeds default caps and pricing.
- Additional spark wrappers can be added to call the HTTP endpoints if cron prefers CLI.

## Failure behaviors

- Wrappers deny execution when caps exceeded (unless override enabled) and log `CAP_REACHED_STOPPED`.
- Errors in downstream API calls increment `status_error` and record the reason in events.
- Cached responses count toward cache hits and skip API spend.

## Kill-switch behavior

- Master switch OFF: run endpoints return error JSON and no API/Redis activity.
- Subsystem toggle OFF: specific jobs are denied with reason `subsystem_disabled`.
- Override flag is ignored when the master switch is OFF.

## AIOps engine loop schedule

- `*/5 * * * * php spark logs:errors`
- `*/10 * * * * php spark aiops:all`
