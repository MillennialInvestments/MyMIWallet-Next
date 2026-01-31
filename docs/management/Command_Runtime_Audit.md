# Command Runtime Audit

This audit validates every Spark command under `app/Commands/**` against runtime contracts:

- Extends `SafeBaseCommand` (or `BaseCommand` where explicitly required).
- No illegal constructors.
- `$group`, `$name`, `$description` metadata defined.
- PHP 8.2 compatibility (heuristic scan for deprecated runtime APIs).
- No deprecated Spark APIs (`$this->option()`, `$this->getOption()`, etc.).
- Safety flags (`--dry-run`, `--approve`) present on destructive commands.

## Audit Table

| Command name | Status | Failure reason | Fix required |
| --- | --- | --- | --- |
| `aiops:seed` | OK | — | — |
| `alerts:audit` | OK | — | — |
| `alerts:parse-test` | OK | — | — |
| `app:update` | OK | — | — |
| `audit:psr4` | OK | — | — |
| `auth:audit` | OK | — | — |
| `auth:funnel-check` | OK | — | — |
| `auth:smoke` | OK | — | — |
| `cache:audit` | OK | — | — |
| `codex:review` | OK | — | — |
| `codex:review:commit` | OK | — | — |
| `codex:review:list` | OK | — | — |
| `codex:review:publish` | OK | — | — |
| `config:lint` | OK | — | — |
| `content:ingest-sample` | OK | — | — |
| `contentengine:smoke` | OK | — | — |
| `db:apply-docs` | OK | — | — |
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
| `migrate:dry-run` | OK | — | — |
| `news:audit` | OK | — | — |
| `ops:analyze-commands` | OK | — | — |
| `ops:commands:audit` | OK | — | — |
| `ops:commands:autofix` | OK | — | — |
| `ops:fetch-commands` | OK | — | — |
| `ops:filesystem:lint` | OK | — | — |
| `ops:lint:commands` | OK | — | — |
| `ops:next-steps` | OK | — | — |
| `ops:work` | OK | — | — |
| `revenue:scan` | OK | — | — |
| `routes:auth-audit` | OK | — | — |
| `runtime:check` | OK | — | — |
| `runtime:diagnose-502` | OK | — | — |
| `security:csp:audit` | OK | — | — |
| `spark:diagnose-503` | OK | — | — |
| `spark:purge-fastcgi` | OK | — | — |
| `spark:restart-safe` | OK | — | — |
| `spark:traffic-spike-guard` | OK | — | — |
| `wallets:warm-summary-cache` | OK | — | — |

## Notes

- `ops:lint:commands` outputs machine-readable results to `docs/next/bf_aiops_task_runs/commands_lint.json`.
- The lint command fails CI if any command lacks metadata, uses deprecated Spark APIs, or is missing safety flags.
