# AIOps + Chat Runtime Architecture

## Process ownership
- **AIOps owns n8n and bridge-8500**. All n8n starts must flow through `aiops/bin/n8n-start-safe.sh`.
- **Chat owns only chat/server.js** and must not start n8n or bind port 8500.

## Startup flow
1. `aiops/start-aiops.sh` loads env, calls canonical n8n launcher, then starts `aiops/bridge-8500.js`.
2. `aiops/bin/n8n-start-safe.sh` enforces lock + stale PID cleanup + port checks.
3. `chat/start-chat.sh` starts `chat/server.js` with runtime PID at `chat/runtime/chat.pid`.

## Port boundaries
- `n8n`: `N8N_PORT` (default 5678)
- `AIOps bridge`: `BRIDGE_PORT` (default 8500)
- `Chat`: `PORT` (default 8300)

### Safety rules implemented
- n8n launcher exits without restart when:
  - lock exists (active concurrent launch)
  - bridge port 8500 is already listening
  - n8n port is already listening
- stale PID files are removed before launch.
- no internal restart loops in startup scripts.

## Runtime directories
- `aiops/runtime/`
  - `n8n.pid`
  - `bridge.pid`
  - `n8n.start.lock/` (directory lock)
- `chat/runtime/`
  - `chat.pid`

These are ignored in git and recreated at startup.

## Failure modes and recovery behavior
- Missing n8n binary: launcher logs machine-readable JSON and exits non-zero.
- Port conflict: launcher logs warning JSON and exits zero (safe no-op).
- Stale PID files: removed automatically.
- Bridge process receives SIGTERM/SIGINT: graceful close, forced exit timeout at 2s.
- Chat stop script removes stale PID and exits cleanly.


## Canonical n8n environment invariants
- Canonical env file: `aiops/.env.aiops`.
- `N8N_ENCRYPTION_KEY` and `N8N_USER_MANAGEMENT_JWT_SECRET` are loaded from `.env.aiops` by:
  - `aiops/start-aiops.sh`
  - `aiops/start-n8n.sh`
  - `aiops/bin/n8n-start-safe.sh`
- If `.env.aiops` is missing, `n8n-start-safe.sh` generates it once with secure random values and persists it.
- Launchers never rotate these keys at runtime; they are reused on every restart.

## Port 8500 ownership detection
- Port ownership is determined from process command line (`ps -p <pid> -o args=`), not process name alone.
- Owner handling:
  - `n8n` owns 8500: treat as already running and exit cleanly.
  - `bridge` owns 8500: block n8n launch.
  - unknown process owns 8500: mark degraded/skip launch without killing the process.
- Same owner classification is available in `SubSystemManager::isPortOccupied()` for Spark/API status payloads.
