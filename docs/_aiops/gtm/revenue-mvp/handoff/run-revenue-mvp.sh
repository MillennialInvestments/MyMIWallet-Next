#!/usr/bin/env bash
# Usage: run-revenue-mvp.sh {preflight|discover|run|test|smoke|closeout|validate|all}
# Required env: WORKTREE EXPECTED_BRANCH REV_OBJECTIVE. Optional: SMOKE_BASE_URL, MAX_ITER.
HERE="$(cd "$(dirname "$0")" && pwd)"
export RUN_ID="${RUN_ID:-$(date -u +%Y%m%dT%H%M%SZ)}"
step() { "$HERE/bin/$1"; local rc=$?; echo "[$1] rc=$rc"; return "$rc"; }
cmd="${1:-all}"
case "$cmd" in
  preflight) step 01-revenue-preflight.sh; exit $?;;
  discover)  step 02-revenue-discover.sh; exit $?;;
  run)       step 03-revenue-slice-runner.sh; exit $?;;
  test)      step 04-revenue-test.sh; exit $?;;
  smoke)     step 05-revenue-smoke.sh; exit $?;;
  closeout)  step 06-revenue-closeout.sh; exit $?;;
  validate)  step 01-revenue-preflight.sh; rc=$?; [ "$rc" -ne 0 ] && exit "$rc"
             step 04-revenue-test.sh; rc=$?; [ "$rc" -ne 0 ] && exit "$rc"
             step 05-revenue-smoke.sh; exit $?;;
  all)       for s in 01-revenue-preflight.sh 02-revenue-discover.sh 03-revenue-slice-runner.sh 05-revenue-smoke.sh 06-revenue-closeout.sh; do
               step "$s"; rc=$?
               if [ "$rc" -ne 0 ] && [ "$rc" -ne 8 ]; then echo "STOP at $s rc=$rc (see $EVROOT/$RUN_ID)"; exit "$rc"; fi
             done; exit 0;;
  *) echo "usage: $0 {preflight|discover|run|test|smoke|closeout|validate|all}"; exit 2;;
esac
