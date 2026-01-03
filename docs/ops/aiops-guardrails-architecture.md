# AIOps Guardrails Architecture (CI4 + n8n)

> **Scope:** Design and backend implementation notes for the CI4 guardrail layer that fronts all LLM work orchestrated by n8n. This document complements the schema spec and workflow runbooks. No migrations are shipped here; schema is design-only until explicitly enabled.

## Goals

- **Never surprised by bills:** CI4 enforces a daily AI budget cap with hard stop logic and a proactive alert at 80%.
- **Deterministic gating:** Every LLM request must flow through CI4 for validation, dedupe, cache checks, and budget verification before n8n calls an LLM node.
- **Single source of truth:** CI4 writes usage, cache, dedupe, and workflow mappings; n8n only orchestrates.
- **Toggleable:** Site-level switches allow operators to disable AIOps or LLM usage quickly.

## Components

- **CI4 module (`App\Modules\AIOps`)**
  - Controllers under `/API/AIOps/*` expose health, policy check, usage logging, cache store/get, admin toggles, and a test harness.
  - Models for usage, budget, workflows, cache, and dedupe tables.
  - `AIOpsGuardrailService` encapsulates hashing, validation, cache/dedupe lookups, budget math, alerting, and table availability checks.
- **Site settings**
  - Config toggles: `aiops_enabled`, `aiops_llm_enabled`, `aiops_daily_cap_usd`, `aiops_hard_stop_percent`, `aiops_alert_email`.
  - Existing AI ops toggles remain unchanged; these new switches are purpose-built for guardrails.
- **n8n**
  - Orchestration layer responsible for retries, routing, and scheduling.
  - Calls CI4 guardrails before any LLM node; logs usage and cache writes only via CI4 endpoints.

## Request lifecycle

1. **Policy check (`POST /API/AIOps/policy/check`)**
   - Validates title/content minimums.
   - Computes `content_hash` and `cache_key` (scope + content hash).
   - Dedupe lookup: if seen, return `allowed=false`, `reason=DEDUPED`.
   - Cache lookup: if hit, return `allowed=false`, `reason=CACHE_HIT` (payload included when present).
   - Budget check: ensures daily row exists; blocks when `used/cap >= hard_stop_percent`.
   - Emits `request_id`, budget snapshot, and alert triggers at 80% when not yet alerted.
2. **n8n guarded execution**
   - Only proceeds to LLM node when `allowed=true`.
   - Carries `request_id`, `content_hash`, and `cache_key` through the workflow.
3. **Usage log (`POST /API/AIOps/usage/log`)**
   - Records provider/model/tokens/cost.
   - Updates daily budget `used_usd`.
4. **Cache store/get**
   - `cache/store` persists payloads with TTL.
   - `cache/get` allows early short-circuit paths.

## Budget enforcement

- Daily cap row auto-created with configured cap and hard stop percent (defaults from SiteSettings).
- Hard stop: requests blocked when `used_usd / cap_usd` is greater than or equal to `hard_stop_percent`.
- **Alert at 80%:** When usage crosses 80% (or the configured hard stop percent, whichever is lower), CI4 sends an email to `aiops_alert_email` and stamps `alerted_at_80` to prevent repeat alerts.

## Data flow with n8n

- n8n requests policy check → CI4 responds with allow/deny and `request_id`.
- On allow, n8n calls LLM → logs usage → stores cache → persists downstream results via CI4 endpoints (outside this scope).
- On cache hit/dedupe/hard stop, n8n routes to bypass LLM and optionally uses cached payload.

## Operational notes

- All endpoints live under `/API/AIOps/*` with admin protection on `/toggle`.
- CI4 email service is used for budget alerts (`MyMI Wallet AIOps budget at 80%`).
- Design assumes MySQL tables described in `aiops-schema-endpoints-spec.md` (no migrations yet).
- Developer harness (`/API/AIOps/test/policy`) exercises the gate without invoking LLMs.

## Next steps (Phase 2)

- Add migrations for the AIOps tables.
- Build a management dashboard block to surface budget usage, cache hits, and dedupe statistics.
- Extend pricing tables to compute `cost_est` server-side.
