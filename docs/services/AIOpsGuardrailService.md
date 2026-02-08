# AIOpsGuardrailService

**File path:** `app/Modules/AIOps/Services/AIOpsGuardrailService.php`

## Responsibility
Central AIOps guardrail coordinator for record validation, content hashing, cache/dedupe checks, daily budget enforcement, and workflow budget decisions.

## Inputs / Outputs
- **Inputs:** title/content strings, source identifiers, cache scope/hash/payload, workflow identifiers, estimated costs, and budget snapshots.
- **Outputs:** normalized validation payloads, deterministic hashes/keys, bool decisions (`tablesAvailable`, budget hard-stop), cached/dedupe row arrays, and persisted state updates.

## Failure modes
- Returns invalid validation result when title/content minimum lengths fail.
- Returns `false` table-availability when required AIOps tables are missing.
- Can deny workflow execution when projected usage exceeds configured workflow limits.
- Email send failures are not raised in this file (email service called directly without explicit exception handling).

## Rate limits
- No explicit API-level throttle in this service.
- Budget controls and hard-stop percentages act as cost/rate guardrails for AI workloads.

## Called by
- AIOps workflows/services that need validation, budget checks, usage recording context, caching, or dedupe operations.
- Uses these models/services internally: `AIOpsUsageModel`, `AIOpsBudgetModel`, `AIOpsWorkflowsModel`, `AIOpsWorkflowUsageModel`, `AIOpsCacheModel`, `AIOpsDedupeModel`, `AiCostControls`, and CodeIgniter `Services::email()`.
