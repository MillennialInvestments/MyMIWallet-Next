#!/usr/bin/env bash
set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
ENV_FILE="${SCRIPT_DIR}/.env"
LOG_FILE="${SCRIPT_DIR}/n8n.log"
PID_FILE="${SCRIPT_DIR}/n8n.pid"

if [[ -f "${ENV_FILE}" ]]; then
  set -a
  # shellcheck disable=SC1090
  source "${ENV_FILE}"
  set +a
fi

N8N_PORT="${N8N_PORT:-8500}"
N8N_HOST_BIND="${N8N_HOST_BIND:-0.0.0.0}"

if [[ -f "${PID_FILE}" ]] && kill -0 "$(cat "${PID_FILE}")" 2>/dev/null; then
  echo "n8n already running with PID $(cat "${PID_FILE}")"
  exit 0
fi

nohup n8n start --port "${N8N_PORT}" --host "${N8N_HOST_BIND}" >"${LOG_FILE}" 2>&1 &
echo $! > "${PID_FILE}"
echo "n8n started on port ${N8N_PORT} (log: ${LOG_FILE})"
