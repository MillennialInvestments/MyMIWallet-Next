# Post-Launch Verification

Run these checks immediately after release and during the first week.

## 0: T+30 Minutes
- [ ] Validate homepage and auth paths (`/`, `/login`, `/register`) return 200 and render correctly.
- [ ] Check `bf_error_logs` for new CRITICAL/ERROR entries; correlate with access logs.
- [ ] Confirm alert/budget/investment APIs respond (sample calls to `/Budget/summary`, `/Investments`, `/API/Alerts/processTradeAlerts`).
- [ ] Verify email/SMS/Discord alerts triggered during deploy window succeeded.
- [ ] Ensure cron jobs scheduled during the window completed or were re-run (see cron dashboard if available).

## 1: T+24 Hours
- [ ] Review error volume trends (focus on `bf_error_logs`) and compare to prior baseline.
- [ ] Scan 404/500/504 patterns in web server logs; confirm custom error pages served.
- [ ] Verify email alerts continue to fire for warnings/errors; confirm no alert loops.
- [ ] Confirm daily cron batches (alerts, marketing, predictions if enabled) completed with expected record counts.
- [ ] Re-run key user flows with QA accounts (budget entry, watchlist update, marketing preview) to confirm persistence.

## 2: T+7 Days
- [ ] Trend review of `bf_error_logs` and monitoring dashboards; verify sustained low error rate.
- [ ] Inspect cron completion evidence for week-long runs (queues drained, no stuck jobs).
- [ ] Confirm cache/queue health (Redis if enabled) and storage quotas.
- [ ] Validate SEO/marketing feeds still updating; check sitemap/robots and marketing distribution metrics.
- [ ] Document any residual issues and schedule remediation.

## Metrics to Watch
- **Error volume:** CRITICAL/ERROR entries in `bf_error_logs` (spikes trigger investigation).
- **HTTP status patterns:** 404/500/504 counts in access logs.
- **Email alerts:** Delivery successes/failures for application warnings/errors.
- **Cron completion:** Logs for `/API/Management/*` and `/API/Alerts/*` tasks show completed batches.

## Quick Remediation Triage
- If errors spike: enable maintenance mode, capture logs, and check recent deploy diff.
- For cron failures: rerun with `cronKey`, monitor output, and backfill missing records.
- For alert delivery issues: rotate webhook/API keys and retry with test payloads.
- For DB-related errors: verify connection strings, run read-only health queries, and check disk quota.
