# GT-002-02E-B Controlled Auth Identity Backfill Recipe

## Objective

Create a controlled, auditable, approval-gated repair path for users that have legacy `users.password_hash` credentials but no corresponding `auth_identities` credential row.

## Scope

Read-only discovery first.

Implementation may add a source-controlled Spark command or migration-safe repair command only after approval.

## Known target example

- `admin@timothyburks.com`
- user id `2`
- `users.password_hash` present
- `auth_identities_count=0`

## Acceptance

- Dry-run reports affected users without printing hashes.
- Repair mode requires explicit approval token.
- Repair mode writes only missing identity rows.
- Repair mode does not overwrite existing identities.
- Post-repair login validation is planned separately.
- Rollback note is forward-fix only; do not rollback production.

## Safety

Do not paste password hashes into chat.

Do not insert rows manually from terminal without approval.

Do not run login POST tests until the repair is approved and deployed.
