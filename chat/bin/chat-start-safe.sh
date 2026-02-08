#!/usr/bin/env bash
set -euo pipefail
BASE_DIR="$(cd "$(dirname "$0")/.." && pwd)"
RUNTIME_DIR="$BASE_DIR/runtime"
PID_FILE="$RUNTIME_DIR/chat.pid"
LOCK_FILE="$RUNTIME_DIR/chat.lock"
LOG_FILE="$RUNTIME_DIR/chat.log"
PORT="${PORT:-8300}"
mkdir -p "$RUNTIME_DIR"
if [ -f "$PID_FILE" ] && kill -0 "$(cat "$PID_FILE")" 2>/dev/null; then echo "chat already running"; exit 0; fi
if [ -f "$LOCK_FILE" ] && [ $(( $(date +%s) - $(stat -c %Y "$LOCK_FILE" 2>/dev/null || echo 0) )) -lt 120 ]; then echo "chat lock active"; exit 0; fi
echo $$ > "$LOCK_FILE"
trap 'rm -f "$LOCK_FILE"' EXIT
if command -v ss >/dev/null 2>&1 && ss -ltn | awk '{print $4}' | grep -E "(^|:)${PORT}$" -q; then echo "port ${PORT} busy"; exit 0; fi
cd "$BASE_DIR"
nohup node server.js >> "$LOG_FILE" 2>&1 &
echo $! > "$PID_FILE"
printf '{"status":"running","pid":%s,"port":%s,"updated":"%s"}\n' "$(cat "$PID_FILE")" "$PORT" "$(date -Iseconds)" > "$RUNTIME_DIR/chat.status.json"
