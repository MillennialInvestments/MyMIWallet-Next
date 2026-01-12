# deploy_safe.sh

## Purpose
Perform a safe deployment by ensuring a clean Git tree, fetching/pulling, running Composer install, clearing CI4 cache, and attempting opcache reset with logging.

## How to run
- `bash scripts/deploy_safe.sh`
- `bash scripts/deploy_safe.sh --dev` (include dev dependencies)

## Inputs / outputs
- **Inputs**: Optional `--dev`; expects git repo with clean working tree; uses composer.phar or composer in PATH; php spark available.
- **Outputs**: Log file `writable/logs/deploy-<date>.log` (tee'd) plus console output.

## Dependencies
- git, composer/composer.phar, php, spark CLI, find/rm, tee.

## Risks found
- No usage guidance; assumes operator knows prerequisites.
- Cache clear uses `find ... -exec rm -rf {}` without backup/dry-run; safe path but irreversible.
- No configurable log location or base URL for composer.

## Suggested improvements
- Add `usage()` and argument parsing for `--dev`, `--log-dir`, and `--skip-cache-clear`.
- Add optional `--dry-run` that echoes planned commands without executing.
- Introduce curl timeouts not relevant; ensure git fetch failure causes clear message (currently set -e handles).

## Proposed patch summary
- Add help text, parameterize log dir, and add dry-run/skip-cache flags while keeping current defaults.
- Guard cache removal with confirmation unless `--force`.

## Owner Notes
- Writes only within repo. No sudo. Ensure writable/logs exists on DreamHost and php spark accessible.
