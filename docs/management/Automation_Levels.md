# Automation Levels

## Tier Definitions

| Tier | Description |
| --- | --- |
| Manual | Human runs command and applies changes. |
| Assisted | Command suggests actions or writes reports; no changes by default. |
| Approved Auto | Requires explicit `--force` or similar confirmation. |
| Fully Autonomous | Runs via OpsWorker/AiOps tasks without manual intervention. |

## Command → Tier Mapping

### Manual
- aiops:seed
- alerts:parse-test
- contentengine:smoke
- content:ingest-sample
- discord:list
- discord:test
- discord:test-liquidity
- mail:send-test
- mail:test
- mail:verify
- email:test
- db:apply-docs

### Assisted
- runtime:check
- runtime:diagnose-502 (without --force)
- spark:diagnose-503
- spark:traffic-spike-guard
- env:doctor
- health:disk
- health:cache
- health:services
- health:git-safety
- logs:healthcheck
- logs:summarize
- logs:full-report
- security:csp:audit
- routes:auth-audit
- audit:psr4
- config:lint
- db:inventory
- migrate:dry-run
- alerts:audit
- discord:wire-check
- news:audit
- forecasts:evaluate
- revenue:scan
- wallets:warm-summary-cache (manual trigger) if not scheduled
- auth:smoke
- auth:audit
- auth:funnel-check
- ops:commands:audit
- ops:commands:inventory (proposed)
- config:drift (proposed)
- db:drift (proposed)
- security:secrets-audit (proposed)
- marketing:automation-audit (proposed)
- growth:retention-watch (proposed)
- ux:journey-audit (proposed)
- revenue:cost-forecast (proposed)
- ops:next-steps:sync (proposed, in dry-run)

### Approved Auto
- runtime:diagnose-502 --force
- fix:503
- spark:purge-fastcgi
- spark:restart-safe
- discord:process-queue
- mail:send
- forecasts:refresh
- wallets:warm-summary-cache (scheduled)
- ops:fetch-commands
- ops:analyze-commands
- ops:next-steps
- ops:commands:autofix
- runtime:triage (proposed with --force)
- runtime:cache-boot (proposed with --force)
- ops:next-steps:sync (proposed in enqueue mode)

### Fully Autonomous
- ops:work

