#!/usr/bin/env bash
set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
ENV_FILE="${SCRIPT_DIR}/.env"
LOG_FILE="${SCRIPT_DIR}/chat.log"
PID_FILE="${SCRIPT_DIR}/chat.pid"

if [[ -f "${ENV_FILE}" ]]; then
  set -a
  # shellcheck disable=SC1090
  source "${ENV_FILE}"
  set +a
fi

PORT="${PORT:-8300}"

if [[ -f "${PID_FILE}" ]] && kill -0 "$(cat "${PID_FILE}")" 2>/dev/null; then
  echo "Chat service already running with PID $(cat "${PID_FILE}")"
  exit 0
fi

cd "${SCRIPT_DIR}"
nohup node server.js >"${LOG_FILE}" 2>&1 &
echo $! > "${PID_FILE}"
echo "Chat service started on port ${PORT} (log: ${LOG_FILE})"
