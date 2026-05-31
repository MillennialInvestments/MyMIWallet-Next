# Solana Transaction Modal Fallback Repair

## Objective

Fix Solana transaction modal endpoints that are returning 500 or "System temporarily unavailable" from the dashboard modal loader.

## Confirmed Fixed Already

- Solana public routes are exposed.
- /API/Solana/health returns success:true.
- Solana frontend runtime issues were patched:
  - jQuery timing helper added.
  - Chart.js v4 compatibility shim added.
  - CSRF console logging removed.
  - Meta Pixel duplicate init guarded.

## Current Problem

The dashboard dynamic modal loader references Solana modal endpoints such as:

- /Dashboard/Transaction-Modal/Solana/coinSwap
- /Dashboard/Transaction-Modal/Solana/viewSolanaWallet
- /Dashboard/Transaction-Modal/Solana/tradeSolana
- /Dashboard/Transaction-Modal/Solana/connectWalletModal

These should not throw raw 500 responses.

## Files To Inspect First

- app/Modules/User/Controllers/DashboardController.php
- app/Config/Routes.php
- app/Views/themes/dashboard/layouts/sidebar.php
- app/Views/themes/dashboard/layouts/footer.php
- app/Modules/Exchange/Views/Solana/
- app/Modules/User/Views/
- app/Modules/Management/Views/
- public/assets/js/scripts.js

Use the latest targeted diagnosis report in:

docs/_aiops/reports/solana-phase-06/

## Required Fixes

1. Locate the Dashboard transaction modal loader method.
2. Confirm how it maps:
   - formtype=Solana
   - endpoint=coinSwap
   - endpoint=viewSolanaWallet
   - endpoint=tradeSolana
   - endpoint=connectWalletModal
3. Add safe mappings for missing Solana endpoints.
4. If a Solana modal feature is not production-ready, return a friendly Bootstrap/NK modal body with status 200.
5. Do not return raw 500 for missing modal content.
6. Add logging for unavailable modal endpoint with:
   - formtype
   - endpoint
   - user_id if available
   - request URI
7. Preserve auth/login checks.
8. Preserve CSRF protection.
9. Do not expose private keys.
10. Do not enable mainnet minting or transaction broadcasting.

## Preferred Modal Behavior

For unavailable/disabled Solana actions, return HTML similar to:

<div class="modal-header">
  <h5 class="modal-title">Solana Feature Temporarily Unavailable</h5>
</div>
<div class="modal-body">
  <div class="alert alert-warning">
    This Solana action is currently being prepared for production. Your wallet and funds are safe. Please try again later or contact support.
  </div>
</div>

## Required Validation

Run:

```bash
php -l app/Modules/User/Controllers/DashboardController.php
php -l app/Config/Routes.php

php spark routes | grep -Ei "Transaction-Modal|Dashboard|Solana"

grep -RIn "coinSwap\\|viewSolanaWallet\\|tradeSolana\\|connectWalletModal\\|Transaction-Modal\\|dynamicModalLoader" \
  app/Modules/User/Controllers app/Views public/assets/js app/Config 2>/dev/null || true
If authenticated curl/session testing is not available from CLI, document that browser validation is required.

Validation Report

Write validation to:

docs/_aiops/reports/solana-phase-06/solana-modal-fallback-validation.md
