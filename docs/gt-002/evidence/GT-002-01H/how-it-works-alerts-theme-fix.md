# GT-002-01H How-It-Works Alerts Public Theme Fix

## Objective

Repair the confirmed public theme mismatch for:

`/How-It-Works/alerts`

## Confirmed defect

GT-002-01G found:

`/How-It-Works/alerts    200     yes     no      FAIL_CONFIRMED`

## Root cause

The `alerts` slug was mapped to the generic How-It-Works fallback view even though a public-theme alerts view already exists.

## Fix

Map the `alerts` slug to:

`themes/public/how_it_works/alerts`

This allows the existing public-theme render branch to wrap the page through:

`app/Views/themes/public/layouts/index.php`

## Safety

No production mutation was performed.

No production database mutation was performed.

No production rollback was performed.
