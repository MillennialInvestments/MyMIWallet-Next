# AI Cost Controls

## Shared configuration
- **Config file:** `config/ai-cost-controls.json`
- **Chat plans:** `free` ($1), `basic` ($5), `pro` ($20), `premium` ($50) monthly caps.
- **AIOps workflows:** `gap_analysis` ($5), `doc_generation` ($10), `code_review` ($15) monthly caps.

## Persistence
- **Chat:** `chat_usage` (per user/month) with `tokens_used`, `usd_used`, `last_plan`, `last_email`, `updated_at`.
- **AIOps:** `bf_aiops_workflow_usage` (per workflow/month) plus `workflow_id` column on `bf_aiops_usage` for event-level detail.
- Migrations live in `app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php`.

## Enforcement libraries
- **PHP:** `App\Libraries\AiCostControls`
  - `getChatUsageSummary()` → month/global/users (+alert percent) for dashboards and the `GET /api/admin/chat-usage` endpoint.
  - `incrementChatUsage($userId, $tokens, $usd, $plan, $email)` / `resetChatUsage($userId, $month)` for per-user metering.
  - `incrementWorkflowUsage($workflowId, $slug, $usd)` for AIOps monthly controls.
  - `chatRuntimeConfig()` / `persistChatRuntimeConfig()` wrap `chat/config.runtime.json` (enable/disable, provider/model, budgets, thresholds).
- **Node:** `tools/ai-cost-controls/index.js`
  - Shared loader for `config/ai-cost-controls.json`.
  - MySQL pool from `DB_HOST/DB_USER/DB_PASS/DB_NAME` (no localhost defaults).
  - `fetchChatUsage` / `incrementChatUsage` mirror the PHP behavior for chat SSO requests.

## How limits are applied
- **Chat (Node):**
  - SSO JWT → user context (sub/email/plan/role) then per-user cap check before global budget.
  - Table updated after each successful LLM call; `sendUsageWebhook` includes user context.
- **AIOps (PHP):**
  - `/API/AIOps/policy/check` requires `workflow_id` and `estimated_cost`.
  - `AIOpsGuardrailService::checkWorkflowBudget()` blocks when projected monthly spend exceeds the configured workflow cap.
  - `logUsage` writes workflow_id + cost to both `bf_aiops_usage` (detail) and `bf_aiops_workflow_usage` (monthly rollup).

## Dashboards and APIs
- **Admin API:** `GET /api/admin/chat-usage` (permission: `admin.access`) returns `{ month, global {usd_used,budget,percent}, users[{user_id,email,plan,usd_used,tokens,percent}] }`.
- **Management UI:** `/Management/Chat/Usage` shows the progress bar, per-user table, and controls (enable/disable, model/provider, budget thresholds, kill switch, per-user reset).
- **Main dashboard card:** MyMI Management landing page shows the current chat budget percent and links to the detailed screen.

## Disable / change models / reset budgets
- **Disable Chat:** uncheck “Chat enabled” or hit “Emergency Kill Switch” in `/Management/Chat/Usage` (writes `chat/config.runtime.json`). SSO auth remains active; chat replies are blocked.
- **Disable AIOps:** set `aiops_enabled`/`aiops_llm_enabled` via existing `/API/AIOps/toggle` controls (permissioned).
- **Change models:** update `provider`/`providerModel` in the chat UI or edit `chat/config.runtime.json`.
- **Reset budgets:** use the per-user reset form in `/Management/Chat/Usage` (writes `chat_usage`), or truncate the relevant `bf_aiops_workflow_usage` rows for workflow resets.

## Alerts
- **Chat:** when global spend crosses `alertThresholdPercent` in `chat/config.runtime.json` (default 80%) an email is sent to `ALERT_EMAIL_TO` via the chat server’s `sendAlertEmail`.
- **AIOps:** `AIOpsGuardrailService::maybeSend80PercentAlert` emails `aiops_alert_email` once daily spend hits 80% (or configured hard stop).
