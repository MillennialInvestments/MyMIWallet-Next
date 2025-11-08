# Phase 6 — Authentication Flow
- **Timestamp:** 2025-10-09 19:00 UTC
- **Environment:** DreamHost VPS (Nginx, PHP 8.2, MySQL)

## Login Sources
- **Local credentials:** `/login` GET+POST handled by `AuthController` (Myth/Auth service).
- **OAuth providers:** `auth/provider/{provider}` (Google, GitHub enabled in `Config\\Hybridauth`; LinkedIn scaffolded but disabled).
- **Manual helpers:** `/test-create-user` for diagnostics only (should be disabled outside dev).

## Throttling / Lockouts
- Parent controller uses `service('throttler')->check(md5($ip), 2, MINUTE)` for activation resend and `service('throttler')->check($throttleKey, 2, MINUTE)` for activation tokens.
- Myth/Auth login throttling defaults apply (5 attempts per minute per IP/identifier). Confirm values in `myth/auth/src/Config/Auth.php` during production rollout.

## Remember-Me Cookies
- `Config\\Auth::$allowRemembering = true`; Myth/Auth uses secure persistent cookies (selector/token pair stored in `auth_tokens`).
- Ensure cookies inherit `Secure`, `HttpOnly`, and `SameSite=Strict` from global config; verify across browsers.

## Post-Login Redirects
- Successful login redirects to `session('redirect_url') ?? site_url('/Dashboard')` (vendor override). `route_to('dashboard')` is attempted during social callbacks.
- Return parameter sanitization handled by Myth/Auth (only internal routes). Review any custom query param logic before enabling external redirects.

## Logout
- GET and POST routes both call `AuthController::logout()` which triggers `service('authentication')->logout()` and redirects to `/`.
- CSRF enforced on POST ensures logout forms cannot be forged. GET should remain for top-nav convenience; consider adding confirmation if triggered cross-site.

## Test Matrix
| Scenario | Steps | Expected Outcome | Status |
| --- | --- | --- | --- |
| Valid login | Submit correct credentials at `/login` | Redirect to `/Dashboard`, flash `Auth.loginSuccess` | **Pending** |
| Invalid password | Submit wrong password 5× | Lockout message `Auth.throttled` / HTTP 429 | **Pending** |
| Remember me | Check "remember" option, close browser, reopen | User remains authenticated (verify cookie flags) | **Pending** |
| OAuth login | Use Google provider | Callback creates/links user, redirect to dashboard | **Pending** |
| Logout (GET) | Click logout link | Session cleared, redirect `/` | **Pending** |
| Logout (POST) | Submit logout form with CSRF | Session cleared, redirect `/` | **Pending** |

## Follow-Up Tasks
1. Execute manual tests in staging to confirm throttle messaging and remember-me cookie behavior.
2. Add monitoring for repeated 429 responses to detect credential stuffing.
3. Implement logging/alerts when `auth()->check()` fails after OAuth callback (indicates provider mismatch).
