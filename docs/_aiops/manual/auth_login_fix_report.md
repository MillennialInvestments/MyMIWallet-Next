# Auth Login Fix Report (Myth/Auth + CI4)

## Root cause(s)

1. **Spark bootstrap instability** blocked auth diagnostics initially:
   - stale `writable/cache/FileLocatorCache` pointed to non-existent deployment paths (`/home/mymiteam/.../vendor/.../kint_helper.php`).
   - command trait method signature mismatch (`SubsCommandTrait::optBool`) fatally conflicted with `SafeBaseCommand::optBool`.
2. **High-probability Myth/Auth misconfiguration** found in autoload:
   - `Myth\\Auth` namespace was mapped to `app/ThirdParty/myth-auth/src` (missing) instead of Composer vendor package.
3. **Auth audit robustness gap**:
   - `AuthAuditRunner::insertAuditLog()` called `tableExists()` without guarding DB connectivity exceptions.
4. **Command parity gap**:
   - required deterministic command `auth:smoke-test --json` did not exist.

## Files changed

- `app/Commands/SafeBaseCommand.php`
  - Added backward-compatible option helpers to support both `optBool($flags, 'x')` and legacy `optBool('x')` usage.
- `app/Commands/Support/SubsCommandTrait.php`
  - Removed conflicting `optBool/optInt/optString` declarations; trait now uses base command option methods.
- `app/Config/Autoload.php`
  - Removed broken local `Myth\\Auth` namespace override so Composer package resolution is authoritative.
- `app/Services/Spark/AuthAuditRunner.php`
  - Hardened DB/table checks in `insertAuditLog()` with null/exception guards.
- `app/Commands/Auth/SmokeTest.php`
  - Added deterministic `auth:smoke-test` command with `--json` output.
- `app/Modules/Advisor/Controllers/AdvisorController.php`
  - Removed incompatible private `$alerts` property shadowing base controller.
- `app/Modules/Management/Controllers/ChatUsageController.php`
  - Aligned `$helpers` property type with inherited base declaration.

## Pre-flight command outputs

```bash
php spark --version
# CodeIgniter v4.7.0 (CLI command runtime reachable; stty warning in non-TTY)

php spark list | grep -i auth
# Auth + auth command groups listed, including auth:audit and auth:smoke-test

php spark routes | grep -i -E "login|logout|register|auth"
# BLOCKED in this container by unrelated class-compat fatals in non-auth modules during full route introspection

php spark migrate:status
# DatabaseException: Main connection [MySQLi]: Connection refused

php spark cache:clear
# Cache cleared.

php spark auth:audit
# Runs; reports failures due DB unavailable + session warning

php spark logs:healthcheck
# Runs; reports db_log_ok=false due DB unavailable

php spark logs:summarize
# Runs; no log file for current day found
```

## Auth log error extraction (grouped)

Pattern scan source: `writable/logs/log-*.php`

- `attemptLogin`
  - `writable/logs/log-2026-02-07.php:361` (`AuthController->attemptLogin()` stack evidence).
- `Call to a member function`
  - Multiple CRITICAL entries in `log-2026-02-08.php` (`getUserWallets() on null`, `close() on null`, etc.).
- `PageNotFoundException`
  - Multiple CRITICAL entries in `log-2026-02-08.php` and earlier logs.
- `Myth\Auth`, `Unable to log you in`, `tableExists() on null`, `CSRF`, `Filters`
  - No direct matches in latest log set at scan time.

## Before/after reproduction

### Before
1. `php spark --version` failed due helper path cache mismatch and command trait signature fatal.
2. `php spark auth:audit` could not be trusted because CLI bootstrap was unstable.

### After
1. Spark boots reliably and auth command set is discoverable.
2. `php spark auth:audit` executes and emits audit report.
3. `php spark auth:smoke-test --json` executes deterministically and returns structured JSON.

## Verification commands

```bash
php spark cache:clear
php spark migrate:status
php spark auth:audit
php spark auth:smoke-test --json
```

## Notes

- This container currently cannot reach MySQL (`Connection refused`), so full login/register database-path verification is limited.
- `php spark routes` still encounters unrelated controller inheritance fatals outside auth scope; additional repo-wide class-compat cleanup is recommended.
