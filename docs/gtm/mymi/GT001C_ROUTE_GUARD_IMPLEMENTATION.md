# GT-001C Route Guard Implementation

## Status

Implementation started with the smallest deterministic safety slice.

## GT-001C-A Scope

Fix malformed or doubled route handler namespaces from GT-001/GT-001B evidence.

## Business Objective

Remove route handler namespace ambiguity before changing route guard behavior. This keeps the route table structurally correct so later API token, internal token, CSRF, login, and admin guard changes can be applied safely.

## Safety Boundary

- No production mutation.
- No production rollback applies.
- No route filters changed in GT-001C-A.
- No controller logic changed in GT-001C-A.
- No auth policy changed in GT-001C-A.
- Only route handler class strings were normalized.

## Implementation Summary

GT-001C-A normalized explicit route handler class strings in `app/Config/Routes.php` so handlers intended as full class names start with `\App\...`.

This prevents CodeIgniter namespace prefixing from producing doubled handlers such as:

- `App\Controllers\App\Modules\...`
- `App\Controllers\App\Controllers\...`
- `App\Modules\APIs\Controllers\App\Modules\...`

## Source Evidence

- `docs/gtm/mymi/evidence/gt001/malformed-handler-routes.md`
- `docs/gtm/mymi/evidence/gt001b/route-guard-classification.csv`

## Validation

- `composer validate --no-check-publish`
- `composer dump-autoload --no-interaction`
- `bash scripts/ci/check_psr4.sh`
- `php spark routes`
- `git diff --check`

## Rollback Notes

No production rollback applies. To revert GT-001C-A before merge, restore `app/Config/Routes.php` from the branch or revert the GT-001C-A commit.

## GT-001C-C Bitcoin API Token Guard

### Scope

Added an explicit `apiToken` route filter to the `API/Bitcoin` group.

### Reason

GT-001B classified `API/Bitcoin/buildUnsignedPsbt` and `API/Bitcoin/broadcastSignedTx` as `API_TOKEN` with `MISSING_GUARD`.

### Safety

This slice changes one route group filter only. No controller logic, handler mapping, internal token policy, CSRF policy, or production state was changed.

## GT-001C-D DripCampaign TestCron Guard

### Scope

Added an explicit `cronKey` route filter to `GET API/DripCampaign/TestCron`.

### Reason

GT-001B classified `API/DripCampaign/TestCron` as `INTERNAL` with `MISSING_GUARD`.

### Safety

This slice changes one route-level filter only. No controller logic, API token policy, broad internal route policy, CSRF policy, or production state was changed.
