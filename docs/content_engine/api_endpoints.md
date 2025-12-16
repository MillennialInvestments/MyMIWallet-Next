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