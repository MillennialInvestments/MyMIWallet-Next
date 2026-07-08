# GT-002-02D-01 Controlled Auth Mutation Execution Gate

## Status

APPROVAL_REQUIRED

## Objective

Execute a tightly controlled auth mutation test only after explicit approval.

## Approval token

`APPROVE GT-002-02D CONTROLLED AUTH MUTATION TEST`

## Scope

- Registration POST
- Login POST
- Password reset request
- Activation/resend activation flow

## Required controls

- Dedicated test identity only.
- Controlled inbox only.
- Pre/post DB row counts.
- Redacted payload/response capture.
- Auth log delta capture.
- Stop on any emergency/auth defect signal.

## Safety

Do not execute without approval.

Do not use real customer credentials.

Do not create accounts without approval.

Do not send email without approval.

Do not mutate production database without approval.

Do not rollback production.
