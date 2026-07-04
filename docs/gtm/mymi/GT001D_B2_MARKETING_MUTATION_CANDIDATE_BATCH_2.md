# GT-001D-B2 Marketing Mutation Candidate Batch 2

## Objective

Prepare the second Marketing mutation-candidate route guard batch after GT-001D-B1 closeout.

## Current Backlog Position

- Initial Marketing API_TOKEN backlog: 192
- Guarded in GT-001D-A2/A3: 20
- Guarded in GT-001D-B1: 25
- Estimated residual before B2: 147
- Planned B2 batch size: 25
- Estimated residual after B2: 122

## B2 Batch

GT-001D-B2 selects mutation-candidate source rows 26-50 from:

`docs/gtm/mymi/evidence/gt001d/marketing/marketing-backlog-classified.csv`

Discovery evidence:

`docs/gtm/mymi/evidence/gt001d/marketing/b2/marketing-mutation-candidate-batch-2-discovery.csv`

## Implementation Plan

Apply `apiToken` to the selected B2 routes inside the API/Marketing route group only.

Rules:

- Patch exact route lines only.
- Do not touch Admin/Marketing duplicates.
- Do not touch Management API duplicates unless they are inside the selected API/Marketing group.
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
- Exact route-line verification for the 25 B2 routes.

## Rollback

Rollback is revert of the B2 PR. No database rollback is required.
