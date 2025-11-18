# Alert Pipeline Jobs

All asynchronous work is coordinated through the `bf_investment_alert_jobs` table and the helper `App\Libraries\AlertJobQueue`.  Each job is a JSON payload that records its target type, attempts, and last error for observability.

## Table schema (summary)

| Column | Type | Description |
| --- | --- | --- |
| `id` | BIGINT PK | Unique job id. |
| `type` | VARCHAR(64) | Job channel (`parse_alert`, `update_market_data`, etc.). |
| `payload` | JSON/TEXT | Arbitrary data needed to process the job. |
| `status` | ENUM | `pending`, `processing`, `failed`, `completed`, `queued`. |
| `attempts` | INT | Number of times the job has been attempted. |
| `last_error` | TEXT | Truncated error string for observability. |
| `available_at` | DATETIME NULL | Optional future availability for delayed jobs. |
| `created_at` / `updated_at` | DATETIME | Auto-managed timestamps. |

## Job types

| Type | Payload shape | Handler | Notes |
| --- | --- | --- | --- |
| `parse_alert` | `{ "scraper_id": 123 }` | `AlertsModel::processScraperRecord()` | Converts one `bf_investment_scraper` row into trade alerts, ensures tickers exist, logs alert history, then marks the scraper row as processed. |
| `update_market_data` | `{ "symbol": "AAPL" }` | `AlertsModel::updateAlertPrices()` + `MyMIAlphaVantage` | Refreshes the latest price + indicators for one ticker.  AlphaVantage calls are throttled to ≤70/minute; jobs requeue automatically when rate limited. |
| `generate_script` | `{ "alert_id": 42 }` | `MyMIAdvisor::generateVoiceoverScriptFromSummary()` | Builds the user-facing summary/script for downstream channels.  Output is cached on the alert record and in advisor logs. |
| `generate_voiceover` | `{ "user_id": 7, "alert_id": 42 }` | `MyMIAdvisor::generateVoiceoverWithElevenLabs()` | Generates optional ElevenLabs MP3 assets.  Failures (401s, curl errors) are logged once per run and result in `voiceover_url = null`. |
| `distribute_discord` | `{ "alert_id": 42, "channel": "discord" }` | `MyMIMarketing` / `MyMIDiscord` | Posts the alert summary to Discord.  Additional channels will follow the same interface. |
| `distribute_email` | `{ "alert_id": 42 }` | `AlertsController::sendAlert()` | Sends the alert via transactional email and marks `alert_sent`. |

## Worker endpoints

- `/API/Alerts/runQueue` – Accepts a `type` query string (or `all`) and processes up to `alerts.queue.batchSize` jobs per type.
- `/API/Alerts/runQueue/(:segment)` – Segment is treated as the job type and is limited via the same batch size.

Each run logs:

- total jobs fetched
- completed jobs
- failed jobs + last error (truncated)
- AlphaVantage and ElevenLabs rate-limit warnings

If a job throws, it is retried up to `alerts.queue.maxAttempts` (default 3) before being marked as `failed` with the most recent error recorded in `last_error`.
