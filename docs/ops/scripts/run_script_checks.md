# run_script_checks.sh

## Purpose
Provide a lightweight, DreamHost-safe runner to inventory scripts, run linting (shellcheck when available), execute the route token lint, and optionally run smoke checks.

## How to run
- `bash scripts/run_script_checks.sh`
- `bash scripts/run_script_checks.sh --run-smoke --base-url https://staging.example.com`
- `bash scripts/run_script_checks.sh --skip-shellcheck`

## Inputs / outputs
- **Inputs**: Flags `--run-smoke`, `--base-url <url>`, `--skip-shellcheck`; env `BASE_URL` can set default base URL.
- **Outputs**: Console summary with PASS/FAIL; no file writes.

## Dependencies
- bash, find, sed. Optional: `shellcheck` for linting; `curl` when smoke_routes runs; existing `scripts/lint_no_route_tokens.sh` and `scripts/smoke_routes.sh`.

## Risks found
- Defaults to hitting production base when `--run-smoke` is used without `--base-url`; ensure correct target supplied.
- Shellcheck failure counts as failure, but when shellcheck is absent, the runner reports skipped as pass (documented behavior).

## Suggested improvements
- Add JSON output mode for CI pipelines.
- Allow selecting specific lint targets (e.g., limit shellcheck scope) to speed up partial runs.

## Proposed patch summary
- Introduce `--format json` and `--include <glob>` options; add timer metrics for each step.

## Owner Notes
- Designed to complete in <60 seconds and avoid sudo. Network traffic occurs only when `--run-smoke` is set.
