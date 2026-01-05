# Chat Troubleshooting

## Common startup errors

### ERR_MODULE_NOT_FOUND: Cannot find package 'mysql2'
- **Cause:** `tools/ai-cost-controls` relies on `mysql2`, which must be installed in the `chat` workspace.
- **Fix:**
  - Run `cd ~/mymiwallet/site/current/chat && npm ci` after pulling.
  - Confirm `mysql2` and `jsonwebtoken` are listed under `dependencies` in `chat/package.json`.

### Cost controls unavailable
- **Symptoms:** Logs contain `Cost controls module unavailable` or `Cost control initialization failed`.
- **Fix:**
  - Ensure `tools/ai-cost-controls` files exist and dependencies are installed (`npm ci`).
  - Check `config/ai-cost-controls.json` path and permissions.
  - Chat now continues to run even if cost controls fail to load; per-user usage limits will be temporarily skipped.

## Verification checklist
- `./stop-chat.sh && ./start-chat.sh`
- `lsof -iTCP:8500 -sTCP:LISTEN -n -P`
- `curl -sS https://chat.mymiwallet.com/health`
