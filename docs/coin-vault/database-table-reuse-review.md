# CoinVault Database Table Reuse Review

CoinVault now uses the existing TBI Project Coin schema instead of unresolved `bf_coin_vault_*` tables.

## Reused tables

- `bf_tbi_project_coins`
- `bf_tbi_coin_contribution_categories`
- `bf_tbi_coin_contribution_ledger`

## Added supporting tables

- `bf_tbi_coin_wallets`
- `bf_tbi_coin_payout_requests`
- `bf_tbi_coin_external_event_logs`

## Design notes

`bf_tbi_coin_contribution_ledger` is the canonical contribution ledger. Pending external contribution events are inserted into that table. Admin approval updates the same row, credits the user's TBI coin wallet, and updates project coin release/vault balances. This avoids duplicate contribution rows while preserving ledger-first accounting.
