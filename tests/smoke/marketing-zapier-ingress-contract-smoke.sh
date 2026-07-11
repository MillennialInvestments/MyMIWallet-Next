#!/usr/bin/env bash

ROOT="$(git rev-parse --show-toplevel 2>/dev/null)"

if [ -z "$ROOT" ]; then
    echo "STOP: repository root could not be resolved"
    exit 1
fi

cd "$ROOT"

echo "===== GT-NH-005 CONTRACT SMOKE ====="
php spark marketing:ingress:contract-smoke
SMOKE_EXIT=$?

echo
echo "SMOKE_EXIT=$SMOKE_EXIT"

echo
echo "===== ROUTE REGISTRATION ====="
php spark routes |
grep -E 'POST +\| API/Marketing/Ingress|MarketingIngressAPIController'

echo
echo "===== CLEANLINESS ====="
git diff --check
git status --short

exit "$SMOKE_EXIT"
