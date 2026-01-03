#!/usr/bin/env bash
set -euo pipefail

BASE_DIR="$(cd "$(dirname "$0")" && pwd)"
LOG_FILE="$BASE_DIR/logs/chat.log"
PID_FILE="$BASE_DIR/chat.pid"

mkdir -p "$BASE_DIR/logs"

export NVM_DIR="$HOME/.nvm"
if [ -s "$NVM_DIR/nvm.sh" ]; then
  # shellcheck disable=SC1090
  . "$NVM_DIR/nvm.sh"
fi

if command -v nvm >/dev/null 2>&1; then
  nvm use 22 >/dev/null
fi

if [ -f "$BASE_DIR/.env" ]; then
  # shellcheck disable=SC2046
  export $(grep -v '^#' "$BASE_DIR/.env" | xargs)
fi

if [ -f "$PID_FILE" ] && kill -0 "$(cat "$PID_FILE")" >/dev/null 2>&1; then
  echo "Chat server already running (PID $(cat "$PID_FILE"))"
  exit 0
fi

cd "$BASE_DIR"
nohup node server.js >> "$LOG_FILE" 2>&1 &
echo $! > "$PID_FILE"
echo "Chat server started with PID $(cat "$PID_FILE")"
