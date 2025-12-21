#!/usr/bin/env bash
set -euo pipefail

BASE_URL=${BASE_URL:-"https://www.mymiwallet.com"}

echo "Smoke testing pretty URLs against ${BASE_URL}"

urls=(
  "/"
  "/Dashboard"
  "/index.php/Dashboard"
)

for path in "${urls[@]}"; do
  # Capture status and redirect target (if any) without following redirects
  code=$(curl -k -o /dev/null -s -w "%{http_code}" "${BASE_URL}${path}")
  location=$(curl -k -s -I -o /dev/null -w '%{redirect_url}' "${BASE_URL}${path}")

  if [[ -n "${location}" ]]; then
    printf "%-25s => %s -> %s\n" "${path}" "${code}" "${location}"
  else
    printf "%-25s => %s\n" "${path}" "${code}"
  fi
done

cat <<'EOF'
Expected:
- /Dashboard should return 200 when routing is healthy.
- /index.php/Dashboard should return 301 (preferred) or 200 (legacy still works).
EOF