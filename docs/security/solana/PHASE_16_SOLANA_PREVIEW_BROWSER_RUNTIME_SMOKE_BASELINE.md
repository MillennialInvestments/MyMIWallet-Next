# Phase 16 Solana Preview Browser Runtime Smoke Baseline

Generated UTC: 2026-06-03T16:41:07Z
Branch: feature/solana-preview-browser-runtime-smoke-phase-16
Commit: c8af85f56 Merge pull request #509 from MillennialInvestments/fix/phase-15b-solana-preview-runtime-smoke-command-discovery

## Safety Scope
- Browser/runtime simulation only.
- No transaction broadcast.
- No mainnet minting.
- No private-key submission.
- No auth or CSRF bypass.
- No swap execution endpoint call.
- No token mint endpoint call.

## Tool Check
```text
/home/mymiteam/.nvm/versions/node/v22.21.1/bin/node
v22.21.1
/usr/bin/curl
curl 7.81.0 (x86_64-pc-linux-gnu) libcurl/7.81.0 OpenSSL/3.0.2 zlib/1.2.11 brotli/1.1.0 zstd/1.4.8 libidn2/2.3.2 libpsl/0.21.0 (+libidn2/2.3.2) libssh/0.9.6/openssl/zlib nghttp2/1.43.0 librtmp/2.3 OpenLDAP/2.5.18
```

## Git Status
```text
?? docs/security/solana/PHASE_16_SOLANA_PREVIEW_BROWSER_RUNTIME_SMOKE_BASELINE.md
```

## Existing Phase 15 Runtime Smoke
```text

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 16:41:07 UTC+00:00


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

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 16:41:09 UTC+00:00

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

## Phase 16 Target
- Simulate browser form submission for Solana swap preview.
- Confirm preview API is called with CSRF.
- Confirm private_key/privateKey/seed/mnemonic fields are not submitted.
- Confirm preview modal opens.
- Confirm no /API/Solana/swap/execute call occurs.
- Confirm no /API/Solana/token/mint call occurs.
- Confirm wallet signature remains next-step simulation only.
