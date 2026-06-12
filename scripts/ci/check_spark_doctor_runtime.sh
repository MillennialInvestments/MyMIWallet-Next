#!/usr/bin/env bash
set -euo pipefail

bash scripts/ci/prepare-writable.sh >/dev/null

RAW="$(mktemp)"

php spark spark:doctor --json > "$RAW" 2>&1 || true

if grep -Eiq 'Fatal error|TypeError|Argument #1|Non-static method|Parse error|syntax error|Command .*not found|Could not open input file' "$RAW"; then
  echo "FAIL: Spark doctor runtime error detected."
  cat "$RAW"
  exit 1
fi

echo "PASS: Spark doctor completed without runtime errors."
grep -Ei '"command_issues"|"registry_issues"|"filesystem_issues"|"failures"' "$RAW" | head -n 20 || true
