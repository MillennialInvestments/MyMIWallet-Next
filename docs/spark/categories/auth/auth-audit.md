# spark:auth:audit

## Purpose
Audit Myth:Auth authentication and account lifecycle flows end-to-end, including registration, login, and reset flows.

## Usage
php spark auth:audit

## Arguments
- None.

## What It Touches
- Database tables: `users`, `auth_groups`, `auth_groups_users`, `auth_tokens`, `auth_logins`, `auth_reset_attempts`, `bf_error_logs`
- Files/directories: Reads `app/Views/Auth/register_form.php` to confirm CSRF inclusion.
- Cache: None
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (creates/updates/deletes test users and logs issues)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes (use a low-traffic window).
- Suggested schedule: Weekly.

## Related Commands
- spark:auth:smoke
- spark:auth:funnel-check
- spark:routes:auth-audit

## Failure Modes
- Missing auth tables or misconfigured Myth:Auth settings.
- Unable to create or clean up test users.
- Audit log insert failures (check `bf_error_logs`).

## Status
- Existing
