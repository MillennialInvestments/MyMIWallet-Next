# ADR 0002: Canonical authentication runtime for launch

- Status: Proposed (needs Tim's and Teddy's approval)
- Date: 2026-11-15
- Task: MYMI-GTM-013 (unblocks GTM-014 through GTM-019)

## Context

Two auth libraries are installed, and the code mixes them:

| Piece | What production actually runs |
|---|---|
| Login | `App\Controllers\AuthController::attemptLogin` looks the user up through Myth/Auth's `UserModel` (the `users` view over `bf_users`), then checks `password_verify` against `bf_users.password_hash`. It is throttled to 12 attempts a minute per login and IP, and rotates the session id on success. |
| Registration, activation, reset | `AuthController` plus Myth/Auth's activator and resetter. Tokens live in `bf_users.activate_hash` and `bf_users.reset_hash` (128-bit random, reset expires after 1 hour). |
| Remember-me, login log | Myth/Auth tables `auth_tokens` and `auth_logins`. |
| Roles | Myth/Auth groups (`auth_groups`, `auth_groups_users`) through the `role` and `permission` filters. |
| 2FA | App code: `TwoFactorService`, `bf_users_2fa`, `twofactor` filter (GTM-020). |
| Shield | Only `Config\Auth` (which extends Shield's config) and the test routes `/login-shield` and `/register-shield`. No production user has a Shield identity (0 of 3010 rows in `auth_identities`, checked 2026-11-14). |

`config('Auth')` resolves to the Shield-based `Config\Auth`, while Myth/Auth code expects Myth settings. That mismatch caused the reset-token crash fixed alongside this ADR (`Config\Auth::$resetTime`).

## Decision

1. **For launch, the canonical runtime is the app's `AuthController` on top of Myth/Auth models and the `bf_users` table.** Passwords stay in `bf_users.password_hash` (PHP `password_hash`, bcrypt today).
2. **Shield is not a login path.** Its test routes are served only outside production. `ShieldIdentityBackfill` (2026-10-26-180000) stays unapplied in production. Its `down()` now removes only the rows it tagged, so it is safe to try on a copy later.
3. **Compatibility boundary:** new auth code calls `AuthController`, the Myth `UserModel`, or `App\Models\UserModel`. It does not call `auth()` (Shield) for login decisions. Settings that Myth reads through `config('Auth')` are mirrored on `Config\Auth` until the move below.
4. **Data:** `bf_users` stays the single source of truth. Migration `2026-11-15-000100_AlignUsersViewForAuth` makes the `users` view usable by the Myth models.
   - The production check on 2026-11-15 found the view missing `created_at`, `updated_at`, `reset_at`, `reset_expires`, `force_pass_reset`, `status` and `status_message`.
   - Its `deleted_at` was a computed expression, which MySQL 8 will not INSERT through. No account has been created since 2024-01-26.
   - The migration adds those columns to `bf_users`, makes `deleted_at` a virtual column derived from `deleted`, and rebuilds the view as plain column references.
   - It gives the Shield-shaped `auth_groups_users` the `group_id` column that Myth role checks join on.
   - It saves the previous view in `bf_schema_view_backups`, and `down()` restores it.

## Consequences

- Production changes are additive: new nullable or defaulted columns, a rebuilt view, and a `group_id` column. Roll back with the migration's `down()` or the pre-deploy backup.
- The duplicate-email accounts (67 groups, mostly spam, 1845 already soft-deleted) no longer block launch, because nothing needs one identity per email yet.
- Myth/Auth is unmaintained. Moving to Shield after launch is a separate project with its own ADR: dedupe the remaining duplicate emails, add a unique index on `bf_users.email`, run the backfill on a restored copy, dual-read for a release, then switch.
- `scripts/ops/db/auth-schema-check.sh` (GTM-014) is the read-only check that the live DB has every table and column this runtime needs.

## Follow-ups (atomic successors)

- GTM-016: certify login on production with a real account (Tim), and record failure-path evidence.
- GTM-017: the app's branded `MailService` activator and resetter (`App\Legacy\Auth\Authentication\*`) cannot load, because they redeclare the typed `$error` property. Activation and reset mail currently goes out through Myth's plain templates. Fix the classes, then switch the `activator` and `resetter` services to them.
- GTM-019: `GET /logout` lets another site log a user out. Move it to POST-only once every logout link is a form.
- Post-launch: the Shield migration ADR described above.
