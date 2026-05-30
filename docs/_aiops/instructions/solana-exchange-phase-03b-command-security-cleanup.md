# MyMI Solana Exchange Phase 03B: Command + Security Cleanup

## Branch

Use the existing branch:

fix/solana-exchange-phase-03b-command-security-cleanup

Do not create a new branch.

## Source Validation Context

Review the latest post-merge validation files under:

- docs/_aiops/reports/solana-phase-03/
- docs/_aiops/reports/solana-phase-03/post-merge-validation-*.txt
- docs/_aiops/reports/solana-phase-03/commands/spark-command-validation-*.txt
- docs/_aiops/reports/solana-phase-03/final-post-merge-summary-*.md

The validation found:

1. Missing Spark commands:
   - aiops:solana-healthcheck
   - aiops:solana-digest
   - aiops:solana-transaction-audit
   - exchange:create-tbi-project-coin-drafts

2. Private key exposure risks in:
   - app/Modules/APIs/Controllers/SolanaAPIController.php
   - app/Modules/Exchange/Controllers/SolanaController.php
   - app/Libraries/MyMISolana.php
   - app/Services/SolanaService.php

3. Mainnet default risk references:
   - default RPC fallback to https://api.mainnet-beta.solana.com
   - websocket fallback to wss://api.mainnet-beta.solana.com

4. Existing good routes:
   - API/Solana/health
   - API/Solana/wallet/(:segment)/balance
   - API/Solana/wallet/(:segment)/tokens
   - API/Management/Projects/TBI-Coins/(:num)
   - Exchange/Solana routes

## Mission

Complete the missing command layer and harden Solana private-key/mainnet safety.

Do not enable live mainnet minting.

Do not broadcast mainnet transactions.

Do not hardcode secrets.

Do not log private keys.

Do not return private keys to browser JSON.

## Required Patch 1: Add Missing Spark Commands

Create these command files using existing CI4 command conventions:

- app/Commands/SolanaHealthcheck.php
- app/Commands/SolanaDigest.php
- app/Commands/SolanaTransactionAudit.php
- app/Commands/CreateTbiProjectCoinDrafts.php

Command names must be:

- aiops:solana-healthcheck
- aiops:solana-digest
- aiops:solana-transaction-audit
- exchange:create-tbi-project-coin-drafts

### aiops:solana-healthcheck

Must:

- call SolanaService network health if available
- verify API/Solana/health route is registered
- write report to docs/_aiops/reports/solana-phase-03b/solana-healthcheck-YYYYMMDD-HHMMSS.md
- print only short summary
- never print secrets

### aiops:solana-digest

Must:

- summarize current Solana Exchange routes, files, and status
- include count of routes and key endpoints
- write report to docs/_aiops/reports/solana-phase-03b/solana-digest-YYYYMMDD-HHMMSS.md
- print only short summary

### aiops:solana-transaction-audit

Must:

- inspect available models/tables safely
- if transaction table exists, summarize status counts
- if table does not exist, report missing table without fatal error
- support optional --days=7
- write report to docs/_aiops/reports/solana-phase-03b/solana-transaction-audit-YYYYMMDD-HHMMSS.md
- print only short summary

### exchange:create-tbi-project-coin-drafts

Must:

- support --dry-run
- support --apply
- be idempotent
- default to dry-run if neither flag is supplied
- use existing TbiProjectCoinService/TbiProjectCoinModel if available
- use existing tables from migration 2026-05-27-000100_CreateTbiProjectCoinTables.php
- create or update draft/devnet records for:
  - TBI Solutions Project
  - TBI Coin
  - TBI Invest Coin
- use created_by/user ID 1 where applicable
- never mint tokens
- never call mainnet
- never broadcast transactions
- write report to docs/_aiops/reports/solana-phase-03b/tbi-project-coin-drafts-YYYYMMDD-HHMMSS.md

## Required Patch 2: Remove Private Key Browser Exposure

Inspect and patch:

- app/Modules/APIs/Controllers/SolanaAPIController.php
- app/Modules/Exchange/Controllers/SolanaController.php

Find any JSON responses returning:

- privateKey
- private_key
- access_token containing a private key
- secret_key
- secret_key_b64
- seed
- mnemonic

Patch them so responses return only safe fields:

- publicKey
- walletAddress
- address
- status
- success
- message
- metadata

If the current system stores private key as access_token, do not expose it. For now, preserve backward compatibility at the database layer if required, but do not return the secret to the browser.

Add a helper method if useful:

private function sanitizeWalletPayload(array $wallet): array

It must unset/remove:

- privateKey
- private_key
- access_token
- secret
- secret_key
- secret_key_b64
- seed
- mnemonic

## Required Patch 3: Mainnet Safety Guard

Inspect and patch:

- app/Libraries/MyMISolana.php
- app/Services/SolanaService.php
- app/Modules/APIs/Controllers/SolanaAPIController.php
- app/Modules/Exchange/Controllers/SolanaController.php

Requirements:

- Token creation/minting must default to devnet/draft.
- Mainnet minting must be blocked unless env('SOLANA_ALLOW_MAINNET_MINTING') === 'true'.
- Mainnet broadcast must be blocked unless env('SOLANA_ALLOW_MAINNET_BROADCAST') === 'true'.
- Add a reusable guard method where appropriate.
- If network is mainnet-beta and action is mint/broadcast, return a safe failure JSON/message.
- Do not break read-only mainnet market data if it is already used for prices.

## Required Patch 4: Standard JSON Envelope

For newly patched command-support/API methods, use:

{
  "success": true|false,
  "message": "...",
  "data": {},
  "errors": {},
  "meta": {
    "request_id": "...",
    "network": "...",
    "timestamp": "..."
  }
}

Do not refactor unrelated endpoints unless needed to remove private-key exposure.

## Required Patch 5: Validation Docs

Create/update:

- docs/_aiops/reports/solana-phase-03b-validation.md
- docs/_aiops/checklists/solana-phase-03b-security-readiness.md

Include:

- files changed
- commands added
- routes verified
- private-key exposure fixes
- mainnet guardrail fixes
- draft coin creation validation
- remaining risks

## Required Validation Commands

Run and document results:

php -l app/Commands/SolanaHealthcheck.php
php -l app/Commands/SolanaDigest.php
php -l app/Commands/SolanaTransactionAudit.php
php -l app/Commands/CreateTbiProjectCoinDrafts.php
php -l app/Modules/APIs/Controllers/SolanaAPIController.php
php -l app/Modules/Exchange/Controllers/SolanaController.php
php -l app/Libraries/MyMISolana.php
php -l app/Services/SolanaService.php

php spark list | grep -Ei "aiops:solana|exchange:create-tbi"
php spark aiops:solana-healthcheck
php spark aiops:solana-digest
php spark aiops:solana-transaction-audit --days=7
php spark exchange:create-tbi-project-coin-drafts --dry-run

Only run this if dry-run is clean:

php spark exchange:create-tbi-project-coin-drafts --apply

## Final Output Required

When finished, provide:

1. Files changed.
2. Commands added.
3. Private-key exposure points removed.
4. Mainnet guardrails added.
5. Draft coin records created or dry-run status.
6. Validation commands run.
7. Remaining risks.
