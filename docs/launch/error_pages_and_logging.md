# Error Pages + Logging Safety

## Error pages
- Added dedicated custom error views:
  - `app/Views/errors/html/error_403.php`
  - `app/Views/errors/html/error_404.php`
  - `app/Views/errors/html/error_500.php`
  - `app/Views/errors/html/error_504.php`
- Each page now:
  - sets explicit `http_response_code(...)`
  - logs through guarded bootstrap (`ERROR_LOGGING_ACTIVE` + try/catch swallow)
  - displays user-safe support messaging
  - auto-redirects to `/Support` after 5 seconds
  - avoids raw stack traces in production output

## Logging recursion and storm controls
- Added centralized bootstrap guard in error lifecycle views to prevent recursive `log_message()` loops.
- `DatabaseLoggerHandler` now suppresses duplicate DB inserts for identical signatures for a short suppression window.
- Existing email dedupe remains active for warning/error alert storm control.

## Validation evidence
- Feature test covers `/test-403`, `/test-404`, `/test-500`, `/test-504` and asserts status code + support redirect script.
- Syntax lint passed for all modified error lifecycle files.

## Result
- **PASS** (GAP-001 fixed): custom 403/404/500/504 pages render safely with guarded logging and timed support redirect.
