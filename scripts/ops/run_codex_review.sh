#!/usr/bin/env bash
set -euo pipefail

REVIEW_LOOKBACK_COMMITS=${REVIEW_LOOKBACK_COMMITS:-}
REVIEW_OUTPUT_DIR=${REVIEW_OUTPUT_DIR:-}

cmd=(php spark codex:review)

if [[ -n "$REVIEW_LOOKBACK_COMMITS" ]]; then
  cmd=(REVIEW_LOOKBACK_COMMITS=$REVIEW_LOOKBACK_COMMITS "${cmd[@]}")
fi

if [[ -n "$REVIEW_OUTPUT_DIR" ]]; then
  cmd=(REVIEW_OUTPUT_DIR=$REVIEW_OUTPUT_DIR "${cmd[@]}")
fi

# shellcheck disable=SC2068
${cmd[@]}
