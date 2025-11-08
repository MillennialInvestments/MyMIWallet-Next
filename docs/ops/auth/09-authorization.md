# Phase 9 — Authorization (Groups & Permissions)
- **Timestamp:** 2025-10-09 19:00 UTC
- **Environment:** DreamHost VPS (Nginx, PHP 8.2, MySQL)

## Strategy Overview
- RBAC tables (`bf_roles`, `bf_permissions`, pivots) provided by `2025-09-02-000010_CreateRbacTables` migration.
- `App\\Filters\\PermissionFilter` leverages `App\\Libraries\\Auth\\Gate::allows()` for route-level checks. Filter returns 403 JSON for AJAX, flash error otherwise.
- `App\\Filters\\LoginFilter` enforces authentication for dashboards by redirecting unauthenticated users to `/login`.

## Default Assignments
- `Config\\Auth::$defaultUserGroup` currently `null`; define default (e.g., `users`) so Myth/Auth automatically assigns a baseline role on registration.
- Verify `Gate` library maps Myth/Auth groups/permissions to application-specific capabilities (file review pending).

## Group / Permission Matrix (to be validated)
| Role | Expected Permissions | Notes |
| --- | --- | --- |
| `admin` | Full access to dashboards, management APIs | Ensure `permission:admin-area` filter on admin routes |
| `user` | Standard wallet functionality | Default group once configured |
| `support` (if applicable) | Ticketing, user lookup | Confirm limited access |

> Actual role definitions must be extracted from database; update this matrix after querying `bf_roles` and `bf_permissions`.

## Protected Routes
- `/Account/*`, `/Trade-Tracker/*`, `/API/Management/*` already grouped with `'filter' => 'login'` or `'cronKey'` in `Routes.php`.
- Add `permission` filters to sensitive operations (e.g., management dashboards) once group->permission mapping confirmed.

## Checks & Helpers
- Myth/Auth helper `auth()->user()->can('permission')` available if Gate integrates with Myth/Auth.
- Ensure Blade/Twig equivalents call Gate to hide UI controls when permission missing.

## Follow-Up Actions
1. Set `$defaultUserGroup = 'users'` (or appropriate slug) in `Config\\Auth` and ensure migration seeds create the group.
2. Document actual permissions in database and update matrix.
3. Audit controllers for manual permission checks; migrate to centralized Gate usage.
4. Add automated tests verifying `permission` filter denies/allows as expected.
