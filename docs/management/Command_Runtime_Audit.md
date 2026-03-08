# Command Runtime Audit

This audit validates every Spark command under `app/Commands/**` against runtime contracts:

- Extends `SafeBaseCommand` (or `BaseCommand` where explicitly required).
- No illegal constructors.
- `$group`, `$name`, `$description` metadata defined.
- PHP 8.2 compatibility (heuristic scan for deprecated runtime APIs).
- No deprecated Spark APIs (`$this->option()`, `$this->option()`, etc.).
- Safety flags (`--dry-run`, `--approve`) present on destructive commands.

## Audit Table

| Command name | Status | Failure reason | Fix required |
| --- | --- | --- | --- |
| `aiops:seed` | OK | — | — |
| `aiops:chat-governance-index` | OK | — | — |
| `aiops:command-index` | OK | — | — |
| `aiops:copilot:validate` | OK | — | — |
| `aiops:run` | OK | — | — |
| `alerts:audit` | OK | — | — |
| `alerts:parse-test` | OK | — | — |
| `app:update` | OK | — | — |
| `api:audit` | OK | — | — |
| `audit:psr4` | OK | — | — |
| `audit:node` | OK | — | — |
| `auth:audit` | OK | — | — |
| `auth:funnel-check` | OK | — | — |
| `auth:smoke` | OK | — | — |
| `cache:audit` | OK | — | — |
| `codex:review` | OK | — | — |
| `codex:review:commit` | OK | — | — |
| `codex:review:list` | OK | — | — |
| `codex:review:publish` | OK | — | — |
| `config:lint` | OK | — | — |
| `config:drift` | OK | — | — |
| `content:ingest-sample` | OK | — | — |
| `contentengine:smoke` | OK | — | — |
| `db:apply-docs` | OK | — | — |
| `db:drift` | OK | — | — |
| `db:inventory` | OK | — | — |
| `discord:list` | OK | — | — |
| `discord:process-queue` | OK | — | — |
| `discord:test` | OK | — | — |
| `discord:test-liquidity` | OK | — | — |
| `discord:wire-check` | OK | — | — |
| `email:test` | OK | — | — |
| `env:doctor` | OK | — | — |
| `fix:503` | OK | — | — |
| `forecasts:evaluate` | OK | — | — |
| `forecasts:refresh` | OK | — | — |
| `gap:sync` | OK | — | — |
| `growth:retention-watch` | OK | — | — |
| `health:cache` | OK | — | — |
| `health:disk` | OK | — | — |
| `health:git-safety` | OK | — | — |
| `health:services` | OK | — | — |
| `logs:full-report` | OK | — | — |
| `logs:healthcheck` | OK | — | — |
| `logs:summarize` | OK | — | — |
| `mail:send` | OK | — | — |
| `mail:send-test` | OK | — | — |
| `mail:test` | OK | — | — |
| `mail:verify` | OK | — | — |
| `marketing:automation-audit` | OK | — | — |
| `mdit:nav:compute_daily` | OK | — | — |
| `migrate:dry-run` | OK | — | — |
| `news:audit` | OK | — | — |
| `ops:aiops:init` | OK | — | — |
| `ops:analyze-commands` | OK | — | — |
| `ops:commands:audit` | OK | — | — |
| `ops:commands:autofix` | OK | — | — |
| `ops:commands:inventory` | OK | — | — |
| `ops:fetch-commands` | OK | — | — |
| `ops:filesystem:lint` | OK | — | — |
| `ops:commands:lint` | OK | — | — |
| `ops:next-steps` | OK | — | — |
| `ops:next-steps:sync` | OK | — | — |
| `ops:propose-pr` | OK | — | — |
| `ops:spark-reset` | OK | — | — |
| `ops:work` | OK | — | — |
| `optimize:safe` | OK | — | — |
| `revenue:cost-forecast` | OK | — | — |
| `revenue:scan` | OK | — | — |
| `routes:auth-audit` | OK | — | — |
| `runtime:cache-boot` | OK | — | — |
| `runtime:check` | OK | — | — |
| `runtime:diagnose-502` | OK | — | — |
| `runtime:spark-doctor` | OK | — | — |
| `runtime:triage` | OK | — | — |
| `security:csp:audit` | OK | — | — |
| `security:secrets-audit` | OK | — | — |
| `scraper:audit-emails` | OK | — | — |
| `spark:doctor` | OK | — | — |
| `spark:diagnose-503` | OK | — | — |
| `spark:fix` | OK | — | — |
| `spark:purge-fastcgi` | OK | — | — |
| `spark:restart-safe` | OK | — | — |
| `spark:traffic-spike-guard` | OK | — | — |
| `ux:journey-audit` | OK | — | — |
| `wallets:warm-summary-cache` | OK | — | — |

| `aiops:manual-run` | OK | Migrated to `parseParams()` + `optBool/optInt/optString`; no deprecated CLI option APIs. | — |
| `aiops:auto-run` | OK | Migrated to `parseParams()` + `optBool/optInt/optString`; no deprecated CLI option APIs. | — |
| `chat:unlock` | OK | Command documented and validated; uses `parseParams()` + safe helpers. | — |
## Notes

- `ops:commands:lint` outputs machine-readable results to `docs/next/bf_aiops_task_runs/commands_lint.json`.
- The lint command fails CI if any command lacks metadata, uses deprecated Spark APIs, or is missing safety flags.
