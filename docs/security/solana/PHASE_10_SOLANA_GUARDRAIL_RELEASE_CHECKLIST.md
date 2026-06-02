# Phase 10 Solana Guardrail Deployment Checklist + Release Notes

Generated UTC: 2026-06-02T23:38:48Z
Branch: hardening/solana-guardrail-release-checklist-phase-10
Commit: 92cfd4ebb Merge pull request #501 from MillennialInvestments/hardening/solana-guardrail-regression-gate-phase-09

## Release Scope
- Consolidates Solana Transaction Safety + Mainnet Guardrails phases 01 through 09.
- Documents deployment validation, rollback, runtime safety posture, and disabled-by-default behavior.
- Does not enable transaction execution, mainnet broadcast, mainnet minting, private-key submission, or wallet-signature bypass.

## Completed Phase Summary
- Phase 01: Solana transaction safety/mainnet guardrail inspection report.
- Phase 02: Controller/API transaction guardrails and fail-closed config flags.
- Phase 03: Explicit CSRF filters on Solana mutation-style routes.
- Phase 04: Runtime smoke evidence for guarded HTTP behavior.
- Phase 05: Service/library guardrail inspection.
- Phase 06: Provider-library fail-closed guardrails for Raydium, Phantom, and Solflare.
- Phase 07: Service/library guardrail evidence report.
- Phase 08: Permanent guardrail smoke mode added to discovered Spark command.
- Phase 09: Regression gate evidence report.

## Safety Defaults That Must Remain Disabled
18:    public bool $allowTransactionExecution = false;
19:    public bool $allowMainnetBroadcast = false;
20:    public bool $allowMainnetMint = false;
21:    public bool $allowPrivateKeySubmission = false;
22:    public bool $requireWalletSignature = true;
23:    public bool $defaultDryRun = true;

## Permanent Pre-Deployment Smoke Command
```bash
php spark solana:wallet-secrets:audit --guardrails-smoke
```

Expected result:
```text
PASS count: 41
FAIL count: 0
```

## Current Smoke Output

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-02 23:38:48 UTC+00:00

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

## Required Deployment Checklist
- [ ] Confirm production branch is main.
- [ ] Confirm working tree is clean before deployment.
- [ ] Run: php -l app/Config/Solana.php
- [ ] Run: php -l app/Commands/SolanaWalletSecretsAudit.php
- [ ] Run: php -l app/Services/SolanaService.php
- [ ] Run: php -l app/Libraries/MyMIRaydium.php
- [ ] Run: php -l app/Libraries/MyMIPhantom.php
- [ ] Run: php -l app/Libraries/MyMISolflare.php
- [ ] Run: php spark solana:wallet-secrets:audit --guardrails-smoke
- [ ] Confirm FAIL count: 0.
- [ ] Confirm SOLANA_ALLOW_TRANSACTION_EXECUTION is not enabled unless explicitly approved.
- [ ] Confirm SOLANA_ALLOW_MAINNET_BROADCAST is not enabled unless explicitly approved.
- [ ] Confirm SOLANA_ALLOW_MAINNET_MINT is not enabled unless explicitly approved.
- [ ] Confirm SOLANA_ALLOW_PRIVATE_KEY_SUBMISSION is not enabled unless explicitly approved.

## Guardrail Environment Variables
- SOLANA_ALLOW_TRANSACTION_EXECUTION=false by default.
- SOLANA_ALLOW_MAINNET_BROADCAST=false by default.
- SOLANA_ALLOW_MAINNET_MINT=false by default.
- SOLANA_ALLOW_PRIVATE_KEY_SUBMISSION=false by default.
- SOLANA_REQUIRE_WALLET_SIGNATURE=true by default.
- SOLANA_DEFAULT_DRY_RUN=true by default.

## Protected Behavior
- Controller/API transaction-like actions fail closed unless config allows execution.
- Mainnet broadcast is disabled by default.
- Mainnet minting is disabled by default.
- Private-key based wallet submission is disabled by default.
- Wallet signature is required for non-dry-run execution.
- Provider-library swap/transfer/create-token methods return dry-run/preflight-style arrays.
- Provider-library responses preserve broadcast=false.
- Provider-library responses remove privateKey, secretKey, seedPhrase, and mnemonic fields from returned payloads.
- Permanent smoke mode validates 41 guardrail checks.

## Rollback Commands
```bash
cd /home/mymiteam/mymiwallet/site/current
git checkout main
git fetch origin --prune
git log --oneline -10
# Choose the last known-good merge commit before the Solana guardrail phase being reverted.
git revert <merge_commit_sha>
php spark solana:wallet-secrets:audit --guardrails-smoke
git status --short
```

## Post-Deployment Verification Commands
```bash
cd /home/mymiteam/mymiwallet/site/current
git status --short
git log -5 --oneline
php spark solana:wallet-secrets:audit --guardrails-smoke
curl -k -I https://www.mymiwallet.com/Exchange/Solana
curl -k -sS https://www.mymiwallet.com/API/Solana/health | head -c 500
```

## Release Notes
- Solana Exchange now has layered guardrails at route, controller/API, config, service/library, provider-library, and regression-report levels.
- No phase enabled real mainnet minting or transaction broadcast by default.
- The production operator command for regression validation is now: php spark solana:wallet-secrets:audit --guardrails-smoke
- Current verified result: PASS count 41, FAIL count 0.

## Result
- PASS: Release checklist generated.
- PASS: Permanent guardrail smoke returned FAIL count: 0.
- PASS: No transaction broadcast command was intentionally executed.
- PASS: No mainnet minting was enabled.
