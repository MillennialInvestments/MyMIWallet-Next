# Phase 0 — Inventory & Guardrails
- **Timestamp:** 2025-10-09 19:00 UTC
- **Environment:** DreamHost VPS (Nginx, PHP 8.2, MySQL)

## Auth Route Definitions
| Path Pattern | HTTP Verb(s) | Handler | Notes | Source |
| --- | --- | --- | --- | --- |
| `/login` | GET | `App\\Controllers\\AuthController::login` | Primary login form | `app/Config/Routes.php`
| `/login` | POST | `App\\Controllers\\AuthController::attemptLogin` | Handles credential verification | `app/Config/Routes.php`
| `/logout` | GET/POST | `App\\Controllers\\AuthController::logout` | Allows menu link (GET) and form (POST) sign-outs | `app/Config/Routes.php`
| `/register` | GET | `App\\Controllers\\AuthController::register` | Baseline registration view | `app/Config/Routes.php`
| `/register` | POST | `App\\Controllers\\AuthController::attemptRegister` | Handles primary registration form submission | `app/Config/Routes.php`
| `/register/{ref}` | GET | `App\\Controllers\\AuthController::register/$1` | Referral code capture | `app/Config/Routes.php`
| `/{any}/register` | GET | `App\\Controllers\\AuthController::register` | Marketing landing variants use same view | `app/Config/Routes.php`
| `/{any}/register` | POST | `App\\Controllers\\AuthController::attemptRegister` | Ensures referral variant POSTs do not rely on auto-routing | `app/Config/Routes.php`
| `/{any}/register/{ref}` | GET | `App\\Controllers\\AuthController::register/$2` | Deep referral support | `app/Config/Routes.php`
| `/{any}/register/{ref}` | POST | `App\\Controllers\\AuthController::attemptRegister` | Aligns POST handling for deep referral URLs | `app/Config/Routes.php`
| `/activate` | GET | `App\\Controllers\\AuthController::activateAccount` | Tokenized activation fallback route | `app/Config/Routes.php`
| `/activate-account` | GET/POST | `App\\Controllers\\AuthController::activateAccount` | Canonical activation endpoint | `app/Config/Routes.php`
| `/resend-activate-account` | GET | `App\\Controllers\\AuthController::resendActivateAccount` | Throttled re-mail endpoint | `app/Config/Routes.php`
| `/resend-activation` | GET | `App\\Controllers\\AuthController::resendActivation` | Presents resend form | `app/Config/Routes.php`
| `/resend-activation` | POST | `App\\Controllers\\AuthController::resendActivationCode` | Submits resend request | `app/Config/Routes.php`
| `/forgot-password` | GET | `App\\Controllers\\AuthController::forgotPassword` | Password reset request form | `app/Config/Routes.php`
| `/forgot` | POST | `App\\Controllers\\AuthController::attemptForgot` | Issues reset token | `app/Config/Routes.php`
| `/reset-password` | GET | `App\\Controllers\\AuthController::resetPassword` | Password reset form | `app/Config/Routes.php`
| `/reset-password` | POST | `App\\Controllers\\AuthController::attemptReset` | Applies new password | `app/Config/Routes.php`
| `/get2FAQRCode` | POST | `App\\Controllers\\AuthController::get2FAQRCode` | Returns provisioning data (stubbed) | `app/Config/Routes.php`
| `/verify2FACode` | POST | `App\\Controllers\\AuthController::verify2FACode` | Verifies TOTP codes (stubbed) | `app/Config/Routes.php`
| `/Auth/link-robinhood` | POST | `App\\Controllers\\AuthController::linkRobinhood` | Robinhood link webhook | `app/Config/Routes.php`
| `/Auth/link-snaptrade` | POST | `App\\Controllers\\AuthController::linkSnapTrade` | SnapTrade link webhook | `app/Config/Routes.php`
| `/auth/provider/{provider}` | GET | `App\\Controllers\\AuthController::redirectToProvider/$1` | Hybridauth redirect | `app/Config/Routes.php`
| `/auth/provider/{provider}/callback` | GET | `App\\Controllers\\AuthController::handleProviderCallback/$1` | Hybridauth callback | `app/Config/Routes.php`
| `/auth/link/{provider}` | GET | `App\\Controllers\\AuthController::linkProvider/$1` | In-app linking flow | `app/Config/Routes.php`
| `/auth/unlink/{provider}` | GET | `App\\Controllers\\AuthController::unlinkProvider/$1` | In-app unlink flow | `app/Config/Routes.php`
| `/test-create-user` | GET | `App\\Controllers\\AuthController::createTempUser` | Diagnostics helper | `app/Config/Routes.php`

## Duplicate / Conflicting Routes
- `/API/Health` and `/API/Ops/OPcacheReset` are declared twice inside the API group (lines grouped near the API section). These should be deduplicated during a future cleanup to avoid maintenance drift.
- No additional auth-specific duplicates remain after rerouting `/resend-activation` to `AuthController`.

## Vendor Route Guardrail
- `app/Config/Routes.php` is the only routes file defining auth endpoints; there are no `require` calls pulling in `myth/auth` routing stubs. An `rg` search for `Myth\\Auth` inside `app/Config` returned no alternate group registrations, confirming the vendor route file is inactive.
- `Config\Feature::$autoRoutesImproved` remains `true`, but auto-routing is globally disabled via `$routes->setAutoRoute(false)` to prevent fallback into vendor controllers.

## Controller Source of Truth
- `app/Controllers/AuthController.php` exists and extends `Myth\Auth\Controllers\AuthController`, overriding view composition and social-login orchestration while preserving vendor logic for registration, activation, and reset flows.
- By forcing every auth route to the App namespace, vendor controllers stay unused while their service layer (`service('authentication')`, `service('activator')`, etc.) remains the underlying implementation.

## Dependency Map
- **Routes** → `App\Controllers\AuthController` (primary controller)
- **Controller** → `Myth\Auth` services:
  - `service('authentication')` for login/logout/remember-me
  - `model(Myth\Auth\Models\UserModel::class)` for persistence
  - `service('activator')`, `service('resetter')`, and `service('throttler')` for activation/reset/throttling logic
  - `Hybridauth` service via `Config\Hybridauth`
- **Views** supplied via `Config\Auth::$views`, now including `Auth/resend_activation.php`

## Outstanding Risks / Notes
- 2FA endpoints currently return stubbed JSON responses and do not integrate with Myth/Auth TOTP helpers yet. Flagged for remediation in later phases.
- `test-create-user` is exposed without throttling or authentication; keep it disabled in production environments or behind feature flags.
