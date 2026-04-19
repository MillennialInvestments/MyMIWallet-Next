# Resolution: redirect-url-writers.txt

## Scope
- All upstream `redirect_url` writers across filters/controllers.

## Confirmed Root Cause
- Multiple writers were storing raw `current_url()` (or flash `with('redirect_url', current_url())`) without shared normalization, allowing inconsistent values and tracking pollution.

## Fix Applied
- Added shared sanitizer/writer helper: `app/Helpers/redirect_url_helper.php`.
- Updated writers to use `redirect_url_store()` in:
  - `PermissionFilter`, `LoginFilter`, `RoleFilter`, `AuthCheckFilter`
  - `AlertsController`, `WalletsController`
  - `HowTosAdminController`, `AlertsAdminController`, `DiscordAdminController`
- Added structured writer logs (`source_url`, `sanitized_url`, `accepted`, `request_id`, `route`).

## Validation
- Syntax checks passed for all touched PHP files.
- Unit tests passed for sanitizer behavior and active auth route surface.

## Next Step
- Validate writer logs in staging/production and move raw file only after runtime verification.
