# MyMI Wallet Platform Completion Audit

Status: read-only discovery complete; runtime certification incomplete

Baseline: `8dfb2c3459a2e3be30f696c582bf2f930ebe0897`

Repository: `MillennialInvestments/MyMIWallet-Next`

Audit date: 2026-09-20 UTC

## Executive decision

Current recommendation: **HOLD for whole-platform completion or broad production launch claims.**

The repository is substantial and several recent features are implemented, including durable market-news persistence and dashboard fixes. It is not yet possible to certify the entire platform. The immediate blockers are an exposed tracked environment file in a public repository, failing AIOps automation, an invalid CI workflow, weak failure semantics in the main CI workflow, unresolved authentication/schema drift, and a large unverified route/access-control surface.

This is not a conclusion that every affected feature is broken. It is a conclusion that the current evidence cannot support a platform-complete claim.

## Review boundaries

What was verified:

- Anonymous read access to the GitHub repository and current `main` SHA.
- Repository structure, tracked files, route/controller declarations, models/migrations, tests, CI workflows, AIOps documentation, launch documentation, and selected public production endpoints.
- GitHub pull-request and workflow metadata available without authentication.

What could not be verified in this environment:

- PHP/Composer commands, PHPUnit, CodeIgniter route enumeration, migrations, or application runtime tests because PHP and Composer are unavailable here.
- Authenticated GitHub writes, branch creation, pull requests, or TBI AIOps task/worktree creation.
- Authenticated user journeys, controlled mutation tests, payment/broker integrations, production logs, database contents, queue workers, cron execution, backups, or restore.
- Legal or regulatory approval.

Static route counts below are candidate findings until confirmed with `php spark routes` and application tests. Group namespaces, inherited methods, and dynamic dispatch can create false positives.

## P0 findings

### 1. A credential-bearing file is tracked in a public repository

`chat/.env` is tracked, `.gitignore` explicitly permits it, and the file contains non-placeholder credential-shaped values, including an OpenAI-style key plus database/basic-auth/webhook/health credentials. No values were printed, copied, or used during this review.

The file has existed in repository history since at least 2026-02-08. Treat every contained credential as exposed.

Required response:

1. A human owner immediately revokes/rotates each external credential and records only evidence references, never secret values.
2. Replace the tracked file with a sanitized example/config contract.
3. Add nested secret scanning to pull requests and the default branch.
4. Decide separately whether a coordinated history rewrite is necessary. Do not rewrite history as part of an ordinary remediation task.

Existing `security:secrets-audit` coverage is insufficient because it checks only selected root env files and does not cover this nested tracked file.

### 2. AIOps workflows call command names that do not exist

- `.github/workflows/aiops-auto-run.yml` calls `php spark aiops:auto-run`.
- `app/Commands/AIOps/AutoRun.php` registers `aiops:auto:run`.
- The manual workflow calls `aiops:manual-run`.
- The command registers `aiops:manual:run`.

Recent GitHub history is dominated by these failures: among the latest 100 default-branch workflow runs reviewed, 61 AIOPS Auto Run and 20 AIOPS Manual Priority Run executions failed.

Required response: fix the names, add a command-registration contract test, and prove both workflows on a controlled branch before relying on AIOps backlog processing.

### 3. CI Health is syntactically invalid

`.github/workflows/ci-health.yml` contains invalid YAML around a `run:` entry followed by an unindented command. The workflow fails before jobs run on the reviewed baseline.

Required response: repair the workflow and add an action/YAML syntax gate so malformed workflows cannot merge.

### 4. A green main CI run is not release certification

`.github/workflows/ci.yml` allows important checks to fail through `|| true` or report-only behavior, including test and diagnostic suites. Its green state therefore does not prove the application or authentication suites passed.

Required response: distinguish inherited baseline debt from changed-file gates, then make release-critical checks fail correctly. Keep optional reports non-blocking only when explicitly labeled.

### 5. Authentication has unresolved identity and schema drift

The codebase carries both Shield and Myth/Auth compatibility concepts. Existing GT-002 evidence reports production login failure, missing expected identities for a known user, missing `login_attempts` and `system_errors`, and field-name drift involving force-password-reset behavior.

Required response: choose and document the canonical runtime contract, run a read-only environment preflight, create forward/rollback-safe migrations and identity backfill logic, and obtain explicit approval before controlled login/registration/reset mutations.

### 6. API access-control defaults are too broad for a financial platform

`app/Config/Filters.php` broadly exempts API paths from global CSRF and authentication checks. The route file contains many mutation-shaped API endpoints without an obvious route-local `api`, `internal`, `cron`, or admin guard. CSP is not globally enforced, and a `cspoff` after-filter removes CSP headers on some paths.

Required response: classify every endpoint by caller, data sensitivity, mutation behavior, authentication, authorization, CSRF/signature, rate limit, and audit requirement. Apply policy from the matrix, not from path naming alone.

## Route and feature evidence

The main route file is roughly 2,567 lines. The bundled deterministic scan counts 1,804 literal route-builder calls, including 159 group declarations and 1,645 non-group calls. A separate best-effort controller-target parser found 1,438 literal controller-style targets, with 139 candidate missing classes and 226 candidate missing methods. These totals are triage signals, not certified defect counts.

High-confidence examples observed in source:

- Auth routes reference methods not present on the named controller, including broker/social linking and multiple 2FA/temp-user operations.
- Investment strategy/goal routes name a missing `InvestmentController`.
- Bitcoin API routes name `BitcoinController` while the repository contains `BitcoinAPIController`.
- Ops public API routes name `OpsPublicPagesController` while the repository contains `OpsPublicPagesAPIController`.
- A large broker API group names a missing `BrokerAPIController`.
- Budget API routes and implemented `BudgetAPIController` methods use different names/contracts.

The correct next step is a deterministic route manifest generated by CodeIgniter runtime plus reflection, followed by small controller/domain fixes. Do not attempt a blind global rewrite of the route file.

## Live public observations

Read-only checks on 2026-09-20 showed:

| Path | Observed behavior |
|---|---|
| `/` | 200 |
| `/login` | 200 |
| `/register` | 200 |
| `/Dashboard` | redirects to login |
| `/dashboard` | redirects to login |
| `/Free/register` | redirects to `/register` |
| `/Beta/register` | redirects to `/register` |
| `/Terms-Of-Service` | 200 |
| `/Privacy-Policy` | 200 |
| `/Legal/Terms-And-Conditions` | redirects to login |
| `/Legal/Privacy-Policy` | redirects to login |
| `/Support` | 200 |
| `/How-It-Works` | 200 |

The registration view links to the protected `/Legal/...` paths rather than the public canonical terms/privacy routes. This is a concrete pre-registration consent-flow defect.

## Data and schema evidence

Static declarations include approximately 244 model table declarations covering 222 unique table names and 180 literal `createTable` calls covering 178 unique names. A literal comparison leaves 103 model table names without an obvious matching application migration. Legacy schemas, dynamic migrations, or externally managed tables can explain some of this gap, so it is not a defect count.

Existing production auth evidence confirms that environment drift is real rather than hypothetical. Completion requires:

- a canonical schema owner for every table;
- an environment-by-environment drift report;
- forward and rollback notes for every migration;
- controlled seed/test identity handling;
- backup and restore evidence before high-risk migrations.

## Test and repository evidence

- Roughly 7,014 tracked files and 3,116 tracked PHP files.
- 26 module directories and about 200 controller files.
- Approximately 49 test files, with only about 44 code-test files in the static scan.
- Large modules such as Management and User have limited direct test evidence relative to their surface.
- 116 tracked zero-byte files were observed, including mobile image assets and a user controller file.
- About 101 backup/temp/legacy-like tracked source files were observed.
- The root README remains close to a CodeIgniter AppStarter guide rather than a reliable product/operator guide.
- `docs/_aiops/LOCAL_OLLAMA_AIOPS_WORKFLOW.md` has a malformed/unclosed code block.

Do not delete suspicious or legacy files in bulk. Produce an ownership/usage manifest, quarantine or denylist only with evidence, and obtain approval before removal.

## Launch evidence conflicts

Launch documents currently disagree:

- one GTM readiness report says GO while still listing runtime smoke work as pending;
- a smoke result records status `0` and `Pass: NO` for several core paths;
- a later audit says HOLD and reports hundreds of missing route targets;
- some core-flow/trust/observability reports contain only shallow PASS statements;
- the functional hardening queue says wallet mutation hardening is halted/not promoted.

Required response: preserve these as historical evidence, identify the canonical current launch decision, and link every claim to immutable CI, runtime, or approval evidence.

## Open lineage and delivery risk

The repository had 95 open pull requests at review time, most targeting `main`, including stacked route-guard drafts and CI work. Draft PR #603 contains the original GT-002 functional tracker but is 33 commits behind current `main`; main has since added auth/dashboard evidence and fixes.

Do not continue the stale tracker branch as if it were current. Create a fresh GT-002-R2 successor from current main, import still-valid evidence, link superseded work, and reconcile the open PR stack before creating overlapping fixes.

## Product surfaces requiring certification

The Golden Task catalog covers:

- public/marketing/SEO/content/legal;
- authentication, identity, session, reset, 2FA, and connectors;
- dashboard, onboarding, profile, and account security;
- wallet, ledger, transactions, imports, payments, and reconciliation;
- budget, debt, credit, repayment, and bank aggregation;
- investments, watchlists, trades, strategies, goals, market data, and news;
- alerts, support, communications, referrals, memberships, subscriptions, and entitlements;
- exchange, Solana, Bitcoin/DigiByte, projects/CoinVault, predictions, tax, PropFirms, and MDIT;
- privacy export/erasure, consent, KYC/AML/OFAC ownership, and legal review;
- management/admin, jobs/cron, schemas/migrations, observability, backup/restore, performance, mobile, and SDK;
- staging release candidate, deployment, rollback, and post-deploy reconciliation.

## Recommended decision sequence

1. Contain credentials and restore trustworthy automation.
2. Reconcile lineage and establish one current tracker.
3. Resolve auth/schema/access-control foundations.
4. Certify financial invariants and core journeys.
5. Certify extended products independently; do not let optional surfaces block a defined web MVP unless they are in the approved launch scope.
6. Complete legal/operational gates and an isolated staging release candidate.
7. Deploy only through the approved release process and reconcile production afterward.

The dependency-ordered details are in `MYMI_PLATFORM_COMPLETION_ROADMAP.md`; the executable backlog is `task_catalog.json` and `tasks.csv`.
