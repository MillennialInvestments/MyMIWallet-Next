# MyMI Control Plane — Master Plan (Codex Execution Guide)

## Goal
Build a CI4 “Control Plane” that makes n8n the primary ops engineer and documentation generator, while Codex becomes mostly a code executor/reviewer. The system must:

- Centralize: jobs, queue, runs, runtime config, AI usage
- Provide: admin UI + API endpoints for orchestration
- Allow: chat.mymiwallet.com to dispatch allowlisted commands/jobs into CI4
- Enable: n8n to generate docs/work orders and push outputs into /docs/
- Minimize: Codex workload by making the platform self-describing and self-iterating

## Constraints
- DreamHost VPS, no sudo
- CI4 (Bonfire conventions acceptable)
- Must be secure (RBAC + signed requests + allowlists)
- Must be maintainable (modules, services, models, migrations)
- Must log everything (bf_error_logs + job run logs + audit)

## High Level Architecture
### Pillars
1) Teddy = Operator (UI + chat console)
2) Codex = Code executor + PR submitter
3) n8n (aiops.mymiwallet.com) = internal systems engineer + orchestration + doc generation
4) chat.mymiwallet.com = command console + usage/budgeting + “operator interface”

### Core Components to Build
1) CI4 Management Module: Ops Dashboard
2) CI4 API Module: Ops endpoints (command + job queue + status)
3) Queue + Worker (spark command): ops:work
4) Runtime Config store (DB + Redis caching)
5) AI usage ingestion (chat webhook → CI4 table)
6) Docs collaboration file structure:
   - /docs/ops/ (reports)
   - /docs/codex/ (work orders Codex executes)
   - /docs/chatgpt/ (analysis prompts + notes)
   - /docs/chatgpt_exports/ (monthly export dumps)
   - /docs/chatgpt_index/ (generated index artifacts)

## PR/Stage Plan
### PR1 — Foundations (DB + models + basic ops API)
- Migrations: jobs, queue, runs, runtime_config, ai_usage
- Models: OpsModel + RuntimeConfigModel
- API endpoints: /API/Ops/status, /API/Ops/dispatch
- Seed default jobs list

### PR2 — Worker + job handler registry
- spark command: ops:work
- library: OpsJobs registry
- locking + retries + run tracking + memory peak logging

### PR3 — Management UI (Control Plane dashboard)
- Controller: Management/OpsController
- Views: Management/Ops/index.php (job buttons, queue depth, last runs, usage tiles)
- AJAX endpoints to refresh status

### PR4 — Chat command bridge + signatures
- API: /API/Ops/command (allowlist)
- HMAC signature verify (timestamp + replay protection)
- chat server: /api/command endpoint that calls CI4

### PR5 — n8n integration + doc automation outputs
- CI4 endpoints for n8n to pull:
  - /API/Ops/docs/inventory
  - /API/Ops/errors/top
  - /API/Ops/routes/audit
- Write docs outputs from n8n into:
  - /docs/ops/
  - /docs/codex/work_orders/
  - /docs/chatgpt/

## Acceptance Criteria
- I can run jobs from:
  1) CI4 Ops dashboard
  2) chat.mymiwallet.com via allowlisted commands
  3) n8n via HTTP requests
- Queue processes reliably, respects locks, retries, and records runs
- Runtime config can be changed without redeploy (DB-backed, cached)
- n8n can generate “work orders” into docs for Codex to execute
- All actions are audited and visible in Ops dashboard

## Definition of Done
- All tables created + seeded
- Ops UI works in Management
- Worker processes queue
- Chat commands dispatch jobs
- n8n has stable endpoints to orchestrate and generate docs
- Everything is safe by default (RBAC + allowlists + signatures)
