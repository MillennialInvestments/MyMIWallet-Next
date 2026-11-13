#!/usr/bin/env bash
# MYMI-GTM-003A / MYMI-GTM-006 helper.
#
# Resolves the commit range a CI gate should inspect, so gates apply to new
# changes only and do not fail on inherited baseline debt (for example the
# historically tracked chat/.env registered under MYMI-GTM-001).
#
# Inputs (environment):
#   EVENT_NAME   github.event_name ("pull_request" or "push")
#   PR_BASE_SHA  github.event.pull_request.base.sha   (pull_request only)
#   PR_HEAD_SHA  github.event.pull_request.head.sha   (pull_request only)
#   PUSH_BEFORE  github.event.before                  (push only)
#   PUSH_AFTER   github.event.after / github.sha      (push only)
#
# Output: prints "BASE HEAD" (two full SHAs) on stdout. Exits non-zero when a
# range cannot be resolved, so callers fail closed instead of skipping a scan.
#
# Requires a checkout with full history (actions/checkout fetch-depth: 0).

set -u

zero_sha='0000000000000000000000000000000000000000'
base=''
head=''

case "${EVENT_NAME:-}" in
  pull_request)
    head="${PR_HEAD_SHA:-}"
    if [ -n "${PR_BASE_SHA:-}" ] && [ -n "$head" ]; then
      # Diff against the merge base so commits already on the base branch
      # (which may have advanced since the PR opened) are not re-scanned.
      base="$(git merge-base "$PR_BASE_SHA" "$head" 2>/dev/null || true)"
    fi
    ;;
  push)
    head="${PUSH_AFTER:-}"
    base="${PUSH_BEFORE:-}"
    if [ -z "$base" ] || [ "$base" = "$zero_sha" ]; then
      # New branch or first push: fall back to the parent commit.
      base="$(git rev-parse "${head}^" 2>/dev/null || true)"
    fi
    ;;
  *)
    echo "pr_diff_range: unsupported EVENT_NAME '${EVENT_NAME:-}'" >&2
    exit 2
    ;;
esac

if [ -z "$base" ] || [ -z "$head" ]; then
  echo "pr_diff_range: could not resolve range (base='${base}' head='${head}')" >&2
  exit 3
fi

if ! git cat-file -e "${base}^{commit}" 2>/dev/null || ! git cat-file -e "${head}^{commit}" 2>/dev/null; then
  echo "pr_diff_range: range endpoints not present in checkout; use fetch-depth: 0" >&2
  exit 4
fi

printf '%s %s\n' "$base" "$head"
