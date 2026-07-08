# GT-002-02B-04 Controlled Activation Token Test

## Status

APPROVAL_REQUIRED

## Objective

Validate activation token behavior with a controlled test identity.

## Background

Baseline GET smoke returned 429 for `/activate` and `/activate-account`, so token/rate-limit-safe testing is required.

## Approval required before execution

Do not execute this task until explicitly approved.

## Safety

Do not use real customer activation tokens.

Do not resend activation emails to customers.

Do not mutate production database without approval.

Do not rollback production.
