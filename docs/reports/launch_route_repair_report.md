# Launch Route Repair Report

Date: 2026-04-30 (UTC)

## Scope
This remediation focused on reducing **false-positive route target misses** in `gtm:launch:audit` without adding placeholder controllers/methods and while preserving Phase A user flows.

## Ground truth commands executed
- `php spark gtm:health:snapshot`
- `php spark gtm:launch:audit`

## Changes Applied

### 1) Audit resolver hardened for CI4 namespace/controller path resolution
File: `app/Commands/Gtm/LaunchAudit.php`
- Normalized leading backslashes in controller targets.
- Added support for fully-qualified `App\...` controller targets by mapping namespace to `app/...` filesystem paths.
- Corrected nested controller resolution by converting `\` namespace separators to `/` path separators.
- Added additional module controller fallback paths for existing module structure.

**Impact:** This removes a large class of false positives where routes were valid but the scanner could not map namespace strings to actual files.

### 2) Global toolbar filter dedupe corrected
File: `app/Config/Filters.php`
- Fixed duplicate-debug-toolbar append logic in `__construct()` by checking both keyed (`'toolbar' => [...]`) and list-style (`'toolbar'`) forms.

**Impact:** Prevents duplicate `toolbar` in global `after` filter list and keeps health snapshot cleaner.

### 3) External API backoff policy enabled
File: `app/Config/ExternalApiPolicy.php`
- Set `enableBackoff` to `true`.

**Impact:** Aligns launch posture with safer external API call behavior.

### 4) Logger handlers now explicitly handle operational levels
File: `app/Config/Logger.php`
- Set `DatabaseLoggerHandler` and `UnifiedLoggerHandler` handles to:
  - `warning,error,critical,alert,emergency`

**Impact:** Removes "configured but handles no levels" misconfiguration and improves production observability.

## Outcome Summary

### Launch audit
- Previous reported missing route targets: **493**
- Current reported missing route targets: **415**
- Net reduction: **78** route misses removed as scanner false positives.

### Phase A flow integrity
Phase A includes 44 routes. Current misses affecting Phase A list are narrowed to:
- `POST /ResetUser => ChatUsageController::resetUser`
- `GET /budgets => BudgetAPIController::budgets` (duplicate listing)

These appear to be real route/controller gaps or ambiguous duplicate route declarations, not pure namespace false positives.

### Health snapshot cleanliness
- `ExternalApiPolicy.enableBackoff` now reports `true`.
- Global after filter count is clean and no duplicate toolbar append behavior is introduced at runtime.
- Logger handlers now show explicit handled levels for DB/unified handlers.

## Remaining verified blockers
Launch decision remains `HOLD` due to remaining verified missing route targets outside the scope of false-positive namespace/path parsing alone.

Recommended next pass:
1. Triage missing targets by route ownership domain (Ops, API, Blog, Support, Broker/Budget).
2. Remove or gate stale non-production routes.
3. Repair real missing controller/method targets that are still in active route surfaces.
4. Resolve duplicate/ambiguous route declarations (notably `budgets`) to a single canonical target.

