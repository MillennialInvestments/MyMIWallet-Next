# mymi-configs/collect.sh

## Purpose
Collect diagnostics for MyMI Wallet: system info, spark metadata, key config copies, redacted .env, grep summaries, and writable permissions.

## How to run
- `bash scripts/mymi-configs/collect.sh`
- `PHPBIN=/usr/local/bin/php bash scripts/mymi-configs/collect.sh`

## Inputs / outputs
- **Inputs**: Env `PHPBIN` optional; relies on spark CLI and config file locations.
- **Outputs**: Files under `writable/diagnostics/diag-<timestamp>/`, including `probe.php` and redacted env copy; provides zip command hint.

## Dependencies
- php, composer, spark CLI, grep/sed/cp/find, zip (suggested), basic coreutils.

## Risks found
- Uses `set +e`, so failures are silent and exit code may be 0 even when key steps fail.
- No usage/help text or argument validation.
- Redaction regex may miss secrets not listed, and copies sensitive configs to diagnostics folder (though within repo).

## Suggested improvements
- Switch to `set -euo pipefail` with guarded fallbacks and explicit exit codes.
- Add `usage()` with flags like `--output-dir`, `--skip-env`, and `--skip-config-copies`.
- Expand redaction patterns and note sensitivity of collected files.

## Proposed patch summary
- Harden error handling, add flag parsing, and wrap secret redaction in a reusable function; optionally generate a SHA of collected files for integrity.

## Owner Notes
- Collects sensitive data; ensure diagnostics directory is protected. Safe on DreamHost (no sudo), but consider cleaning output after transfer.
