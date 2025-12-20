# scripts/lint_no_route_tokens.sh

## Purpose
Guardrail to prevent CodeIgniter route placeholder tokens (e.g., `(:segment)`, `(:num)`) from appearing outside allowed route configuration files.

## How to run
```bash
bash scripts/lint_no_route_tokens.sh
```

## Inputs/Outputs
- **Inputs**: None.
- **Outputs**: Prints offending file/line matches when found; otherwise prints a success message.
- **Exit codes**: Exits 1 when disallowed matches exist; 0 when clean.

## Dependencies
- Bash with `set -euo pipefail`.
- `grep` with recursive search support.
- Relies on script path relative to repo root (`$(dirname "$0")/..`).

## Risks found
- No usage/help output; misuse errors may be unclear.
- Allowlist regex is inlined; hard to audit or extend without editing the script.
- Does not exclude `node_modules` or `vendor` beyond `vendor`; large repos could slow scans.

## Suggested improvements
- Add `usage()` and `-h/--help` for clarity.
- Support a configurable allowlist file or env var to reduce code churn when adding exceptions.
- Extend default exclusions to `node_modules`, `public/assets`, and large export dirs to speed scans.

## Proposed patch summary
- Add argument parsing and help text, plus optional `--allowlist` path.
- Introduce default exclusion array and allow overrides via env (`ROUTE_LINT_EXCLUDES`).
- Print summary (files scanned, matches found) for CI readability.

## Owner Notes
- Runs without sudo; safe for DreamHost environments. Keep exclusion list aligned with repo growth to avoid timeouts.
