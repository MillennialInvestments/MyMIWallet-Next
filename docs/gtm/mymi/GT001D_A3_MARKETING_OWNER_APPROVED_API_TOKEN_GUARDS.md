# GT-001D-A3 Marketing Owner-Approved API Token Guards

## Objective

Apply API-token guard protection to the 11 owner-approved Marketing read/ambiguous API routes identified by GT-001D-A1.

## Routes Updated

- API/Marketing/getVideoQueue
- API/Marketing/getTemplates
- API/Marketing/saveTemplate
- API/Marketing/Campaigns
- API/Marketing/scheduleNewsletters
- API/Marketing/Email-Templates/create
- API/Marketing/Email-Queue
- API/Marketing/Email-Queue/create
- API/Marketing/getPlatforms
- API/Marketing/getPlatformRules/([^/]+)
- API/Marketing/listSuggestions/([^/]+)/([^/]+)

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
