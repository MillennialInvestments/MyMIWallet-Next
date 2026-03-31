# platform profiles

## light
Runs preflight, docs inventory/map, routes reconcile, logs/AIOps observe, and final report. No repair by default.

## nightly
Runs broad coverage: docs sync, core integrity, all subsystem audits, ops, AI, and Codex review. Does not auto-apply patches unless `--apply=1` is passed.

## predeploy
Runs docs, route checks/repair, api/auth-focused subsystem checks, logs, and ops checks. Repair remains opt-in.

## Examples
- `php spark platform:run --profile=light`
- `php spark platform:run --profile=nightly --repair=1`
- `php spark platform:run --profile=predeploy --strict=1`
