# Phase 5 — Registration Flow Verification
- **Timestamp:** 2025-10-09 19:00 UTC
- **Environment:** DreamHost VPS (Nginx, PHP 8.2, MySQL)

## Input & Validation Rules
- Username: Myth/Auth default (`required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]`).
- Email: `required|valid_email|is_unique[users.email]`.
- Password: `required|strong_password` (Myth/Auth validator) plus confirmation match.
- Additional fields captured via form: `account_type`, `referral`, `referral_link` (stored separately in business logic).
- Recommendation: Document and enforce allowed referral formats (alphanumeric, max length) to prevent injection.

## Referral Handling
- Route patterns `/register/{ref}`, `/{landing}/register`, and `/{landing}/register/{ref}` all resolve to `AuthController::register`.
- Hidden inputs `referral` and `referral_link` pre-populated in `register_form.php`; ensure server-side registration logic reads and validates these fields before persistence.

## Activation Mode
- `Config\\Auth::$requireActivation` uses `EmailActivator`, so new accounts require email verification before login.
- `resend-activation` routes now point to `AuthController`, enabling the built-in resend flow.

## Email Delivery
- SMTP configured for DreamHost (see Phase 2). Actual delivery not tested in container; run end-to-end test on staging to confirm DreamHost accepts outbound mail with TLS.

## Test Checklist
| Scenario | Steps | Result |
| --- | --- | --- |
| Fresh registration | Visit `/register`, submit new email/username/password | **Pending** (requires staging test) |
| Referral path | Visit `/Apex/register/MYCODE`, submit form | **Pending** (verify referral code captured in DB) |
| Duplicate email | Register existing email | **Pending** (expect validation error `Auth.emailTaken`) |
| Duplicate username | Register existing username | **Pending** |
| Weak password | Submit password failing `strong_password` | **Pending** (ensure feedback shown) |
| Activation email | Confirm activation email arrives and link works | **Pending** |
| Resend activation | Use `/resend-activation` with valid email | **Pending** |

## Edge Cases & Notes
- Myth/Auth returns generic response when email already registered. Ensure UI surfaces `errors` flash data via `_message_block`.
- Activation throttling is implemented in parent controller (`service('throttler')->check(...)`). Monitor logs for 429 status responses.
- Validate that `AuthController::register` denies access if logged-in user hits the route (parent checks `auth->check()`).

## Follow-Up Actions
1. Execute manual acceptance tests (Phase 14) on staging and record pass/fail above.
2. Capture email transport logs from DreamHost for registration + activation events.
3. Add analytics/tracking for referral submissions to confirm marketing attribution.
