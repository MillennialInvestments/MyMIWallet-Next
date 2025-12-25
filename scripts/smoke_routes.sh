#!/usr/bin/env bash
set -euo pipefail

BASE="${1:-https://www.mymiwallet.com}"

check_route() {
  local label="$1"
  local path="$2"
  local acceptable_regex="$3"

  url="${BASE%/}/${path#/}"
  status=$(curl -s -o /dev/null -w "%{http_code}" "$url" || true)
  if [[ "$status" =~ $acceptable_regex ]]; then
    echo "✅ $label ($url) -> $status"
  else
    echo "❌ $label failed ($url) -> $status"
    exit 1
  fi
}

echo "Running smoke checks against $BASE"
check_route "Home page" "/" "^(200|301|302)$"
check_route "Health check" "/healthz" "^200$"
check_route "Protected dashboard route" "/index.php/Dashboard/Transaction-Modal/1/test" "^(200|301|302|403)$"
check_route "How It Works Registering An Account" "/How-It-Works/Registering-An-Account" "^(200|301|302)$"
check_route "Knowledgebase Getting Started" "/Knowledgebase/Getting-Started" "^(200|301|302)$"
check_route "Privacy Policy" "/Privacy-Policy" "^(200|301|302)$"
check_route "Terms of Service" "/Terms-Of-Service" "^(200|301|302)$"

echo "✅ Smoke checks passed."
