# CRON & Background Tasks

## Overview
Tracks automated jobs responsible for email ingestion, digest generation, alert processing, and third-party distribution channels.

## Inventory (Auto-collected)
- Generated on: 2025-10-06 21:17 UTC
- Tooling: grep/awk/php spark/composer/git

## Status Table
| Area / Item | Current Status | Action Needed | Priority | Notes |
|---|---|---|---|---|
| Email Scraper → bf_marketing_temp_scraper | ⚙️ Needs Review | Add dedupe + retry envelope around `cronFetchInbox` to avoid empty runs. | 🟠 High | Marketing cron pulls inbox directly with minimal error handling. |
| Daily Digest → bf_marketing_scraper | ⚙️ Needs Review | Gate digest generation on content volume and persist summaries with checksum. | 🟠 High | Digest workflow assumes news available and reruns without idempotency. |
| Trade Alerts Processor → bf_investment_trade_alerts | ⚙️ Needs Review | Enforce batch idempotency and audit trail before running alerts cron. | 🟠 High | Manual cron triggers fetch, batch process, and update alerts in one request. |
| Discord Distributor | ⚙️ Needs Review | Queue Discord notifications and add rate-limit awareness. | 🟡 Medium | Sends all alerts immediately without cooldown or status logging. |
| Zapier Distributor | ⚙️ Needs Review | Validate payload schema and handle Zapier response codes. | 🟡 Medium | Manual send uses marketing summary without status evaluation. |
| MarketAux hourly fetch (6AM–6PM) | ⚙️ Needs Review | Schedule explicit cron entries and monitor API error frequency. | 🟡 Medium | Fetch endpoint exists but relies on external scheduling discipline. |
| AlphaVantage API key rotation | ⚙️ Needs Review | Integrate rotation status alert when key pool exhausted. | 🟠 High | Library silently returns null when keys depleted; cron jobs depend on it. |
| Spam Scrubber toggle | ⚙️ Needs Review | Wire output into moderation workflow and persist decisions. | 🟡 Medium | Spam check endpoint returns JSON but no follow-up action triggered. |

## Findings (Evidence)
- `cronFetchInbox` and related marketing endpoints fetch Gmail inbox content with only try/catch logging.【F:app/Modules/APIs/Controllers/MarketingController.php†L150-L186】
- Management cron workflow chains multiple marketing steps without idempotent checkpoints.【F:app/Modules/APIs/Controllers/ManagementController.php†L63-L119】
- Trade alert cron endpoint fetches emails, processes batches, and updates records in a single request.【F:app/Modules/APIs/Controllers/ManagementController.php†L999-L1012】
- Discord distribution iterates alerts with no rate-limiting or success logging beyond JSON reply.【F:app/Modules/APIs/Controllers/ManagementController.php†L1422-L1434】
- Zapier manual send wraps marketing summary but ignores response status for failure handling.【F:app/Modules/APIs/Controllers/ManagementController.php†L1326-L1333】
- MarketAux fetch uses marketing service but lacks scheduling guardrails or retry budgets.【F:app/Modules/APIs/Controllers/ManagementController.php†L265-L279】
- Alpha Vantage key rotation library silently returns null when keys exhausted, impacting cron tasks relying on market data.【F:app/Libraries/MyMIAlphaVantage.php†L20-L129】
- Spam detection endpoint reports counts but does not persist remediation outcome.【F:app/Modules/APIs/Controllers/ManagementController.php†L248-L263】

## Required Fixes / Tasks
- [ ] Generate a consolidated cron manifest with expected cadence and owners (owner: Codex).
- [ ] Implement job-level idempotency tokens/logging for trade alerts and marketing digest runs (owner: Codex).
- [ ] Perform manual cron validation run per [marketing-cron-playbook.md](../ops/runbooks/marketing-cron-playbook.md) (owner: Teddy/manual).

## Links & References
- `app/Modules/APIs/Controllers/ManagementController.php`, `app/Modules/APIs/Controllers/MarketingController.php`
- `app/Libraries/MyMIAlphaVantage.php`
- Cron logs under `/home/mymiteam/cron_logs/`
