#!/usr/bin/env bash
# MYMI-GT-FORM-ROUTES-002: Platform Form Certification Smoke Test
#
# Validates form certification status and route resolution across Waves F0–F8.
# Usage:
#   bash tests/smoke/form-certification-smoke.sh

set -euo pipefail

ROOT="$(git rev-parse --show-toplevel 2>/dev/null)"
if [ -z "$ROOT" ]; then
    echo "STOP: repository root could not be resolved"
    exit 1
fi
cd "$ROOT"

echo "=========================================================="
echo "   MYMI WALLET FORM CERTIFICATION SMOKE SUITE            "
echo "=========================================================="

echo
echo "--- 1. PHPUnit Route & Handler Contract Tests ---"
vendor/bin/phpunit tests/unit/AIOps/FormCertificationSmokeTest.php
echo "✓ FormCertificationSmokeTest PASSED"

echo
echo "--- 2. Form Action Gap Ratchet Test ---"
vendor/bin/phpunit tests/unit/AIOps/FormActionGapRatchetTest.php
echo "✓ FormActionGapRatchetTest PASSED"

echo
echo "--- 3. Platform Form Inventory Scan ---"
SCAN_OUT="$(php spark aiops:form:test --scan-all)"
echo "$SCAN_OUT"

PASS_COUNT="$(echo "$SCAN_OUT" | awk '/PASS/{print $2}' | head -n1)"
FAIL_COUNT="$(echo "$SCAN_OUT" | awk '/FAIL/{print $2}' | head -n1)"

echo
echo "--- 4. Assertion Checks ---"
echo "PASS Count: ${PASS_COUNT:-0} (Required: >= 317)"
echo "FAIL Count: ${FAIL_COUNT:-999} (Required: <= 0)"

if [ "${PASS_COUNT:-0}" -lt 317 ]; then
    echo "ERROR: PASS count ${PASS_COUNT:-0} is below required threshold 317" >&2
    exit 1
fi

if [ "${FAIL_COUNT:-999}" -gt 0 ]; then
    echo "ERROR: FAIL count ${FAIL_COUNT:-999} exceeds maximum threshold 0" >&2
    exit 1
fi

echo
echo "=========================================================="
echo "   ✓ ALL FORM CERTIFICATION SMOKE TESTS PASSED            "
echo "=========================================================="
exit 0
