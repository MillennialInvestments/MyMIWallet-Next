# Logging Audit — 2025-12-21

## Findings
- **File logging was disabled at runtime** because `WRITEPATH/logs` was absent on the deployed artifact. The default `FileHandler` could not create `log-YYYY-MM-DD.php`, so no filesystem logs were produced after 2025-12-19 14:15:01.
- **Database logging was never wired** into the active configuration: `app/Config/Logger.php` only registered the `FileHandler`. An outdated copy with the DB handler existed at `app/ConfigO/Logger.php` but was unused. No `App\Log\Handlers\DatabaseLoggerHandler` class shipped in the codebase.
- **Threshold protection**: production threshold now defaults to `3` (warnings+), non-prod uses `8` (debug+). Any `.env` override below `3` is clamped to avoid silent logging.
- **Recursion & fallback**: the new `DatabaseLoggerHandler` includes an in-memory + `$_SERVER` lock, direct file fallback (`writable/logs/db_logger_fallback.log`), and best-effort email notification via `LOGGER_ALERT_EMAIL` (default `support@mymiwallet.com`).
- **Health checks**: added `php spark logs:healthcheck`, `GET /API/Management/logHealthcheck` (guarded by env/IP/token/admin), and `scripts/ops/log_healthcheck.sh` for daily ops validation.

## Current Logger Configuration
- **Threshold**: `production => 3`, others `8` (clamped to >=3 if overridden via `logger.threshold`).
- **Handlers** (order matters):
  - `App\Log\Handlers\DatabaseLoggerHandler` → handles `warning` and above, writes to `bf_error_logs`, falls back to `writable/logs/db_logger_fallback.log`, optional alert email (`LOGGER_ALERT_EMAIL`).
  - `CodeIgniter\Log\Handlers\FileHandler` → handles all levels, writes `log-YYYY-MM-DD.php` under `WRITEPATH/logs` with `0644` permissions.
- **Path**: `WRITEPATH/logs/` is created automatically if missing.

## Active Handlers by Environment
| Environment | Threshold | File Handler | DB Handler |
|-------------|-----------|--------------|------------|
| production  | 3 (warnings+) | ✅ | ✅ (warnings/errors + alerts) |
| staging/dev | 8 (debug+)    | ✅ | ✅ (warnings/errors + alerts) |

## What changed since 2025-12-19
- No direct logger code changes landed after 2025-12-18; the 2025-12-19 deployments (`7e2f83d`, `5280db7`) shipped without `writable/logs/` and without the DB handler registered. That left both file and DB sinks inactive.
- `app/Config/Logger.php` remained on the default single `FileHandler`; `app/ConfigO/Logger.php` (added 2025-11-08) shows the intended DB handler but was never loaded.
- `.env` sample still suggests `logger.threshold = 4`; the new guard prevents disabling logs via an accidental `0`.

## Command outputs (audit trail)
Captured prior to applying the remediation to preserve the state of the system during the outage window.

### git log --since="2025-12-18"
```
commit 7e2f83d5bc3555f28ecb64f4052aa299e64b0189
Author: MillennialInvestments <admin@mymimillennialinvestments.com>
Date:   Fri Dec 19 15:48:53 2025 -0800

    12/19/2025 - Implement Mail rovider API Integration | Fix reserved characters in cache keys - TBJ
```

### git diff HEAD~20..HEAD -- app/Config/Logger.php app/Log/Handlers app/Config/Services.php .env\*
```
diff --git a/app/Config/Services.php b/app/Config/Services.php
index 0477362..c993e47 100644
--- a/app/Config/Services.php
+++ b/app/Config/Services.php
@@ -2,7 +2,8 @@
 
 namespace Config;
 
-use App\Libraries\{CrudCacheInvalidator, MyMIAnalytics, MyMIInvestments};
+use App\Libraries\{CrudCacheInvalidator, KimiClient, MyMIAnalytics, MyMIInvestments};
+use App\Services\AuthAuditService;
 use CodeIgniter\Config\BaseService;
@@ -47,6 +48,38 @@ class Services extends BaseService
 
         return new MyMIInvestments();
     }
+    ...
```

### grep -R "threshold" -n app/Config
```
app/Config/ContentEngine.php:121:            'microcap_threshold' => 75.0, // <$75m
app/Config/Logger.php:16:     * You can enable error logging by setting a threshold over zero. The
app/Config/Logger.php:17:     * threshold determines what gets logged. Any values below or equal to the
app/Config/Logger.php:18:     * threshold will be logged.
app/Config/Logger.php:33:    public $threshold = (ENVIRONMENT === 'production') ? 4 : 9;
app/Config/MyMIAuction.php:33:     * Minimum confidence threshold for displaying FMV. 0 shows "insufficient data".
app/Config/Exceptions.php:80:     * The related `Config\Logger::$threshold` should be adjusted, if needed,
```

### grep -R "DatabaseLoggerHandler" -n app
```
app/ConfigO/Logger.php:34:            $this->handlers['App\Log\Handlers\DatabaseLoggerHandler'] = [
```

## Remediation applied (summary)
- Created `App\Log\Handlers\DatabaseLoggerHandler` with recursion guard (static + `$_SERVER`), schema-aware inserts, direct fallback file, and optional alert emails.
- Registered DB + file handlers in `app/Config/Logger.php`, enforced log path creation, and clamped thresholds to avoid accidental disablement.
- Added CLI + HTTP healthchecks and an ops script to validate both sinks and surface regressions immediately.