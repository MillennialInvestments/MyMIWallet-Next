#!/usr/bin/env bash
set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/../.." && pwd)"
cd "$ROOT"

HTTP_URL=${LOG_HEALTHCHECK_URL:-"http://localhost:8080/API/Management/logHealthcheck"}
HTTP_TOKEN_HEADER=${LOG_HEALTHCHECK_TOKEN_HEADER:-"X-Log-Healthcheck-Token"}
TOKEN_VALUE=${LOG_HEALTHCHECK_TOKEN:-""}

echo "==> Running CLI healthcheck (php spark logs:healthcheck)"
CLI_OUTPUT=$(php spark logs:healthcheck 2>&1 | tee /tmp/mymi_log_health_cli.txt)

FILE_OK=$(echo "$CLI_OUTPUT" | grep -Eo 'file_log_ok=(true|false)' | tail -n1 | cut -d'=' -f2 || echo "false")
DB_OK=$(echo "$CLI_OUTPUT" | grep -Eo 'db_log_ok=(true|false)' | tail -n1 | cut -d'=' -f2 || echo "false")

echo ""
echo "==> Calling HTTP healthcheck (${HTTP_URL})"
HEADER_ARG=()
if [[ -n "$TOKEN_VALUE" ]]; then
  HEADER_ARG=(-H "${HTTP_TOKEN_HEADER}: ${TOKEN_VALUE}")
fi

HTTP_OUTPUT=$(curl -ksS "${HEADER_ARG[@]}" "$HTTP_URL" || true)
echo "$HTTP_OUTPUT"

HTTP_FILE_OK=$(echo "$HTTP_OUTPUT" | grep -Eo '"file_log_ok":\s*(true|false)' | head -n1 | grep -Eo '(true|false)' || echo "false")
HTTP_DB_OK=$(echo "$HTTP_OUTPUT" | grep -Eo '"db_log_ok":\s*(true|false)' | head -n1 | grep -Eo '(true|false)' || echo "false")

LATEST_LOG=$(ls -1t writable/logs/log-* 2>/dev/null | head -n1 || true)
echo ""
echo "==> Latest log file: ${LATEST_LOG:-<none>}"
if [[ -n "$LATEST_LOG" ]]; then
  tail -n 50 "$LATEST_LOG" || true
else
  echo "No log file found."
fi

echo ""
echo "==> Summary"
echo "CLI file_log_ok=${FILE_OK}"
echo "CLI db_log_ok=${DB_OK}"
echo "HTTP file_log_ok=${HTTP_FILE_OK}"
echo "HTTP db_log_ok=${HTTP_DB_OK}"

if [[ "$FILE_OK" == "true" && "$DB_OK" == "true" && "$HTTP_FILE_OK" == "true" && "$HTTP_DB_OK" == "true" ]]; then
  echo "PASS: logging sinks are healthy."
  exit 0
else
  echo "FAIL: one or more logging checks failed."
  exit 1
fi