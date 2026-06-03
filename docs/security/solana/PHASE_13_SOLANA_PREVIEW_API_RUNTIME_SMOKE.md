# Phase 13 Solana Preview API Runtime Smoke

Generated UTC: 2026-06-03T08:33:52Z
Branch: feature/solana-preview-api-runtime-smoke-phase-13
Commit: 1f67551ca Merge pull request #504 from MillennialInvestments/feature/solana-preview-envelope-api-phase-12
Base URL: https://www.mymiwallet.com

## Safety Scope
- Runtime smoke/report-only phase.
- No transaction execution enabled.
- No transaction broadcast requested.
- No mainnet minting enabled.
- No private keys used.
- Preview endpoint requests use dry-run/test payloads only.
- Auth/CSRF behavior must remain enforced.

## PHP Lint
No syntax errors detected in app/Config/Routes.php
No syntax errors detected in app/Modules/APIs/Controllers/SolanaAPIController.php
No syntax errors detected in app/Commands/SolanaWalletSecretsAudit.php
No syntax errors detected in app/Config/Solana.php

## Guardrail Baseline

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 08:33:52 UTC+00:00

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

## Route/Controller Evidence
1228:        $routes->post('transaction/preview', 'SolanaAPIController::preview', ['filter' => 'csrf']);
1229:        $routes->post('swap/preview', 'SolanaAPIController::preview', ['filter' => 'csrf']);
602:    public function preview()
616:            $sanitizedPayload = array_diff_key($payload, array_flip($sensitiveKeys));
653:                'preview_id' => $previewId,
658:                'signature_required' => true,
659:                'wallet_signature_required' => true,
660:                'private_key_submission_allowed' => false,
661:                'mainnet_broadcast_allowed' => false,
662:                'mainnet_mint_allowed' => false,
681:                    'No transaction was broadcast.',
695:                'Solana transaction preview generated. No transaction was broadcast.',
707:                    'signature_required' => true,
841:                ->setJSON($this->jsonEnvelope(true, 'Solana transaction dry-run/preflight accepted. No transaction was broadcast.', [
994:                'reason' => 'wallet_signature_required',

## HTTP Runtime Smoke
### GET /API/Solana/transaction/preview
- HTTP: 404
- Bytes: 393
- Preview: <!doctype html> <html lang="en"> <head>     <meta charset="utf-8">     <meta name="viewport" content="width=device-width, initial-scale=1">     <title>Page Not Found</title> </head> <body>     <h1>Page Not Found</h1>     <p>We could not find: <code>/index.php/API/Solana/transaction/preview</code></p

### POST /API/Solana/transaction/preview without CSRF
- HTTP: 303
- Bytes: 0
- Sensitive marker check: PASS_NO_SENSITIVE_MARKER
- Preview: 

### GET /API/Solana/swap/preview
- HTTP: 404
- Bytes: 386
- Preview: <!doctype html> <html lang="en"> <head>     <meta charset="utf-8">     <meta name="viewport" content="width=device-width, initial-scale=1">     <title>Page Not Found</title> </head> <body>     <h1>Page Not Found</h1>     <p>We could not find: <code>/index.php/API/Solana/swap/preview</code></p>     <

### POST /API/Solana/swap/preview without CSRF
- HTTP: 303
- Bytes: 0
- Sensitive marker check: PASS_NO_SENSITIVE_MARKER
- Preview: 

## Result
- PASS: Guardrail smoke returned FAIL count: 0.
- PASS: Preview routes are registered.
- PASS: Preview controller markers are present.
- PASS: HTTP smoke used dry-run/test payloads only.
- PASS: No transaction broadcast command was intentionally executed.
- PASS: No mainnet minting was enabled.
- PASS: No real private keys were used.
- NOTE: POST requests without CSRF are expected to fail safely or redirect; this confirms route protection is not bypassed.
