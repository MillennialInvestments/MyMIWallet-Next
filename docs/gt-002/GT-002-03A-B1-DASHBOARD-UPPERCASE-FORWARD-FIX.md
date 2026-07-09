# GT-002-03A-B1 Dashboard Uppercase Forward Fix

## Objective

Forward-fix the production regression where `/dashboard` was fixed but `/Dashboard` began returning 404 after GT-002-03A.

## Status

IMPLEMENTED_IN_FEATURE_WORKTREE_PENDING_PR

## Change

Added explicit root-level aliases for both protected dashboard entrypoints:

- `/Dashboard`
- `/dashboard`

Both route to `DashboardController::index` with login and noStore filters.

## Evidence

- `docs/gt-002/evidence/GT-002-03A-B1/dashboard-route-source-before.txt`
- `docs/gt-002/evidence/GT-002-03A-B1/dashboard-route-table-before.txt`
- `docs/gt-002/evidence/GT-002-03A-B1/dashboard-prod-smoke-before.tsv`
- `docs/gt-002/evidence/GT-002-03A-B1/dashboard-route-source-after.txt`
- `docs/gt-002/evidence/GT-002-03A-B1/dashboard-route-table-after.txt`

## Post-deploy acceptance

- GET `/Dashboard` must redirect to `/login` for guests.
- GET `/dashboard` must redirect to `/login` for guests.
- Neither path should return 404.
- No login POST is required for acceptance.

## Safety

No login POST was submitted.

No authenticated session was used.

No account was created.

No email was sent.

No production database mutation was performed.

No production rollback was performed.
