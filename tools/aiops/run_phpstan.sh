#!/usr/bin/env bash
set -uo pipefail
ROOT_DIR=$(cd "$(dirname "${BASH_SOURCE[0]}")/../.." && pwd)
cd "${ROOT_DIR}"

START=$(date +%s)
STATUS="success"
MESSAGE="phpstan completed"

if [ ! -f "vendor/bin/phpstan" ]; then
  STATUS="error"
  MESSAGE="phpstan not installed (vendor/bin/phpstan missing)"
else
  if ! vendor/bin/phpstan analyse; then
    STATUS="error"
    MESSAGE="phpstan reported issues"
  fi
fi

RUNTIME=$(( $(date +%s) - START ))
printf '{"status":"%s","runtime_seconds":%d,"message":"%s"}\n' "$STATUS" "$RUNTIME" "$MESSAGE"
