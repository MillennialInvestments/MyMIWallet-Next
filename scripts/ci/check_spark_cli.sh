#!/usr/bin/env bash
set -euo pipefail

pattern='->(option|argument)\('

if rg -n "$pattern" app/Commands; then
  echo "Forbidden Spark CLI API usage detected. Remove ->option() / ->argument()." >&2
  exit 1
fi

echo "Spark CLI API check passed."
