# cron_kick.sh

## Purpose
Hit all cron endpoints defined in `scripts/cron_endpoints.json`, optionally substituting `CRON_SECRET` headers and supporting dry runs.

## How to run
- `bash scripts/cron_kick.sh --base https://www.mymiwallet.com`
- `CRON_SECRET=secret bash scripts/cron_kick.sh --dry-run`

## Inputs / outputs
- **Inputs**: Flags `--base <url>`, `--dry-run`; env `CRON_SECRET` or `.env` lookup; reads `scripts/cron_endpoints.json`.
- **Outputs**: Console status per endpoint (HTTP status); no file writes.

## Dependencies
- bash with `set -euo pipefail`; php for parsing JSON and env; curl; mapfile.

## Risks found
- No usage/help text; unknown flags exit abruptly.
- HTTP failures only print status; script never exits non-zero for failed endpoints.
- Uses curl without timeouts; potential hang if endpoint stalls.

## Suggested improvements
- Add `usage()` with flag documentation and examples.
- Track per-endpoint failures and exit non-zero when any request fails (unless `--allow-failures`).
- Set curl timeouts (`--max-time`, `--connect-timeout`) and optional concurrency control.

## Proposed patch summary
- Implement usage + flag parsing (`--base`, `--dry-run`, `--allow-failures`, `--timeout` default 15s).
- Accumulate failure count and exit 1 when >0 failures in live mode.
- Log summary totals and highlight missing CRON_SECRET when required headers exist.

## Owner Notes
- DreamHost-safe (no sudo). Keep `.env` readable for CRON_SECRET discovery or pass via env explicitly to avoid leakage.
