#!/usr/bin/env bash
set -euo pipefail

usage() {
  cat <<'USAGE'
Run lightweight checks for scripts/ without requiring sudo or paid tooling.

Usage: scripts/run_script_checks.sh [options]
  --run-smoke            Run scripts/smoke_routes.sh (off by default to avoid prod hits)
  --smoke-base <url>     Base URL to use when running smoke routes (default from script)
  -h, --help             Show this help text
USAGE
}

log() { printf '%s\n' "$*"; }
log_step() { printf '\n==> %s\n' "$*"; }
log_status() { printf '   [%s] %s\n' "$1" "$2"; }

ROOT="$(cd "$(dirname "$0")/.." && pwd)"
SCRIPTS_DIR="$ROOT/scripts"
RUN_SMOKE=0
SMOKE_BASE=""

while [[ $# -gt 0 ]]; do
  case "$1" in
    --run-smoke)
      RUN_SMOKE=1
      ;;
    --smoke-base)
      SMOKE_BASE="${2:-}"
      shift
      ;;
    -h|--help)
      usage
      exit 0
      ;;
    *)
      log "Unknown option: $1"
      usage
      exit 2
      ;;
  esac
  shift
done

if [[ ! -d "$SCRIPTS_DIR" ]]; then
  log "scripts/ directory not found at $SCRIPTS_DIR"
  exit 1
fi

STATUS_SUMMARY=()
record_status() { STATUS_SUMMARY+=("$1") ; }

log_step "Inventory"
if inventory_output=$(find "$SCRIPTS_DIR" -maxdepth 3 -type f 2>/dev/null); then
  log "$inventory_output"
  record_status "PASS inventory"
else
  log "Failed to enumerate scripts"
  record_status "FAIL inventory"
fi

log_step "Shellcheck"
if command -v shellcheck >/dev/null 2>&1; then
  mapfile -t sh_files < <(find "$SCRIPTS_DIR" -name '*.sh' -type f)
  if [[ ${#sh_files[@]} -eq 0 ]]; then
    log_status "SKIP" "No shell scripts found"
    record_status "SKIP shellcheck"
  else
    if shellcheck "${sh_files[@]}"; then
      log_status "OK" "shellcheck passed"
      record_status "PASS shellcheck"
    else
      log_status "FAIL" "shellcheck reported issues"
      record_status "FAIL shellcheck"
    fi
  fi
else
  log_status "SKIP" "shellcheck not installed"
  record_status "SKIP shellcheck"
fi

log_step "Smoke routes"
if [[ $RUN_SMOKE -eq 1 ]]; then
  SMOKE_SCRIPT="$SCRIPTS_DIR/smoke_routes.sh"
  if [[ -x "$SMOKE_SCRIPT" ]]; then
    if [[ -n "$SMOKE_BASE" ]]; then
      if bash "$SMOKE_SCRIPT" "$SMOKE_BASE"; then
        record_status "PASS smoke_routes"
      else
        record_status "FAIL smoke_routes"
      fi
    else
      if bash "$SMOKE_SCRIPT"; then
        record_status "PASS smoke_routes"
      else
        record_status "FAIL smoke_routes"
      fi
    fi
  else
    log_status "SKIP" "smoke_routes.sh not executable or missing"
    record_status "SKIP smoke_routes"
  fi
else
  log_status "SKIP" "smoke routes disabled (use --run-smoke)"
  record_status "SKIP smoke_routes"
fi

log_step "Summary"
for entry in "${STATUS_SUMMARY[@]}"; do
  log "- $entry"
done

exit 0
