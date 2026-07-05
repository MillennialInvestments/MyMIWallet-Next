# GT-001D-B5 Marketing Mutation Candidate Remainder

## Objective

Prepare the remaining Marketing mutation-candidate route guard batch after GT-001D-B4 closeout.

## Current Backlog Position

- Initial Marketing API_TOKEN backlog: 192
- Guarded in GT-001D-A2/A3: 20
- Guarded in GT-001D-B1: 25
- Guarded in GT-001D-B2: 25
- Guarded in GT-001D-B3: 25
- Guarded in GT-001D-B4: 25
- Total guarded before B5: 120
- Estimated residual before B5: 72
- Planned B5 mutation-candidate remainder size: 15
- Estimated residual after B5: 57

## B5 Batch

GT-001D-B5 selects remaining mutation-candidate source rows 101-115 from:

`docs/gtm/mymi/evidence/gt001d/marketing/marketing-backlog-classified.csv`

Discovery evidence:

`docs/gtm/mymi/evidence/gt001d/marketing/b5/marketing-mutation-candidate-batch-5-discovery.csv`

## Implementation Plan

Apply or confirm `apiToken` on the selected B5 routes inside the API/Marketing route group only.

Rules:

- Patch exact route lines only.
- Do not touch Admin/Marketing duplicates.
- Do not touch commented legacy routes.
- Do not edit controllers.
- Do not edit filters.
- Do not edit models.
- Do not change database state.
- No production mutation before PR merge and production sync.

## Validation Required

- `php -l app/Config/Routes.php`
- `composer validate --no-check-publish`
- `bash scripts/ci/check_psr4.sh`
- `git diff --check`
- Exact route-line verification for the B5 routes.

## Rollback

Rollback is revert of the B5 PR. No database rollback is required.
