# ops/run_cron_endpoint.sh

## Purpose
Trigger a single cron endpoint with bearer token authentication and emit a small JSON summary.

## How to run
- `BASE_URL=https://www.mymiwallet.com CRON_PATH=/cron/test MYMI_CRON_TOKEN=secret bash scripts/ops/run_cron_endpoint.sh`
- `CRON_LOG=/tmp/cron.log BASE_URL=... CRON_PATH=... MYMI_CRON_TOKEN=... bash scripts/ops/run_cron_endpoint.sh`

## Inputs / outputs
- **Inputs**: Required env `BASE_URL`, `CRON_PATH`, `MYMI_CRON_TOKEN`; optional `CRON_LOG` path for append.
- **Outputs**: JSON to stdout with URL, HTTP status, body snippet; optional log append.

## Dependencies
- curl, bash.

## Risks found
- No usage/help; missing required vars produces JSON error then exits 1.
- curl runs without explicit timeout; potential hang.
- Returns 0 even on HTTP failure, which may hide cron issues.

## Suggested improvements
- Add `usage()` and enforce exit non-zero when HTTP status >=400 unless `--allow-fail` passed.
- Add configurable timeouts and headers (e.g., `--header` repeated) plus TLS options.

## Proposed patch summary
- Implement argument parsing with defaults, failure counting/exit codes, and curl timeouts.

## Owner Notes
- DreamHost-safe. Ensure token provided securely (env) and log path resides in writable area.
