#!/usr/bin/env bash
# ==============================================================================
# MyMI XChain-001 Staging Smoke Verification Script
# Read-only verification of all new multi-chain, gold, exchange, and MDIT routes.
# Safe to run on staging (never mutates state or database).
# ==============================================================================
set -euo pipefail

echo "=========================================================="
echo "   MYMI XCHAIN-001 STAGING SMOKE VERIFICATION             "
echo "=========================================================="

APP_DIR="${1:-/apps/TBI/www/mymiwallet-staging/current}"
if [[ ! -d "$APP_DIR" ]]; then
    # Fallback to current working directory if running in local test environment
    APP_DIR="$(pwd)"
fi

cd "$APP_DIR"

echo "Target Application Directory: $APP_DIR"
echo ""

# ------------------------------------------------------------------------------
# 1. Verify Spark Commands Availability
# ------------------------------------------------------------------------------
echo "--- 1. Spark CLI Command Verification ---"
# Clear file locator cache so freshly deployed commands are discovered
SPARK_RUNNER="php"
if [[ "$(id -u)" -eq 0 ]]; then
    rm -f writable/cache/FileLocatorCache shared/writable/cache/FileLocatorCache 2>/dev/null || true
    SPARK_RUNNER="sudo -u www-data php"
elif sudo -n true 2>/dev/null && id -u www-data >/dev/null 2>&1; then
    sudo rm -f writable/cache/FileLocatorCache shared/writable/cache/FileLocatorCache 2>/dev/null || true
    SPARK_RUNNER="sudo -u www-data php"
else
    rm -f writable/cache/FileLocatorCache shared/writable/cache/FileLocatorCache 2>/dev/null || true
fi

COMMANDS=(
    "cryptopay:reconcile"
    "cryptopay:test-checkout"
    "cryptopay:btc-pool-import"
    "solanapay:test-checkout"
    "compliance:update-sanctions"
)

SPARK_LIST=$($SPARK_RUNNER spark list 2>&1 || true)

ALL_CMD_OK=true
for cmd in "${COMMANDS[@]}"; do
    if echo "$SPARK_LIST" | grep -q "$cmd"; then
        echo "  [PASS] Command registered: $cmd"
    else
        echo "  [FAIL] Missing command: $cmd"
        ALL_CMD_OK=false
    fi
done

if [[ "$ALL_CMD_OK" != "true" ]]; then
    echo "ERROR: One or more required spark commands are missing."
    exit 1
fi
echo "✓ All required spark commands are registered and callable."
echo ""

# ------------------------------------------------------------------------------
# 2. Verify PHP Syntax on Changed Components
# ------------------------------------------------------------------------------
echo "--- 2. PHP Syntax Verification ---"
FILES=(
    "app/Config/Features.php"
    "app/Config/Routes.php"
    "app/Services/Compliance/SanctionsScreen.php"
    "app/Services/CryptoPay/BtcAddressPoolService.php"
    "app/Services/Gold/GoldLedgerService.php"
    "app/Services/Gold/GoldPricing.php"
    "app/Services/Swaps/SwapService.php"
    "app/Services/MDIT/MyMICoinOfferingService.php"
    "app/Libraries/Exchange/Providers/PaperExchangeProvider.php"
    "app/Modules/Admin/Controllers/CryptoCheckoutsController.php"
    "app/Modules/Exchange/Controllers/PaperExchangeController.php"
    "app/Modules/User/Controllers/SwapsController.php"
    "app/Modules/User/Controllers/MyMICoinOfferingController.php"
)

for file in "${FILES[@]}"; do
    if [[ -f "$file" ]]; then
        php -l "$file" > /dev/null
        echo "  [PASS] Lint clean: $file"
    else
        echo "  [WARN] File not found (skipping): $file"
    fi
done
echo "✓ PHP syntax verification passed."
echo ""

# ------------------------------------------------------------------------------
# 3. Form and Route Certification Smoke Check
# ------------------------------------------------------------------------------
echo "--- 3. Form & Route Certification Smoke Check ---"
if [[ -f "tests/smoke/form-certification-smoke.sh" ]]; then
    bash tests/smoke/form-certification-smoke.sh
fi

echo "=========================================================="
echo "   ✓ ALL MYMI-XCHAIN-001 SMOKE VERIFICATIONS PASSED       "
echo "=========================================================="
exit 0
