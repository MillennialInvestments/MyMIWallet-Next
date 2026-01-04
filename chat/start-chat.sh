#!/usr/bin/env bash
set -euo pipefail
cd "$(dirname "$0")"

export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"

mkdir -p logs

# Load env
if [ -f .env ]; then
  set -a
  source ./.env
  set +a
fi

# stop if already running
if [ -f chat.pid ] && kill -0 "$(cat chat.pid)" 2>/dev/null; then
  echo "Chat already running (PID $(cat chat.pid))"
  exit 0
fi

nohup node server.js > logs/chat.log 2>&1 &
echo $! > chat.pid
echo "Chat server started with PID $(cat chat.pid)"
