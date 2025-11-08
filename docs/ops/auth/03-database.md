# Phase 3 — Database Schema & Entities
- **Timestamp:** 2025-10-09 19:00 UTC
- **Environment:** DreamHost VPS (Nginx, PHP 8.2, MySQL)

## Relevant Migrations
| Migration | Purpose | Key Tables |
| --- | --- | --- |
| `2025-09-02-000001_CreateUserSecurityTables` | Session tracking & 2FA storage | `bf_users_sessions`, `bf_user_2fa` |
| `2025-09-02-000010_CreateRbacTables` | Role & permission management | `bf_roles`, `bf_permissions`, `bf_role_user`, `bf_permission_role`, `bf_user_permission_overrides` |
| Myth/Auth core migrations (vendor) | User authentication | `users`, `auth_logins`, `auth_tokens`, `auth_identities`, `auth_activation_attempts`, `auth_reset_attempts` |

> **Action:** Confirm `spark migrate` has been executed on the DreamHost MySQL instance; local container lacks DB connectivity so migration status could not be verified.

## Schema Snapshot (from migration definitions)
- **users** (Myth/Auth): `id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, timestamps.
- **auth_identities**: OAuth provider links (`provider`, `provider_uid`, `email`, `secret`, `user_id`).
- **auth_logins**: login history with IP/user agent.
- **bf_user_2fa**: encrypted secret storage (`secret_ciphertext`, `secret_iv`, `secret_tag`, backup codes) keyed by `user_id`.
- **bf_users_sessions**: server-side session tracking for revocation support.
- **bf_roles/bf_permissions**: slug-based RBAC definitions; pivot tables enforce unique constraints.

## Index & Constraint Review
- Unique indexes defined in migrations: `users.email`, `users.username`, `auth_identities(provider, provider_uid)`, `bf_roles.slug`, `bf_permissions.slug`, `bf_role_user(role_id,user_id)`, `bf_permission_role(permission_id,role_id)`, `bf_user_permission_overrides(user_id,permission_id)`.
- Missing indexes: consider adding `users.activate_hash`, `users.reset_hash`, `auth_tokens.selector` if not already present via vendor migrations (verify with live schema).

## Entities & Models
- Application controller calls `model(Myth\Auth\Models\UserModel::class)` ensuring compatibility with Myth/Auth entities.
- Confirm that any extended UserEntity (if present under `app/Entities`) retains `password`, `email`, `username`, `activate_hash`, and `reset_hash` mutators required by Myth/Auth. Current codebase references `App\Entities\AuthEntity` in vendor override; review to ensure it implements Myth/Auth contract.

## Data Health Checks (Pending)
- Duplicate users / null emails: **Not assessed** (requires database access).
- Legacy columns interfering with validation: **Not assessed**.
- Activation/reset tables cleanup: **Pending review** — schedule SQL audit to remove expired tokens.

## Follow-Up Tasks
1. Run `php spark migrate --all` (or `spark migrate:status`) on staging/prod to confirm migrations applied and document results.
2. Capture actual schema via `SHOW CREATE TABLE` for each auth-related table and attach to this runbook.
3. Implement scheduled cleanup for `auth_logins` and `auth_tokens` to control table growth.
