#!/usr/bin/env bash
set -euo pipefail

BASE="${1:-https://www.mymiwallet.com}"

echo "Testing home..."
curl -sS -o /dev/null -w "%{http_code}\n" "$BASE/" | grep -E "200|301|302" >/dev/null

echo "Testing dynamic route..."
curl -sS -o /dev/null -w "%{http_code}\n" "$BASE/index.php/Dashboard/Transaction-Modal/1/test" \
  | grep -E "200|301|302|403" >/dev/null

echo "✅ Smoke checks passed."
