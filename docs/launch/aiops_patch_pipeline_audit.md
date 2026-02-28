# AIOPS Patch Pipeline Audit

## Problem audited
- Empty diff responses were being retried and could still end as invalid without preserving enough evidence.

## Fix implemented
- `callOllama()` now returns structured metadata (`response`, `raw`, `http`, `error`).
- Invalid model outputs are persisted to `docs/_aiops/debug/<job>.<attempt>.raw-output.json`.
- Empty/invalid diff is never passed forward silently; job exits `failed_invalid_model_output` with evidence refs.
- Added fallback skeleton plan: `docs/_aiops/patch_jobs_failed/<job>.md` with target files and required changes.

## Outcome
- Deterministic failure artifacts now exist for empty diff incidents, enabling manual Codex patching path.
