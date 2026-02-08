#!/usr/bin/env bash
set -euo pipefail

BASE_DIR="$(cd "$(dirname "$0")/.." && pwd)"
RUNTIME_DIR="$BASE_DIR/runtime"
PID_FILE="$RUNTIME_DIR/chat.pid"
LOCK_FILE="$RUNTIME_DIR/chat.lock"
LOG_FILE="$RUNTIME_DIR/chat.log"
STATUS_FILE="$RUNTIME_DIR/chat.status.json"
PORT="${PORT:-8300}"

mkdir -p "$RUNTIME_DIR"

now_ts=$(date +%s)

# 1. If PID exists and process is alive → already running
if [[ -f "$PID_FILE" ]]; then
  PID="$(cat "$PID_FILE" 2>/dev/null || true)"
  if [[ -n "${PID}" ]] && kill -0 "$PID" 2>/dev/null; then
    echo "chat already running (pid=$PID)"
    exit 0
  fi
fi

# 2. If lock exists, validate it (lock is advisory, not authoritative)
if [[ -f "$LOCK_FILE" ]]; then
  lock_ts=$(stat -c %Y "$LOCK_FILE" 2>/dev/null || echo 0)
  age=$(( now_ts - lock_ts ))

  # If port is listening, assume another valid instance
  if command -v ss >/dev/null 2>&1 && ss -ltn | awk '{print $4}' | grep -E "(^|:)${PORT}$" -q; then
    echo "chat already listening on port ${PORT}"
    exit 0
  fi

  # Otherwise lock is stale
  echo "stale chat lock detected (age=${age}s), cleaning up"
  rm -f "$LOCK_FILE" "$PID_FILE"
fi

# 3. Create fresh lock (timestamp only)
date -Iseconds > "$LOCK_FILE"

# Ensure lock is removed if THIS script exits early
cleanup() {
  rm -f "$LOCK_FILE"
}
trap cleanup EXIT

# 4. Final port check before launch
if command -v ss >/dev/null 2>&1 && ss -ltn | awk '{print $4}' | grep -E "(^|:)${PORT}$" -q; then
  echo "port ${PORT} busy, refusing to start chat"
  exit 0
fi

# 5. Start chat
cd "$BASE_DIR"

nohup node server.js >> "$LOG_FILE" 2>&1 &
CHAT_PID=$!

echo "$CHAT_PID" > "$PID_FILE"

# 6. Write status
printf '{"status":"running","pid":%s,"port":%s,"updated":"%s"}\n' \
  "$CHAT_PID" "$PORT" "$(date -Iseconds)" > "$STATUS_FILE"

echo "chat started (pid=$CHAT_PID, port=$PORT)"
