# Phase 14 — Acceptance Test Script
- **Timestamp:** 2025-10-09 19:00 UTC
- **Environment Target:** DreamHost staging & production (Nginx, PHP 8.2, MySQL)

## Test Accounts
- Create dedicated staging users: `qa+authflow@mymiwallet.com`, `qa+oauth@mymiwallet.com`. Deactivate after tests.

## Manual Test Checklist
| Scenario | Steps | Expected Result | Status |
| --- | --- | --- | --- |
| Register → Activate → Login → Logout | 1. Visit `/register` and submit form. 2. Retrieve activation email. 3. Click activation link. 4. Login with credentials. 5. Logout via GET & POST. | Account activated, redirect to dashboard, logout clears session. | Pending |
| Duplicate email | Attempt registration with existing email | Validation error displayed without revealing account existence. | Pending |
| Login wrong password throttle | Enter bad password repeatedly until lockout | After configured attempts, display throttle message & 429. | Pending |
| Forgot password reset | Request reset, follow email link, change password, verify old token invalid. | Password updated, login requires new password, reused token rejected. | Pending |
| Enable 2FA | (After implementation) Enable 2FA, scan QR, verify codes. | Good code accepted, bad code rejected, remember-device optional. | Pending |
| Admin route guard | Login as standard user, visit `/Account`-scoped admin route requiring permission. | Access denied/redirect; admin user gains access. | Pending |
| OAuth login | Authenticate via Google/GitHub, ensure account linked and login works. | Successful login, identity stored in `auth_identities`. | Pending |
| Robinhood/SnapTrade link | Invoke link endpoints once implemented. | Correct UX / API handshake, error states handled. | Pending |

## Execution Notes
- Perform tests in Chrome and Firefox to catch CSP/cookie anomalies.
- Clear cookies between runs to validate remember-me & CSRF tokens.
- Capture screenshots/logs of each failure and attach to ticketing system.

## Post-Test Tasks
1. Reset or delete QA accounts from database.
2. Review mail logs to ensure messages delivered successfully.
3. Update this table with pass/fail + date/time for audit trail.
