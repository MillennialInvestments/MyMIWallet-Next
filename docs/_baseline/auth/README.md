# Auth/Authz Golden Baseline

This directory stores the **known-good** authentication/authorization runtime baseline for MyMI Wallet.

## Spark Commands

- `php spark auth:baseline:capture`
  - Captures baseline artifacts under:
    - `docs/_baseline/auth/history/<timestamp>/`
    - `docs/_baseline/auth/current/` (latest copy)
- `php spark auth:baseline:diff`
  - Compares current runtime against `docs/_baseline/auth/current/`
  - Reports:
    - changed files
    - missing files
    - env drift
    - route drift (added/missing)
    - package drift
- `php spark auth:baseline:restore [--dry-run] [--from=<timestamp>] [--file=<path>]`
  - Restores only auth-critical files from baseline artifacts.
- `php spark auth:surface:scan`
  - Reports auth surface bindings/routes/services and writes `surface.scan.runtime.json`.
- `php spark auth:smoke`
  - Runs auth smoke probes and writes `smoke.runtime.json`.

## Baseline Scope

Auth-critical files (only):

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

## Artifacts Produced by Capture

Each `history/<timestamp>/` contains:

- `files/` (copied auth-critical files)
- `manifest.json` (known-good auth runtime contract)
- `routes.snapshot.txt`
- `routes.auth.json`
- `env.auth.json`
- `packages.auth.json`
- `surface.scan.json`
- `smoke.report.json`

`current/` is a full copy of the latest successful capture.

## Smoke Coverage

`auth:smoke` probes:

- `GET /login`
- `POST /login` (invalid credentials)
- `GET /register`
- `POST /register` (invalid payload)
- activation route probe
- reset password probe
- canonical host / `baseURL` consistency
- CSRF presence path
- dashboard redirect default target
