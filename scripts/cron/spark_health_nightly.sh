#!/usr/bin/env bash
set -euo pipefail

ROOT="/home/mymiteam/mymiwallet/site/current"
cd "$ROOT"

php spark spark:doctor || true

if php tools/spark_scan_commands.php; then
  exit 0
fi

php tools/spark_fix.php || true

if ! php tools/spark_scan_commands.php; then
  if [[ -n "${GITHUB_TOKEN:-}" && -n "${GITHUB_REPO:-}" ]]; then
    php tools/github_open_issue.php \
      "Spark Doctor failing on $(hostname)" \
      "$(head -n 200 writable/triage/spark-fix-report.md 2>/dev/null || echo 'No report')"
  fi
  exit 1
fi
