# GT-002-01C Public Homepage HEAD Runtime Compatibility

## Status

CONFIRMED_DEFECT

## Background

GT-002-01 fixed public homepage GET traffic.

GT-002-01B added an explicit `HEAD /` route, but production still returns `500` for `HEAD /`.

## Confirmed behavior

- `GET /` returns `200`.
- `HEAD /` returns `500`.
- Explicit `HEAD /` route exists in `app/Config/Routes.php`.
- Runtime behavior still does not serve HEAD safely.

## Expected behavior

`HEAD /` should return a non-500 response suitable for uptime checks and smoke tests.

## Scope

This task is limited to runtime compatibility for public homepage HEAD requests.

Do not mutate production DB.

Do not rollback production.

Do not continue abstract route/security classification.

## Validation required

- PHP lint for touched files
- `php spark list`
- route/runtime assertion
- `git diff --check`
- post-deploy GET smoke remains `200`
- post-deploy HEAD smoke returns non-500
