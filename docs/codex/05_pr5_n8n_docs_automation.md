# PR5 — n8n Integration + Docs Automation Outputs

## Objective
Make n8n the primary doc/report generator and work order producer.

## 1) CI4 endpoints for n8n
Add endpoints (admin-only or signature protected):
- GET /API/Ops/errors/top?days=1
- GET /API/Ops/routes/audit
- GET /API/Ops/docs/inventory
- GET /API/Ops/queue/status
- POST /API/Ops/docs/write  (optional: CI4 writes docs based on payload)

## 2) Docs output conventions
n8n will write files into:
- /docs/ops/daily_health/YYYY-MM-DD.md
- /docs/ops/errors/YYYY-MM-DD.md
- /docs/ops/scorecards/security_YYYY-MM-DD.md
- /docs/ops/scorecards/perf_YYYY-MM-DD.md
- /docs/codex/work_orders/work_order_YYYY-MM-DD.md
- /docs/chatgpt/notes/YYYY-MM-DD.md

Create README files in each directory explaining purpose.

## 3) Build /docs/ops/n8n_responsibilities.md
This file defines:
- what n8n owns
- what Codex owns
- what ChatGPT owns
- what chat server owns
- what CI4 owns
- escalation rules and file outputs

Codex must create it (initial version). Later n8n can update it.

## 4) ChatGPT export ingestion scaffolding
Create directories:
- /docs/chatgpt_exports/current/
- /docs/chatgpt_exports/archive/
- /docs/chatgpt_index/

Add a state file:
- /docs/chatgpt_index/state.json

n8n will:
- parse exports
- dedupe by hashing
- write “new since last export” reports
- write missing docs suggestions into /docs/chatgpt_index/missing_docs.md
- generate work orders into /docs/codex/work_orders/

Codex only needs to create directory structure + README + an example parser stub (optional).

## 5) Acceptance Criteria
- n8n can call CI4 endpoints to gather data
- n8n can write docs outputs into repo directories
- n8n can generate Codex work orders in /docs/codex/work_orders/
