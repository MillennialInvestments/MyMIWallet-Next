#!/usr/bin/env bash
set -euo pipefail

ROOT="$(cd "$(dirname "$0")/.." && pwd)"

ALLOWLIST_REGEX="app/(Config|Modules/.*/Config)/Routes\\.php|app/ConfigO/Routes\\.php"

MATCHES=$(grep -RIn --exclude-dir=writable --exclude-dir=vendor "\(:segment\)|\(:num\)|%28:segment%29|%28:num%29" "$ROOT" \
  | grep -vE "$ALLOWLIST_REGEX" || true)

if [[ -n "$MATCHES" ]]; then
  echo "❌ Found route tokens used outside allowed route config:"
  echo "$MATCHES"
  exit 1
fi

echo "✅ No disallowed route tokens found."