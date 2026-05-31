# Solana Front-End Runtime Error Repair

## Objective

Fix the remaining MyMI Exchange Solana front-end/runtime issues after route exposure.

## Confirmed Working

- /Exchange/Solana route works.
- /Exchange/Solana/Swap route works.
- /Exchange/Solana/Assets route works.
- /Exchange/Solana/Create route works.
- /API/Solana/health route works after health fallback patch.
- TBI Coin and TBI Invest Coin draft/devnet records exist.

## Current Browser Console Errors

1. Uncaught ReferenceError: $ is not defined
   - Observed on /Exchange/Solana
   - Observed on /Exchange/Solana/Assets

2. Chart.js v4 errors:
   - Invalid scale configuration for scale: yAxes
   - Invalid scale configuration for scale: xAxes
   - Source: public/assets/js/charts/gd-invest.js

3. Transaction modal 500s:
   - /Dashboard/Transaction-Modal/Solana/coinSwap
   - /Dashboard/Transaction-Modal/Solana/viewSolanaWallet
   - /Dashboard/Transaction-Modal/Solana/tradeSolana
   - Browser preview: "System temporarily unavailable."

4. Duplicate Meta Pixel:
   - Duplicate Pixel ID: 1066980131308331

5. Production console leakage:
   - CSRF token name/hash is being printed in browser console.

## Files To Inspect First

- app/Modules/Exchange/Controllers/SolanaController.php
- app/Modules/Exchange/Views/
- app/Modules/Exchange/Views/Solana/
- app/Modules/User/Controllers/DashboardController.php
- app/Modules/User/Views/
- app/Views/
- app/Config/Routes.php
- public/assets/js/scripts.js
- public/assets/js/charts/gd-invest.js
- public/assets/js/
- app/Config/Filters.php

## Required Fixes

### 1. Fix `$ is not defined`

Find inline Solana page scripts using `$`, `jQuery`, `$(document).ready`, `$.ajax`, or jQuery event handlers before jQuery is loaded.

Fix by doing one of the following safe approaches:

- Move Solana inline scripts into the layout/footer script section after jQuery loads.
- Or wrap scripts in a helper that waits for `window.jQuery`.
- Or convert small Solana inline scripts to vanilla `document.addEventListener('DOMContentLoaded', ...)`.

Do not add a second full jQuery load if the layout already loads jQuery later.

### 2. Fix Chart.js v4 compatibility

`public/assets/js/charts/gd-invest.js` is using Chart.js v2 syntax:

- scales.yAxes
- scales.xAxes

Update to Chart.js v4 syntax:

- scales.y
- scales.x
- gridLines -> grid
- scaleLabel -> title
- ticks should remain under ticks

Do not downgrade Chart.js unless absolutely necessary.

### 3. Fix Solana transaction modal 500s

The modal loader is calling:

- Dashboard/Transaction-Modal/Solana/coinSwap
- Dashboard/Transaction-Modal/Solana/viewSolanaWallet
- Dashboard/Transaction-Modal/Solana/tradeSolana

Find the controller mapping in DashboardController::loadModalContent or equivalent.

Fix missing modal mappings, missing views, or missing data guards so each endpoint returns either:

- valid modal HTML with status 200, or
- a friendly inline Bootstrap/NK UI error panel with status 200 if the feature is unavailable.

Do not return a raw 500 for missing Solana modal content.

### 4. Remove CSRF console leakage

Find browser-side console logging of:

- CSRF Token
- csrf_test_name
- CSRF Hash

Remove it or wrap it behind a safe development-only flag.

### 5. De-dupe Meta Pixel

Find all instances of:

- 1066980131308331
- fbq('init'
- fbevents.js

Ensure the pixel is initialized only once per page. Add a guard such as:

window.__mymiMetaPixelInitialized

if needed.

## Do Not Change

- Do not expose private keys.
- Do not enable mainnet minting.
- Do not broadcast Solana transactions.
- Do not modify unrelated modules.
- Do not remove CSRF protection.
- Do not bypass login/auth filters.

## Required Validation

Run:

```bash
php -l app/Modules/Exchange/Controllers/SolanaController.php
php -l app/Modules/User/Controllers/DashboardController.php
php -l app/Config/Routes.php

grep -RIn "yAxes\\|xAxes" public/assets/js/charts/gd-invest.js public/assets/js app/Modules app/Views || true
grep -RIn "CSRF Token\\|CSRF Hash\\|csrf_test_name" public/assets/js app/Modules app/Views || true
grep -RIn "1066980131308331\\|fbq('init'\\|fbevents.js" app public || true

curl -sS -L https://www.mymiwallet.com/API/Solana/health | head -c 1000
Also verify in browser console:

/Exchange/Solana
/Exchange/Solana/Swap
/Exchange/Solana/Assets
/Exchange/Solana/Create

Expected:

No $ is not defined.
No Chart.js xAxes/yAxes errors.
No raw CSRF token console log.
No duplicate Meta Pixel warning.
Solana transaction modal buttons do not return 500.
If modal content is unavailable, user sees a friendly message instead of "System temporarily unavailable."
Validation Report

Write results to:

docs/_aiops/reports/solana-phase-05/frontend-runtime-error-validation.md
