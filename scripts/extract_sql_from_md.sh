#!/usr/bin/env bash
set -euo pipefail

ROOTPATH="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
DOCS_PATH="${ROOTPATH}/docs/mysql"
OUTPUT_DIR="${ROOTPATH}/writable/aiops/artifacts/db-apply-docs"
OUTPUT_FILE="${OUTPUT_DIR}/compiled_adjustments.sql"

mkdir -p "${OUTPUT_DIR}"

if [[ ! -d "${DOCS_PATH}" ]]; then
  echo "No docs/mysql directory found. Nothing to compile."
  : > "${OUTPUT_FILE}"
  exit 0
fi

tmp_file="$(mktemp)"

find "${DOCS_PATH}" -type f -name "*.md" | sort | while read -r file; do
  awk '
    BEGIN { in_sql = 0 }
    /^```sql/ { in_sql = 1; next }
    /^```/ && in_sql == 1 { in_sql = 0; next }
    in_sql == 1 { print $0 }
  ' "${file}" >> "${tmp_file}"
  printf "\n" >> "${tmp_file}"
done

if [[ ! -s "${tmp_file}" ]]; then
  echo "-- No SQL blocks found in docs/mysql" > "${OUTPUT_FILE}"
  rm -f "${tmp_file}"
  exit 0
fi

{
  echo "-- Compiled SQL from docs/mysql"
  echo "-- Generated at $(date -u +"%Y-%m-%dT%H:%M:%SZ")"
  echo ""
  cat "${tmp_file}"
} > "${OUTPUT_FILE}"

rm -f "${tmp_file}"
echo "Compiled SQL written to ${OUTPUT_FILE}"
