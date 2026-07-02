#!/bin/bash
set -e

composer install --no-interaction --no-progress
php spark migrate
php spark cache:clear || true
