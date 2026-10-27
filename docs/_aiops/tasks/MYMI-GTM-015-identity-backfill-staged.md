# AIOps Task: MYMI-GTM-015 Identity Backfill Migration

- **Task Identifier:** `MYMI-GTM-015`
- **Wave:** Wave W1 (Identity & Account Integrity)
- **Status:** STAGED_VERIFIED
- **Worktree:** `/apps/TBI/worktrees/mymi-gtm-015-identity-backfill`
- **Branch:** `feature/mymi-gtm-015`
- **Baseline Commit:** `adbd10c3217fc87810497b8f4dd43c4c512c3e18`

## Allowed Source Paths
- `app/Database/Migrations/2026-10-26-180000_ShieldIdentityBackfill.php`
- `tests/unit/ShieldIdentityBackfillTest.php`
- `docs/_aiops/tasks/MYMI-GTM-015-identity-backfill-staged.md`

## Invariant Guarantees
1. Zero Data Loss: Legacy credentials (`password`, `password_hash`, `email`) are preserved untouched on `users`.
2. Zero Duplicate Principals: Fails closed before mutation if duplicate normalized emails exist in `users`.
3. Idempotent: Can be run multiple times safely via `WHERE NOT EXISTS` clauses on `user_id` and normalized `secret`.
4. Deterministic Rollback: `down()` method specifically purges backfilled `email_password` identities without altering existing user accounts.

## Verification Evidence
- Syntax lint: `php -l` passed on migration and unit test.
- Unit test: `tests/unit/ShieldIdentityBackfillTest.php`.
