#!/usr/bin/env bash
set -euo pipefail

BASE_DIR="$(cd "$(dirname "$0")" && pwd)"
PID_FILE="$BASE_DIR/runtime/chat.pid"
PORT="${PORT:-8300}"

if [ -f "$BASE_DIR/.env" ]; then
  set -a
  source "$BASE_DIR/.env"
  set +a
  PORT="${PORT:-8300}"
fi

if [ ! -f "$PID_FILE" ]; then
  echo "No PID file found at $PID_FILE"
  exit 0
fi

PID=$(cat "$PID_FILE")
if kill -0 "$PID" >/dev/null 2>&1; then
  kill "$PID"
  echo "Stopped chat server (PID $PID)"
else
  echo "Process $PID not running"
fi
rm -f "$PID_FILE"
