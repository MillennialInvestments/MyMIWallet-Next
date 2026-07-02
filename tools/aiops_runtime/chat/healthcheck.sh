#!/usr/bin/env bash
set -euo pipefail

PORT="${PORT:-8300}"
HOST="${HOST_BIND:-127.0.0.1}"
URL="http://${HOST}:${PORT}/health"

if curl -fsS --max-time 5 "${URL}" >/dev/null; then
  echo "Chat service healthy on ${URL}"
  exit 0
fi

echo "Chat service health check failed on ${HOST}:${PORT}" >&2
exit 1
