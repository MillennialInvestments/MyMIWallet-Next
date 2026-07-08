# GT-002-02B-01 Controlled Registration POST Test

## Status

APPROVAL_REQUIRED

## Objective

Validate registration POST behavior using a controlled test identity.

## Risk being tested

Historical logs showed `register_password_hash_invalid` and stored password hash verification failure.

## Approval required before execution

Do not execute this task until explicitly approved.

## Safety

Do not use a real customer email.

Do not create accounts without approval.

Do not send activation email without approval.

Do not mutate production database without approval.

Do not rollback production.
