# logs_triage.sh

## Purpose
Review the newest `writable/logs/log-*.log` file, tailing recent lines with optional filter and grouping ERROR/CRITICAL messages.

## How to run
- `bash scripts/logs_triage.sh` (defaults to 200 lines)
- `bash scripts/logs_triage.sh 400 payment` (400 lines filtered for "payment")

## Inputs / outputs
- **Inputs**: Optional `<lines>` and `<filter>` arguments; requires `writable/logs` and log files.
- **Outputs**: Console tail plus grouped error counts.

## Dependencies
- bash, ls, tail, grep, awk.

## Risks found
- No `usage()`; errors on missing log dir/files exit 1 without guidance.
- Uses `ls -1t` which can fail on huge directories; no size guard on tail.

## Suggested improvements
- Add usage with defaults; fall back to `find` if `ls` fails.
- Add `--lines` flag and `--since` filter to avoid reading massive files.
- Consider summarizing by date and limiting grep throughput for large logs.

## Proposed patch summary
- Implement flag parsing, friendlier errors when no logs exist, and optional `--json` summary for monitoring.

## Owner Notes
- DreamHost-safe; reads logs only. Ensure correct permissions on writable/logs.
