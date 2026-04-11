# AIOPS INGEST JOB #18

## Goal
Analyze the instruction and produce minimal CI4-compatible code changes.

## Governance Context
- Risk Level: MEDIUM
- Governance Score: 15
- Manual Review Required: NO

## Targeting Hints (best-effort)
- public/index.php
- app/Config/Exceptions.php
- app/Config/Filters.php
- app/Views/


## Output Contract (STRICT)
Write outputs into:
- docs/_aiops/pr_ready/18/
Include:
- pr.md (title, summary, rationale, rollback, tests)
- patch/ (full replacement files OR unified diffs per file)
- risks.md
- tests.md

## Instruction
Analyze why the CI4 application sometimes shows 'System temporarily unavailable.' instead of the stock CI4 exception/debug output. Return results in this format: ## Findings, ## Root Cause, ## Exact Source Locations, ## Environment Determination, ## DebugToolbar Determination, ## Production vs Development Behavior, ## Required Code Changes, ## Safe Patch Order, ## Validation Steps. Inspect .env, public/index.php, app/Config/Boot/*, app/Config/Exceptions.php, app/Config/Filters.php, app/Views/errors/*, and all custom handlers/catch blocks that may replace exception output.