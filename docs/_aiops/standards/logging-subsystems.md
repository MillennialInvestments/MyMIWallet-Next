# Logging Standards — Subsystems

## Single Source of Truth
All subsystem logs must persist under:

`writable/logs/<subsystem>/`

Examples:
- `writable/logs/chat/chat.log`
- `writable/logs/chat/chat-errors.log`
- `writable/logs/aiops/*.log`
- `writable/logs/n8n/*.log`

## Chat Logging Rules
1. `chat:logs` reads persisted files from `writable/logs/chat/*`.
2. Runtime scripts must append lifecycle events into writable log files.
3. Node runtime logs must stream/append into writable path (not ephemeral runtime-only path).
4. Logs should be timestamped in ISO8601 where practical.

## Aggregation Requirements
- `logs:summarize-all` consumes `writable/logs/**` only.
- Missing subsystems are explicitly listed as missing sources.
- Daily markdown summaries are generated in `docs/_aiops/logs/`.

## Proposal Status
- This document defines policy and expected behavior; additional subsystem adapters may still be required for legacy log locations.
