# CI Spark Contract

This repository uses a CI-safe Spark bootstrap contract so PR checks can run without VPS/runtime dependencies.

## Environment bootstrap

Before any `php spark ...` command in CI:

1. Copy `env/.env.ci.example` to `.env`.
2. Export:
   - `CI=true`
   - `CI_ENVIRONMENT=testing`
   - `ENVIRONMENT=testing`
3. Run `php spark ops:ci:prepare`.

## Required writable/artifact paths

`ops:ci:prepare` guarantees these directories:

- `writable/logs`
- `writable/cache`
- `writable/ci`
- `docs/_aiops`

It also writes `writable/ci/ci_bootstrap.json` with runtime metadata.

## CI-safe command behavior

The following commands run in report-only mode in CI and always exit `0`:

- `spark:purge-fastcgi`
- `spark:diagnose-503`
- `logs:full-report`
- `config:lint` (reports failures but does not fail CI)
- `ops:commands:audit` (writes `writable/ci/ops-commands-audit.json`)
- `aiops:copilot:validate` (skips external notification/DB persistence)

`codex:review:publish` remains artifact-safe and can run in CI after bootstrap.

## Artifact upload recommendations

On workflow failure (or always for PR diagnostics), upload:

- `writable/logs/*`
- `writable/ci/*`
- `copilot-validation.json`
- `docs/_aiops/*`
