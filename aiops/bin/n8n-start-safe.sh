#!/usr/bin/env bash
set -euo pipefail

BASE_DIR="$(cd "$(dirname "$0")/.." && pwd)"
RUNTIME_DIR="$BASE_DIR/runtime"
LOG_DIR="$BASE_DIR/logs"
PID_FILE="$RUNTIME_DIR/n8n.pid"
LOCK_DIR="$RUNTIME_DIR/n8n.start.lock"
N8N_PORT="${N8N_PORT:-5678}"
BRIDGE_PORT="${BRIDGE_PORT:-8500}"

mkdir -p "$RUNTIME_DIR" "$LOG_DIR" "$BASE_DIR/.n8n"

log() {
  printf '{"ts":"%s","component":"n8n-launcher","level":"%s","message":"%s"}\n' "$(date -u +%Y-%m-%dT%H:%M:%SZ)" "$1" "$2"
}

is_port_listening() {
  local port="$1"
  if command -v ss >/dev/null 2>&1; then
    ss -ltn 2>/dev/null | awk '{print $4}' | grep -E "(^|:)${port}$" -q && return 0
  fi
  if command -v lsof >/dev/null 2>&1; then
    lsof -nP -iTCP:"$port" -sTCP:LISTEN >/dev/null 2>&1 && return 0
  fi
  python - "$port" <<'PY' >/dev/null 2>&1
import socket,sys
p=int(sys.argv[1])
for h in ('127.0.0.1','::1'):
    try:
        s=socket.create_connection((h,p),timeout=0.2)
        s.close()
        raise SystemExit(0)
    except Exception:
        pass
raise SystemExit(1)
PY
}

cleanup_stale_pid() {
  if [ -f "$PID_FILE" ]; then
    local pid
    pid="$(cat "$PID_FILE" 2>/dev/null || true)"
    if [ -n "$pid" ] && kill -0 "$pid" 2>/dev/null; then
      log info "n8n already running pid=$pid"
      exit 0
    fi
    rm -f "$PID_FILE"
    log warn "removed stale pid file"
  fi
}

if ! mkdir "$LOCK_DIR" 2>/dev/null; then
  log warn "launch already in progress"
  exit 0
fi
trap 'rmdir "$LOCK_DIR" 2>/dev/null || true' EXIT

cleanup_stale_pid

if is_port_listening "$BRIDGE_PORT"; then
  log warn "refusing to start n8n while bridge port $BRIDGE_PORT is occupied"
  exit 0
fi

if is_port_listening "$N8N_PORT"; then
  log warn "refusing to start n8n because port $N8N_PORT is already in use"
  exit 0
fi

if [ ! -x "$BASE_DIR/node_modules/.bin/n8n" ]; then
  log error "n8n binary not found at $BASE_DIR/node_modules/.bin/n8n"
  exit 1
fi

nohup "$BASE_DIR/node_modules/.bin/n8n" start > "$LOG_DIR/n8n.log" 2>&1 &
PID="$!"
echo "$PID" > "$PID_FILE"

sleep 1
if ! kill -0 "$PID" 2>/dev/null; then
  rm -f "$PID_FILE"
  log error "n8n failed to stay running after launch"
  exit 1
fi

log info "started n8n pid=$PID"
