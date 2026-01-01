#!/usr/bin/env bash
set -uo pipefail
ROOT_DIR=$(cd "$(dirname "${BASH_SOURCE[0]}")/../.." && pwd)
cd "${ROOT_DIR}"

START=$(date +%s)
STATUS="success"
MESSAGE="Repository pull completed"

if ! command -v git >/dev/null 2>&1; then
  STATUS="error"
  MESSAGE="git not available"
else
  if ! git pull --ff-only; then
    STATUS="error"
    MESSAGE="git pull failed"
  fi
fi

RUNTIME=$(( $(date +%s) - START ))
printf '{"status":"%s","runtime_seconds":%d,"message":"%s"}\n' "$STATUS" "$RUNTIME" "$MESSAGE"
