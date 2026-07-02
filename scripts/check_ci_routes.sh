#!/usr/bin/env bash
set -euo pipefail

BASE="${1:-https://www.mymiwallet.com}"
ACCEPTABLE_REGEX="^(200|301|302|403)$"

check_route() {
  local label="$1"
  local path="$2"
  local expected_msg="$3"
  local url="${BASE%/}/${path#/}"

  status=$(curl -sk -o /dev/null -w "%{http_code}" "$url" || true)
  echo "${label}: $status ($url)"
  if [[ ! "$status" =~ $ACCEPTABLE_REGEX ]]; then
    echo "❌ Unexpected status for $label. Expected $expected_msg." >&2
    exit 1
  fi
  echo "$status"
}

clean_status=$(check_route "Clean URL (/Dashboard)" "/Dashboard" "200/301/302/403")
index_status=$(check_route "Index fallback (/index.php/Dashboard)" "/index.php/Dashboard" "200/301/302/403")

if [[ "$clean_status" =~ ^(404|500)$ ]] && [[ "$index_status" =~ $ACCEPTABLE_REGEX ]]; then
  echo "❌ Clean URL failing while index.php works. Review NGINX try_files." >&2
  exit 1
fi

echo "✅ CI routes look healthy against $BASE."
