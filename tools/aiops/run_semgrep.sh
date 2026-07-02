#!/usr/bin/env bash
set -uo pipefail
ROOT_DIR=$(cd "$(dirname "${BASH_SOURCE[0]}")/../.." && pwd)
cd "${ROOT_DIR}"

START=$(date +%s)
STATUS="success"
MESSAGE="semgrep scan completed"

if ! command -v semgrep >/dev/null 2>&1; then
  STATUS="error"
  MESSAGE="semgrep not installed"
else
  if ! semgrep --config ./.semgrep.yml --json --timeout 120; then
    STATUS="error"
    MESSAGE="semgrep reported findings or failed"
  fi
fi

RUNTIME=$(( $(date +%s) - START ))
printf '{"status":"%s","runtime_seconds":%d,"message":"%s"}\n' "$STATUS" "$RUNTIME" "$MESSAGE"
