#!/usr/bin/env bash

set -Eeuo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
LOGDIR="$ROOT/writable/logs"
TODAY="$(date +%F)"

HUMAN_LOG="$LOGDIR/triage-$TODAY.log"
CI_LOG="$LOGDIR/log-triage-$TODAY.log"

exec > >(tee -a "$HUMAN_LOG") 2>&1

echo "========================================"
echo " MyMI Wallet – Daily Triage $TODAY"
echo "========================================"
echo

log_ci () {
    local level="$1"
    local msg="$2"
    echo "$level --> [TRIAGE] $msg" >> "$CI_LOG"
}

echo "Scanning Filters directories…"
if [ -d "$ROOT/app/FiltersO" ]; then
    log_ci "ERROR" "Rogue app/FiltersO directory exists"
    ls -lah "$ROOT/app/FiltersO"
else
    log_ci "INFO" "No rogue FiltersO directory found"
fi
echo

echo "Checking BaseFilter references…"
if ! grep -R "abstract class BaseFilter" "$ROOT/app/Filters" >/dev/null 2>&1; then
    log_ci "WARNING" "BaseFilter referenced but not defined"
fi
echo

echo "Scanning status usage…"
grep -RIn "where('status'" "$ROOT/app" | head -n 20 || true
log_ci "INFO" "Status usage scan complete"
echo

echo "Scanning meta_json usage…"
grep -RIn "meta_json" "$ROOT/app" | head -n 20 || true
log_ci "INFO" "meta_json usage scan complete"
echo

echo "Scanning excerpt usage…"
grep -RIn "excerpt" "$ROOT/app" | head -n 20 || true
log_ci "INFO" "excerpt usage scan complete"
echo

echo "Triage complete."
log_ci "INFO" "Daily triage completed successfully"
