#!/usr/bin/env bash
set -euo pipefail

ROOT="$(cd "$(dirname "$0")/.." && pwd)"
LOG_DIR="$ROOT/writable/logs"
DATE_STAMP="$(date +%F)"
LOG_FILE="$LOG_DIR/deploy-${DATE_STAMP}.log"
COMPOSER_FLAGS=(--no-interaction --prefer-dist)

if [[ "${1:-}" == "--dev" ]]; then
  echo "Composer: including --dev dependencies"
else
  COMPOSER_FLAGS+=(--no-dev)
fi

mkdir -p "$LOG_DIR"
touch "$LOG_FILE"

exec > >(tee -a "$LOG_FILE") 2>&1

echo "=== Deploy Safe $(date -Iseconds) ==="
echo "Working directory: $ROOT"

if ! command -v git >/dev/null 2>&1; then
  echo "git is required but not installed."
  exit 1
fi

if [[ -n "$(git -C "$ROOT" status --porcelain)" ]]; then
  echo "Working tree is dirty. Commit or stash changes before deploying."
  exit 1
fi

current_branch="$(git -C "$ROOT" rev-parse --abbrev-ref HEAD)"
echo "Branch: $current_branch"

echo "--- Fetching latest changes ---"
git -C "$ROOT" fetch --all --prune
echo "--- Fast-forward pull ---"
git -C "$ROOT" pull --ff-only

echo "--- Composer install ---"
composer_cmd="composer"
if [[ -x "$ROOT/composer.phar" ]]; then
  composer_cmd="$ROOT/composer.phar"
elif ! command -v composer >/dev/null 2>&1; then
  echo "composer not found (composer.phar or composer)."
  exit 1
fi

"$composer_cmd" install "${COMPOSER_FLAGS[@]}"

echo "--- Clearing CI4 cache ---"
if php "$ROOT/spark" cache:clear >/dev/null 2>&1; then
  php "$ROOT/spark" cache:clear
else
  echo "spark cache:clear unavailable, removing writable/cache contents..."
  if [[ -d "$ROOT/writable/cache" ]]; then
    find "$ROOT/writable/cache" -mindepth 1 -maxdepth 1 -print -exec rm -rf {} +
  fi
fi

echo "--- Resetting opcache if available ---"
if ! php -r 'if (function_exists("opcache_reset")) { $ok = @opcache_reset(); if (!$ok) { fwrite(STDERR, "opcache_reset() failed\n"); exit(1);} echo "opcache_reset() executed\n"; } else { echo "opcache_reset() not available\n"; }' ; then
  echo "Warning: opcache_reset could not be executed; continuing."
fi

echo "--- Deploy complete ---"
echo "Log saved to $LOG_FILE"
