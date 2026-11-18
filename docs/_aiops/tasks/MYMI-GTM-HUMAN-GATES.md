# MYMI-GTM-HUMAN-GATES — Production Launch Human Gate Certification

## Status

READY_FOR_OPERATOR. Prepared by Antigravity under the AIOps GTM completion protocol.
Automated audit command: `php spark gtm:gate:audit` or `bash scripts/ops/gtm/mymi-gate-audit.sh`.

## Task Records

| Gate | Title | Owner | Impacted Tasks | Automated Check | Current Status |
|---|---|---|---|---|---|
| G3 | Browser Journey Check on Staging | Tim | MYMI-GTM-016, 017, 018, 019, 036 | Staging DNS & HTTP reachable | OPEN |
| G4 | Approve ADR 0002 (Canonical Auth Runtime) | Teddy | MYMI-GTM-013, 015 | `docs/adr/0002-canonical-auth-runtime.md` | OPEN (Proposed) |
| G6 | Plaintext Private Keys (3 accounts) | Tim + Teddy | MYMI-GTM-045, 047, 048 | `php spark security:encrypt-legacy-keys --approve` | PASS (in place) |
| G7 | Duplicate-Email Accounts (4 groups) | Tim | MYMI-GTM-059 | `scripts/ops/db/auth-schema-check.sh` | OPEN (triage) |
| G8 | Legal & Compliance Sign-off | Teddy / Counsel | MYMI-GTM-051, 057 | Terms/Privacy views verified | OPEN |
| G9 | Provider Sandboxes in `shared/.env` | Tim | MYMI-GTM-021, 035, 038, 046-048, 053 | Environment variable presence | OPEN |
| G11 | Backup Restore Drill | Tim | MYMI-GTM-060 | `scripts/ops/backup/mysql-restore-check.sh` | OPEN |
| G12 | Postmark Approval & DMARC | Tim | MYMI-GTM-017, 018 | DNS TXT `_dmarc.mymiwallet.com` | OPEN (p=none -> p=quarantine 2026-12-05) |
| G13 | Staging Load Test Window | Tim | MYMI-GTM-067 | `ab -n 100 -c 10` on staging | OPEN |
| G14 | Approve Money Switches by Name | Tim | Launch Scope Activation | `app/Config/Features.php` | PASS (all 7 OFF) |

## Acceptance Contract

1. **Gate G3 (Browser Journey Check):**
   - Register `healthcheck+signup1@mymiwallet.com` on `https://staging.mymiwallet.com/register`.
   - Confirm activation email from Postmark and verify token.
   - Confirm password reset flow via `/forgot-password`.
2. **Gate G4 (ADR 0002 Approval):**
   - Teddy changes `Status: Proposed` to `Status: Approved` in `docs/adr/0002-canonical-auth-runtime.md`.
3. **Gate G6 (Private Key Notice):**
   - Confirm the 3 users whose keys were encrypted with `enc:v1:` are notified.
4. **Gate G7 (Duplicate Emails):**
   - Triage 4 duplicate email groups per runbook.
5. **Gate G8 (Compliance Sign-off):**
   - Formal sign-off on Terms, Privacy, tax, and investment disclaimers.
6. **Gate G9 (Provider Sandboxes):**
   - Add Plaid, PayPal, SnapTrade sandbox credentials into `/apps/TBI/www/mymiwallet/shared/.env`.
7. **Gate G11 (Restore Drill):**
   - Run `sudo bash /apps/TBI/repos/mymiwallet-next/scripts/ops/backup/mysql-restore-check.sh` and verify `RESTORE CHECK PASSED`.
8. **Gate G12 (Postmark & DMARC):**
   - Verify Postmark domain approval; confirm DMARC `p=quarantine` on 2026-12-05.
9. **Gate G13 (Load Test):**
   - Run concurrency check on staging.
10. **Gate G14 (Money Switches):**
    - Ensure all switches stay `false` until individually approved by name.
