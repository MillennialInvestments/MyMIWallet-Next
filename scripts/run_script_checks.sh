#!/usr/bin/env bash
set -euo pipefail

usage() {
  cat <<'USAGE'
Usage: run_script_checks.sh [options]

Options:
  --run-smoke            Run scripts/smoke_routes.sh after other checks (defaults to off)
  --base-url <url>       Base URL for smoke routes (used when --run-smoke is set). Defaults to $BASE_URL or https://www.mymiwallet.com
  --skip-shellcheck      Skip shellcheck even if installed
  --help                 Show this help and exit

Behavior:
- Lists scripts under scripts/ (sh, py, php, js).
- Runs shellcheck when available (optional skip).
- Runs scripts/lint_no_route_tokens.sh.
- Optionally runs scripts/smoke_routes.sh against the chosen base URL.
- Prints PASS/FAIL summary without requiring sudo or network unless smoke is enabled.
USAGE
}

ROOT="$(cd "$(dirname "$0")/.." && pwd)"
RUN_SMOKE=0
RUN_SHELLCHECK=1
BASE_URL="${BASE_URL:-}"

while [[ $# -gt 0 ]]; do
  case "$1" in
    --run-smoke)
      RUN_SMOKE=1
      shift
      ;;
    --base-url)
      BASE_URL="${2:-}"
      shift 2
      ;;
    --skip-shellcheck)
      RUN_SHELLCHECK=0
      shift
      ;;
    --help|-h)
      usage
      exit 0
      ;;
    *)
      echo "Unknown option: $1" >&2
      usage
      exit 1
      ;;
  esac
done

BASE_URL=${BASE_URL:-https://www.mymiwallet.com}

echo "=== Script inventory (sh/py/php/js) ==="
find "$ROOT/scripts" -maxdepth 3 \( -name "*.sh" -o -name "*.py" -o -name "*.php" -o -name "*.js" \) -type f | sed "s|$ROOT/||"

declare -i failures=0

if [[ $RUN_SHELLCHECK -eq 1 ]]; then
  if command -v shellcheck >/dev/null 2>&1; then
    echo "=== Running shellcheck ==="
    mapfile -t bash_scripts < <(find "$ROOT/scripts" -maxdepth 3 -name "*.sh" -type f)
    if [[ ${#bash_scripts[@]} -gt 0 ]]; then
      if shellcheck "${bash_scripts[@]}"; then
        echo "shellcheck: PASS"
      else
        echo "shellcheck: FAIL (warnings above)"
        failures+=1
      fi
    else
      echo "No bash scripts found for shellcheck."
    fi
  else
    echo "shellcheck not installed; skipping (PASS by skip)."
  fi
else
  echo "shellcheck skipped via flag."
fi

echo "=== lint_no_route_tokens.sh ==="
if bash "$ROOT/scripts/lint_no_route_tokens.sh"; then
  echo "lint_no_route_tokens: PASS"
else
  echo "lint_no_route_tokens: FAIL"
  failures+=1
fi

if [[ $RUN_SMOKE -eq 1 ]]; then
  echo "=== smoke_routes.sh (${BASE_URL}) ==="
  if bash "$ROOT/scripts/smoke_routes.sh" "$BASE_URL"; then
    echo "smoke_routes: PASS"
  else
    echo "smoke_routes: FAIL"
    failures+=1
  fi
else
  echo "Smoke checks skipped (enable with --run-smoke)."
fi

if [[ $failures -eq 0 ]]; then
  echo "All checks PASSED"
  exit 0
else
  echo "Checks completed with $failures failure(s)."
  exit 1
fi
