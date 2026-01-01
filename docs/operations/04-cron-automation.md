# CRON & Background Tasks

## Overview
Tracks automated jobs responsible for email ingestion, digest generation, alert processing, and third-party distribution channels.

## Inventory (Auto-collected)
- Generated on: 2025-10-06 21:17 UTC
- Tooling: grep/awk/php spark/composer/git

## Cron Manifest (authoritative)
| Job | Cadence (ET) | Owner | Endpoint | Idempotency / Logging | Validation |
|---|---|---|---|---|---|
| Run-CRON-Tasks (pipeline) | Every 15 minutes | Codex | `GET /API/Management/Run-CRON-Tasks?cronKey=$CRON_SHARED_KEY` | Chained marketing pipeline with step-by-step log markers; uses CRON shared key. | Call endpoint then tail `writable/logs/*` for step markers. |
| MarketAux News Fetch | Hourly 06:00–18:00 | Codex | `GET /API/Management/cronFetchAndGenerateNews?cronKey=$CRON_SHARED_KEY` | Info/error logs; uses shared cron key. | Per playbook step 3a, confirm JSON success + log line `cronFetchAndGenerateNews`. |
| Marketing Daily Digest (content) | After news fetch window completes (morning) | Codex | `GET /API/Marketing/generateDailyContentDigest?cronKey=$CRON_SHARED_KEY` with optional `X-Idempotency-Key` | 90m idempotency window persisted to `bf_idempotency.response_json`; logs include idempotency key + peak memory. | Send with `X-Idempotency-Key=$(date +%Y%m%d-%H%M)-digest`; expect JSON `idempotency_key` + digest count and matching entry in `bf_idempotency`. |
| Trade Alerts Processor | Every 15 minutes | Codex | `GET /API/Management/processAllTradeAlerts?cronKey=$CRON_SHARED_KEY&batch_size=50` | 45m idempotency window stored in `bf_idempotency`; logs capture pending_before/after + duration_ms. | Trigger with unique `X-Idempotency-Key`; verify JSON `summary.pending_before/after` and idempotency table row. |
| Discord Distributor | Hourly or manual | Codex | `GET /API/Management/sendAllDiscordAlerts?cronKey=$CRON_SHARED_KEY` | Existing JSON + log output; should follow alerts processor run. | Step 3c of playbook: confirm Discord webhook dashboard receives batch. |
| Zapier Distributor | After digest/alerts as needed | Codex | `GET /API/Management/sendToZapierManually?cronKey=$CRON_SHARED_KEY` | Logs Zapier response code; ensure only after digest completes. | Invoke manually, confirm HTTP 200 and Zapier dashboard receipt. |

## Status Table
| Area / Item | Current Status | Action Needed | Priority | Notes |
|---|---|---|---|---|
| Email Scraper → bf_marketing_temp_scraper | ⚙️ Needs Review | Add dedupe + retry envelope around `cronFetchInbox` to avoid empty runs. | 🟠 High | Marketing cron pulls inbox directly with minimal error handling. |
| Daily Digest → bf_marketing_scraper | 🟢 Guarded | Idempotent for 90m via `X-Idempotency-Key`, persists digest summary in `bf_idempotency`. | 🟠 High | Skips when no valid records; logs peak memory and idempotency key. |
| Trade Alerts Processor → bf_investment_trade_alerts | 🟢 Guarded | 45m idempotency guard with pending_before/after counters; requires CRON key. | 🟠 High | Batch size override via `batch_size` query; writes response_json snapshot. |
| Discord Distributor | ⚙️ Needs Review | Queue Discord notifications and add rate-limit awareness. | 🟡 Medium | Sends all alerts immediately without cooldown or status logging. |
| Zapier Distributor | ⚙️ Needs Review | Validate payload schema and handle Zapier response codes. | 🟡 Medium | Manual send uses marketing summary without status evaluation. |
| MarketAux hourly fetch (6AM–6PM) | ⚙️ Needs Review | Schedule explicit cron entries and monitor API error frequency. | 🟡 Medium | Fetch endpoint exists but relies on external scheduling discipline. |
| AlphaVantage API key rotation | ⚙️ Needs Review | Integrate rotation status alert when key pool exhausted. | 🟠 High | Library silently returns null when keys depleted; cron jobs depend on it. |
| Spam Scrubber toggle | ⚙️ Needs Review | Wire output into moderation workflow and persist decisions. | 🟡 Medium | Spam check endpoint returns JSON but no follow-up action triggered. |

## Findings (Evidence)
- `cronFetchInbox` and related marketing endpoints fetch Gmail inbox content with only try/catch logging.【F:app/Modules/APIs/Controllers/MarketingController.php†L150-L186】
- Management cron workflow now records idempotency keys and captures timing/queue depth for trade-alert cron runs.【F:app/Modules/APIs/Controllers/ManagementController.php†L60-L119】【F:app/Modules/APIs/Controllers/ManagementController.php†L1472-L1526】
- Trade alert cron endpoint enforces CRON key + idempotency key and logs pending_before/pending_after counts.【F:app/Modules/APIs/Controllers/ManagementController.php†L1472-L1526】
- Daily content digest cron enforces a 90-minute idempotency window and records response payload in `bf_idempotency`.【F:app/Modules/APIs/Controllers/ManagementController.php†L1040-L1088】
- Discord distribution iterates alerts with no rate-limiting or success logging beyond JSON reply.【F:app/Modules/APIs/Controllers/ManagementController.php†L1422-L1434】
- Zapier manual send wraps marketing summary but ignores response status for failure handling.【F:app/Modules/APIs/Controllers/ManagementController.php†L1326-L1333】
- MarketAux fetch uses marketing service but lacks scheduling guardrails or retry budgets.【F:app/Modules/APIs/Controllers/ManagementController.php†L265-L279】
- Alpha Vantage key rotation library silently returns null when keys exhausted, impacting cron tasks relying on market data.【F:app/Libraries/MyMIAlphaVantage.php†L20-L129】
- Spam detection endpoint reports counts but does not persist remediation outcome.【F:app/Modules/APIs/Controllers/ManagementController.php†L248-L263】

## Required Fixes / Tasks
- [x] Generate a consolidated cron manifest with expected cadence and owners (owner: Codex).
- [x] Implement job-level idempotency tokens/logging for trade alerts and marketing digest runs (owner: Codex).
- [ ] Perform manual cron validation run per [marketing-cron-playbook.md](../ops/runbooks/marketing-cron-playbook.md) (owner: Teddy/manual).

## Telemetry & validation (aligned to marketing-cron-playbook.md)
1. Use unique `X-Idempotency-Key` values when manually invoking digest or trade-alert cron endpoints to avoid replay (`date +%Y%m%dT%H%M` slug is fine).
2. After each run, query `bf_idempotency` for the supplied key to confirm `response_json` contains digest details or pending_before/after counts.
3. Tail `writable/logs/*` for markers: `processAllTradeAlerts completed (key=...)` and `Peak Memory Usage` from digest runs.
4. Record results in `/home/mymiteam/logs/marketing-cron-$(date +%F).md` along with any Discord/Zapier confirmations per the playbook.

## Links & References
- `app/Modules/APIs/Controllers/ManagementController.php`, `app/Modules/APIs/Controllers/MarketingController.php`
- `app/Libraries/MyMIAlphaVantage.php`
- Cron logs under `/home/mymiteam/cron_logs/`
