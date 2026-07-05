# GT-001D-B3 Marketing Mutation Candidate Batch 3

## Objective

Prepare the third Marketing mutation-candidate route guard batch after GT-001D-B2 closeout.

## Current Backlog Position

- Initial Marketing API_TOKEN backlog: 192
- Guarded in GT-001D-A2/A3: 20
- Guarded in GT-001D-B1: 25
- Guarded in GT-001D-B2: 25
- Total guarded before B3: 70
- Estimated residual before B3: 122
- Planned B3 batch size: 25
- Estimated residual after B3: 97

## B3 Batch

GT-001D-B3 selects mutation-candidate source rows 51-75 from:

`docs/gtm/mymi/evidence/gt001d/marketing/marketing-backlog-classified.csv`

Discovery evidence:

`docs/gtm/mymi/evidence/gt001d/marketing/b3/marketing-mutation-candidate-batch-3-discovery.csv`

## Implementation Plan

Apply `apiToken` to the selected B3 routes inside the API/Marketing route group only.

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
- Exact route-line verification for the 25 B3 routes.

## Rollback

Rollback is revert of the B3 PR. No database rollback is required.


## Implementation Result

- CHANGED: 1 additional root POST route guard reconciliation after existing B3 patch.
- VERIFIED: 25
- REVIEW_REQUIRED: 0
- Estimated residual after B3: 97

## Verification Evidence

- `docs/gtm/mymi/evidence/gt001d/marketing/b3/marketing-b3-exact-route-verification.csv`
- `docs/gtm/mymi/evidence/gt001d/marketing/b3/marketing-b3-reconciliation.csv`

## Root Route Decision

The source row `POST API/Marketing` maps to the API/Marketing root POST route:

`$routes->post('/', 'MarketingAPIController::index', ['filter' => 'apiToken']);`

Only the POST root route was guarded for this B3 candidate. The GET root route was not changed by this reconciliation because the selected source row is POST.
