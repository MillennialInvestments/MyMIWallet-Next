# GT-002-01H-B1 Alerts Theme Forward Fix

## Objective

Apply the actual source correction for `/How-It-Works/alerts`.

## Reason

PR #590 documented the intended fix but did not modify `HowItWorksController.php`.

## Fix

Changed the `alerts` slug mapping from the generic fallback view to:

`themes/public/how_it_works/alerts`

## Safety

No production mutation was performed.

No production database mutation was performed.

No production rollback was performed.
