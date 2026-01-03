## n8n capabilities for MyMI Wallet (CI4 + MySQL + Cron) — actionable playbook

Environment assumptions: DreamHost VPS (no sudo, no Docker), CI4 remains the system of record for auth, DB writes, and business logic. n8n acts as an orchestrator for triggers, routing, retries, batching, enrichment, and LLM calls.

### A) How n8n fits in your CI4 architecture
- n8n is an orchestrator, not the source of truth. CI4 continues to own authentication, database mutations, and core workflows.
- Use n8n for triggers (webhooks/cron), routing, retries, batching, enrichment, and external API coordination.
- CI4 provides endpoints for validated writes; n8n calls those endpoints with signed tokens and respects CI4 feature flags.

### B) Core workflow patterns you can implement immediately
- **Webhook → CI4 API → DB → Notifications**  
  Example: “New alert email scraped” triggers n8n → CI4 endpoint to create alert → Discord/email post via CI4 or n8n node.
- **Cron → Fetch external API → Queue → CI4 ingest**  
  Example: MarketAux hourly news → score in n8n → POST to CI4 ingest endpoint → refresh dashboard cache.
- **Approval gate workflows**  
  Example: Marketing post generation → mark “Pending Approval” in CI4 → manual approval step in n8n → publish via CI4 or platform API.
- **Rate-limited API enrichment**  
  Example: AlphaVantage price updates → throttled queue in n8n → write to `bf_investment_alert_history` via CI4 endpoint.
- **Error routing + incident notifications**  
  Example: On workflow failure → write to `bf_error_logs` (CI4 endpoint) → email `team@mymiwallet.com` and/or Discord.

### C) LLM/ML use cases inside n8n
- Summarize scraped emails/news into structured JSON for storage or dashboards.
- Extract entities: tickers, hashtags, topics, CTAs for marketing and alert tagging.
- Generate platform-specific post variants (Discord/LinkedIn/X/Blog).
- Auto-tag content and rank relevance (keywords → scoring for prioritization).
- Assist code review workflows (generate change summaries, test plan suggestions) before merging in CI4 repos.

### D) The “Cost Guardrails” system
- CI4 SiteSettings flags: `aiops_enabled`, `aiops_llm_enabled`, `aiops_daily_budget_usd`, `aiops_hard_stop_at_percent` (e.g., 80%).
- CI4 endpoints used by n8n:  
  - `GET /API/AIOps/usage/today` — returns enabled flags and remaining budget.  
  - `POST /API/AIOps/usage/log` — records a usage event (tokens, cost estimate, subsystem).  
  - `POST /API/AIOps/toggle` — enables/disables AIOps or LLM use.
- n8n guardrail step pattern:  
  1) Call CI4 “is enabled + budget remaining?” endpoint.  
  2) Only if allowed, call LLM or external APIs.  
  3) Log usage back to CI4 via `usage/log`.  
  4) Short-circuit with a “budget exceeded” notification otherwise.

### E) Recommended first 5 workflows to build
- **AIOPS - Daily LLM Budget Reset** — Midnight cron calls CI4 to reset budgets and emit a summary to Discord/email.
- **Marketing - Generate Daily Digest (guarded)** — Cron fetches top news; LLM summarizes; approval gate; posts with cost guardrails.
- **Alerts - Rate-Limited Market Enrichment** — Ingest tickers/news; throttle AlphaVantage/MarketAux calls; write to CI4 alert history.
- **Ops - Error Log Escalation to Email/Discord** — On CI4 error log signal or n8n failure, push high-severity alerts; include retry links.
- **Content - Approval + Publish Pipeline** — Draft generation → approval step → publish to blog/Discord/X via CI4 endpoints.

### F) Security model
- Protect n8n UI with Basic Auth (already in `.env`). Use VPN/IP allowlists where possible.
- Restrict webhooks with HMAC-signed tokens validated by CI4 before processing.
- Never expose API keys directly in workflows if CI4 can proxy them; store secrets in CI4 or n8n credentials vault.
- Log every workflow execution to `bf_error_logs` or a dedicated `bf_aiops_runs` table for auditability.

### Minimal MySQL design spec for AIOps tracking (no migration yet)
- **bf_aiops_usage** — `id (PK)`, `date`, `provider`, `model`, `tokens_in`, `tokens_out`, `cost_est`, `subsystem` (e.g., marketing, alerts), `request_id`, `workflow_slug`, `created_at`.
- **bf_aiops_workflows** — `id (PK)`, `slug`, `n8n_workflow_id`, `enabled`, `subsystem`, `description`, `created_at`, `updated_at`.
- **bf_aiops_budget** — `id (PK)`, `date`, `cap_usd`, `used_usd`, `hard_stop_percent`, `created_at`, `updated_at`.

### Example endpoint + workflow mapping (design-time guide)
- `GET /API/AIOps/usage/today` → Reads `bf_aiops_budget` + `bf_aiops_usage`.
- `POST /API/AIOps/usage/log` → Inserts into `bf_aiops_usage`; updates `bf_aiops_budget.used_usd`.
- `POST /API/AIOps/toggle` → Updates SiteSettings flags and `bf_aiops_workflows.enabled`.
- n8n workflows reference `bf_aiops_workflows.slug` to log executions and correlate with CI4 features.
