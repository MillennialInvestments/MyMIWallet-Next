#!/usr/bin/env bash
set -euo pipefail

ERROR_LOG="${1:-$HOME/nginx/logs/error.log}"
LINES="${LINES:-200}"

if [ ! -f "$ERROR_LOG" ]; then
  echo "❌ Error log not found at $ERROR_LOG" >&2
  exit 1
fi

echo "Showing last $LINES lines from $ERROR_LOG"
tail -n "$LINES" "$ERROR_LOG"
