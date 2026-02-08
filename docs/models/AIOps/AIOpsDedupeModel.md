# AIOpsDedupeModel

**File path:** `app/Modules/AIOps/Models/AIOpsDedupeModel.php`

## Table(s)
- `bf_aiops_dedupe`

## Fields used
- `source_type`, `source_id`, `content_hash`, `first_seen_at`, `last_seen_at`, `seen_count`

## Write paths
- Uses inherited `insert()` / `update()` in calling services for dedupe touch/create behavior.

## Read paths
- `findByHash(string $hash)` fetches first row by `content_hash`.

## Caching behavior
- No model-level caching logic in this file.

## Guardrails
- `allowedFields` limits writes to expected dedupe columns.
- `findByHash()` enforces exact hash lookup to avoid loose matching.
