#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR=$(cd "$(dirname "${BASH_SOURCE[0]}")/../.." && pwd)

FILES=(
  "$ROOT_DIR/chat/.env.staging.example"
  "$ROOT_DIR/chat/.env.production.example"
)

REQUIRED_KEYS=(
  "PORT"
  "BIND_HOST"
  "APP_BASE_URL"
  "CHAT_BASE_PATH"
  "BASIC_AUTH_ACTIVE"
  "BASIC_AUTH_USER"
  "BASIC_AUTH_PASS"
  "SSO_ENABLED"
  "SSO_JWT_ISSUER"
  "SSO_JWT_AUDIENCE"
  "SSO_JWT_SECRET"
  "ALERT_EMAIL_TO"
  "MYMI_USAGE_WEBHOOK_URL"
  "MYMI_USAGE_WEBHOOK_SECRET"
  "OPENAI_API_KEY"
  "OPENAI_MODEL"
  "OLLAMA_BASE_URL"
  "CI4_BASE_URL"
  "CI4_ME_ENDPOINT"
  "CI4_TOOL_ENDPOINT"
  "CI4_TIMEOUT_MS"
)

for file in "${FILES[@]}"; do
  if [[ ! -f "$file" ]]; then
    echo "Missing env template: $file" >&2
    exit 1
  fi

  for key in "${REQUIRED_KEYS[@]}"; do
    if ! grep -Eq "^${key}=" "$file"; then
      echo "Missing key $key in $file" >&2
      exit 1
    fi
  done

done

echo "Chat env templates validated." 
