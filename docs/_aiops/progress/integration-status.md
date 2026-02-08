# Integration Status

| Subsystem | Status | Last Verified | Known Issues | Owner |
|---|---|---|---|---|
| chat | degraded → hardening in-progress | 2026-02-08 | Historical port drift risk from env override now blocked; upstream CI4 tool endpoint dependency remains | Codex |
| aiops bridge | degraded | 2026-02-08 | Port 8500 ownership contention observed in historical logs | AIOPS |
| n8n | degraded | 2026-02-08 | Repeated “port 8500 in use” in runtime logs | AIOPS |
| log aggregation | in-progress | 2026-02-08 | Legacy sources not yet normalized under writable/logs | Codex + AIOPS |
| dashboard visibility | in-progress | 2026-02-08 | New chat ops visibility tiles added; broader platform dashboard still pending | Codex |

## Rule of Truth
Nothing is considered working unless:
1. Health/status command reports healthy.
2. Runtime logs are fresh and persisted in writable logs.
3. Operational command output matches observed runtime behavior.
