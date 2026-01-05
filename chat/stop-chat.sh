#!/usr/bin/env bash
set -euo pipefail

BASE_DIR="$(cd "$(dirname "$0")" && pwd)"
PID_FILE="$BASE_DIR/chat.pid"
PORT="${PORT:-8500}"

# Load env to pick up PORT overrides
if [ -f "$BASE_DIR/.env" ]; then
  set -a
  # shellcheck disable=SC1090
  source "$BASE_DIR/.env"
  set +a
  PORT="${PORT:-8500}"
fi

kill_port_listeners() {
  local port="$1"
  local user
  user="$(id -un)"

  if ! command -v lsof >/dev/null 2>&1; then
    echo "lsof not found; skipping port cleanup for $port"
    return
  fi

  mapfile -t pids < <(lsof -nP -iTCP:"$port" -sTCP:LISTEN -t -a -u "$user" 2>/dev/null | sort -u)
  if [ ${#pids[@]} -eq 0 ]; then
    echo "No node listeners on port $port for user $user"
    return
  fi

  for pid in "${pids[@]}"; do
    if [ "$(ps -o comm= -p "$pid" 2>/dev/null)" = "node" ]; then
      kill "$pid"
      echo "Stopped node listener on port $port (PID $pid)"
    fi
  done
}

cleanup_port=false

if [ ! -f "$PID_FILE" ]; then
  echo "No PID file found at $PID_FILE"
  cleanup_port=true
else
  PID=$(cat "$PID_FILE")
  if kill -0 "$PID" >/dev/null 2>&1; then
    kill "$PID"
    echo "Stopped chat server (PID $PID)"
  else
    echo "Process $PID not running"
    cleanup_port=true
  fi
fi
rm -f "$PID_FILE"

if [ "$cleanup_port" = true ]; then
  kill_port_listeners "$PORT"
fi
