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