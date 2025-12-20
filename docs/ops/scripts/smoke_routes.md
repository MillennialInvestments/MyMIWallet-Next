# scripts/smoke_routes.sh

## Purpose
Basic smoke check to ensure the public home page and a representative dynamic route respond with acceptable HTTP status codes.

## How to run
```bash
# Default production base
bash scripts/smoke_routes.sh

# Custom base (staging/local)
bash scripts/smoke_routes.sh https://staging.example.com
```

## Inputs/Outputs
- **Inputs**: Optional positional base URL (defaults to `https://www.mymiwallet.com`).
- **Outputs**: Console messages only; no files written.
- **Exit codes**: Non-zero if either curl+grep check fails or curl cannot connect.

## Dependencies
- Bash with `set -euo pipefail` support.
- External commands: `curl`, `grep`.
- Network access to the target base URL.

## Risks found
- Lacks a `usage()` helper and flag parsing; misuse errors are terse.
- No timeout configuration for `curl`, so a stalled host can hang the check.
- Hard-coded route paths; if routes change, smoke test silently drifts from intended coverage.

## Suggested improvements
- Add `usage()` with `-h/--help` and `--base` flag to improve ergonomics.
- Add `--timeout` (default 10s) passed to `curl -m` to avoid hangs.
- Surface HTTP responses when failures occur to aid troubleshooting.
- Allow route list to be configured (env or JSON) so smoke coverage can evolve without editing script code.

## Proposed patch summary
- Introduce argument parsing (`getopts`) with help text and default timeout/base options.
- Wrap each probe in a function that prints full URL and status on failure.
- Support reading additional probe paths from a simple newline-delimited file (optional).

## Owner Notes
- Suitable for DreamHost VPS (no sudo); keep routes limited to public/unauthenticated endpoints to avoid session leaks.
