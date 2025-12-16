# API endpoints

Namespace: `App\Modules\APIs\Controllers\ContentEngineController`

## Routes
- `POST /API/ContentEngine/ingestScanner` – store raw scan JSON.
- `POST /API/ContentEngine/processIngest/{id}` – score + draft posts for an ingest.
- `GET /API/ContentEngine/topIdeas?ingest_id={id}&tier={tier}` – list ideas with reasons/platforms.
- `GET /API/ContentEngine/posts?idea_id={id}` – list per-platform drafts.
- `POST /API/ContentEngine/approvePost/{id}` – mark draft approved.
- `POST /API/ContentEngine/sendPost/{id}` – push via `DistributionService` (stub-ready).
- `POST /API/ContentEngine/runDaily` – CRON-safe: process latest `received` ingest and auto-create TradingView + StockTwits drafts for top 5.

## Curl examples

### Ingest (token optional, set `ContentEngine.ingestToken` to require)
```bash
curl -X POST https://yourhost.com/API/ContentEngine/ingestScanner \
  -H 'Content-Type: application/json' \
  -H 'X-MYMI-TOKEN: YOUR_TOKEN_IF_SET' \
  -d @writable/samples/daily_gainers.json
```

### Process + draft
```bash
curl -X POST https://yourhost.com/API/ContentEngine/processIngest/123 \
  -H 'Cookie: ci_session=...'  # admin session
```

### Fetch Tier1 ideas
```bash
curl "https://yourhost.com/API/ContentEngine/topIdeas?ingest_id=123&tier=tier1&limit=10" \
  -H 'Cookie: ci_session=...'
```

### Approve + send a post
```bash
curl -X POST https://yourhost.com/API/ContentEngine/approvePost/55 -H 'Cookie: ci_session=...'
curl -X POST https://yourhost.com/API/ContentEngine/sendPost/55 -H 'Cookie: ci_session=...'
```

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