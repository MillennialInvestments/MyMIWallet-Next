#!/usr/bin/env bash
set -euo pipefail
cd "$(dirname "$0")"

stop_pidfile () {
  local pidfile="$1"
  if [ -f "$pidfile" ]; then
    local pid
    pid="$(cat "$pidfile" 2>/dev/null || true)"
    if [ -n "$pid" ] && kill -0 "$pid" 2>/dev/null; then
      kill -TERM "$pid" 2>/dev/null || true
      sleep 1
      kill -0 "$pid" 2>/dev/null && kill -KILL "$pid" 2>/dev/null || true
    fi
    rm -f "$pidfile"
  fi
}

stop_pidfile runtime/bridge.pid
./bin/n8n-stop-safe.sh

echo "Stopped aiops (n8n + bridge)."
