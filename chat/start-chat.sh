#!/usr/bin/env bash
set -euo pipefail
cd "$(dirname "$0")"

export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"

mkdir -p logs runtime

if [ -f .env ]; then
  set -a
  source ./.env
  set +a
fi

PID_FILE="runtime/chat.pid"
if [ -f "$PID_FILE" ] && kill -0 "$(cat "$PID_FILE")" 2>/dev/null; then
  echo "Chat already running (PID $(cat "$PID_FILE"))"
  exit 0
fi

rm -f "$PID_FILE"
nohup node server.js > logs/chat.log 2>&1 &
echo $! > "$PID_FILE"
echo "Chat server started with PID $(cat "$PID_FILE")"
