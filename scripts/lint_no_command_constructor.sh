#!/usr/bin/env bash
set -euo pipefail

cd "$(dirname "${BASH_SOURCE[0]}")/.."

# Find zero-argument constructors in app/Commands
if rg -n --glob '*.php' "function\\s+__construct\\s*\\(\\s*\\)" app/Commands > /tmp/command_ctor_hits 2>/dev/null; then
    echo "Found zero-argument __construct() definitions in app/Commands (remove or convert to DI constructors):"
    cat /tmp/command_ctor_hits
    exit 1
fi

echo "No zero-argument command constructors detected."