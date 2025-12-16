# Content Engine (Daily Scanner → Content)

## Existing related docs
- **docs/alerts/**: alert ingestion + marketing routing (aligns with posting flows).
- **docs/discord/**: streaming setup + Coffee & Stocks references for Discord prompts.
- **docs/marketing/**: platform-specific copy guides (X, StockTwits, TikTok, YouTube, Facebook) and Coffee & Stocks messaging.
- **docs/kimi-k2-integration.md**: prior AI storyboard usage that feeds Coffee & Stocks.

These remain reference material for tone/CTA; new Content Engine docs live under `docs/ContentEngine/`.

## New files in this folder
- `overview.md` (this file)
- `json_contract.md` – payload + alias map.
- `scoring_rules.md` – deterministic scoring mirrored in `app/Config/ContentEngine.php` and `ScannerScoringService`.
- `api_endpoints.md` – `/API/ContentEngine/*` routes with curl examples.
- `ui_workflow.md` – Management dashboard block + modal preview.
- `cron_jobs.md` – CRON-safe POST flows, DreamHost curl examples.
- `security.md` – auth/token expectations + payload size guard.
- `postman_collection.json` – ready-to-import API tests.

## Code map
- Config: `app/Config/ContentEngine.php`
- Migrations: `app/Database/Migrations/2024-06-01-000001_create_content_engine_tables.php`
- Models: `app/Models/Content*`
- Services: `app/Libraries/ContentEngine/*`
- API controller: `app/Modules/APIs/Controllers/ContentEngineController.php`
- Management UI: `app/Modules/Management/Views/ContentEngine/*` (wired via `Management/Config/Routes.php` and `ManagementController::buildContentEngineSummary`).
- CLI sample: `app/Commands/ContentIngestSample.php` using `writable/samples/daily_gainers.json`.

# Content Engine Overview

The Content Engine ingests a daily "Top Gainers" JSON payload, normalizes symbols and metrics, scores each name, and generates multi-platform drafts (TradingView, StockTwits, TikTok, YouTube, Facebook, optional Discord). The process is deterministic and functions without AI or third-party webhooks when disabled.

## Flow
1. **Ingest** via `/API/ContentEngine/ingestScanner` with a JSON body containing `scan_name`, `quote_ts`, and `rows`.
2. **Score** rows to create `bf_content_ideas`, assigning tiers and structured reasons.
3. **Draft** templates rendered per platform into `bf_content_posts`.
4. **Review** drafts from the Management dashboard block ("Daily Scanner Content") with modal previews.
5. **Distribute** through Zapier or Discord when enabled; otherwise responses are skipped safely.

## Key Safeguards
- Payload hash prevents duplicate ingests.
- Payload and row-count limits (1MB / 500 rows by default).
- Database transactions wrap ingest persistence.
- Templates are optional and missing files are logged instead of breaking the pipeline.

## Feature Flags
- `CONTENTENGINE_DISTRIBUTION_ENABLED` – enable/disable outbound sendPost behavior.
- `CONTENTENGINE_ZAPIER_WEBHOOK_URL` – optional Zapier webhook target.
- `CONTENTENGINE_DISCORD_ENABLED` – allow Discord dispatch stub logging.