# Alerts Runbook

This runbook captures the operational steps for keeping the MyMI Alerts pipeline healthy.

## Manual triggers

| Action | Command |
| --- | --- |
| Run ingestion now | `curl -s https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts?key=<cron_key>` |
| Process pending scraper records | `curl -s https://www.mymiwallet.com/index.php/API/Alerts/runQueue/parse_alert?key=<cron_key>` |
| Refresh market data | `curl -s https://www.mymiwallet.com/index.php/API/Alerts/runQueue/update_market_data?key=<cron_key>` |
| Fan-out Discord/social alerts | `curl -s https://www.mymiwallet.com/index.php/API/Alerts/runQueue/distribute_discord?key=<cron_key>` |

> **Tip**: `alerts.queue.batchSize` and `alerts.queue.maxAttempts` can be tuned via environment variables.  Default batch size is 20 jobs per worker run.

## Rate-limit monitoring

- AlphaVantage: check `logs/alpha_vantage.log` (or centralized logging) for `Rate limit reached; processing deferred.` messages.  When they appear frequently, either stagger CRON jobs or add more API keys via the `ALPHA_VANTAGE_API_KEYS` environment variable.
- ElevenLabs: look for `ElevenLabs voiceover request failed` warnings.  Update the API key in `app/Config/APISettings.php` or rotate voices if 401s persist.  The UI now degrades gracefully, so absence of audio is not fatal.

## Queue health

1. Query queue depth:
   ```sql
   SELECT type, status, COUNT(*) FROM bf_investment_alert_jobs GROUP BY type, status;
   ```
2. If `processing` jobs stall (same `updated_at` for >15 minutes), reset them:
   ```sql
   UPDATE bf_investment_alert_jobs SET status = 'pending', last_error = CONCAT('Reset at ', NOW())
   WHERE status = 'processing' AND updated_at < (NOW() - INTERVAL 15 MINUTE);
   ```
3. Investigate `failed` jobs before rerunning.

## Handling AlphaVantage exhaustion

1. Worker responses include `{ "status": "queued", "message": "Rate limit reached; processing deferred." }` when throttled.
2. Leave the queue intact; a subsequent worker run will process the backlog once the minute bucket resets.
3. If emergency data is required, temporarily set `ALERT_QUEUE_BATCH_SIZE=5` and re-run the worker so fewer requests are made per minute.

## Handling ElevenLabs 401 / curl error 22

1. Confirm credentials in `APISettings` or env vars.
2. Voiceover generation logs only one concise error per run.  Verify that `generateAdvisorMediaPackage` still returns a media array (without audio).
3. If the external API is down, disable `generate_voiceover` jobs by pausing the CRON or toggling the queue entry in `getDeliveryChannels()`.

## CRON overview

| Cron | Interval | Purpose |
| --- | --- | --- |
| `fetchEmailAlerts` | every 5-10 minutes | Pull ThinkOrSwim / TradingView email alerts. |
| `runQueue/parse_alert` | every 5 minutes | Convert new emails into trade alerts. |
| `runQueue/update_market_data` | every 5 minutes (staggered) | Update prices/indicators without exceeding AlphaVantage limits. |
| `runQueue/distribute_*` | every 5-10 minutes | Fan-out alerts to Discord/email/social once enrichment succeeds. |

Document CRON output under `logs/cron/alerts/*.log` so the next on-call can triage issues quickly.
