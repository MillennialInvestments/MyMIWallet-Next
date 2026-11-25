# MYMI-XCHAIN-001 Error Ledger

Columns:
`#` | Time (UTC) | Wave/Task | Class | Command | Symptom | Suspected Cause | Resolution Status

Class values: `CORRECTABLE_LOCAL`, `RETRYABLE_TRANSIENT`, `BLOCKED_SAFETY`, `EXPECTED_GATE`, `FAILED`.

| # | Time (UTC) | Wave/Task | Class | Command | Symptom | Suspected Cause | Resolution Status |
|---|------------|-----------|-------|---------|---------|-----------------|-------------------|
| 1 | 2026-11-25 22:48:00 | W0 / MCP | EXPECTED_GATE | mcp tool `chatroom_checkin` | Tool `chatroom_checkin` not in current tbi-aiops MCP schema | Remote chatroom endpoint not exposed as registered MCP tool in current daemon; logged as expected capability gate | LOGGED_OPEN |
