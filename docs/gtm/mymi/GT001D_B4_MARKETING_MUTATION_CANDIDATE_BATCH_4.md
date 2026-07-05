# GT-001D-B4 Marketing Mutation Candidate Batch 4

## Objective

Prepare the fourth Marketing mutation-candidate route guard batch after GT-001D-B3 closeout.

## Current Backlog Position

- Initial Marketing API_TOKEN backlog: 192
- Guarded in GT-001D-A2/A3: 20
- Guarded in GT-001D-B1: 25
- Guarded in GT-001D-B2: 25
- Guarded in GT-001D-B3: 25
- Total guarded before B4: 95
- Estimated residual before B4: 97
- Planned B4 batch size: 25
- Estimated residual after B4: 72

## B4 Batch

GT-001D-B4 selects mutation-candidate source rows 76-100 from:

`docs/gtm/mymi/evidence/gt001d/marketing/marketing-backlog-classified.csv`

Discovery evidence:

`docs/gtm/mymi/evidence/gt001d/marketing/b4/marketing-mutation-candidate-batch-4-discovery.csv`

## Implementation Plan

Apply or confirm `apiToken` on the selected B4 routes inside the API/Marketing route group only.

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
- Exact route-line verification for the 25 B4 routes.

## Rollback

Rollback is revert of the B4 PR. No database rollback is required.


## Implementation Result

- CHANGED_LINES: 14
- VERIFIED: 25
- REVIEW_REQUIRED: 0
- Estimated residual after B4: 72

## Verification Evidence

- `docs/gtm/mymi/evidence/gt001d/marketing/b4/marketing-b4-exact-route-verification.csv`

## Reconciliation Notes

Some B4 candidates were already guarded by earlier B2/B3 route hardening because several routes are shared GET/POST `match()` declarations. This B4 pass confirms all selected source rows 76-100 are protected and patches the remaining unguarded exact API/Marketing route declarations.
