# smoke_routes.sh

## Purpose
Perform quick HTTP smoke checks for home page, healthz, and a protected dashboard route with expected status ranges.

## How to run
- `bash scripts/smoke_routes.sh https://www.mymiwallet.com`
- `bash scripts/smoke_routes.sh https://staging.example.com`

## Inputs / outputs
- **Inputs**: Optional base URL positional argument (default https://www.mymiwallet.com).
- **Outputs**: Console PASS/FAIL per route; exits non-zero on first failure.

## Dependencies
- bash, curl.

## Risks found
- No usage/help; no timeout flags, so curl may hang on network issues.
- Exits on first failure—cannot capture aggregate results across routes.

## Suggested improvements
- Add `usage()` and `--timeout`/`--retries` options; accumulate failures and report summary before exit.
- Allow route list to be configurable via file or env for easier extension.

## Proposed patch summary
- Implement argument parsing, timeouts, optional route file input, and summary reporting.

## Owner Notes
- DreamHost-safe. Default URLs hit production; use staging base to avoid unintended load.
