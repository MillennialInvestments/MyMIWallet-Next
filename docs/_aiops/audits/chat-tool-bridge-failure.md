# Chat Tool Bridge Failure Audit

## Objective
Explain why UI can load while tool calls fail with “Could not reach chat service” or tool failure behavior.

## Evidence
- Frontend chat client reports generic reachability failures in catch blocks.
- Tool calls route through chat `/api/chat` with tool payload, then proxy to CI4 endpoint (`/API/Chat/tool`).
- Existing behavior returned generic “Tool call failed” without structured diagnostics.

## Runtime Path
1. Browser → `POST /api/chat` (chat service)
2. Chat service identifies tool-mode payload
3. Chat service proxy → CI4 `CI4_TOOL_ENDPOINT`
4. Failure in upstream call bubbles to UI

## Confirmed Gaps (pre-fix)
- No structured tool-failure payload for actionable client diagnostics.
- Tool bridge telemetry missing (latency + payload bytes + tool name).
- Error log persistence not guaranteed under `writable/logs/chat`.

## Remediations Implemented
- Structured error response with fields: `code`, `status`, `tool`, `latency_ms`, `payload_bytes`, `detail`.
- Tool bridge telemetry logged on success/failure.
- Chat error logs now persist to `writable/logs/chat/chat-errors.log`.

## Runtime Commands Executed
- `rg -n "Could not reach chat service|Tool call failed|/api/chat|tool" chat/public/app.js chat/public/index.html -S`
