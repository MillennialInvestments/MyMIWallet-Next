#!/usr/bin/env bash
set -uo pipefail
ROOT_DIR=$(cd "$(dirname "${BASH_SOURCE[0]}")/../.." && pwd)
cd "${ROOT_DIR}"

START=$(date +%s)
STATUS="success"
MESSAGE="phpunit completed"

if ! command -v php >/dev/null 2>&1; then
  STATUS="error"
  MESSAGE="php not available"
else
  if [ ! -f "vendor/bin/phpunit" ]; then
    STATUS="error"
    MESSAGE="phpunit not installed (vendor/bin/phpunit missing)"
  else
    if ! vendor/bin/phpunit --testsuite "Application Test Suite"; then
      STATUS="error"
      MESSAGE="phpunit failed"
    fi
  fi
fi

RUNTIME=$(( $(date +%s) - START ))
printf '{"status":"%s","runtime_seconds":%d,"message":"%s"}\n' "$STATUS" "$RUNTIME" "$MESSAGE"
