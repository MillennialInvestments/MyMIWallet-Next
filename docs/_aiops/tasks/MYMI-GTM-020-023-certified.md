# Golden Task Certification: Wave W1 Closeout & Wave W2 Ingress (`MYMI-GTM-020` through `MYMI-GTM-023`)

**Author:** Antigravity / Codex Pair
**Date:** 2026-10-27
**Target Branch:** `feature/mymi-gtm-015`
**Baseline:** `adbd10c3217fc87810497b8f4dd43c4c512c3e18`

## Executive Summary
This delivery closes out the remaining requirements of **Wave W1 (Identity & Account Integrity)** by completing Two-Factor Authentication (`MYMI-GTM-020`) and certifying Social/Broker Connectors (`MYMI-GTM-021`). In addition, it initiates **Wave W2 (Route & Access-Control Integrity)** by unlocking deterministic reflection scanning across all 1,674 application routes (`MYMI-GTM-022`) and repairing missing route handlers (`MYMI-GTM-023`).

## Tasks Certified

### 1. `MYMI-GTM-020`: Complete Two-Factor Authentication (TOTP + Single-Use Backup Codes)
- **Controller Repairs:** Fixed typo `array_filtre` -> `array_filter` in `AccountController::enable2fa()`.
- **Dual-Verification Support:** Enhanced `AccountController::verify2fa()` to support both standard 6-digit TOTP codes and 8-character single-use backup codes.
- **Single-Use Backup Code Invariant:** Verifying with an 8-character backup code validates against Argon2id hashes in `bf_user_2fa.backup_codes_hashes`, unsets the used hash from storage, and records audit telemetry.
- **Missing AuthController Routes:** Implemented `AuthController::get2FAQRCode()` and `AuthController::verify2FACode()` mapped to routes `/get2FAQRCode` and `/verify2FACode`.
- **Route Registration:** Registered `/Account/2fa`, `/Account/2fa/enable`, `/Account/2fa/verify`, `/Account/2fa/disable`, and `/Account/2fa/backup/regenerate` under the authenticated user account route group.
- **Session Guarantee:** Successfully verified 2FA establishes `session('2fa_verified_at', time())`.

### 2. `MYMI-GTM-021`: Certify Social & Broker Account Connectors
- **HybridAuth Gateway:** Configured `Config\Hybridauth` identity provider definitions (`Google`, `GitHub`, `Discord`).
- **OAuth Handler Dispatch:** Implemented `redirectToProvider`, `handleProviderCallback`, `linkProvider`, and `unlinkProvider` on `AuthController` with fail-closed sandbox protection and input validation.
- **Broker & Plaid Segregation:** Validated broker external-fetch and mutation routes against API token authentication.

### 3. `MYMI-GTM-022`: Generate Deterministic Runtime Route Manifest
- **Reflection Scanning Fix:** Repaired `RouteReconcileService` reflection discovery so it traverses the multi-verb route collection across all 1,674 routes (previously skipped routes due to 1D array type mismatch).
- **Redirect Filtering:** Added `RouteCollection::isRedirect()` filtering to distinguish 301/302 redirects from controller handlers.
- **Manifest Synchronization:** Synchronized `docs/routes/routes.md`, `docs/routes/routes.json`, and `docs/routes/routes_reconcile.json`.

### 4. `MYMI-GTM-023`: Repair Missing Route Handlers
- **APIController Provisioning:** Created `App\Modules\APIs\Controllers\APIController` providing `index()` and `status()` endpoints for API gateway health.
- **AdvisorController Group Namespace:** Explicitly declared `['namespace' => '\App\Modules\Advisor\Controllers']` for the `Advisor` route group in `Routes.php`.
- **DocsController Route Alignment:** Fixed route definition in `API/Docs` to point to `DocsAPIController`.
- **OPcache & Wallets Handlers:** Added `opcacheReset()` to `OpsAPIController` and `MyMIWallet()` alias to `WalletsController`.
- **AiOps Controller Method Convergence:** Synchronized `health()`, `policyCheck()`, `logUsage()`, `cacheStore()`, `cacheGet()`, and `testPolicy()` on `AiOpsAPIController` to avoid case-insensitive PHP class collisions.

## Verification & Checks Run
- `php spark mymi:lifecycle-healthcheck`: **13 Passed, 1 Warning (offline DB), 0 Failed (Exit code 0)**.
- `vendor/bin/phpunit --no-coverage -c vendor/codeigniter4/framework/phpunit.xml.dist tests/unit/TwoFactorAuthTest.php tests/unit/ShieldIdentityBackfillTest.php tests/unit/ExternalApiGuardTest.php`: **11/11 tests, 55 assertions passed (100%)**.
- `php spark routes:reconcile`: Scanned 1,674 routes, resolved 8 missing methods/classes, 0 invalid handlers.
- `php spark routes:docs`: Exported 1,691 routes to Markdown & JSON.

## Rollback Notes
- All changes are non-destructive and backward compatible.
- To revert 2FA route additions: remove routes from `app/Config/Routes.php`.
- To revert `APIController`: remove `app/Modules/APIs/Controllers/APIController.php`.
