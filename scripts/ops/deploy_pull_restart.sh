#!/usr/bin/env bash
set -euo pipefail

APP_PATH=${APP_PATH:-$(cd "$(dirname "${BASH_SOURCE[0]}")/../.." && pwd)}
RESTART_TOUCH=${RESTART_TOUCH:-}
BRANCH=${BRANCH:-}

cd "$APP_PATH"

if [[ -n "$BRANCH" ]]; then
  git checkout "$BRANCH" >/dev/null 2>&1 || true
fi

git_status_before=$(git status --short)
git_fetch=$(git fetch --all 2>&1 || true)
git_pull=$(git pull 2>&1 || true)

restart_result="skipped"
if [[ -n "$RESTART_TOUCH" ]]; then
  if touch "$RESTART_TOUCH" 2>/dev/null; then
    restart_result="touched"
  else
    restart_result="failed"
  fi
fi

json=$(cat <<JSON
{
  "app_path": "$APP_PATH",
  "branch": "$BRANCH",
  "status_before": "$(echo "$git_status_before" | tr '"' "'")",
  "fetch": "$(echo "$git_fetch" | head -c 200 | tr '"' "'")",
  "pull": "$(echo "$git_pull" | head -c 200 | tr '"' "'")",
  "restart": "$restart_result"
}
JSON
)

echo "$json"
