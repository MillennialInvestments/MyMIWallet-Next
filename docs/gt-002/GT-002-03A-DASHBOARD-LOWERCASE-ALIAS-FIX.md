# GT-002-03A Dashboard Lowercase Alias Fix

## Objective

Fix the confirmed dashboard compatibility finding where `/dashboard` returned 404 while `/Dashboard` correctly redirected guests to `/login`.

## Status

IMPLEMENTED_IN_FEATURE_WORKTREE

## Change

Added a lowercase GET compatibility alias:

- `/dashboard` redirects to `/Dashboard`

The canonical `/Dashboard` route remains responsible for protected dashboard behavior and guest auth redirection.

## Evidence

- `docs/gt-002/evidence/GT-002-03A/dashboard-routes-before.txt`
- `docs/gt-002/evidence/GT-002-03A/dashboard-route-source-before.txt`
- `docs/gt-002/evidence/GT-002-03A/dashboard-lowercase-smoke-before.txt`
- `docs/gt-002/evidence/GT-002-03A/dashboard-routes-after.txt`

## Safety

No login POST was submitted.

No authenticated session was used.

No account was created.

No email was sent.

No production database mutation was performed.

No production rollback was performed.
