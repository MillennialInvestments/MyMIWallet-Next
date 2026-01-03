# n8n responsibilities for the Four-System operating model

This doc is the single source of truth for what n8n owns inside the Four Actors model. n8n acts as the internal expert systems engineer and integrator: it does not change code directly, and it writes its outputs under `docs/` for Codex and ChatGPT to consume. All execution must respect CI4 as the system of record (auth, persistence, feature flags).

## Guardrails

- **Scope:** n8n builds automation, orchestration, and reporting only. No direct DB writes—use CI4 endpoints.
- **Outputs live in `/docs`.** Every workflow writes to the paths listed below so the other actors can pick them up.
- **Cost controls:** Follow the AIOps policy check and budget guardrails documented in `docs/ops/aiops-n8n-workflows.md`.
- **No surprise logic:** If a workflow is not listed here, do not invent it. Escalate through docs when something new is required.

## A. Documentation Automation — `docs_inventory_builder`

**Purpose:** Scan `docs/**` and surface inventory + gap reports for humans and Codex.

**Outputs:**
- `docs/inventory/docs_index.json` — machine-readable index of docs (path, title, last modified, owner hints).
- `docs/inventory/docs_gaps.md` — human-friendly gap notes (missing sections, stale files, docs without code references).

**Notes:**
- Keep scans read-only. Do not edit docs; only emit reports.
- Prefer shallow scans (avoid expensive recursive work) and reuse cached metadata when possible.

## B. Codebase Observability — `static_analysis_runner`

**Purpose:** Run the non-AI “first pass” checks and surface findings for engineers.

**Tools:** PHPStan, PHPUnit (safe subset), ESLint (if present).

**Outputs:**
- `docs/reports/code_health.md` — summary of lint/test status, failing paths, and suggested owners.
- `docs/reports/security_findings.md` — security-oriented highlights that need follow-up.

**Notes:**
- Only run safe test suites; flag anything skipped due to environment limits.
- Do not auto-fix; Codex will act on the findings.

## C. Cost & Usage Monitoring — `ai_budget_watchdog`

**Purpose:** Keep AIOps spend within bounds and warn before hitting limits.

**Inputs:** `config/runtime.json`, chat usage logs, AIOps usage snapshots.

**Outputs:**
- `docs/ops/ai_usage_snapshot.md` — current-day usage, 80% warnings, and any hard-stop notices.

**Notes:**
- Emit at most one 80% warning per day.
- Respect `aiops_enabled` / `aiops_llm_enabled` toggles; never override them.

## D. ChatGPT data.json Intelligence Ingestion — `chatgpt_memory_ingestor`

**Purpose:** Convert `/docs/chatgpt/data.json` exports into durable institutional memory.

**Outputs:**
- `docs/chatgpt/knowledge_index.json` — structured index of projects and domains discussed.
- `docs/chatgpt/unresolved_threads.md` — open questions or tasks that lack closure.
- `docs/chatgpt/decision_log.md` — finalized architectural or product decisions.

**Notes:**
- Treat exported data as read-only; redact secrets before writing outputs.
- Keep entries deduped and link back to source conversations when possible.

## E. Gap Tracker Intelligence — `gap_tracker_brain`

**Purpose:** Enrich `gap_tracker.csv` with priority, effort, and dependencies using available inventories and scans.

**Inputs:** `gap_tracker.csv`, docs inventory, static analysis outputs.

**Outputs:**
- `docs/gap-audit/next_actions.md` — human-ready next actions grouped by priority.
- `docs/gap-audit/codex_queue.md` — backlog ordered for Codex execution.

**Notes:**
- Do not change `gap_tracker.csv`; only read it.
- When data is missing, label the assumption rather than fabricating values.

## F. Instruction Feedback Loop — `instruction_feedback_loop`

**Purpose:** Route actionable instructions to the right actor without bypassing guardrails.

**Outputs:**
- `docs/codex/*.md` — implementation tasks for Codex (code changes, migrations, fixes).
- `docs/chatgpt/*.md` — reasoning or decision records for ChatGPT (architecture reviews, tradeoff analysis).

**Notes:**
- Separate human-facing instructions from machine-facing data; avoid mixing summaries with tasks.
- Never ask Codex to set priorities—only execute what n8n has ranked.

## What to hand to Codex right now

> Implement all n8n workflows described in this document and **scaffold their output directories only**. Do **not** add logic beyond what’s instructed here.

Codex should create the folders/files listed above, wire any necessary runtime config placeholders, and stop. No production workflow logic ships in this step.
