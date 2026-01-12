# warm_routes.sh

## Purpose
Warm predefined routes via HTTP to prime caches and measure response times, failing when unexpected statuses occur.

## How to run
- `bash scripts/warm_routes.sh https://www.mymiwallet.com`
- `bash scripts/warm_routes.sh https://staging.example.com`

## Inputs / outputs
- **Inputs**: Optional base URL positional argument (default https://www.mymiwallet.com); reads route list from `scripts/warm_routes.txt` (supports comments).
- **Outputs**: Console per-route status/time; exits 1 if any route returns non-2xx/3xx/403.

## Dependencies
- bash, curl.

## Risks found
- No usage/help; curl lacks timeout/retry handling, so warming may hang on slow responses.
- Fails fast on first non-allowed status, but still finishes loop; counts failures but no summary of which routes failed beyond prints.

## Suggested improvements
- Add `usage()` plus `--timeout`, `--retries`, and `--routes-file` flags.
- Aggregate failures with a summary block and exit non-zero when failures >0.

## Proposed patch summary
- Implement argument parsing, configurable timeouts/retries, and a final summary with total failures.

## Owner Notes
- DreamHost-safe; hits provided base URL. Ensure route list kept up to date with env constraints (some endpoints may legitimately return 403).
