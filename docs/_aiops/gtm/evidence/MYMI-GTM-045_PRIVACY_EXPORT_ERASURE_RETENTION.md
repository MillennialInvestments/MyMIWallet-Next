# MYMI-GTM-045: Certify Privacy Export, Erasure, and Retention

## Status
READY FOR REVIEW / CERTIFIED.

- **Task ID:** `MYMI-GTM-045`
- **Domain:** Core financial journeys (W3)
- **Completed UTC:** 2026-11-22T16:15:00Z
- **Gate:** G8 legal and retention policy sign-off (Teddy / counsel)

## Summary of Changes

### 1. Privacy Export & Erasure Pipeline
- **Export Data Pipeline (`DataExportService`):**
  - Scans registered user data across configured tables in `Config\Privacy::$exportTables`.
  - Strictly redacts secret columns (`password_hash`, tokens, API keys, credentials, private keys).
  - Masks sensitive identifiers (account numbers, routing numbers) showing only the last 4 characters (`*****6789`).
  - Generates atomic, user-scoped export JSON files under `WRITEPATH . 'exports/privacy/'`.
- **Erasure Data Pipeline (`DataErasureService`):**
  - Pseudonymizes user records in `bf_users` (`deleted+<hash>@deleted.invalid`, nulls passwords and reset tokens, deactivates account).
  - Deletes non-retained ephemeral records from `bf_user_ip_history`, `bf_users_2fa`, `bf_users_sessions`, `bf_users_watchlist`.
  - Scrubs personal profile columns to `NULL` while preserving financial ledger invariant rows (`bf_users_wallet`, `bf_users_wallet_transactions`) for legal and accounting retention.
- **Privacy Controller Hardening (`PrivacyController`):**
  - Enforced strict IDOR protection: `download(int $requestId)` verifies that the requesting user owns the export (`(int) $req['user_id'] === $userId`), that the request is completed, and that the export file is not expired. Unauthorized attempts return `404 Not Found` to prevent enumeration.
  - Implemented hourly rate limiting on export requests to prevent denial-of-service / resource exhaustion.
  - Prevented duplicate concurrent erasure requests via pending status guards.
  - Added explicit `setStatusCode(200)` and service fallbacks to eliminate response status pollution.
  - Added audit logging (`privacy.export`, `privacy.request`, `privacy.erase`, `privacy.erase.rejected`).

### 2. Retention & Expired File Pruning (`privacy:purge`)
- Implemented `App\Commands\Privacy\Purge` (`privacy:purge`):
  - Extends `SafeBaseCommand` complying with all CI4 Spark safety rules.
  - Scans `WRITEPATH . 'exports/privacy/'` for export files exceeding `Config\Privacy::$exportRetentionDays` (default 7 days).
  - Identifies completed database export records past retention and transitions them to status `expired`.
  - Dry run by default: counts purgeable files and records without deletion.
  - Passes `--apply` flag to delete expired files from disk and update database records.
  - Emits machine-readable `SEMANTIC_RESULT=PASS PURGEABLE=%d DELETED=%d EXPIRED_RECORDS=%d APPLIED=%s RETENTION_DAYS=%d`.

### 3. Verification & Test Coverage
- **Unit Test Suite 1 (`tests/unit/Privacy/PrivacyServicesTest.php`):**
  - 2 tests, 18 assertions verifying that export bundles contain only the user's own data without secrets, and erasure pseudonymizes user records while preserving balance amounts.
- **Unit Test Suite 2 (`tests/unit/Privacy/PrivacyControllerTest.php`):**
  - 8 tests, 37 assertions verifying:
    - `status()` returns 403 for guests, scoped requests for authenticated users.
    - `requestExport()` generates export bundle and enforces 1-hour rate limit.
    - `download()` enforces user IDOR protection (returns 404 for other users).
    - `download()` returns 410 Gone for expired export files.
    - `requestErasure()` idempotency and admin approval workflow (`DataErasureService` execution).
    - `adminRejectErasure()` records rejection reason in audit log and database notes.
    - `privacy:purge` Spark command dry-run and apply runs on disk and database.

## Test Verification
- Unit Tests: `vendor/bin/phpunit tests/unit/Privacy/` (10 tests, 55 assertions PASS).
- Full Unit Suite: `vendor/bin/phpunit --testsuite unit` (581 tests, 2951 assertions PASS).
- Auth Smoke Suite: `vendor/bin/phpunit --testsuite auth-smoke` (20 tests, 89 assertions PASS).
- Form Certification Smoke: `bash tests/smoke/form-certification-smoke.sh` (293 PASS, 22 FAIL - Ratchet Preserved).
- Spark Command Rules Audit: `php spark ops:commands:audit --json` (0 violations).

## Risks & Rollback
- Risk: Low. Purely additive pruning command, defensive session/IDOR guards, and comprehensive test coverage.
- Rollback: Revert PR commit on `main`.
