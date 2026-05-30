#!/usr/bin/env bash
set +e

LABEL="${1:-command}"
shift || true

SAFE_LABEL="$(echo "$LABEL" | tr -cd '[:alnum:]_-')"
TIMESTAMP="$(date +%Y%m%d-%H%M%S)"
OUTDIR="docs/_aiops/reports/terminal"
OUTFILE="$OUTDIR/${TIMESTAMP}-${SAFE_LABEL}.log"

mkdir -p "$OUTDIR"

echo "===== TBI CAPTURE START ====="
echo "Label: $LABEL"
echo "Output file: $OUTFILE"
echo "Started UTC: $(date -u)"
echo

{
  echo "===== TBI CAPTURE METADATA ====="
  echo "Label: $LABEL"
  echo "Started UTC: $(date -u)"
  echo "Path: $(pwd)"
  echo "User: $(whoami)"
  echo "Branch: $(git branch --show-current 2>/dev/null)"
  echo
  echo "===== COMMAND OUTPUT ====="
  "$@"
  STATUS=$?
  echo
  echo "===== COMMAND EXIT STATUS ====="
  echo "$STATUS"
  echo
  echo "===== FINISHED UTC ====="
  date -u
  exit "$STATUS"
} > "$OUTFILE" 2>&1

STATUS=$?

echo "===== TBI CAPTURE COMPLETE ====="
echo "Exit status: $STATUS"
echo "Output saved to:"
echo "$OUTFILE"
echo
echo "===== LAST 80 LINES ====="
tail -n 80 "$OUTFILE"

exit 0
