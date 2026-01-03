# AIOps Budgeting & Workflow Caps

## Workflow limits
- Config source: `config/ai-cost-controls.json` → `aiops.workflows`
  - `gap_analysis`: $5/month
  - `doc_generation`: $10/month
  - `code_review`: $15/month
- Each AIOps/n8n action must send `workflow_id` and `estimated_cost` to `/API/AIOps/policy/check`.
- The guardrail blocks with `reason: WORKFLOW_BUDGET` when the projected monthly spend (current + estimated) exceeds the workflow cap.

## Persistence
- **Monthly rollup:** `bf_aiops_workflow_usage (workflow_id VARCHAR(64), workflow_slug, month, usd_used, updated_at)` keyed by `(workflow_id, month)`.
- **Event detail:** `bf_aiops_usage` now includes a `workflow_id` column to retain per-call granularity alongside the existing `workflow_slug`.
- Migrations: `app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php`.

## Runtime hooks
- Service: `App\Modules\AIOps\Services\AIOpsGuardrailService`
  - `checkWorkflowBudget()` enforces monthly caps using `AiCostControls`.
  - `logUsage()` writes workflow_id + cost to both detail and monthly tables.
- API: `App\Modules\APIs\Controllers\AIOpsController::policyCheck`
  - Requires POST `workflow_id`, `estimated_cost`, optional `workflow_slug`, `subsystem`, etc.
  - Responds with `workflow_budget` snapshot (limit, usage, projected, percent) for client-side handling.

## Disable / change models / reset budgets / alerts
- **Disable AIOps LLM:** use `/API/AIOps/toggle` (permission `admin.access`) to flip `aiops_enabled` / `aiops_llm_enabled`.
- **Change model/provider:** continue to use existing SiteSettings overrides; workflow caps are model-agnostic and based on USD.
- **Reset budgets:** truncate or update rows in `bf_aiops_workflow_usage` for the target `workflow_id`+`month`. Detail rows in `bf_aiops_usage` remain for audit.
- **Alerts:** `AIOpsGuardrailService::maybeSend80PercentAlert` emails `aiops_alert_email` when daily spend crosses 80% of the day cap; workflow-level caps return `WORKFLOW_BUDGET` to the caller when exceeded.
