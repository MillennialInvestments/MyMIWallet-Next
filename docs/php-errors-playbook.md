# PHP Error Playbook

This playbook documents the recurring PHP issues seen in MyMI Wallet along with
recommended diagnostics and fixes.

## Controller Visibility & Signatures
- **Symptom:** `Protected method ...::initController()` or `renderView()` not accessible.
- **Fix:** Ensure controller overrides remain `public` and match parent signatures. For CodeIgniter 4
  controllers, call `parent::initController()` after accepting the framework interfaces.
- **Verification:** Run `php spark routes` or hit the affected endpoint to confirm the controller boots.

## Final ExceptionHandler Replacement
- **Symptom:** Fatal error extending `CodeIgniter\Debug\ExceptionHandler` (final class).
- **Fix:** Implement `CodeIgniter\Debug\ExceptionHandlerInterface` in a custom handler (e.g.,
  `App\Libraries\ProductionExceptionHandler`) and register it via `App\Config\Exceptions::$handler`.
- **Verification:** Trigger a controlled exception locally and ensure the handler logs appropriately.

## Duplicate Config Classes
- **Symptom:** Autoloader conflicts such as `Cannot redeclare class App\Config\SiteSettings`.
- **Fix:** Keep a single authoritative config under `app/Config/`. Move archival copies into `_archive/`
  or adjust namespaces for module-specific overrides (e.g., `App\Modules\APIs\Config`).
- **Verification:** Run `composer dump-autoload` and confirm no duplicate warnings remain.

## OPcache Runtime Toggles
- **Symptom:** Warnings like `PHP Warning: ini_set(): Cannot enable opcache` on shared hosts.
- **Fix:** Remove runtime `ini_set` toggles (e.g., `@ini_set('opcache.enable', '1');`). Configure OPcache
  through `php.ini` or FPM pool configs instead. For CLI differences, use environment-specific ini files.
- **Verification:** Deploy with updated ini files and confirm no runtime warnings in logs.

## Cron Repeat Failures
- **Symptom:** CRON jobs looping on fatal errors or restarting too quickly.
- **Fix:** Audit `crontab.txt` and any system crontabs. Disable failing entries temporarily, add logging,
  and ensure tasks exit non-zero on fatal conditions to allow monitoring.
- **Verification:** Monitor the cron log after adjustments; ensure jobs execute at expected intervals without repeats.

## General Triage
1. Check `logs/` for stack traces around the failure window.
2. Capture the failing request/CLI command and replicate locally when possible.
3. File a Codex task referencing the observed error and attach relevant log excerpts.
