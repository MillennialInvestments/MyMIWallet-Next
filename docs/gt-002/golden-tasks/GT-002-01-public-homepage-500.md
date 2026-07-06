# GT-002-01 Public Homepage HTTP 500

## Status

CONFIRMED_DEFECT

## User-facing flow

Public homepage and public pages.

## Reproduction steps

1. Request `https://www.mymiwallet.com/`.
2. Request `https://mymiwallet.com/`.

## Observed result

Both public homepage requests returned `HTTP/1.1 500 Internal Server Error`.

## Expected result

The public homepage should return a successful public response and render the MyMI Wallet homepage without requiring authentication.

## Evidence

- `docs/gt-002/evidence/public-homepage-smoke.txt`

## Atomic Golden Task rule

This task is limited to diagnosing and repairing the public homepage HTTP 500.

Do not continue abstract route/security classification.

Do not mutate production without explicit approval.

Do not rollback production.

## Required next phase

Create a dedicated fix worktree for this defect after the GT-002 baseline PR is clean.

Suggested branch:

`feature/gt-002-01-public-homepage-500`

## Validation required for fix PR

- Composer bootstrap
- PHP lint for touched files
- `php spark list`
- route/view/controller validation relevant to homepage
- read-only public smoke showing non-500 response
- `git diff --check`
- `git status --short`

## Rollback note

No production rollback is required for this baseline evidence task.

Any future code fix must include its own rollback notes based on touched files.
