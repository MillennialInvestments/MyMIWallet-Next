#!/usr/bin/env bash
set -euo pipefail
cd "$(dirname "$0")"
[ -f n8n.pid ] && kill "$(cat n8n.pid)" 2>/dev/null || true
rm -f n8n.pid
echo "Stopped n8n."
