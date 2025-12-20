#!/usr/bin/env bash
set -euo pipefail

ROOT="$(cd "$(dirname "$0")/.." && pwd)"
LOG_DIR="$ROOT/writable/logs"

LINES="${1:-200}"
FILTER="${2:-}"

if [[ ! -d "$LOG_DIR" ]]; then
  echo "Log directory not found: $LOG_DIR"
  exit 1
fi

latest_log=$(ls -1t "$LOG_DIR"/log-*.log 2>/dev/null | head -n 1 || true)
if [[ -z "$latest_log" ]]; then
  echo "No log files found in $LOG_DIR"
  exit 1
fi

echo "Newest log file: $latest_log"
echo "--- Last ${LINES} lines ---"
if [[ -n "$FILTER" ]]; then
  tail -n "$LINES" "$latest_log" | grep -i "$FILTER" || true
else
  tail -n "$LINES" "$latest_log"
fi

echo "--- ERROR/CRITICAL grouped counts ---"
if [[ -n "$FILTER" ]]; then
  grep -E "ERROR|CRITICAL" "$latest_log" | grep -i "$FILTER" || true
else
  grep -E "ERROR|CRITICAL" "$latest_log" || true
fi | awk -F '-->' '{msg=$2; gsub(/^ */,"",msg); if(length(msg)>0) counts[msg]++} END {for (m in counts) {printf "%sx %s\n", counts[m], m}}'
