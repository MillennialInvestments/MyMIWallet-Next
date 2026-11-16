# MyMI Wallet GTM: Human Gate Action Packet (2026-11-16)

Prepared for Tim by Antigravity under the AIOps GTM completion protocol.
This packet gives exact, copy-pasteable terminal commands (batched, read-only first, safe for iPad) and verification criteria for each open human gate identified in `HUMAN_GATE_REGISTER.md`.

---

## Gate G3: Browser Journey Check on Staging
- **Owner:** Tim
- **Tasks affected:** MYMI-GTM-016, 017, 018, 019, 036
- **Target:** `https://staging.mymiwallet.com`
- **Actions:**
  1. Open `https://staging.mymiwallet.com/Dashboard` in a private/incognito window (hard-refresh). Confirm no overlay obstruction and no 403/404 console errors.
  2. Navigate to `https://staging.mymiwallet.com/register` and register with email: `healthcheck+signup1@mymiwallet.com`.
  3. Verify the branded activation email arrives from Postmark. Click the activation link.
  4. Test password reset via `https://staging.mymiwallet.com/forgot-password`. Confirm the branded reset email arrives and the token resets the password successfully.
- **Pass criterion:** Clean registration, activation, login, and branded emails without unhandled exceptions or layout breaks.

---

## Gate G4: Approve ADR 0002 (Canonical Auth Runtime)
- **Owner:** Teddy (with Tim)
- **Tasks affected:** MYMI-GTM-013, 015
- **Document:** `docs/adr/0002-canonical-auth-runtime.md`
- **Decision:**
  - Approves `AuthController` on top of Myth/Auth models and `bf_users` as the canonical authentication runtime for launch.
  - Confirms Shield test routes remain disabled in production and `ShieldIdentityBackfill` stays unapplied.
- **Command to record approval:**
  ```bash
  sed -i 's/Status: Proposed/Status: Approved/' docs/adr/0002-canonical-auth-runtime.md
  ```

---

## Gate G6: Plaintext Private Keys (3 Encrypted Accounts)
- **Owner:** Tim + Teddy
- **Tasks affected:** MYMI-GTM-045, 047, 048
- **Status:** The 3 legacy plaintext keys were safely encrypted in place with `enc:v1:` AES-GCM during PR #716 using `php spark security:encrypt-legacy-keys --approve --apply`.
- **Remaining ask:** Verify the encrypted count on the production server (read-only):
  ```bash
  sudo -u www-data php /apps/TBI/www/mymiwallet/current/spark security:encrypt-legacy-keys --approve
  ```
- **Action:** Confirm that 0 plaintext keys remain and confirm notification/acknowledgment for the 3 accounts.

---

## Gate G7: Duplicate-Email Accounts (4 Groups)
- **Owner:** Tim
- **Tasks affected:** MYMI-GTM-059
- **Reference:** `docs/_aiops/gtm/DEPENDENCY_AND_DUPLICATE_EMAIL_TRIAGE.md`
- **Check command (read-only, run on production host):**
  ```bash
  ENV_FILE=/apps/TBI/www/mymiwallet/shared/.env bash /apps/TBI/repos/mymiwallet-next/scripts/ops/db/auth-schema-check.sh | grep -A 2 -i "duplicate-email"
  ```
- **Detailed inspection query (read-only, masks emails):**
  ```bash
  mysql $(sed -nE "s/^[[:space:]]*database\.default\.database[[:space:]]*=[[:space:]]*['\"]?([^'\"]*)['\"]?[[:space:]]*$/\1/p" /apps/TBI/www/mymiwallet/shared/.env | tail -1) -e "
    SELECT CONCAT(LEFT(email, 3), '***@', SUBSTRING_INDEX(email, '@', -1)) AS masked_email,
           COUNT(*) AS count,
           GROUP_CONCAT(CONCAT('id:', id, ' del:', COALESCE(deleted,0), ' act:', COALESCE(active,0)) SEPARATOR ' | ') AS accounts
    FROM bf_users
    WHERE COALESCE(deleted,0)=0 AND email IS NOT NULL AND TRIM(email) != ''
    GROUP BY LOWER(TRIM(email))
    HAVING count > 1;
  "
  ```
- **Action:** Confirm keeping the active row with the latest login and marking duplicates retired per runbook.

---

## Gate G8: Legal and Financial Compliance
- **Owner:** Teddy / Legal Counsel
- **Tasks affected:** MYMI-GTM-051, 057
- **Verification items:**
  - Terms of Service (`/Terms`) & Privacy Policy (`/Privacy`).
  - Investment & trading disclaimers on portfolio and prediction views.
  - Tax calculation estimates disclaimer ("Consult a licensed tax professional").
- **Pass criterion:** Written sign-off confirming disclaimers meet financial compliance boundaries.

---

## Gate G9: Provider Sandboxes in `shared/.env`
- **Owner:** Tim
- **Tasks affected:** MYMI-GTM-021, 035, 038, 046-048, 053
- **Action:** Verify required provider sandbox credentials exist in `/apps/TBI/www/mymiwallet/shared/.env` (read-only presence check):
  ```bash
  for key in PLAID_CLIENT_ID PLAID_SECRET PLAID_ENV SNAPTRADE_CLIENT_ID SNAPTRADE_CONSUMER_KEY PAYPAL_SANDBOX_CLIENT_ID PAYPAL_SANDBOX_SECRET; do
    grep -q "^[[:space:]]*${key}=" /apps/TBI/www/mymiwallet/shared/.env && echo "${key}: SET" || echo "${key}: UNSET"
  done
  ```
  *(Never paste real credential values in chats or commit them to git).*

---

## Gate G11: Backup Restore Drill
- **Owner:** Tim
- **Tasks affected:** MYMI-GTM-060
- **Action:** Run the automated restore drill against the latest automated database dump:
  ```bash
  sudo bash /apps/TBI/repos/mymiwallet-next/scripts/ops/backup/mysql-restore-check.sh
  ```
- **Pass criterion:** The terminal output ends with:
  ```
  RESTORE CHECK PASSED
  ```
  (Loads dump into throwaway `mymi_restore_check` database, verifies critical tables and row counts against live DB, then cleans up scratch DB).

---

## Gate G12: Postmark Approval & DMARC
- **Owner:** Tim
- **Tasks affected:** MYMI-GTM-017, 018
- **Action:**
  1. Confirm Postmark account approval for `mymiwallet.com` sender domain.
  2. Verify DNS DMARC TXT record:
     ```bash
     dig +short TXT _dmarc.mymiwallet.com
     ```
  3. Confirm DMARC policy transition to `p=quarantine` scheduled for 2026-12-05.

---

## Gate G13: Staging Load Test Window
- **Owner:** Tim
- **Tasks affected:** MYMI-GTM-067
- **Action:** Execute lightweight HTTP concurrency validation on staging (10 concurrent clients, 100 requests):
  ```bash
  ab -n 100 -c 10 -H "Host: staging.mymiwallet.com" https://staging.mymiwallet.com/
  ```
- **Pass criterion:** 0 failed requests, mean latency < 350ms.

---

## Gate G14: Approve Money Switches by Name
- **Owner:** Tim
- **Tasks affected:** Platform launch activation
- **Context:** Per Gate G14 rule, all financial and trading switches default to `false` and must remain OFF until explicitly approved.
- **Inventory in `app/Config/Features.php`:**
  1. `FEATURE_WALLETS` (Current: OFF)
  2. `FEATURE_PREDICTIONS` (Current: OFF)
  3. `FEATURE_SOLANA_TRADING` (Current: OFF)
  4. `FEATURE_AUCTIONS` (Current: OFF)
  5. `FEATURE_PROJECT_INVESTING` (Current: OFF)
  6. `FEATURE_MYMIGOLD_PURCHASES` (Current: OFF)
  7. `FEATURE_MEMBERSHIP_PURCHASES` (Current: OFF)
- **Check command (read-only):**
  ```bash
  php -r "require 'app/Config/Features.php'; \$f = new Config\Features(); print_r(\$f->all());"
  ```
- **Pass criterion:** Tim approves activation of each feature switch individually by name in production `.env`.
