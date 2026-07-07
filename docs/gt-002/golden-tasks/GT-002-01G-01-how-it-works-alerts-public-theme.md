# GT-002-01G-01 How-It-Works Alerts Public Theme Mismatch

## Status

CONFIRMED_DEFECT

## User-facing flow

Public How-It-Works content page:

`/How-It-Works/alerts`

## Observed result

The page returns HTTP 200 and has content, but the public theme signal check failed.

Smoke matrix result:

`/How-It-Works/alerts    200     yes     no      FAIL_CONFIRMED`

## Expected result

`/How-It-Works/alerts` should render with the same public theme layout family used by the other How-It-Works pages:

`app/Views/themes/public/layouts/*`

## Evidence

- `docs/gt-002/evidence/GT-002-01G/how-it-works-public-smoke-matrix.tsv`
- `docs/gt-002/evidence/GT-002-01G/how-it-works-routes.txt`
- `docs/gt-002/evidence/GT-002-01G/how-it-works-controller-rendering.txt`
- `docs/gt-002/evidence/GT-002-01G/how-it-works-view-files.txt`
- `docs/gt-002/evidence/GT-002-01G/how-it-works-standalone-html-findings.txt`

## Atomic Golden Task rule

This task is limited to repairing `/How-It-Works/alerts` so it renders through the public theme layout.

Do not modify unrelated How-It-Works pages in this task.

Do not mutate production without explicit approval.

Do not mutate the production database.

Do not rollback production.

## Required next phase

Create a dedicated fix worktree:

`feature/gt-002-01h-how-it-works-alerts-public-theme-fix`
