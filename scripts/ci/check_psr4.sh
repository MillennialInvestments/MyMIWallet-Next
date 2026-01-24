#!/bin/bash
set -e

echo "Running PSR-4 audit..."
php scripts/ci/psr4_audit.php

if [ $? -ne 0 ]; then
  echo "❌ PSR-4 violations detected. Build failed."
  exit 1
fi

echo "✅ PSR-4 compliance verified."
