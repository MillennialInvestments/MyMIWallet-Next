# Chat Port Contamination Audit

## Objective
Prove why chat runtime still attempts/contends with port `8500` and identify contamination vectors.

## Evidence Collected
- Repo scan confirms explicit bridge ownership of 8500 in AIOPS startup and bridge code:
  - `aiops/start-aiops.sh` launches `bridge-8500.js`.
  - `aiops/bridge-8500.js` defaults to `process.env.BRIDGE_PORT || 8500`.
  - `aiops/bin/n8n-start-safe.sh` defaults `BRIDGE_PORT=8500` and contains owner-classification logic for that port.
- Historical runtime logs show repeated 8500 binding collisions:
  - `aiops/logs/bridge.log` includes `EADDRINUSE ... 127.0.0.1:8500`.
  - `aiops/logs/n8n.log` shows repeated “port 8500 is already in use”.
- Chat subsystem now pinned to `8300` from `chat/.env` and guarded at runtime/start script.

## Runtime Commands Executed
- `rg -n "8500|PORT|BRIDGE_PORT|dotenv\.config\(|process\.env\.PORT|chat-start-safe" chat aiops app config scripts docs/_aiops -S -g '!**/node_modules/**' -g '!**/public/assets/**'`
- `ps aux | grep node | grep -v grep`
- `env | grep PORT`
- `lsof -i :8500` *(not available in environment)*
- `lsof -i :8300` *(not available in environment)*

## Findings
1. Port `8500` is intentionally reserved by AIOPS bridge/n8n flows; contamination is caused by overlapping ownership and startup ordering, not by chat default config.
2. Chat had soft/default port resolution previously; now hardened with `.env` authority and startup/runtime fatal guard if `PORT=8500`.
3. Missing `lsof` in this environment prevented process-level socket attribution proof via that utility.

## Root Cause
- Primary: AIOPS bridge and n8n workflows compete for 8500 over time.
- Secondary risk: Any operator/systemd/shell override setting `PORT=8500` could force chat drift unless explicitly blocked.

## Minimal Remediation Scope
- Enforce chat `PORT=8300` and hard fail on `8500`.
- Preserve 8500 reservation for bridge.
- Keep status checks validating both PID and listening port.
