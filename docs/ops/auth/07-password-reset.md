# Phase 7 — Password Reset Flow
- **Timestamp:** 2025-10-09 19:00 UTC
- **Environment:** DreamHost VPS (Nginx, PHP 8.2, MySQL)

## Flow Overview
1. User visits `/forgot-password` (GET) rendered by `AuthController::forgotPassword()`.
2. POST `/forgot` triggers `AuthController::attemptForgot()` which uses `service('resetter')` to create a token stored in `auth_reset_attempts`.
3. Email sent via SMTP with reset link to `/reset-password?token=...` (Myth/Auth email view `Auth/emails/forgot`).
4. GET `/reset-password` shows form; POST `/reset-password` calls `AuthController::attemptReset()` to validate token, enforce password rules, and persist the new hash.

## Token Lifecycle
- Tokens stored in `auth_reset_attempts` with expiry `Config\\Auth::$resetTime = 3600` seconds (1 hour).
- On successful reset, parent controller nulls `reset_hash` and sets `reset_at` timestamp in `users` table.
- `auth_tokens` (remember-me) invalidated automatically by Myth/Auth when password changes.

## Security Controls
- CSRF enforced on POST `/forgot` and `/reset-password`.
- Myth/Auth obscures whether an email exists by always returning success message.
- Throttling: Review vendor config to ensure repeated reset attempts are rate-limited (default 2 per minute per IP).

## Test Scenarios
| Scenario | Expected Behavior | Status |
| --- | --- | --- |
| Request reset for valid email | Email dispatched, success flash message | **Pending** |
| Request reset for unknown email | Same generic success response | **Pending** |
| Reset with valid token | Password updated, redirected to login with success message | **Pending** |
| Reset with expired token | Error flash `Auth.resetTokenExpired`, prompt to retry forgot | **Pending** |
| Reuse token after success | Token invalidated, error message | **Pending** |
| Missing/invalid token parameter | Redirect to `/forgot-password` with error | **Pending** |

## Follow-Up Tasks
1. Perform real reset cycle on staging; capture email headers and confirm DreamHost DKIM/SPF alignment.
2. Implement logging for reset attempts (success/failure) to aid incident response.
3. Schedule cron cleanup for `auth_reset_attempts` to remove expired tokens.
