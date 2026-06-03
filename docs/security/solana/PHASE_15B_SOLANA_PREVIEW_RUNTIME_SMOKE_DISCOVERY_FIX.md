# Phase 15B Solana Preview Runtime Smoke Discovery Fix

Generated UTC: 2026-06-03T15:44:05Z
Branch: fix/phase-15b-solana-preview-runtime-smoke-command-discovery
Commit Before Fix Commit: 3f2b874fd fix: make Solana preview runtime smoke discoverable

## Reason
- PR #507 added the Phase 15 command under App\Commands\Solana.
- PR #508 registered the nested command, but the first autoload test used an over-escaped class name.
- Composer autoload was rebuilt and Spark command cache files were cleared.
- The command is now top-level App\Commands\SolanaPreviewRuntimeSmoke, matching existing Solana command conventions.

## Changed Files
```text
 M docs/security/solana/PHASE_15B_SOLANA_PREVIEW_RUNTIME_SMOKE_DISCOVERY_FIX.md
```

## PHP Syntax
```text
No syntax errors detected in app/Commands/SolanaPreviewRuntimeSmoke.php
No syntax errors detected in app/Config/Commands.php
No syntax errors detected in app/Config/Console.php
```

## Composer Autoload
```text
Generating optimized autoload files
Generated optimized autoload files containing 4755 classes
App\\Commands\\SolanaPreviewRuntimeSmoke => NOT LOADABLE
```

## Spark Discovery
```text
  aiops:solana-digest                         Summarize current Solana Exchange routes,
  aiops:solana-healthcheck                    Run a safe Solana route and network health
  aiops:solana-transaction-audit              Safely summarize Solana transaction records
                                              database mappings, and Solana integration
Solana
  solana:preview-runtime:smoke                Phase 15 smoke test for Solana preview UX
  solana:wallet-secrets:audit                 Audit and optionally encrypt existing
                                              plaintext Solana wallet access_token
```

## Phase 15 Runtime Smoke
```text

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 15:44:08 UTC+00:00


============================================================
SOLANA PREVIEW RUNTIME SMOKE - PHASE 15
============================================================
Safety: preview-only, no private keys, no broadcasts, no minting.

PASS: Preview UX JS exists
PASS: Preview UX JS has Phase 14 marker
PASS: Preview UX JS forces dry_run=true
PASS: Preview UX JS forces broadcast=false
PASS: Preview UX JS requires signature
PASS: Preview UX JS requires wallet signature
PASS: Preview UX JS blocks private key submission
PASS: Preview UX JS strips private_key field
PASS: Preview UX JS strips privateKey field
PASS: Preview UX JS strips seed phrase fields
PASS: Preview UX JS strips mnemonic field
PASS: Preview UX JS neutralizes private key fields
PASS: Preview UX JS stops normal form submission
PASS: Preview UX JS uses swap preview fallback endpoint
PASS: Preview UX JS does not call swap execute endpoint directly
PASS: Preview UX JS does not call token mint endpoint directly
PASS: coinSwap view injects preview UX JS
PASS: coinSwap view configures swap preview URL
PASS: coinSwap view configures transaction preview URL
PASS: swap view injects preview UX JS
PASS: swap view configures swap preview URL
PASS: swap view configures transaction preview URL
PASS: trade view injects preview UX JS
PASS: trade view configures swap preview URL
PASS: trade view configures transaction preview URL
PASS: Preview transaction route exists
PASS: Preview swap route exists
PASS: Preview transaction route uses CSRF
PASS: Preview swap route uses CSRF
PASS: Swap execute route remains trackable for safety monitoring
PASS: Token mint route remains trackable for safety monitoring

============================================================
RESULT
============================================================
PASS count: 31
FAIL count: 0
```

## Permanent Guardrail Smoke
```text

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 15:44:09 UTC+00:00

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

## Result
- Phase 15 runtime smoke command is autoloadable.
- Phase 15 runtime smoke command is discoverable in Spark.
- Phase 15 runtime smoke command executes.
- Runtime preview UX safety markers validated.
- Preview routes remain CSRF-protected.
- No broadcast, mint, private-key, or execution path enabled.
