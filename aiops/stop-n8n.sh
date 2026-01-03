#!/usr/bin/env bash
set -euo pipefail
cd "$(dirname "$0")"

if [ -f bridge.pid ]; then
  kill "$(cat bridge.pid)" 2>/dev/null || true
  rm -f bridge.pid
fi

if [ -f n8n.pid ]; then
  kill "$(cat n8n.pid)" 2>/dev/null || true
  rm -f n8n.pid
fi

echo "Stopped n8n + bridge."
