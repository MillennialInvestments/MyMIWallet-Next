#!/usr/bin/env bash
# Read-only preflight. Exit: 0 PASS, 2 BLOCKED, 3 STOP.
SELF="$(cd "$(dirname "$0")" && pwd)"
. "$SELF/lib.sh"
verify_worktree; rc=$?
if [ "$rc" -ne 0 ]; then exit "$rc"; fi
run_cap fetch git fetch origin main
git rev-parse HEAD >"$EVDIR/head.sha" 2>&1
git rev-parse origin/main >"$EVDIR/origin-main.sha" 2>&1
snapshot_git preflight
if command -v ai >/dev/null 2>&1; then
  run_cap ai-check ai check
  run_cap ai-next ai next
else
  say "BLOCKED ai CLI not on PATH (run on gq-ai01 inside TBI AIOps)"; exit 2
fi
# Contract inspection: record the first 60 lines so the runner/ChatGPT can adapt.
head -n 60 "$EVDIR/ai-next.out" >"$EVDIR/ai-next.contract-sample.txt" 2>&1
record_baseline
if ! grep -q "$REV_OBJECTIVE" "$EVDIR/ai-check.out" "$EVDIR/ai-next.out" 2>/dev/null; then
  say "BLOCKED_OBJECTIVE_UNREGISTERED $REV_OBJECTIVE is not in AIOps state."
  say "ACTION: Normal ChatGPT registers REV-S001..S009 through the governed AIOps path (see handoff FIRST ACTION), then reruns with the real objective id."
  exit 2
fi
say "PASS preflight evidence=$EVDIR"
exit 0
