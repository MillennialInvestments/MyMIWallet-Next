# MYMI-GTM-045: Certify Privacy Export, Erasure, and Data Retention

## Status
CERTIFIED.

- **PR:** In progress
- **Governing Task:** `MYMI-GTM-045`
- **Domain:** Core financial journeys / Privacy (W3)
- **Completed UTC:** 2026-11-25T20:45:00Z
- **Owner:** Privacy Owner (`privacy-owner`)
- **Authority Gate:** Gate G1, Gate G4, Gate G8

## Objective
Enforce GDPR / CCPA privacy data rights across the MyMI platform:
1. Export bundle (`DataExportService`) containing only the authenticated user's personal data, with secrets redacted (`password_hash`, auth credentials) and financial account numbers masked (`*****6789`).
2. Erasure workflow (`DataErasureService`) scrubbing personal identifiers, emails, usernames, and IP history while preserving financial ledger invariants and balance records required for accounting and regulatory compliance.
3. Strict tenant isolation preventing cross-account data leaks.

## Implementation Details

1. **`App\Libraries\Privacy\DataExportService`:**
   - Extracts user profile data (`bf_users`), IP history (`bf_user_ip_history`), and user wallets (`bf_users_wallet`).
   - Automatically redacts sensitive authentication secrets (`password_hash`, `reset_hash`, `activate_hash`).
   - Masks sensitive account numbers to preserve last 4 digits only.
   - Filters out credential tokens (`credentials`, `plaid_access_token`).
   - Fails closed if the target user ID is invalid or non-existent.

2. **`App\Libraries\Privacy\DataErasureService`:**
   - Soft-deletes / anonymizes user personal identifying records.
   - Cleanses username, email address, password hash, and IP logs.
   - Retains financial ledger transactions with anonymized user linkage to maintain immutable audit balance equations.

3. **Automated Test Suite (`tests/unit/Privacy/PrivacyServicesTest.php`):**
   - `testExportContainsOnlyThisUsersDataWithoutSecrets`: Verifies export contains only the target user's records, excludes secrets, and masks account numbers.
   - `testErasureRemovesPersonalDataButKeepsBalances`: Verifies erasure removes personal data while keeping financial ledger records intact.
   - Result: 2 tests, 18 assertions, 100% PASS.

## Verification Evidence

```bash
vendor/bin/phpunit tests/unit/Privacy/PrivacyServicesTest.php
```
```
PHPUnit 10.5.63 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.2.36
Configuration: /home/tbisolutions/MyMIWallet-Next/phpunit.xml

..                                                                  2 / 2 (100%)

Time: 00:00.027, Memory: 16.00 MB

OK (2 tests, 18 assertions)
```
