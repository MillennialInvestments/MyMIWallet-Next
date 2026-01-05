# CI4 Integration

## Controllers and routes
- Controller: `app/Modules/APIs/Controllers/ChatController.php`
- Routes: `app/Config/Routes.php`
  - `GET /API/Chat/me` → `ChatController::me`
  - `POST /API/Chat/tool` → `ChatController::tool`

## Response schemas
- `GET /API/Chat/me`
```json
{
  "status": "success",
  "data": {
    "userId": 123,
    "roles": ["user", "ops"],
    "tier": "PREMIUM"
  }
}
```
- `POST /API/Chat/tool`
```json
{
  "status": "success",
  "data": { /* tool-specific payload */ },
  "meta": { "mode": "user", "tool": "budget_snapshot" }
}
```
Errors return `{"status":"error","message":"..."}` with 4xx/5xx codes.

## RBAC and tier checks
- Management mode requires `admin`, `ops`, or `manager` role (`ChatController::hasManagementRole`).
- Premium tool `trade_alerts` requires tier `BASIC`, `PREMIUM`, or `GOLD`.
- Unauthorized or insufficient tier → 403 and audit row with `status=error`.

## Tool registry and payloads
`POST /API/Chat/tool` expects JSON body:
```json
{
  "mode": "management|user",        // default user
  "tool": "budget_snapshot|trade_alerts|ops_status|latest_errors|portfolio_overview|run_cron|market_question",
  "message": "optional free text",
  "context": { "ticker": "AAPL", "range": "today" }
}
```
Tool responses:
- `budget_snapshot`: `{ user_id, generated_at, totals:{accounts,cash,invested,notes} }`
- `portfolio_overview`: `{ user_id, positions:[{ticker,shares,avg_cost}], notes, as_of }`
- `trade_alerts` (premium): `{ user_id, alerts:[{ticker,direction,entry_price,created_on}], notes, as_of }`
- `market_question`: `{ prompt, ticker, range, status, generated_at }`
- `ops_status` (management): `{ queue_counts:{pending,running,completed,failed}, checked_at }`
- `latest_errors` (management): `{ errors:[{level,message,created_at}], generated, notes }`
- `run_cron` (management): `{ status:"queued", message, requested_at }`

## Audit logging
- Table: `bf_chat_tool_runs`
- Migration: `app/Database/Migrations/2026-01-15-000100_CreateChatToolRuns.php`
- Model: `app/Models/ChatToolRunModel.php`
- Inserted on every `ChatController::tool` invocation (success or failure):
  - `user_id`, `mode`, `tool`, `request_json`, `response_json`, `status`, timestamps
- Query example: `SELECT mode, tool, status, created_at FROM bf_chat_tool_runs ORDER BY id DESC LIMIT 25;`

## Expected upstream headers
Node proxy forwards `Authorization` and `Cookie` from `/api/me` and `/api/chat` to CI4. CI4 should rely on existing auth filters (JWT/Session) and does not expose MySQL user data to Node.
