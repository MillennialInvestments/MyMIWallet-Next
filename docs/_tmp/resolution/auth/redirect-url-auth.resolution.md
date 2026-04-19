# Resolution: redirect-url-auth.txt

## Scope
- Active auth controller redirect capture/read/consume path.

## Confirmed Root Cause
- Redirect normalization originally lived mostly in controller-reader logic; upstream writers were not consistently normalized.

## Fix Applied
- `AuthController` now delegates sanitizer logic to shared helper (`redirect_url_sanitize`).
- `rememberRedirectUrl()` now writes via shared writer helper (`redirect_url_store`).
- Added login/register redirect capture logs:
  - raw posted values,
  - session value before/after remember,
  - final destination log in `determineRedirectDestination()`.

## Validation
- Auth sanitizer unit tests cover wildcard, loop targets, external URLs, valid internal paths, and tracking-parameter stripping.

## Next Step
- Monitor new auth redirect logs during live login/register flows.
