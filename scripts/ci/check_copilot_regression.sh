#!/usr/bin/env bash
set -euo pipefail

bash scripts/ci/prepare-writable.sh >/dev/null

BASELINE="docs/ops/ci/baselines/copilot-command-baseline.txt"
RAW="$(mktemp)"

php spark aiops:copilot:validate --json > "$RAW" 2>&1 || true

CURRENT_COUNT="$(
  grep -E '"command_violations"[[:space:]]*:[[:space:]]*[0-9]+' "$RAW" \
    | grep -Eo '[0-9]+' \
    | tail -n 1
)"
CURRENT_COUNT="${CURRENT_COUNT:-0}"

if [ ! -f "$BASELINE" ]; then
  echo "Copilot command violations detected: $CURRENT_COUNT" > "$BASELINE"
  echo "Created Copilot baseline: $BASELINE"
fi

BASELINE_COUNT="$(
  grep -Eo 'Copilot command violations detected: [0-9]+' "$BASELINE" \
    | awk '{print $5}' \
    | tail -n 1
)"
BASELINE_COUNT="${BASELINE_COUNT:-0}"

echo "Copilot command baseline count: $BASELINE_COUNT"
echo "Copilot command current count:  $CURRENT_COUNT"

if [ "$CURRENT_COUNT" -gt "$BASELINE_COUNT" ]; then
  echo "FAIL: New Copilot command violations detected."
  cat "$RAW"
  exit 1
fi

echo "PASS: No new Copilot command violations."
