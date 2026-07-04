# GT-001D-B1 Marketing Mutation Candidate Batching

## Objective

Prepare the first Marketing mutation-candidate route guard batch after GT-001D-A closeout.

This slice begins from the GT-001D-A Marketing residual backlog:

- Initial Marketing API_TOKEN backlog: 192
- Guarded in GT-001D-A2/A3: 20
- Estimated residual after A3: 172
- Mutation candidates remaining from source classification: 115

## B1 Batch

GT-001D-B1 selected the first 25 `MUTATION_API_TOKEN_CANDIDATE` routes from:

`docs/gtm/mymi/evidence/gt001d/marketing/marketing-backlog-classified.csv`

Discovery evidence:

`docs/gtm/mymi/evidence/gt001d/marketing/b1/marketing-mutation-candidate-batch-discovery.csv`

## Implementation Plan

Apply `apiToken` to the selected B1 routes inside the API/Marketing route group only.

Rules:

- Patch exact route lines only.
- Do not touch Admin/Marketing duplicates.
- Do not touch commented legacy routes.
- Do not edit controllers.
- Do not edit filters.
- Do not edit models.
- Do not change database state.
- No production mutation before PR merge and production sync.

## B1 Route Types

The first 25 mutation candidates are mostly GET or GET/POST content-generation endpoints. They are classified as mutation candidates because the handlers generate, distribute, or process content even when exposed through GET.

## Validation Required

- `php -l app/Config/Routes.php`
- `composer validate --no-check-publish`
- `bash scripts/ci/check_psr4.sh`
- `git diff --check`
- Exact grep verification for the 25 B1 routes.

## Rollback

Rollback is revert of the B1 PR. No database rollback is required.
