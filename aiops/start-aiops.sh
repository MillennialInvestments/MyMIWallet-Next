#!/usr/bin/env bash
set -euo pipefail
cd "$(dirname "$0")"

mkdir -p logs .n8n

# Load NVM reliably even for non-interactive shells (cron)
export NVM_DIR="$HOME/.nvm"
if [ -s "$NVM_DIR/nvm.sh" ]; then
  . "$NVM_DIR/nvm.sh"
fi

# Use a known node binary (prevents random node v12 issues)
NODE_BIN="$(command -v node || true)"
if [ -z "${NODE_BIN}" ]; then
  echo "ERROR: node not found"
  exit 1
fi

# Load env file
set -a
[ -f .env ] && source ./.env
set +a

# Start n8n (expected to bind 5678)
if [ -f n8n.pid ] && kill -0 "$(cat n8n.pid)" 2>/dev/null; then
  echo "n8n already running (PID $(cat n8n.pid))"
else
  nohup ./node_modules/.bin/n8n start > logs/n8n.log 2>&1 &
  echo $! > n8n.pid
  sleep 2
fi

# Start bridge (bind 8500)
if [ -f bridge.pid ] && kill -0 "$(cat bridge.pid)" 2>/dev/null; then
  echo "bridge already running (PID $(cat bridge.pid))"
else
  nohup "${NODE_BIN}" bridge-8500.js > logs/bridge.log 2>&1 &
  echo $! > bridge.pid
  sleep 1
fi

echo "PIDs: n8n=$(cat n8n.pid 2>/dev/null || echo '?') bridge=$(cat bridge.pid 2>/dev/null || echo '?')"

echo "Listening ports:"
ss -ltnp | egrep ':5678|:8500' || true
