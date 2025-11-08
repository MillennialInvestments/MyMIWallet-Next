# Roadmap & Phase Plan

## Overview
Defines phased delivery from core stabilization through growth/AI, anchoring goals, KPIs, risks, and sprint sequencing for MyMI Wallet operations.

## Inventory (Auto-collected)
- Generated on: 2025-10-06 21:26 UTC
- Tooling: grep/awk/php spark/composer/git

## Status Table
| Area / Item | Current Status | Action Needed | Priority | Notes |
|---|---|---|---|---|
| Phase 1 — Stabilization (Foundation & Security) | ⚙️ Needs Review | Refactor error handling + secrets policy; target 99.9% uptime & 0 blocker vulns. | 🟠 High | Sprint 1 exit: CI4 config audit + nonce/CSP hardening complete. |
| Phase 2 — Automation & Telemetry | ⚙️ Needs Review | Add cron observability + retry budget; KPI: 95% cron success, <5 min MTTR. | 🟠 High | Dependent on Marketing/Alerts controllers gaining instrumentation. |
| Phase 3 — Exchange & Projects Revamp | ❌ Broken/Unknown | Decouple exchange connectors & deliver integration tests before go-live. | 🔴 Critical | Entry requires defined connector interfaces + DB migration map. |
| Phase 4 — Monetization & Subscription Offers | ⚙️ Needs Review | Finalize MyMI Gold pricing + fee flow; KPI: ARPU baseline + settlement accuracy. | 🟠 High | Blocked by exchange revamp and accurate asset valuations. |
| Phase 5 — Growth & AI Analytics | ⚙️ Needs Review | Instrument analytics cost KPIs + ML pipeline guardrails. | 🟡 Medium | Requires telemetry from prior phases before predictive rollout. |

## Findings (Evidence)
- Error views deliver inline email alerts and DB writes, underscoring need for centralized handlers before stabilization exit.【52fa4c†L20-L44】【245b84†L52-L75】
- Marketing/management cron endpoints run without throttling or alerting, highlighting telemetry backlog for Phase 2.【800178†L1326-L1434】
- Exchange library still constructs connectors directly and touches DB models without abstraction, blocking revamp readiness.【a86618†L1-L170】
- MyMI Gold library keeps placeholder contract addresses and manual pricing, requiring monetization workflow updates.【0a97a8†L42-L159】
- Analytics library aggregates KPI targets but lacks API cost & uptime instrumentation, deferring AI phase metrics.【3f6996†L27-L150】

## Required Fixes / Tasks
- [ ] Sprint 1: Ship security + UI backlog (docs 08–09) and migrate error mailers into service layer (owner: Codex).
- [ ] Sprint 1: Publish rotating secret schedule leveraging [env-baseline-keys.md](../ops/runbooks/env-baseline-keys.md) & `alphavantage-rotation-playbook.md` (owner: Codex).
- [ ] Sprint 2: Coordinate cron telemetry UAT via [marketing-cron-playbook.md](../ops/runbooks/marketing-cron-playbook.md) with stakeholder sign-off (owner: Teddy/manual).

## Links & References
- `docs/operations/01-foundation.md`, `08-security-compliance.md`, `09-frontend-ui.md`
- `app/Modules/APIs/Controllers/ManagementController.php`
- `app/Libraries/MyMIExchange.php`, `app/Libraries/MyMIGold.php`, `app/Libraries/MyMIAnalytics.php`
