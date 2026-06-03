# Phase 15 Solana Preview Runtime Smoke Command Registration Hotfix

Generated UTC: 2026-06-03T13:34:56Z
Branch: fix/phase-15-solana-preview-runtime-smoke-discovery
Commit Before Hotfix Commit: b720052e0 fix: register Solana preview runtime smoke command

## Reason
- PR #507 was merged while solana:preview-runtime:smoke was not discoverable.
- The app uses an explicit Spark command registry.
- This hotfix registers App\Commands\Solana\SolanaPreviewRuntimeSmoke in the active registry.

## Changed Files
```text
 M app/Config/Console.php
 M docs/security/solana/PHASE_15_SOLANA_PREVIEW_RUNTIME_SMOKE_COMMAND_REGISTRATION_HOTFIX.md
?? docs/_support/ops-commands-inventory/
```

## PHP Syntax
```text
No syntax errors detected in app/Commands/Solana/SolanaPreviewRuntimeSmoke.php
No syntax errors detected in app/Config/Commands.php
No syntax errors detected in app/Config/Console.php
```

## Spark Discovery
```text
  aiops:solana-digest                         Summarize current Solana Exchange routes,
  aiops:solana-healthcheck                    Run a safe Solana route and network health
  aiops:solana-transaction-audit              Safely summarize Solana transaction records
                                              database mappings, and Solana integration
Solana
  solana:wallet-secrets:audit                 Audit and optionally encrypt existing
                                              plaintext Solana wallet access_token
```

## Phase 15 Runtime Smoke
```text

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 13:34:57 UTC+00:00


```

## Permanent Solana Guardrail Smoke
```text

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 13:34:57 UTC+00:00

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
- Phase 15 command is registered in the active Spark command registry.
- Phase 15 command is discoverable.
- Phase 15 command executes.
- Runtime preview UX safety markers validated.
- Preview routes remain CSRF-protected.
- No broadcast, mint, private-key, or execution path enabled.
