#!/usr/bin/env bash
set -euo pipefail

PORT="${N8N_PORT:-8500}"
HOST="${N8N_HOST_BIND:-127.0.0.1}"
URL="http://${HOST}:${PORT}/healthz"

if curl -fsS --max-time 5 "${URL}" >/dev/null; then
  echo "n8n healthy on ${URL}"
  exit 0
fi

# Fallback to root ping if /healthz is not available
if curl -fsS --max-time 5 "http://${HOST}:${PORT}/" >/dev/null; then
  echo "n8n responded on ${HOST}:${PORT}"
  exit 0
fi

echo "n8n health check failed on ${HOST}:${PORT}" >&2
exit 1
