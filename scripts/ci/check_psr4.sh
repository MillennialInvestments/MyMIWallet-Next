#!/bin/bash
set -e

echo "Running PSR-4 audit..."
php spark audit:psr4 --ci

if [ $? -ne 0 ]; then
  echo "❌ PSR-4 violations detected. Build failed."
  exit 1
fi

echo "✅ PSR-4 compliance verified."
