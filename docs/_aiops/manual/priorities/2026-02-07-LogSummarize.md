# Priority: Log Summarize Reliability

## Scope
Stabilize `logs:summarize` task execution and artifact generation without changing runtime logging architecture.

## Target Errors
- Missing input log files causing hard command failures
- Inconsistent summary formatting between runs

## Constraints
- Keep the command intent unchanged
- Only add guardrails and documentation requirements for stable execution

## Small PRs
- PR 1: Add input preflight checks and clear CLI warnings
- PR 2: Normalize summary headings and artifact output structure

## Completion Criteria
- `logs:summarize` no longer fatals when no daily log exists
- Output consistently includes required headers and timestamps
- Task moved to `/done` once validated in manual run
