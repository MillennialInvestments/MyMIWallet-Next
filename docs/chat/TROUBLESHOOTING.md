# Chat Troubleshooting

## Common startup errors

### ERR_MODULE_NOT_FOUND from `../tools/` imports
- **Cause:** Node only searches parent directories of the importing file. `tools/ai-cost-controls` will not reuse `chat/node_modules`, so installing `mysql2` inside `chat` alone leaves the `tools` package unresolved.
- **Fix:**
  - Install the tool’s dependencies: `(cd ~/mymiwallet/site/current/tools/ai-cost-controls && npm ci)`.
  - If the module cache looks stale, remove and reinstall: `rm -rf ~/mymiwallet/site/current/tools/ai-cost-controls/node_modules && (cd ~/mymiwallet/site/current/tools/ai-cost-controls && npm ci)`.
  - Confirm `mysql2` is present under `tools/ai-cost-controls/node_modules`.

### ERR_MODULE_NOT_FOUND: Cannot find package 'mysql2'
- **Cause:** `tools/ai-cost-controls` relies on `mysql2`; missing installs in either `chat` or `tools/ai-cost-controls` can surface during startup.
- **Fix:**
  - Run `cd ~/mymiwallet/site/current/chat && npm ci` and `cd ~/mymiwallet/site/current/tools/ai-cost-controls && npm ci` after pulling.
  - Confirm `mysql2` and `jsonwebtoken` are listed under `dependencies` in `chat/package.json`, and `mysql2` exists in `tools/ai-cost-controls/package.json`.

### Cost controls unavailable
- **Symptoms:** Logs contain `Cost controls module unavailable` or `Cost control initialization failed`.
- **Fix:**
  - Ensure `tools/ai-cost-controls` files exist and dependencies are installed (`npm ci`).
  - Check `config/ai-cost-controls.json` path and permissions.
  - Chat now continues to run even if cost controls fail to load; per-user usage limits will be temporarily skipped.

### ERR_ERL_UNEXPECTED_X_FORWARDED_FOR
- **Cause:** When Nginx or another reverse proxy is in front of chat, Express must trust the proxy to read `X-Forwarded-For`. Without it, `express-rate-limit` may treat the header as spoofed and throw `ERR_ERL_UNEXPECTED_X_FORWARDED_FOR`.
- **Fix:** Add `app.set('trust proxy', 1);` immediately after `const app = express();` in `chat/server.js` so Express trusts the first proxy hop (single Nginx).
- **Verify:**
  - Restart chat: `cd ~/mymiwallet/site/current/chat && ./stop-chat.sh && ./start-chat.sh`
  - Health check: `curl -sS https://chat.mymiwallet.com/health`
  - Access `/` in a browser and tail logs: `tail -f logs/chat.log | grep -i forwarded`
  - Confirm no `ERR_ERL_UNEXPECTED_X_FORWARDED_FOR` errors appear after requests.

## Verification checklist
- `./stop-chat.sh && ./start-chat.sh`
- `lsof -iTCP:8500 -sTCP:LISTEN -n -P`
- `curl -sS https://chat.mymiwallet.com/health`
