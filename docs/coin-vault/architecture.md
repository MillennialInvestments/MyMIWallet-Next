# Coin Vault Architecture

Coin Vault is an additive module under `app/Modules/CoinVault` that lets MyMI Wallet act as a central project coin creator, vault, ledger, and payout engine without rebuilding the existing Exchange or Solana flows.

## Scope

The module starts with TBI Coin and TBI In-App Coin support for approved contribution events from `timothyburks.com`, then generalizes to future ownership, in-app, investment, and utility coins.

## Design principles

- Reuse existing MyMI Exchange, wallet, token, transaction, and Solana code.
- Keep accounting ledger-first: every movement is represented by a ledger row before/with balance updates.
- Keep ownership/voting percentage dynamic: `user voting balance / released supply * 100`.
- Keep schema work reviewable: no migrations are created in this patch because the live database inventory command could not connect in the current environment.

## Module map

- Controllers: `CoinVaultController`, `Api/CoinVaultApiController`
- Models: project registry, wallets, ledger, contributions, payout requests
- Services: `CoinVaultService`, `ExternalContributionService`, `CoinRewardRuleService`
- Views: dashboard, project, contributions, payouts, wallet
- Commands: `coinvault:audit`

## Required recommended tables pending review

| Purpose | Recommended table |
|---|---|
| Project coin registry | `bf_coin_vault_projects` |
| Project coin user balances | `bf_coin_vault_wallets` |
| Ledger-first accounting | `bf_coin_vault_ledger` |
| External contribution queue | `bf_coin_vault_contributions` |
| Payout/buyback requests | `bf_coin_vault_payout_requests` |
| External event audit log | `bf_coin_vault_external_event_logs` |

## Existing MyMI Wallet assets reused

- `app/Libraries/MyMIExchange.php` for exchange dashboard/data access.
- `app/Libraries/MyMISolana.php` for Solana wallet/token helper surface.
- `app/Services/SolanaService.php` for Solana RPC reads and token-account balances.
- `app/Models/ExchangeModel.php`, `app/Models/SolanaModel.php`, `app/Models/WalletModel.php`, and `app/Models/TokenModel.php` for existing exchange, wallet, and token tables.
- Existing dashboard theme via `renderTheme(..., ['layout' => 'dashboard'])`.

## Initial defaults

- Cash contribution: `$1 = 1 coin`
- Hourly contribution: `approved hours × configured hourly rate`
- Task mining: `every 5 approved tasks = 1 coin`
- External events default to `pending`; they are not auto-released.
