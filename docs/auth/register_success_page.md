# Register Success Page

## Purpose
Provide a clear post-registration checklist and a safe way to resend verification emails without enumerating accounts.

## Route + controller
- **GET `/register/success`** → `app/Controllers/AuthController.php::registerSuccess()`
- **POST `/register/resend-activation`** → `app/Controllers/AuthController.php::resendRegistrationActivation()`

## View
- `app/Views/Auth/register_success.php`

## Page content
- Step-by-step guide:
  1. Check inbox for verification.
  2. Click activation link.
  3. Log in to complete onboarding.
- Login CTA.
- Resend verification email form (email address input).

## Safety + rate limiting
- `resendRegistrationActivation()` uses the CI throttler to limit resend attempts.
- Responses are **generic** regardless of account existence.
- Logging captures success, failure, throttling, and missing-email attempts.

## Code placement notes
- Register success view is rendered from `AuthController::registerSuccess()` with `Auth` layout (`app/Views/Auth/layout`).
- Resend action stays in the same controller to centralize auth-related logs.

## Logging
- `AuthController::registerSuccess()` logs each render.
- `AuthController::resendRegistrationActivation()` logs throttling, success, and failure details.
