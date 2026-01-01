# Auth Registration Audit & Alerting

## Myth/Auth integration review findings
- **Routes:** `app/Config/Routes.php` wires registration through `AuthController::register` (GET) and `AuthController::attemptRegister` (POST), with dynamic referral-friendly patterns also pointing to `attemptRegister`. CSRF is not globally enabled in `app/Config/Filters.php`; enable route-level CSRF if stricter protection is required.
- **Filters:** Myth/Auth login/role/permission filters are registered; global CSRF remains commented out. No exclusions currently target the `/register` POST route.
- **Events:** No auth-specific event hooks are registered in `app/Config/Events.php`.
- **Email transport:** `app/Config/Email.php` uses DreamHost SMTP defaults with runtime overrides via `.env`.
- **Controllers:** `app/Controllers/AuthController.php` wraps Myth/Auth and is now the single point for registration auditing.
- **Logging:** Default `app/Config/Logger.php` keeps file logging; `app/ConfigO/Logger.php` enables the `DatabaseLoggerHandler` when in production environments. All audit logs use `log_message()` for handler compatibility.

## Registration attempt + failure alerting
- `App\Services\AuthAuditService` now emits support alerts on **every POST** to `attemptRegister`, including validation failures, DB errors, and unexpected throwables.
- Alerts include: normalized email, timestamp, IP, URI, HTTP method, user agent, POST field keys (no values), attempt/result status, event ID, and attempt ID. When a throwable exists, the class/file/line are appended.
- Every alert and failure is logged via `log_message()` with the same metadata. Successes are logged at `info` level without emailing to avoid noise.
- The controller captures errors and feeds them to the audit service so validation/activation issues also trigger logs + support emails.

## Throttling and spam prevention
- Lightweight throttling caps alerts to **5 per 15 minutes** per IP and per email hash using the configured cache store. When the ceiling is reached, auditing still records the attempt row but skips sending emails and logs the throttling decision.
- Throttle keys: `auth_audit_ip_<sha256(ip)>`, `auth_audit_email_<sha256(email)>`, and a combined `auth_audit_pair_<sha256(email|ip)>`. Raw email/IP are not embedded in the key names to avoid reserved characters and to reduce PII leakage.

## Database audit trail
Every registration POST is stored in `bf_auth_registration_attempts` with status transitions to `success` or `failed`.

```sql
CREATE TABLE `bf_auth_registration_attempts` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL DEFAULT '',
    `email_hash` CHAR(64) NULL,
    `ip_address` VARCHAR(45) NOT NULL DEFAULT '',
    `user_agent` VARCHAR(255) NOT NULL DEFAULT '',
    `uri` VARCHAR(255) NOT NULL DEFAULT '',
    `status` ENUM('attempted', 'success', 'failed') NOT NULL DEFAULT 'attempted',
    `error_message` TEXT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_email_hash` (`email_hash`),
    KEY `idx_status_created_at` (`status`, `created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

## Operational notes
- Support emails are sent from/to `support@mymiwallet.com` by default; override with `support.email`/`support.name` in `.env`.
- No passwords or raw POST values are logged or emailed. User agents and errors are truncated to safe lengths.
- If email sending fails, the service logs a single warning and does not recurse.
- Cached throttle counters respect the configured cache driver; file cache is sufficient if Redis is unavailable.

## Testing checklist
1. **Valid registration** – expect "attempt" email, DB row moves to `success`, and success log entry.
2. **Duplicate email** – validation failure triggers error log + support email; DB row ends as `failed` with error summary.
3. **Invalid email format** – validation failure logged/emailed; row status `failed`.
4. **Missing password** – password rule failure logged/emailed; row status `failed`.
5. **Forced DB failure** – temporarily break the users table insert; ensure failure email + log and persisted `failed` row.
6. **Forced email failure** – misconfigure SMTP in a test env; ensure warning log for send failure while the request still returns gracefully.
7. **Throttle check** – submit >5 attempts from same IP/email within 15 minutes; verify later attempts log throttling, suppress emails, and still write attempt rows.
8. **bf_error_logs** – confirm DatabaseLoggerHandler (production) or file logs include the error-context messages above.