# CI4 Logging + Debug Visibility Hardening — 2026-02-18

## What Changed

### Logger stability
- Reordered handlers so `FileHandler` runs before `DatabaseLoggerHandler`.
- Normalized both handlers to `self::ALL_LEVELS`.
- Kept DB handler non-blocking to preserve file logging behavior.

### Database logger resilience
- Changed lock contention behavior to return `false` when lock cannot be acquired, so downstream handlers can proceed.
- Added explicit DB connection guard in `writeToDatabase()` (`$db->connID` check) before insert.

### Environment and boot visibility
- Added Dotenv safe loading in `public/index.php` before environment resolution.
- Updated environment resolution to use `.env` values deterministically.
- Wrapped CI boot sequence in `try/catch` with emergency logging support.
- Added `App\Libraries\EmergencyLogger` for pre-framework failure logging.

### Exception visibility
- Updated `Config\Exceptions::handler()` return flow to explicit handler variable path with no suppression branch.

### Debug toolbar reactivation
- `Filters` now conditionally adds `toolbar` only in development.
- `Toolbar` collectors updated to include Config, Database, Events, Files, Logs, Routes, Timers, Views.

### CSP dev compatibility
- `ContentSecurityPolicy` now allows `script-src` `unsafe-inline` in development only.

### Validation utility
- Added `spark logs:doctor` command to verify:
  - writable logs directory
  - DB connectivity
  - DB insert probe
  - file log probe
  - exception log probe
  - auth/users table presence probe

### Manual debug route
- Added temporary development-only route `/debug/manual-exception` that throws `Exception('Manual test exception')`.

## Manual Verification Checklist
1. Visit `/debug/manual-exception` in development.
2. Confirm stack trace renders in browser.
3. Confirm new entry appears in `writable/logs/` CI log file.
4. Confirm new entry appears in `bf_error_logs`.
5. Confirm Debug Toolbar renders on page bottom.
6. Run `php spark logs:doctor` and inspect pass/fail output.
