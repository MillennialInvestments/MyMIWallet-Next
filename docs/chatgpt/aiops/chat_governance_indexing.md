# Chat Governance Indexing

## Overview
`aiops:chat-governance-index` scans archived ChatGPT chat markdown files under `docs/chatgpt/chats/**` and produces reproducible governance tracking outputs. The docs remain the source of truth; CSV/JSON outputs and database rows are derived from the archive content.

## What the Command Does
- Scans `docs/chatgpt/chats/**.md` for archived chat files.
- Detects completion status for Steps 1a–7 using deterministic rules.
- Writes CSV and JSON metrics outputs (optional).
- Syncs the same data into MySQL tables (optional).

## Output Locations
- CSV tracker: `docs/chatgpt/aiops/chat_step_tracker.csv`
- JSON metrics: `docs/chatgpt/aiops/chat_metrics.json`

## Database Tables
- `bf_chat_archives`
- `bf_chat_steps`

## Step Detection Rules (Summary)
- **Step 1a:** Archive exists → complete.
- **Step 2a:** `Step 2a`, `AIOps Verification`, or `Verification & Planning`.
- **Step 2b:** `Step 2b` or `AIOps Execution` **and** `AIOPS EXECUTION REQUEST`.
- **Step 3:** `Step 3`, `CODEX HANDOFF REQUEST`, or `Codex Execution`.
- **Step 4:** `Database Impact` + table/migration mention. If `Migrations Needed: No` → `not_required`.
- **Step 5:** `Manual Requirements` or `Human-Required`.
- **Step 6:** `Validation Status` with `PASSED` or `FAILED`.
- **Step 7:** `Rollback`, `Recovery`, or `Rollback triggered`.

## Example Usage
```bash
php spark aiops:chat-governance-index --write-files=1 --db-sync=0
php spark aiops:chat-governance-index --write-files=1 --db-sync=1 --metrics=1
php spark aiops:chat-governance-index --path=docs/chatgpt/chats --limit=100
```

## Safety Constraints
- Read-only with respect to archived chats: the command does **not** modify archive markdown.
- CSV/JSON and DB outputs are derived, reproducible artifacts.
- No workers or background processes are created.

## Validation Checklist
- Run: `php spark aiops:chat-governance-index --write-files=1 --db-sync=0`
- Confirm `docs/chatgpt/aiops/chat_step_tracker.csv` created/updated.
- Confirm `docs/chatgpt/aiops/chat_metrics.json` created/updated.
- If DB sync is enabled, confirm `bf_chat_archives` and `bf_chat_steps` populated.
- Confirm the command appears in `php spark` list.
