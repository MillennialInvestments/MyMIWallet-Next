# Next Codex Tasks

## 🔍 Top Documentation Gaps

> Source of truth: The `/docs` overview does not currently enumerate a `/docs/product` directory, so product-level guides are missing and should be created before new workflows are introduced.【F:docs/OVERVIEW.md†L5-L28】

| Feature / Doc Name | What’s Missing | Impact (User / Ops / Support / AI) | Severity |
| --- | --- | --- | --- |
| Product documentation index (`docs/product/*`) | No product-level docs exist; there is no canonical product onboarding or feature catalog. | User + Support + AI | P1 |
| Registration + verification | The registration audit is technical and lacks a user-facing workflow or screenshots for the `/register` and `/activate-account` journey. | User + Support | P1 |【F:docs/auth/registration_flow_audit.md†L1-L52】
| Onboarding modal walkthrough | The onboarding modal describes steps but does not include UX copy, screen references, or visual walkthroughs for each step. | User + Support + AI | P1 |【F:docs/auth/onboarding_first_login_modal.md†L1-L30】
| Budget setup | Budget controller reference is API-focused; it lacks a UI onboarding flow or “how to complete your first budget” guide. | User + Support | P1 |【F:docs/budget/budget-controller.md†L1-L104】
| Investments / portfolio setup | Investments dashboard doc focuses on data sources but lacks a user setup checklist for portfolios, watchlists, and forecast usage. | User + Support | P1 |【F:docs/dashboards/InvestmentsController.md†L1-L56】
| Trade alerts | ThinkorSwim ingestion doc focuses on backend cron and does not provide a user-facing alert onboarding or alert configuration guide. | User + Support | P1 |【F:docs/alerts/thinkorswim_broker_ingestion.md†L1-L63】
| Projects onboarding | MyProjects is described in marketing materials, but there is no product onboarding guide for the Projects dashboard or workflows. | User + Support + Ops | P2 |【F:docs/marketing/07-myprojects-real-estate.md†L1-L83】

## 🧭 Features Requiring UX Walkthroughs

| Feature | Screen flows that need walkthroughs | Recommended assets | Placement |
| --- | --- | --- | --- |
| Registration & verification | `/register` → `/register/success` → `/activate-account` → `/login` → `/Dashboard` | Screenshots + step-by-step guide | Onboarding modal + Help panel + Docs |【F:docs/auth/registration_flow_audit.md†L1-L52】
| Onboarding modal (first login) | Modal steps for profile, employment, income, debt, expenses, watchlist | Screenshots + short GIF walkthrough | Onboarding modal + Help panel |【F:docs/auth/onboarding_first_login_modal.md†L1-L30】
| Budget setup | Budget Hub (`/Budget`) + API-backed summary cards | Screenshots + annotated checklist | Help panel + Docs |【F:docs/budget/budget-controller.md†L1-L104】
| Portfolio setup | Investments dashboard (`/Investments`) + forecast modal | Screenshots + diagram of data sources | Docs + Chat guidance |【F:docs/dashboards/InvestmentsController.md†L1-L56】
| Trade alerts | Broker ingestion & alert flows for ThinkorSwim | Screenshots + short video | Help panel + Docs |【F:docs/alerts/thinkorswim_broker_ingestion.md†L1-L63】
| Projects onboarding | MyProjects dashboard, intake, and workflow templates | Screenshots + flow diagram | Docs only (until product UI is finalized) |【F:docs/marketing/07-myprojects-real-estate.md†L1-L83】

## ⚙️ Features to Wire into ops:next-steps

| Feature | Trigger condition | Suggested ops:next-steps issue title | Severity | Enqueue bf_aiops_tasks? |
| --- | --- | --- | --- | --- |
| Onboarding completion | Missing budget/investment setup after first verified login (per onboarding progress checks). | “Onboarding incomplete: budget/investment setup missing” | P1 | Yes |【F:docs/onboarding/budget_investments_quick_setup.md†L1-L25】【F:docs/auth/onboarding_first_login_modal.md†L1-L30】
| Budget data health | `/API/Budget/summary` returns degraded or missing expected data (income/expenses). | “Budget summary degraded: check budget inputs and cache” | P1 | Yes |【F:docs/budget/budget-controller.md†L1-L110】
| Investments forecasts | Forecast endpoints fail or stale `lastEvaluatedAt`/confidence data. | “Forecast data stale: refresh investment forecasts” | P1 | Yes |【F:docs/dashboards/InvestmentsController.md†L31-L56】
| Trade alerts ingestion | Broker email ingestion cron fails or no new rows in `bf_investment_scraper`. | “Trade alerts ingestion stalled (ThinkorSwim)” | P0 | Yes |【F:docs/alerts/thinkorswim_broker_ingestion.md†L1-L63】
| Projects workflows | Projects intake or workflow templates missing for MyProjects campaigns. | “MyProjects onboarding gap: workflow templates missing” | P2 | No |【F:docs/marketing/07-myprojects-real-estate.md†L1-L83】

## 💬 Features to Surface in Chat Onboarding

| Doc / Feature | When chat should surface it | Chat behavior | Required metadata |
| --- | --- | --- | --- |
| Registration + verification | First login / first failure | Explain steps + detect activation mismatch | `doc_slug=auth-registration`, `feature_key=auth.register` |【F:docs/auth/registration_flow_audit.md†L1-L52】
| Onboarding modal walkthrough | First verified login | Guide step-by-step | `doc_slug=auth-onboarding-modal`, `feature_key=onboarding.modal` |【F:docs/auth/onboarding_first_login_modal.md†L1-L30】
| Budget + investments quick setup | First budget access or missing onboarding steps | Guide step-by-step + detect missing inputs | `doc_slug=onboarding-budget-investments`, `feature_key=onboarding.budget_investments` |【F:docs/onboarding/budget_investments_quick_setup.md†L1-L41】
| Budget API reference | First Budget error or degraded response | Explain + suggest fixes | `doc_slug=budget-controller`, `feature_key=budget.api` |【F:docs/budget/budget-controller.md†L1-L110】
| Investments dashboard | First access to `/Investments` or forecast failure | Explain + guide | `doc_slug=investments-dashboard`, `feature_key=investments.dashboard` |【F:docs/dashboards/InvestmentsController.md†L1-L56】
| Trade alerts ingestion | First alert failure or broker ingestion error | Explain + detect misconfiguration | `doc_slug=alerts-thinkorswim`, `feature_key=alerts.broker_ingestion` |【F:docs/alerts/thinkorswim_broker_ingestion.md†L1-L63】
| MyProjects onboarding | First access to Projects dashboards | Explain + guide high-level | `doc_slug=projects-real-estate`, `feature_key=projects.onboarding` |【F:docs/marketing/07-myprojects-real-estate.md†L1-L83】

## 🤖 AIOps Task Candidates

| Task key (proposed) | Source document(s) | Safety classification | Expected output |
| --- | --- | --- | --- |
| onboarding:budget-investments:detect-missing | `docs/onboarding/budget_investments_quick_setup.md` | Safe | Report to `docs/next/` + ops:next-steps issue |【F:docs/onboarding/budget_investments_quick_setup.md†L1-L41】
| budget:summary:degraded-check | `docs/budget/budget-controller.md` | Safe | Report to `docs/next/` + ops:next-steps issue |【F:docs/budget/budget-controller.md†L1-L110】
| investments:forecast:stale-check | `docs/dashboards/InvestmentsController.md` | Safe | Report to `docs/next/` + ops:next-steps issue |【F:docs/dashboards/InvestmentsController.md†L31-L56】
| alerts:thinkorswim:ingestion-health | `docs/alerts/thinkorswim_broker_ingestion.md` | Safe-with-approval | Report + optional cron retry suggestion |【F:docs/alerts/thinkorswim_broker_ingestion.md†L1-L63】
| auth:onboarding:modal-coverage | `docs/auth/onboarding_first_login_modal.md` | Safe | Docs update suggestion + ops:next-steps issue |【F:docs/auth/onboarding_first_login_modal.md†L1-L30】
| projects:onboarding:doc-gap | `docs/marketing/07-myprojects-real-estate.md` | Human-only | Docs gap report for Projects workflows |【F:docs/marketing/07-myprojects-real-estate.md†L1-L83】

## 🚀 Next Codex Tasks (Execution Order)

### 🔹 Phase 1: Low-Risk / High-Value
- Draft product-level onboarding docs based on existing auth, budget, investments, and alerts references (no infra changes).【F:docs/auth/registration_flow_audit.md†L1-L52】【F:docs/auth/onboarding_first_login_modal.md†L1-L30】【F:docs/budget/budget-controller.md†L1-L104】【F:docs/dashboards/InvestmentsController.md†L1-L56】【F:docs/alerts/thinkorswim_broker_ingestion.md†L1-L63】
- Add chat onboarding intent mappings for registration, onboarding modal, budget setup, investments dashboard, and alerts ingestion references.【F:docs/auth/registration_flow_audit.md†L1-L52】【F:docs/auth/onboarding_first_login_modal.md†L1-L30】【F:docs/onboarding/budget_investments_quick_setup.md†L1-L41】
- Cross-link existing budget and investments docs in onboarding help surfaces to reduce support burden.【F:docs/budget/budget-controller.md†L1-L104】【F:docs/dashboards/InvestmentsController.md†L1-L56】

### 🔹 Phase 2: Safe Automation
- Define audit-only Spark commands that write snapshots for onboarding completion, budget health, and forecast freshness (ops:next-steps integrations only).【F:docs/onboarding/budget_investments_quick_setup.md†L1-L41】【F:docs/budget/budget-controller.md†L1-L110】【F:docs/dashboards/InvestmentsController.md†L31-L56】
- Add reports for trade alert ingestion health and cron status without auto-fixing or modifying data.【F:docs/alerts/thinkorswim_broker_ingestion.md†L1-L63】

### 🔹 Phase 3: Stakeholder-Approved Tasks
- Add automation that retries broker email ingestion or modifies cron schedules (requires Ops approval + evidence from ingestion reports).【F:docs/alerts/thinkorswim_broker_ingestion.md†L1-L63】
- Introduce Projects onboarding workflows or UI changes (requires Product + Compliance approval; gather UX walkthrough drafts first).【F:docs/marketing/07-myprojects-real-estate.md†L1-L83】

