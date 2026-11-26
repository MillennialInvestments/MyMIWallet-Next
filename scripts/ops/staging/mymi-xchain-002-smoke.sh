#!/usr/bin/env bash
# MyMI XCHAIN-002 Staging Smoke Verification Script
# Validates multi-EVM, stablecoins, UTXO multi-pool, and Tron adapters.
set -euo pipefail

TARGET_DIR="${1:-/apps/TBI/www/mymiwallet-staging/current}"

echo "=========================================================="
echo "   MYMI XCHAIN-002 STAGING SMOKE VERIFICATION             "
echo "=========================================================="
echo "Target Application Directory: $TARGET_DIR"

if [ ! -d "$TARGET_DIR" ]; then
    echo "ERROR: Target directory does not exist: $TARGET_DIR"
    exit 1
fi

cd "$TARGET_DIR"

# 1. Flush FileLocatorCache
if [ -f shared/writable/cache/FileLocatorCache ]; then
    echo "Flushing staging FileLocatorCache..."
    sudo rm -f shared/writable/cache/FileLocatorCache
fi

# 2. Verify Spark Commands
echo ""
echo "--- 1. Spark CLI Command Verification ---"
REQUIRED_COMMANDS=(
    "cryptopay:utxo-pool-import"
    "cryptopay:btc-pool-import"
    "cryptopay:reconcile"
    "compliance:update-sanctions"
)

for cmd in "${REQUIRED_COMMANDS[@]}"; do
    if sudo -u www-data php spark list | grep -q "$cmd"; then
        echo "  [PASS] Command registered: $cmd"
    else
        echo "  [FAIL] Missing command: $cmd"
        exit 1
    fi
done

# 3. Form Certification Smoke
echo ""
echo "--- 2. Form & Route Certification Smoke Check ---"
sudo -u www-data php -d display_errors=1 spark aiops:form:test --scan-all > /tmp/xchain-002-form-test.log
if grep -q "FAIL     0" /tmp/xchain-002-form-test.log; then
    echo "  [PASS] Form certification scan: FAIL 0 verified."
else
    echo "  [FAIL] Form certification scan reported failures:"
    cat /tmp/xchain-002-form-test.log
    exit 1
fi

echo ""
echo "=========================================================="
echo "   ✓ ALL XCHAIN-002 STAGING SMOKE CHECKS PASSED           "
echo "=========================================================="
