#!/usr/bin/env bash
set -euo pipefail

BASE_DIR="$(cd "$(dirname "$0")/.." && pwd)"
RUNTIME_DIR="$BASE_DIR/runtime"
WRITABLE_LOG_DIR="$BASE_DIR/../writable/logs/chat"
PID_FILE="$RUNTIME_DIR/chat.pid"
LOCK_FILE="$RUNTIME_DIR/chat.lock"
LOG_FILE="$WRITABLE_LOG_DIR/chat.log"
ERROR_LOG_FILE="$WRITABLE_LOG_DIR/chat-errors.log"
STATUS_FILE="$RUNTIME_DIR/chat.status.json"
ENV_FILE="$BASE_DIR/.env"

mkdir -p "$RUNTIME_DIR" "$WRITABLE_LOG_DIR"

if [[ -f "$ENV_FILE" ]]; then
  set -a
  # shellcheck disable=SC1090
  source "$ENV_FILE"
  set +a
fi

PORT="${PORT:-8300}"
export PORT

echo "[chat-start-safe] resolved PORT=${PORT}"

if [[ "$PORT" == "8500" ]]; then
  msg="[$(date -Iseconds)] FATAL: chat startup blocked because PORT=8500 is reserved for bridge workflows"
  echo "$msg" | tee -a "$ERROR_LOG_FILE"
  exit 64
fi

now_ts=$(date +%s)

if [[ -f "$PID_FILE" ]]; then
  PID="$(cat "$PID_FILE" 2>/dev/null || true)"
  if [[ -n "${PID}" ]] && kill -0 "$PID" 2>/dev/null; then
    echo "chat already running (pid=$PID)"
    exit 0
  fi
fi

if [[ -f "$LOCK_FILE" ]]; then
  lock_ts=$(stat -c %Y "$LOCK_FILE" 2>/dev/null || echo 0)
  age=$(( now_ts - lock_ts ))

  if command -v ss >/dev/null 2>&1 && ss -ltn | awk '{print $4}' | grep -E "(^|:)${PORT}$" -q; then
    echo "chat already listening on port ${PORT}"
    exit 0
  fi

  echo "stale chat lock detected (age=${age}s), cleaning up"
  rm -f "$LOCK_FILE" "$PID_FILE"
fi

date -Iseconds > "$LOCK_FILE"
cleanup() {
  rm -f "$LOCK_FILE"
}
trap cleanup EXIT

if command -v ss >/dev/null 2>&1 && ss -ltn | awk '{print $4}' | grep -E "(^|:)${PORT}$" -q; then
  echo "port ${PORT} busy, refusing to start chat"
  exit 0
fi

cd "$BASE_DIR"
nohup node server.js >> "$ERROR_LOG_FILE" 2>&1 &
CHAT_PID=$!

echo "$CHAT_PID" > "$PID_FILE"
printf '[%s] chat-start-safe launched pid=%s port=%s\n' "$(date -Iseconds)" "$CHAT_PID" "$PORT" >> "$LOG_FILE"
printf '{"status":"running","pid":%s,"port":%s,"updated":"%s"}\n' \
  "$CHAT_PID" "$PORT" "$(date -Iseconds)" > "$STATUS_FILE"

echo "chat started (pid=$CHAT_PID, port=$PORT)"
