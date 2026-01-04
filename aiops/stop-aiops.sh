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
      # give it a moment to exit cleanly
      sleep 2
      kill -0 "$pid" 2>/dev/null && kill -KILL "$pid" 2>/dev/null || true
    fi
    rm -f "$pidfile"
  fi
}

stop_pidfile bridge.pid
stop_pidfile n8n.pid

echo "Stopped aiops (n8n + bridge)."
