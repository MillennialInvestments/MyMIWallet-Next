# platform:run

`php spark platform:run` orchestrates the local platform lifecycle in deterministic stages with soft-fail behavior by default.

## Stage order
1. Preflight (`runtime:spark-doctor`, `logs:healthcheck`, `health:services`, `env:doctor`)
2. Documentation (`docs:inventory`, architecture map, knowledge graph, optional `docs:sync-all`)
3. Core integrity (controller/model/service health, route reconcile, optional repair)
4. Log intelligence (`logs:summarize-all`, consolidate, AIOps observe)
5. Safe remediation (optional repair/patch validation/apply)
6. Subsystem audits (`alerts`, `marketing`, `api`, `auth`, `wallets`, `research`)
7. Ops stage (optional)
8. AI/Codex stage (optional)
9. Final report write

## Flags
- `--strict=1`
- `--repair=1`
- `--apply=1`
- `--ops=1`
- `--ai=1`
- `--codex=1`
- `--sync-docs=1`
- `--repair-routes=1`
- `--patch-validate=1`
- `--subsystems=alerts,marketing,api,auth,wallets,research`
- `--profile=light|nightly|predeploy`

## Report output
- `docs/_platform/latest_run.json`
- `docs/_platform/latest_run.md`
- `docs/_platform/history/run_*.json`
- `docs/_platform/history/run_*.md`

## Failure behavior
- Default mode is fail-soft per command/stage.
- `--strict=1` exits as soon as a command fails.
