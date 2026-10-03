#!/usr/bin/env bash
# Follows `ai next` within bounds. Does not guess an unknown contract.
# Contract expected (verify against 01 evidence): a line "NEXT_COMMAND: <ai ...>" and
# a line containing HUMAN_GATE or APPROVE when approval is required.
SELF="$(cd "$(dirname "$0")" && pwd)"
. "$SELF/lib.sh"
MAX_ITER="${MAX_ITER:-12}"
verify_worktree; rc=$?
if [ "$rc" -ne 0 ]; then exit "$rc"; fi
prev_sig=""; same=0; i=0
while [ "$i" -lt "$MAX_ITER" ]; do
  i=$((i+1))
  check_drift; drc=$?
  if [ "$drc" -ne 0 ]; then exit "$drc"; fi
  run_cap "iter$i-ai-check" ai check
  run_cap "iter$i-ai-next" ai next
  nxt="$EVDIR/iter$i-ai-next.out"
  if grep -q -E "HUMAN_GATE|APPROVE" "$nxt"; then
    say "STOP HUMAN_GATE"; grep -E "HUMAN_GATE|APPROVE" "$nxt" | head -n 5 | tee -a "$EVDIR/run.log"; exit 4
  fi
  if grep -q -E "REVENUE_MVP_CERTIFIED|OBJECTIVE_COMPLETE" "$nxt"; then say "PASS objective complete"; exit 0; fi
  cmd="$(grep -m1 '^NEXT_COMMAND:' "$nxt" | sed 's/^NEXT_COMMAND:[[:space:]]*//')"
  if [ -z "$cmd" ]; then
    say "STOP CONTRACT_UNKNOWN: no NEXT_COMMAND line. First lines of ai next:"; head -n 40 "$nxt" | tee -a "$EVDIR/run.log"; exit 5
  fi
  if ! cmd_allowed "$cmd"; then say "STOP COMMAND_NOT_ALLOWED: $cmd"; exit 3; fi
  # shellcheck disable=SC2086
  run_cap "iter$i-exec" $cmd; erc=$?
  snapshot_git "iter$i"
  sig="$(printf '%s|%s|%s' "$cmd" "$erc" "$(cat "$EVDIR/iter$i-exec.err" "$EVDIR/git-status.iter$i.txt" 2>/dev/null | sha256sum | cut -c1-16)")"
  if [ "$erc" -ne 0 ] && [ "$sig" = "$prev_sig" ]; then same=$((same+1)); else same=0; fi
  prev_sig="$sig"
  if [ "$same" -ge 1 ]; then say "STOP REPEATED_FAILURE $cmd"; exit 6; fi
  if [ "$erc" -ne 0 ]; then say "FAIL exec rc=$erc; re-running check/next to follow recovery"; continue; fi
  "$SELF/04-revenue-test.sh"; trc=$?
  if [ "$trc" -eq 1 ]; then say "FAIL tests after $cmd; loop re-evaluates ai next"; fi
  if [ "$trc" -ge 2 ]; then say "BLOCKED tests unavailable"; exit 2; fi
done
say "STOP MAX_ITER_REACHED $MAX_ITER"
exit 7
