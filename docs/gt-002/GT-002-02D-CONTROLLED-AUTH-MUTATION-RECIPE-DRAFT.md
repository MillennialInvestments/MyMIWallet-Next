# GT-002-02D Controlled Auth Mutation Recipe Draft

## Objective

Draft the controlled auth mutation recipe for MyMI Wallet without executing it.

## Status

RECIPE_DRAFT_APPROVAL_REQUIRED

## Source evidence

- GT-002-02 auth functional baseline
- GT-002-02A registration legacy alias fix
- GT-002-02B controlled auth mutation test plan
- GT-002-02C controlled auth mutation read-only preflight

## Current production evidence

GT-002-02C confirmed the auth DB surface:

| Logical table | Physical table | Exists | Row count |
|---|---:|---:|---:|
| users | bf_users | yes | 3010 |
| auth_identities | bf_auth_identities | yes | 1 |
| auth_logins | bf_auth_logins | yes | 0 |
| login_attempts | bf_login_attempts | no | 0 |
| auth_remember_tokens | bf_auth_remember_tokens | yes | 0 |
| auth_permissions_users | bf_auth_permissions_users | yes | 0 |
| auth_groups_users | bf_auth_groups_users | yes | 0 |

## Mutation flows requiring approval

1. Controlled registration POST
2. Controlled login POST
3. Controlled password reset request
4. Controlled activation-token flow
5. Controlled resend activation request

## Required approval token before execution

`APPROVE GT-002-02D CONTROLLED AUTH MUTATION TEST`

No mutation command may run unless the approval token matches exactly.

## Required controlled identity

A dedicated test identity must be supplied before execution.

Required fields:

- Test email
- Test username
- Test password
- Confirmation that the inbox is controlled
- Confirmation that account creation is approved
- Confirmation that email send is approved

## Proposed execution sequence after approval

### Step 1 — Capture pre-test state

Read-only checks:

- Current row counts for auth tables.
- Current emergency/auth log tail.
- Current rate-limit/logging state if available.
- Current registration page CSRF token.

### Step 2 — Controlled registration POST

Submit one registration POST to `/register` using the controlled identity.

Expected result:

- HTTP redirect or success response.
- One controlled user row created.
- Password hash is stored.
- No `register_password_hash_invalid`.
- No emergency log entry.
- Activation behavior is classified.

### Step 3 — Controlled login POST

Only run if registration result creates an activated account or a controlled activation path is available.

Expected result:

- Successful login or expected activation-required response.
- No unexpected auth exception.
- No repeated failed-login throttle.

### Step 4 — Controlled password reset request

Only run against the controlled test identity.

Expected result:

- Reset request accepted.
- Reset email behavior classified.
- Reset token/hash behavior classified without exposing token secrets.

### Step 5 — Controlled activation/resend activation

Only run against the controlled test identity.

Expected result:

- Activation/resend flow returns expected status.
- No customer email is sent.
- No bulk resend behavior is triggered.
- No 429 is triggered by repeated attempts.

## Stop conditions

Stop immediately if any of the following occurs:

- HTTP 500
- `AUTH_EMERGENCY`
- `register_password_hash_invalid`
- password hash missing after registration
- unexpected user row count delta
- email sent to a non-test recipient
- repeated 429/rate-limit response
- CSRF failure not explained by token mismatch

## Output evidence required after approved execution

- Controlled auth mutation execution log
- Pre/post DB row count matrix
- Redacted request payload summary
- Redacted response summary
- Auth log delta
- Email behavior summary
- Golden Tasks for confirmed defects

## Explicit non-goals

- Do not use real customer credentials.
- Do not bulk-create users.
- Do not delete users.
- Do not clear production tables.
- Do not bypass CSRF.
- Do not disable rate limiting.
- Do not rollback production.

## Safety

This document is a recipe draft only.

No login POST was submitted.

No registration POST was submitted.

No password reset POST was submitted.

No activation POST was submitted.

No account was created.

No email was sent.

No production database mutation was performed.

No production rollback was performed.
