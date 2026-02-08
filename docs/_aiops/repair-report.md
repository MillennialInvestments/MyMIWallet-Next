# AIOps + Chat Repair Report

## Discovery
- Scanned `aiops/`, `chat/`, `app/Commands`, `app/Modules/APIs/Controllers`, `app/Modules/Management`, and `app/Config/Routes.php`.
- Launch/orchestration signatures found include `nohup` starts in `aiops/start-aiops.sh` and `chat/start-chat.sh`.
- Existing n8n wrappers existed; chat did not have safe wrappers under `chat/bin`.

## Issues Found
1. Chat startup lacked lock-file + status-json runtime contract.
2. Management dashboard lacked subsystem control tile/API orchestration endpoint pair.
3. Subsystem controls were fragmented and not unified behind Spark commands + shared manager.

## Changes Applied
- Added `app/Services/SubSystemManager.php` for status/start/stop/restart/log-tail and lock/pid/status handling.
- Added Spark command suites for AIOps, Chat, and cross-subsystem Ops.
- Added safe chat wrappers (`chat/bin/chat-start-safe.sh`, `chat/bin/chat-stop-safe.sh`) and routed `start-chat.sh` / `stop-chat.sh` through them.
- Normalized runtime outputs to pid/lock/log/status JSON in `aiops/runtime` + `chat/runtime`.
- Added management API endpoints for subsystem status/actions and dashboard tile controls.
- Added operator runbook at `docs/ops/subsystems.md`.

## Discovery command artifacts
- `/tmp/aiops-discovery/n8n.txt`
- `/tmp/aiops-discovery/bridge8500.txt`
- `/tmp/aiops-discovery/exec.txt`
- `/tmp/aiops-discovery/orchestration.txt`
