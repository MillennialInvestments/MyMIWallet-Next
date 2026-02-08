#!/usr/bin/env bash
set -euo pipefail
cd "$(dirname "$0")"

export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"

if [ -f .env ]; then
  set -a
  source ./.env
  set +a
fi

./bin/n8n-start-safe.sh
