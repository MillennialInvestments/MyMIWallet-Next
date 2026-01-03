# CI4 API Contracts for Mobile

This file maps mobile screens to CI4 endpoints under `app/Modules/APIs/Controllers`. All paths assume `MYMI_API_BASE_URL=https://www.mymiwallet.com/index.php` and are written without trailing slash.

## Mobile API Map

| Screen | Endpoint | Method | Auth | Caching |
| --- | --- | --- | --- | --- |
| Health/Debug | `/API/Health` | GET | No | Safe to cache 30s client-side. |
| Dashboard (summary cards) | `/API/Budget/apiBudgetData?from=YYYY-MM-DD&to=YYYY-MM-DD` | GET | Yes (session today → convert to bearer) | CI4 memoizes via `rememberUserData`; client may cache 60s. |
| Dashboard (available cash) | `/API/Budget/apiAvailableData?from=YYYY-MM-DD&to=YYYY-MM-DD` | GET | Yes | Same as above. |
| Budget detail | `/API/Budget/apiCreditData` | GET | Yes | Same as above. |
| Budget repayment plan | `/API/Budget/apiRepaymentSummary?strategy=avalanche|snowball` | GET | Yes | Same as above. |
| Watchlist search | `/API/Investments/searchTickers?query=AAPL&limit=10` | GET | Yes (for user personalization) | Cache 5–10m per query client-side; CI4 caches Alpha Vantage fallback for 5m. |
| Alerts — news per ticker | `/API/Alerts/fetchMarketAuxNews/{ticker}` | GET | Yes (cron-key enforced for email pulls only) | Cache 5m client-side. |
| Marketing summaries | `/API/Marketing/fetchGeneratedSummariesJson` | GET | No (read-only) | Cache 5m client-side; consider CDN cache. |
| Health ping (settings) | `/API/Health` | GET | No | Cache 30s. |

## Request/Response examples

### Health
```http
GET /index.php/API/Health
```
Response:
```json
{ "status": "ok", "db": "up", "time": "2025-06-17T10:00:00Z" }
```

### Budget summary
```http
GET /index.php/API/Budget/apiBudgetData?from=2025-06-01&to=2025-06-30
Authorization: Bearer <token>
```
Response (simplified):
```json
{
  "status": "success",
  "data": {
    "income": 7200,
    "expenses": 5100,
    "savingsRate": 0.29,
    "topCategories": [
      {"name": "Housing", "amount": 1800},
      {"name": "Food", "amount": 650}
    ]
  },
  "fromCache": false
}
```

### Available balance snapshot
```http
GET /index.php/API/Budget/apiAvailableData?from=2025-06-10&to=2025-06-24
Authorization: Bearer <token>
```
Response:
```json
{
  "status": "success",
  "data": { "cashAvailable": 2300.45, "asOf": "2025-06-24" },
  "fromCache": true
}
```

### Credit/repayment breakdown
```http
GET /index.php/API/Budget/apiRepaymentSummary?strategy=avalanche
Authorization: Bearer <token>
```
Response:
```json
{
  "status": "success",
  "data": {
    "strategy": "avalanche",
    "nextPayoff": {"name": "Card A", "rate": 0.249, "payoffDate": "2026-01-15"},
    "schedule": [ {"month": "2025-07", "payment": 620} ]
  }
}
```

### Ticker search (watchlist add flow)
```http
GET /index.php/API/Investments/searchTickers?query=MSFT&limit=10
Authorization: Bearer <token>
```
Response:
```json
{
  "status": "success",
  "data": [
    {"symbol": "MSFT", "name": "Microsoft Corp", "exchange": "NASDAQ", "currency": "USD", "source": "local"},
    {"symbol": "MSFT34", "name": "Microsoft (Brazil ADR)", "exchange": "SA", "currency": "BRL", "source": "alpha"}
  ]
}
```

### Alerts news per ticker
```http
GET /index.php/API/Alerts/fetchMarketAuxNews/MSFT
Authorization: Bearer <token>
```
Response:
```json
{
  "status": "success",
  "news": [
    {"title": "MSFT hits new high", "summary": "...", "url": "https://...", "published_at": "2025-06-17 09:30"}
  ]
}
```

### Marketing summaries
```http
GET /index.php/API/Marketing/fetchGeneratedSummariesJson
```
Response:
```json
{
  "status": "success",
  "summaries": [
    {
      "id": 123,
      "title": "AI stocks rally",
      "summary": "NVIDIA and peers led tech higher...",
      "keywords": "ai,semis,earnings",
      "cta": "Read full report",
      "created_at": "2025-06-17 07:00:00"
    }
  ]
}
```

## Error formats
- Budget controllers return `{ "status": "error", "message": "...", "asOf": "timestamp" }` with `401` for unauthenticated, `500` for server errors.
- Marketing JSON helpers return `{ "status": "error", "message": "..." }` with status code set appropriately.
- Alerts news uses `{ "status": "error", "message": "..." }` on failure.
- For consistency, the SDK normalizes responses into `{ success: boolean, data, error, meta, requestId }` (see `packages/mymi-sdk`).

## Missing APIs needed for MVP
The CI4 API currently lacks token-based auth/login, user profile fetch, watchlist CRUD, and a user-specific alerts feed. Proposed stubs are in `docs/mobile/replit/missing_endpoints.md` and `docs/mobile/replit/patches/`.
