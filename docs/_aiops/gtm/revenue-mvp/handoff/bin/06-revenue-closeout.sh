#!/usr/bin/env bash
# Closeout is owned by AIOps. This only calls `ai finish` when preconditions hold.
SELF="$(cd "$(dirname "$0")" && pwd)"
. "$SELF/lib.sh"
verify_worktree; rc=$?
if [ "$rc" -ne 0 ]; then exit "$rc"; fi
snapshot_git closeout
if [ "$(cat "$EVDIR/git-diff-check.closeout.rc")" != "0" ]; then say "FAIL git diff --check"; exit 1; fi
"$SELF/04-revenue-test.sh"; trc=$?
if [ "$trc" -ne 0 ]; then say "STOP tests not green rc=$trc"; exit "$trc"; fi
run_cap ai-check ai check
run_cap ai-next ai next
if grep -q -E "HUMAN_GATE|APPROVE" "$EVDIR/ai-next.out"; then say "STOP HUMAN_GATE"; grep -E "HUMAN_GATE|APPROVE" "$EVDIR/ai-next.out" | head -n 5; exit 4; fi
run_cap ai-finish ai finish; frc=$?
if [ "$frc" -ne 0 ]; then say "FAIL ai finish rc=$frc"; exit 1; fi
say "State: IMPLEMENTATION_READY at best. SANDBOX_REVENUE_READY needs 05 smoke without BLOCKED. PRODUCTION_REVENUE_READY needs owner-approved release + post-deploy smoke."
exit 0
