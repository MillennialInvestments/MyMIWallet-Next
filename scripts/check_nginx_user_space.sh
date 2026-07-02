#!/usr/bin/env bash
set -euo pipefail

PREFIX="${NGINX_PREFIX:-$HOME/nginx}"
BIN="${NGINX_BIN:-$PREFIX/sbin/nginx}"
CONF_REL="${NGINX_CONF:-conf/nginx.conf}"
PIDFILE="${NGINX_PID:-$PREFIX/logs/nginx.pid}"

if [ ! -x "$BIN" ]; then
  echo "❌ NGINX binary not found at $BIN" >&2
  exit 1
fi

echo "▶️ Running config test..."
if ! "$BIN" -p "$PREFIX" -c "$CONF_REL" -t; then
  echo "❌ nginx -t failed" >&2
  exit 1
fi

echo "▶️ Checking processes..."
PS_OUTPUT=$(ps -ef | grep '[n]ginx' || true)
if [[ -z "$PS_OUTPUT" ]]; then
  echo "❌ No running nginx master/worker found." >&2
  exit 1
fi

echo "$PS_OUTPUT"

if [ -f "$PIDFILE" ]; then
  PID_CONTENT=$(cat "$PIDFILE" 2>/dev/null || true)
  if [[ -n "$PID_CONTENT" ]] && ps -p "$PID_CONTENT" >/dev/null 2>&1; then
    echo "✅ PID file present and master running (pid $PID_CONTENT)."
  else
    echo "⚠️ PID file present but process not running: $PIDFILE" >&2
    exit 1
  fi
else
  echo "⚠️ PID file missing at $PIDFILE" >&2
  exit 1
fi

echo "▶️ Checking listeners..."
LISTENERS=$(ss -ltnp 2>/dev/null | grep nginx || true)
if [[ -z "$LISTENERS" ]]; then
  echo "⚠️ nginx running but no TCP listeners found via ss." >&2
  exit 1
fi

echo "$LISTENERS"
echo "✅ User-space nginx looks healthy."
