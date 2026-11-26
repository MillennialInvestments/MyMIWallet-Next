# MYMI-GTM-030: Enforce CSP Security Headers and Cookie Response Policy

## Status
CERTIFIED.

- **PR:** In progress
- **Governing Task:** `MYMI-GTM-030`
- **Domain:** Route and access-control integrity (W2)
- **Completed UTC:** 2026-11-25T21:00:00Z
- **Owner:** Security Owner (`security-owner`)
- **Authority Gate:** Gate G1, Gate G4, Gate G8

## Objective
Enforce robust Content Security Policy (CSP), HTTP security headers, and safe session cookie response policies:
1. Session cookies must enforce `Secure`, `HttpOnly`, and `SameSite=Lax` or `Strict` to prevent session hijacking and cross-site request attacks.
2. Login must rotate the session ID (`session->regenerate(true)`) to mitigate session fixation attacks; sign-out must destroy the server-side session.
3. HTTP responses must carry standard hardening headers:
   - `X-Content-Type-Options: nosniff`
   - `Referrer-Policy: strict-origin-when-cross-origin`
   - `Content-Security-Policy-Report-Only` with script nonces and report collector endpoint (`/csp-report`).

## Implementation & Test Evidence

1. **Security Headers & CSP Verification (`tests/feature/SecurityHeadersTest.php`):**
   - `testLoginPageHasHeadersAndReportOnlyCsp`: Verifies presence of `nosniff`, `Referrer-Policy`, and CSP directives.
   - `testPolicyIncludesNonceWhenPresent`: Verifies dynamic script nonce generation and sanitization against injection.
   - `testCspReportEndpointAcceptsReports`: Verifies `/csp-report` accepts violation reports with HTTP 204 No Content.
   - Result: 3 tests, 9 assertions, 100% PASS.

2. **Session Cookie Policy Verification (`tests/unit/Auth/SessionCookiePolicyTest.php`):**
   - `testSessionCookieIsSecureHttpOnlyAndSameSite`: Verifies `secure=true`, `httponly=true`, and `samesite=lax|strict`.
   - `testSessionExpiresAndLoginRotatesTheSessionId`: Verifies bounded expiration and session regeneration on authentication.
   - Result: 2 tests, 6 assertions, 100% PASS.

```bash
vendor/bin/phpunit tests/feature/SecurityHeadersTest.php tests/unit/Auth/SessionCookiePolicyTest.php
```
```
PHPUnit 10.5.63 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.2.36
Configuration: /home/tbisolutions/MyMIWallet-Next/phpunit.xml

.....                                                               5 / 5 (100%)

Time: 00:00.078, Memory: 20.00 MB

OK (5 tests, 15 assertions)
```
