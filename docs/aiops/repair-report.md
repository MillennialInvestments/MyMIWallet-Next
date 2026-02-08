# AIOps + Chat Repair Report

## Validation checklist

### Issues found
- `aiops/bridge-8500.js` was referenced but missing.
- n8n was started from multiple scripts with no canonical lock flow.
- startup scripts used top-level `*.pid` files, increasing stale-state risk.
- previous n8n checks targeted wrong ports and allowed conflicting starts.
- chat `.env.example` defaulted to 8500, which conflicts with AIOps bridge boundary.

### Fixes applied
- Added `aiops/bridge-8500.js` with machine-readable JSON logs and graceful shutdown.
- Added canonical launcher `aiops/bin/n8n-start-safe.sh` with:
  - lock directory guard
  - stale PID cleanup
  - bridge port 8500 conflict prevention
  - n8n port conflict prevention
- Added `aiops/bin/n8n-stop-safe.sh` and rewired `start-n8n.sh`/`stop-n8n.sh`.
- Refactored `start-aiops.sh`/`stop-aiops.sh` to use runtime pid files and canonical launcher.
- Moved chat PID state to `chat/runtime/chat.pid`, updated stop/start scripts.
- Set `chat/.env.example` default PORT to 8300.
- Added gitignore rules for `aiops/runtime` and `chat/runtime`.

### Risks remaining
- Existing external cron or supervisor jobs may still call old ad-hoc commands directly; those should be pointed at canonical scripts.
- If `ss` is unavailable in production shell, port checks need equivalent fallback (`lsof`/`netstat`).

### Manual follow-ups
- Verify production automation (cron, CI deploy hooks, control panel scripts) calls:
  - `aiops/start-aiops.sh`
  - `aiops/stop-aiops.sh`
  - `chat/start-chat.sh`
  - `chat/stop-chat.sh`
- Confirm nginx upstream maps chat to 8300 and bridge remains isolated/internal on 8500.
