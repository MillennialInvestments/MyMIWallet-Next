# AI Ops Observability Policy

## Logging requirements

- Every AI call must log subsystem, request timestamp, cache hit/miss, tokens in/out, cost (actual or estimated), and success/error status.
- Events such as cap reached, override toggled, alert email sent, or kill-switch activated are recorded in `bf_ai_ops_events` with `meta_json` context.
- CRON endpoints must return structured JSON that includes allow/deny reason when a job is skipped.

## Usage metrics

- Daily rollups are stored in `bf_ai_ops_usage` keyed by `date_key` and `month_key` (`YYYY-MM`).
- Metrics captured: requests, tokens_in, tokens_out, cost_usd, cache_hits, status_success, status_error.
- Caps per subsystem are stored in `bf_ai_ops_caps`; reset period is monthly.

## Alert thresholds

- Default alert threshold: 80% of monthly cap (configurable).
- Alert email target: `team@mymiwallet.com` (configurable).
- Alerts fire once per subsystem per month; event `ALERT_80_SENT` prevents duplicates.

## Incident response near caps

1. Check dashboard usage cards and event log for the affected subsystem.
2. Disable the subsystem toggle (or master switch) to halt jobs.
3. Increase cache TTL or reduce token ceilings (`aiMaxTokensPerRequest`) to slow consumption.
4. Postpone heavy CRON jobs or switch to batch/queue mode.
5. If override is necessary, enable it via dashboard (logs user/IP/UA/reason) and re-run carefully.

## Bonus: How we avoid surprise bills

- All API calls must go through wrappers.
- Wrappers must check caps first.
- Wrappers must cache results.
- Wrappers must log usage.
- CRON endpoints must return allow/deny reasons.
