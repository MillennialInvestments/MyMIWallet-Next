# GT-002-01B Public Homepage HEAD Request Compatibility

## Status

CONFIRMED_DEFECT

## User-facing flow

Public homepage uptime, monitoring, smoke tests, and clients that use `HEAD /`.

## Confirmed behavior

- `GET /` returns `200`.
- `HEAD /` returns `500`.
- Production logs show `HEAD /` falling into `[404_ROUTE]`.

## Expected behavior

`HEAD /` should resolve safely to the public homepage route and return a non-500 response.

## Scope

This task is limited to adding safe HEAD compatibility for the public homepage.

Do not mutate production DB.

Do not rollback production.

Do not continue abstract route/security classification.

## Validation required

- PHP lint for touched files
- `php spark list`
- route assertion showing homepage HEAD route
- `git diff --check`
- production post-deploy smoke showing GET remains `200`
- production post-deploy smoke showing HEAD no longer returns `500`

## Rollback note

If the HEAD compatibility change causes a regression before merge, revert the feature commit.

If it causes a regression after deployment, create a source-controlled revert PR or fast-forward to a verified corrective commit.
