# GT-002-02 Auth Functional Certification

## Objective

Certify MyMI Wallet user-facing authentication flows without mutating production.

## Scope

- Login page
- Registration routes
- Activation routes
- Password reset route
- Logout route discovery
- OAuth/provider route discovery
- Runtime error scan for known auth failures

## Status

CONFIRMED_DEFECT_FOUND

## Evidence

- `docs/gt-002/evidence/GT-002-02/auth-routes.txt`
- `docs/gt-002/evidence/GT-002-02/auth-controller-surface.txt`
- `docs/gt-002/evidence/GT-002-02/auth-view-files.txt`
- `docs/gt-002/evidence/GT-002-02/auth-config-surface.txt`
- `docs/gt-002/evidence/GT-002-02/auth-public-get-smoke-matrix.tsv`
- `docs/gt-002/evidence/GT-002-02/auth-runtime-error-scan.txt`


## Result summary

- `/login` returned HTTP 200 with login/form/CSRF signals.
- `/register` returned HTTP 200 with registration/form/CSRF signals.
- `/register/success` returned HTTP 200.
- `/resend-activation` returned HTTP 200.
- `/reset-password` returned HTTP 200.
- `/Free/register` returned HTTP 404.
- `/Beta/register` returned HTTP 404.
- `/activate` returned HTTP 429 and requires controlled token/rate-limit-safe testing.
- `/activate-account` returned HTTP 429 and requires controlled token/rate-limit-safe testing.

## Confirmed Golden Tasks

- `docs/gt-002/golden-tasks/GT-002-02A-registration-legacy-alias-404.md`

## Controlled tests still required

- Activation token flow.
- Registration POST with controlled non-production/test-safe account.
- Password reset POST with controlled non-production/test-safe account.
- Login POST with controlled test credentials.


## Certification rules

- Public auth pages must return expected HTTP status.
- Login and registration pages must render usable form content.
- CSRF presence must be confirmed where forms submit mutations.
- Runtime exceptions such as `AUTH_FAIL` must be classified.
- No account creation, password reset submission, login POST, email send, or DB mutation is allowed in this baseline pass.

## Safety

No production mutation was performed.

No production database mutation was performed.

No production rollback was performed.
