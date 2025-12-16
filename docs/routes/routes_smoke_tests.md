# Routes Smoke Tests

Use these curl snippets to validate routing after changes. Replace `{id}` or tokens as needed.

## API Core
- `curl -i https://<host>/API/Health`
  - Expect 200 JSON `{ "status": "ok" ... }`.
- `curl -i -X POST https://<host>/API/Status`
  - Expect 200 with status payload.

## Management (cronKey protected)
- `curl -i -H "X-CRON-Key: $CRON_SHARED_KEY" https://<host>/API/Management/Run-CRON-Tasks`
  - Expect 200 JSON success; 403 if key missing.
- `curl -i -H "X-CRON-Key: $CRON_SHARED_KEY" https://<host>/API/Management/distributeTodaysNewsContent`
  - Expect 200 JSON summary of distribution.
- `curl -i -H "X-CRON-Key: $CRON_SHARED_KEY" https://<host>/API/Management/processAllTradeAlerts`
  - Expect 200 JSON; ensure trade alerts are processed.

## Alerts
- `curl -i -X POST https://<host>/API/Alerts/getFilteredAlerts`
  - Expect 200 JSON list (auth/filters may be required).
- `curl -i https://<host>/API/Alerts/fetchMarketAuxNews/AAPL`
  - Expect 200 JSON news set.

## Marketing
- `curl -i https://<host>/API/Marketing/generateDailyContentDigest`
  - Expect 200 JSON digest summary (may run async).
- `curl -i https://<host>/API/Marketing/fetchGeneratedSummaries`
  - Expect 200 JSON summaries array.

## Investments
- `curl -i https://<host>/API/Investments`
  - Expect 200 HTML/JSON depending on controller rendering (index).
- `curl -i https://<host>/API/Investments/getInvestmentData/123`
  - Expect 200 JSON for investment record or 500/404 on missing.
- `curl -i https://<host>/API/Investments/news`
  - Expect 200 JSON list of news rows.
- `curl -i -X POST https://<host>/API/Investments/validateSymbol -d "symbol=AAPL"`
  - Expect 200 JSON with validation result.

## Support/Error Fallbacks
- `curl -i https://<host>/Support/Support/kb`
  - Expect 200 knowledge base index.

### Common Failure Causes
- Missing `X-CRON-Key` header on cron-protected endpoints.
- CSRF protection on POST routes when not using proper tokens.
- Auth filters requiring logged-in sessions for certain endpoints.