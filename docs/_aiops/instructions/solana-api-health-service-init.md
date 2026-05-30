# Solana API Health Service Initialization Fix

## Problem

Solana routes are registered in CodeIgniter and public GET requests reach the API controller, but:

GET /API/Solana/health

returns JSON with:

Call to a member function getSafeNetworkStatus() on null

This means SolanaAPIController::health() is being hit, but the Solana service dependency is null.

The earlier curl -I HEAD requests returned 404, but normal GET returns controller JSON. Do not treat this as a missing route problem.

## Branch

Use the existing branch:

fix/solana-api-health-service-init

Do not create a new branch.

## Inspect First

- app/Modules/APIs/Controllers/SolanaAPIController.php
- app/Services/SolanaService.php
- app/Libraries/MyMISolana.php
- app/Config/Routes.php
- app/Config/Services.php if needed

## Requirements

1. Initialize SolanaService safely in SolanaAPIController.
2. Ensure SolanaAPIController::health() never calls getSafeNetworkStatus() on null.
3. If SolanaService cannot be constructed, return a safe JSON degraded response instead of throwing.
4. Do not expose private keys.
5. Do not enable mainnet minting.
6. Do not broadcast transactions.
7. Preserve existing route definitions.
8. Do not modify public/.htaccess for this task.
9. Confirm GET /API/Solana/health returns JSON with a stable HTTP code and no fatal/null method errors.
10. If possible, support HEAD gracefully or document that HEAD may not be supported by these routes.

## Validation Commands

php -l app/Modules/APIs/Controllers/SolanaAPIController.php
php -l app/Services/SolanaService.php
php spark routes | grep -Ei "API/Solana/health|Exchange/Solana|Solana"

curl -sS -L -o /tmp/solana_health.json -w "HTTP=%{http_code} FINAL=%{url_effective} CONTENT_TYPE=%{content_type}\n" https://www.mymiwallet.com/API/Solana/health
cat /tmp/solana_health.json

curl -sS -L -o /tmp/solana_health_index.json -w "HTTP=%{http_code} FINAL=%{url_effective} CONTENT_TYPE=%{content_type}\n" https://www.mymiwallet.com/index.php/API/Solana/health
cat /tmp/solana_health_index.json

## Validation Report

Create:

docs/_aiops/reports/solana-phase-04/solana-api-health-service-init-validation.md

Include:

1. Files changed.
2. Root cause.
3. GET status/result for /API/Solana/health.
4. Confirmation no private keys are exposed.
5. Confirmation mainnet minting/broadcast remains disabled.
