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

## GT-001C-E Marketing Cron Guard

### Scope

Added explicit `cronKey` route filters to six `GET API/Marketing/cron*` routes.

### Reason

GT-001B classified the Marketing cron routes as `INTERNAL` with `MISSING_GUARD`.

### Safety

This slice changes six route-level filters only. No controller logic, broad Marketing API policy, API token policy, CSRF policy, or production state was changed.

## GT-001C-F Predictions Cron Guard

### Scope

Added explicit `cronKey` route filters to `GET API/Predictions/Cron/*` routes.

### Reason

GT-001B classified the Predictions cron routes as `INTERNAL` with `MISSING_GUARD`.

### Safety

This slice changes Predictions cron route-level filters only. No controller logic, broad Predictions API policy, API token policy, CSRF policy, or production state was changed.

## GT-001C-G Scanner Internal Guard

### Scope

Added explicit `internalToken` route filters to five `API/Scanner/*` internal routes.

### Reason

GT-001B classified the Scanner routes as `INTERNAL` with `MISSING_GUARD`.

### Safety

This slice changes Scanner route-level filters only. No controller logic, broad API policy, cron policy, CSRF policy, or production state was changed.

## GT-001C-G Scanner Internal Guard

### Scope

Added explicit `internalToken` route filters to five `API/Scanner/*` internal routes.

### Reason

GT-001B classified the Scanner routes as `INTERNAL` with `MISSING_GUARD`.

### Safety

This slice changes Scanner route-level filters only. No controller logic, broad API policy, cron policy, CSRF policy, or production state was changed.
## GT-001C-H Alerts Internal Guard

### Scope

Added explicit `internalToken` route filters to Alerts internal maintenance routes.

### Reason

GT-001B classified selected Alerts maintenance routes as `INTERNAL` with `MISSING_GUARD`.

### Safety

This slice changes Alerts internal maintenance route-level filters only. No controller logic, broad Alerts API policy, API token policy, CSRF policy, or production state was changed.

