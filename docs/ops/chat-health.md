# Chat Health (chat.mymiwallet.com)

## Overview
This document verifies the internal chat service configuration and provides a health checklist for operators.

- Service folder: `chat/` (Node.js Express server).
- Runtime: `chat/server.js` with env from `chat/.env` templates.
- Upstream API: MyMI Wallet CI4 `/API/Chat/*` endpoints.

## Required environment variables
Source of truth: `chat/server.js` and `.env` templates.

### SSO / JWT
- `SSO_ENABLED`
- `SSO_JWT_ISSUER`
- `SSO_JWT_AUDIENCE`
- `SSO_JWT_SECRET`

### Upstream CI4 API
- `CI4_BASE_URL`
- `CI4_ME_ENDPOINT` (defaults to `/API/Chat/me`)
- `CI4_TOOL_ENDPOINT` (defaults to `/API/Chat/tool`)
- `CI4_TIMEOUT_MS`

### Auth & basic access
- `BASIC_AUTH_ACTIVE`
- `BASIC_AUTH_USER`
- `BASIC_AUTH_PASS`

### Provider & usage
- `OPENAI_API_KEY`
- `OPENAI_MODEL`
- `OLLAMA_BASE_URL`
- `MYMI_USAGE_WEBHOOK_URL`
- `MYMI_USAGE_WEBHOOK_SECRET`

### Service routing
- `APP_BASE_URL`
- `CHAT_BASE_PATH`
- `PORT`
- `BIND_HOST`

## Rate limiting & request caps
- `express-rate-limit` is enabled in `chat/server.js` with:
  - `windowMs: 60 * 1000`
  - `max: 60`
  - per-IP keying using `req.ip`
- Response: `Too many requests, please slow down.`

## Logging
- Log file: `chat/logs/chat.log`
- Errors are appended via `appendLog()` in `chat/server.js`.
- Optional DB logging: `MYMI_USAGE_WEBHOOK_URL` can forward usage to CI4.

## Health checks
### Process check
```bash
ps aux | grep "node .*chat/server.js"
```

### Port check
```bash
lsof -i :8300
```

### Health endpoint
```bash
curl -s https://chat.mymiwallet.com/health
```
Expected JSON: `{"status":"ok","enabled":true}` or `enabled:false` if disabled.

### Upstream connectivity
```bash
curl -s https://www.mymiwallet.com/API/Chat/me
curl -s https://www.mymiwallet.com/API/Chat/tool -X POST -H 'Content-Type: application/json' -d '{"tool":"health","message":"ping"}'
```

## Auth check
1. Confirm `SSO_ENABLED=true` for JWT flows.
2. Validate JWT issuer + audience against MyMI Wallet SSO issuer.
3. If SSO fails, toggle `SSO_ENABLED=false` and use Basic Auth (`/m`).

## Failure modes & response
| Symptom | Likely cause | Response |
| --- | --- | --- |
| 401 on `/api/me` | Invalid JWT or missing `SSO_JWT_SECRET` | Verify SSO env variables and token issuer/audience. |
| 502 on `/api/chat` | CI4 upstream down | Check MyMI Wallet health endpoints + CI4 base URL. |
| 429 responses | Rate limit or budget cap hit | Check usage budget, adjust plan caps or global budget. |
| 503 chat disabled | `config.runtime.json` set `enabled=false` | Toggle in `/Management/Chat/Usage` or edit runtime config. |

## CI validation
Run the environment template check:
```bash
scripts/ci/check-chat-env.sh
```

Expected output:
```
Chat env templates validated.
```
