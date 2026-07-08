# GT-002-03A Dashboard Lowercase Alias 404

## Status

CONFIRMED_CANDIDATE_DEFECT

## Finding

`/dashboard` returns 404 while `/Dashboard` returns a protected 302 redirect to `/login`.

## Expected outcome

Decide and implement one of the following in a separate remediation lane:

1. Add a safe GET redirect from `/dashboard` to `/Dashboard`, or
2. Add a safe GET redirect from `/dashboard` directly to `/login`, or
3. Document lowercase `/dashboard` as unsupported if route case-sensitivity is intentional.

## Recommended fix

Add a canonical lowercase compatibility redirect:

- `/dashboard` → `/Dashboard`

The target `/Dashboard` already enforces auth redirect behavior.

## Safety

Do not implement in this certification lane.

Do not submit login POST.

Do not create accounts.

Do not mutate production database.

Do not rollback production.
