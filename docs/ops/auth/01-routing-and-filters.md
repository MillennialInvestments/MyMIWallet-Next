# Phase 1 — Routing & Filters Wiring
- **Timestamp:** 2025-10-09 19:00 UTC
- **Environment:** DreamHost VPS (Nginx, PHP 8.2, MySQL)

## Route Table (Auth Scope)
| Route | Verb | Controller::method | Filters (before/after) | Notes |
| --- | --- | --- | --- | --- |
| `/login` | GET | `AuthController::login` | `authcheck` (global before, except list) / `cspoff`, `sessionTracker`, `observability`, `jsonException` (global after) | Presents login form |
| `/login` | POST | `AuthController::attemptLogin` | `csrf`, `authcheck` / `cspoff`, `sessionTracker`, `observability`, `jsonException` | Requires CSRF token |
| `/logout` | GET/POST | `AuthController::logout` | `authcheck`; POST additionally enforced by `csrf` | Clears session and redirects |
| `/register` (+ referral variants) | GET | `AuthController::register` | `authcheck` | View selection based on URI |
| `/register` (+ referral variants) | POST | `AuthController::attemptRegister` | `csrf`, `authcheck` | Handles hidden referral payload |
| `/activate`, `/activate-account` | GET/POST | `AuthController::activateAccount` | `csrf` on POST; GET inherits `authcheck` exception list | Accepts query token or posted code |
| `/resend-activate-account` | GET | `AuthController::resendActivateAccount` | `authcheck` | Trigger throttled resend |
| `/resend-activation` | GET | `AuthController::resendActivation` | `authcheck` | Renders resend form |
| `/resend-activation` | POST | `AuthController::resendActivationCode` | `csrf`, `authcheck` | Submits resend request |
| `/forgot-password` | GET | `AuthController::forgotPassword` | `authcheck` | Reset request form |
| `/forgot` | POST | `AuthController::attemptForgot` | `csrf`, `authcheck` | Issues reset email |
| `/reset-password` | GET | `AuthController::resetPassword` | `authcheck` | Reset form |
| `/reset-password` | POST | `AuthController::attemptReset` | `csrf`, `authcheck` | Applies new password |
| `/get2FAQRCode` | POST | `AuthController::get2FAQRCode` | `csrf`, `authcheck` (endpoint should be login protected) | Currently stubbed response |
| `/verify2FACode` | POST | `AuthController::verify2FACode` | `csrf`, `authcheck` (should only be called after login) | Currently stubbed response |
| `/Auth/link-robinhood` | POST | `AuthController::linkRobinhood` | `csrf`, `authcheck` (requires login) | REST hook returning JSON |
| `/Auth/link-snaptrade` | POST | `AuthController::linkSnapTrade` | `csrf`, `authcheck` | REST hook returning JSON |
| `/auth/provider/{provider}` | GET | `AuthController::redirectToProvider` | `authcheck` exception; relies on Hybridauth internal CSRF | Begins OAuth redirect |
| `/auth/provider/{provider}/callback` | GET | `AuthController::handleProviderCallback` | `authcheck` exception | Completes OAuth flow |
| `/auth/link/{provider}` | GET | `AuthController::linkProvider` | `authcheck` (requires login) | Kicks off linking |
| `/auth/unlink/{provider}` | GET | `AuthController::unlinkProvider` | `authcheck` (requires login) | Removes provider mapping |
| `/test-create-user` | GET | `AuthController::createTempUser` | `authcheck` (except list currently allows public access) | Diagnostics endpoint — restrict in production |

## Auto-Routing
- `$routes->setAutoRoute(false);` ensures every auth endpoint is explicitly mapped. Previously missing POST routes for registration, reset, and activation were added so the application no longer depends on legacy auto-routing.
- Audit of controllers revealed no additional auth methods exposed via auto-routing that now require explicit entries.

## Filters & CSRF Notes
- `Config\Filters::$filters['csrf']` now scopes the CSRF filter to every auth POST URI (login, register, forgot, reset, activation, 2FA, and vendor webhook endpoints). This protects all state-changing flows without impacting unauthenticated marketing pages.
- Global `authcheck` filter exceptions already cover guest-visible routes, so CSRF enforcement does not introduce redirect loops.
- `Security::$csrfProtection` is set to `cookie` with randomized tokens and a 5-minute expiry; ensure frontend forms refresh the token for long-lived registration sessions.

## CSP / Headers
- CSP is globally enabled and enforced in `Config\App` with `script-src 'self'` and `img-src 'self'`. Serving TOTP QR codes via `data:image/png;base64` requires adding `'data:'` to `$CSPImgSrc` or injecting a nonce policy in the future. Documented in Phase 8.
- OAuth redirects rely on external domains; confirm `$CSPConnectSrc` and `$CSPFrameSrc` (if used) allow the Hybridauth providers you plan to enable. Currently only `'self'` is whitelisted.

## Actions Required
1. Extend CSP image/connect lists to include `data:` URIs and provider endpoints before enabling 2FA QR rendering or OAuth popups in production.
2. Revisit `authcheck` exception list in `Config\Filters` to ensure `/test-create-user` is not publicly reachable.
3. Document CSRF token refresh expectations for single-page modals consuming `/get2FAQRCode` and `/verify2FACode`.
