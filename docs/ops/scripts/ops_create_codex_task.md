# ops/create_codex_task.sh

## Purpose
Create a standardized Codex task markdown stub with metadata and acceptance criteria.

## How to run
- `TASK_SLUG=foo-123 TITLE="New Task" SUMMARY="..." bash scripts/ops/create_codex_task.sh`

## Inputs / outputs
- **Inputs**: Env `TASK_SLUG` (required), `TITLE`, `SUMMARY`, `SOURCE` (default ops-inbox), `DEST_DIR` (default docs/codex/tasks).
- **Outputs**: Markdown file in DEST_DIR plus JSON pointer to path/title/source on stdout.

## Dependencies
- bash, mkdir, date, printf.

## Risks found
- No usage/help if TASK_SLUG missing beyond JSON error; will overwrite existing file silently.
- Does not validate safe slug characters or strip problematic input.

## Suggested improvements
- Add `usage()` and `--force/--no-clobber` options; validate slug format.
- Return non-zero if target file already exists unless forced.

## Proposed patch summary
- Implement argument parser supporting flags and collision checks; add friendly help text and success summary.

## Owner Notes
- DreamHost-safe; local file writes only.
