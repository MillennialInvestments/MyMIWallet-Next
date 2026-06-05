#!/usr/bin/env bash
set -euo pipefail

BASELINE="docs/ops/ci/baselines/filesystem-baseline.txt"
CURRENT="$(mktemp)"
CURRENT_SORTED="$(mktemp)"
BASELINE_SORTED="$(mktemp)"
RAW="$(mktemp)"

php spark ops:filesystem:lint --report > "$RAW" 2>&1 || true

grep -E '^app/.*\[(ERROR|WARNING)\]$' "$RAW"   | sed 's/[[:space:]]*$//'   | LC_ALL=C sort -u   > "$CURRENT" || true

if [ ! -f "$BASELINE" ]; then
  echo "FAIL: Missing baseline: $BASELINE"
  cat "$RAW"
  exit 1
fi

LC_ALL=C sort -u "$BASELINE" > "$BASELINE_SORTED"
LC_ALL=C sort -u "$CURRENT" > "$CURRENT_SORTED"

NEW_FINDINGS="$(comm -13 "$BASELINE_SORTED" "$CURRENT_SORTED" || true)"

echo "Filesystem baseline count: $(wc -l < "$BASELINE_SORTED")"
echo "Filesystem current count:  $(wc -l < "$CURRENT_SORTED")"

if [ -n "$NEW_FINDINGS" ]; then
  echo "FAIL: New filesystem findings detected:"
  echo "$NEW_FINDINGS"
  exit 1
fi

echo "PASS: No new filesystem findings."
