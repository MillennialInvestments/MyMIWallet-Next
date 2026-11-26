# MYMI-GTM-028: Correct CSRF and HTTP Method Semantics

## Status
CERTIFIED.

- **PR:** In progress
- **Governing Task:** `MYMI-GTM-028`
- **Domain:** Route and access-control integrity (W2)
- **Completed UTC:** 2026-11-25T21:00:00Z
- **Owner:** Security Owner (`security-owner`)
- **Authority Gate:** Gate G1, Gate G4, Gate G8

## Objective
Enforce strict CSRF protection and HTTP method semantics across all application routes and form submissions:
1. State-changing operations (POST, PUT, PATCH, DELETE) must enforce CSRF tokens or authenticate through secure session/token guards.
2. Sign-out (`/logout`) cannot be triggered via GET request (preventing cross-origin `<img src="/logout">` attacks). It must require a confirmation form with POST and CSRF token.
3. Every mutation route in the runtime route table is verified against `tests/baseline/mutation-guard-matrix.txt`.

## Implementation & Test Evidence

1. **Logout CSRF Enforcement (`tests/app/Auth/LogoutCsrfTest.php`):**
   - `testGetLogoutShowsConfirmAndKeepsTheSession`: Verifies `GET /logout` renders confirmation UI with CSRF token and keeps active session.
   - `testGetLogoutWhenSignedOutGoesToLogin`: Anonymous GET redirects cleanly to login.
   - `testLiveNavigationSignsOutWithAPostForm`: Verifies 100% of frontend layout navigation links use POST forms rather than raw GET anchors.
   - Result: 3 tests, 18 assertions, 100% PASS.

2. **Mutation Guard Matrix Enforcement (`tests/app/Security/MutationRouteGuardMatrixTest.php`):**
   - Analyzes all defined routes from CodeIgniter's `DefinedRouteCollector`.
   - Every mutation route either executes the `csrf` filter, executes an authn/authz guard filter, or is explicitly classified in the mutation guard matrix.
   - Result: 3 tests, 54 assertions, 100% PASS.

3. **External API Guard Test (`tests/unit/ExternalApiGuardTest.php`):**
   - Result: 2 tests, 6 assertions, 100% PASS.

```bash
vendor/bin/phpunit tests/app/Auth/LogoutCsrfTest.php tests/app/Security/MutationRouteGuardMatrixTest.php tests/unit/ExternalApiGuardTest.php
```
```
PHPUnit 10.5.63 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.2.36
Configuration: /home/tbisolutions/MyMIWallet-Next/phpunit.xml

........                                                            8 / 8 (100%)

Time: 00:01.890, Memory: 32.50 MB

OK (8 tests, 78 assertions)
```
