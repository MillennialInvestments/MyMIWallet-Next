# GT-002-03A Dashboard Lowercase Alias Fix

## Objective

Fix the confirmed dashboard compatibility finding where GET `/dashboard` returned 404 while GET `/Dashboard` redirected guests to `/login`.

## Status

IMPLEMENTED_IN_FEATURE_WORKTREE_PENDING_PR

## Change

Added a canonical lowercase GET compatibility alias:

- `/dashboard` routes to `DashboardController::index`

The canonical dashboard controller remains responsible for protected dashboard behavior and guest auth redirection.

## Important route note

A pre-existing lowercase `dashboard` route was found for `MobileController::dashboard`. That route did not fix public GET `/dashboard`, because production GET `/dashboard` still returned 404 during pre-deploy smoke.

This GT-002-03A fix therefore adds a canonical protected dashboard route alias tied to `DashboardController::index`.

## Evidence

- `docs/gt-002/evidence/GT-002-03A/dashboard-routes-before.txt`
- `docs/gt-002/evidence/GT-002-03A/dashboard-route-source-before.txt`
- `docs/gt-002/evidence/GT-002-03A/dashboard-lowercase-smoke-before.txt`
- `docs/gt-002/evidence/GT-002-03A/dashboard-routes-after.txt`
- `docs/gt-002/evidence/GT-002-03A/dashboard-lowercase-route-after-patch.txt`
- `docs/gt-002/evidence/GT-002-03A/dashboard-lowercase-get-smoke-before-deploy.tsv`
- `docs/gt-002/evidence/GT-002-03A/dashboard-lowercase-route-after-real-patch.txt`

## Pre-deploy GET smoke

Before deployment:

- GET `/Dashboard` returned 302 to `/login`.
- GET `/dashboard` returned 404.

## Post-deploy acceptance

After PR merge and production fast-forward:

- GET `/dashboard` must no longer return 404.
- GET `/dashboard` must redirect to `/login` for guests, or route canonically through `/Dashboard`.
- GET `/Dashboard` must continue to preserve protected dashboard auth behavior.

## Safety

No login POST was submitted.

No authenticated session was used.

No account was created.

No email was sent.

No production database mutation was performed.

No production rollback was performed.
