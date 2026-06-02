# Solana Runtime Hardening - Phase 02 Authenticated Runtime Contract Prep

- Generated UTC: Tue Jun  2 01:58:28 AM UTC 2026
- Branch: hardening/solana-exchange-runtime-phase-01
- HEAD: 7b7699131

## Why Phase 02 Is Needed

Phase 01 curl smoke checks returned HTTP 200 but redirected to /index.php/login. That confirms the endpoints are protected by session/auth middleware, so the next meaningful runtime validation must be performed from an authenticated browser session.

## Current Git State

```text
?? docs/_aiops/reports/solana-runtime-hardening/phase-02-authenticated-runtime-contract-prep-20260602-015827.md
7b7699131 Inventory Solana Exchange runtime hardening targets
cfad2c5a4 Merge Solana token logo fallback cleanup
3924def13 Sanitize Solana token logo URLs before rendering
99e990f15 Fix Solana token logo fallback handling
72c7d86a4 Merge pull request #492 from MillennialInvestments/fix/solana-token-logo-fallbacks
```

## Solana Route Output

```text
| GET     | API/Solana/health                                                           | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::health                                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/updateExchange                                                   | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateExchange                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/getMarketPrice/([^/]+)                                           | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::get/$1                                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/getCoinAmount/([^/]+)                                            | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::getCoinAmount/$1                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/getMarketPrice                                                   | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::getMarketPrice                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/getTokenPrice/([^/]+)                                            | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::getTokenPrice/$1                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/getExchangePrice/([^/]+)                                         | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::getExchangePrice/$1                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/getAssetsData                                                    | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::getAssetsData                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/provisionDefaultWallet                                           | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::provisionDefaultWallet                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/updatePrices                                                     | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::updateSolanaPrices                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/updateTokens                                                     | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::updateSolanaTokens                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/wallet/([^/]+)/balance                                           | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::getBalance/$1                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/wallet/([^/]+)/tokens                                            | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::getTokenAccounts/$1                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Dashboard/Transaction-Modal/([^/]+)                                         | load-modal-1-segment                           | \App\Modules\User\Controllers\DashboardController::loadModalContent/$1                                | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Dashboard/Transaction-Modal/([^/]+)/([^/]+)                                 | load-modal-2-segment                           | \App\Modules\User\Controllers\DashboardController::loadModalContent/$1/$2                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Dashboard/Transaction-Modal/([^/]+)/([^/]+)/([^/]+)                         | load-modal-3-segment                           | \App\Modules\User\Controllers\DashboardController::loadModalContent/$1/$2/$3                          | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Dashboard/Transaction-Modal/([^/]+)/([^/]+)/([^/]+)/([^/]+)                 | load-modal-4-segment                           | \App\Modules\User\Controllers\DashboardController::loadModalContent/$1/$2/$3/$4                       | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Dashboard/Transaction-Modal/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)         | load-modal-5-segment                           | \App\Modules\User\Controllers\DashboardController::loadModalContent/$1/$2/$3/$4/$5                    | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Dashboard/Transaction-Modal/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+) | load-modal-6-segment                           | \App\Modules\User\Controllers\DashboardController::loadModalContent/$1/$2/$3/$4/$5/$6                 | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Management/Exchange                                                         | »                                              | \App\Modules\Management\Controllers\ExchangeAdminController::index                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Exchange                                               | »                                              | \App\Modules\Management\Controllers\MarketingController::index                                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Exchange/Edit/([^/]+)                                  | »                                              | \App\Modules\Management\Controllers\MarketingController::edit/$1                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Exchange/Top-Communities                               | »                                              | \App\Modules\Management\Controllers\MarketingController::topCommunities                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Exchange/Top-Communities/([^/]+)                       | »                                              | \App\Modules\Management\Controllers\MarketingController::topCommunities/$1                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Projects/ReconcileFundExchange/([0-9]+)                          | »                                              | \App\Modules\Management\Controllers\ProjectsAdminController::reconcileFundExchange/$1                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Exchange/Solana                                                             | »                                              | \App\Modules\Exchange\Controllers\SolanaController::index                                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Swap                                                        | »                                              | \App\Modules\Exchange\Controllers\SolanaController::coinSwap                                          | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Assets                                                      | »                                              | \App\Modules\Exchange\Controllers\SolanaController::assets                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Create                                                      | »                                              | \App\Modules\Exchange\Controllers\SolanaController::create                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange                                                                    | mymi-exchange                                  | \App\Modules\Exchange\Controllers\ExchangeController::index                                           | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Projects/(.*)                                                      | »                                              | \App\Modules\Exchange\Controllers\ExchangeController::project/$1                                      | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/MetaMask                                                           | mymi-metamask                                  | \App\Modules\Exchange\Controllers\MetaMaskController::index                                           | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Test-Page                                                   | mymi-solana-test-page                          | \App\Modules\Exchange\Controllers\SolanaController::testPage                                          | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Wallet/Disconnect/([^/]+)                                   | mymi-solana-create                             | \App\Modules\Exchange\Controllers\SolanaController::disconnectWallet/$1                               | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Import                                                      | mymi-solana-import                             | \App\Modules\Exchange\Controllers\SolanaController::import                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Create/Wallet                                               | mymi-solana-create-wallet                      | \App\Modules\Exchange\Controllers\SolanaController::create                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Import/Wallet                                               | mymi-solana-import-wallet                      | \App\Modules\Exchange\Controllers\SolanaController::importWallet                                      | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Wallet/Verify-Ownership                                     | mymi-solana-verify-wallet                      | \App\Modules\Exchange\Controllers\SolanaController::verifyWalletOwnership                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Wallet/Execute-Swap                                         | mymi-solana-execute-swap                       | \App\Modules\Exchange\Controllers\SolanaController::executeSwap                                       | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Wallet/ViewAssets                                           | mymi-solana-view-assets                        | \App\Modules\Exchange\Controllers\SolanaController::viewAssets                                        | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | API/Management/Projects/TBI-Coins/Prepare-Solana-Mint/([0-9]+)              | »                                              | \App\Modules\APIs\Controllers\TbiProjectCoinsAPIController::prepareSolanaMint/$1                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey permission:admin.access                    | permission:admin.access cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar |
| POST    | API/Management/Projects/TBI-Coins/Prepare-Exchange-Asset/([0-9]+)           | »                                              | \App\Modules\APIs\Controllers\TbiProjectCoinsAPIController::prepareExchangeAsset/$1                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey permission:admin.access                    | permission:admin.access cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar |
| POST    | API/Alerts/updateExchange                                                   | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateExchange                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Solana/transfer                                                         | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::transfer                                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Solana/swap/quote                                                       | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::quote                                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Solana/swap/execute                                                     | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::swap                                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Solana/token/create                                                     | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::createToken                                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Solana/token/mint                                                       | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::mint                                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Wallets/Plaid/Exchange                                                  | »                                              | \App\Modules\APIs\Controllers\WalletsAPIController::plaidExchange                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | Management/Marketing/Exchange/Edit/([^/]+)                                  | »                                              | \App\Modules\Management\Controllers\MarketingController::edit/$1                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | Management/Projects/RegisterFundExchangeAsset/([0-9]+)                      | »                                              | \App\Modules\Management\Controllers\ProjectsAdminController::registerFundExchangeAsset/$1             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | Exchange/DigiByte/fetchFrontendData                                         | »                                              | \App\Modules\Exchange\Controllers\DigiByteController::fetchFrontendData                               | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | csrf login cspoff sessionTracker requestLifecycle observability jsonException toolbar                      |
| POST    | Exchange/DigiByte/provisionDefaultWallet                                    | »                                              | \App\Modules\Exchange\Controllers\DigiByteController::provisionDefaultWallet                          | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | csrf login cspoff sessionTracker requestLifecycle observability jsonException toolbar                      |
| POST    | Exchange/DigiByte/disconnectWallet                                          | »                                              | \App\Modules\Exchange\Controllers\DigiByteController::disconnectWallet                                | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | csrf login cspoff sessionTracker requestLifecycle observability jsonException toolbar                      |
| POST    | Exchange/DigiByte/refreshWallet                                             | »                                              | \App\Modules\Exchange\Controllers\DigiByteController::refreshWallet                                   | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | csrf login cspoff sessionTracker requestLifecycle observability jsonException toolbar                      |
| POST    | Exchange/DigiByte/getAssets                                                 | »                                              | \App\Modules\Exchange\Controllers\DigiByteController::getAssets                                       | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | csrf login cspoff sessionTracker requestLifecycle observability jsonException toolbar                      |
| POST    | Exchange/DigiByte/createWallet                                              | »                                              | \App\Modules\Exchange\Controllers\DigiByteController::createWallet                                    | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | csrf login cspoff sessionTracker requestLifecycle observability jsonException toolbar                      |
| POST    | Exchange/DigiByte/connectWallet                                             | »                                              | \App\Modules\Exchange\Controllers\DigiByteController::connectWallet                                   | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | csrf login cspoff sessionTracker requestLifecycle observability jsonException toolbar                      |
| POST    | Exchange/MetaMask/connectWallet                                             | »                                              | \App\Modules\Exchange\Controllers\MetaMaskController::connectWallet                                   | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/MetaMask/disconnectWallet                                          | »                                              | \App\Modules\Exchange\Controllers\MetaMaskController::disconnectWallet                                | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/MetaMask/refreshWallet                                             | »                                              | \App\Modules\Exchange\Controllers\MetaMaskController::refreshWallet                                   | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/MetaMask/getAssets                                                 | »                                              | \App\Modules\Exchange\Controllers\MetaMaskController::getAssets                                       | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/MetaMask/generateWallet                                            | »                                              | \App\Modules\Exchange\Controllers\MetaMaskController::generateWallet                                  | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/MetaMask/signTransaction                                           | »                                              | \App\Modules\Exchange\Controllers\MetaMaskController::signTransaction                                 | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/MetaMask/verifySignature                                           | »                                              | \App\Modules\Exchange\Controllers\MetaMaskController::verifySignature                                 | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/MetaMask/sendAsset                                                 | »                                              | \App\Modules\Exchange\Controllers\MetaMaskController::sendAsset                                       | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/MetaMask/getTransactionStatus                                      | »                                              | \App\Modules\Exchange\Controllers\MetaMaskController::getTransactionStatus                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/MetaMask/getBalance                                                | »                                              | \App\Modules\Exchange\Controllers\MetaMaskController::getBalance                                      | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/MetaMask/validateAddress                                           | »                                              | \App\Modules\Exchange\Controllers\MetaMaskController::validateAddress                                 | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/MetaMask/getCurrentBlock                                           | »                                              | \App\Modules\Exchange\Controllers\MetaMaskController::getCurrentBlock                                 | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/MetaMask/estimateTransactionFee                                    | »                                              | \App\Modules\Exchange\Controllers\MetaMaskController::estimateTransactionFee                          | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/MetaMask/getNetworkStatus                                          | »                                              | \App\Modules\Exchange\Controllers\MetaMaskController::getNetworkStatus                                | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/MetaMask/deployContract                                            | »                                              | \App\Modules\Exchange\Controllers\MetaMaskController::deployContract                                  | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/MetaMask/callContractFunction                                      | »                                              | \App\Modules\Exchange\Controllers\MetaMaskController::callContractFunction                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/Create/Wallet                                               | »                                              | \App\Modules\Exchange\Controllers\SolanaController::create                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/createSolanaWallet                                          | »                                              | \App\Modules\Exchange\Controllers\SolanaController::createSolanaWallet                                | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/fetchFrontendData                                           | »                                              | \App\Modules\Exchange\Controllers\SolanaController::fetchFrontendData                                 | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | csrf login cspoff sessionTracker requestLifecycle observability jsonException toolbar                      |
| POST    | Exchange/Solana/provisionDefaultWallet                                      | »                                              | \App\Modules\Exchange\Controllers\SolanaController::provisionDefaultWallet                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | csrf login cspoff sessionTracker requestLifecycle observability jsonException toolbar                      |
| POST    | Exchange/Solana/Import/Wallet                                               | »                                              | \App\Modules\Exchange\Controllers\SolanaController::importWallet                                      | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/updatePrices                                                | »                                              | \App\Modules\Exchange\Controllers\SolanaController::updateSolanaPrices                                | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/updateTokens                                                | »                                              | \App\Modules\Exchange\Controllers\SolanaController::updateSolanaTokens                                | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/Wallet/Verify-Ownership                                     | »                                              | \App\Modules\Exchange\Controllers\SolanaController::verifyWalletOwnership                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/Wallet/Execute-Swap                                         | »                                              | \App\Modules\Exchange\Controllers\SolanaController::executeSwap                                       | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/Wallet/ViewAssets                                           | »                                              | \App\Modules\Exchange\Controllers\SolanaController::viewAssets                                        | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/Wallet/Connect                                              | mymi-solana-connect-wallet                     | \App\Modules\Exchange\Controllers\SolanaController::connectWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/Wallet/Disconnect                                           | mymi-solana-disconnect-wallet                  | \App\Modules\Exchange\Controllers\SolanaController::disconnectWallet                                  | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/Wallet/Refresh                                              | mymi-solana-refresh-wallet                     | \App\Modules\Exchange\Controllers\SolanaController::refreshWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Connect/MetaMask                                            | connect-wallet-metamask                        | \App\Modules\Exchange\Controllers\SolanaController::connectWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Disconnect/MetaMask                                         | disconnect-wallet-metamask                     | \App\Modules\Exchange\Controllers\SolanaController::disconnectWallet                                  | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Refresh/MetaMask                                            | refresh-wallet-metamask                        | \App\Modules\Exchange\Controllers\SolanaController::refreshWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Connect/Solflare                                            | connect-wallet-solflare                        | \App\Modules\Exchange\Controllers\SolanaController::connectWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Disconnect/Solflare                                         | disconnect-wallet-solflare                     | \App\Modules\Exchange\Controllers\SolanaController::disconnectWallet                                  | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Refresh/Solflare                                            | refresh-wallet-solflare                        | \App\Modules\Exchange\Controllers\SolanaController::refreshWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Connect/Phantom                                             | connect-wallet-phantom                         | \App\Modules\Exchange\Controllers\SolanaController::connectWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Disconnect/Phantom                                          | disconnect-wallet-phantom                      | \App\Modules\Exchange\Controllers\SolanaController::disconnectWallet                                  | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Refresh/Phantom                                             | refresh-wallet-phantom                         | \App\Modules\Exchange\Controllers\SolanaController::refreshWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Connect/TrustWallet                                         | connect-wallet-trustwallet                     | \App\Modules\Exchange\Controllers\SolanaController::connectWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Disconnect/TrustWallet                                      | disconnect-wallet-trustwallet                  | \App\Modules\Exchange\Controllers\SolanaController::disconnectWallet                                  | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Refresh/TrustWallet                                         | refresh-wallet-trustwallet                     | \App\Modules\Exchange\Controllers\SolanaController::refreshWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
```

## Solana Controller Methods

```text
app/Modules/Exchange/Controllers/SolanaController.php:57:    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
app/Modules/Exchange/Controllers/SolanaController.php:59:        parent::initController($request, $response, $logger);
app/Modules/Exchange/Controllers/SolanaController.php:100:    public function commonData(): array {
app/Modules/Exchange/Controllers/SolanaController.php:111:    private function solanaBasePayload(): array
app/Modules/Exchange/Controllers/SolanaController.php:155:     * Lightweight Solana-only payload for Exchange pages. Heavy modal data such
app/Modules/Exchange/Controllers/SolanaController.php:156:     * as transaction history is intentionally omitted until the modal endpoint is
app/Modules/Exchange/Controllers/SolanaController.php:159:    private function solanaPagePayload(): array
app/Modules/Exchange/Controllers/SolanaController.php:182:    private function cachedUserAccount(int $userId): array
app/Modules/Exchange/Controllers/SolanaController.php:192:    private function cachedUserSolanaSummary(int $userId): array
app/Modules/Exchange/Controllers/SolanaController.php:225:    private function cachedTopListedTokens(): array
app/Modules/Exchange/Controllers/SolanaController.php:234:    private function cachedSolanaPrice(): float
app/Modules/Exchange/Controllers/SolanaController.php:249:    private function cachedSolanaNetworkStatus(): array
app/Modules/Exchange/Controllers/SolanaController.php:263:    private function currentUserId(): int
app/Modules/Exchange/Controllers/SolanaController.php:268:    public function index() {
app/Modules/Exchange/Controllers/SolanaController.php:279:        return $this->renderTheme('App\Modules\Exchange\Views\Solana\index', $this->data);
app/Modules/Exchange/Controllers/SolanaController.php:282:    public function addExternalWallet()
app/Modules/Exchange/Controllers/SolanaController.php:285:            return $this->response->setStatusCode(405)->setJSON(['ok'=>false,'msg'=>'AJAX only']);
app/Modules/Exchange/Controllers/SolanaController.php:288:        if ($cuID <= 0) return $this->response->setStatusCode(401)->setJSON(['ok'=>false,'msg'=>'Auth required']);
app/Modules/Exchange/Controllers/SolanaController.php:296:            return $this->response->setStatusCode(422)->setJSON(['ok'=>false,'msg'=>'Invalid Solana address']);
app/Modules/Exchange/Controllers/SolanaController.php:301:            return $this->response->setJSON(['ok'=>true,'id'=>$id,'address'=>$addr,'label'=>$label]);
app/Modules/Exchange/Controllers/SolanaController.php:304:            return $this->response->setStatusCode(500)->setJSON(['ok'=>false,'msg'=>'Failed to add address']);
app/Modules/Exchange/Controllers/SolanaController.php:308:    public function setDefaultWallet()
app/Modules/Exchange/Controllers/SolanaController.php:311:            return $this->response->setStatusCode(405)->setJSON(['ok'=>false,'msg'=>'AJAX only']);
app/Modules/Exchange/Controllers/SolanaController.php:314:        if ($cuID <= 0) return $this->response->setStatusCode(401)->setJSON(['ok'=>false,'msg'=>'Auth required']);
app/Modules/Exchange/Controllers/SolanaController.php:317:        if ($id <= 0) return $this->response->setStatusCode(422)->setJSON(['ok'=>false,'msg'=>'Missing id']);
app/Modules/Exchange/Controllers/SolanaController.php:327:            return $this->response->setJSON(['ok'=>$ok]);
app/Modules/Exchange/Controllers/SolanaController.php:330:            return $this->response->setStatusCode(500)->setJSON(['ok'=>false,'msg'=>'Failed to set default']);
app/Modules/Exchange/Controllers/SolanaController.php:334:    public function apiGetTokens() {
app/Modules/Exchange/Controllers/SolanaController.php:336:        return $this->response->setJSON($tokens);
app/Modules/Exchange/Controllers/SolanaController.php:339:    public function assets() {
app/Modules/Exchange/Controllers/SolanaController.php:341:        return $this->renderTheme('App\Modules\Exchange\Views\Solana\assets', $this->data);
app/Modules/Exchange/Controllers/SolanaController.php:344:    private function calculateSwapFees($amount) {
app/Modules/Exchange/Controllers/SolanaController.php:350:    private function calculateTransactionFees($amount, $fromPrice) {
app/Modules/Exchange/Controllers/SolanaController.php:360:    public function coinSwap() {
app/Modules/Exchange/Controllers/SolanaController.php:362:        return $this->renderTheme('App\Modules\Exchange\Views\Solana\swap', $this->data);
app/Modules/Exchange/Controllers/SolanaController.php:365:    public function connectWallet() {
app/Modules/Exchange/Controllers/SolanaController.php:369:                $response = $this->MyMISolflare->connectWallet();
app/Modules/Exchange/Controllers/SolanaController.php:372:                $response = $this->MyMIPhantom->connectWallet();
app/Modules/Exchange/Controllers/SolanaController.php:375:                $response = $this->MyMIMetaMask->connectWallet();
app/Modules/Exchange/Controllers/SolanaController.php:378:                $response = $this->MyMITrustWallet->connectWallet();
app/Modules/Exchange/Controllers/SolanaController.php:381:                $response = ['status' => 'error', 'message' => 'Invalid wallet type'];
app/Modules/Exchange/Controllers/SolanaController.php:384:        return $this->response->setJSON($response);
app/Modules/Exchange/Controllers/SolanaController.php:387:    public function create() {
app/Modules/Exchange/Controllers/SolanaController.php:389:        return $this->renderTheme('App\Modules\Exchange\Views\Solana\create', $this->data);
app/Modules/Exchange/Controllers/SolanaController.php:392:    public function createSolanaWallet() {
app/Modules/Exchange/Controllers/SolanaController.php:425:                return $this->response->setJSON($this->jsonEnvelope(true, 'Wallet created safely.', ['publicKey' => $publicKey, 'walletAddress' => $publicKey]));
app/Modules/Exchange/Controllers/SolanaController.php:427:                return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
app/Modules/Exchange/Controllers/SolanaController.php:432:    public function createToken() {
app/Modules/Exchange/Controllers/SolanaController.php:447:            return $this->response->setJSON($this->jsonEnvelope(false, $guard['message'], $guard));
app/Modules/Exchange/Controllers/SolanaController.php:472:            return $this->response->setJSON(['status' => 'success', 'message' => 'Token created successfully.']);
app/Modules/Exchange/Controllers/SolanaController.php:474:            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to create token.']);
app/Modules/Exchange/Controllers/SolanaController.php:478:    public function confirmation($transactionId) {
app/Modules/Exchange/Controllers/SolanaController.php:482:            return redirect()->to('/Exchange/Solana')->with('error', 'Transaction not found.');
app/Modules/Exchange/Controllers/SolanaController.php:488:        return $this->renderTheme('App\Modules\Exchange\Views\Solana\confirmation', $this->data);
app/Modules/Exchange/Controllers/SolanaController.php:491:    public function disconnectWallet($walletID = null) {
app/Modules/Exchange/Controllers/SolanaController.php:492:        $getWalletInfo  = $this->solanaModel->disconnectWallet($walletID); 
app/Modules/Exchange/Controllers/SolanaController.php:495:            return redirect()->to('/Exchange/Solana')->with('message', 'Wallet disconnected successfully.');
app/Modules/Exchange/Controllers/SolanaController.php:497:            // Handle the error case, for example, by redirecting back with an error message
app/Modules/Exchange/Controllers/SolanaController.php:498:            return redirect()->to('/Exchange/Solana')->with('error', 'Failed to disconnect the wallet.');
app/Modules/Exchange/Controllers/SolanaController.php:502:    public function executeSwap() {
app/Modules/Exchange/Controllers/SolanaController.php:503:        if ($premiumGuard = premium_guard('exchange.swap')) {
app/Modules/Exchange/Controllers/SolanaController.php:544:                // Perform the swap
app/Modules/Exchange/Controllers/SolanaController.php:545:                $swapResult = $this->MyMIRaydium->executeSwap($fromToken, $toToken, $amount);
app/Modules/Exchange/Controllers/SolanaController.php:546:                if (!$swapResult['success']) {
app/Modules/Exchange/Controllers/SolanaController.php:547:                    throw new \Exception('Swap failed: ' . $swapResult['message']);
app/Modules/Exchange/Controllers/SolanaController.php:574:    public function fetchFrontendData()
app/Modules/Exchange/Controllers/SolanaController.php:577:            log_message('debug', 'SolanaController L400 - fetchFrontendData() Fetch Started!');
app/Modules/Exchange/Controllers/SolanaController.php:580:            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid Request']);
app/Modules/Exchange/Controllers/SolanaController.php:585:            log_message('error', 'fetchFrontendData: missing user context; aborting.');
app/Modules/Exchange/Controllers/SolanaController.php:586:            return $this->response->setStatusCode(401)->setJSON([
app/Modules/Exchange/Controllers/SolanaController.php:619:            'fetchFrontendData - $mySolanaData: {a} | $marketData: {b} | $tokens: {c}',
app/Modules/Exchange/Controllers/SolanaController.php:623:        // Build response structure required
app/Modules/Exchange/Controllers/SolanaController.php:649:        return $this->response->setJSON([
app/Modules/Exchange/Controllers/SolanaController.php:656:    private function updateUserBalance($userId, $publicKey, $newBalance) {
app/Modules/Exchange/Controllers/SolanaController.php:660:    protected function fetchRealTimeData() {
app/Modules/Exchange/Controllers/SolanaController.php:663:            $response = $this->webSocketClient->sendMessage($message);
app/Modules/Exchange/Controllers/SolanaController.php:664:            $marketData = json_decode($response, true);
app/Modules/Exchange/Controllers/SolanaController.php:677:    public function provisionDefaultWallet()
app/Modules/Exchange/Controllers/SolanaController.php:680:            return $this->response->setStatusCode(405)->setJSON(['ok' => false, 'msg' => 'AJAX only']);
app/Modules/Exchange/Controllers/SolanaController.php:685:            return $this->response->setStatusCode(401)->setJSON(['ok' => false, 'msg' => 'Auth required']);
app/Modules/Exchange/Controllers/SolanaController.php:691:                return $this->response->setStatusCode(500)->setJSON(['ok' => false, 'msg' => 'Provision failed']);
app/Modules/Exchange/Controllers/SolanaController.php:693:            return $this->response->setJSON(['ok' => true, 'address' => $row['address']]);
app/Modules/Exchange/Controllers/SolanaController.php:696:            return $this->response->setStatusCode(500)->setJSON(['ok' => false, 'msg' => 'Error']);
app/Modules/Exchange/Controllers/SolanaController.php:700:    public function fundWallet()
app/Modules/Exchange/Controllers/SolanaController.php:704:            return $this->response->setStatusCode(422)->setJSON([
app/Modules/Exchange/Controllers/SolanaController.php:714:            return $this->response->setStatusCode(500)->setJSON([
app/Modules/Exchange/Controllers/SolanaController.php:722:            return $this->response->setStatusCode(500)->setJSON([
app/Modules/Exchange/Controllers/SolanaController.php:728:        return $this->response->setJSON([
app/Modules/Exchange/Controllers/SolanaController.php:734:    private function generateMetadataUri($metadata) {
app/Modules/Exchange/Controllers/SolanaController.php:741:    public function generateWallet() {
app/Modules/Exchange/Controllers/SolanaController.php:744:            return $this->response->setJSON(['status' => 'success', 'wallet' => $wallet]);
app/Modules/Exchange/Controllers/SolanaController.php:746:            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to generate wallet']);
app/Modules/Exchange/Controllers/SolanaController.php:750:    public function getMarketPrice() {
app/Modules/Exchange/Controllers/SolanaController.php:753:            return $this->response->setJSON(['price' => $solanaMarketPrice]);
app/Modules/Exchange/Controllers/SolanaController.php:755:            return $this->response->setJSON(['error' => $e->getMessage()], 500);
app/Modules/Exchange/Controllers/SolanaController.php:759:    public function getTokenMetadata($metadataUri) {
app/Modules/Exchange/Controllers/SolanaController.php:762:            $response = $client->get($metadataUri);
app/Modules/Exchange/Controllers/SolanaController.php:763:            return json_decode($response->getBody(), true);
app/Modules/Exchange/Controllers/SolanaController.php:770:    public function getTokenPrice($tokenAddress) {
app/Modules/Exchange/Controllers/SolanaController.php:775:            return $this->response->setJSON(['price' => $tokenPrice]);
app/Modules/Exchange/Controllers/SolanaController.php:777:            return $this->response->setJSON(['error' => $e->getMessage()], 500);
app/Modules/Exchange/Controllers/SolanaController.php:781:    public function import() {
app/Modules/Exchange/Controllers/SolanaController.php:784:        return $this->renderTheme('App\Modules\Exchange\Views\Solana\index', $this->data);
app/Modules/Exchange/Controllers/SolanaController.php:787:    public function importWallet()
app/Modules/Exchange/Controllers/SolanaController.php:833:                $response = \Config\Services::response();
app/Modules/Exchange/Controllers/SolanaController.php:839:                    return $response->setJSON([
app/Modules/Exchange/Controllers/SolanaController.php:849:                    return $response->setJSON([
app/Modules/Exchange/Controllers/SolanaController.php:859:                    return $response->setJSON([
app/Modules/Exchange/Controllers/SolanaController.php:868:                return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
app/Modules/Exchange/Controllers/SolanaController.php:873:    public function initiateBuyback($tokenId) {
app/Modules/Exchange/Controllers/SolanaController.php:885:        return $this->response->setJSON(['status' => 'success', 'message' => 'Buyback completed successfully.']);
app/Modules/Exchange/Controllers/SolanaController.php:888:    public function lockTokens() {
app/Modules/Exchange/Controllers/SolanaController.php:894:        return $this->response->setJSON($result);
app/Modules/Exchange/Controllers/SolanaController.php:897:    public function mintTokens() {
app/Modules/Exchange/Controllers/SolanaController.php:904:            return $this->response->setJSON($this->jsonEnvelope(false, $guard['message'], $guard));
app/Modules/Exchange/Controllers/SolanaController.php:909:            return $this->response->setJSON($this->jsonEnvelope(true, $result['message'] ?? 'Mint draft prepared.', $result));
app/Modules/Exchange/Controllers/SolanaController.php:911:            return $this->response->setJSON($this->jsonEnvelope(false, $result['message'] ?? 'Mint request failed.', [], $result));
app/Modules/Exchange/Controllers/SolanaController.php:915:    private function processCryptoSwap($userId, $amount, $price) {
app/Modules/Exchange/Controllers/SolanaController.php:916:        // Logic to handle crypto swaps
app/Modules/Exchange/Controllers/SolanaController.php:921:            'message' => 'Crypto swap successful',
app/Modules/Exchange/Controllers/SolanaController.php:922:            'redirect' => '/Exchange/Solana/Confirmation/' . $transactionId
app/Modules/Exchange/Controllers/SolanaController.php:926:    private function processCryptoSell($userId, $amount, $price) {
app/Modules/Exchange/Controllers/SolanaController.php:929:        $this->MyMISolana->swapCrypto($userId, $amount, $cryptoAmount);
app/Modules/Exchange/Controllers/SolanaController.php:934:            'redirect' => '/Exchange/Solana/Confirmation'
app/Modules/Exchange/Controllers/SolanaController.php:938:    private function processFiatPurchase($userId, $amount, $price) {
app/Modules/Exchange/Controllers/SolanaController.php:945:            'redirect' => '/Exchange/Solana/Confirmation/' . $payment['transactionId']
app/Modules/Exchange/Controllers/SolanaController.php:949:    private function processFiatSell($userId, $amount, $price) {
app/Modules/Exchange/Controllers/SolanaController.php:957:            'redirect' => '/Exchange/Solana/Confirmation'
app/Modules/Exchange/Controllers/SolanaController.php:961:    private function processMyMIGoldPurchase($userId, $amount, $price) {
app/Modules/Exchange/Controllers/SolanaController.php:968:            'redirect' => '/Exchange/Solana/Confirmation/' . $transaction['transactionId']
app/Modules/Exchange/Controllers/SolanaController.php:972:    private function processMyMIGoldSell($userId, $amount, $price) {
app/Modules/Exchange/Controllers/SolanaController.php:980:            'redirect' => '/Exchange/Solana/Confirmation'
app/Modules/Exchange/Controllers/SolanaController.php:984:    public function purchaseSolana() {
app/Modules/Exchange/Controllers/SolanaController.php:992:            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request parameters']);
app/Modules/Exchange/Controllers/SolanaController.php:998:                case 'crypto_swap':
app/Modules/Exchange/Controllers/SolanaController.php:1012:                return $this->response->setJSON(['success' => true, 'message' => $result['message'], 'redirect' => $result['redirect']]);
app/Modules/Exchange/Controllers/SolanaController.php:1017:            return $this->response->setJSON(['success' => false, 'message' => $e->getMessage()]);
app/Modules/Exchange/Controllers/SolanaController.php:1021:    private function recordTransactionHistory($userId, $fromToken, $toToken, $amount, $fees, $transactionResult, $isSuspicious) {
app/Modules/Exchange/Controllers/SolanaController.php:1025:    public function redistributeTokens() {
app/Modules/Exchange/Controllers/SolanaController.php:1041:        return $this->response->setJSON(['status' => 'success', 'message' => 'Tokens redistributed successfully.']);
app/Modules/Exchange/Controllers/SolanaController.php:1044:    public function refreshWallet() {
app/Modules/Exchange/Controllers/SolanaController.php:1048:                $response = $this->MyMISolflare->refreshWallet();
app/Modules/Exchange/Controllers/SolanaController.php:1051:                $response = $this->MyMIPhantom->refreshWallet();
app/Modules/Exchange/Controllers/SolanaController.php:1054:                $response = $this->MyMIMetaMask->refreshWallet();
app/Modules/Exchange/Controllers/SolanaController.php:1057:                $response = $this->MyMITrustWallet->refreshWallet();
app/Modules/Exchange/Controllers/SolanaController.php:1060:                $response = ['status' => 'error', 'message' => 'Invalid wallet type'];
app/Modules/Exchange/Controllers/SolanaController.php:1063:        return $this->response->setJSON($response);
app/Modules/Exchange/Controllers/SolanaController.php:1066:    public function sellSolana() {
app/Modules/Exchange/Controllers/SolanaController.php:1074:            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request parameters']);
app/Modules/Exchange/Controllers/SolanaController.php:1094:                return $this->response->setJSON(['success' => true, 'message' => $result['message'], 'redirect' => $result['redirect']]);
app/Modules/Exchange/Controllers/SolanaController.php:1099:            return $this->response->setJSON(['success' => false, 'message' => $e->getMessage()]);
app/Modules/Exchange/Controllers/SolanaController.php:1103:    private function sendTransactionConfirmation($email, $transactionResult) {
app/Modules/Exchange/Controllers/SolanaController.php:1110:    public function setupEnvironment()
app/Modules/Exchange/Controllers/SolanaController.php:1112:        return $this->response->setStatusCode(403)->setJSON([
app/Modules/Exchange/Controllers/SolanaController.php:1118:    public function swapSolana() {
app/Modules/Exchange/Controllers/SolanaController.php:1119:        $fromToken = $this->request->getPost('from_token'); // Token to swap from (e.g., SOL)
app/Modules/Exchange/Controllers/SolanaController.php:1120:        $toToken = $this->request->getPost('to_token');     // Token to swap to
app/Modules/Exchange/Controllers/SolanaController.php:1121:        $amount = $this->request->getPost('amount');        // Amount to swap
app/Modules/Exchange/Controllers/SolanaController.php:1126:            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request parameters']);
app/Modules/Exchange/Controllers/SolanaController.php:1133:                throw new \Exception('Insufficient balance for this swap.');
app/Modules/Exchange/Controllers/SolanaController.php:1136:            // Calculate fees and total swap amount
app/Modules/Exchange/Controllers/SolanaController.php:1137:            $swapRate = $this->MyMISolana->getTokenPrice($toToken) / $this->MyMISolana->getTokenPrice($fromToken);
app/Modules/Exchange/Controllers/SolanaController.php:1138:            $swappedAmount = $amount * $swapRate;
app/Modules/Exchange/Controllers/SolanaController.php:1141:            // Perform the swap
app/Modules/Exchange/Controllers/SolanaController.php:1142:            $result = $this->MyMISolana->swapCrypto($userId, $fromToken, $toToken, $amount, $swappedAmount - $fees);
app/Modules/Exchange/Controllers/SolanaController.php:1145:                return $this->response->setJSON(['success' => true, 'message' => $result['message'], 'redirect' => $result['redirect']]);
app/Modules/Exchange/Controllers/SolanaController.php:1150:            return $this->response->setJSON(['success' => false, 'message' => $e->getMessage()]);
app/Modules/Exchange/Controllers/SolanaController.php:1154:    public function testPage() {
app/Modules/Exchange/Controllers/SolanaController.php:1157:        return $this->renderTheme('App\Modules\Exchange\Views\Solana\testPage', $this->data);
app/Modules/Exchange/Controllers/SolanaController.php:1160:    public function triggerWebSocket() {
app/Modules/Exchange/Controllers/SolanaController.php:1165:            $response = $this->webSocketClient->sendMessage($message);
app/Modules/Exchange/Controllers/SolanaController.php:1166:            $marketData = json_decode($response, true);
app/Modules/Exchange/Controllers/SolanaController.php:1170:            return $this->response->setJSON(['status' => 'success']);
app/Modules/Exchange/Controllers/SolanaController.php:1173:            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
app/Modules/Exchange/Controllers/SolanaController.php:1178:    public function updateSolanaTokens() {
app/Modules/Exchange/Controllers/SolanaController.php:1181:            return $this->response->setJSON(['status' => 'success', 'tokens' => $tokens]);
app/Modules/Exchange/Controllers/SolanaController.php:1183:            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
app/Modules/Exchange/Controllers/SolanaController.php:1188:    public function updateSolanaPrices() {
app/Modules/Exchange/Controllers/SolanaController.php:1191:            return $this->response->setJSON(['status' => 'success']);
app/Modules/Exchange/Controllers/SolanaController.php:1193:            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
app/Modules/Exchange/Controllers/SolanaController.php:1197:    public function viewAssets() {
app/Modules/Exchange/Controllers/SolanaController.php:1200:        return $this->response->setJSON(['status' => 'success', 'assets' => $assets]);
app/Modules/Exchange/Controllers/SolanaController.php:1203:    public function viewSolanaWallet()  // <-- use your actual action name/route
app/Modules/Exchange/Controllers/SolanaController.php:1207:            // Not logged in -> modal should not load sensitive data
app/Modules/Exchange/Controllers/SolanaController.php:1208:            return $this->response->setStatusCode(401)->setBody('Authentication required.');
app/Modules/Exchange/Controllers/SolanaController.php:1221:        // Fetch transactions safely (int, ?string)
app/Modules/Exchange/Controllers/SolanaController.php:1224:        // Render your modal view with the resolved address and txs
app/Modules/Exchange/Controllers/SolanaController.php:1225:        return $this->renderTheme('User/Transactions/Solana/viewWallet', [
app/Modules/Exchange/Controllers/SolanaController.php:1228:            'transactions'=> $txs,
app/Modules/Exchange/Controllers/SolanaController.php:1233:    public function getQuote()
app/Modules/Exchange/Controllers/SolanaController.php:1236:            return $this->response->setStatusCode(405)->setJSON([
app/Modules/Exchange/Controllers/SolanaController.php:1249:        return $this->response->setJSON([
app/Modules/Exchange/Controllers/SolanaController.php:1256:    public function doSwap()
app/Modules/Exchange/Controllers/SolanaController.php:1259:            return $this->response->setStatusCode(405)->setJSON([
app/Modules/Exchange/Controllers/SolanaController.php:1266:        $res = service('solanaService')->swap($payload);
app/Modules/Exchange/Controllers/SolanaController.php:1267:        return $this->response->setJSON([
app/Modules/Exchange/Controllers/SolanaController.php:1274:    // protected function fetchRealTimeData()
app/Modules/Exchange/Controllers/SolanaController.php:1282:    //         $response = $this->webSocketClient->sendMessage($message);
app/Modules/Exchange/Controllers/SolanaController.php:1283:    //         $marketData = json_decode($response, true);
app/Modules/Exchange/Controllers/SolanaController.php:1295:    // protected function fetchRealTimeData() {
app/Modules/Exchange/Controllers/SolanaController.php:1298:    //         $response = $this->webSocketClient->sendMessage($message);
app/Modules/Exchange/Controllers/SolanaController.php:1299:    //         $marketData = json_decode($response, true);
app/Modules/Exchange/Controllers/SolanaController.php:1308:    // public function __destruct()
app/Modules/Exchange/Controllers/SolanaController.php:1313:    // public function fetchFrontendData()
app/Modules/Exchange/Controllers/SolanaController.php:1317:    //         log_message('debug', 'SolanaController L400 - fetchFrontendData() Fetch Started!');
app/Modules/Exchange/Controllers/SolanaController.php:1321:    //         return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid Request']);
app/Modules/Exchange/Controllers/SolanaController.php:1327:    //         log_message('error', 'fetchFrontendData: missing user context; aborting.');
app/Modules/Exchange/Controllers/SolanaController.php:1328:    //         return $this->response->setStatusCode(401)->setJSON([
app/Modules/Exchange/Controllers/SolanaController.php:1331:    //             // optional CSRF on error responses too
app/Modules/Exchange/Controllers/SolanaController.php:1426:    //     return $this->response->setJSON($payload);
app/Modules/Exchange/Controllers/SolanaController.php:1430:    private function jsonEnvelope(bool $success, string $message, array $data = [], array $errors = []): array
app/Modules/Exchange/Controllers/SolanaController.php:1455:    private function sanitizeWalletPayload(array $wallet): array
app/Modules/Exchange/Controllers/SolanaController.php:1469:    private function encryptSolanaSecretForStorage(?string $secret): ?string
app/Modules/Exchange/Controllers/SolanaController.php:1490:    private function privateKeySubmissionDisabledResponse()
app/Modules/Exchange/Controllers/SolanaController.php:1496:        return $this->response->setStatusCode(403)->setJSON([
app/Modules/Exchange/Controllers/SolanaController.php:1499:            'message' => 'Private key submission is disabled. Connect a supported wallet provider and use wallet-signed transactions.',
app/Modules/APIs/Controllers/SolanaAPIController.php:59:    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
app/Modules/APIs/Controllers/SolanaAPIController.php:61:        parent::initController($request, $response, $logger);
app/Modules/APIs/Controllers/SolanaAPIController.php:94:    public function commonData(): array {
app/Modules/APIs/Controllers/SolanaAPIController.php:104:    public function index() {
app/Modules/APIs/Controllers/SolanaAPIController.php:107:        return $this->renderTheme('App\Modules\Exchange\Views\Solana\index', $this->data);
app/Modules/APIs/Controllers/SolanaAPIController.php:110:    public function apiGetTokens() {
app/Modules/APIs/Controllers/SolanaAPIController.php:112:        return $this->response->setJSON($tokens);
app/Modules/APIs/Controllers/SolanaAPIController.php:115:    public function connectWallet() {
app/Modules/APIs/Controllers/SolanaAPIController.php:119:                $response = $this->MyMISolflare->connectWallet();
app/Modules/APIs/Controllers/SolanaAPIController.php:122:                $response = $this->MyMIPhantom->connectWallet();
app/Modules/APIs/Controllers/SolanaAPIController.php:125:                $response = $this->MyMIMetaMask->connectWallet();
app/Modules/APIs/Controllers/SolanaAPIController.php:128:                $response = $this->MyMITrustWallet->connectWallet();
app/Modules/APIs/Controllers/SolanaAPIController.php:131:                $response = ['status' => 'error', 'message' => 'Invalid wallet type'];
app/Modules/APIs/Controllers/SolanaAPIController.php:134:        return $this->response->setJSON($response);
app/Modules/APIs/Controllers/SolanaAPIController.php:137:    public function createSolanaWallet() {
app/Modules/APIs/Controllers/SolanaAPIController.php:170:                return $this->response->setJSON($this->jsonEnvelope(true, 'Wallet created safely.', ['publicKey' => $publicKey, 'walletAddress' => $publicKey]));
app/Modules/APIs/Controllers/SolanaAPIController.php:172:                return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
app/Modules/APIs/Controllers/SolanaAPIController.php:177:    public function createToken() {
app/Modules/APIs/Controllers/SolanaAPIController.php:189:                    return $this->response->setJSON($this->jsonEnvelope(true, 'Draft token prepared successfully.', ['token' => $result['token'] ?? $result]));
app/Modules/APIs/Controllers/SolanaAPIController.php:191:                    return $this->response->setJSON($this->jsonEnvelope(false, $result['message'] ?? 'Token creation failed.', [], ['token' => $result]));
app/Modules/APIs/Controllers/SolanaAPIController.php:194:                return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
app/Modules/APIs/Controllers/SolanaAPIController.php:197:        return $this->renderTheme('App\Modules\Exchange\Views\Solana\createToken', $this->data);
app/Modules/APIs/Controllers/SolanaAPIController.php:200:    public function executeSwap() {
app/Modules/APIs/Controllers/SolanaAPIController.php:201:        if ($premiumGuard = premium_guard('exchange.swap')) {
app/Modules/APIs/Controllers/SolanaAPIController.php:228:                $swapResult = $this->MyMIRaydium->executeSwap($fromToken, $toToken, $amount);
app/Modules/APIs/Controllers/SolanaAPIController.php:242:    public function getAssetsData() {
app/Modules/APIs/Controllers/SolanaAPIController.php:293:            return $this->response->setJSON([
app/Modules/APIs/Controllers/SolanaAPIController.php:301:            return $this->response->setJSON($emptyResponse($draw, 'Unable to load assets data.'));
app/Modules/APIs/Controllers/SolanaAPIController.php:305:    public function getCoinAmount($tokenAddress) {
app/Modules/APIs/Controllers/SolanaAPIController.php:320:            return $this->response->setJSON(['amount' => $amount]);
app/Modules/APIs/Controllers/SolanaAPIController.php:322:            // Log the error and return a JSON response
app/Modules/APIs/Controllers/SolanaAPIController.php:324:            return $this->response->setJSON(['error' => $e->getMessage()], 500);
app/Modules/APIs/Controllers/SolanaAPIController.php:329:    public function getExchangePrice($tokenSymbol) {
app/Modules/APIs/Controllers/SolanaAPIController.php:333:            return $this->response->setJSON(['price' => $exchangePrice]);
app/Modules/APIs/Controllers/SolanaAPIController.php:335:            return $this->response->setJSON(['error' => $e->getMessage()], 500);
app/Modules/APIs/Controllers/SolanaAPIController.php:339:    public function getMarketPrice() {
app/Modules/APIs/Controllers/SolanaAPIController.php:342:            return $this->response->setJSON(['price' => $solanaMarketPrice]);
app/Modules/APIs/Controllers/SolanaAPIController.php:344:            return $this->response->setJSON(['error' => $e->getMessage()], 500);
app/Modules/APIs/Controllers/SolanaAPIController.php:348:    public function getTokenPrice($tokenAddress) {
app/Modules/APIs/Controllers/SolanaAPIController.php:352:            return $this->response->setJSON(['price' => $tokenPrice]);
app/Modules/APIs/Controllers/SolanaAPIController.php:354:            return $this->response->setJSON(['error' => $e->getMessage()], 500);
app/Modules/APIs/Controllers/SolanaAPIController.php:358:    public function importWallet() {
app/Modules/APIs/Controllers/SolanaAPIController.php:403:                $response = \Config\Services::response();
app/Modules/APIs/Controllers/SolanaAPIController.php:409:                    return $response->setJSON([
app/Modules/APIs/Controllers/SolanaAPIController.php:419:                    return $response->setJSON([
app/Modules/APIs/Controllers/SolanaAPIController.php:429:                    return $response->setJSON([
app/Modules/APIs/Controllers/SolanaAPIController.php:438:                return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
app/Modules/APIs/Controllers/SolanaAPIController.php:443:    public function updateSolanaTokens() {
app/Modules/APIs/Controllers/SolanaAPIController.php:446:            return $this->response->setJSON(['status' => 'success', 'tokens' => $tokens]);
app/Modules/APIs/Controllers/SolanaAPIController.php:448:            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
app/Modules/APIs/Controllers/SolanaAPIController.php:452:    public function updateSolanaPrices()
app/Modules/APIs/Controllers/SolanaAPIController.php:456:            return $this->response->setJSON(['status' => 'success']);
app/Modules/APIs/Controllers/SolanaAPIController.php:459:            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
app/Modules/APIs/Controllers/SolanaAPIController.php:464:    public function health()
app/Modules/APIs/Controllers/SolanaAPIController.php:497:        return $this->response->setStatusCode(200)->setJSON([
app/Modules/APIs/Controllers/SolanaAPIController.php:513:    public function getBalance($address)
app/Modules/APIs/Controllers/SolanaAPIController.php:517:            return $this->response->setJSON($this->jsonEnvelope(true, 'Balance loaded.', ['address' => $address, 'lamports' => $lamports]));
app/Modules/APIs/Controllers/SolanaAPIController.php:519:            return $this->response->setJSON($this->jsonEnvelope(false, 'Unable to load balance.', [], ['exception' => $e->getMessage()]));
app/Modules/APIs/Controllers/SolanaAPIController.php:523:    public function getTokenAccounts($address)
app/Modules/APIs/Controllers/SolanaAPIController.php:527:            return $this->response->setJSON($this->jsonEnvelope(true, 'Token accounts loaded.', ['address' => $address, 'tokens' => $tokens]));
app/Modules/APIs/Controllers/SolanaAPIController.php:529:            return $this->response->setJSON($this->jsonEnvelope(false, 'Unable to load token accounts.', [], ['exception' => $e->getMessage()]));
app/Modules/APIs/Controllers/SolanaAPIController.php:533:    public function transfer()
app/Modules/APIs/Controllers/SolanaAPIController.php:537:        return $this->response->setJSON($this->jsonEnvelope((bool) ($result['success'] ?? false), (string) ($result['message'] ?? 'Transfer prepared.'), $result));
app/Modules/APIs/Controllers/SolanaAPIController.php:540:    public function quote()
app/Modules/APIs/Controllers/SolanaAPIController.php:544:        return $this->response->setJSON($this->jsonEnvelope(true, 'Quote loaded.', ['quote' => $result]));
app/Modules/APIs/Controllers/SolanaAPIController.php:547:    public function swap()
app/Modules/APIs/Controllers/SolanaAPIController.php:550:        $result = service('solanaService')->swap($payload);
app/Modules/APIs/Controllers/SolanaAPIController.php:551:        return $this->response->setJSON($this->jsonEnvelope((bool) ($result['success'] ?? ! isset($result['allowed'])), (string) ($result['message'] ?? 'Swap request processed.'), $result));
app/Modules/APIs/Controllers/SolanaAPIController.php:554:    public function mint()
app/Modules/APIs/Controllers/SolanaAPIController.php:558:        return $this->response->setJSON($this->jsonEnvelope((bool) ($result['success'] ?? false), (string) ($result['message'] ?? 'Mint request processed.'), $result));
app/Modules/APIs/Controllers/SolanaAPIController.php:561:    private function jsonEnvelope(bool $success, string $message, array $data = [], array $errors = []): array
app/Modules/APIs/Controllers/SolanaAPIController.php:586:    private function sanitizeWalletPayload(array $wallet): array
app/Modules/APIs/Controllers/SolanaAPIController.php:600:    private function calculateTransactionFees($amount) {
app/Modules/APIs/Controllers/SolanaAPIController.php:607:    public function provisionDefaultWallet()
app/Modules/APIs/Controllers/SolanaAPIController.php:610:        if ($cuID <= 0) return $this->response->setJSON(['success'=>false,'message'=>'No user']);
app/Modules/APIs/Controllers/SolanaAPIController.php:620:            return $this->response->setJSON(['success'=>true,'wallet_id'=>$id,'address'=>$kp['address_base58']]);
app/Modules/APIs/Controllers/SolanaAPIController.php:623:            return $this->response->setJSON(['success'=>false,'message'=>'Failed: '.$e->getMessage()]);
app/Modules/APIs/Controllers/SolanaAPIController.php:627:    private function updateUserBalance($userId, $publicKey, $newBalance) {
app/Modules/APIs/Controllers/SolanaAPIController.php:631:    private function recordTransactionHistory($userId, $fromToken, $toToken, $amount, $fees, $transactionResult) {
app/Modules/APIs/Controllers/SolanaAPIController.php:635:    private function sendTransactionConfirmation($email, $transactionResult) {
app/Modules/APIs/Controllers/SolanaAPIController.php:642:    private function resolveSolanaServiceForHealth(): ?\App\Services\SolanaService
app/Modules/APIs/Controllers/SolanaAPIController.php:671:    private function encryptSolanaSecretForStorage(?string $secret): ?string
app/Modules/APIs/Controllers/SolanaAPIController.php:692:    private function privateKeySubmissionDisabledResponse()
app/Modules/APIs/Controllers/SolanaAPIController.php:698:        return $this->response->setStatusCode(403)->setJSON([
app/Modules/APIs/Controllers/SolanaAPIController.php:701:            'message' => 'Private key submission is disabled. Connect a supported wallet provider and use wallet-signed transactions.',
```

## Solana Frontend Runtime Calls

```text
app/Modules/Exchange/Views/Solana/index.php:49:$swapSolanaStatus = (int)($siteSettings->swapSolanaStatus ?? 0);
app/Modules/Exchange/Views/Solana/index.php:76:                            <li><a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#connectWalletModal">
app/Modules/Exchange/Views/Solana/index.php:85:                            <li><a class="btn btn-primary text-white dynamicModalLoader" data-formtype="Solana" data-endpoint="viewSolanaWallet">
app/Modules/Exchange/Views/Solana/index.php:220:                                    <a class="btn btn-primary btn-block text-white dynamicModalLoader" data-formtype="Solana" data-endpoint="viewSolanaWallet"><em class="icon ni ni-eye"></em> MyMI Solana</a>
app/Modules/Exchange/Views/Solana/index.php:223:                                <div class="progress-amount w-40"><a class="btn btn-success btn-block text-white" data-bs-toggle="modal" data-bs-target="#connectWalletModal"><em class="icon ni ni-plus"></em> Connect</a></div>
app/Modules/Exchange/Views/Solana/index.php:260:                        <?php if ($swapSolanaStatus === 1) : ?>
app/Modules/Exchange/Views/Solana/index.php:265:                                <div class="progress-amount w-40"><a class="btn btn-primary btn-block text-white dynamicModalLoader" data-formtype="Solana" data-endpoint="coinSwap"><em class="icon ni ni-swap"></em> Swap </a></div>
app/Modules/Exchange/Views/Solana/index.php:405:<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
app/Modules/Exchange/Views/Solana/index.php:409:window.CSRF_TOKEN_NAME = window.CSRF_TOKEN_NAME || <?= json_encode(csrf_token()) ?>;
app/Modules/Exchange/Views/Solana/index.php:410:window.CSRF_TOKEN_HASH = window.CSRF_TOKEN_HASH || <?= json_encode(csrf_hash()) ?>;
app/Modules/Exchange/Views/Solana/index.php:429:    $.ajaxSetup({
app/Modules/Exchange/Views/Solana/index.php:433:    // Refresh CSRF hash after any JSON response that includes { csrf: "..." }
app/Modules/Exchange/Views/Solana/index.php:434:    $(document).ajaxComplete(function (_evt, xhr) {
app/Modules/Exchange/Views/Solana/index.php:437:            if (res && typeof res.csrf === 'string' && res.csrf.length > 0) {
app/Modules/Exchange/Views/Solana/index.php:438:                window.CSRF_TOKEN_HASH = res.csrf;
app/Modules/Exchange/Views/Solana/index.php:440:        } catch (_) { /* ignore */ }
app/Modules/Exchange/Views/Solana/index.php:495:        } catch (_err) {
app/Modules/Exchange/Views/Solana/index.php:538:    document.addEventListener('error', function (event) {
app/Modules/Exchange/Views/Solana/index.php:562:  const csrfName = window.CSRF_TOKEN_NAME || (window.CSRF_TOKEN && window.CSRF_TOKEN.name);
app/Modules/Exchange/Views/Solana/index.php:563:  const csrfHash = window.CSRF_TOKEN_HASH || (window.CSRF_TOKEN && window.CSRF_TOKEN.hash);
app/Modules/Exchange/Views/Solana/index.php:566:  if (csrfName && csrfHash) {
app/Modules/Exchange/Views/Solana/index.php:567:    postData[csrfName] = csrfHash;
app/Modules/Exchange/Views/Solana/index.php:570:  $.ajax({
app/Modules/Exchange/Views/Solana/index.php:571:    url: '/index.php/Exchange/Solana/fetchFrontendData',
app/Modules/Exchange/Views/Solana/index.php:578:      'X-CSRF-TOKEN': csrfHash || ''
app/Modules/Exchange/Views/Solana/index.php:589:      console.error('Failed to fetch data:', response?.message || 'Unknown error');
app/Modules/Exchange/Views/Solana/index.php:644:      console.error('Error fetching data:', xhr.status, xhr.responseText || xhr.statusText);
app/Modules/Exchange/Views/Solana/index.php:659:                   onerror="this.src='/assets/images/avatar-placeholder.png';">
app/Modules/Exchange/Views/Solana/index.php:712:        // EXACTLY 5 <td> to match 5 <th> headers to prevent _DT_CellIndex errors
app/Modules/Exchange/Views/Solana/index.php:720:                     onerror="this.onerror=null; this.src='${defaultLogo}';"/>
app/Modules/Exchange/Views/Solana/index.php:867:                            <img src="${mymiSanitizeSolanaTokenLogoUrl(token.coin_logo)}" class="user-avatar bg-light" alt="${token.coin_name}" onerror="this.src='/assets/images/placeholder.png';"/>
app/Modules/Exchange/Views/Solana/assets.php:47:$swapSolanaStatus = $siteSettings->swapSolanaStatus;
app/Modules/Exchange/Views/Solana/assets.php:199:                                                        <a class="dynamicModalLoader" data-formtype="Solana" data-endpoint="swapSolana" data-accountid="<?php echo $solanaTP['id']; ?>"><em class="icon ni ni-swap solanaTickerSocialIcon"></em></a>
app/Modules/Exchange/Views/Solana/assets.php:208:                                                                <li><a class="dynamicModalLoader" data-formtype="Solana" data-endpoint="swapSolana" data-accountid="<?php echo $solanaTP['id']; ?>">Swap</a></li>
app/Modules/Exchange/Views/Solana/assets.php:244:                                                            <img class="solanaTickerLogo" src="<?= $solanaTP['coin_logo']; ?>" onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/MyMI-Wallet.png'); ?>" alt="<?= $solanaTP['coin_name'] . ' (' . $solanaTP['symbol'] . ')'; ?>"/>
app/Modules/Exchange/Views/Solana/assets.php:275:                                                        <a class="dynamicModalLoader" data-formtype="Solana" data-endpoint="swapSolana" data-accountid="<?php echo $solanaTP['id']; ?>"><em class="icon ni ni-swap solanaTickerSocialIcon"></em></a>
app/Modules/Exchange/Views/Solana/assets.php:284:                                                                <li><a class="dynamicModalLoader" data-formtype="Solana" data-endpoint="swapSolana" data-accountid="<?php echo $solanaTP['id']; ?>">Swap</a></li>
app/Modules/Exchange/Views/Solana/swap.php:40:<!-- app/Modules/Exchange/Views/Solana/swap.php -->
app/Modules/Exchange/Views/Solana/swap.php:64:                <?php if (session()->getFlashdata('error')) : ?>
app/Modules/Exchange/Views/Solana/swap.php:65:                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
app/Modules/Exchange/Views/Solana/swap.php:91:                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
app/Modules/Exchange/Views/Solana/swap.php:187:                                <?php if(validation_errors()): ?>
app/Modules/Exchange/Views/Solana/swap.php:188:                                <div class="fade alert alert-error in"><?= validation_errors() ?></div>
app/Modules/Exchange/Views/Solana/swap.php:256:        fetch(`https://www.mymiwallet.com/index.php/API/Solana/getExchangePrice/${selectedFromToken}`)
app/Modules/Exchange/Views/Solana/swap.php:259:            .catch((error) => console.error('Error fetching exchange price:', error));
app/Modules/Exchange/Views/Solana/swap.php:265:        fetch(`https://www.mymiwallet.com/index.php/API/Solana/getTokenPrice/${selectedToToken}`)
app/Modules/Exchange/Views/Solana/swap.php:268:            .catch((error) => console.error('Error fetching token price:', error));
app/Modules/Exchange/Views/Solana/swap.php:273:        fetch(`<?= base_url('index.php/API/Solana/getCoinAmount') ?>/${selectedToken}`)
app/Modules/Exchange/Views/Solana/swap.php:276:            .catch((error) => console.error('Error fetching coin amount:', error));
app/Modules/Exchange/Views/Solana/swap.php:316:    $('#swapTokens').on('click', function () {
app/Modules/Exchange/Views/Solana/swap.php:319:            alert('Please select a token to swap to.');
app/Modules/Exchange/Views/Solana/swap.php:346:        // Recalculate with swapped tokens
app/Modules/Exchange/Views/Solana/swap.php:386://         fetch(`https://www.mymiwallet.com/index.php/API/Solana/getExchangePrice/${selectedFromToken}`)
app/Modules/Exchange/Views/Solana/swap.php:391://             .catch(error => {
app/Modules/Exchange/Views/Solana/swap.php:392://                 console.error("Error fetching exchange price: ", error);
app/Modules/Exchange/Views/Solana/swap.php:399://         fetch(`https://www.mymiwallet.com/index.php/API/Solana/getTokenPrice/${selectedToken}`)
app/Modules/Exchange/Views/Solana/swap.php:404://             .catch(error => {
app/Modules/Exchange/Views/Solana/swap.php:405://                 console.error("Error fetching token price: ", error);
app/Modules/Exchange/Views/Solana/swap.php:451://     $('#swapTokens').on('click', function() {
app/Modules/Exchange/Views/Solana/swap.php:454://             alert('Please select a token to swap to.');
app/Modules/Exchange/Views/Solana/swap.php:457://         swapTokens();
app/Modules/Exchange/Views/Solana/swap.php:460://     function swapTokens() {
app/Modules/Exchange/Views/Solana/swap.php:485://         fetch(`<?=base_url('index.php/API/Solana/getCoinAmount')?>/${selectedToken}`)
app/Modules/Exchange/Views/Solana/swap.php:490://             .catch(error => {
app/Modules/Exchange/Views/Solana/swap.php:491://                 console.error("Error fetching coin amount: ", error);
app/Modules/Exchange/Views/Solana/orders.php:200:                                log_message('debug', 'Views\Solana\orders L164 - $cryptoAccount: ' . print_r($cryptoAccount, true));
app/Modules/Exchange/Views/Solana/orders.php:201:                                log_message('debug', 'Views\Solana\orders L164 - $cryptoTransactions: ' . print_r($cryptoTransactions, true));
app/Modules/Exchange/Views/Solana/connectWallet.php:41:<div class="modal fade" id="connectWalletModal" aria-hidden="true" aria-labelledby="connectWalletModalLabel" tabindex="-1">
app/Modules/Exchange/Views/Solana/connectWallet.php:42:    <div class="modal-dialog modal-xl" id="connectWalletModalDialog">
app/Modules/Exchange/Views/Solana/connectWallet.php:43:        <div class="modal-content" id="connectWalletModalContainer">
app/Modules/Exchange/Views/Solana/connectWallet.php:45:                <h5 class="modal-title" id="connectWalletModalLabel">Connect Wallet</h5>
app/Modules/Exchange/Views/Solana/viewWallet.php:79:          <?= csrf_field() ?>
app/Modules/Exchange/Views/Solana/viewWallet.php:214:        <?php if (function_exists('validation_errors') && validation_errors()): ?>
app/Modules/Exchange/Views/Solana/viewWallet.php:215:          <div class="alert alert-error fade in"><?= validation_errors() ?></div>
app/Modules/Exchange/Views/Solana/viewWallet.php:232:      fetch("<?= site_url('Exchange/Solana/Edit-Wallet') ?>", {
app/Modules/Exchange/Views/Solana/viewWallet.php:242:          alert((data && (data.message || data.error)) || "Failed to update the wallet.");
app/Modules/Exchange/Views/Solana/viewWallet.php:245:      .catch(err => {
app/Modules/Exchange/Views/Solana/viewWallet.php:246:        console.error("Error:", err);
app/Modules/Exchange/Views/Solana/viewWallet.php:247:        alert("An error occurred while updating the wallet.");
```

## Browser Test Required

Run the authenticated browser console test on /Exchange/Solana while logged in.
