# AI Ops Control Center

This document describes how MyMI Wallet orchestrates cost-safe AI automation across ChatGPT Business (human interactive), ChatGPT API workloads, Codex API workloads, and GitHub AI Review tracking. It covers what is metered, how caps are enforced, the toggle model, and the day-to-day runbooks for operators.

## Stack overview

- **ChatGPT Business (human interactive):** used by operators; non-metered in this control plane.
- **ChatGPT API:** programmatic calls for marketing, alerts, and analytics. Metered and capped.
- **Codex API:** programmatic code generation, refactors, and docs alignment. Metered and capped.
- **GitHub AI Reviews:** tracked as a subsystem for visibility; token metering only if API calls are invoked.
- **Control layer:** centralized `AiOpsManager` plus API client wrappers (`ChatGptClient`, `CodexClient`) with Redis caching and cost/usage accounting.
- **Dashboard:** Management UI for toggles, usage/caps display, event log, and manual kickoffs.
- **Automation endpoints/CRON:** HTTP endpoints (or `php spark` commands) to trigger daily/weekly jobs and alert checks.

## What is metered vs non-metered

- **Metered:** ChatGPT API (marketing, alerts, analytics), Codex API (codegen, docs alignment), any GitHub AI Review API calls if enabled.
- **Non-metered:** ChatGPT Business (interactive), dashboard interactions, toggle changes, dry-run status checks.

## Toggles and kill switches

- **Master switch:** `aiOpsEnabled` disables all AI automation when set to false.
- **Subsystem switches:** enable/disable ChatGPT API, Codex API, and GitHub AI Reviews individually.
- **Automation levers:** granular switches per automation (marketing, alerts, analytics, docs alignment).
- **Override flag:** `aiOpsAllowOverride` permits admins to bypass caps only through the dashboard with explicit confirmation.
- **Alerting settings:** threshold percentage and target email are configurable.
- **Safety ceilings:** default per-request and per-minute token ceilings are configurable and enforced in code.

## Cap enforcement model

1. **Gatekeeping:** Every AI call goes through `AiOpsManager::assertCanRun($subsystem)` which checks master toggle, subsystem toggle, caps, and override status.
2. **Usage tracking:** `recordUsage()` writes daily rollups, increments cache hits, request/error counts, and cost estimates.
3. **Cap checks:** Hard caps per subsystem are stored in `bf_ai_ops_caps` (monthly reset). If a run would exceed cap, the call is denied unless override is enabled.
4. **Alerting:** When usage reaches the alert threshold (default 80%), an email is sent to `team@mymiwallet.com` once per subsystem per month and an event is logged.
5. **Kill behavior:** When the master switch is off, all run endpoints return `{status:'error', message:'AI Ops disabled'}` and no API calls are attempted.

## Operational runbooks

### Daily
- Review dashboard “Master Switch” status and subsystem toggles.
- Check usage cards for marketing and alerts; ensure alert emails have not fired unexpectedly.
- Verify Redis cache health (cache hit counters should be non-zero for marketing/alerts).
- Run `/API/AiOps/checkCapsAndAlert` to confirm alert logic.

### Weekly
- Run analytics weekly job via `/API/AiOps/runAnalyticsWeekly`.
- Export the last 200 events from the dashboard to confirm no repeated ALERT_80_SENT.
- Adjust caps or token ceilings if new campaigns are planned.
- Review docs alignment automation toggle before enabling.

### Monthly
- Confirm cap resets are reflected in `bf_ai_ops_caps` and `bf_ai_ops_usage` month buckets.
- Update budget targets in the dashboard or via `setCaps` endpoint if business goals changed.
- Audit event log for override uses; ensure reasons/IP/UserAgent are captured.
- Validate alert email delivery for each subsystem at threshold crossing.

### Incident response (near or over cap)
- Use dashboard to toggle off the offending subsystem (or master switch).
- Increase cache TTL for heavy prompts and re-run with caching.
- Reduce `aiMaxTokensPerRequest` or slow CRON frequency.
- If override is necessary, enable it temporarily via dashboard; the action is logged.
