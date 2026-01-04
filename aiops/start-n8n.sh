#!/usr/bin/env bash
set -euo pipefail
cd "$(dirname "$0")"

export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"

mkdir -p logs .n8n

# Load env
if [ -f .env ]; then
  set -a
  source ./.env
  set +a
fi

# stop old
[ -f n8n.pid ] && kill "$(cat n8n.pid)" 2>/dev/null || true
rm -f n8n.pid

nohup ./node_modules/.bin/n8n start > logs/n8n.log 2>&1 &
echo $! > n8n.pid

# wait briefly for bind
for i in {1..30}; do
  if ss -ltn 2>/dev/null | grep -q ':8500'; then
    break
  fi
  sleep 0.3
done

echo "Started n8n PID=$(cat n8n.pid)"
ss -ltnp | egrep ':8500|:5679' || true
