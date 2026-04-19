# Auth/Authz Golden Baseline

This directory stores MyMI Wallet auth/authz baseline artifacts for drift detection and safe restore.

## Spark Commands

- `php spark auth:baseline:capture`
- `php spark auth:baseline:diff`
- `php spark auth:baseline:restore [--dry-run] [--file=<path>] [--from=<timestamp>]`
- `php spark auth:surface:scan`
- `php spark auth:smoke`

## Scope

Baseline capture is intentionally limited to auth/authz-critical files:

- `app/Config/App.php`
- `app/Config/Auth.php`
- `app/Config/Services.php`
- `app/Config/Session.php`
- `app/Config/Filters.php`
- `app/Config/Routes.php`
- `app/Config/Toolbar.php`
- `app/Controllers/AuthController.php`
- `app/Legacy/Auth/Config/Auth.php`
- `app/Auth/CompatAuthAdapter.php` (if present)
- `app/Helpers/auth_helper.php`
- `app/Helpers/redirect_url_helper.php`
- `app/Filters/AuthCheckFilter.php`
- `app/Filters/LoginFilter.php`
- `app/Filters/PermissionFilter.php`
- `app/Filters/RoleFilter.php`
- `app/Views/Auth/login.php`
- `app/Views/Auth/register.php`
- `app/Views/Auth/layout.php`
- `public/assets/js/login-init.js`
- `public/.htaccess`

## Artifacts

Each capture writes:

- file copies under `files/`
- `manifest.json` with runtime fingerprints
- `routes.snapshot.txt` and `routes.auth.json`
- `env.auth.json`
- `packages.auth.json`
- `surface.scan.json`
- `smoke.report.json`

## Locations

- Current golden baseline: `docs/_baseline/auth/current/`
- Timestamped history: `docs/_baseline/auth/history/<timestamp>/`

## Safe Restore

`auth:baseline:restore` only restores files listed in the auth-critical scope and supports:

- `--dry-run` to preview
- `--file=<path>` for targeted restore
- `--from=<timestamp>` to restore from a specific history snapshot
