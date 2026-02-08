#!/usr/bin/env bash
set -euo pipefail
BASE_DIR="$(cd "$(dirname "$0")/.." && pwd)"
RUNTIME_DIR="$BASE_DIR/runtime"
PID_FILE="$RUNTIME_DIR/chat.pid"
[ -f "$PID_FILE" ] || exit 0
PID="$(cat "$PID_FILE")"
kill -TERM "$PID" 2>/dev/null || true
for _ in {1..20}; do kill -0 "$PID" 2>/dev/null || break; sleep 0.2; done
kill -0 "$PID" 2>/dev/null && kill -KILL "$PID" 2>/dev/null || true
rm -f "$PID_FILE"
printf '{"status":"stopped","updated":"%s"}\n' "$(date -Iseconds)" > "$RUNTIME_DIR/chat.status.json"
