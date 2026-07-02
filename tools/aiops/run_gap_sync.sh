#!/usr/bin/env bash
set -uo pipefail
ROOT_DIR=$(cd "$(dirname "${BASH_SOURCE[0]}")/../.." && pwd)
cd "${ROOT_DIR}"

START=$(date +%s)
STATUS="success"
MESSAGE="gap:sync completed"

ARGS=("gap:sync")
[[ -n "${AI_GAP_SYNC_LIMIT:-}" ]] && ARGS+=("--limit=${AI_GAP_SYNC_LIMIT}")
[[ -n "${AI_GAP_SYNC_PRIORITY:-}" ]] && ARGS+=("--priority=${AI_GAP_SYNC_PRIORITY}")
[[ -n "${AI_GAP_SYNC_DRY_RUN:-}" ]] && ARGS+=("--dry-run")
[[ -n "${AI_GAP_SYNC_REPORT_ONLY:-}" ]] && ARGS+=("--report-only")

if ! command -v php >/dev/null 2>&1; then
  STATUS="error"
  MESSAGE="php not available"
else
  if ! php spark "${ARGS[@]}"; then
    STATUS="error"
    MESSAGE="spark gap:sync failed"
  fi
fi

RUNTIME=$(( $(date +%s) - START ))
printf '{"status":"%s","runtime_seconds":%d,"message":"%s"}\n' "$STATUS" "$RUNTIME" "$MESSAGE"
