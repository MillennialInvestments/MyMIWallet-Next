#!/usr/bin/env bash
set -euo pipefail

ROOT="$(cd "$(dirname "$0")/.." && pwd)"
LOG_DIR="$ROOT/writable/logs"

status_ok=1

echo "=== MyMI Wallet Doctor ($(date -Iseconds)) ==="

if ! command -v git >/dev/null 2>&1; then
  echo "❌ git not available in PATH"
  status_ok=0
else
  branch="$(git -C "$ROOT" rev-parse --abbrev-ref HEAD 2>/dev/null || echo "unknown")"
  dirty="$(git -C "$ROOT" status --short || true)"
  echo "Git branch: ${branch}"
  if [[ -n "$dirty" ]]; then
    echo "❌ Working tree has uncommitted changes:"
    echo "$dirty"
    status_ok=0
  else
    echo "✅ Working tree clean"
  fi
fi

if ! command -v php >/dev/null 2>&1; then
  echo "❌ PHP not available"
  status_ok=0
else
  php -v | head -n 1
fi

if [[ -x "$ROOT/composer.phar" ]]; then
  echo "Composer: using bundled composer.phar"
elif command -v composer >/dev/null 2>&1; then
  echo "Composer: available in PATH"
else
  echo "❌ Composer not found (composer.phar or composer)."
  status_ok=0
fi

echo "Checking writable directories..."
for dir in "$ROOT/writable" "$ROOT/writable/cache" "$ROOT/writable/logs" "$ROOT/writable/session"; do
  if [[ -d "$dir" && -w "$dir" ]]; then
    echo "✅ $dir is writable"
  else
    echo "❌ $dir missing or not writable"
    status_ok=0
  fi
done

echo "Checking CodeIgniter bootstrap..."
if command -v php >/dev/null 2>&1; then
  if php "$ROOT/spark" --version >/dev/null 2>&1; then
    php "$ROOT/spark" --version
  else
    echo "❌ Unable to run 'php spark --version'"
    status_ok=0
  fi
fi

echo "Latest application log..."
latest_log=$(ls -1t "$LOG_DIR"/log-*.log 2>/dev/null | head -n 1 || true)
if [[ -n "$latest_log" ]]; then
  echo "Newest log file: $latest_log"
  echo "--- Last CRITICAL/ERROR entries (up to 50 lines) ---"
  grep -E "CRITICAL|ERROR" "$latest_log" | tail -n 50 || true
else
  echo "No log files found in $LOG_DIR"
fi

echo "Disk usage snapshot:"
df -h "$ROOT" | tail -n +1
du -sh "$ROOT/writable" 2>/dev/null || true

if [[ "$status_ok" -eq 1 ]]; then
  echo "✅ Doctor checks completed with no critical failures."
  exit 0
else
  echo "❌ Doctor detected issues. See output above."
  exit 1
fi
