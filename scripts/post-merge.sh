#!/bin/bash
set -e

echo "[post-merge] Installing Composer dependencies..."
composer install --no-interaction --no-progress --prefer-dist

echo "[post-merge] Running database migrations..."
php spark migrate --no-interaction

echo "[post-merge] Clearing CI4 caches..."
php spark cache:clear --no-interaction 2>/dev/null || true

echo "[post-merge] Post-merge setup complete."
