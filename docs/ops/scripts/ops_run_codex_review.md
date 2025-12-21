# ops/run_codex_review.sh

## Purpose
Wrapper around `php spark codex:review`, passing through optional environment variables for lookback commits and output directory.

## How to run
- `bash scripts/ops/run_codex_review.sh`
- `REVIEW_LOOKBACK_COMMITS=10 REVIEW_OUTPUT_DIR=/tmp/review bash scripts/ops/run_codex_review.sh`

## Inputs / outputs
- **Inputs**: Env `REVIEW_LOOKBACK_COMMITS`, `REVIEW_OUTPUT_DIR`.
- **Outputs**: Whatever spark command emits (reviews, reports).

## Dependencies
- php CLI, spark command available in repo.

## Risks found
- No usage/help; blindly executes spark which may fail without informative context.
- No timeout around spark; could hang if underlying command blocks.

## Suggested improvements
- Add `usage()` and `--timeout` using `timeout` command when available; capture exit codes and present friendly errors.

## Proposed patch summary
- Implement flag parsing, optional timeout wrapper, and pre-flight check for spark binary; exit non-zero with clear message on failure.

## Owner Notes
- DreamHost-safe assuming php CLI accessible. Avoid running concurrently with heavy deployments to reduce load.
