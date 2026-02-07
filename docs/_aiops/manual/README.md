# AIOPS Manual Task System

This directory is the authoritative source of human intent for the AIOPS manual workflow.

## Actionable Scope
AIOPS must scan only:

- `/docs/_aiops/manual/priorities/`

Only files in that directory are actionable tasks.

## Workflow Rules
1. Parse each priority file verbatim.
2. Correlate new normalized error signatures from `/docs/_aiops/error-input/`.
3. Open small PRs (1–3 fixes) only when errors match a manual priority.
4. Update state files in `/docs/_aiops/aiops-state/`.
5. Move completed priorities to `/docs/_aiops/manual/done/`.

## Required Guardrails
- No matching manual task = no PR.
- Never mix unrelated fixes in one PR.
- Reference the linked priority file in every PR body.
- Treat manual priorities as higher precedence than automation noise.


## Schema Contract
Every file in `priorities/` must include: `# Priority:`, `## Scope`, `## Target Errors`, `## Constraints`, `## Completion Criteria`.

Additional validation:
- `## Target Errors` must include at least one bullet item.
- `## Constraints` must include a `Small PRs` requirement (case-insensitive).

Invalid files are marked `blocked` in `docs/_aiops/aiops-state/task-index.json` and never create PRs.
