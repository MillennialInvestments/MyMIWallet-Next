#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "$0")/.." && pwd)"
cd "$ROOT_DIR"

RED=$'\e[31m'; GREEN=$'\e[32m'; YELLOW=$'\e[33m'; BOLD=$'\e[1m'; NC=$'\e[0m'

REPORT="docs/ops/php-lint-report.md"
mkdir -p "$(dirname "$REPORT")"
: > "$REPORT"
echo "# PHP Lint Report" >> "$REPORT"
echo "" >> "$REPORT"
echo "_Generated: $(date -u +"%Y-%m-%d %H:%M:%S") UTC_" >> "$REPORT"
echo "" >> "$REPORT"

echo "${BOLD}Scanning for PHP syntax errors…${NC}"

# Find PHP files (exclude vendor/public/node_modules/.git)
mapfile -t FILES < <(find app -type f -name "*.php" \
  -not -path "*/vendor/*" \
  -not -path "*/public/*" \
  -not -path "*/node_modules/*" \
  -not -path "*/.git/*" \
  | sort)

FAIL=0
for f in "${FILES[@]}"; do
  OUT=$(php -d display_errors=1 -l "$f" 2>&1) || true
  if [[ "$OUT" =~ "Errors parsing" || "$OUT" =~ "Parse error" || "$OUT" =~ "Fatal error" ]]; then
    ((FAIL++))
    echo "${RED}✖ ${f}${NC}"
    # Append GitHub-style annotation line so Actions can also parse it
    # Format: ::error file=path,line=LINE::message
    LINE="$(grep -oE 'on line [0-9]+' <<<"$OUT" | awk '{print $3}' || echo 1)"
    MSG="$(sed 's/::/%3A%3A/g; s/\r//g; s/\n/%0A/g' <<<"$OUT")"
    echo "::error file=${f},line=${LINE}::${MSG}" >> "$REPORT"
    {
      echo "## ❌ $f"
      echo ''
      echo '```'
      echo "$OUT"
      echo '```'
      echo ''
    } >> "$REPORT"
  else
    echo "${GREEN}✔ ${f}${NC}"
  fi
done

if (( FAIL > 0 )); then
  echo ""
  echo "${RED}${BOLD}${FAIL} file(s) have PHP syntax errors.${NC}"
  echo "See ${YELLOW}${REPORT}${NC}"
  exit 1
else
  echo ""
  echo "${GREEN}${BOLD}All PHP files passed syntax check.${NC}"
fi
