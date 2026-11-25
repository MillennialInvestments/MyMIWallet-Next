# MYMI-XCHAIN-001 Run Progress Ledger

## Run Overview
- **Run ID**: MYMI-XCHAIN-001
- **Started**: 2026-11-25 22:50:00 UTC
- **Host**: TBI-iMac (gq-ai01 staging target)
- **Repo**: MillennialInvestments/mymiwallet-next
- **Base**: `main` (`bfea65269223c722ad6b4e52b205dbfa12e270d2`)
- **Staging Integration Branch**: `integration/mymi-xchain-001`
- **Run Order**: W0, W1, W8, W4, W2, W3, W5, W6, W7, W9, W10, W11

---

## Baseline Inventory (W0)

### 1. Test Suite Baseline
- **CryptoPay Suite** (`vendor/bin/phpunit tests/unit/CryptoPay`):
  - 18 tests, 101 assertions, 0 failures, 0 errors (PASS)
- **Full Suite Test Count** (`vendor/bin/phpunit --list-tests`):
  - 746 test cases listed
- **Form Certification Smoke** (`bash tests/smoke/form-certification-smoke.sh`):
  - Route & handler contracts: 7 tests, 87 assertions (PASS)
  - Gap ratchet: 1 test, 2 assertions (PASS)
  - Inventory: PASS 317, FAIL 0, BLOCKED 190, SKIPPED 32

### 2. Feature Flags Baseline (`app/Config/Features.php`)
- `FEATURE_BUDGET`: `true`
- `FEATURE_INVESTMENTS`: `true`
- `FEATURE_WATCHLIST`: `true`
- `FEATURE_TRADE_ALERTS`: `true`
- `FEATURE_WALLETS`: `false`
- `FEATURE_PREDICTIONS`: `false`
- `FEATURE_MARKETING_AUTOMATION`: `true`
- `FEATURE_SOLANA_TRADING`: `false`
- `FEATURE_AUCTIONS`: `false`
- `FEATURE_PROJECT_INVESTING`: `false`
- `FEATURE_MYMIGOLD_PURCHASES`: `false`
- `FEATURE_MEMBERSHIP_PURCHASES`: `false`
- `FEATURE_MEMBERSHIP_SUBSCRIPTIONS`: `false`

### 3. Routes Baseline (Key Payment / Crypto / Gold / Exchange / MDIT)
- `GET /Pay/Crypto` -> `\App\Modules\User\Controllers\SolanaPayController::index`
- `GET /Pay/Crypto/Status/(:segment)` -> `\App\Modules\User\Controllers\SolanaPayController::cryptoStatus/$1`
- `GET /Pay/Solana` -> `\App\Modules\User\Controllers\SolanaPayController::index`
- `GET /Pay/Solana/Status/(:segment)` -> `\App\Modules\User\Controllers\SolanaPayController::status/$1`
- `GET /API/SolanaPay/Tx/(:segment)` -> `\App\Modules\APIs\Controllers\SolanaPayTxController::describe/$1`
- `OPTIONS /API/SolanaPay/Tx/(:segment)` -> `\App\Modules\APIs\Controllers\SolanaPayTxController::options/$1`
- `GET /Purchase/MyMIGold` -> `(Closure)` (Redirect / placeholder)
- `GET /How-It-Works/Purchase/MyMIGold` -> `(Closure)`
- `POST /Wallets/Purchase/MyMIGold` -> `\App\Modules\User\Controllers\WalletsController::purchaseMyMIGold`
- `GET /API/Mdit/kyc/status`, `POST /API/Mdit/kyc/start`, `POST /API/Mdit/accreditation/attest`, `POST /API/Mdit/deposits/initiate`, `POST /API/Mdit/deposits/confirm`, `POST /API/Mdit/issuance/mint`, `POST /API/Mdit/redemptions/request`, `GET /API/Mdit/portfolio/summary`

### 4. Commands Baseline
- `cryptopay:reconcile`: Sweep open CryptoPay requests and update confirmations
- `cryptopay:test-checkout`: Generate test checkout JSON
- `solanapay:reconcile`: Sweep open SolanaPay requests
- `mdit:nav:compute_daily`: Compute daily MDIT NAV
- `exchange:create-tbi-project-coin-drafts`: Create/update project coin drafts

### 5. Migrations Baseline
- `2026-11-25-000100_CreateCryptoPayRequests.php` (`bf_crypto_pay_requests`)
- `2026-11-23-000400_CreateSolanaPayRequests.php` (`bf_solana_pay_requests`)
- `2026-11-23-000300_AddSolanaFeeReceiptStatus.php`
- `2026-11-23-000200_CreateSolanaFeeReceipts.php`
- `2026-04-03-000100_AddExchangeSymbolToProjects.php`
- `2026-04-01-000110_CreateMditAuthRoles.php`
- `2026-04-01-000105_CreateMditPhase1Tables.php`
- `2026-03-26-000140_AddProjectExchangeBridgeFlags.php`

---

## Wave Execution Table

| Wave | Name | Branch | PR | Tests Run | Result | Notes / Fleet Review |
| --- | --- | --- | --- | --- | --- | --- |
| W0 | Baseline & Ledgers | `feature/mymi-xchain-001-w0-baseline` | [#778](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/778) | 18 CryptoPay / 746 suite / smoke PASS | PASS | Baseline established; ledgers initialized. |
| W1 | Chain Hardening | `feature/mymi-xchain-001-w1-chain-hardening` | [#779](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/779) | 25 CryptoPay / form smoke 319 PASS | PASS | Keyed RPC fallback, wallets.mjs RBF/bump, alerts, support admin, sanctions screen |
| W8 | Compliance & Sanctions | `feature/mymi-xchain-001-w8-compliance-tooling` | [#780](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/780) | 5 tests / 1016 assertions / benchmark <5ms | PASS | OFAC SDN updater, hash verification, offline seed, sub-5ms screening |
| W4 | MyMI Gold In-App Credit | `feature/mymi-xchain-001-w4-gold-in-app-credit` | [#781](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/781) | 6 tests / 44 assertions / smoke PASS | PASS | Closed-loop ledger bf_gold_ledger, pricing discount, cap, fulfillers |
| W2 | BTC Address Pool | `feature/mymi-xchain-001-w2-btc-address-pool` | [#782](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/782) | 28 CryptoPay tests / 143 assertions | PASS | Pre-generated address pool bf_btc_address_pool, import command, address matcher |
| W3 | EVM One-Click Pay | `feature/mymi-xchain-001-w3-evm-one-click` | [#783](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/783) | 31 CryptoPay (149 assertions) / Node test 3 PASS | PASS | Call-data encoding, chainId pre-verification, zero external npm deps |
| W5 | Non-Custodial Swaps | `feature/mymi-xchain-001-w5-non-custodial-swaps` | | | PENDING | |
| W6 | MyMI Exchange (Paper) | `feature/mymi-xchain-001-w6-exchange-paper` | | | PENDING | |
| W7 | MyMI Coin on MDIT | `feature/mymi-xchain-001-w7-mymicoin-mdit` | | | PENDING | |
| W9 | Staging Integration | `integration/mymi-xchain-001` | | | PENDING | |
| W10 | Production Promotion Packets | `feature/mymi-xchain-001-w10-prod-packets` | | | PENDING | |
| W11 | Closeout & Final Report | `feature/mymi-xchain-001-w11-closeout` | | | PENDING | |
