#!/usr/bin/env bash
set -euo pipefail

BASE_DIR="$(cd "$(dirname "$0")/.." && pwd)"
RUNTIME_DIR="$BASE_DIR/runtime"
WRITABLE_LOG_DIR="$BASE_DIR/../writable/logs/chat"
PID_FILE="$RUNTIME_DIR/chat.pid"
LOCK_FILE="$RUNTIME_DIR/chat.lock"
LOG_FILE="$WRITABLE_LOG_DIR/chat.log"

mkdir -p "$WRITABLE_LOG_DIR"

if [[ ! -f "$PID_FILE" ]]; then
  exit 0
fi

PID="$(cat "$PID_FILE")"
kill -TERM "$PID" 2>/dev/null || true
for _ in {1..20}; do
  kill -0 "$PID" 2>/dev/null || break
  sleep 0.2
done
kill -0 "$PID" 2>/dev/null && kill -KILL "$PID" 2>/dev/null || true

rm -f "$PID_FILE" "$LOCK_FILE"
printf '[%s] chat-stop-safe stopped pid=%s\n' "$(date -Iseconds)" "$PID" >> "$LOG_FILE"
printf '{"status":"stopped","updated":"%s"}\n' "$(date -Iseconds)" > "$RUNTIME_DIR/chat.status.json"
