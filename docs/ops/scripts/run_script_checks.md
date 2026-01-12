# scripts/run_script_checks.sh

## Purpose
Lightweight runner that inventories scripts/, optionally runs shellcheck, and can execute the HTTP smoke test. Designed to work without sudo or paid tooling.

## How to run
```bash
# Inventory + shellcheck (if installed); skip smoke by default
bash scripts/run_script_checks.sh

# Include smoke test against a staging base URL
bash scripts/run_script_checks.sh --run-smoke --smoke-base https://staging.example.com
```

## Inputs/Outputs
- **Inputs**: Optional `--run-smoke` flag to run `scripts/smoke_routes.sh`; `--smoke-base` to override base URL for that smoke test.
- **Outputs**: Console logs; no files written.
- **Exit codes**: Always exits 0 currently; records PASS/FAIL/SKIP in summary lines.

## Dependencies
- Bash with `set -euo pipefail`.
- Uses `find`; optionally `shellcheck` if installed; optionally relies on `curl` when running smoke routes.

## Risks found
- Summary status is printed but exit code remains 0 even on failures; CI callers must parse logs.
- Inventory uses `find` without exclusions; extremely large directories could slow output.

## Suggested improvements
- Return non-zero when any `FAIL` status occurs (configurable via flag).
- Add exclusions for `node_modules` and writable exports to keep inventory fast.
- Emit timestamps for each step to help troubleshoot slow hosts.

## Proposed patch summary
- Track a failure flag and exit 1 when enabled (e.g., `--strict`).
- Add default `find` exclusions with override via env var; include per-step timing in logs.

## Owner Notes
- Safe on DreamHost; avoids sudo and paid tools. Keep `smoke_routes.sh` maintained to ensure optional smoke coverage remains accurate.
