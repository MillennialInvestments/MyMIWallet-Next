#!/usr/bin/env bash
set -euo pipefail

HOST="${1:-www.mymiwallet.com}"
PORT="${2:-443}"
THRESHOLD_DAYS="${THRESHOLD_DAYS:-7}"

if ! command -v openssl >/dev/null 2>&1; then
  echo "❌ openssl is required." >&2
  exit 1
fi

# Fetch certificate dates
if ! CERT_DATES=$(openssl s_client -servername "$HOST" -connect "$HOST:$PORT" </dev/null 2>/dev/null | openssl x509 -noout -dates -subject); then
  echo "❌ Failed to fetch certificate from $HOST:$PORT" >&2
  exit 1
fi

NOT_AFTER=$(echo "$CERT_DATES" | sed -n 's/notAfter=//p')
NOT_BEFORE=$(echo "$CERT_DATES" | sed -n 's/notBefore=//p')
if [[ -z "$NOT_AFTER" ]]; then
  echo "❌ Could not parse certificate expiration for $HOST:$PORT" >&2
  exit 1
fi

NOW_TS=$(date -u +%s)
EXP_TS=$(date -d "$NOT_AFTER" +%s)
START_TS=$(date -d "$NOT_BEFORE" +%s 2>/dev/null || echo 0)

if (( NOW_TS < START_TS )); then
  echo "❌ Certificate not valid yet (starts: $NOT_BEFORE)" >&2
  exit 1
fi

SECONDS_LEFT=$(( EXP_TS - NOW_TS ))
DAYS_LEFT=$(( SECONDS_LEFT / 86400 ))

if (( SECONDS_LEFT <= 0 )); then
  echo "❌ Certificate expired for $HOST:$PORT (expired on $NOT_AFTER)" >&2
  exit 1
fi

if (( DAYS_LEFT < THRESHOLD_DAYS )); then
  echo "⚠️ Certificate for $HOST:$PORT expires in $DAYS_LEFT days (on $NOT_AFTER). Threshold: ${THRESHOLD_DAYS}d" >&2
  exit 1
fi

echo "✅ Certificate for $HOST:$PORT is valid. Expires in $DAYS_LEFT days (on $NOT_AFTER)."
