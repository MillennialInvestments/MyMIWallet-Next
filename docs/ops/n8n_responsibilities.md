# n8n responsibilities — Four-Pillar constitution

This document is the authoritative charter for how n8n operates inside the Four-Pillar system (ChatGPT ⇄ chat.mymiwallet.com ⇄ n8n ⇄ Codex ⇄ CI4). n8n is the expert systems engineer and orchestrator: it owns detection, prioritization, reporting, and instruction writing. Codex performs surgical code execution only, CI4 remains the system of record, and ChatGPT provides strategic reasoning.

## Role and scope

- Maintain gap tracking, ChatGPT memory digestion, static analysis, budget monitoring, report generation, and instruction writing.
- Emit artifacts exclusively under `docs/` so humans, ChatGPT, Codex, and chat.mymiwallet.com share the same view of work.
- Never let Codex set priorities or invent work; it executes what n8n has queued.
- Keep CI4 (auth, persistence, feature flags) as the primary authority—n8n does not bypass it with direct database writes.

## Hard guardrails

- **No direct code or DB writes.** Use CI4 APIs or documented endpoints if state changes are required.
- **No surprise automation.** If a workflow is not described here, publish a doc first and wait for approval.
- **Cost controls.** Follow `docs/ops/aiops-n8n-workflows.md` and related AIOps/budget guardrails; enforce hard stops to avoid surprise billing.
- **Docs-first communication.** All outputs live in `docs/`; redact secrets and avoid embedding credentials.
- **Strict actor boundaries.** ChatGPT reasons, n8n orchestrates, Codex executes, CI4 records.

## Core workflows

### 1) ChatGPT memory ingestor — `chatgpt_memory_ingestor`

**Purpose:** Convert the monthly ChatGPT `data.json` export into durable institutional memory without conflicting with code or docs.

**Inputs:**
- `docs/chatgpt/raw/data.json`
- `docs/chatgpt/processed/last_ingest.meta.json`

**Processing logic (mandatory):**
- Hash each conversation using its title, first user message, and timestamps.
- Compare against the previous ingest to label threads as `completed`, `unresolved`, `recurring`, or `new`.
- Redact secrets and avoid replaying old conversations; operate purely from the export.

**Outputs (authoritative):**
- `docs/chatgpt/processed/index.json`
- `docs/chatgpt/processed/completed.json`
- `docs/chatgpt/processed/unresolved.json` and `docs/chatgpt/processed/unresolved.md`
- `docs/chatgpt/processed/recurring_topics.json`
- `docs/chatgpt/processed/last_ingest.meta.json`
- `docs/chatgpt/diffs/new_since_last_run.md` (primary human diff of new items since the last ingest)

**Cadence:** Trigger manually after each upload or via the scheduled nightly scan. The diff file is the first thing humans should read.

### 2) Gap tracker intelligence — `gap_tracker_brain`

**Purpose:** Prioritize known gaps without editing the source tracker.

**Inputs:** `gap_tracker.csv`, docs inventory, static analysis outputs.

**Outputs:**
- `docs/gap-audit/next_actions.md` — prioritized human next steps.
- `docs/gap-audit/codex_queue.md` — execution-ordered backlog for Codex.

**Rules:** Do not modify `gap_tracker.csv`; label assumptions when data is missing.

### 3) Codebase observability — `static_analysis_runner`

**Purpose:** Run safe first-pass checks and surface actionable findings.

**Tools:** PHPStan, PHPUnit (safe subset), ESLint (if present).

**Outputs:**
- `docs/reports/code_health.md` — lint/test status and failing paths.
- `docs/reports/security_findings.md` — security-oriented highlights requiring follow-up.

**Rules:** Only run suites that are safe for the environment; flag anything skipped.

### 4) Cost and usage monitoring — `ai_budget_watchdog`

**Purpose:** Enforce budget guardrails for AIOps and related automation.

**Inputs:** `config/runtime.json`, chat usage logs, AIOps snapshots.

**Outputs:** `docs/ops/ai_usage_snapshot.md` — current usage, 80% warnings, and hard-stop notices.

**Rules:** Emit at most one 80% warning per day; respect `aiops_enabled` / `aiops_llm_enabled` toggles.

### 5) Instruction feedback loop — `instruction_feedback_loop`

**Purpose:** Route tasks to the right actor while preserving boundaries.

**Outputs:**
- `docs/codex/queued/*.md` — implementation tasks for Codex (no prioritization by Codex).
- `docs/chatgpt/requests/*.md` — reasoning/strategy tasks for ChatGPT.
- `docs/chatgpt/processed/*.md` — summaries that humans and chat.mymiwallet.com can surface.

**Rules:**
- Do not mix human summaries with machine instructions; keep files atomic.
- Command translations from chat.mymiwallet.com (e.g., `/n8n run chatgpt_ingest`, `/codex queue performance_review`, `/strategy validate auth model`) should land in the corresponding docs paths.

### 6) Documentation inventory — `docs_inventory_builder`

**Purpose:** Keep a current index of `docs/**` and highlight gaps for humans and Codex.

**Outputs:**
- `docs/inventory/docs_index.json`
- `docs/inventory/docs_gaps.md`

**Rules:** Read-only scans only; prefer shallow scans and cached metadata.

## Operating cadence

- Monthly: ingest the ChatGPT export via `chatgpt_memory_ingestor` and review `docs/chatgpt/diffs/new_since_last_run.md`.
- Weekly (or on change): refresh gap tracking, static analysis, and docs inventory so Codex executes current priorities.
- Daily: run `ai_budget_watchdog` to enforce spend controls and publish any warnings.

## Non-negotiables

- n8n owns gap tracking, ChatGPT memory digestion, static analysis, budget monitoring, report generation, and instruction writing.
- Codex executes only what n8n has queued under `docs/codex/`; it does not decide priorities.
- ChatGPT provides strategic reasoning and validation; chat.mymiwallet.com is a command interface, not an AI brain.
