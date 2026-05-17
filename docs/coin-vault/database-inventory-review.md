# Coin Vault Database Inventory Review

## Inventory command status

The requested `php spark db:table-list --save=1` command was added. In this development environment it could not connect to MySQL:

```text
Unable to connect to the database.
Main connection [MySQLi]: Connection refused
```

Because the live table inventory could not be produced here, this patch does **not** add migrations. The module contains model/service mappings and defensive table checks so the schema can be reviewed before a migration is created.

## Existing tables/code likely reusable

Based on existing models and migrations, the following existing areas are relevant:

- `bf_exchanges` via `ExchangeModel` / `SolanaModel` for current exchange transactions and Solana records.
- `bf_exchanges_assets` via `ExchangeModel::insertToken()` for listed exchange/token assets.
- `bf_exchanges_coin_addresses` via `SolanaModel::getDefaultAddressFromExchangeTable()` for user Solana addresses.
- `bf_users_wallet` and subsidiary wallet/account tables via `WalletModel` for existing financial wallet records.
- `bf_token_transfers` via `WalletModel` for existing token transfer records.
- `users` via `UserModel` for contribution `user_email` lookup.

## Recommended new schema pending inventory review

Coin Vault has project-specific requirements that are not safely covered by the generic exchange/wallet tables alone:

- Project coin registry with vault/released supply fields.
- Per-project coin balances with available, locked, voting, lifetime earned, and lifetime withdrawn amounts.
- Ledger-first accounting rows for every project coin movement.
- External contribution queue with duplicate `source/source_id` prevention.
- Payout request lifecycle table.
- External event accept/reject audit log.

Recommended table names are configured in `Config\CoinVault::$tables` and should be converted into a guarded CI4 migration only after `writable/reports/db-table-list-latest.md` is reviewed on an environment with database access.

## Suggested indexes for future migration

- `bf_coin_vault_projects`: unique (`project_key`, `coin_symbol`)
- `bf_coin_vault_wallets`: unique (`project_id`, `user_id`)
- `bf_coin_vault_contributions`: unique (`source`, `source_id`), indexes on `status`, `project_id`, `user_id`
- `bf_coin_vault_ledger`: indexes on `project_id`, `wallet_id`, `user_id`, `transaction_type`, `created_at`
- `bf_coin_vault_payout_requests`: indexes on `status`, `project_id`, `user_id`
- `bf_coin_vault_external_event_logs`: index on (`source`, `source_id`, `status`)
