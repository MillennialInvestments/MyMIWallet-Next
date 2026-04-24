# Marketing Pipeline Audit (2026-04-23 03:16:01 UTC)

## End-to-end flow inventory
1. **Scrape/fetch**
   - `marketing:news-scrape` (`app/Commands/Marketing/NewsScrape.php`)
   - `MarketingNewsScrapeService`, `MarketingScraper`, legacy `MyMIMarketing::fetchAndStoreEmails` paths.
   - Source ingestion tables: `bf_marketing_temp_scraper`, `bf_marketing_scraper`.
2. **Summarize/extract/normalize**
   - `MarketingPipelineService::processPendingTempRecords`.
   - `MarketingPackageService`, `MarketingStoryService`, `MarketingNewsGenerateService`.
   - Model quality gates in `MarketingModel` (HTML-heavy skip, min content length checks).
3. **Generated content**
   - `bf_marketing_generated_content` + versions in `bf_marketing_generated_content_versions`.
4. **Approval/scheduling**
   - Commands: `marketing:approve-generated`, `marketing:approve-generated-content`.
   - Controllers: API marketing + management marketing endpoints.
   - Schedule table: `bf_marketing_schedule`.
5. **Distribution**
   - Command: `marketing:distribute` -> `MarketingPipelineService::processPendingGeneratedContent` -> `MarketingDistributionService`.
   - Targets/queue table: `bf_marketing_distribution_targets`.
   - Email queue table: `bf_marketing_email_queue` / `bf_email_outbox` depending on path.
6. **Destination sent/failed tracking**
   - `bf_marketing_distribution_targets` (status, retry, response metadata).
   - Aggregate status pushed back to `bf_marketing_generated_content`.

## Components discovered
- **Controllers**: `app/Modules/APIs/Controllers/MarketingAPIController.php`, `app/Modules/APIs/Controllers/ManagementController.php`.
- **Services/Libraries**: `MarketingPipelineService`, `MarketingDistributionService`, `MyMIMarketing`, `MyMIDiscord`, destination services under `app/Services/Marketing/Distribution/*`.
- **Models**: `MarketingModel`, `MarketingDistributionTargetModel`, `EmailQueueModel` and other marketing models.
- **Routes**: marketing API and management routes in `app/Config/Routes.php` plus module route files.
- **Spark commands**: all `app/Commands/Marketing/*` including distribute/retry/approve/scrape/generate.
- **Config/env**:
  - `Config/MarketingDistribution.php` env keys `MARKETING_*`.
  - Discord keys from `Config/Discord.php` + `DISCORD_DEFAULT_WEBHOOK`, `DISCORD_WEBHOOK_URL` legacy callsites.

## Key findings
- Discord path had inconsistent send flows and weak failure classification.
- Previous `failed/retrying` statuses did not clearly separate permanent vs retryable failures.
- 429 handling did not enforce delayed retry scheduling in the distribution target queue.
- Idempotency key was absent at target row level.
- Distribution attempts were missing durable attempt metadata (http status, headers/body excerpt, failure class).

## Remediation summary in this PR
- Introduced destination adapter dispatcher with canonical Discord adapter.
- Added retry/permanent/dead-letter status model and idempotency key support.
- Added richer attempt metadata persistence for distribution targets.
- Added `marketing:audit:distribution` diagnostics command and operator runbook.
