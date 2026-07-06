# GT-001 Identity and Access Readiness Audit

## Status

Documentation-only audit created from a clean MyMI Wallet clone/worktree.

## Product

MyMI Wallet

## Repository

MillennialInvestments/MyMIWallet-Next.git

## Worktree

/apps/TBI/worktrees/mymi-wallet-gt001-identity-access-readiness-audit

## Production Path

/apps/TBI/www/mymiwallet/current

## Business Objective

Assess MyMI Wallet identity and access readiness before implementation. Confirm the route/auth surface, identify launch blockers, preserve audit evidence, and define the next smallest Golden Task.

## Safety Boundary

- No production files were modified.
- No production rollback applies.
- This audit uses a clean feature branch/worktree.
- Evidence files are documentation artifacts only.
- `vendor/`, `writable/`, and unreviewed runtime artifacts must not be committed.
- Raw auth surface runtime JSON must be reviewed before being tracked.

## Evidence Inputs

- Full `php spark routes` raw capture under `/tmp/mymi-gt001-evidence/routes.raw.txt`.
- Parsed route CSV under `/tmp/mymi-gt001-evidence/routes.parsed.csv`.
- V3 normalized summary preserved at `docs/gtm/mymi/evidence/gt001/routes.summary.v3.md`.
- Curated finding slices under `docs/gtm/mymi/evidence/gt001/`.
- Optional sanitized auth-surface JSON summary under `docs/gtm/mymi/evidence/gt001/`.

## Route Surface Summary

| Metric | Count |
|---|---:|
| Total parsed routes | 1735 |
| API routes | 803 |
| Protected-looking product routes | 757 |
| Public/lifecycle routes recognized by parser | 89 |
| API routes with token guard | 143 |
| Routes with permission/role guard | 62 |
| Routes with login/auth/authcheck guard | 766 |
| Routes with blank filters | 94 |
| Routes with malformed/doubled handler namespace | 35 |
| Routes with real no-space filter concatenation | 0 |
| V3 candidate findings | 1175 |

## Finding Counts

| Priority | Finding | Count |
|---|---|---:|
| P0 | Non-public API route has no recognized auth/token/role/permission guard | 605 |
| P0 | Protected product route has no recognized auth/token/role/permission guard | 240 |
| P0 | State-changing route has no recognized CSRF/auth/token/role/permission guard | 223 |
| P1 | Handler namespace appears malformed/doubled | 35 |
| P1 | Non-public route has blank before/after filters | 72 |

## Launch Readiness Assessment

**Identity and Access readiness score: 32 / 100**

Rationale: MyMI has a large auth and route surface with many existing guards, but the audit found unresolved candidate P0 issues across API guard coverage, protected product route guard coverage, state-changing route protection, handler namespace integrity, and blank filters. The score should not be raised until GT-001B classifies the route surface into explicit public, authenticated user, role/permission, token/API, cron/internal, and disabled/deprecated categories.

## P0 Candidate Blockers

### 1. Non-public API routes without recognized auth/token/role/permission guard

Count: 605

Impact: API endpoints may expose financial, operational, alerting, broker, Plaid, investment, AI, Discord, chat, or management functions without a recognized route-level guard.

Evidence:
- `docs/gtm/mymi/evidence/gt001/top-api-missing-guards.md`
- `docs/gtm/mymi/evidence/gt001/finding-domain-counts.csv`

### 2. Protected product routes without recognized auth/token/role/permission guard

Count: 240

Impact: Routes matching wallet, account, broker, Plaid, budget, investment, linked-account, net-worth, cash-flow, referral, or exchange patterns may need explicit guard classification.

Evidence:
- `docs/gtm/mymi/evidence/gt001/top-protected-product-missing-guards.md`

### 3. State-changing routes without recognized CSRF/auth/token/role/permission guard

Count: 223

Impact: POST, PUT, PATCH, and DELETE routes must be verified for CSRF, session auth, token auth, role/permission guard, or intentional public behavior before launch.

Evidence:
- `docs/gtm/mymi/evidence/gt001/top-state-changing-missing-guards.md`

## P1 Candidate Blockers

### 1. Malformed or doubled handler namespaces

Count: 35

Impact: Routes with doubled namespaces may indicate route registration mistakes, unreachable handlers, unexpected fallback behavior, or autoload drift.

Evidence:
- `docs/gtm/mymi/evidence/gt001/malformed-handler-routes.md`

### 2. Non-public routes with blank filters

Count: 72

Impact: Blank filters may be valid for public routes, but non-public routes need explicit classification.

Evidence:
- `docs/gtm/mymi/evidence/gt001/blank-filter-routes.md`

## Important Parser Notes

V3 is more reliable than V1/V2 because it no longer treats normal spaced filters as concatenation. It found zero real no-space filter concatenation rows. The remaining findings are still candidate findings and require route-owner review before code changes.

## Required GT-001B Decision Model

Every route should be assigned one of these access classes:

| Class | Meaning | Required Guard Evidence |
|---|---|---|
| PUBLIC | Safe public page, health endpoint, asset, legal, marketing, login/register lifecycle | Public allowlist entry |
| USER_AUTH | Authenticated web user route | `login`, `authcheck`, or equivalent |
| ADMIN_AUTH | Admin-only route | `permission:admin.access`, role, or equivalent |
| API_TOKEN | External/API route | `apiToken` or equivalent |
| INTERNAL | Cron, internal, ops-only, webhook, service route | `internalToken`, `cronKey`, IP allowlist, signed request, or equivalent |
| STATEFUL_PUBLIC | Public state-changing lifecycle route | CSRF plus explicit public lifecycle justification |
| DEPRECATED_OR_DISABLED | Not launchable | Remove, disable, or document non-launch status |

## Recommended Next Golden Task

**GT-001B: Identity and Access Route Guard Classification Matrix**

## GT-001B Business Objective

Create a deterministic route classification matrix for MyMI Wallet. Classify every route as PUBLIC, USER_AUTH, ADMIN_AUTH, API_TOKEN, INTERNAL, STATEFUL_PUBLIC, or DEPRECATED_OR_DISABLED. Produce an allowlist and blocker list without changing route behavior.

## GT-001B Required Output

- `docs/gtm/mymi/GT001B_ROUTE_GUARD_CLASSIFICATION_MATRIX.md`
- Route class counts.
- Public allowlist.
- Authenticated web route list.
- Admin route list.
- API/token route list.
- Internal/cron route list.
- State-changing route review list.
- Deprecated/disabled route list.
- Final implementation backlog for GT-001C.

## Validation Commands

```bash
git status --short
git diff --check
test -s docs/gtm/mymi/GT001_IDENTITY_ACCESS_READINESS_AUDIT.md
test -s docs/gtm/mymi/evidence/gt001/routes.summary.v3.md
test -s docs/gtm/mymi/evidence/gt001/finding-counts.csv
test -s docs/gtm/mymi/evidence/gt001/top-api-missing-guards.md
grep -n "Identity and Access readiness score\|GT-001B\|P0 Candidate Blockers" docs/gtm/mymi/GT001_IDENTITY_ACCESS_READINESS_AUDIT.md
Rollback Notes

No production rollback applies. This is documentation-only. If this audit is incorrect, rollback is limited to editing the branch before merge or reverting the documentation PR after merge.

Do Not Commit
vendor/
writable/
raw /tmp evidence
unreviewed raw docs/_baseline/auth/current/surface.scan.runtime.json
Source Summary Excerpt
# MyMI GT-001 Route Parse Summary V3

## Route Counts

- Total parsed routes: 1735
- CLI: 11
- CONNECT: 10
- DELETE: 23
- GET: 1075
- OPTIONS: 10
- PATCH: 10
- POST: 572
- PUT: 14
- TRACE: 10

## Focused Counts

- API routes: 803
- Protected-looking product routes: 757
- Public/lifecycle routes recognized by parser: 89
- API routes with token guard: 143
- Routes with permission/role guard: 62
- Routes with login/auth/authcheck guard: 766
- Routes with blank filters: 94
- Routes with malformed/doubled handler namespace: 35
- Routes with real no-space filter concatenation: 0
- V3 findings: 1175

## Finding Counts

| Priority | Finding | Count |
|---|---|---:|
| P0 | Non-public API route has no recognized auth/token/role/permission guard | 605 |
| P0 | Protected product route has no recognized auth/token/role/permission guard | 240 |
| P0 | State-changing route has no recognized CSRF/auth/token/role/permission guard | 223 |
| P1 | Handler namespace appears malformed/doubled | 35 |
| P1 | Non-public route has blank before/after filters | 72 |

## Top Findings

| Priority | Finding | Method | Route | Handler | Before Filters | After Filters |
|---|---|---|---|---|---|---|
| P0 | Non-public API route has no recognized auth/token/role/permission guard | GET | `API/Ops/health-score` | `\App\Controllers\OpsHealthController::score` | `botBlocker requestLifecycle observability ratelimit throttle sessionRevoked` | `cspoff sessionTracker requestLifecycle observability jsonException toolbar` |
| P0 | Non-public API route has no recognized auth/token/role/permission guard | GET | `API/Docs/index` | `\App\Modules\APIs\Controllers\DocsController::index` | `botBlocker requestLifecycle observability ratelimit throttle sessionRevoked` | `cspoff sessionTracker requestLifecycle observability jsonException toolbar` |
| P0 | Non-public API route has no recognized auth/token/role/permission guard | GET | `API/Docs/view` | `\App\Modules\APIs\Controllers\DocsController::view` | `botBlocker requestLifecycle observability ratelimit throttle sessionRevoked` | `cspoff sessionTracker requestLifecycle observability jsonException toolbar` |
| P1 | Handler namespace appears malformed/doubled | GET | `Learn/([^/]+)` | `\App\Controllers\App\Modules\Public\Controllers\PublicPagesController::show/$1` | `maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck` | `cspoff sessionTracker requestLifecycle observability jsonException toolbar` |
| P1 | Handler namespace appears malformed/doubled | GET | `Customer-Support` | `\App\Controllers\App\Modules\Support\Controllers\SupportController::index` | `maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck` | `cspoff sessionTracker requestLifecycle observability jsonException toolbar` |
| P1 | Handler namespace appears malformed/doubled | GET | `Profile` | `\App\Controllers\App\Modules\User\Controllers\DashboardController::profile` | `maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login` | `login cspoff sessionTracker requestLifecycle observability jsonException toolbar` |
| P1 | Handler namespace appears malformed/doubled | GET | `Dev/BitcoinTest` | `\App\Controllers\App\Controllers\Dev\BitcoinTest::index` | `maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck` | `cspoff sessionTracker requestLifecycle observability jsonException too
