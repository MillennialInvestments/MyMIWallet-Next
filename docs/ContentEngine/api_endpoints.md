# Content Engine API Endpoints

## API Routes (under `/API` group)
| Method | Path | Controller | Notes |
| --- | --- | --- | --- |
| POST | `/API/ContentEngine/ingestScanner` | `APIs\ContentEngineController::ingestScanner` | Accepts JSON or form with `scan_name`, `quote_ts`, `rows[]`. Token-only allowed. |
| POST | `/API/ContentEngine/processIngest/{id}` | `APIs\ContentEngineController::processIngest` | Scores rows, generates drafts. Optional `force=1` to re-score processed ingest. |
| GET | `/API/ContentEngine/topIdeas` | `APIs\ContentEngineController::topIdeas` | Query params: `ingest_id`, optional `tier`, `limit`. |
| GET | `/API/ContentEngine/posts` | `APIs\ContentEngineController::posts` | Query `idea_id` or path `/posts/{ideaId}` for drafts. |
| POST | `/API/ContentEngine/approvePost/{id}` | `APIs\ContentEngineController::approvePost` | Marks draft status `approved`. |
| POST | `/API/ContentEngine/sendPost/{id}` | `APIs\ContentEngineController::sendPost` | Sends via Zapier/Discord if enabled; otherwise returns `skipped`. |
| POST | `/API/ContentEngine/runDaily` | `APIs\ContentEngineController::runDaily` | Cron-safe helper: scores most recent `received` ingest, limits to top 5 for TV/ST. |

## Management Routes
| Method | Path | Controller | Purpose |
| --- | --- | --- | --- |
| GET | `/Management/ContentEngine/previewPost/{id}` | `Management\ContentEngineController::previewPost` | Returns modal HTML for dynamicModalLoader with draft payload + idea. |
| GET | `/Management` | `Management\ManagementController::index` | Includes the "Daily Scanner Content" dashboard block that calls the API endpoints above. |

### Route Map
- Management block -> `/API/ContentEngine/topIdeas` when selecting tiers/ingests.
- Generate Draft buttons -> `/API/ContentEngine/processIngest/{id}`.
- Run Daily button -> `/API/ContentEngine/runDaily`.
- Preview Draft -> `/Management/ContentEngine/previewPost/{id}` (via dynamicModalLoader).
- Approve/Send -> `/API/ContentEngine/approvePost/{id}` then `/API/ContentEngine/sendPost/{id}`.
