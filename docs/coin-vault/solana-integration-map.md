# Coin Vault Solana Integration Map

Coin Vault does not replace the current Solana exchange implementation. It adds an adapter-friendly accounting layer around existing Solana and Exchange code.

## Discovered Solana / Exchange files

Primary files inspected or mapped:

- `app/Modules/APIs/Controllers/SolanaAPIController.php`
- `app/Modules/APIs/Controllers/WalletsAPIController.php`
- `app/Modules/Exchange/Controllers/BlockchainController.php`
- `app/Modules/Exchange/Controllers/ExchangeController.php`
- `app/Modules/Exchange/Controllers/SolanaController.php`
- `app/Modules/Exchange/Models/ExchangeOrderModel.php`
- `app/Modules/Management/Controllers/ExchangeAdminController.php`
- `app/Modules/Management/Controllers/WalletsAdminController.php`
- `app/Modules/User/Controllers/WalletsController.php`
- `app/Libraries/MyMIExchange.php`
- `app/Libraries/MyMIExchangeAdapter.php`
- `app/Libraries/MyMISolana.php`
- `app/Libraries/MyMIWallet.php`
- `app/Libraries/MyMIWallets.php`
- `app/Services/SolanaService.php`
- `app/Services/ExchangeService.php`
- `app/Models/ExchangeModel.php`
- `app/Models/SolanaModel.php`
- `app/Models/WalletModel.php`
- `app/Models/TokenModel.php`

## Adapter method mapping

| Coin Vault adapter need | Current mapping |
|---|---|
| `createProjectToken()` | Existing `SolanaController::createToken()` plus `MyMISolana` metadata helpers. |
| `mintToVault()` | Existing `SolanaController::mintTokens()` and Solana transaction helpers; record `blockchain_mint` in Coin Vault ledger. |
| `releaseFromVaultToUser()` | Existing Solana wallet address lookup/transfer path; record `blockchain_transfer` in ledger. |
| `getMintAddress()` | Coin Vault project registry `solana_mint_address`; may point to existing token asset rows. |
| `getTokenBalance()` | `SolanaService::getTokenAccounts()` / portfolio reads. |
| `recordBlockchainTx()` | Coin Vault ledger `blockchain_network` and `blockchain_tx`, optionally cross-linked to `bf_exchanges`. |

## Manual review required

Before enabling on-chain mint/release automation, confirm:

- Which existing Solana method performs a production-safe SPL token mint.
- Which vault authority/key custody process is approved.
- Whether MyMI Wallet should mint on-chain immediately or continue internal-ledger-first until payout/transfer.
