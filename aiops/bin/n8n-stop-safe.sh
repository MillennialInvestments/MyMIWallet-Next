#!/usr/bin/env bash
set -euo pipefail

BASE_DIR="$(cd "$(dirname "$0")/.." && pwd)"
RUNTIME_DIR="$BASE_DIR/runtime"
PID_FILE="$RUNTIME_DIR/n8n.pid"

log() {
  printf '{"ts":"%s","component":"n8n-launcher","level":"%s","message":"%s"}\n' "$(date -u +%Y-%m-%dT%H:%M:%SZ)" "$1" "$2"
}

if [ ! -f "$PID_FILE" ]; then
  log info "n8n pid file not found"
  exit 0
fi

PID="$(cat "$PID_FILE" 2>/dev/null || true)"
if [ -z "$PID" ]; then
  rm -f "$PID_FILE"
  log warn "removed empty pid file"
  exit 0
fi

if ! kill -0 "$PID" 2>/dev/null; then
  rm -f "$PID_FILE"
  log warn "removed stale pid=$PID"
  exit 0
fi

kill -TERM "$PID" 2>/dev/null || true
for _ in {1..20}; do
  if ! kill -0 "$PID" 2>/dev/null; then
    rm -f "$PID_FILE"
    log info "stopped n8n pid=$PID"
    exit 0
  fi
  sleep 0.2
done

kill -KILL "$PID" 2>/dev/null || true
rm -f "$PID_FILE"
log warn "force killed n8n pid=$PID"
