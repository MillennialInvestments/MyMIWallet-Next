# GT-002-03 Dashboard Functional Certification

## Objective

Certify the MyMI Wallet dashboard surface using read-only route, controller, view, layout, and guest-access smoke evidence.

## Status

READ_ONLY_CERTIFICATION_COMPLETE_WITH_FINDINGS

## Scope

- Dashboard routes
- Dashboard controllers
- Dashboard views
- Dashboard layout/theme usage
- Guest behavior for protected dashboard/user routes
- Golden Tasks for confirmed or candidate dashboard defects

## Evidence

- `docs/gt-002/evidence/GT-002-03/dashboard-routes.txt`
- `docs/gt-002/evidence/GT-002-03/dashboard-controller-surface.txt`
- `docs/gt-002/evidence/GT-002-03/dashboard-view-files.txt`
- `docs/gt-002/evidence/GT-002-03/dashboard-theme-layout-surface.txt`
- `docs/gt-002/evidence/GT-002-03/dashboard-guest-smoke-matrix.tsv`

## Guest smoke findings

| Path | HTTP | Redirect | Classification | Finding |
|---|---:|---|---|---|
| `/Dashboard` | 302 | `/login` | AUTH_REDIRECT_EXPECTED | PASS |
| `/dashboard` | 404 | none | ROUTE_404_REVIEW | Candidate compatibility defect |
| `/MyMI-Wallet` | 302 | `/login` | AUTH_REDIRECT_EXPECTED | PASS |
| `/Wallets` | 302 | `/login` | AUTH_REDIRECT_EXPECTED | PASS |
| `/Wallets/All` | 302 | `/login` | AUTH_REDIRECT_EXPECTED | PASS |
| `/Dashboard/setup` | 404 | none | ROUTE_404_REVIEW | Needs route-intent classification |
| `/Dashboard/onboarding/profile` | 404 | none | ROUTE_404_REVIEW | Needs route-intent classification |
| `/Dashboard/account-completion` | 404 | none | ROUTE_404_REVIEW | Needs route-intent classification |

## Certification rules

Expected guest behavior for protected dashboard routes:

- Redirect to login, or
- Return an auth-required response, or
- Render the login page.

Unexpected behavior:

- HTTP 500
- Unprotected dashboard data exposure to guest users
- Missing route for a public CTA that should exist
- Standalone/non-dashboard layout for authenticated dashboard pages

## Confirmed results

No HTTP 500 was observed in the guest smoke matrix.

No protected dashboard data was exposed to guest users in the tested paths.

Core protected dashboard entrypoints redirected to `/login`.

## Open findings

### GT-002-03A

`/dashboard` returns 404 while `/Dashboard` redirects to `/login`.

This is a candidate compatibility defect because lowercase URL entry is common and should either redirect canonically to `/Dashboard` or be explicitly documented as unsupported.

### GT-002-03B

The following GET paths return 404 and need route-intent classification:

- `/Dashboard/setup`
- `/Dashboard/onboarding/profile`
- `/Dashboard/account-completion`

These may be internal POST/workflow endpoints rather than intended GET pages. If they are user-facing GET destinations, they need protected redirects or authenticated views. If they are not user-facing GET routes, they should be removed from future guest-page smoke lists and documented as workflow-only.

## Safety

No login POST was submitted.

No authenticated session was used.

No account was created.

No email was sent.

No production database mutation was performed.

No production rollback was performed.

## Next gate

Create atomic Golden Tasks for the open findings, then proceed through PR review. No implementation occurs in this certification lane.
