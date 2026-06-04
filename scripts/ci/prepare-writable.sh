#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/../.." && pwd)"
cd "$ROOT_DIR"

echo "Preparing CodeIgniter writable directories..."

directories=(
  "writable/cache"
  "writable/debugbar"
  "writable/logs"
  "writable/session"
  "writable/uploads"
)

for directory in "${directories[@]}"; do
  mkdir -p "$directory"
  chmod 0775 "$directory" 2>/dev/null || true
  echo "Prepared: $directory"
done

if [ ! -d "writable/cache" ]; then
  echo "FAIL: writable/cache was not created." >&2
  exit 1
fi

echo "CodeIgniter writable directories are ready."
