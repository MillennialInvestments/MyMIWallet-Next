# GT-002-02E-A Auth Login Exception Diagnosis

## Objective

Diagnose production login exceptions without submitting additional login POSTs and without mutating production data.

## Status

READ_ONLY_DIAGNOSIS_IN_PROGRESS

## Confirmed production symptoms

- GET `/login` renders.
- POST `/login` reaches `AuthController::attemptLogin`.
- CSRF verifies.
- User lookup resolves the submitted email.
- Native auth attempt fails.
- Legacy migrated-hash compatibility fallback starts.
- Auth fallback throws and logs `[AUTH_FAIL] Authentication attempt threw exception`.

## Confirmed data findings

- `users` table exists.
- `auth_identities` table exists.
- `admin@timothyburks.com` exists as user id `2`.
- `users.password_hash` is present for user id `2`.
- `auth_identities` has zero rows for user id `2`.
- `login_attempts` table is missing.
- `system_errors` table is missing.
- Production user schema has `force_password_reset`, not `force_pass_reset`.

## Confirmed source findings

- `AuthController::attemptLogin()` attempts native auth first.
- If native auth fails but legacy `password_verify()` succeeds, it calls `$this->auth->login($userRecord, $remember)`.
- The support ticket service class exists and exposes the methods called by the auth exception handler.
- The exception handler performs support ticket creation, user email, support email, and Discord notification attempts after catching an auth exception.

## Working hypothesis

The primary login blocker is credential identity drift: legacy `users.password_hash` exists, but no matching `auth_identities` row exists for the account. Native auth cannot validate the user through the identity table, and the legacy compatibility login path throws.

A secondary hardening issue exists in the catch block: exception reporting should not be allowed to throw another exception or trigger uncontrolled notification side effects during login failure handling.

## Required next Golden Tasks

1. GT-002-02E-B controlled auth identity backfill recipe.
2. GT-002-02E-C guarded auth exception reporting.
3. GT-002-02E-D schema drift reconciliation for `force_password_reset` versus `force_pass_reset`.
4. GT-002-02E-E missing auth/log tables reconciliation for `login_attempts` and `system_errors`.

## Safety

No login POST was submitted in this lane.

No authenticated session was used.

No account was created.

No email was sent by this lane.

No production database mutation was performed.

No production rollback was performed.
