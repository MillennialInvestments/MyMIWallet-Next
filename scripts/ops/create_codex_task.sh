#!/usr/bin/env bash
set -euo pipefail

TASK_SLUG=${TASK_SLUG:-}
TITLE=${TITLE:-"Untitled Codex Task"}
SUMMARY=${SUMMARY:-""}
SOURCE=${SOURCE:-"ops-inbox"}
DEST_DIR=${DEST_DIR:-"docs/codex/tasks"}

if [[ -z "$TASK_SLUG" ]]; then
  echo '{"error":"TASK_SLUG is required"}'
  exit 1
fi

mkdir -p "$DEST_DIR"
TARGET="$DEST_DIR/${TASK_SLUG}.md"

cat <<MD > "$TARGET"
# ${TITLE}

- Slug: ${TASK_SLUG}
- Source: ${SOURCE}
- Created: $(date -Iseconds)

## Summary
${SUMMARY}

## Acceptance Criteria
- [ ] Define scope
- [ ] Implement
- [ ] Tests / validation
- [ ] Update docs/cron if cron work is added

## Notes
- Add links to Ops Inbox item or PR once available.
MD

json=$(printf '{"path":"%s","title":"%s","source":"%s"}' "$TARGET" "$TITLE" "$SOURCE")

echo "$json"
