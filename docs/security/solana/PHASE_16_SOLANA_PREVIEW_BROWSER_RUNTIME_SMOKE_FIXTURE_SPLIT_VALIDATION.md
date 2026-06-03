# Phase 16 Solana Preview Browser Runtime Smoke Fixture Split Validation

Generated UTC: 2026-06-03T17:00:10Z
Branch: main
Commit Before Hotfix Commit: b1aaddc09 Merge pull request #510 from MillennialInvestments/feature/solana-preview-browser-runtime-smoke-phase-16

## Reason
- PR #510 was merged while GitHub checks were failing.
- Phase 16 local smoke passed, but the Spark command file was large because it embedded the Node browser simulation.
- This hotfix moves the Node browser simulation into tests/fixtures/solana/preview-browser-runtime-smoke.cjs.
- The Spark command now loads the fixture instead of embedding the entire script.

## Changed Files
```text
 M app/Commands/SolanaPreviewBrowserRuntimeSmoke.php
 M docs/next/bf_aiops_task_runs/commands_lint.json
?? docs/security/solana/PHASE_16_SOLANA_PREVIEW_BROWSER_RUNTIME_SMOKE_FIXTURE_SPLIT_VALIDATION.md
?? docs/security/solana/ci-triage/
?? tests/fixtures/
```

## File Size Check
```text
179 app/Commands/SolanaPreviewBrowserRuntimeSmoke.php
7640 app/Commands/SolanaPreviewBrowserRuntimeSmoke.php
286 tests/fixtures/solana/preview-browser-runtime-smoke.cjs
9258 tests/fixtures/solana/preview-browser-runtime-smoke.cjs
```

## PHP Syntax
```text
No syntax errors detected in app/Commands/SolanaPreviewBrowserRuntimeSmoke.php
No syntax errors detected in app/Config/Commands.php
No syntax errors detected in app/Config/Console.php
```

## Spark Discovery
```text
  aiops:solana-digest                         Summarize current Solana
  aiops:solana-healthcheck                    Run a safe Solana route
  aiops:solana-transaction-audit              Safely summarize Solana
                                              mappings, and Solana
Solana
  solana:preview-browser-runtime:smoke        Phase 16 browser-runtime
                                              simulation for Solana
  solana:preview-runtime:smoke                Phase 15 smoke test for
                                              Solana preview UX runtime
  solana:wallet-secrets:audit                 Audit and optionally
                                              Solana wallet access_token
```

## Phase 16 Browser Runtime Smoke
```text

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 17:00:11 UTC+00:00


============================================================
SOLANA PREVIEW BROWSER RUNTIME SMOKE - PHASE 16
============================================================
Safety: simulated browser only; no private keys, broadcasts, minting, or execution calls.

PASS: Preview UX JS exists
PASS: Preview UX JS has Phase 14 marker
PASS: Preview UX JS intercepts submit in capture phase
PASS: Preview UX JS stops immediate propagation
PASS: Preview UX JS calls swap preview fallback endpoint
PASS: Preview UX JS forces dry_run=true
PASS: Preview UX JS forces broadcast=false
PASS: Preview UX JS requires signature
PASS: Preview UX JS requires wallet signature
PASS: Preview UX JS blocks private key submission
PASS: Preview UX JS neutralizes private key fields
PASS: coinSwap view includes preview runtime config
PASS: swap view includes preview runtime config
PASS: trade view includes preview runtime config
PASS: Preview swap API route exists
PASS: Preview transaction API route exists
PASS: Preview swap route uses CSRF
PASS: Preview transaction route uses CSRF
PASS: Swap execute route remains trackable
PASS: Token mint route remains trackable
PASS: Node runtime is available for browser simulation
PASS: Browser simulation fixture is readable

--- Node Browser Simulation Output ---
PASS: Submit default prevented
PASS: Submit propagation stopped
PASS: Submit immediate propagation stopped
PASS: Preview API called exactly once
PASS: Preview API endpoint used
PASS: Preview API uses POST
PASS: CSRF token included in preview request
PASS: dry_run=true submitted
PASS: broadcast=false submitted
PASS: signature_required=true submitted
PASS: wallet_signature_required=true submitted
PASS: private_key_submission_allowed=false submitted
PASS: private_key value not submitted
PASS: privateKey value not submitted
PASS: seed value not submitted
PASS: seed_phrase value not submitted
PASS: mnemonic value not submitted
PASS: private key field disabled in DOM
PASS: seed phrase field disabled in DOM
PASS: preview modal opened
PASS: no swap execute fetch call occurred
PASS: no token mint fetch call occurred
FETCH_CALLS=[{"url":"/index.php/API/Solana/swap/preview","method":"POST","body":"csrf_test_name=csrf-test-hash&from_token=SOL&to_token=MYMI&amount=0.25&slippage=0.50&action=swap_preview&network=solana&estimated_output=Preview+pending+API+estimate&estimated_fee=Preview+pending+fee+estimate&private_key_submission_allowed=false&broadcast=false&dry_run=true&signature_required=true&wallet_signature_required=true","headers":{"Content-Type":"application/x-www-form-urlencoded; charset=UTF-8","X-Requested-With":"XMLHttpRequest","X-CSRF-TOKEN":"csrf-test-hash"}}]
PASS: Node browser simulation completed successfully

============================================================
RESULT
============================================================
PASS count: 23
FAIL count: 0
```

## Phase 15 Runtime Smoke
```text

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 17:00:12 UTC+00:00


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

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 17:00:14 UTC+00:00

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
- Phase 16 browser runtime smoke remains passing.
- Node browser simulation is stored in a CommonJS fixture.
- Spark command file size is reduced.
- Preview API is still called with CSRF.
- Private-key, seed, seed phrase, and mnemonic values are still not submitted.
- No swap execute fetch call occurs.
- No token mint fetch call occurs.
