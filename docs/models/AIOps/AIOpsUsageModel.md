# AIOpsUsageModel

**File path:** `app/Modules/AIOps/Models/AIOpsUsageModel.php`

## Table(s)
- `bf_aiops_usage`

## Fields used
- `date`, `provider`, `model`, `tokens_in`, `tokens_out`, `cost_est`, `subsystem`, `request_id`, `workflow_id`, `workflow_slug`, `user_id`, `meta_json`, `created_at`

## Write paths
- `insertUsage(array $data)` inserts a usage row.

## Read paths
- Inherited `Model` read methods are available; service code also uses ordering and limited lookups via model query builder.

## Caching behavior
- No model-level caching logic in this file.

## Guardrails
- `allowedFields` restrict writable columns.
- `insertUsage()` returns boolean cast from insert result.
