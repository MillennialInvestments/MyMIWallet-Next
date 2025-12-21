#!/usr/bin/env bash
set -euo pipefail

TARGET_URL=${TARGET_URL:-}
DB_PING=${DB_PING:-0}
HEALTH_LOG=${HEALTH_LOG:-}
NOW=$(date -Iseconds)

php_version=$(php -r "echo PHP_VERSION;" 2>/dev/null || echo "unknown")
disk_used=$(df -h . | awk 'NR==2 {print $5}')
uptime_human=$(uptime -p 2>/dev/null || true)

http_status=""
if [[ -n "$TARGET_URL" ]]; then
  http_status=$(curl -ks -o /dev/null -w "%{http_code}" "$TARGET_URL" || echo "error")
fi

json='{'
json+="\"timestamp\":\"$NOW\"," 
json+="\"php_version\":\"$php_version\"," 
json+="\"disk_used\":\"$disk_used\"," 
json+="\"uptime\":\"$uptime_human\""

if [[ -n "$http_status" ]]; then
  json+=",\"http_status\":\"$http_status\""
fi

if [[ "$DB_PING" == "1" ]]; then
  db_ping=$(php -r "echo function_exists('mysqli_connect') ? 'ok' : 'missing';" 2>/dev/null || echo 'error')
  json+=",\"db_ping\":\"$db_ping\""
fi

json+='}'

echo "$json"

if [[ -n "$HEALTH_LOG" ]]; then
  echo "$json" >> "$HEALTH_LOG"
fi
