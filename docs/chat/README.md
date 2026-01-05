# MyMI Chat Overview

This chat service powers chat.mymiwallet.com and now supports dual-mode conversations:
- **Management mode (/m):** Ops/admin tooling for CI4 controls and observability.
- **User mode (/u):** Budgeting, portfolio answers, premium trade alerts, and market Q&A.

## Code locations
- Node application: `/chat` (Express server, public UI, cost controls)
- Front-end assets: `/chat/public` (`index.html`, `app.js`, `styles.css`)
- CI4 controller + routes: `app/Modules/APIs/Controllers/ChatController.php`, `app/Config/Routes.php`
- Audit model: `app/Models/ChatToolRunModel.php`
- Audit migration: `app/Database/Migrations/2026-01-15-000100_CreateChatToolRuns.php`

## Start/stop and health
- Start: `cd ~/mymiwallet/site/current/chat && ./start-chat.sh`
- Stop: `cd ~/mymiwallet/site/current/chat && ./stop-chat.sh`
- PID file: `chat/chat.pid`
- Logs: `chat/logs/chat.log`
- Health check: `curl -sS https://chat.mymiwallet.com/health | jq .`

## Key URLs
- User chat: `https://chat.mymiwallet.com/u`
- Management chat: `https://chat.mymiwallet.com/m`
- Root splash: `https://chat.mymiwallet.com/`
- API: `https://chat.mymiwallet.com/api/chat`
- Profile proxy: `https://chat.mymiwallet.com/api/me`
- Health: `https://chat.mymiwallet.com/health`

## Debugging logs
- Tail runtime logs: `tail -n 200 chat/logs/chat.log`
- CI4 tool runs (audit): `SELECT * FROM bf_chat_tool_runs ORDER BY id DESC LIMIT 20;`
- Error log feed (management quick action): pulls from `bf_error_logs`

## Verification checklist (copy/paste)
```bash
# Chat process + port
lsof -iTCP:8500 -sTCP:LISTEN -n -P

# Health
curl -sS https://chat.mymiwallet.com/health | jq .

# Routes
curl -I https://chat.mymiwallet.com/m
curl -I https://chat.mymiwallet.com/u

# API
curl -sS -X POST https://chat.mymiwallet.com/api/chat \
  -H 'Content-Type: application/json' \
  -d '{"messages":[{"role":"user","content":"ping"}]}' | jq .
```
