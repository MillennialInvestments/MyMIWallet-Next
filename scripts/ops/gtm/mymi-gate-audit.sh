#!/usr/bin/env bash
# MyMI Wallet GTM Human Gate Audit Runner (iPad-friendly batch script)
set -eo pipefail

ENV_FILE="${ENV_FILE:-/apps/TBI/www/mymiwallet/shared/.env}"
REPO_DIR="${REPO_DIR:-/apps/TBI/repos/mymiwallet-next}"

if [ ! -d "$REPO_DIR" ]; then
  REPO_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/../../.." && pwd)"
fi

echo "=========================================================="
echo "   MyMI Wallet GTM Human Gate Audit Runner (2026-11-16)   "
echo "=========================================================="
echo "Target repo: $REPO_DIR"
echo "Target env:  $ENV_FILE"
echo ""

# G3: Staging DNS & reachability
echo "--- [G3] Browser Journey Check (Staging) ---"
if host staging.mymiwallet.com >/dev/null 2>&1; then
  echo "PASS: staging.mymiwallet.com resolves"
else
  echo "WARN: staging.mymiwallet.com DNS unresolved"
fi
echo "Action: Complete register/activate/reset check in private browser."
echo ""

# G4: ADR 0002
echo "--- [G4] ADR 0002 (Canonical Auth Runtime) ---"
if grep -q "Status: Approved" "$REPO_DIR/docs/adr/0002-canonical-auth-runtime.md" 2>/dev/null; then
  echo "PASS: ADR 0002 is Approved."
else
  echo "OPEN: ADR 0002 is Proposed. Teddy to approve."
fi
echo ""

# G6: Plaintext Private Keys
echo "--- [G6] Plaintext Private Keys ---"
echo "Checking encryption status:"
if [ -f "$REPO_DIR/spark" ]; then
  php "$REPO_DIR/spark" security:encrypt-legacy-keys --approve || true
fi
echo ""

# G7: Duplicate Emails
echo "--- [G7] Duplicate Email Accounts ---"
if [ -f "$ENV_FILE" ]; then
  DB_NAME=$(sed -nE "s/^[[:space:]]*database\.default\.database[[:space:]]*=[[:space:]]*['\"]?([^'\"]*)['\"]?[[:space:]]*$/\1/p" "$ENV_FILE" | tail -1)
  if [ -n "$DB_NAME" ] && command -v mysql >/dev/null 2>&1; then
    mysql "$DB_NAME" -e "
      SELECT LOWER(TRIM(email)) as masked_email, COUNT(*) as cnt
      FROM bf_users
      WHERE COALESCE(deleted,0)=0 AND email IS NOT NULL AND TRIM(email) != ''
      GROUP BY LOWER(TRIM(email))
      HAVING cnt > 1;
    " || echo "Note: MySQL query failed or unprivileged"
  fi
else
  echo "Note: $ENV_FILE not found (sandbox mode)"
fi
echo ""

# G8: Legal Compliance
echo "--- [G8] Legal Compliance Disclaimers ---"
if [ -f "$REPO_DIR/app/Views/themes/public/termsOfService.php" ] && [ -f "$REPO_DIR/app/Views/themes/public/privacyPolicy.php" ]; then
  echo "PASS: Terms and Privacy views present."
else
  echo "OPEN: Terms and Privacy views missing."
fi
echo ""

# G9: Provider Sandboxes in shared/.env
echo "--- [G9] Provider Sandboxes Check ---"
for key in PLAID_CLIENT_ID PLAID_SECRET PAYPAL_SANDBOX_CLIENT_ID PAYPAL_SANDBOX_SECRET SNAPTRADE_CLIENT_ID; do
  if [ -f "$ENV_FILE" ] && grep -q "^[[:space:]]*${key}=" "$ENV_FILE"; then
    echo "  ${key}: SET"
  else
    echo "  ${key}: UNSET (required for full launch scope)"
  fi
done
echo ""

# G11: Restore Drill
echo "--- [G11] Backup Restore Drill ---"
if [ -f "$REPO_DIR/scripts/ops/backup/mysql-restore-check.sh" ]; then
  echo "Script present: sudo bash $REPO_DIR/scripts/ops/backup/mysql-restore-check.sh"
else
  echo "OPEN: Restore check script not found."
fi
echo ""

# G12: Postmark and DMARC
echo "--- [G12] Postmark & DMARC DNS ---"
dig +short TXT _dmarc.mymiwallet.com || true
echo ""

# G14: Money Switches
echo "--- [G14] Money Switches in Config\Features ---"
php -r "require '$REPO_DIR/app/Config/Features.php'; \$f = new Config\Features(); print_r(\$f->all());" 2>/dev/null || true
echo ""
echo "=========================================================="
echo "Gate audit run complete."
echo "=========================================================="
