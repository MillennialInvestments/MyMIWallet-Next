# GT-002-03A Dashboard Lowercase Alias Fix

## Objective

Fix the confirmed dashboard compatibility finding where lowercase `/dashboard` did not resolve as a protected dashboard entrypoint.

## Status

IMPLEMENTED_IN_FEATURE_WORKTREE_PENDING_PR

## Change

Added a lowercase GET compatibility alias:

- `/dashboard` redirects to canonical `/Dashboard`

The canonical `/Dashboard` route remains responsible for protected dashboard behavior and guest auth redirection.

## Evidence

- `docs/gt-002/evidence/GT-002-03A/dashboard-routes-before.txt`
- `docs/gt-002/evidence/GT-002-03A/dashboard-route-source-before.txt`
- `docs/gt-002/evidence/GT-002-03A/dashboard-lowercase-smoke-before.txt`
- `docs/gt-002/evidence/GT-002-03A/dashboard-routes-after.txt`
- `docs/gt-002/evidence/GT-002-03A/dashboard-lowercase-route-after-patch.txt`
- `docs/gt-002/evidence/GT-002-03A/dashboard-lowercase-get-smoke-before-deploy.tsv`

## Notes

The original HEAD smoke used `curl -I` and showed both `/Dashboard` and `/dashboard` returning 404. That is a separate HEAD behavior and should not be used as the GET-route acceptance test for this lane.

The acceptance target for GT-002-03A is GET `/dashboard`.

## Post-deploy acceptance

After PR merge and production fast-forward:

- GET `/dashboard` should no longer return 404.
- GET `/dashboard` should redirect to `/Dashboard` or ultimately to `/login` for guests.
- GET `/Dashboard` should continue to preserve protected dashboard auth behavior.

## Safety

No login POST was submitted.

No authenticated session was used.

No account was created.

No email was sent.

No production database mutation was performed.

No production rollback was performed.
