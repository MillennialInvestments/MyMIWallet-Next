# GT-001C-H Alerts Internal Guard Summary

## Scope

Add explicit `internalToken` guards to Alerts internal maintenance API routes.

## Source Evidence

GT-001B classified these Alerts routes as `INTERNAL` with `MISSING_GUARD`:

- `GET API/Alerts/ingestCsvSignals`
- `GET API/Alerts/recalcSignalScores`
- `GET API/Alerts/backfillCategories`
- `POST API/Alerts/backfillCategories`
- `GET API/Alerts/scanner`
- `GET API/Alerts/forceFetchEmails`
- `POST API/Alerts/forceFetchEmails`
- `GET API/Alerts/forceFetchTickers`
- `POST API/Alerts/forceFetchTickers`
- `POST API/Alerts/backfillEmailAlerts`

Recommended action: `add_or_confirm_internal_token_or_cron_guard`.

## Implementation

Updated `app/Config/Routes.php` so targeted `AlertsAPIController` internal maintenance routes use `filter => internalToken`.

## Safety Boundary

- No production mutation.
- No controller logic changed.
- No broad Alerts API guard sweep.
- No non-maintenance Alerts routes changed.
- Only Alerts internal maintenance route-level guards were added.

## Validation

- php -l app/Config/Routes.php
- composer validate --no-check-publish
- composer dump-autoload --no-interaction
- bash scripts/ci/check_psr4.sh
- git diff --check
- PR CI checks

## Rollback Notes

No production rollback applies. To revert before merge, restore `app/Config/Routes.php` from the branch base or revert the GT-001C-H commit.
