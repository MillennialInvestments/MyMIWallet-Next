#!/usr/bin/env bash
set -euo pipefail

php spark db:inventory --write-docs=1 --write-sql=1 "$@"
