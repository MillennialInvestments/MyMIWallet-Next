#!/usr/bin/env bash
set -euo pipefail

php scripts/check_duplicates.php
composer validate
composer dump-autoload --dry-run
