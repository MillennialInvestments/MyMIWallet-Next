# CRON / automation

Endpoint: `POST /API/ContentEngine/runDaily`
- Finds the latest ingest in `received` status.
- Scores it, tags tiers, and builds TradingView + StockTwits drafts for the top 5 symbols.
- Returns `{ingest_id, status, created_drafts}`.

DreamHost-friendly curl (token optional):
```bash
/usr/bin/curl -X POST https://yourhost.com/API/ContentEngine/runDaily \
  -H 'X-MYMI-TOKEN: YOUR_TOKEN_IF_SET' \
  --silent --show-error --fail
```

To ingest+process from a saved file on the server:
```bash
/usr/bin/curl -X POST https://yourhost.com/API/ContentEngine/ingestScanner \
  -H 'Content-Type: application/json' \
  -d @/home/USER/daily_gainers.json
/usr/bin/curl -X POST https://yourhost.com/API/ContentEngine/processIngest/123
```

CLI smoke test: `php spark content:ingest-sample` (uses `writable/samples/daily_gainers.json`).
