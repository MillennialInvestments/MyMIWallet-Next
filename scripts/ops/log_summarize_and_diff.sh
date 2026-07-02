#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR=$(cd "$(dirname "${BASH_SOURCE[0]}")/../.." && pwd)
LOG_DATE=${LOG_DATE:-$(date +%F)}
PREVIOUS_DATE=${PREVIOUS_DATE:-$(date -d "yesterday" +%F 2>/dev/null || date -v-1d +%F)}
HEALTH_LOG=${HEALTH_LOG:-}

LOG_FILE="$ROOT_DIR/writable/logs/log-$LOG_DATE.log"
PREV_LOG_FILE="$ROOT_DIR/writable/logs/log-$PREVIOUS_DATE.log"

if [[ ! -f "$LOG_FILE" ]]; then
  echo "{\"error\":\"Log file not found: $LOG_FILE\"}"
  exit 0
fi

summarize() {
  local file=$1
  awk 'match($0, /^(DEBUG|INFO|NOTICE|WARNING|ERROR|CRITICAL)/, m){counts[m[1]]++} END{for (k in counts) printf "%s:%d\n", k, counts[k]}' "$file"
}

current_summary=$(summarize "$LOG_FILE")
previous_summary=""
if [[ -f "$PREV_LOG_FILE" ]]; then
  previous_summary=$(summarize "$PREV_LOG_FILE")
fi

json='{'
json+="\"date\":\"$LOG_DATE\"," 
json+="\"current\":{"

first=1
while IFS=: read -r level count; do
  [[ -z "$level" ]] && continue
  if [[ $first -eq 0 ]]; then json+=","; fi
  json+="\"$level\":$count"; first=0
done <<< "$current_summary"
json+="}"

if [[ -n "$previous_summary" ]]; then
  json+=",\"previous\":{"
  first=1
  while IFS=: read -r level count; do
    [[ -z "$level" ]] && continue
    if [[ $first -eq 0 ]]; then json+=","; fi
    json+="\"$level\":$count"; first=0
  done <<< "$previous_summary"
  json+="}"
fi

json+='}'

echo "$json"

if [[ -n "$HEALTH_LOG" ]]; then
  echo "$json" >> "$HEALTH_LOG"
fi
