#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/../.." && pwd)"
cd "$ROOT_DIR"

command -v php >/dev/null 2>&1 || { echo "php not available"; exit 1; }

echo "[smoke] systemctl present?";
if command -v systemctl >/dev/null 2>&1; then
  echo "systemctl=present"
else
  echo "systemctl=missing"
fi

echo "[smoke] health:services"
php spark health:services

echo "[smoke] fix:503 --dry-run (no deletions expected)"
mkdir -p writable/cache storage
DRY_CACHE_FILE="writable/cache/.smoke-503"
DRY_OUTSIDE_FILE="storage/.smoke-503"

echo "cache" > "$DRY_CACHE_FILE"
echo "outside" > "$DRY_OUTSIDE_FILE"

php spark fix:503 --dry-run

if [[ ! -f "$DRY_CACHE_FILE" ]]; then
  echo "dry-run removed writable cache file unexpectedly" >&2
  exit 1
fi

if [[ ! -f "$DRY_OUTSIDE_FILE" ]]; then
  echo "dry-run removed outside file unexpectedly" >&2
  exit 1
fi

echo "[smoke] fix:503 (safe cleanup in writable only)"
php spark fix:503

if [[ -f "$DRY_CACHE_FILE" ]]; then
  echo "cache file was not removed by fix:503" >&2
  exit 1
fi

if [[ ! -f "$DRY_OUTSIDE_FILE" ]]; then
  echo "outside file was removed by fix:503" >&2
  exit 1
fi

echo "smoke_fix_503 OK"
