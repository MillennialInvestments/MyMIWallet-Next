# doctor.sh

## Purpose
Run environment diagnostics for MyMI Wallet: git status, PHP/Composer presence, writable permissions, spark availability, latest log errors, and disk usage snapshot.

## How to run
- `bash scripts/doctor.sh`

## Inputs / outputs
- **Inputs**: None; relies on repo root, git, php, composer/spark availability.
- **Outputs**: Console report; no file writes.

## Dependencies
- git, php, composer/composer.phar, spark CLI, df/du, grep, ls.

## Risks found
- No usage/help; always exits 1 when any check fails, which is fine but could allow selective checks.
- Reads latest log without size guard; could be large on slow shells.

## Suggested improvements
- Add `usage()` plus flags such as `--skip-git`, `--skip-logs`, and `--json` output for monitoring.
- Cap log tail output size and add `--log-lines` option.

## Proposed patch summary
- Implement basic flag parsing, optional JSON summary, and configurable log tail lines with safe defaults.

## Owner Notes
- DreamHost-safe; avoids sudo and writes nothing. Ensure writable/logs readable by shell user.
