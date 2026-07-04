# GT-001D-A2 Marketing High-Risk API Token Guards

## Objective

Apply API-token guard protection to the 9 owner-approved high-risk Marketing mutation routes identified by GT-001D-A1.

## Routes Updated

- API/Marketing/Reject-Content/([0-9]+)
- API/Marketing/archiveVideoContent/([0-9]+)
- API/Marketing/rejectBufferItem/([0-9]+)
- API/Marketing/deleteScrape/([0-9]+)
- API/Marketing/deleteTemplate/([0-9]+)
- API/Marketing/deletePlatform/([0-9]+)
- API/Marketing/deletePlatformRule/([0-9]+)
- API/Marketing/deleteTaxonomy/([0-9]+)
- API/Marketing/deleteSuggestion/([0-9]+)

## Guard Applied

`apiToken`

## Safety

- Route-level guard edits only.
- No controller edits.
- No model edits.
- No database changes.
- No production mutation before PR merge and production sync.
- Rollback is revert of this PR.

## Validation

- php -l app/Config/Routes.php
- composer validate --no-check-publish
- bash scripts/ci/check_psr4.sh
- git diff --check
