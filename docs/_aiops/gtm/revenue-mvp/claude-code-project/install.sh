#!/usr/bin/env bash
# Installs CLAUDE.md and .claude/ into an AIOps-authorized feature worktree. Refuses main and production.
# Usage: WORKTREE=/path EXPECTED_BRANCH=feature/... bash install.sh
: "${WORKTREE:?}"; : "${EXPECTED_BRANCH:?}"
HERE="$(cd "$(dirname "$0")" && pwd)"
case "$WORKTREE" in /apps/TBI/www/*) echo "STOP production path"; exit 3;; esac
cd "$WORKTREE"; rc=$?; if [ "$rc" -ne 0 ]; then echo "BLOCKED cannot cd"; exit 2; fi
br="$(git rev-parse --abbrev-ref HEAD 2>/dev/null)"
if [ "$br" != "$EXPECTED_BRANCH" ]; then echo "STOP branch mismatch have=$br want=$EXPECTED_BRANCH"; exit 3; fi
case "$br" in main|master) echo "STOP never install on main"; exit 3;; esac
if [ -e CLAUDE.md ] || [ -e .claude ]; then echo "STOP CLAUDE.md or .claude already exists; merge by hand through AIOps scope"; exit 3; fi
cp "$HERE/CLAUDE.md" CLAUDE.md; rc=$?; if [ "$rc" -ne 0 ]; then echo "FAIL copy"; exit 1; fi
cp -R "$HERE/.claude" .claude; rc=$?; if [ "$rc" -ne 0 ]; then echo "FAIL copy"; exit 1; fi
chmod +x .claude/hooks/*.sh
echo "PASS installed. Next: git status --short; ai check; ai next. Commit only if AIOps scope allows (else ai finish owns closeout)."
exit 0
