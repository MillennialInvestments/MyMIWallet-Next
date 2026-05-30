# MyMI Solana Exchange Phase 03 Codex Build

Use the current branch:

feature/solana-exchange-phase-02-readiness

Use this readiness report as source context:

docs/_aiops/reports/solana-phase-02/phase-02-readiness-20260530-055719.txt

## Mission

Upgrade the existing MyMI Solana Exchange into a production-grade, supportable, real-time user experience with safe project coin draft creation for:

- TBI Solutions Project
- TBI Coin
- TBI Invest Coin

Do not enable live mainnet minting. Do not broadcast mainnet transactions. Do not hardcode secrets.

## Current Confirmed Surface Area

The repository already contains:

- app/Libraries/MyMISolana.php
- app/Libraries/MyMIRaydium.php
- app/Libraries/MyMIPhantom.php
- app/Libraries/MyMISolflare.php
- app/Libraries/MyMICoin.php
- app/Libraries/MyMIGold.php
- app/Libraries/MyMIDexScreener.php
- app/Services/SolanaService.php
- app/Services/TbiProjectCoinService.php
- app/Models/SolanaModel.php
- app/Models/TbiProjectCoinModel.php
- app/Modules/APIs/Controllers/SolanaAPIController.php
- app/Modules/APIs/Controllers/TbiProjectCoinsAPIController.php
- app/Modules/Exchange/Controllers/SolanaController.php
- app/Modules/Exchange/Views/Solana/index.php
- app/Modules/Exchange/Views/Solana/connectWallet.php
- app/Modules/Exchange/Views/Solana/trade.php
- app/Modules/Exchange/Views/Solana/swap.php
- app/Modules/Exchange/Views/Solana/orders.php
- app/Modules/Exchange/Views/Solana/createToken.php

## Primary Build Outcomes

### 1. Solana Backend Safety

Inspect and patch:

- app/Libraries/MyMISolana.php
- app/Services/SolanaService.php
- app/Modules/Exchange/Controllers/SolanaController.php
- app/Modules/APIs/Controllers/SolanaAPIController.php

Requirements:

- Ensure default network is explicit and safe.
- Add a helper to resolve Solana network safely.
- Add a hard guard that blocks mainnet minting unless explicitly allowed by environment variable and admin confirmation.
- Ensure RPC endpoint selection does not silently default to mainnet for minting/test workflows.
- Ensure RPC 403, 429, timeout, malformed JSON, and unavailable endpoint errors return consistent JSON.
- Ensure network status health checks are cacheable and non-fatal.
- Ensure transaction status lookup by signature exists or is added.
- Ensure wallet address validation is reusable.
- Ensure token mint address validation is reusable.
- Ensure failed transaction paths call support/team notification hooks.
- Ensure no private key is logged.
- Ensure no private key is returned to front-end JSON.

### 2. Project Coin Draft Creation

Inspect and patch:

- app/Services/TbiProjectCoinService.php
- app/Models/TbiProjectCoinModel.php
- app/Modules/APIs/Controllers/TbiProjectCoinsAPIController.php
- app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php

Requirements:

- Add or improve a safe draft creation method for:
  - TBI Solutions Project
  - TBI Coin
  - TBI Invest Coin
- Use existing tables/migrations if possible.
- Do not create duplicate tables if existing structures already support this.
- Add idempotent draft creation: running command multiple times should update or skip existing records safely.
- Default coin records to devnet/draft status.
- Mainnet minting must remain blocked.
- Store creator user ID 1 where applicable.
- Add clear metadata fields for:
  - project name
  - coin name
  - symbol
  - network
  - decimals
  - supply
  - status
  - mint address
  - metadata URI
  - created_by
  - created_at
  - updated_at

### 3. Spark Commands

Add Spark commands if missing:

- app/Commands/SolanaHealthcheck.php
- app/Commands/SolanaDigest.php
- app/Commands/SolanaTransactionAudit.php
- app/Commands/CreateTbiProjectCoinDrafts.php

Command names:

- aiops:solana-healthcheck
- aiops:solana-digest
- aiops:solana-transaction-audit
- exchange:create-tbi-project-coin-drafts

Requirements:

- All commands write report files to docs/_aiops/reports or writable/aiops/reports.
- Commands should print short summaries only.
- Commands should never expose secrets.
- Commands should return non-zero exit code only for real failures.
- Draft coin command should support dry run:

php spark exchange:create-tbi-project-coin-drafts --dry-run

- Draft coin command should support apply:

php spark exchange:create-tbi-project-coin-drafts --apply

### 4. Front-End Real-Time UX

Inspect and patch:

- app/Modules/Exchange/Views/Solana/index.php
- app/Modules/Exchange/Views/Solana/connectWallet.php
- app/Modules/Exchange/Views/Solana/trade.php
- app/Modules/Exchange/Views/Solana/swap.php
- app/Modules/Exchange/Views/Solana/orders.php
- app/Modules/Exchange/Views/Solana/createToken.php
- public/assets/js/Exchange/Connection.js
- public/assets/js/Exchange/Connection2.js
- app/Views/themes/dashboard/partials/custom-js/Exchange-js.php

Requirements:

- Add a shared Solana frontend state object.
- Add CSRF-safe fetch helper.
- Add wallet connect/disconnect/refresh helper.
- Add submit locks to prevent duplicate wallet, swap, mint, or order requests.
- Add status UI for:
  - checking wallet
  - connected
  - disconnected
  - pending transaction
  - submitted transaction
  - confirming transaction
  - confirmed transaction
  - failed transaction
- Poll Exchange/Solana/fetchFrontendData safely every 15-30 seconds when the tab is visible.
- Pause polling when the browser tab is hidden.
- Refresh DataTables/order panels without full page reload.
- Show clear user-facing errors for:
  - wallet extension missing
  - RPC degraded
  - token quote expired
  - failed swap
  - failed wallet refresh
  - CSRF/session expired
- Do not break Bootstrap 4.6 or existing jQuery/DataTables patterns.

### 5. Support / Team Management

Add or improve support visibility:

- Failed transaction audit log
- Transaction lookup by user ID, wallet address, signature, mint address, status, date range
- Team notification hook for:
  - Solana RPC outage
  - mint failure
  - failed user transaction
  - repeated failed transaction from same wallet/user
  - swap/trade failure
- Notifications should use existing logging/notification infrastructure if present.
- Do not invent new secrets.
- Use env values for webhook/email recipients.

### 6. JSON Response Standard

All Solana and project coin endpoints should return:

{
  "success": true|false,
  "message": "Human readable message",
  "data": {},
  "errors": {},
  "meta": {
    "request_id": "...",
    "network": "devnet|testnet|mainnet-beta",
    "timestamp": "..."
  }
}

### 7. Tests / Validation

Add or update validation commands and docs:

- php -l changed PHP files
- php spark routes filtered for Solana and TBI project coins
- php spark aiops:solana-healthcheck
- php spark aiops:solana-digest
- php spark aiops:solana-transaction-audit
- php spark exchange:create-tbi-project-coin-drafts --dry-run
- php spark exchange:create-tbi-project-coin-drafts --apply

Create:

- docs/_aiops/reports/solana-phase-03-validation.md
- docs/_aiops/checklists/solana-phase-03-launch-readiness.md

## Patch Rules

- Do not modify unrelated modules.
- Do not hardcode secrets.
- Do not enable mainnet minting.
- Do not log private keys.
- Do not return private keys to the browser.
- Prefer complete replacement methods/functions.
- Include exact file placement in comments or docs.
- Keep changes PHP 8.2-compatible.
- Keep UI Bootstrap 4.6-compatible.
- Maintain existing CodeIgniter 4 module conventions.
- Use existing services/models where possible.
- Preserve existing routes unless fixing a confirmed duplicate or broken mapping.

## Final Output Required

After implementation, provide:

1. Files changed.
2. Commands added.
3. Routes added/changed.
4. Database changes used.
5. Front-end UX changes.
6. Safety controls added.
7. Team/support workflow added.
8. Validation commands run.
9. Remaining risks.
10. Whether TBI Solutions Project, TBI Coin, and TBI Invest Coin are ready as draft records.
