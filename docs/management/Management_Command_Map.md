# Management Command Map

This map inventories the end-to-end Spark management commands needed to operate MyMI Wallet with minimal human intervention. It includes **existing commands** plus **recommended additions** (marked as "Proposed" in the purpose column) to cover observed gaps. It also accounts for the fact that `php spark list` currently fails due to missing vendor bootstrapping, so command discovery health is a first-class management concern. The map aligns with current runtime diagnostics, PSR-4 audits, config linting, AiOps workflows, and operational triage artifacts stored under `writable/triage/`.

| Category | Command Name | Purpose | Trigger | Risk Level | Automation Ready |
| --- | --- | --- | --- | --- | --- |
| Runtime | runtime:check | Confirm runtime sanity (PHP handler, writable, cache, routes). | On incident or deploy | Medium | Assisted |
| Runtime | runtime:diagnose-502 | Diagnose 502/503 gateways and optionally apply safe fixes. | On 502/503 | High | Assisted (auto-fix w/ --approve) |
| Runtime | spark:diagnose-503 | Legacy 503 diagnostics for cache, writable, upstream. | On 503 | Medium | Manual |
| Runtime | fix:503 | Apply safe 503 remediation steps. | On 503 | High | Approved Auto |
| Runtime | spark:purge-fastcgi | Remove stale FastCGI config targets. | On socket mismatch | High | Approved Auto |
| Runtime | spark:restart-safe | Trigger safe restart actions (guarded). | On handler mismatch | High | Approved Auto |
| Runtime | spark:traffic-spike-guard | Guard/limit burst traffic to protect the app. | On traffic anomaly | Medium | Assisted |
| Infrastructure | env:doctor | Snapshot environment, runtime, and socket state. | Weekly / on incident | Low | Assisted |
| Infrastructure | health:disk | Check disk usage, filesystem pressure. | Daily | Low | Assisted |
| Infrastructure | health:cache | Verify cache health and permissions. | Daily | Medium | Assisted |
| Infrastructure | health:services | Verify external dependencies and key app services. | Daily | Medium | Assisted |
| Infrastructure | health:git-safety | Detect uncommitted changes or repo drift. | Weekly | Low | Assisted |
| Logs/Observability | logs:healthcheck | Validate log sinks and log write ability. | Daily | Medium | Assisted |
| Logs/Observability | logs:summarize | Summarize logs for operator triage. | Daily | Medium | Assisted |
| Logs/Observability | logs:full-report | Produce extended log report for incidents. | On incident | Medium | Assisted |
| Security | security:csp:audit | Audit CSP policies and coverage. | Weekly | Medium | Assisted |
| Security | routes:auth-audit | Validate auth coverage on public routes. | Weekly | Medium | Assisted |
| Security | audit:psr4 | PSR-4 compliance audit and CI enforcement. | Weekly / CI | Medium | Assisted |
| Config Drift | config:lint | Lint Services config signatures vs CI4. | CI / on deploy | Medium | Assisted |
| Data Integrity | db:inventory | Generate DB inventory & docs; detect drift. | Monthly | Medium | Assisted |
| Data Integrity | db:apply-docs | Apply SQL in docs/mysql (manual gating). | Manual | High | Manual |
| Data Integrity | migrate:dry-run | Validate migrations without writes. | Pre-deploy | Medium | Assisted |
| Alerts | alerts:audit | Audit broker alerts vs internal alerts. | Weekly | Medium | Assisted |
| Alerts | alerts:parse-test | Parse broker email samples for normalization. | On demand | Low | Manual |
| Alerts | discord:list | Audit Discord channel/webhook config. | On demand | Low | Manual |
| Alerts | discord:process-queue | Dispatch queued Discord messages. | Hourly | Medium | Approved Auto |
| Alerts | discord:test | Send a test Discord alert. | On demand | Medium | Manual |
| Alerts | discord:test-liquidity | Test liquidity alert pipeline. | On demand | Medium | Manual |
| Alerts | discord:wire-check | Validate Discord tables and env. | On demand | Low | Assisted |
| Alerts | mail:send | Send queued mail jobs. | Hourly | Medium | Approved Auto |
| Alerts | mail:send-test | Send branded test emails. | On demand | Medium | Manual |
| Alerts | mail:test | Send SMTP test email. | On demand | Medium | Manual |
| Alerts | mail:verify | Verify SMTP settings. | On demand | Medium | Manual |
| Alerts | email:test | Test email via mailService. | On demand | Medium | Manual |
| Marketing | contentengine:smoke | End-to-end content engine test. | On demand | Medium | Manual |
| Marketing | content:ingest-sample | Test ingest sample data. | On demand | Medium | Manual |
| Marketing | news:audit | Audit marketing ingestion/summarization. | Weekly | Medium | Assisted |
| Growth | forecasts:refresh | Refresh forecasts for alerts. | Daily | Medium | Approved Auto |
| Growth | forecasts:evaluate | Evaluate forecast model outcomes. | Weekly | Medium | Assisted |
| Financial / Revenue | revenue:scan | Scan repo for revenue stream docs. | Monthly | Low | Assisted |
| User Experience | wallets:warm-summary-cache | Warm cache for active wallets. | Daily | Medium | Approved Auto |
| User Experience | auth:smoke | Auth smoke test (user journey). | Daily | Medium | Assisted |
| User Experience | auth:audit | Myth:Auth lifecycle checks. | Weekly | Medium | Assisted |
| User Experience | auth:funnel-check | Validate auth funnel events. | Daily | Low | Assisted |
| CI/CD | ops:commands:audit | Ensure commands comply with discovery standards. | Pre-merge | Low | Assisted |
| CI/CD | ops:commands:autofix | Fix illegal Spark constructors (guarded). | Pre-merge | High | Approved Auto |
| AI Ops | ops:next-steps | Aggregate issues and write docs/next snapshots. | Daily | Medium | Approved Auto |
| AI Ops | ops:fetch-commands | Pull ops commands from inbox (IMAP). | Hourly | Medium | Approved Auto |
| AI Ops | ops:analyze-commands | Analyze ops inbox with AI. | Hourly | Medium | Approved Auto |
| AI Ops | ops:work | Execute AiOps task queue safely. | Hourly | Medium | Fully Autonomous |
| AI Ops | aiops:seed | Seed AiOps caps defaults. | On demand | Medium | Manual |
| Infrastructure | app:update | Apply safe app update actions. | On demand | Medium | Assisted |
| Runtime (Proposed) | runtime:triage | **Proposed**: Consolidate 502/503 + envdoctor triage into a single report that writes docs/next and a writable/triage snapshot. | On incident | High | Assisted |
| Runtime (Proposed) | runtime:cache-boot | **Proposed**: Verify cache bootstrap, warm critical caches, validate writable permissions. | On deploy or 503 | Medium | Assisted |
| Security (Proposed) | security:secrets-audit | **Proposed**: Validate env, config, and docs for leaked secrets or missing rotations. | Weekly | Medium | Assisted |
| Config Drift (Proposed) | config:drift | **Proposed**: Compare deployed config vs repo baseline, emit drift report. | Weekly / on deploy | Medium | Assisted |
| CI/CD (Proposed) | ops:commands:inventory | **Proposed**: Generate canonical command inventory from Console.php + spark list (when available), detect missing registrations. | Pre-merge | Low | Assisted |
| Data Integrity (Proposed) | db:drift | **Proposed**: Compare live schema vs docs/mysql inventory. | Monthly | Medium | Assisted |
| AI Ops (Proposed) | ops:next-steps:sync | **Proposed**: Diff last snapshot, queue only net-new issues to bf_aiops_tasks. | Daily | Low | Approved Auto |
| Marketing (Proposed) | marketing:automation-audit | **Proposed**: Validate CRON/ops scripts for marketing campaigns. | Weekly | Medium | Assisted |
| Growth (Proposed) | growth:retention-watch | **Proposed**: Detect churn or retention anomalies via metrics. | Weekly | Medium | Assisted |
| User Experience (Proposed) | ux:journey-audit | **Proposed**: Validate key user journeys for regressions. | Weekly | Medium | Assisted |
| Financial / Revenue (Proposed) | revenue:cost-forecast | **Proposed**: Forecast API/infra spend and flag overruns. | Weekly | Medium | Assisted |
