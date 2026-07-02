#!/usr/bin/env bash
set -euo pipefail

# Usage:
#   scripts/aiops/make_patch.sh <base-branch> <output-file>
# Example:
#   scripts/aiops/make_patch.sh main /tmp/changes.patch

BASE_BRANCH="${1:-main}"
OUT="${2:-/tmp/changes.patch}"

git fetch origin "${BASE_BRANCH}" >/dev/null 2>&1 || true
git diff "origin/${BASE_BRANCH}"...HEAD --unified=3 > "${OUT}"

echo "Wrote patch to: ${OUT}"
echo "Tip: Ensure patch only touches allowlisted paths."
echo "You can now upload this patch to the AIOps platform."