# Command Discovery and Design

This document translates existing documentation into a management-oriented Spark command inventory. It does **not** implement commands; it scopes them using existing docs and flags unknowns.

## 🧠 Management Intent Mapping

| Management intent | Docs evidence | Command category |
| --- | --- | --- |
| Runtime stability, FastCGI, 502/503 prevention | Runtime diagnostic + remediation commands already mapped as operational requirements. | Runtime & Infra |【F:docs/management/Management_Command_Map.md†L7-L13】
| User lifecycle onboarding (registration → first login → onboarding modal) | Auth registration + onboarding modal walkthrough docs. | User Lifecycle |【F:docs/auth/registration_flow_audit.md†L1-L52】【F:docs/auth/onboarding_first_login_modal.md†L1-L30】
| Budget health & cashflow accuracy | Budget controller API and degraded-state expectations. | Financial Health |【F:docs/budget/budget-controller.md†L1-L110】
| Portfolio + forecasts health | Investments dashboard and forecast endpoints. | Investments |【F:docs/dashboards/InvestmentsController.md†L1-L56】
| Broker alert ingestion & trade alerts | ThinkorSwim ingestion pipeline and cron flow. | Investments / Alerts |【F:docs/alerts/thinkorswim_broker_ingestion.md†L1-L63】
| Projects onboarding | MyProjects marketing documentation references modules, routes, and workflow templates but lacks product onboarding. | Projects |【F:docs/marketing/07-myprojects-real-estate.md†L1-L83】
| Marketing automation health | Marketing audits, automation, and campaign docs. | Marketing |【F:docs/management/Management_Command_Map.md†L41-L46】
| Security and compliance posture | Security + routes/csp audits in command map. | Security |【F:docs/management/Management_Command_Map.md†L22-L24】
| UX and adoption confidence | Onboarding + cache warming commands signal UX health expectations. | UX & Adoption |【F:docs/management/Management_Command_Map.md†L47-L50】

## 🧩 Proposed Management Spark Commands

> Commands are scoped from existing docs, including the current management command map and proposed additions. No new features are invented; unknown inputs are flagged in outputs.

| Category | Command name (proposed) | Purpose | Inputs | Outputs | Safe / Destructive | Emits ops:next-steps? | AIOps-eligible? |
| --- | --- | --- | --- | --- | --- | --- | --- |
| Runtime & Infra | runtime:triage | Consolidate runtime + envdoctor + FastCGI triage into one report. | Server snapshots, cache state, socket checks | `docs/next/Runtime-Triage.md` + snapshot JSON | Read-only | Yes | Yes |【F:docs/management/Recommended_New_Commands.md†L12-L21】
| Runtime & Infra | runtime:cache-boot | Validate cache boot and warm critical caches. | Cache paths, writable perms | `docs/next/Cache-Boot-Report.md` | Guarded (--force) | Yes | Yes |【F:docs/management/Recommended_New_Commands.md†L22-L31】
| Runtime & Infra | runtime:diagnose-502 | Existing command for 502/503 diagnostics. | N/A | CLI output + logs | Guarded (--force) | Yes | Yes |【F:docs/management/Management_Command_Map.md†L7-L10】
| User Lifecycle | auth:smoke | Existing auth smoke tests for login flows. | Auth endpoints | CLI output + logs | Read-only | Yes | Yes |【F:docs/management/Management_Command_Map.md†L48-L50】
| User Lifecycle | ux:journey-audit | Validate critical onboarding/UX journeys. | Auth + onboarding steps | `docs/next/UX-Journey.md` | Read-only | Yes | Yes |【F:docs/management/Recommended_New_Commands.md†L92-L100】
| Financial Health | budget:health-audit | (Proposed) Audit budget summary health and degraded flags. | `/API/Budget/*` responses | `docs/next/Budget-Health.md` | Read-only | Yes | Yes |【F:docs/budget/budget-controller.md†L1-L110】
| Financial Health | wallets:warm-summary-cache | Existing cache warm command for wallet summaries. | User IDs / cache | CLI output + logs | Guarded (scheduled) | Yes | Yes |【F:docs/management/Management_Command_Map.md†L47-L48】
| Investments | forecasts:refresh | Existing forecast refresh command. | Forecast tables | CLI output + logs | Guarded | Yes | Yes |【F:docs/management/Management_Command_Map.md†L44-L45】
| Investments | investments:forecast-health | (Proposed) Verify forecast freshness and heatmap availability. | Forecast endpoints | `docs/next/Forecast-Health.md` | Read-only | Yes | Yes |【F:docs/dashboards/InvestmentsController.md†L31-L56】
| Investments / Alerts | alerts:ingestion-health | (Proposed) Validate broker ingestion pipeline and alert queues. | Scraper tables / cron logs | `docs/next/Alerts-Ingestion.md` | Read-only | Yes | Yes |【F:docs/alerts/thinkorswim_broker_ingestion.md†L1-L63】
| Projects | projects:onboarding-audit | (Proposed) Report on Projects onboarding readiness and templates. | Project workflows, template inventory | `docs/next/Projects-Onboarding.md` | Read-only | No | Yes |【F:docs/marketing/07-myprojects-real-estate.md†L1-L83】
| Marketing | marketing:automation-audit | Validate CRON + campaign automations. | Marketing queues / cron | `docs/next/Marketing-Automation.md` | Read-only | Yes | Yes |【F:docs/management/Recommended_New_Commands.md†L72-L80】
| Security | security:secrets-audit | Scan config/logs for secrets and rotation gaps. | Env + config | `docs/next/Security-Secrets.md` | Read-only | Yes | Yes |【F:docs/management/Recommended_New_Commands.md†L62-L70】
| Config Drift | config:drift | Compare config snapshots and detect drift. | Config + env | `docs/next/Config-Drift.md` | Read-only | Yes | Yes |【F:docs/management/Recommended_New_Commands.md†L32-L40】
| Data Integrity | db:drift | Compare live schema vs docs inventory. | DB metadata / docs/mysql | `docs/next/DB-Drift.md` | Read-only | Yes | Yes |【F:docs/management/Recommended_New_Commands.md†L52-L60】
| Ops & AI | ops:next-steps | Aggregate audits into next-steps docs and queue. | Analyzer outputs | `docs/next/Next-Steps.md` | Read-only | Yes | Yes |【F:docs/management/Management_Command_Map.md†L53-L56】
| Ops & AI | ops:next-steps:sync | Diff snapshots and queue net-new issues. | Snapshot history | `docs/next/Next-Steps-Diff.md` | Read-only | Yes | Yes |【F:docs/management/Recommended_New_Commands.md†L112-L120】
| Ops & AI | ops:work | Process AiOps task queue safely. | `bf_aiops_tasks` | CLI output + logs | Guarded | N/A | Yes |【F:docs/management/Management_Command_Map.md†L55-L56】

> Unknowns: Budget/forecast health audits need explicit endpoint coverage definitions and success criteria (not yet documented in `/docs/product`).【F:docs/budget/budget-controller.md†L1-L110】【F:docs/dashboards/InvestmentsController.md†L31-L56】

## 🔐 Automation Safety Classification

| Command | Safety class | Rationale |
| --- | --- | --- |
| runtime:triage | Read-only | Report-only output to `docs/next/`. |【F:docs/management/Recommended_New_Commands.md†L12-L21】
| runtime:cache-boot | Guarded (--force) | Cache changes are allowed only with explicit confirmation. |【F:docs/management/Recommended_New_Commands.md†L22-L31】
| config:drift | Read-only | Drift reports should not edit config. |【F:docs/management/Recommended_New_Commands.md†L32-L40】
| db:drift | Read-only | Schema diffs require human approval for fixes. |【F:docs/management/Recommended_New_Commands.md†L52-L60】
| security:secrets-audit | Read-only | Detection-only with redaction guidance. |【F:docs/management/Recommended_New_Commands.md†L62-L70】
| marketing:automation-audit | Read-only | Audit-only marketing automation review. |【F:docs/management/Recommended_New_Commands.md†L72-L80】
| ux:journey-audit | Read-only | UX audits should never mutate state. |【F:docs/management/Recommended_New_Commands.md†L92-L100】
| ops:next-steps | Approved Auto | Generates docs + queues tasks via AiOps. |【F:docs/management/Automation_Levels.md†L67-L83】
| ops:work | Fully Autonomous | Worker runs tasks without human interaction. |【F:docs/management/Automation_Levels.md†L84-L85】

## 🔄 Integration Points

| Command | ops:next-steps | ops:work | Chat guidance | Docs snapshots | CI checks |
| --- | --- | --- | --- | --- | --- |
| runtime:triage | Yes | Yes | Optional | Yes (`docs/next/Runtime-Triage.md`) | No |【F:docs/management/Recommended_New_Commands.md†L12-L21】
| runtime:cache-boot | Yes | Yes | Optional | Yes (`docs/next/Cache-Boot-Report.md`) | No |【F:docs/management/Recommended_New_Commands.md†L22-L31】
| config:drift | Yes | Yes | Optional | Yes (`docs/next/Config-Drift.md`) | Yes |【F:docs/management/Recommended_New_Commands.md†L32-L40】
| db:drift | Yes | Yes | Optional | Yes (`docs/next/DB-Drift.md`) | Yes |【F:docs/management/Recommended_New_Commands.md†L52-L60】
| security:secrets-audit | Yes | Yes | Optional | Yes (`docs/next/Security-Secrets.md`) | Yes |【F:docs/management/Recommended_New_Commands.md†L62-L70】
| marketing:automation-audit | Yes | Yes | Optional | Yes (`docs/next/Marketing-Automation.md`) | No |【F:docs/management/Recommended_New_Commands.md†L72-L80】
| ux:journey-audit | Yes | Yes | Yes | Yes (`docs/next/UX-Journey.md`) | No |【F:docs/management/Recommended_New_Commands.md†L92-L100】
| ops:next-steps | N/A | Yes | Optional | Yes (`docs/next/Next-Steps.md`) | Yes |【F:docs/management/Management_Command_Map.md†L53-L56】
| ops:work | N/A | N/A | Optional | Task logs | Yes |【F:docs/management/Management_Command_Map.md†L55-L56】

