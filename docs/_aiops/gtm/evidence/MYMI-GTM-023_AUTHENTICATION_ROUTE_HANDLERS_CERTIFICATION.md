# MYMI-GTM-023: Repair Missing Authentication Route Handlers

## Status
CERTIFIED.

- **PR:** In progress
- **Governing Task:** `MYMI-GTM-023`
- **Domain:** Route and access-control integrity (W2)
- **Completed UTC:** 2026-11-26T00:10:00Z
- **Owner:** Full-Stack Engineering Agent
- **Authority Gate:** Gate G1, Gate G4, Gate G8

## Objective
Repair and certify the missing authentication route handlers in `app/Controllers/AuthController.php`:
1. `redirectToProvider(?string $provider = null)`: Initiate third-party OAuth redirect safely with provider whitelist validation and graceful degradation when credentials are unconfigured.
2. `handleProviderCallback(?string $provider = null)`: Handle OAuth callback, validating state and credentials, redirecting to login on error or canceling cleanly without 500 errors.
3. `linkProvider(?string $provider = null)`: Fail-closed identity linking requiring active session, redirecting unauthenticated users to `/login`.
4. `unlinkProvider(?string $provider = null)`: Fail-closed identity unlinking requiring active session.
5. `linkRobinhood()`: Fail-closed API/form handler requiring active session authentication, validating API credentials, upserting provider wallet via `WalletModel::upsertProviderWallet`, and invalidating cache.
6. `linkSnapTrade()`: Fail-closed API/form handler requiring active session authentication, validating/generating SnapTrade user ID, upserting provider wallet, and invalidating cache.
7. Ratchet reduction: Remove all 6 resolved handlers from `tests/baseline/route-handler-gaps.txt`, shrinking known gaps from 154 to 148 with 0 new gaps and 0 fixed-but-unremoved gaps.

## Implementation Details
- `app/Controllers/AuthController.php`:
  - Added imports for `ResponseInterface` and `WalletModel`.
  - Implemented `redirectToProvider`, `handleProviderCallback`, `linkProvider`, and `unlinkProvider` with defensive provider validation (`google`, `github`, `linkedin`, `discord`, `facebook`), unconfigured credential detection, and safe fallback messaging.
  - Implemented `linkRobinhood` and `linkSnapTrade` with fail-closed session IDOR validation (`$userId <= 0` returns 401 Unauthorized), JSON/POST payload parsing, `WalletModel::upsertProviderWallet` persistence, and cache eviction.
  - Added `resolveAuthProvider` and `isAuthProviderConfigured` helpers.
- `tests/baseline/route-handler-gaps.txt`:
  - Removed 6 lines corresponding to `AuthController` methods. Gaps reduced from 154 to 148.

## Verification Evidence

1. **Route Handler Ratchet Verification:**
```bash
php spark routes:verify-handlers
```
```
CodeIgniter v4.7.6 Command Line Tool - Server Time: 2026-11-26 00:09:53 UTC+00:00

Route handlers: 148 known gaps, 0 new, 0 fixed but still in baseline.
```

2. **Dedicated Unit Test Suite (`tests/unit/Auth/AuthenticationRouteHandlersTest.php`):**
```bash
vendor/bin/phpunit tests/unit/Auth/AuthenticationRouteHandlersTest.php
```
```
PHPUnit 10.5.63 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.2.36
Configuration: /home/tbisolutions/MyMIWallet-Next/phpunit.xml

.........                                                           9 / 9 (100%)

Time: 00:00.051, Memory: 18.00 MB

OK (9 tests, 43 assertions)
```

3. **Complete Auth Test Suite (`tests/unit/Auth/`):**
```bash
vendor/bin/phpunit tests/unit/Auth/
```
```
PHPUnit 10.5.63 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.2.36
Configuration: /home/tbisolutions/MyMIWallet-Next/phpunit.xml

..............................                                    30 / 30 (100%)

Time: 00:00.227, Memory: 20.00 MB

OK (30 tests, 119 assertions)
```

4. **Platform Form Certification Smoke Suite:**
```bash
bash tests/smoke/form-certification-smoke.sh
```
```
==========================================================
   ✓ ALL FORM CERTIFICATION SMOKE TESTS PASSED            
==========================================================
PASS Count: 317 (Required: >= 317)
FAIL Count: 0 (Required: <= 0)
```

5. **Model Limit Audit:**
```bash
php spark ops:model-limit:audit
```
```
No unsafe model query patterns detected.
```
