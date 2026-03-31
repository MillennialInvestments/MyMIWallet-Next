# Registration Launch Readiness Audit

## Route Map (Registration + Activation)
- `GET /register` → `AuthController::register`
- `POST /register` → `AuthController::attemptRegister`
- `GET /register/{referral}` → `AuthController::register/$1`
- `GET /Discord/register` → `AuthController::register` (explicit)
- `GET /Discord/register/{referral}` → `AuthController::register/$1` (explicit)
- `POST /Discord/register` → `AuthController::attemptRegister` (explicit)
- `GET /{dynamic}/register` → `AuthController::register` (fallback)
- `GET /{dynamic}/register/{referral}` → `AuthController::register/$2` (fallback)
- `POST /{dynamic}/register` → `AuthController::attemptRegister`
- `GET /register/success` → `AuthController::registerSuccess`
- `POST /register/resend-activation` → `AuthController::resendRegistrationActivation`
- `GET /activate` + `/activate-account` + POST variants → `AuthController::activateAccount`

## Source Attribution Map
- Captured by `RegistrationAttributionService::resolve()`.
- Stored in session under `registration_attribution` during GET.
- Re-resolved on POST and merged with hidden fields/query/session.
- Persisted to `users` on successful registration:
  - `source_channel`, `source_slug`, `referral_code`, `campaign_code`, `utm_source`, `utm_medium`, `utm_campaign`, `landing_path`.

## Discord/Register Behavior
- `/Discord/register` is first-class via explicit route priority.
- Source content resolved through `RegistrationSourceContentService` + `Config\RegistrationSources`.
- Split layout remains supported using intro view + shared form backend.
- Promo cross-platform sections rendered under form via reusable partial.

## Issues Found
1. Dynamic route previously relied on broad catch-all; Discord route not explicit.
2. Registration form posted to canonical `/register`, risking source context drift.
3. Attribution persistence did not include source slug/UTM/landing path.
4. Promo content was view-scattered and hard to scale.

## Fixes Applied
- Added explicit Discord register GET/POST routes before dynamic fallbacks.
- Switched form action to current URL path.
- Added configurable source content map + resolver service.
- Added reusable promo section renderer partial.
- Added migration for expanded attribution fields in `users`.
- Added request-id aware logging context for registration submissions.
- Added post-registration Discord welcome handling at first login.

## Remaining Risks
- Existing historical source-specific views still vary in quality.
- Full integration tests depend on local Myth/Auth DB fixture fidelity.

## Launch Readiness Verdict
**YES WITH MINOR CAVEATS**
