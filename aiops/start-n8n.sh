#!/usr/bin/env bash
set -euo pipefail
cd "$(dirname "$0")"

export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"

set -a
[ -f .env.aiops ] && source ./.env.aiops
[ -f .env ] && source ./.env
set +a

./bin/n8n-start-safe.sh
