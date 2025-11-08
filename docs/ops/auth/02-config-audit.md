# Phase 2 — Configuration Review
- **Timestamp:** 2025-10-09 19:00 UTC
- **Environment:** DreamHost VPS (Nginx, PHP 8.2, MySQL)

## Myth/Auth Baseline vs App Overrides
| Setting | Effective Value | Deviation from Myth/Auth Default | Notes |
| --- | --- | --- | --- |
| `$views['login']` | `Auth/login` | Matches default | Custom view using DashLite skin |
| `$views['register']` | `Auth/register` | Custom layout | Handles referral-aware templates |
| `$views['resend-activation']` | `Auth/resend_activation` | **New override** | Prevents undefined index in parent controller |
| `$landingRoute` | `/Dashboard` | Customized from `home` | Redirects authenticated users to dashboard |
| `$allowRegistration` | `true` | Default | Self-service registration enabled |
| `$requireActivation` | `EmailActivator` | Default | Email confirmation required |
| `$activeResetter` | `EmailResetter` | Default | Email-based password resets |
| `$allowRemembering` | `true` | Default | Remember-me cookies allowed |
| `$hashAlgorithm` | `PASSWORD_ARGON2ID` (if available) | Stricter than default `PASSWORD_DEFAULT` | Set in constructor when Argon2ID exists |
| `$minimumPasswordLength` | `8` | Default | Aligns with Myth/Auth guidelines |
| `$passwordValidators` | Adds `App\Authentication\Passwords\CustomCompositionValidator` | Custom | Enforces project-specific password complexity |

## Email Configuration (`app/Config/Email.php`)
- From address: `support@mymiwallet.com`
- Sender name: `MyMI Wallet - Customer Support`
- Transport: SMTP over SSL (`smtp.dreamhost.com:465`)
- Username: `support@mymiwallet.com`
- Password: **Hard-coded** `MyMI2024!` — must be replaced with an environment variable fetch (e.g., `env('email.support.password')`) before commit to production repositories.
- Timeout: 30s, HTML mail enabled.

## Security & CSRF (`app/Config/Security.php`)
- CSRF protection: cookie-based with randomized tokens, 5-minute expiry, regenerate on every submission.
- Cookies: `Secure=true`, `HttpOnly=true`, `SameSite=Strict`.
- Redirect on CSRF failure disabled (`$redirect = false`), meaning API clients will receive 403 responses rather than redirects.

## Validation (`app/Config/Validation.php`)
- Rule sets include Myth/Auth password validators and custom application validators.
- No explicit `registrationRules` override is defined, so Myth/Auth fallback rules apply (`username` alpha_numeric_space, unique; `email` valid & unique).
- Recommend codifying registration rules in this file to avoid divergence with vendor defaults.

## Encryption (`app/Config/Encryption.php`)
- Driver: OpenSSL, cipher `AES-256-CTR`, digest `SHA512`.
- **Key is empty**. Production must set `$key = env('encryption.key')` (32+ random bytes) to support secure token storage, especially for 2FA secrets and password reset data.

## Application (`app/Config/App.php`)
- `baseURL`: `https://www.mymiwallet.com/`
- `allowedHostnames`: includes `api.mymiwallet.com`, `dev.mymiwallet.com`, bare/apex domains.
- `indexPage`: `index.php` still present; evaluate if front controller rewriting removes need.
- Locale: `en`, timezone `America/Chicago`.
- CSP: Enabled & enforced with `'self'` sources for scripts, styles, images, connect. Needs expansion for QR codes and OAuth providers.
- `forceGlobalSecureRequests = false`; consider enabling for full HTTPS enforcement behind Nginx.

## Session (`app/Config/Session.php` & `app/Config/App.php`)
- Driver: File-based (`WRITEPATH . 'session'`). Ensure writable path and CRON-based garbage collection in production.
- Cookie name: `ci_session`, expiration 2 hours, regeneration every 5 minutes.
- `matchIP = false` — acceptable behind load balancers but consider enabling once proxy headers are trusted.
- Secure cookie flags inherited from `Security.php`.

## Password Hashing
- Myth/Auth user entity uses Argon2ID (when available) with cost values `memory=2048`, `time=4`, `threads=4`. These are stronger than defaults; monitor CPU impact.
- `App\Authentication\Passwords\CustomCompositionValidator` should be reviewed to ensure alignment with UX expectations (minimum length, complexity hints).

## Recommendations
1. Move SMTP password and encryption key to environment variables; never commit secrets.
2. Define explicit `registrationRules` in `Validation.php` to prevent regressions if Myth/Auth upstream changes defaults.
3. Expand CSP directives for OAuth & TOTP (see Phase 8/11).
4. Evaluate `forceGlobalSecureRequests` once Nginx enforces HTTPS to harden transport security.
