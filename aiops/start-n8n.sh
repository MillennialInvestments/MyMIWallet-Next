#!/usr/bin/env bash
set -euo pipefail
cd "$(dirname "$0")"

export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"

mkdir -p logs .n8n

set -a
source ./.env
set +a

# start n8n
if [ -f n8n.pid ] && kill -0 "$(cat n8n.pid)" 2>/dev/null; then
  echo "n8n already running (PID $(cat n8n.pid))"
else
  nohup ./node_modules/.bin/n8n start > logs/n8n.log 2>&1 &
  echo $! > n8n.pid
  sleep 2
fi

# verify n8n is actually listening on 5678
if ! ss -ltn 2>/dev/null | grep -q ':5678'; then
  echo "ERROR: n8n did not bind to 5678. Check logs/n8n.log"
  tail -n 40 logs/n8n.log || true
  exit 1
fi

# start bridge (8500 -> 5678)
if [ -f bridge.pid ] && kill -0 "$(cat bridge.pid)" 2>/dev/null; then
  echo "bridge already running (PID $(cat bridge.pid))"
else
  nohup node ./bridge-8500.js > logs/bridge.log 2>&1 &
  echo $! > bridge.pid
  sleep 1
fi

echo "PIDs: n8n=$(cat n8n.pid) bridge=$(cat bridge.pid)"
ss -ltnp 2>/dev/null | egrep ':8500|:5678|:5679' || true
