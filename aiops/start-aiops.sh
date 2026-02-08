#!/usr/bin/env bash
set -euo pipefail
cd "$(dirname "$0")"

mkdir -p logs runtime .n8n

export NVM_DIR="$HOME/.nvm"
if [ -s "$NVM_DIR/nvm.sh" ]; then
  . "$NVM_DIR/nvm.sh"
fi

NODE_BIN="$(command -v node || true)"
if [ -z "${NODE_BIN}" ]; then
  echo '{"component":"aiops","level":"error","message":"node not found"}'
  exit 1
fi

set -a
[ -f .env ] && source ./.env
set +a

./bin/n8n-start-safe.sh

BRIDGE_PID_FILE="runtime/bridge.pid"
if [ -f "$BRIDGE_PID_FILE" ] && kill -0 "$(cat "$BRIDGE_PID_FILE")" 2>/dev/null; then
  echo '{"component":"aiops","level":"info","message":"bridge already running"}'
else
  rm -f "$BRIDGE_PID_FILE"
  nohup "${NODE_BIN}" bridge-8500.js > logs/bridge.log 2>&1 &
  echo $! > "$BRIDGE_PID_FILE"
  echo '{"component":"aiops","level":"info","message":"bridge started"}'
fi

echo "PIDs: n8n=$(cat runtime/n8n.pid 2>/dev/null || echo '?') bridge=$(cat runtime/bridge.pid 2>/dev/null || echo '?')"
ss -ltnp | egrep ':5678|:8500' || true
