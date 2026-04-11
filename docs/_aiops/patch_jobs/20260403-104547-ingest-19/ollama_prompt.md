# AIOPS INGEST JOB #19

## Goal
Analyze the instruction and produce minimal CI4-compatible code changes.

## Governance Context
- Risk Level: LOW
- Governance Score: 0
- Manual Review Required: NO

## Targeting Hints (best-effort)
- (none inferred)


## Output Contract (STRICT)
Write outputs into:
- docs/_aiops/pr_ready/19/
Include:
- pr.md (title, summary, rationale, rollback, tests)
- patch/ (full replacement files OR unified diffs per file)
- risks.md
- tests.md

## Instruction
After analysis, prepare a Codex-ready remediation plan to restore stock CI4 exception/debug rendering in development and staging, while keeping production on generic error pages with full logging to bf_error_logs and alerting. Include exact file names, code placement notes, risk notes, and validation steps.