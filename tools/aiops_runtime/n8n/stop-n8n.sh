#!/usr/bin/env bash
set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PID_FILE="${SCRIPT_DIR}/n8n.pid"

if [[ -f "${PID_FILE}" ]]; then
  PID="$(cat "${PID_FILE}")"
  if kill -0 "${PID}" 2>/dev/null; then
    kill "${PID}"
    rm -f "${PID_FILE}"
    echo "Stopped n8n (PID ${PID})."
    exit 0
  else
    echo "PID file found but process ${PID} not running; cleaning up."
    rm -f "${PID_FILE}"
  fi
fi

pkill -f "n8n start" >/dev/null 2>&1 && echo "Stopped n8n via pkill."
