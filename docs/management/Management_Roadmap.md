# Management Roadmap

This roadmap sequences the rollout of management commands toward a fully autonomous platform.

## Phase 1 – Stabilization

**Commands involved**
- runtime:diagnose-502, spark:diagnose-503, fix:503, spark:purge-fastcgi, spark:restart-safe
- env:doctor, health:disk, health:cache, health:services
- logs:healthcheck, logs:summarize, logs:full-report
- config:lint, audit:psr4, routes:auth-audit, security:csp:audit
- ops:commands:audit, ops:commands:autofix
- ops:next-steps

**Dependencies**
- All commands registered in Console.php and discoverable by Spark.
- Ensure vendor bootstrapping so `php spark list` runs.

**Risk controls**
- Use Assisted mode by default; `--force` required for remediation.
- Write all incident findings to `/docs/next/`.

**Metrics improved**
- Reduced 502/503 MTTR
- Increased Spark command discoverability
- Reduced config drift incidents

## Phase 2 – Predictive Detection

**Commands involved**
- runtime:triage (proposed)
- runtime:cache-boot (proposed)
- ops:commands:inventory (proposed)
- config:drift (proposed)
- db:drift (proposed)
- security:secrets-audit (proposed)

**Dependencies**
- Phase 1 command stability.
- Consistent `docs/next/` snapshots.

**Risk controls**
- Audit-only outputs for drift/security commands.
- Fail fast when vendor/autoload breaks Spark discovery.

**Metrics improved**
- Earlier detection of cache boot failures
- Reduced config drift regressions
- Lower security exposure risk

## Phase 3 – Self-Healing

**Commands involved**
- ops:next-steps, ops:work
- runtime:diagnose-502 --force
- fix:503, spark:purge-fastcgi, spark:restart-safe
- runtime:cache-boot --force (proposed)
- ops:next-steps:sync (proposed)

**Dependencies**
- AiOps task pipeline stable (bf_aiops_tasks, ops:work).
- OpsWorker available for scheduled execution.

**Risk controls**
- Approved Auto only with explicit `--force`.
- Issue queue must support human override and rollback.

**Metrics improved**
- Reduced incident resolution time
- Increased auto-fix rate for cache and socket issues

## Phase 4 – Growth & Optimization

**Commands involved**
- marketing:automation-audit (proposed)
- growth:retention-watch (proposed)
- forecasts:refresh, forecasts:evaluate
- revenue:scan, revenue:cost-forecast (proposed)

**Dependencies**
- Reliable metrics pipelines and analytics data access.
- Ops dashboards consuming `docs/next/` outputs.

**Risk controls**
- All growth commands remain audit-only.
- Human approval for strategy changes.

**Metrics improved**
- Improved retention and campaign stability
- Cost forecasting accuracy

## Phase 5 – Autonomous Platform Ops

**Commands involved**
- ops:next-steps, ops:work (default execution path)
- runtime:triage, runtime:cache-boot (proposed)
- ops:next-steps:sync (proposed)
- ux:journey-audit (proposed)

**Dependencies**
- AiOps worker reliability and backpressure management.
- Clear policy for auto-approval vs human review.

**Risk controls**
- Continuous auditing, revert strategies, and AI/worker caps.
- Automated reporting to `/docs/next/` for every action.

**Metrics improved**
- Autonomous resolution rate
- Predictive incident prevention
- Reduced human intervention to approvals only

