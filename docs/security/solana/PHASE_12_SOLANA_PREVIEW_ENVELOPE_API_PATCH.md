# Phase 12 Solana Preview Envelope API Patch

Generated UTC: 2026-06-03T08:23:34Z
Branch: feature/solana-preview-envelope-api-phase-12
Commit: 65ae9d4a7 Merge pull request #503 from MillennialInvestments/feature/solana-transaction-preview-signed-simulation-phase-11

## Safety Scope
- Adds preview-only API envelope behavior.
- Does not enable transaction execution.
- Does not enable transaction broadcast.
- Does not enable mainnet minting.
- Does not accept or return private keys, seed phrases, secret keys, or mnemonics.
- Keeps CSRF protection on preview POST routes.

## Added API Routes
1228:        $routes->post('transaction/preview', 'SolanaAPIController::preview', ['filter' => 'csrf']);
1229:        $routes->post('swap/preview', 'SolanaAPIController::preview', ['filter' => 'csrf']);

## Added Controller Preview Markers
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

## PHP Lint
No syntax errors detected in app/Config/Solana.php
No syntax errors detected in app/Config/Routes.php
No syntax errors detected in app/Commands/SolanaWalletSecretsAudit.php
No syntax errors detected in app/Modules/APIs/Controllers/SolanaAPIController.php
No syntax errors detected in app/Modules/Exchange/Controllers/SolanaController.php
No syntax errors detected in app/Services/SolanaService.php
No syntax errors detected in app/Libraries/MyMISolana.php
No syntax errors detected in app/Libraries/MyMIRaydium.php
No syntax errors detected in app/Libraries/MyMIPhantom.php
No syntax errors detected in app/Libraries/MyMISolflare.php

## Guardrail Baseline

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 08:23:35 UTC+00:00

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

## Result
- PASS: Preview envelope method added.
- PASS: Preview routes added with CSRF filter.
- PASS: Preview envelope returns dry_run=true and broadcast=false.
- PASS: Preview envelope marks signature_required=true.
- PASS: Sensitive key fields are removed from preview payload.
- PASS: Guardrail smoke remains FAIL count: 0.
- PASS: No transaction broadcast command was intentionally executed.
- PASS: No mainnet minting was enabled.
