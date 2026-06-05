#!/usr/bin/env bash
set -euo pipefail

BASELINE="docs/ops/ci/baselines/filesystem-baseline.txt"
CURRENT="$(mktemp)"
RAW="$(mktemp)"

php spark ops:filesystem:lint --report > "$RAW" 2>&1 || true

grep -E '^app/.*\[(ERROR|WARNING)\]$' "$RAW" \
  | sed 's/[[:space:]]*$//' \
  | sort -u \
  > "$CURRENT" || true

if [ ! -f "$BASELINE" ]; then
  echo "FAIL: Missing baseline: $BASELINE"
  cat "$RAW"
  exit 1
fi

NEW_FINDINGS="$(comm -13 "$BASELINE" "$CURRENT" || true)"

echo "Filesystem baseline count: $(wc -l < "$BASELINE")"
echo "Filesystem current count:  $(wc -l < "$CURRENT")"

if [ -n "$NEW_FINDINGS" ]; then
  echo "FAIL: New filesystem findings detected:"
  echo "$NEW_FINDINGS"
  exit 1
fi

echo "PASS: No new filesystem findings."
