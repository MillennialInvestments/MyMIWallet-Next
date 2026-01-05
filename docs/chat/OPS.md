# Chat Operations

## Start/stop
- **Start:** `cd ~/mymiwallet/site/current/chat && ./start-chat.sh`
- **Stop:** `cd ~/mymiwallet/site/current/chat && ./stop-chat.sh`
- PID file: `chat/chat.pid`

**After every pull/deploy:** `cd ~/mymiwallet/site/current/chat && npm ci`

## Logs
- Chat runtime: `tail -n 200 chat/logs/chat.log`
- CI4 audit table: `SELECT * FROM bf_chat_tool_runs ORDER BY id DESC LIMIT 20;`
- Error logs consumed by management UI: `bf_error_logs`

## Health and ports
- Health check: `curl -sS https://chat.mymiwallet.com/health | jq .`
- Port check: `lsof -iTCP:8500 -sTCP:LISTEN -n -P`
- HTTP routes: `curl -I https://chat.mymiwallet.com/m` and `curl -I https://chat.mymiwallet.com/u`

## Rate limiting and cost controls
- Rate limit: 60 req/min enforced by Express (`express-rate-limit`).
- Spend caps: `/chat/config/ai-cost-controls.json` + `tools/ai-cost-controls` provider; budget alerts email `ALERT_EMAIL_TO`.

## Cost-control troubleshooting
- 429 errors with `Monthly AI budget exhausted` → check `chat/usage.json` and `config/ai-cost-controls.json`.
- Per-user caps use `createCostControls()` and `resolveActor()`; inspect SSO claims if unexpected.

## Quick verification (CI4 proxy)
```bash
# Profile passthrough
curl -i -sS https://chat.mymiwallet.com/api/me

# Tool call (ops status)
curl -sS -X POST https://chat.mymiwallet.com/api/chat \
  -H 'Content-Type: application/json' \
  -d '{"mode":"management","tool":"ops_status"}' | jq .
```
