# lint_no_route_tokens.sh

## Purpose
Detect CI4 route token usage outside allowed route configuration files to prevent accidental exposure.

## How to run
- `bash scripts/lint_no_route_tokens.sh`

## Inputs / outputs
- **Inputs**: None; uses hard-coded allowlist regex and excludes writable/vendor/node_modules.
- **Outputs**: Console pass/fail with offending lines if found.

## Dependencies
- bash, grep.

## Risks found
- No usage/help; allowlist is inline and cannot be overridden.
- Fails entire script on first match via exit 1; acceptable for CI but should allow `--json` or `--allowlist` overrides.

## Suggested improvements
- Add `usage()` plus `--allowlist` flag and `--format json` option for CI parsing.
- Parameterize search roots to speed up checks in partial repos.

## Proposed patch summary
- Introduce argument parsing, optional JSON output, and configurable allowlist while keeping defaults.

## Owner Notes
- Fast and DreamHost-safe. Works without external tools beyond grep.
