#!/usr/bin/env bash
set -euo pipefail

mkdir -p \
  writable/cache \
  writable/cache/FactoriesCache \
  writable/cache/FileLocatorCache \
  writable/logs \
  writable/session \
  writable/uploads \
  writable/debugbar \
  writable/ci \
  writable/aiops/artifacts/review-publish

chmod -R ug+rwX writable

echo "PASS: writable directories prepared."
