#!/usr/bin/env bash
set -euo pipefail

ROOT="$(cd "$(dirname "$0")/.." && pwd)"
ROUTES_FILE="$ROOT/scripts/warm_routes.txt"
BASE_URL="${1:-https://www.mymiwallet.com}"

if [[ ! -f "$ROUTES_FILE" ]]; then
  echo "Routes file not found: $ROUTES_FILE"
  exit 1
fi

echo "Warming routes for base URL: $BASE_URL"
failures=0

while IFS= read -r route; do
  [[ -z "$route" || "$route" =~ ^# ]] && continue
  url="${BASE_URL%/}/${route#/}"
  echo -n "-> $url ... "
  result=$(curl -s -o /dev/null -w "%{http_code} %{time_total}" "$url" || true)
  status=$(echo "$result" | awk '{print $1}')
  timing=$(echo "$result" | awk '{print $2}')
  echo "status=$status time=${timing}s"
  if [[ ! "$status" =~ ^(2[0-9]{2}|3[0-9]{2}|403)$ ]]; then
    failures=$((failures + 1))
  fi
done < "$ROUTES_FILE"

if [[ $failures -gt 0 ]]; then
  echo "Completed with $failures failures."
  exit 1
fi

echo "All routes warmed successfully."
