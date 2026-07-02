#!/usr/bin/env bash
set -euo pipefail

BASE_URL=${BASE_URL:-}
CRON_PATH=${CRON_PATH:-}
MYMI_CRON_TOKEN=${MYMI_CRON_TOKEN:-}
CRON_LOG=${CRON_LOG:-}

if [[ -z "$BASE_URL" || -z "$CRON_PATH" || -z "$MYMI_CRON_TOKEN" ]]; then
  echo '{"error":"BASE_URL, CRON_PATH, and MYMI_CRON_TOKEN are required"}'
  exit 1
fi

url="${BASE_URL%/}${CRON_PATH}"
response=$(curl -sk -w "HTTPSTATUS:%{http_code}" -H "Authorization: Bearer $MYMI_CRON_TOKEN" "$url" || true)
body=${response%%HTTPSTATUS:*}
status=${response##*HTTPSTATUS:}

json=$(printf '{"url":"%s","status":%s,"snippet":"%s"}' "$url" "$status" "$(echo "$body" | head -c 200 | sed 's/"/\\"/g')")

echo "$json"

if [[ -n "$CRON_LOG" ]]; then
  echo "$json" >> "$CRON_LOG"
fi
