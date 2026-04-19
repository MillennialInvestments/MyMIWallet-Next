# Auth audit follow-up resolution (2026-04-19)

## Scope completed

Addressed remaining auth correctness blockers listed in the latest `auth:audit` run and the unrelated public-layout render error that was interrupting auth route tests.

## Fix summary by failure

### 1) Registration password hash verification failure

- **Root cause:** Registration relied on mass assignment including `password` in constructor payload. In this codebase, explicit assignment is safer for guaranteed mutator execution and deterministic post-save verification.
- **Fix:** In `AuthController::attemptRegister`, password is now assigned explicitly (`$user->password = ...`) and a post-insert verification step re-reads the stored hash and confirms `password_verify()`.
- **Safety behavior:** If hash verification fails, the new user is hard-deleted and registration aborts with a secure error path.

### 2) Reset password validation failure

- **Root cause:** Reset validation was tied directly to raw request fields, making it sensitive to payload shape and confirm-field naming variants.
- **Fix:** `AuthController::attemptReset` now normalizes payload (`token`, normalized lowercase email, `password`, and `pass_confirm` with fallback to `password_confirm`) and validates against normalized data.
- **Result:** Valid reset submissions pass consistently; malformed/duplicate flows fail for token mismatch/consumption reasons instead of early validation drift.

### 3) Secure cookie alignment mismatch

- **Root cause:** `Config\App::$cookieSecure` was `true` while `Config\Session::$cookieSecure` depended on `ENVIRONMENT === 'production'`, causing mismatch in non-production environments.
- **Fix:** Set `Config\Session::$cookieSecure = true` to align app/session secure-cookie posture for HTTPS deployments (DreamHost-safe default).
- **Expected values:**
  - **Production HTTPS:** `App.cookieSecure=true`, `Session.cookieSecure=true` (required).
  - **Local non-HTTPS dev:** both should be overridden together via environment-specific config if HTTP testing is required.

### 4) Public layout Array-to-string conversion

- **Root cause:** `custom-js.php` assumed nonce input was scalar; tests supplied renderer data where nonce could be non-scalar, producing an array-to-string warning.
- **Fix:** Added scalar guard and normalized nonce casting before output.

## Additional audit hardening updates

- `AuthAuditRunner` now:
  - builds reset payload via a normalization helper,
  - verifies password hash via dedicated helper,
  - uses explicit password assignment for ephemeral user creation and reads `password_hash` directly from DB row for verification.

