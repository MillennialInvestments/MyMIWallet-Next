# ops/health_check.sh

## Purpose
Emit a lightweight JSON health snapshot (timestamp, PHP version, disk usage, uptime, optional HTTP status and DB ping) for monitoring.

## How to run
- `TARGET_URL=https://www.mymiwallet.com/healthz bash scripts/ops/health_check.sh`
- `DB_PING=1 HEALTH_LOG=/tmp/health.log bash scripts/ops/health_check.sh`

## Inputs / outputs
- **Inputs**: Env `TARGET_URL` optional; `DB_PING=1` to check mysqli availability; `HEALTH_LOG` path to append JSON.
- **Outputs**: JSON to stdout; optional log append.

## Dependencies
- php, curl, df/awk, uptime, bash.

## Risks found
- No usage/help; HTTP errors result in status "error" but exit 0—may hide failures in cron contexts.
- No curl timeouts; could hang if endpoint stalls.

## Suggested improvements
- Add `usage()` plus `--timeout` option and exit non-zero when HTTP status is not 200 unless `--allow-fail` set.
- Allow plain text health log rotation guard (size check) to avoid unbounded files.

## Proposed patch summary
- Add flag parsing with timeouts/defaults, clear exit semantics, and optional JSON-only mode without HTTP call.

## Owner Notes
- DreamHost-safe. Keep HEALTH_LOG in writable location and restrict permissions if containing operational info.
