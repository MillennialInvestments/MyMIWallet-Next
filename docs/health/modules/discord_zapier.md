# Discord & Zapier Health Tests

✅ Health Test: `php spark alerts:health-discord-notify`
Priority: P1
Feature: Discord notification send (dry-run)
Primary Entry Point(s):
- `app/Libraries/MyMIAlerts.php::sendDiscordNotification()`
- `app/Modules/APIs/Controllers/DiscordController.php::processQueue()`
Dependencies:
- DB: `bf_discord_queue`, `bf_discord_templates`, `bf_discord_channels`
- Env: `CRON_SHARED_KEY`
What it should verify (checklist):
- Step 1: Enqueue a test alert payload.
- Step 2: Process queue and confirm status update.
What it should log: queue_id, channel_key, status.
Failure modes to detect: missing templates, dedupe skip, webhook failure.
Where to implement: `app/Commands/AlertsDiscordHealth.php` (new).
Suggested command name: `alerts:health-discord-notify`
Expected log file: `writable/logs/health_alerts.log`

✅ Health Test: `php spark integrations:health-discord-webhook`
Priority: P1
Feature: Discord webhook connectivity
Primary Entry Point(s):
- `app/Libraries/MyMIDiscord.php::sendWebhookMessage()`
Dependencies:
- Env/config: Discord webhook URL
What it should verify (checklist):
- Step 1: Build minimal webhook payload.
- Step 2: Send to test webhook.
What it should log: masked webhook URL, response status.
Failure modes to detect: invalid webhook URL, 4xx response.
Where to implement: `app/Commands/IntegrationsDiscordHealth.php` (new).
Suggested command name: `integrations:health-discord-webhook`
Expected log file: `writable/logs/health_integrations.log`

✅ Health Test: `php spark marketing:health-zapier`
Priority: P1
Feature: Zapier share (dry-run)
Primary Entry Point(s):
- `app/Services/ZapierService.php::sendApprovedPostsToZapier()`
Dependencies:
- Env: `ZAPIER_APPROVED_WEBHOOK`, `OPENAI_API_KEY`
- DB: `bf_marketing_scraper`
What it should verify (checklist):
- Step 1: Validate webhook URL format.
- Step 2: Send approved post payload in dry-run.
What it should log: post id, webhook status.
Failure modes to detect: webhook missing, 4xx errors, OpenAI fallback errors.
Where to implement: `app/Commands/MarketingZapierHealth.php` (new).
Suggested command name: `marketing:health-zapier`
Expected log file: `writable/logs/health_marketing.log`
