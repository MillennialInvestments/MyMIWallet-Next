# MyMI Wallet Platform Completion Roadmap

Baseline: `8dfb2c3459a2e3be30f696c582bf2f930ebe0897`

This roadmap is organized by risk and dependency, not by the apparent convenience of a UI feature. Each catalog item must be implemented as one governed Golden Task or split into smaller successor tasks before source changes begin.

## Delivery rules

1. Start every source task from current canonical `main`, never from this review clone or a stale PR branch.
2. Use the exact task/worktree returned by TBI AIOps. Do not manually commit or merge.
3. Keep a single task within a 270-second automated run budget. If discovery proves it cannot fit, stop and create atomic successors.
4. Limit initial model context to six files and 48 KiB. Deterministic scans should produce summaries before a model reads code.
5. Evidence must name the exact SHA, commands, exit codes, environment, risks, rollback, and remaining gaps.
6. No production mutation, controlled auth mutation, database write, credential rotation, payment/broker call, deploy, or history rewrite without the named approval gate.
7. A route returning 200 is not enough. Verify authorization, correctness, persistence, error behavior, observability, and user-visible outcome.
8. Preserve superseded branches/PRs as linked evidence until a current successor is merged and reconciled.

## Wave 0 — Incident containment and trustworthy automation

Exit criteria:

- exposed credentials are revoked/rotated by their owners;
- tracked configuration is sanitized;
- nested secret scanning is enforced;
- AIOps auto/manual workflows invoke registered commands and pass controlled tests;
- all workflow YAML is validated;
- release-critical CI checks fail correctly;
- current PR/task lineage and launch evidence have one canonical successor.

Tasks: `MYMI-GTM-001` through `MYMI-GTM-012`.

No other wave can produce a release decision while credential containment is open. Read-only discovery may continue in parallel.

## Wave 1 — Identity and account integrity

Exit criteria:

- one canonical auth runtime and compatibility boundary are documented;
- schema drift is measured in every target environment;
- identity migration/backfill is reversible and proven on isolated data;
- login, registration, verification, reset, logout/session, 2FA, and approved connectors pass controlled tests;
- failures produce safe user messages and useful internal evidence without leaking sensitive data.

Tasks: `MYMI-GTM-013` through `MYMI-GTM-021`.

## Wave 2 — Route and access-control integrity

Exit criteria:

- a runtime-derived route/controller manifest has no unexplained target gaps;
- every endpoint is classified by caller and mutation behavior;
- auth, authorization, CSRF/signature, HTTP verb, rate limit, and audit policies are enforced;
- admin/internal/cron/webhook endpoints are not reachable through accidental public paths;
- CSP and secure response/cookie policy are tested, with explicit exceptions documented.

Tasks: `MYMI-GTM-022` through `MYMI-GTM-031`.

## Wave 3 — Core financial journeys

Exit criteria:

- wallet/ledger invariants are explicit and tested;
- financial mutations are transactional, authorized, idempotent, auditable, and reconcilable;
- dashboard/onboarding, budgets, bank aggregation, investments, trades, goals, research/news, alerts, entitlements, support, and privacy flows pass representative journeys;
- external integrations use sandbox/test credentials and defined degradation behavior.

Tasks: `MYMI-GTM-032` through `MYMI-GTM-045`.

## Wave 4 — Extended product domains

Exit criteria:

- each extended surface is either independently certified for launch, explicitly feature-flagged/off, or formally outside the approved release scope;
- chain/broker/market integrations use kill switches, retry/idempotency rules, and reconciliation;
- no domain can bypass the Wave 2 access-control contract.

Tasks: `MYMI-GTM-046` through `MYMI-GTM-054`.

## Wave 5 — Customer experience and compliance ownership

Exit criteria:

- public pages, content, legal links, documentation, and SEO are internally consistent;
- registration presents accessible public terms/privacy links and records versioned consent;
- counsel/product owners approve applicable legal claims and KYC/AML/OFAC responsibilities;
- critical journeys meet defined accessibility, responsive, and browser standards.

Tasks: `MYMI-GTM-055` through `MYMI-GTM-058`.

## Wave 6 — Data, operations, clients, and release

Exit criteria:

- every table has an owner and migration/source-of-truth classification;
- backup/restore and disaster recovery are demonstrated;
- critical modules have meaningful tests, not only syntax coverage;
- admin/jobs/cron are authorized, observable, and replay-safe;
- mobile and SDK are either certified or explicitly excluded from the web release;
- capacity and dependency risks are measured;
- staging release candidate journeys pass;
- rollback and post-deploy reconciliation are exercised.

Tasks: `MYMI-GTM-059` through `MYMI-GTM-070`.

## Release decision record

The final decision must answer, with evidence links:

- What exact product scope is launching?
- Which commit and artifact were tested?
- Which tasks are complete, deferred, feature-flagged, or accepted risks?
- Which schemas/migrations will run and what is the rollback posture?
- Which external services and credentials are required?
- Which monitors, queues, cron jobs, backup checks, and reconciliation reports must be green?
- Who approved security, product, operations, and legal/compliance gates?
- What exact condition triggers rollback?

If any answer is unknown, the decision remains HOLD for that scope.
