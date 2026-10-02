#!/usr/bin/env bash
# Shared helpers. Sourced, not executed. No forbidden git recovery commands, no rm of trees.
: "${WORKTREE:?WORKTREE must be the exact authorized worktree path}"
: "${EXPECTED_BRANCH:?EXPECTED_BRANCH required}"
: "${REV_OBJECTIVE:?REV_OBJECTIVE (AIOps objective id) required}"
EVROOT="${EVROOT:-/tmp/mymi-revenue-mvp/evidence}"
RUN_ID="${RUN_ID:-$(date -u +%Y%m%dT%H%M%SZ)}"
EVDIR="$EVROOT/$RUN_ID"
mkdir -p "$EVDIR"
say() { printf '%s\n' "$*" | tee -a "$EVDIR/run.log"; }
# run_cap <label> <cmd...>: preserves stdout, stderr, rc. Returns the command rc.
run_cap() {
  local label="$1"; shift
  "$@" >"$EVDIR/$label.out" 2>"$EVDIR/$label.err"
  local rc=$?
  printf '%s\n' "$rc" >"$EVDIR/$label.rc"
  if [ "$rc" -eq 0 ]; then say "PASS $label"; else say "FAIL $label rc=$rc"; fi
  return "$rc"
}
verify_worktree() {
  case "$WORKTREE" in
    /apps/TBI/www/*|/apps/TBI/www) say "STOP PRODUCTION_PATH_REJECTED $WORKTREE"; return 3;;
  esac
  if [ ! -d "$WORKTREE" ]; then say "BLOCKED worktree missing $WORKTREE"; return 2; fi
  cd "$WORKTREE"
  local rc=$?
  if [ "$rc" -ne 0 ]; then say "BLOCKED cannot cd $WORKTREE"; return 2; fi
  local top; top="$(git rev-parse --show-toplevel 2>/dev/null)"
  if [ "$top" != "$(pwd -P)" ] && [ "$top" != "$WORKTREE" ]; then say "STOP NOT_GIT_ROOT top=$top"; return 3; fi
  local br; br="$(git rev-parse --abbrev-ref HEAD 2>/dev/null)"
  if [ "$br" != "$EXPECTED_BRANCH" ]; then say "STOP BRANCH_MISMATCH have=$br want=$EXPECTED_BRANCH"; return 3; fi
  return 0
}
snapshot_git() {
  git status --short >"$EVDIR/git-status.$1.txt" 2>&1
  git diff --stat >"$EVDIR/git-diff-stat.$1.txt" 2>&1
  git diff --check >"$EVDIR/git-diff-check.$1.txt" 2>&1
  printf '%s\n' "$?" >"$EVDIR/git-diff-check.$1.rc"
}
# Allowlist for commands the slice runner may execute from `ai next`.
cmd_allowed() {
  case "$1" in
    "ai check"*|"ai next"*|"ai finish"*|"ai status"*|"ai continue"*) ;;
    *) return 1;;
  esac
  case "$1" in
    *"reset"*|*"clean"*|*"stash"*|*"push -f"*|*"--force"*|*"rm -"*|*"/apps/TBI/www"*|*";"*|*"&&"*|*"|"*|*'$('*|*'`'*) return 1;;
  esac
  return 0
}
