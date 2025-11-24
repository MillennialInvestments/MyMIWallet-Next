# Operations & Monitoring

Operational guardrails for Discord automations.

## Rate Limiting & Safety
- Batch sends when possible; Discord hard limit is ~50 requests/second. Consider 1–2 second sleeps in bulk sends or queue-based workers.
- Keep messages under 2000 characters; reuse `postToDiscord`/`formatDiscordPost` truncation to avoid errors.
- Validate payloads before dispatch to prevent malformed JSON from blocking queues.

## Retry & Backoff
- On HTTP 429/5xx, back off exponentially and retry with idempotent payloads (e.g., hash of alert ID + status).
- Capture and store response codes for audit; surface repeated failures to ops channels.

## Health Checks
- Log every dispatch attempt and response; flag discrepancies between queued alerts and `notification_sent` status.
- Add synthetic probes that post to a staging webhook daily; alert when missing.
- Track CRON completion for alert processing, marketing digests, and earnings fetches; notify on failures or empty runs.

## Admin Toggles & Configuration
- Centralize webhook URLs and channel mappings in ENV/secure config; expose per-automation toggles in `Management/Discord` UI.
- Allow dry-run mode that logs payloads without sending, useful for template testing.
- Version templates and store last-deployed hash to detect drift between staging and production.

## Onboarding Checklist
1. Create or rotate webhook URLs; save to 1Password and environment files.
2. Map channels for alerts, marketing, earnings, and ops; document IDs.
3. Run staging posts for each automation to validate formatting and rate compliance.
4. Enable CRON/queue workers and confirm logs show successful dispatch.
5. Add monitoring alerts (email/Discord) for HTTP failures, queue backlog, and AlphaVantage/news API limits.