# Phase 13 — Security Review
- **Timestamp:** 2025-10-09 19:00 UTC
- **Environment:** DreamHost VPS (Nginx, PHP 8.2, MySQL)

## Checklist
| Control | Status | Notes |
| --- | --- | --- |
| HTTPS Enforcement | ⚠️ Pending | `App::$forceGlobalSecureRequests = false`; rely on Nginx redirect. Consider enabling once reverse proxy config verified. |
| Cookie Flags | ✅ | `Security.php` enforces `Secure`, `HttpOnly`, `SameSite=Strict`. Confirm compatibility with OAuth popups (may require `Lax`). |
| CSRF Protection | ✅ | Cookie-based tokens enforced via filters on all auth POST routes. |
| Password Hashing | ✅ | Argon2ID with elevated cost parameters. Monitor CPU usage. |
| Encryption Key | ❌ | `Config\\Encryption::$key` empty; must set env-based key before storing 2FA secrets/reset tokens securely. |
| Open Redirect Prevention | ✅ | Myth/Auth restricts redirects to internal URLs; social callback uses `route_to` fallback. |
| Throttling | ⚠️ Partial | Activation/resend throttled; confirm login throttling configuration and log triggers. |
| Audit Logging | ⚠️ Partial | Basic `log_message` calls exist; need centralized logging (see Phase 12). |
| Vendor Integrity | ⚠️ | Vendor controller heavily customized inside `myth/auth`. Future upgrades may overwrite; consider relocating patches to App namespace. |

## Additional Findings
- `/test-create-user` route publicly accessible due to `authcheck` exception. Restrict via `feature` filter or remove in production to avoid abuse.
- CSP lacks allowances for TOTP QR codes and OAuth providers; update before enabling these features to prevent blocked resources.
- Email SMTP credentials are hard-coded in repository; migrate to environment variables immediately.

## Remediation Plan (High Priority)
1. Populate `Encryption::$key` from environment and rotate secrets.
2. Remove or protect `/test-create-user` route.
3. Move SMTP password to env var and purge from Git history if necessary.
4. Document vendor overrides and plan migration back into `app/` namespace to ease Myth/Auth updates.
