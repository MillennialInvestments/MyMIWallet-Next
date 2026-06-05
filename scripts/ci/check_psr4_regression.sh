#!/usr/bin/env bash
set -euo pipefail

BASELINE="docs/ops/ci/baselines/psr4-baseline.txt"
RAW="$(mktemp)"

scripts/ci/check_psr4.sh > "$RAW" 2>&1 || true

CURRENT_COUNT="$(grep -Eo 'PSR-4 violations detected: [0-9]+' "$RAW" | awk '{print $4}' | tail -n 1)"
CURRENT_COUNT="${CURRENT_COUNT:-0}"

BASELINE_COUNT="$(grep -Eo 'PSR-4 violations detected: [0-9]+' "$BASELINE" | awk '{print $4}' | tail -n 1)"
BASELINE_COUNT="${BASELINE_COUNT:-0}"

echo "PSR-4 baseline count: $BASELINE_COUNT"
echo "PSR-4 current count:  $CURRENT_COUNT"

if [ "$CURRENT_COUNT" -gt "$BASELINE_COUNT" ]; then
  echo "FAIL: New PSR-4 violations detected."
  cat "$RAW"
  exit 1
fi

echo "PASS: No new PSR-4 violations."
