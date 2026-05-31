# Solana Web Route Exposure

## Objective

Fix MyMI Wallet public web/API Solana routes that currently return 404 in browser smoke tests.

## Context

Backend Solana command health is passing:

- aiops:solana-healthcheck works
- aiops:solana-digest works
- aiops:solana-transaction-audit works
- exchange:create-tbi-project-coin-drafts works
- TBI Coin and TBI Invest Coin draft/devnet rows exist

But public smoke tests returned 404 for:

- /Exchange/Solana
- /Exchange/Solana/Swap
- /Exchange/Solana/Assets
- /Exchange/Solana/Create
- /API/Solana/health

## Required Branch

Create a new branch:

fix/solana-exchange-web-route-exposure

Use the current main branch as the base.

## Files To Inspect First

- app/Config/Routes.php
- app/Modules/Exchange/Controllers/SolanaController.php
- app/Modules/APIs/Controllers/SolanaAPIController.php
- app/Config/Filters.php

## Required Routes

Add explicit CodeIgniter 4 route definitions so these URLs work on production:

- GET /Exchange/Solana
- GET /Exchange/Solana/Swap
- GET /Exchange/Solana/Assets
- GET /Exchange/Solana/Create
- GET /API/Solana/health

## Hard Safety Rules

1. Do not modify unrelated routes.
2. Do not expose private keys.
3. Do not enable mainnet minting.
4. Do not broadcast transactions.
5. Preserve existing Solana route behavior.
6. Keep auth/session filters appropriate for Exchange views.
7. API/Solana/health should return safe JSON only.
8. Do not hardcode secrets.
9. Do not change database schema for this task.

## Implementation Notes

Before adding new routes, inspect the existing controller method names and map the public URLs to the correct methods.

Likely targets may include:

- App\Modules\Exchange\Controllers\SolanaController
- App\Modules\APIs\Controllers\SolanaAPIController

If method names differ from the public URLs, add explicit route aliases instead of renaming existing methods.

## Validation Commands

Run:

```bash
php -l app/Config/Routes.php
php -l app/Modules/Exchange/Controllers/SolanaController.php
php -l app/Modules/APIs/Controllers/SolanaAPIController.php

php spark routes | grep -Ei "Exchange/Solana|API/Solana|Solana"

curl -I -L https://www.mymiwallet.com/Exchange/Solana
curl -I -L https://www.mymiwallet.com/Exchange/Solana/Swap
curl -I -L https://www.mymiwallet.com/Exchange/Solana/Assets
curl -I -L https://www.mymiwallet.com/Exchange/Solana/Create
curl -I -L https://www.mymiwallet.com/API/Solana/health
Validation Report

Document validation in:

docs/_aiops/reports/solana-phase-04/web-route-exposure-validation.md

The report must include:

Files changed.
Routes added.
Controller methods mapped.
Curl status results.
Any remaining 404/redirect/auth behavior.
Confirmation that no private keys are exposed.
Confirmation that mainnet minting/broadcast remains disabled.
