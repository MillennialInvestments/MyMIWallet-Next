# AIOps Module Documentation

## Covered Files
- `app/Modules/AIOps/Services/AIOpsGuardrailService.php`
- `app/Modules/AIOps/Models/AIOpsUsageModel.php`
- `app/Modules/AIOps/Models/AIOpsDedupeModel.php`

## Purpose
This module provides AIOps cost guardrails: validation, budget checks, cache/deduplication helpers, and usage persistence in AIOps tables.

## Inputs and Outputs
- **Inputs:** prompt/content fields, usage metadata, workflow identifiers, cache keys, dedupe hashes, and budget-related numeric values.
- **Outputs:** boolean flags for table/budget checks, normalized content, hashes/cache keys, usage/dedupe rows, and persisted model rows.

## Auth Requirements
- No direct HTTP auth in these files; access control is expected to be enforced by calling controllers/services before invoking guardrail methods.

## Side Effects
- Reads/writes to AIOps database tables (`bf_aiops_usage`, `bf_aiops_dedupe`, budget/cache/workflow tables).
- Sends budget threshold alert email through CodeIgniter email service.
- Updates dedupe seen counters and inserts cache rows.

## Related Detailed Docs
- `docs/services/AIOpsGuardrailService.md`
- `docs/models/AIOps/AIOpsUsageModel.md`
- `docs/models/AIOps/AIOpsDedupeModel.md`
