# GT-002-02B Controlled Auth Mutation Test Plan

## Objective

Create a controlled, approval-gated test plan for MyMI Wallet authentication mutation flows.

## Status

PLAN_ONLY_APPROVAL_REQUIRED

## Background

GT-002-02 baseline confirmed that public auth GET routes render or redirect correctly after GT-002-02A.

Remaining risk areas require controlled mutation tests:

- Registration POST
- Login POST
- Password reset POST
- Activation token flow
- Resend activation POST

## Known historical risks

Runtime evidence showed historical registration/auth failures:

- `register_password_hash_invalid`
- `Stored password hash failed post-registration verification`
- historical `trim(): Argument #1 ($string) must be of type string, null given` through `Auth/register.php`

## Required controls before mutation testing

Before any POST test is executed, define:

1. Test identity
   - Dedicated test email.
   - No real customer account.
   - No personal account.
   - Disposable or controlled inbox.

2. Database guard
   - Confirm target tables touched by registration/login flows.
   - Capture pre-test row counts.
   - Capture post-test row counts.
   - Document cleanup policy before creating records.

3. Email guard
   - Confirm whether activation/reset email will be sent.
   - Use a controlled recipient only.
   - Do not send to customers.

4. Rate-limit guard
   - Avoid repeated activation/login attempts.
   - Capture throttle state before test if tooling exists.

5. Roll-forward only
   - Do not rollback production.
   - Any defect becomes a forward-fix Golden Task.

## Proposed controlled test sequence

### Phase 1 — Read-only preflight

- Inspect auth routes.
- Inspect registration controller flow.
- Inspect configured auth views.
- Inspect expected DB tables.
- Inspect mailer configuration without exposing secrets.
- Inspect rate-limit/logging behavior.

### Phase 2 — Dry-run recipe

- Produce a mutation recipe.
- Identify exact POST endpoints.
- Identify exact payload fields.
- Identify expected redirects.
- Identify expected DB writes.
- Identify expected log lines.
- Stop for approval.

### Phase 3 — Approved controlled mutation

Approval required before execution.

Candidate flows:

- Register controlled test user.
- Confirm password hash storage passes post-registration verification.
- Confirm activation requirement behavior.
- Confirm login behavior for controlled test user only.
- Confirm password reset request behavior for controlled test user only.
- Confirm no unexpected emergency log entries.

## Explicit non-goals

- Do not test with real customer credentials.
- Do not bulk-resend activation emails.
- Do not clear login attempts.
- Do not delete users.
- Do not mutate production without explicit approval.
- Do not rollback production.

## Evidence

- `docs/gt-002/evidence/GT-002-02B/registration-alias-post-fix-smoke.md`

## Next required approval gate

Controlled auth mutation testing requires explicit approval before any POST, account creation, email send, or database mutation.
