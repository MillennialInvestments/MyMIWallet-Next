# Phase 15 Solana Preview Runtime Smoke Baseline

Generated UTC: 2026-06-03T09:22:37Z
Branch: feature/solana-preview-runtime-smoke-phase-15
Commit: 20ed643a7 Merge pull request #506 from MillennialInvestments/feature/solana-preview-ux-modal-phase-14

## Safety Scope
- Runtime smoke only.
- No transaction broadcast.
- No mainnet minting.
- No private-key submission.
- No auth/CSRF bypass.
- No execution endpoint enablement.

## Required Phase 15 Checks
- /Exchange/Solana/Swap loads.
- preview-ux-modal.js exists.
- Phase 14 frontend marker exists.
- Preview API routes exist.
- CSRF remains attached to preview POST routes.
- Guardrails remain PASS 41 / FAIL 0.
- No private key, seed, mnemonic, or secret payloads are submitted.
- No /API/Solana/swap/execute call occurs.
- No /API/Solana/token/mint call occurs.

## Git Status
```text
?? docs/security/solana/PHASE_15_SOLANA_PREVIEW_RUNTIME_SMOKE_BASELINE.md
```

## Guardrail Smoke
```text

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 09:22:37 UTC+00:00

============================================================
SOLANA GUARDRAILS SMOKE
============================================================
Safety: no private keys, no broadcasts, no mainnet minting.

## Config Defaults
PASS: SOLANA_ALLOW_TRANSACTION_EXECUTION default false
PASS: SOLANA_ALLOW_MAINNET_BROADCAST default false
PASS: SOLANA_ALLOW_MAINNET_MINT default false
PASS: SOLANA_ALLOW_PRIVATE_KEY_SUBMISSION default false
PASS: SOLANA_REQUIRE_WALLET_SIGNATURE default true
PASS: SOLANA_DEFAULT_DRY_RUN default true

## Provider Library Guard Responses
PASS: MyMIRaydium::swap returns array
PASS: MyMIRaydium::swap broadcast=false
PASS: MyMIRaydium::swap dry_run=true
PASS: MyMIRaydium::swap sanitized payload
PASS: MyMIRaydium::swap safe guard message
PASS: MyMIPhantom::transfer returns array
PASS: MyMIPhantom::transfer broadcast=false
PASS: MyMIPhantom::transfer dry_run=true
PASS: MyMIPhantom::transfer sanitized payload
PASS: MyMIPhantom::transfer safe guard message
PASS: MyMIPhantom::swap returns array
PASS: MyMIPhantom::swap broadcast=false
PASS: MyMIPhantom::swap dry_run=true
PASS: MyMIPhantom::swap sanitized payload
PASS: MyMIPhantom::swap safe guard message
PASS: MyMIPhantom::createToken returns array
PASS: MyMIPhantom::createToken broadcast=false
PASS: MyMIPhantom::createToken dry_run=true
PASS: MyMIPhantom::createToken sanitized payload
PASS: MyMIPhantom::createToken safe guard message
PASS: MyMISolflare::transfer returns array
PASS: MyMISolflare::transfer broadcast=false
PASS: MyMISolflare::transfer dry_run=true
PASS: MyMISolflare::transfer sanitized payload
PASS: MyMISolflare::transfer safe guard message
PASS: MyMISolflare::swap returns array
PASS: MyMISolflare::swap broadcast=false
PASS: MyMISolflare::swap dry_run=true
PASS: MyMISolflare::swap sanitized payload
PASS: MyMISolflare::swap safe guard message
PASS: MyMISolflare::createToken returns array
PASS: MyMISolflare::createToken broadcast=false
PASS: MyMISolflare::createToken dry_run=true
PASS: MyMISolflare::createToken sanitized payload
PASS: MyMISolflare::createToken safe guard message

============================================================
RESULT
============================================================
PASS count: 41
FAIL count: 0
```

## Route Check
```text
| POST    | API/Solana/transaction/preview                                              | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::preview                                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                               | csrf cspoff sessionTracker requestLifecycle observability jsonException toolbar                            |
| POST    | API/Solana/swap/preview                                                     | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::preview                                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                               | csrf cspoff sessionTracker requestLifecycle observability jsonException toolbar                            |
| POST    | API/Solana/swap/execute                                                     | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::swap                                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                               | csrf cspoff sessionTracker requestLifecycle observability jsonException toolbar                            |
| POST    | API/Solana/token/mint                                                       | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::mint                                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                               | csrf cspoff sessionTracker requestLifecycle observability jsonException toolbar                            |
```

## Frontend Marker Check
```text
app/Modules/Exchange/Views/Solana/coinSwap.php:170:<?php if (! defined('MYMI_SOLANA_PREVIEW_UX_MODAL_PHASE14_20260603')): ?>
app/Modules/Exchange/Views/Solana/coinSwap.php:171:<?php define('MYMI_SOLANA_PREVIEW_UX_MODAL_PHASE14_20260603', true); ?>
app/Modules/Exchange/Views/Solana/coinSwap.php:180:<script src="<?= base_url('public/assets/js/Solana/preview-ux-modal.js') ?>?v=phase14-20260603"></script>
app/Modules/Exchange/Views/Solana/swap.php:886:<?php if (! defined('MYMI_SOLANA_PREVIEW_UX_MODAL_PHASE14_20260603')): ?>
app/Modules/Exchange/Views/Solana/swap.php:887:<?php define('MYMI_SOLANA_PREVIEW_UX_MODAL_PHASE14_20260603', true); ?>
app/Modules/Exchange/Views/Solana/swap.php:896:<script src="<?= base_url('public/assets/js/Solana/preview-ux-modal.js') ?>?v=phase14-20260603"></script>
app/Modules/Exchange/Views/Solana/trade.php:251:<?php if (! defined('MYMI_SOLANA_PREVIEW_UX_MODAL_PHASE14_20260603')): ?>
app/Modules/Exchange/Views/Solana/trade.php:252:<?php define('MYMI_SOLANA_PREVIEW_UX_MODAL_PHASE14_20260603', true); ?>
app/Modules/Exchange/Views/Solana/trade.php:261:<script src="<?= base_url('public/assets/js/Solana/preview-ux-modal.js') ?>?v=phase14-20260603"></script>
public/assets/js/Solana/preview-ux-modal.js:6: * - No transaction broadcast.
public/assets/js/Solana/preview-ux-modal.js:15:    const MARKER = 'MYMI_SOLANA_PREVIEW_UX_MODAL_PHASE14_20260603';
public/assets/js/Solana/preview-ux-modal.js:98:        payload.private_key_submission_allowed = false;
public/assets/js/Solana/preview-ux-modal.js:99:        payload.broadcast = false;
public/assets/js/Solana/preview-ux-modal.js:100:        payload.dry_run = true;
public/assets/js/Solana/preview-ux-modal.js:102:        payload.wallet_signature_required = true;
public/assets/js/Solana/preview-ux-modal.js:199:        const dryRun = Object.prototype.hasOwnProperty.call(preview, 'dry_run') ? preview.dry_run : true;
public/assets/js/Solana/preview-ux-modal.js:200:        const broadcast = Object.prototype.hasOwnProperty.call(preview, 'broadcast') ? preview.broadcast : false;
public/assets/js/Solana/preview-ux-modal.js:202:        const walletSignatureRequired = Object.prototype.hasOwnProperty.call(preview, 'wallet_signature_required') ? preview.wallet_signature_required : true;
public/assets/js/Solana/preview-ux-modal.js:203:        const privateKeyAllowed = Object.prototype.hasOwnProperty.call(preview, 'private_key_submission_allowed') ? preview.private_key_submission_allowed : false;
public/assets/js/Solana/preview-ux-modal.js:208:        html += '<strong>Preview only.</strong> No transaction has been signed or broadcast. Wallet signature is the next step, but it is disabled in this Phase 14 UX preview.';
public/assets/js/Solana/preview-ux-modal.js:235:        html += '  <div class="col-md-4"><strong>dry_run:</strong> ' + boolBadge(dryRun) + '</div>';
public/assets/js/Solana/preview-ux-modal.js:236:        html += '  <div class="col-md-4"><strong>broadcast:</strong> ' + boolBadge(broadcast) + '</div>';
public/assets/js/Solana/preview-ux-modal.js:238:        html += '  <div class="col-md-6 mt-2"><strong>wallet_signature_required:</strong> ' + boolBadge(walletSignatureRequired) + '</div>';
public/assets/js/Solana/preview-ux-modal.js:239:        html += '  <div class="col-md-6 mt-2"><strong>private_key_submission_allowed:</strong> ' + boolBadge(privateKeyAllowed) + '</div>';
public/assets/js/Solana/preview-ux-modal.js:243:        html += 'This screen is a safety preview. It does not submit private keys, does not mint, does not broadcast, and does not bypass CSRF/authentication.';
public/assets/js/Solana/preview-ux-modal.js:339:    function neutralizePrivateKeyFields() {
public/assets/js/Solana/preview-ux-modal.js:371:        if (typeof event.stopImmediatePropagation === 'function') {
public/assets/js/Solana/preview-ux-modal.js:372:            event.stopImmediatePropagation();
public/assets/js/Solana/preview-ux-modal.js:389:        neutralizePrivateKeyFields();
public/assets/js/Solana/preview-ux-modal.js:393:        neutralizePrivateKeyFields();
```
