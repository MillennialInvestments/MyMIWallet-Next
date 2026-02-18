# CI4 Logger Audit — 2026-02-18

## Scope
Audit of CodeIgniter 4 logging/error-handling surfaces in the application layer only (`app/`, `public/`, `docs/`). The `system/` tree was intentionally not modified.

## Method
- Searched for logger configuration, exception/error handling, custom handlers, and wrappers around `log_message()` / `Services::logger()`.
- Reviewed and annotated the files listed below with a standardized audit header.
- Performed syntax and autoload validation checks.

## Findings by Category

### 1) Configures logging
1. `app/Config/Logger.php`
   - Defines global thresholds, date format, handler map, and log path resolution.
   - Registers both `DatabaseLoggerHandler` and CI4 `FileHandler`.

### 2) Modifies error handling
1. `app/Config/Boot/development.php`
   - Sets `error_reporting(E_ALL)` and `display_errors=1`.
2. `app/Config/Boot/production.php`
   - Sets production-safe reporting and hides display errors.
3. `app/Config/Boot/testing.php`
   - Sets testing reporting and display behavior.
4. `public/index.php`
   - Applies early `ini_set()` / `error_reporting()` controls and front-controller hardening.

### 3) Implements custom log handlers
1. `app/Log/Handlers/DatabaseLoggerHandler.php`
   - Custom CI4 handler writing logs to `bf_error_logs` with fallback file sink and optional email notifications.

### 4) Overrides exception handling
1. `app/Config/Exceptions.php`
   - Overrides `handler(int $statusCode, Throwable $exception)` and custom-logs `BadRequestException` / 404 route misses.

### 5) Wraps `log_message()` or `Services::logger()`
1. `app/Helpers/debug_helper.php`
   - `debugLog()` wrapper conditionally forwards to `log_message('debug', ...)`.
2. `app/Helpers/uri_guard_helper.php`
   - `log_if_placeholder_in_uri()`, `guard_uri_placeholders()`, and `mymi_url_guard()` wrap and centralize logging behavior for URI placeholder leaks.
3. `app/Libraries/FallbackLogger.php`
   - Class-level `log()` wrapper that formats/sends fallback log entries to a file sink.

## Files Updated in This Audit
- `app/Config/Logger.php`
- `app/Config/Exceptions.php`
- `app/Config/Boot/development.php`
- `app/Config/Boot/production.php`
- `app/Config/Boot/testing.php`
- `app/Log/Handlers/DatabaseLoggerHandler.php`
- `app/Helpers/debug_helper.php`
- `app/Helpers/uri_guard_helper.php`
- `app/Libraries/FallbackLogger.php`
- `public/index.php`
- `docs/_audit/ci4-logger-audit-2026-02-18.md`

## Notes
- No `system/` files were modified.
- Formatting and existing `strict_types` usage were preserved.
- No new namespaces/classes were introduced, so PSR-4 mapping remained unchanged.
