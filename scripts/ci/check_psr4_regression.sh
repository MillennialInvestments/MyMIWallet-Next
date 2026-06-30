#!/usr/bin/env bash
set -euo pipefail

BASELINE="docs/ops/ci/baselines/psr4-baseline.txt"
RAW="$(mktemp)"
CURRENT="$(mktemp)"
BASELINE_SORTED="$(mktemp)"
CURRENT_SORTED="$(mktemp)"

bash scripts/ci/check_psr4.sh > "$RAW" 2>&1 || true

grep -E '^(app|tests)/.*' "$RAW" \
  | sed 's/[[:space:]]*$//' \
  | LC_ALL=C sort -u \
  > "$CURRENT" || true

if [ ! -f "$BASELINE" ]; then
  cp "$CURRENT" "$BASELINE"
  echo "Created PSR-4 baseline: $BASELINE"
fi

LC_ALL=C sort -u "$BASELINE" > "$BASELINE_SORTED"
LC_ALL=C sort -u "$CURRENT" > "$CURRENT_SORTED"

NEW_FINDINGS="$(comm -13 "$BASELINE_SORTED" "$CURRENT_SORTED" || true)"

echo "PSR-4 baseline count: $(wc -l < "$BASELINE_SORTED")"
echo "PSR-4 current count:  $(wc -l < "$CURRENT_SORTED")"

if [ -n "$NEW_FINDINGS" ]; then
  echo "FAIL: New PSR-4 violations detected:"
  echo "$NEW_FINDINGS"
  exit 1
fi

echo "PASS: No new PSR-4 violations."
